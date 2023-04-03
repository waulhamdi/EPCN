<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Mail extends CI_Controller {

    /// @see construct()
    /// @note function yang otomatis akan dijalankan saat class diinstansiasi
    /// @attention
    public function __construct() {

        parent:: __construct();
    
        $this->load->model('M_Mail'); //Load Model
        $this->load->model('M_application'); //Load Model
        $this->load->helper('date'); // Load helper date fungsi tanggal

    }


    /// @see ajax_mail_approve()
    /// @note
    /// @attention

    // [*****************************************************************]
    //                Flow ajax_mail_approve() 
    // [*****************************************************************]
    //
    //          [Approve]                
    //            |                     
    //            v                     
    //         1.Update date (where hdrid,nik,level)
    //            |                     
    //            v                     
    //         2.Cari next approval
    //            |               
    //            v                     
    //     IF << Ketemu >> ----- No  -------------------------------------------------- 
    //            | Yes                                                                |
    //            v                                                                    v
    //         3.update status transaksi(waiting approve ...)              4.update status transaksi(Done) 
    //            |                                                                    |
    //            |                                                                    v
    //            |                                                               5.Cari Creator                                     
    //            |                                                                    |
    //            v                                                                    V
    //         6.update tb_mail_trigger  <---------------------------------------------
    //            |               
    //            v     
    //         run trigger after update  tb_mail_trigger => exec storage procedure send_mail
    
    /// @see ajax_mail_approve()
    /// @note Fungsi untuk mengirim email ke approver selanjutnya  ketika di approve/Update data register 
    /// @attention Fungsi active untuk Halaman A4 Button Approve, PCN Register Add/Update Data
    public function ajax_mail_approve()
	{
        $hdrid = $this->input->post('hdrid');
        $name = str_replace(' ', '', $this->input->post('name'));
        $position_name = str_replace(' ', '', $this->input->post('position_name'));
        $position_code = str_replace(' ', '', $this->input->post('position_code'));
        $reason = $this->input->post('reason');
        $nikreq = $this->input->post('nikreq');
        $product = $this->input->post('product');
        
        date_default_timezone_set('Asia/Jakarta');
        $currentDate=mdate('%Y-%m-%d',time());
        //Update date_change untuk reminder approval
        $condition = array('hdrid' => $hdrid);        
        $data = array('status_transaction_date_change' =>$currentDate );
        $status_email = $this->M_Mail->Update_Data($condition, $data, 'tb_pcn');
        
        $next_app = $this->M_Mail->cari_tb_approver($hdrid);
        $data_pcn = $this->M_Mail->Get_Where($condition,'tb_pcn');
        // var_dump($hdrid);
        
        if ($next_app->name!='All') {
            $next_app2 = $this->M_Mail->cari_tb_approver2($hdrid,$next_app->position_code);
        }
        // $all_app = $this->M_Mail->cari_all_approver($hdrid,$next_app->position_code);
        
        
        // Send email notifikasi approve ke next approver
        if ($next_app->name=='All') {
            
            // Send email notifikasi rejected ke user(Procurement requester pcn) Not Active
            $requester = $this->M_Mail->cari_requester($data_pcn->nik);
            $status_transaction = "PCN Complete" ;
            $post_data =array('status_transaction' => 'PCN Complete','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$requester->nik_superiorprocurement,'name'=>$requester->name_superiorprocurement,'department_code'=>$requester->kode_section_superiorprocurement,'department_name'=>$requester->name_section_superiorprocurement,'office_email'=>$requester->email_superiorprocurement,'position_code'=>'','position_name'=>'','subject_email'=>'PCN Complete','body_content'=>$status_transaction,'comment'=>'','cc_email'=>'');
            $post_datamerge=array_merge($post_data,$post_data);   
            $where = array('trxid' => 0);        
            $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
            
        }else {
            
            // Selain poscode 4 send email karena position 4 akan aktif setelah application response selesai
            if ($next_app->position_name =='Written QA') {
                
                    $update_stat=$this->M_Mail->Update_stat($hdrid,$currentDate);
                    // Send email ke responden application response
                    $list_res = $this->M_Mail->cari_responden($hdrid)->row();
                    $list_name = $this->M_Mail->cari_name($hdrid)->row();
                    $list_mem = $this->M_application->cari_member($product)->row();
                    //CC Member
                    $cc_member = $list_mem->PE_1.$list_mem->PE_2.$list_mem->PE_3.$list_mem->QC_1.$list_mem->QC_2.$list_mem->QC_3.$list_mem->MFG_1.$list_mem->MFG_2.$list_mem->MFG_3.$list_mem->PC_1.$list_mem->PC_2.$list_mem->PC_3.$list_mem->QA_1.$list_mem->QA_2.$list_mem->QA_3;
                    //CC 5 Divisi
                    $cc_email = $list_res->qc_inspection_departement.';'.$list_res->pe_departement.';'.$list_res->mfg_departement.';'.$list_res->pc_departement.';'.$list_res->qa_departement;
                    //Name 5 responden
                    $name = $list_name->qc_name.','.$list_name->pe_name.','.$list_name->mfg_name.','.$list_name->pc_name.','.$list_name->qa_name;
                
                    $post_data =array('status_transaction' => 'Need Your Response','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>'','name'=>$name,'department_code'=>'','department_name'=>'','office_email'=>$list_res->creator,'position_code'=>'','position_name'=>'','subject_email'=>'Need Your Response to Application Response','body_content'=>'','comment'=>'','cc_email'=>$cc_email.';'.$cc_member);
                    $post_datamerge=array_merge($post_data,$post_data);   
                    $where = array('trxid' => 0);        
                    $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

                } else if ($next_app->position_name =='Written QA Final') {
                
                    // Should be insert data t1-t10 isir and send email to procurement,qa
                    $requester = $this->M_Mail->cari_requester($data_pcn->nik);
                    $isir = $this->M_Mail->cari_isir($hdrid);
                    if ($isir->isir == 'not found') {
                        $list_res = $this->M_Mail->insert_isir($hdrid,$requester->nik_superiorprocurement);
                    }
                    $post_data =array('status_transaction' => 'ISIR Ready To Attach','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$requester->nik_superiorprocurement	,'name'=>$requester->name_superiorprocurement,'department_code'=>$requester->kode_section_superiorprocurement,'department_name'=>$requester->name_section_superiorprocurement,'office_email'=>$requester->email_superiorprocurement,'position_code'=>'','position_name'=>'','subject_email'=>'Plan Approval Complete,ISIR Need Attach','body_content'=>'','comment'=>'','cc_email'=>'');
                    $post_datamerge=array_merge($post_data,$post_data);   
                    $where = array('trxid' => 0);        
                    $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

                } else {

                    foreach ($next_app2 as $value) {
                        $post_data =array('status_transaction' => 'Need Approve','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$value->nik,'name'=>$value->name,'department_code'=>$value->department_code,'department_name'=>$value->department_name,'office_email'=>$value->office_email,'position_code'=>$value->position_code,'position_name'=>$value->position_name,'subject_email'=>'Need Approve','body_content'=>'Please click link below and approve','comment'=>'','cc_email'=>'');
                        $post_datamerge=array_merge($post_data,$post_data);   
                        $where = array('trxid' => 0);        
                        $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
                    };
                }
        }
   
        // $this->M_approver->Update_Data_Approve();
         $data['Approve'] = "Succes Approve $hdrid";
         $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    // [*****************************************************************]
    //                           Doxygen 
    // [*****************************************************************]

    /// @see ajax_mail_reject()
    /// @note
    /// @attention

    // [*****************************************************************]
    //                Flow ajax_mail_reject() 
    // [*****************************************************************]
    //
    //          [Reject]                
    //            |                     
    //            v                     
    //         1.Update tb_approval  date= null (where hdrid)
    //            |                     
    //            v                     
    //         2.Update status transaksi(Rejected by .. with reason ...)         
    //            |
    //            v         
    //         3.Cari Creator 
    //            |                                                                
    //            v                                                                
    //         4.Update tb_mail_trigger 
    //            |               
    //            v     
    //         run trigger after update  tb_mail_trigger => exec storage procedure send_mail

    /// @see ajax_mail_reject()
    /// @note Fungsi untuk mengirim email ke requester ketika di reject oleh approver
    /// @attention
    public function ajax_mail_reject()
	{

        date_default_timezone_set('Asia/Jakarta'); // Set timezone
        $tanggal_sekarang = mdate('%Y-%m-%d',time()); 

        // ********************* 0. Collect data post *********************
        $hdrid=$this->input->post('hdrid');
        $nik=$this->input->post('nik');
        $nikreq=$this->input->post('nikreq');
        $name=$this->input->post('name');
        $position_code=$this->input->post('position_code');
        $rejected_by=$this->input->post('rejected_by');
        $reason=$this->input->post('reason');
        $currentDate = mdate('%Y-%m-%d',time()); 

        // *********************   4.Update tb_mail_trigger  *********************

        // Send email notifikasi rejected ke user(Procurement requester pcn)
        $requester = $this->M_Mail->cari_requester($nikreq);
        $status_transaction = "Rejected By:".$rejected_by." With Reason: ".$reason ;
        $post_data =array('status_transaction' => 'Rejected','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$requester->nik_superiorprocurement	,'name'=>$requester->name_superiorprocurement,'department_code'=>$requester->kode_section_superiorprocurement,'department_name'=>$requester->name_section_superiorprocurement,'office_email'=>$requester->email_superiorprocurement,'position_code'=>'','position_name'=>'','subject_email'=>'Rejected','body_content'=>$status_transaction,'comment'=>'','cc_email'=>'');
        $post_datamerge=array_merge($post_data,$post_data);   
        $where = array('trxid' => 0);        
        $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
        
        $data['status'] = 'Berhasil direject';

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }




    /// @see ajax_mail_isir()
    /// @note Send email berdasarkan nik 
    /// @attention apabila procurement send email to pic qc,cc_to / apabila qc send email to procurement,5 responden,5 divisi member
    public function ajax_mail_isir()
	{
        $hdrid = $this->input->post('hdrid');
        $no_isir = $this->input->post('no_isir');
        $sender = $this->input->post('sender');
        $currentDate = mdate('%Y-%m-%d',time()); 
        
        $where = array('hdrid' =>$hdrid , 'no_isir'=>$no_isir);
        $data_isir = $this->M_Mail->Get_where($where,'tb_isir');
        // Tambah kondisi kalau status accepted kirim ke reply
        
       
        if ($sender == $data_isir->pic_pro) {

            $whereto1 = array('user_name' =>$data_isir->cc_to1);
            $whereto2 = array('user_name' =>$data_isir->cc_to2);

            if ($data_isir->deviasi == '' || $data_isir->deviasi == null) {
                $status_transaction = "ISIR QC Measurement" ;
            }else{
                $status_transaction = "ISIR $no_isir Deviasi Propose" ;
            }

            $stat = array('stat' =>$status_transaction);
            $where2 = array('hdrid' =>$hdrid);
            $this->M_Mail->Update_Data($where2,$stat , 'tb_pcn');

            $cc_to1 = $this->M_Mail->Get_where1($whereto1,'tb_user_login');
            $cc_to2 = $this->M_Mail->Get_where1($whereto2,'tb_user_login');
            $cc_mail= $cc_to1->office_email.';'.$cc_to2->office_email;

            $post_data =array('status_transaction' => $status_transaction,'hdrid'=>$hdrid,'transaction_date'=>$currentDate,'nik'=>$data_isir->pic_qc,'name'=>$data_isir->qc_name,'department_code'=>'','department_name'=>'','office_email'=>$data_isir->qc_email,'position_code'=>'','position_name'=>'','subject_email'=>$status_transaction,'body_content'=>"Remark : $data_isir->remark",'comment'=>'','cc_email'=>$cc_mail);
            $post_datamerge=array_merge($post_data,$post_data);   
            $where = array('trxid' => 0);        
            $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

        } else {
            // To procurement(User creator)
            // CC list excel+5 divisi response + 5 divisi member
            // List CC 
            // $qc_reply = $this->M_Mail->get_mail()->row();
            $list_res = $this->M_Mail->cari_name($hdrid)->row();
            $list_mem = $this->M_Mail->cari_member($list_res->product_name)->row();
            $written_qa = array('position_name' =>'Written QA','problem_id' =>$hdrid,'stat' =>'Approved');
            $written = $this->M_Mail->Get_Where1($written_qa,'tb_approval');
            //CC MEMBER
            $cc_member = $list_mem->PE_1.$list_mem->PE_2.$list_mem->PE_3.$list_mem->QC_1.$list_mem->QC_2.$list_mem->QC_3.$list_mem->MFG_1.$list_mem->MFG_2.$list_mem->MFG_3.$list_mem->PC_1.$list_mem->PC_2.$list_mem->PC_3.$list_mem->QA_1.$list_mem->QA_2.$list_mem->QA_3;
            //CC 5 Responden
            $cc_email = $list_res->qc_inspection_departement.';'.$list_res->pe_departement.';'.$list_res->mfg_departement.';'.$list_res->pc_departement.';'.$list_res->qa_departement;
            // Merge semua data CC
            $cc_mail = $cc_email.';'.$cc_member.';'.$written->office_email;

         
            
            $status= $data_isir->status;

            $whereto2 = array('user_name' =>$data_isir->pic_pro);
            $creator = $this->M_Mail->Get_where1($whereto2,'tb_user_login');
           
            $status_transaction = "ISIR QC Result $no_isir $status" ;
            $stat = array('stat' =>$status_transaction);
            $where2 = array('hdrid' =>$hdrid);
            $this->M_Mail->Update_Data($where2, $stat, 'tb_pcn');

            $post_data =array('status_transaction' => $status_transaction,'hdrid'=>$hdrid,'transaction_date'=>$currentDate,'nik'=>$data_isir->pic_pro,'name'=>$data_isir->pro_name,'department_code'=>'','department_name'=>'','office_email'=>$creator->office_email,'position_code'=>'','position_name'=>'','subject_email'=>$status_transaction,'body_content'=>"Remark : $data_isir->remark",'comment'=>'','cc_email'=>$cc_mail);
            $post_datamerge=array_merge($post_data,$post_data);   
            $where = array('trxid' => 0);        
            $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

        
        }
        
       
        // $this->M_approver->Update_Data_Approve();
         $data['update'] = "Succes Update $hdrid";
         $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }


    /// @see ajax_mail_qcr()
    /// @note Send email berdasarkan nik 
    /// @attention apabila sender qc maka kirim ke creator else kirim ke pic qc,cc to 1&2
    public function ajax_mail_qcr()
	{
        // Flow Email QCR menentukan badan email sesuai orang yang mengupdate data,apabila QC meloloskan QCR(Judgment OK) Maka akan mengirim notifikasi ke Creator QCR & mengirim email untuk approve ke Final Approver
        $hdrid = $this->input->post('hdrid');
        $reason = $this->input->post('reason');
        $sender = $this->input->post('sender');
        $currentDate = mdate('%Y-%m-%d',time()); 
        
        $where = array('hdrid' =>$hdrid);
        $data_qcr = $this->M_Mail->Get_where($where,'tb_qcr');

        if ($sender == $data_qcr->pic_qc || $sender == $data_qcr->cc_to1 || $sender == $data_qcr->cc_to2) {
            
            // Send notif email to Creator 
            $whereto1 = array('user_name' =>$data_qcr->nik);
            
            $status_transaction = "QCR Result $data_qcr->judgment" ;
            $stat = array('stat' =>$status_transaction);
            $where2 = array('hdrid' =>$reason);
            $this->M_Mail->Update_Data($where2,$stat , 'tb_pcn');

            $creator = $this->M_Mail->Get_where1($whereto1,'tb_user_login');
     
            // Email ready tinggal tampilan

            $post_data =array('status_transaction' => $status_transaction,'hdrid'=>$reason,'transaction_date'=>$currentDate,'nik'=>$data_qcr->nik,'name'=>$data_qcr->nama,'department_code'=>'','department_name'=>'','office_email'=>$creator->office_email,'position_code'=>'','position_name'=>'','subject_email'=> "QCR Result $hdrid $data_qcr->judgment" ,'body_content'=>"Remark : $data_qcr->remark_qa",'comment'=>'','cc_email'=>'');
            $post_datamerge=array_merge($post_data,$post_data);   
            $where = array('trxid' => 0);        
            $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

            if ($data_qcr->judgment == 'OK') {
                $next_app = $this->M_Mail->cari_tb_approver($reason);
                $next_app2 = $this->M_Mail->cari_tb_approver2($reason,$next_app->position_code);

                foreach ($next_app2 as $value) {
                    $post_data =array('status_transaction' => 'Need Approve','hdrid'=>$reason,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$value->nik,'name'=>$value->name,'department_code'=>$value->department_code,'department_name'=>$value->department_name,'office_email'=>$value->office_email,'position_code'=>$value->position_code,'position_name'=>$value->position_name,'subject_email'=>'Need Approve','body_content'=>'Please click link below and approve','comment'=>'','cc_email'=>'');
                    $post_datamerge=array_merge($post_data,$post_data);   
                    $where = array('trxid' => 0);        
                    $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
                };
            }


        } else {

            // Sender selain qc == creator maka send email to pic qc,cc_to1,cc_to2
            $whereto1 = array('user_name' =>$data_qcr->cc_to1);
            $whereto2 = array('user_name' =>$data_qcr->cc_to2);
            $whereto3 = array('user_name' =>$data_qcr->pic_qc);
            
            $status_transaction = "On Progress $hdrid";
            $stat = array('stat' =>$status_transaction);
            $where2 = array('hdrid' =>$reason);
            $this->M_Mail->Update_Data($where2,$stat , 'tb_pcn');

            $cc_to1 = $this->M_Mail->Get_where1($whereto1,'tb_user_login');
            $cc_to2 = $this->M_Mail->Get_where1($whereto2,'tb_user_login');
            $pic_qc = $this->M_Mail->Get_where1($whereto3,'tb_user_login');
            $cc_mail= $cc_to1->office_email.';'.$cc_to2->office_email;
            
            $post_data =array('status_transaction' => $status_transaction,'hdrid'=>$reason,'transaction_date'=>$currentDate,'nik'=>$data_qcr->pic_qc,'name'=>$pic_qc->name,'department_code'=>'','department_name'=>'','office_email'=>$pic_qc->office_email,'position_code'=>'','position_name'=>'','subject_email'=>"Request Measure $hdrid",'body_content'=>"Remark : $data_qcr->remark_qa",'comment'=>'','cc_email'=>$cc_mail);
            $post_datamerge=array_merge($post_data,$post_data);   
            $where = array('trxid' => 0);        
            $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
            

        }
        
       
        // $this->M_approver->Update_Data_Approve();
         $data['update'] = "Succes Update $hdrid";
         $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    ///@see ajax_back()
    ///@note Send email to creator ISIR / QCR
    ///@attention Send email from button send back on isir/qcrs
    public function ajax_back()
    {
        //Flow Send Back ISIR/QCR QC send back by button, system send email to Creator ISIR/QCR    
        $hdrid=$this->input->post('hdrid'); // Kalau page ISIR maka value no pcn kalau page QCR value no qcr
        $no_isir=$this->input->post('no_isir'); // Kalau page ISIR maka value no isir kalau page QCR value no pcn
        $mode=$this->input->post('page'); // Menentukan request dari page mana
        $sender=$this->input->post('sender');
        $reason=$this->input->post('reason');
        $currentDate = mdate('%Y-%m-%d',time()); 
        $where = array('hdrid' =>$hdrid);

        if ($mode == 'ISIR') {

            $data1 = $this->M_Mail->get_where($where,'tb_isir');
            $status_transaction="ISIR Send Back By:$sender With Reason:$reason";
            $subject ="Send Back ISIR $no_isir";
            $where1 = array('user_name' =>$data1->pic_pro);
            $requester = $this->M_Mail->Get_where1($where1,'tb_user_login');
            $key = $data1->hdrid;

        }else if($mode == 'QCR'){

            $data1 = $this->M_Mail->get_where($where,'tb_qcr');
            $status_transaction="QCR Send Back By:$sender With Reason:$reason";
            $subject ="Send Back $hdrid";
            $where2 = array('user_name' =>$data1->nik);
            $requester = $this->M_Mail->Get_where1($where2,'tb_user_login');
            $key = $data1->reason;
        }

        $post_data =array('status_transaction'=>$status_transaction,'hdrid'=>$key,'transaction_date'=>$currentDate,'nik'=>$requester->user_name,'name'=>$requester->name,'department_code'=>$requester->kode_department,'department_name'=>$requester->department_name,'office_email'=>$requester->office_email,'position_code'=>'','position_name'=>'','subject_email'=>$subject,'body_content'=>$status_transaction,'comment'=>'','cc_email'=>'');
        $post_datamerge=array_merge($post_data,$post_data);   
        $where = array('trxid' => 0);        
        $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

        $data['status'] ="Success Send Back";
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    ///@see ajax_received()
    ///@note Send email to creator ISIR / QCR
    ///@attention Send email from button received on isir/qcrs
    public function ajax_received()
    {
        //Flow Received ISIR/QCR QC Received by button, system send email to Creator ISIR/QCR    
        $hdrid=$this->input->post('hdrid'); // Kalau page ISIR maka value no pcn kalau page QCR value no qcr
        $no_isir=$this->input->post('no_isir'); // Kalau page ISIR maka value no isir kalau page QCR value no pcn
        $mode=$this->input->post('page'); // Menentukan request dari page mana
        $sender=$this->input->post('sender');
        $reason=$this->input->post('reason');
        $currentDate = mdate('%Y-%m-%d',time()); 
        $where = array('hdrid' =>$hdrid);

        if ($mode == 'ISIR') {

            $data1 = $this->M_Mail->get_where($where,'tb_isir');
            $status_transaction="ISIR Received By:$sender With Comment:$reason";
            $subject ="ISIR $no_isir Received";
            $where1 = array('user_name' =>$data1->pic_pro);
            $requester = $this->M_Mail->Get_where1($where1,'tb_user_login');
            $key = $data1->hdrid;

        }else if($mode == 'QCR'){

            $data1 = $this->M_Mail->get_where($where,'tb_qcr');
            $status_transaction="QCR Received By:$sender With Comment:$reason";
            $subject ="$hdrid Received";
            $where2 = array('user_name' =>$data1->nik);
            $requester = $this->M_Mail->Get_where1($where2,'tb_user_login');
            $key = $data1->reason;
        }

        
        $post_data =array('status_transaction'=>$status_transaction,'hdrid'=>$key,'transaction_date'=>$currentDate,'nik'=>$requester->user_name,'name'=>$requester->name,'department_code'=>$requester->kode_department,'department_name'=>$requester->department_name,'office_email'=>$requester->office_email,'position_code'=>'','position_name'=>'','subject_email'=>$subject,'body_content'=>$status_transaction,'comment'=>'','cc_email'=>'');
        $post_datamerge=array_merge($post_data,$post_data);   
        $where = array('trxid' => 0);        
        $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
        
        $data['status'] ="Success Received";
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


    
}
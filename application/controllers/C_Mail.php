<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Mail extends CI_Controller {

    /// @see construct()
    /// @note function yang otomatis akan dijalankan saat class diinstansiasi
    /// @attention
    public function __construct() {

        parent:: __construct();
    
        $this->load->model('M_Mail');
        $this->load->model('M_application');
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
    /// @note Fungsi untuk mengirim email ke approver selanjutnya  ketika di approve 
    /// @attention
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
        $update_stat=$this->M_Mail->Update_stat($hdrid,$currentDate);

        //Update date_change untuk reminder approval
        $condition = array('hdrid' => $hdrid);        
        $data = array('status_transaction_date_change' =>$currentDate );
        $status_email = $this->M_Mail->Update_Data($condition, $data, 'tb_pcn');
 
        $next_app = $this->M_Mail->cari_tb_approver($hdrid);
        if ($next_app->name!='All') {
            $next_app2 = $this->M_Mail->cari_tb_approver2($hdrid,$next_app->position_code);
        }
        // $all_app = $this->M_Mail->cari_all_approver($hdrid,$next_app->position_code);
     

        // Send email notifikasi approve ke next approver
        if ($next_app->name=='All') {

          // Send email notifikasi rejected ke user(Procurement requester pcn) Not Active
          $requester = $this->M_Mail->cari_requester($nikreq);
          $status_transaction = "PCN Complete" ;
          $post_data =array('status_transaction' => 'PCN Complete','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$requester->nik_superiorprocurement	,'name'=>$requester->name_superiorprocurement,'department_code'=>$requester->kode_section_superiorprocurement,'department_name'=>$requester->name_section_superiorprocurement,'office_email'=>$requester->email_superiorprocurement,'position_code'=>'','position_name'=>'','subject_email'=>'PCN Complete','body_content'=>$status_transaction,'comment'=>'','cc_email'=>'');
          $post_datamerge=array_merge($post_data,$post_data);   
          $where = array('trxid' => 0);        
          $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

        }else {

            // Selain poscode 4 send email karena position 4 akan aktif setelah application response selesai
         if ($next_app->position_name =='Written QA') {
                                                                                                                                
            // Send email ke responden application response
                $list_res = $this->M_Mail->cari_responden($hdrid)->row();
                $list_name = $this->M_Mail->cari_name($hdrid)->row();
                $list_mem = $this->M_application->cari_member($product)->row();
                //CC Member
                $cc_member = $list_mem->PE_1.$list_mem->PE_2.$list_mem->PE_3.$list_mem->QC_1.$list_mem->QC_2.$list_mem->QC_3.$list_mem->MFG_1.$list_mem->MFG_2.$list_mem->MFG_3.$list_mem->PC_1.$list_res->PC_2.$list_res->PC_3.$list_res->QA_1.$list_res->QA_2.$list_res->QA_3;
                //CC 5 Divisi
                $cc_email = $list_res->qc_inspection_departement.';'.$list_res->pe_departement.';'.$list_res->mfg_departement.';'.$list_res->pc_departement.';'.$list_res->qa_departement;
                //Name 5 responden
                $name = $list_name->qc_name.','.$list_name->pe_name.','.$list_name->mfg_name.','.$list_name->pc_name.','.$list_name->qa_name;
               
                $post_data =array('status_transaction' => 'Need Your Response','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>'','name'=>$name,'department_code'=>'','department_name'=>'','office_email'=>$list_res->creator,'position_code'=>'','position_name'=>'','subject_email'=>'Need Your Response to Application Response','body_content'=>'','comment'=>'','cc_email'=>$cc_email.';'.$cc_member);
                $post_datamerge=array_merge($post_data,$post_data);   
                $where = array('trxid' => 0);        
                $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

            }else if ($next_app->position_name =='Written Proc Final') {
            
                // Should be insert data t1-t10 isir and send email to procurement,qa
                $requester = $this->M_Mail->cari_requester($nikreq);
                $list_res = $this->M_Mail->insert_isir($hdrid,$requester->nik_superiorprocurement);
                $post_data =array('status_transaction' => 'ISIR Ready To Attach','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$requester->nik_superiorprocurement	,'name'=>$requester->name_superiorprocurement,'department_code'=>$requester->kode_section_superiorprocurement,'department_name'=>$requester->name_section_superiorprocurement,'office_email'=>$requester->email_superiorprocurement,'position_code'=>'','position_name'=>'','subject_email'=>'ISIR Neeed Attach','body_content'=>'ISIR Neeed Attach','comment'=>'','cc_email'=>'');
                $post_datamerge=array_merge($post_data,$post_data);   
                $where = array('trxid' => 0);        
                $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

            }else {

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
    /// @note Send email berdasarkan sender procurement/qc 
    /// @attention
    public function ajax_mail_isir()
	{
        $hdrid = $this->input->post('hdrid');
        $no_isir = $this->input->post('no_isir');
        $sender = $this->input->post('sender');
        
        $where = array('hdrid' =>$hdrid , 'no_isir'=>$no_isir);
        $data_isir = $this->M_Mail->Get_where($where,'tb_isir');

        var_dump($data_isir);
        // if () {

        // } else {

        // }
        
       
        // $this->M_approver->Update_Data_Approve();
         $data['update'] = "Succes Update $hdrid";
         $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    
}
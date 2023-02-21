<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Mail extends CI_Controller {

    /// @see construct()
    /// @note function yang otomatis akan dijalankan saat class diinstansiasi
    /// @attention
    public function __construct() {

        parent:: __construct();
    
        $this->load->model('M_Mail');
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
        
        date_default_timezone_set('Asia/Jakarta');
        $currentDate=mdate('%Y-%m-%d',time());
        $update_stat=$this->M_Mail->Update_stat($hdrid,$currentDate);
 
        $next_app = $this->M_Mail->cari_tb_approver($hdrid);
        $next_app2 = $this->M_Mail->cari_tb_approver2($hdrid,$next_app->position_code);
        // $all_app = $this->M_Mail->cari_all_approver($hdrid,$next_app->position_code);
        var_dump($next_app2);
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
         if ($next_app->position_code !='4') {
          foreach ($next_app2 as $value) {
            $post_data =array('status_transaction' => 'Need Approve','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$value->nik,'name'=>$value->name,'department_code'=>$value->department_code,'department_name'=>$value->department_name,'office_email'=>$value->office_email,'position_code'=>$value->position_code,'position_name'=>$value->position_name,'subject_email'=>'Need Approve','body_content'=>'Please click link below and approve','comment'=>'','cc_email'=>'');
            $post_datamerge=array_merge($post_data,$post_data);   
            $where = array('trxid' => 0);        
            $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
          };
          
          }else {

            // Send email ke responden application response
            $list_res = $this->M_Mail->cari_responden($hdrid)->row();
            $cc_email = $list_res->qc_inspection_departement.';'.$list_res->pe_departement.';'.$list_res->mfg_departement.';'.$list_res->pc_departement.';'.$list_res->qa_departement;
            $post_data =array('status_transaction' => 'Need Your Response','hdrid'=>$pcn_number,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>'','name'=>'','department_code'=>'','department_name'=>'','office_email'=>$list_res->creator,'position_code'=>'','position_name'=>'','subject_email'=>'Need Your Response to Application Response','body_content'=>'','comment'=>'','cc_email'=>$cc_email);
            $post_datamerge=array_merge($post_data,$post_data);   
            $where = array('trxid' => 0);        
            $status_email = $this->M_Mail->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

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

        // $requester= $this->M_Mail->cari_requester($nik);//kondisi untuk mencari requester 
        
        $requester= $this->M_Mail->cari_requester($nikreq);//kondisi untuk mencari requester 
        // ********************* 1.Update tb_approval date= null (where hdrid) *********************
        $post_data = array('date_approve' => NULL);   
        $post_datamerge=array_merge($post_data,$post_data);  
        $where = array('hdrid' => $hdrid);        
        $this->M_Mail->Update_Data($where,$post_datamerge,'tb_approval');
    
        // *********************  2.Update status transaksi(Rejected by .. with reason ...)   *********************
        $status_transaction = "Rejected By:".$rejected_by." With Reason: ".$reason ;

        if (substr($hdrid,0,3)=='ADV'){
            $post_data = array('status'=>'Add adv','status_transaction' => $status_transaction,'date_rejected' => mdate('%Y-%m-%d %h:%i:%s',time()),'status_transaction_date_change' => $tanggal_sekarang);   
        }else{
            $post_data = array('status'=>'Add pc','status_transaction' => $status_transaction,'date_rejected' => mdate('%Y-%m-%d %h:%i:%s',time()),'status_transaction_date_change' =>  mdate('%Y-%m-%d %h:%i:%s',time()));   
        }

        $post_datamerge=array_merge($post_data,$post_data);

        if (substr($hdrid,0,3)=='ADV'){
            $where = array('hdrid' => $hdrid);   
        }else{
            $where = array('hdrid_pc' => $hdrid); 
        }

        $this->M_Mail->Update_Data($where,$post_datamerge,'tb_add_advance3');

        // *********************   3.Cari Creator  *********************

        // *********************   4.Update tb_mail_trigger  *********************

        $post_data =array('status_transaction' => $status_transaction,'hdrid'=>$hdrid,'transaction_date'=>$currentDate,'nik'=>$requester->nik,'name'=>$requester->name,'department_code'=>$requester->kode_setion,'department_name'=>$requester->name_section,'office_email'=>$requester->office_email,'position_code'=>'','position_name'=>'requester','subject_email'=>'Rejected','body_content'=>'Rejected','comment'=>$status_transaction,'cc_email'=>''); 
        $post_datamerge=array_merge($post_data,$post_data);
        $where = array('trxid' => 0);        
        $this->M_Mail->Update_Data($where,$post_datamerge,'tb_mail_trigger');
        $data['status']="berhasil update";

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    
}
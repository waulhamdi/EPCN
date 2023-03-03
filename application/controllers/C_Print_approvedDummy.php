<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_Print_approvedDummy extends CI_Controller
{
        ///@see __construct()
     ///@note fungsi digunakan untuk username
     ///@attention
    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('user_name') == "") {
        //     redirect('Auth');
        // }

        $this->load->model ('m_printDummy'); //connect ke m_printDummy
        $this->load->model('M_progress');//connect ke M_progess
        $this->load->model('UserModel');//connect ke UserModel
        $this->load->model('M_approver');//connect ke M_approver

        
    }

    ///@see index()
     ///@note fungsi untuk view print
     ///@attention
    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        // $this->load->view('templates/header'); //Tampil header
        // $this->load->view('templates/sidebar'); //Tampil Sidebar
        // $this->load->view('templates/footer'); // Tampil footer
        $this->load->view('Print/v_print', $data);
    }

        ///@see ajax_getbyhdrid()
     ///@note fungsi untuk code hdrid ditarik ke web
     ///@attention
    function ajax_getbyhdrid()
    {

        $hdrid = $this->input->get('hdrid'); //data dari hdrid
        $data = $this->m_printDummy->ajax_getbyhdrid($hdrid, 'tb_PCN')->row();//ajax data ambil data dari tabel
        echo json_encode($data);
    }

    ///@see print_show()
     ///@note fungsi untuk menampilkan hasil print
     ///@attention
    function print_show()
    {
        $hdrid = $this->input->get('var1');
        $test = $data['tb_input_problem'] = $this->m_printDummy->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();//ajax data ambil data dari tabel
        // error_reporting(0);
        $var1 = $test->problem_name;
        // var_dump($var1);
        // die;

        if ($var1 == 'internal') {
            $this->print_report1();
        } else if ($var1 == 'external') {
            $this->print_report1();
        } else {
            echo $msg = "Data Tidak Valid";
        }
        
    }
    
    ///@see print_show2()
     ///@note fungsi untuk menampilkan hasil print
     ///@attention
    function print_show2()
    {
        $hdrid = $this->input->get('var1');
        $test = $data['tb_input_problem'] = $this->m_printDummy->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();//ajax data ambil data dari tabel
        // error_reporting(0);
        $var1 = $test->problem_name;
        // var_dump($var1);
        // die;

        if ($var1 == 'internal') {
            $this->print_report2();
        } else if ($var1 == 'external') {
            $this->print_report2();
        } else {
            echo $msg = "Data Tidak Valid";
        }
    }

    
    ///@see print_report()
     ///@note fungsi untuk report hasil print ingin diprint
     ///@attention
    function print_report1()
    {
        $hdrid = $this->input->get('var1'); //print hasil dari hdrid
        $app = $this->input->get('var1'); //print hasil dari fungsi app
        $data['username'] = $this->session->userdata('username');//username masuk print
        $data['tb_input_problem'] = $this->m_printDummy->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();//print hasil dari tb_input_problem
        $data['tb_response'] = $this->m_printDummy->ajax_getbyhdrid($hdrid, 'tb_response')->row();//print hasil dari tb_response
        $data['tb_approval'] = $this->m_printDummy->ajax_getbyproblemid($app, 'tb_approval')->row();//print hasil dari tb_approval
        $data['tb_effectiveness'] = $this->m_printDummy->ajax_getbyhdrid($hdrid, 'tb_input_effectiveness')->row();//print hasil dari tb_input_effectiveness
        $data['array_approval'] = $this->m_printDummy->getApproval($hdrid);       //print hasil dari array_approval
        $this->load->view('Print/v_print_approved', $data); //hasil print di view

    }

    ///@see print_report2()
     ///@note fungsi untuk report hasil print ingin diprint
     ///@attention
    function print_report2()
    {
        $hdrid = $this->input->get('var1'); //print hasil dari hdrid
        $app = $this->input->get('var1'); //print hasil dari fungsi app
        $data['username'] = $this->session->userdata('username');//username masuk print
        $data['tb_input_problem'] = $this->m_printDummy->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();//print hasil dari tb_input_problem
        $data['tb_response'] = $this->m_printDummy->ajax_getbyhdrid($hdrid, 'tb_response')->row();//print hasil dari tb_response
        $data['tb_approval'] = $this->m_printDummy->ajax_getbyproblemid($app, 'tb_approval')->row();//print hasil dari tb_approval
        $data['tb_effectiveness'] = $this->m_printDummy->ajax_getbyhdrid($hdrid, 'tb_input_effectiveness')->row();//print hasil dari tb_input_effectiveness
        $data['array_approval'] = $this->m_printDummy->getApproval($hdrid);       //print hasil dari array_approval
        // var_dump($dt);

        // $data['tb_pc'] = $this->m_printDummy->ajax_getbyhdrid($hdrid,'tb_response')->row();
        // // $data['tb_pe'] = $this->m_printDummy->ajax_getbyhdrid($hdrid,'tb_approval')->row();
        // $data['tb_qa'] = $this->m_printDummy->ajax_getbyhdrid($hdrid,'tb_input_effectiveness')->row();

        $this->load->view('Print/v_print2', $data);//hasil print di view

    }

    ///@see print_report2_approved()
     ///@note fungsi untuk report hasil print ingin diprint
     ///@attention
    function print_report2_approved()
    {
        
        $hdrid = $this->input->get('var1');     //hdrid
        $no_dokumen = $this->input->get('var1');     //hdrid
        $problem_id = $this->input->get('var1');     //hdrid
        // $app = $this->input->get('var1');       //hdrid
        // $userid = $this->input->get('var2');    //nik
        // $name = $this->input->get('var3');      //name
         
        // $data['username'] = $this->session->userdata('username');

        $data['tb_PCN'] = $this->m_printDummy->ajax_getbyhdrid($hdrid, 'tb_PCN')->row();
        $data['tb_PCNlist'] = $this->m_printDummy->ajax_getbyno_dokumen($no_dokumen, 'tb_PCNlist')->row();
        $data['tb_approval'] = $this->m_printDummy->ajax_getbyproblem_id($problem_id, 'tb_approval')->result();
        $data['tb_isir'] = $this->m_printDummy->ajax_getTbIsir($hdrid);
        $data['tb_qcr'] = $this->m_printDummy->ajax_getQCR($no_dokumen, 'tb_QCR')->row();
        // var_dump($data['tb_qcr']);
        $data['tb_application'] = $this->m_printDummy->ajax_getbypcn_number($hdrid, 'tb_application')->row();
        
        $data['status_isir'] = $this->m_printDummy->ajax_getStatusIsir($hdrid);
        
        $data['written_proc'] = $this->m_printDummy->getListWrittenProc($hdrid);            // position_name writte qa
        $data['checked_proc'] = $this->m_printDummy->getListCheckedProc($hdrid);            // position_name checked qa
        $data['checked2_proc'] = $this->m_printDummy->getListChecked2Proc($hdrid);          // position_name checked2 qa
        $data['approve_proc'] = $this->m_printDummy->getListApproveProc($hdrid);            // position_name approve qa
        $data['written_qa'] = $this->m_printDummy->getListWrittenQA($hdrid);                // position_name written qa
        $data['checked_qa'] = $this->m_printDummy->getListCheckedQA($hdrid);                // position_name checked qa
        $data['approve_qa'] = $this->m_printDummy->getListApproveQA($hdrid);                // position_name approve qa
        $data['final_written_qa'] = $this->m_printDummy->getListFinalWrittenQA($hdrid);     // position_name final written qa
        $data['final_checked_qa'] = $this->m_printDummy->getListFinalCheckedQA($hdrid);     // position_name final checked qa
        $data['final_approve_qa'] = $this->m_printDummy->getListFinalApproveQA($hdrid);     // position_name final approve qa
        
        $data['final_approve'] = $this->m_printDummy->getFinalApprove($hdrid);              // position_code =>10
        // var_dump($data['final_approve']);
        
        if($data['tb_PCN'] == null){
            $data['nik'] = null;
        }else{
            $data['nik'] = $this->m_printDummy->cari_tb_approver($hdrid);//print hasil dari nik
        }


        // Approver
        // $data['userid'] = $userid ;
        $data['hdrid'] = $hdrid ;
        // $data['name'] = $name ;

        $this->load->view('Print/v_print_approvedDummy', $data);//hasil print di view

    }

        ///@see ajax_login()
     ///@note fungsi untuk user login untuk print data tersebut
     ///@attention
    function ajax_login()
    {

        $data['status'] = "NG";
        $username = str_replace(' ', '', $this->input->post('username')); //username
        $password = str_replace(' ', '', $this->input->post('password')); //password
        $password = md5($password);
       
        $user = $this->UserModel->get($username); // Ambil dari database central
        $email= $this->UserModel->getemployeedetail($username); // Ambil dari database HRSS

        if(empty($user)){ // Jika hasilnya kosong atau user ID tidak ditemukan
            $data['status'] = "NG User ID tidak ditemukan"; //User ID tidak ditemukan
        }else{
             if($password == $user->password){
                 $data['status'] = "OK";
                 $session = array(
                    'authenticated'=>true, // Buat session authenticated dengan value true      
                    // Ambil dari database central
                    'user_name'=>$user->user_name, // Buat session nama          
                    'nama'=>$user->name, // Buat session nama
                    'dept_id'=>$user->kode_department, // Buat session nama                   
                    'email'=>$email->email, // Buat session role
                    'officeemail'=>$email->office_email
                    );
                 $this->session->set_userdata($session); // Buat session sesuai $session
             }else{
                 $data['status'] = "NG password salah"; //Password salah
             }
        }
      
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

        ///@see ajax_approve()
     ///@note fungsi untuk approve sebuah print
     ///@attention
    function ajax_approve()
    {
        date_default_timezone_set('Asia/Jakarta'); // Set timezone
        $date = mdate('%Y-%m-%d %h:%i:%s', time());
        $reason = $this->input->post('reason');//reason approve
        
        $name = str_replace(' ', '', $this->input->post('name'));//name
        $problem_id = str_replace(' ', '', $this->input->post('problem_id'));//problem_id
        $position = str_replace(' ', '', $this->input->post('position_code'));//position
        $position_name = str_replace(' ', '', $this->input->post('position_name'));//position name

        // current  date
        $data = array(
            'name' => $name, 
            'date_approve' => $date, 
            'problem_id' => $problem_id,
            'position' => $position,
            'position_name' => $position_name,
            'reason' => $reason,
        );

        // Update data
        $status_transaction = $this->M_approver->Update_Data_Approve($data); //status approve function
     
         $data['status'] =  $status_transaction; //status
         $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    
        ///@see ajax_reject()
     ///@note fungsi untuk reject sebuah print
     ///@attention
    function ajax_reject()
    {

        $rejected_by = str_replace(' ', '', $this->input->post('rejected_by')); //function rejected_by
        $hdrid = $this->input->post('hdrid');//hdrid reject
        $reason = $this->input->post('reason');//reason reject
       
        // current  date
        $status_reject = "Rejected By:".$rejected_by." With Reason: ".$reason;
        $data = array('rejected_by' => $rejected_by, 'reason' => $reason, 'date_rejected' => mdate('%Y-%m-%d %h:%i:%s', time()),'status_transaction' => $status_reject);
      
        // Where condition
        $where = array('hdrid' => $hdrid);

        // Update data tb_input_problem
        $this->M_approver->Update_Data($where, $data, 'tb_input_problem'); //update sudah approved di tb_input_problem
       
        $data['status'] = 'Berhasil direject'; //status berhasil reject

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }     

    public function get_date()
    {
        $date = $this->db->get('tb_PCN')->row()->trial_manufacturing;
        $month = date('m',strtotime($date));
        $this->load->view('v_print_approvedDummy',$month);
    }

    ///@see ajax_update_answersheet()
    ///@note input data anwersheet ke tb_PCN
    ///@attention form input section QA pada A4
    public function ajax_update_answersheet()
	{

         // ********************* 1. Collect data post *********************
        $hdrid=$this->input->post('hdrid');
        $post_data = $this->input->post();
        $audit_date = $this->input->post('date_audit');
        $sample_duedate = $this->input->post('sample_duedate');
        
        // *********************  where audit date *********************
        if ($audit_date=='') {
            $post_audit_date = array('date_audit' => NULL);
        } else {
            $post_audit_date = array('date_audit' => $audit_date);
        }

        // *********************  where sample duedate *********************
        if ($sample_duedate=='') {
            $post_sample_duedate = array('sample_duedate' => NULL);
        } else {
            $post_sample_duedate = array('sample_duedate' => $sample_duedate);
        }
        
        // *********************  Merge data All post *********************
        $post_datamerge=array_merge($post_data,$post_audit_date,$post_sample_duedate);

        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);        
        $this->m_printDummy->Update_Data($where,$post_datamerge,'tb_PCN');
        
        // **********************  message ************************  
        $msg = "Answer Sheet Success";
        $data['status']=$msg;

        // return value array to javascript
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    // public function proggressbar()
    // {
    //     $databar['data_bar'] = $this->m_printDummy->get_proggress();
    //     $this->load->view('v_print_approvedDummy',$databar);
    // }


}

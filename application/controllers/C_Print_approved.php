<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_Print_approved extends CI_Controller
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

        $this->load->model('m_print'); //connect ke m_print
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
        $data = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();//ajax data ambil data dari tabel
        echo json_encode($data);
    }

    ///@see print_show()
     ///@note fungsi untuk menampilkan hasil print
     ///@attention
    function print_show()
    {
        $hdrid = $this->input->get('var1');
        $test = $data['tb_input_problem'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();//ajax data ambil data dari tabel
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
        $test = $data['tb_input_problem'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();//ajax data ambil data dari tabel
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
        $data['tb_input_problem'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();//print hasil dari tb_input_problem
        $data['tb_response'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_response')->row();//print hasil dari tb_response
        $data['tb_approval'] = $this->m_print->ajax_getbyproblemid($app, 'tb_approval')->row();//print hasil dari tb_approval
        $data['tb_effectiveness'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_effectiveness')->row();//print hasil dari tb_input_effectiveness
        $data['array_approval'] = $this->m_print->getApproval($hdrid);       //print hasil dari array_approval
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
        $data['tb_input_problem'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();//print hasil dari tb_input_problem
        $data['tb_response'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_response')->row();//print hasil dari tb_response
        $data['tb_approval'] = $this->m_print->ajax_getbyproblemid($app, 'tb_approval')->row();//print hasil dari tb_approval
        $data['tb_effectiveness'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_effectiveness')->row();//print hasil dari tb_input_effectiveness
        $data['array_approval'] = $this->m_print->getApproval($hdrid);       //print hasil dari array_approval
        // var_dump($dt);

        // $data['tb_pc'] = $this->m_print->ajax_getbyhdrid($hdrid,'tb_response')->row();
        // // $data['tb_pe'] = $this->m_print->ajax_getbyhdrid($hdrid,'tb_approval')->row();
        // $data['tb_qa'] = $this->m_print->ajax_getbyhdrid($hdrid,'tb_input_effectiveness')->row();

        $this->load->view('Print/v_print2', $data);//hasil print di view

    }

    ///@see print_report2_approved()
     ///@note fungsi untuk report hasil print ingin diprint
     ///@attention
    function print_report2_approved()
    {
        
        $hdrid = $this->input->get('var1');     //hdrid
        // $app = $this->input->get('var1');       //hdrid
        // $userid = $this->input->get('var2');    //nik
        // $name = $this->input->get('var3');      //name
         
        // $data['username'] = $this->session->userdata('username');

        $data['tb_PCN'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_PCN')->row();
        $data['list'] = $this->m_print->getPCN($hdrid);
        // $data['tb_response'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_response')->row();//print hasil dari tb_response
        // $data['tb_approval'] = $this->m_print->ajax_getbyproblemid($app, 'tb_approval')->row();//print hasil dari tb_approval

        // $data['tb_approval_name'] = $this->m_print->getname_aprover($hdrid);//print hasil dari tb_approval_name
       
        // $data['tb_effectiveness'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_effectiveness')->row();//print hasil dari tb_effectiveness
        // $data['array_approval'] = $this->m_print->getApproval($hdrid);//print hasil dari array_approval
        // $data['nik'] = $this->m_print->cari_tb_approver($hdrid);//print hasil dari nik

        // Approver
        // $data['userid'] = $userid ;
        // $data['hdrid'] = $hdrid ;
        // $data['name'] = $name ;

        $this->load->view('Print/v_print_approved', $data);//hasil print di view

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

        $nik = str_replace(' ', '', $this->input->post('nik')); //nik approve
        $name = str_replace(' ', '', $this->input->post('name')); //name approve
        $problem_id = str_replace(' ', '', $this->input->post('problem_id'));//problem_id
        $position = str_replace(' ', '', $this->input->post('position'));//position

        // current  date
        $data3 = array('date_approve' => mdate('%Y-%m-%d %H:%i:%s', time()));
        $data2 = array('nik' => $nik, 'name' => $name, 'date_approve' => mdate('%Y-%m-%d %h:%i:%s', time()));

        // Where condition
        $where = array(
            'nik' => $nik,
            'problem_id' => $problem_id
        );

        // Update data
        // $this->M_approver->Update_Data_Approve($where, $data2, 'tb_approval',$problem_id);
         $status_transaction=$this->M_approver->Update_Data_Approve($where, $data2, 'tb_approval',$problem_id); //status approve function
     
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


}

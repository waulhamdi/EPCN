<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_PrintA4_isir extends CI_Controller
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

        $this->load->model('m_printA4_isir'); //connect ke m_printA4_isir
        $this->load->model('M_progress'); //connect ke M_progess
        $this->load->model('UserModel'); //connect ke UserModel
        $this->load->model('M_approver'); //connect ke M_approver


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
        $data = $this->m_printA4_isir->ajax_getbyhdrid($hdrid, 'tb_PCN')->row(); //ajax data ambil data dari tabel
        echo json_encode($data);
    }


    ///@see print_report2_approved()
    ///@note fungsi untuk report hasil print ingin diprint
    ///@attention
    function print_report2_approved()
    {
        $data['Number'] = '';
        if (isset($_GET['Number'])) {
            $data['Number'] = $_GET['Number'];
        }

        $hdrid = $this->input->get('Number'); //hdrid
        $no_dokumen = $this->input->get('Number'); //hdrid
        $problem_id = $this->input->get('Number'); //hdrid
        // var_dump($hdrid);

        // $data['username'] = $this->session->userdata('username');

        $data['tb_PCN'] = $this->m_printA4_isir->ajax_getbyhdrid($hdrid, 'tb_PCN')->row();
        $data['tb_PCNlist'] = $this->m_printA4_isir->ajax_getbyno_dokumen($no_dokumen, 'tb_PCNlist')->row();
        $data['tb_isir'] = $this->m_printA4_isir->ajax_getTbIsir($hdrid);
        // var_dump($data['tb_isir']);
        $data['tb_application'] = $this->m_printA4_isir->ajax_getbypcn_number($hdrid, 'tb_application')->row();


        $data['list_proc'] = $this->m_printA4_isir->getListProc($hdrid);
        $data['list_qa'] = $this->m_printA4_isir->getListQA($hdrid); //print hasil dari tb_response
        $data['list_final'] = $this->m_printA4_isir->getListFinal($hdrid); //print hasil dari tb_approval

        $data['final_approve'] = $this->m_printA4_isir->getFinalApprove($hdrid); //print hasil dari tb_approval_name
        // var_dump($data['final_approve']);


        // $data['tb_effectiveness'] = $this->m_printA4_isir->ajax_getbyhdrid($hdrid, 'tb_input_effectiveness')->row();//print hasil dari tb_effectiveness
        // $data['array_approval'] = $this->m_printA4_isir->getApproval($hdrid);//print hasil dari array_approval
        if ($data['tb_PCN'] == null) {
            $data['nik'] = null;
        } else {
            $data['nik'] = $this->m_printA4_isir->cari_tb_approver($hdrid); //print hasil dari nik
        }


        // Approver
        // $data['userid'] = $userid ;
        $data['hdrid'] = $hdrid;
        // $data['name'] = $name ;

        $this->load->view('Print/V_printA4_isir', $data); //hasil print di view

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
        $email = $this->UserModel->getemployeedetail($username); // Ambil dari database HRSS

        if (empty($user)) { // Jika hasilnya kosong atau user ID tidak ditemukan
            $data['status'] = "NG User ID tidak ditemukan"; //User ID tidak ditemukan
        } else {
            if ($password == $user->password) {
                $data['status'] = "OK";
                $session = array(
                    'authenticated' => true,
                    // Buat session authenticated dengan value true      
                    // Ambil dari database central
                    'user_name' => $user->user_name,
                    // Buat session nama          
                    'nama' => $user->name,
                    // Buat session nama
                    'dept_id' => $user->kode_department,
                    // Buat session nama                   
                    'email' => $email->email,
                    // Buat session role
                    'officeemail' => $email->office_email
                );
                $this->session->set_userdata($session); // Buat session sesuai $session
            } else {
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
        $reason = $this->input->post('reason'); //reason approve

        $name = str_replace(' ', '', $this->input->post('name')); //name
        $problem_id = str_replace(' ', '', $this->input->post('problem_id')); //problem_id
        $position = str_replace(' ', '', $this->input->post('position_code')); //position
        $position_name = str_replace(' ', '', $this->input->post('position_name')); //position name

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

        $data['status'] = $status_transaction; //status
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }


    ///@see ajax_reject()
    ///@note fungsi untuk reject sebuah print
    ///@attention
    function ajax_reject()
    {

        $rejected_by = str_replace(' ', '', $this->input->post('rejected_by')); //function rejected_by
        $hdrid = $this->input->post('hdrid'); //hdrid reject
        $reason = $this->input->post('reason'); //reason reject

        // current  date
        $status_reject = "Rejected By:" . $rejected_by . " With Reason: " . $reason;
        $data = array('rejected_by' => $rejected_by, 'reason' => $reason, 'date_rejected' => mdate('%Y-%m-%d %h:%i:%s', time()), 'status_transaction' => $status_reject);

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
        $month = date('m', strtotime($date));
        $this->load->view('V_printA4_isir', $month);
    }

    ///@see ajax_update_answersheet()
    ///@note input data anwersheet ke tb_PCN
    ///@attention form input section QA pada A4
    public function ajax_update_answersheet()
    {

        // ********************* 1. Collect data post *********************
        $hdrid = $this->input->post('hdrid');
        $post_data = $this->input->post();
        $audit_date = $this->input->post('date_audit');
        $sample_duedate = $this->input->post('sample_duedate');

        // *********************  where audit date *********************
        if ($audit_date == '') {
            $post_audit_date = array('date_audit' => NULL);
        } else {
            $post_audit_date = array('date_audit' => $audit_date);
        }

        // *********************  where sample duedate *********************
        if ($sample_duedate == '') {
            $post_sample_duedate = array('sample_duedate' => NULL);
        } else {
            $post_sample_duedate = array('sample_duedate' => $sample_duedate);
        }

        // *********************  Merge data All post *********************
        $post_datamerge = array_merge($post_data, $post_audit_date, $post_sample_duedate);

        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);
        $this->m_printA4_isir->Update_Data($where, $post_datamerge, 'tb_PCN');

        // **********************  message ************************  
        $msg = "Answer Sheet Success";
        $data['status'] = $msg;

        // return value array to javascript
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

// public function proggressbar()
// {
//     $databar['data_bar'] = $this->m_printA4_isir->get_proggress();
//     $this->load->view('V_printA4_isir',$databar);
// }


}
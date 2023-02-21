<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_Print extends CI_Controller
{
    ///@see __construct()
     ///@note fungsi digunakan untuk username
     ///@attention
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('user_name') == "") {
            redirect('Auth');
        }
        $this->load->model('m_print');
        $this->load->model('M_progress');
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

    function ajax_getbyhdrid()
    {

        $hdrid = $this->input->get('hdrid');
        $data = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();
        echo json_encode($data);
    }

    function print_show()
    {
        $hdrid = $this->input->get('var1');
        $test = $data['tb_input_problem'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();
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
    function print_show2()
    {
        $hdrid = $this->input->get('var1');
        $test = $data['tb_input_problem'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();
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

    function print_report1()
    {
        $hdrid = $this->input->get('var1');
        $app = $this->input->get('var1');
        $data['username'] = $this->session->userdata('username');
        $data['tb_input_problem'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();
        $data['tb_response'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_response')->row();
        $data['tb_approval'] = $this->m_print->ajax_getbyproblemid($app, 'tb_approval')->row();
        $data['tb_effectiveness'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_effectiveness')->row();
        $data['array_approval'] = $this->m_print->getApproval($hdrid);
        // var_dump($data);
        // $data['tb_pc'] = $this->m_print->ajax_getbyhdrid($hdrid,'tb_response')->row();
        // // $data['tb_pe'] = $this->m_print->ajax_getbyhdrid($hdrid,'tb_approval')->row();
        // $data['tb_qa'] = $this->m_print->ajax_getbyhdrid($hdrid,'tb_input_effectiveness')->row();


        $this->load->view('Print/v_print1', $data);
    }

    function print_report2()
    {
        $hdrid = $this->input->get('var1');
        $app = $this->input->get('var1');
        $data['username'] = $this->session->userdata('username');
        $data['tb_input_problem'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();
        $data['tb_response'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_response')->row();
        $data['tb_approval'] = $this->m_print->ajax_getbyproblemid($app, 'tb_approval')->row();
        $data['tb_effectiveness'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_effectiveness')->row();
        $data['array_approval'] = $this->m_print->getApproval($hdrid);
      
        $this->load->view('Print/v_print2', $data);
    }

    function print_report2_approved()
    {
        
        $hdrid = $this->input->get('var1');
        $app = $this->input->get('var1');
        $data['username'] = $this->session->userdata('username');
        $data['tb_input_problem'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();
        $data['tb_response'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_response')->row();
        $data['tb_approval'] = $this->m_print->ajax_getbyproblemid($app, 'tb_approval')->row();
        $data['tb_effectiveness'] = $this->m_print->ajax_getbyhdrid($hdrid, 'tb_input_effectiveness')->row();
        $data['array_approval'] = $this->m_print->getApproval($hdrid);
      
        $this->load->view('Print/v_print_approved', $data);
    }

}

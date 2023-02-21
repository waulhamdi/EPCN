<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 **/

     /** ---------------------------------------------- Employee----------------------------------------------**/

	 public function __construct(){
        parent::__construct();   

        if ($this->session->userdata('user_name')=="") {
			redirect('Auth');
		}

        $this->load->helper('date');
        $this->load->helper('file');        
        $this->load->model('M_Dashboard');
        // $this->load->library('encrypt');    
                  
      }




	public function Index()
	{
		
		

        if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
			
			
			/** -----------------------------Memanggil Function Dari Model-----------------------------------**/
			$data['group_product']=$this->M_Dashboard->get_data_group_product();
			$data['group_product_company']=$this->M_Dashboard->get_data_group_product_where('Company');
			$data['group_product_body']=$this->M_Dashboard->get_data_group_product_where('Body');
			$data['group_product_power_train']=$this->M_Dashboard->get_data_group_product_where('Power Train');
			$data['group_product_blower']=$this->M_Dashboard->get_data_group_product_where('Blower');
			$data['group_product_wiper_washer']=$this->M_Dashboard->get_data_group_product_where('Wiper Washer');
			$data['group_product_thermal']=$this->M_Dashboard->get_data_group_product_where('Thermal');

			$data['fiscal_years']=$this->M_Dashboard->get_data_fical_years();
			$data['fiscal_years_company']=$this->M_Dashboard->get_data_fical_years_where('Company');
			$data['fiscal_years_body']=$this->M_Dashboard->get_data_fical_years_where('Body');
			$data['fiscal_years_power_train']=$this->M_Dashboard->get_data_fical_years_where('Power Train');
			$data['fiscal_years_blower']=$this->M_Dashboard->get_data_fical_years_where('Blower');
			$data['fiscal_years_wiper_washer']=$this->M_Dashboard->get_data_fical_years_where('Wiper Washer');
			$data['fiscal_years_thermal']=$this->M_Dashboard->get_data_fical_years_where('Thermal');
			
			$data['no_claims']=$this->M_Dashboard->get_data_no_claim();
			$data['no_claims_company']=$this->M_Dashboard->get_data_no_claim_where('Company');
			$data['no_claims_body']=$this->M_Dashboard->get_data_no_claim_where('Body');
			$data['no_claims_power_train']=$this->M_Dashboard->get_data_no_claim_where('Power Train');
			$data['no_claims_blower']=$this->M_Dashboard->get_data_no_claim_where('Blower');
			$data['no_claims_wiper_washer']=$this->M_Dashboard->get_data_no_claim_where('Wiper Washer');
			$data['no_claims_thermal']=$this->M_Dashboard->get_data_no_claim_where('Thermal');
			
			$data['calendar_no_claims']=$this->M_Dashboard->get_data_no_claim_calendar();
			$data['calendar_no_claims2']=$this->M_Dashboard->get_data_no_claim_calendar_v2();

			$data['get_data_case']=$this->M_Dashboard->get_data_case();
			$data['get_data_case_by_fy']=$this->M_Dashboard->get_data_case_by_fy();
			$data['get_data_ppm_by_fy']=$this->M_Dashboard->get_data_ppm_by_fy();

			$data['group_product_ppm_case']=$this->M_Dashboard->get_data_group_product_ppm_case();
			$data['group_product_ppm_case_power_train']=$this->M_Dashboard->get_data_group_product_ppm_case_where('Power Train');

			$data['group_product_ppm_case_new']=$this->M_Dashboard->get_data_group_product_ppm_case_new();
			$data['group_product_ppm_case_body']=$this->M_Dashboard->get_data_group_product_ppm_case_where_new('Body');
			$data['group_product_ppm_case_wiper_washer']=$this->M_Dashboard->get_data_group_product_ppm_case_where_new('Wiper Washer');

			$data['data_stacked_bar']=$this->M_Dashboard->get_data_stacked_bar();
			$data['data_stacked_bar2']=$this->M_Dashboard->get_data_stacked_bar2();

			$data['data_stacked_bar_new']=$this->M_Dashboard->get_data_stacked_bar_new();
			$data['data_stacked_bar_new_body']=$this->M_Dashboard->get_data_stacked_bar_new_where('Body');
			$data['data_stacked_bar_new_power_train']=$this->M_Dashboard->get_data_stacked_bar_new_where('Power Train');
			$data['data_stacked_bar_new_blower']=$this->M_Dashboard->get_data_stacked_bar_new_where('Blower');
			$data['data_stacked_bar_new_wiper_washer']=$this->M_Dashboard->get_data_stacked_bar_new_where('Wiper Washer');
			$data['data_stacked_bar_new_thermal']=$this->M_Dashboard->get_data_stacked_bar_new_where('Thermal');
			$data['data_stacked_bar_new_company']=$this->M_Dashboard->get_data_stacked_bar_new_where('Company');

			$data['data_ppm_fy']=$this->M_Dashboard->get_data_for_table_ppm();
			$data['data_ppm_fy_body']=$this->M_Dashboard->get_data_for_table_ppm_where('Body');
			$data['data_ppm_fy_power_train']=$this->M_Dashboard->get_data_for_table_ppm_where('Power Train');
			$data['data_ppm_fy_blower']=$this->M_Dashboard->get_data_for_table_ppm_where('Blower');
			$data['data_ppm_fy_wiper_washer']=$this->M_Dashboard->get_data_for_table_ppm_where('Wiper Washer');
			$data['data_ppm_fy_thermal']=$this->M_Dashboard->get_data_for_table_ppm_where('Thermal');

			$data['data_ppm_fy_group_product']=$this->M_Dashboard->get_data_for_case_data_by_group_product();
			$data['data_ppm_fy_group_product_company']=$this->M_Dashboard->get_data_for_case_data_by_group_product_where('Company');
			$data['data_ppm_fy_group_product_body']=$this->M_Dashboard->get_data_for_case_data_by_group_product_where('Body');
			$data['data_ppm_fy_group_product_power_train']=$this->M_Dashboard->get_data_for_case_data_by_group_product_where('Power Train');
			$data['data_ppm_fy_group_product_blower']=$this->M_Dashboard->get_data_for_case_data_by_group_product_where('Blower');
			$data['data_ppm_fy_group_product_wiper_washer']=$this->M_Dashboard->get_data_for_case_data_by_group_product_where('Wiper Washer');
			$data['data_ppm_fy_group_product_thermal']=$this->M_Dashboard->get_data_for_case_data_by_group_product_where('Thermal');

			/** -----------------------------Akhir Memanggil Function Dari Model-----------------------------------**/
			
			
			$this->load->view('templates/header'); //Tampil header
			$this->load->view('templates/sidebar'); //Tampil Sidebar
			$this->load->view('V_dashboard', $data); // Tampil data
			$this->load->view('templates/footer'); // Tampil footer
			        
        }else{

            redirect('auth');

		}
		
	}
		
	public function Details_User($NoPegawai) 
	{

        if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
             
        //$this->load->Model('M_Employee');
		$details=$this->M_Dashboard->GetNameEmployee($NoPegawai);
        $data['Nameemp'] =$details;      
        $this->load->view('templates1/header');
		$this->load->view('templates1/sidebar');
		$this->load->view('employee/V_EmployeeDetails',$data);
        $this->load->view('templates1/footer');     
        
        }else{

        redirect('auth');

        }

    }

	function load_full_calender()
	{
		$event_data = $this->M_Dashboard->fetch_all_event_full_calender();
		foreach($event_data->result_array() as $row)
			{
				$data[] = array(
					'id' => $row['id'],
					'title' => $row['title'],
					'start' => $row['start_event'],
					'end' => $row['end_event']
				);
			}
		echo json_encode($data);
	}

	




    /** ---------------------------------------------- /Employee----------------------------------------------**/

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard_new extends CI_Controller {

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

	///@see __construct()
     ///@note fungsi digunakan untuk username masuk web
     ///@attention jika username salah maka tidak bisa masuk
	 public function __construct(){
        parent::__construct();   

        if ($this->session->userdata('user_name')=="") {
			redirect('Auth');
		}

        $this->load->helper('date');
        $this->load->helper('file');        
        $this->load->model('M_Dashboard_new');
		$this->load->model('M_PCN');
		// $this->load->model('M_PCNLIST');
        // $this->load->library('encrypt');    
                  
      }



	  
    	///@see Index()
     ///@note fungsi digunakan untuk select filter dan template
     ///@attention jika select filter tidak sesuai dengan data table maka filter tidak aktif
	public function Index()
	{
		
		

        if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
			
			
			/** -----------------------------Memanggil Function Dari Model-----------------------------------**/
			 
			
			$data['PCN_Registrasi']=$this->M_PCN->get_PCN_Registrasi();
			
			
			
			// $data['group_product_company']=$this->M_Dashboard_new->get_data_group_product_where('Company');
			// $data['group_product_body']=$this->M_Dashboard_new->get_data_group_product_where('Body');
			// $data['group_product_power_train']=$this->M_Dashboard_new->get_data_group_product_where('PowerTrain');
			// $data['group_product_thermal']=$this->M_Dashboard_new->get_data_group_product_where('Thermal');
			// $data['group_product_wiper_washer']=$this->M_Dashboard_new->get_data_group_product_where('Wiper Washer');
			// $data['group_product_logistic']=$this->M_Dashboard_new->get_data_group_product_where('Logistic');
			// $data['group_product_supplier']=$this->M_Dashboard_new->get_data_group_product_where('Supplier');

			// $data['no_claims']=$this->M_Dashboard_new->get_data_no_claim();

            // $data['no_claims_company']=$this->M_Dashboard_new->get_data_no_claim_where('Company');
            // $data['no_claims_body']=$this->M_Dashboard_new->get_data_no_claim_where('Body');
			// $data['no_claims_power_train']=$this->M_Dashboard_new->get_data_no_claim_where('PowerTrain');
			// $data['no_claims_thermal']=$this->M_Dashboard_new->get_data_no_claim_where('Thermal');
			// $data['no_claims_wiper_washer']=$this->M_Dashboard_new->get_data_no_claim_where('Wiper Washer');
            // $data['no_claims_logistic']=$this->M_Dashboard_new->get_data_no_claim_where('Logistic');
            // $data['no_claims_supplier']=$this->M_Dashboard_new->get_data_no_claim_where('Supplier');
			
            // $data['fiscal_years_claim']=$this->M_Dashboard_new->get_data_fical_years();

            // $data['fiscal_years_claim_company']=$this->M_Dashboard_new->get_data_fical_years_where('Company');
            // $data['fiscal_years_claim_Body']=$this->M_Dashboard_new->get_data_fical_years_where('Body');
            // $data['fiscal_years_claim_Power_Train']=$this->M_Dashboard_new->get_data_fical_years_where('PowerTrain');
            // $data['fiscal_years_claim_Thermal']=$this->M_Dashboard_new->get_data_fical_years_where('Thermal');
            // $data['fiscal_years_claim_Wiper']=$this->M_Dashboard_new->get_data_fical_years_where('Wiper Washer');
            // $data['fiscal_years_claim_Logistic']=$this->M_Dashboard_new->get_data_fical_years_where('Logistic');
            // $data['fiscal_years_claim_Supplier']=$this->M_Dashboard_new->get_data_fical_years_where('Supplier');
            
			// $data['data_mixed_chart']=$this->M_Dashboard_new->get_data_mixed_chart();

			// $data['data_mixed_chart_company']=$this->M_Dashboard_new->get_data_mixed_chart_where('Company');
			// $data['data_mixed_chart_Body']=$this->M_Dashboard_new->get_data_mixed_chart_where('Body');
			// $data['data_mixed_chart_Power_Train']=$this->M_Dashboard_new->get_data_mixed_chart_where('PowerTrain');
			// $data['data_mixed_chart_Thermal']=$this->M_Dashboard_new->get_data_mixed_chart_where('Thermal');
			// $data['data_mixed_chart_Wiper']=$this->M_Dashboard_new->get_data_mixed_chart_where('Wiper Washer');
			// $data['data_mixed_chart_Logistic']=$this->M_Dashboard_new->get_data_mixed_chart_where('Logistic');
			// $data['data_mixed_chart_Supplier']=$this->M_Dashboard_new->get_data_mixed_chart_where('Supplier');
            

			// $data['data_mixed_chart2']=$this->M_Dashboard_new->get_data_mixed_chart2();

			// $data['data_mixed_chart2_company']=$this->M_Dashboard_new->get_data_mixed_chart2_where('Company');
			// $data['data_mixed_chart2_Body']=$this->M_Dashboard_new->get_data_mixed_chart2_where('Body');
			// $data['data_mixed_chart2_Power_Train']=$this->M_Dashboard_new->get_data_mixed_chart2_where('PowerTrain');
			// $data['data_mixed_chart2_Thermal']=$this->M_Dashboard_new->get_data_mixed_chart2_where('Thermal');
			// $data['data_mixed_chart2_Wiper_Washer']=$this->M_Dashboard_new->get_data_mixed_chart2_where('Wiper Washer');			
			// $data['data_mixed_chart2_Supplier']=$this->M_Dashboard_new->get_data_mixed_chart2_where('Supplier');
			
			// $data['calendar_no_claims']=$this->M_Dashboard_new->get_data_no_claim_calendar();
			// $data['calendar_no_claims2']=$this->M_Dashboard_new->get_data_no_claim_calendar_v2();
		

			// // PPM Data (3 FY) 
			// $data['ppm_data_fy']=$this->M_Dashboard_new->get_data_for_ppm_data();
					
			// $data['ppm_data_fy_company']=$this->M_Dashboard_new->get_data_for_ppm_data_where('Company');
			// $data['ppm_data_fy_Body']=$this->M_Dashboard_new->get_data_for_ppm_data_where('Body');
			// $data['ppm_data_fy_Power_Train']=$this->M_Dashboard_new->get_data_for_ppm_data_where('Power Train');
			// $data['ppm_data_fy_Thermal']=$this->M_Dashboard_new->get_data_for_ppm_data_where('Thermal');
			// $data['ppm_data_fy_Wiper']=$this->M_Dashboard_new->get_data_for_ppm_data_where('Wiper Washer');
			// $data['ppm_data_fy_Logistic']=$this->M_Dashboard_new->get_data_for_ppm_data_where('Logistic');
			// $data['ppm_data_fy_Supplier']=$this->M_Dashboard_new->get_data_for_ppm_data_where('Supplier');

			// // Case Data by Group product (3 FY) 
			// // $data['case_group_product']=$this->M_Dashboard_new->get_data_for_case_data_by_group_product();

			// $data['case_group_product_Company']=$this->M_Dashboard_new->get_data_for_case_data_by_group_product_where_new('Company');			
			// $data['case_group_product_Body']=$this->M_Dashboard_new->get_data_for_case_data_by_group_product_where_new('Body');
			// $data['case_group_product_Power_Train']=$this->M_Dashboard_new->get_data_for_case_data_by_group_product_where_new('Power Train');
			// $data['case_group_product_Thermal']=$this->M_Dashboard_new->get_data_for_case_data_by_group_product_where_new('Thermal');
			// $data['case_group_product_Wiper']=$this->M_Dashboard_new->get_data_for_case_data_by_group_product_where_new('Wiper Washer');
			// $data['case_group_product_Logistic']=$this->M_Dashboard_new->get_data_for_case_data_by_group_product_where_new('Logistic');
			// $data['case_group_product_Supplier']=$this->M_Dashboard_new->get_data_for_case_data_by_group_product_where_new('Supplier');
			// $data['case_group_product_General']=$this->M_Dashboard_new->get_data_for_case_data_by_group_product_where_new('General');


			/** ----------------------------- Akhir Memanggil Function Dari Model -----------------------------------**/
			// $dateTime = new DateTime('first day of this month');
			// for ($i = 1; $i <= 5; $i++) {
			// 	echo $dateTime->format('F Y'). "\n";
			// 	$dateTime->modify('-1 month');
			// }
			// echo json_encode ($this->M_PCN->data_per_supplier()[0]);
			// $data['years'] = json_encode($this->M_PCN->upcoming_5_years());
			// $data['myChart2'] = json_encode($this->M_PCN->upcoming_5_years_PCNLIST());
			// $data['month_names'] = json_encode($this->M_PCN->upcoming_5_month_name());
			// $data['myChart'] = json_encode($this->M_PCN->upcoming_5_month_PCNLIST());
			// $data['supplier'] = json_encode($this->M_PCN->data_per_supplier()[0]);
			// $data['myChart6'] = json_encode($this->M_PCN->data_per_supplier()[1]);
			// $data['group_product'] = json_encode($this->M_PCN->get_group_product()[0]);
			// $data['group_product_count'] = json_encode($this->M_PCN->get_group_product()[1]);

			$data['product_name'] = json_encode($this->M_PCN->get_product_name()['name']);
			$data['product_total'] = json_encode($this->M_PCN->get_product_name()['total']);
			$data['product_approved'] = json_encode($this->M_PCN->get_product_name()['approved']);
			$data['product_unapproved'] = json_encode($this->M_PCN->get_product_name()['unapproved']);
			$data['product_process'] = json_encode($this->M_PCN->get_product_name()['process']);
			$data['product_rejected'] = json_encode($this->M_PCN->get_product_name()['rejected']);

			$data['supplier_name'] = json_encode($this->M_PCN->get_supplier_name()['name']);
			$data['supplier_total'] = json_encode($this->M_PCN->get_supplier_name()['total']);
			$data['supplier_approved'] = json_encode($this->M_PCN->get_supplier_name()['approved']);
			$data['supplier_unapproved'] = json_encode($this->M_PCN->get_supplier_name()['unapproved']);
			$data['supplier_process'] = json_encode($this->M_PCN->get_supplier_name()['process']);
			$data['supplier_rejected'] = json_encode($this->M_PCN->get_supplier_name()['rejected']);
			
			$data['pcn_list'] = $this->M_PCN->get_pcn_need_approve();

			// $url = base_url();
			// // escapeshellcmd();

			// // $output = shell_exec('cd ' . $url . 'python test.py');
			// $command = escapeshellcmd('test.py');
        	// shell_exec($command);
			// $output =  $url . 'python test.py';
			// var_dump($output);


			
			// var_dump(explode("-", $data['pcn_list'][0]->stat));
			// $data['pcn_list_unapproved'] = $this->M_PCN->get_pcn_unapproved();
			// $data['pcn_list_has_temporaryApproved'] = $this->M_PCN->get_pcn_has_temporaryApproved()
			// $data['pcn'] = $this->M_PCN->get_pcn();			
			// $data['tooling'] = $this->M_PCN->get_tooling();
			// $data['attachment'] = $this->M_PCN->get_attachment();
			// var_dump($data['pcn_list_unapproved'][0]->hdrid);

			$this->load->view('templates/header'); //Tampil header
			$this->load->view('templates/sidebar'); //Tampil Sidebar
			$this->load->view('V_dashboard_new',$data); // Tampil data
			$this->load->view('templates/footer'); // Tampil footer

			// $this->load->view('runPython'); // Tampil footer
			    
        }else{

            redirect('auth');

		}
		
	}

	///@see ajaxGet_pcn
    ///@note fungsi digunakan untuk menemukan data user by nomer pcn dan menampilkan kedalam dashboard berdasarkan hdrid
    ///@attention jika data tidak muncul, maka terdapat kesalahan di konfigurasi
	public function ajaxGet_pcn(){
		$hdrid = $this->input->get('hdrid');
		$data = $this->M_PCN->get_pcn($hdrid);
		echo json_encode($data);
	}

	///@see ajaxGet_tooling
	///@note fungsi digunakan untuk menarik semua data dari table tooling dan menampilkan kedalam dashboard berdasarkan hdrid
    ///@attention jika data tidak muncul, maka terdapat kesalahan di konfigurasi
	public function ajaxGet_tooling(){
		$hdrid = $this->input->get('hdrid');
		$data = $this->M_PCN->get_tooling($hdrid);
		echo json_encode($data);
	}

	///@see ajaxGet_attachment
    ///@note fungsi digunakan untuk menarik semua data dari table attachment dan menampilkan kedalam dashboard berdasarkan hdrid
    ///@attention jika data tidak muncul, maka terdapat kesalahan di konfigurasi
	public function ajaxGet_attachment(){
		$hdrid = $this->input->get('hdrid');
		$data = $this->M_PCN->get_attachment($hdrid);
		echo json_encode($data);
	}

	///@see ajaxGet_pcn_list
    ///@note fungsi digunakan untuk menarik semua data dari table pcn list dan menampilkan kedalam dashboard berdasarkan value
    ///@attention jika data tidak muncul, maka terdapat kesalahan di konfigurasi
	public function ajaxGet_pcn_list(){
		$value = $this->input->get('value');
        $data = $this->M_PCN->ajaxGet_pcn_list($value);
		echo json_encode($data);
    }

	

	
	///@see details_user
    ///@note fungsi digunakan untuk menemukan data user dan merancang data user
    ///@attention jika data user sudah muncul akan update pada dashboard nya
	public function Details_User($NoPegawai) 
	{

        if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
             
        //$this->load->Model('M_Employee');
		$details=$this->M_Dashboard_new->GetNameEmployee($NoPegawai);
        $data['Nameemp'] =$details;      
        $this->load->view('templates1/header');
		$this->load->view('templates1/sidebar');
		$this->load->view('employee/V_EmployeeDetails',$data);
        $this->load->view('templates1/footer');     
        
        }else{

        redirect('auth');

        }

    }

	 ///@see view_data()
     ///@note fungsi digunakan untuk menampilkan data
     ///@attention
    public function view_data()
     {
      $tables = "tb_PCNlist";
      $search = array('no_dokumen','status','category','supplier_name','product_name','part_name','part_no','description','proses_perubahan_lama','proses_perubahan_baru','current_flow_pic','pic_proc','commodity','qa_pic','registered','masspro_schedule');
      
      // jika memakai IS NULL pada where sql
      $isWhere = null;

      // $isWhere = 'artikel.deleted_at IS NULL';
      header('Content-Type: application/json');
      echo $this->M_Dashboard_new->get_tables($tables,$search,$isWhere);//untuk data table pcnlist controller connect ke model
     }


	///@see view_data_where()
    ///@note fungsi digunakan untuk mencari dan menampilkan data 
    ///@attention jika data sudah di cari data akan tampil sesuai yang di buat
    public function view_data_where()
    {
      $tables = "tb_PCNlist";//untuk menampilkan table pcnlist ke database
      $search = array('no_dokumen','status','category','supplier_name','product_name','part_name','part_no','description','proses_perubahan_lama','proses_perubahan_baru','current_flow_pic','pic_proc','commodity','qa_pic','registered','masspro_schedule');//untuk data table pcnlist bisa masuk sesuai input
      //untuk menampilkan masuk sesuai input
      
        
        // jika memakai IS NULL pada where sql
        if($_POST['searchByFromdate']==''||$_POST['searchByTodate']==''){//Jika sebagai administrator maka akan tampil semua
            $where  = array('transaction_date >'=>'2020-01-01'); //menunjukkan tanggal transaksi             
        }else{
            $where  = array('transaction_date >' => $_POST['searchByFromdate'],'transaction_date <' => $_POST['searchByTodate'], );//menunjukkan tanggal transaksi
        };
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_Dashboard_new->get_tables_where($tables,$search,$where,$isWhere);//untuk data table pcnlist controller connect ke model
        
    }

	

	 ///@see ajax_getbyno_dokumen()
     ///@note fungsi digunakan untuk auto increnete
     ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
	public function ajax_getbyno_dokumen(){      

        $no_dokumen=$this->input->get('no_dokumen');//untuk auto increnete
        $data=$this->M_Dashboard_new->ajax_getbyno_dokumen($no_dokumen,'tb_PCNlist')->row();//untuk request auto increnete
        echo json_encode($data);

    }

	//function load_full_calender()
	//{
		//$event_data = $this->M_Dashboard_new->fetch_all_event_full_calender();
		//foreach($event_data->result_array() as $row)
			//{
				//$data[] = array(
					//'id' => $row['id'],
					//'title' => $row['title'],
					//'start' => $row['start_event'],
					//'end' => $row['end_event']
				//);
			//}
		//echo json_encode($data);
	//}

	




    /** ---------------------------------------------- /Employee----------------------------------------------**/

}

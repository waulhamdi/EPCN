<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Dashboard_new extends CI_Controller
{

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
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('user_name') == "") {
			redirect('Auth');
		}

		$this->load->helper('date');
		$this->load->helper('file');
		$this->load->model('M_Dashboard_new');
		$this->load->model('M_PCN');
		$this->load->model('UserModel'); //untuk load user model hak akses menu   
		// $this->load->model('M_PCNLIST');
		// $this->load->library('encrypt');    

	}




	///@see Index()
	///@note fungsi digunakan untuk select filter dan template
	///@attention jika select filter tidak sesuai dengan data table maka filter tidak aktif
	public function Index()
	{



		if ($this->session->userdata('authenticated')) { // Jika user sudah login (Session authenticated ditemukan)


			/** -----------------------------Memanggil Function Dari Model-----------------------------------**/
			$data['PCN_Registrasi'] = $this->M_PCN->get_PCN_Registrasi();
			/** ----------------------------- Akhir Memanggil Function Dari Model -----------------------------------**/
			$data['years'] = json_encode($this->M_PCN->upcoming_5_years());

			$data['product_name'] = json_encode($this->M_PCN->get_product_name()['name']);
			$data['product_total'] = json_encode($this->M_PCN->get_product_name()['total']);
			$data['product_approved'] = json_encode($this->M_PCN->get_product_name()['approved']);
			$data['product_unapproved'] = json_encode($this->M_PCN->get_product_name()['unapproved']);
			$data['product_process'] = json_encode($this->M_PCN->get_product_name()['process']);
			$data['product_rejected'] = json_encode($this->M_PCN->get_product_name()['rejected']);
			$data['plan_approval'] = json_encode($this->M_PCN->get_product_name()['Plan Approval']);
			$data['ny_temporary'] = json_encode($this->M_PCN->get_product_name()['Not yet Temporary']);

			// open pcn
			$data['open_pcn'] = json_encode($this->M_Dashboard_new->OpenPCN_by_product_name());
			$data['open_pcn_by_supplier'] = json_encode($this->M_Dashboard_new->OpenPCN_by_supplier_name());

			$data['supplier_name'] = json_encode($this->M_PCN->get_supplier_name()['name']);
			$data['supplier_total'] = json_encode($this->M_PCN->get_supplier_name()['total']);
			$data['supplier_approved'] = json_encode($this->M_PCN->get_supplier_name()['approved']);
			$data['supplier_unapproved'] = json_encode($this->M_PCN->get_supplier_name()['unapproved']);
			$data['supplier_process'] = json_encode($this->M_PCN->get_supplier_name()['process']);
			$data['supplier_rejected'] = json_encode($this->M_PCN->get_supplier_name()['rejected']);
			$data['plan_approval'] = json_encode($this->M_PCN->get_supplier_name()['Plan Approval']);
			$data['ny_temporary'] = json_encode($this->M_PCN->get_supplier_name()['Not yet Temporary']);

			$data['name'] = $this->M_Dashboard_new->get_status()['name'];
			$data['total'] = $this->M_Dashboard_new->get_status()['total'];
			$data['approved'] = $this->M_Dashboard_new->get_status()['approved'];
			$data['unapproved'] = $this->M_Dashboard_new->get_status()['unapproved'];
			$data['process'] = $this->M_Dashboard_new->get_status()['process'];
			$data['rejected'] = $this->M_Dashboard_new->get_status()['rejected'];
			$data['plan_approval_stat'] = $this->M_Dashboard_new->get_status()['Plan Approval'];
			$data['ny_temporary_stat'] = $this->M_Dashboard_new->get_status()['Not Yet Plan Approval'];
			$data['priority'] = $this->M_Dashboard_new->get_status()['priority'];
			$data['late'] = $this->M_Dashboard_new->get_status()['late'];
			$data['decision'] = $this->M_Dashboard_new->get_status()['decision'];

			$data['pcn_list'] = $this->M_PCN->get_pcn_need_approve();


			$data['years'] = $this->M_Dashboard_new->getSchedule()['year']; // year audit
			$data['category'] = ['product_name', 'supplier_name'];

			$menu_code = $this->input->get('var'); // Decrypt menu ID   untuk dekrip menu   
			$menu_name = $this->input->get('var2'); // Decrypt menu ID   untuk dekrip menu name  
			$data['menu_name'] = $menu_name;
			$menu_akses['menu_akses'] = $this->UserModel->get_menu_access($this->session->userdata('role_id')); //Menu akses untuk munculkan menu   
			$data['hak_akses'] = $this->UserModel->get_hak_access($this->session->userdata('role_id'), $menu_code); //button akses(Add,Adit,View,Delete,Import,Export)


			$this->load->view('templates/header'); //Tampil header
			$this->load->view('templates/sidebar_new', $menu_akses); //Tampil Sidebar
			$this->load->view('V_dashboard_new', $data); // Tampil data
			$this->load->view('templates/footer'); // Tampil footer

			// $this->load->view('runPython'); // Tampil footer

		} else {

			redirect('auth');

		}

	}

	/// @see area_filter()
	/// @note filter data
	/// @attention fungsi filter data untuk grafik
	function area_filter()
	{
		$byYear = str_replace('/', '', $this->input->get('byYear')); // berdasarkan year audit
		$byCategory = str_replace('/', '', $this->input->get('byCategory')); // berdasarkan audit category

		$year = "20" . substr($byYear, 1, 2);

		$data = $this->M_Dashboard_new->filterBY_Year_and_Category($year, $byCategory);

		echo json_encode($data);
	}

	///@see ajaxGet_pcn
	///@note fungsi digunakan untuk menemukan data user by nomer pcn dan menampilkan kedalam dashboard berdasarkan hdrid
	///@attention jika data tidak muncul, maka terdapat kesalahan di konfigurasi
	public function ajaxGet_pcn()
	{
		$hdrid = $this->input->get('hdrid');
		$data = $this->M_PCN->get_pcn($hdrid);
		echo json_encode($data);
	}

	///@see ajaxGet_tooling
	///@note fungsi digunakan untuk menarik semua data dari table tooling dan menampilkan kedalam dashboard berdasarkan hdrid
	///@attention jika data tidak muncul, maka terdapat kesalahan di konfigurasi
	public function ajaxGet_tooling()
	{
		$hdrid = $this->input->get('hdrid');
		$data = $this->M_PCN->get_tooling($hdrid);
		echo json_encode($data);
	}

	///@see ajaxGet_attachment
	///@note fungsi digunakan untuk menarik semua data dari table attachment dan menampilkan kedalam dashboard berdasarkan hdrid
	///@attention jika data tidak muncul, maka terdapat kesalahan di konfigurasi
	public function ajaxGet_attachment()
	{
		$hdrid = $this->input->get('hdrid');
		$data = $this->M_PCN->get_attachment($hdrid);
		echo json_encode($data);
	}

	///@see ajaxGet_pcn_list
	///@note fungsi digunakan untuk menarik semua data dari table pcn list dan menampilkan kedalam dashboard berdasarkan value
	///@attention jika data tidak muncul, maka terdapat kesalahan di konfigurasi
	public function ajaxGet_pcn_list()
	{
		$value = $this->input->get('value');
		$data = $this->M_PCN->ajaxGet_pcn_list($value);
		echo json_encode($data);
	}




	///@see details_user
	///@note fungsi digunakan untuk menemukan data user dan merancang data user
	///@attention jika data user sudah muncul akan update pada dashboard nya
	public function Details_User($NoPegawai)
	{

		if ($this->session->userdata('authenticated')) { // Jika user sudah login (Session authenticated ditemukan)

			//$this->load->Model('M_Employee');
			$details = $this->M_Dashboard_new->GetNameEmployee($NoPegawai);
			$data['Nameemp'] = $details;
			$this->load->view('templates1/header');
			$this->load->view('templates1/sidebar');
			$this->load->view('employee/V_EmployeeDetails', $data);
			$this->load->view('templates1/footer');

		} else {

			redirect('auth');

		}

	}

	///@see view_data()
	///@note fungsi digunakan untuk menampilkan data
	///@attention
	public function view_data()
	{
		$tables = "tb_PCNlist";
		$search = array('no_dokumen', 'status', 'category', 'supplier_name', 'product_name', 'part_name', 'part_no', 'description', 'proses_perubahan_lama', 'proses_perubahan_baru', 'current_flow_pic', 'pic_proc', 'commodity', 'qa_pic', 'registered', 'masspro_schedule');

		// jika memakai IS NULL pada where sql
		$isWhere = null;

		// $isWhere = 'artikel.deleted_at IS NULL';
		header('Content-Type: application/json');
		echo $this->M_Dashboard_new->get_tables($tables, $search, $isWhere); //untuk data table pcnlist controller connect ke model
	}


	///@see view_data_where()
	///@note fungsi digunakan untuk mencari dan menampilkan data 
	///@attention jika data sudah di cari data akan tampil sesuai yang di buat
	public function view_data_where()
	{
		$tables = "tb_PCNlist"; //untuk menampilkan table pcnlist ke database
		$search = array('no_dokumen', 'status', 'category', 'supplier_name', 'product_name', 'part_name', 'part_no', 'description', 'proses_perubahan_lama', 'proses_perubahan_baru', 'current_flow_pic', 'pic_proc', 'commodity', 'qa_pic', 'registered', 'masspro_schedule', 'isir', 'qcr', 'report_pe'); //untuk data table pcnlist bisa masuk sesuai input
		//untuk menampilkan masuk sesuai input


		// jika memakai IS NULL pada where sql
		if ($_POST['searchByFromdate'] == '' || $_POST['searchByTodate'] == '') { //Jika sebagai administrator maka akan tampil semua
			$where = array('transaction_date >' => ''); //menunjukkan tanggal transaksi             
		} else {
			$where = array('transaction_date >' => $_POST['searchByFromdate'], 'transaction_date <' => $_POST['searchByTodate']); //menunjukkan tanggal transaksi
		}

		// jika memakai IS NULL pada where sql
		$isWhere = null;
		// $isWhere = 'artikel.deleted_at IS NULL';
		header('Content-Type: application/json');
		echo $this->M_Dashboard_new->get_tables_where($tables, $search, $where, $isWhere); //untuk data table pcnlist controller connect ke model

	}



	///@see ajax_getbyno_dokumen()
	///@note fungsi digunakan untuk auto increnete
	///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
	public function ajax_getbyno_dokumen()
	{

		$no_dokumen = $this->input->get('no_dokumen'); //untuk auto increnete
		$data = $this->M_Dashboard_new->ajax_getbyno_dokumen($no_dokumen, 'tb_PCNlist')->row(); //untuk request auto increnete
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
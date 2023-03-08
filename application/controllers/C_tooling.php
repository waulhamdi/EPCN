<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_tooling extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or 
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     **/
    /** ---------------------------------------------- tooling----------------------------------------------**/
     
    ///@see __construct()
     ///@note fungsi digunakan untuk username masuk web
     ///@attention
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('user_name') == "") {
            redirect('Auth');
        }


        $this->load->helper('date');
        $this->load->helper('file');
        $this->load->model('M_tooling');
        $this->load->model('UserModel');  //untuk load user model hak akses menu  
        // // $this->load->library('encrypt');    

        // Cari hak akses by controller
        $Hak_akses = $this->UserModel->get_controller_access($this->session->userdata('role_id'),'C_tooling'); 
        if($Hak_akses->found!='found') {
          redirect('Auth'); // Kembali ke halaman Auth
        }
    }

    	///@see Index()
     ///@note fungsi digunakan untuk select filter dan template
     ///@attention jika select filter tidak sesuai dengan data table maka filter tidak aktif
    public function Index()
    {
                
      // $data['supplier_name_and_code'] = $this->M_tooling->supplier_name_and_code(); //untuk select filter supplier name and code
      // $data['start_delivery'] = $this->M_tooling->start_delivery(); //untuk select filter Approval
      // $data['t0_to_t1_trial'] = $this->M_tooling->trial(); //untuk select filter Approval
      $data['approval'] = $this->M_tooling->approval(); //untuk select filter Approval

      $menu_code = $this->input->get('var');                  // Decrypt menu ID   untuk dekrip menu   
      $menu_name = $this->input->get('var2');                 // Decrypt menu ID   untuk dekrip menu name  
      $data['menu_name'] =  $menu_name; 
      $menu_akses['menu_akses']=$this->UserModel->get_menu_access($this->session->userdata('role_id'));           //Menu akses untuk munculkan menu   
      $data['hak_akses']=$this->UserModel->get_hak_access($this->session->userdata('role_id'), $menu_code);       //button akses(Add,Adit,View,Delete,Import,Export)
     

        $this->load->view('templates/header'); //Tampil header
        $this->load->view('templates/sidebar_new',$menu_akses); //Tampil Sidebar
        
        // $this->load->view('tooling/V_tooling',$data); // Tampil data
        $this->load->view('tooling/V_tooling', $data); // Tampil data
        $this->load->view('templates/footer'); //Tampil footer


    }

   ///@see get view_data()
     ///@note fungsi digunakan untuk menampilkan data
     ///@attention
    function view_data()
    {

      $tables = "tb_tooling2";
      $search = array('hdrid','vendor_submission','supplier_name_and_code','part_number','assy_for','part_name','number_of_tooling','orderup_or_less_capacity','cost_down','quality_problem','renewal_and_additional','month','qty','start_delivery','mold_finish','mold_price','mold_price_2','m_or_c_tonage','m_or_c_tonage_2','qty_cavity','qty_cavity_2','cavity_no','cavity_no_2','output','guarantee_shoot','gambar','total_renewal','change_core','change_moving_dies','change_fix_dies','total_shot','t0_to_t1_trial','sample_isir_submission','cycle_time','cavity','output_2','total_output_pcs_per_month','approval_submission_of_renewal_mold','approved','checked','prepared','tooling_no','tooling_cost','depresiation_cost','part_price','total_cost','remark','approval','life_shoot_guarantee','forcast_pc_and_nenkei','quotation');
      
 

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_tooling->get_tables($tables, $search, $isWhere);
    }

      ///@see view_data_where()
    ///@note fungsi digunakan untuk mencari dan menampilkan data 
    ///@attention
    function view_data_where()
    {
        $nik_session = $this->session->userdata('user_name');


        $tables = "tb_tooling2";
        $search = array('hdrid','vendor_submission','supplier_name_and_code','part_number','assy_for','part_name','number_of_tooling','orderup_or_less_capacity','cost_down','quality_problem','renewal_and_additional','month','qty','start_delivery','mold_finish','mold_price','mold_price_2','m_or_c_tonage','m_or_c_tonage_2','qty_cavity','qty_cavity_2','cavity_no','cavity_no_2','output','guarantee_shoot','gambar','total_renewal','change_core','change_moving_dies','change_fix_dies','total_shot','t0_to_t1_trial','sample_isir_submission','cycle_time','cavity','output_2','total_output_pcs_per_month','approval_submission_of_renewal_mold','approved','checked','prepared','tooling_no','tooling_cost','depresiation_cost','part_price','total_cost','remark','approval','life_shoot_guarantee','forcast_pc_and_nenkei','quotation');
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;

        if ($_POST['searchByFromdate'] == '' || $_POST['searchByTodate'] == '') { //untuk pilihan date
           
            if($this->session->userdata('rolename')=='Administrator Quality'){ //Jika sebagai administrator maka akan tampil semua
                 $where  = array('transaction_date >' => '2020-01-01');
            }else{
                $where  = array('transaction_date >' => '2020-01-01');//administrator menampilkan data dari tanggal berapa ke tanggal berapa
            }
           

        } else {

            if($this->session->userdata('rolename')=='Administrator Quality'){//Jika sebagai administrator maka akan tampil semua
                $where  = array('transaction_date >' => $_POST['searchByFromdate'], 'transaction_date <' => $_POST['searchByTodate']);//untuk pilihan date
            }else{
                $where  = array('transaction_date >' => $_POST['searchByFromdate'], 'transaction_date <' => $_POST['searchByTodate']);//untuk pilihan date
            }
           
        
        };

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');//header filter date
        echo $this->M_tooling->get_tables_where($tables, $search, $where, $isWhere);//untuk get tables where
    }

     ///@see view_data_query()
    ///@note fungsi digunakan untuk query data 
    ///@attention 
    function view_data_query()
    {

        $query  = "SELECT kategori.name_kategori AS name_kategori, subkat.* FROM subkat 
                    JOIN kategori ON subkat.id_kategori = kategori.id_kategori";
        $search = array('name_kategori', 'subkat', 'tgl_add');
        $where  = null;
        // $where  = array('name_kategori' => 'Tutorial');

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_Datatables->get_tables_query($query, $search, $where, $isWhere);//untuk connect ke datatables
    }

    //    if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
    //     }else{
    //     redirect('auth');
    //     }

    ///@see ajax_add()
     ///@note fungsi digunakan untuk menambah data
     ///@attention
    public function ajax_add()
    {
        // $product_id = $this->input->post('product_id'); //untuk add data kode id increnete
        // $kodeB = $this->M_tooling->get_product_by_id($product_id);//add data connect ke model
        // $kode = $kodeB->report_no;//fungsi kode increnete
        $kode = 'PCN-F-';//fungsi kode increnete

        // ********************* 0. Generate nomor transaksi  *********************         
        // var_dump($kode);           
        // date_default_timezone_set('Asia/Jakarta');//default tanggal timezone daerah
        // $mdate = $kode.mdate('%Y/%m/', time());//tanggal,bulan,tahun
        $hdrid2 = $this->M_tooling->Max_data($kode, 'tb_tooling2')->row();//untuk max data

        if ($hdrid2->hdrid == NULL) {
            // Jika belum ada maka tidak bisa diisi
            $hdrid3 = $kode . "001";
        } else {
            $hdrid3 = $hdrid2->hdrid;
            // Jika sudah ada maka naik 1 level
            $str = intval(substr($hdrid3, strlen($kode), 3)) + 1;
            $str = str_pad($str, 3, "0", STR_PAD_LEFT);
            $hdrid3 = $kode . $str;
        }
        $hdrid = $hdrid3;

        // ********************* 1. Set hdrid  *********************
        $post_data2 = array('hdrid' => $hdrid3);//post data

        // ********************* 2. Transaction date  *********************
        $post_data3 = array('transaction_date' => mdate('%Y-%m-%d', time()));//post data sesuai tanggal
        $post_data_transaction_date = mdate('%Y-%m-%d', time());//post data sesuai datetime
        // $issue_date = array('issue_date' => mdate('%Y-%m-%d', time()));

        // ******************** 3. Collect all data post *********************     
        $post_data = $this->input->post();//post data
        $post_data5 = $this->input->post('group_product_id');//post data group_product_id
        $post_problem_category_id = $this->input->post('problem_category_id');//post data problem category id
        $product_id2 = $this->input->post('product_id');//post data product id

        $msg = "success save" ;

        // ********************* 4. Merge data post *********************        
        $post_datamerge = array_merge($post_data, $post_data2, $post_data3);

        // ********************* 5. Simpan data     *********************

        $this->M_tooling->Input_Data($post_datamerge, 'tb_tooling2');

        // ********************* 6. Upload file jika ada  *********************   
        // if (!empty($_FILES['file']['name'])) {
        //     $this->upload_file_attach('file', $hdrid, 'tb_tooling2');
        // }

        // **********************  Upload file attach file *********************   
        if(!empty($_FILES['vendor_submission']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('vendor_submission',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['gambar']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('gambar',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['approval_submission_of_renewal_mold']['name']))
       {
         $this->upload_file_attach('approval_submission_of_renewal_mold',$hdrid,'tb_tooling2');
       }
 if(!empty($_FILES['life_shoot_guarantee']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('life_shoot_guarantee',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['forcast_pc_and_nenkei']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('forcast_pc_and_nenkei',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['quotation']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('quotation',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }


        // NOTE:: LEMPAR HDRID KEDALAM TABLE LAIN
        $post_data4 = array('problem_id' => $hdrid);


        $post_datamerge2 = array_merge($post_data2, $post_data4);//array merge post 2 dan post 4
        $this->M_tooling->Input_Data($post_datamerge2, 'tb_response');//input data ke table tb response
        $this->M_tooling->Input_Data($post_datamerge2, 'tb_input_effectiveness');//input data ke table tb input effectiveness

        // Tambah data approvar
        $this->M_tooling->Input_Data_Approver($post_data_transaction_date,$hdrid3,$this->input->post('nik'),$this->input->post('name'),$this->input->post('section1'),$this->input->post('email1'),$this->input->post('nik2'),$this->input->post('name2'),$this->input->post('section2'),$this->input->post('email2'));

        // Tambah data CC'
        // $this->M_tooling->Input_Data2($post_data_transaction_date,$hdrid3, $post_problem_category_id, $product_id2);

        $msg = "success save";//jika add berhasil akan muncul notif success

        // ********************* 6. Upload file jika ada  *********************   
        if(!empty($_FILES['vendor_submission']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('vendor_submission',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['gambar']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('gambar',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['approval_submission_of_renewal_mold']['name']))
       {
         $this->upload_file_attach('approval_submission_of_renewal_mold',$hdrid,'tb_tooling2');
       }
 if(!empty($_FILES['life_shoot_guarantee']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('life_shoot_guarantee',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['forcast_pc_and_nenkei']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('forcast_pc_and_nenkei',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['quotation']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('quotation',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }

        $data['status'] = $msg;//status
        $data['hdrid'] = $hdrid;//code incnrenete
        $data['product_id'] = $product_id2;//product id

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

      ///@see ajax_update()
     ///@note fungsi digunakan untuk update data
     ///@attention
    public function ajax_update()
    {

        // ********************* 1. Collect data post *********************
        $post_data = $this->input->post();//post update
        $hdrid = $this->input->post('hdrid');//update di code increnete

        $msg = "success Update";//notif jika diupdate maka success

        // **********************  Upload file (filename,hdrid,table)  *********************   
        // if (!empty($_FILES['file']['name'])) {
        //     $this->upload_file_attach('file', $hdrid, 'tb_tooling2');
        // }

        // **********************  Upload file attach_picture  *********************   
        if(!empty($_FILES['vendor_submission']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('vendor_submission',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['gambar']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('gambar',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['approval_submission_of_renewal_mold']['name']))
       {
         $this->upload_file_attach('approval_submission_of_renewal_mold',$hdrid,'tb_tooling2');
       }
 if(!empty($_FILES['life_shoot_guarantee']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('life_shoot_guarantee',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['forcast_pc_and_nenkei']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('forcast_pc_and_nenkei',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['quotation']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('quotation',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }


        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge = array_merge($post_data, $post_data);

        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);
        $this->M_tooling->Update_Data($where, $post_datamerge, 'tb_tooling2');

        $data['status'] = "berhasil update";

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    ///@see ajax_sendDraft()
     ///@note fungsi digunakan untuk membuat draft
     ///@attention
    public function ajax_sendDraft()
    {

        // ********************* 1. Collect data post *********************
        $hdrid = $this->input->post('hdrid');
        $nik = $this->input->post('nik');
        $nik2 = $this->input->post('nik2');

        $msg = "success Update";

        // *********************  Cari atasannya inisiator *********************      
        // $inisisator_approver= $this->M_tooling->cari_tb_approver($hdrid);

        $where = array('problem_id' => $hdrid,'nik' => $nik,'position_code' =>'1');      
        $post_data_approval = array('date_approve' => mdate('%Y-%m-%d %h:%i', time()));      
        $this->M_tooling->Update_Data($where, $post_data_approval, 'tb_approval');

        // update responsible antisipasi jika ada kesalahan
        $this->M_tooling->Update_Data_Approver($hdrid,$nik2);

        // cari approver
        $inisisator_approver= $this->M_tooling->cari_tb_approver($hdrid);
          
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);

        $post_data = array('draft' => 'Send');
        $post_data2 = array('status' => 'Open');

        $post_data3 = array('status_transaction' => 'Waiting approve by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')');
        
        $post_datamerge = array_merge($post_data, $post_data2,$post_data3);

        // **********************  Upload file attach_picture  *********************   name2
        // **********************  Upload file attach file *********************   
        if(!empty($_FILES['vendor_submission']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('vendor_submission',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['gambar']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('gambar',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['approval_submission_of_renewal_mold']['name']))
       {
         $this->upload_file_attach('approval_submission_of_renewal_mold',$hdrid,'tb_tooling2');
       }
 if(!empty($_FILES['life_shoot_guarantee']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('life_shoot_guarantee',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['forcast_pc_and_nenkei']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('forcast_pc_and_nenkei',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['quotation']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('quotation',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }




        
        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);
        $this->M_tooling->Update_Data($where, $post_datamerge, 'tb_tooling2');

        // $data['status'] = "berhasil dikirim";
        $data['status'] = $hdrid;
        $data['name'] = $inisisator_approver->name ;
        $data['position_name'] = $inisisator_approver->position_name;
        $data['office_email'] = $inisisator_approver->office_email;

        $data['status_transaction'] ='Need approval by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')';

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
    }

        ///@see ajax_sendDraft2()
     ///@note fungsi digunakan untuk membuat draft
     ///@attention
    public function ajax_sendDraft2()
    {

        $product_id = $this->input->post('product_id');
        $kodeB = $this->M_tooling->get_product_by_id($product_id);
        $kode = $kodeB->report_no;

        // ********************* 0. Generate nomor transaksi  *********************         
        // var_dump($kode);           
        $mdate = $kode . mdate('%Y/%m/', time());
        $hdrid2 = $this->M_tooling->Max_data($mdate, 'tb_tooling2')->row();

        if ($hdrid2->hdrid == NULL) {
            // Jika belum ada
            $hdrid3 = $mdate . "001";
        } else {
            $hdrid3 = $hdrid2->hdrid;
            // Jika sudah ada maka naik 1 level
            $str = intval(substr($hdrid3, strlen($mdate), 3)) + 1;
            $str = str_pad($str, 3, "0", STR_PAD_LEFT);
            $hdrid3 = $mdate . $str;
        }
        $hdrid = $hdrid3;

        // ********************* 1. Set hdrid  *********************
        $post_data2 = array('hdrid' => $hdrid3);

        // ********************* 2. Transaction date  *********************
        $post_data3 = array('transaction_date' => mdate('%Y-%m-%d', time()));
        $post_data_transaction_date = mdate('%Y-%m-%d', time());

        // ******************** 3. Collect all data post *********************     
        $post_data = $this->input->post();
        $post_data5 = $this->input->post('group_product_id');
        $post_problem_category_id = $this->input->post('problem_category_id');
        $product_id2 = $this->input->post('product_id');

        $post_data_draft = array('draft' => 'Send');
        $updateStatus = array('status' => 'Open');

        // Imput data approver
        $this->M_tooling->Input_Data_Approver($post_data_transaction_date,$hdrid,$this->input->post('nik'),$this->input->post('name'),$this->input->post('section1'),$this->input->post('email1'),$this->input->post('nik2'),$this->input->post('name2'),$this->input->post('section2'),$this->input->post('email2'));
        
        $where = array('problem_id' => $hdrid,'position_code' =>'1');    
        $post_data_approval = array('date_approve' => mdate('%Y-%m-%d %h:%i', time()));
        $this->M_tooling->Update_Data($where, $post_data_approval, 'tb_approval');
        
        // update tanggal approve inisiator
        $inisisator_approver= $this->M_tooling->cari_tb_approver($hdrid);

        // Cari atasan  inisiator
        // $inisisator_approver= $this->M_tooling->cari_tb_approver($hdrid);
        $post_data4 = array('status_transaction' => 'Waiting approve by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')');
       
        // $msg = "success save"; 

        // ********************* 4. Merge data post *********************        
        $post_datamerge = array_merge($post_data, $post_data2, $post_data3,$post_data_draft,$updateStatus,$post_data4);

        // ********************* 5. Simpan data     *********************

        $this->M_tooling->Input_Data($post_datamerge, 'tb_tooling2');

        // **********************  Upload file attach_picture  *********************   
        if(!empty($_FILES['vendor_submission']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('vendor_submission',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['gambar']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('gambar',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['approval_submission_of_renewal_mold']['name']))
       {
         $this->upload_file_attach('approval_submission_of_renewal_mold',$hdrid,'tb_tooling2');
       }
 if(!empty($_FILES['life_shoot_guarantee']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('life_shoot_guarantee',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['forcast_pc_and_nenkei']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('forcast_pc_and_nenkei',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['quotation']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('quotation',$hdrid,'tb_tooling2');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        // NOTE:: LEMPAR HDRID KEDALAM TABLE LAIN
        $post_data4 = array('problem_id' => $hdrid);

        $post_datamerge2 = array_merge($post_data2, $post_data4);

        $this->M_tooling->Input_Data($post_datamerge2, 'tb_response');

        $this->M_tooling->Input_Data($post_datamerge2, 'tb_input_effectiveness');
        
        // ********************* 6. Upload file jika ada  *********************   
        if (!empty($_FILES['file']['name'])) {
            $this->upload_file_attach('file', $hdrid, 'tb_tooling2');
        }
      
        $data['status'] =$hdrid;
        $data['status_transaction'] ='Need approval by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')';

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
    }


     ///@see ajax_delete()
     ///@note fungsi digunakan untuk delete data
     ///@attention
     public function ajax_delete()
     {
   
            
           $where = array('hdrid' => $this->input->post('hdrid'));//untuk delete auto increnete
           $this->M_tooling->Delete_Data($where,'tb_tooling2');//untuk delete table tooling
           $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
              
            // return value array
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
   
       }

         ///@see ajax_getbyhdrid()
     ///@note fungsi digunakan untuk auto increnete
     ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
     function ajax_getbyhdrid(){      

      $hdrid=$this->input->get('hdrid');//untuk auto increnete
      $data=$this->M_tooling->ajax_getbyhdrid($hdrid,'tb_tooling2')->row();//untuk request auto increnete
      echo json_encode($data);

  }


      ///@see get form_approver_link_mail
     ///@note fungsi digunakan memberi data ke email
     ///@attention 
     function form_approver_link_mail(){
        
      $id_user_reg=$this->input->get('var1'); //untuk menginput id username variable 1
      $nik=$this->input->get('var2'); //untuk menginput id username variable 2
      
      $data['get_approver']=$this->M_tooling->get_approver($id_user_reg); //untuk request approve
  $data['get_requester']=$this->M_tooling->get_requester($id_user_reg); //untuk request auto increnete
  $data['data']=$this->M_tooling->get_data($id_user_reg); //untuk request nomor tooling
      
      $this->load->view('email/V_tooling',$data); // Tampil data
    
  }

  ///@see upload_file_attach
    ///@note fungsi attach file bisa diupload
    ///@attention jika path atau ukuran file tidak sesuai function maka attach filenya tidak bisa terisi
    function upload_file_attach($filename,$hdrid,$table){

      if(!empty($_FILES[$filename]['name']))//jika data bisa attach file
      {
        
          $config['upload_path'] = './assets/upload/tooling/';   //path file
          $config['allowed_types'] = 'gif|jpg|png|pdf';      //jenis file   
          $config['overwrite'] = True; //jika file sudah bisa masuk path
          $config['max_size']  = '2000';//maxsimal upload
          $config['max_width']  = '1024'; //maksimal lebar form
          $config['max_height']  = '768'; //maskimal tinggi form
          $config['file_name']=$hdrid.'_'.$filename; //untuk upload attach file
          $this->load->library('upload', $config);//untuk melihat hasil attach file
          $this->upload->initialize($config); //untuk melihat hasil attach file sudah terinput

          if ( ! $this->upload->do_upload($filename)){//untuk mengecek status attach file jika sudah masuk
              // $status = "error";
               $msg = $this->upload->display_errors(); //jika attach file di upload tidak sesuai maka attac file tidak masuk
          }
          else{
               $msg = "success upload"; //jika attach file benar maka berhasil upload


              $dataupload = $this->upload->data();
              // $status = "success";
              // $msg = $dataupload['file_name']." berhasil diupload";                    
              $data_update = array($filename =>$dataupload['file_name']);  //data sudah update 
             
              $where = array('hdrid' => $hdrid);  //untuk update auto increnete      
              $this->M_tooling->Update_Data($where,$data_update,$table);

          }

      }

  }


        ///@see import()
     ///@note fungsi digunakan import data
     ///@attention jika file import path file tidak excel maka tidak bisa diimport
     public function import() {

      // $this->form_validation->set_rules('excel', 'File', 'trim|required');
  
      if ($_FILES['excel']['name'] == '') { //parameter untuk membuat data bisa diimport
  
        $this->session->set_flashdata('msg', 'File harus diisi'); //jika import file harus terisi
              redirect('C_tooling');
  
      } else {
  
        $config['upload_path'] = './assets/excel/tooling'; //untuk path import data
        $config['allowed_types'] = 'xls|xlsx'; //type file import data
        
        $this->load->library('upload', $config); //untuk menampilkan hasil import data
        
        if ( ! $this->upload->do_upload('excel')){ //jika tipe data tidak excel maka akan error
          $error = array('error' => $this->upload->display_errors());
        }
        else{
  
          $data = $this->upload->data(); //upload import data
          
          error_reporting(E_ALL);
          date_default_timezone_set('Asia/Jakarta'); //menunjukan lokasi daerah jakarta pada web
  
          include './assets/phpexcel/Classes/PHPExcel/IOFactory.php'; //syntax untuk excel
  
          $inputFileName = './assets/excel/' .$data['file_name'];//path
          $objPHPExcel = PHPExcel_IOFactory::load($inputFileName); //excel path
          $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
  
          $index = 0;
  
          foreach ($sheetData as $key => $value) {

                    // ********************* 0. Generate nomor transaksi  *********************          

                    if ($row > 0 && ucwords($value['A'])!='' ) { //diambil dari baris ke 2

                        $kodeB = $this->M_tooling->get_report_no(ucwords($value['C'])); //untuk mendapat nomor report
                        $kode = $kodeB->report_no;//kode report

                        $problem_category_id=$this->M_tooling->get_hdrid('tb_problem_category','problem_category_name',ucwords($value['A']));//kode increnete problem category
                        $group_product_id=$this->M_tooling->get_hdrid('tb_group_product','group_product_name',ucwords($value['B']));//kode increnete problem group product name
                        $product_id=$this->M_tooling->get_hdrid('tb_product','product_name',ucwords($value['C']));//kode increnete product name
                        
                        // ********************* 0. Generate nomor transaksi  *********************
                        // var_dump($kode);
                        
                        $mdate = $kode . mdate('%Y/%m/', time()); //sesuai tanggal,bulan dan tahun untuk generate nomor
                        $hdrid2 = $this->M_tooling->Max_data($mdate, 'tb_tooling2')->row();//max data table tooling

                        if ($hdrid2->hdrid == NULL) {
                            // Jika belum ada
                            $hdrid3 = $mdate . "001";
                        } else {
                            $hdrid3 = $hdrid2->hdrid;
                            // Jika sudah ada maka naik 1 level
                            $str = intval(substr($hdrid3, strlen($mdate), 3)) + 1;
                            $str = str_pad($str, 3, "0", STR_PAD_LEFT);
                            $hdrid3 = $mdate . $str;
                        }
                        $hdrid = $hdrid3;

                        // ********************* 1. Set hdrid  *********************
                    
                        $resultData[$index]['hdrid'] =   $hdrid;
                        $resultData[$index]['transaction_date'] = mdate('%Y-%m-%d', time());

                        // ---------------------------------- Import Macro Batas sini 1---------------------------------
                        $resultData[$index]['vendor_submission'] = ucwords($value['A']);
                        $resultData[$index]['supplier_name_and_code'] = ucwords($value['A']);
                        $resultData[$index]['part_number'] = ucwords($value['A']);
                        $resultData[$index]['assy_for'] = ucwords($value['A']);
                        $resultData[$index]['part_name'] = ucwords($value['A']);
                        $resultData[$index]['number_of_tooling'] = ucwords($value['A']);
                        $resultData[$index]['orderup_or_less_capacity'] = ucwords($value['A']);
                        $resultData[$index]['cost_down'] = ucwords($value['A']);
                        $resultData[$index]['quality_problem'] = ucwords($value['A']);
                        $resultData[$index]['renewal_and_additional'] = ucwords($value['A']);
                        $resultData[$index]['month'] = ucwords($value['A']);
                        $resultData[$index]['qty'] = ucwords($value['A']);
                        $resultData[$index]['start_delivery'] = ucwords($value['A']);
                        $resultData[$index]['mold_finish'] = ucwords($value['A']);
                        $resultData[$index]['mold_price'] = ucwords($value['A']);
                        $resultData[$index]['mold_price_2'] = ucwords($value['A']);
                        $resultData[$index]['m_or_c_tonage'] = ucwords($value['A']);
                        $resultData[$index]['m_or_c_tonage_2'] = ucwords($value['A']);
                        $resultData[$index]['qty_cavity'] = ucwords($value['A']);
                        $resultData[$index]['qty_cavity_2'] = ucwords($value['A']);
                        $resultData[$index]['cavity_no'] = ucwords($value['A']);
                        $resultData[$index]['cavity_no_2'] = ucwords($value['A']);
                        $resultData[$index]['output'] = ucwords($value['A']);
                        $resultData[$index]['guarantee_shoot'] = ucwords($value['A']);
                        $resultData[$index]['gambar'] = ucwords($value['A']);
                        $resultData[$index]['total_renewal'] = ucwords($value['A']);
                        $resultData[$index]['change_core'] = ucwords($value['A']);
                        $resultData[$index]['change_moving_dies'] = ucwords($value['A']);
                        $resultData[$index]['change_fix_dies'] = ucwords($value['A']);
                        $resultData[$index]['total_shot'] = ucwords($value['A']);
                        $resultData[$index]['t0_to_t1_trial'] = ucwords($value['A']);
                        $resultData[$index]['sample_isir_submission'] = ucwords($value['A']);
                        $resultData[$index]['cycle_time'] = ucwords($value['A']);
                        $resultData[$index]['cavity'] = ucwords($value['A']);
                        $resultData[$index]['output_2'] = ucwords($value['A']);
                        $resultData[$index]['total_output_pcs_per_month'] = ucwords($value['A']);
                        $resultData[$index]['approval_submission_of_renewal_mold'] = ucwords($value['A']);
                        $resultData[$index]['approved'] = ucwords($value['A']);
                        $resultData[$index]['checked'] = ucwords($value['A']);
                        $resultData[$index]['prepared'] = ucwords($value['A']);
                        $resultData[$index]['tooling_no'] = ucwords($value['A']);
                        $resultData[$index]['tooling_cost'] = ucwords($value['A']);
                        $resultData[$index]['depresiation_cost'] = ucwords($value['A']);
                        $resultData[$index]['part_price'] = ucwords($value['A']);
                        $resultData[$index]['total_cost'] = ucwords($value['A']);
                        $resultData[$index]['remark'] = ucwords($value['A']);
                        $resultData[$index]['approval'] = ucwords($value['A']);
                        $resultData[$index]['life_shoot_guarantee'] = ucwords($value['A']);
                        $resultData[$index]['forcast_pc_and_nenkei'] = ucwords($value['A']);
                        $resultData[$index]['quotation'] = ucwords($value['A']);
                        
                        
    
                        // //Inisiator 1 => Inisiator
                        $resultApprover[$index_approver]['transaction_date'] =  mdate('%Y-%m-%d', time());
                        $resultApprover[$index_approver]['problem_id'] =  $hdrid;
                        $resultApprover[$index_approver]['nik'] =   ucwords($value['P']);
                        $resultApprover[$index_approver]['name'] =   ucwords($value['Q']);
                        $resultApprover[$index_approver]['department_code'] =  '0';
                        $resultApprover[$index_approver]['department_name'] =  ucwords($value['R']);
                        $resultApprover[$index_approver]['office_email'] =   $hdrid;
                        $resultApprover[$index_approver]['position_code'] =  '1';
                        $resultApprover[$index_approver]['position_name'] =   'Inisiator';
                        $resultApprover[$index_approver]['date_approve'] =   mdate('%Y-%m-%d %H:%i:%s', time());
                        
                        $index_approver++;
                        //Inisiator 6 => Inisiator after response check
                        $resultApprover[$index_approver]['transaction_date'] =  mdate('%Y-%m-%d', time());
                        $resultApprover[$index_approver]['problem_id'] =  $hdrid;
                        $resultApprover[$index_approver]['nik'] =   ucwords($value['P']);
                        $resultApprover[$index_approver]['name'] =   ucwords($value['Q']);
                        $resultApprover[$index_approver]['department_code'] =  '0';
                        $resultApprover[$index_approver]['department_name'] =  ucwords($value['R']);
                        $resultApprover[$index_approver]['office_email'] =   $hdrid;
                        $resultApprover[$index_approver]['position_code'] =  '6';
                        $resultApprover[$index_approver]['position_name'] =   'Inisiator after response check';
                        $resultApprover[$index_approver]['date_approve'] =   mdate('%Y-%m-%d %H:%i:%s', time());

                        $index_approver++;

                        //Responsible 3	Responsible
                        $resultApprover[$index_approver]['transaction_date'] =  mdate('%Y-%m-%d', time());
                        $resultApprover[$index_approver]['problem_id'] =  $hdrid;
                        $resultApprover[$index_approver]['nik'] =   ucwords($value['S']);
                        $resultApprover[$index_approver]['name'] =   ucwords($value['T']);
                        $resultApprover[$index_approver]['department_code'] =  '0';
                        $resultApprover[$index_approver]['department_name'] = ucwords($value['U']);
                        $resultApprover[$index_approver]['office_email'] =   $hdrid;
                        $resultApprover[$index_approver]['position_code'] =  '3';
                        $resultApprover[$index_approver]['position_name'] =   'Responsible';
                        $resultApprover[$index_approver]['date_approve'] =   mdate('%Y-%m-%d %H:%i:%s', time());

                        // $nik,$positioncode,$positionname,$date,$problemid,$dateapprove
                        $this->M_tooling->get_superior1(ucwords($value['P']),'2','Inisiator Approver',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_tooling->get_superior1(ucwords($value['P']),'7','Inisiator approver after response check',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_tooling->get_superior2(ucwords($value['S']),'4','Responsible Approver 1',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_tooling->get_superior2(ucwords($value['S']),'5','Responsible Approver 2',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));

                        $this->M_tooling->insert_batch('tb_tooling2', $resultData);
                        $this->M_tooling->insert_batch('tb_approval', $resultApprover);

                        $post_data = array('hdrid' => $hdrid,'problem_id' => $hdrid,'transaction_date'=> mdate('%Y-%m-%d', time()));
                        $this->M_tooling->Input_Data($post_data, 'tb_response');
                        $this->M_tooling->Input_Data($post_data, 'tb_input_effectiveness');

                        // $index = 0;
                        $index_approver = 0;

                    }

                    $row++;
                }

                unlink('./assets/excel/' . $data['file_name']);//path untuk tampilan import data berupa excel


                if (count($resultData) != 0) {

                    // $result = $this->M_tooling->insert_batch('tb_tooling2', $resultData);
                    // $result3 = $this->M_tooling->insert_batch('tb_approval', $resultApprover);
                    // if ($result > 0) {
                    //     // $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
                    //     redirect('C_tooling');
                    // }
                    
                     redirect('C_tooling');
                } else {
                    // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                    redirect('C_tooling');
                }
            }
        }
    }

    

    /** ---------------------------------------------- /Close controller----------------------------------------------**/
}

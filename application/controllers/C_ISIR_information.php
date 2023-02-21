<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ISIR_information extends CI_Controller
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
    /** ---------------------------------------------- ISIR_information----------------------------------------------**/
     
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
        $this->load->model('M_ISIR_information');
        // // $this->load->library('encrypt');    

    }

    	///@see Index()
     ///@note fungsi digunakan untuk select filter dan template
     ///@attention jika select filter tidak sesuai dengan data table maka filter tidak aktif
    public function Index()
    {
                
        $data['process'] = $this->M_ISIR_information->tampil_process();//select filter temporary and fullscale
        $data['submital'] = $this->M_ISIR_information->submital();//untuk select filter submital isir
        $data['supplier_code'] = $this->M_ISIR_information->supplier_code();//untuk select filter supplier code
        $data['supplier_name'] = $this->M_ISIR_information->supplier_name();//untuk select filter nama supplier
        // $data['part_number'] = $this->M_ISIR_information->part_number();//untuk select filter part number
        // $data['part_name'] = $this->M_ISIR_information->part_name();//untuk select filter part name
        // $data['rohs'] = $this->M_ISIR_information->rohs();//select filter rohs
        $data['product_adapt_to_dds2004'] = $this->M_ISIR_information->product_adapt_to_dds2004();//select filter product adapt to dds 2004
        // $data['imds_id'] = $this->M_ISIR_information->imds_id();//select filter imds id

        // $data['isir'] = $this->M_ISIR_information->getISIR();


        $this->load->view('templates/header'); //Tampil header
        $this->load->view('templates/sidebar'); //Tampil Sidebar
        
        // $this->load->view('ISIR_information/V_ISIR_information',$data); // Tampil data
        $this->load->view('ISIR_information/V_ISIR_information', $data); // Tampil data
        $this->load->view('templates/footer'); //Tampil footer



    }

   ///@see get view_data()
     ///@note fungsi digunakan untuk menampilkan data
     ///@attention
    function view_data()
    {

        $tables = "tb_ISIR_information";
        $search = array('hdrid','process','submital','improvement_activity','supplier_code','supplier_name','part_number','part_name','tooling_no','cavity_number','assy_no','assy_name','material_manufacture','grade_name','process_name','sub_supplier_name','address','remarks','inspected_date','inspector','manager','product_adapt_to_dds2004','imds_id','millsheet','rohs_cd','rohs_hg','rohs_pb','rohs_cr','attach_soc','dimension_result','approved','checked','prepared');
        
      
 

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_ISIR_information->get_tables($tables, $search, $isWhere);
    }

      ///@see view_data_where()
    ///@note fungsi digunakan untuk mencari dan menampilkan data 
    ///@attention
    function view_data_where()
    {
        $nik_session = $this->session->userdata('user_name');


        $tables = "tb_ISIR_information";
        $search = array('hdrid','process','submital','improvement_activity','supplier_code','supplier_name','part_number','part_name','tooling_no','cavity_number','assy_no','assy_name','material_manufacture','grade_name','process_name','sub_supplier_name','address','remarks','inspected_date','inspector','manager','product_adapt_to_dds2004','imds_id','millsheet','rohs_cd','rohs_hg','rohs_pb','rohs_cr','attach_soc','dimension_result','approved','checked','prepared');
        
      
        // jika memakai IS NULL pada where sql
        $isWhere = null;

        if ($_POST['searchByFromdate'] == '' || $_POST['searchByTodate'] == '') { //untuk pilihan date
           
            if($this->session->userdata('rolename')=='Administrator Quality'||$this->session->userdata('rolename')=='User Procurement'){ //Jika sebagai administrator maka akan tampil semua
                 $where  = array('transaction_date >' => '2020-01-01');
            }else{
                $where  = array('transaction_date >' => '2020-01-01','nik'=>$nik_session);//administrator menampilkan data dari tanggal berapa ke tanggal berapa
            }
           

        } else {

            if($this->session->userdata('rolename')=='Administrator Quality'){//Jika sebagai administrator maka akan tampil semua
                $where  = array('transaction_date >' => $_POST['searchByFromdate'], 'transaction_date <' => $_POST['searchByTodate']);//untuk pilihan date
            }else{
                $where  = array('transaction_date >' => $_POST['searchByFromdate'], 'transaction_date <' => $_POST['searchByTodate'],'nik'=>$nik_session);//untuk pilihan date
            }
           
        
        };

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');//header filter date
        echo $this->M_ISIR_information->get_tables_where($tables, $search, $where, $isWhere);//untuk get tables where
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
         $kode = 'ISIR-F-';//fungsi kode increnete
 
         // ********************* 0. Generate nomor transaksi  *********************         
         // var_dump($kode);           
         // date_default_timezone_set('Asia/Jakarta');//default tanggal timezone daerah
         // $mdate = $kode.mdate('%Y/%m/', time());//tanggal,bulan,tahun
         $hdrid2 = $this->M_ISIR_information->Max_data($kode, 'tb_ISIR_information')->row();//untuk max data
 
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

        $this->M_ISIR_information->Input_Data($post_datamerge, 'tb_ISIR_information');

        // ********************* 6. Upload file jika ada  *********************   
        // if (!empty($_FILES['file']['name'])) {
        //     $this->upload_file_attach('file', $hdrid, 'tb_ISIR_information');
        // }

        // **********************  Upload file attach file *********************   
        if(!empty($_FILES['millsheet']['name']))
        {
          $this->upload_file_attach('millsheet',$hdrid,'tb_ISIR_information');
        }
 if(!empty($_FILES['attach_soc']['name']))
        {
          $this->upload_file_attach('attach_soc',$hdrid,'tb_ISIR_information');
        }
 if(!empty($_FILES['dimension_result']['name']))
        {
          $this->upload_file_attach('dimension_result',$hdrid,'tb_ISIR_information');
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
        //     $this->upload_file_attach('file', $hdrid, 'tb_ISIR_information');
        // }

        // **********************  Upload file attach_picture  *********************   
        // **********************  Upload file attach file *********************   
        if(!empty($_FILES['millsheet']['name']))
        {
          $this->upload_file_attach('millsheet',$hdrid,'tb_ISIR_information');
        }
 if(!empty($_FILES['attach_soc']['name']))
        {
          $this->upload_file_attach('attach_soc',$hdrid,'tb_ISIR_information');
        }
 if(!empty($_FILES['dimension_result']['name']))
        {
          $this->upload_file_attach('dimension_result',$hdrid,'tb_ISIR_information');
        }
 
        
        
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge = array_merge($post_data, $post_data);

        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);
        $this->M_ISIR_information->Update_Data($where, $post_datamerge, 'tb_ISIR_information');

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
        // $inisisator_approver= $this->M_ISIR_information->cari_tb_approver($hdrid);

        $where = array('problem_id' => $hdrid,'nik' => $nik,'position_code' =>'1');      
        $post_data_approval = array('date_approve' => mdate('%Y-%m-%d %h:%i', time()));      
        $this->M_ISIR_information->Update_Data($where, $post_data_approval, 'tb_approval');

        // update responsible antisipasi jika ada kesalahan
        $this->M_ISIR_information->Update_Data_Approver($hdrid,$nik2);

        // cari approver
        $inisisator_approver= $this->M_ISIR_information->cari_tb_approver($hdrid);
          
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);

        $post_data = array('draft' => 'Send');
        $post_data2 = array('status' => 'Open');

        $post_data3 = array('status_transaction' => 'Waiting approve by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')');
        
        $post_datamerge = array_merge($post_data, $post_data2,$post_data3);

        // **********************  Upload file attach_picture  *********************   name2
        // **********************  Upload file attach file *********************   
        if(!empty($_FILES['millsheet']['name']))
        {
          $this->upload_file_attach('millsheet',$hdrid,'tb_ISIR_information');
        }
 if(!empty($_FILES['attach_soc']['name']))
        {
          $this->upload_file_attach('attach_soc',$hdrid,'tb_ISIR_information');
        }
 if(!empty($_FILES['dimension_result']['name']))
        {
          $this->upload_file_attach('dimension_result',$hdrid,'tb_ISIR_information');
        }
 
        


        
        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);
        $this->M_ISIR_information->Update_Data($where, $post_datamerge, 'tb_ISIR_information');

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
        $kodeB = $this->M_ISIR_information->get_product_by_id($product_id);
        $kode = $kodeB->report_no;

        // ********************* 0. Generate nomor transaksi  *********************         
        // var_dump($kode);           
        $mdate = $kode . mdate('%Y/%m/', time());
        $hdrid2 = $this->M_ISIR_information->Max_data($mdate, 'tb_ISIR_information')->row();

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
        $this->M_ISIR_information->Input_Data_Approver($post_data_transaction_date,$hdrid,$this->input->post('nik'),$this->input->post('name'),$this->input->post('section1'),$this->input->post('email1'),$this->input->post('nik2'),$this->input->post('name2'),$this->input->post('section2'),$this->input->post('email2'));
        
        $where = array('problem_id' => $hdrid,'position_code' =>'1');    
        $post_data_approval = array('date_approve' => mdate('%Y-%m-%d %h:%i', time()));
        $this->M_ISIR_information->Update_Data($where, $post_data_approval, 'tb_approval');
        
        // update tanggal approve inisiator
        $inisisator_approver= $this->M_ISIR_information->cari_tb_approver($hdrid);

        // Cari atasan  inisiator
        // $inisisator_approver= $this->M_ISIR_information->cari_tb_approver($hdrid);
        $post_data4 = array('status_transaction' => 'Waiting approve by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')');
       
        // $msg = "success save"; 

        // ********************* 4. Merge data post *********************        
        $post_datamerge = array_merge($post_data, $post_data2, $post_data3,$post_data_draft,$updateStatus,$post_data4);

        // ********************* 5. Simpan data     *********************

        $this->M_ISIR_information->Input_Data($post_datamerge, 'tb_ISIR_information');

        // **********************  Upload file attach_picture  *********************   
        // **********************  Upload file attach file *********************   
        if(!empty($_FILES['millsheet']['name']))
        {
          $this->upload_file_attach('millsheet',$hdrid,'tb_ISIR_information');
        }
 if(!empty($_FILES['attach_soc']['name']))
        {
          $this->upload_file_attach('attach_soc',$hdrid,'tb_ISIR_information');
        }
 if(!empty($_FILES['dimension_result']['name']))
        {
          $this->upload_file_attach('dimension_result',$hdrid,'tb_ISIR_information');
        }
 
        
 
        
        // NOTE:: LEMPAR HDRID KEDALAM TABLE LAIN
        $post_data4 = array('problem_id' => $hdrid);

        $post_datamerge2 = array_merge($post_data2, $post_data4);

        $this->M_ISIR_information->Input_Data($post_datamerge2, 'tb_response');

        $this->M_ISIR_information->Input_Data($post_datamerge2, 'tb_input_effectiveness');
        
        // ********************* 6. Upload file jika ada  *********************   
        if (!empty($_FILES['file']['name'])) {
            $this->upload_file_attach('file', $hdrid, 'tb_ISIR_information');
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
           $this->M_ISIR_information->Delete_Data($where,'tb_ISIR_information');//untuk delete table ISIR_information
           $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
           // return value array
           $this->output->set_content_type('application/json')->set_output(json_encode($data));
   
       }

         ///@see ajax_getbyhdrid1()
     ///@note fungsi digunakan untuk auto increnete
     ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
     function ajax_getbyhdrid1(){      

      $hdrid=$this->input->get('hdrid');//untuk auto increnete
      $data=$this->M_ISIR_information->ajax_getbyhdrid1($hdrid,'tb_ISIR_information')->row();//untuk request auto increnete
      echo json_encode($data);

  }


      ///@see get form_approver_link_mail
     ///@note fungsi digunakan memberi data ke email
     ///@attention 
     function form_approver_link_mail(){
        
      $id_user_reg=$this->input->get('var1'); //untuk menginput id username variable 1
      $nik=$this->input->get('var2'); //untuk menginput id username variable 2
      
      $data['get_approver']=$this->M_ISIR_information->get_approver($id_user_reg); //untuk request approve
  $data['get_requester']=$this->M_ISIR_information->get_requester($id_user_reg); //untuk request auto increnete
  $data['data']=$this->M_ISIR_information->get_data($id_user_reg); //untuk request nomor pcn
      
      $this->load->view('email/V_ISIR_information',$data); // Tampil data
    
  }

  ///@see upload_file_attach
    ///@note fungsi attach file bisa diupload
    ///@attention jika path atau ukuran file tidak sesuai function maka attach filenya tidak bisa terisi
    function upload_file_attach($filename,$hdrid,$table){

      if(!empty($_FILES[$filename]['name']))//jika data bisa attach file
      {
        
          $config['upload_path'] = './assets/upload/ISIR_information/';   //path file
          $config['allowed_types'] = 'gif|jpg|png|pdf|xlsx|xls';      //jenis file   
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
              $this->M_ISIR_information->Update_Data($where,$data_update,$table);

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
              redirect('C_ISIR_information');
  
      } else {
  
        $config['upload_path'] = './assets/excel/ISIR_information'; //untuk path import data
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

                        $kodeB = $this->M_ISIR_information->get_report_no(ucwords($value['C'])); //untuk mendapat nomor report
                        $kode = $kodeB->report_no;//kode report

                        $problem_category_id=$this->M_ISIR_information->get_hdrid('tb_problem_category','problem_category_name',ucwords($value['A']));//kode increnete problem category
                        $group_product_id=$this->M_ISIR_information->get_hdrid('tb_group_product','group_product_name',ucwords($value['B']));//kode increnete problem group product name
                        $product_id=$this->M_ISIR_information->get_hdrid('tb_product','product_name',ucwords($value['C']));//kode increnete product name
                        
                        // ********************* 0. Generate nomor transaksi  *********************
                        // var_dump($kode);
                        
                        $mdate = $kode . mdate('%Y/%m/', time()); //sesuai tanggal,bulan dan tahun untuk generate nomor
                        $hdrid2 = $this->M_ISIR_information->Max_data($mdate, 'tb_ISIR_information')->row();//max data table pcn

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
                        $resultData[$index]['process'] = ucwords($value['A']);		
                        $resultData[$index]['submital'] = ucwords($value['A']);		
                        $resultData[$index]['improvement_activity'] = ucwords($value['A']);		
                        $resultData[$index]['supplier_code'] = ucwords($value['A']);		
                        $resultData[$index]['supplier_name'] = ucwords($value['A']);		
                        $resultData[$index]['part_number'] = ucwords($value['A']);		
                        $resultData[$index]['part_name'] = ucwords($value['A']);		
                        $resultData[$index]['tooling_no'] = ucwords($value['A']);		
                        $resultData[$index]['cavity_number'] = ucwords($value['A']);		
                        $resultData[$index]['assy_no'] = ucwords($value['A']);		
                        $resultData[$index]['assy_name'] = ucwords($value['A']);		
                        $resultData[$index]['material_manufacture'] = ucwords($value['A']);		
                        $resultData[$index]['grade_name'] = ucwords($value['A']);		
                        $resultData[$index]['process_name'] = ucwords($value['A']);		
                        $resultData[$index]['sub_supplier_name'] = ucwords($value['A']);		
                        $resultData[$index]['address'] = ucwords($value['A']);		
                        $resultData[$index]['remarks'] = ucwords($value['A']);		
                        $resultData[$index]['inspected_date'] = ucwords($value['A']);		
                        $resultData[$index]['inspector'] = ucwords($value['A']);		
                        $resultData[$index]['manager'] = ucwords($value['A']);		
                        $resultData[$index]['product_adapt_to_dds2004'] = ucwords($value['A']);		
                        $resultData[$index]['imds_id'] = ucwords($value['A']);		
                        $resultData[$index]['millsheet'] = ucwords($value['A']);		
                        $resultData[$index]['rohs_cd'] = ucwords($value['A']);		
                        $resultData[$index]['rohs_hg'] = ucwords($value['A']);		
                        $resultData[$index]['rohs_pb'] = ucwords($value['A']);		
                        $resultData[$index]['rohs_cr'] = ucwords($value['A']);		
                        $resultData[$index]['attach_soc'] = ucwords($value['A']);		
                        $resultData[$index]['dimension_result'] = ucwords($value['A']);		
                        $resultData[$index]['approved'] = ucwords($value['A']);		
                        $resultData[$index]['checked'] = ucwords($value['A']);		
                        $resultData[$index]['prepared'] = ucwords($value['A']);		
                        
    
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
                        $this->M_ISIR_information->get_superior1(ucwords($value['P']),'2','Inisiator Approver',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_ISIR_information->get_superior1(ucwords($value['P']),'7','Inisiator approver after response check',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_ISIR_information->get_superior2(ucwords($value['S']),'4','Responsible Approver 1',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_ISIR_information->get_superior2(ucwords($value['S']),'5','Responsible Approver 2',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));

                        $this->M_ISIR_information->insert_batch('tb_ISIR_information', $resultData);
                        $this->M_ISIR_information->insert_batch('tb_approval', $resultApprover);

                        $post_data = array('hdrid' => $hdrid,'problem_id' => $hdrid,'transaction_date'=> mdate('%Y-%m-%d', time()));
                        $this->M_ISIR_information->Input_Data($post_data, 'tb_response');
                        $this->M_ISIR_information->Input_Data($post_data, 'tb_input_effectiveness');

                        // $index = 0;
                        $index_approver = 0;

                    }

                    $row++;
                }

                unlink('./assets/excel/' . $data['file_name']);//path untuk tampilan import data berupa excel


                if (count($resultData) != 0) {

                    // $result = $this->M_ISIR_information->insert_batch('tb_ISIR_information', $resultData);
                    // $result3 = $this->M_ISIR_information->insert_batch('tb_approval', $resultApprover);
                    // if ($result > 0) {
                    //     // $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
                    //     redirect('C_ISIR_information');
                    // }
                    
                     redirect('C_ISIR_information');
                } else {
                    // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                    redirect('C_ISIR_information');
                }
            }
        }
    }

    

    /** ---------------------------------------------- /Close controller----------------------------------------------**/
}

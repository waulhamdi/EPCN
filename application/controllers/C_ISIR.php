<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ISIR extends CI_Controller
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
    /** ---------------------------------------------- ISIR----------------------------------------------**/
     
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
        $this->load->model('M_ISIR');
        $this->load->model('UserModel');  //untuk load user model hak akses menu  
        // // $this->load->library('encrypt');  

        // Cari hak akses by controller
	    $Hak_akses = $this->UserModel->get_controller_access($this->session->userdata('role_id'),'C_ISIR'); 
	    if($Hak_akses->found!='found') {
		    redirect('Auth'); // Kembali ke halaman Auth
	    }
    }

    	///@see Index()
     ///@note fungsi digunakan untuk select filter dan template
     ///@attention jika select filter tidak sesuai dengan data table maka filter tidak aktif
    public function Index()
    {
                
        $data['status'] = ['Accepted','Unaccepted','Deviation Item(Temp.Dev)','Die Deviation(Permanent Dev)'];//select filter temporary and fullscale
      
        $data['user'] =$this->M_ISIR->Tampil_user();

        // $data['isir'] = $this->M_ISIR->getISIR();

        // External link filter
        $data['Number'] = '';
        if (isset($_GET['Number'])) {
            $data['Number'] = $_GET['Number'];
        }
        
        $menu_code = $this->input->get('var');                  // Decrypt menu ID   untuk dekrip menu   
        $menu_name = $this->input->get('var2');                 // Decrypt menu ID   untuk dekrip menu name  
        $data['menu_name'] =  $menu_name; 
        $menu_akses['menu_akses']=$this->UserModel->get_menu_access($this->session->userdata('role_id'));           //Menu akses untuk munculkan menu   
        $data['hak_akses']=$this->UserModel->get_hak_access($this->session->userdata('role_id'), $menu_code);       //button akses(Add,Adit,View,Delete,Import,Export)
        // var_dump($data['hak_akses']);
        $this->load->view('templates/header'); //Tampil header
        $this->load->view('templates/sidebar_new',$menu_akses); //Tampil Sidebar        
        // $this->load->view('ISIR/V_ISIR',$data); // Tampil data
        $this->load->view('ISIR/V_ISIR', $data); // Tampil data
        $this->load->view('templates/footer'); //Tampil footer



    }

   ///@see get view_data()
     ///@note fungsi digunakan untuk menampilkan data
     ///@attention
    function view_data()
    {
        $nik_session = $this->session->userdata('user_name');

        $tables = "tb_isir_list";
        $search = array('hdrid','transaction_date','no_isir','isir','isir_imp','submit_date','pic_pro','qc_result','qc_submit_date','pic_qc','remark','status');
        
      
 

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_ISIR->get_tables($tables, $search, $isWhere);
    }

    ///@see view_data_where()
    ///@note fungsi digunakan untuk mencari dan menampilkan data 
    ///@attention
    function view_data_where()
    {
        $nik = $this->session->userdata('user_name');
        $tables = "tb_isir_list";


        $search = array('hdrid','transaction_date','no_isir','isir','isir_imp','submit_date','pic_pro','qc_result','qc_submit_date','pic_qc','remark','status');
        
      
        // jika memakai IS NULL pada where sql
        $isWhere = null;

        if ($_POST['searchByFromdate'] == '' || $_POST['searchByTodate'] == '') { //untuk pilihan date
                 $where  = array('transaction_date >' => '2020-01-01');
        } else {
                $where  = array('transaction_date >' => $_POST['searchByFromdate'], 'transaction_date <' => $_POST['searchByTodate']);//untuk pilihan date
        };

        if ($_POST['Number'] !='') { // due_date -2 filter
            $where = array('hdrid'=> $_POST['Number']);
        }

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');//header filter date
        echo $this->M_ISIR->get_tables_where($tables, $search, $where, $isWhere);//untuk get tables where
    }

    /// @see Ajax_Add_Row()
    /// @note Tambah data ISIR
    /// @attention 
    function Ajax_Add_Row(){      

        $creator=$this->session->userdata('user_name');
        $hdridm=$this->input->post('hdrid'); //mengambil dari hdrid
        $hdrid2=$this->M_ISIR->Max_data_isir($hdridm,'tb_isir')->row();   // Mengambil row dari database
        // var_dump($hdrid2->no_cicilan);      
        $kode='T';  
        if ($hdrid2->no_isir==NULL){ // Jika HDRID belum ada
           $no_cil=$kode ."01"; // Maka mulai dari 001
        }else{
           $hdrid3=$hdrid2->no_isir; // Jika sudah ada 
           $str = intval(substr($hdrid3, strlen($kode), 2)) + 1;
           $str = str_pad($str, 2, "0", STR_PAD_LEFT);
           $no_cil = $kode . $str;

        }
        $no_isir=$no_cil;  // Deklarasi $hdrid = $hdrid3
        $post_data = array('hdrid' =>$hdridm ,'transaction_date' => mdate('%Y-%m-%d',time()),'no_isir' => $no_isir,'pic_pro'=>$creator,'pic_qc'=>'DM1901091','cc_to1'=>'DM1901004','cc_to2'=>'DM1901762');
        // ********************* 4. Merge data post *********************        
        $post_datamerge=array_merge($post_data,$post_data); // Menggabungkan semua data 

        // ********************* 5. Simpan data     *********************
        $this->M_ISIR->Input_Data($post_datamerge,'tb_isir'); // Mengirim parameter ke model untuk query 

        $data['status']= $no_isir; // Menarik dan menampung $msg menjadi status

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data)); // Memberi tahu browser bahwa data dalam bentuk format json

    }

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
         $hdrid2 = $this->M_ISIR->Max_data($kode, 'tb_isir')->row();//untuk max data
 
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
        $nik= $this->session->userdata('user_name'); // Menarik username dari session dan menampung nya sebagai nik
        $post_data = array('pic_pro' => $nik );


        $msg = "success save" ;

        // ********************* 4. Merge data post *********************        
        $post_datamerge = array_merge( $post_data,$post_data2, $post_data3);

        // ********************* 5. Simpan data     *********************

        $this->M_ISIR->Input_Data($post_datamerge, 'tb_isir');

        $data['status'] = $msg;//status
        $data['hdrid'] = $hdrid;//code incnrenete

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
        //     $this->upload_file_attach('file', $hdrid, 'tb_isir');
        // }

        // **********************  Upload file attach_picture  *********************   
        // **********************  Upload file attach file *********************   
        if(!empty($_FILES['millsheet']['name']))
        {
          $this->upload_file_attach('millsheet',$hdrid,'tb_isir');
        }
        if(!empty($_FILES['attach_soc']['name']))
        {
          $this->upload_file_attach('attach_soc',$hdrid,'tb_isir');
        }
        if(!empty($_FILES['dimension_result']['name']))
        {
          $this->upload_file_attach('dimension_result',$hdrid,'tb_isir');
        }
 
        
        
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge = array_merge($post_data, $post_data);

        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);
        $this->M_ISIR->Update_Data($where, $post_datamerge, 'tb_isir');

        $data['status'] = "berhasil update";

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


    /// @see ajax_update_isir()
    /// @note Update cicilan
    /// @attention Update cicilan berdasarkan no cicilan,hdrid
    public function ajax_update_isir()
	{

         // ********************* 1. Collect data post *********************
        $post_data=$this->input->post();
        
        $hdrid=$this->input->post('hdrid'); // Tarik data input post hdrid
        $no_isir=$this->input->post('no_isir'); // Tarik data input post hdrid
        $remark=$this->input->post('remark'); // Tarik data input post hdrid
        $isir=$this->input->post('isir'); // Tarik data input post hdrid
        $isir_imp=$this->input->post('isir_imp'); // Tarik data input post hdrid
        $qc_result=$this->input->post('qc_result'); // Tarik data input post hdrid
        $status=$this->input->post('status'); // Tarik data input post hdrid

        if(!empty($_FILES['isir']['name']))
            {
                $this->upload_file_attach('isir',$hdrid,$no_isir,'tb_isir');
            }
        if(!empty($_FILES['isir_imp']['name']))
            {
                $this->upload_file_attach('isir_imp',$hdrid,$no_isir,'tb_isir');
            }
        if(!empty($_FILES['qc_result']['name']))
            {
                $this->upload_file_attach('qc_result',$hdrid,$no_isir,'tb_isir');
            }
        if(!empty($_FILES['deviasi']['name']))
            {
                $this->upload_file_attach('deviasi',$hdrid,$no_isir,'tb_isir');
            }
        if(!empty($_FILES['deviasi_result']['name']))
            {
                $this->upload_file_attach('deviasi_result',$hdrid,$no_isir,'tb_isir');
            }

        // *********************  Merge data All post *********************
        if ($status == 'Unaccepted') {
            $kode = 'T';//fungsi kode increnete
            $str = intval(substr($no_isir, strlen($kode), 2)) + 1;
            $str = str_pad($str, 2, "0", STR_PAD_LEFT);
            $no_cil = $kode . $str;
            $where = array('hdrid' => $hdrid);// Buat kondisi where untuk dikirim ke model   
            $data = array('status' => "$no_isir Unaccepted On Progress $no_cil",'remark'=>$remark);
            $this->M_ISIR->Update_Data($where,$data,'tb_isir_list');// Buat kondisi where untuk dikirim ke model
        } else if ($status=='Accepted' || $status=='Deviation Item(Temp.Dev)' || $status=='Die Deviation(Permanent Dev)') {
            $where = array('hdrid' => $hdrid);// Buat kondisi where untuk dikirim ke model   
            $data = array('status_isir' =>'Closed','status' => "$no_isir $status ISIR Complete",'remark'=>$remark);
            $this->M_ISIR->Update_Data($where,$data,'tb_isir_list');// Buat kondisi where untuk dikirim ke model
        }
        // ,'isir' => '','isir_imp' => '','qc_result' => ''
        // $post_data = array('remark' => $remark,'status' => $status);
        $post_datamerge=array_merge($post_data,$post_data);//menggabungkan semua data
        $post_data_transaction_date = mdate('%Y-%m-%d', time()); // menampung tahun bulan hari jam 


        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid,'no_isir' => $no_isir);// Buat kondisi where untuk dikirim ke model   
        $this->M_ISIR->Update_Data($where,$post_datamerge,'tb_isir');// Buat kondisi where untuk dikirim ke model
        $data['status'] = $hdrid; // Menarik dan menampung $msg menjadi status
        $data['hdrid'] = $hdrid; // Menarik dan menampung $msg menjadi status
        $data['no_isir'] = $no_isir; // Menarik dan menampung $msg menjadi status

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));// Mengembalikan nilai data format json

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
        // $inisisator_approver= $this->M_ISIR->cari_tb_approver($hdrid);

        $where = array('problem_id' => $hdrid,'nik' => $nik,'position_code' =>'1');      
        $post_data_approval = array('date_approve' => mdate('%Y-%m-%d %h:%i', time()));      
        $this->M_ISIR->Update_Data($where, $post_data_approval, 'tb_approval');

        // update responsible antisipasi jika ada kesalahan
        $this->M_ISIR->Update_Data_Approver($hdrid,$nik2);

        // cari approver
        $inisisator_approver= $this->M_ISIR->cari_tb_approver($hdrid);
          
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
          $this->upload_file_attach('millsheet',$hdrid,'tb_isir');
        }
 if(!empty($_FILES['attach_soc']['name']))
        {
          $this->upload_file_attach('attach_soc',$hdrid,'tb_isir');
        }
 if(!empty($_FILES['dimension_result']['name']))
        {
          $this->upload_file_attach('dimension_result',$hdrid,'tb_isir');
        }
 
        


        
        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);
        $this->M_ISIR->Update_Data($where, $post_datamerge, 'tb_isir');

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
        $kodeB = $this->M_ISIR->get_product_by_id($product_id);
        $kode = $kodeB->report_no;

        // ********************* 0. Generate nomor transaksi  *********************         
        // var_dump($kode);           
        $mdate = $kode . mdate('%Y/%m/', time());
        $hdrid2 = $this->M_ISIR->Max_data($mdate, 'tb_isir')->row();

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
        $this->M_ISIR->Input_Data_Approver($post_data_transaction_date,$hdrid,$this->input->post('nik'),$this->input->post('name'),$this->input->post('section1'),$this->input->post('email1'),$this->input->post('nik2'),$this->input->post('name2'),$this->input->post('section2'),$this->input->post('email2'));
        
        $where = array('problem_id' => $hdrid,'position_code' =>'1');    
        $post_data_approval = array('date_approve' => mdate('%Y-%m-%d %h:%i', time()));
        $this->M_ISIR->Update_Data($where, $post_data_approval, 'tb_approval');
        
        // update tanggal approve inisiator
        $inisisator_approver= $this->M_ISIR->cari_tb_approver($hdrid);

        // Cari atasan  inisiator
        // $inisisator_approver= $this->M_ISIR->cari_tb_approver($hdrid);
        $post_data4 = array('status_transaction' => 'Waiting approve by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')');
       
        // $msg = "success save"; 

        // ********************* 4. Merge data post *********************        
        $post_datamerge = array_merge($post_data, $post_data2, $post_data3,$post_data_draft,$updateStatus,$post_data4);

        // ********************* 5. Simpan data     *********************

        $this->M_ISIR->Input_Data($post_datamerge, 'tb_isir');

        // **********************  Upload file attach_picture  *********************   
        // **********************  Upload file attach file *********************   
        if(!empty($_FILES['millsheet']['name']))
        {
          $this->upload_file_attach('millsheet',$hdrid,'tb_isir');
        }
 if(!empty($_FILES['attach_soc']['name']))
        {
          $this->upload_file_attach('attach_soc',$hdrid,'tb_isir');
        }
 if(!empty($_FILES['dimension_result']['name']))
        {
          $this->upload_file_attach('dimension_result',$hdrid,'tb_isir');
        }
 
        
 
        
        // NOTE:: LEMPAR HDRID KEDALAM TABLE LAIN
        $post_data4 = array('problem_id' => $hdrid);

        $post_datamerge2 = array_merge($post_data2, $post_data4);

        $this->M_ISIR->Input_Data($post_datamerge2, 'tb_response');

        $this->M_ISIR->Input_Data($post_datamerge2, 'tb_input_effectiveness');
        
        // ********************* 6. Upload file jika ada  *********************   
        if (!empty($_FILES['file']['name'])) {
            $this->upload_file_attach('file', $hdrid, 'tb_isir');
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
           $this->M_ISIR->Delete_Data($where,'tb_isir_list');//untuk delete table ISIR
           $this->M_ISIR->Delete_Data($where,'tb_isir');//untuk delete table ISIR
           $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
           // return value array
           $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }



    /// @see ajax_delete_isir()
    /// @note Delete Data
    /// @attention Delete data berdasarkan hdrid
    public function ajax_delete_isir() //function untuk delete
	{

        $where = array('hdrid' => $this->input->post('hdrid'),'no_isir' => $this->input->post('no_isir')); // Buat array untuk kondisi where di query model 
        $this->M_ISIR->Delete_Data($where,'tb_isir'); // Mengirim param ke model untuk query delete

        $data['status']="berhasil dihapus"; //pesan saat berhasil dihapus
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data)); // mengembalikkan nilai dari format json

    }

    ///@see ajax_getbyhdrid1()
    ///@note fungsi digunakan untuk auto increnete
    ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
    function ajax_getbyhdrid1(){      

      $hdrid=$this->input->get('hdrid');//untuk auto increnete
      $data=$this->M_ISIR->ajax_getbyhdrid1($hdrid,'tb_isir')->row();//untuk request auto increnete
      echo json_encode($data);

    }

   


    ///@see upload_file_attach
    ///@note fungsi attach file bisa diupload
    ///@attention jika path atau ukuran file tidak sesuai function maka attach filenya tidak bisa terisi
    function upload_file_attach($filename,$hdrid,$no_isir,$table){

      if(!empty($_FILES[$filename]['name']))//jika data bisa attach file
      {
        
          $config['upload_path'] = './assets/upload/ISIR/';   //path file
          $config['allowed_types'] = 'gif|jpg|png|pdf|xlsx|xls';      //jenis file   
          $config['overwrite'] = True; //jika file sudah bisa masuk path
          $config['max_size']  = '2000';//maxsimal upload
          $config['max_width']  = '1024'; //maksimal lebar form
          $config['max_height']  = '768'; //maskimal tinggi form
          $config['file_name']=$hdrid.$no_isir.'_'.$filename; //untuk upload attach file
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
             
              $where = array('hdrid' => $hdrid,'no_isir' => $no_isir);  //untuk update auto increnete      
              $this->M_ISIR->Update_Data($where,$data_update,$table);

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
              redirect('C_ISIR');
  
      } else {
  
        $config['upload_path'] = './assets/excel/ISIR'; //untuk path import data
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

                        $kodeB = $this->M_ISIR->get_report_no(ucwords($value['C'])); //untuk mendapat nomor report
                        $kode = $kodeB->report_no;//kode report

                        $problem_category_id=$this->M_ISIR->get_hdrid('tb_problem_category','problem_category_name',ucwords($value['A']));//kode increnete problem category
                        $group_product_id=$this->M_ISIR->get_hdrid('tb_group_product','group_product_name',ucwords($value['B']));//kode increnete problem group product name
                        $product_id=$this->M_ISIR->get_hdrid('tb_product','product_name',ucwords($value['C']));//kode increnete product name
                        
                        // ********************* 0. Generate nomor transaksi  *********************
                        // var_dump($kode);
                        
                        $mdate = $kode . mdate('%Y/%m/', time()); //sesuai tanggal,bulan dan tahun untuk generate nomor
                        $hdrid2 = $this->M_ISIR->Max_data($mdate, 'tb_isir')->row();//max data table pcn

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
                        $this->M_ISIR->get_superior1(ucwords($value['P']),'2','Inisiator Approver',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_ISIR->get_superior1(ucwords($value['P']),'7','Inisiator approver after response check',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_ISIR->get_superior2(ucwords($value['S']),'4','Responsible Approver 1',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_ISIR->get_superior2(ucwords($value['S']),'5','Responsible Approver 2',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));

                        $this->M_ISIR->insert_batch('tb_isir', $resultData);
                        $this->M_ISIR->insert_batch('tb_approval', $resultApprover);

                        $post_data = array('hdrid' => $hdrid,'problem_id' => $hdrid,'transaction_date'=> mdate('%Y-%m-%d', time()));
                        $this->M_ISIR->Input_Data($post_data, 'tb_response');
                        $this->M_ISIR->Input_Data($post_data, 'tb_input_effectiveness');

                        // $index = 0;
                        $index_approver = 0;

                    }

                    $row++;
                }

                unlink('./assets/excel/' . $data['file_name']);//path untuk tampilan import data berupa excel


                if (count($resultData) != 0) {

                    // $result = $this->M_ISIR->insert_batch('tb_isir', $resultData);
                    // $result3 = $this->M_ISIR->insert_batch('tb_approval', $resultApprover);
                    // if ($result > 0) {
                    //     // $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
                    //     redirect('C_ISIR');
                    // }
                    
                     redirect('C_ISIR');
                } else {
                    // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                    redirect('C_ISIR');
                }
            }
        }
    }


      /// @see View_detail_isir()
      /// @note Tampil List ISIR
      /// @attention Menampilkan list ISIR berdasarkan hdrid di view 
      function View_detail_isir()
      {
          
          $tables = "tb_isir"; // Table yang digunakan     
          
          // $nikSession=$this->session->userdata('user_name');
          
          $hdrid = $this->input->post('hdrid'); // Tarik input post hdrid
          $search = array('hdrid','transaction_date','isir','isir_imp','submit_date','pic_pro','qc_result','qc_submit_date','pic_qc','remark','status','deviasi','deviasi_result');
          
  
          $where  = array('hdrid' => $hdrid); // Array untuk menjadi kondisi yang akan dikirimkan ke model
          
          $isWhere = null; // Jika memakai IS NULL pada where sql
          // $isWhere = 'artikel.deleted_at IS NULL';
          header('Content-Type: application/json'); // Memberi tahu browser bahwa data dalam bentuk format json
          echo $this->M_ISIR->get_tables_where($tables, $search, $where, $isWhere); // Mengambil data dari database
      }

      /// @see ajax_getbyisir()
      /// @note Mencari data berdasarkan hdrid
      /// @attention Untuk data field ketika view modal(View,Update)
      function ajax_getbyisir(){      

        $hdrid=$this->input->get('hdrid'); //mengambil dari hdrid
        $no_isir=$this->input->get('no_isir'); //mengambil dari hdrid
        // $No_cicilan=$this->input->get('=='); //mengambil dari hdrid
      
        $data=$this->M_ISIR->ajax_getbyisir($hdrid,$no_isir,'tb_isir')->row();// Mengirim param ke model untuk query 
        echo json_encode($data);// mengembalikkan nilai dari format daTA json

    }

    

    /** ---------------------------------------------- /Close controller----------------------------------------------**/
}

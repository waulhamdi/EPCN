<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PCNLIST extends CI_Controller {

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
     /** ---------------------------------------------- PCNLIST----------------------------------------------**/

     ///@see __construct()
     ///@note fungsi digunakan untuk username masuk web
     ///@attention
     public function __construct(){
        parent::__construct();   

        if ($this->session->userdata('user_name')=="") { /// jika user memasukkan username benar maka login bisa masuk
			redirect('Auth');
		}

        $this->load->helper('date');//untuk mengoneksi ke tanggal masuk login
        $this->load->helper('file'); //untuk mengoneksi ke data       
        $this->load->model('M_PCNLIST');//untuk mengoneksi ke tanggal masuk model PCN LIST
        $this->load->model('M_PCN');//untuk mengoneksi ke tanggal masuk model PCN
        $this->load->model('UserModel');  //untuk load user model hak akses menu  
        // $this->load->library('encrypt');    

        // Cari hak akses by controller
        $Hak_akses = $this->UserModel->get_controller_access($this->session->userdata('role_id'),'C_PCNLIST'); 
        if($Hak_akses->found!='found') {
          redirect('Auth'); // Kembali ke halaman Auth
        }
                  
      }

     ///@see Index()
     ///@note fungsi digunakan untuk select filter dan template
     ///@attention jika select filter tidak sesuai dengan data table maka filter tidak aktif
	public function Index()
	{
        // untuk select filter

        $data['no_dokumen'] = $this->M_PCNLIST->no_dokumen(); //untuk select filter supplier name    
        $data['nama_supplier'] = $this->M_PCNLIST->no_dokumen(); //untuk select filter supplier name
        $data['category'] = ['group','part']; //untuk select filter category
         // External link filter
         $data['Number'] = '';
         if (isset($_GET['Number'])) {
             $data['Number'] = $_GET['Number'];
         }
 
        // $this->parser->set_partial('modal','folder_lain/modal');
        $menu_code = $this->input->get('var');                  // Decrypt menu ID   untuk dekrip menu   
        $menu_name = $this->input->get('var2');                 // Decrypt menu ID   untuk dekrip menu name  
        $data['menu_name'] =  $menu_name; 
        $menu_akses['menu_akses']=$this->UserModel->get_menu_access($this->session->userdata('role_id'));           //Menu akses untuk munculkan menu   
        $data['hak_akses']=$this->UserModel->get_hak_access($this->session->userdata('role_id'), $menu_code);       //button akses(Add,Adit,View,Delete,Import,Export)
       

        // // $data['PCNLIST'] = $this->M_PCNLIST->Tampil_Data();
        $this->load->view('templates/header'); //Tampil header
        $this->load->view('templates/sidebar_new',$menu_akses); //Tampil Sidebar
        // // $this->load->view('PCNLIST/V_PCNLIST',$data); // Tampil data
        $this->load->view('PCNLIST/V_PCNLIST',$data); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer
               
    }

    //  ///@see view_data()
    //  ///@note fungsi digunakan untuk menampilkan data
    //  ///@attention
    //  function view_data()
    //  {
    //   $tables = "tb_PCNlist";
    //   $search = array('no_dokumen','status','category','supplier_name','product_name','part_name','part_no','description','proses_perubahan_lama','proses_perubahan_baru','current_flow_pic','pic_proc','commodity','qa_pic','registered','masspro_schedule');
      
    //   // jika memakai IS NULL pada where sql
    //   $isWhere = null;

    //   // $isWhere = 'artikel.deleted_at IS NULL';
    //   header('Content-Type: application/json');
    //   echo $this->M_PCNLIST->get_tables($tables,$search,$isWhere);//untuk data table pcnlist controller connect ke model
    //  }
     

    ///@see view_data_where()
    ///@note fungsi digunakan untuk mencari dan menampilkan data 
    ///@attention
    public function view_data_where()
    {
      $tables = "tb_PCNlist";//untuk menampilkan table pcnlist ke database
      $search = array('no_dokumen','status','category','supplier_name','product_name','part_name','part_no','description','proses_perubahan_lama','proses_perubahan_baru','current_flow_pic','pic_proc','commodity','qa_pic','registered','masspro_schedule','isir','qcr','report_pe');//untuk data table pcnlist bisa masuk sesuai input
      //untuk menampilkan masuk sesuai input
      
        
        // jika memakai IS NULL pada where sql
        if($_POST['searchByFromdate']==''||$_POST['searchByTodate']==''){//Jika sebagai administrator maka akan tampil semua
            $where  = array('transaction_date >'=>''); //menunjukkan tanggal transaksi             
        }else{
            $where  = array('transaction_date >' => $_POST['searchByFromdate'],'transaction_date <' => $_POST['searchByTodate']);//menunjukkan tanggal transaksi
        };
        if ($_POST['Number'] !='') { // due_date -2 filter
          $where = array('no_dokumen'=> $_POST['Number']);
        }

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_PCNLIST->get_tables_where($tables,$search,$where,$isWhere);//untuk data table pcnlist controller connect ke model
        
    }

      ///@see view_data_query()
    ///@note fungsi digunakan untuk query data 
    ///@attention 
    function view_data_query()
    {

        $query  = "SELECT kategori.name_kategori AS name_kategori, subkat.* FROM subkat  
                    JOIN kategori ON subkat.id_kategori = kategori.id_kategori"; //untuk query table kategori
        $search = array('name_kategori','subkat','tgl_add');//untuk mencari data table kategori
        $where  = null; //jika data diinput maka kosong


        // $where  = array('name_kategori' => 'Tutorial');
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_Datatables->get_tables_query($query,$search,$where,$isWhere); //untuk data table pcnlist controller connect ke model

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
        // $kodeB = $this->M_PCN->get_product_by_id($product_id);//add data connect ke model
        // $kode = $kodeB->report_no;//fungsi kode increnete
        $kode = 'PCN-F-';//fungsi kode increnete

        // ********************* 0. Generate nomor transaksi  *********************         
        // var_dump($kode);           
        date_default_timezone_set('Asia/Jakarta');//default tanggal timezone daerah
        // $mdate = $kode.mdate('%Y/%m/', time());//tanggal,bulan,tahun
        $no_dokumen2 = $this->M_PCNLIST->Max_data($kode, 'tb_PCNlist')->row();//untuk max data

        if ($no_dokumen2->no_dokumen == NULL) {
            // Jika belum ada maka tidak bisa diisi
            $no_dokumen3 = $kode . "001";
        } else {
            $no_dokumen3 = $no_dokumen2->no_dokumen;
            // Jika sudah ada maka naik 1 level
            $str = intval(substr($no_dokumen3, strlen($kode), 3)) + 1;
            $str = str_pad($str, 3, "0", STR_PAD_LEFT);
            $no_dokumen3 = $kode . $str;
        }
        $no_dokumen=$no_dokumen3;
       
        // ********************* 1. Set no_dokumen  *********************
        $post_data2=array('no_dokumen'=>$no_dokumen3);

        // ********************* 2. Transaction date  *********************
        $post_data3=array('transaction_date'=>mdate('%Y-%m-%d',time()));
                
         // ******************** 3. Collect all data post *********************     
        $post_data = $this->input->post();   

        $msg = "success save";
              
        // ********************* 4. Merge data post *********************        
        $post_datamerge=array_merge($post_data,$post_data2,$post_data3);

        // ********************* 5. Simpan data     *********************

        $this->M_PCNLIST->Input_Data($post_datamerge,'tb_PCNlist');

        // ********************* 6. Upload file jika ada  *********************   
        if(!empty($_FILES['attachment']['name']))
        {
          $this->upload_file_attach('attachment',$no_dokumen,'tb_PCNlist');
        }
        if(!empty($_FILES['attachment1']['name']))
        {
          $this->upload_file_attach('attachment1',$no_dokumen,'tb_PCNlist');
        }
        if(!empty($_FILES['attachment2']['name']))
        {
          $this->upload_file_attach('attachment2',$no_dokumen,'tb_PCNlist');
        }
        if(!empty($_FILES['attachment3']['name']))
        {
          $this->upload_file_attach('attachment3',$no_dokumen,'tb_PCNlist');
        }

        $data['status']= $msg; //cek status

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    

     ///@see ajax_update()
     ///@note fungsi digunakan untuk update data
     ///@attention
    public function ajax_update()
	{

         // ********************* 1. Collect data post *********************
        $post_data = $this->input->post(); //untuk parameter update
        $no_dokumen=$this->input->post('no_dokumen');//untuk parameter update tapi number auto increnete tetap tidak berubah
        $hdrid=$this->input->post('hdrid');//untuk parameter update tapi number auto increnete tetap tidak berubah
       
        $msg = "success Update"; //jika sudah diupdate maka berhasil

        // ********************* Input Approver Kedalam TB Approval *********************
        // $this->M_PCNLIST->Input_Data_proc($this->input->post('supplier_name'),$no_dokumen);
        // $this->M_PCNLIST->Input_Data_finalproc($this->input->post('supplier_name'),$no_dokumen);
        // $this->M_PCNLIST->Input_Data_qa($this->input->post('product_name'),$no_dokumen);
        // $this->M_PCNLIST->Input_Data_finalqa($this->input->post('product_name'),$no_dokumen);

        // **********************  Upload file (filename,no_dokumen,table)  *********************   
        if(!empty($_FILES['attachment']['name']))
        {
          $this->upload_file_attach('attachment',$no_dokumen,'tb_PCNlist');
        }
        if(!empty($_FILES['attachment1']['name']))
        {
          $this->upload_file_attach('attachment1',$no_dokumen,'tb_PCNlist');
        }
        if(!empty($_FILES['attachment2']['name']))
        {
          $this->upload_file_attach('attachment2',$no_dokumen,'tb_PCNlist');
        }
        if(!empty($_FILES['attachment3']['name']))
        {
          $this->upload_file_attach('attachment3',$no_dokumen,'tb_PCNlist');
        }
        if(!empty($_FILES['isir']['name']))
        {
          $this->upload_file_attach('isir',$no_dokumen,'tb_PCNlist');
        }
        if(!empty($_FILES['qcr']['name']))
        {
          $this->upload_file_attach('qcr',$no_dokumen,'tb_PCNlist');
        }
        if(!empty($_FILES['report_pe']['name']))
        {
          $this->upload_file_attach('report_pe',$no_dokumen,'tb_PCNlist');
        }
          
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data);

        // **********************  Simpan data ************************        
        $where = array('no_dokumen' => $no_dokumen);//mencari data sudah diupdate        
        $where_PCN = array('hdrid' => $hdrid);//mencari data sudah diupdate        
        $this->M_PCNLIST->Update_Data($where,$post_datamerge,'tb_PCNlist');//untuk merge data sudah diupdate
        // $this->M_PCNLIST->Update_Data($where_PCN,$post_datamerge,'tb_PCN');//untuk merge data sudah diupdate

        $data['status']="berhasil update";//jika data sudah berhasil diupdate

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

     ///@see ajax_delete()
     ///@note fungsi digunakan untuk delete data
     ///@attention
    public function ajax_delete()
	{
        $where = array('no_dokumen' => $this->input->post('no_dokumen'));//untuk delete auto increnete
        $where0 = array('problem_id' =>$this->input->post('no_dokumen'));
        $where1 = array('hdrid' => $this->input->post('no_dokumen'));//untuk delete auto increnete
        $this->M_PCNLIST->Delete_Data($where,'tb_PCNlist');//untuk delete table PCNLIST
        $this->M_PCNLIST->Delete_Data($where0,'tb_approval');//untuk delete table PCN
        $this->M_PCNLIST->Delete_Data($where1,'tb_PCN');//untuk delete table PCN
        $this->M_PCNLIST->Delete_Data($where1,'tb_application');//untuk delete table PCN
        $this->M_PCN->Delete_Data($where,'tb_isir');//untuk delete table PCN
        $this->M_PCN->Delete_Data($where,'tb_isir_list');//untuk delete table PCN
        $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
     ///@see ajax_delete_attachment()
     ///@note fungsi digunakan untuk delete data
     ///@attention
    public function ajax_delete_attachment()
	{
        $where = array('no_dokumen' => $this->input->post('no_dokumen'));//untuk delete auto increnete

        if ($this->input->post('attachment')=='1') {
          $data = array('attachment' => '');
        }else if($this->input->post('attachment')=='2'){
          $data = array('attachment1' => '');
        }else if($this->input->post('attachment')=='3'){
          $data = array('attachment2' => '');
        }else if($this->input->post('attachment')=='4'){
          $data = array('attachment3' => '');
        }else if($this->input->post('attachment')=='5'){
          $data = array('isir' => '');
        }else if($this->input->post('attachment')=='6'){
          $data = array('qcr' => '');
        }

        $this->M_PCNLIST->Update_Data($where,$data,'tb_PCNlist');//untuk delete table PCNLIST

        $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    
     ///@see ajax_getbyno_dokumen()
     ///@note fungsi digunakan untuk auto increnete
     ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
    function ajax_getbyno_dokumen(){      

        $no_dokumen=$this->input->get('no_dokumen');//untuk auto increnete
        $data=$this->M_PCNLIST->ajax_getbyno_dokumen($no_dokumen,'tb_PCNlist')->row();//untuk request auto increnete
        echo json_encode($data);

    }

     ///@see ajax_getbyno_dokumen()
     ///@note fungsi digunakan untuk auto increnete
     ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
    function ajax_getbyno_hdrid(){      

        $hdrid=$this->input->get('no_dokumen');//untuk auto increnete
        $data=$this->M_PCNLIST->ajax_getbyno_hdrid($hdrid,'tb_PCN')->row();//untuk request auto increnete
        echo json_encode($data);

    }

      ///@see form_approver_link_mail()
     ///@note fungsi digunakan memberi data ke email
     ///@attention 
    function form_approver_link_mail(){
        
        $id_user_reg=$this->input->get('var1'); //untuk menginput id username variable 1
        $nik=$this->input->get('var2'); //untuk menginput id username variable 2
        
        $data['get_approver']=$this->M_PCNLIST->get_approver($id_user_reg); //untuk request approve
        $data['get_requester']=$this->M_PCNLIST->get_requester($id_user_reg); //untuk request auto increnete
        $data['data']=$this->M_PCNLIST->get_data($id_user_reg); //untuk request nomor pcn
        
        $this->load->view('email/V_PCNLIST',$data); // Tampil data
      
    }

    // // fungsi menghapus attachment

    // public function delete_attachment()
    // {
      
    // }


    ///@see upload_file_attach()
    ///@note fungsi attach file bisa diupload
    ///@attention jika path atau ukuran file tidak sesuai function maka attach filenya tidak bisa terisi
    function upload_file_attach($filename,$no_dokumen,$table){

        if(!empty($_FILES[$filename]['name']))//jika data bisa attach file
        {
          
            $config['upload_path'] = './assets/upload/PCNLIST/';   //path file
            $config['allowed_types'] = 'gif|jpg|png|pdf|xlsx|pptx|xlsm|tif'; //jenis file   
            $config['overwrite'] = True; //jika file sudah bisa masuk path
            $config['max_size']  = '20000';//maxsimal upload
            $config['max_width']  = '1024'; //maksimal lebar form
            $config['max_height']  = '768'; //maskimal tinggi form
            // $config['file_name']=$filename; //untuk upload attach file
            $config['encrypt_name']=FALSE; //untuk upload attach file
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
               
                $where = array('no_dokumen' => $no_dokumen);  //untuk update auto increnete      
                $this->M_PCNLIST->Update_Data($where,$data_update,$table);

            }

        }

    }

        function uploadFile($uploadFile,$filetype,$folder,$fileName='')
          {
          $resultArr = array();
          $config['max_size'] = '1024000';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|xlsx|pptx';
              $config['upload_path'] = 'Z:/assets/excel'.$folder.'/';

          if($fileName != "")
              $config['file_name'] = $fileName;

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if(!$this->upload->do_upload($uploadFile))
          {
              $resultArr['success'] = false;
              $resultArr['error'] = $this->upload->display_errors();
          }   else    {
              $resArr = $this->upload->data();
              $resultArr['success'] = true;
              $resultArr['path'] = "Z:/assets/excel".$folder."/".$resArr['file_name'];
          }
          return $resultArr;
          }


    
        ///@see import()
     ///@note fungsi digunakan import data
     ///@attention jika file import path file tidak excel maka tidak bisa diimport
    public function import() {

		// $this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') { //parameter untuk membuat data bisa diimport

			$this->session->set_flashdata('msg', 'File harus diisi'); //jika import file harus terisi
            redirect('C_PCNLIST');

		} else {

			$config['upload_path'] = './assets/excel/'; //untuk path import data
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
                     
                      if ($index > 1 && ucwords($value['C'])!='' ) { //diambil dari baris ke 2

                            // Cari database sekali saja
                            if($index==2){
                                $mdate="TR".mdate('%Y%m',time());        
                                $no_dokumen2=$this->M_PCNLIST->Max_data($mdate,'tb_PCNlist')->row();  
                                if ($no_dokumen2->no_dokumen==NULL){
                                    // Jika belum ada
                                $no_dokumen3=$mdate."001";
                                //    $resultData[$index]['no_dokumen'] =   $no_dokumen3;
                                }else{
                                    $no_dokumen3=$no_dokumen2->no_dokumen;
                                    // Jika sudah ada maka naik 1 level
                                    $no_dokumen3="TR".(intval(substr($no_dokumen3,2,10))+1);
                                    // $resultData[$index]['no_dokumen'] =   $no_dokumen3;    
                                }

                            }else{
                                $no_dokumen3="TR".(intval(substr($no_dokumen3,2,10))+1);
                            }

                            $resultData[$index]['no_dokumen'] =   $no_dokumen3;  
                            $resultData[$index]['transaction_date'] = mdate('%Y-%m-%d',time());    

                        // ---------------------------------- Import Macro Batas sini 1---------------------------------
                        
                            //  Sample
                            $resultData[$index]['no_dokumen'] = ucwords($value['A']);
                            $resultData[$index]['status'] = ucwords($value['A']);
                            $resultData[$index]['category'] = ucwords($value['A']);
                            $resultData[$index]['supplier_name'] = ucwords($value['A']);
                            $resultData[$index]['product_name'] = ucwords($value['A']);
                            $resultData[$index]['part_name'] = ucwords($value['A']);
                            $resultData[$index]['ae'] = ucwords($value['A']);
                            $resultData[$index]['part_no'] = ucwords($value['A']);
                            $resultData[$index]['description'] = ucwords($value['A']);
                            $resultData[$index]['proses_perubahan_lama'] = ucwords($value['A']);
                            $resultData[$index]['proses_perubahan_baru'] = ucwords($value['A']);
                            $resultData[$index]['current_flow_pic'] = ucwords($value['A']);
                            $resultData[$index]['pic_proc'] = ucwords($value['A']);
                            $resultData[$index]['commodity'] = ucwords($value['A']);
                            $resultData[$index]['qa_pic'] = ucwords($value['A']);
                            $resultData[$index]['registered'] = ucwords($value['A']);
                            $resultData[$index]['masspro_schedule'] = ucwords($value['A']);
                      }
                       
					$index++;

				}

				unlink('./assets/excel/' .$data['file_name']); //path untuk tampilan import data berupa excel

				if (count($resultData) != 0) {
					$result = $this->M_PCNLIST->insert_batch('tb_PCNlist',$resultData);
					if ($result > 0) {
						// $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
						redirect('C_PCNLIST');
					}
				} else {
            // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
            redirect('C_PCNLIST');
				}

			}
		}
	}
    /** ---------------------------------------------- /Close controller----------------------------------------------**/

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ISIR_LIST extends CI_Controller {

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
     /** ---------------------------------------------- ISIR_LIST----------------------------------------------**/

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
        $this->load->model('M_ISIR_LIST');//untuk mengoneksi ke tanggal masuk model PCN LIST
        // $this->load->library('encrypt');    
                  
      }

    ///@see Index()
     ///@note fungsi digunakan untuk select filter dan template
     ///@attention jika select filter tidak sesuai dengan data table maka filter tidak aktif
	public function Index()
	{
        // untuk select filter
        $data['nama_supplier'] = $this->M_ISIR_LIST->supplier_name(); //untuk select filter supplier name
        $data['category'] = $this->M_ISIR_LIST->category(); //untuk select filter category
        $data['supplier'] = $this->M_ISIR_LIST->supplier(); //untuk select filter supplier
        $data['part_number'] = $this->M_ISIR_LIST->part_number(); //untuk select filter part number
        
        // External link filter
        $data['Number'] = '';
        if (isset($_GET['Number'])) {
            $data['Number'] = $_GET['Number'];
        }

        // // $data['ISIR_LIST'] = $this->M_ISIR_LIST->Tampil_Data();
        $this->load->view('templates/header'); //Tampil header
		$this->load->view('templates/sidebar'); //Tampil Sidebar
		// // $this->load->view('ISIR_LIST/V_ISIR_LIST',$data); // Tampil data
        $this->load->view('ISIR_LIST/V_ISIR_LIST',$data); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer
               
    }

    ///@see view_data()
     ///@note fungsi digunakan untuk menampilkan data
     ///@attention
     function view_data()
     {
        
        $tables = "tb_ISIR_LIST";//untuk data ISIR LIST bisa masuk ke table application ke database
        $search = array('hdrid','nama_supplier','category','colum_search_isir','column_list_all_isir_by_category','supplier','part_number','part_nama','product_group','t1','t2','t3','t4_to_t10');//untuk data  ISIR LIST  table application bisa masuk sesuai input
        
        


         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         header('Content-Type: application/json');
         echo $this->M_ISIR_LIST->get_tables($tables,$search,$isWhere);//untuk data table ISIR LIST  controller connect ke model
         
     }
     

    ///@see view_data_where()
    ///@note fungsi digunakan untuk mencari dan menampilkan data 
    ///@attention
    function view_data_where()
    {
        $tables = "tb_isir";//untuk data ISIR LIST  bisa masuk ke table application ke database
        $search = array('hdrid','nama_supplier','category','colum_search_isir','column_list_all_isir_by_category','supplier','part_number','part_nama','product_group','t1','t2','t3','t4_to_t10');//untuk data ISIR LIST  table application bisa masuk sesuai input
        
      
        
        // jika memakai IS NULL pada where sql
        if($_POST['searchByFromdate']==''||$_POST['searchByTodate']==''){//Jika sebagai administrator maka akan tampil semua
            $where  = array('transaction_date >'=>'2020-01-01'); //menunjukkan tanggal transaksi             
        }else{
            $where  = array('transaction_date >' => $_POST['searchByFromdate'],'transaction_date <' => $_POST['searchByTodate']);//menunjukkan tanggal transaksi
        };
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_ISIR_LIST->get_tables_where($tables,$search,$where,$isWhere);//untuk data table ISIR LIST controller connect ke model
        
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
        echo $this->M_Datatables->get_tables_query($query,$search,$where,$isWhere); //untuk data table ISIR LIST  controller connect ke model

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
         $hdrid2 = $this->M_ISIR_LIST->Max_data($kode, 'tb_ISIR_LIST')->row();//untuk max data
 
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
        $hdrid=$hdrid3;
       
        // ********************* 1. Set hdrid  *********************
        $post_data2=array('hdrid'=>$hdrid3);

        // ********************* 2. Transaction date  *********************
        $post_data3=array('transaction_date'=>mdate('%Y-%m-%d',time()));
                
         // ******************** 3. Collect all data post *********************     
        $post_data = $this->input->post();   

        $msg = "success save";
              
        // ********************* 4. Merge data post *********************        
        $post_datamerge=array_merge($post_data,$post_data2,$post_data3);

        // ********************* 5. Simpan data     *********************

        $this->M_ISIR_LIST->Input_Data($post_datamerge,'tb_ISIR_LIST');

        // ********************* 6. Upload file jika ada  *********************   
        if(!empty($_FILES['t1']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('T1',$hdrid,'tb_ISIR_LIST');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['t2']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('T2',$hdrid,'tb_ISIR_LIST');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['t3']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('T3',$hdrid,'tb_ISIR_LIST');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        
 if(!empty($_FILES['t4_to_t10']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('t4_to_t10',$hdrid,'tb_ISIR_LIST');//jika upload data dengan attach file sesual file maka data sudah masuk
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
        $hdrid=$this->input->post('hdrid');//untuk parameter update tapi number auto increnete tetap tidak berubah
       
        $msg = "success Update"; //jika sudah diupdate maka berhasil

        // **********************  Upload file (filename,hdrid,table)  *********************   
        if(!empty($_FILES['t1']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('T1',$hdrid,'tb_ISIR_LIST');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['t2']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('T2',$hdrid,'tb_ISIR_LIST');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 if(!empty($_FILES['t3']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('T3',$hdrid,'tb_ISIR_LIST');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        
 if(!empty($_FILES['t4_to_t10']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('t4_to_t10',$hdrid,'tb_ISIR_LIST');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 
        
                
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data);

        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);//mencari data sudah diupdate        
        $this->M_ISIR_LIST->Update_Data($where,$post_datamerge,'tb_ISIR_LIST');//untuk merge data sudah diupdate

        $data['status']="berhasil update";//jika data sudah berhasil diupdate

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }


   ///@see ajax_delete()
     ///@note fungsi digunakan untuk delete data
     ///@attention
    public function ajax_delete()
	{

         
        $where = array('hdrid' => $this->input->post('hdrid'));//untuk delete auto increnete
        $this->M_ISIR_LIST->Delete_Data($where,'tb_ISIR_LIST');//untuk delete table ISIR_LIST
        $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    
    ///@see ajax_getbyhdrid()
     ///@note fungsi digunakan untuk auto increnete
     ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
    function ajax_getbyhdrid(){      

        $hdrid=$this->input->get('hdrid');//untuk auto increnete
        $data=$this->M_ISIR_LIST->ajax_getbyhdrid($hdrid,'tb_ISIR_LIST')->row();//untuk request auto increnete
        echo json_encode($data);

    }

     ///@see form_approver_link_mail(
     ///@note fungsi digunakan memberi data ke email
     ///@attention 
    function form_approver_link_mail(){
        
        $id_user_reg=$this->input->get('var1'); //untuk menginput id username variable 1
        $nik=$this->input->get('var2'); //untuk menginput id username variable 2
        
        $data['get_approver']=$this->M_ISIR_LIST->get_approver($id_user_reg); //untuk request approve
		$data['get_requester']=$this->M_ISIR_LIST->get_requester($id_user_reg); //untuk request auto increnete
		$data['data']=$this->M_ISIR_LIST->get_data($id_user_reg); //untuk request nomor pcn
        
        $this->load->view('email/V_ISIR_LIST',$data); // Tampil data
      
    }


    ////@see upload_file_attach()
    ///@note fungsi attach file bisa diupload
    ///@attention jika path atau ukuran file tidak sesuai function maka attach filenya tidak bisa terisi
    function upload_file_attach($filename,$hdrid,$table){

        if(!empty($_FILES[$filename]['name']))//jika data bisa attach file
        {
          
            $config['upload_path'] = './assets/upload/ISIR_LIST/';   //path file
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
                $this->M_ISIR_LIST->Update_Data($where,$data_update,$table);

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
            redirect('C_ISIR_LIST');

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
                                $mdate="IR".mdate('%Y%m',time());        
                                $hdrid2=$this->M_ISIR_LIST->Max_data($mdate,'tb_ISIR_LIST')->row();  
                                if ($hdrid2->hdrid==NULL){
                                    // Jika belum ada
                                $hdrid3=$mdate."001";
                                //    $resultData[$index]['hdrid'] =   $hdrid3;
                                }else{
                                    $hdrid3=$hdrid2->hdrid;
                                    // Jika sudah ada maka naik 1 level
                                    $hdrid3="IR".(intval(substr($hdrid3,2,10))+1);
                                    // $resultData[$index]['hdrid'] =   $hdrid3;    
                                }

                            }else{
                                $hdrid3="IR".(intval(substr($hdrid3,2,10))+1);
                            }

                            $resultData[$index]['hdrid'] =   $hdrid3;  
                            $resultData[$index]['transaction_date'] = mdate('%Y-%m-%d',time());    

                        // ---------------------------------- Import Macro Batas sini 1---------------------------------
                        
                            //  Sample
                            $resultData[$index]['nama_supplier'] = ucwords($value['A']);
                            $resultData[$index]['category'] = ucwords($value['A']);
                            $resultData[$index]['colum_search_isir'] = ucwords($value['A']);
                            $resultData[$index]['column_list_all_isir_by_category'] = ucwords($value['A']);
                            $resultData[$index]['supplier'] = ucwords($value['A']);
                            $resultData[$index]['part_number'] = ucwords($value['A']);
                            $resultData[$index]['part_nama'] = ucwords($value['A']);
                            $resultData[$index]['product_group'] = ucwords($value['A']);
                            $resultData[$index]['t1'] = ucwords($value['A']);
                            $resultData[$index]['t2'] = ucwords($value['A']);
                            $resultData[$index]['t3'] = ucwords($value['A']);
                            $resultData[$index]['t4_to_t10'] = ucwords($value['A']);
                            
                            

                      }
                       
					$index++;

				}

				unlink('./assets/excel/' .$data['file_name']); //path untuk tampilan import data berupa excel

				if (count($resultData) != 0) {
					$result = $this->M_ISIR_LIST->insert_batch('tb_ISIR_LIST',$resultData);
					if ($result > 0) {
						// $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
						redirect('C_ISIR_LIST');
					}
				} else {
                        // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                        redirect('C_ISIR_LIST');
				}

			}
		}
	}
    
    /** ---------------------------------------------- /Close controller----------------------------------------------**/

}

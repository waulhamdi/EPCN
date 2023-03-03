<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_QCR extends CI_Controller {

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
     /** ---------------------------------------------- QCR----------------------------------------------**/

     ///@see get user data
     ///@note fungsi digunakan untuk username masuk web
     ///@attention
     public function __construct(){
        parent::__construct();   

        if ($this->session->userdata('user_name')=="") { /// jika user memasukkan username benar maka login bisa masuk
			redirect('Auth');
		}

        $this->load->helper('date');//untuk mengoneksi ke tanggal masuk login
        $this->load->helper('file'); //untuk mengoneksi ke data       
        $this->load->model('M_QCR');//untuk mengoneksi ke tanggal masuk model QCR
        // $this->load->library('encrypt');    
                  
      }

	    ///@see get index
     ///@note fungsi digunakan untuk select filter dan template
     ///@attention jika select filter tidak sesuai dengan data table maka filter tidak aktif
	public function Index()
	{
        $data['Tampil_pcn'] = $this->M_QCR->Tampil_pcn();// Menarik dan menampung ke data tipe_transfer
        $data['user'] =$this->M_QCR->Tampil_user();
        // var_dump( $data['Tampil_pcn'] );

        // // $data['QCR'] = $this->M_QCR->Tampil_Data();
        $this->load->view('templates/header'); //Tampil header
        $this->load->view('templates/sidebar'); //Tampil Sidebar
        // // $this->load->view('QCR/V_QCR',$data); // Tampil data
        $this->load->view('QCR/V_QCR',$data); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer
               
    }
      ///@see get view data
     ///@note fungsi digunakan untuk menampilkan data
     ///@attention
     function view_data()
     {
        
      $tables = "tb_QCR";//untuk data bisa masuk ke table QCR ke database
      $search = array('hdrid','date','part_number','part_name','lot_number','finish_target','check_item','drawing_attached','reason_purpose','check_result','dimension','perfomance','noise');//untuk data table QCR bisa masuk sesuai input
      
      

         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         header('Content-Type: application/json');
         echo $this->M_QCR->get_tables($tables,$search,$isWhere);//untuk data table QCR controller connect ke model
         
     }
     

    ///@see get view data where
    ///@note fungsi digunakan untuk mencari dan menampilkan data 
    ///@attention
    function view_data_where()
    {
      $tables = "tb_QCR";//untuk data bisa masuk ke table QCR ke database
      $search = array('hdrid','reason','note','drawing_attached','qcr_reply','date_reply','other_attached','pic_qc','cc_to1','cc_to2','check_point','judgment','comment');//untuk data table QCR bisa masuk sesuai input
      
      
      
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
        echo $this->M_QCR->get_tables_where($tables,$search,$where,$isWhere);//untuk data table QCR controller connect ke model
        
    }

     ///@see get view data query
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
        echo $this->M_Datatables->get_tables_query($query,$search,$where,$isWhere); //untuk data table QCR controller connect ke model

    }


    //    if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
    //     }else{
    //     redirect('auth');
    //     }


     ///@see get add data
     ///@note fungsi digunakan untuk menambah data
     ///@attention

     public function ajax_add()
     {
         // $product_id = $this->input->post('product_id'); //untuk add data kode id increnete
         // $kodeB = $this->M_tooling->get_product_by_id($product_id);//add data connect ke model
         // $kode = $kodeB->report_no;//fungsi kode increnete
         $kode = 'QCR-';//fungsi kode increnete
 
         // ********************* 0. Generate nomor transaksi  *********************         
         // var_dump($kode);           
         // date_default_timezone_set('Asia/Jakarta');//default tanggal timezone daerah
         // $mdate = $kode.mdate('%Y/%m/', time());//tanggal,bulan,tahun
         $hdrid2 = $this->M_QCR->Max_data($kode, 'tb_QCR')->row();//untuk max data
 
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

        $this->M_QCR->Input_Data($post_datamerge,'tb_QCR');

        // ********************* 6. Upload file jika ada  *********************   
        if(!empty($_FILES['drawing_attached']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('drawing_attached',$hdrid,'tb_QCR');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['qcr_issue']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('qcr_issue',$hdrid,'tb_QCR');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['qcr_reply']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('qcr_reply',$hdrid,'tb_QCR');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['other_attached']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('other_attached',$hdrid,'tb_QCR');//jika upload data dengan attach file sesual file maka data sudah masuk
        }


       

        $data['status']= $msg; //cek status

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    
    ///@see get update
     ///@note fungsi digunakan untuk update data
     ///@attention
    public function ajax_update()
	{

         // ********************* 1. Collect data post *********************
        $post_data = $this->input->post(); //untuk parameter update
        $hdrid=$this->input->post('hdrid');//untuk parameter update tapi number auto increnete tetap tidak berubah
       
        $msg = "success Update"; //jika sudah diupdate maka berhasil

        // **********************  Upload file (filename,hdrid,table)  *********************   
        if(!empty($_FILES['drawing_attached']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('drawing_attached',$hdrid,'tb_QCR');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        // if(!empty($_FILES['qcr_issue']['name']))//jika document sudah upload maka document bisa ditampilkan
        // {
        //   $this->upload_file_attach('qcr_issue',$hdrid,'tb_QCR');//jika upload data dengan attach file sesual file maka data sudah masuk
        // }
        if(!empty($_FILES['qcr_reply']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('qcr_reply',$hdrid,'tb_QCR');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['other_attached']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('other_attached',$hdrid,'tb_QCR');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
 
                
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data);

        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);//mencari data sudah diupdate        
        $this->M_QCR->Update_Data($where,$post_datamerge,'tb_QCR');//untuk merge data sudah diupdate

        $data['status']="berhasil update";//jika data sudah berhasil diupdate

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }


      ///@see get delete
     ///@note fungsi digunakan untuk delete data
     ///@attention
    public function ajax_delete()
	{

         
        $where = array('hdrid' => $this->input->post('hdrid'));//untuk delete auto increnete
        $this->M_QCR->Delete_Data($where,'tb_QCR');//untuk delete table QCR
        $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    
    ///@see get_hybrid
     ///@note fungsi digunakan untuk auto increnete
     ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
    function ajax_getbyhdrid(){      

        $hdrid=$this->input->get('hdrid');//untuk auto increnete
        $data=$this->M_QCR->ajax_getbyhdrid($hdrid,'tb_QCR')->row();//untuk request auto increnete
        echo json_encode($data);

    }

        ///@see get form_approver_link_mail
     ///@note fungsi digunakan memberi data ke email
     ///@attention 
    function form_approver_link_mail(){
        
        $id_user_reg=$this->input->get('var1'); //untuk menginput id username variable 1
        $nik=$this->input->get('var2'); //untuk menginput id username variable 2
        
        $data['get_approver']=$this->M_QCR->get_approver($id_user_reg); //untuk request approve
        $data['get_requester']=$this->M_QCR->get_requester($id_user_reg); //untuk request auto increnete
        $data['data']=$this->M_QCR->get_data($id_user_reg); //untuk request nomor pcn
        
        $this->load->view('email/V_QCR',$data); // Tampil data
      
    }


        ///@see get upload_file_Attach
    ///@note fungsi attach file bisa diupload
    ///@attention jika path atau ukuran file tidak sesuai function maka attach filenya tidak bisa terisi
    function upload_file_attach($filename,$hdrid,$table){

        if(!empty($_FILES[$filename]['name']))//jika data bisa attach file
        {
          
            $config['upload_path'] = './assets/upload/qcr/';   //path file
            $config['allowed_types'] = 'gif|jpg|png|pdf|xlsx|xls|tif|xlsm'; //jenis file   
            $config['overwrite'] = True; //jika file sudah bisa masuk path
            $config['max_size']  = '20000';//maxsimal upload
            $config['max_width']  = '1024'; //maksimal lebar form
            $config['max_height']  = '768'; //maskimal tinggi form
            // $config['file_name']=$hdrid.'_'.$filename; //untuk upload attach file
            $config['encrypt_name']=FALSE;
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
                $this->M_QCR->Update_Data($where,$data_update,$table);

            }

        }

    }

    ///@see ajax_delete_attachment()
     ///@note fungsi digunakan untuk delete data
     ///@attention
     public function ajax_delete_attachment()
     {
        $where = array('hdrid' => $this->input->post('hdrid'));//untuk delete auto increnete

        if ($this->input->post('attachment')=='1') {
          $data = array('drawing_attached' => '');
        }else if($this->input->post('attachment')=='2'){
          $data = array('qcr_reply' => '');
        }else{
          $data = array('other_attached' => '');
        }

        $this->M_QCR->Update_Data($where,$data,'tb_QCR');//untuk delete table PCNLIST

        $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

       }

     ///@see get import
     ///@note fungsi digunakan import data
     ///@attention jika file import path file tidak excel maka tidak bisa diimport
    public function import() {

		// $this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') { //parameter untuk membuat data bisa diimport

			$this->session->set_flashdata('msg', 'File harus diisi'); //jika import file harus terisi
            redirect('C_QCR');

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
                            if($index==3){
                                $mdate="QCR".mdate('%Y%m',time());        
                                $hdrid2=$this->M_QCR->Max_data($mdate,'tb_QCR')->row();  
                                if ($hdrid2->hdrid==NULL){
                                    // Jika belum ada
                                $hdrid3=$mdate."001";
                                //    $resultData[$index]['hdrid'] =   $hdrid3;
                                }else{
                                    $hdrid3=$hdrid2->hdrid;
                                    // Jika sudah ada maka naik 1 level
                                    $hdrid3="QCR".(intval(substr($hdrid3,3,10))+1);
                                    // $resultData[$index]['hdrid'] =   $hdrid3;    
                                }

                            }else{
                                $hdrid3="QCR".(intval(substr($hdrid3,2,10))+1);
                            }

                            $resultData[$index]['hdrid'] =   $hdrid3;  
                            $resultData[$index]['transaction_date'] = mdate('%Y-%m-%d',time());    

                        // ---------------------------------- Import Macro Batas sini 1---------------------------------
                        
                            //  Sample
                            $resultData[$index]['date'] = ucwords($value['A']);
                            $resultData[$index]['part_number'] = ucwords($value['A']);
                            $resultData[$index]['part_name'] = ucwords($value['A']);
                            $resultData[$index]['lot_number'] = ucwords($value['A']);
                            $resultData[$index]['finish_target'] = ucwords($value['A']);
                            $resultData[$index]['check_item'] = ucwords($value['A']);
                            $resultData[$index]['drawing_attached'] = ucwords($value['A']);
                            $resultData[$index]['reason_purpose'] = ucwords($value['A']);
                            $resultData[$index]['check_result'] = ucwords($value['A']);
                            $resultData[$index]['dimension'] = ucwords($value['A']);
                            $resultData[$index]['perfomance'] = ucwords($value['A']);
                            $resultData[$index]['noise'] = ucwords($value['A']);
                            
                            

                      }
                       
					$index++;

				}

				unlink('./assets/excel/' .$data['file_name']); //path untuk tampilan import data berupa excel

				if (count($resultData) != 0) {
					$result = $this->M_QCR->insert_batch('tb_QCR',$resultData);
					if ($result > 0) {
						// $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
						redirect('C_QCR');
					}
				} else {
                        // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                        redirect('C_QCR');
				}

			}
		}
	}
    
    /** ---------------------------------------------- /Close controller----------------------------------------------**/

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_application extends CI_Controller {

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
     /** ---------------------------------------------- application----------------------------------------------**/

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
        $this->load->model('M_application');//Load model
        $this->load->model('M_superior');//Load model
        $this->load->model('M_PCN');//Load model
        $this->load->model('M_Mail');//Load model
        $this->load->model('UserModel');  //untuk load user model hak akses menu   
        // $this->load->library('encrypt');    

        // Cari hak akses by controller
	    $Hak_akses = $this->UserModel->get_controller_access($this->session->userdata('role_id'),'C_application'); 
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
        // $data['supplier'] = ['joko01','adit01','johnny01']; //untuk select filter part number nama supplier
        $data['hdrid'] = $this->M_application->Tampil_user();
        $data['nik'] = $this->M_application->tampil_superior();
        $data['pcn_number'] = $this->M_application->get_application();
        // $data['pcn_number'] = $this->M_application->Tampil_user();
        $data['Number'] = '';
        if (isset($_GET['Number'])) {
            $data['Number'] = $_GET['Number'];
        }

        $menu_code = $this->input->get('var');                  // Decrypt menu ID   untuk dekrip menu   
        $menu_name = $this->input->get('var2');                 // Decrypt menu ID   untuk dekrip menu name  
        $data['menu_name'] =  $menu_name; 
        $menu_akses['menu_akses']=$this->UserModel->get_menu_access($this->session->userdata('role_id'));           //Menu akses untuk munculkan menu   
        $data['hak_akses']=$this->UserModel->get_hak_access($this->session->userdata('role_id'), $menu_code);       //button akses(Add,Adit,View,Delete,Import,Export)
       
        // // $data['application'] = $this->M_application->Tampil_Data();
        $this->load->view('templates/header'); //Tampil header
		$this->load->view('templates/sidebar_new',$menu_akses); //Tampil Sidebar
		// // $this->load->view('application/V_application',$data); // Tampil data
        $this->load->view('application/V_application',$data); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer
               
    }

    ///@see view_data()
     ///@note fungsi digunakan untuk menampilkan data
     ///@attention

     function view_data()
     {
        
        $tables = "tb_application";//untuk data bisa masuk ke table application ke database
        $search = array('hdrid','pcn_number','supplier','part_number','part_name','product_name','criteria_critical_item','current_process','comparison_detail','concern_point_for_5_div','qc_nik','pe_departement','mfg_departement','pc_departement','qa_departement');//untuk data table application bisa masuk sesuai input

            
        


         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         header('Content-Type: application/json');
         echo $this->M_application->get_tables($tables,$search,$isWhere);//untuk data table application controller connect ke model
         
     }
     

   ///@see view_data_where()
    ///@note fungsi digunakan untuk mencari dan menampilkan data 
    ///@attention

    function view_data_where()
    {

        $nik= $this->session->userdata('user_name'); // Menarik username dari session dan menampung nya sebagai nik
    
        if($this->session->userdata('rolename')=='Administrator PCN'){
            $tables = "fn_view_application('')"; // Terbuka semua tanpa user
        }else{
            $tables = "fn_view_application('$nik')"; // Maka table yang dipakai
        }

        // $tables = "tb_application";
        

        $search = array('hdrid','pcn_number','supplier','part_number','part_name','product_name','criteria_critical_item','current_process','comparison_detail','qc_nik','comment_qc','hold_or_go_qc','pe_departement','comment_pe',	'hold_or_go_pe','mfg_departement','comment_mfg','hold_or_go_mfg','pc_departement','comment_pc','hold_or_go_pc','qa_departement','comment_qa','hold_or_go_qa','status','confirm_qa',	'confirm_qc','confirm_pe','confirm_mfg','confirm_pc','qc_nik','pe_nik','mfg_nik','pc_nik','qa_nik');//untuk data table application bisa masuk sesuai input
        // $search = array('hdrid', 'pcn_number', 'supplier', 'part_number', 'part_name', 'product_name');//untuk data table application bisa masuk sesuai input
                
        // jika memakai IS NULL pada where sql
        if($_POST['searchByFromdate']==''||$_POST['searchByTodate']==''){//Jika sebagai administrator maka akan tampil semua
            $where  = array('transaction_date >'=>'2020-01-01'); //menunjukkan tanggal transaksi             
        }else{
            $where  = array('transaction_date >' => $_POST['searchByFromdate'],'transaction_date <' => $_POST['searchByTodate']);//menunjukkan tanggal transaksi
        };
        if ($_POST['Number'] !='') { // due_date -2 filter
            $where = array('pcn_number'=> $_POST['Number']);
          }
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_application->get_tables_where($tables,$search,$where,$isWhere);//untuk data table application controller connect ke model
        
    }

   //@see view_data_query()
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
        echo $this->M_Datatables->get_tables_query($query,$search,$where,$isWhere); //untuk data table application controller connect ke model

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
         $kode = '';//fungsi kode increnete
 
         // ********************* 0. Generate nomor transaksi  *********************         
         // var_dump($kode);           
         date_default_timezone_set('Asia/Jakarta');//default tanggal timezone daerah
         // $mdate = $kode.mdate('%Y/%m/', time());//tanggal,bulan,tahun
         $hdrid2 = $this->M_application->Max_data($kode, 'tb_application')->row();//untuk max data
 
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

        $this->M_application->Input_Data($post_datamerge,'tb_application');

        // ********************* 6. Upload file jika ada  *********************   
        if(!empty($_FILES['submital_sign']['name']))//jika document sudah upload maka document bisa ditampilkan
       {
         $this->upload_file_attach('submital_sign',$hdrid,'tb_application');//jika upload data dengan attach file sesual file maka data sudah masuk
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
        $pcn_number=$this->input->post('pcn_number');//untuk parameter update tapi number auto increnete tetap tidak berubah
        $product=$this->input->post('product_name');//untuk parameter update tapi number auto increnete tetap tidak berubah
        $msg = "success Update"; //jika sudah diupdate maka berhasil
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data);

        // **********************  Simpan data ************************        
        $where = array('pcn_number' => $pcn_number);//mencari data sudah diupdate        
        $this->M_application->Update_Data($where,$post_datamerge,'tb_application'); // Update Data berdasarkan parameter
        // $action=$this->M_application->ajax_getbyhdrid($pcn_number,'tb_application')->row();
        $next_app = $this->M_PCN->cari_tb_approver($pcn_number);

        $action_res = $this->M_application->search_action($pcn_number);

        // Kondisi apabila data null menjadi ''
        $qc=$action_res->hold_or_go_qc;
        $pe=$action_res->hold_or_go_pe;
        $mfg=$action_res->hold_or_go_mfg;
        $pc=$action_res->hold_or_go_pc;
        $qa=$action_res->hold_or_go_qa;
    

        if ($qa == 'Go' && $pe == 'Go' && $mfg == 'Go' && $pc == 'Go' && $qc == 'Go') {

            //Update status agar tidak muncul di application response dan lanjut approval
            $where = array('pcn_number' => $pcn_number);//mencari data sudah diupdate        
            $status = array('status' =>'Closed Response');
            $this->M_application->Update_Data($where,$status,'tb_application');//untuk merge data sudah diupdate

            // Send email ke next approver
            $post_data =array('status_transaction' => 'Need Approve','hdrid'=>$pcn_number,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$next_app->nik,'name'=>$next_app->name,'department_code'=>$next_app->department_code,'department_name'=>$next_app->department_name,'office_email'=>$next_app->office_email,'position_code'=>$next_app->position_code,'position_name'=>$next_app->position_name,'subject_email'=>'Need Approve','body_content'=>'Please click link below and approve','comment'=>'','cc_email'=>'');
            $post_datamerge=array_merge($post_data,$post_data);   
            $where = array('trxid' => 0);        
            $status_email = $this->M_PCN->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
            
        }else if($qc == 'Hold' || $pe == 'Hold' || $mfg == 'Hold' || $pc == 'Hold' || $qa == 'Hold') {
            
            // Update status in tb_pcn
            $result=$this->M_application->hold_reponse($pcn_number);
            $hold_response = implode(", ", $result);
            $where = array('hdrid' => $pcn_number);//mencari data sudah diupdate        
            $status = array('stat' =>'Rejected','hold_response'=>$hold_response);
            $status_merge=array_merge($status,$status);
            $this->M_application->Update_Data($where,$status_merge,'tb_pcn'); // Update Data berdasarkan parameter
            //Cari email requester
            $requester = $this->M_application->cari_requester($pcn_number);
            $list_res = $this->M_application->cari_responden($pcn_number)->row();

            $cc_email = $list_res->qc_inspection_departement.';'.$list_res->pe_departement.';'.$list_res->mfg_departement.';'.$list_res->pc_departement.';'.$list_res->qa_departement;
            // $status_transaction = "Hold By:".$rejected_by." With Reason: ".$reason ;
            $post_data =array('status_transaction' => 'PCN Hold','hdrid'=>$pcn_number,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$requester->nik_superiorprocurement	,'name'=>$requester->name_superiorprocurement,'department_code'=>$requester->kode_section_superiorprocurement,'department_name'=>$requester->name_section_superiorprocurement,'office_email'=>$requester->email_superiorprocurement,'position_code'=>'','position_name'=>'','subject_email'=>'Hold','body_content'=>'','comment'=>'','cc_email'=>'');
            $post_datamerge=array_merge($post_data,$post_data);   
            $where = array('trxid' => 0);        
            $status_email = $this->M_PCN->Update_Data($where, $post_datamerge, 'tb_mail_trigger');

        }
        
        $data['status']=$msg;//jika data sudah berhasil diupdate
        $data['hdrid']=$pcn_number;//jika data sudah berhasil diupdate
        $data['product']=$product;//jika data sudah berhasil diupdate

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }


    ///@see ajax_delete()
     ///@note fungsi digunakan untuk delete data
     ///@attention
    public function ajax_delete()
	{

         
        $where = array('hdrid' => $this->input->post('hdrid'));//untuk delete auto increnete
        $this->M_application->Delete_Data($where,'tb_application');//untuk delete table application
        $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    
    //@see ajax_getbyhdrid()
     ///@note fungsi digunakan untuk auto increnete
     ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete

    function ajax_getbyhdrid(){      

        $hdrid=$this->input->get('hdrid');//untuk auto increnete
        $data=$this->M_application->ajax_getbyhdrid($hdrid,'tb_application')->row();//untuk request auto increnete
        echo json_encode($data);

    }

    ///@see ajax_Send_mail()
    ///@note Send email to (5 Responden,User creator)
    ///@attention Menerima pcn_number,query berdasarkan key untuk mengambil email,update tb_mail_trigger(send email)

    function ajax_Send_mail(){
        
        $pcn_number=$this->input->post('pcn_number'); // Menampung hasil post field
        $product=$this->input->post('product_name'); // Menampung hasil post field

        $list_res = $this->M_application->cari_responden($pcn_number)->row();
        // $list_res = $this->M_application->responden_no_action($pcn_number);
        $list_mem = $this->M_application->cari_member($product)->row();
        $list_name = $this->M_Mail->cari_name($pcn_number)->row();
        //CC MEMBER
        $cc_member = $list_mem->PE_1.$list_mem->PE_2.$list_mem->PE_3.$list_mem->QC_1.$list_mem->QC_2.$list_mem->QC_3.$list_mem->MFG_1.$list_mem->MFG_2.$list_mem->MFG_3.$list_mem->PC_1.$list_mem->PC_2.$list_mem->PC_3.$list_mem->QA_1.$list_mem->QA_2.$list_mem->QA_3;
        //CC 5 Responden
        $cc_email = $list_res->qc_inspection_departement.';'.$list_res->pe_departement.';'.$list_res->mfg_departement.';'.$list_res->pc_departement.';'.$list_res->qa_departement;
        //Name 5 responden
        $name = $list_name->qc_name.','.$list_name->pe_name.','.$list_name->mfg_name.','.$list_name->pc_name.','.$list_name->qa_name;
               
        $post_data =array('status_transaction' => 'Need Your Response','hdrid'=>$pcn_number,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>'','name'=>$name,'department_code'=>'','department_name'=>'','office_email'=>$list_res->creator,'position_code'=>'','position_name'=>'','subject_email'=>'Need Your Response to Application Response','body_content'=>'','comment'=>'','cc_email'=>$cc_email.';'.$cc_member);
        $post_datamerge=array_merge($post_data,$post_data);   
        $where = array('trxid' => 0);        
        $status_email = $this->M_application->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
      
    }


     ///@see upload_file_attach()
    ///@note fungsi attach file bisa diupload
    ///@attention jika path atau ukuran file tidak sesuai function maka attach filenya tidak bisa terisi
    function upload_file_attach($filename,$hdrid,$table){

        if(!empty($_FILES[$filename]['name']))//jika data bisa attach file
        {
          
            $config['upload_path'] = './assets/upload/application/';   //path file
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
                $this->M_application->Update_Data($where,$data_update,$table);

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
            redirect('C_application');

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
                                $hdrid2=$this->M_application->Max_data($mdate,'tb_application')->row();  
                                if ($hdrid2->hdrid==NULL){
                                    // Jika belum ada
                                $hdrid3=$mdate."001";
                                //    $resultData[$index]['hdrid'] =   $hdrid3;
                                }else{
                                    $hdrid3=$hdrid2->hdrid;
                                    // Jika sudah ada maka naik 1 level
                                    $hdrid3="TR".(intval(substr($hdrid3,2,10))+1);
                                    // $resultData[$index]['hdrid'] =   $hdrid3;    
                                }

                            }else{
                                $hdrid3="TR".(intval(substr($hdrid3,2,10))+1);
                            }

                            $resultData[$index]['hdrid'] =   $hdrid3;  
                            $resultData[$index]['transaction_date'] = mdate('%Y-%m-%d',time());    

                        // ---------------------------------- Import Macro Batas sini 1---------------------------------
                        
                            //  Sample
                            $resultData[$index]['supplier_name'] = ucwords($value['A']);
                            $resultData[$index]['submital_sign'] = ucwords($value['A']);
                            $resultData[$index]['part_number'] = ucwords($value['A']);
                            $resultData[$index]['part_name'] = ucwords($value['A']);
                            $resultData[$index]['product_name'] = ucwords($value['A']);
                            $resultData[$index]['criteria_critical_item'] = ucwords($value['A']);
                            $resultData[$index]['current_process'] = ucwords($value['A']);
                            $resultData[$index]['comparison_detail'] = ucwords($value['A']);
                            $resultData[$index]['concern_point_for_5_div'] = ucwords($value['A']);
                            $resultData[$index]['qc_nik'] = ucwords($value['A']);
                            $resultData[$index]['pe_departement'] = ucwords($value['A']);
                            $resultData[$index]['mfg_departement'] = ucwords($value['A']);
                            $resultData[$index]['pc_departement'] = ucwords($value['A']);
                            $resultData[$index]['qa_departement'] = ucwords($value['A']);
                            
                            
                            

                      }
                       
					$index++;

				}


				unlink('./assets/excel/' .$data['file_name']); //path untuk tampilan import data berupa excel

				if (count($resultData) != 0) {
					$result = $this->M_application->insert_batch('tb_application',$resultData);
					if ($result > 0) {
						// $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
						redirect('C_application');
					}
				} else {
                        // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                        redirect('C_application');
				}

			}
		}
	}

    function print_report2_approved()
    {
        $hdrid = $this->input->get('var1'); 
        $no_dokumen = $this->input->get('var1'); 
        $data['tb_PCNlist'] = $this->M_application->ajax_getbyno_dokumen($no_dokumen, 'tb_PCNlist')->row();
        $data['tb_application'] = $this->M_application->ajax_getbyhdrid($hdrid, 'tb_application')->row();
        $this->load->view('Print/V_print_application',$data);
    }


    /** ---------------------------------------------- /Close controller----------------------------------------------**/

}

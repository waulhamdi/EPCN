<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_setting_app_member extends CI_Controller {

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
     /** ---------------------------------------------- sys_set_app----------------------------------------------**/

     public function __construct(){
        parent::__construct();   

        if ($this->session->userdata('user_name')=="") {
			redirect('Auth');
		}

        $this->load->helper('date');
        $this->load->helper('file');        
        $this->load->model('M_setting_app_member');
        $this->load->model('UserModel');  //untuk load user model hak akses menu    
        // $this->load->library('encrypt');   

        // Cari hak akses by controller
	    $Hak_akses = $this->UserModel->get_controller_access($this->session->userdata('role_id'),'C_setting_app_member'); 
	    if($Hak_akses->found!='found') {
		    redirect('Auth'); // Kembali ke halaman Auth
	    }          
      }

	public function Index()
	{

        $data['nik'] = $this->M_setting_app_member->Tampil_user();
        // $data['nik_sys_set_app'] = $this->M_setting_app_member->Tampil_user();
        $data['product'] = $this->M_setting_app_member->Tampil_product();

        $menu_code = $this->input->get('var');                  // Decrypt menu ID   untuk dekrip menu   
        $menu_name = $this->input->get('var2');                 // Decrypt menu ID   untuk dekrip menu name  
        $data['menu_name'] =  $menu_name; 
        $menu_akses['menu_akses']=$this->UserModel->get_menu_access($this->session->userdata('role_id'));           //Menu akses untuk munculkan menu   
        $data['hak_akses']=$this->UserModel->get_hak_access($this->session->userdata('role_id'), $menu_code);       //button akses(Add,Adit,View,Delete,Import,Export)
       
        $this->load->view('templates/header'); //Tampil header
		$this->load->view('templates/sidebar_new',$menu_akses); //Tampil Sidebar
		// // $this->load->view('sys_set_app/V_setting_app_member',$data); // Tampil data
        $this->load->view('application_member/V_setting_app_member',$data); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer
               
    }

     // Satu table tanpa where
     function view_data()
     {
        
        $tables = "tb_application_member";
        $search = array('hdrid','product','pe_member_1','pe_member_2','pe_member_3','qc_member_1','qc_member_2','qc_member_3','mfg_member_1','mfg_member_2','mfg_member_3','pc_member_1','pc_member_2','pc_member_3','qa_member_1','qa_member_2','qa_member_3');
        
        // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         header('Content-Type: application/json');
         echo $this->M_setting_app_member->get_tables($tables,$search,$isWhere);
         
     }

    // Satu table dengan where
    function view_data_where()
    {

        $tables = "tb_application_member";
        $search = array('hdrid','product','pe_member_1','pe_member_2','pe_member_3','qc_member_1','qc_member_2','qc_member_3','mfg_member_1','mfg_member_2','mfg_member_3','pc_member_1','pc_member_2','pc_member_3','qa_member_1','qa_member_2','qa_member_3');

        if($_POST['searchByFromdate']==''||$_POST['searchByTodate']==''){
            $where  = array('transaction_date >'=>'2020-01-01');              
        }else{
            $where  = array('transaction_date >' => $_POST['searchByFromdate'],'transaction_date <' => $_POST['searchByTodate']);
        };
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_setting_app_member->get_tables_where($tables,$search,$where,$isWhere);
        
    }

    // Multy table / Query
    function view_data_query()
    {

        $query  = "SELECT kategori.nama_kategori AS nama_kategori, subkat.* FROM subkat 
                    JOIN kategori ON subkat.id_kategori = kategori.id_kategori";
        $search = array('nama_kategori','subkat','tgl_add');
        $where  = null; 
        // $where  = array('nama_kategori' => 'Tutorial');
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_Datatables->get_tables_query($query,$search,$where,$isWhere);

    }


    //    if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
    //     }else{
    //     redirect('auth');
    //     }

    public function ajax_add()
	{

        // ********************* 0. Generate nomor transaksi  *********************          
        $mdate="TR".mdate('%Y%m',time());        
        $hdrid2=$this->M_setting_app_member->Max_data($mdate,'tb_application_member')->row();        
        if ($hdrid2->hdrid==NULL){
            // Jika belum ada
           $hdrid3=$mdate."001";
        }else{
           $hdrid3=$hdrid2->hdrid;
           // Jika sudah ada maka naik 1 level
           $hdrid3="TR".(intval(substr($hdrid3,2,10))+1);
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

        $this->M_setting_app_member->Input_Data($post_datamerge,'tb_application_member');

        // ********************* 6. Upload file jika ada  *********************   
        if(!empty($_FILES['file']['name']))
        {
            $this->upload_file_attach('file',$hdrid,'tb_application_member');           
        }
       

        $data['status']= $msg;

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    
    
    public function ajax_update()
	{

         // ********************* 1. Collect data post *********************
        $post_data = $this->input->post();
        $hdrid=$this->input->post('hdrid');
       
        $msg = "success Update";

        // **********************  Upload file (filename,hdrid,table)  *********************   
        if(!empty($_FILES['file']['name']))
        {          
            $this->upload_file_attach('file',$hdrid,'tb_application_member');          
        }
                
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data);

        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);        
        $this->M_setting_app_member->Update_Data($where,$post_datamerge,'tb_application_member');

        $data['status']="berhasil update";

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    public function ajax_delete()
	{

         
        $where = array('hdrid' => $this->input->post('hdrid'));
        $this->M_setting_app_member->Delete_Data($where,'tb_application_member');
        $data['status']="berhasil dihapus";
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    

    function ajax_getbyhdrid(){      

        $hdrid=$this->input->get('hdrid');
        $data=$this->M_setting_app_member->ajax_getbyhdrid($hdrid,'tb_application_member')->row();
        echo json_encode($data);

    }

    function form_approver_link_mail(){
        
        $id_user_reg=$this->input->get('var1');
        $nik=$this->input->get('var2');
        
        $data['get_approver']=$this->M_setting_app_member->get_approver($id_user_reg); 
		$data['get_requester']=$this->M_setting_app_member->get_requester($id_user_reg); 
		$data['data']=$this->M_setting_app_member->get_data($id_user_reg); 
        
        $this->load->view('email/V_setting_app_member',$data); // Tampil data
      
    }

    function upload_file_attach($filename,$hdrid,$table){

        if(!empty($_FILES[$filename]['name']))
        {
          
            $config['upload_path'] = './assets/upload';   
            $config['allowed_types'] = 'gif|jpg|png|pdf';         
            $config['overwrite'] = True;          
            $config['max_size']  = '1000000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['file_name']=$hdrid.'_'.$filename;
            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if ( ! $this->upload->do_upload($filename)){
                // $status = "error";
                 $msg = $this->upload->display_errors();
            }
            else{
                 $msg = "success upload";

                $dataupload = $this->upload->data();
                // $status = "success";
                // $msg = $dataupload['file_name']." berhasil diupload";                      
                $data_update = array($filename =>$dataupload['file_name']);   
               
                $where = array('hdrid' => $hdrid);        
                $this->M_setting_app_member->Update_Data($where,$data_update,$table);

            }

        }

    }


    public function import() {

		// $this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {

			$this->session->set_flashdata('msg', 'File harus diisi');
            redirect('C_setting_app_member');

		} else {

			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{

				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
                $rowexcel = 1;

				foreach ($sheetData as $key => $value) {

                       // ********************* 0. Generate nomor transaksi  *********************     
                       if($rowexcel>2){

                            // Cari database sekali saja
                            if($index==0){
                                $mdate="TR".mdate('%Y%m',time());        
                                $hdrid2=$this->M_setting_app_member->Max_data($mdate,'tb_application_member')->row();  
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

                        $resultData[$index]['product'] = ucwords($value['A']);
                        $resultData[$index]['pe_member_1'] = ucwords($value['A']);
                        $resultData[$index]['pe_member_2'] = ucwords($value['A']);
                        $resultData[$index]['pe_member_3'] = ucwords($value['A']);
                        $resultData[$index]['qc_member_1'] = ucwords($value['A']);
                        $resultData[$index]['qc_member_2'] = ucwords($value['A']);
                        $resultData[$index]['qc_member_3'] = ucwords($value['A']);
                        $resultData[$index]['mfg_member_1'] = ucwords($value['A']);
                        $resultData[$index]['mfg_member_2'] = ucwords($value['A']);
                        $resultData[$index]['mfg_member_3'] = ucwords($value['A']);
                        $resultData[$index]['pc_member_1'] = ucwords($value['A']);
                        $resultData[$index]['pc_member_2'] = ucwords($value['A']);
                        $resultData[$index]['pc_member_3'] = ucwords($value['A']);
                        $resultData[$index]['qa_member_1'] = ucwords($value['A']);
                        $resultData[$index]['qa_member_2'] = ucwords($value['A']);
                        $resultData[$index]['qa_member_3'] = ucwords($value['A']);
                        
                            // ---------------------------------- / Import Macro Batas sini 1--------------------------------
                            $index++;


                       }
                       
                    $rowexcel++;

				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_setting_app_member->insert_batch('tb_application_member',$resultData);
					if ($result > 0) {
						// $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
						redirect('C_setting_app_member');
					}
				} else {
                        // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                        redirect('C_setting_app_member');
				}

			}
		}
	}
    
    /** ---------------------------------------------- /Close controller----------------------------------------------**/

}

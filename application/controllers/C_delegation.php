<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_delegation extends CI_Controller {

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
     /** ---------------------------------------------- delegation----------------------------------------------**/

     public function __construct(){
        parent::__construct();   

        if ($this->session->userdata('user_name')=="") {
			redirect('Auth');
		}

        $this->load->helper('date');
        $this->load->helper('file');        
        $this->load->model('M_delegation');
        // $this->load->library('encrypt');    
                  
      }

	public function Index()
	{

        $data['nik'] = $this->M_delegation->Tampil_user();
        $data['department_code'] = $this->M_delegation->Tampil_user();
        // $data['problem_id'] = $this->M_delegation->Tampil_problem();
        $data['problem_id'] = $this->M_delegation->Tampil_pcn_no();
       
        $this->load->view('templates/header'); //Tampil header
		$this->load->view('templates/sidebar'); //Tampil Sidebar
		// // $this->load->view('delegation/V_delegation',$data); // Tampil data
        $this->load->view('delegation/V_delegation',$data); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer
               
    }

     // Satu table tanpa where
     function view_data()
     {
        
        $tables = "tb_approval";         
        $search = array('trxid','problem_id','nik','name','office_email','department_code','department_name','position_code','position_name','date_approve');
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         header('Content-Type: application/json');
         echo $this->M_delegation->get_tables($tables,$search,$isWhere);
         
     }

    // Satu table dengan where
    function view_data_where()
    {

        $tables = "tb_approval";         
        $search = array('trxid','problem_id','nik','name','office_email','department_code','department_name','position_code','position_name','date_approve');
        
        if($_POST['searchByFromdate']==''||$_POST['searchByTodate']==''){
            $where  = array('transaction_date >'=>'2020-01-01','position_code >'=>1);              
        }else{
            $where  = array('transaction_date >' => $_POST['searchByFromdate'],'transaction_date <' => $_POST['searchByTodate'],'position_code >'=>2);
        };
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_delegation->get_tables_where($tables,$search,$where,$isWhere);
        
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
        // $mdate="TR".mdate('%Y%m',time());        
        // $trxid2=$this->M_delegation->Max_data($mdate,'tb_approval')->row();        
        // if ($trxid2->trxid==NULL){
        //     // Jika belum ada
        //    $trxid3=$mdate."001";
        // }else{
        //    $trxid3=$trxid2->trxid;
        //    // Jika sudah ada maka naik 1 level
        //    $trxid3="TR".(intval(substr($trxid3,2,10))+1);
        // }
        // $trxid=$trxid3;
       
        // // ********************* 1. Set trxid  *********************
        // $post_data2=array('trxid'=>$trxid3);

        

        // ********************* 2. Transaction date  *********************
        $post_data2=array('transaction_date'=>mdate('%Y-%m-%d',time()));
                
         // ******************** 3. Collect all data post *********************     
        // $post_data = $this->input->post();   
        $post_data=array('problem_id'=>$this->input->post('problem_id'),'nik'=>$this->input->post('nik'),'name'=>$this->input->post('name'),'department_code'=>$this->input->post('department_code'),'department_name'=>$this->input->post('department_name'),'office_email'=>$this->input->post('office_email'),'position_code'=>$this->input->post('position_code'),'position_name'=>$this->input->post('position_name'));
        
        $msg = "success save";
              
        // ********************* 4. Merge data post *********************        
        $post_datamerge=array_merge($post_data,$post_data2);

        // ********************* 5. Simpan data     *********************

        $this->M_delegation->Input_Data($post_datamerge,'tb_approval');

        // ********************* 6. Upload file jika ada  *********************   
        if(!empty($_FILES['file']['name']))
        {
            $this->upload_file_attach('file',$trxid,'tb_approval');           
        }
       

        $data['status']= $msg;

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    
    
    public function ajax_update()
	{

         // ********************* 1. Collect data post *********************
         $positioncode=$this->input->post('position_code');

        //$post_data = $this->input->post();  

        if ($this->input->post('date_approve')==""){

            $post_data=array('problem_id'=>$this->input->post('problem_id'),'nik'=>$this->input->post('nik'),'name'=>$this->input->post('name'),'department_code'=>$this->input->post('department_code'),'department_name'=>$this->input->post('department_name'),'office_email'=>$this->input->post('office_email'),'position_code'=>$this->input->post('position_code'),'position_name'=>$this->input->post('position_name'),'date_approve'=>NULL);

        }else{

            $post_data=array('problem_id'=>$this->input->post('problem_id'),'nik'=>$this->input->post('nik'),'name'=>$this->input->post('name'),'department_code'=>$this->input->post('department_code'),'department_name'=>$this->input->post('department_name'),'office_email'=>$this->input->post('office_email'),'position_code'=>$this->input->post('position_code'),'position_name'=>$this->input->post('position_name'),'date_approve'=>$this->input->post('date_approve'));

        }
                
        $trxid=$this->input->post('trxid');
               
        $msg = "success Update";

        // **********************  Upload file (filename,trxid,table)  *********************   
        if(!empty($_FILES['file']['name']))
        {          
            $this->upload_file_attach('file',$trxid,'tb_approval');          
        }
                
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data);

        // **********************  Simpan data ************************        
        $where = array('trxid' => $trxid);        
        $this->M_delegation->Update_Data($where,$post_datamerge,'tb_approval');

        // **********************  Update struktur approver ************************    

        if($positioncode=="2"){ // 7 juga berubah

            //Update posisi yang ke tuju
            $post_data_7=array('nik'=>$this->input->post('nik'),'name'=>$this->input->post('name'),'department_code'=>$this->input->post('department_code'),'department_name'=>$this->input->post('department_name'),'office_email'=>$this->input->post('office_email'),'date_approve'=>NULL);
            $where = array('problem_id' => $this->input->post('problem_id'),'position_code' => '7');        
            $this->M_delegation->Update_Data($where,$post_data_7,'tb_approval');

            // **********************  Update status transaksi ke draft jika date_approve is null ************************ 
            if ($this->input->post('date_approve')==""){
                $where = array('hdrid' => $this->input->post('problem_id'));   
                $post_data_draft=array('draft'=>'Draft');
                $this->M_delegation->Update_Data($where,$post_data_draft,'tb_input_problem');
            }
            
        }else if ($positioncode=="3"){ // 4 (approver respon satu) dan 5 (approver respon dua) berubah

           // update to di input problem          
           $post_data_to=array('nik2'=>$this->input->post('nik'),'name2'=>$this->input->post('name'),'section2'=>$this->input->post('department_code'),'email2'=>$this->input->post('office_email'));
           $where = array('hdrid' => $this->input->post('problem_id'));        
           $this->M_delegation->Update_Data($where,$post_data_to,'tb_input_problem');
          
           // update responsible , approver responsible 1 dan 2
           $this->M_delegation->Update_Data_Approver($this->input->post('problem_id'),$this->input->post('nik'));


        }

        // Update status transaction
        $this->M_delegation->update_status_transaction($this->input->post('problem_id'));
               
        // **********************  Send mail notifikasi *************


        $data['status']="berhasil update";

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    public function ajax_delete()
	{

         
        $where = array('trxid' => $this->input->post('trxid'));
        $this->M_delegation->Delete_Data($where,'tb_approval');
        $data['status']="berhasil dihapus";
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    

    function ajax_getbytrxid(){      

        $trxid=$this->input->get('trxid');
        $data=$this->M_delegation->ajax_getbytrxid($trxid,'tb_approval')->row();
        echo json_encode($data);

    }

    function form_approver_link_mail(){
        
        $id_user_reg=$this->input->get('var1');
        $nik=$this->input->get('var2');
        
        $data['get_approver']=$this->M_delegation->get_approver($id_user_reg); 
		$data['get_requester']=$this->M_delegation->get_requester($id_user_reg); 
		$data['data']=$this->M_delegation->get_data($id_user_reg); 
        
        $this->load->view('email/V_delegation',$data); // Tampil data
      
    }

    function upload_file_attach($filename,$trxid,$table){

        if(!empty($_FILES[$filename]['name']))
        {
          
            $config['upload_path'] = './assets/upload';   
            $config['allowed_types'] = 'gif|jpg|png|pdf';         
            $config['overwrite'] = True;          
            $config['max_size']  = '1000000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['file_name']=$trxid.'_'.$filename;
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
               
                $where = array('trxid' => $trxid);        
                $this->M_delegation->Update_Data($where,$data_update,$table);

            }

        }

    }


    public function import() {

		// $this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {

			$this->session->set_flashdata('msg', 'File harus diisi');
            redirect('C_delegation');

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
                                $trxid2=$this->M_delegation->Max_data($mdate,'tb_approval')->row();  
                                if ($trxid2->trxid==NULL){
                                    // Jika belum ada
                                $trxid3=$mdate."001";
                                //    $resultData[$index]['trxid'] =   $trxid3;
                                }else{
                                    $trxid3=$trxid2->trxid;
                                    // Jika sudah ada maka naik 1 level
                                    $trxid3="TR".(intval(substr($trxid3,2,10))+1);
                                    // $resultData[$index]['trxid'] =   $trxid3;    
                                }

                            }else{
                                $trxid3="TR".(intval(substr($trxid3,2,10))+1);
                            }

                            $resultData[$index]['trxid'] =   $trxid3;  
                            $resultData[$index]['transaction_date'] = mdate('%Y-%m-%d',time());    

                        // ---------------------------------- Import Macro Batas sini 1---------------------------------

                            $resultData[$index]['nik'] = ucwords($value['A']);
                            $resultData[$index]['name'] = ucwords($value['B']);
                            $resultData[$index]['nik_delegation'] = ucwords($value['C']);
                            $resultData[$index]['name_delegation'] = ucwords($value['D']);
                            $resultData[$index]['kode_setion_delegation'] = ucwords($value['E']);
                            $resultData[$index]['name_section_delegation'] = ucwords($value['F']);
                            $resultData[$index]['email_delegation'] = ucwords($value['G']);
                            
                            $resultData[$index]['nik_delegation2'] = ucwords($value['H']);
                            $resultData[$index]['name_delegation2'] = ucwords($value['I']);
                            $resultData[$index]['kode_setion_delegation2'] = ucwords($value['J']);
                            $resultData[$index]['name_section_delegation2'] = ucwords($value['K']);
                            $resultData[$index]['email_delegation2'] = ucwords($value['L']);

                            // ---------------------------------- / Import Macro Batas sini 1--------------------------------
                            $index++;


                       }
                       
                    $rowexcel++;

				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_delegation->insert_batch('tb_approval',$resultData);
					if ($result > 0) {
						// $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
						redirect('C_delegation');
					}
				} else {
                        // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                        redirect('C_delegation');
				}

			}
		}
	}
    
    /** ---------------------------------------------- /Close controller----------------------------------------------**/

}

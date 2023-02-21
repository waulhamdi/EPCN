<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_position extends CI_Controller {

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
     /** ---------------------------------------------- position----------------------------------------------**/

     public function __construct(){
        parent::__construct();   

        if ($this->session->userdata('user_name')=="") {
			redirect('Auth');
		}

        $this->load->helper('date');
        $this->load->helper('file');        
        $this->load->model('M_position');
        // $this->load->library('encrypt');    
                  
      }

	public function Index()
	{

        // // $data['position'] = $this->M_position->Tampil_Data();
        $this->load->view('templates/header'); //Tampil header
		$this->load->view('templates/sidebar'); //Tampil Sidebar
		// // $this->load->view('position/V_position',$data); // Tampil data
        $this->load->view('position/V_position'); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer
               
    }

     // Satu table tanpa where
     function view_data()
     {
        
        $tables = "tb_position";         
        $search = array('position_code','position_name');
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         header('Content-Type: application/json');
         echo $this->M_position->get_tables($tables,$search,$isWhere);
         
     }

    // Satu table dengan where
    function view_data_where()
    {

        $tables = "tb_position";         
        $search = array('position_code','position_name');
        
        if($_POST['searchByFromdate']==''||$_POST['searchByTodate']==''){
            $where  = array('transaction_date >'=>'2020-01-01');              
        }else{
            $where  = array('transaction_date >' => $_POST['searchByFromdate'],'transaction_date <' => $_POST['searchByTodate']);
        };
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_position->get_tables_where($tables,$search,$where,$isWhere);
        
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
        $position_code2=$this->M_position->Max_data($mdate,'tb_position')->row();        
        if ($position_code2->position_code==NULL){
            // Jika belum ada
           $position_code3=$mdate."001";
        }else{
           $position_code3=$position_code2->position_code;
           // Jika sudah ada maka naik 1 level
           $position_code3="TR".(intval(substr($position_code3,2,10))+1);
        }
        $position_code=$position_code3;
       
        // ********************* 1. Set position_code  *********************
        $post_data2=array('position_code'=>$position_code3);

        // ********************* 2. Transaction date  *********************
        $post_data3=array('transaction_date'=>mdate('%Y-%m-%d',time()));
                
         // ******************** 3. Collect all data post *********************     
        $post_data = $this->input->post();   

        $msg = "success save";
              
        // ********************* 4. Merge data post *********************        
        $post_datamerge=array_merge($post_data,$post_data2,$post_data3);

        // ********************* 5. Simpan data     *********************

        $this->M_position->Input_Data($post_datamerge,'tb_position');

        // ********************* 6. Upload file jika ada  *********************   
        if(!empty($_FILES['file']['name']))
        {
            $this->upload_file_attach('file',$position_code,'tb_position');           
        }
       

        $data['status']= $msg;

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
        
    public function ajax_update()
	{

         // ********************* 1. Collect data post *********************
        $post_data = $this->input->post();
        $position_code=$this->input->post('position_code');
       
        $msg = "success Update";

        // **********************  Upload file (filename,position_code,table)  *********************   
        if(!empty($_FILES['file']['name']))
        {          
            $this->upload_file_attach('file',$position_code,'tb_position');          
        }
                
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data);

        // **********************  Simpan data ************************        
        $where = array('position_code' => $position_code);        
        $this->M_position->Update_Data($where,$post_datamerge,'tb_position');

        $data['status']="berhasil update";

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    public function ajax_delete()
	{

         
        $where = array('position_code' => $this->input->post('position_code'));
        $this->M_position->Delete_Data($where,'tb_position');
        $data['status']="berhasil dihapus";
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    

    function ajax_getbyposition_code(){      

        $position_code=$this->input->get('position_code');
        $data=$this->M_position->ajax_getbyposition_code($position_code,'tb_position')->row();
        echo json_encode($data);

    }

    function form_approver_link_mail(){
        
        $id_user_reg=$this->input->get('var1');
        $nik=$this->input->get('var2');
        
        $data['get_approver']=$this->M_position->get_approver($id_user_reg); 
		$data['get_requester']=$this->M_position->get_requester($id_user_reg); 
		$data['data']=$this->M_position->get_data($id_user_reg); 
        
        $this->load->view('email/V_position',$data); // Tampil data
      
    }

    function upload_file_attach($filename,$position_code,$table){

        if(!empty($_FILES[$filename]['name']))
        {
          
            $config['upload_path'] = './assets/upload';   
            $config['allowed_types'] = 'gif|jpg|png|pdf';         
            $config['overwrite'] = True;          
            $config['max_size']  = '1000000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['file_name']=$position_code.'_'.$filename;
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
               
                $where = array('position_code' => $position_code);        
                $this->M_position->Update_Data($where,$data_update,$table);

            }

        }

    }


    public function import() {

		// $this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {

			$this->session->set_flashdata('msg', 'File harus diisi');
            redirect('C_position');

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

				foreach ($sheetData as $key => $value) {

                     // ********************* 0. Generate nomor transaksi  *********************          
                       
                        // Cari database sekali saja
                        if($index==0){
                            $mdate="TR".mdate('%Y%m',time());        
                            $position_code2=$this->M_position->Max_data($mdate,'tb_position')->row();  
                            if ($position_code2->position_code==NULL){
                                // Jika belum ada
                               $position_code3=$mdate."001";
                            //    $resultData[$index]['position_code'] =   $position_code3;
                            }else{
                                $position_code3=$position_code2->position_code;
                                // Jika sudah ada maka naik 1 level
                                $position_code3="TR".(intval(substr($position_code3,2,10))+1);
                                // $resultData[$index]['position_code'] =   $position_code3;    
                            }

                        }else{
                            $position_code3="TR".(intval(substr($position_code3,2,10))+1);
                        }

                        $resultData[$index]['position_code'] =   $position_code3;  
                        $resultData[$index]['transaction_date'] = mdate('%Y-%m-%d',time());    

                       // ---------------------------------- Import Macro Batas sini 1---------------------------------
                    
                       //  Sample
                                           
                        $resultData[$index]['position_name'] = ucwords($value['A']);
                        
                    // ---------------------------------- / Import Macro Batas sini 1--------------------------------

					// if ($key != 1) {

						// $check = $this->M_legalitas->check_nama($value['C']);
						
						// Tanggal Terbit
						// $tanggal = substr($value['E'],0,2);
						// $bulan = substr($value['E'],3,2);
						// $tahun = substr($value['E'],6,4);
						// $date = $tahun.'-'.$bulan.'-'.$tanggal;

						// Tanggal Berakhir
						// $tanggal2 = substr($value['F'],0,2);
						// $bulan2 = substr($value['F'],3,2);
						// $tahun2 = substr($value['F'],6,4);
						// $date2 = $tahun2.'-'.$bulan2.'-'.$tanggal2;

						// if ($check != 1) {
						// 	$resultData[$index]['kategori'] = ucwords($value['A']);
						// 	$resultData[$index]['nama_doc'] = ucwords($value['C']);
						// 	$resultData[$index]['no_doc'] = ucwords($value['D']);
						// 	$resultData[$index]['t_terbit'] = $date;
						// 	$resultData[$index]['t_berakhir'] = $date2;
						// 	$resultData[$index]['instansi'] = ucwords($value['G']);
						// 	$resultData[$index]['keterangan'] = ucwords($value['H']);
						// 	$resultData[$index]['file'] = 'No File';
						// 	$resultData[$index]['status'] = 'MASIH BERLAKU';
						// }

					// }

					$index++;

				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_position->insert_batch('tb_position',$resultData);
					if ($result > 0) {
						// $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
						redirect('C_position');
					}
				} else {
                        // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                        redirect('C_position');
				}

			}
		}
	}
    
    /** ---------------------------------------------- /Close controller----------------------------------------------**/

}

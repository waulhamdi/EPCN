<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ppm_case_target_yearly extends CI_Controller {

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
     /** ---------------------------------------------- ppm_case_target_yearly----------------------------------------------**/

     public function __construct(){
        parent::__construct();   

        if ($this->session->userdata('user_name')=="") {
			redirect('Auth');
		}

        $this->load->helper('date');
        $this->load->helper('file');        
        $this->load->model('M_ppm_case_target_yearly');
        // $this->load->library('encrypt');    
                  
      }

	public function Index()
	{   
        $data['group_products'] = $this->M_ppm_case_target_yearly->tampil_group_product();
        $data['jeniss'] = ['PPM','Case'];

        // // $data['ppm_case_target_yearly'] = $this->M_ppm_case_target_yearly->Tampil_Data();
        $this->load->view('templates/header'); //Tampil header
		$this->load->view('templates/sidebar'); //Tampil Sidebar
		// // $this->load->view('ppm_case_target_yearly/V_ppm_case_target_yearly',$data); // Tampil data
        $this->load->view('ppm_case_target_yearly/V_ppm_case_target_yearly',$data); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer
               
    }

     // Satu table tanpa where
     function view_data()
     {
        
        $tables = "tb_ppm_case_target_yearly";        
        $search = array('hdrid','year_ppm_case_target_yearly','case_target_yearly','case_actual_yearly','ppm_target_yearly','ppm_actual_yearly','ppm_case_date_yearly','group_product_id_yearly','group_product_name_yearly','quantity_ppm_case_target_yearly','jenis_yearly','target_monthly_yearly','target_yearly_yearly');

         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         header('Content-Type: application/json');
         echo $this->M_ppm_case_target_yearly->get_tables($tables,$search,$isWhere);
         
     }

    // Satu table dengan where
    function view_data_where()
    {

        $tables = "tb_ppm_case_target_yearly";        
        $search = array('hdrid','year_ppm_case_target_yearly','case_target_yearly','case_actual_yearly','ppm_target_yearly','ppm_actual_yearly','ppm_case_date_yearly','group_product_id_yearly','group_product_name_yearly','quantity_ppm_case_target_yearly','jenis_yearly','target_monthly_yearly','target_yearly_yearly');

        
        if($_POST['searchByFromdate']==''||$_POST['searchByTodate']==''){
            $where  = array('transaction_date >'=>'2020-01-01');              
        }else{
            $where  = array('transaction_date >' => $_POST['searchByFromdate'],'transaction_date <' => $_POST['searchByTodate']);
        };
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_ppm_case_target_yearly->get_tables_where($tables,$search,$where,$isWhere);
        
    }

    // Multy table / Query
    function view_data_query()
    {

        $query  = "SELECT kategori.name_kategori AS name_kategori, subkat.* FROM subkat 
                    JOIN kategori ON subkat.id_kategori = kategori.id_kategori";
        $search = array('name_kategori','subkat','tgl_add');
        $where  = null; 
        // $where  = array('name_kategori' => 'Tutorial');
        
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
        // $kodeB =  $this->M_ppm_case_target_yearly->get_ppm_case_date();
        
        // ********************* 0. Generate nomor transaksi  *********************          
        $mdate="TR".mdate('%Y%m',time());        
        $hdrid2=$this->M_ppm_case_target_yearly->Max_data($mdate,'tb_ppm_case_target_yearly')->row();        
        // $ppm_case_date1=$this->M_ppm_case_target_yearly->Max_data($mdate,'tb_ppm_case_target_yearly')->row();        
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

        $Year=$this->input->post('year_ppm_case_target_yearly');

        $post_data4=array('ppm_case_date_yearly'=>$Year . "-04" . "-01");

        $post_data5=array('year_ppm_case_target_yearly'=>$Year . "-04" . "-01");
        
         // ******************** 3. Collect all data post *********************     
        $post_data = $this->input->post();   

        $msg = "success save";
              
        // ********************* 4. Merge data post *********************        
        $post_datamerge=array_merge($post_data,$post_data2,$post_data3,$post_data4,$post_data5);
        
        // ********************* 5. Simpan data     *********************

        $this->M_ppm_case_target_yearly->Input_Data($post_datamerge,'tb_ppm_case_target_yearly');

        // ********************* 6. Upload file jika ada  *********************   
        if(!empty($_FILES['file']['name']))
        {
            $this->upload_file_attach('file',$hdrid,'tb_ppm_case_target_yearly');           
        }
       

        $data['status']= $msg;

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    
    
    public function ajax_update()
	{

         // ********************* 1. Collect data post *********************        
        $hdrid=$this->input->post('hdrid');
       
        $msg = "success Update";

        // **********************  Upload file (filename,hdrid,table)  *********************   
        if(!empty($_FILES['file']['name']))
        {          
            $this->upload_file_attach('file',$hdrid,'tb_ppm_case_target_yearly');          
        }
                
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);


        //$Year=$this->input->post('year_ppm_case_target_yearly');

        $Year=substr($this->input->post('year_ppm_case_target_yearly'),0,4) ;
      
      
        $post_data4=array('ppm_case_date_yearly'=>$Year . "-04" . "-01");
        $post_data5=array('year_ppm_case_target_yearly'=>$Year . "-04" . "-01");
        $post_data = $this->input->post();

        $post_datamerge=array_merge($post_data,$post_data,$post_data4,$post_data5);

        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);        
        $this->M_ppm_case_target_yearly->Update_Data($where,$post_datamerge,'tb_ppm_case_target_yearly');

        $data['status']="berhasil update";

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    public function ajax_delete()
	{

         
        $where = array('hdrid' => $this->input->post('hdrid'));
        $this->M_ppm_case_target_yearly->Delete_Data($where,'tb_ppm_case_target_yearly');
        $data['status']="berhasil dihapus";
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    

    function ajax_getbyhdrid(){      

        $hdrid=$this->input->get('hdrid');
        $data=$this->M_ppm_case_target_yearly->ajax_getbyhdrid($hdrid,'tb_ppm_case_target_yearly')->row();
        echo json_encode($data);

    }

    function form_approver_link_mail(){
        
        $id_user_reg=$this->input->get('var1');
        $nik=$this->input->get('var2');
        
        $data['get_approver']=$this->M_ppm_case_target_yearly->get_approver($id_user_reg); 
		$data['get_requester']=$this->M_ppm_case_target_yearly->get_requester($id_user_reg); 
		$data['data']=$this->M_ppm_case_target_yearly->get_data($id_user_reg); 
        
        $this->load->view('email/V_ppm_case_target_yearly',$data); // Tampil data
      
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
                $this->M_ppm_case_target_yearly->Update_Data($where,$data_update,$table);

            }

        }

    }


    public function import() {

		// $this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {

			$this->session->set_flashdata('msg', 'File harus diisi');
            redirect('C_ppm_case_target_yearly');

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
                        if($index==1){
                            $mdate="TR".mdate('%Y%m',time());        
                            $hdrid2=$this->M_ppm_case_target_yearly->Max_data($mdate,'tb_ppm_case_target_yearly')->row();  
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

                            if($index>1){
                                $hdrid3="TR".(intval(substr($hdrid3,2,10))+1);
                            }
                           
                        }

                        if($index>0){


                            $resultData[$index]['hdrid'] =   $hdrid3;  
                            $resultData[$index]['transaction_date'] = mdate('%Y-%m-%d',time()); 

                            $date=ucwords($value['D'])."-"."04"."-"."01";

                        // ---------------------------------- Import Macro Batas sini 1---------------------------------
                        
                        //  Sample

                            $resultData[$index]['group_product_id_yearly'] = ucwords($value['B']);
                            $resultData[$index]['group_product_name_yearly'] = ucwords($value['C']);

                            $resultData[$index]['year_ppm_case_target_yearly'] = $date;
                            $resultData[$index]['ppm_case_date_yearly'] =   $date;

                            $resultData[$index]['case_target_yearly'] = ucwords($value['E']);
                            $resultData[$index]['case_actual_yearly'] = ucwords($value['F']);

                            $resultData[$index]['ppm_target_yearly'] = ucwords($value['G']);
                            $resultData[$index]['ppm_actual_yearly'] = ucwords($value['H']);
                            
                            // $resultData[$index]['quantity_ppm_case_target_yearly'] = ucwords($value['A']);
                            // $resultData[$index]['jenis_yearly'] = ucwords($value['A']);
                            // $resultData[$index]['target_monthly_yearly'] = ucwords($value['A']);
                            // $resultData[$index]['target_yearly_yearly'] = ucwords($value['A']);

                        // ---------------------------------- / Import Macro Batas sini 1--------------------------------


                        }
                       

					

					$index++;

				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_ppm_case_target_yearly->insert_batch('tb_ppm_case_target_yearly',$resultData);
					if ($result > 0) {
						// $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
						redirect('C_ppm_case_target_yearly');
					}
				} else {
                        // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                        redirect('C_ppm_case_target_yearly');
				}

			}
		}
	}
    
    /** ---------------------------------------------- /Close controller----------------------------------------------**/

}

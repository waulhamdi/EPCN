<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {

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
     /** ---------------------------------------------- User----------------------------------------------**/


     public function __construct(){
        parent::__construct();   

        $this->load->helper('date');
        $this->load->helper('file');        
        $this->load->model('M_User');
        $this->load->library('form_validation');
        $this->load->model('UserModel');  //untuk load user model hak akses menu     
        // $this->load->library('encrypt');   

        // Cari hak akses by controller
	    $Hak_akses = $this->UserModel->get_controller_access($this->session->userdata('role_id'),'C_User'); 
	    if($Hak_akses->found!='found') {
		    redirect('Auth'); // Kembali ke halaman Auth
	    }          
      }


	public function Index()
	{
        $data['hasil'] =$this->M_User->get_tb_department();
        $data['hasil2'] =$this->M_User->get_tb_role();
        $data['nik'] =$this->M_User->get_tb_user();

        $menu_code = $this->input->get('var');                  // Decrypt menu ID   untuk dekrip menu   
        $menu_name = $this->input->get('var2');                 // Decrypt menu ID   untuk dekrip menu name  
        $data['menu_name'] =  $menu_name; 
        $menu_akses['menu_akses']=$this->UserModel->get_menu_access($this->session->userdata('role_id'));           //Menu akses untuk munculkan menu   
        $data['hak_akses']=$this->UserModel->get_hak_access($this->session->userdata('role_id'), $menu_code);       //button akses(Add,Adit,View,Delete,Import,Export)
       
        // // $data['User'] = $this->M_User->Tampil_Data();
        $this->load->view('templates/header'); //Tampil header
		$this->load->view('templates/sidebar_new',$menu_akses); //Tampil Sidebar
		$this->load->view('User/V_User',$data); // Tampil data
        // $this->load->view('User/V_User'); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer
               
    }


     // Satu table tanpa where
     function view_data()
     {
        
        $tables = "a_user_system";         
         $search = array('hdrid','nik','role_id','role_name','username');
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         header('Content-Type: application/json');
         echo $this->M_User->get_tables($tables,$search,$isWhere);
         
     }

    // Satu table dengan where
    function view_data_where()
    {

        $tables = "a_user_system";         
        $search = array('hdrid','nik','role_id','role_name','username');
               
        $where  = array('transaction_date >'=>'2020-01-01');  

        // if($_POST['searchByFromdate']==''||$_POST['searchByTodate']==''){
        //     $where  = array('transaction_date >'=>'2020-01-01');              
        // }else{
        //     $where  = array('transaction_date >' => $_POST['searchByFromdate'],'transaction_date <' => $_POST['searchByTodate']);
        // };
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_User->get_tables_where($tables,$search,$where,$isWhere);
        
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
        $mdate="USR".mdate('%Y%m',time());        
        $hdrid2=$this->M_User->Max_data($mdate,'a_user_system')->row();        
        if ($hdrid2->hdrid==NULL){
            // Jika belum ada
           $hdrid3=$mdate."001";
        }else{
           $hdrid3=$hdrid2->hdrid;
           // Jika sudah ada maka naik 1 level
           $hdrid3="USR".(intval(substr($hdrid3,3,10))+1);
        }
                
        // ********************* 1. Set hdrid  *********************
        $post_data2=array('hdrid'=>$hdrid3);
        $post_data3=array('transaction_date'=>mdate('%Y%m%d',time()));

         // ********************* 2. Collect all data post *********************     
        $post_data = $this->input->post();   

        $msg = "success save";

        // ********************** 4. Upload file jika ada  *********************   
        if(!empty($_FILES['file']['name']))
        {
          
            $config['upload_path'] = './assets/upload';   
            $config['allowed_types'] = 'gif|jpg|png|pdf';         
            $config['overwrite'] = True;          
            $config['max_size']  = '1000000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['file_name']=$hdrid3;
            $this->load->library('upload', $config);

            $post_data3=array('keterangan'=>$hdrid3);

            if ( ! $this->upload->do_upload('file')){
                // $status = "error";
                 $msg = $this->upload->display_errors();
            }
            else{
                 $msg = "success upload";

                // $dataupload = $this->upload->data();
                // $status = "success";
                // $msg = $dataupload['file_name']." berhasil diupload";              
                // $this->M_wiretransfer_approver->update_file_attach($hdrid,$field,$dataupload['file_name']);

            }

        }else{

            
        }
        
           
        // ********************* 3. Merge data post *********************        
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data2,$post_data3);

        // ********************** 4. Simpan data     *********************

        $this->M_User->Input_Data($post_datamerge,'a_user_system');
        

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

        // ********************** 4. Upload file jika ada  *********************   
        // if(!empty($_FILES['file']['name']))
        // {
          
        //     $config['upload_path'] = './assets/upload';   
        //     $config['allowed_types'] = 'gif|jpg|png|pdf';         
        //     $config['overwrite'] = True;          
        //     $config['max_size']  = '1000000';
        //     $config['max_width']  = '1024';
        //     $config['max_height']  = '768';
        //     $config['file_name']=$hdrid;
        //     $this->load->library('upload', $config);

        //     $post_data3=array('keterangan'=>$hdrid);

        //     if ( ! $this->upload->do_upload('file')){
        //         // $status = "error";
        //          $msg = $this->upload->display_errors();
        //     }
        //     else{
        //          $msg = "success upload";

        //         // $dataupload = $this->upload->data();
        //         // $status = "success";
        //         // $msg = $dataupload['file_name']." berhasil diupload";              
        //         // $this->M_wiretransfer_approver->update_file_attach($hdrid,$field,$dataupload['file_name']);

        //     }

        // }

        
         // ********************* 3. Merge data post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data);

        // ********************** 4. Simpan data ************************
        
        $where = array('hdrid' => $hdrid);        
        $this->M_User->Update_Data($where,$post_datamerge,'a_user_system');


        $data['status']="berhasil update";

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    public function ajax_delete()
	{
         
        $where = array('hdrid' => $this->input->post('hdrid'));
        $this->M_User->Delete_Data($where,'a_user_system');
        $data['status']="berhasil dihapus";
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    

    function ajax_getbyhdrid(){      

        $hdrid=$this->input->get('hdrid');
        $data=$this->M_User->ajax_getbyhdrid($hdrid,'a_user_system')->row();
        echo json_encode($data);

    }

    

    
    /** ---------------------------------------------- /Close controller----------------------------------------------**/

}

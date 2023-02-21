<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Role extends CI_Controller {

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
	 * @see https://codeigniter.com/Role_guide/general/urls.html
	 **/
     /** ---------------------------------------------- Role----------------------------------------------**/


     public function __construct(){
        parent::__construct();   

        $this->load->helper('date');
        $this->load->helper('file');        
        $this->load->model('M_Role');
        // $this->load->library('encrypt');    
                  
      }


	public function Index()
	{
        $data['hasil'] =$this->M_Role->get_tb_menu();
        // // $data['Role'] = $this->M_Role->Tampil_Data();
        $this->load->view('templates/header'); //Tampil header
		$this->load->view('templates/sidebar'); //Tampil Sidebar
		// // $this->load->view('Role/V_Role',$data); // Tampil data
        $this->load->view('Role/V_Role',$data); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer
               
    }


     // Satu table tanpa where
     function view_data()
     {
        
        $tables = "a_user_role";         
        $search = array('role_id','role_name','description');

         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         header('Content-Type: application/json');
         echo $this->M_Role->get_tables($tables,$search,$isWhere);
         
     }

    // Satu table dengan where
    function view_data_where()
    {

        $tables = "a_user_role";         
        $search = array('role_id','role_name','description');

               
        if($_POST['searchByFromdate']==''||$_POST['searchByTodate']==''){
            $where  = array('transaction_date >'=>'2020-01-01');              
        }else{
            $where  = array('transaction_date >' => $_POST['searchByFromdate'],'transaction_date <' => $_POST['searchByTodate']);
        };
        
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_Role->get_tables_where($tables,$search,$where,$isWhere);
        
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


    //    if($this->session->Roledata('authenticated')){ // Jika Role sudah login (Session authenticated ditemukan)
    //     }else{
    //     redirect('auth');
    //     }

    public function ajax_add()
	{

        // ********************* 0. Generate nomor transaksi  *********************          
       // ********************* 0. Generate nomor transaksi  *********************          
       $mdate="RL".mdate('%Y%m',time());        
       $role_id2=$this->M_Role->Max_data($mdate,'a_user_role')->row();        
       if ($role_id2->role_id==NULL){
           // Jika belum ada
          $role_id3=$mdate."001";
       }else{
          $role_id3=$role_id2->role_id;
          // Jika sudah ada maka naik 1 level
          $role_id3="RL".(intval(substr($role_id3,2,10))+1);
       }
                
        // ********************* 1. Set role_id  *********************
        $post_data2=array('role_id'=>$role_id3);
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
            $config['file_name']=$role_id3;
            $this->load->library('upload', $config);

            $post_data3=array('keterangan'=>$role_id3);

            if ( ! $this->upload->do_upload('file')){
                // $status = "error";
                 $msg = $this->upload->display_errors();
            }
            else{
                 $msg = "success upload";

                // $dataupload = $this->upload->data();
                // $status = "success";
                // $msg = $dataupload['file_name']." berhasil diupload";              
                // $this->M_wiretransfer_approver->update_file_attach($role_id,$field,$dataupload['file_name']);

            }

        }else{

            
        }
        
           
        // ********************* 3. Merge data post *********************        
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data2,$post_data3);

        // ********************** 4. Simpan data     *********************

        $this->M_Role->Input_Data($post_datamerge,'a_user_role');
        

        $data['status']= $msg;

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    
    
    public function ajax_update()
	{

         // ********************* 1. Collect data post *********************
        $post_data = $this->input->post();
        $role_id=$this->input->post('role_id');
       
        $msg = "success Update";

        // ********************** 4. Upload file jika ada  *********************   
        if(!empty($_FILES['file']['name']))
        {
          
            $config['upload_path'] = './assets/upload';   
            $config['allowed_types'] = 'gif|jpg|png|pdf';         
            $config['overwrite'] = True;          
            $config['max_size']  = '1000000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['file_name']=$role_id;
            $this->load->library('upload', $config);

            $post_data3=array('keterangan'=>$role_id);

            if ( ! $this->upload->do_upload('file')){
                // $status = "error";
                 $msg = $this->upload->display_errors();
            }
            else{
                 $msg = "success upload";

                // $dataupload = $this->upload->data();
                // $status = "success";
                // $msg = $dataupload['file_name']." berhasil diupload";              
                // $this->M_wiretransfer_approver->update_file_attach($role_id,$field,$dataupload['file_name']);

            }

        }

        
         // ********************* 3. Merge data post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge=array_merge($post_data,$post_data);

        // ********************** 4. Simpan data ************************
        
        $where = array('role_id' => $role_id);        
        $this->M_Role->Update_Data($where,$post_datamerge,'a_user_role');


        $data['status']="berhasil update";

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    public function ajax_delete()
	{

         
        $where = array('role_id' => $this->input->post('role_id'));
        $this->M_Role->Delete_Data($where,'a_user_role');
        $data['status']="berhasil dihapus";
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }
    

    function ajax_getbyrole_id(){      

        $role_id=$this->input->get('role_id');
        $data=$this->M_Role->ajax_getbyrole_id($role_id,'a_user_role')->row();
        echo json_encode($data);

    }

    
    /** ---------------------------------------------- /Close controller----------------------------------------------**/

}

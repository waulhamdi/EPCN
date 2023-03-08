<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {
    
    // Get central User
    public function get($username){
      
        $DB2 = $this->load->database('db_central_user', TRUE);   // Database central user
        $DB2->where('user_name', $username);                // Untuk menambahkan Where Clause : username='$username'
        $result = $DB2->get('Tb_user_login')->row();        // Untuk mengeksekusi dan mengambil data hasil query
        $DB2->Close();
        return $result;

    }

    public function get2($username){
      
        $DB2 = $this->load->database('db_central_user', TRUE);       // Database central user db_central_user
        $DB2->where('user_name', $username);                // Untuk menambahkan Where Clause : username='$username'
        $result = $DB2->get('Tb_user_login');        // Untuk mengeksekusi dan mengambil data hasil query        
        
        if($result->num_rows() > 0){
            $hasil = $result->row();
            $data['status'] = 'ok';
            $data['result'] =$hasil;            
        }else{
            $data['status'] = 'not found';
            $data['result'] = '';
        }

        $DB2->Close();
        
        return $data;
       
    }


    Public Function get_user_request($nik=NUll)
    {

        $DB2 = $this->load->database('db_central_user', TRUE);
        $DB2->where('user_name', $nik); 
        $query=$this->DB2->get('Tb_user_login');
        $DB2->Close();

        // $DB3 = $this->load->database('db_central_user', TRUE); 


        // $DB2 = $this->load->database('db_central_user', TRUE);   // Database central user
        // $DB2->where('user_name', $nik);                // Untuk menambahkan Where Clause : username='$username'
        // $query = $DB2->get('Tb_user_login');        // Untuk mengeksekusi dan mengambil data hasil query
        // $DB2->Close();

        // $this->db->select("roleid,rolename");
        // $this->db->from('a_user_system');
        // $this->db->where('nik',$nik); 
        // $query = $this->db->get();        
        // return $query->result();

        /* Jika ketemu datanya */
        if($query->num_rows() > 0){
                $hasil = $query->row();
                $data['status'] = 'ok';
                $data['result'] =$hasil;            
        }else{
                $data['status'] = 'not found';
                $data['result'] = '';
        }

        //  $data['status'] ='OK';
        //  $data['result'] ='OK';   

        return $data;      

    }



    // function get_tb_email_user($kobar){

        //     $DB3 = $this->load->database('db_central_user', TRUE);
        //     $hsl=$this->DB3->query("SELECT * FROM Tb_user_login where user_name='$kobar'");
        //     if($hsl->num_rows()>0){
        //         foreach ($hsl->result() as $data) {
        //             $result=array(
        //                 'user_name' => $data->user_name,
        //                 'NAME' => $data->NAME,
        //                 'Personalemail' => $data->Personalemail,
        //                 'OfficeEmail' => $data->OfficeEmail,
        //                 );
        //         }
        //     }
        //     $DB3->Close();
        //     return $result;
    // }


    // Get HRSS Employee
    public function getemployeedetail($username){
    
        $DB3 = $this->load->database('db_central_user', TRUE);    // Database central user
        $DB3->where('user_name', $username);                // Untuk menambahkan Where Clause : username='$username'
        $result = $DB3->get('Tb_user_login')->row();        // Untuk mengeksekusi dan mengambil data hasil query
        $DB3->Close();
        return $result;

    }


    // Get HRSS Employee
    // public function ajax_getemployeedetail($user_name){
    
        //     $DB3 = $this->load->database('db_central_user', TRUE);    // Database central user
        //     // $DB3->where('user_name','DM1902060');                // Untuk menambahkan Where Clause : username='$username'
        //     $result = $DB3->get('Tb_user_login')->row();        // Untuk mengeksekusi dan mengambil data hasil query
        //     $DB3->Close();
        //     return $result;
       
    // }

    function ajax_getbyhdrid(){      
        $DB3 = $this->load->database('db_central_user', TRUE); 
        $result = $DB3->get('Tb_user_login');
        $DB3->Close();
        return $result;

     }



    // Get Role
    public function getroleid($username){

        $this->db->select("role_id,role_name");
        $this->db->from('a_user_system');
        $this->db->where('nik',$username); 
        $query = $this->db->get();        
        return $query->row();

    }

    // Get Menu Access
    public function getuseraccess($roleid){

        
        $this->db->select("menu_id,allow_add,allow_edit,allow_delete");
        $this->db->from('a_user_role_access');
        $this->db->where('role_id',$roleid); 
        $query = $this->db->get();
        return $query->result();
        
      }

    // public function getNameUser($username){   //Ambil nama       
        //     $DB2 = $this->load->database('db_central_user', TRUE);   //Konect database ke dua
        //     $DB2->where('user_name', $username);                      // Untuk menambahkan Where Clause : username='$username'
        //     $result = $DB2->get('Tb_user_login')->row();  // Untuk mengeksekusi dan mengambil data hasil query        
        //     return $result;        
    // }
    


    // public function getrolename($roleid){

        //     $this->db->select("rolename");
        //     $this->db->from('tb_setrole');
        //     $this->db->where('roleid',$roleid); 
        //     $query = $this->db->get();        
        //     return $query->row();

    // }
       

    function update_password($username,$passwordnew,$table){
       
        $DB4 = $this->load->database('db_central_user', TRUE); //Konect database ke dua
        $sql = "Update ".$table." set password='".$passwordnew."' where user_name='".$username."'";
        $emp = $DB4->query($sql);
        $DB4->Close();

    }

    // public function getPersonalData($username){

        //     $DB3 = $this->load->database('db_central_user', TRUE); //Konect database ke dua
        //     $sql = "SELECT top 1 * FROM v_ess_personal_data where NIK='".$username."'";
        //     $emp = $DB3->query($sql)->row();
        //     $data['emp'] = $emp;

        //     foreach($DB3->query($sql)->result() as $row){
        //         $data['image_file'] = base64_encode($row->PhotoObj);
        //         $finfo = finfo_open(FILEINFO_MIME);
        //         $image_type = explode(';',finfo_buffer($finfo,$row->PhotoObj,FILEINFO_MIME));
        //         $image_type = $image_type[0];
        //         $image_type = explode('/',$image_type);
        //         $data['image_type'] = $image_type[1]; 
        //     }
                    
        //     //$data['nationality'] = $this->Func->load_combo('cboNationality','nationality',$emp->WargaNegara_ID);
        //     //$data['blood_type'] = $this->Func->load_combo('cboBloodType','blood_type',$emp->Gol_Darah);
        //     //$data['religion'] = $this->Func->load_combo('cboReligion','religion',$emp->Agama);
        //     //$data['dress_size'] = $this->Func->load_combo('cboDressSize','dress',$emp->Baju);
        //     //$data['pants_size'] = $this->Func->load_combo('cboPantsSize','pants',$emp->Celana);
        //     //$data['soes_size'] = $this->Func->load_combo('cboSoesSize','soes',$emp->Sepatu);
        //     //$data['hat_size'] = $this->Func->load_combo('cboHatSize','hat',$emp->Topi);
        //     //$data['helmet_size'] = $this->Func->load_combo('cboHelmetSize','helmet',$emp->Helmet);
        //     //$data['job_location'] = $this->Func->load_combo('cboJobLocation','job_location',$emp->WilayahKerja);
        //     //$data['home_area'] = $this->Func->load_combo('cboHomeArea','home_area', $emp->Home_Area_Id);
        //     //$data['cost_id'] = $this->Func->load_combo('cboCostId','cost_id',$emp->Cost_Id);
        
        //     return $emp;

    // }

    /// @see menampilkan menu di side bar
    /// @note jika administrator muncul semua menu dan jika user muncul menu berdasarkan role nya masing-masing

    /// @see get_menu_access()
    /// @note 
    /// @attention
    public function get_menu_access($roleid){

        if($this->session->userdata('rolename')=='Super Admin'){ // Administrator tampil semua menu tanpa kondisi
            $sql="select * from a_menu order by menu_id asc";
        }else{
            $sql="select * from a_menu where menu_id in (select menu_id from a_user_role_access where role_id='$roleid' ) order by menu_id asc"; // Tampil menu berdasarkan role
        }

        $query = $this->db->query($sql); // execute query
        return $query->result(); // mengembalikan hasil query

        // if($query->num_rows() > 0){

        //       return $query->result(); // mengembalikan hasil query

        // }else{
        //         $data['status'] = 'not found';
        //         $data['result'] = '';
        // }

    }
    
    /// @see menampilkan hak akses  (add,edit,delete,import,export) pada form
    /// @note jika administrator memiliki semua hak akses sedangnkan user sesuai role

    /// @see get_hak_access()
    /// @note 
    /// @attention
    public function get_hak_access($roleid,$menu_id){

        if($this->session->userdata('rolename')=='Super Admin'){ // Administrator tampil semua akses (add,edit,delete,import,export)
            $sql="select top 1  ('on') as allow_add	,('on') as allow_edit	,('on') as allow_delete	,('on') as allow_import	,('on') as allow_export from a_user_role_access";
        }else{
            $sql="select * from a_user_role_access where role_id='$roleid' and menu_id='$menu_id'"; // Tampil akses (add,edit,delete,import,export) berdasarkan role
        }

        $query = $this->db->query($sql); // execute query
        return $query->row(); // mengembalikan hasil query

        
    }

    /// @see get_menu_access()
    /// @note 
    /// @attention
    public function get_controller_access($roleid,$controller){


        if($this->session->userdata('rolename')=='Super Admin'){ // Administrator tampil semua menu tanpa kondisi
            $sql="select top 1 controller from a_menu";
        }else{
            $sql="select controller from a_menu where menu_id in(select menu_id from a_user_role_access where role_id='$roleid') and controller='$controller'"; // Tampil menu berdasarkan role
        }

        $query = $this->db->query($sql); // execute query
    
        if($query->num_rows() > 0){

        $query = (object) array('found'=>'found');
        return $query;

        }
        else{

        $query = (object) array('found'=>'not found');
        return $query;
            
        }

        
    }

}
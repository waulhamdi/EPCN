<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Menu extends CI_Model {
      
    /// @see get_tables()
    /// @note datatable
    /// @attention ada beberapa fitur seperti search, sortir, pagination
    function get_tables($tables,$cari,$iswhere)
    {
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // Ambil data start
        $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 
        
        $query = $tables;
        
        if(!empty($iswhere)){
            $sql = $this->db->query("SELECT * FROM ".$query." WHERE ".$iswhere);
        }else{
            $sql = $this->db->query("SELECT * FROM ".$query);
        }

        $sql_count = $sql->num_rows();

        $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
        
        // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $order_field = $_POST['order'][0]['column']; 

        // Untuk menentukan order by "ASC" atau "DESC"
        $order_ascdesc = $_POST['order'][0]['dir']; 
        $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

        if(!empty($iswhere)){
            $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
        }else{
            $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
        }

        if(isset($search))
        {
            if(!empty($iswhere)){
                $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE $iswhere (".$cari.")");
            }else{
                $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE (".$cari.")");
            }
            $sql_filter_count = $sql_cari->num_rows();
        }else{
            if(!empty($iswhere)){
                $sql_filter = $this->db->query("SELECT * FROM ".$query."WHERE ".$iswhere);
            }else{
                $sql_filter = $this->db->query("SELECT * FROM ".$query);
            }
            $sql_filter_count = $sql_filter->num_rows();
        }
        $data = $sql_data->result_array();

        $callback = array(    
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'recordsTotal' => $sql_count,    
            'recordsFiltered'=>$sql_filter_count,    
            'data'=>$data
        );
        return json_encode($callback); // Convert array $callback ke json
    }

    /// @see get_tables_where()
    /// @note datatable
    /// @attention ada beberapa fitur seperti search, sortir, pagination
    function get_tables_where($tables,$cari,$where,$iswhere)
    {
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // Ambil data start
        $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 

        $setWhere = array();
        foreach ($where as $key => $value)
        {
            $setWhere[] = $key."='".$value."'";
        }

        $fwhere = implode(' AND ', $setWhere);

        if(!empty($iswhere)){
            $sql = $this->db->query("SELECT * FROM ".$tables." WHERE $iswhere AND ".$fwhere);
        }else{
            $sql = $this->db->query("SELECT * FROM ".$tables." WHERE ".$fwhere);
        }
        $sql_count = $sql->num_rows();

        $query = $tables;
        $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
        
        // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $order_field = $_POST['order'][0]['column']; 

        // Untuk menentukan order by "ASC" atau "DESC"
        $order_ascdesc = $_POST['order'][0]['dir']; 
        $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

        if(!empty($iswhere)){
            $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND ".$fwhere." AND (".$cari.")".$order." OFFSET ".$start." ROWS FETCH NEXT ". $limit . " ROWS only ");
        }else{
            $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE ".$fwhere." AND (".$cari.")".$order." OFFSET ".$start." ROWS FETCH NEXT ". $limit . " ROWS only ");
        }

        if(isset($search))
        {
            if(!empty($iswhere)){
                $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND ".$fwhere." AND (".$cari.")");
            }else{
                $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE ".$fwhere." AND (".$cari.")");
            }
            $sql_filter_count = $sql_cari->num_rows();
        }else{
            if(!empty($iswhere)){
                $sql_filter = $this->db->query("SELECT * FROM ".$tables." WHERE $iswhere AND ".$fwhere);
            }else{
                $sql_filter = $this->db->query("SELECT * FROM ".$tables." WHERE ".$fwhere);
            }
            $sql_filter_count = $sql_filter->num_rows();
        }

        $data = $sql_data->result_array();
        
        $callback = array(    
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'recordsTotal' => $sql_count,    
            'recordsFiltered'=>$sql_filter_count,    
            'data'=>$data
        );
        return json_encode($callback); // Convert array $callback ke json
    }
    
    /// @see get_tables_query()
    /// @note datatable
    /// @attention ada beberapa fitur seperti search, sortir, pagination
    function get_tables_query($query,$cari,$where,$iswhere)
    {
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // Ambil data start
        $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 

        if($where != null)
        {
            $setWhere = array();
            foreach ($where as $key => $value)
            {
                $setWhere[] = $key."='".$value."'";
            }
            $fwhere = implode(' AND ', $setWhere);

            if(!empty($iswhere))
            {
                $sql = $this->db->query($query." WHERE  $iswhere AND ".$fwhere);
                
            }else{
                $sql = $this->db->query($query." WHERE ".$fwhere);
            }
            $sql_count = $sql->num_rows();

            $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
            
            // Untuk mengambil nama field yg menjadi acuan untuk sorting
            $order_field = $_POST['order'][0]['column']; 

            // Untuk menentukan order by "ASC" atau "DESC"
            $order_ascdesc = $_POST['order'][0]['dir']; 
            $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

            if(!empty($iswhere))
            {
                $sql_data = $this->db->query($query." WHERE $iswhere AND ".$fwhere." AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            }else{
                $sql_data = $this->db->query($query." WHERE ".$fwhere." AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            }
            
            if(isset($search))
            {
                if(!empty($iswhere))
                {
                    $sql_cari =  $this->db->query($query." WHERE $iswhere AND ".$fwhere." AND (".$cari.")");
                }else{
                    $sql_cari =  $this->db->query($query." WHERE ".$fwhere." AND (".$cari.")");
                }
                $sql_filter_count = $sql_cari->num_rows();
            }else{
                if(!empty($iswhere))
                {
                    $sql_filter = $this->db->query($query." WHERE $iswhere AND ".$fwhere);
                }else{
                    $sql_filter = $this->db->query($query." WHERE ".$fwhere);
                }
                $sql_filter_count = $sql_filter->num_rows();
            }
            $data = $sql_data->result_array();

        }else{

            if(!empty($iswhere))
            {
                $sql = $this->db->query($query." WHERE  $iswhere ");
            }else{
                $sql = $this->db->query($query);
            }
            
            $sql_count = $sql->num_rows();

            $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
            
            // Untuk mengambil nama field yg menjadi acuan untuk sorting
            $order_field = $_POST['order'][0]['column']; 

            // Untuk menentukan order by "ASC" atau "DESC"
            $order_ascdesc = $_POST['order'][0]['dir']; 
            $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

            if(!empty($iswhere))
            {                
                $sql_data = $this->db->query($query." WHERE $iswhere AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            }else{
                $sql_data = $this->db->query($query." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            }

            if(isset($search))
            {
                if(!empty($iswhere))
                {     
                    $sql_cari =  $this->db->query($query." WHERE $iswhere AND (".$cari.")");
                }else{
                    $sql_cari =  $this->db->query($query." WHERE (".$cari.")");
                }
                $sql_filter_count = $sql_cari->num_rows();
            }else{
                if(!empty($iswhere))
                {
                    $sql_filter = $this->db->query($query." WHERE $iswhere");
                }else{
                    $sql_filter = $this->db->query($query);
                }
                $sql_filter_count = $sql_filter->num_rows();
            }
            $data = $sql_data->result_array();
        }
        
        $callback = array(    
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'recordsTotal' => $sql_count,    
            'recordsFiltered'=>$sql_filter_count,    
            'data'=>$data
        );
        return json_encode($callback); // Convert array $callback ke json
    }     

    /// @see Max_data()
    /// @note menarik semua data hdrid
    /// @attention semua data yang ada di table akan tampil
    public function Max_data($mdate,$table)
    {
        $this->db->select_max('hdrid');     
        $this->db->like('hdrid', $mdate);
        $query = $this->db->get($table);      
        return  $query;
    }
        
    /// @see Input_Data()
    /// @note function input data
    /// @attention semua data akan di post ke dalam database
    function Input_Data($data,$table){
        $this->db->insert($table,$data);      
    }

    /// @see insert_batch()
    /// @note masukan data baru
    /// @attention memasukan data yang baru di import
    public function insert_batch($table,$data) 
    {
        $this->db->insert_batch($table, $data);    
        return $this->db->affected_rows();
    }

    /// @see Update_Data()
    /// @note update data table 
    /// @attention data yang ada pada table akan berubah ketika di update
    function Update_Data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
      
    /// @see Delete_Data()
    /// @note Menghapus data
    /// @attention delete data sesuai hdrid
    function Delete_Data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    /// @see Get_Where()
    /// @note ambil data
    /// @attention ambil data sesuai hdrid pada table
    function Get_Where($where,$table){      
        return $this->db->get_where($table, $where);
    }

    /// @see ajax_getbyhdrid()
    /// @note fungsi ajax get id
    /// @attention ambil id menggunakan fungsi ajax
    function ajax_getbyhdrid($hdrid,$table){      
        return $this->db->get_where($table, array('hdrid' => $hdrid));
    }

    /// @see Get_central_user()
    /// @note menarik data dari DB central user pada TB_login
    /// @attention ambil id menggunakan fungsi ajax
    function Get_central_user(){     

            $DB2 = $this->load->database('db_central_user', TRUE);   // Database central user   
            $result = $DB2->get('Tb_user_login')->result();               // Untuk mengeksekusi dan mengambil data hasil query
            $DB2->Close();
            return $result;

    }

    /// @see Get_departement()
    /// @note menarik data dari DB central user pada tb_department
    /// @attention ambil id menggunakan fungsi ajax
    function Get_departement(){     

        $DB2 = $this->load->database('db_central_user', TRUE);   // Database central user   
        $result = $DB2->get('Tb_department')->result();               // Untuk mengeksekusi dan mengambil data hasil query
        $DB2->Close();
        return $result;

    }

    /// @see Send_mail()
    /// @note function mengirim email
    /// @attention send mail ke atasan
    public function Send_mail($hdrid)
    {
                
            // cari approver yang belum approve dan order by level
            $query =$this->db->query("
                SELECT  hdrid
                ,level_approve
                ,nik_approver
                ,nik_approver_encode
                ,name_approver
                ,email_approver
                ,date_approve
                ,description
            FROM Menu_approver
            where hdrid='WTR2010009' and level_approve=(select min(level_approve) from Menu_approver where hdrid='WTR2010009' and date_approve is null)");

                // jika ketemu
            if ($query->num_rows()>0) {
                $query=$query->rows();

                // Update progress waiting approve
                $where = array('hdrid' => $query->hdrid); 
                $data = array('progress_approver' =>'Waiting approved '.$query->name_approver);       
                $this->db->where($where);
                $this->db->update('Menu_approver',$data);

                // Kirim email request to approve
                $this->db->query("CALL sp_send_mail @hdrid='$query->hdrid',@nik='$query->nik_approver',@name='$query->name_approver',@email='widodo.a5v@ap.denso.com',@EmailSubject='Waiting Approver Wire transfer No ',@Email_body_content='You need approver'");
                
            }else{

                // Update progress finish approve
                $where = array('hdrid' => $query->hdrid); 
                $data = array('progress_approver' =>'Finish Approved'); 
                $this->db->where($where);
                $this->db->update('Menu_approver',$data);
                
                // Kirim email notifikasi finish aprove
                $this->db->query("exec sp_send_mail @hdrid='123',@nik='DM1902060',@name='Widodo',@email='widodo.a5v@ap.denso.com',@EmailSubject='Finish Approver Wire transfer No ',@Email_body_content='You need approver'");
            
                }
        
    }

    /// @see Send_mail_reject()
    /// @note mengirim notif send mail ketika reject
    /// @attention ketika reject akan send mail
    public function Send_mail_reject($hdrid)
    {
        
        // Cari data wire
        $query =$this->db->query("select hdrid,nik,name_requester,isnull(reject_by,'')reject_by,isnull(reason_reject,'')reason_reject from tb_wiretransfer where hdrid='$hdrid' ");
        $query=$query->row();

        // Cari email
        $query2 =$this->db->query("select top 1 email from tb_userwire where nik='$query->nik' ");
        if ($query2->num_rows()>0) {
            $query2=$query2->row();
            //  Kirim email
            $result =$this->db->query("exec sp_send_mail @hdrid='$query->hdrid',@nik='$query->nik',@name='$query->name_requester',@email='widodo.a5v@ap.denso.com',@EmailSubject='Rejected Wire transfer No ',@Email_body_content='Rejected by <b> $query->reject_by </b>',@comment='With reason = <b> $query->reason_reject </b>'")->result_array();
        }
        
    }
  
   
}




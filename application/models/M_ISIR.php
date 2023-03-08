<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ISIR extends CI_Model {
    
    
     ///@see get_tables()
     ///@note fungsi data web bisa masuk ke database
     ///@attention jika data web masuk ke wbe tapi tidak masu ke database itu salah di databasenya
   function get_tables($tables,$cari,$iswhere)
        {
            // Ambil data yang di ketik user pada textbox pencarian
            $search = htmlspecialchars($_POST['search']['value']);
            // Ambil data limit per page
            $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
            // Ambil data start
            $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 
            
            $query = $tables;
            
            //parameter jika data sudah diinput maka akan masuk
            if(!empty($iswhere)){
                $sql = $this->db->query("SELECT * FROM ".$query." WHERE ".$iswhere);
            }else{
                $sql = $this->db->query("SELECT * FROM ".$query);
            }

            //parameter untuk sql count
            $sql_count = $sql->num_rows();


            //parameter search
            $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
            
            // Untuk mengambil nama field yg menjadi acuan untuk sorting
            $order_field = $_POST['order'][0]['column']; 

            // Untuk menentukan order by "ASC" atau "DESC"
            $order_ascdesc = $_POST['order'][0]['dir']; 
            $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;


            //parameter jika data dicari maka data ditampilkan akan muncul
            if(!empty($iswhere)){
                $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            }else{
                $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            }


            //parameter jika data cari dan menfilter maka data ditampilkan akan muncul
            if(isset($search))
            {
                if(!empty($iswhere)){
                    $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE $iswhere (".$cari.")");
                }else{
                    $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE (".$cari.")");
                }
                $sql_filter_count = $sql_cari->num_rows();
            }else{

                //untuk menampilkan data sudah filter
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


    ///@see get_tables_where()
    ///@note fungsi digunakan mencari data di database
    ///@attention
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
              $setWhere[] = $key."='".$value."'"; //untuk setting code auto increnete
        }

        $fwhere = implode(' AND ', $setWhere);

        if(!empty($iswhere)){
              $sql = $this->db->query("SELECT * FROM ".$tables." WHERE $iswhere AND ".$fwhere); //untuk setting code auto increnete
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


        //parameter jika data dicari maka data ditampilkan akan muncul
        if(!empty($iswhere)){
              $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND ".$fwhere." AND (".$cari.")".$order." OFFSET ".$start." ROWS FETCH NEXT ". $limit . " ROWS only ");
        }else{
              $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE ".$fwhere." AND (".$cari.")".$order." OFFSET ".$start." ROWS FETCH NEXT ". $limit . " ROWS only ");
        }


        //parameter jika data cari data ditampilkan
        if(isset($search))
        {
              if(!empty($iswhere)){
                 $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND ".$fwhere." AND (".$cari.")");
              }else{
                 $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE ".$fwhere." AND (".$cari.")");
              }
              $sql_filter_count = $sql_cari->num_rows();
        }else{

           //parameter jika data cari dan menfilter maka data ditampilkan akan muncul
              if(!empty($iswhere)){
                 $sql_filter = $this->db->query("SELECT * FROM ".$tables." WHERE $iswhere AND ".$fwhere);
              }else{
                 $sql_filter = $this->db->query("SELECT * FROM ".$tables." WHERE ".$fwhere);
              }
              $sql_filter_count = $sql_filter->num_rows();
        }

        //untuk menampilkan data sudah filter
        $data = $sql_data->result_array();
        
        $callback = array(    
              'draw' => $_POST['draw'], // Ini dari datatablenya    
              'recordsTotal' => $sql_count,   //ini record database
              'recordsFiltered'=>$sql_filter_count,  //ini filter count  
              'data'=>$data
        );
        return json_encode($callback); // Convert array $callback ke json
     }

    ///@see get_tables_query()
    ///@note fungsi digunakan query database
    ///@attention
    function get_tables_query($query, $cari, $where, $iswhere)
    {
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // Ambil data start
        $start = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}");

        if ($where != null) {
            $setWhere = array();
            foreach ($where as $key => $value) {
                $setWhere[] = $key . "='" . $value . "'";
            }
            $fwhere = implode(' AND ', $setWhere);

            if (!empty($iswhere)) {
                $sql = $this->db->query($query . " WHERE  $iswhere AND " . $fwhere);
            } else {
                $sql = $this->db->query($query . " WHERE " . $fwhere);
            }
            $sql_count = $sql->num_rows();

            $cari = implode(" LIKE '%" . $search . "%' OR ", $cari) . " LIKE '%" . $search . "%'";

            // Untuk mengambil nama field yg menjadi acuan untuk sorting
            $order_field = $_POST['order'][0]['column'];

            // Untuk menentukan order by "ASC" atau "DESC"
            $order_ascdesc = $_POST['order'][0]['dir'];
            $order = " ORDER BY " . $_POST['columns'][$order_field]['data'] . " " . $order_ascdesc;

            if (!empty($iswhere)) {
                $sql_data = $this->db->query($query . " WHERE $iswhere AND " . $fwhere . " AND (" . $cari . ")" . $order . " LIMIT " . $limit . " OFFSET " . $start);
            } else {
                $sql_data = $this->db->query($query . " WHERE " . $fwhere . " AND (" . $cari . ")" . $order . " LIMIT " . $limit . " OFFSET " . $start);
            }

            if (isset($search)) {
                if (!empty($iswhere)) {
                    $sql_cari =  $this->db->query($query . " WHERE $iswhere AND " . $fwhere . " AND (" . $cari . ")");
                } else {
                    $sql_cari =  $this->db->query($query . " WHERE " . $fwhere . " AND (" . $cari . ")");
                }
                $sql_filter_count = $sql_cari->num_rows();
            } else {
                if (!empty($iswhere)) {
                    $sql_filter = $this->db->query($query . " WHERE $iswhere AND " . $fwhere);
                } else {
                    $sql_filter = $this->db->query($query . " WHERE " . $fwhere);
                }
                $sql_filter_count = $sql_filter->num_rows();
            }
            $data = $sql_data->result_array();
        } else {

            if (!empty($iswhere)) {
                $sql = $this->db->query($query . " WHERE  $iswhere ");
            } else {
                $sql = $this->db->query($query);
            }

            $sql_count = $sql->num_rows();

            $cari = implode(" LIKE '%" . $search . "%' OR ", $cari) . " LIKE '%" . $search . "%'";

            // Untuk mengambil nama field yg menjadi acuan untuk sorting
            $order_field = $_POST['order'][0]['column'];

            // Untuk menentukan order by "ASC" atau "DESC"
            $order_ascdesc = $_POST['order'][0]['dir'];
            $order = " ORDER BY " . $_POST['columns'][$order_field]['data'] . " " . $order_ascdesc;

            if (!empty($iswhere)) {
                $sql_data = $this->db->query($query . " WHERE $iswhere AND (" . $cari . ")" . $order . " LIMIT " . $limit . " OFFSET " . $start);
            } else {
                $sql_data = $this->db->query($query . " WHERE (" . $cari . ")" . $order . " LIMIT " . $limit . " OFFSET " . $start);
            }

            if (isset($search)) {
                if (!empty($iswhere)) {
                    $sql_cari =  $this->db->query($query . " WHERE $iswhere AND (" . $cari . ")");
                } else {
                    $sql_cari =  $this->db->query($query . " WHERE (" . $cari . ")");
                }
                $sql_filter_count = $sql_cari->num_rows();
            } else {
                if (!empty($iswhere)) {
                    $sql_filter = $this->db->query($query . " WHERE $iswhere");
                } else {
                    $sql_filter = $this->db->query($query);
                }
                $sql_filter_count = $sql_filter->num_rows();
            }
            $data = $sql_data->result_array();
        }

        $callback = array(
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'recordsTotal' => $sql_count,
            'recordsFiltered' => $sql_filter_count,
            'data' => $data
        );
        return json_encode($callback); // Convert array $callback ke json
    }
    ///@see Max_data()
     ///@note fungsi digunakan maksimum data
     ///@attention jika file diinput sudah melewati ukuran maka file tidak akan masuk
    public function Max_data($mdate, $table)
    {
        $this->db->select_max('hdrid');
        $this->db->like('hdrid', $mdate);
        $query = $this->db->get($table);
        return  $query;
    }

    ///@see Input_Data()
    ///@note fungsi digunakan untuk input data
    ///@attention
    function Input_Data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    /** -----------------------------Menginput Dari Table Lain Berdasarkan Wherenya-----------------------------------**/

    
    ///@see Input_Data2()
    ///@note fungsi digunakan untuk input data di query
    ///@attention
    function Input_Data2($date_transaction,$problem_id, $problem_category_id, $product_id)
    {

        $query = $this->db->query("
        INSERT INTO tb_approval
            (transaction_date
            ,problem_id
            ,nik
            ,name
            ,office_email
            ,department_code
            ,department_name
            ,position_code
            ,position_name
          )
            SELECT '$date_transaction'
                   ,'$problem_id'
                   ,nik
                   ,name
                   ,office_email
                   ,department_code
                   ,department_name
                   ,position_code
                   ,position_name
            FROM tb_setting_approval
            WHERE product_id = '$product_id'
           ");

        //    Tambahkan initiator
           $query = $this->db->query("
           INSERT INTO tb_approval
            (transaction_date
            ,problem_id
            ,nik
            ,name
            ,office_email
            ,department_code
            ,department_name
            ,position_code
            ,position_name
          )
            SELECT top 1 '$date_transaction'
                   ,'$problem_id'
                   ,nik
                   ,name
                   ,email1
                   ,'000'
                   ,section1
                   ,'TR202201001'
                   ,'Initiator'
            FROM tb_input_problem
            WHERE hdrid = '$problem_id'
           ");

            // Tambahkan Responsible
           $query = $this->db->query("
           INSERT INTO tb_approval
            (transaction_date
            ,problem_id
            ,nik
            ,name
            ,office_email
            ,department_code
            ,department_name
            ,position_code
            ,position_name
          )
            SELECT top 1 '$date_transaction'
                   ,'$problem_id'
                   ,nik2
                   ,name2
                   ,email2
                   ,'000'
                   ,section2
                   ,'TR202110001'
                   ,'Responsible'
            FROM tb_input_problem
            WHERE hdrid = '$problem_id'
           ");

      
        return $query;
        
    }

    /** -----------------------------Menginput Dari Table Lain Berdasarkan Wherenya-----------------------------------**/

    // $post_data_transaction_date,$hdrid3,$this->input->post('nik'),$this->input->post('name'),$this->input->post('section1'),$this->input->post('email1'),$this->input->post('nik2'),$this->input->post('name2'),$this->input->post('section2'),$this->input->post('email2')

    ///@see Input_Data_Approver()
    ///@note fungsi digunakan untuk input data dengan approve
    ///@attention
    function Input_Data_Approver($date_transaction,$problem_id,$nik,$name,$section,$email,$nik2,$name2,$section2,$email2)
    {
        // *** Inisiator ***
        // Simpan data inisiator
        $this->tb_approval_save($date_transaction,$problem_id,$nik,$name,$email,'000',$section,'1','Inisiator');
        // Simpan data inisiator approver
        $this->tb_approval_save_superior($date_transaction,$problem_id,$nik,'2','Inisiator Approver');

        // *** Responsible ***
        // Simpan responsible
        $this->tb_approval_save($date_transaction,$problem_id,$nik2,$name2,$email2,'000',$section2,'3','Responsible');
       // Simpan responsible approver 1
        $this->tb_approval_save_superior($date_transaction,$problem_id,$nik2,'4','Responsible Approver 1');
        // Simpan responsible approver 2
        $this->tb_approval_save_superior2($date_transaction,$problem_id,$nik2,'5','Responsible Approver 2');

        // *** Inisiator feedback ***
        // Simpan inisiator
        $this->tb_approval_save($date_transaction,$problem_id,$nik,$name,$email,'000',$section,'6','Inisiator after response check');
        // Simpan inisiator approver
        $this->tb_approval_save_superior($date_transaction,$problem_id,$nik,'7','Inisiator approver after response check');

        // $query=array('berhasil'=>'berhasil');   
        // return $query;
        
    }

    ///@see Update_Data_Approver()
    ///@note fungsi digunakan untuk update data dengan approve
    ///@attention
    function Update_Data_Approver($problem_id,$nik)
    {
 
        // Update responsible
        $this->tb_approval_update_supres($problem_id,$nik,'3');
        // Simpan responsible approver 1
        $this->tb_approval_update_superior($problem_id,$nik,'4','');
        // Simpan responsible approver 2
        $this->tb_approval_update_superior($problem_id,$nik,'5','2');
                
    }

    ///@see input tb_approval_save()
    ///@note fungsi digunakan untuk approve data di save ke database
    ///@attention
     function tb_approval_save($date_transaction,$problem_id ,$nik,$name,$email,$sectionCode,$section,$sequence,$position)
    {
        $query = $this->db->query("
             INSERT INTO tb_approval
            (transaction_date,problem_id,nik,name ,office_email ,department_code,department_name,position_code,position_name)
            values ('$date_transaction','$problem_id','$nik','$name','$email',$sectionCode,'$section','$sequence','$position');
            ");

    }

    
    ///@see input tb_approval_save_superior()
    ///@note fungsi digunakan untuk approve data di save ke database tapi untuk superior
    ///@attention
     function tb_approval_save_superior($date_transaction,$problem_id,$nik,$sequence,$position)
    {

       $query = $this->db->query("
        INSERT INTO tb_approval
            (transaction_date
            ,problem_id
            ,nik
            ,name
            ,office_email
            ,department_code
            ,department_name
            ,position_code
            ,position_name
          )
            SELECT '$date_transaction'
                   ,'$problem_id'
                   ,nik_superior
                   ,name_superior
                   ,email_superior
                   ,kode_setion_superior
                   ,name_section_superior
                   ,'$sequence'
                   ,'$position'
            FROM tb_superior
            WHERE nik = '$nik'
           ");

    }

    ///@see tb_approval_update_superior()
    ///@note fungsi digunakan untuk update approve data di save ke database tapi untuk superior
    ///@attention
    function tb_approval_update_superior($problem_id,$nik,$sequence,$sup)
    {

       $query = $this->db->query("
        update tb_approval
        set nik=isnull((select top 1 nik_superior$sup from tb_superior where nik='$nik'),nik)
        ,name=isnull((select top 1 name_superior$sup from tb_superior where nik='$nik'),name)
        ,office_email=isnull((select top 1 email_superior$sup from tb_superior where nik='$nik'),office_email)
        ,department_code=isnull((select top 1 kode_setion_superior$sup from tb_superior where nik='$nik'),department_code)
        ,department_name=isnull((select top 1 name_section_superior$sup from tb_superior where nik='$nik'),department_name)     
        where problem_id='$problem_id' and position_code ='$sequence'");

    }

    ///@see input tb_approval_update_supres()
    ///@note fungsi digunakan untuk update approve data di save ke database tapi untuk supres
    ///@attention
    function tb_approval_update_supres($problem_id,$nik,$sequence)
    {

       $query = $this->db->query("
        update tb_approval
        set nik=isnull((select top 1 nik2 from tb_input_problem where hdrid='$nik'),nik)
        ,name=isnull((select top 1 name2 from tb_input_problem where hdrid='$nik'),name)
        ,office_email=isnull((select top 1 email2 from tb_input_problem where hdrid='$nik'),office_email)
        ,department_code='000'
        ,department_name=isnull((select top 1 product_name from tb_input_problem where hdrid='$nik'),department_name)     
        where problem_id='$problem_id' and position_code ='$sequence'
        ");

    }

        ///@see tb_approval_save_superior2()
    ///@note fungsi digunakan untuk update approve data di save ke database tapi untuk superior 2
    ///@attention
     function tb_approval_save_superior2($date_transaction,$problem_id,$nik,$sequence,$position)
    {

       $query = $this->db->query("
        INSERT INTO tb_approval
            (transaction_date
            ,problem_id
            ,nik
            ,name
            ,office_email
            ,department_code
            ,department_name
            ,position_code
            ,position_name
          )
            SELECT '$date_transaction'
                   ,'$problem_id'
                   ,nik_superior2
                   ,name_superior2
                   ,email_superior2
                   ,kode_setion_superior2
                   ,name_section_superior2
                   ,'$sequence'
                   ,'$position'
            FROM tb_superior
            WHERE nik = '$nik'
           ");

    }

    /** -----------------------------Akhir Menginput Dari Table Lain Berdasarkan Wherenya-----------------------------------**/

        ///@see insert_batch()
     ///@note fungsi digunakan input batch data untuk masuk database
     ///@attention 
    public function insert_batch($table, $data)
    {
        $this->db->insert_batch($table, $data);
        return $this->db->affected_rows();
    }
  ///@see get update
     ///@note fungsi digunakan untuk update data
     ///@attention
    function Update_Data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

       ///@see get delete
     ///@note fungsi digunakan untuk delete data
     ///@attention
    function Delete_Data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

       ///@see get where
     ///@note fungsi digunakan untuk dimana data tersebut untuk data cari di database
     ///@attention
    function Get_Where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

             ///@see get_hybrid
     ///@note fungsi digunakan untuk auto increnete
     ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
    function ajax_getbyhdrid1($hdrid, $table)
    {
        return $this->db->get_where($table, array('hdrid' => $hdrid));
    }

     ///@see get central user
    ///@note fungsi digunakan untuk username masuk web
    ///@attention
    function Get_central_user()
    {

        $DB2 = $this->load->database('db_central_user', TRUE);   // Database central user   
        $result = $DB2->get('Tb_user_login')->result();               // Untuk mengeksekusi dan mengambil data hasil query
        $DB2->Close();
        return $result;
    }

    ///@see get departement
    ///@note fungsi digunakan untuk  table departement
    ///@attention
    function Get_departement()
    {

        $DB2 = $this->load->database('db_central_user', TRUE);   // Database central user   
        $result = $DB2->get('Tb_department')->result();               // Untuk mengeksekusi dan mengambil data hasil query
        $DB2->Close();
        return $result;
    }

    ///@see cari_tb_approver
    ///@note fungsi digunakan untuk cari table approver
    ///@attention
    function cari_tb_approver($hdrid)
    {

      $query = $this->db->query("select top 1 * from tb_approval where problem_id='$hdrid' and date_approve is null order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->row();
      }else{
          $query = (object) array('nik'=>'not found','name'=>'All','office_email'=>'not found','position_code'=>'not found');
          return $query;
      }

    }
  ///@seecari_inisiator_responsible
    ///@note fungsi digunakan untuk cari inisiator responsible
    ///@attention
    function cari_inisiator_responsible($hdrid)
    {

      $query = $this->db->query("select top 1 * from tb_approval where problem_id='$hdrid' and date_approve is null order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->row();
      }else{
          $query = (object) array('nik'=>'not found','name'=>'not found','office_email'=>'not found','position_code'=>'not found');
          return $query;
      }

    }


//        /// @see getISIR()
//    /// @note
//    /// @attention
//    public function getISIR($hdrid)
//    {
//       $this->db->where('hdrid', $hdrid);
//       $query = $this->db->get('tb_PCN');
//       $result = $query->result();
//       return $result;

//    }



    ///@see send mail
     ///@note fungsi mengirim email
     ///@attention 
    public function Send_mail($hdrid)
    {

        // cari approver yang belum approve dan order by level
        $query = $this->db->query("
         SELECT  hdrid
         ,level_approve
         ,nik_approver
         ,nik_approver_encode
         ,name_approver
         ,email_approver
         ,date_approve
         ,description
     FROM input_problem_approver
     where hdrid='WTR2010009' and level_approve=(select min(level_approve) from input_problem_approver where hdrid='WTR2010009' and date_approve is null)");

        // jika ketemu
        if ($query->num_rows() > 0) {
            $query = $query->rows();

            // Update progress waiting approve
            $where = array('hdrid' => $query->hdrid);
            $data = array('progress_approver' => 'Waiting approved ' . $query->name_approver);
            $this->db->where($where);
            $this->db->update('input_problem_approver', $data);

            // Kirim email request to approve
            $this->db->query("CALL sp_send_mail @hdrid='$query->hdrid',@nik='$query->nik_approver',@name='$query->name_approver',@email='widodo.a5v@ap.denso.com',@EmailSubject='Waiting Approver Wire transfer No ',@Email_body_content='You need approver'");
        } else {

            // Update progress finish approve
            $where = array('hdrid' => $query->hdrid);
            $data = array('progress_approver' => 'Finish Approved');
            $this->db->where($where);
            $this->db->update('input_problem_approver', $data);

            // Kirim email notifikasi finish aprove
            $this->db->query("exec sp_send_mail @hdrid='123',@nik='DM1902060',@name='Widodo',@email='widodo.a5v@ap.denso.com',@EmailSubject='Finish Approver Wire transfer No ',@Email_body_content='You need approver'");
        }
    }

        ///@see Send_mail_reject()
     ///@note fungsi menolak email
     ///@attention 
    public function Send_mail_reject($hdrid)
    {

        // Cari data wire
        $query = $this->db->query("select hdrid,nik,name_requester,isnull(reject_by,'')reject_by,isnull(reason_reject,'')reason_reject from tb_wiretransfer where hdrid='$hdrid' ");
        $query = $query->row();

        // Cari email
        $query2 = $this->db->query("select top 1 email from tb_userwire where nik='$query->nik' ");
        if ($query2->num_rows() > 0) {
            $query2 = $query2->row();
            //  Kirim email
            $result = $this->db->query("exec sp_send_mail @hdrid='$query->hdrid',@nik='$query->nik',@name='$query->name_requester',@email='widodo.a5v@ap.denso.com',@EmailSubject='Rejected Wire transfer No ',@Email_body_content='Rejected by <b> $query->reject_by </b>',@comment='With reason = <b> $query->reason_reject </b>'")->result_array();
        }
    }

    

    ///@see ampil_temporary_and_fullscale()
     ///@note untuk select filter
     ///@attention 
    public function tampil_process()
    {
        $query =  $this->db->get('tb_isir')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
        return $query;
    }


    ///@see submital_isir()
     ///@note untuk select filter
     ///@attention 
    public function submital()
    {
        $query =  $this->db->get('tb_isir')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
        return $query;
    }
   
    ///@see supplier_code()
     ///@note untuk select filter
     ///@attention 
    public function supplier_code()
    {
        $query =  $this->db->get('tb_isir')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
        return $query;
    }

    ///@see nama_supplier()
     ///@note untuk select filter
     ///@attention 
    public function supplier_name()
    {
        $query =  $this->db->get('tb_isir')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
        return $query;
    }

    ///@see part_number()
     ///@note untuk select filter
     ///@attention 
     public function part_number()
     {
         $query =  $this->db->get('tb_isir')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
         return $query;
     }

     ///@see part_name()
     ///@note untuk select filter
     ///@attention 
     public function part_name()
     {
         $query =  $this->db->get('tb_isir')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
         return $query;
     }


    ///@see rohs()
     ///@note untuk select filter
     ///@attention 
     public function rohs()
     {
         $query =  $this->db->get('tb_isi_isir')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
         return $query;
     }

    ///@see product_adapt_to_dds2004()
     ///@note untuk select filter
     ///@attention 
     public function product_adapt_to_dds2004()
     {
         $query =  $this->db->get('tb_isir')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
         return $query;
     }

    ///@see imds_id()
     ///@note untuk select filter
     ///@attention 
     public function imds_id()
     {
         $query =  $this->db->get('tb_isir')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
         return $query;
     }


    //     public function tampil_nik()
    //    {
    //         $DB2 = $this->load->database('db_central_user', TRUE);
    //         $DB2->select('user_name,name');         
    //         $query = $DB2->get('Tb_user_login')->result(); 
    //         $DB2->Close();
    //         return  $query;
    //    }

    
    ///@see tampil_nik()
     ///@note untuk select filter
     ///@attention 
    public function tampil_nik()
    {
        $this->db->select('user_name,name,department_name,office_email');
        $this->db->from('Tb_user_login');
        return $this->db->get()->result();
    }

         ///@see tampil_nik_from()
     ///@note untuk select filter
     ///@attention 
    public function tampil_nik_from()
    {
        // $this->db->select('user_name,name,department_name,office_email');
        // $this->db->from('Tb_user_login');
        // return $this->db->get()->result();

        $query = $this->db->query(" select * from Tb_user_login where user_name in ( select distinct nik from tb_superior)");
        return $query ->result();

    }

        ///@see get_product_by_id()
     ///@note untuk masukkan data ke product by id
     ///@attention 
    public function get_product_by_id($product_id)
    {

        // return $this->db->get_where('tb_product', ['hdrid' => $product_id])->row_array();
        $this->db->select('report_no');
        $this->db->from('tb_product');
        $this->db->where('hdrid', $product_id);
        return $this->db->get()->row();

    }

    ///@see get_hdrid()
     ///@note untuk code increnete
     ///@attention 
    public function get_hdrid($table,$column,$value)
    {

                // Cari email
        $query = $this->db->query("select hdrid from $table where $column='$value'");
        if ($query->num_rows() > 0) {
            $query = $query->row();
        }else{
            $query = (object) array(
                'hdrid' => "000"
            );   
        }

        return $query;

    }
    ///@see get_superior1()
     ///@note untuk superior mengisi data
     ///@attention 
    public function get_superior1($nik,$positioncode,$positionname,$date,$problemid,$dateapprove)
    {
       
        $query = $this->db->query("INSERT INTO tb_approval select NULL as hdrid,'$date' as transaction_date,'$problemid' as problem_id ,nik_superior as nik,name_superior as name,kode_setion_superior as department_code,name_section_superior as department_name,email_superior as office_email,'$positioncode' as position_code,'$positionname' as position_name,'$dateapprove' as date_approve from tb_superior where nik ='$nik'");
        // $query = $query->row();
        // return $query;

    }

      ///@see get_superior2()
     ///@note untuk superior mengisi data
     ///@attention 
    public function get_superior2($nik,$positioncode,$positionname,$date,$problemid,$dateapprove)
    {
       
        $query = $this->db->query("INSERT INTO tb_approval select NULL as hdrid,'$date' as transaction_date,'$problemid' as problem_id ,nik_superior2 as nik,name_superior2 as name,kode_setion_superior2 as department_code,name_section_superior2 as department_name,email_superior2 as office_email,'$positioncode' as position_code,'$positionname' as position_name,'$dateapprove' as date_approve from tb_superior where nik ='$nik'");
        // $query = $query->row();
        // return $query;

    }

    
       ///@see get_report_no()
     ///@note untuk mendapatkan report no
     ///@attention 
    public function get_report_no($product_name)
    {
        // return $this->db->get_where('tb_product', ['hdrid' => $product_id])->row_array();
         $query = $this->db->query("select report_no from tb_product where product_name='$product_name'");
        if ($query->num_rows() > 0) {
            $query = $query->row();
        }else{
            $query = (object) array(
                'report_no' => "000"
            );   
        }

        return  $query;

    }

     ///@see get_ISIR_Registrasi()
     ///@note untuk pcn register mendapatkan no pcn
     ///@attention 
     public function get_ISIR_Registrasi()
     {
         // return $this->db->get_where('tb_product', ['hdrid' => $product_id])->row_array();
          $query = $this->db->query("select * from tb_ISIR ");
         if ($query->num_rows() > 0) {
             $query = $query->row();
         }else{
             $query = (object) array(
                 'supplier_name' => "not found"
             );   
         }
 
         return  $query;
 
     }
    ///@see getdatabysession()
     ///@note fungsi digunakan menarik data tb_approval
     ///@attention 
    public function getdatabysession()
    {
        $namaSession = $this->session->userdata('nama');

        $this->db->where('name', $namaSession);
        $this->db->from('tb_approval');
        $query = $this->db->get();
        return $query->result();
    }

        ///@see number_of_data_per_month_ISIRLIST()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap bulan
     ///@attention 
    public function number_of_data_per_month_ISIRLIST($year, $month){
        $query = $this->db->query("SELECT COUNT(*) num FROM tb_ISIRLIST WHERE YEAR(transaction_date) = '".$year."' AND MONTH(transaction_date) = '".$month."' GROUP BY  MONTH(transaction_date)");
        if ($query->num_rows() > 0) {
            $query = $query->row();
            return $query->num;
        }else{
            return 0;
        }
    }
    ///@see last_5_month_name()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 bulan terakhir
     ///@attention 
    public function last_5_month_name(){
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            array_push($datas, date('F', strtotime('-'.$i.' month')));
        }
        return array_reverse($datas); 
    }

    ///@see upcoming_5_month_name()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 bulan kedepan
     ///@attention 
    public function upcoming_5_month_name(){
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            array_push($datas, date('F', strtotime('+'.$i.' month')));
        }
        return $datas; 
    }

     ///@see last_5_month_ISIRLIST()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 bulan terakhir
     ///@attention 
    public function last_5_month_ISIRLIST(){
        $month = date('m');
        $year = date('Y');
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            if ($month > 0) {
                array_push($datas, $this->number_of_data_per_month_ISIRLIST($year, $month--));
            } else {
                $month = 12;
                array_push($datas, $this->number_of_data_per_month_ISIRLIST(--$year, $month--));
            }
        }
        return array_reverse($datas);
    }

        ///@see upcoming_5_month_name()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 bulan kedepan
     ///@attention 
    public function upcoming_5_month_ISIRLIST(){
        $month = date('m');
        $year = date('Y');
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            if ($month > 0) {
                array_push($datas, $this->number_of_data_per_month_ISIRLIST($year, $month++));
            } else {
                $month = 12;
                array_push($datas, $this->number_of_data_per_month_ISIRLIST(++$year, $month++));
            }
        }
        return $datas;
    }

   ///@see number_of_data_per_year_ISIRLIST()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap tahun
     ///@attention 
    public function number_of_data_per_year_ISIRLIST($year){
        $query = $this->db->query("SELECT COUNT(*) num FROM tb_ISIRLIST WHERE YEAR(transaction_date) = '".$year."' GROUP BY  YEAR(transaction_date)");
        if ($query->num_rows() > 0) {
            $query = $query->row();
            return $query->num;
        }else{
            return 0;
        }
    }

     ///@see last_5_years()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 tahun terakhir
     ///@attention 
    public function last_5_years(){
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            array_push($datas, date('Y', strtotime('-'.$i.' year')));
        }
        return array_reverse($datas); 
    }
    
     ///@see last_5_years()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 tahun kedepan
     ///@attention 
    public function upcoming_5_years(){
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            array_push($datas, date('Y', strtotime('+'.$i.' year')));
        }
        return $datas; 
    }

         ///@see last_5_years_ISIRLIST()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 tahun terakhir
     ///@attention 
    public function last_5_years_ISIRLIST(){
        $year = date('Y');
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            array_push($datas, $this->number_of_data_per_year_ISIRLIST($year--));
        }
        return array_reverse($datas);
    }

    ///@see upcoming_5_years_ISIRLIST()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 tahun kedepan
     ///@attention 
    public function upcoming_5_years_ISIRLIST(){
        $year = date('Y');
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            array_push($datas, $this->number_of_data_per_year_ISIRLIST($year++));
        }
        return $datas;
    }

    
    public function data_per_supplier(){
        $supplier = $this->db->query("SELECT nama_supplier FROM tb_ISIRLIST WHERE nama_supplier IS NOT NULL GROUP BY  nama_supplier");
        $supplier_array = array();
        for ($i=0; $i < $supplier->num_rows(); $i++) {
            array_push($supplier_array, $supplier->row($i)->nama_supplier);
        }
        $num = $this->db->query("SELECT COUNT(*) num FROM tb_ISIRLIST WHERE nama_supplier IS NOT NULL GROUP BY  nama_supplier");
        $num_array = array();
        for ($i=0; $i < $num->num_rows(); $i++) {
            array_push($num_array, $num->row($i)->num);
        }
        $datas = array();
        array_push($datas, $supplier_array);
        array_push($datas, $num_array);
        return $datas;
    }

    /// @see ajax_getbytrxid()
    /// @note Select data
    /// @attention select data berdasarkan hdrid 
    function ajax_getbyisir($hdrid,$no_cicilan,$table){      
        return $this->db->get_where($table, array('hdrid' => $hdrid,'no_isir'=>$no_cicilan));
    }

    /// @see Max_data_isir()
    /// @note Select data hdrid terbesar
    /// @attention Untuk membuat hdrid di ajax_add
    public function Max_data_isir($hdridm,$table)
    {
       $this->db->select_max('no_isir');   
       $this->db->where('hdrid', $hdridm);  
       $query = $this->db->get($table);      
       return  $query;
    }

    /// @see Tampil_user()
    /// @note Select data hdrid terbesar
    /// @attention Untuk membuat hdrid di ajax_add
    public function Tampil_user()
    {
        $this->db->select('*');
        $this->db->from('Tb_user_login');
        return $this->db->get()->result();
 
        // $DB2 = $this->load->database('db_central_user', TRUE);       
        // $query=$DB2->get('Tb_user_login')->result();
        // $DB2->Close();
        // return  $query;
 
    }


}

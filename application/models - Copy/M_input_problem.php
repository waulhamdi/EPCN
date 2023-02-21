<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_input_problem extends CI_Model
{

    function get_tables($tables, $cari, $iswhere)
    {
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // Ambil data start
        $start = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}");

        $query = $tables;

        if (!empty($iswhere)) {
            $sql = $this->db->query("SELECT * FROM " . $query . " WHERE " . $iswhere);
        } else {
            $sql = $this->db->query("SELECT * FROM " . $query);
        }

        $sql_count = $sql->num_rows();

        $cari = implode(" LIKE '%" . $search . "%' OR ", $cari) . " LIKE '%" . $search . "%'";

        // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $order_field = $_POST['order'][0]['column'];

        // Untuk menentukan order by "ASC" atau "DESC"
        $order_ascdesc = $_POST['order'][0]['dir'];
        $order = " ORDER BY " . $_POST['columns'][$order_field]['data'] . " " . $order_ascdesc;

        if (!empty($iswhere)) {
            $sql_data = $this->db->query("SELECT * FROM " . $query . " WHERE $iswhere AND (" . $cari . ")" . $order . " LIMIT " . $limit . " OFFSET " . $start);
        } else {
            $sql_data = $this->db->query("SELECT * FROM " . $query . " WHERE (" . $cari . ")" . $order . " LIMIT " . $limit . " OFFSET " . $start);
        }

        if (isset($search)) {
            if (!empty($iswhere)) {
                $sql_cari =  $this->db->query("SELECT * FROM " . $query . " WHERE $iswhere (" . $cari . ")");
            } else {
                $sql_cari =  $this->db->query("SELECT * FROM " . $query . " WHERE (" . $cari . ")");
            }
            $sql_filter_count = $sql_cari->num_rows();
        } else {
            if (!empty($iswhere)) {
                $sql_filter = $this->db->query("SELECT * FROM " . $query . "WHERE " . $iswhere);
            } else {
                $sql_filter = $this->db->query("SELECT * FROM " . $query);
            }
            $sql_filter_count = $sql_filter->num_rows();
        }
        $data = $sql_data->result_array();

        $callback = array(
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'recordsTotal' => $sql_count,
            'recordsFiltered' => $sql_filter_count,
            'data' => $data
        );
        return json_encode($callback); // Convert array $callback ke json
    }


    function get_tables_where($tables, $cari, $where, $iswhere)
    {
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // Ambil data start
        $start = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}");

        $setWhere = array();
        foreach ($where as $key => $value) {
            $setWhere[] = $key . "='" . $value . "'";
        }

        $fwhere = implode(' AND ', $setWhere);

        if (!empty($iswhere)) {
            $sql = $this->db->query("SELECT * FROM " . $tables . " WHERE $iswhere AND " . $fwhere);
        } else {
            $sql = $this->db->query("SELECT * FROM " . $tables . " WHERE " . $fwhere);
        }
        $sql_count = $sql->num_rows();

        $query = $tables;
        $cari = implode(" LIKE '%" . $search . "%' OR ", $cari) . " LIKE '%" . $search . "%'";

        // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $order_field = $_POST['order'][0]['column'];

        // Untuk menentukan order by "ASC" atau "DESC"
        $order_ascdesc = $_POST['order'][0]['dir'];
        $order = " ORDER BY " . $_POST['columns'][$order_field]['data'] . " " . $order_ascdesc;

        if (!empty($iswhere)) {
            $sql_data = $this->db->query("SELECT * FROM " . $query . " WHERE $iswhere AND " . $fwhere . " AND (" . $cari . ")" . $order . " OFFSET " . $start . " ROWS FETCH NEXT " . $limit . " ROWS only ");
        } else {
            $sql_data = $this->db->query("SELECT * FROM " . $query . " WHERE " . $fwhere . " AND (" . $cari . ")" . $order . " OFFSET " . $start . " ROWS FETCH NEXT " . $limit . " ROWS only ");
        }

        if (isset($search)) {
            if (!empty($iswhere)) {
                $sql_cari =  $this->db->query("SELECT * FROM " . $query . " WHERE $iswhere AND " . $fwhere . " AND (" . $cari . ")");
            } else {
                $sql_cari =  $this->db->query("SELECT * FROM " . $query . " WHERE " . $fwhere . " AND (" . $cari . ")");
            }
            $sql_filter_count = $sql_cari->num_rows();
        } else {
            if (!empty($iswhere)) {
                $sql_filter = $this->db->query("SELECT * FROM " . $tables . " WHERE $iswhere AND " . $fwhere);
            } else {
                $sql_filter = $this->db->query("SELECT * FROM " . $tables . " WHERE " . $fwhere);
            }
            $sql_filter_count = $sql_filter->num_rows();
        }

        $data = $sql_data->result_array();

        $callback = array(
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'recordsTotal' => $sql_count,
            'recordsFiltered' => $sql_filter_count,
            'data' => $data
        );
        return json_encode($callback); // Convert array $callback ke json
    }

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

    public function Max_data($mdate, $table)
    {
        $this->db->select_max('hdrid');
        $this->db->like('hdrid', $mdate);
        $query = $this->db->get($table);
        return  $query;
    }

    function Input_Data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    /** -----------------------------Menginput Dari Table Lain Berdasarkan Wherenya-----------------------------------**/

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

    function Input_Data_Approver($date_transaction,$problem_id,$nik,$name,$section,$email,$nik2,$name2,$section2,$email2)
    {

        // Simpan data inisiator
        $this->tb_approval_save($date_transaction,$problem_id,$nik,$name,$email,'000',$section,'1','Inisiator');

        // Simpan data inisiator approver
        $this->tb_approval_save_superior($date_transaction,$problem_id,$nik,'2','Inisiator Approver');

        // Simpan responsible
        $this->tb_approval_save($date_transaction,$problem_id,$nik2,$name2,$email2,'000',$section2,'3','Responsible');
       // Simpan responsible approver
        $this->tb_approval_save_superior($date_transaction,$problem_id,$nik2,'4','Responsible Approver');

        // Simpan inisiator
        $this->tb_approval_save($date_transaction,$problem_id,$nik,$name,$email,'000',$section,'5','Inisiator after response check');
        // Simpan inisiator approver
        $this->tb_approval_save_superior($date_transaction,$problem_id,$nik,'6','Inisiator approver after response check');

        // $query=array('berhasil'=>'berhasil');   
        // return $query;
        
    }

     function tb_approval_save($date_transaction,$problem_id ,$nik,$name,$email,$sectionCode,$section,$sequence,$position)
    {
        $query = $this->db->query("
             INSERT INTO tb_approval
            (transaction_date,problem_id,nik,name ,office_email ,department_code,department_name,position_code,position_name)
            values ('$date_transaction','$problem_id','$nik','$name','$email',$sectionCode,'$section','$sequence','$position');
            ");

    }

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


   
    /** -----------------------------Akhir Menginput Dari Table Lain Berdasarkan Wherenya-----------------------------------**/

    public function insert_batch($table, $data)
    {
        $this->db->insert_batch($table, $data);
        return $this->db->affected_rows();
    }

    function Update_Data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function Delete_Data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function Get_Where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function ajax_getbyhdrid($hdrid, $table)
    {
        return $this->db->get_where($table, array('hdrid' => $hdrid));
    }

    function Get_central_user()
    {

        $DB2 = $this->load->database('db_central_user', TRUE);   // Database central user   
        $result = $DB2->get('Tb_user_login')->result();               // Untuk mengeksekusi dan mengambil data hasil query
        $DB2->Close();
        return $result;
    }

    function Get_departement()
    {

        $DB2 = $this->load->database('db_central_user', TRUE);   // Database central user   
        $result = $DB2->get('Tb_department')->result();               // Untuk mengeksekusi dan mengambil data hasil query
        $DB2->Close();
        return $result;
    }

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






    public function tampil_problem_category()
    {
        $query =  $this->db->get('tb_problem_category')->result();
        return $query;
    }

    public function tampil_group_product()
    {
        $query =  $this->db->get('tb_group_product')->result();
        return $query;
    }

    public function tampil_product()
    {
        $query =  $this->db->get('tb_product')->result();
        return $query;
    }


    public function tampil_customer()
    {
        $query =  $this->db->get('tb_customer_name')->result();
        return $query;
    }

    public function tampil_source_information()
    {
        $query =  $this->db->get('tb_source_information')->result();
        return $query;
    }


    //     public function tampi_nik()
    //    {
    //         $DB2 = $this->load->database('db_central_user', TRUE);
    //         $DB2->select('user_name,name');         
    //         $query = $DB2->get('Tb_user_login')->result(); 
    //         $DB2->Close();
    //         return  $query;
    //    }

    public function tampi_nik()
    {
        $this->db->select('user_name,name,department_name,office_email');
        $this->db->from('Tb_user_login');
        return $this->db->get()->result();
    }


    // Get Data report no By product ID
    public function get_product_by_id($product_id)
    {
        // return $this->db->get_where('tb_product', ['hdrid' => $product_id])->row_array();
        $this->db->select('report_no');
        $this->db->from('tb_product');
        $this->db->where('hdrid', $product_id);
        return $this->db->get()->row();
    }


    public function getdatabysession()
    {
        $namaSession = $this->session->userdata('nama');

        $this->db->where('name', $namaSession);
        $this->db->from('tb_approval');
        $query = $this->db->get();
        return $query->result();
    }
}

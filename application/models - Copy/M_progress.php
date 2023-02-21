<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_progress extends CI_Model
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

    function get_tables_where_approval($tables, $cari, $where, $iswhere)
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
            $sql = $this->db->query("SELECT DISTINCT * FROM " . $tables . " WHERE $iswhere AND " . $fwhere);
        } else {
            $sql = $this->db->query("SELECT DISTINCT * FROM " . $tables . " WHERE " . $fwhere);
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
            $sql_data = $this->db->query("SELECT DISTINCT * FROM " . $query . " WHERE $iswhere AND " . $fwhere . " AND (" . $cari . ")" . $order . " OFFSET " . $start . " ROWS FETCH NEXT " . $limit . " ROWS only ");
        } else {
            $sql_data = $this->db->query("SELECT DISTINCT * FROM " . $query . " WHERE " . $fwhere . " AND (" . $cari . ")" . $order . " OFFSET " . $start . " ROWS FETCH NEXT " . $limit . " ROWS only ");
        }

        if (isset($search)) {
            if (!empty($iswhere)) {
                $sql_cari =  $this->db->query("SELECT DISTINCT * FROM " . $query . " WHERE $iswhere AND " . $fwhere . " AND (" . $cari . ")");
            } else {
                $sql_cari =  $this->db->query("SELECT DISTINCT * FROM " . $query . " WHERE " . $fwhere . " AND (" . $cari . ")");
            }
            $sql_filter_count = $sql_cari->num_rows();
        } else {
            if (!empty($iswhere)) {
                $sql_filter = $this->db->query("SELECT DISTINCT * FROM " . $tables . " WHERE $iswhere AND " . $fwhere);
            } else {
                $sql_filter = $this->db->query("SELECT DISTINCT * FROM " . $tables . " WHERE " . $fwhere);
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


    function Input_Data2($data, $group_id, $table)
    {


        $query = $this->db->query("INSERT INTO tb_approval
    (transaction_date
    ,nik
    ,name
    ,office_email
    ,department_code
    ,department_name
    ,position_code
    ,position_name
    ,problem_id
  )
    SELECT transaction_date
           ,nik
           ,name
		   ,office_email
           ,department_code
           ,department_name
           ,position_code
		   ,position_name
           ,'$data'
    FROM tb_setting_approval
    WHERE group_id = '$group_id'");

        return $query;
    }




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

    function ajax_getbyPosition($project_id, $nik, $table, $approval1, $approva2)
    {

        $sql = "select top 1 nik from $table where problem_id='$project_id' and nik='$nik' and (position_name='$approval1' or position_name='$approva2') ";
        return $this->db->query($sql);
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
     FROM progress_approver
     where hdrid='WTR2010009' and level_approve=(select min(level_approve) from progress_approver where hdrid='WTR2010009' and date_approve is null)");

        // jika ketemu
        if ($query->num_rows() > 0) {
            $query = $query->rows();

            // Update progress waiting approve
            $where = array('hdrid' => $query->hdrid);
            $data = array('progress_approver' => 'Waiting approved ' . $query->name_approver);
            $this->db->where($where);
            $this->db->update('progress_approver', $data);

            // Kirim email request to approve
            $this->db->query("CALL sp_send_mail @hdrid='$query->hdrid',@nik='$query->nik_approver',@name='$query->name_approver',@email='widodo.a5v@ap.denso.com',@EmailSubject='Waiting Approver Wire transfer No ',@Email_body_content='You need approver'");
        } else {

            // Update progress finish approve
            $where = array('hdrid' => $query->hdrid);
            $data = array('progress_approver' => 'Finish Approved');
            $this->db->where($where);
            $this->db->update('progress_approver', $data);

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

    /** -----------------------------Tampilkan Data Dari Table Lain-----------------------------------**/

    public function tampil_internal()
    {
        $query =  $this->db->get('tb_group_product')->result();
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


    public function tampi_nik()
    {
        $DB2 = $this->load->database('db_central_user', TRUE);
        $DB2->select('user_name,name,department_name');
        $query = $DB2->get('Tb_user_login')->result();
        $DB2->Close();
        return  $query;
    }

    /** -----------------------------Akhir Tampilkan Data Dari Table Lain-----------------------------------**/


    function getDataByHdrid($table, $hdrid)
    {
        return $this->db->get_where($table, array('hdrid' => $hdrid));
    }




    function getTableWhereCustom($nik)
    {
        $sql = "
    SELECT a.hdrid, group_product_id, group_product_name, customer_id, customer_name,problem_name FROM tb_input_problem a
    JOIN tb_approval b ON a.hdrid = b.problem_id 
    where a.draft='send' and b.nik='$nik'";

        $query = $this->db->query($sql);

        $data = $query->result_array();

        $callback = array(
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'data' => $data
        );
        return json_encode($callback);
    }


    function get_tables_where2($tables, $cari, $where, $iswhere,$nikSession)
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
            $sql = $this->db->query("SELECT DISTINCT a.hdrid, a.group_product_id, a.group_product_name, a.customer_id, a.customer_name, a.problem_name, a.status_transaction FROM " . $tables . " a JOIN tb_approval b ON a.hdrid = b.problem_id  WHERE $iswhere AND " . $fwhere." OR a.nik='$nikSession'");
        } else {
            $sql = $this->db->query("SELECT DISTINCT a.hdrid, a.group_product_id, a.group_product_name, a.customer_id, a.customer_name, a.problem_name, a.status_transaction FROM " . $tables . " a JOIN tb_approval b ON a.hdrid = b.problem_id  WHERE " . $fwhere." OR a.nik='$nikSession'");
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
            $sql_data = $this->db->query("SELECT DISTINCT a.hdrid, a.group_product_id, a.group_product_name, a.customer_id, a.customer_name, a.problem_name, a.status_transaction FROM " . $query . " a JOIN tb_approval b ON a.hdrid = b.problem_id  WHERE $iswhere AND " . $fwhere."OR a.nik='$nikSession'" . " AND (" . $cari . ")" . $order . " OFFSET " . $start . " ROWS FETCH NEXT " . $limit . " ROWS only ");
        } else {
            $sql_data = $this->db->query("SELECT DISTINCT a.hdrid, a.group_product_id, a.group_product_name, a.customer_id, a.customer_name, a.problem_name, a.status_transaction FROM " . $query . " a JOIN tb_approval b ON a.hdrid = b.problem_id  WHERE " . $fwhere."OR a.nik='$nikSession'" . " AND (" . $cari . ")" . $order . " OFFSET " . $start . " ROWS FETCH NEXT " . $limit . " ROWS only ");
        }

        if (isset($search)) {
            if (!empty($iswhere)) {
                $sql_cari =  $this->db->query("SELECT DISTINCT a.hdrid, a.group_product_id, a.group_product_name, a.customer_id, a.customer_name, a.problem_name, a.status_transaction FROM " . $query . " a JOIN tb_approval b ON a.hdrid = b.problem_id  WHERE $iswhere AND " . $fwhere."OR a.nik='$nikSession'" . " AND (" . $cari . ")");
            } else {
                $sql_cari =  $this->db->query("SELECT DISTINCT a.hdrid, a.group_product_id, a.group_product_name, a.customer_id, a.customer_name, a.problem_name, a.status_transaction FROM " . $query . " a JOIN tb_approval b ON a.hdrid = b.problem_id  WHERE " . $fwhere."OR a.nik='$nikSession'" . " AND (" . $cari . ")");
            }
            $sql_filter_count = $sql_cari->num_rows();
        } else {
            if (!empty($iswhere)) {
                $sql_filter = $this->db->query("SELECT DISTINCT a.hdrid, a.group_product_id, a.group_product_name, a.customer_id, a.customer_name, a.problem_name, a.status_transaction FROM " . $tables . " a JOIN tb_approval b ON a.hdrid = b.problem_id  WHERE $iswhere AND " . $fwhere."OR a.nik='$nikSession'");
            } else {
                $sql_filter = $this->db->query("SELECT DISTINCT a.hdrid, a.group_product_id, a.group_product_name, a.customer_id, a.customer_name, a.problem_name, a.status_transaction FROM " . $tables . " a JOIN tb_approval b ON a.hdrid = b.problem_id  WHERE " . $fwhere."OR a.nik='$nikSession'");
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

    function update_status_transaction($hdrid,$status_transaction)
    {
        $where = array('hdrid' => $hdrid);
        $data = array('status_transaction' => $status_transaction);
        $this->db->where($where);
        $this->db->update('tb_input_problem', $data);
    }

    function search_position_name($hdrid,$position_name){
      
            $sql="SELECT TOP 1 *FROM tb_approval WHERE problem_id ='$hdrid' AND date_approve IS NULL AND position_name LIKE '$position_name%' ";
            $query = $this->db->query($sql);
            return $query->row();

    }

    function Update_Data_Respone($hdrid,$datetime){
        
      
        // Update date approve
        $this->db->query("update tb_approval set date_approve='$datetime' where  problem_id='$hdrid' and position_code='3' ");

       // Update status transaksi
        $sql="SELECT TOP 1 * FROM tb_approval WHERE problem_id ='$hdrid' AND date_approve IS NULL order by  position_code asc";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0) {
            $query=$query->row();

            if ($query->position_code=='2'||$query->position_code=='4'){
               $status_transaction = "Need approval by ".$query->name." (".$query->position_name." )";
            }else if($query->position_code=='5'||$query->position_code=='6') {
               $status_transaction = "Need review by ".$query->name." (".$query->position_name." )";
            }else {
              $status_transaction = "Need respon by ".$query->name." (".$query->position_name." )";
            }

            $this->db->query("Update tb_input_problem SET status_transaction =' $status_transaction' where hdrid='$hdrid' ");
            
        }else{

            $status_transaction="Done";
            $this->db->query("Update tb_input_problem SET status_transaction ='Done' where hdrid='$hdrid' ");
        }

        return $status_transaction ;

   }




}

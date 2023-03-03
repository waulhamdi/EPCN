<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PCN extends CI_Model {
    
    
     ///@see get_tables()
     ///@note fungsi data web bisa masuk ke database
     ///@attention jika data web masuk ke web tapi tidak masuk ke database itu salah di databasenya
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
    ///@attentionjika data web masuk ke web tapi tidak masuk ke database itu salah di databasenya
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
    ///@attention jika query database masuk ke web tapi tidak masuk ke query database itu salah di query databasenya
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
    ///@attention jika data tidak di input makan data tidak akan tampil
    function Input_Data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    /** -----------------------------Menginput Dari Table Lain Berdasarkan Wherenya-----------------------------------**/

    function get_tables_where2($tables,$cari,$where,$iswhere)
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
        $order = " ORDER BY HDRID";


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


    ///@see Input_Data2()
    ///@note fungsi digunakan untuk input data di query
    ///@attention jika data tidak di input makan data tidak akan tampil
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

     ///@see update Data Approve()
    ///@note fungsi digunakan untuk input update data di area approve
    ///@attention jika data tidak di update maka data tidak akan tampil dengan updatan terbaru
    function Update_Data_Approve_ver2($where, $data, $table, $position_code, $nama){
        $this->Update_Data($where, $data, $table);

        // mencari next approval
        $approval2 = $this->db->query("select TOP 1 * from tb_approval where stat='unapprove' and problem_id = '" . $data['problem_id'] . "'order by position_code asc");
        if ($approval2->num_rows()==0) {
            $status = $this->db->query("select TOP 1 * from tb_approval where problem_id = '" . $data['problem_id'] . "' and position_code = '12'")->row();
            
            $data3 = (object) array(
                'status' => "<b>Approved</b>",
                'current_flow_pic' => "Done",
            ); 
            $where2 = array('no_dokumen' => $data['problem_id']);
            $this->Update_Data($where2, $data3, 'tb_PCNlist');

             // Update tb_PCN
            $data4 = array(
                'stat' => "approved"
            ); 
            $where = array('hdrid' => $data['problem_id']);
            $this->Update_Data($where, $data4, 'tb_PCN');


            
        }else{
            $status_transaction = "Approved by " . $nama;
            $approval2=$approval2->row();

            $next_position_code = $approval2->position_code;
            
            $approval2 = $this->db->query("select * from tb_approval where position_code ='" . $next_position_code . "' and problem_id = '" . $data['problem_id'] . "'")->result();
            
            $name = "";
            foreach($approval2 as $key=>$app){
                if($key == 0){
                    $name = $name . $app->name; 
                }else{
                    $name = $name . ", " . $app->name; 
                }
            }
            
            if($data['position_code'] < 6){
                $status = "Not Yet Temporary Approval";
            }else{
                $status = "Plan Approval";
            }

            if($data['position_code'] == 1 ){
                $data3 = (object) array(
                    'status' => $status,
                    'current_flow_pic' => $name,
                    'pic_proc' => $nama,
                    'registered' => $data['date_approve']
                );
            }else if ($data['position_code'] == 2){
                $data3 = (object) array(
                    'status' => $status,
                    'current_flow_pic' => $name,
                    'checked_proc' => $nama
                );
            }
            else if ($data['position_code'] == 3){
                $data3 = (object) array(
                    'status' => $status,
                    'current_flow_pic' => $name,
                    'approved_proc' => $nama
                );
            }else if ($data['position_code'] == 4){
                $data3 = (object) array(
                    'status' => $status,
                    'current_flow_pic' => $name,
                    'qa_pic' => $nama
                );
            }else if ($data['position_code'] == 5){
                $data3 = (object) array(
                    'status' => $status,
                    'current_flow_pic' => $name,
                    'checked_qa' => $nama
                );
            }else if ($data['position_code'] == 6){
                $data3 = (object) array(
                    'status' => $status,
                    'current_flow_pic' => $name,
                    'approved_qa' => $nama
                );
            }else{
                $data3 = (object) array(
                    'status' => $status,
                    'current_flow_pic' => $name
                );
            }

            
            // Update tb_PCN
            $data3 = (object) array(
                'stat' => "process"
            );
            $where = array('hdrid' => $data['problem_id']);
            $this->Update_Data($where, $data3, 'tb_PCN');
        }
        
        return  "Approve Berhasil";
    }

     ///@see update Data Approve()
    ///@note fungsi digunakan untuk input update data di area approve
    ///@attention jika data tidak di update maka data tidak akan tampil dengan updatan terbaru
    function Send_Back_Data($where,$data,$reason ,$table, $nama){
        $this->Update_Data($where, $data, $table);

        $approval = $this->db->query("select TOP 1 * from tb_approval where stat='unapprove' and problem_id = '" . $data['problem_id'] . "'order by position_code asc")->row();
        
        $where = array('no_dokumen' => $data['problem_id']);
        $data = (object) array(
            'status' => "Send Back to Procurement PIC By <b>" . $nama . "</b><br> <b>Reason:</b> " . $reason,
            'current_flow_pic' => $approval->name
        );

        $this->Update_Data($where, $data, 'tb_PCNlist');
        
        return  "Send Back by " . $nama . "Berhasil";
    }

    /** -----------------------------Menginput Dari Table Lain Berdasarkan Wherenya-----------------------------------**/

    // $post_data_transaction_date,$hdrid3,$this->input->post('nik'),$this->input->post('name'),$this->input->post('section1'),$this->input->post('email1'),$this->input->post('nik2'),$this->input->post('name2'),$this->input->post('section2'),$this->input->post('email2')

    ///@see Input_Data_Approver()
    ///@note fungsi digunakan untuk input data dengan approve
    ///@attention jika data approver tidak di input makan data tidak akan tampil
    // function Input_Data_Approver($date_transaction,$hdrid,$supplier)
    // {
    //     // *** procurement ***
    //     $this->tb_approval_save($date_transaction,$hdrid,$supplier,'1','Procurement-Check 1');
    //     $this->tb_approval_save_superior($date_transaction,$hdrid,$supplier,'2','Procurement-Check 2');
    //     $this->tb_approval_save($date_transaction,$hdrid,$supplier,'2','Procurement-Check 2');
    //     $this->tb_approval_save_superior($date_transaction,$hdrid,$supplier,'3','Procurement-Check 3');

    //     // *** QA ***
    //     $this->tb_approval_save_superior2($date_transaction,$hdrid,$supplier,'4','QA-Check 1');
    //     $this->tb_approval_save($date_transaction,$hdrid,$supplier,'4','QA-Check 1');
    //     $this->tb_approval_save_superior($date_transaction,$hdrid,$supplier,'4','QA-Check 1');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'5','QA-Check 2');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'5','QA-Check 2');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'6','QA-Check 3');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'6','QA-Check 3');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'7','QA-Final 1');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'7','QA-Final 1');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'7','QA-Final 1');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'8','QA-Final 2');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'8','QA-Final 2');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'9','QA-Final 3');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'9','QA-Final 3');

    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'10','Procurement-Final 1');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'11','Procurement-Final 2');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'11','Procurement-Final 2');
    //     $this->tb_approval_save_superior($$date_transaction,$hdrid,$supplier,'12','Procurement-Final 3');

    //     // $query=array('berhasil'=>'berhasil');   
    //     // return $query;
        
    // }

    ///@see Update_Data_Approver()
    ///@note fungsi digunakan untuk update data dengan approve
    ///@attention jika data tidak di update maka data tidak akan tampil dengan updatan terbaru
    function Update_Data_Approver($problem_id,$nik)
    {
 
        // Update responsible
        $this->tb_approval_update_supres($problem_id,$nik,'3');
        // Simpan responsible approver 1
        $this->tb_approval_update_superior($problem_id,$nik,'4','');
        // Simpan responsible approver 2
        $this->tb_approval_update_superior($problem_id,$nik,'5','2');
                
    }

    ///@see input Update_stat()
    ///@note fungsi digunakan untuk update status agar muncul di application response
    ///@attention
    function Update_stat($problem_id,$date)
    {
        $query=$this->db->query("select stat from tb_approval where problem_id='$problem_id' and position_name='Procurement-Check3' and stat='Approved'");
       
        if ($query->num_rows() > 0) {
            $where = array('pcn_number' =>$problem_id,'status'=>'Closed');
            $data = array('status' =>'Open','reminder'=>$date);
            $update=$this->Update_Data($where, $data, 'tb_application');
            return $update;
        }else{
            return "Not Found";
        }
        // $query = $this->db->query("");
        
        // return  $application_res;


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
    function ajax_getbyhdrid($hdrid, $table)
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

    // function reject_Data_Approve($where,$data,$table,$hdrid){
    //     $this->db->where($where);
    //     $this->db->update($table,$data);


    //     // $sql="SELECT TOP 1 position_code FROM tb_approval WHERE problem_id ='$hdrid' AND date_approve IS NULL order by  position_code asc";
    //     // $query = $this->db->query($sql);
    //     // if ($query->num_rows()>0) {
    //     //     $query=$query->row();
    //     //     if ($query){ // Jika direject oleh approver inisiator dan responsible maka lari ke draft
    //     //         //  $this->db->query("Update tb_PCN SET draft ='Draft' where hdrid='$hdrid'");
    //     //          $this->db->query("Update tb_approval SET date_approve=NULL where problem_id='$hdrid'");
    //     //         //  $this->db->query("Update tb_approval SET reason='$coment' where problem_id='$hdrid' and position_code>1");
    //     //          $this->db->query("Update tb_approval SET stat='$data->stat' reason='$data->reason' date_approve='$data->date_approve' where problem_id='$hdrid' and position_code='$position_code'");
    //     //     }else{ //  Lari kembali ke responsible
    //     //          $this->db->query("Update tb_approval SET date_approve=NULL where problem_id='$hdrid' and position_code>2");
    //     //     }
            
    //     // }

    // }

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

    

    ///@see tampil_supplier_name()
     ///@note untuk select filter
     ///@attention 
    public function tampil_supplier_name()
    {
        $query =  $this->db->get('tb_pcn')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
        return $query;
    }


        ///@see tampil_cost_impact()
     ///@note untuk select filter
     ///@attention 
    public function tampil_cost_impact()
    {
        $query =  $this->db->get('tb_pcn')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
        return $query;
    }
   
        ///@see tampil_capactiy_impact()
     ///@note untuk select filter
     ///@attention 
    public function tampil_capactiy_impact()
    {
        $query =  $this->db->get('tb_pcn')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
        return $query;
    }

    ///@see tampil_description()
     ///@note untuk select filter
     ///@attention 
     public function tampil_description()
     {
         $query =  $this->db->get('tb_pcn')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
         return $query;
     }


    ///@see tampil_email()
     ///@note untuk select filter
     ///@attention 
     public function tampil_email()
     {
         $query =  $this->db->get('tb_pcn')->result(); //contoh dari tabel input problem nanti ganti table kalau sudah fiks
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

    //     ///@see get_product_by_id()
    //  ///@note untuk masukkan data ke product by id
    //  ///@attention 
    // public function get_product_by_id($product_id)
    // {

    //     // return $this->db->get_where('tb_product', ['hdrid' => $product_id])->row_array();
        // $this->db->select('report_no');
        // $this->db->from('tb_product');
        // $this->db->where('hdrid', $product_id);
        // return $this->db->get()->row();

    // }

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

     ///@see get_PCN_Registrasi()
     ///@note untuk pcn register mendapatkan no pcn
     ///@attention 
     public function get_PCN_Registrasi()
     {
         // return $this->db->get_where('tb_product', ['hdrid' => $product_id])->row_array();
          $query = $this->db->query("select * from tb_PCN ");
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

        ///@see number_of_data_per_month_PCNLIST()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap bulan
     ///@attention 
    public function number_of_data_per_month_PCNLIST($year, $month){
        $query = $this->db->query("SELECT COUNT(*) num FROM tb_PCNLIST WHERE YEAR(transaction_date) = '".$year."' AND MONTH(transaction_date) = '".$month."' GROUP BY  MONTH(transaction_date)");
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

     ///@see last_5_month_PCNLIST()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 bulan terakhir
     ///@attention 
    public function last_5_month_PCNLIST(){
        $month = date('m');
        $year = date('Y');
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            if ($month > 0) {
                array_push($datas, $this->number_of_data_per_month_PCNLIST($year, $month--));
            } else {
                $month = 12;
                array_push($datas, $this->number_of_data_per_month_PCNLIST(--$year, $month--));
            }
        }
        return array_reverse($datas);
    }

        ///@see upcoming_5_month_name()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 bulan kedepan
     ///@attention 
    public function upcoming_5_month_PCNLIST(){
        $month = date('m');
        $year = date('Y');
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            if ($month > 0) {
                array_push($datas, $this->number_of_data_per_month_PCNLIST($year, $month++));
            } else {
                $month = 12;
                array_push($datas, $this->number_of_data_per_month_PCNLIST(++$year, $month++));
            }
        }
        return $datas;
    }

   ///@see number_of_data_per_year_PCNLIST()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap tahun
     ///@attention 
    public function number_of_data_per_year_PCNLIST($year){
        $query = $this->db->query("SELECT COUNT(*) num FROM tb_PCNLIST WHERE YEAR(transaction_date) = '".$year."' GROUP BY  YEAR(transaction_date)");
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

    public function data_per_supplier(){
        $supplier = $this->db->query("SELECT nama_supplier FROM tb_PCNLIST WHERE nama_supplier IS NOT NULL GROUP BY  nama_supplier");
        $supplier_array = array();
        for ($i=0; $i < $supplier->num_rows(); $i++) {
            array_push($supplier_array, $supplier->row($i)->nama_supplier);
        }
        $num = $this->db->query("SELECT COUNT(*) num FROM tb_PCNLIST WHERE nama_supplier IS NOT NULL GROUP BY  nama_supplier");
        $num_array = array();
        for ($i=0; $i < $num->num_rows(); $i++) {
            array_push($num_array, $num->row($i)->num);
        }
        $datas = array();
        array_push($datas, $supplier_array);
        array_push($datas, $num_array);
        return $datas;
    }

    ///@see upcoming_5_years_PCNLIST()
     ///@note fungsi digunakan menarik data pcnlist ke table tiap 5 tahun kedepan
     ///@attention 
    public function upcoming_5_years_PCNLIST(){
        $year = date('Y');
        $datas = array();
        for ($i=0; $i < 5; $i++) {
            array_push($datas, $this->number_of_data_per_year_PCNLIST($year++));
        }
        return $datas;
    }
    
    public function get_product_name(){
        $product_name = $this->db->query("SELECT product_name FROM tb_PCNlist GROUP BY  product_name");

        foreach ($product_name->result() as $key=>$product){
            $name[$key] = $product->product_name;
            
            $status = $this->db->query("SELECT * FROM tb_PCNlist WHERE product_name = '" . $product->product_name . "'");
            // var_dump($status);
            $unapproved[$key] = 0;
            $approved[$key] = 0;
            $process[$key] = 0;
            $rejected[$key] = 0;
            $total[$key] = 0;
            foreach ($status->result() as $stat){
                $total[$key] += 1;
                if ($stat->status == "unapproved"){
                    $unapproved[$key] += 1;
                }elseif($stat->status == "approved"){
                    $approved[$key] += 1;
                }elseif($stat->status == "rejected"){
                    $rejected[$key] +=1;
                }else{
                    $process[$key] += 1;
                }
            }
        }
        $data = ([
            'name' => $name,
            'total' => $total,
            'unapproved' => $unapproved,
            'approved' => $approved,
            'process' => $process,
            'rejected' => $rejected
        ]);
        return $data;
    }

    public function get_supplier_name(){
        $supplier_name = $this->db->query("SELECT supplier_name FROM tb_PCNlist GROUP BY  supplier_name");
    
        foreach ($supplier_name->result() as $key=>$supplier){
            $name[$key] = $supplier->supplier_name;
            
            $status = $this->db->query("SELECT * FROM tb_PCNlist WHERE supplier_name = '" . $supplier->supplier_name . "'");
            // var_dump($status);
            $unapproved[$key] = 0;
            $approved[$key] = 0;
            $process[$key] = 0;
            $rejected[$key] = 0;
            $total[$key] = 0;
            foreach ($status->result() as $stat){
                $total[$key] += 1;
                if ($stat->status == "unapproved"){
                    $unapproved[$key] += 1;
                }elseif($stat->status == "approved"){
                    $approved[$key] += 1;
                }elseif($stat->status == "rejected"){
                    $rejected[$key] +=1;
                }else{
                    $process[$key] += 1;
                }
            }
        }
        $data = ([
            'name' => $name,
            'total' => $total,
            'unapproved' => $unapproved,
            'approved' => $approved,
            'process' => $process,
            'rejected' => $rejected
        ]);
        return $data;
    }

    public function get_pcn_need_approve(){
        $data = $this->db->query("SELECT * FROM tb_PCN WHERE stat LIKE  '%" . $this->session->userdata('nama') . "%' AND stat NOT LIKE  '%Cancel%' AND stat NOT LIKE  '%Close%' AND stat NOT LIKE  '%Final Approve%'")->result();
        return $data;
    }
    
    public function get_pcn($hdrid){
        $data = $this->db->query("SELECT * FROM tb_PCN WHERE hdrid = '" . $hdrid . "'")->row();

        $data->trial_manufacturing = date("d F Y", strtotime($data->trial_manufacturing)); 
        // $data->trial_manufacturing_completed_finish = date("d F Y", strtotime($data->trial_manufacturing_completed_finish));
        
        $data->process_capability_study = date("d F Y", strtotime($data->process_capability_study));
        // $data->process_capability_study_completed_finish = date("d F Y", strtotime($data->process_capability_study_completed_finish));
        
        $data->initial_sample_inspection_completed = date("d F Y", strtotime($data->initial_sample_inspection_completed));
        // $data->initial_sample_inspection_completed_finish = date("d F Y", strtotime($data->initial_sample_inspection_completed_finish));
        
        $data->initial_sample_submission = date("d F Y", strtotime($data->initial_sample_submission));
        // $data->initial_sample_submission_finish = date("d F Y", strtotime($data->initial_sample_submission_finish));
        
        $data->timing_denso_approval = date("d F Y", strtotime($data->timing_denso_approval));
        // $data->timing_denso_approval_finish = date("d F Y", strtotime($data->timing_denso_approval_finish));
        
        $data->m_or_p_starts = date("d F Y", strtotime($data->m_or_p_starts));
        // $data->mass_production_starts_finish = date("d F Y", strtotime($data->mass_production_starts_finish));
        
        $data->m_or_p_shipment = date("d F Y", strtotime($data->m_or_p_shipment));
        // $data->mass_production_shipment_finish = date("d F Y", strtotime($data->mass_production_shipment_finish));
        
        $data->entry_example_start = date("d F Y", strtotime($data->entry_example_start));
        // $data->entry_example_finish = date("d F Y", strtotime($data->entry_example_finish));
        return $data;
    }

    public function get_tooling(){
        $data = $this->db->query("SELECT * FROM tb_tooling ")->row();
        
        $data->start_delivery_to_aine = date("d F Y", strtotime($data->start_delivery_to_aine));
        $data->new_dies_mold_finish = date("d F Y", strtotime($data->new_dies_mold_finish));
        
        return $data;
    }

    public function get_attachment($hdrid){
        $data = $this->db->query("SELECT * FROM tb_attachment  WHERE pcn_number = '" . $hdrid . "' AND type = 'PCN'")->result();
        return $data;
    }

    public function ajaxGet_pcn_list($value){
        if($value != "all"){
            $pcnListUnapproved = $this->db->query("SELECT * FROM tb_PCN WHERE stat LIKE  '%" . $this->session->userdata('nama') . "%' AND (hdrid LIKE '%" . $value . "%' OR supplier_name LIKE '%" . $value . "%' OR object_type LIKE '%" . $value . "%' OR product_name LIKE '%" . $value . "%' OR part_name LIKE '%" . $value . "%' OR criteria_critical_item LIKE '%" . $value . "%' OR stat LIKE '%" . $value . "%' ) ORDER BY transaction_date ASC;")->result();
        }else{
            $pcnListUnapproved = $this->db->query("SELECT * FROM tb_PCN WHERE stat LIKE  '%" . $this->session->userdata('nama') . "%' ORDER BY transaction_date ASC;")->result();
        }
        return $pcnListUnapproved;
    }

    public function get_group_product(){
        $groups = $this->db->query("SELECT group_product_name, COUNT(group_product_name) count FROM tb_product WHERE group_product_name IS NOT NULL GROUP BY  group_product_name")->result();
        $group_product_name = array();
        foreach ($groups as $group) {
            array_push($group_product_name, $group->group_product_name);
        }
        $count = array();
        foreach ($groups as $group) {
            array_push($count, $group->count);
        }
        $datas = array();
        array_push($datas, $group_product_name);
        array_push($datas, $count);
        return $datas;
    }




    function Input_Data_proc($supplier,$hdrid){
    $query= $this->db->query( "select * from tb_superiorprocurement where supplier='$supplier' order by position ");
    $hsl=$query->result();
    $current_date = mdate('%Y-%m-%d', time());

    foreach ($hsl as $value) {
            $nik=$value->nik_superiorprocurement;
            $nama=$value->name_superiorprocurement;
            $kode=$value->kode_section_superiorprocurement;
            $section=$value->name_section_superiorprocurement;
            $email=$value->email_superiorprocurement;
            $position=$value->position;
            if ($position=='written') {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '1', 'Written Proc', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '1', 'Written Proc', null, null,'unapprove')");
                }
            }elseif ($position=='checked') {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '2', 'Checked Proc', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '2', 'Checked Proc', null, null,'unapprove')");
                }
            }elseif ($position=='checked 2') {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '3', 'Checked 2 Proc', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '3', 'Checked 2 Proc', null, null,'unapprove')");
                }
            }else {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '4', 'Approved Proc', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '4', 'Approved Proc', null, null,'unapprove')");
                }
            }
    }
}   
    function Input_Data_qa($product,$hdrid){
    $query= $this->db->query( "select * from tb_superiorqa where product='$product' order by position ");
    $hsl=$query->result();
    $current_date = mdate('%Y-%m-%d', time());

    foreach ($hsl as $value) {
            $nik=$value->nik_superiorqa;
            $nama=$value->name_superiorqa;
            $kode=$value->kode_section_superiorqa;
            $section=$value->name_section_superiorqa;
            $email=$value->email_superiorqa;
            $position=$value->position;
            if ($position=='written') {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '5', 'Written QA', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '5', 'Written QA', null, null,'unapprove')");
                }
            }elseif ($position=='checked') {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '6', 'Checked QA', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '6', 'Checked QA', null, null,'unapprove')");
                }
            }else {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '7', 'Approved QA', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '7', 'Approved QA', null, null,'unapprove')");
                }
            }
}
}
    function Input_Data_finalproc($supplier,$hdrid){
    $query= $this->db->query( "select * from tb_superiorprocurement where supplier='$supplier' order by position ");
    $hsl=$query->result();
    $current_date = mdate('%Y-%m-%d', time());

    foreach ($hsl as $value) {
            $nik=$value->nik_superiorprocurement;
            $nama=$value->name_superiorprocurement;
            $kode=$value->kode_section_superiorprocurement;
            $section=$value->name_section_superiorprocurement;
            $email=$value->email_superiorprocurement;
            $position=$value->position;
            if ($position=='written') {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '8', 'Written Proc Final', $current_date, null,'Approved')");
                }else {
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '8', 'Written Proc Final', null, null,'unapprove')");
                }
            }elseif ($position=='checked') {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '9', 'Checked Proc Final', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '9', 'Checked Proc Final', null, null,'unapprove')");
                }
            }elseif ($position=='checked 2') {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '10', 'Checked 2 Proc Final', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '10', 'Checked 2 Proc Final', null, null,'unapprove')");
                }
            }else {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '11', 'Approved Proc Final', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '11', 'Approved Proc Final', null, null,'unapprove')");
                }
            }
}
}
    function Input_Data_finalqa($product,$hdrid){
    $query= $this->db->query( "select * from tb_superiorqa where product='$product' order by position ");
    $hsl=$query->result();
    $current_date = mdate('%Y-%m-%d', time());

    foreach ($hsl as $value) {
            $nik=$value->nik_superiorqa;
            $nama=$value->name_superiorqa;
            $kode=$value->kode_section_superiorqa;
            $section=$value->name_section_superiorqa;
            $email=$value->email_superiorqa;
            $position=$value->position;
            if ($position=='approved') {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '14', 'Approved QA Final', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '14', 'Approved QA Final', null, null,'unapprove')");
                }
             }
             elseif ($position=='checked') {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '13', 'Checked QA Final', $current_date, null,'Approved')");
                }else{
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '13', 'Checked QA Final', null, null,'unapprove')");
                }
            }else {
                if($nik=='DM11111'){
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '12', 'Written QA Final', $current_date, null,'Approved')");
                }else {
                    $this->db->query("INSERT INTO tb_approval(transaction_date,problem_id,nik,name,department_code,department_name,office_email,position_code,position_name,date_approve,reason,stat)
                    values ('$current_date','$hdrid', '$nik','$nama','$kode','$section', '$email', '12', 'Written QA Final', null, null,'unapprove')");
                }
            }
}
}
    function Input_Data_application($product,$hdrid,$part_name,$part_no,$criteria,$supplier_name,$perubahan_lama,$nik,$name,$comparison){

    $where = array('product' =>$product);
    $this->db->select('*');
    $this->db->from('tb_settingapp');
    $this->db->where($where);
    $query=$this->db->get()->row();

    $current_date = mdate('%Y-%m-%d', time());
    $pe_nik=$query->pe_nik;
    $qc_nik=$query->qc_nik;
    $mfg_nik=$query->mfg_nik;
    $pc_nik=$query->pc_nik;
    $qa_nik=$query->qa_nik;
    
    $pe_name=$query->pe_name;
    $qc_name=$query->qc_name;
    $mfg_name=$query->mfg_name;
    $pc_name=$query->pc_name;
    $qa_name=$query->qa_name;

    $pe_pic=$query->pe_pic;
    $qc_pic=$query->qc_pic;
    $mfg_pic=$query->mfg_pic;
    $pc_pic=$query->pc_pic;
    $qa_pic=$query->qa_pic;
    // var_dump($qa_pic);

    $this->db->query("INSERT INTO tb_application(hdrid,transaction_date,pcn_number,supplier,part_number,part_name,product_name,criteria_critical_item,current_process,comparison_detail,qc_inspection_departement,pe_departement,mfg_departement,pc_departement,qa_departement,qc_nik,pe_nik,mfg_nik,pc_nik,qa_nik,qc_name,pe_name,mfg_name,pc_name,qa_name,user_nik,user_name)
    values ('$hdrid','$current_date','$hdrid','$supplier_name','$part_no','$part_name','$product','$criteria','$perubahan_lama','$comparison','$qc_pic','$pe_pic','$mfg_pic','$pc_pic','$qa_pic','$qc_nik','$pe_nik','$mfg_nik','$pc_nik','$qa_nik','$qc_name','$pe_name','$mfg_name','$pc_name','$qa_name','$nik','$name')");
    
}


    function send_email($hdrid){
        $query= $this->db->query( "select * from tb_approval where problem_id='$hdrid'");
        $hsl=$query->result();
        $current_date = mdate('%Y-%m-%d', time());

        foreach ($hsl as $value) {
            $nik=$value->nik;
            $nama=$value->name;
            $department_code=$value->department_code;
            $department_name=$value->department_name;
            $email=$value->office_email;
            $position_code=$value->position_code;
            $position_name=$value->position_name;
            
            $this->db->query("INSERT INTO tb_mail_trigger(hdrid, transaction_date, nik, name, department_code, department_name, office_email, position_code, position_name, status_transaction, subject_email, body_content, comment, cc_email)
            values ('$hdrid', '$current_date', '$nik', '$nama', '$department_code', '$department_name', '$email', '$position_code', '$position_name', null, 'New Pcn Registration', 'Please Check PCN', '-', '-')");
    }
    }

    function update_send_email($hdrid){
        $current_date = mdate('%Y-%m-%d', time());
        $this->db->query("UPDATE tb_mail_trigger SET status_transaction='Email Sent' WHERE hdrid='$hdrid' and position_code=(SELECT MIN(position_code) FROM tb_mail_trigger WHERE hdrid='$hdrid');");
    }
    

    function update_approve_email($hdrid){
        $current_date = mdate('%Y-%m-%d', time());
        $query = "UPDATE tb_mail_trigger SET status_transaction='Email Sent' WHERE hdrid='$hdrid' and position_code=(SELECT MIN(position_code) FROM tb_mail_trigger WHERE hdrid='$hdrid' and position_code>(SELECT MIN(position_code) FROM tb_mail_trigger WHERE hdrid='$hdrid'));";
        $this->db->query($query);
    }
    

    ///@see cari_tb_approver
    ///@note fungsi digunakan untuk mencari 1 next apporver
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

    ///@see cari_all_approver
    ///@note fungsi digunakan untuk mencari semua next approver
    ///@attention
    function cari_all_approver($hdrid,$poscode)
    {

      $query = $this->db->query("select string_agg(office_email+';','') WITHIN GROUP (ORDER BY position_code)office_email  from tb_approval where problem_id='$hdrid' and position_code='$poscode' and date_approve is null ");
      if ($query->num_rows() > 0) {
          return $query->row();
      }else{
          $query = (object) array('nik'=>'not found','name'=>'All','office_email'=>'not found','position_code'=>'not found');
          return $query;
      }

    }

    /// @see cari_requester()
    /// @note Cari user/requester form
    /// @attention Mencari requester dengan menyamakan column nik
    function cari_requester($nik)
    {

        $query = $this->db->query("select top 1 * from tb_superiorprocurement where nik_superiorprocurement='$nik'");
        if ($query->num_rows() > 0) {
            return $query->row();
        }else{
            $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
            return $query;
        }

    }

    public function get_application()
    {
        // Execute a query to retrieve the data
        $query = $this->db->query("SELECT 
         comment_qc, hold_or_go_qc, confirm_qc,
         comment_pe, hold_or_go_pe, confirm_pe,
         comment_qa, hold_or_go_qa, confirm_qa,
         comment_mfg, hold_or_go_mfg, confirm_mfg,
         comment_pc, hold_or_go_pc, confirm_pc 
         FROM tb_application");

        // Fetch the result as an array
        // $result = $query->result_array(); 
    }

    public function update_application($hdrid)
    {
        $data="UPDATE tb_application set 
        comment_qc=null, hold_or_go_qc=null, confirm_qc=null
        comment_pe=null, hold_or_go_pe=null, confirm_pc=null
        comment_qa=null, hold_or_go_qa=null, confirm_qa=null
        comment_mfg=null, hold_or_go_mfg=null, confirm_mfg=null
        comment_pc=null, hold_or_go_pc=null, confirm_pc=null where hdrid=$hdrid";

        $this->db->query($data);
    }

    public function get_supplier_proc()
    {
        // $query=$this->db->get('tb_superiorprocurement');
        // return $query->result();
        return $this->db->distinct()->select('supplier')->get('tb_superiorprocurement')->result(); // Produces: SELECT DISTINCT * FROM table
    }

    public function get_product_qa()
    {
        // $query=$this->db->get('tb_superiorqa');
        // return $query->result();
        // $this->db->query('product');
        return $this->db->distinct()->select('product')->get('tb_superiorqa')->result();
    }
    // ,$category,$supplier_name,$product_name,$part_name,$part_no,$description,$perubahan_baru,$perubahan_lama,$start,$shipment,$post_data_transaction_date,$commodity
    public function update_pcnlist($hdrid)
    {   
        $this->db->select('tb_PCNlist.no_dokumen');
        $this->db->from('tb_PCN');
        $this->db->join('tb_PCNlist','tb_PCN.hdrid=tb_PCNlist.no_dokumen');
        $this->db->where('tb_PCN.hdrid',$hdrid);
        return $this->db->get()->result_array();

        // $query=("UPDATE tb_PCNlist set 
        // transaction_date='$post_data_transaction_date',
        // category='$category',
        // supplier_name='$supplier_name,
        // product_name='$product_name,
        // part_name='$part_name',
        // part_no='$part_no',
        // description='$description',
        // proses_perubahan_baru='$perubahan_baru,
        // proses_perubahan_lama='$perubahan_lama,
        // registered='$post_data_transaction_date',
        // commodity='$commodity',
        // masspro_schedule='$start.'-'.$shipment'
        // WHERE no_dokumen='$hdrid'
        // ");

        // var_dump($query);
    }

    // public function update_tbapplication(){
    //     $this->db->select('tb_application.hdrid');
    //     $this->db->from('tb_PCN');
    //     $this->db->join('tb_application','tb_PCN.hdrid=tb_application.hdrid');
    //     $this->db->where('tb_PCN.hdrid',$hdrid);
    //     return $this->db->get()->result_array();
    // }
}

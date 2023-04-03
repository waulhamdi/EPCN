<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_QCR extends CI_Model {
    
    
    ///@see get tables
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


        
     ///@see get table where
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
      
    //@see get get data query
    ///@note fungsi digunakan untuk query data 
    ///@attention 
      function get_tables_query($query,$cari,$where,$iswhere)
      {
          // Ambil data yang di ketik user pada textbox pencarian
          $search = htmlspecialchars($_POST['search']['value']);
          // Ambil data limit per page
          $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
          // Ambil data start
          $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 

          if($where != null) //untuk jika code auto increnete terisi automatis
          {
              $setWhere = array();
              foreach ($where as $key => $value)
              {
                  $setWhere[] = $key."='".$value."'";
              }
              $fwhere = implode(' AND ', $setWhere);//untuk implode data

              if(!empty($iswhere))
              {
                  $sql = $this->db->query($query." WHERE  $iswhere AND ".$fwhere); //sql count
                  
              }else{
                  $sql = $this->db->query($query." WHERE ".$fwhere);
              }
              $sql_count = $sql->num_rows();  //sql count

              //untuk mencari implode data
              $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
              
              // Untuk mengambil nama field yg menjadi acuan untuk sorting
              $order_field = $_POST['order'][0]['column']; 
  
              // Untuk menentukan order by "ASC" atau "DESC"
              $order_ascdesc = $_POST['order'][0]['dir']; 
              $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;
  
            //parameter jika data dicari maka data ditampilkan akan muncul
              if(!empty($iswhere))
              {
                  $sql_data = $this->db->query($query." WHERE $iswhere AND ".$fwhere." AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
              }else{
                  $sql_data = $this->db->query($query." WHERE ".$fwhere." AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
              }
              
              //parameter jika data cari dan menfilter maka data ditampilkan akan muncul
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
                //parameter jika data cari dan menfilter maka data ditampilkan akan muncul
                  if(!empty($iswhere))
                  {
                      $sql_filter = $this->db->query($query." WHERE $iswhere AND ".$fwhere);
                  }else{
                      $sql_filter = $this->db->query($query." WHERE ".$fwhere);
                  }
                  $sql_filter_count = $sql_filter->num_rows();
              }
              $data = $sql_data->result_array(); //sql count

          }else{

            //parameter untuk mencari data sudah muncul
              if(!empty($iswhere))
              {
                  $sql = $this->db->query($query." WHERE  $iswhere ");
              }else{
                  $sql = $this->db->query($query);
              }
              
              $sql_count = $sql->num_rows(); //sql count

              
            //untuk mencari implode data
              $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
              
              // Untuk mengambil nama field yg menjadi acuan untuk sorting
              $order_field = $_POST['order'][0]['column']; 
  
              // Untuk menentukan order by "ASC" atau "DESC"
              $order_ascdesc = $_POST['order'][0]['dir']; 
              $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;
  
              //parameter jika data dicari maka data ditampilkan akan muncul
              if(!empty($iswhere))
              {                
                  $sql_data = $this->db->query($query." WHERE $iswhere AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
              }else{
                  $sql_data = $this->db->query($query." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
              }

              //parameter jika data cari data ditampilkan akan muncul
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

                //parameter jika data cari dan menfilter maka data ditampilkan akan muncul
                  if(!empty($iswhere)) //parameter untuk mencari data sudah muncul
                  {
                      $sql_filter = $this->db->query($query." WHERE $iswhere");
                  }else{
                      $sql_filter = $this->db->query($query);
                  }
                  $sql_filter_count = $sql_filter->num_rows();
              }
              $data = $sql_data->result_array();
          }
          
          //untuk menampilkan data sudah filter
          $callback = array(    
              'draw' => $_POST['draw'], // Ini dari datatablenya    
              'recordsTotal' => $sql_count,    
              'recordsFiltered'=>$sql_filter_count,    
              'data'=>$data
          );
          return json_encode($callback); // Convert array $callback ke json
      }     

    ///@see max data
     ///@note fungsi digunakan menentukan data maximal
     ///@attention
      public function Max_data($mdate, $table)
      {
          $this->db->select_max('hdrid');//table auto increnete
          $this->db->like('hdrid', $mdate);//tanggal dinput
          $query = $this->db->get($table);//untuk link table
          return  $query;
      }
  
      ///@see input data
     ///@note fungsi digunakan input data
     ///@attention   
   function Input_Data($data,$table){//untuk input data
      $this->db->insert($table,$data);   //menampilkan data sudah input
   }

      ///@see insert batch
     ///@note fungsi digunakan mengisi data secara auto
     ///@attention
   public function insert_batch($table,$data) 
   {
    $this->db->insert_batch($table, $data); //untuk insert batch
    return $this->db->affected_rows(); //untuk menampilkan table batch
   }

    ///@see get update data
     ///@note fungsi digunakan mengupdate data
     ///@attention
   function Update_Data($where,$data,$table){ 
      $this->db->where($where); //untuk update data 
      $this->db->update($table,$data); //untuk menampilkan sudah update 
   }
      
       ///@see delete data
     ///@note fungsi digunakan menghapus data
     ///@attention
   function Delete_Data($where,$table){
      $this->db->where($where);//untuk delete data
      $this->db->delete($table);//untuk menampilkan data sudah didelete
   }

      //@see get where
    ///@note fungsi digunakan untuk mencari data 
    ///@attention 
   function Get_Where($where,$table){      
    return $this->db->get_where($table, $where);//untuk mencari get where
   }

      //@see ajax gethydrid
    ///@note fungsi digunakan untuk auto increnete 
    ///@attention nomor increnete sudah diinput otomatis akan terganti jadi tidak bisa diubah
   function ajax_getbyhdrid($hdrid,$table){     
      return $this->db->get_where($table, array('hdrid' => $hdrid));//untuk menampilkan nomor secara auto increnete   
   } 

//    function Get_central_user(){     

//     $DB2 = $this->load->database('db_central_user', TRUE);   // Database central user   
//     $result = $DB2->get('Tb_user_login')->result();               // Untuk mengeksekusi dan mengambil data hasil query
//     $DB2->Close();
//     return $result;

//    }

//    function Get_departement(){     

//     $DB2 = $this->load->database('db_central_user', TRUE);   // Database central user   
//     $result = $DB2->get('tb_Department')->result();               // Untuk mengeksekusi dan mengambil data hasil query
//     $DB2->Close();
//     return $result;

//    }

   //@see send mail
    ///@note fungsi digunakan untuk mengirim email
    ///@attention 
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
     FROM department_approver
     where hdrid='WTR2010009' and level_approve=(select min(level_approve) from department_approver where hdrid='WTR2010009' and date_approve is null)");

      // jika ketemu
   if ($query->num_rows()>0) {
      $query=$query->rows();

      // Update progress waiting approve
       $where = array('hdrid' => $query->hdrid); 
       $data = array('progress_approver' =>'Waiting approved '.$query->name_approver);       
       $this->db->where($where);
       $this->db->update('department_approver',$data);

      // Kirim email request to approve
      $this->db->query("CALL sp_send_mail @hdrid='$query->hdrid',@nik='$query->nik_approver',@name='$query->name_approver',@email='widodo.a5v@ap.denso.com',@EmailSubject='Waiting Approver Wire transfer No ',@Email_body_content='You need approver'");
    
    }else{

     // Update progress finish approve
     $where = array('hdrid' => $query->hdrid); 
     $data = array('progress_approver' =>'Finish Approved'); 
     $this->db->where($where);
     $this->db->update('department_approver',$data);
    
     // Kirim email notifikasi finish aprove
     $this->db->query("exec sp_send_mail @hdrid='123',@nik='DM1902060',@name='Widodo',@email='widodo.a5v@ap.denso.com',@EmailSubject='Finish Approver Wire transfer No ',@Email_body_content='You need approver'");
   
    }
    
   }

      //@see send mail reject
    ///@note fungsi digunakan untuk reject email
    ///@attention
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
   public function Tampil_pcn()
   {
    $query =  $this->db->get('tb_pcn')->result();
    return $query;
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

    public function update_received($hdrid) {
        $data = array(
            'approval' => 'process'
        );
        $this->db->where('hdrid',$hdrid);
        $this->db->update('tb_QCR', $data); // update status received pada example_table
    }

    public function update_sendback($hdrid) {
        $data = array(
            'approval' => 'sendback'
        );
        $this->db->where('hdrid',$hdrid);
        $this->db->update('tb_QCR', $data); // update status sendback pada example_table
    }
}




<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mail extends CI_Model {


   /// @see Update_Data()
   /// @note Update table dengan data,table,kondisi sesuai isi parameter
   /// @attention Update table
    function Update_Data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    ///@see get where
    ///@note fungsi digunakan untuk dimana data tersebut untuk data cari di database
    ///@attention
    function Get_Where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    
    ///@see input Update_stat()
    ///@note fungsi digunakan untuk update status agar muncul di application response
    ///@attention
    function Update_stat($problem_id,$date)
    {
        $query=$this->db->query("select stat from tb_approval where problem_id='$problem_id' and position_name='Approved Proc' and stat='Approved'");
       
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

    ///@see cari_tb_approver
    ///@note fungsi digunakan untuk mencari 1 next apporver
    ///@attention
    function cari_tb_approver2($hdrid,$poscode)
    {

      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and date_approve is null and position_code='$poscode'");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('nik'=>'not found','name'=>'All','office_email'=>'not found','position_code'=>'not found');
          return $query;
      }

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

    /// @see cari_responden()
    /// @note Mencari semua list responden
    /// @attention Mencari responden berdasarkan pcn number
    public function cari_responden($pcn_number)
    {
     $query=$this->db->query("select * from fn_view_send_mail('$pcn_number')");
     return $query;
    }

    public function cari_name($pcn_number)
    {
     $query=$this->db->query("select * from tb_application where pcn_number='$pcn_number'");
     return $query;
    }

    /// @see insert_isir()
    /// @note Insert data isir
    /// @attention Memasukkan data t1-t10 isir 
    function insert_isir($hdrid,$nik)
    {   

        $add=1;
        for ($x = 0; $x <= 8; $x+=1) {

            $query = $this->db->query("
            INSERT INTO tb_isir
                (
                hdrid
                ,transaction_date
                ,no_isir
                ,pic_pro
                ,pro_name
                ,pro_email
                ,pic_qc
                ,qc_name
                ,qc_email
                ,cc_to1
                ,cc_to2
                ) 
                values 
                (
                    '$hdrid'
                    ,getdate()
                    ,'T0$add'
                    ,'$nik'
                    ,(select top 1 name_superiorprocurement from tb_superiorprocurement)
                    ,(select top 1 email_superiorprocurement from tb_superiorprocurement)
                    ,'DM1901091'
                    ,'Tri Wahyuni'
                    ,'tri.wahyuni.a0c@ap.denso.com'
                    ,'DM1901004'
                    ,'DM1901762'
                )
            ");
            $add++;
            }

        $query2 = $this->db->query("
            INSERT INTO tb_isir_list
                (
                hdrid
                ,transaction_date
                ,status
                ,pic_pro
                ,status_isir
                ) 
                values 
                (
                    '$hdrid'
                    ,getdate()
                    ,'On Progress T1'
                    ,'$nik'
                    ,'Open'
                )
            ");
        }



}







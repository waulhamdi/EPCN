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

    
    ///@see input Update_stat()
    ///@note fungsi digunakan untuk update status agar muncul di application response
    ///@attention
    function Update_stat($problem_id,$date)
    {
        $query=$this->db->query("select stat from tb_approval where problem_id='$problem_id' and position_code=3 and stat='Approved'");
       
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

      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and date_approve is null order by position_code asc");
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



}







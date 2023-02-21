<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_print_tooling extends CI_Model
{

      ///@see ajax_getbyhdrid()
     ///@note fungsi untuk code hdrid ditarik ke web
     ///@attention
   function ajax_getbyhdrid($hdrid, $table)
   {
      return $this->db->get_where($table, array('hdrid' => $hdrid));
   }

      ///@see ajax_getbyproblemid()
     ///@note fungsi untuk ambil data problem_id
     ///@attention
   function ajax_getbyproblemid($app, $table)
   {

      return $this->db->get_where($table, array('problem_id' => $app));
   }


      ///@see getApproval()
     ///@note fungsi untuk approval
     ///@attention
   public function getApproval($problem_id)
   {
      $this->db->where('problem_id', $problem_id);
      $query = $this->db->get('tb_approval');
      $result = $query->result();
      return $result;

   }

   
   /// @see gettooling
   /// @note
   /// @attention
   public function gettooling($hdrid)
   {
      $this->db->where('hdrid', $hdrid);
      $query = $this->db->get('tb_tooling2');
      $result = $query->result();
      return $result;

   }


   
      ///@see getVar1()
     ///@note fungsi cari variable
     ///@attention
   public function getVar1($table, $app)
   {
      return $this->db->get_where($table, array('problem_name' => $app));
   }

   
      ///@see getname_approver()
     ///@note fungsi untuk mencari nama yang sudah approver
     ///@attention
   public function getname_aprover($hdrid)
   {
       
      // $query = $this->db->query("select top 1 problem_name from tb_input_problem where hdrid='$hdrid' and problem_name='internal' ");

      // if ($query->num_rows() > 0) {    

      //     $query = $this->db->query("Select top 1 name from tb_approval where problem_id='$hdrid' and position_name='Responsible Approver 2' ");
      //     return $query->row();

      // }else{

      //     $query = $this->db->query("Select top 1 name from tb_approval where problem_id='$hdrid' and position_name='Inisiator Approver' ");
      //     return $query->row();

      // }

       $query = $this->db->query("select top 1 name from tb_approval where problem_id='$hdrid' and position_code='2' ");
       return $query->row();
      
   }

   
      ///@see cari_tb_approver()
     ///@note fungsi untuk mencari table cari_tb_approver
     ///@attention
   function cari_tb_approver($hdrid)
   {

      $query = $this->db->query("select top 1 * from tb_approvalPCN2 where pcn_number='$hdrid' and file='$file' and date_approve is null order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->row();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }

   }
    


   
}

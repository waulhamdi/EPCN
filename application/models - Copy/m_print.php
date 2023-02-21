<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_print extends CI_Model
{

   function ajax_getbyhdrid($hdrid, $table)
   {
      return $this->db->get_where($table, array('hdrid' => $hdrid));
   }


   function ajax_getbyproblemid($app, $table)
   {

      return $this->db->get_where($table, array('problem_id' => $app));
   }



   public function getApproval($problem_id)
   {
      $this->db->where('problem_id', $problem_id);
      $query = $this->db->get('tb_approval');
      $result = $query->result();
      return $result;

   }

   public function getVar1($table, $app)
   {
      return $this->db->get_where($table, array('problem_name' => $app));
   }

   function cari_tb_approver($hdrid)
    {

      $query = $this->db->query("select top 1 * from tb_approval where problem_id='$hdrid' and date_approve is null order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->row();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }

    }
    


   
}

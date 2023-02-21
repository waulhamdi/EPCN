<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_userrequest extends CI_Model {
   
   public function Tampil_Data()
   {
      return $this->db->get('tb_device_bring_out');
   }

   public function Tampil_Data_Details($classID=NUll)
   {
      $Query=$this->db->get_where('tb_class',array('kodeclass'=>$classID))->row();
      return  $Query;
   }
     
   function Input_Data($data,$table){
      $this->db->insert($table,$data);
   }

   function Delete_class($where,$table){
      $this->db->where($where);
      $this->db->delete($table);
   }

   function Edit_class($where,$table){
      return $this->db->get_where($table,$where);      
   }

   function Update_class($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
   }

   public function Search_class($search,$table)
   {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->like('kodeclass',$search);
      $this->db->or_like('namaclass',$search);     
      return $this->db->get()->result(); 
      
   }
   
}




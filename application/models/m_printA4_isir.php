<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_printA4_isir extends CI_Model
{

      ///@see ajax_getbyhdrid()
     ///@note fungsi untuk code hdrid ditarik ke web
     ///@attention
   public function ajax_getbyhdrid($hdrid, $table)
   {
      return $this->db->get_where($table, array('hdrid' => $hdrid));
   }

   ///@see ajax_getTbIsir()
   ///@note fungsi untuk code hdrid ditarik ke web
   ///@attention ambil data dari tb_isir
   function ajax_getTbIsir($hdrid){
      $query = $this->db->query("select * from tb_isir where hdrid='$hdrid' order by no_isir asc");
      if ($query->num_rows() > 0) {
         return $query->result();
     }else{
         $query = (object) array('no_isir'=>'not found');
         return $query;
     }
   }

   ///@see ajax_getbyhdrid()
   ///@note fungsi untuk menarik data berdasarkan no dokumen ke web
   ///@attention
   public function ajax_getbyno_dokumen($no_dokumen, $table)
   {
      return $this->db->get_where($table, array('no_dokumen' => $no_dokumen));
   }

      ///@see ajax_getbyhdrid()
     ///@note fungsi untuk code hdrid ditarik ke web
     ///@attention
     public function ajax_getbypcn_number($hdrid, $table)
     {
        return $this->db->get_where($table, array('pcn_number' => $hdrid));
     }

   //    ///@see ajax_getbyproblemid()
   //   ///@note fungsi untuk ambil data problem_id
   //   ///@attention
   // public function ajax_getbyproblemid($app, $table){
   //  return $this->db->get_where($table, array('problem_id' => $app));
   //  }


      ///@see getApproval()
     ///@note fungsi untuk approval
     ///@attention
   public function getApproval($hdrid)
   {
      $this->db->where('problem_id', $hdrid);
      $query = $this->db->get('tb_approval');
      $result = $query->result();
      return $result;

   }

   
   /// @see getPCN()
   /// @note
   /// @attention
   public function getPCN($hdrid)
   {
      $this->db->where('hdrid', $hdrid);
      $query = $this->db->get('tb_PCN');
      $result = $query->result();
      return $result;

   }

   function getListProc($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name like 'Procurement-Check%' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }
   
   function getListQA($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name like 'QA-Check%' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }
   
   function getListFinal($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name like 'QA-Final%' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }
   
   function getFinalApprove($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_code >='10' and date_approve is not null order by position_code desc");
      if ($query->num_rows() > 0) {
          return $query->row();
      }else{
          $query = (object) array('stat'=>'unapprove','reason'=>'','date_approve'=>'');
          return $query;
      }
   }

   ///@see Update_Data()
   ///@note proses update data
   ///@attention update data kedalam table
   function Update_Data($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
   }
   
      ///@see getVar1()
     ///@note fungsi cari variable
     ///@attention
//    public function getVar1($table, $app)
//    {
//       return $this->db->get_where($table, array('problem_name' => $app));
//    }

   
      ///@see getname_approver()
     ///@note fungsi untuk mencari nama yang sudah approver
     ///@attention
//    public function getname_aprover($hdrid)
//    {
       
//       $query = $this->db->query("select top 1 problem_name from tb_input_problem where hdrid='$hdrid' and problem_name='internal' ");

//       if ($query->num_rows() > 0) {    

//           $query = $this->db->query("Select top 1 name from tb_approval where problem_id='$hdrid' and position_name='Responsible Approver 2' ");
//           return $query->row();

//       }else{

//           $query = $this->db->query("Select top 1 name from tb_approval where problem_id='$hdrid' and position_name='Inisiator Approver' ");
//           return $query->row();

//       }

//        $query = $this->db->query("select top 1 name from tb_approval where problem_id='$hdrid' and position_code='1' ");
//        return $query->row();
      
//    }

   
      ///@see cari_tb_approver()
     ///@note fungsi untuk mencari table cari_tb_approver
     ///@attention
   function cari_tb_approver($hdrid)
   {

      //Approval patokan
      $query = $this->db->query("select top 1 * from tb_approval where problem_id='$hdrid' and stat like '%unapprove%' order by position_code asc");
      if ($query->num_rows() > 0) {
         $hasil = $query->row();
         
         $approval = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_code = '" . $hasil->position_code . "'")->result();

         $hasil->name = "(";
         $hasil->nik = "(";

         foreach($approval as $key=>$app){
            if($key == 0){
               $hasil->name = $hasil->name . $app->name; 
               $hasil->nik = $hasil->nik . $app->nik; 
            }else{
               $hasil->name = $hasil->name . ", " . $app->name; 
               $hasil->nik = $hasil->nik . ", " . $app->nik; 
            }
         }

         $hasil->name = $hasil->name . ")";
         $hasil->nik = $hasil->nik . ")";
          return $hasil;
      }else{
         $query = $this->db->query("select * from tb_PCNlist where no_dokumen='$hdrid'")->row();
         $query = (object) array('name'=>'not found','status'=>$query->status,'position_code'=>'not found','nik'=>'not found');
         return $query;
      }

   }

   // function get_proggress()
   // {
   //    return $this->db->get('tb_approval')->result();
   // }

   
}

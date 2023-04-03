<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_printDummy extends CI_Model
{

   ///@see ajax_getbyhdrid()
   ///@note fungsi untuk code hdrid ditarik ke web
   ///@attention get by hdrid 
   public function ajax_getbyhdrid($hdrid, $table)
   {
      return $this->db->get_where($table, array('hdrid' => $hdrid));
   }

   ///@see ajax_getbyproblem_id()
   ///@note fungsi untuk code problem_id ditarik ke web
   ///@attention get by problem_id (hdrid)
   public function ajax_getbyproblem_id($problem_id, $table)
   {
      return $this->db->get_where($table, array('problem_id' => $problem_id));
   }

   ///@see ajax_getbyno_dokumen()
   ///@note fungsi untuk menarik data berdasarkan no dokumen ke web
   ///@attention get by no_document (hdrid)
   public function ajax_getbyno_dokumen($no_dokumen, $table)
   {
      return $this->db->get_where($table, array('no_dokumen' => $no_dokumen));
   }
   
   ///@see ajax_getQCR()
   ///@note fungsi untuk menarik data berdasarkan no dokumen ke web
   ///@attention get by no_document dari kolom reason table QCR
   public function ajax_getQCR($no_dokumen, $table)
   {
      $Query = $this->db->get_where($table, array('reason' => $no_dokumen));
      if ($Query->num_rows() > 0) {
         return $Query->row();
      }else{
         $Query = (object) array('status'=>'not found');
         return $Query;
      }
   }

   ///@see ajax_getbypcn_number()
   ///@note fungsi untuk code hdrid ditarik ke web
   ///@attention get data hdrid dari kolom pcn_number tb_application_response
     public function ajax_getbypcn_number($hdrid, $table)
     {
        return $this->db->get_where($table, array('pcn_number' => $hdrid));
     }
    
     ///@see Get_Where()
     ///@note get table with condition
     ///@attention get data hdrid dari  tb_isir_list
     public function Get_Where($condition, $table)
     {
        $query=$this->db->get_where($table,$condition);
         if ($query->num_rows() > 0) {
            return $query->row();
         }else{
            $query = (object) array('status_isir'=>'not found');
            return $query;
         }
     }

   ///@see ajax_getbyproblemid()
   ///@note fungsi untuk ambil data problem_id
   ///@attention
   // public function ajax_getbyproblemid($app, $table){
   //  return $this->db->get_where($table, array('problem_id' => $app));
   //  }


   ///@see getApproval()
   ///@note fungsi untuk approval
   ///@attention get data hdrid dari kolom problem_id tb_approval
   public function getApproval($hdrid)
   {
      $this->db->where('problem_id', $hdrid);
      $query = $this->db->get('tb_approval');
      $result = $query->result();
      return $result;

   }

   
   /// @see getPCN()
   /// @note 
   /// @attention get data hdrid dari kolom problem_id tb_approval
   // public function getPCN($hdrid)
   // {
   //    $this->db->where('hdrid', $hdrid);
   //    $query = $this->db->get('tb_PCN');
   //    $result = $query->result();
   //    return $result;
   // }

   /// @see ajax_getTbIsir()
   /// @note get all data tb_isir
   /// @attention get data hdrid dari kolom problem_id tb_isir
   function ajax_getTbIsir($hdrid){
      $query = $this->db->query("select * from tb_isir where hdrid='$hdrid' order by no_isir asc");
      if ($query->num_rows() > 0) {
         return $query->result();
     }else{
         $query = (object) array('no_isir'=>'not found');
         return $query;
     }
   }

   // function ajax_getStatusIsir($hdrid)
   // {
   //    $query = $this->db->query("select status from tb_isir where hdrid='$hdrid'");
   //    if ($query->num_rows() > 0) {
   //        foreach ($query->result() as $status){
   //          $status_isir = $status->status;
   //        }
   //        return $status_isir;
   //    }else{
   //        return "";
   //    }
   // }

   /// @see getListWrittenProc()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name written proc
   function getListWrittenProc($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Written Proc' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found','date_approve'=>'');
          return $query;
      }
   }

   /// @see getListCheckedProc()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Checked Proc
   function getListCheckedProc($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Checked Proc' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }

   /// @see getListChecked2Proc()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Checked 2 Proc
   function getListChecked2Proc($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Checked 2 Proc' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }

   /// @see getListApproveProc()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Approved Proc
   function getListApproveProc($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Approved Proc' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }
   
   /// @see getListWrittenQA()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Written QA
   function getListWrittenQA($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Written QA' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found','date_approve'=>'');
          return $query;
      }
   }
   
   /// @see getListCheckedQA()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Checked QA
   function getListCheckedQA($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Checked QA' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }

   /// @see getListApproveQA()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Approved QA
   function getListApproveQA($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Approved QA' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }

   /// @see getListFinalCheckedProc()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Checked Proc Final
   function getListFinalCheckedProc($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Checked Proc Final' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }
   
   /// @see getListFinalCheckedProc()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Checked 2 Proc Final
   function getListFinalChecked2Proc($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Checked 2 Proc Final' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found');
          return $query;
      }
   }

   /// @see getListFinalApproveProc()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Approved Proc Final
   function getListFinalApproveProc($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Approved Proc Final' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found');
          return $query;
      }
   }
   
   /// @see getListFinalWrittenQA()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Written QA Final
   function getListFinalWrittenQA($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Written QA Final' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }

   /// @see getListFinalCheckedQA()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Checked QA Final
   function getListFinalCheckedQA($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Checked QA Final' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }

   /// @see getListFinalCheckedQA()
   /// @note get data berdasarkan hdrid dari tb_approval
   /// @attention approver dengan position name Approved QA Final
   function getListFinalApproveQA($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_name = 'Approved QA Final' order by position_code asc");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          $query = (object) array('name'=>'not found','position_code'=>'not found','nik'=>'not found');
          return $query;
      }
   }
   
   /// @see getFinalApprove()
   /// @note kondisi ini untuk ceklis checkbox pada final A4
   /// @attention approver dengan position code => 10
   function getFinalApprove($hdrid)
   {
      $query = $this->db->query("select * from tb_approval where problem_id='$hdrid' and position_code ='8' and date_approve is not null order by position_code desc");
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
         $query = (object) array('name'=>'not found','status'=>$query->status,'position_code'=>'not found','nik'=>'not found','position_name'=>'not found');
         return $query;
      }

   }

   // function get_proggress()
   // {
   //    return $this->db->get('tb_approval')->result();
   // }

   
}

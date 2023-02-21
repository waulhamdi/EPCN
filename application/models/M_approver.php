<?php
class M_approver extends CI_Model{
 
    public function Tampil_Data()
    {

            $this->db->select("f.namadepartment,pic,kode_cip,namainvesmentclass,project_name,namacostclasification,namaclass,namapriority,cost_mrp,current_kondisi,status");
            $this->db->from('tb_plan as a');
            $this->db->join('tb_invesmentclass as b', 'a.kode_invesment_class=b.kodeinvesmentclass','LEFT');
            $this->db->join('tb_costclasification as c', 'a.kode_cost_clasification=c.kodecostclasification','LEFT');
            $this->db->join('tb_class as d', 'a.kode_class=d.kodeclass','LEFT');
            $this->db->join('tb_priority as e', 'a.priority=e.kodepriority','LEFT');
            $this->db->join('tb_department as f', 'a.kode_department=f.kodedepartment','LEFT');
            $this->db->where('kode_cip', 'XXX');
            $this->db->limit(1);
            return $this->db->get();      
            
    }

    public function Search_plan($search,$table)
    {
        
        $this->db->select("f.namadepartment,pic,g.username,kode_cip,namainvesmentclass,project_name,namacostclasification,namaclass,namapriority,cost_mrp,current_kondisi,status");
        $this->db->from('tb_plan as a');
        $this->db->join('tb_invesmentclass as b', 'a.kode_invesment_class=b.kodeinvesmentclass','LEFT');
        $this->db->join('tb_costclasification as c', 'a.kode_cost_clasification=c.kodecostclasification','LEFT');
        $this->db->join('tb_class as d', 'a.kode_class=d.kodeclass','LEFT');
        $this->db->join('tb_priority as e', 'a.priority=e.kodepriority','LEFT');
        $this->db->join('tb_department as f', 'a.kode_department=f.kodedepartment','LEFT');
        $this->db->join('tb_userplanner as g', 'a.pic=g.nopegawai','LEFT');
        
        $this->db->like('pic',$search); 
        $this->db->or_like('f.namadepartment',$search);       
        $this->db->or_like('a.kode_cip',$search); 
        $this->db->or_like('namainvesmentclass',$search); 
        $this->db->or_like('project_name',$search); 
        $this->db->or_like('namacostclasification',$search); 
        $this->db->or_like('namaclass',$search);         
        $this->db->or_like('M_approver_po',$search); 
        $this->db->or_like('fiscal_year',$search); 
        $this->db->or_like('g.username',$search); 


        if($search==""){ 
        $this->db->limit(100);    
        }
            
        return $this->db->get()->result(); 
        
    }


    public function m_plandetails($kode_cip)
    {

            $this->db->select("kode_cip,kode_item_process,namaItemprocess,M_approver_plan,M_approver_actual,status,keterangan,active");
            $this->db->from('tb_plan_dtl as a');
            $this->db->join('tb_itemprocess as b', 'a.kode_item_process=b.kodeItemprocess','LEFT');
            $this->db->where('kode_cip', $kode_cip);
            $this->db->order_by('kode_item_process','ASC');

            return $this->db->get();      
            
    }
    
    function product_list(){
        $hasil=$this->db->get('product');
        return $hasil->result();
    }
 
    function save_product(){

        $data = array(
                
                'kode_cip'=> $this->input->post('kode_cip'), 
                'kode_department'=> $this->input->post('kode_department'), 
                'pic'=> $this->input->post('pic'), 
                'machine_condition'=> $this->input->post('machine_condition'), 
                'kode_invesment_class'=> $this->input->post('kode_invesment_class'), 
                'kodeproduct'=> $this->input->post('kodeproduct'), 
                'project_name'=> $this->input->post('project_name'), 
                'kode_cost_clasification'=> $this->input->post('kode_cost_clasification'), 
                'kode_class'=> $this->input->post('kode_class'), 
                'kodeunit'=> $this->input->post('kodeunit'), 
                'order_to'=> $this->input->post('order_to'), 
                'priority'=> $this->input->post('priority'), 
                'cost_mrp'=> $this->input->post('cost_mrp'), 
                'actual_cost_mrp'=> $this->input->post('actual_cost_mrp'), 
                'ninku_mh'=> $this->input->post('ninku_mh'), 
               
            );
            
        $result=$this->db->insert('tb_plan',$data);
        return $result;
    }

    function upM_approver_data(){

        $kode_cip=$this->input->post('kode_cip');
        $kode_department=$this->input->post('kode_department');
        $pic=$this->input->post('pic');
        $machine_condition=$this->input->post('machine_condition');
        $kode_invesment_class=$this->input->post('kode_invesment_class');
        $kodeproduct=$this->input->post('kodeproduct');
        $project_name=$this->input->post('project_name');
        $kode_cost_clasification=$this->input->post('kode_cost_clasification');
        $kode_class=$this->input->post('kode_class');
        $kodeunit=$this->input->post('kodeunit');
        $order_to=$this->input->post('order_to');
        $priority=$this->input->post('priority');
        $cost_mrp=$this->input->post('cost_mrp');
        $actual_cost_mrp=$this->input->post('actual_cost_mrp');
        $ninku_mh=$this->input->post('ninku_mh');
       
        $this->db->set('kode_department', $kode_department);
        $this->db->set('pic', $pic);
        $this->db->set('machine_condition', $machine_condition);
        $this->db->set('kode_invesment_class', $kode_invesment_class);
        $this->db->set('kodeproduct', $kodeproduct);
        $this->db->set('project_name', $project_name);
        $this->db->set('kode_cost_clasification', $kode_cost_clasification);
        $this->db->set('kode_class', $kode_class);
        $this->db->set('kodeunit', $kodeunit);
        $this->db->set('order_to', $order_to);
        $this->db->set('priority', $priority);
        $this->db->set('cost_mrp', $cost_mrp);
        $this->db->set('actual_cost_mrp', $actual_cost_mrp);
        $this->db->set('ninku_mh', $ninku_mh);

        $this->db->where('kode_cip', $kode_cip);
        $result=$this->db->upM_approver('tb_plan');
        return $result;

    }

    function upM_approver_actual_cost_mrp(){

        $hdrid=$this->input->post('hdrid');       
        $actual_cost_mrp=$this->input->post('actual_cost_mrp');        
        $this->db->set('actual_cost_mrp', $actual_cost_mrp);
        $this->db->where('hdrid', $hdrid);
        $result=$this->db->upM_approver('tb_plan');
        return $result;

    }

    function save_details(){

        $data = array(
              
                'kode_cip'=> $this->input->post('kode_cip'), 
                'kode_item_process'=> $this->input->post('kode_item_process'), 
                'M_approver_plan'=> $this->input->post('M_approver_plan'), 
                'active'=> $this->input->post('active'), 
                               
            );

        $result=$this->db->insert('tb_plan_dtl',$data);
        return $result;
    }
 
    function upM_approver_details(){
               
        $kode_cip=$this->input->post('kode_cip');
        $kode_item_process=$this->input->post('kode_item_process');
        $M_approver_plan=$this->input->post('M_approver_plan');
        $active=$this->input->post('active');

       /* $this->db->set('kode_cip', $kode_cip);
        $this->db->set('kode_item_process',$kode_item_process);*/

        $this->db->set('M_approver_plan', $M_approver_plan);
        $this->db->set('active', $active);
        $this->db->where('kode_cip', $kode_cip);
        $this->db->where('kode_item_process', $kode_item_process);

        $result=$this->db->upM_approver('tb_plan_dtl');
        return $result;

    }


    function upM_approver_data_(){
        
        $product_code=$this->input->post('product_code');
        $product_name=$this->input->post('product_name');
        $product_price=$this->input->post('price');
 
        $this->db->set('product_name', $product_name);
        $this->db->set('product_price', $product_price);
        $this->db->where('product_code', $product_code);
        $result=$this->db->upM_approver('product');
        return $result;

    }
 
    function delete_data(){

        $kode_cip=$this->input->post('kode_cip');
        $this->db->where('kode_cip', $kode_cip);
        $result=$this->db->delete('tb_plan');
        return $result;

    }


    function upM_approver_data_ef($where,$data,$table){
        
        $this->db->where($where);
      $this->db->upM_approver($table,$data);

    }

    function Update_Data($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);

   }

    function Update_Data_Approve($data){
        //mengambil seluruh approval dengan problem code dan hdrid yang sama
        $approval = $this->db->query("select * from tb_approval where problem_id = '" . $data['problem_id'] ."' and position_code = '" . $data['position'] . "'")->result();
        
        //melakukan update data approval dengan problem code dan hdrid yang sama
        foreach($approval as $key=>$app){
            $where = array('trxid' => $app->trxid);
            $this->db->where($where);
            
            $data2 = array(
                'position_name' => $data['position_name'],
                'date_approve' => $data['date_approve'],
                'stat' => 'approved' 
            );
            $this->db->update('tb_approval',$data2);
            
        }

        // mencari next approval
        $approval2 = $this->db->query("select TOP 1 * from tb_approval where stat='unapprove' order by position_code asc");
        if ($approval2->num_rows()>0) {
            $status_transaction = "DONE";
        }else{
            $approval2=$approval2->row();

            $next_position_code = $approval2->position_code;
            
            $approval2 = $this->db->query("select * from tb_approval where position_code ='" . $next_position_code . "'")->result();
            
            $name = "(";
            foreach($approval2 as $key=>$app){
                if($key == 0){
                    $name = $name . $app->name; 
                }else{
                    $name = $name . "/ " . $app->name; 
                }
            }
            $name = $name . ")";
            $status_transaction = "Need approval by ".$name." (".$approva2l[0]->position_name." )";
        }
        
        return  $status_transaction;
        
        

        
        if($data['position'] < 7){
            $status = "Not Yet Temporary Approval";
        }else{
            $status = "Temporary Applroval";
        }
        
        if($data['position'] == 1 ){
            $data3 = array(
                'status' => $status,
                'current_flow_pic' => $name,
                'pic_proc' => $data['name'],
                'registered' => $data['date_approve']
            );
        }else if ($data['position'] == 4){
            $data3 = array(
                'status' => $status,
                'current_flow_pic' => $name,
                'pic_qa' => $data['name']
            );
        }else{
            $data3 = array(
                'status' => $status,
                'current_flow_pic' => $name
            );
        }

        $where = array('no_dokumen' => $data['problem_id']);
        $this->M_approver->Update_Data($where, $data3, 'tb_PCNlist');
        
    }
    
        // $this->db->where($where);
        // $sql="SELECT TOP 1 * FROM tb_approval WHERE problem_id ='$hdrid' AND date_approve IS NULL order by  position_code asc";
        // $this->db->update($table,$data);
        
        // $query = $this->db->query($sql);
        // if ($query->num_rows()>0) {
        //     $query=$query->row();

            

        //     $this->db->query("Update tb_input_problem SET status_transaction =' $status_transaction' where hdrid='$hdrid' ");

        // }else{
        //     $status_transaction="Done";
        //     $this->db->query("Update tb_input_problem SET status_transaction ='Done' where hdrid='$hdrid' ");
        // }
        
        // // $data['status_transaction']=$status_transaction;


   function Update_Data_Approve_ver2($where,$data,$table,$hdrid){

        $this->db->where($where);
        $this->db->update($table,$data);

        $this->db->query("Update tb_input_problem set status_transaction=isnull((select top 1 (case 
            when position_code=1 then 'Waiting ' + name +  ' (' + position_name + ')'
            when position_code=2 then 'Need approve by ' + name +  ' (' + position_name + ')'
            when position_code=3 then 'Need respon by ' + name +  ' (' + position_name + ')'
            when position_code=4 then 'Need approve by ' + name +  ' (' + position_name + ')'
            when position_code=5 then 'Need approve by ' + name +  ' (' + position_name + ')'
            when position_code=6 then 'Need review by ' + name +  ' (' + position_name + ')'
            when position_code=7 then 'Need review by ' + name +  ' (' + position_name + ')'
            else 'Done'
            end) as status_transaction 
            from tb_approval where problem_id='$hdrid' and date_approve is null),'Done') where hdrid ='$hdrid'");
 
            // $data['status_transaction']=$status_transaction;

            $sql="SELECT TOP 1 status_transaction FROM tb_input_problem WHERE hdrid ='$hdrid' ";
            $query = $this->db->query($sql);
            if ($query->num_rows()>0) {
                $query=$query->row();           
                $status_transaction= $query->status_transaction;
            }else{
                $status_transaction="_";
            }

           return  $status_transaction;

   }

    function ajax_find_responsible($problem_id){

        $sql="SELECT TOP 1 nik FROM tb_approval WHERE problem_id ='$problem_id' AND date_approve IS NULL and (position_code='3' or position_code='4') order by  position_code asc";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0) {
            $query=$query->row();
            $status_transaction=$query->nik;
        }else{
            $status_transaction="Done";
        }        
        return  $status_transaction;

   }

   function ajax_find_approver($problem_id){

        //$sql="SELECT TOP 1 nik,position_code FROM tb_approval WHERE problem_id ='$problem_id' AND date_approve IS NULL and (position_code='2' or position_code='3' or position_code='4' or position_code='5' or position_code='6' or position_code='7') order by  position_code asc";
        $sql="SELECT TOP 1 nik,position_code FROM tb_approval WHERE problem_id ='$problem_id' AND date_approve IS NULL and position_code<>'1' order by  position_code asc";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0) {
            $query=$query->row();
            $status_transaction=$query->nik."#".$query->position_code;
        }else{
            $status_transaction="Done"."#"."Done";
        }        
        return  $status_transaction;

   }


    function reject_Data_Approve($hdrid){

        $sql="SELECT TOP 1 position_code FROM tb_approval WHERE problem_id ='$hdrid' AND date_approve IS NULL order by  position_code asc";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0) {
            $query=$query->row();
            if ($query->position_code<4){ // Jika direject oleh approver inisiator dan responsible maka lari ke draft
                 $this->db->query("Update tb_input_problem SET draft ='Draft' where hdrid='$hdrid'");
                 $this->db->query("Update tb_approval SET date_approve=NULL where problem_id='$hdrid' and position_code>1");
            }else{ //  Lari kembali ke responsible
                 $this->db->query("Update tb_approval SET date_approve=NULL where problem_id='$hdrid' and position_code>2");
            }
            
        }

    }
    
}
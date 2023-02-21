<?php
class M_display extends CI_Model{


    public function Fiscal_Year()
    {
            
        $result = $this->db->get('tb_fiscalyear')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;

    }
 
    public function Tampil_Data($fiscalyear)
    {
                   
                $vdate=date("Y-m-d"); /* Tanggal sekarang */
           
                   /* $query = $this->db->query("SELECT PIC,username,Project_Name,vPlan,vAct,vPlanall 
                    FROM (select hdrid,sum(vPlan)vPlan,sum(vAct)vAct ,sum(vPlanall)vPlanall 
                    from (SELECT hdrid,case when date_plan < '$vdate' then 1 else 0 end as vPlan,
                    case when date_actual > '1900-01-01' then 1 else 0 end as vAct,case when date_plan > '1900-01-01' then 1 else 0 end as vPlanall 
                    from [EPlannerDB].[dbo].[tb_plan_dtl] 
                    where active='true'
                    group by hdrid,kode_item_process,date_plan,date_actual)A 
                    group by A.hdrid
                    )DS
                    left join [EPlannerDB].[dbo].[tb_plan] DW on DS.HDRID=DW.HDRID
                    left join [EPlannerDB].[dbo].tb_userplanner DY on DW.PIC=DY.nopegawai
                    where display_monitor='TRUE' and fiscal_year='$fiscalyear' "); */

                    $query = $this->db->query("Select username,project_name,plan_process,isnull(Act_process,'')Act_process,Plan_Berjalan,Aktual,Plan_All,date_plan,isnull(date_actual,'')date_actual from (Select A.hdrid,A.kode_item_process,namaItemprocess as plan_process,c.date_plan from (Select hdrid,Min(kode_item_process)kode_item_process from tb_plan_dtl
                    where date_plan >'$vdate'
                    group by hdrid)A
                    left join (select kodeItemprocess,namaItemprocess from [tb_itemprocess] )  B
                    on A.kode_item_process=B.kodeItemprocess
                    left join (select hdrid,kode_item_process,date_plan from tb_plan_dtl )  C
                    on A.hdrid=C.hdrid and A.kode_item_process=c.kode_item_process)A
                    left join 
                    (Select A.hdrid,A.kode_item_process,namaItemprocess as Act_process,c.date_actual from (Select hdrid,max(kode_item_process)kode_item_process from tb_plan_dtl
                    where date_actual >'1900-01-01'
                    group by hdrid)A
                    left join (select kodeItemprocess,namaItemprocess from [tb_itemprocess] )  B
                    on A.kode_item_process=B.kodeItemprocess
                    left join (select hdrid,kode_item_process,date_actual from tb_plan_dtl )  C
                    on A.hdrid=C.hdrid and A.kode_item_process=c.kode_item_process)B
                    on A.hdrid=b.hdrid 
                    left join 
                    (Select * from (Select hdrid,(sum(PB))Plan_Berjalan,Sum(PA)Plan_All,SUm(AA)Aktual from (select hdrid,
                    CASE
                        WHEN date_plan < '$vdate' and date_plan > '1900-07-01' THEN 1
                        ELSE 0
                    END as PB,
                    CASE
                        WHEN date_plan > '1900-07-01' THEN 1  
                        ELSE 0
                    END as PA,
                    CASE
                        WHEN date_actual> '1900-07-01' THEN 1 
                        ELSE 0
                    END as AA
                    from tb_plan_dtl)A
                    group by hdrid)vCount)C
                    on A.hdrid=C.hdrid 
                    left join tb_plan 
                    on A.hdrid=tb_plan.hdrid
                    left join tb_userplanner
                    on tb_plan.pic=tb_userplanner.nopegawai
                    where display_monitor='true' and  fiscal_year='$fiscalyear'
                    ");

            return $query;

                }

    public function Search_plan($search,$table)
        {
            
                $this->db->select("a.hdrid,f.namadepartment,pic,kode_cip,namainvesmentclass,project_name,namacostclasification,namaclass,namapriority,cost_mrp,current_kondisi,status");
                $this->db->from('tb_plan as a');
                $this->db->join('tb_invesmentclass as b', 'a.kode_invesment_class=b.kodeinvesmentclass','LEFT');
                $this->db->join('tb_costclasification as c', 'a.kode_cost_clasification=c.kodecostclasification','LEFT');
                $this->db->join('tb_class as d', 'a.kode_class=d.kodeclass','LEFT');
                $this->db->join('tb_priority as e', 'a.priority=e.kodepriority','LEFT');
                $this->db->join('tb_department as f', 'a.kode_department=f.kodedepartment','LEFT');
                $this->db->like('f.namadepartment',$search);
                $this->db->or_like('pic',$search); 
                $this->db->or_like('kode_cip',$search); 
                $this->db->or_like('namainvesmentclass',$search); 
                $this->db->or_like('project_name',$search); 
                $this->db->or_like('namacostclasification',$search); 
                $this->db->or_like('namaclass',$search); 

                if($search==""){ 
                $this->db->limit(100);    
                }
                    
                return $this->db->get()->result(); 
                
        }
    
    /* Tampil graphic invesment */
    public function Search_productivity($fiscalyear)
    {
        
                
                $query = $this->db->query("select *,
                        (apr+may)mei,(apr+may+jun)juni,(apr+may+jun+jul)juli,(apr+may+jun+jul+aug)agustus,(apr+may+jun+jul+aug+sep)september,(apr+may+jun+jul+aug+sep+oct)october,(apr+may+jun+jul+aug+sep+oct+nov)november,(apr+may+jun+jul+aug+sep+oct+nov+dec)december,(apr+may+jun+jul+aug+sep+oct+nov+dec+jan)january,(apr+may+jun+jul+aug+sep+oct+nov+dec+jan+feb)february,(apr+may+jun+jul+aug+sep+oct+nov+dec+jan+feb+mar)maret
                        ,(apract+mayact)meiact,(apract+mayact+junact)juniact,(apract+mayact+junact+julact)juliact,(apract+mayact+junact+julact+augact)agustusact,(apract+mayact+junact+julact+augact+sepact)septemberact,(apract+mayact+junact+julact+augact+sepact+octact)octoberact,(apract+mayact+junact+julact+augact+sepact+octact+novact)novemberact,(apract+mayact+junact+julact+augact+sepact+octact+novact+decact)decemberact,(apract+mayact+junact+julact+augact+sepact+octact+novact+decact+janact)januaryact,(apract+mayact+junact+julact+augact+sepact+octact+novact+decact+janact+febact)februaryact,(apract+mayact+junact+julact+augact+sepact+octact+novact+decact+janact+febact+maract)maretact
                        from (select 
                        sum(case when month(date_plan) = 4 then ninku_mh else 0 end) as apr,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 4 then ninku_mh else 0 end else 0 end) as apract,
                        sum(case when month(date_plan) = 5 then ninku_mh else 0 end) as may,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 5 then ninku_mh else 0 end else 0 end) as mayact,
                        sum(case when month(date_plan) = 6 then ninku_mh else 0 end) as jun,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 6 then ninku_mh else 0 end else 0 end) as junact,
                        sum(case when month(date_plan) = 7 then ninku_mh else 0 end) as jul,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 7 then ninku_mh else 0 end else 0 end) as julact,
                        sum(case when month(date_plan) = 8 then ninku_mh else 0 end) as aug,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 8 then ninku_mh else 0 end else 0 end) as augact,
                        sum(case when month(date_plan) = 9 then ninku_mh else 0 end) as sep,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 9 then ninku_mh else 0 end else 0 end) as sepact,
                        sum(case when month(date_plan) = 10 then ninku_mh else 0 end) as oct,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 10 then ninku_mh else 0 end else 0 end) as octact,
                        sum(case when month(date_plan) = 11 then ninku_mh else 0 end) as nov,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 11 then ninku_mh else 0 end else 0 end) as novact,
                        sum(case when month(date_plan) = 12 then ninku_mh else 0 end) as dec,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 12 then ninku_mh else 0 end else 0 end) as decact,
                        sum(case when month(date_plan) = 1 then ninku_mh else 0 end) as jan,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 1 then ninku_mh else 0 end else 0 end) as janact,
                        sum(case when month(date_plan) = 2 then ninku_mh else 0 end) as feb,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 2 then ninku_mh else 0 end else 0 end) as febact,
                        sum(case when month(date_plan) = 3 then ninku_mh else 0 end) as mar,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 3 then ninku_mh else 0 end else 0 end) as maract
                        from tb_plan_dtl
                        inner join tb_plan on tb_plan_dtl.hdrid=tb_plan.hdrid
                        where kode_item_process='25' and fiscal_year='$fiscalyear' )A
                        ");

        return $query;
                
    }

    /*  Tampil graphic productivity  */
    public function Search_investment($fiscalyear)
    {
                
               $query = $this->db->query("select *,
                        (apr+may)mei,(apr+may+jun)juni,(apr+may+jun+jul)juli,(apr+may+jun+jul+aug)agustus,(apr+may+jun+jul+aug+sep)september,(apr+may+jun+jul+aug+sep+oct)october,(apr+may+jun+jul+aug+sep+oct+nov)november,(apr+may+jun+jul+aug+sep+oct+nov+dec)december,(apr+may+jun+jul+aug+sep+oct+nov+dec+jan)january,(apr+may+jun+jul+aug+sep+oct+nov+dec+jan+feb)february,(apr+may+jun+jul+aug+sep+oct+nov+dec+jan+feb+mar)maret
                        ,(apract+mayact)meiact,(apract+mayact+junact)juniact,(apract+mayact+junact+julact)juliact,(apract+mayact+junact+julact+augact)agustusact,(apract+mayact+junact+julact+augact+sepact)septemberact,(apract+mayact+junact+julact+augact+sepact+octact)octoberact,(apract+mayact+junact+julact+augact+sepact+octact+novact)novemberact,(apract+mayact+junact+julact+augact+sepact+octact+novact+decact)decemberact,(apract+mayact+junact+julact+augact+sepact+octact+novact+decact+janact)januaryact,(apract+mayact+junact+julact+augact+sepact+octact+novact+decact+janact+febact)februaryact,(apract+mayact+junact+julact+augact+sepact+octact+novact+decact+janact+febact+maract)maretact
                        from (select 
                        sum(case when month(date_plan) = 4 then cost_mrp else 0 end) as apr,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 4 then cost_mrp else 0 end else 0 end) as apract,
                        sum(case when month(date_plan) = 5 then cost_mrp else 0 end) as may,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 5 then cost_mrp else 0 end else 0 end) as mayact,
                        sum(case when month(date_plan) = 6 then cost_mrp else 0 end) as jun,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 6 then cost_mrp else 0 end else 0 end) as junact,
                        sum(case when month(date_plan) = 7 then cost_mrp else 0 end) as jul,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 7 then cost_mrp else 0 end else 0 end) as julact,
                        sum(case when month(date_plan) = 8 then cost_mrp else 0 end) as aug,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 8 then cost_mrp else 0 end else 0 end) as augact,
                        sum(case when month(date_plan) = 9 then cost_mrp else 0 end) as sep,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 9 then cost_mrp else 0 end else 0 end) as sepact,
                        sum(case when month(date_plan) = 10 then cost_mrp else 0 end) as oct,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 10 then cost_mrp else 0 end else 0 end) as octact,
                        sum(case when month(date_plan) = 11 then cost_mrp else 0 end) as nov,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 11 then cost_mrp else 0 end else 0 end) as novact,
                        sum(case when month(date_plan) = 12 then cost_mrp else 0 end) as dec,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 12 then cost_mrp else 0 end else 0 end) as decact,
                        sum(case when month(date_plan) = 1 then cost_mrp else 0 end) as jan,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 1 then cost_mrp else 0 end else 0 end) as janact,
                        sum(case when month(date_plan) = 2 then cost_mrp else 0 end) as feb,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 2 then cost_mrp else 0 end else 0 end) as febact,
                        sum(case when month(date_plan) = 3 then cost_mrp else 0 end) as mar,sum(case when date_actual > '1900-01-01' then case when month(date_actual) = 3 then cost_mrp else 0 end else 0 end) as maract
                        from tb_plan_dtl
                        inner join tb_plan on tb_plan_dtl.hdrid=tb_plan.hdrid
                        where kode_item_process='09' and fiscal_year='$fiscalyear' )A
                        ");


        return $query;
        
    }

    public function m_plandetails($hdrid)
    {

        $this->db->select("a.hdrid,kode_cip,kode_item_process,namaItemprocess,date_plan,date_actual,status,keterangan,active");
        $this->db->from('tb_plan_dtl as a');
        $this->db->join('tb_itemprocess as b', 'a.kode_item_process=b.kodeItemprocess','LEFT');
        $this->db->where('hdrid', $hdrid);
        $this->db->order_by('kode_item_process','ASC');

        return $this->db->get();      
            
    }
    
    function product_list(){
        $hasil=$this->db->get('product');
        return $hasil->result();
    }
 
    function save_product(){

        $data = array(
                
                'hdrid'=> $this->input->post('hdrid'),
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

    function update_data(){

        $hdrid=$this->input->post('hdrid');
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
       
        $this->db->set('kode_cip', $kode_cip);
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

        $this->db->where('hdrid', $hdrid);
        $result=$this->db->update('tb_plan');
        return $result;

    }

    function save_details(){

        $data = array(
              
                'hdrid'=> $this->input->post('hdrid'),
                'kode_cip'=> $this->input->post('kode_cip'), 
                'kode_item_process'=> $this->input->post('kode_item_process'), 
                'date_plan'=> $this->input->post('date_plan'), 
                'active'=> $this->input->post('active'), 
                
            );

        $result=$this->db->insert('tb_plan_dtl',$data);
        return $result;
    }
 
    function update_details(){
        
        $hdrid=$this->input->post('hdrid');
        $kode_cip=$this->input->post('kode_cip');
        $kode_item_process=$this->input->post('kode_item_process');
        $date_plan=$this->input->post('date_plan');
        $active=$this->input->post('active');

        /*$this->db->set('kode_cip',$kode_cip);
        $this->db->set('kode_item_process',$kode_item_process);*/

        $this->db->set('date_plan', $date_plan);
        $this->db->set('active', $active);
        $this->db->set('kode_cip', $kode_cip);
        $this->db->where('hdrid', $hdrid);
        $this->db->where('kode_item_process', $kode_item_process);

        $result=$this->db->update('tb_plan_dtl');
        return $result;

    }

    function update_actual_details(){
        
        $hdrid=$this->input->post('hdrid');
        $kode_cip=$this->input->post('kode_cip');
        $kode_item_process=$this->input->post('kode_item_process');
        $date_actual=$this->input->post('date_actual');
        /* $active=$this->input->post('active'); */

        /*$this->db->set('kode_cip',$kode_cip);
        $this->db->set('kode_item_process',$kode_item_process);*/
       
        /* $this->db->set('active', $active); */
        $this->db->set('date_actual', $date_actual);
        $this->db->set('kode_cip', $kode_cip);
        $this->db->where('hdrid', $hdrid);
        $this->db->where('kode_item_process', $kode_item_process);

        $result=$this->db->update('tb_plan_dtl');
        return $result;

    }


    function update_data_(){
        
        $product_code=$this->input->post('product_code');
        $product_name=$this->input->post('product_name');
        $product_price=$this->input->post('price');
 
        $this->db->set('product_name', $product_name);
        $this->db->set('product_price', $product_price);
        $this->db->where('product_code', $product_code);
        $result=$this->db->update('product');
        return $result;

    }
 
    function delete_data(){

        $kode_cip=$this->input->post('kode_cip');
        $this->db->where('kode_cip', $kode_cip);
        $result=$this->db->delete('tb_plan');
        return $result;

    }
     
}
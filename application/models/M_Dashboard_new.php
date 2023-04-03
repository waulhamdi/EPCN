<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dashboard_new extends CI_Model
{


    // Get all data Group PCN

    ///@see get_data_group_PCN()
    ///@note digunakan untuk mengambil data all form yang ada d pcn
    ///@attention jika sudah di ambil datanya tinggal menampilkan data yang sudah di ambil
    function get_data_group_PCN()
    {

        $sql = "SELECT group_PCN_Register, count(*) as total from tb_PCN where group_product_PCN IS NOT NULL AND problem_PCN NOT NULL AND group_product_PCN!='' 
        AND transaction_date between 
                    CASE 
                    WHEN DATEPART(MM, GETDATE())>3
                    THEN Concat((DATEPART(yyyy, GETDATE())),'-04-01')
                    ELSE Concat((DATEPART(yyyy, GETDATE())-1),'-04-01')
                    END and CASE 
                    WHEN DATEPART(MM, GETDATE())>3
                    THEN Concat((DATEPART(yyyy, GETDATE())+1),'-03-31')
                    ELSE Concat((DATEPART(yyyy, GETDATE())),'-03-31')
                    END
        group by group_product_PCN";
        $query = $this->db->query($sql);
        return $query->result_array();

    }




    // Get all data Group Product using Where

    ///@see get_data_group_product_where()
    ///@note digunakan untuk mengambil dan mencari data product
    ///@attentionjika sudah dan akan update pada tb_pcn
    function get_data_group_product_where($where)
    {
        $sql = "SELECT problem_PCN, count(*) as total from tb_input_problem_PCN where group_product_PCN='$where' and problem_name_PCN IS NOT NULL AND transaction_date between 
        CASE 
        WHEN DATEPART(MM, GETDATE())>3
        THEN Concat((DATEPART(yyyy, GETDATE())),'-04-01')
        ELSE Concat((DATEPART(yyyy, GETDATE())-1),'-04-01')
        END and CASE 
        WHEN DATEPART(MM, GETDATE())>3
        THEN Concat((DATEPART(yyyy, GETDATE())+1),'-03-31')
        ELSE Concat((DATEPART(yyyy, GETDATE())),'-03-31')
        END
        group by problem_PCN";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // Get data berapa hari no claim untuk chart

    ///@see get_data_no_claim()
    ///@note di gunakan untuk mengambil data tapi tidak bisa di claim 
    ///@attention  data yang di ambil akan terupdate 
    function get_data_no_claim()
    {
        $sql = "  SELECT DATEDIFF ( DAY , max(transaction_date) , getdate()) as day
        FROM tb_input_problem_PCN where problem_PCN='external'";

        $query = $this->db->query($sql);
        return $query->result_array();
    }


    // Get data berapa hari no claim untuk chart WHERE

    ///@see get_data_no_claim()
    ///@note di gunakan untuk mengambil dan mencari data tapi tidak bisa di claim 
    ///@attention  data yang di ambil akan terupdate 
    function get_data_no_claim_where($where)
    {
        $sql = "  SELECT group_product_PCN,DATEDIFF ( DAY , max(transaction_date) , getdate()) as day
        FROM tb_input_problem_PCN WHERE group_product_PCN = '$where' and problem_name_PCN='external'
		group by group_product_PCN";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // Get data berapa hari no claim untuk calendar

    ///@see get_data_no_claim_calendar()
    ///@note mengambil data kalender untuk updatan pada kalender
    ///@attention jika data sudah ada kalender akan aktif dan update
    function get_data_no_claim_calendar()
    {

        // $sql="  SELECT 
        //     MAX(transaction_date) as startDate,
        //     CAST( GETDATE() AS Date ) AS endDate
        // FROM 
        //     tb_input_problem";

        $sql = " SELECT DISTINCT transaction_date AS startDate,transaction_date AS endDate FROM tb_input_problem  order by transaction_date";

        $query = $this->db->query($sql);
        return $query->result_array();
    }


    ///@see get_data_no_claim_calendar_v2()
    ///@note 
    ///@attention
    function get_data_no_claim_calendar_v2()
    {

        // $result = array();
        $id = 1;

        $hsl = $this->db->query("SELECT DISTINCT transaction_date AS startDate,transaction_date AS endDate FROM tb_input_problem where problem_name='external' order by transaction_date");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $data2[] = array(
                    'id' => $id,
                    'title' => 'Claim',
                    'start' => $data->startDate,
                    'end' => $data->endDate,
                    'backgroundColor' => '#f56954',
                    'borderColor' => '#f56954',
                    'allDay' => true
                );
                $id++;
            }
        } else {
            return false;
        }
        return json_encode($data2);

    }

    // Get all data Claim By FY

    ///@see get_data_fical_years()
    ///@note 
    ///@attention
    function get_data_fical_years()
    {

        $sql = "SELECT count(case when problem_name='internal' then problem_name end) as internal
		// ,count(case when problem_name='external' then problem_name end) as eksternal
		// ,Tahun from (select 
		// case 
        // when report_date between Concat((DATEPART(yyyy, GETDATE())-4),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-3),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-4)
        // when report_date between Concat((DATEPART(yyyy, GETDATE())-3),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-2),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-3)
        // when report_date between Concat((DATEPART(yyyy, GETDATE())-2),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-2)
        // when report_date between Concat((DATEPART(yyyy, GETDATE())-1),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-0),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-1)
        // when report_date between Concat((DATEPART(yyyy, GETDATE())-0),'-04-01') and Concat((DATEPART(yyyy, GETDATE())+1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-0)
        // else 'unKwn' END as Tahun,report_date as report_date from tb_input_problem)a 
		// inner join tb_input_problem b on a.report_date = b.report_date WHERE a.report_date IS NOT NULL and Tahun !='unKwn'  group by a.Tahun";

        $sql = "Select count(case when problem_name='internal' then problem_name end) as internal
            ,count(case when problem_name='external' then problem_name end) as eksternal,Tahun from (select 
            case 
           when report_date between Concat((DATEPART(yyyy, GETDATE())-4),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-3),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-4)
            when report_date between Concat((DATEPART(yyyy, GETDATE())-3),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-2),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-3)
            when report_date between Concat((DATEPART(yyyy, GETDATE())-2),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-2)
            when report_date between Concat((DATEPART(yyyy, GETDATE())-1),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-0),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-1)
            when report_date between Concat((DATEPART(yyyy, GETDATE())-0),'-04-01') and Concat((DATEPART(yyyy, GETDATE())+1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-0)
            else 'unKwn' END as Tahun,report_date as report_date,problem_name from tb_input_problem)A
            WHERE report_date IS NOT NULL and Tahun !='unKwn'
            group by Tahun";

        $query = $this->db->query($sql);
        return $query->result_array();
    }


    // Get all data Claim By FY

    ///@see get_data_fical_years_where()
    ///@note 
    ///@attention
    function get_data_fical_years_where($where)
    {
        $sql = "SELECT count(case when problem_name='internal' then problem_name end) as internal
		,count(case when problem_name='external' then problem_name end) as eksternal
		,Tahun from (select 
		case 
        -- when report_date between Concat((DATEPART(yyyy, GETDATE())-4),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-3),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-4)
        -- when report_date between Concat((DATEPART(yyyy, GETDATE())-3),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-2),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-3)
        when report_date between Concat((DATEPART(yyyy, GETDATE())-2),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-2)
        when report_date between Concat((DATEPART(yyyy, GETDATE())-1),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-0),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-1)
        when report_date between Concat((DATEPART(yyyy, GETDATE())-0),'-04-01') and Concat((DATEPART(yyyy, GETDATE())+1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-0)
        else 'unKwn' END as Tahun,report_date as report_date from tb_input_problem)a 
		inner join tb_input_problem b on a.report_date = b.report_date WHERE a.report_date IS NOT NULL and Tahun !='unKwn' and group_product_name='$where' group by a.Tahun";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // Get all data Claim By FY

    ///@see get_data_fical_years_this_fy_where2()
    ///@note 
    ///@attention
    function get_data_fical_years_this_fy_where2($where, $where2)
    {
        $sql = "SELECT Tahun,count(Tahun) as Total from (select case 
        when transaction_date between Concat((DATEPART(yyyy, GETDATE())-0),'-04-01') and Concat((DATEPART(yyyy, GETDATE())+1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-0)
        else 'unKwn'
        end as Tahun from tb_input_problem where group_product_name= '$where' AND problem_name= '$where2'
        )a WHERE Tahun != 'unKwn'
        group by Tahun";

        $query = $this->db->query($sql);
        return $query->result_array();
    }


    // Get Data for Mixed Chart by FY (Case)

    ///@see get_data_chart()
    ///@note 
    ///@attention
    function get_data_chart()
    {
        $sql = " SELECT format(ppm_case_date,'MMMM')Bulan,SUM(CAST(case_target as int))case_target , 
        SUM(CAST(case_actual as int))case_actual
      ,COUNT(case when group_product_name='Body' then group_product_name end) as Body
      ,COUNT(case when group_product_name='Power Train' then group_product_name end) as Power_Train
      ,COUNT(case when group_product_name='Thermal' then group_product_name end) as Thermal
      ,COUNT(case when group_product_name='Wiper Washer' then group_product_name end) as Wiper
      ,COUNT(case when group_product_name='Logistic' then group_product_name end) as Logistic
      ,COUNT(case when group_product_name='Supplier' then group_product_name end) as Supplier
      from tb_ppm_case_target
         WHERE ppm_case_date between 
                  CASE 
                  WHEN DATEPART(MM, GETDATE())>3
                  THEN Concat((DATEPART(yyyy, GETDATE())),'-04-01')
                  ELSE Concat((DATEPART(yyyy, GETDATE())-1),'-04-01')
                  END and CASE 
                  WHEN DATEPART(MM, GETDATE())>3
                  THEN Concat((DATEPART(yyyy, GETDATE())+1),'-03-31')
                  ELSE Concat((DATEPART(yyyy, GETDATE())),'-03-31')
                  END
      group by month_ppm_case_target,ppm_case_date";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // Get Data for Mixed Chart by FY (Case)

    ///@see get_data_mixed_chart_where()
    ///@note 
    ///@attention
    function get_data_mixed_chart_where($where)
    {
        $sql = " SELECT format(ppm_case_date,'MMMM')Bulan,SUM(CAST(case_target as int))case_target , 
        SUM(CAST(case_actual as int))case_actual
      ,COUNT(case when group_product_name='Body' then group_product_name end) as Body
      ,COUNT(case when group_product_name='Power Train' then group_product_name end) as Power_Train
      ,COUNT(case when group_product_name='Thermal' then group_product_name end) as Thermal
      ,COUNT(case when group_product_name='Wiper Washer' then group_product_name end) as Wiper
      ,COUNT(case when group_product_name='Logistic' then group_product_name end) as Logistic
      ,COUNT(case when group_product_name='Supplier' then group_product_name end) as Supplier
      from tb_ppm_case_target
         WHERE ppm_case_date between 
                  CASE 
                  WHEN DATEPART(MM, GETDATE())>3
                  THEN Concat((DATEPART(yyyy, GETDATE())),'-04-01')
                  ELSE Concat((DATEPART(yyyy, GETDATE())-1),'-04-01')
                  END and CASE 
                  WHEN DATEPART(MM, GETDATE())>3
                  THEN Concat((DATEPART(yyyy, GETDATE())+1),'-03-31')
                  ELSE Concat((DATEPART(yyyy, GETDATE())),'-03-31')
                  END and group_product_name= '$where'
      group by month_ppm_case_target,ppm_case_date
";

        $query = $this->db->query($sql);
        return $query->result_array();
    }


    // Get Data for Mixed Chart by FY (PPM)

    ///@see get_data_mixed_chart2()
    ///@note 
    ///@attention
    function get_data_mixed_chart2()
    {
        $sql = "SELECT format(ppm_case_date,'MMMM')Bulan,SUM(ppm_target) as ppm_target,SUM(ppm_actual) as ppm_actual
        from tb_ppm_case_target
           WHERE ppm_case_date between 
                    CASE 
                    WHEN DATEPART(MM, GETDATE())>3
                    THEN Concat((DATEPART(yyyy, GETDATE())),'-04-01')
                    ELSE Concat((DATEPART(yyyy, GETDATE())-1),'-04-01')
                    END and CASE 
                    WHEN DATEPART(MM, GETDATE())>3
                    THEN Concat((DATEPART(yyyy, GETDATE())+1),'-03-31')
                    ELSE Concat((DATEPART(yyyy, GETDATE())),'-03-31')
                    END
                    AND group_product_name != 'Logistic'
        group by month_ppm_case_target,ppm_case_date";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // Get Data for Mixed Chart by FY (PPM)

    ///@see get_data_mixed_chart2_where()
    ///@note 
    ///@attention
    function get_data_chart2($where)
    {
        $sql = "SELECT format(ppm_case_date,'MMMM')Bulan,SUM(ppm_target) as ppm_target,SUM(ppm_actual) as ppm_actual
        from tb_ppm_case_target
           WHERE ppm_case_date between 
                    CASE 
                    WHEN DATEPART(MM, GETDATE())>3
                    THEN Concat((DATEPART(yyyy, GETDATE())),'-04-01')
                    ELSE Concat((DATEPART(yyyy, GETDATE())-1),'-04-01')
                    END and CASE 
                    WHEN DATEPART(MM, GETDATE())>3
                    THEN Concat((DATEPART(yyyy, GETDATE())+1),'-03-31')
                    ELSE Concat((DATEPART(yyyy, GETDATE())),'-03-31')
                    END
                    AND group_product_name = '$where'
        group by month_ppm_case_target,ppm_case_date";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // // Get Data for Case Data by Group Product
    // function get_data_for_case_data_by_group_product(){


    //     $sql="SELECT isnull(sum(case when a.group_product_name_yearly='Company' then a.case_actual_yearly end),0) as Company
    //     ,isnull(sum(case when a.group_product_name_yearly='Body' then a.case_actual_yearly  end),0) as Body
    //     ,isnull(sum(case when a.group_product_name_yearly='Power Train' then a.case_actual_yearly  end),0) as Power_Train
    // 	,isnull(sum(case when a.group_product_name_yearly='Thermal' then a.case_actual_yearly  end),0) as Thermal
    //     ,isnull(sum(case when a.group_product_name_yearly='Wiper Washer' then a.case_actual_yearly  end),0) as Wiper
    // 	,isnull(sum(case when a.group_product_name_yearly='Logistic' then a.case_actual_yearly  end),0) as Logistic
    // 	,isnull(sum(case when a.group_product_name_yearly='Supplier' then a.case_actual_yearly  end),0) as Supplier
    // 	,isnull(sum(case when a.group_product_name_yearly='General' then a.case_actual_yearly  end),0) as General
    //     ,Tahun from (select 
    // 	case 
    //     --when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-4),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-3),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-4)
    //     --when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-3),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-2),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-3)
    //     when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-2),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-2)
    //     when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-1),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-0),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-1)
    //     when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-0),'-04-01') and Concat((DATEPART(yyyy, GETDATE())+1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-0)

    //     else 'unKwn' END as Tahun,group_product_name_yearly as group_product_name_yearly,sum(case_actual_yearly)case_actual_yearly from tb_ppm_case_target_yearly group by case_actual_yearly,year_ppm_case_target_yearly,group_product_name_yearly)a 
    // 	WHERE a.Tahun != 'unKwn'  group by a.Tahun";

    //     $query = $this->db->query($sql);
    //     return $query->result_array();

    // }

    // // Get Data for Case Data by Group Product
    // function get_data_for_case_data_by_group_product_where($where){


    //      $sql="SELECT isnull(sum(case when a.group_product_name_yearly='Company' then a.case_actual_yearly end),0) as Company
    //     ,isnull(sum(case when a.group_product_name_yearly='Body' then a.case_actual_yearly  end),0) as Body
    //     ,isnull(sum(case when a.group_product_name_yearly='Power Train' then a.case_actual_yearly  end),0) as Power_Train
    // 	,isnull(sum(case when a.group_product_name_yearly='Thermal' then a.case_actual_yearly  end),0) as Thermal
    //     ,isnull(sum(case when a.group_product_name_yearly='Wiper Washer' then a.case_actual_yearly  end),0) as Wiper
    // 	,isnull(sum(case when a.group_product_name_yearly='Logistic' then a.case_actual_yearly  end),0) as Logistic
    // 	,isnull(sum(case when a.group_product_name_yearly='Supplier' then a.case_actual_yearly  end),0) as Supplier
    // 	,isnull(sum(case when a.group_product_name_yearly='General' then a.case_actual_yearly  end),0) as General
    //     ,Tahun from (select 
    // 	case 
    //     --when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-4),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-3),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-4)
    //     --when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-3),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-2),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-3)
    //     when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-2),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-2)
    //     when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-1),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-0),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-1)
    //     when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-0),'-04-01') and Concat((DATEPART(yyyy, GETDATE())+1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-0)

    //     else 'unKwn' END as Tahun,group_product_name_yearly as group_product_name_yearly,sum(case_actual_yearly)case_actual_yearly from tb_ppm_case_target_yearly group by case_actual_yearly,year_ppm_case_target_yearly,group_product_name_yearly)a 
    // 	WHERE a.Tahun != 'unKwn' AND a.group_product_name_yearly='$where' group by a.Tahun";


    //     $query = $this->db->query($sql);
    //     return $query->result_array();
    // }

    // Get Data for Case Data by Group Product

    ///@see get_data_for_case_data_by_group_product_where_new()
    ///@note digunakan untuk mencari dan menampilkan product PCN pada grup
    ///@attention jika product dari semua data sudah tampil akan memudahkan mode connection di dashboard
    function get_data_for_case_data_by_group_product_PCN($where)
    {


        $sql = "SELECT isnull(sum(case when a.group_product_name_yearly='Company' then a.case_actual_yearly end),0) as Company_actual
         ,isnull(sum(case when a.group_product_name_yearly='Company' then a.case_target_yearly end),0) as Company_target
         ,isnull(sum(case when a.group_product_name_yearly='Body' then a.case_actual_yearly  end),0) as Body_actual
		,isnull(sum(case when a.group_product_name_yearly='Body' then a.case_target_yearly  end),0) as Body_target
         ,isnull(sum(case when a.group_product_name_yearly='Power Train' then a.case_actual_yearly  end),0) as Power_Train_actual
		 ,isnull(sum(case when a.group_product_name_yearly='Power Train' then a.case_target_yearly  end),0) as Power_Train_target
		 ,isnull(sum(case when a.group_product_name_yearly='Thermal' then a.case_actual_yearly  end),0) as Thermal_actual
		 ,isnull(sum(case when a.group_product_name_yearly='Thermal' then a.case_target_yearly  end),0) as Thermal_target
         ,isnull(sum(case when a.group_product_name_yearly='Wiper Washer' then a.case_actual_yearly  end),0) as Wiper_actual
		 ,isnull(sum(case when a.group_product_name_yearly='Wiper Washer' then a.case_target_yearly  end),0) as Wiper_target
		 ,isnull(sum(case when a.group_product_name_yearly='Logistic' then a.case_actual_yearly  end),0) as Logistic_actual
		 ,isnull(sum(case when a.group_product_name_yearly='Logistic' then a.case_target_yearly  end),0) as Logistic_target
		 ,isnull(sum(case when a.group_product_name_yearly='Supplier' then a.case_actual_yearly  end),0) as Supplier_actual
		 ,isnull(sum(case when a.group_product_name_yearly='Supplier' then a.case_target_yearly  end),0) as Supplier_target
		 ,isnull(sum(case when a.group_product_name_yearly='General' then a.case_actual_yearly  end),0) as General_actual
		 ,isnull(sum(case when a.group_product_name_yearly='General' then a.case_target_yearly  end),0) as General_target
         ,Tahun from (select 
		 case 
         --when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-4),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-3),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-4)
         --when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-3),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-2),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-3)
         --when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-2),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-2)
         --when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-1),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-0),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-1)
         --when Concat((DATEPART(yyyy, year_ppm_case_target_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-0),'-04-01') and Concat((DATEPART(yyyy, GETDATE())+1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-0)

         else 'unKwn' END as Tahun,group_product_name_yearly as group_product_name_yearly,sum(case_actual_yearly)case_actual_yearly,sum(case_target_yearly)case_target_yearly from tb_ppm_case_target_yearly group by case_actual_yearly,year_ppm_case_target_yearly,group_product_name_yearly)a 
	 	WHERE a.Tahun != 'unKwn' AND a.group_product_name_yearly='$where' 
	 	group by a.Tahun";


        //     $query = $this->db->query($sql);
        //     return $query->result_array();
        // }



        // // Get Data for PPM Data
        // function get_data_for_ppm_data(){

        //     $sql="SELECT SUM(ppm_actual_yearly) as ppm_actual_yearly
        // 	,SUM(ppm_target_yearly) as ppm_target_yearly
        // 	,Tahun from (select 
        // 	case 
        //     -- when ppm_case_date_yearly between Concat((DATEPART(yyyy, GETDATE())-4),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-3),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-4)
        //     -- when ppm_case_date_yearly between Concat((DATEPART(yyyy, GETDATE())-3),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-2),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-3)
        //     when Concat((DATEPART(yyyy, ppm_case_date_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-2),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-2)
        //     when Concat((DATEPART(yyyy, ppm_case_date_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-1),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-0),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-1)
        //     when Concat((DATEPART(yyyy, ppm_case_date_yearly)),'-04-01') between Concat((DATEPART(yyyy, GETDATE())-0),'-04-01') and Concat((DATEPART(yyyy, GETDATE())+1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-0)
        //     else 'unKwn' END as Tahun,ppm_actual_yearly as ppm_actual_yearly,ppm_target_yearly as ppm_target_yearly from tb_ppm_case_target_yearly)a 
        //     WHERE a.Tahun != 'unKwn' group by a.Tahun";

        $query = $this->db->query($sql);
        return $query->result_array();

    }

    // // Get Data for PPM Data Where
    // function get_data_for_ppm_data_where($where){
    //     $sql="SELECT SUM(ppm_actual_yearly) as ppm_actual_yearly
    // 	,SUM(ppm_target_yearly) as ppm_target_yearly
    // 	,Tahun from (select 
    // 	case 
    //     -- when ppm_case_date_yearly between Concat((DATEPART(yyyy, GETDATE())-4),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-3),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-4)
    //     -- when ppm_case_date_yearly between Concat((DATEPART(yyyy, GETDATE())-3),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-2),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-3)
    //     when ppm_case_date_yearly between Concat((DATEPART(yyyy, GETDATE())-2),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-2)
    //     when ppm_case_date_yearly between Concat((DATEPART(yyyy, GETDATE())-1),'-04-01') and Concat((DATEPART(yyyy, GETDATE())-0),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-1)
    //     when ppm_case_date_yearly between Concat((DATEPART(yyyy, GETDATE())-0),'-04-01') and Concat((DATEPART(yyyy, GETDATE())+1),'-03-31') then 'FY'+convert(char(4), DATEPART(yyyy, GETDATE())-0)
    //     else 'unKwn' END as Tahun,ppm_actual_yearly as ppm_actual_yearly,ppm_target_yearly as ppm_target_yearly,group_product_name_yearly as group_product_name_yearly from tb_ppm_case_target_yearly)a 
    //     WHERE a.Tahun != 'unKwn' and group_product_name_yearly='$where' group by a.Tahun";

    //     $query = $this->db->query($sql);
    //     return $query->result_array();
    // }


    //@see ajax gethydrid
    ///@note fungsi digunakan untuk auto increnete 
    ///@attention nomor increnete sudah diinput otomatis akan terganti jadi tidak bisa diubah
    function ajax_getbyno_dokumen($no_dokumen, $table)
    {
        return $this->db->get_where($table, array('no_dokumen' => $no_dokumen)); //untuk menampilkan nomor secara auto increnete   
    }


    ///@see get tables
    ///@note fungsi data web bisa masuk ke database
    ///@attention jika data web masuk ke wbe tapi tidak masu ke database itu salah di databasenya
    function get_tables($tables, $cari, $iswhere)
    {
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // Ambil data start
        $start = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}");

        $query = $tables;

        //parameter jika data sudah diinput maka akan masuk
        if (!empty($iswhere)) {
            $sql = $this->db->query("SELECT * FROM " . $query . " WHERE " . $iswhere);
        } else {
            $sql = $this->db->query("SELECT * FROM " . $query);
        }

        //parameter untuk sql count
        $sql_count = $sql->num_rows();


        //parameter search
        $cari = implode(" LIKE '%" . $search . "%' OR ", $cari) . " LIKE '%" . $search . "%'";

        // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $order_field = $_POST['order'][0]['column'];

        // Untuk menentukan order by "ASC" atau "DESC"
        $order_ascdesc = $_POST['order'][0]['dir'];
        $order = " ORDER BY " . $_POST['columns'][$order_field]['data'] . " " . $order_ascdesc;


        //parameter jika data dicari maka data ditampilkan akan muncul
        if (!empty($iswhere)) {
            $sql_data = $this->db->query("SELECT * FROM " . $query . " WHERE $iswhere AND (" . $cari . ")" . $order . " LIMIT " . $limit . " OFFSET " . $start);
        } else {
            $sql_data = $this->db->query("SELECT * FROM " . $query . " WHERE (" . $cari . ")" . $order . " LIMIT " . $limit . " OFFSET " . $start);
        }


        //parameter jika data cari dan menfilter maka data ditampilkan akan muncul
        if (isset($search)) {
            if (!empty($iswhere)) {
                $sql_cari = $this->db->query("SELECT * FROM " . $query . " WHERE $iswhere (" . $cari . ")");
            } else {
                $sql_cari = $this->db->query("SELECT * FROM " . $query . " WHERE (" . $cari . ")");
            }
            $sql_filter_count = $sql_cari->num_rows();
        } else {

            //untuk menampilkan data sudah filter
            if (!empty($iswhere)) {
                $sql_filter = $this->db->query("SELECT * FROM " . $query . "WHERE " . $iswhere);
            } else {
                $sql_filter = $this->db->query("SELECT * FROM " . $query);
            }
            $sql_filter_count = $sql_filter->num_rows();
        }
        $data = $sql_data->result_array();

        $callback = array(
            'draw' => $_POST['draw'],
            // Ini dari datatablenya    
            'recordsTotal' => $sql_count,
            'recordsFiltered' => $sql_filter_count,
            'data' => $data
        );
        return json_encode($callback); // Convert array $callback ke json
    }

    ///@see get table where
    ///@note fungsi digunakan mencari data di database
    ///@attention
    //  function get_tables_where($tables,$cari,$where,$iswhere)
    //  {
    //     // Ambil data yang di ketik user pada textbox pencarian
    //     $search = htmlspecialchars($_POST['search']['value']);
    //     // Ambil data limit per page
    //     $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
    //     // Ambil data start
    //     $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 

    //     $setWhere = array();
    //     foreach ($where as $key => $value)
    //     {
    //           $setWhere[] = $key."='".$value."'"; //untuk setting code auto increnete
    //     }

    //     $fwhere = implode(' AND ', $setWhere);

    //     if(!empty($iswhere)){
    //           $sql = $this->db->query("SELECT * FROM ".$tables." WHERE $iswhere AND ".$fwhere . "AND current_flow_pic LIKE '%" . $this->session->nama . "%'"); //untuk setting code auto increnete
    //     }else{
    //           $sql = $this->db->query("SELECT * FROM ".$tables." WHERE ".$fwhere . "AND current_flow_pic LIKE '%" . $this->session->nama . "%'");
    //     }
    //     $sql_count = $sql->num_rows();

    //     $query = $tables;
    //     $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";

    //     // Untuk mengambil nama field yg menjadi acuan untuk sorting
    //     $order_field = $_POST['order'][0]['column']; 

    //     // Untuk menentukan order by "ASC" atau "DESC"
    //     $order_ascdesc = $_POST['order'][0]['dir']; 
    //     $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;


    //     //parameter jika data dicari maka data ditampilkan akan muncul
    //     if(!empty($iswhere)){
    //           $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND ".$fwhere . "AND current_flow_pic LIKE '%" . $this->session->nama . "%'" ." AND (".$cari.")".$order." OFFSET ".$start." ROWS FETCH NEXT ". $limit . " ROWS only ");
    //     }else{
    //           $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE ".$fwhere . "AND current_flow_pic LIKE '%" . $this->session->nama . "%'" ." AND (".$cari.")".$order." OFFSET ".$start." ROWS FETCH NEXT ". $limit . " ROWS only ");
    //     }


    //     //parameter jika data cari data ditampilkan
    //     if(isset($search))
    //     {
    //           if(!empty($iswhere)){
    //              $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND ".$fwhere . "AND current_flow_pic LIKE '%" . $this->session->nama . "%'" ." AND (".$cari.")");
    //           }else{
    //              $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE ".$fwhere . "AND current_flow_pic LIKE '%" . $this->session->nama . "%'" ." AND (".$cari.")");
    //           }
    //           $sql_filter_count = $sql_cari->num_rows();
    //     }else{

    //        //parameter jika data cari dan menfilter maka data ditampilkan akan muncul
    //           if(!empty($iswhere)){
    //              $sql_filter = $this->db->query("SELECT * FROM ".$tables." WHERE $iswhere AND ".$fwhere . "AND current_flow_pic LIKE '%" . $this->session->nama . "%'" );
    //           }else{
    //              $sql_filter = $this->db->query("SELECT * FROM ".$tables." WHERE ".$fwhere . "AND current_flow_pic LIKE '%" . $this->session->nama . "%'" );
    //           }
    //           $sql_filter_count = $sql_filter->num_rows();
    //     }

    //     //untuk menampilkan data sudah filter
    //     $data = $sql_data->result_array();

    //     $callback = array(    
    //           'draw' => $_POST['draw'], // Ini dari datatablenya    
    //           'recordsTotal' => $sql_count,   //ini record database
    //           'recordsFiltered'=>$sql_filter_count,  //ini filter count  
    //           'data'=>$data
    //     );
    //     return json_encode($callback); // Convert array $callback ke json
    //  }
    function get_tables_where($tables, $cari, $where, $iswhere)
    {
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // Ambil data start
        $start = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}");

        $setWhere = array();
        foreach ($where as $key => $value) {
            $setWhere[] = $key . "='" . $value . "'"; //untuk setting code auto increnete
        }

        $fwhere = implode(' AND ', $setWhere);

        if (!empty($iswhere)) {
            $sql = $this->db->query("SELECT * FROM " . $tables . " WHERE $iswhere AND " . $fwhere); //untuk setting code auto increnete
        } else {
            $sql = $this->db->query("SELECT * FROM " . $tables . " WHERE " . $fwhere);
        }
        $sql_count = $sql->num_rows();

        $query = $tables;
        $cari = implode(" LIKE '%" . $search . "%' OR ", $cari) . " LIKE '%" . $search . "%'";

        // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $order_field = $_POST['order'][0]['column'];

        // Untuk menentukan order by "ASC" atau "DESC"
        $order_ascdesc = $_POST['order'][0]['dir'];
        $order = " ORDER BY " . $_POST['columns'][$order_field]['data'] . " " . $order_ascdesc;


        //parameter jika data dicari maka data ditampilkan akan muncul
        if (!empty($iswhere)) {
            $sql_data = $this->db->query("SELECT * FROM " . $query . " WHERE $iswhere AND " . $fwhere . " AND (" . $cari . ")" . $order . " OFFSET " . $start . " ROWS FETCH NEXT " . $limit . " ROWS only ");
        } else {
            $sql_data = $this->db->query("SELECT * FROM " . $query . " WHERE " . $fwhere . " AND (" . $cari . ")" . $order . " OFFSET " . $start . " ROWS FETCH NEXT " . $limit . " ROWS only ");
        }


        //parameter jika data cari data ditampilkan
        if (isset($search)) {
            if (!empty($iswhere)) {
                $sql_cari = $this->db->query("SELECT * FROM " . $query . " WHERE $iswhere AND " . $fwhere . " AND (" . $cari . ")");
            } else {
                $sql_cari = $this->db->query("SELECT * FROM " . $query . " WHERE " . $fwhere . " AND (" . $cari . ")");
            }
            $sql_filter_count = $sql_cari->num_rows();
        } else {

            //parameter jika data cari dan menfilter maka data ditampilkan akan muncul
            if (!empty($iswhere)) {
                $sql_filter = $this->db->query("SELECT * FROM " . $tables . " WHERE $iswhere AND " . $fwhere);
            } else {
                $sql_filter = $this->db->query("SELECT * FROM " . $tables . " WHERE " . $fwhere);
            }
            $sql_filter_count = $sql_filter->num_rows();
        }

        //untuk menampilkan data sudah filter
        $data = $sql_data->result_array();

        $callback = array(
            'draw' => $_POST['draw'],
            // Ini dari datatablenya    
            'recordsTotal' => $sql_count,
            //ini record database
            'recordsFiltered' => $sql_filter_count,
            //ini filter count  
            'data' => $data
        );
        return json_encode($callback); // Convert array $callback ke json
    }

    public function get_all_status()
    {
        $query = $this->db->get('tb_PCNlist');
        return $query->result();
    }

    public function get_status()
    {
        $nik = $this->db->query("SELECT DISTINCT Tb_user_login.name, tb_PCN.nik
        FROM tb_PCN
        JOIN Tb_user_login ON tb_PCN.nik = Tb_user_login.user_name
        GROUP BY Tb_user_login.name, tb_PCN.nik;");

        $name = [];
        $total = 0;
        $unapproved = 0;
        $approved = 0;
        $process = 0;
        $rejected = 0;
        $plan = 0;
        $not_yet = 0;
        $priority = 0;
        $late = 0;
        $decision = 0;

        foreach ($nik->result() as $data) {
            $name[] = $data->name;

            $status = $this->db->query("SELECT hdrid, nik, stat, m_or_p_starts, mass_production_starts_finish FROM tb_PCN WHERE nik = '" . $data->nik . "'");
            // $status = $this->db->query("SELECT TOP 1 hdrid, nik, stat, m_or_p_starts, mass_production_starts_finish FROM tb_PCN WHERE nik = '" . $data->nik . "' ORDER BY nik DESC");


            foreach ($status->result() as $stat) {
                //fungsi mencari selisih hari dan menetapkan priority
                $m_or_p_starts = new DateTime($stat->m_or_p_starts);
                $mass_production_starts_finish = new DateTime($stat->mass_production_starts_finish);
                $selisih_hari = $m_or_p_starts->diff($mass_production_starts_finish)->days;

                //fungsi mencari hold pada tb_application
                $hdrid = $stat->hdrid;
                $decision_query = $this->db->query("SELECT hold_or_go_mfg, hold_or_go_qa, hold_or_go_qc, hold_or_go_pc, hold_or_go_pe FROM tb_application WHERE hdrid = '$hdrid'");
                $decision_result = $decision_query->result();

                $total += 1;
                if ($stat->stat == "unapproved") {
                    $unapproved += 1;
                } elseif ($stat->stat == "approved") {
                    $approved += 1;
                } elseif ($stat->stat == "rejected") {
                    $rejected += 1;
                } elseif ($stat->stat == "Plan Approval") {
                    $plan += 1;
                } elseif ($stat->stat == "Not Yet Plan Approval") {
                    $not_yet += 1;
                } elseif ($selisih_hari < 7) {
                    $priority += 1;
                } elseif ($selisih_hari < 1) {
                    $late += 1;
                } else {
                    $hold = false;
                    foreach ($decision_result as $decision_row) {
                        if ($decision_row->hold_or_go_mfg === "hold" || $decision_row->hold_or_go_qa === "hold" || $decision_row->hold_or_go_qc === "hold" || $decision_row->hold_or_go_pc === "hold" || $decision_row->hold_or_go_pe === "hold") {
                            $hold = true;
                            break;
                        }
                    }
                    if ($hold) {
                        $decision += 1;
                    } else {
                        $process += 1;
                    }
                }
            }

        }

        $data = [
            'name' => $name,
            'total' => $total,
            'unapproved' => $unapproved,
            'approved' => $approved,
            'process' => $process,
            'rejected' => $rejected,
            'Plan Approval' => $plan,
            'Not Yet Plan Approval' => $not_yet,
            'priority' => $priority,
            'late' => $late,
            'decision' => $decision
        ];
        return $data;

    }


    function OpenPCN_by_product_name()
    {
        $sql = "SELECT product_name , COUNT(*) as total_open from tb_PCNlist where status != '<b>Approved</b>' group by product_name";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        foreach ($data as $key => $da) {
            $sql2 = "select * from tb_PCNlist where product_name = '" . $da["product_name"] . "';";
            $query2 = $this->db->query($sql2);
            $result = $query2->result_array();
            // var_dump($result);
            $Open_PCN[$key] = 0;
            foreach ($result as $key2 => $open) {
                $Open_PCN[$key]++;
            }
        }
        return $Open_PCN;
    }

    function OpenPCN_by_supplier_name()
    {
        $sql = "SELECT supplier_name , COUNT(*) as total_open from tb_PCNlist where status != '<b>Approved</b>' group by supplier_name";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        foreach ($data as $key => $da) {
            $sql2 = "select * from tb_PCNlist where supplier_name = '" . $da["supplier_name"] . "';";
            $query2 = $this->db->query($sql2);
            $result = $query2->result_array();
            $Open_PCN[$key] = 0;
            foreach ($result as $key2 => $open) {
                $Open_PCN[$key]++;
            }
        }
        return $Open_PCN;
    }

    /// @see getSchedule()
    /// @note get data schedule
    /// @attention fungsi get data year audit dan audit category
    public function getSchedule()
    {
        // query get data year audit schedule
        $data['year'] = $this->db->query("SELECT YEAR(transaction_date) year_date FROM tb_PCNlist GROUP BY YEAR(transaction_date) ORDER BY YEAR(transaction_date) ASC")->result_array();
        // query get data audit category schedule
        // $data["audit_category"] = $this->db->query("SELECT audit_category FROM tb_schedule_audit GROUP BY audit_category ORDER BY audit_category ASC")->result_array();         

        return $data;
    }

    // public function filterBY_Product_Open($year, $byCategory)
    // {
    //     $sql = "SELECT $byCategory, COUNT(1) as total_product from tb_PCNlist where  status = '<b>Approved</b>' and YEAR(transaction_date) = '$year' group by $byCategory";
    //     $query = $this->db->query($sql);
    //     $data = $query->result_array();
    //     foreach ($data as $key => $da) {
    //         $Open_PCN[$key] = 0;
    //         // $sql2 = "SELECT * from tb_PCNlist where product_name = '" . $da["product_name"] . "';";
    //         // $query2 = $this->db->query($sql2);
    //         // $result = $query2->result_array();
    //         // $Open_PCN[$key] = 0;
    //         // foreach ($result as $key2 => $open) {
    //         $Open_PCN[$key]++;
    //         // }
    //     }
    //     // return $Open_PCN;
    // }
// public function filterBY_Product_Close($year, $byCategory)
// {
//     $sql = "SELECT $byCategory, COUNT(1) as total_product from tb_PCNlist where  status = '<b>Approved</b>' group by $byCategory";
//     $query = $this->db->query($sql);
//     $data = $query->result_array();
//     foreach ($data as $key => $da) {
//         $sql2 = "SELECT * from tb_PCNlist where YEAR(transaction_date) = '$year'";
//         $query2 = $this->db->query($sql2);
//         $result = $query2->result_array();
//         $Open_PCN[$key] = 0;
//         foreach ($result as $key2 => $open) {
//             $Open_PCN[$key]++;
//         }
//     }
//     return $Open_PCN;
// }

    // public function filterBY_Product_Open($year, $byCategory)
    // {
    //     $sql = "SELECT $byCategory, COUNT(1) as total_close FROM tb_PCNlist WHERE status = '<b>Approved</b>' AND YEAR(transaction_date) = '$year' group by $byCategory";
    //     return $sql;
    // }

    function filterBY_Year_and_Category($year, $byCategory)
    {

        // left join untuk get total finding OFI and NC
        $sql = "SELECT  $byCategory,
                        SUM(CASE WHEN status NOT IN ('<b>Approved</b>') AND YEAR(transaction_date) = '$year' THEN 1 ELSE 0 END) Total_Open,
                        SUM(CASE WHEN status IN ('<b>Approved</b>') AND YEAR(transaction_date) = '$year' THEN 1 ELSE 0 END) Total_Close  
                FROM    tb_PCNlist
                GROUP   BY $byCategory";
        $query = $this->db->query($sql);

        // $data = $query->result_array();

        if ($query->num_rows() > 0) {

            $data = $query->result_array();
            if ($data) {
                foreach ($data as $key => $item) {
                    $result['Name'][$key] = $item[$byCategory];
                    $result['Total_Open'][$key] = $item['Total_Open'];
                    $result['Total_Close'][$key] = $item['Total_Close'];


                }
            }
        } else {
            $result['Total_Open'][0] = 0;
            $result['Total_Close'][0] = 0;
        }
        return $result;

    }

}
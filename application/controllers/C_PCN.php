<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_PCN extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or 
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     **/
    /** ---------------------------------------------- PCN----------------------------------------------**/

    ///@see __construct()
     ///@note fungsi digunakan untuk username masuk web
     ///@attention
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('user_name') == "") {
            redirect('Auth');
        }

        $this->load->helper('date');
        $this->load->helper('file');
        $this->load->model('M_PCN');
        $this->load->model('M_application');
        $this->load->model('UserModel');  //untuk load user model hak akses menu  
        // // $this->load->library('encrypt');    
      // Cari hak akses by controller
	    $Hak_akses = $this->UserModel->get_controller_access($this->session->userdata('role_id'),'C_PCN'); 
	    if($Hak_akses->found!='found') {
		    redirect('Auth'); // Kembali ke halaman Auth
	    }

    }

    ///@see Index()
     ///@note fungsi digunakan untuk select filter dan template
     ///@attention jika select filter tidak sesuai dengan data table maka filter tidak aktif
    public function Index()
    {
        $data['any_cost_impact'] = ['YES', 'NO'];
        $data['supplier'] = $this->M_PCN->get_supplier_proc();
        $data['product'] = $this->M_PCN->get_product_qa();
        $data['supplier_name'] = $this->M_PCN->tampil_supplier_name(); //untuk select filter supplier name
        $data['cost_impact'] = $this->M_PCN->tampil_cost_impact();//untuk select filter cost impact
        $data['capacity_impact'] = $this->M_PCN->tampil_capactiy_impact();//untuk select filter capacity impact
        $data['description_of_process_change'] = $this->M_PCN->tampil_description();//untuk select filter description
        $data['email'] = $this->M_PCN->tampil_email();//untuk select filter description
       
        //setting akses sidebar
        $menu_code = $this->input->get('var');                  // Decrypt menu ID   untuk dekrip menu   
        $menu_name = $this->input->get('var2');                 // Decrypt menu ID   untuk dekrip menu name  
        $data['menu_name'] =  $menu_name; 
        $menu_akses['menu_akses']=$this->UserModel->get_menu_access($this->session->userdata('role_id'));           //Menu akses untuk munculkan menu   
        $data['hak_akses']=$this->UserModel->get_hak_access($this->session->userdata('role_id'), $menu_code);       //button akses(Add,Adit,View,Delete,Import,Export)
       
        $this->load->view('templates/header'); //Tampil header
        $this->load->view('templates/sidebar_new',$menu_akses); //Tampil Sidebar
        // $this->load->view('PCN/V_PCN',$data); // Tampil data
        $this->load->view('PCN/V_PCN', $data); // Tampil data
        $this->load->view('templates/footer'); //Tampil Footer
    }

     ///@see get view_data()
     ///@note fungsi digunakan untuk menampilkan data
     ///@attention
    function view_data()
    {

      $tables = "tb_PCN";
      $search = array('hdrid','email','transaction_date','supplier_name','prepared','check','approved','any_cost_impact','cost_impact','capacity_impact','before','after','part_number','part_name','product_name','object_type','commodity','reason_to_change','description_of_process_change','current_process','proposed_process','characteristics_affected','criteria_critical_item','trial_manufacturing_completed_start','trial_manufacturing_completed_finish','initial_sample_inpection_completed_start','initial_sample_inpection_completed_finish','initial_sample_submission_start','initial_sample_submission_finish','timing_denso_approval_start','timing_denso_approval_finish','mass_productin_starts_start','mass_productin_starts_finish','entry_example_start','entry_example_finish','stat');
      
    

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_PCN->get_tables($tables, $search, $isWhere);
    }

    ///@see view_data_where()
    ///@note fungsi digunakan untuk mencari dan menampilkan data 
    ///@attention
    function view_data_where()
    {

        $nik =$this->session->userdata('user_name'); // Menarik username dari session dan menampung nya sebagai nik

        if($this->session->userdata('rolename')=='Administrator EPCN'){
            $tables = "fn_view_pcn_register('')"; // Terbuka semua tanpa user
        }else{
            $tables = "fn_view_pcn_register('$nik')"; // Maka table yang dipakai
        }

      
        // $tables = "tb_PCN";
        $search = array('hdrid','email','transaction_date','supplier_name','prepared','checked','approved','any_cost_impact','cost_impact','capacity_impact','before_capacity','after_capacity','part_number','part_name','product_name','commodity','object_type','reason_to_change','description_of_process_change','current_process','proposed_process','characteristics_affected','criteria_critical_item','trial_manufacturing','trial_manufacturing_completed_finish','process_capability_study','process_capability_study_completed_finish','initial_sample_inspection_completed','initial_sample_inspection_completed_finish','initial_sample_submission','initial_sample_submission_finish','timing_denso_approval','timing_denso_approval_finish','m_or_p_starts','mass_production_starts_finish','m_or_p_shipment','mass_production_shipment_finish','entry_example_start','entry_example_finish','folder','stat');

        // jika memakai IS NULL pada where sql
        $isWhere = null;

        if ($_POST['searchByFromdate'] == '' || $_POST['searchByTodate'] == '') { //untuk pilihan date
           
            if($this->session->userdata('rolename')=='Administrator EPCN'){ //Jika sebagai administrator maka akan tampil semua
                 $where  = array('transaction_date >' => '1900-01-01');
            }else{
                 $where  = array('transaction_date >' => '1900-01-01');//administrator menampilkan data dari tanggal berapa ke tanggal berapa
            }
           

        } else {

            if($this->session->userdata('rolename')=='Administrator EPCN'){//Jika sebagai administrator maka akan tampil semua
                $where  = array('submission_date >' => $_POST['searchByFromdate'], 'submission_date<' => $_POST['searchByTodate']);//untuk pilihan date
            }else{
                $where  = array('submission_date >' => $_POST['searchByFromdate'], 'submission_date <' => $_POST['searchByTodate'],'nik'=>$nik);//untuk pilihan date
            }
          };
       
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');//header filter date
        echo $this->M_PCN->get_tables_where($tables, $search, $where, $isWhere);//untuk get tables where
    }

     ///@see view_data_query()
    ///@note fungsi digunakan untuk query data 
    ///@attention 
    function view_data_query()
    {

        $query  = "SELECT kategori.name_kategori AS name_kategori, subkat.* FROM subkat 
                    JOIN kategori ON subkat.id_kategori = kategori.id_kategori";
        $search = array('name_kategori', 'subkat', 'tgl_add');
        $where  = null;
        // $where  = array('name_kategori' => 'Tutorial');

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_Datatables->get_tables_query($query, $search, $where, $isWhere);//untuk connect ke datatables
    }

    //    if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
    //     }else{
    //     redirect('auth');
    //     }

     ///@see ajax_add()
     ///@note fungsi digunakan untuk menambah data
     ///@attention
    public function ajax_add()
    {
        $nik = ($this->session->userdata('user_name'));
        $name = ($this->session->userdata('nama'));
        // $product_id = $this->input->post('product_id'); //untuk add data kode id increnete
        // $kodeB = $this->M_PCN->get_product_by_id($product_id);//add data connect ke model
        // $kode = $kodeB->report_no;//fungsi kode increnete
        $kode = 'PCN-G-';//fungsi kode increnete

        // ********************* 0. Generate nomor transaksi  *********************         
        // var_dump($kode);           
        date_default_timezone_set('Asia/Jakarta');//default tanggal timezone daerah
        // $mdate = $kode.mdate('%Y/%m/', time());//tanggal,bulan,tahun
        $hdrid2 = $this->M_PCN->Max_data($kode, 'tb_PCN')->row();//untuk max data

        if ($hdrid2->hdrid == NULL) {
            // Jika belum ada maka tidak bisa diisi
            $hdrid3 = $kode . "001";
        } else {
            $hdrid3 = $hdrid2->hdrid;
            // Jika sudah ada maka naik 1 level
            $str = intval(substr($hdrid3, strlen($kode), 3)) + 1;
            $str = str_pad($str, 3, "0", STR_PAD_LEFT);
            $hdrid3 = $kode . $str;
        }
        $hdrid = $hdrid3;
        // ********************* 1. Set hdrid and status PCN  *********************
        $post_data2 = array('hdrid' => $hdrid3);//post data
        $input_nik = array('nik' =>$nik);
        // ********************* 2. Transaction date  *********************
        $post_data_transaction_date = mdate('%Y-%m-%d', time());//post data sesuai datetime
        $post_data3 = array('transaction_date' => $post_data_transaction_date);//post data sesuai tanggal
        // $issue_date = array('issue_date' => mdate('%Y-%m-%d', time()));

        // ******************** 3. Collect all data post *********************     
        $post_data = $this->input->post();//post data

        //variable untuk memasukkan data ke dalam table PCN list
        $category= $this->input->post('object_type');
        $supplier_name= $this->input->post('supplier_name');
        $product_name= $this->input->post('product_name');
        $part_name= $this->input->post('part_name');
        $part_no= $this->input->post('part_number');
        $description= $this->input->post('description_of_process_change');
        $perubahan_lama= $this->input->post('current_process');
        $perubahan_baru= $this->input->post('proposed_process');
        $mstart = $this->input->post('m_or_p_starts');
        $mshipment= $this->input->post('mass_production_starts_finish');
        $start = date("F Y", strtotime($mstart));
        $shipment = date("F Y", strtotime($mshipment));
        $criteria = $this->input->post('criteria_critical_item');
        $commodity = $this->input->post('commodity');
        $comparison =$this->input->post('description_of_process_change');
        // $attachment= $this->input->post('attach_doc');

        //variable untuk memasukkan data ke dalam table Application response
        
      
        // ******** Input data ke tb_approval
        $this->M_PCN->Input_Data_proc($this->input->post('supplier_name'),$hdrid);
        $this->M_PCN->Input_Data_finalproc($this->input->post('supplier_name'),$hdrid);
        $this->M_PCN->Input_Data_qa($product_name,$hdrid);
        $this->M_PCN->Input_Data_finalqa($product_name,$hdrid);
        $this->M_PCN->Input_Data_application($product_name,$hdrid,$part_name,$part_no,$criteria,$supplier_name,$perubahan_lama,$nik,$name,$comparison);
        

        // $this->M_PCN->send_email($hdrid);

        // cari approver di Model PCN
        $inisisator_approver= $this->M_PCN->cari_tb_approver($hdrid);

        
        // var_dump($inisisator_approver);
        // $stts_transaksi = array('stat' => $inisisator_approver->name . '-' . $inisisator_approver->position_name . '- Not Yet Temporary Approval' );

        // ********************* 4. Merge data post *********************        
        $pcn_list = array('transaction_date'=>$post_data_transaction_date,
            'no_dokumen' =>$hdrid,
            'status'=> $inisisator_approver->name .'-'. $inisisator_approver->position_name . '- Not Yet Temporary Approval', 
            'category'=>$category, 
            'supplier_name'=>$supplier_name, 
            'product_name'=>$product_name, 
            'part_name'=>$part_name, 
            'part_no'=>$part_no, 
            'description'=>$description, 
            'proses_perubahan_lama'=>$perubahan_lama, 
            'proses_perubahan_baru'=>$perubahan_baru,
            'masspro_schedule'=>$start. '-' .$shipment,
            'registered'=>$post_data_transaction_date,
            'commodity'=>$commodity,
            // 'attachment'=>$attachment['attach_doc'],
          );

        $application = array('transaction_date'=>$post_data_transaction_date,
            'pcn_number'=>$hdrid,
            'supplier'=>$supplier_name,
            'part_number'=>$part_no,
            'part_name'=>$part_name,
            'product_name'=>$product_name,
            'criteria_critical_item'=>$criteria,
            'current_process'=>$perubahan_lama,
            'hdrid'=>$hdrid,
            'user_nik'=>$nik);
        
        $stat ='unapproved';
        $post_status = array('stat' => $stat);
        $post_pcnlist = array_merge($pcn_list, $pcn_list);
        $post_application= array_merge($application,$application);
        $post_datamerge = array_merge($post_data, $post_data2, $post_data3, $post_status,$input_nik);

        // ********************* 5. Simpan data     *********************
        $this->M_PCN->Input_Data($post_datamerge, 'tb_PCN');
        $this->M_PCN->Input_Data($pcn_list, 'tb_PCNlist');
        // $this->M_PCN->Input_Data($application, 'tb_application');

        // $this->M_PCN->update_send_email($hdrid);

        // ********************* 6. Upload file jika ada  *********************   
        // if (!empty($_FILES['file']['name'])) {
        //     $this->upload_file_attach('file', $hdrid, 'tb_PCN');
        // }

        // **********************  Upload file attach file *********************   
        if(!empty($_FILES['attach_doc1']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('attach_doc1',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['attach_doc2']['name']))//jika document sudah upload maka document bisa ditampilkan
       {
         $this->upload_file_attach('attach_doc2',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
       }
        if(!empty($_FILES['attach_doc3']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc3',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc4']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc4',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc5']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc5',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc6']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc6',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc7']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc7',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc8']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc8',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc9']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc9',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc10']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc10',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc11']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc11',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc12']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc12',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc13']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc13',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc14']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc14',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc15']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc15',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc16']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc16',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc17']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc17',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc18']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc18',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc19']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc19',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc20']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc20',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc21']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc21',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc22']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc22',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc23']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc23',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc24']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc24',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc25']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc25',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc26']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc26',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc27']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc27',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc28']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc28',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc29']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc29',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }



        // NOTE:: LEMPAR HDRID KEDALAM TABLE LAIN
        $post_data4 = array('no_document' => $hdrid);


        $post_datamerge2 = array_merge($post_data,$post_data4);//array merge post 2 dan post 4
        // $this->M_PCN->Input_Data($post_datamerge2, 'tb_PCNlist');//input data ke table tb response
        // $this->M_PCN->Input_Data($post_datamerge2, 'tb_input_effectiveness');//input data ke table tb input effectiveness

        // Tambah data approver
        // $this->M_PCN->Input_Data_Approver($post_data_transaction_date,$hdrid3,$this->input->post('supplier_name'));

        // Tambah data CC'
        // $this->M_PCN->Input_Data2($post_data_transaction_date,$hdrid3, $post_problem_category_id, $product_id2);

        $msg = "Succes Save $hdrid";//jika add berhasil akan muncul notif success

        // ********************* 6. Upload file jika ada  *********************   
        if(!empty($_FILES['attach_doc1']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc1',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc2']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc2',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc3']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc3',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc4']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc4',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc5']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc5',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc6']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc6',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc7']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc7',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc8']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc8',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc9']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc9',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc10']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc10',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc11']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc11',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc12']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc12',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc13']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc13',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc14']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc14',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc15']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc15',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc16']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc16',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc17']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc17',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc18']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc18',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc19']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc19',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc20']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc20',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc21']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc21',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc22']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc22',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc23']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc23',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc24']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc24',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc25']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc25',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc26']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc26',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc27']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc27',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc28']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc28',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc29']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc29',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
                
      
        //  $juml = $this->M_PCN->Count_Data_proc($this->input->post('supplier_name'),$hdrid);
        //       var_dump($juml);
        $data['status'] = $msg;//status
        $data['hdrid'] = $hdrid;//code incnrenete

        // $data['product_id'] = $product_id2;//product id

        // Send email notifikasi approve ke next approver
        // $next_app = $this->M_PCN->cari_tb_approver($hdrid);
        // $all_app = $this->M_PCN->cari_all_approver($hdrid,$next_app->position_code);
        // $post_data =array('status_transaction' => 'Need Approve','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$next_app->nik,'name'=>$next_app->name,'department_code'=>$next_app->department_code,'department_name'=>$next_app->department_name,'office_email'=>$next_app->office_email,'position_code'=>$next_app->position_code,'position_name'=>$next_app->position_name,'subject_email'=>'Need Approve','body_content'=>'','comment'=>'','cc_email'=>$all_app->office_email);
        // $post_datamerge=array_merge($post_data,$post_data);   
        // $where = array('trxid' => 0);        
        // $status_email = $this->M_PCN->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
        
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    
     ///@see ajax_send_back()
     ///@note fungsi digunakan untuk approve data
     ///@attention
     function ajax_send_back()
     {
        $name = str_replace(' ', '', $this->input->post('name'));
        $problem_id = str_replace(' ', '', $this->input->post('problem_id'));
        $nikreq = $this->input->post('nikreq');
        $reason = $this->input->post('reason');
        //  $position_name = str_replace(' ', '', $this->input->post('position_name'));
        //  $position_code = str_replace(' ', '', $this->input->post('position_code'));
 
        //  date_default_timezone_set('Asia/Jakarta');
 
         // menampung data untuk approve
        //  $data = array(
        //   'problem_id' => $problem_id,
        //   'reason' => null,
        //   'date_approve' => null,
        //   'stat' => 'unapprove'
        //  );
        $data = array(
          'problem_id' => $problem_id,
          'reason' => null,
          'date_approve' => null,
          'stat' => 'unapprove'
         );
             
         // Where condition
         $where = array(
             'problem_id' => $problem_id
         );
         
         $status = $this->M_PCN->Send_Back_Data($where, $data, $reason, 'tb_approval', $name);

          // Send email notifikasi rejected ke user(Procurement requester pcn)
          $requester = $this->M_PCN->cari_requester($nikreq);
          $status_transaction = "Send back By:".$name." With Reason: ".$reason ;
          $post_data =array('status_transaction' => 'Rejected','hdrid'=>$problem_id,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$requester->nik_superiorprocurement	,'name'=>$requester->name_superiorprocurement,'department_code'=>$requester->kode_section_superiorprocurement,'department_name'=>$requester->name_section_superiorprocurement,'office_email'=>$requester->email_superiorprocurement,'position_code'=>'','position_name'=>'','subject_email'=>'Send Back','body_content'=>$status_transaction,'comment'=>'','cc_email'=>'');
          $post_datamerge=array_merge($post_data,$post_data);   
          $where = array('trxid' => 0);        
          $status_email = $this->M_PCN->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
         
         // $this->M_approver->Update_Data_Approve($problem_id);
          $data['status'] = $status;
          $this->output->set_content_type('application/json')->set_output(json_encode($data));
 
     }

     ///@see ajax_approve()
     ///@note fungsi digunakan untuk approve data
     ///@attention
    function ajax_approve()
      {
        $hdrid = $this->input->post('hdrid');
        $no_dokumen = $this->input->post('no_dokumen');
        $name = str_replace(' ', '', $this->input->post('name'));
        $problem_id = str_replace(' ', '', $this->input->post('problem_id'));
        $position_name = str_replace(' ', '', $this->input->post('position_name'));
        $position_code = str_replace(' ', '', $this->input->post('position_code'));
        $reason = $this->input->post('reason');

        date_default_timezone_set('Asia/Jakarta');

        // menampung data untuk approve
        $data = array(
          'date_approve' => mdate('%Y-%m-%d %H:%i:%s', time()), 
          'problem_id' => $problem_id,
          'position_code' => $position_code,
          // 'position_name' => $position_name,
          'stat' => 'Approved',
          'reason' => $reason
        );
        $dataemail = array(
          'status_transaction'=>'Email Sent',
          'hdrid'=>$hdrid,
          'position_code'=>$position_code,
          'position_name'=>$position_name,
        );  

        // Where condition
        $where = array(
            'problem_id' => $problem_id,
            'position_code' => $position_code,
        );

        $where_email = array(
          'hdrid'=>$hdrid,
          'position_code'=>$position_code,
        );
        
        // $where0 = array('no_dokumen' => $hdrid);
        // $PCNlist = $this->M_PCN->Get_Where($where0, 'tb_PCNlist')->row();
        // var_dump($PCNlist);
        // $where_pcn = array('hdrid'=>$no_dokumen);
        
        // if($PCNlist->status == "Approved"){
        //   $status_pcn= array('stat'=> 'approved');

        //   $this->M_PCN->Update_Data($where_pcn, $status_pcn, 'tb_PCN');

        // }else{
        //   $status_pcn= array('stat'=> 'process');

        //   $this->M_PCN->Update_Data($where_pcn, $status_pcn, 'tb_PCN');
        // }
        // $this->M_PCN->update_approve_email($hdrid);
        // $status_email = $this->M_PCN->Update_Data($where_email, $dataemail, 'tb_mail_trigger');

        $status = $this->M_PCN->Update_Data_Approve_ver2($where, $data, 'tb_approval',$position_code, $name);
        // $currentDate=mdate('%Y-%m-%d',time());
        // $update_stat=$this->M_PCN->Update_stat($problem_id,$currentDate);
        // // var_dump($update_stat);
        // $next_app = $this->M_PCN->cari_tb_approver($problem_id);
        // $all_app = $this->M_PCN->cari_all_approver($problem_id,$next_app->position_code);
        // // var_dump($all_app);
        // // Send email notifikasi approve ke next approver
        // if ($next_app->name=='All') {
        //   // Send email notifikasi rejected ke user(Procurement requester pcn)
        //   $requester = $this->M_PCN->cari_requester($nikreq);
        //   $status_transaction = "PCN Complete" ;
        //   $post_data =array('status_transaction' => 'PCN Complete','hdrid'=>$problem_id,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$requester->nik_superiorprocurement	,'name'=>$requester->name_superiorprocurement,'department_code'=>$requester->kode_section_superiorprocurement,'department_name'=>$requester->name_section_superiorprocurement,'office_email'=>$requester->email_superiorprocurement,'position_code'=>'','position_name'=>'','subject_email'=>'PCN Complete','body_content'=>$status_transaction,'comment'=>'','cc_email'=>'');
        //   $post_datamerge=array_merge($post_data,$post_data);   
        //   $where = array('trxid' => 0);        
        //   $status_email = $this->M_PCN->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
        // }else {
        //     // Selain poscode 4 send email karena position 4 akan aktif setelah application response selesai
        //   if ($next_app->position_code !='4') {
        //     $post_data =array('status_transaction' => 'Need Approve','hdrid'=>$problem_id,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$next_app->nik,'name'=>$next_app->name,'department_code'=>$next_app->department_code,'department_name'=>$next_app->department_name,'office_email'=>$next_app->office_email,'position_code'=>$next_app->position_code,'position_name'=>$next_app->position_name,'subject_email'=>'Need Approve','body_content'=>'Please click link below and approve','comment'=>'','cc_email'=>$all_app->office_email);
        //     $post_datamerge=array_merge($post_data,$post_data);   
        //     $where = array('trxid' => 0);        
        //     $status_email = $this->M_PCN->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
        //   }else {
        //     // Send email ke responden application response

        //     $list_res = $this->M_application->cari_responden($hdrid)->row();
        //     // $list_res = $this->M_application->responden_no_action($pcn_number);
        //     $cc_email = $list_res->qc_inspection_departement.';'.$list_res->pe_departement.';'.$list_res->mfg_departement.';'.$list_res->pc_departement.';'.$list_res->qa_departement;
        //     // var_dump($cc_email);
        //     $post_data =array('status_transaction' => 'Need Your Response','hdrid'=>$pcn_number,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>'','name'=>'','department_code'=>'','department_name'=>'','office_email'=>$list_res->creator,'position_code'=>'','position_name'=>'','subject_email'=>'Need Your Response to Application Response','body_content'=>'','comment'=>'','cc_email'=>$cc_email);
        //     $post_datamerge=array_merge($post_data,$post_data);   
        //     $where = array('trxid' => 0);        
        //     $status_email = $this->M_application->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
        //   }
        // }
        
        // $this->M_approver->Update_Data_Approve($problem_id);
         $data['status'] = "Approve Berhasil";
         $this->output->set_content_type('application/json')->set_output(json_encode($data));

      }

    ///@see ajax_delete_attachment()
     ///@note fungsi digunakan untuk delete data
     ///@attention
     public function ajax_delete_attachment()
     {
           $where = array('hdrid' => $this->input->post('hdrid'));//untuk delete auto increnete
   
           if ($this->input->post('attachment')=='1') {
             $data = array('attach_doc1' => '');
           }else if($this->input->post('attachment')=='2'){
             $data = array('attach_doc2' => '');
           }else if($this->input->post('attachment')=='3'){
             $data = array('attach_doc3' => '');
           }else if($this->input->post('attachment')=='4'){
             $data = array('attach_doc4' => '');
           }else if($this->input->post('attachment')=='5'){
             $data = array('attach_doc5' => '');
           }else if($this->input->post('attachment')=='6'){
             $data = array('attach_doc6' => '');
           }else if($this->input->post('attachment')=='7'){
            $data = array('attach_doc7' => '');
          }else if($this->input->post('attachment')=='8'){
            $data = array('attach_doc8' => '');
          }else if($this->input->post('attachment')=='9'){
            $data = array('attach_doc9' => '');
          }else if($this->input->post('attachment')=='10'){
            $data = array('attach_doc10' => '');
          }else if($this->input->post('attachment')=='11'){
            $data = array('attach_doc11' => '');
          }else if($this->input->post('attachment')=='12'){
            $data = array('attach_doc12' => '');
          }else if($this->input->post('attachment')=='13'){
            $data = array('attach_doc13' => '');
          }else if($this->input->post('attachment')=='14'){
            $data = array('attach_doc14' => '');
          }else if($this->input->post('attachment')=='15'){
            $data = array('attach_doc15' => '');
          }else if($this->input->post('attachment')=='16'){
            $data = array('attach_doc16' => '');
          }else if($this->input->post('attachment')=='17'){
            $data = array('attach_doc17' => '');
          }else if($this->input->post('attachment')=='18'){
            $data = array('attach_doc18' => '');
          }else if($this->input->post('attachment')=='19'){
            $data = array('attach_doc19' => '');
          }else if($this->input->post('attachment')=='20'){
            $data = array('attach_doc20' => '');
          }else if($this->input->post('attachment')=='21'){
            $data = array('attach_doc21' => '');
          }else if($this->input->post('attachment')=='22'){
            $data = array('attach_doc22' => '');
          }else if($this->input->post('attachment')=='23'){
            $data = array('attach_doc23' => '');
          }else if($this->input->post('attachment')=='24'){
            $data = array('attach_doc24' => '');
          }else if($this->input->post('attachment')=='25'){
            $data = array('attach_doc25' => '');
          }else if($this->input->post('attachment')=='26'){
            $data = array('attach_doc26' => '');
          }else if($this->input->post('attachment')=='27'){
            $data = array('attach_doc27' => '');
          }else if($this->input->post('attachment')=='28'){
            $data = array('attach_doc28' => '');
          }else if($this->input->post('attachment')=='29'){
            $data = array('attach_doc29' => '');
          }
   
           $this->M_PCN->Update_Data($where,$data,'tb_PCN');//untuk delete table PCNLIST
   
           $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
           // return value array
           $this->output->set_content_type('application/json')->set_output(json_encode($data));
   
       }

    // Delete directory function
    function deleteDir($dirPath) {
      if (! is_dir($dirPath)) {
          throw new InvalidArgumentException("$dirPath must be a directory");
      }
      if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
          $dirPath .= '/';
      }
      $files = glob($dirPath . '*', GLOB_MARK);
      foreach ($files as $file) {
          if (is_dir($file)) {
              $this->deleteDir($file);
          } else {
              unlink($file);
          }
      }
      rmdir($dirPath);
    }


     ///@see ajax_reject()
     ///@note fungsi digunakan untuk reject data
     ///@attention
    function ajax_reject()
    {
      $hdrid = $this->input->post('hdrid');
      $name = str_replace(' ', '', $this->input->post('name'));
      $reason = $this->input->post('reason');
      $position_code = str_replace(' ', '', $this->input->post('position_code')); 
      $nikreq = $this->input->post('nikreq');
      $rejected_by = $this->input->post('rejected_by');

      $status_pcn= array('stat'=> 'rejected');
      
      $where0 = array(
        'no_dokumen' => $hdrid
      );
      $PCNlist = $this->M_PCN->Get_Where($where0, 'tb_PCNlist')->row();

      // Mengambil data PCN ter-reject
      $where = array(
        'hdrid' => $hdrid
      );
      $PCN = $this->M_PCN->Get_Where($where, 'tb_PCN')->row();

      // jika approval pertama dan bukan hasil send back
      if($position_code == 1 && $PCNlist->status == "Not Registered"){
        // menghapus attach_doc penyimpanan PCN yang ter-reject
        $this->deleteDir($PCN->attach_doc);
        
        // menghapus data di PCN ter-reject pada tb_PCN
        $where1 = array(
          'hdrid' => $hdrid
        );
        $this->M_PCN->Delete_Data($where1,'tb_PCN');

        // menghapus data di PCN ter-reject pada tb_application
        $where1 = array(
          'hdrid' => $hdrid
        );
        $this->M_PCN->Delete_Data($where1,'tb_application');
        
        // menghapus data di PCN ter-reject pada tb_PCNlist
        $where2 = array(
          'no_dokumen' => $hdrid
        );
        $this->M_PCN->Delete_Data($where2, 'tb_PCNlist');
        
        // menghapus data di PCN ter-reject pada tb_approval
        $where3 = array(
          'problem_id' => $hdrid
        );
        $this->M_PCN->Delete_Data($where3,'tb_approval');
        
        // menghapus data di PCN ter-reject pada tb_tooling
        $where4 = array(
          'pcn_number' => $hdrid
        );
        $this->M_PCN->Delete_Data($where4,'tb_tooling');
        
        // menghapus data di PCN ter-reject pada tb_PCN
        $where5 = array(
          'pcn_number' => $hdrid
        );
        $this->M_PCN->Delete_Data($where5, 'tb_PCN');
        
      }else{
        // jika mereject pcn dengan posisi approve bukan yang pertama atau hasil sendback
        $status = "Rejected By <b>" . $name . "</b><br> <b>Reason:</b> " . $reason;
        $data = array(
            'status' => $status,
            'current_flow_pic' => 'DONE'  
        );
        // $data=array('stat' => $status_reject);
        $where = array(
          'no_dokumen' => $hdrid
        );
        // Update data tb_PCNlist
        $this->M_PCN->Update_Data($where, $data, 'tb_PCNlist');
  
  
        //update data reject ke tb approval
        $data2 = ([
          'stat' => 'Rejected',
          'reason' => $reason,
          'date_approve' => mdate('%Y-%m-%d %H:%i:%s', time())
        ]);
        $where2 = array(
          'problem_id' => $hdrid,
          'stat' => 'unapprove',
        );
        
        $where_pcn = array(
          'hdrid'=>$hdrid
        );
        
        // Update data tb_approval        
        $this->M_PCN->Update_Data($where2, $data2, 'tb_approval');
        $this->M_PCN->Update_Data($where_pcn, $status_pcn, 'tb_PCN');
      }

       // Send email notifikasi rejected ke user(Procurement requester pcn)
      //  $requester = $this->M_PCN->cari_requester($nikreq);
      //  $status_transaction = "Rejected By:".$rejected_by." With Reason: ".$reason ;
      //  $post_data =array('status_transaction' => 'Rejected','hdrid'=>$hdrid,'transaction_date'=> mdate('%Y-%m-%d %H:%i:%s',time()),'nik'=>$requester->nik_superiorprocurement	,'name'=>$requester->name_superiorprocurement,'department_code'=>$requester->kode_section_superiorprocurement,'department_name'=>$requester->name_section_superiorprocurement,'office_email'=>$requester->email_superiorprocurement,'position_code'=>'','position_name'=>'','subject_email'=>'Rejected','body_content'=>$status_transaction,'comment'=>'','cc_email'=>'');
      //  $post_datamerge=array_merge($post_data,$post_data);   
      //  $where = array('trxid' => 0);        
      //  $status_email = $this->M_PCN->Update_Data($where, $post_datamerge, 'tb_mail_trigger');
      
      // $data['stat'] = $reason;
      $data['stat'] = 'Berhasil direject';

      $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    ///@see ajax_update()
    ///@note fungsi digunakan untuk update data
    ///@attention
    public function ajax_update()
    {

        // ********************* 1. Collect data post *********************
        $post_data = $this->input->post();//post update
        $hdrid = $this->input->post('hdrid');//update di code increnete
        // $no_dokumen = $this->input->post('no_dokumen');
        $get_app = $this->M_PCN->get_application();
        $no_dokumen = $this->M_PCN->update_pcnlist($hdrid);
        $no = $no_dokumen[0]['no_dokumen'];
        // var_dump($no);

        //declare field di PCN 
        $post_data_transaction_date = mdate('%Y-%m-%d', time());
        $category= $this->input->post('object_type');
        $supplier_name= $this->input->post('supplier_name');
        $product_name= $this->input->post('product_name');
        $part_name= $this->input->post('part_name');
        $part_no= $this->input->post('part_number');
        $description= $this->input->post('description_of_process_change');
        $perubahan_lama= $this->input->post('current_process');
        $perubahan_baru= $this->input->post('proposed_process');
        $mstart = $this->input->post('m_or_p_starts');
        $mshipment= $this->input->post('mass_production_starts_finish');
        $start = date("F Y", strtotime($mstart));
        $shipment = date("F Y", strtotime($mshipment));
        $criteria = $this->input->post('criteria_critical_item');
        $commodity = $this->input->post('commodity');
        $comparison =$this->input->post('description_of_process_change');

        //masuk data ke PCN list
        $pcn_list = array('transaction_date'=>$post_data_transaction_date,
          'category'=>$category, 
          'supplier_name'=>$supplier_name, 
          'product_name'=>$product_name, 
          'part_name'=>$part_name, 
          'part_no'=>$part_no, 
          'description'=>$description, 
          'proses_perubahan_lama'=>$perubahan_lama, 
          'proses_perubahan_baru'=>$perubahan_baru,
          'masspro_schedule'=>$start. '-' .$shipment,
          'registered'=>$post_data_transaction_date,
          'commodity'=>$commodity,
          // 'attachment'=>$attachment['attach_doc'],
        ); 

        $application = array('transaction_date'=>$post_data_transaction_date,
            'supplier'=>$supplier_name,
            'part_number'=>$part_no,
            'part_name'=>$part_name,
            'product_name'=>$product_name,
            'criteria_critical_item'=>$criteria,
            'current_process'=>$perubahan_lama,
            'comparison_detail'=>$comparison
          );
        
        $msg = "success Update";//notif jika diupdate maka success

        // **********************  Upload file (filename,hdrid,table)  *********************   
        // if (!empty($_FILES['file']['name'])) {
        //     $this->upload_file_attach('file', $hdrid, 'tb_PCN');
        // }

        // **********************  Upload file attach_picture  *********************   
        // **********************  Upload file attach file *********************   
        if(!empty($_FILES['attach_doc1']['name']))//jika document sudah upload maka document bisa ditampilkan
        {
          $this->upload_file_attach('attach_doc1',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
        }
        if(!empty($_FILES['attach_doc2']['name']))//jika document sudah upload maka document bisa ditampilkan
       {
         $this->upload_file_attach('attach_doc2',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
       }
        if(!empty($_FILES['attach_doc3']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc3',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc4']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc4',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc5']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc5',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc6']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc6',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc7']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc7',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc8']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc8',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc9']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc9',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc10']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc10',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc11']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc11',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc12']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc12',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc13']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc13',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc14']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc14',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc15']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc15',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc16']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc16',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc17']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc17',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc18']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc18',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc19']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc19',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc20']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc20',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc21']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc21',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc22']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc22',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc23']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc23',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc24']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc24',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc25']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc25',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc26']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc26',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc27']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc27',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc28']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc28',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }
        if(!empty($_FILES['attach_doc29']['name']))//jika document sudah upload maka document bisa ditampilkan
              {
                $this->upload_file_attach('attach_doc29',$hdrid,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
              }


                // *********************  Merge data All post *********************
                // $post_datamerge=array_merge($post_data,$post_data2);
                // $post_datamerge = array_merge($post_data, $post_data);
                   $post_pcnlist = array_merge($pcn_list, $pcn_list);
                   $post_application= array_merge($application,$application);
                // **********************  Simpan data ************************ 
                
                $where = array('hdrid' => $hdrid);
                $where2 = array('no_dokumen' => $no);
            
                // $this->M_PCN->update_pcnlist($hdrid,$category,$supplier_name,$product_name,$part_name,$part_no,$description,$perubahan_baru,$perubahan_lama,$start,$shipment,$post_data_transaction_date,$commodity);
                $this->M_PCN->Update_Data($where, $post_data, 'tb_PCN');
                $this->M_PCN->Update_Data($where2, $post_pcnlist, 'tb_PCNlist');
                $this->M_PCN->Update_Data($where, $post_application, 'tb_application');

                $data['status'] = "berhasil update";
                $data['hdrid'] = $hdrid;


                // return value array
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }

            ///@see ajax_sendDraft()
            ///@note fungsi digunakan untuk membuat draft
            ///@attention
    //         public function ajax_sendDraft()
    //         {

    //             // ********************* 1. Collect data post *********************
    //             $hdrid = $this->input->post('hdrid');
    //             $nik = $this->input->post('nik');
    //             $nik2 = $this->input->post('nik2');
                

    //             $msg = "success Update";

    //             // *********************  Cari atasannya inisiator *********************      
    //             // $inisisator_approver= $this->M_PCN->cari_tb_approver($hdrid);

    //             $where = array('problem_id' => $hdrid,'nik' => $nik,'position_code' =>'1');      
    //             $post_data_approval = array('date_approve' => mdate('%Y-%m-%d %h:%i', time()));      
    //             $this->M_PCN->Update_Data($where, $post_data_approval, 'tb_approval');

    //             // update responsible antisipasi jika ada kesalahan
    //             $this->M_PCN->Update_Data_Approver($hdrid,$nik2);

    //             // cari approver
    //             $inisisator_approver= $this->M_PCN->cari_tb_approver($hdrid);
                  
    //             // *********************  Merge data All post *********************
    //             // $post_datamerge=array_merge($post_data,$post_data2);

    //             $post_data = array('draft' => 'Send');
    //             $post_data2 = array('status' => 'Open');

    //             $post_data3 = array('status_transaction' => 'Waiting approve by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')');
                
    //             $post_datamerge = array_merge($post_data, $post_data2,$post_data3);
    //             $pcn_number = array('pcn_number'=>$hdrid);
    //             // **********************  Upload file attach_picture  *********************   name2
    //             // **********************  Upload file attach file *********************   
    //             if(!empty($_FILES['attach_doc1']['name']))//jika document sudah upload maka document bisa ditampilkan
    //             {
    //               $this->upload_file_attach('attach_doc1',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //             }
    //             if(!empty($_FILES['attach_doc2']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc2',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc3']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc3',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc4']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc4',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc5']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc5',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc6']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc6',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc7']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc7',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc8']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc8',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc9']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc9',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc10']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc10',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc11']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc11',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc12']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc12',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc13']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc13',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc14']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc14',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc15']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc15',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc16']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc16',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc17']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc17',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc18']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc18',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc19']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc19',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc20']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc20',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc21']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc21',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc22']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc22',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc23']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc23',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc24']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc24',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc25']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc25',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc26']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc26',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }




        
    //     // **********************  Simpan data ************************        
    //     $where = array('hdrid' => $hdrid);
    //     $this->M_PCN->Update_Data($where, $post_datamerge, 'tb_PCN');

    //     // $data['status'] = "berhasil dikirim";
    //     $data['status'] = $hdrid;
    //     $data['name'] = $inisisator_approver->name ;
    //     $data['position_name'] = $inisisator_approver->position_name;
    //     $data['office_email'] = $inisisator_approver->office_email;

    //     $data['status_transaction'] ='Need approval by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')';

    //     // return value array
    //     $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
    // }

    // ///@see ajax_sendDraft2()
    // ///@note fungsi digunakan untuk membuat draft
    // ///@attention
    // public function ajax_sendDraft2()
    // {

    //     $product_id = $this->input->post('product_id');
    //     $kodeB = $this->M_PCN->get_product_by_id($product_id);
    //     $kode = $kodeB->report_no;

    //     // ********************* 0. Generate nomor transaksi  *********************         
    //     // var_dump($kode);           
    //     $mdate = $kode . mdate('%Y/%m/', time());
    //     $hdrid2 = $this->M_PCN->Max_data($mdate, 'tb_PCN')->row();

    //     if ($hdrid2->hdrid == NULL) {
    //         // Jika belum ada
    //         $hdrid3 = $mdate . "001";
    //     } else {
    //         $hdrid3 = $hdrid2->hdrid;
    //         // Jika sudah ada maka naik 1 level
    //         $str = intval(substr($hdrid3, strlen($mdate), 3)) + 1;
    //         $str = str_pad($str, 3, "0", STR_PAD_LEFT);
    //         $hdrid3 = $mdate . $str;
    //     }
    //     $hdrid = $hdrid3;

    //     // ********************* 1. Set hdrid  *********************
    //     $post_data2 = array('hdrid' => $hdrid3);

    //     // ********************* 2. Transaction date  *********************
    //     $post_data3 = array('transaction_date' => mdate('%Y-%m-%d', time()));
    //     $post_data_transaction_date = mdate('%Y-%m-%d', time());

    //     // ******************** 3. Collect all data post *********************     
    //     $post_data = $this->input->post();
    //     $post_data5 = $this->input->post('group_product_id');
    //     $post_problem_category_id = $this->input->post('problem_category_id');
    //     $product_id2 = $this->input->post('product_id');

    //     $post_data_draft = array('draft' => 'Send');
    //     $updateStatus = array('status' => 'Open');

    //     // Imput data approver
    //     $this->M_PCN->Input_Data_Approver($post_data_transaction_date,$hdrid,$this->input->post('nik'),$this->input->post('name'),$this->input->post('section1'),$this->input->post('email1'),$this->input->post('nik2'),$this->input->post('name2'),$this->input->post('section2'),$this->input->post('email2'));
        
    //     $where = array('problem_id' => $hdrid,'position_code' =>'1');    
    //     $post_data_approval = array('date_approve' => mdate('%Y-%m-%d %h:%i', time()));
    //     $this->M_PCN->Update_Data($where, $post_data_approval, 'tb_approval');
        
    //     // update tanggal approve inisiator
    //     $inisisator_approver= $this->M_PCN->cari_tb_approver($hdrid);

    //     // Cari atasan  inisiator
    //     // $inisisator_approver= $this->M_PCN->cari_tb_approver($hdrid);
    //     $post_data4 = array('status_transaction' => 'Waiting approve by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')');
       
    //     // $msg = "success save"; 

    //     // ********************* 4. Merge data post *********************        
    //     $post_datamerge = array_merge($post_data, $post_data2, $post_data3,$post_data_draft,$updateStatus,$post_data4);

    //     // ********************* 5. Simpan data     *********************

    //     $this->M_PCN->Input_Data($post_datamerge, 'tb_PCN');

    //     // **********************  Upload file attach_picture  *********************   
    //     // **********************  Upload file attach file *********************   
    //     if(!empty($_FILES['attach_doc1']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc1',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc2']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc2',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc3']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc3',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc4']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc4',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc5']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc5',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc6']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc6',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc7']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc7',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc8']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc8',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc9']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc9',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc10']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc10',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc11']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc11',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc12']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc12',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc13']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc13',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc14']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc14',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc15']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc15',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc16']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc16',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc17']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc17',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc18']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc18',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc19']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc19',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc20']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc20',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc21']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc21',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc22']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc22',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc23']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc23',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc24']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc24',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc25']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc25',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }
    //     if(!empty($_FILES['attach_doc26']['name']))//jika document sudah upload maka document bisa ditampilkan
    //           {
    //             $this->upload_file_attach('attach_doc26',$pcn_number,'tb_PCN');//jika upload data dengan attach file sesual file maka data sudah masuk
    //           }



    //     // NOTE:: LEMPAR HDRID KEDALAM TABLE LAIN
    //     $post_data4 = array('problem_id' => $hdrid);

    //     $post_datamerge2 = array_merge($post_data2, $post_data4);

    //     $this->M_PCN->Input_Data($post_datamerge2, 'tb_response');

    //     $this->M_PCN->Input_Data($post_datamerge2, 'tb_input_effectiveness');
        
    //     // ********************* 6. Upload file jika ada  *********************   
    //     if (!empty($_FILES['file']['name'])) {
    //         $this->upload_file_attach('file', $hdrid, 'tb_PCN');
    //     }
      
    //     $data['status'] =$hdrid;
    //     $data['status_transaction'] ='Need approval by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')';

    //     // return value array
    //     $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
    // }


     ///@see ajax_delete()
     ///@note fungsi digunakan untuk delete data
     ///@attention
     public function ajax_delete()
     {
   
        $where = array('hdrid' => $this->input->post('hdrid'));//untuk delete auto increnete
        $where1 = array('no_dokumen' =>$this->input->post('hdrid'));
        $where0 = array('problem_id' =>$this->input->post('hdrid'));
        $this->M_PCN->Delete_Data($where1,'tb_PCNlist');//untuk delete table PCN
        $this->M_PCN->Delete_Data($where0,'tb_approval');//untuk delete table PCN
        $this->M_PCN->Delete_Data($where,'tb_PCN');//untuk delete table PCN
        $this->M_PCN->Delete_Data($where,'tb_application');//untuk delete table PCN
        $this->M_PCN->Delete_Data($where,'tb_isir');//untuk delete table PCN
        $this->M_PCN->Delete_Data($where,'tb_isir_list');//untuk delete table PCN
        $data['status']="berhasil dihapus";//jika sudah berhasil dihapus maka data akan kosong
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
   
       }

      ///@see ajax_getbyhdrid()
     ///@note fungsi digunakan untuk auto increnete
     ///@attention jika sudah auto increnete maka setiap data ditambah akan bertambah setiap nomor increnete
     function ajax_getbyhdrid(){      

      $hdrid=$this->input->get('hdrid');//untuk auto increnete
      $data=$this->M_PCN->ajax_getbyhdrid($hdrid,'tb_PCN')->row();//untuk request auto increnete
      echo json_encode($data);

  }


      ///@see get form_approver_link_mail
     ///@note fungsi digunakan memberi data ke email
     ///@attention 
     function form_approver_link_mail(){
        
      $id_user_reg=$this->input->get('var1'); //untuk menginput id username variable 1
      $nik=$this->input->get('var2'); //untuk menginput id username variable 2
      
      $data['get_approver']=$this->M_PCN->get_approver($id_user_reg); //untuk request approve
      $data['get_requester']=$this->M_PCN->get_requester($id_user_reg); //untuk request auto increnete
      $data['data']=$this->M_PCN->get_data($id_user_reg); //untuk request nomor pcn
      
      $this->load->view('email/V_PCN',$data); // Tampil data
    
  }

    ///@see upload_file_attach
    ///@note fungsi attach file bisa diupload
    ///@attention jika path atau ukuran file tidak sesuai function maka attach filenya tidak bisa terisi
    function upload_file_attach($filename,$hdrid,$table){
      // $hdrid= $this->input->post('hdrid');
      
      if(!empty($_FILES[$filename]['name']))//jika data bisa attach file
      {
          $config['upload_path'] = './assets/upload/PCN/';   //path file
          $config['allowed_types'] = 'gif|jpg|png|pdf|xlsx|xls|tif|xlsm';      //jenis file   
          $config['overwrite'] = True; //jika file sudah bisa masuk path
          $config['max_size']  = '20000';//maxsimal upload
          $config['max_width']  = '1024'; //maksimal lebar form
          $config['max_height']  = '768'; //maskimal tinggi form
          // $config['file_name']=$hdrid.'_'.$filename; //untuk upload attach file
          $config['encrypt_name']=FALSE;
          $this->load->library('upload', $config);//untuk melihat hasil attach file
          $this->upload->initialize($config); //untuk melihat hasil attach file sudah terinput

          if ( ! $this->upload->do_upload($filename)){//untuk mengecek status attach file jika sudah masuk
              // $status = "error";
               $msg = $this->upload->display_errors(); //jika attach file di upload tidak sesuai maka attac file tidak masuk
          }
          else{
               $msg = "success upload"; //jika attach file benar maka berhasil upload

              $dataupload = $this->upload->data();
              // $status = "success";
              // $msg = $dataupload['file_name']." berhasil diupload";                    
              $data_update = array($filename =>$dataupload['file_name']);  //data sudah update 
              // $update_attach = array('attachment' =>$dataupload['file_name']);  //data sudah update 
              $where = array('hdrid' => $hdrid);  //untuk update auto increnete      
              $this->M_PCN->Update_Data($where,$data_update,$table);
              // $this->M_PCN->Update_Data($where2,$update_attach,'tb_PCNlist');
              // $this->db->insert('tb_PCNlist', array('attachment'=>$dataupload['file_name']));

          }

      }

  }


      ///@see import()
     ///@note fungsi digunakan import data
     ///@attention jika file import path file tidak excel maka tidak bisa diimport
     public function import() {

      // $this->form_validation->set_rules('excel', 'File', 'trim|required');
  
      if ($_FILES['excel']['name'] == '') { //parameter untuk membuat data bisa diimport
  
        $this->session->set_flashdata('msg', 'File harus diisi'); //jika import file harus terisi
              redirect('C_PCN');
  
      } else {
  
        $config['upload_path'] = './assets/excel/PCN'; //untuk path import data
        $config['allowed_types'] = 'xls|xlsx|tif'; //type file import data
        
        $this->load->library('upload', $config); //untuk menampilkan hasil import data
        
        if ( ! $this->upload->do_upload('excel')){ //jika tipe data tidak excel maka akan error
          $error = array('error' => $this->upload->display_errors());
        }
        else{
  
          $data = $this->upload->data(); //upload import data
          
          error_reporting(E_ALL);
          date_default_timezone_set('Asia/Jakarta'); //menunjukan lokasi daerah jakarta pada web
  
          include './assets/phpexcel/Classes/PHPExcel/IOFactory.php'; //syntax untuk excel
  
          $inputFileName = './assets/excel/PCN' .$data['file_name'];//path
          $objPHPExcel = PHPExcel_IOFactory::load($inputFileName); //excel path
          $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
  
          $index = 0;
  
          foreach ($sheetData as $key => $value) {

                    // ********************* 0. Generate nomor transaksi  *********************          

                    if ($row > 0 && ucwords($value['A'])!='' ) { //diambil dari baris ke 2

                        $kodeB = $this->M_PCN->get_report_no(ucwords($value['C'])); //untuk mendapat nomor report
                        $kode = $kodeB->report_no;//kode report

                        $problem_category_id=$this->M_PCN->get_hdrid('tb_problem_category','problem_category_name',ucwords($value['A']));//kode increnete problem category
                        $group_product_id=$this->M_PCN->get_hdrid('tb_group_product','group_product_name',ucwords($value['B']));//kode increnete problem group product name
                        $product_id=$this->M_PCN->get_hdrid('tb_product','product_name',ucwords($value['C']));//kode increnete product name
                        
                        // ********************* 0. Generate nomor transaksi  *********************
                        // var_dump($kode);
                        
                        $mdate = $kode . mdate('%Y/%m/', time()); //sesuai tanggal,bulan dan tahun untuk generate nomor
                        $hdrid2 = $this->M_PCN->Max_data($mdate, 'tb_PCN')->row();//max data table pcn

                        if ($hdrid2->hdrid == NULL) {
                            // Jika belum ada
                            $hdrid3 = $mdate . "001";
                        } else {
                            $hdrid3 = $hdrid2->hdrid;
                            // Jika sudah ada maka naik 1 level
                            $str = intval(substr($hdrid3, strlen($mdate), 3)) + 1;
                            $str = str_pad($str, 3, "0", STR_PAD_LEFT);
                            $hdrid3 = $mdate . $str;
                        }
                        $hdrid = $hdrid3;

                        // ********************* 1. Set hdrid  *********************
                    
                        $resultData[$index]['hdrid'] =   $hdrid;
           

                        // ---------------------------------- Import Macro Batas sini 1---------------------------------
                        $resultData[$index]['email'] = ucwords($value['A']);
                        $resultData[$index]['transaction_date'] = ucwords($value['A']);
                        $resultData[$index]['supplier_name'] = ucwords($value['A']);
                        $resultData[$index]['prepared'] = ucwords($value['A']);
                        $resultData[$index]['check'] = ucwords($value['A']);
                        $resultData[$index]['approved'] = ucwords($value['A']);
                        $resultData[$index]['any_cost_impact'] = ucwords($value['A']);
                        $resultData[$index]['cost_impact'] = ucwords($value['A']);
                        $resultData[$index]['capacity_impact'] = ucwords($value['A']);
                        $resultData[$index]['before'] = ucwords($value['A']);
                        $resultData[$index]['after'] = ucwords($value['A']);
                        $resultData[$index]['part_number'] = ucwords($value['A']);
                        $resultData[$index]['part_name'] = ucwords($value['A']);
                        $resultData[$index]['product_name'] = ucwords($value['A']);
                        $resultData[$index]['object_type'] = ucwords($value['A']);
                        $resultData[$index]['reason_to_change'] = ucwords($value['A']);
                        $resultData[$index]['description_of_process_change'] = ucwords($value['A']);
                        $resultData[$index]['current_process'] = ucwords($value['A']);
                        $resultData[$index]['proposed_process'] = ucwords($value['A']);
                        $resultData[$index]['characteristics_affected'] = ucwords($value['A']);
                        $resultData[$index]['criteria_critical_item'] = ucwords($value['A']);
                        $resultData[$index]['trial_manufacturing_completed_start'] = ucwords($value['A']);
                        $resultData[$index]['trial_manufacturing_completed_finish'] = ucwords($value['A']);
                        $resultData[$index]['initial_sample_inpection_completed_start'] = ucwords($value['A']);
                        $resultData[$index]['initial_sample_inpection_completed_finish'] = ucwords($value['A']);
                        $resultData[$index]['initial_sample_submission_start'] = ucwords($value['A']);
                        $resultData[$index]['initial_sample_submission_finish'] = ucwords($value['A']);
                        $resultData[$index]['timing_denso_approval_start'] = ucwords($value['A']);
                        $resultData[$index]['timing_denso_approval_finish'] = ucwords($value['A']);
                        $resultData[$index]['mass_productin_starts_start'] = ucwords($value['A']);
                        $resultData[$index]['mass_productin_starts_finish'] = ucwords($value['A']);
                        $resultData[$index]['entry_example_start'] = ucwords($value['A']);
                        $resultData[$index]['entry_example_finish'] = ucwords($value['A']);
                        $resultData[$index]['attach_doc'] = ucwords($value['A']);
                        $resultData[$index]['stat'] = ucwords($value['A']);

    
                        // //Inisiator 1 => Inisiator
                        $resultApprover[$index_approver]['transaction_date'] =  mdate('%Y-%m-%d', time());
                        $resultApprover[$index_approver]['problem_id'] =  $hdrid;
                        $resultApprover[$index_approver]['nik'] =   ucwords($value['P']);
                        $resultApprover[$index_approver]['name'] =   ucwords($value['Q']);
                        $resultApprover[$index_approver]['department_code'] =  '0';
                        $resultApprover[$index_approver]['department_name'] =  ucwords($value['R']);
                        $resultApprover[$index_approver]['office_email'] =   $hdrid;
                        $resultApprover[$index_approver]['position_code'] =  '1';
                        $resultApprover[$index_approver]['position_name'] =   'Inisiator';
                        $resultApprover[$index_approver]['date_approve'] =   mdate('%Y-%m-%d %H:%i:%s', time());
                        
                        $index_approver++;
                        //Inisiator 6 => Inisiator after response check
                        $resultApprover[$index_approver]['transaction_date'] =  mdate('%Y-%m-%d', time());
                        $resultApprover[$index_approver]['problem_id'] =  $hdrid;
                        $resultApprover[$index_approver]['nik'] =   ucwords($value['P']);
                        $resultApprover[$index_approver]['name'] =   ucwords($value['Q']);
                        $resultApprover[$index_approver]['department_code'] =  '0';
                        $resultApprover[$index_approver]['department_name'] =  ucwords($value['R']);
                        $resultApprover[$index_approver]['office_email'] =   $hdrid;
                        $resultApprover[$index_approver]['position_code'] =  '6';
                        $resultApprover[$index_approver]['position_name'] =   'Inisiator after response check';
                        $resultApprover[$index_approver]['date_approve'] =   mdate('%Y-%m-%d %H:%i:%s', time());

                        $index_approver++;

                        //Responsible 3	Responsible
                        $resultApprover[$index_approver]['transaction_date'] =  mdate('%Y-%m-%d', time());
                        $resultApprover[$index_approver]['problem_id'] =  $hdrid;
                        $resultApprover[$index_approver]['nik'] =   ucwords($value['S']);
                        $resultApprover[$index_approver]['name'] =   ucwords($value['T']);
                        $resultApprover[$index_approver]['department_code'] =  '0';
                        $resultApprover[$index_approver]['department_name'] = ucwords($value['U']);
                        $resultApprover[$index_approver]['office_email'] =   $hdrid;
                        $resultApprover[$index_approver]['position_code'] =  '3';
                        $resultApprover[$index_approver]['position_name'] =   'Responsible';
                        $resultApprover[$index_approver]['date_approve'] =   mdate('%Y-%m-%d %H:%i:%s', time());

                        // $nik,$positioncode,$positionname,$date,$problemid,$dateapprove
                        $this->M_PCN->get_superior1(ucwords($value['P']),'2','Inisiator Approver',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_PCN->get_superior1(ucwords($value['P']),'7','Inisiator approver after response check',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_PCN->get_superior2(ucwords($value['S']),'4','Responsible Approver 1',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_PCN->get_superior2(ucwords($value['S']),'5','Responsible Approver 2',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));

                        $this->M_PCN->insert_batch('tb_PCN', $resultData);
                        // $this->M_PCN->insert_batch('tb_approval', $resultApprover);

                        $post_data = array('hdrid' => $hdrid,'problem_id' => $hdrid,'transaction_date'=> mdate('%Y-%m-%d', time()));
                        $this->M_PCN->Input_Data($post_data, 'tb_response');
                        $this->M_PCN->Input_Data($post_data, 'tb_input_effectiveness');

                        // $index = 0;
                        $index_approver = 0;

                    }

                    $row++;
                }

                unlink('./assets/excel/' . $data['file_name']);//path untuk tampilan import data berupa excel


                if (count($resultData) != 0) {

                    // $result = $this->M_PCN->insert_batch('tb_PCN', $resultData);
                    // $result3 = $this->M_PCN->insert_batch('tb_approval', $resultApprover);
                    // if ($result > 0) {
                    //     // $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
                    //     redirect('C_PCN');
                    // }
                    
                     redirect('C_PCN');
                } else {
                    // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                    redirect('C_PCN');
                }
            }
        }
    }


    /** ---------------------------------------------- /Close controller----------------------------------------------**/
}

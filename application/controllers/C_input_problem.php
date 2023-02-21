<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_input_problem extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     **/
    /** ---------------------------------------------- input_problem----------------------------------------------**/

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('user_name') == "") {
            redirect('Auth');
        }


        $this->load->helper('date');
        $this->load->helper('file');
        $this->load->model('M_input_problem');
        // // $this->load->library('encrypt');    

    }

    public function Index()
    {
                
        $data['problem_category'] = $this->M_input_problem->tampil_problem_category();
        $data['group_product'] = $this->M_input_problem->tampil_group_product();
        $data['product'] = $this->M_input_problem->tampil_product();
        $data['customer'] = $this->M_input_problem->tampil_customer();
        // $data['nik'] = $this->M_input_problem->tampi_nik();
        $data['nik'] = $this->M_input_problem->tampil_nik_from();
        $data['sourceInformation'] = $this->M_input_problem->tampil_source_information();
        $data['ranks'] = ['S','A','B','C'];
        $data['actions'] = ['Hold Product','Line Stop','Change Lot','Repair equip / Tools / Machine','Sorting','Sorting 100%','Others'];

        $this->load->view('templates/header'); //Tampil header
        $this->load->view('templates/sidebar'); //Tampil Sidebar
        // $this->load->view('input_problem/V_input_problem',$data); // Tampil data
        $this->load->view('input_problem/V_input_problem', $data); // Tampil data
        $this->load->view('templates/footer'); // Tampil footer

    }

    // Satu table tanpa where
    function view_data()
    {

        $tables = "tb_input_problem";
        // $search = array('hdrid', 'problem_category_id', 'problem_category_name', 'group_product_id', 'group_product_name', 'product_id', 'product_name', 'customer_id', 'customer_name', 'contact_person_name', 'source_information_id', 'source_information_name', 'customer_report_number', 'part_number', 'qty', 'lot_number_product', 'detail_problem', 'responsible_section', 'containment_date', 'nik', 'name', 'report_date', 'status', 'draft', 'problem_name','rank_problem','due_date','issue_date','problem','delivery_status','shift_problem','time_problem','who_problem','where_problem','attach_picture','temporary_action','etc');


        // $search = array('hdrid','problem_category_id','problem_category_name','group_product_id','group_product_name','product_id','product_name','customer_id','customer_name','contact_person_name','source_information_id','source_information_name','customer_report_number','part_number','qty','lot_number_product','detail_problem','responsible_section','containment_date','nik','name','section1','nik2','name2','section2','report_date','status','rank_problem','due_date','issue_date','problem','delivery_status','when_problem','shift_problem','time_problem','who_problem','where_problem','attach_picture','temporary_action','etc');

        $search = array('hdrid','problem_category_id','problem_category_name','group_product_id','group_product_name','product_id','product_name','customer_id','customer_name','contact_person_name','source_information_id','source_information_name','customer_report_number','part_number','qty','lot_number_product','problem','detail_problem','responsible_section','containment_date','nik','name','section1','email1','nik2','name2','section2','email2','report_date','status','problem_name','due_date','issue_date','rank_problem','attach_picture','atachment','temporary_action','etc','delivery_status','when_problem','shift_problem','time_problem','who_problem','where_problem','customer_product_id','qty_lot');

 

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_input_problem->get_tables($tables, $search, $isWhere);
    }

    // Satu table dengan where
    function view_data_where()
    {
        $nik_session = $this->session->userdata('user_name');


        $tables = "tb_input_problem";
        // $search = array('hdrid', 'problem_category_id', 'problem_category_name', 'group_product_id', 'group_product_name', 'product_id', 'product_name', 'customer_id', 'customer_name', 'contact_person_name', 'source_information_id', 'source_information_name', 'customer_report_number', 'part_number', 'qty', 'lot_number_product', 'detail_problem', 'responsible_section', 'containment_date', 'nik', 'name', 'report_date', 'status', 'draft', 'problem_name','rank_problem','due_date','issue_date','problem','delivery_status','shift_problem','time_problem','who_problem','where_problem','attach_picture','atachment','temporary_action','etc');

        $search = array('hdrid','problem_category_id','problem_category_name','group_product_id','group_product_name','product_id','product_name','customer_id','customer_name','contact_person_name','source_information_id','source_information_name','customer_report_number','part_number','qty','lot_number_product','problem','detail_problem','responsible_section','containment_date','nik','name','section1','email1','nik2','name2','section2','email2','report_date','status','problem_name','due_date','issue_date','rank_problem','attach_picture','atachment','temporary_action','etc','delivery_status','when_problem','shift_problem','time_problem','who_problem','where_problem','customer_product_id','qty_lot');

        // jika memakai IS NULL pada where sql
        $isWhere = null;

        if ($_POST['searchByFromdate'] == '' || $_POST['searchByTodate'] == '') {
           
            if($this->session->userdata('rolename')=='Administrator Quality'){ //Jika sebagai administrator maka akan tampil semua
                 $where  = array('transaction_date >' => '2020-01-01', 'draft' => 'Draft');
            }else{
                $where  = array('transaction_date >' => '2020-01-01', 'draft' => 'Draft','nik'=>$nik_session);
            }
           

        } else {

            if($this->session->userdata('rolename')=='Administrator Quality'){//Jika sebagai administrator maka akan tampil semua
                $where  = array('transaction_date >' => $_POST['searchByFromdate'], 'transaction_date <' => $_POST['searchByTodate'], 'draft' => 'Draft');
            }else{
                $where  = array('transaction_date >' => $_POST['searchByFromdate'], 'transaction_date <' => $_POST['searchByTodate'], 'draft' => 'Draft','nik'=>$nik_session);
            }
           
        
        };

        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        header('Content-Type: application/json');
        echo $this->M_input_problem->get_tables_where($tables, $search, $where, $isWhere);
    }

    // Multy table / Query
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
        echo $this->M_Datatables->get_tables_query($query, $search, $where, $isWhere);
    }

    //    if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
    //     }else{
    //     redirect('auth');
    //     }

    public function ajax_add()
    {
        $product_id = $this->input->post('product_id');
        $kodeB = $this->M_input_problem->get_product_by_id($product_id);
        $kode = $kodeB->report_no;

        // ********************* 0. Generate nomor transaksi  *********************         
        // var_dump($kode);           
        date_default_timezone_set('Asia/Jakarta');
        $mdate = $kode . mdate('%Y/%m/', time());
        $hdrid2 = $this->M_input_problem->Max_data($mdate, 'tb_input_problem')->row();

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
        $post_data2 = array('hdrid' => $hdrid3);

        // ********************* 2. Transaction date  *********************
        $post_data3 = array('transaction_date' => mdate('%Y-%m-%d', time()));
        $post_data_transaction_date = mdate('%Y-%m-%d', time());
        // $issue_date = array('issue_date' => mdate('%Y-%m-%d', time()));

        // ******************** 3. Collect all data post *********************     
        $post_data = $this->input->post();
        $post_data5 = $this->input->post('group_product_id');
        $post_problem_category_id = $this->input->post('problem_category_id');
        $product_id2 = $this->input->post('product_id');

        // $msg = "success save"; 

        // ********************* 4. Merge data post *********************        
        $post_datamerge = array_merge($post_data, $post_data2, $post_data3);

        // ********************* 5. Simpan data     *********************

        $this->M_input_problem->Input_Data($post_datamerge, 'tb_input_problem');

        // ********************* 6. Upload file jika ada  *********************   
        // if (!empty($_FILES['file']['name'])) {
        //     $this->upload_file_attach('file', $hdrid, 'tb_input_problem');
        // }

        // **********************  Upload file attach_picture  *********************   
        if (!empty($_FILES['attach_picture']['name'])) {
            $this->upload_file_attach('attach_picture', $hdrid, 'tb_input_problem');
        }

        // **********************  Upload file attach_picture  *********************   
        if (!empty($_FILES['atachment']['name'])) {
            $this->upload_file_attach('atachment', $hdrid, 'tb_input_problem');
        }


        // NOTE:: LEMPAR HDRID KEDALAM TABLE LAIN
        $post_data4 = array('problem_id' => $hdrid);


        $post_datamerge2 = array_merge($post_data2, $post_data4);
        $this->M_input_problem->Input_Data($post_datamerge2, 'tb_response');
        $this->M_input_problem->Input_Data($post_datamerge2, 'tb_input_effectiveness');

        // Tambah data approvar
        $this->M_input_problem->Input_Data_Approver($post_data_transaction_date,$hdrid3,$this->input->post('nik'),$this->input->post('name'),$this->input->post('section1'),$this->input->post('email1'),$this->input->post('nik2'),$this->input->post('name2'),$this->input->post('section2'),$this->input->post('email2'));

        // Tambah data CC'
        // $this->M_input_problem->Input_Data2($post_data_transaction_date,$hdrid3, $post_problem_category_id, $product_id2);

        $msg = "success save";

        // ********************* 6. Upload file jika ada  *********************   
        if (!empty($_FILES['file']['name'])) {
            $this->upload_file_attach('file', $hdrid, 'tb_input_problem');
        }

        $data['status'] = $msg;
        $data['hdrid'] = $hdrid;
        $data['product_id'] = $product_id2;

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }


    public function ajax_update()
    {

        // ********************* 1. Collect data post *********************
        $post_data = $this->input->post();
        $hdrid = $this->input->post('hdrid');

        $msg = "success Update";

        // **********************  Upload file (filename,hdrid,table)  *********************   
        // if (!empty($_FILES['file']['name'])) {
        //     $this->upload_file_attach('file', $hdrid, 'tb_input_problem');
        // }

        // **********************  Upload file attach_picture  *********************   
        if (!empty($_FILES['attach_picture']['name'])) {
            $this->upload_file_attach('attach_picture', $hdrid, 'tb_input_problem');
        }

        // **********************  Upload file attach_picture  *********************   
        if (!empty($_FILES['atachment']['name'])) {
            $this->upload_file_attach('atachment', $hdrid, 'tb_input_problem');
        }

        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);
        $post_datamerge = array_merge($post_data, $post_data);

        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);
        $this->M_input_problem->Update_Data($where, $post_datamerge, 'tb_input_problem');

        $data['status'] = "berhasil update";

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function ajax_sendDraft()
    {

        // ********************* 1. Collect data post *********************
        $hdrid = $this->input->post('hdrid');
        $nik = $this->input->post('nik');
        $nik2 = $this->input->post('nik2');

        $msg = "success Update";

        // *********************  Cari atasannya inisiator *********************      
        // $inisisator_approver= $this->M_input_problem->cari_tb_approver($hdrid);

        $where = array('problem_id' => $hdrid,'nik' => $nik,'position_code' =>'1');      
        $post_data_approval = array('date_approve' => mdate('%Y-%m-%d %h:%i', time()));      
        $this->M_input_problem->Update_Data($where, $post_data_approval, 'tb_approval');

        // update responsible antisipasi jika ada kesalahan
        $this->M_input_problem->Update_Data_Approver($hdrid,$nik2);

        // cari approver
        $inisisator_approver= $this->M_input_problem->cari_tb_approver($hdrid);
          
        // *********************  Merge data All post *********************
        // $post_datamerge=array_merge($post_data,$post_data2);

        $post_data = array('draft' => 'Send');
        $post_data2 = array('status' => 'Open');

        $post_data3 = array('status_transaction' => 'Waiting approve by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')');
        
        $post_datamerge = array_merge($post_data, $post_data2,$post_data3);

        // **********************  Upload file attach_picture  *********************   name2
        if (!empty($_FILES['attach_picture']['name'])) {
            $this->upload_file_attach('attach_picture', $hdrid, 'tb_input_problem');
        }

        // **********************  Upload file atachment  *********************   
        if (!empty($_FILES['atachment']['name'])) {
            $this->upload_file_attach('atachment', $hdrid, 'tb_input_problem');
        }
        
        // **********************  Simpan data ************************        
        $where = array('hdrid' => $hdrid);
        $this->M_input_problem->Update_Data($where, $post_datamerge, 'tb_input_problem');

        // $data['status'] = "berhasil dikirim";
        $data['status'] = $hdrid;
        $data['name'] = $inisisator_approver->name ;
        $data['position_name'] = $inisisator_approver->position_name;
        $data['office_email'] = $inisisator_approver->office_email;

        $data['status_transaction'] ='Need approval by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')';

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
    }

    public function ajax_sendDraft2()
    {

        $product_id = $this->input->post('product_id');
        $kodeB = $this->M_input_problem->get_product_by_id($product_id);
        $kode = $kodeB->report_no;

        // ********************* 0. Generate nomor transaksi  *********************         
        // var_dump($kode);           
        $mdate = $kode . mdate('%Y/%m/', time());
        $hdrid2 = $this->M_input_problem->Max_data($mdate, 'tb_input_problem')->row();

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
        $post_data2 = array('hdrid' => $hdrid3);

        // ********************* 2. Transaction date  *********************
        $post_data3 = array('transaction_date' => mdate('%Y-%m-%d', time()));
        $post_data_transaction_date = mdate('%Y-%m-%d', time());

        // ******************** 3. Collect all data post *********************     
        $post_data = $this->input->post();
        $post_data5 = $this->input->post('group_product_id');
        $post_problem_category_id = $this->input->post('problem_category_id');
        $product_id2 = $this->input->post('product_id');

        $post_data_draft = array('draft' => 'Send');
        $updateStatus = array('status' => 'Open');

        // Imput data approver
        $this->M_input_problem->Input_Data_Approver($post_data_transaction_date,$hdrid,$this->input->post('nik'),$this->input->post('name'),$this->input->post('section1'),$this->input->post('email1'),$this->input->post('nik2'),$this->input->post('name2'),$this->input->post('section2'),$this->input->post('email2'));
        
        $where = array('problem_id' => $hdrid,'position_code' =>'1');    
        $post_data_approval = array('date_approve' => mdate('%Y-%m-%d %h:%i', time()));
        $this->M_input_problem->Update_Data($where, $post_data_approval, 'tb_approval');
        
        // update tanggal approve inisiator
        $inisisator_approver= $this->M_input_problem->cari_tb_approver($hdrid);

        // Cari atasan  inisiator
        // $inisisator_approver= $this->M_input_problem->cari_tb_approver($hdrid);
        $post_data4 = array('status_transaction' => 'Waiting approve by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')');
       
        // $msg = "success save"; 

        // ********************* 4. Merge data post *********************        
        $post_datamerge = array_merge($post_data, $post_data2, $post_data3,$post_data_draft,$updateStatus,$post_data4);

        // ********************* 5. Simpan data     *********************

        $this->M_input_problem->Input_Data($post_datamerge, 'tb_input_problem');

        // **********************  Upload file attach_picture  *********************   
        if (!empty($_FILES['attach_picture']['name'])) {
            $this->upload_file_attach('attach_picture', $hdrid, 'tb_input_problem');
        }

        // **********************  Upload file atachment  *********************   
        if (!empty($_FILES['atachment']['name'])) {
            $this->upload_file_attach('atachment', $hdrid, 'tb_input_problem');
        }

        // NOTE:: LEMPAR HDRID KEDALAM TABLE LAIN
        $post_data4 = array('problem_id' => $hdrid);

        $post_datamerge2 = array_merge($post_data2, $post_data4);

        $this->M_input_problem->Input_Data($post_datamerge2, 'tb_response');

        $this->M_input_problem->Input_Data($post_datamerge2, 'tb_input_effectiveness');
        
        // ********************* 6. Upload file jika ada  *********************   
        if (!empty($_FILES['file']['name'])) {
            $this->upload_file_attach('file', $hdrid, 'tb_input_problem');
        }
      
        $data['status'] =$hdrid;
        $data['status_transaction'] ='Need approval by ' . $inisisator_approver->name . ' ('.$inisisator_approver->position_name.')';

        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
    }

    public function ajax_delete()
    {


        $where = array('hdrid' => $this->input->post('hdrid'));
        $this->M_input_problem->Delete_Data($where, 'tb_input_problem');
        $this->M_input_problem->Delete_Data($where, 'tb_effectiveness');
        $this->M_input_problem->Delete_Data($where, 'tb_input_effectiveness');
        $this->M_input_problem->Delete_Data($where, 'tb_response');

        $where = array('problem_id' => $this->input->post('hdrid'));
        $this->M_input_problem->Delete_Data($where, 'tb_approval');

        $data['status'] = "berhasil dihapus";
        // return value array
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
    }


    function ajax_getbyhdrid()
    {

        $hdrid = $this->input->get('hdrid');
        $data = $this->M_input_problem->ajax_getbyhdrid($hdrid, 'tb_input_problem')->row();
        echo json_encode($data);
    }

    function form_approver_link_mail()
    {

        $id_user_reg = $this->input->get('var1');
        $nik = $this->input->get('var2');

        $data['get_approver'] = $this->M_input_problem->get_approver($id_user_reg);
        $data['get_requester'] = $this->M_input_problem->get_requester($id_user_reg);
        $data['data'] = $this->M_input_problem->get_data($id_user_reg);

        $this->load->view('email/V_input_problem', $data); // Tampil data

    }

    function upload_file_attach($filename, $hdrid, $table)
    {

        if (!empty($_FILES[$filename]['name'])) {

            $config['upload_path'] = './assets/upload/PROBLEM';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
            $config['overwrite'] = True;
            $config['max_size']  = '1000000';
            // $config['max_width']  = '1024';
            // $config['max_height']  = '768';
            $config['file_name'] = $hdrid . '_' . $filename;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload($filename)) {
                // $status = "error";
                $msg = $this->upload->display_errors();
            } else {
                $msg = "success upload";

                $dataupload = $this->upload->data();
                // $status = "success";
                // $msg = $dataupload['file_name']." berhasil diupload";                      
                $data_update = array($filename => $dataupload['file_name']);

                $where = array('hdrid' => $hdrid);
                $this->M_input_problem->Update_Data($where, $data_update, $table);
            }
        }
    }


    public function import()
    {

        // $this->form_validation->set_rules('excel', 'File', 'trim|required');

        if ($_FILES['excel']['name'] == '') {

            $this->session->set_flashdata('msg', 'File harus diisi');
            redirect('C_input_problem');
			
        } else {

            $config['upload_path'] = './assets/excel/';
            $config['allowed_types'] = 'xls|xlsx';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('excel')) {
                $error = array('error' => $this->upload->display_errors());
            } else {

                $data = $this->upload->data();

                error_reporting(E_ALL);
                date_default_timezone_set('Asia/Jakarta');

                include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

                $inputFileName = './assets/excel/' . $data['file_name'];
                $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

                $index = 0;
                $row = 0;
                $index_approver = 0;

                foreach ($sheetData as $key => $value) {

                    // ********************* 0. Generate nomor transaksi  *********************          

                    if ($row > 0 && ucwords($value['A'])!='' ) { //diambil dari baris ke 2

                        $kodeB = $this->M_input_problem->get_report_no(ucwords($value['C']));
                        $kode = $kodeB->report_no;

                        $problem_category_id=$this->M_input_problem->get_hdrid('tb_problem_category','problem_category_name',ucwords($value['A']));
                        $group_product_id=$this->M_input_problem->get_hdrid('tb_group_product','group_product_name',ucwords($value['B']));
                        $product_id=$this->M_input_problem->get_hdrid('tb_product','product_name',ucwords($value['C']));
                        
                        // ********************* 0. Generate nomor transaksi  *********************
                        // var_dump($kode);
                        
                        $mdate = $kode . mdate('%Y/%m/', time());
                        $hdrid2 = $this->M_input_problem->Max_data($mdate, 'tb_input_problem')->row();

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
                        $resultData[$index]['transaction_date'] = mdate('%Y-%m-%d', time());

                        // ---------------------------------- Import Macro Batas sini 1---------------------------------

                        $resultData[$index]['problem_category_id'] = $problem_category_id->hdrid;
                        $resultData[$index]['group_product_id'] = $group_product_id->hdrid;
                        $resultData[$index]['product_id'] = $product_id->hdrid;

                        $resultData[$index]['problem_category_name'] = ucwords($value['A']);
                        $resultData[$index]['group_product_name'] = ucwords($value['B']);
                        $resultData[$index]['product_name'] = ucwords($value['C']);
                        $resultData[$index]['customer_name'] = ucwords($value['D']);
                        $resultData[$index]['contact_person_name'] = ucwords($value['E']);
                        $resultData[$index]['source_information_name'] = ucwords($value['F']);
                        $resultData[$index]['customer_report_number'] = ucwords($value['G']);
                        $resultData[$index]['part_number'] = ucwords($value['H']);
                        $resultData[$index]['qty'] = ucwords($value['I']);
                        $resultData[$index]['lot_number_product'] = ucwords($value['J']);
                        $resultData[$index]['problem'] = ucwords($value['K']);
                        $resultData[$index]['detail_problem'] = ucwords($value['L']);
                        $resultData[$index]['responsible_section'] = ucwords($value['M']);
                        $resultData[$index]['containment_date'] = ucwords($value['N']);
                        $resultData[$index]['containment_date_actual'] = ucwords($value['O']);

                        $resultData[$index]['nik'] = ucwords($value['P']);
                        $resultData[$index]['name'] = ucwords($value['Q']);
                        $resultData[$index]['section1'] = ucwords($value['R']);

                        $resultData[$index]['nik2'] = ucwords($value['S']);
                        $resultData[$index]['name2'] = ucwords($value['T']);
                        $resultData[$index]['section2'] = ucwords($value['U']);

                        $resultData[$index]['report_date'] = ucwords($value['V']);
                        $resultData[$index]['report_date_actual'] = ucwords($value['W']);
                        $resultData[$index]['problem_name'] = ucwords($value['X']);
                        $resultData[$index]['issue_date'] = ucwords($value['Y']);
                        $resultData[$index]['rank_problem'] = ucwords($value['Z']);
                        $resultData[$index]['temporary_action'] = ucwords($value['AA']);
                        $resultData[$index]['etc'] = ucwords($value['AB']);
                        $resultData[$index]['delivery_status'] = ucwords($value['AC']);
                        $resultData[$index]['when_problem'] = ucwords($value['AD']);
                        $resultData[$index]['shift_problem'] = ucwords($value['AE']);
                        $resultData[$index]['time_problem'] = ucwords($value['AF']);
                        $resultData[$index]['who_problem'] = ucwords($value['AG']);
                        $resultData[$index]['where_problem'] = ucwords($value['AH']);
                        $resultData[$index]['qty_lot'] = ucwords($value['AI']);
                        $resultData[$index]['status_transaction'] = 'Done';
    
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
                        $this->M_input_problem->get_superior1(ucwords($value['P']),'2','Inisiator Approver',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_input_problem->get_superior1(ucwords($value['P']),'7','Inisiator approver after response check',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_input_problem->get_superior2(ucwords($value['S']),'4','Responsible Approver 1',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));
                        $this->M_input_problem->get_superior2(ucwords($value['S']),'5','Responsible Approver 2',mdate('%Y-%m-%d', time()),$hdrid,mdate('%Y-%m-%d %H:%i:%s', time()));

                        $this->M_input_problem->insert_batch('tb_input_problem', $resultData);
                        $this->M_input_problem->insert_batch('tb_approval', $resultApprover);

                        $post_data = array('hdrid' => $hdrid,'problem_id' => $hdrid,'transaction_date'=> mdate('%Y-%m-%d', time()));
                        $this->M_input_problem->Input_Data($post_data, 'tb_response');
                        $this->M_input_problem->Input_Data($post_data, 'tb_input_effectiveness');

                        // $index = 0;
                        $index_approver = 0;

                    }

                    $row++;
                }

                unlink('./assets/excel/' . $data['file_name']);

                if (count($resultData) != 0) {

                    // $result = $this->M_input_problem->insert_batch('tb_input_problem', $resultData);
                    // $result3 = $this->M_input_problem->insert_batch('tb_approval', $resultApprover);
                    // if ($result > 0) {
                    //     // $this->session->set_flashdata('msg', show_succ_msg('Data Legalitas Perusahaan Berhasil diimport ke database'));
                    //     redirect('C_input_problem');
                    // }
                    
                     redirect('C_input_problem');
                } else {
                    // $this->session->set_flashdata('msg', show_msg('Data Legalitas Perusahaan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
                    redirect('C_input_problem');
                }
            }
        }
    }

    

    /** ---------------------------------------------- /Close controller----------------------------------------------**/
}

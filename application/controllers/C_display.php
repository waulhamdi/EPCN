<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_display extends CI_Controller {
    
	/**
	 * Index Page for this controller.	 
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
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_display');
        $this->load->model('UserModel');
      
    }
    
    /** ---------------------------------------------- itemprocess ----------------------------------------------**/

	public function Index()
	{

        if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
            
            // $FiscalYear = $this->M_display->Fiscal_Year(); 
            // $data['plan']=$this->M_display->Tampil_Data($FiscalYear->fiscalyear)->Result(); 
            // $data['productivity']=$this->M_display->Search_productivity($FiscalYear->fiscalyear)->Result(); 
            // $data['investment']=$this->M_display->Search_investment($FiscalYear->fiscalyear)->Result();             
            $data['fiscalyear']=$this->UserModel->get('DM1902060');
            
            /* $this->load->view('display/V_display2',$data); // Tampil data //,$data */

            $this->load->view('templates/header'); //Tampil header
            $this->load->view('templates/sidebar'); //Tampil Sidebar
            $this->load->view('display/V_display',$data); // Tampil data //,$data
            $this->load->view('templates/footer'); // Tampil footer
        
        }else{

            redirect('auth');

        }

    }
    
    public function Details_itemprocess($kodeitemprocess) 
	{

        if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)
             
        $this->load->Model('M_itemprocess');
		$details=$this->M_itemprocess->Tampil_Data_Details($kodeitemprocess);
        $data['itemprocess'] =$details;     
         
        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('itemprocess/V_itemprocess_details',$data);
        $this->load->view('templates/footer');     
        
        }else{

        redirect('auth');

        }

    }
        
    public function Add_itemprocess()
	{
        
        /** Tangkap post form **/
        $kodeitemprocess=$this->input->post('kodeitemprocess');
        $namaitemprocess=$this->input->post('namaitemprocess');
              
        $Data =array(
            'kodeitemprocess'=>$kodeitemprocess,
            'namaitemprocess'=>$namaitemprocess
        );

        $this->M_itemprocess->input_data($Data,'tb_itemprocess');
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Better check yourself, youre not looking too good.</div>');
        redirect('C_itemprocess/index');

    }

    public function Update_itemprocess()
	{
               
        $namaitemprocess=$this->input->post('namaitemprocess');
       
        $data =array(           
            'namaitemprocess'=>$namaitemprocess           
        );

        $where =array(
            'kodeitemprocess'=>$kodeitemprocess           
        );

        $this->M_itemprocess->Update_itemprocess($where,$data,'tb_itemprocess');
        $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> Better check yourself, youre not looking too good.</div>');

        redirect('C_itemprocess/index');

    }
    
    public function Delete_itemprocess($kodeitemprocess)
	{
        
        $where=array('kodeitemprocess'=>$kodeitemprocess);        
        $this->M_itemprocess->Delete_itemprocess($where,'tb_itemprocess');       
        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Danger!</strong> Better check yourself, youre not looking too good.</div>');
        redirect('C_itemprocess/index');

    }
    
    public function Edit_itemprocess($kodeitemprocess) 
	{
        
        if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)

        $Where=array('kodeitemprocess'=>$kodeitemprocess);
        $data['itemprocess'] =$this->M_itemprocess->Edit_itemprocess($Where,'tb_itemprocess')->result();      
        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('itemprocess/V_Edit_itemprocess',$data);
        $this->load->view('templates/footer');

        }else{

        redirect('auth');

        }
    }

    public function Print_itemprocess()
	{
        $data['itemprocess']=$this->M_itemprocess->Tampil_Data('tb_itemprocess')->Result();
        $this->load->view('itemprocess/V_Print_itemprocess',$data);
		
    }

    public function pdf_itemprocess()
	{
        $this->load->library('dompdf_gen');
        $data['itemprocess']=$this->M_itemprocess->Tampil_Data('tb_itemprocess')->Result();
        $this->load->view('itemprocess/V_PDF_itemprocess',$data);
        $paper_size='A4';
        $orientation='landscape';
        $html=$this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_itemprocess.pdf",array('Attachment'=>0));
        		
    }

    public function Excel_itemprocess()
	{
        
        $data['itemprocess']=$this->M_itemprocess->Tampil_Data('tb_itemprocess')->Result();
        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $object=new PHPExcel();
        $object->getProperties()->setCreator("System Development DMIA");
        $object->getProperties()->setLastModifiedBy("System Development DMIA");
        $object->getProperties()->setTitle("List itemprocess");
        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1',"NO");
        $object->getActiveSheet()->setCellValue('B1',"KODE ITEM PROCESS");
        $object->getActiveSheet()->setCellValue('C1',"NAMA ITEM PROCESS");
       
      
        $baris=2;
        $no=1;

       foreach ($data['itemprocess'] as $Emp) {
        $object->getActiveSheet()->setCellValue('A'.$baris,$no++);
        $object->getActiveSheet()->setCellValue('B'.$baris,$Emp->kodeitemprocess);
        $object->getActiveSheet()->setCellValue('C'.$baris,$Emp->namaitemprocess);

        $baris++; 
       }
             
        // Proses file excel
        $filename="Data_itemprocess.xlsx";
        $object->getActiveSheet()->setTitle("List itemprocess");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$filename.'"'); 
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $write->save('php://output');

    }

    public function Search_empl()
	{
       if($this->session->userdata('authenticated')){ // Jika user sudah login (Session authenticated ditemukan)

        $Search=$this->input->post('Search');
        $data['itemprocess'] =$this->M_itemprocess->Search_itemprocess($Search,'tb_itemprocess');    
        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('itemprocess/V_Invesment_class',$data);
        $this->load->view('templates/footer');  
        
        }else{

        redirect('auth');

        }

    }

    public function getPersonalData($username){
        
        $DB3 = $this->load->database('another_db', TRUE); //Konect database ke dua
        $sql = "SELECT top 1 * FROM v_ess_personal_data where NIK='".$username."'";
        
        foreach($DB3->query($sql)->result() as $row){
            $data['image_file'] = base64_encode($row->PhotoObj);
            $finfo = finfo_open(FILEINFO_MIME);
            $image_type = explode(';',finfo_buffer($finfo,$row->PhotoObj,FILEINFO_MIME));
            $image_type = $image_type[0];
            $image_type = explode('/',$image_type);
            $data['image_type'] = $image_type[1]; 
        }
        
        //$data['nationality'] = $this->Func->load_combo('cboNationality','nationality',$emp->WargaNegara_ID);
        //$data['blood_type'] = $this->Func->load_combo('cboBloodType','blood_type',$emp->Gol_Darah);
        //$data['religion'] = $this->Func->load_combo('cboReligion','religion',$emp->Agama);
        //$data['dress_size'] = $this->Func->load_combo('cboDressSize','dress',$emp->Baju);
        //$data['pants_size'] = $this->Func->load_combo('cboPantsSize','pants',$emp->Celana);
        //$data['soes_size'] = $this->Func->load_combo('cboSoesSize','soes',$emp->Sepatu);
        //$data['hat_size'] = $this->Func->load_combo('cboHatSize','hat',$emp->Topi);
        //$data['helmet_size'] = $this->Func->load_combo('cboHelmetSize','helmet',$emp->Helmet);
        //$data['job_location'] = $this->Func->load_combo('cboJobLocation','job_location',$emp->WilayahKerja);
        //$data['home_area'] = $this->Func->load_combo('cboHomeArea','home_area', $emp->Home_Area_Id);
        //$data['cost_id'] = $this->Func->load_combo('cboCostId','cost_id',$emp->Cost_Id);
       
        return $emp;

    }

    
    /** ---------------------------------------------- /itemprocess----------------------------------------------**/

}

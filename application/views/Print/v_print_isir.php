<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DMIA E-ISIR SYSTEM</title><!---- title dari judul view print---->

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $this->load->helper('url');
    ?>

    <!-- ########## CSS ##########-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">  
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- DataTables Button-->  
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/toastr/toastr.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- fullCalendar -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar-bootstrap/main.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">  
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">  
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
        
    <!-- ########## Javascript ##########-->
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
    <!-- jquery-validation -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
    
    <!-- DataTables -->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    
    <!-- DataTables Button--> 
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>

    <!-- fullCalendar 2.2.5 -->
    <script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/main.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/fullcalendar-daygrid/main.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/fullcalendar-timegrid/main.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/fullcalendar-interaction/main.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/fullcalendar-bootstrap/main.min.js"></script>

    
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?php echo base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

    <!-- Label For Chart -->
    <script src="<?php echo base_url() ?>assets/plugins/label-charts/labels.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/qrcode.min.js"></script>

    
</head>

<body>
<div>
                                        <section class="content">

                                            <?php echo $this->session->flashdata('message');  ?>
                                            <small>


                                            <div class="container-fluid" id="printdiv"> <!---untuk container pada view print--->
                                                    <div class="row"> <!---untuk container pada view print--->
                                                        <div class="col-12">
                                                            <!-- .col -->
                                                            <div class="card">
                                                                <!-- .card -->
                                                                <div class="card-body">
                                                                    <!-- .card-body -->

                                                                    <div class="">
                                                                        <?php if ($this->session->userdata('user_name') == '' ) // function untuk user name untuk print
                                                                            echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-login'> Login </button>";
                                                                        ?>

                                                                        <?php if ($this->session->userdata('user_name') == $tb_ISIR_information->hdrid ) // function untuk user name untuk print datanya sudah ada di database
                                                                            {
                                                                                // redirect('Auth');
                                                                                echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-approve' > Approved </button>";//button approved
                                                                                echo "<button class='btn btn-warning float-right' data-toggle='modal' data-target='#modal-reject' >Reject</button>"; //button reject
                                                                            }
                                                                            else{
                                                                                // redirect('Auth');
                                                                                echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-approve' hidden > Approved</button>";//button approved
                                                                                echo "<button class='btn btn-warning float-right' data-toggle='modal' data-target='#modal-reject'hidden >Reject</button>";//button reject
                                                                            }
                                                                        ?>

                                                                        <button class="btn btn-primary float-right" onclick="printDiv('printdiv')"><i class="fa fa-print"></i></button><!--lambang print-->
                                                                        <button class="btn btn-danger float-right" onclick="formclose()"><i class="fa fa-times-circle"></i></button><!---lambang cancel-->

                                                                    </div>

                                                                    <!-- ECR -->
                                                                    <input id="text" type="text" hidden value="<?php $current = current_url() . '?var1=' . $tb_ISIR_information->hdrid;
                                                                                                                    print_r($current); ?>" />

                                                                    
                                                                        <!-- <php if ($nik->name=='not found') {
                                                                            echo "Progress = Close";
                                                                        } else {
                                                                            echo 'Progress ='.$nik->nik.'-'.$nik->name. '(' . $nik->position_name  .')'. '(' . $nik->position_code . ' of 6)';
                                                                        }?> 

                                                                        <php if ($this->session->userdata('user_name') == '' ) 
                                                                            echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-login'> Login </button>";
                                                                        ?>

                                                                        <php if ($this->session->userdata('user_name') != $nik->nik || $nik->position_code=='1' || $nik->position_code=='3' ) 
                                                                            {
                                                                                // redirect('Auth');
                                                                                echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-approve' hidden> Approved </button>";
                                                                                echo "<button class='btn btn-warning float-right' data-toggle='modal' data-target='#modal-reject' hidden>Reject</button>";
                                                                            }
                                                                            else{
                                                                                // redirect('Auth');
                                                                                echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-approve'> Approved</button>";
                                                                                echo "<button class='btn btn-warning float-right' data-toggle='modal' data-target='#modal-reject'>Reject</button>";
                                                                            }
                                                                        ?> -->
                                                                        <!-- <center>
                                                                            <table id="ecrtabel" class="table table-bordered table-hover" style="text-align: center;">
                                                                                <tbody>

                                                                                <tr style="height:3px " >
                                                                                        <th width="30%"> <img src="<php echo base_url() ?>assets/dist/img/Logo Denso DMIA.png" alt="AdminLTE Logo" style="opacity: .8">
                                                                                            <br>PT DENSO MANUFACTURING INDONESIA
                                                                                        <br> Doc. 
                                                                                        <center>
                                                                                                <div style=" padding-top: 15px">
                                                                                                <p id="qrcode"></p>
                                                                                            </div>
                                                                                        </th>
                                                                                            
                                                                                        </th>
                                                                                        <th colspan="9" style="vertical-align: middle;">
                                                                                            <h1><u>E-WIRE</u></h1>
                                                                                    </th>
                                                                                    </tr>
                                                                                </tbody> -->
                                                                                <!--
                                                                                <tr>
                                                                                    <td rowspan="21">
                                                                                        <h3 >
                                                                                            <span class="vertical-text">Found Problem (Step 1)</span>
                                                                                        </h3>
                                                                                    </td>
                                                                                </tr>
                                                                            -->
                                                                            
                                                                           
                                                                           
                                                                            <br>
                                                        <br>    
                                                        <br>   
                                                        <br>                                                     
                                                        <table id="ecrtabel" class="table table-bordered table-hover">
                                                        <tr>                
                                                        <td colspan="13" rowspan="1" style="width:100%">
                                                       <h6 style="text-align:right;">
                                                               <?= $tb_ISIR_information->hdrid; ?>    
                                                            </h6>   
                                                    <h6 tyle="text-align:left;">TO :PT.DENSO MANUFACTURING INDONESIA</h6>
                                                    <h6 style="text-align:left;"> Inspection Sect.</h6>                  
                                                        <h6 style="text-align:left;"> INITIAL SAMPLE INSPECTION
                                                        </h6>
                                                          
                                                                     <tr>
                                                                        <td>
                                                                        <label for="normal" class="form-check-label">
                                                                         <h5>Clasification</h5>
                                                                        </label>
                                                                        </td>
                                                                       
                                                       <td>
                                                        <label for="normal" class="form-check-label"  style="text-align:left">
                                                          ECR No
                                                            </label>
                                                        <div class="form-group text-left form-check">
                                                    
                                                        <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="date">

                                                    </div>                       
                                                     <label for="normal" class="form-check-label"  style="text-align:left">
                                                        <br>
                                                          Change of Vendor
                                                            </label>
                                                        <div class="form-group text-left form-check">
                                                        
                                                            <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="date">

                                                        </div>
                                                        <label for="normal" class="form-check-label"  style="text-align:left">
                                                        <br>
                                                            Protoype Sample
                                                            </label>
                                                        <div class="form-group text-left form-check">
                                                        
                                                            <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="date">

                                                        </div>
                                                       </td>
                                                        <td>
                                                        <label for="normal" class="form-check-label"  style="text-align:left">
                                                        <br>
                                                          New Production
                                                            </label>
                                                        <div class="form-group text-left form-check">
                                                        
                                                            <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="date">

                                                        </div>
                                                        <label for="normal" class="form-check-label"  style="text-align:left">
                                                        <br>
                                                          Reproduction
                                                            </label>
                                                        <div class="form-group text-left form-check">
                                                        
                                                            <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="date">

                                                        </div>
                                                        <label for="normal" class="form-check-label"  style="text-align:left">
                                                        <br>
                                                          Renewal Tooling
                                                            </label>
                                                        <div class="form-group text-left form-check">
                                                        
                                                            <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="date">

                                                        </div>
                                                        
                                                        
                                                        </td>                                                            
                                                       
                                                        
                                                        </tr>
                                                                     <tr>
                                                                    <td>
                                                                     <h5 style="text-align:left;">Process</h5>
                                                                     </td>
                                                                     <td colspan="13" rowspan="1" style="width:100%">
                                                                     <h6 style="text-align:left;">Temporary</h6>
                                                                     <h6 style="text-align:left;">Full scale</h6>
                                                                     <h6 style="text-align:left;">PCN NO :<?= $tb_ISIR_information->hdrid; ?> </h6>
                                                                     </td>
                                                                     </tr>

                                                                     <tr>
                                                                    <td>
                                                                     <h5 style="text-align:left;">Submittal</h5>
                                                                     </td>
                                                                     <td colspan="13" rowspan="1" style="width:100%">
                                                                     <label for="normal" class="form-check-label"  style="text-align:left">
                                                                    <br>
                                                                    1st
                                                                        </label>
                                                                    <div class="form-group text-left form-check">
                                                                    
                                                                        <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="date">

                                                                    </div>
                                                                    <label for="normal" class="form-check-label"  style="text-align:left">
                                                                    <br>
                                                                    2st
                                                                        </label>
                                                                    <div class="form-group text-left form-check">
                                                                    
                                                                        <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="date">

                                                                    </div>
                                                                    <label for="normal" class="form-check-label"  style="text-align:left">
                                                                    <br>
                                                                    3st
                                                                        </label>
                                                                    <div class="form-group text-left form-check">
                                                                    
                                                                        <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="date">

                                                                    </div>
                                                                    <label for="normal" class="form-check-label"  style="text-align:left">
                                                                    <br>
                                                                    more(______th)
                                                                        </label>
                                                                    <div class="form-group text-left form-check">
                                                                    
                                                                        <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="date">

                                                                    </div>
                                                                     </td>
                                                                     </tr>

                                                                     <tr>
                                                        <td>
                                                            <h6 style="text-align:left;">
                                                                Supplier code no :  <?=$tb_ISIR_information->supplier_code; ?>    
                                                            </h6>
                                                         </td>
                                                                            
                                                        <td>
                                                            <h6 style="text-align:left;">
                                                                Supplier name :  <?=$tb_ISIR_information->supplier_name; ?>    
                                                            </h6>
                                                        </td>
                                                        <td colspan="12">
                                                        <h6>  Date inspected :</h6>
                                                        </td>
                                                        </tr>  
                                                        <tr>
                                                            <td>
                                                            <h6 style="text-align:left;">
                                                                Part no :  <?=$tb_ISIR_information->part_number; ?>    
                                                            </h6>
                                                            </td>

                                                        
                                                            <td>
                                                            <h6 style="text-align:left;">
                                                                Part name :  <?=$tb_ISIR_information->part_name; ?>    
                                                            </h6>

                                                            <td rowspan="2">
                                                            <h6>Vendor</h6>
                                                            </td>

                                                            <td rowspan="2">
                                                            <h6>Manager</h6>
                                                            </td>

                                                            <td rowspan="2">
                                                            <h6>Inspector</h6>
                                                            </td>
                                                            </td>
                                                        </tr>

                                                        <td>
                                                            <h6 style="text-align:left;">
                                                                Tooling no :  <?=$tb_ISIR_information->tooling_no; ?>    
                                                            </h6>
                                                            </td>

                                                        
                                                            <td>
                                                            <h6 style="text-align:left;">
                                                                cavity_no :  <?=$tb_ISIR_information->cavity_number; ?>    
                                                            </h6>
                                                            </td>

                                                        
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            <h6 style="text-align:center;">
                                                                Drawing Standard
                                                            </h6>
                                                            </td>

                                                            <td colspan="13">
                                                                <h5 style="text-align:center;">quality Dep Inspection Sect</h5>
                                                                
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            <h6 style="text-align:left;">
                                                                Material Manufacurer :  <?=$tb_ISIR_information->material_manufacture; ?>      
                                                            </h6>
                                                            </td>
                                                            <td>
                                                               
                                                            <h5 style="text-align:center;">judgement</h5>
                                                            <hr style="border:1px solid black">
                                                               
                                                                <h5 style="text-align:left;">Accepted/</h5>
                                                                <h5 style="text-align:center;">Deviation item/</h5>
                                                                <h5 style="text-align:left;">Unaccepted/</h5>
                                                                <h5 style="text-align:center;">Die Deviation/</h5>
                                                            </td>

                                                            <td rowspan="1">
                                                               
                                                               <h5 style="text-align:center;">Inspector </h5>
                                                            </td>
                                                            <td rowspan="1">
                                                                   <h5 style="text-align:center;">Received</h5>
                                                     
                                                               </td>
                                                        </tr>
                                                        <tr>
                                                            <td >
                                                            <h6 style="text-align:left;">
                                                                Grade Name :  <?=$tb_ISIR_information->grade_name; ?>      
                                                            </h6>
                                                            </td>

                                                            <td rowspan="1">
                                                            <h6 style="text-align:center;">
                                                                Approval  
                                                                <br><?=$tb_ISIR_information->approved; ?>      
                                                            </h6>
                                                            </td>

                                                            <td rowspan="1">
                                                            <h6 style="text-align:center;">
                                                                Check 
                                                                <br><?=$tb_ISIR_information->checked; ?>      
                                                            </h6>
                                                            </td>

                                                            <td rowspan="1">
                                                            <h6 style="text-align:center;">
                                                                Prepared 
                                                                <br><?=$tb_ISIR_information->prepared; ?>      
                                                            </h6>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                          
                                                           <td>
                                                               <h5> Process Subcontracted   </h5>
                                                                
                                                           </td>
                                                            <td>
                                                            <h6 style="text-align:left;">
                                                                Process      
                                                            </h6>
                                                            </td>

                                                            <td>
                                                            <h6 style="text-align:left;">
                                                                Subcontractor      
                                                            </h6>
                                                            </td>


                                                            <td>
                                                            <h6 style="text-align:left;">
                                                                Address City      
                                                            </h6>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                        <td>
                                                            note on filling in:
                                                            <br>
                                                            1. Describe per each process,including these for surface
                                                            and heat treatment
                                                            <br>2. For debarring,specify whether take-in work or not.indicate All internally produced if applicable
                                                            <br>3. In the column of "address". indicate city and state
                                                            <br>4. Use extra sheet,if necessary
                                                        </td>

                                                        <td colspan="12">
                                                            <h5>Denso comment(Removal defect item)</h5>
                                                            <br>
                                                            <br>
                                                            <h6>apperance check:</h6>
                                                            <br>
                                                            <h6>Dimensional check:</h6>
                                                        </td>
                                                        </tr>


                                                        
                                                        <tr>
                                                        <td>
                                                       <h5>VENDOR Liason matter</h5>
                                                      <hr style="border:1px solid black">

                                                      <h5>#IA-ID</h5>
                                                      <hr style="border:1px solid black">

                                                      <h5>ISIR-1 Made in indonesia</h5>
                                                      <hr style="border:1px solid black">
                                                        </td>

                                                        <td colspan="12">
                                                       <h5>DENSO Liaisonn matter</h5>
                                                      <hr style="border:1px solid black">
                                                        <br>
                                                        <hr style="border:1px solid black">
                                                        <br>
                                                        <hr style="border:1px solid black">
                                                        </td>
                                                        </tr>



                                                        <tr>
                                                            <td>
                                                                <h5>no</h5>
                                                            </td>
                                                            <td>
                                                                <h5>Indicate Dimension</h5>
                                                            </td>
                                                            <td>
                                                                <h5>Measured by vendor</h5>
                                                            </td>
                                                            <td>
                                                                <h5>Measured by DENSO</h5>
                                                            </td>
                                                            <td>
                                                                <h5>Judgement</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            <h5>Material</h5>
                                                            </td>

                                                            <td>
                                                            </td>

                                                            <td>
                                                            </td>

                                                            <td>
                                                            </td>

                                                            <td>
                                                            </td>
                                                        </tr>

                                                        

                                                                            <tr>
                                                                                <td colspan="13"><h5 style="text-align:center;">Attached Mill sheet<?=$tb_ISIR_information->millsheet; ?></h5> </td>
                                                                            </tr>
                                                        <tr>
                                                            <td>
                                                            <h5>RoHS(SoC)</h5>
                                                            </td>
                                                            
                                                            <td>
                                                                Cd < 0.01%
                                                            </td>

                                                            <td>
                                                                Hg < 0.01%
                                                            </td>


                                                            <td>
                                                                Pb < 0.01%
                                                            </td>


                                                            <td>
                                                                Cr < 0.01%
                                                            </td>

                                                           
                                                          
                                                        </tr>

                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <td>
                                                        <?=$tb_ISIR_information->rohs_cd; ?>
                                                            </td>


                                                            <td>
                                                        <?=$tb_ISIR_information->rohs_hg; ?>
                                                            </td>

                                                            <td>
                                                        <?=$tb_ISIR_information->rohs_pb; ?>
                                                            </td>


                                                            <td>
                                                        <?=$tb_ISIR_information->rohs_cr; ?>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        <td colspan="13"><h5 style="text-align:center;">
                                                        Attach Analysis Data<?=$tb_ISIR_information->attach_soc; ?></h5>
                                                            </td>
                                                        </tr>


                                            <tr>
                                                <td>
                                                <h5>[judgement result of SOC]</h5>

                                                    <tr>
                                                    <td>
                                                       <h5> Does This Product adapt to DDS2004? </h5>
                                                    </td>
                                                    <td>
                                                    <?=$tb_ISIR_information->product_adapt_to_dds2004; ?>
                                                    </td>

                                                    <td>
                                                       <h5> IMDS ID/Version </h5>
                                                    </td>
                                                    <td>
                                                    <?=$tb_ISIR_information->imds_id; ?>
                                                    </td>
                                                    <tr>
                                                </td>
                                            </tr>




                                                    




                                                    


                                                                          





                                                                            
           

                                                                    <!-- TTD APPROVE
                                                                    <center>
                                                                        <table id="ecrtabel" class="table table-bordered table-hover table-striped" style="text-align:center">
                                                                            <thead>
                                                                                <tr style="height:150px">
                                                                                    <td style="width:15% height=50%"> <label>APPROVED</label></td>
                                                                                    <td style="width:10%"> <label>BP</label></td>
                                                                                    <td style="width:10%"><label>PRC</label></td>
                                                                                    <td style="width:10%"> <label>WH</label></td>
                                                                                    <td style="width:10%"><label>MFG</label></td>
                                                                                    <td style="width:10%"> <label>QC</label></td>
                                                                                    <td style="width:10%"><label>PE</label></td>
                                                                                    <td style="width:10%"> <label>QA</label></td>
                                                                                    <td style="width:10%"><label>PC</label></td>
                                                                                </tr>

                                                                            </thead>

                                                                            <tbody></tbody>
                                                                        </table>
                                                                    </center> -->



                                                                </div> <!-- /.card-body -->
                                                            </div> <!-- /.card -->
                                                        </div> <!-- /.Col -->
                                                    </div> <!-- /.Row -->
                                                </div><!-- ./ Container -->
                                        </section>
                                    </div>
      <!--  modal-confirm-login -->
      <div class="modal fade" id="modal-confirm-login"> <!--untuk modal login-->
    <div class="modal-dialog"><!--untuk modal dialog-->
        <div class="modal-content bg-primary"><!--untuk bg-primary-->

        <div class="modal-header"><!--untuk modal header-->
            <h4 class="modal-title">Login confirmation</h4><!--title modal-->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!--fungsi button-->
            <span aria-hidden="true">&times;</span> <!--spam dengan lambang waktu-->
            </button>
        </div>

        <div class="modal-body"> <!--modal body-->

            <label id="error_login" > </label> <!--label error_login-->

             <div class="input-group mb-3"><!--fungsi input-->
            <input type="text" name="username" id="username" class="form-control" placeholder="UserID"><!--Userid bisa input-->
            <div class="input-group-append"><!--class input-->
                <div class="input-group-text"><!--class input-->
                <span class="fas fa-user"></span><!--spam dengan lambang user-->
                </div>
            </div>
            </div>

            <div class="input-group mb-3"><!--fungsi input-->
            <input type="password" name="password" id="password" class="form-control" placeholder="Password"><!--fungsi password-->
            <div class="input-group-append"><!--class input-->
                <div class="input-group-text"><!--class input-->
                <span class="fas fa-lock"></span><!--spam dengan lambang lock-->
                </div>
            </div>
            </div>

        </div>

        <div class="modal-footer justify-content-between"> <!--untuk modal footer-->

            <button type="button" id="login" onclick="Login_data()" class="btn btn-outline-light">Login</button> <!--button untuk login-->
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button><!--button untuk cancel-->

            <p class="mb-1">      
                <a href="http://10.73.142.75/forgot_password/" target="_blank">I forgot my password</a> <!--jika dipilih untuk lupa password-->       
            </p>


        </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!--  modal-confirm-approve -->
    <div class="modal fade" id="modal-confirm-approve"> <!--untuk modal confirm approve-->
    <div class="modal-dialog"><!--untuk modal dialog-->
        <div class="modal-content bg-success"><!--untuk bg-success-->

        <div class="modal-header"><!--untuk modal header-->
            <h4 class="modal-title">Approval confirmation</h4><!--title modal-->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><!--fungsi button-->
            <span aria-hidden="true">&times;</span><!--spam dengan lambang waktu-->
            </button>
        </div>

        <div class="modal-body"><!--modal body-->
            <label id="iddelete2" hidden> </label>Apakah ingin approve <label id="iddelete" hidden> </label> ? <!--trigger jika ada ingin approve-->
            <br>
            <label id="lblposition" hidden> </label>
            <br>
            <label id="lbluserconfirm" hidden> <?php echo $userid; ?> </label><!--fungsi untuk userconfirm-->
            <label id="iduserlogin" hidden> <?php echo $hdrid; ?> </label><!--fungsi untuk userlogin-->
        </div>

        <div class="modal-footer justify-content-between"><!--untuk modal footer-->

            <button type="button" id="delete" onclick="Approve_data()" class="btn btn-outline-light">Approve</button><!--button approve-->
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button><!--button cancel-->

        </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- modal-reject-approve -->
    <div class="modal fade" id="modal-reject">Reject_data <!--modal reject data-->
    <div class="modal-dialog"><!--untuk modal dialog-->
        <div class="modal-content bg-danger"><!--untuk bg-success-->
        <div class="modal-header"><!--modal header-->
            <h4 class="modal-title">Reason reject</h4><!--title modal-->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><!--fungsi button-->
            <span aria-hidden="true">&times;</span><!--spam dengan lambang waktu-->
            </button>
        </div>


        <div class="modal-body"><!--modal body-->
            <div class="form-group"><!--form group-->
            <div class="row"><!--row-->
                <div class="col-md-2">
                <label for="reason">REASON</label><!--judul label-->
                </div>
                <div class="col-md-10">
                <textarea rows="2" type="text" name="reason" class="form-control" id="reason"></textarea><!--text area untuk reason-->
                </div>
            </div>
            </div>
        </div>

        <div class="modal-footer justify-content-between"><!--untuk modal footer-->

            <input type="text" name="rejecter" value="<?php echo $this->session->userdata('nama') ?>" class="form-control" id="rejecter" hidden><!--hidden reject-->
            <!-- <input type="text" name="tbreject" class="form-control" id="tbreject" hidden> -->
            <input type="text" name="idreject" class="form-control" id="idreject" hidden><!--fungsi untuk reject-->
            <button type="button" id="process_reject" onclick="Reject_data()" class="btn btn-outline-light">Reject</button><!--button reject-->
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button><!--cancel button-->

        </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Reject-->

                                                                
    <script>

    //@see printDiv()
     ///@note fungsi untuk print
     ///@attention
        function printDiv(printdiv) {
            var printContents = document.getElementById(printdiv).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    <script>
        var qrcode = new QRCode(document.getElementById("qrcode"), { //fungsi untuk QRcode
            width: 100, //lebar 100
            height: 100, //tinggi 100
        });

    //@see makeCode()
     ///@note fungsi untuk membuat QRcode
     ///@attention
        function makeCode() {
            var elText = document.getElementById("text");

            qrcode.makeCode(elText.value);
        }

        makeCode();
    </script>

    <!-- 
    <script type='text/javascript'>

/*--This JavaScript method for Print command--*/

    function printDiv() {

        var toPrint = document.getElementById('printdiv');
        var popupWin = window.open();


        popupWin.document.open();
        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" media="print" href="<php echo base_url();?>assets/dist/css/test.css"/></head><body onload="window.print()">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');

        popupWin.document.close();

    }

</script> -->

    <!-- <script>
        function printDiv(printdiv) {
            var printContents = document.getElementById(printdiv).innerHTML;
            var originalContents = document.body.innerHTML;

            printContents.document.write('<html><head><style type="text/css">');
            printContents.document.write('table tbody tr td.bg-cm{background-color: #D9D9D9; text-align: center; vertical-align: middle;}');
            printContents.document.write('table {text-align: center;');
            printContents.document.write('</style></head><body onload="window.print();">');
            document.body.innerHTML = printContents;
            printContents.document.write('</body></html>');
            // window.print();

            document.body.innerHTML = originalContents;
        }
    </script> -->

</body>

</html>

<!-- <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script> -->

<script type="text/javascript">
    
      //@see view_modal()
     ///@note fungsi untuk membuat view modal pada print
     ///@attention
    function view_modal(hdrid1, status) {
        $('#hdrid').val(hdrid1);
        var hdrid = hdrid1; //variable hdrid
        var form_data_edit = $('#ecrform').serializeArray();//variable form_data_edit
        var field; //variable field
        var fieldvalue; //variable fieldvalue

        // Ajax isi data
        $.ajax({
            url: "<?php echo base_url('C_Ecr/ajax_getbyhdrid') ?>", //url ajax_getbyhdrid
            method: "get", //method get
            dataType: "JSON", //dataType JSON
            data: {
                hdrid: hdrid1
            },
            success: function(data) {
                $('#ecr_id').val(data.ecr_id); //data ecr_id
                $('#check_point').val(data.check_point); //data check_point
                $('#part_name').val(data.part_name);//data part_name
                $('#part_number_old').val(data.part_number_old);//data part_number_old
                $('#part_number_new').val(data.part_number_new);//data number_new
                $('#status').val(data.status);//data status
                // Refresh meeting
                tabel2.draw();

            },
            error: function(e) {
                alert(e);

            }
        });
    }
</script>

<script type="text/javascript">

  //@see formclose()
     ///@note fungsi untuk membuat form close
     ///@attention
    function formclose(){
        setTimeout(function(){var ww = window.open(window.location, '_self'); ww.close(); }, 1000); 
    }

    //@see Login_data()
     ///@note fungsi untuk membuat login data
     ///@attention
    function Login_data() {

    // Form data
    var fdata = new FormData();
    // var fdata2 = new FormData();

    // Update by Hdrid    
    fdata.append('username',  $('#username').val()); //update username
    fdata.append('password',  $('#password').val());//update password

    // alert('Hello');
  
    // Url Post Untuk login
    vurl = "<?php echo base_url('C_Print_approved/ajax_login') ?>";

    // Post data
    $.ajax({
      url: vurl, //url
      method: "post", //method post
      processData: false,
      contentType: false,
      data: fdata,
      success: function(data) {

         if(data.status=="OK") { //jika ok maka data akan refresh

            // Refresh Page
            location.reload();

         }else{

            // Munculkan pesan
            $('#error_login').text(data.status);
            // Clear inputan login
            $('#username').val("");
            $('#password').val("");

         }

      },
      error: function(e) {
        //Pesan Gagal
        gagal(e);
      }
    });

  }

      //@see Approve_data() 
     ///@note fungsi untuk membuat approve data
     ///@attention
  function Approve_data() {

    // alert(<php echo $hdrid ?>);

    // Form data
    var fdata = new FormData();
    // var fdata2 = new FormData();

    // Update by Hdrid
    fdata.append('problem_id',"<?php echo $hdrid ?>");//update problem_id
    fdata.append('nik', "<?php echo $nik->nik; ?>");//update nik
    fdata.append('name', "<?php echo $nik->name; ?>");//update name
    fdata.append('position_code', "<?php echo $nik->position_code; ?>");//position_code username
  
    var fdata2 = new FormData();

    fdata2.append("hdrid","<?php echo $hdrid ?>");//update hdrid
    fdata2.append("problem_name","<?php echo $tb_input_problem->problem_name ?>"); //update problem_name
    fdata2.append("group_product_name","<?php echo $tb_input_problem->group_product_name ?>"); //update group_product_name
    fdata2.append("product_name","<?php echo $tb_input_problem->product_name ?>"); //update product_name
    fdata2.append("name2","<?php echo $tb_input_problem->name2 ?>"); //update name2
    fdata2.append("problem_category_name","<?php echo $tb_input_problem->problem_category_name ?>"); //update problem_category_name

    fdata2.append("body_content",""); //body content approve
    fdata2.append("comment","");  //comment preview
    fdata2.append("status_subject",""); //status di preview
    fdata2.append('position_code', "<?php echo $nik->position_code; ?>");//posisi code di preview
   
    // Url Post Untuk Approve
    vurl = "<?php echo base_url('C_progress/ajax_approve') ?>";

    // Post data
    $.ajax({
    url: vurl, //url
      method: "post", //method post
      processData: false,
      contentType: false,
      data: fdata,
      success: function(data) {

        //fdata2.append("body_content",data.status); 
       // Hide modal delete
        berhasil("Approve success");  
        fdata2.append("body_content",data.status); 

        $('#modal-confirm-approve').modal('hide');
        // $('#modal-default').modal('hide');
        // berhasil(data.status);

        var vurl2; 
        vurl2 = "<?php echo base_url('C_Email/ajax_send_mail_v2')?>";// Url Post untuk send email

        $.ajax({
            url: vurl, //url
            method: "post", //method post
            processData: false,
            contentType: false,
            data: fdata2,
            success: function (data) {                 
                // Pesan berhasil  

            },
            error: function (e) {
                gagal(e);
                //location.reload();
                //error
            }
        });


      },
      error: function(e) {
        //Pesan Gagal
        gagal(e);
      }
    });

  }

      //@see Reject_data()
     ///@note fungsi untuk membuat reject data
     ///@attention
  function Reject_data() {

    // Validasi reason harus diisi
    if ($('#reason').val() == '') {
      gagal('Reason wajib diisi...');
      return false;
    }

    // Form data
    var fdata = new FormData();
    var fdata2 = new FormData();

    // Delete by Hdrid
    // fdata.append('hdrid',"<php echo $hdrid ?>");
    // fdata.append('rejected_by', "<php echo $name; ?>");
    // fdata.append('reason', $('#reason').val());

    fdata.append('hdrid',"<?php echo $hdrid ?>");//update hdrid
    fdata.append('rejected_by', "<?php echo $nik->name; ?>");//update rejected_by
    fdata.append('reason', $('#reason').val());//reason
    fdata.append('position_code', "<?php echo $nik->position_code; ?>");//position_code username
   
    // return false;    

    var fdata2 = new FormData();


    fdata2.append("hdrid","<?php echo $hdrid ?>"); //update hdrid
    fdata2.append("problem_name","<?php echo $tb_input_problem->problem_name ?>"); //update problem_name
    fdata2.append("group_product_name","<?php echo $tb_input_problem->group_product_name ?>"); //update group_product_name
    fdata2.append("product_name","<?php echo $tb_input_problem->product_name ?>"); //update product_name
    fdata2.append("name2","<?php echo $name ?>");  //update name2
    fdata2.append("problem_category_name","<?php echo $tb_input_problem->problem_category_name ?>");  //update problem_category_name
    fdata2.append("comment",$('#reason').val()); //update comment sudah diinput reason
    fdata2.append("status_subject","Rejected");//update status subject
    fdata2.append('position_code', "<?php echo $nik->position_code; ?>");//update position code

    // Url Post reject
    vurl = "<?php echo base_url('C_progress/ajax_reject') ?>";// Url Post untuk reject

    // Post data
    $.ajax({
      url: vurl,//url
      method: "post",//method post
      processData: false,
      contentType: false,
      data: fdata,
      success: function(data) {

        // Hide modal delete
        $('#modal-reject').modal('hide');
        $('#modal-default').modal('hide');

        // berhasil(data.status);
        var vurl2; 
        vurl2 = "<?php echo base_url('C_Email/ajax_send_mail_v1_reject')?>";// Url Post untuk send email

        $.ajax({
            url: vurl2,//url
            method: "post",//method post
            processData: false,
            contentType: false,
            data: fdata2,
            success: function (data) {                 
                // Pesan berhasil
                berhasil(data.status);                               
            },
            error: function (e) {
                gagal(e);
                //location.reload();
                //error
            }
        });


      },
      error: function(e) {
        //Pesan Gagal
        gagal(e);
      }
    });
  }

</script>

<script type="text/javascript">


    const Toast = Swal.mixin({
      toast: true,
      position: 'botton',
      showConfirmButton: false,
      timer: 5000
    });

    function berhasil($data)
      {

          Toast.fire({
          type: 'success',
          title: $data             
          });

      }

      function gagal($data)
      {
        
          Toast.fire({
          type: 'error',
          title: $data             
          });
      }

</script>

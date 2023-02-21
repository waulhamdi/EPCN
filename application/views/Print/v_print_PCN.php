<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quality Portal</title>

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

<!-- Format jenis, size font batas sini -->
  <style>
    body{                   /* jenis font pada body : calibri*/
        font-family: calibri;
        font-style:normal;
    }
    th{                      /* size font pada th : 14pixel */
        font-size:14px;
    }
    td{                     /* size font pada td : 12pixel */
        font-size:12px;
    }
    tfoot{                  /* size font pada tfoot : 12pixel */
        font-size:12px
    }
    ol{
        text-align:justify;
    }
  </style>
  <!-- Format jenis, size font batas sini -->

    <!-- CSS Order List 1.1 1.2 -->
  <style>
    ol {
      list-style-type: none;
      counter-reset: item;
      margin: 0;
      padding: 0;
      font-family:calibri;
    }

    ol > li {
      display: table;
      counter-increment: item;
      margin-bottom: 0.6em;
      font-family:calibri;
    }

    ol > li:before {
      content: counters(item, ".") ". ";
      display: table-cell;
      padding-right: 0.6em;  
      font-family:calibri;  
    }

    li ol > li {
      font-family:calibri;
      margin: 0;
    }

    li ol > li:before {
      content: counters(item, ".") " ";
      font-family:calibri;
    }

    dt{
        font-weight: normal;
    }
  </style>
    <!-- /CSS Order List -->

</head>

<body>
    <div >
        <section class="content">

            <?php echo $this->session->flashdata('message');  ?>
            <small>

                <div class="container-fluid" id="printdiv">
                    <div class="row">
                        <div class="col-12">
                            <!-- .col -->
                            <div class="card">
                                <!-- .card -->
                                <div class="card-body">
                                    <!-- .card-body -->

                                    <div class="">

                                     
                                         <?php if ($nik->name=='not found') {
                                            echo "Procedure Approved By = Close";
                                         } else {
                                            echo 'Procedure Approved By  = '.$nik->nik.' - '.$nik->name. '(' . $nik->position_name  .')'. '(' . $nik->position_code . ' of 3)';
                                         }?> 

                                        <?php if ($this->session->userdata('user_name') == ''  )  // test pakai admin = || $this->session->userdata('rolename')=='Administrator Quality'
                                            echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-login'> Login </button>";
                                        ?>

                                        <?php if ($this->session->userdata('user_name') == $nik->nik ) 
                                            {
                                                // redirect('Auth');
                                                echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-approve' > Approved</button>";
                                                echo "<button class='btn btn-warning float-right' data-toggle='modal' data-target='#modal-reject' >Reject</button>";
                                            }
                                            else{
                                                // redirect('Auth');
                                                echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-approve' hidden> Approved</button>";
                                                echo "<button class='btn btn-warning float-right' data-toggle='modal' data-target='#modal-reject' hidden>Reject</button>";
                                            }
                                        ?>

                                        <button class="btn btn-primary float-right" onclick="printDiv('printdiv')"><i class="fa fa-print"></i>A4</button>
                                        <button class="btn btn-danger float-right" onclick="formclose()"><i class="fa fa-times-circle"></i></button>
                                    </div>


                                    <!-- ECR -->
                                    <form class="form-horizntal" id="meetingform" role="form">
                                        <input id="text" type="text" hidden value="<?php $current = current_url() . '?var1=' . $tb_procedure_new->hdrid;
                                                                                    print_r($current); ?>" />
                                        
                                            <table id="ecrtabel" class="table table-bordered table-hover" style="break-after:page;">
                                                <!-- ************ HEADER COP APPROVAL ******************-->
                                                <thead>
                                                <tr >
                                                    <th colspan="10" style="vertical-align: middle; text-align:center">
                                                        <div class="row">
                                                            <div class="col-md-4" style="margin:auto;">
                                                                <img src="<?php echo base_url() ?>assets/dist/img/logo_denso.png"  alt="AdminLTE Logo" style="max-height:450px;" >      <!-- GET img DENSO -->
                                                            </div>
                                                            <!-- </th>
                                                            <th colspan="7" style="vertical-align: middle;"> -->
                                                                <div class="col-md-8" style="margin:auto;">
                                                                    <center><h1><strong>PT. DENSO MANUFACTURING</strong></h1></center>                              <!-- Header Name -->
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <th colspan="2" style="vertical-align: middle; text-align:center">
                                                            <h2><strong>CONFIDENTIAL</strong></h2>                                                          <!-- Header Name -->
                                                        </th>
                                                    </tr>
                                                    
                                                    
                                        <!-- **************Document No, Document Name, Issue Date *********** -->
                                                    <tr>
                                                        <td rowspan="1" colspan="2" style="vertical-align: middle; text-align:left"> 
                                                            <h5><p class="text-center"><strong>Document No</strong></p></h5>                    <!-- Label Document No-->
                                                        </td>
                                                        <td rowspan="1" colspan="2" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><?= $tb_procedure_new->hdrid; ?></p></h5>        <!--Get data hdird -->
                                                        </td>
                                                        <td colspan="4" width="30%" rowspan="3" style="vertical-align: middle;" >
                                                            <h3><p class="text-center"><strong><?= $tb_procedure_new->name_procedure; ?></strong></p></h3>      <!--Get data nama_procedure -->
                                                        </td>
                                                        <td rowspan="1" colspan="2" style="vertical-align: middle; text-align:left">
                                                            <h5><p class="text-center"><strong>Issue Date</strong></p></h5>                 <!-- label Issue Date -->
                                                        </td>
                                                        <td colspan="2" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><?php $date = $tb_procedure_new->issue_date;         //get data issu_date
                                                            $newDate = date("d/m/Y", strtotime($date));                                     //rubah format tanggal jadi 01/01/2000
                                                            echo $newDate; ?> </p></h5>                                                     <!--panggil var date-->
                                                        </td>
                                                    </tr>
                                        <!-- ******************* Revise No, Review Date ****************** -->
                                                    <tr>
                                                        <td colspan="2" rowspan="1" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><strong>Revise No</strong></p></h5>              <!-- label Revise NO -->          
                                                        </td>
                                                        <td colspan="2" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><?= $tb_procedure_new->revision_no;              //Get data revison_no
                                                             ?></p></h5>
                                                        </td>
                                                        
                                                        <td colspan="2" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><strong>Review Date</strong></p></h5>            <!-- label Review Date -->
                                                        </td>
                                                        <td colspan="2" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><?php $date= $tb_procedure_new->expire_date;         //get data expire_date
                                                            $newDate = date('d/m/Y', strtotime($date));                                     //rubah format tanggal jadi 01/01/2000
                                                            echo $newDate; ?> </p></h5>                                                     <!--panggil var date-->
                                                        </td>
                                                    </tr>
                                        <!-- ***************  Revise Date, Person In Charge **************** -->
                                                    <tr>
                                                        <td colspan="2" style="vertical-align: middle;">                                     <!-- /td -->  
                                                            <h5><p class="text-center"><strong>Revise Date</strong></p></h5>
                                                        </td>                                                                               <!-- /td -->
                                                        <td colspan="2" style="vertical-align: middle;">                                    <!-- td -->
                                                            <h5><p class="text-center"><?php $date = $tb_procedure_new->revision_date;         //get data expire_date
                                                            $newDate = date('d/m/Y', strtotime($date));                                        //rubah format tanggal jadi 01/01/2000
                                                            echo $newDate; ?></p></h5>                                                         <!--panggil var date-->
                                                        </td>                                                                                   <!-- /td -->
                                                        
                                                        <td colspan="2" style="vertical-align: middle;">                                        <!-- td -->
                                                            <h5><p class="text-center"><strong>Person In Charge</strong></p></h5>
                                                        </td>                                                                               <!-- /td -->
                                                        <td colspan="2" style="vertical-align: middle;">                                      <!-- td -->
                                                            <h5><p class="text-center"><?= $tb_procedure_new->pic; ?> </p></h5>                         <!--get data PIC -->
                                                        </td>                                                                               <!-- /td -->
                                                    </tr>

                                                    <td colspan="12" style="opacity:0;"></td>
                                                </thead>
                                                <!-- ************TABEL ISI CONTENT BODY APPROVAL ******************* -->
                                                <!-- <tbody>  -->
                                                <tbody>
                                                    <tr style="heigth: auto; text-left" >           <!--tr ( dari rata kiri)-->
                                                        <td colspan="14">
                                                            <h5><p class="text-left"><strong><?= $tb_procedure_new->name_procedure; ?></strong></p></h5>  <!--get data name_procedure -->
                                                            <!-- KET -->
                                                            <!-- OL (ORDER LIST = NOMOR) -->
                                                            <!-- DT (DESCRIPTION = DESKRIPSI) -->
                                                            <br>
                                                            <h5 style="font-style:normal;"> 

                                        <!--Order List 1.1 1.2 batas sini-->
                                                            <ol>

                                                            <!-- ************ 1.OBJEKTIF ******************* -->
                                                                <li>OBJECTIVE                                               <!-- label li-->
                                                                    <ol>                                                    <!-- ol -->
                                                                        <?php $objek =  $tb_procedure_new->objektif;        //create variable and get data from tb_procedure where objektif
                                                                        $split = explode("\n", $objek);?>                   <!-- split data array jika ada data enter maka angka list automatis  -->
                                                                        <?php foreach ($split as $ol_objektif): ?>         <!--  looping ol -->
                                                                        <li>                                                <!-- li-->
                                                                            <?php
                                                                            $dt = explode("|~", $ol_objektif);               // var jika ada simbol / pada data maka akan beralih ke dt (description)
                                                                            foreach ($dt as $dt_objektif): ?>               <!-- print ol_objektif, create variable $dt for dt_objektif, and looping dt-->
                                                                                <dt>                                        <!-- dt -->
                                                                                    <?php echo $dt_objektif; ?>             <!-- print dt_objektif -->
                                                                                </dt>                                       <!-- /dt -->
                                                                            <?php endforeach; ?>                            <!-- /looping dt -->
                                                                        </li>                                               <!-- /li -->
                                                                        <?php endforeach; ?>                            <!-- /looping ol -->
                                                                    </ol>                                               <!-- /ol -->
                                                                </li>                                                   <!-- /label li -->

                                                                <!-- ************ 2. SCOPE ******************* -->
                                                                <li>SCOPE                                               <!-- label -->
                                                                    <ol>                                                <!-- ol -->
                                                                        <?php $sc =  $tb_procedure_new->scope;          //create variable and get data from tb_procedure where scope
                                                                        $split = explode("\n", $sc);?>                   <!-- split data array jika ada data enter maka angka list automatis  -->
                                                                        <?php foreach ($split as $ol_scope): ?>         <!--  looping ol -->
                                                                        <li>                                            <!-- li-->
                                                                            <?php
                                                                            $dt = explode("|~",$ol_scope);               // var jika ada simbol / pada data maka akan beralih ke dt (description)
                                                                            foreach ($dt as $dt_scope): ?>              <!-- print ol_scope, create variable $dt for dt_scope, and looping dt-->
                                                                                <dt>                                    <!-- dt -->
                                                                                    <?php echo $dt_scope; ?>            <!-- print dt_scope -->
                                                                                </dt>                                    <!-- /dt -->
                                                                            <?php endforeach; ?>                        <!-- /looping dt -->
                                                                        </li>                                            <!-- /li -->
                                                                        <?php endforeach; ?>                             <!-- /looping ol -->
                                                                    </ol>                                                 <!-- /ol -->
                                                                </li>                                                   <!-- /label ol -->

                                                                <!-- ************ 3. DEFINITION ******************* -->
                                                                <li>DEFINITION                                          <!-- label li -->
                                                                    <ol>                                                <!-- ol -->
                                                                        <?php $defin =  $tb_procedure_new->definition;      //create variable and get data from tb_procedure where definition
                                                                        $split = explode("\n", $defin); ?>              <!-- split data array jika ada data enter maka angka list automatis  -->
                                                                        <?php foreach ($split as $ol_definiton): ?>         <!--  looping ol -->
                                                                        <li>                                                <!-- li-->
                                                                            <?php
                                                                            $dt = explode("|~",$ol_definiton);           // var jika ada simbol / pada data maka akan beralih ke dt (description)
                                                                            foreach ($dt as $dt_definition): ?>         <!-- print ol_definition, create variable $dt for dt_definition, and looping dt-->
                                                                                <dt>                                    <!-- dt -->
                                                                                    <?php echo $dt_definition; ?>       <!-- print dt_definition -->
                                                                                </dt>                                   <!-- /dt -->
                                                                            <?php endforeach; ?>                        <!-- /looping dt -->
                                                                        </li>                                                   <!-- /li-->
                                                                        <?php endforeach; ?>                            <!-- /looping ol -->
                                                                    </ol>                                               <!-- /ol -->
                                                                </li>                                                   <!-- /label li -->

                                                                <!-- ************ 4. CONTENT / GENERAL DESCRIPTION ******************* -->
                                                                <li>CONTENT/GENERAL DESCRIPTION                         <!-- label li -->
                                                                    <ol>                                                <!-- ol -->
                                                                        <?php $content =  $tb_procedure_new->content_general_description;   //create variable and get data from tb_procedure where content_general_description
                                                                        $split = explode("\n", $content);?>                   <!-- split data array jika ada data enter maka angka list automatis  -->
                                                                        <?php foreach ($split as $ol_content): ?>             <!--  looping ol --> 
                                                                        <li>                                                    <!-- li-->
                                                                            <?php
                                                                            $dt = explode("|~",$ol_content);                     // var jika ada simbol / pada data maka akan beralih ke dt (description)
                                                                            foreach ($dt as $dt_content): ?>                    <!-- print ol_content, create variable $dt for dt_content_general_descripion, and looping dt-->
                                                                                <dt>                                            <!-- dt -->
                                                                                    <?php
                                                                                    if (strpos($dt_content, "|1") != false) {
                                                                                        $disc = explode ("|1", $dt_content);
                                                                                        echo array_shift($disc); ?>
                                                                                        <ul>
                                                                                            <?php foreach ($disc as $ls_content): ?>                       <!--print dt_content_general_descripion -->
                                                                                            <li type="disc"> 
                                                                                                <?php echo $ls_content; ?>
                                                                                            </li>
                                                                                            <?php endforeach; ?>
                                                                                        </ul>
                                                                                    <?php }
                                                                                    elseif (strpos($dt_content, "|2") != false) {
                                                                                        $disc = explode ("|2", $dt_content);
                                                                                        echo array_shift($disc);
                                                                                        $i = 1;
                                                                                        foreach ($disc as $ls_content):
                                                                                            echo "<br>"; 
                                                                                            echo $i++;
                                                                                            echo ". ";
                                                                                            echo $ls_content;
                                                                                        endforeach; ?>
                                                                                    <?php }
                                                                                    else {
                                                                                        echo $dt_content;
                                                                                    } ?>
                                                                                </dt>                                           <!-- /dt -->
                                                                            <?php endforeach; ?>                                <!--  /looping dt -->
                                                                        </li>                                                       <!-- /li-->
                                                                        <?php endforeach; ?>                                    <!--  /looping ol -->
                                                                    </ol>                                                       <!--  /ol -->
                                                                </li>                                                             <!--  /label li -->

                                                                <!-- ************ 5. RELATE DOCUMENT ******************* -->
                                                                <li>RELATE DOCUMENT                                         <!-- label li -->
                                                                    <ol>                                                        <!-- ol -->
                                                                        <?php $relate =  $tb_procedure_new->relate_document;        //create variable and get data from tb_procedure where relate_document
                                                                        $split = explode("\n", $relate);?>                      <!-- split data array jika ada data enter maka angka list automatis  -->
                                                                        <?php foreach ($split as $ol_relate): ?>                  <!--  looping ol -->   
                                                                        <li>                                                        <!--  li --> 
                                                                            <?php
                                                                            $dt = explode("|",$ol_relate);                  // var jika ada simbol / pada data maka akan beralih ke dt (description)
                                                                            foreach ($dt as $dt_relate): ?>                  <!-- print ol_relate, create variable $dt for dt_relate, and looping dt-->
                                                                                <dt>                                            <!-- dt -->
                                                                                    <?php echo $dt_relate; ?>               <!-- print dt_relate -->
                                                                                </dt>                                           <!-- /dt -->
                                                                            <?php endforeach; ?>                                <!--  /looping dt --> 
                                                                        </li>                                                       <!--  /li --> 
                                                                        <?php endforeach; ?>                                    <!--  /looping ol --> 
                                                                    </ol>                                                       <!-- /ol -->
                                                                </li>                                                           <!-- /label li -->
                                                            </ol>                       
                                             <!-- /Order List 1.1 1.2 batas sini -->

                                                            </h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <!-- /tbody -->
                                                </table>
                                                <!-- /table -->

                                                
                                            <!-- *********** 6. TABLE FLOWCHART AND PERSON IN CHARGE RELATE BOX*********** -->
                                                <table id="ecrtabel" class="table table-bordered table-hover" style="text-align: break-after:page;"> 
                                                <!-- ************ HEADER COP APPROVAL ******************-->
                                                <thead>
                                                <tr >
                                                    <th colspan="10" style="vertical-align: middle; text-align:center">
                                                        <div class="row">
                                                            <div class="col-md-4" style="margin:auto;">
                                                                <img src="<?php echo base_url() ?>assets/dist/img/logo_denso.png"  alt="AdminLTE Logo" style="max-height:450px;" >      <!-- GET img DENSO -->
                                                            </div>
                                                            <!-- </th>
                                                            <th colspan="7" style="vertical-align: middle;"> -->
                                                                <div class="col-md-8" style="margin:auto;">
                                                                    <center><h1><strong>PT. DENSO MANUFACTURING</strong></h1></center>                              <!-- Header Name -->
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <th colspan="2" style="vertical-align: middle; text-align:center">
                                                            <h2><strong>CONFIDENTIAL</strong></h2>                                                          <!-- Header Name -->
                                                        </th>
                                                    </tr>
                                                    
                                                    
                                        <!-- **************Document No, Document Name, Issue Date *********** -->
                                                    <tr>
                                                        <td rowspan="1" colspan="2" style="vertical-align: middle; text-align:left"> 
                                                            <h5><p class="text-center"><strong>Document No</strong></p></h5>                    <!-- Label Document No-->
                                                        </td>
                                                        <td rowspan="1" colspan="2" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><?= $tb_procedure_new->hdrid; ?></p></h5>        <!--Get data hdird -->
                                                        </td>
                                                        <td colspan="4" width="30%" rowspan="3" style="vertical-align: middle;" >
                                                            <h3><p class="text-center"><strong><?= $tb_procedure_new->name_procedure; ?></strong></p></h3>      <!--Get data nama_procedure -->
                                                        </td>
                                                        <td rowspan="1" colspan="2" style="vertical-align: middle; text-align:left">
                                                            <h5><p class="text-center"><strong>Issue Date</strong></p></h5>                 <!-- label Issue Date -->
                                                        </td>
                                                        <td colspan="2" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><?php $date = $tb_procedure_new->issue_date;         //get data issu_date
                                                            $newDate = date("d/m/Y", strtotime($date));                                     //rubah format tanggal jadi 01/01/2000
                                                            echo $newDate; ?> </p></h5>                                                     <!--panggil var date-->
                                                        </td>
                                                    </tr>
                                        <!-- ******************* Revise No, Review Date ****************** -->
                                                    <tr>
                                                        <td colspan="2" rowspan="1" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><strong>Revise No</strong></p></h5>              <!-- label Revise NO -->          
                                                        </td>
                                                        <td colspan="2" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><?= $tb_procedure_new->revision_no;              //Get data revison_no
                                                             ?></p></h5>
                                                        </td>
                                                        
                                                        <td colspan="2" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><strong>Review Date</strong></p></h5>            <!-- label Review Date -->
                                                        </td>
                                                        <td colspan="2" style="vertical-align: middle;">
                                                            <h5><p class="text-center"><?php $date= $tb_procedure_new->expire_date;         //get data expire_date
                                                            $newDate = date('d/m/Y', strtotime($date));                                     //rubah format tanggal jadi 01/01/2000
                                                            echo $newDate; ?> </p></h5>                                                     <!--panggil var date-->
                                                        </td>
                                                    </tr>
                                        <!-- ***************  Revise Date, Person In Charge **************** -->
                                                    <tr>
                                                        <td colspan="2" style="vertical-align: middle;">                                     <!-- /td -->  
                                                            <h5><p class="text-center"><strong>Revise Date</strong></p></h5>
                                                        </td>                                                                               <!-- /td -->
                                                        <td colspan="2" style="vertical-align: middle;">                                    <!-- td -->
                                                            <h5><p class="text-center"><?php $date = $tb_procedure_new->revision_date;         //get data expire_date
                                                            $newDate = date('d/m/Y', strtotime($date));                                        //rubah format tanggal jadi 01/01/2000
                                                            echo $newDate; ?></p></h5>                                                         <!--panggil var date-->
                                                        </td>                                                                                   <!-- /td -->
                                                        
                                                        <td colspan="2" style="vertical-align: middle;">                                        <!-- td -->
                                                            <h5><p class="text-center"><strong>Person In Charge</strong></p></h5>
                                                        </td>                                                                               <!-- /td -->
                                                        <td colspan="2" style="vertical-align: middle;">                                      <!-- td -->
                                                            <h5><p class="text-center"><?= $tb_procedure_new->pic; ?> </p></h5>                         <!--get data PIC -->
                                                        </td>                                                                               <!-- /td -->
                                                    </tr>

                                                </thead>
                                                
                                                </table>
                                                <table id="ecrtabel" class="table table-bordered table-hover"> 
                                                <tbody>
                                                    <tr style="height:auto; width:50%; vertical-align: middle; text-align:center" colspan="6">
                                                        <!-- <td colspan="12" rowspan="10" style="vertical-align: middle;"><h5><p class="text-left">6. FLOW CHART</p></h5> -->
                                                        <td colspan="6" rowspan="10" style="width:50%">
                                                        <h5 style="text-align:left;"> 6. FLOW CHART
                                                            <!-- <ol start="6">
                                                                <li>FLOW CHART</li>
                                                            </ol> -->
                                                        </h5>
                                                        <img style="width:75%;" src="<?php echo base_url() . 'assets/upload/procedure/' . $tb_procedure_new->flow_chart; ?>" alt="">
                                                        </td>
                                                    </tr>
                                                    <tr >    
                                                <strong><td colspan="3">
                                                        <h5 style="text-align:center;">Person In Charge</h5>
                                                        </td>    
                                                        <td colspan="3">
                                                        <h5 style="text-align:center;">Relate Document</h5>
                                                        </td></strong>
                                                    </tr>
                                                        <!-- COL TABLE PERSON AND RELATE -->
                                                    <tr>
                                                        <td colspan="3" >
                                                            <h5>
                                                                <ul>
                                                                    <li>example person</li>
                                                                    <li>example person</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                        
                                                        <td colspan="3" >
                                                            <h5>
                                                                <ul>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"  >
                                                            <h5>
                                                                <ul>
                                                                    <li>example person</li>
                                                                    <li>example person</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                        
                                                        <td colspan="3" >
                                                            <h5>
                                                                <ul>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"  >
                                                            <h5>
                                                                <ul>
                                                                    <li>example person</li>
                                                                    <li>example person</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                        
                                                        <td colspan="3" >
                                                            <h5>
                                                                <ul>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"  >
                                                            <h5>
                                                                <ul>
                                                                    <li>example person</li>
                                                                    <li>example person</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                        
                                                        <td colspan="3" >
                                                            <h5>
                                                                <ul>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"  >
                                                            <h5>
                                                                <ul>
                                                                    <li>example person</li>
                                                                    <li>example person</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                        
                                                        <td colspan="3" >
                                                            <h5>
                                                                <ul>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"  >
                                                            <h5>
                                                                <ul>
                                                                    <li>example person</li>
                                                                    <li>example person</li>
                                                                    <li>example person</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                        
                                                        <td colspan="3" >
                                                            <h5>
                                                                <ul>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"  >
                                                            <h5>
                                                                <ul>
                                                                    <li>example person</li>
                                                                    <li>example person</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                        
                                                        <td colspan="3" >
                                                            <h5>
                                                                <ul>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                    <li>example relate</li>
                                                                </ul>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                
                                                
                                                </tbody>


                                            </table>
                                       
                                    </form>




                                    <!--REVISION HISTORY & APPROVAL -->
                                    <center>
                                        <table id="ecrtabel" class="table table-bordered table-hover table-striped" style="text-align:center">
                                            <tfoot>
                                                <tr colspan="8">
                                                <td>
                                                <h5> Date</h5>
                                                </td>

                                                <td>
                                                <h5> Rev. No</h5>
                                                </td>

                                                <td>
                                                <h5>Revision Content</h5>
                                                </td>

                                                <td>
                                                <h5> Written</h5>
                                                </td>

                                                <td>
                                                <h5>Checked</h5>
                                                </td>

                                                <td>
                                                <h5> Approved</h5>
                                                </td>
                                                <td></td>
                                                <td >
                                                <h5> Approved MR</h5>
                                                </td >
                                                </tr>
                                            <!-- KOLOM 1 -->
                                                <tr>
                                                    <!-- DATE -->
                                                    <td>
                                                        <h5><?php $date = $tb_procedure_new->revision_date;         //get data revision_date
                                                            $newDate = date('d/m/Y', strtotime($date));             //rubah format tanggal jadi 01/01/2000
                                                            echo $newDate; ?>                                       <!--panggil var date-->
                                                        </h5>
                                                    </td>

                                                    <td> 
                                                        <h5> <?= $tb_procedure_new->revision_no; ?></h5>
                                                    </td>                         
                                                    <td> <br> 
                                                    <!-- REVISION CONTENT (COMMENT REVISI) -->
                                                    </td>

                                                    <td>
                                                        <h5>
                                                            <?= $tb_procedure_new->nik; ?>                     <!--WRITTEN-->
                                                        </h5>
                                                    </td>

                                                    <td>
                                                        <!-- <h5>
                                                            <= $tb_approval->name; ?>
                                                        </h5> -->
                                                    </td>

                                                    <td> <br> 
                                                    <!-- APPROVED -->
                                                    </td>

                                                    <td></td>

                                                    <td> <br> 
                                                    <!-- APPROVED MR -->
                                                    </td>
                                                </tr>
                                            <!-- KOLOM 2 -->
                                                <tr>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                </tr>
                                            <!-- KOLOM 3 -->
                                                <tr>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                <td> <br> </td>
                                                </tr>
                                            </tfoot>

                                            
                                        </table>
                                    </center>



                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.Col -->
                    </div> <!-- /.Row -->
                    <!-- <div class="row">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">COMMENT:</label>
                            </div>
                            <div class="col-md-8">
                            <textarea type="text" name="comment" id="comment" rows="5" placeholder="enter..."></textarea>
                            </div>
                        </div>
                    </div> -->
                </div><!-- ./ Container -->
        </section>
    </div>

     <!--  modal-confirm-login -->
    <div class="modal fade" id="modal-confirm-login">
    <div class="modal-dialog">
        <div class="modal-content bg-primary">

        <div class="modal-header">
            <h4 class="modal-title">Login confirmation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <label id="error_login" > </label>

             <div class="input-group mb-3">
            <input type="text" name="username" id="username" class="form-control" placeholder="UserID">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
            </div>

            <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>

        </div>

        <div class="modal-footer justify-content-between">

            <button type="button" id="login" onclick="Login_data()" class="btn btn-outline-light">Login</button>
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>

            <p class="mb-1">      
                <a href="http://10.73.142.75/forgot_password/" target="_blank">I forgot my password</a>               
            </p>


        </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!--  modal-confirm-approve -->
    <div class="modal fade" id="modal-confirm-approve">
    <div class="modal-dialog">
        <div class="modal-content bg-success">

        <div class="modal-header">
            <h4 class="modal-title">Approval confirmation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <label id="iddelete2" hidden> </label>Apakah ingin approve <label id="iddelete" hidden> </label> ?
            <br>
            <label id="lblposition" hidden> </label>
            <br>
            <label id="lbluserconfirm" hidden> <?php echo $userid; ?> </label>
            <label id="iduserlogin" hidden> <?php echo $hdrid; ?> </label>
        </div>

        <div class="modal-footer justify-content-between">

            <button type="button" id="delete" onclick="Approve_data()" class="btn btn-outline-light">Approve</button>
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>

        </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- modal-reject-approve -->
    <div class="modal fade" id="modal-reject">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
        <div class="modal-header">
            <h4 class="modal-title">Reason reject</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <div class="modal-body">
            <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                <label for="reason">REASON</label>
                </div>
                <div class="col-md-10">
                <textarea rows="2" type="text" name="reason" class="form-control" id="reason"></textarea>
                </div>
            </div>
            </div>
        </div>

        <div class="modal-footer justify-content-between">

            <input type="text" name="rejecter" value="<?php echo $this->session->userdata('nama') ?>" class="form-control" id="rejecter" hidden>
            <!-- <input type="text" name="tbreject" class="form-control" id="tbreject" hidden> -->
            <input type="text" name="idreject" class="form-control" id="idreject" hidden>
            <button type="button" id="process_reject" onclick="Reject_data()" class="btn btn-outline-light">Reject</button>
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>

        </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Reject-->


    <script>
        function printDiv(printdiv) {
            var printContents = document.getElementById(printdiv).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    <!-- <script>
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            width: 100,
            height: 100,
        });

        function makeCode() {
            var elText = document.getElementById("text");

            qrcode.makeCode(elText.value);
        }

        makeCode();
    </script> -->

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
    function view_modal(hdrid1, status) {
        $('#hdrid').val(hdrid1);
        var hdrid = hdrid1;
        var form_data_edit = $('#ecrform').serializeArray();
        var field;
        var fieldvalue;

        // Ajax isi data
        $.ajax({
            url: "<?php echo base_url('C_Ecr/ajax_getbyhdrid') ?>",
            method: "get",
            dataType: "JSON",
            data: {
                hdrid: hdrid1
            },
            success: function(data) {
                $('#ecr_id').val(data.ecr_id);
                $('#check_point').val(data.check_point);
                $('#part_name').val(data.part_name);
                $('#part_number_old').val(data.part_number_old);
                $('#part_number_new').val(data.part_number_new);
                $('#status').val(data.status);
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


    function formclose(){
        setTimeout(function(){var ww = window.open(window.location, '_self'); ww.close(); }, 1000); 
    }

    function Login_data() {

    // Form data
    var fdata = new FormData();
    // var fdata2 = new FormData();

    // Update by Hdrid    
    fdata.append('username',  $('#username').val());
    fdata.append('password',  $('#password').val());

    // alert('Hello');
  
    // Url Post Untuk Approve
    vurl = "<?php echo base_url('C_Print_approved/ajax_login') ?>";

    // Post data
    $.ajax({
      url: vurl,
      method: "post",
      processData: false,
      contentType: false,
      data: fdata,
      success: function(data) {

         if(data.status=="OK") {

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

  function Approve_data() {

    // alert(<php echo $hdrid ?>);

    // Form data
    var fdata = new FormData();
    // var fdata2 = new FormData();

    // Update by Hdrid
    fdata.append('hdrid',"<?php echo $hdrid ?>");
    fdata.append('nik', "<?php echo $nik->nik; ?>");
    fdata.append('name', "<?php echo $nik->name; ?>");
    fdata.append('position_code', "<?php echo $nik->position_code; ?>");
  
    var fdata2 = new FormData();

    fdata2.append("hdrid","<?php echo $hdrid ?>");
    // fdata2.append("problem_name","<php echo $tb_procedure_new->problem_name ?>"); 
    // fdata2.append("group_product_name","<php echo $tb_procedure_new->group_product_name ?>"); 
    // fdata2.append("product_name","<php echo $tb_procedure_new->product_name ?>"); 
    // fdata2.append("name2","<php echo $tb_procedure_new->name2 ?>"); 
    // fdata2.append("problem_category_name","<php echo $tb_procedure_new->problem_category_name ?>"); 

    fdata2.append("body_content",""); 
    fdata2.append("comment",""); 
    fdata2.append("status_subject","");
    fdata2.append('position_code', "<?php echo $nik->position_code; ?>");
   
    // Url Post Untuk Approve
    vurl = "<?php echo base_url('C_Procedure_new/ajax_approve') ?>";

    // Post data
    $.ajax({
      url: vurl,
      method: "post",
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
        vurl2 = "<?php echo base_url('C_Email/ajax_send_mail_v2')?>";

        $.ajax({
            url: vurl2,
            method: "post",
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

    fdata.append('hdrid',"<?php echo $hdrid ?>");
    fdata.append('rejected_by', "<?php echo $nik->name; ?>");
    fdata.append('reason', $('#reason').val());
    fdata.append('position_code', "<?php echo $nik->position_code; ?>");
   
    // return false;    

    var fdata2 = new FormData();

    fdata2.append("hdrid","<?php echo $hdrid ?>"); 
    // fdata2.append("problem_name","<php echo $tb_procedure_new->problem_name ?>"); 
    // fdata2.append("group_product_name","hp echo $tb_procedure_new->group_product_name ?>"); 
    // fdata2.append("product_name","hp echo $tb_procedure_new->product_name ?>"); 
    // fdata2.append("name2","hp echo $name ?>"); 
    // fdata2.append("problem_category_name","hp echo $tb_procedure_new->problem_category_name ?>"); 
    fdata2.append("comment",$('#reason').val()); 
    fdata2.append("status_subject","Rejected");
    fdata2.append('position_code', "<?php echo $nik->position_code; ?>");

    // Url Post delete
    vurl = "<?php echo base_url('C_procedure_new/ajax_reject') ?>";

    // Post data
    $.ajax({
      url: vurl,
      method: "post",
      processData: false,
      contentType: false,
      data: fdata,
      success: function(data) {

        // Hide modal delete
        $('#modal-reject').modal('hide');
        $('#modal-default').modal('hide');

        // berhasil(data.status);
        var vurl2; 
        vurl2 = "<?php echo base_url('C_Email/ajax_send_mail_v1_reject')?>";

        $.ajax({
            url: vurl2,
            method: "post",
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

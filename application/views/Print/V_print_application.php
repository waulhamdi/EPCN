<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>DMIA E-PCN SYSTEM</title><!---- title dari judul view print---->

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

    <!-- Tooltip -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/Tooltips/Tooltip.css">

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
  </head>

  <body>
    <?php $this->session->userdata('user_name'); ?>
      <div class="container-fluid" id="printdiv"> <!---untuk container pada view print--->
        <button class="mr-1 btn btn-primary float-right" onclick="printDiv('printdiv')"><i class="fa fa-print"></i></button> <!--lambang print-->             
        <a href=”javascript:close_window();”>
          <button class="mr-1 btn btn-danger float-right" onclick="window.close();"><i class="fa fa-times-circle"></i></button> <!--lambang cancel -->
        </a>

    <style type="text/css">
      .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto; width:95%;}
      .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        overflow:hidden;padding:27px 6px;word-break:normal;}
      .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        font-weight:normal;overflow:hidden;padding:15px 6px;word-break:normal;}
      .tg .tg-j1i3{border-color:inherit;text-align:left;top:-1px;vertical-align:top;
        will-change:transform}
      .tg .tg-j1iI3{border-color:inherit;text-align:left;top:-1px;vertical-align:top; font-size:24px;
        font-weight:normal;will-change:transform}
      .tg .tg-j2i3{border-color:inherit;text-align:center;top:-1px;vertical-align:middle;
        will-change:transform}
      .tg .tg-p1nr{border-color:inherit;font-size:11px;text-align:left;vertical-align:top}
      .tg .tg-ih3h{border-color:inherit;text-align:center;top:-1px;vertical-align:top;
        will-change:transform}
      .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
      .tg .tg-0pky{border-color:inherit;text-align:center;vertical-align:top}
      .tg-s2cw{border-color:inherit;text-align:left;vertical-align:top}
    </style>

    <table class="tg">
      <thead>
        <tr>
          <th class="tg-j1iI3" colspan="16">APPLICATION RESPONSE OF PROCESS CHANGE</th>
          <th class="tg-j1i3" colspan="7" rowspan="4"></th>
          <th class="tg-ih3h" colspan="2">Originator</th>
        </tr>
        <tr>
        <th class="tg-j1i3" colspan="16">Process Change No. (PCR/PCN/ESC No.)  : <b><?= $tb_application->hdrid; ?></b></th>
          <th class="tg-j2i3" colspan="2" rowspan="3"><b><?= $tb_application->user_name; ?></th>
        </tr>
        <tr>
          <th class="tg-j1i3" colspan="16">Model/Product/Part Name  : <b><?= $tb_application->product_name; ?> / <b><?= $tb_application->part_name; ?></th>
        </tr>
        <tr>
          <th class="tg-j1i3" colspan="16">Customer/Supplier/Internal : <b><?= $tb_application->supplier; ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="tg-c3ow" colspan="8">Before Change</td>
          <td class="tg-c3ow" colspan="8">After Change</td>
          <td class="tg-c3ow" colspan="9">Comparison Detail</td>
        </tr>
        <tr>
          <td class="tg-0pky" colspan="8" rowspan="4"><b><?= $tb_application->current_process; ?></b></td>
          <td class="tg-0pky" colspan="8" rowspan="4"><b><?= $tb_PCNlist->proses_perubahan_baru;?></b></td>
          <td class="tg-0pky" colspan="9" rowspan="4" ><b><?= $tb_application->comparison_detail; ?></b></td>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <!-- <tr> -->
          <td class="tg-p1nr" colspan="25">Concern Item / Worry point&amp; Confirmation</td>
        <!-- </tr> -->
        <tr>
          <td class="tg-c3ow">Section</td>
          <td class="tg-c3ow" colspan="8">Concern Item / Worry point</td>
          <td class="tg-c3ow" colspan="14">Confirmation Requirement</td>
          <td class="tg-c3ow">Decision</td>
          <td class="tg-c3ow">Sign</td>
        </tr>
        <tr>
          <td class="tg-0pky" rowspan="2">PE</td>
          <td class="tg-0pky" colspan="8" rowspan="2"><b><?= $tb_application->comment_pe; ?></b></td>
          <td class="tg-0pky" colspan="14" rowspan="2"><b><?= $tb_application->confirm_pe; ?></b></td>
          <td class="tg-0pky" rowspan="2"><b><?= $tb_application->hold_or_go_pe; ?></b></td>
          <td class="tg-0pky" rowspan="2"><b><?= $tb_application->pe_name; ?></b></td>
        </tr>
        <tr>
        </tr>
        <tr>
          <td class="tg-0pky" rowspan="2">QCA/QCP</td>
          <td class="tg-0pky" colspan="8" rowspan="2"><b><?= $tb_application->comment_qc; ?></b></td>
          <td class="tg-0pky" colspan="14" rowspan="2"><b><?= $tb_application->confirm_qc; ?></b></td>
          <td class="tg-0pky" rowspan="2"><b><?= $tb_application->hold_or_go_qc; ?></b></td>
          <td class="tg-0pky" rowspan="2"><b><?= $tb_application->qc_name; ?></b></td>
        </tr>
        <tr>
        </tr>
        <tr>
          <td class="tg-0pky" rowspan="2">MFG</td>
          <td class="tg-0pky" colspan="8" rowspan="2"><b><?= $tb_application->comment_mfg; ?></b></td>
          <td class="tg-0pky" colspan="14" rowspan="2"><b><?= $tb_application->confirm_mfg; ?></b></td>
          <td class="tg-0pky" rowspan="2"><b><?= $tb_application->hold_or_go_mfg; ?></b></td>
          <td class="tg-0pky" rowspan="2"><b><?= $tb_application->mfg_name; ?></b></td>
        </tr>
        <tr>
        </tr>
        <tr>
          <td class="tg-0pky" rowspan="2">PC</td>
          <td class="tg-0pky" colspan="8" rowspan="2"><b><?= $tb_application->comment_pc; ?></b></td>
          <td class="tg-0pky" colspan="14" rowspan="2"><b><?= $tb_application->confirm_pc; ?></b></td>
          <td class="tg-0pky" rowspan="2"><b><?= $tb_application->hold_or_go_pc; ?></td>
          <td class="tg-0pky" rowspan="2"><b><?= $tb_application->pc_name; ?></b></td>
        </tr>
        <tr>
        </tr>
        <tr>
          <td class="tg-0pky" rowspan="2">QA</td>
          <td class="tg-0pky" colspan="8" rowspan="2"><b><?= $tb_application->comment_qa; ?></b></td>
          <td class="tg-0pky" colspan="14" rowspan="2"><b><?= $tb_application->confirm_qa; ?></b></td>
          <td class="tg-0pky" rowspan="2"><b><?= $tb_application->hold_or_go_qa; ?></b></td>
          <td class="tg-0pky" rowspan="2"><b><?= $tb_application->qa_name; ?></b></td>
        </tr>
        <tr>
          <!-- <td class="tg-p1nr" colspan="25">Concern Point &amp; Confirmation</td> -->
        </tr>
        <tr>
          <td class="tg-p1nr" colspan="25">Summary list Verification item </td>
        </tr>
        <tr>
          <td class="tg-c3ow">No</td>
          <td class="tg-c3ow" colspan="21">Item</td>
          <td class="tg-c3ow" colspan="2">PIC</td>
          <td class="tg-c3ow">Due</td>
        </tr>
        <tr>
          <td class="tg-0pky">1</td>
          <td class="tg-0pky" colspan="21"></td>
          <td class="tg-0pky" colspan="2"></td>
          <td class="tg-0pky"></td>
        </tr>
        <tr>
          <td class="tg-0pky">2</td>
          <td class="tg-0pky" colspan="21"></td>
          <td class="tg-0pky" colspan="2"></td>
          <td class="tg-0pky"></td>
        </tr>
        <tr>
          <td class="tg-0pky">3</td>
          <td class="tg-0pky" colspan="21"></td>
          <td class="tg-0pky" colspan="2"></td>
          <td class="tg-0pky"></td>
        </tr>
        <tr>
          <td class="tg-0pky">4</td>
          <td class="tg-0pky" colspan="21"></td>
          <td class="tg-0pky" colspan="2"></td>
          <td class="tg-0pky"></td>
        </tr>
        <tr>
          <td class="tg-0pky">5</td>
          <td class="tg-0pky" colspan="21"></td>
          <td class="tg-0pky" colspan="2"></td>
          <td class="tg-0pky"></td>
        </tr>
      </tbody>
    </table>
    </div>
  </body>

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
</html>
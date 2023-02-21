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

    <!-- Label For Chart -->
    <script src="<?php echo base_url() ?>assets/plugins/label-charts/labels.js"></script>

    <!-- <script src="<php echo base_url() ?>assets/plugins/qrcode.min.js"></script> -->

    <style>    
        .timeline {
        display: flex;
        align-items: center;
        position: relative;
        }

        .timeline-item {
        display: flex;
        align-items: center;
        margin-right: 30px;
        position: relative;
        }

        .timeline-item:before {
        content: "";
        background-color: #ddd;
        height: 2px;
        position: absolute;
        top: 50%;
        left: 100%;
        width: 80px;
        z-index: -1;
        }

        .timeline-icon {
        background-color: #4CAF50;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin-right: 20px;
        }

        .timeline-content {
        background-color: #ddd;
        padding: 20px;
        border-radius: 5px;
        }

        .timeline-content-date {
        font-weight: bold;
        margin-bottom: 10px;
        }

        .collapse-content {
        display: none;
        }

        .collapse-toggle {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
        margin-bottom: 10px;
        }

        .collapse-toggle:hover {
        background-color: #3e8e41;  
        }
        @media print{
            .timeline{
                display: none !important;
            }
            .hidePrint{
                display: none !important;
            }

        }
        /* @page {
            size:A4;
            margin: 11mm 5mm 6mm 5mm;
        } */
        .table-bordered, .table-bordered td, .table-bordered th, .table-bordered tr{
            padding: 0.05rem;
            margin: 0.05rem;
            /* border-collapse: separate ; */
            border:0.5px solid #000 !important;
        }
        h6{
            padding: 0.05rem;
            margin-bottom: 0rem;
        }
        p{
            padding: 0.05rem;
            margin-bottom: 0rem;
        }
        .form-group {
    margin-bottom: 0rem;
}
    </style>
</head>

<body>
        <div>
        <section class="content">

    <?php echo $this->session->flashdata('message'); ?>

<div class="container-fluid" id="printdiv"> <!---untuk container pada view print--->
    <div class="row"> <!---untuk container pada view print--->
        <div class="col-12">
            <!-- .col -->
            <div class="card">
                <!-- .card -->
                <div class="card-body">
                    <!-- .card-body -->
                    <div class="hidePrint">
                         
                         <a href=”javascript:close_window();”>
                            <button class="mr-1 btn btn-danger float-right" onclick="window.close();"><i class="fa fa-times-circle"></i></button> <!--lambang cancel -->
                        </a>
                        </div>
                        

                        <!-- Buka Table-->
                        <table id="ecrtabel" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ISIR</th>
                                <th>DATE SUBMIT</th>
                                <th>PIC PROC</th>
                                <th>RESULT (QC)</th>
                                <th>PIC QC</th>
                                <th>RESULT</th>
                                <th>REMARK</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                        
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

            <!--  modal-confirm-send-back -->
            <div class="modal fade" id="modal-confirm-send-back"> <!--untuk modal confirm approve-->
                <div class="modal-dialog"><!--untuk modal dialog-->
                    <div class="modal-content" style="background-color:#FA9228;"><!--untuk bg-success-->

                    <div class="modal-header"><!--untuk modal header-->
                        <h4 class="modal-title" style="color:white;">Send Back To PIC Procurement</h4><!--title modal-->
                        <button type="button" class="close" data-dismiss="modal" style="color:white;"  aria-label="Close"><!--fungsi button-->
                        <span aria-hidden="true">&times;</span><!--spam dengan lambang waktu-->
                        </button>
                    </div>

                    <div class="modal-body"><!--modal body-->
                        <div class="form-group"><!--form group-->
                        <div class="row"><!--row-->
                            <div class="col-md-2">
                            <label for="reason_send_back" style="color:white;">REASON</label><!--judul label-->
                            </div>
                            <div class="col-md-10">
                            <textarea rows="2" type="text" name="reason_send_back" class="form-control" id="reason_send_back"></textarea><!--text area untuk reason-->
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between"><!--untuk modal footer-->

                        <button type="button" id="delete" onclick="Send_Back_data()" class="btn btn-outline-light"><b>Send Back</b></button>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal"><b>Cancel</b></button><!--button cancel-->

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
                        <!-- <php if ($tb_approval->position_code>='10') { ?>                                         -->
                            <!-- <div class="form-group" clearfix>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="final_approve" value="Approved" name="final_approve"  >
                                            <label for="final_approve">
                                            Approved
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="final_approve2" value="Approved With condition" name="final_approve" >
                                            <label for="final_approve2">
                                            Approved With condition
                                            </label>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-4">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="final_approve3" value="Rejected with reason" name="final_approve" >
                                            <label for="final_approve3">
                                            Rejected with reason
                                            </label>
                                        </div>
                                    </div> -->
                                <!-- </div>
                            </div>  -->
                        <!-- <php } ?>   -->
                        <br>
                        <div class="col-md-12">
                            <textarea rows="2"  type="text" name="reason" class="form-control" id="reason"></textarea><!--text area untuk reason-->
                        </div> <br>
                        <label id="iddelete2" hidden> </label>Apakah ingin approve <label id="iddelete" hidden> </label> ? <!--trigger jika ada ingin approve-->
                        <br>
                        <label id="lblposition" hidden> </label>
                        <br>
                        <label id="lbluserconfirm" hidden> <?php echo $userid; ?> </label><!--fungsi untuk userconfirm-->
                        <label id="iduserlogin" hidden> <?php echo $hdrid; ?> </label><!--fungsi untuk userlogin-->
                    </div>

                    <div class="modal-footer justify-content-between"><!--untuk modal footer-->

                        <button type="button" id="delete" onclick="Approve_data()" class="btn btn-outline-light">Approve</button>
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

            <!-------------------- Macro Form batas sini -------------------->
            <!--  modal-answersheet --> 
            <div class="modal fade" id="modal-answersheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document" >
                    <div class="modal-content bg-info">            
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Answer Sheet</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <!-- form -->
                    <form role="form" id="quickForm">

                        <div class="card-body">
                        <hr style="border:0.5px solid white;">
                        <!---------------------------------- Form Macro Batas sini ---------------------------------->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="hdrid">PCN Number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="hdrid" class="form-control" id="hdrid" placeholder="auto generate" readonly>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="to:">TO:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="to" class="form-control" id="to" readonly>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>DATE ANWERSHEET:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerdate_anwersheet" data-target-input="nearest">
                                        <input type="text" class="form-control" id="date_anwersheet" name="date_anwersheet" readonly placeholder="auto generate">
                                        <!-- <input type="text" id="date_anwersheet" name="date_anwersheet" class="form-control datetimepicker-input" data-target="#timepickerdate_anwersheet"/> -->
                                            <!-- <div class="input-group-append" data-target="#timepickerdate_anwersheet" data-toggle="datetimepicker"> -->
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Global DENSO ESC category for approve method?</label>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" clearfix>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="category_for_approve" value="S" name="category_for_approve">
                                                <label for="category_for_approve">
                                                    S
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="category_for_approve2" value="A" name="category_for_approve">
                                                <label for="category_for_approve2">
                                                A
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="category_for_approve3" value="B" name="category_for_approve" >
                                                <label for="category_for_approve3">
                                                B
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="category_for_approve4" value="C" name="category_for_approve" >
                                                <label for="category_for_approve4">
                                                C
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                             
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="category_for_approve5" value="No" name="category_for_approve" >
                                                <label for="category_for_approve5">
                                                No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <br>

                            <div class="form-group" clearfix>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for=""></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="go_ahead_or_reject" value="go_ahead" name="go_ahead_or_reject">
                                                <label for="go_ahead_or_reject">
                                                Go ahead for change process
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="go_ahead_or_reject2" value="reject" name="go_ahead_or_reject">
                                                <label for="go_ahead_or_reject2">
                                                Rejected
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">PROCESS AUDIT</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" clearfix>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="process_audit" value="Will Implement" name="process_audit"  >
                                                <label for="process_audit">
                                                    Will Implement
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="process_audit2" value="Will Not Implement" name="process_audit" >
                                                <label for="process_audit2">
                                                    Will Not Implement
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>

                            <br>
                            <div id="audit_process">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Date Audit</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerdate_audit" data-target-input="nearest">
                                            <input type="text" id="date_audit" name="date_audit" class="form-control datetimepicker-input" data-target="#timepickerdate_audit"/>
                                                <div class="input-group-append" data-target="#timepickerdate_audit" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="form-group" clearfix>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Initial Product submitted to the Inspection</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="initial_product" value="required" name="initial_product"  >
                                            <label for="initial_product">
                                                REQUIRED
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="initial_product2" value="not required" name="initial_product" >
                                            <label for="initial_product2">
                                                NOT REQUIRED
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <br>
                            <div id="requerd">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Sample DueDate</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickersample_duedate" data-target-input="nearest">
                                            <input type="text" id="sample_duedate" name="sample_duedate" class="form-control datetimepicker-input" data-target="#timepickersample_duedate"/>
                                                <div class="input-group-append" data-target="#timepickersample_duedate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="sample_required">Sample Required</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="sample_required" class="form-control" id="sample_required" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="form-group" clearfix>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">INFORMATION TO CUSTOMER</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="information_to_customer" value="need" name="information_to_customer"  >
                                            <label for="information_to_customer">
                                                Need
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="information_to_customer2" value="no need" name="information_to_customer" >
                                            <label for="information_to_customer2">
                                                No Need
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="additional_information">ADDITIONAL INFORMATION</label>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <input type="text" name="additional_information" class="form-control" id="additional_information" > -->
                                        <textarea name="additional_information" id="additional_information" cols="60" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <!-- <div class="form-group" clearfix>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="final_approve" value="Approved" name="final_approve"  >
                                            <label for="final_approve">
                                            Approved
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="final_approve2" value="Approved With condition" name="final_approve" >
                                            <label for="final_approve2">
                                            Approved With condition
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="final_approve3" value="Rejected with reason" name="final_approve" >
                                            <label for="final_approve3">
                                            Rejected with reason
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        <!---------------------------------- / Form Macro Batas sini ---------------------------------->
                        <hr style="border:0.5px solid white;">
                        

                        <!-- Close Card Body -->  
                        </div>
                        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-light " id="btnsubmit">Submit</button>                 
                                <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>                   
                            </div>
                                    
                    </form>    
                    <!-- /form  -->

                    </div> 
                    <!-- Close modal-content -->  
                </div>
                <!-- Close modal-dialog -->  
            </div>
            <!-- modal-answersheet -->
            <!-------------------- /Macro Form batas sini -------------------->

                                                                        
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

            <!-- <script>
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
        </section>
    </div>
    </div>
</div>
</div>
</body>

</html>

<!-- <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script> -->

<!-- // Untuk Add,Edit,delete. -->
<script type="text/javascript">
    $(document).ready(function () {

        $.validator.setDefaults({
        submitHandler: function () {

            //berhasil( "Form successful submitted!" );
            var status=$('#exampleModalLabel').text();
        
            if (status=="#"){

            // Ajax insert data
            Simpan_data("#");

            }else if(status=="Answer Sheet"){ 

            // Ajax update data
            Simpan_data("AnswerSheet");

            }else{

            berhasil(status);

            }

        }
        });

        $('#quickForm').validate({
        rules: {

                    // ---------------------------------- Rule input Macro Batas sini 1---------------------------------
            category_for_approve: {
            required: true,
            },
            go_ahead_or_reject: {
            required: true,
            },
            process_audit: {
            required: true,
            },
            initial_product: {
            required: true,
            },
            information_to_customer: {
            required: true,
            },
            additional_information: {
            required: true,
            },



            // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

        },
        messages: {

            // ---------------------------------- Rule input Macro Batas sini 2---------------------------------
            category_for_approve: {
            required: "Please Input category_for_approve",
            minlength: 3
            },
            go_ahead_or_reject: {
            required: "Please Input go_ahead_or_reject",
            minlength: 3
            },
            process_audit: {
            required: "Please Input process_audit",
            minlength: 3
            },
            initial_product: {
            required: "Please Input initial_product",
            minlength: 3
            },
            information_to_customer: {
            required: "Please Input information_to_customer",
            minlength: 3
            },
            additional_information: {
            required: "Please Input additional_information",
            minlength: 3
            },
            // ---------------------------------- / Rule input Macro Batas sini 2--------------------------------


        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
        });
        });
    
    function view_modal(hdrid1,status){
                                
        if (status=="Add"){

            $('#exampleModalLabel').text('Add Data');  // name view
            $('#quickForm')[0].reset(); // reset form   
            $('#btnsubmit').text('Save'); // name Save
            document.getElementById("btnsubmit").style.visibility = "visible";    // Visible button              
            //Ajax kosongkan data

        }else {
        
            // Get Hdri ID
            $('#hdrid').val(hdrid1);
            var hdrid=hdrid1;   

            // Ajax isi data
            $.ajax({
            url: "<?php echo base_url('C_PrintA4_isir/ajax_getbyhdrid')?>",
            method: "get",
            dataType : "JSON",              
            data: {hdrid:hdrid1},
            success: function (data) {

                    // ---------------------------------- Data val Macro Batas sini ---------------------------------                  
                    $('#to').val(data.supplier_name);
                    var someDate = new Date();
                    var result = someDate.setDate(someDate.getDate());
                    $('#date_anwersheet').val(new Date(result).toISOString().slice(0, 10));

                    // Global DENSO ESC
                    if(data.category_for_approve=='S'){
                        document.getElementById('category_for_approve').checked=true;
                    }else if(data.category_for_approve=='A'){
                        document.getElementById('category_for_approve2').checked=true;
                    }else if(data.category_for_approve=='B'){
                        document.getElementById('category_for_approve3').checked=true;
                    }else if(data.category_for_approve=='C'){
                        document.getElementById('category_for_approve4').checked=true;
                    }else if(data.category_for_approve=='No'){
                        document.getElementById('category_for_approve5').checked=true;
                    }else{
                        document.getElementById('category_for_approve').checked=false;
                        document.getElementById('category_for_approve2').checked=false;
                        document.getElementById('category_for_approve3').checked=false;
                        document.getElementById('category_for_approve4').checked=false;
                        document.getElementById('category_for_approve5').checked=false;
                    }

                    // go and reject
                    if(data.go_ahead_or_reject=='go_ahead'){
                        document.getElementById('go_ahead_or_reject').checked=true;
                    }else if(data.go_ahead_or_reject=='reject'){
                        document.getElementById('go_ahead_or_reject2').checked=true;
                    }else{
                        document.getElementById('go_ahead_or_reject').checked=false;
                        document.getElementById('go_ahead_or_reject2').checked=false;
                    }

                    // PROCESS AUDIT
                    if(data.process_audit=='Will Implement'){
                        document.getElementById('process_audit').checked=true;
                        document.getElementById('audit_process').style.display ='block';
                    }else if(data.process_audit=='Will Not Implement'){
                        document.getElementById('process_audit2').checked=true;
                        document.getElementById('audit_process').style.display ='none';
                    }else{
                        document.getElementById('process_audit').checked=false;
                        document.getElementById('process_audit2').checked=false;
                        document.getElementById('audit_process').style.display ='none';
                    }
                    $('#date_audit').val(data.date_audit);

                    // Initial Product submitted
                    if(data.initial_product=='required'){
                        document.getElementById('initial_product').checked=true;
                        document.getElementById('requerd').style.display ='block';
                    }else if(data.initial_product=='not required'){
                        document.getElementById('initial_product2').checked=true;
                        document.getElementById('requerd').style.display ='none';
                    }else{
                        document.getElementById('initial_product').checked=false;
                        document.getElementById('initial_product2').checked=false;
                        document.getElementById('requerd').style.display ='none';
                    }
                    $('#sample_duedate').val(data.sample_duedate);
                    $('#sample_required').val(data.sample_required);

                    // INFORMATION TO CUSTOMER
                    if(data.information_to_customer=='need'){
                        document.getElementById('information_to_customer').checked=true;
                    }else if(data.information_to_customer=='no need'){
                        document.getElementById('information_to_customer2').checked=true;
                    }else{
                        document.getElementById('information_to_customer').checked=false;
                        document.getElementById('information_to_customer2').checked=false;
                    }

                    $('#additional_information').val(data.additional_information);
                    
                    // final 
                    

                // ---------------------------------- / Data val Macro  Batas sini ------------------------------

                                                        
                },
            error: function (e) {
                    alert(e);
                    
                }
            });
            
            // Disable and button submit dan text form           
            if(status=="View"){
            document.getElementById("btnsubmit").style.visibility = "hidden";  
            $('#exampleModalLabel').text('View Data'); //name view              
            }else{
            $('#exampleModalLabel').text('Answer Sheet'); //name view 
            $('#btnsubmit').text('Submit'); //name Update  
            document.getElementById("btnsubmit").style.visibility = "visible"; 
            }
        
        }

        //kondisi initial_product
        $('input[type=radio][name=initial_product]').change(function() {
          if(this.value == 'required'){
            $("#requerd").css('display','block');
          }else if(this.value =='not required'){
            $("#requerd").css('display','none');
            $('#sample_duedate').val('');
            $('#sample_required').val('');
          }else{
            $("#initial_product").removeAttr("checked");
            $("#requerd").css('display','none');
            }
        });
        
        //kondisi process_audit
        $('input[type=radio][name=process_audit]').change(function() {
          if(this.value == 'Will Implement'){
            $("#audit_process").css('display','block');
          }else if(this.value =='Will Not Implement'){
            $("#audit_process").css('display','none');
            $('#date_audit').val('');
          }else{
            $("#process_audit").removeAttr("checked");
            $("#audit_process").css('display','none');
            }
        });

    }

    function Simpan_data($trigger){

        // Form data
        var fdata = new FormData();

        // Form data collect name value
        var form_data = $('#quickForm').serializeArray();
        $.each(form_data, function (key, input) {
            fdata.append(input.name, input.value);
        });

        // if ($('#date_audit').val()=='') {
        //         fdata.append("date_audit", null);
        //     }


        // Simpan or Update data          
        var vurl; 
        if($trigger == 'Add') {            
            vurl = "<?php echo base_url('#')?>";
        } else {           
            vurl = "<?php echo base_url('C_PrintA4_isir/ajax_update_answersheet')?>";
        }
                
        $.ajax({
            url: vurl,
            method: "post",
            processData: false,
            contentType: false,
            data: fdata,
            success: function (data) {
                
                // Pesan berhasil
                berhasil(data.status);
                // Reset Form
                $('#quickForm')[0].reset();               
                location.reload();
                // tabel.draw();
                //  $("#modal-default").modal('hide');
                
            },
            error: function (e) {
                gagal(e);
                //error
            }
        });

        }

</script>

<script type="text/javascript">

  //@see formclose()
     ///@note fungsi untuk membuat form close
     ///@attention
    function formclose(){
        window.location.reload();
        window.close(); 
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
    vurl = "<?php echo base_url('C_PrintA4_isir/ajax_login') ?>";

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

    //@see Send_Back_data() 
    ///@note fungsi untuk membuat approve data
    ///@attention
    function Send_Back_data() {
        // Validasi reason harus diisi
        if ($('#reason_send_back').val() == '') {
        gagal('Reason wajib diisi...');
        return false;
        }

        // alert(<php echo $hdrid ?>);

        // Form data
        var fdata = new FormData();
        // var fdata2 = new FormData();

        // Update by Hdrid
        fdata.append('problem_id',"<?php echo $hdrid ?>");//update problem_id
        // fdata.append('nik', "<?php //echo $nik->nik; ?>");//update nik
        fdata.append('name', "<?php echo $this->session->nama; ?>");//update name
        fdata.append('reason', $('#reason_send_back').val());//reason
        // fdata.append('position_code', "<php echo $nik->position_code; ?>");//position_code username
        // fdata.append('position_name', "<php echo $nik->position_name; ?>");//position_name username
        fdata.append('nikreq', "<?php echo $tb_PCN->nik; ?>");//update position code

        var fdata2 = new FormData();

        fdata2.append("hdrid","<?php echo $hdrid; ?>");//update hdrid
        // fdata2.append("problem_name","<php echo $tb_input_problem->problem_name ?>"); //update problem_name
        // fdata2.append("group_product_name","<php echo $tb_input_problem->group_product_name ?>"); //update group_product_name
        // fdata2.append("product_name","<php echo $tb_input_problem->product_name ?>"); //update product_name
        // fdata2.append("name2","<php echo $tb_input_problem->name2 ?>"); //update name2
        // fdata2.append("problem_category_name","<php echo $tb_input_problem->problem_category_name ?>"); //update problem_category_name

        // fdata2.append("body_content",""); //body content approve
        // fdata2.append("comment","");  //comment preview
        // fdata2.append("status_subject",""); //status di preview
        fdata2.append('position_code', "<?php echo $nik->position_code; ?>");//posisi code di preview

        // Url Post Untuk Approve
        vurl = "<?php echo base_url('C_PCN/ajax_send_back') ?>";

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
            berhasil(data.status);  
            // fdata2.append("body_content",data.status); 

            $('#modal-confirm-send-back').modal('hide');
            window.location.reload();
            $('#modal-default').modal('hide');
            // berhasil(data.status);

            // var vurl2; 
            // vurl2 = "<?php //echo base_url('C_Email/ajax_send_mail_v2')?>";// Url Post untuk send email

            // $.ajax({
            //     url: vurl, //url
            //     method: "post", //method post
            //     processData: false,
            //     contentType: false,
            //     data: fdata2,
            //     success: function (data) {                 
            //         // Pesan berhasil  

            //     },
            //     error: function (e) {
            //         gagal(e);
            //         //location.reload();
            //         //error
            //     }
            // });


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
        var form_data = $('#modal-confirm-approve').serializeArray();
        $.each(form_data, function (key, input) {
            fdata.append(input.name, input.value);
        });

        // Update by Hdrid
        fdata.append('problem_id',"<?php echo $hdrid ?>");//update problem_id
        // fdata.append('nik', "<?php //echo $nik->nik; ?>");//update nik
        fdata.append('name', "<?php echo $this->session->nama; ?>");//update name
        fdata.append('position_code', "<?php echo $nik->position_code; ?>");//position_code username
        fdata.append('position_name', "<?php echo $nik->position_name; ?>");//position_name username
        fdata.append('reason', $('#reason').val());//reason
    
        var fdata2 = new FormData();

        fdata2.append("hdrid","<?php echo $hdrid; ?>");//update hdrid
        // fdata2.append("problem_name","<php echo $tb_input_problem->problem_name ?>"); //update problem_name
        // fdata2.append("group_product_name","<php echo $tb_input_problem->group_product_name ?>"); //update group_product_name
        // fdata2.append("product_name","<php echo $tb_input_problem->product_name ?>"); //update product_name
        // fdata2.append("name2","<php echo $tb_input_problem->name2 ?>"); //update name2
        // fdata2.append("problem_category_name","<php echo $tb_input_problem->problem_category_name ?>"); //update problem_category_name

        // fdata2.append("body_content",""); //body content approve
        // fdata2.append("comment","");  //comment preview
        // fdata2.append("status_subject",""); //status di preview
        fdata2.append('position_code', "<?php echo $nik->position_code; ?>");//posisi code di preview
        
        // Url Post Untuk Approve0
        vurl = "<?php echo base_url('C_PCN/ajax_approve') ?>";

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
            berhasil(data.status);
            location.reload(); 
            // console.log(data);
            // fdata2.append("body_content",data.status); 

            $('#modal-confirm-approve').modal('hide');
            // window.location.reload();
            $('#modal-default').modal('hide');
            berhasil(data.status);

   


        },
        error: function(e) {
            //Pesan Gagal
            // gagal(e);
            $('#modal-confirm-approve').modal('hide');
            // window.location.reload();
            $('#modal-default').modal('hide');
            berhasil(data.status);
            
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
    fdata.append('name', "<?php echo $this->session->nama; ?>");//update rejected_by
    fdata.append('reason', $('#reason').val());//reason
    fdata.append('position_code', "<?php echo $nik->position_code; ?>");//position_code username
    fdata.append('nikreq', "<?php echo $tb_PCN->nik; ?>");//update position code
    fdata.append('rejected_by', "<?php  echo $this->session->nama; ?>");//update position code
    // return false;    

    var fdata2 = new FormData();


    fdata2.append("hdrid","<?php echo $hdrid ?>"); //update hdrid
    // fdata2.append("problem_name","<php echo $tb_input_problem->problem_name ?>"); //update problem_name
    // fdata2.append("group_product_name","<php echo $tb_input_problem->group_product_name ?>"); //update group_product_name
    // fdata2.append("product_name","<php echo $tb_input_problem->product_name ?>"); //update product_name
    // fdata2.append("name2","<php echo $name ?>");  //update name2
    // fdata2.append("problem_category_name","<php echo $tb_input_problem->problem_category_name ?>");  //update problem_category_name
    fdata2.append("comment",$('#reason').val()); //update comment sudah diinput reason
    // fdata2.append("status_subject","Rejected");//update status subject
    fdata2.append('position_code', "<?php echo $nik->position_code; ?>");//update position code
   
    
    // Url Post reject
    vurl = "<?php echo base_url('C_PCN/ajax_reject') ?>";// Url Post untuk reject

    // Post data
    $.ajax({
      url: vurl,//url
      method: "post",//method post
      processData: false,
      contentType: false,
      data: fdata,
      success: function(data) 
      {
        // Hide modal delete
        $('#modal-reject').modal('hide');
        // $('#modal-default').modal('hide');
        berhasil(data.stat);
        if(<?php echo $nik->position_code; ?> ==  1 && <?php echo $nik->position_code; ?> == "Not Registered"){
            window.close(); 
        }else{
            location.reload();
        }

      },
      error: function(e) {
        //Pesan Gagal
        location.reload();
        // gagal(e);
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

<!-- <script type="text/javascript">
    const progressBar = document.getElementById("timeline");
        progressBar.addEventListener("mouseover", showTooltip);
        progressBar.addEventListener("mouseout", hideTooltip);

    function showTooltip(event) {
        const tooltip = document.createElement("div");
        tooltip.classList.add("tooltip");
        tooltip.innerHTML = `${event.target.value}%`;
        document.body.appendChild(tooltip);

        const rect = event.target.getBoundingClientRect();
        tooltip.style.left = `${event.clientX - rect.left}px`;
        tooltip.style.top = `${event.clientY - rect.top - 20}px`;
    }

    function hideTooltip() {
        const tooltip = document.querySelector(".tooltip");
        if (tooltip) {
            tooltip.remove();
        }
k
k    }
</script> -->


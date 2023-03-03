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
            /* border-collapse: separate !important; */
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
    <?php if ($tb_PCN != null): ?>
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
                         <?php if ($nik->name == 'not found') {
                             echo $nik->status;
                         } else if ($tb_application->status == 'Open') {
                             echo 'Waiting Response from Application Response';
                         } else {
                             echo 'Need Approve By    <b>' . $nik->name . '</b> ' . $nik->position_name . ' <b>(' . $nik->position_code . ' of 14)</b>';
                         } ?> 

                            <?php if ($this->session->userdata('user_name') == '') // function untuk user name untuk print
                                        echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-login'> Login </button>";
                                    ?>
                    
                            <?php
                            // var_dump($tb_application);
                            if ($tb_application->status == 'Closed' || $tb_application->status == 'Closed Response') {
                                if (strpos($nik->nik, $this->session->userdata('user_name'))) // function untuk user name untuk print datanya sudah ada di database
                                {
                                    // redirect('Auth');
                                    echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-approve' > Approved </button>"; //button approved
                        
                                    echo "<button class='mr-1 btn btn-danger float-right' data-toggle='modal' data-target='#modal-reject' >Reject</button> "; //button reject
                                    if ($nik->position_code > 1) {
                                        echo "<button class='mr-1 btn float-right' style='background-color:#FA9228;' data-toggle='modal' data-target='#modal-confirm-send-back' > <span style='color:white;'>Send Back</span> </button>"; //button send_back
                                    }
                                } else {
                                    // redirect('Auth');
                                    echo "<button class='btn btn-warning float-right' data-toggle='modal' data-target='#modal-confirm-send-back' hidden > Send Back</button>"; //button send_back
                                    echo "<button class='btn btn-success float-right' data-toggle='modal' data-target='#modal-confirm-approve' hidden > Approved</button>"; //button approved
                                    echo "<button class='mr-1 btn btn-danger float-right' data-toggle='modal' data-target='#modal-reject' hidden >Reject</button> "; //button reject
                                }
                            }
                            ?>
    
                            <button class="mr-1 btn btn-primary float-right" onclick="printDiv('printdiv')"><i class="fa fa-print"></i></button> <!--lambang print-->
                        
                             <a href=”javascript:close_window();”>
                                <button class="mr-1 btn btn-danger float-right" onclick="window.close();"><i class="fa fa-times-circle"></i></button> <!--lambang cancel -->
                            </a>
                            <button class="mr-1 btn btn-info float-right" data-toggle="modal" data-target="#modal-answersheet" onclick="view_modal('<?php echo $tb_PCN->hdrid ?>','')">AnswerSheet <i class="fa fa-comments"></i></button> <!--AnswerSheet-->
                        </div>
                        <!-- <php
                            if($tb_PCNlist->status = 'Plan Approval')
                                {
                                 $pic=$tb_approval->name;
                                }
                        ?> -->
                        <!-- onclick="view_modal('<php echo $tb_PCN->hdrid ?>','')" -->
                        <div class="timeline">

                            <div class="timeline-item">
                                <div class="timeline-content">
                                <p class="timeline-content-date" id="status1"></p>
                                <button class="collapse-toggle">PCN Registration</button>
                                    <div class="collapse-content">
                                        <?php foreach ($written_proc as $proc):
                                            if ($proc != 'not found') {
                                                echo "<table class='table table-bordered table-hover'>
                                                <tr>
                                                    <th>PIC</th>
                                                    <td> $proc->name </td>
                                                </tr>
                                                <tr>
                                                    <th>Date Approve/Reject</th>
                                                    <td> $proc->date_approve </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td> $proc->stat </td>
                                                </tr>
                                            </table>";
                                                // echo "<b> PIC : </b> " . $proc->name . "</br>";
                                                // echo "<b> Date Approve/Reject : </b> " . $proc->date_approve . "</br>";
                                                // echo "<b> Status : </b> " . $proc->stat . "</br>";
                                            }
                                        endforeach; ?>
                                        <?php foreach ($checked_proc as $proc) {
                                            if ($proc != 'not found') {
                                                echo "<table class='table table-bordered table-hover'>
                                                <tr>
                                                    <th>PIC</th>
                                                    <td> $proc->name </td>
                                                </tr>
                                                <tr>
                                                    <th>Date Approve/Reject</th>
                                                    <td> $proc->date_approve </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td> $proc->stat </td>
                                                </tr>
                                            </table>";
                                                // echo "<b> PIC : </b> " . $proc->name . "</br>";
                                                // echo "<b> Date Approve/Reject : </b> " . $proc->date_approve . "</br>";
                                                // echo "<b> Status : </b> " . $proc->stat . "</br>";
                                            }
                                            ;
                                        } ?>
                                        <?php foreach ($approve_proc as $proc) {
                                            if ($proc != 'not found') {
                                                echo "<table class='table table-bordered table-hover'>
                                                <tr>
                                                    <th>PIC</th>
                                                    <td> $proc->name </td>
                                                </tr>
                                                <tr>
                                                    <th>Date Approve/Reject</th>
                                                    <td> $proc->date_approve </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td> $proc->stat </td>
                                                </tr>
                                            </table>";
                                                // echo "<b> PIC : </b> " . $proc->name . "</br>";
                                                // echo "<b> Date Approve/Reject : </b> " . $proc->date_approve . "</br>";
                                                // echo "<b> Status : </b> " . $proc->stat . "</br>";
                                            }
                                            ;
                                        } ?>
                                            
                                    </div> 
                                </div>
                            </div>

                            <?php if ($approve_proc[0]->stat == 'unapprove' || $approve_proc[0]->stat == 'Rejected') { ?>
                                    <div class="timeline-item">
                                    <div class="timeline-icon"></div>
                                    <div class="timeline-content">
                                        <p class="timeline-content-date" id="status2"></p>                                
                                        <button class="collapse-toggle bg-light" >Application Response</button>                                
                                        <div class="collapse-content">
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="timeline-item">
                                    <div class="timeline-icon"></div>
                                    <div class="timeline-content">
                                        <p class="timeline-content-date" id="status2"></p>
                                
                                            <button class="collapse-toggle" >Application Response</button>
                                
                                
                                        <div class="collapse-content">
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    <th>QC Inpection</th>
                                                    <td><?= $tb_application->qc_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Hold / Go</th>
                                                    <td><?= $tb_application->hold_or_go_qc; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Comment</th>
                                                    <td><?= $tb_application->comment_qc; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>PE</th>
                                                    <td><?= $tb_application->pe_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Hold / Go</th>
                                                    <td><?= $tb_application->hold_or_go_pe; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Comment</th>
                                                    <td><?= $tb_application->comment_pe; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>MFG</th>
                                                    <td><?= $tb_application->mfg_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Hold / Go</th>
                                                    <td><?= $tb_application->hold_or_go_mfg; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Comment</th>
                                                    <td><?= $tb_application->comment_mfg; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>PC</th>
                                                    <td><?= $tb_application->pc_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Hold / Go</th>
                                                    <td><?= $tb_application->hold_or_go_pc; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Comment</th>
                                                    <td><?= $tb_application->comment_pc; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>QA</th>
                                                    <td><?= $tb_application->qa_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Hold / Go</th>
                                                    <td><?= $tb_application->hold_or_go_qa; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Comment</th>
                                                    <td><?= $tb_application->comment_qa; ?></td>
                                                </tr>
                                            </table>
                                            <!-- <p><b>QC Inpection : </b><= $tb_application->qc_name; ?></br>
                                                <b>Hold / Go : </b><= $tb_application->hold_or_go_qc; ?></br>
                                                <b>Comment : </b><= $tb_application->comment_qc; ?>
                                            </p>
                                            <p><b>PE : </b><= $tb_application->pe_name; ?></br>
                                                <b>Hold / Go : </b><= $tb_application->hold_or_go_pe; ?></br>
                                                <b>Comment : </b><= $tb_application->comment_qc; ?>
                                            </p>
                                            <p><b>MFG : </b><= $tb_application->mfg_name; ?></br>
                                                <b>Hold / Go : </b><= $tb_application->hold_or_go_mfg; ?></br>
                                                <b>Comment : </b><= $tb_application->comment_qc; ?>
                                            </p>
                                            <p><b>PC : </b><= $tb_application->pc_name; ?></br>
                                                <b>Hold / Go : </b><= $tb_application->hold_or_go_pc; ?></br>
                                                <b>Comment : </b><= $tb_application->comment_pc; ?>
                                            </p>
                                            <p><b>QA : </b><= $tb_application->qa_name; ?></br>
                                                <b>Hold / Go : </b><= $tb_application->hold_or_go_qa; ?></br>
                                                <b>Comment : </b><= $tb_application->comment_qa; ?>
                                            </p> -->
                                       
                                            <a class="btn btn-primary" href=" http://10.73.142.69/PCN/C_application?Number=<?= $hdrid ?>" target="_blank">Please click to response</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($tb_application->hold_or_go_qc == 'Go' && $tb_application->hold_or_go_pe == 'Go' && $tb_application->hold_or_go_mfg == 'Go' && $tb_application->hold_or_go_pc == 'Go' && $tb_application->hold_or_go_qa == 'Go') { ?>
                                <div class="timeline-item">
                                    <div class="timeline-icon"></div>
                                    <div class="timeline-content">
                                        <p class="timeline-content-date" id="status3"></p>
                                        <button class="collapse-toggle">Plan Approval</button>
                                        <div class="collapse-content">                                    
                                            <?php foreach ($written_qa as $qa) {
                                                if ($qa != 'not found') {
                                                    echo "<table class='table table-bordered table-hover'>
                                                <tr>
                                                    <th>PIC</th>
                                                    <td>$qa->name</td>
                                                </tr>
                                                <tr>
                                                    <th>Date Approve/Reject</th>
                                                    <td>$qa->date_approve</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>$qa->stat</td>
                                                </tr>
                                            </table>";
                                                    // echo "<b> PIC : </b> " . $qa->name . "</br>";
                                                    // echo "<b> Date Approve/Reject : </b> " . $qa->date_approve . "</br>";
                                                    // echo "<b> Status : </b> " . $qa->stat . "</br>";
                                                }
                                                ;
                                            } ?>
                                            <?php foreach ($checked_qa as $qa) {
                                                if ($qa != 'not found') {
                                                    echo "<table class='table table-bordered table-hover'>
                                                <tr>
                                                    <th>PIC</th>
                                                    <td>$qa->name</td>
                                                </tr>
                                                <tr>
                                                    <th>Date Approve/Reject</th>
                                                    <td>$qa->date_approve</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>$qa->stat</td>
                                                </tr>
                                            </table>";
                                                    // echo "<b> PIC : </b> " . $qa->name . "</br>";
                                                    // echo "<b> Date Approve/Reject : </b> " . $qa->date_approve . "</br>";
                                                    // echo "<b> Status : </b> " . $qa->stat . "</br>";
                                                }
                                                ;
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="timeline-item">
                                        <div class="timeline-icon"></div>
                                        <div class="timeline-content">
                                            <p class="timeline-content-date" id="status3"></p>
                                            <button class="collapse-toggle bg-light">Plan Approval</button>
                                            <div class="collapse-content">
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>

                            <?php if ($checked_qa[0]->stat == 'unapprove' || $checked_qa[0]->stat == 'Rejected') { ?>
                                    <div class="timeline-item">
                                        <div class="timeline-icon"></div>
                                            <div class="timeline-content">
                                                <p class="timeline-content-date" id="status5"></p>
                                                <button class="collapse-toggle bg-light">ISIR</button>
                                            </div>
                                    </div>  
                            <?php } else { ?>
                                    <div class="timeline-item">
                                    <div class="timeline-icon"></div>
                                    <div class="timeline-content">
                                    <p class="timeline-content-date" id="status5"></p>
                                    <button class="collapse-toggle">ISIR</button>
                                    <div class="collapse-content">
                                        <?php foreach ($tb_isir as $isir) {
                                            if ($isir != 'not found') {
                                                echo "<table class='table table-bordered table-hover'>
                                                <tr>
                                                    <th>ISIR</th>
                                                    <td>$isir->no_isir</td>
                                                </tr>
                                                <tr>
                                                    <th>STATUS</th>
                                                    <td>$isir->status</td>
                                                </tr>
                                            </table>";
                                                // echo "<b> ISIR : </b>" . $isir->no_isir . "</br>";
                                                // echo "<b> STATUS : </b> " . $isir->status . "</br>";
                                            } else {
                                                echo "Not Found ISIR";
                                            }
                                        } ?> <br>
                                        <a class="btn btn-primary" href=" http://10.73.142.69/PCN/C_ISIR?Number=<?= $hdrid ?>" target="_blank">Please click to ISIR List</a> </br>
                                        <a class="btn btn-secondary btn-sm mr-2"  href="http://10.73.142.69/PCN/C_PrintA4_isir/print_report2_approved?Number=<?= $hdrid ?>"  target="_blank">View ISIR</a>
                                    </div>
                                    </div>
                                </div>
                            <?php } ?>
                        
                            <?php if ($status_isir == 'OK') { ?>
                                        <div class="timeline-item">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-content">
                                                <p class="timeline-content-date" id="status4"></p>
                                                <button class="collapse-toggle">Trial Assembly (QCR)</button>
                                                    <div class="collapse-content">
                                                        <?php if ($tb_qcr != NULL) {
                                                            echo "<table class='table table-bordered table-hover'>
                                                    <tr>
                                                        <th> QCR Number </th>
                                                        <td> $tb_qcr->hdrid </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Note </th>
                                                        <td> $tb_qcr->note </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Drawing Attachment </th>
                                                        <td> $tb_qcr->hdrid </td>
                                                    </tr>
                                                    <tr>
                                                        <th> QCR Reply </th>
                                                        <td> $tb_qcr->qcr_reply </td>
                                                    </tr>
                                                    <tr>
                                                        <th> QCR Issue </th>
                                                        <td> $tb_qcr->qcr_issue </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Other Attached </th>
                                                        <td> $tb_qcr->other_attached </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Date Reply </th>
                                                        <td> $tb_qcr->date_reply </td>
                                                    </tr>
                                                    </table>";
                                                        } else {
                                                            echo " No Data QCR";
                                                        } ?>
                                                    </div>
                                            </div>
                                        </div> 
                                <?php } else { ?>
                                    <div class="timeline-item">
                                        <div class="timeline-icon"></div>
                                        <div class="timeline-content">
                                        <p class="timeline-content-date" id="status4"></p>
                                        <button class="collapse-toggle bg-light">Trial Assembly (QCR)</button>
                                        </div>
                                    </div> 
                            <?php } ?>
                        

                            <?php if ($final_checked_qa[0]->date_approve == '') { ?>
                                    <div class="timeline-icon"></div>
                                        <div class="timeline-content">
                                            <p class="timeline-content-date" id="status6"></p>
                                            <button class="collapse-toggle bg-light">Final Approval</button>
                                            <div class="collapse-content">
                                            </div>
                                        </div>
                                    </div>
                            <?php } else { ?>
                                    <div class="timeline-icon"></div>
                                        <div class="timeline-content">
                                            <p class="timeline-content-date" id="status6"></p>
                                            <button class="collapse-toggle">Final Approval</button>
                                            <div class="collapse-content">
                                                <?php foreach ($final_approve_qa as $final_qa):
                                                    if ($final_qa != 'not found') {
                                                        echo "<table class='table table-bordered table-hover'>
                                                <tr>
                                                    <th>PIC</th>
                                                    <td>$final_qa->name</td>
                                                </tr>
                                                <tr>
                                                    <th>Date Approve/Reject</th>
                                                    <td>$final_qa->date_approve</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>$final_qa->stat</td>
                                                </tr>
                                            </table>";
                                                    }
                                                    ;
                                                    // <p><b>PIC : </b><?=  $final_qa->name;  <br>
                                                    //     <b>Date Approve/Reject : </b><?= $final_qa->date_approve;  <br>
                                                    //     <b>Status : </b><?= $final_qa->stat; 
                                                    // </p>
                                                endforeach; ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            
                                <div class="hidePrint">
                                    <!-- <center><button class="btn btn-primary" data-toggle="modal" data-target="#modal-attachment" onclick="view_modal_attach('<php echo $tb_PCN->hdrid ?>','')">view all attachment</button></center> -->
                                    <!--***************** View All Attachment BATAS SINI *****************-->
                                    <div class="col-md-6"  style="margin-top: -20px;">
                                        <div class="card" >
                                        <div class="card-header bg-warning"  data-target="#closecollapse" data-card-widget="collapse">
                                            <h3 class="card-title"><i class="fas fa-paperclip text-success"></i> View All Attachment <span style="color:red;font-weight:bold"><?= $hdrid ?></span></h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- <div id="closecollapse"> -->
                                        <div class="card-body"  class="collapse" >
                                            <div style="overflow-x:auto;">
                                            <table id="#" class="table table-bordered table-hover" style="text-align:center;">
                                                <thead>
                                                    <tr>
                                                        <th>Preview Attachment</th>
                                                        <th>Name Attachment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc1 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc1 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc1 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                        <?php if (!$tb_PCN->attach_doc3 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc3 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                        <?php }
                                                        ; ?>                                                    
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc2 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc2 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc2 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>                                                        
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc3 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc3 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc3 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?> 
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc4 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc4 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc4 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc5 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc5 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc5 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc5 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc5 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc5 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc6 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc6 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc6 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc7 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc7 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc7 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc8 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc8 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc8 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc9 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc9 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc9 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc10 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc10 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc10 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc11 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc11 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc11 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc12 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc12 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc12 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc13 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc13 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc13 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc14 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc14 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc14 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc15 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc15 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc15 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc16 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc16 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc16 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc17 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc17 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc17 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc18 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc18 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc18 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc19 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc19 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc19 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc20 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc20 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc20 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc21 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc21 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc21 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc22 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc22 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc22 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc23 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc23 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc23 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc24 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc24 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc24 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc25 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc25 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc25 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc26 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc26 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc26 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc27 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc27 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc27 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if (!$tb_PCN->attach_doc28 == '') { ?>                                                     
                                                                <td>
                                                                    <?php echo "<a href=" . base_url('assets/upload/PCN/') . $tb_PCN->attach_doc28 . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File"; ?> 
                                                                </td>
                                                                <td>
                                                                    <?= $tb_PCN->attach_doc28 ?>
                                                                </td>
                                                        <?php }
                                                        ; ?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                            <!-- /.overflow -->
                                        </div>
                                        <!-- /.card-body -->
                                        <!-- </div> -->
                                        <!-- /.collapse #closeattach -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->

                                    <!--***************** /View All Attachment BATAS SINI *****************-->
                                </div>

                       

                            <script>
                                // let status = ["Status 1", "Status 2", "Status 3", "Status 4"];
                                // let statusDate = [<?= $tb_PCN->transaction_date; ?>, "Date 22", "Date 33", "Date 44"];

                                for (let i = 0; i < status.length; i++) {
                                document.getElementById("status" + (i + 1)).innerHTML = statusDate[i];
                                }

                                let coll = document.getElementsByClassName("collapse-toggle");
                                let i;

                                for (i = 0; i < coll.length; i++) {
                                coll[i].addEventListener("click", function() {
                                    this.classList.toggle("active");
                                    let content = this.nextElementSibling;
                                    if (content.style.display === "block") {
                                    content.style.display = "none";
                                    } else {
                                    content.style.display = "block";
                                    }
                                });
                                }
                            </script>

                        
                            <!-- ECR -->
                            <input id="text" type="text" hidden value="<?php $current = current_url() . '?var1=' . $tb_PCN->hdrid;
                            print_r($current); ?>" />                                                    
                        
                            <div class="" style="margin-top:-1vh">
                                <h6 style="text-align:right;"> 
                                SQA-A-15
                                </h6>   
                                <h6 style="text-align:right;"> 
                                    Effective Date : 09/08/2019
                                </h6>  
                            </div>                           

                            <!-- Buka Table-->
                            <table id="ecrtabel" class="table table-bordered table-hover">
                                <thead>
                                    <tr>                
                                        <th colspan="15" rowspan="1">
                                            <h7 tyle="text-align:left;">PT.DENSO MANUFACTURING INDONESIA</h7>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <!-- Judul / Header-->
                                                    <h5 style="text-align:right;"><b> PROCESS CHANGE NOTICE</b></h5>
                                                </div>
                                                <div class="col-md-5">
                                                    <h6 style="text-align:right;margin-right:84px">Supplier PCN No : 
                                                        <!-- <= $tb_PCN->hdrid; ?> -->
                                                    </h6>   
                                                </div>
                                            </div>   
                                            <h6 style="text-align:right;">PCN No : <?= $tb_PCN->hdrid; ?></h6>   
                                            <h6 style="text-align:left;">Date: <?php $date = $tb_PCN->transaction_date;
                                            $newDate = date("d M Y", strtotime($date));
                                            echo $newDate; ?>
                                            </h6> 
                                        </th>  
                                    </tr>
                                
                                    <tr>
                                        <td colspan="15" rowspan="1">
                                            <p style="text-align:left;margin-left:10px">
                                                Supplier Name : <?= $tb_PCN->supplier_name; ?></p>    
                                        
                                        </td>
                                    </tr>
                                </thead>  

                                    <tr>
                                        <td colspan="2" rowspan="2" style="heigth:20%;width:10%; text-align:center">
                                            <p>WRITTEN</p>
                                            <h6 style="margin-top:50px; font-size:10pt"><?php echo $tb_PCN->prepared; ?></h6>
                                        </td>
                                        <td colspan="2" rowspan="2" style="heigth:20%;width:10%; text-align:center">
                                            <p>CHECKED</p>
                                            <h6 style="margin-top:50px; font-size:10pt"><?php echo $tb_PCN->checked; ?></h6>
                                        </td>
                                        <td colspan="2" rowspan="2" style="heigth:20%;width:10%; text-align:center">
                                            <p>APPROVED</p>
                                            <h6 style="margin-top:50px; font-size:10pt"><?php echo $tb_PCN->approved; ?></h6>
                                        </td>
                                        <td colspan="6" rowspan="2" style="width:30%">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p for="normal" class="form-check-label">Is there any cost impact?</p>
                                                </div>

                                                <div class="col-md-2" style="padding-right: 9px;padding-left: 9px;">
                                                    <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" style="margin-left:-15px" <?php if ($tb_PCN->any_cost_impact == 'YES') {
                                                        echo 'checked';
                                                    } ?>><p>YES</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="checkbox" name="NC-Major" class="form-check-input mr-3" style="margin-left:-15px" <?php if ($tb_PCN->any_cost_impact == 'NO') {
                                                        echo 'checked';
                                                    } ?>><p>NO</p> 
                                                </div>
                                            </div>

                                            <p for="normal" class="form-check-label">If yes please mention: <?php echo $tb_PCN->please_mention; ?></p>  

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p for="normal" class="form-check-label">Is there affect to capacity ?</p>
                                                </div>
                                                <div class="col-md-2" style="padding-right: 9px;padding-left: 9px;">
                                                    <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" style="margin-left:-15px" <?php if ($tb_PCN->affect_to_capacity == 'YES') {
                                                        echo 'checked';
                                                    } ?>>YES
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="checkbox" name="NC-Major" class="form-check-input mr-3" style="margin-left:-15px" <?php if ($tb_PCN->affect_to_capacity == 'NO') {
                                                        echo 'checked';
                                                    } ?>>NO       
                                                </div>    
                                            </div>   

                                        

                                            <p for="normal" class="form-check-label">
                                                Capacity before: <?php echo $tb_PCN->before_capacity; ?>
                                            </p>

                                            <p for="normal" class="form-check-label">
                                                Capacity after: <?php echo $tb_PCN->after_capacity; ?>
                                            </p>
                                        </td>
                                        <td colspan="2" style="width:20%">DATE : <?php $date = $tb_PCN->transaction_date;
                                        $newDate = date("d M Y", strtotime($date));
                                        echo $newDate; ?><br>
                                                                    <p style="margin-left:20px">PURCHASING SECTION</p>
                                        </td>
                                        <td rowspan="2" style="width:20%">
                                            <p>Purchasing Section's Comment</p>  
                                            <p style="text-align:left;"> 
                                            Cost impact : <?= $tb_PCN->cost_impact; ?> 
                                                <br><br>
                                            Capacity : <?= $tb_PCN->capacity_impact; ?></p>
                                              
                                        </td>
                                    
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:bottom;font-size:10pt;height:5vh">
                                            <?php foreach ($written_proc as $proc):
                                                if ($proc != 'not found') {
                                                    echo "<p style='text-align:center;'>" . $proc->name . "</p>";
                                                }
                                            endforeach; ?>
                                            <?php foreach ($checked_proc as $proc):
                                                if ($proc != 'not found') {
                                                    echo "<p style='text-align:center;'>" . $proc->name . "</p>";
                                                }
                                            endforeach; ?> 
                                        
                                            <?php foreach ($checked2_proc as $proc):
                                                if ($proc != 'not found') {
                                                    echo "<p style='text-align:center;'>" . $proc->name . "</p>";
                                                }
                                            endforeach; ?>
                                            <p style="text-align:center;">
                                                <?= $checked_proc[0]->date_approve; ?>
                                            </p>
                                        </td>
                                        <td style="vertical-align:middle;font-size:10pt;height:5vh">
                                            <?php foreach ($approve_proc as $proc):
                                                if ($proc != 'not found') {
                                                    echo "<p style='text-align:center;'>" . $proc->name . "</p>";
                                                }
                                            endforeach; ?>
                                            <p style="text-align:center;">
                                                <?= $approve_proc[0]->date_approve; ?>
                                            </p>
                                        </td>
                                    
                                    </tr>

                            </table>

                            <table id="ecrtabel" class="table table-bordered table-hover">
                                <tr style="height:auto; width:100%; vertical-align: middle; text-align:left">
                                    <td colspan="5">
                                        <p style="text-align:left;"> Part No : </p>
                                        <h6 style="text-align:center; padding:0vh"><?= $tb_PCN->part_number; ?> </h6> 
                                    </td>
                                    <td colspan="5">
                                        <p style="text-align:left;">Part Name : </p>
                                        <h6 style="text-align:center; padding:0vh"><?= $tb_PCN->part_name; ?></h6>
                                    </td>
                                    <td colspan="5">
                                        <p style="text-align:left;"> Product Name : </p>
                                        <h6 style="text-align:center; padding:0vh"><?= $tb_PCN->product_name; ?></h6>
                                    </td>
                                </tr>
                            </table>

                            <table id="ecrtabel" class="table table-bordered table-hover">
                                <tr>
                                    <td colspan="1" rowspan="2" style="width:10%">
                                        <p style="font-size:11px;vertical-align:middle;writing-mode: vertical-lr; transform: rotate(180deg);margin-top:0.5vh">REASON FOR <br>CHANGE <br>OF PROCESS</p>
                                    </td>
                                    <td colspan="14" style="width:90%;margin:0vh">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p style="text-align:left;">Object :  </p>
                                                <h6 style="text-align:left;margin-left:20px;"><?= $tb_PCN->object_type; ?></h6>
                                            </div>
                                        </div>
                                      
                                    </td>
                                    </tr>
                                    <tr>
                                        <td colspan="13">
                                            <p style="text-align:left;">Reason : </p>
                                            <h6 style="margin-left:20px;"><?= $tb_PCN->reason_to_change; ?></h6>
                                        </td>
                                    </tr>
                                
                            
                                <tr>
                                    <td colspan="1" rowspan="3" style="width:10%">
                                        <p style="vertical-align:middle;writing-mode: vertical-lr; transform: rotate(180deg);margin-top:0.5vh">PROCESS <br> CHANGE <br> DETAILS</p>
                                    </td>

                                    <td colspan="14">
                                        <p style="text-align:left;">Description of Process Change : </p>
                                        <h6 style="margin-left:20px;"><?= $tb_PCN->description_of_process_change; ?></h6>
                                    </td>
                                </tr>
                                <tr style="height:2px">
                                    <td colspan="5">
                                        <p style="text-align:center;">Current Process</p>
                                    </td>
                                    <td colspan="5">
                                        <p style="text-align:center;">Proposed Process</p>
                                    </td>
                                    <td colspan="5">
                                        <p style="text-align:center;">Characteristics Affected:</p>
                                    </td>
                                </tr>
                                <tr>                                                                                                                           
                                    <td colspan="5">
                                        <h6 style="text-align:center;"><?= $tb_PCN->current_process; ?></h6>
                                    </td>
                                    <td colspan="5">
                                        <h6 style="text-align:center;"><?= $tb_PCN->proposed_process; ?></h6>
                                    </td>
                                    <td colspan="5">
                                        <h6 style="text-align:center;"><?= $tb_PCN->criteria_critical_item; ?></h6>
                                    </td>
                                </tr>
                        
                            </table>
                                            
                            <table id="ecrtabel" class="table table-bordered table-hover">
                                <tr style="height:1px;text-align:center">
                                    <td colspan="1" rowspan="10" style="width:10%;height:1px">
                                        <p style="vertical-align:middle;writing-mode: vertical-lr; transform: rotate(180deg);margin-top:8vh">SCHEDULE</p>
                                    </td>
                                    <td colspan="4" style="width:20%;height:1px">
                                        <h6 >Item</h6>   
                                    </td>
                                    <td colspan="10" style="width:70%;height:1px">
                                        <h6 >Plan</h6>   
                                    </td>

                                </tr>

                                <!-- a) Trial manufacturing Completed -->
                                <tr> 
                                    <td colspan="4" style="width:20%">
                                        <h6 style="word-wrap">a) Trial manufacturing Completed (protoype completed)</h6>
                                    </td>
                                    <td colspan="10" style="width:70%"> 
                                        <div class="row" style=" ;margin-top:1vh">
                                            <h6> &nbsp;
                                                <?php $date = $tb_PCN->trial_manufacturing;
                                                $newDate = date("d - F - Y ", strtotime($date));
                                                echo $newDate; ?>
                                            </h6>
                                            <h6><b>&nbsp; &#10230; &nbsp;</b></h6>
                                            <h6>
                                                <?php $date = $tb_PCN->trial_manufacturing_completed_finish;
                                                $newDate2 = date("d - F - Y ", strtotime($date));
                                                echo $newDate2; ?>
                                            </h6>
                                        </div>
                                    </td>
                                </tr>

                                <!-- b) Process capability study completed -->
                                <tr>
                                    <td colspan="4" style="width:20%">
                                        <h6 style="word-wrap"> b) Process capability study completed</h6>
                                    </td>
                                    <td colspan="10" style="width:70%"> 
                                        <div class="row" style="margin-left:5vh; margin-top:1vh">
                                            <h6> &nbsp;
                                                <?php $date = $tb_PCN->process_capability_study;
                                                $newDate = date("d - F - Y ", strtotime($date));
                                                echo $newDate; ?>
                                            </h6>
                                            <h6><b>&nbsp; &#10230; &nbsp;</b></h6>
                                            <h6>
                                                <?php $date = $tb_PCN->process_capability_study_completed_finish;
                                                $newDate2 = date("d - F - Y ", strtotime($date));
                                                echo $newDate2; ?>
                                            </h6>
                                        </div>
                                    </td>
                                </tr>

                                <!-- c) Initial sample inspection completed (supplier) -->
                                <tr>
                                    <td colspan="4" style="width:20%">
                                        <h6 style="word-wrap"> c) Initial sample inspection completed (supplier)</h6>
                                    </td>
                                    <td colspan="10" style="width:70%"> 
                                        <div class="row" style="margin-left:10vh; margin-top:1vh">
                                            <h6> &nbsp;
                                                <?php $date = $tb_PCN->initial_sample_inspection_completed;
                                                $newDate = date("d - F - Y ", strtotime($date));
                                                echo $newDate; ?>
                                            </h6>
                                            <h6><b>&nbsp; &#10230; &nbsp;</b></h6>
                                            <h6>
                                                <?php $date = $tb_PCN->initial_sample_inspection_completed_finish;
                                                $newDate2 = date("d - F - Y ", strtotime($date));
                                                echo $newDate2; ?>
                                            </h6>
                                        </div>
                                    </td>
                                </tr>

                                <!-- d) Initial sample submission -->
                                <tr>
                                    <td colspan="4" style="width:20%">
                                        <h6 style="word-wrap">d) Initial sample submission</h6>
                                    </td>
                                    <td colspan="10" style="width:70%"> 
                                        <div class="row" style="display:flex; justify-content: center ;margin-top:1vh">
                                            <h6> &nbsp;
                                                <?php $date = $tb_PCN->initial_sample_submission;
                                                $newDate = date("d - F - Y ", strtotime($date));
                                                echo $newDate; ?>
                                            </h6>
                                            <h6><b>&nbsp; &#10230; &nbsp;</b></h6>
                                            <h6>
                                                <?php $date = $tb_PCN->initial_sample_submission_finish;
                                                $newDate2 = date("d - F - Y ", strtotime($date));
                                                echo $newDate2; ?>
                                            </h6>
                                        </div>
                                    </td>
                                </tr>

                                <!-- e) Timing DENSO approval  -->
                                <tr>
                                    <td colspan="4" style="width:20%">
                                        <h6 style="word-wrap">e) Timing DENSO approval (Min 6 months after document completed if DMIA inform to customer)</h6>
                                    </td>
                                    <td colspan="10" style="width:70%"> 
                                        <div class="row" style="display:flex; justify-content: flex-end ; margin-right:10vh; margin-top:1vh">
                                            <h6> &nbsp;
                                                <?php $date = $tb_PCN->timing_denso_approval;
                                                $newDate = date("d - F - Y ", strtotime($date));
                                                echo $newDate; ?>
                                            </h6>
                                            <h6><b>&nbsp; &#10230; &nbsp;</b></h6>
                                            <h6>
                                                <?php $date = $tb_PCN->timing_denso_approval_finish;
                                                $newDate2 = date("d - F - Y ", strtotime($date));
                                                echo $newDate2; ?>
                                            </h6>
                                        </div>
                                    </td>
                                </tr>

                                <!-- f) Mass production starts -->
                                <tr>
                                    <td colspan="4" style="width:20%">
                                        <h6 style="word-wrap"> f) Mass production starts</h6>
                                    </td>
                                    <td colspan="10" style="width:70%"> 
                                        <div class="row" style="display:flex; justify-content: flex-end ; margin-right:5vh;">
                                            <h6> &nbsp;
                                                <?php $date = $tb_PCN->m_or_p_starts;
                                                $newDate = date("d - F - Y ", strtotime($date));
                                                echo $newDate; ?>
                                            </h6>
                                            <h6><b>&nbsp; &#10230; &nbsp;</b></h6>
                                            <h6>
                                                <?php $date = $tb_PCN->mass_production_starts_finish;
                                                $newDate2 = date("d - F - Y ", strtotime($date));
                                                echo $newDate2; ?>
                                            </h6>
                                        </div>
                                    </td>
                                </tr>

                                <!-- g) Mass production shipment -->
                                <tr >
                                    <td colspan="4" style="width:20%">
                                        <h6 style="word-wrap">g) Mass production shipment</h6>
                                    </td>
                                    <td colspan="10" style="width:70%"> 
                                        <div class="row" style="display:flex; justify-content: flex-end ; margin-right:1vh; margin-top:1vh">
                                            <h6> &nbsp;
                                                <?php $date = $tb_PCN->m_or_p_shipment;
                                                $newDate = date("d - F - Y ", strtotime($date));
                                                echo $newDate; ?>
                                            </h6>
                                            <h6><b>&nbsp; &#10230; &nbsp;</b></h6>
                                            <h6>
                                                <?php $date = $tb_PCN->mass_production_shipment_finish;
                                                $newDate2 = date("d - F - Y ", strtotime($date));
                                                echo $newDate2; ?>
                                            </h6>
                                        </div>
                                    </td>
                                </tr>

                                <!-- h) (Entry example) -->
                                <tr>
                                    <td style="text-align:center" colspan="4">
                                        <h6>(Entry example)</h6>
                                    </td>
                                    <td colspan="10" style="width:3px">                                </td>
                                </tr>
                            </table>

                            <table id="ecrtabel" class="table table-bordered table-hover">
                            
                                <tr>
                                    <td colspan="3" rowspan="2" style="width:70%">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h6 style="text-align:left;">
                                                        To: <?php if (!is_null($tb_PCN->to)) {
                                                            echo $tb_PCN->to;
                                                        } else {
                                                            echo "_______________";
                                                        } ?>
                                                </h6>
                                            
                                            </div>
                                            <div class="col-md-7">
                                                <h5 style="text-align:center;">
                                                    ANSWER SHEET
                                                </h5>
                                                <h6 style="text-align:right;margin-right:20px">
                                                    Date: <?php if (!is_null($tb_PCN->date_anwersheet)) {
                                                        $date = $tb_PCN->date_anwersheet;
                                                        $newDate = date("d / m / Y ", strtotime($date));
                                                        echo $newDate;
                                                    } else {
                                                        echo "_______________";
                                                    } ?>
                                                </h6>
                                            </div>
                                        </div>
                                    
                                        <div class="row" style="margin-left:1vh">
                                            <div class="col-md-7">
                                                Global Denso ESC category for approval method?
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group text-left form-check"  >
                                                <input type="checkbox" class="form-check-input mr-3" <?php if ($tb_PCN->go_ahead_or_reject == 'go_ahead') {
                                                    echo 'checked';
                                                } ?>>
                                                    <label for="normal" class="form-check-label">Go ahead for change process</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left:1vh">
                                            <div class="col-md-1">
                                                <div class="form-group text-left form-check">
                                                    <input type="checkbox" class="form-check-input mr-3" <?php if ($tb_PCN->category_for_approve == 'S') {
                                                        echo 'checked';
                                                    } ?>>
                                                    <label for="normal" class="form-check-label">S</label>
                                                </div>
                                            </div>

                                            <div class="col-md-1">
                                                <div class="form-group text-left form-check">
                                                    <input type="checkbox" class="form-check-input mr-3" <?php if ($tb_PCN->category_for_approve == 'A') {
                                                        echo 'checked';
                                                    } ?>>
                                                    <label for="normal" class="form-check-label">A</label>
                                                </div>
                                            </div>
    
                                            <div class="col-md-1">
                                                <div class="form-group text-left form-check">
                                                    <input type="checkbox" class="form-check-input mr-3" <?php if ($tb_PCN->category_for_approve == 'B') {
                                                        echo 'checked';
                                                    } ?>>
                                                    <label for="normal" class="form-check-label">B</label>
                                                </div>
                                            </div>
    
                                            <div class="col-md-1">
                                                <div class="form-group text-left form-check"  >
                                                    <input type="checkbox" class="form-check-input mr-3" <?php if ($tb_PCN->category_for_approve == 'C') {
                                                        echo 'checked';
                                                    } ?>>
                                                    <label for="normal" class="form-check-label">C</label>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <div class="form-group text-left form-check"  >
                                                    <input type="checkbox" class="form-check-input mr-3" <?php if ($tb_PCN->category_for_approve == 'No') {
                                                        echo 'checked';
                                                    } ?>>
                                                    <label for="normal" class="form-check-label">NO</label>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group text-left form-check"  >
                                                    <input type="checkbox" class="form-check-input mr-3" <?php if ($tb_PCN->go_ahead_or_reject == 'reject') {
                                                        echo 'checked';
                                                    } ?>>
                                                    <label for="normal" class="form-check-label">Rejected</label>
                                                </div>
                                            </div>
    
                                        </div>
                                            
                                        
                                    </td>
                                    <td colspan="3" style="width:30%;margin:0px;padding:0em;margin-bottom:-20px">
                                        <p style="text-align:center;margin:0px">PT. Denso Manufacturing Indonesia <br> QA Section</p>
                                    </td>
                                </tr>
                                <tr style="text-align:center;">
                                    <td colspan="1">
                                        <p>Written</p>
                                        <h6 style="margin-top:15px;font-size:10pt">
                                            <?php foreach ($written_qa as $qa):
                                                if ($qa != 'not found') {
                                                    if ($qa->date_approve != '') {
                                                        echo "<p style='text-align:center;'>" . $qa->name . "</p>";
                                                    }
                                                }
                                            endforeach; ?>    <?= $written_qa[0]->date_approve; ?>
                                        </h6>
                                    
                                    </td>
                                    <td colspan="1">
                                        <p>Checked</p>
                                        <h6 style="margin-top:15px;font-size:10pt">
                                            <?php foreach ($checked_qa as $qa):
                                                if ($qa->date_approve != '') {
                                                    echo "<p style='text-align:center;'>" . $qa->name . "</p>";
                                                }
                                            endforeach; ?>     <?= $checked_qa[0]->date_approve; ?>
                                        </h6>
                                    </td>
                                    <td colspan="1">
                                        <p>Approved</p>
                                        <h6 style="margin-top:15px;font-size:10pt">
                                            <?php foreach ($approve_qa as $qa):
                                                if ($qa->date_approve != '') {
                                                    echo "<p style='text-align:center;'>" . $qa->name . "</p>";
                                                }
                                            endforeach; ?>     <?="<p>" . $approve_qa[0]->date_approve . "</p>"; ?>
                                        </h6>
                                    </td>
                                </tr>
                            </table>

                            <table id="ecrtabel" class="table table-bordered table-hover">
                                <tr style="height:1px">
                                    <td colspan="2">
                                        <h6 style="text-align:left;">Process audit</h6> 
                                    </td>
                                
                                    <td colspan="5">
                                        <div class="form-group text-left form-check">
                                            <input type="checkbox" name="NC-Major" class="form-check-input mr-3" id="NC-Major" <?php if ($tb_PCN->process_audit == 'Will Implement') {
                                                echo 'checked';
                                            } ?>> <div class="row" style="margin-left:0.1vh">
                                                <p>Will Implement (Date: </p><p style="text-decoration: underline;"><?php
                                                if (!is_null($tb_PCN->date_audit)) {
                                                    $date = $tb_PCN->date_audit;
                                                    $newDate = date("d-M-Y", strtotime($date));
                                                    echo $newDate;
                                                } else {
                                                    echo "___________";
                                                }
                                                ?> )</p>  </div>
                                        </div>   
                                    </td>

                                    <td colspan="5">
                                        <div class="form-group text-left form-check">
                                            <input type="checkbox" name="NC-Major" class="form-check-input mr-3" id="NC-Major" <?php if ($tb_PCN->process_audit == 'Will Not Implement') {
                                                echo 'checked';
                                            } ?>><p>Will not Implement</p>
                                        </div>   
                                    </td>
                                </tr>    

                                <tr>
                                    <td colspan="2">
                                        <h6 style="text-align:left;">Initial Product submitted to inspection</h6> 
                                    </td>

                                    <td colspan="5">
                                        <div class="form-group text-left form-check">
                                            <input type="checkbox" class="form-check-input mr-3" id="NC-Major" <?php if ($tb_PCN->initial_product == 'required') {
                                                echo 'checked';
                                            } ?>>Required <br>
                                            <div class="row" style="margin-left:0.1vh">sample due date:( <p style="text-decoration: underline;"> <?php
                                            if (!is_null($tb_PCN->sample_duedate)) {
                                                $date = $tb_PCN->sample_duedate;
                                                $newDate = date("d-M-Y", strtotime($date));
                                                echo $newDate;
                                            } else {
                                                echo "___________";
                                            }
                                            ?> ) </p></div>sample required : ( <?=($tb_PCN->sample_required != '') ? $tb_PCN->sample_required : '___' ?> pcs )     
                                        </div>
                                    </td>

                                    <td colspan="5">   
                                        <div class="form-group text-left form-check">
                                            <input type="checkbox" class="form-check-input mr-3" id="NC-Major" <?php if ($tb_PCN->initial_product == 'not required') {
                                                echo 'checked';
                                            } ?>>Not required
                                        </div>   
                                    </td>
                                </tr>

                                <tr style="height:1vh">
                                    <td colspan="2">
                                        <h6 style="text-align:left;">Information to customer</h6> 
                                    </td>

                                    <td colspan="5">
                                        <div class="form-group text-left form-check">
                                            <input type="checkbox" name="NC-Major" class="form-check-input mr-3" id="NC-Major" <?php if ($tb_PCN->information_to_customer == 'need') {
                                                echo 'checked';
                                            } ?>>need
                                        </div>
                                    </td>

                                    <td colspan="5">   
                                        <div class="form-group text-left form-check">
                                            <input type="checkbox" name="NC-Major" class="form-check-input mr-3" id="NC-Major" <?php if ($tb_PCN->information_to_customer == 'no need') {
                                                echo 'checked';
                                            } ?>>no need
                                        </div>   
                                    </td>
                                </tr>               
                            
                                <tr>
                                    <td colspan="12">
                                        <h6 style="text-align:left;">Additional Information</h6> 
                                        <p style="margin-left:2vh"> <?= $tb_PCN->additional_information; ?> </p>
                                    </td>
                                </tr>
                            </table>

                            <table id="ecrtabel" class="table table-bordered table-hover">
                                <tr>
                                    <td colspan="4" rowspan="3" style="width:50%">
                                        <h6 style="text-align:left;">
                                            Final Approval For Mass Production
                                        </h6>
                                        <h6 style="text-align:left;">
                                            <b>(Supplier Can't masspro before final approval is given)</b>
                                        </h6>

                                        <div class="row" style="margin-left:3vh">
                                            <div class="col-md-4">
                                                <div class="form-group text-left form-check">
                                                    <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="will"  <?php if ($final_approve->stat == 'Approved' && $final_approve->reason == '') {
                                                        echo 'checked';
                                                    } ?>>
                                                    <label for="normal" class="form-check-label" style="text-align:left">
                                                        Approved
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                            </div>
                                        </div>
                                    
                                        <div class="row" style="margin-left:3vh">
                                            <div class="col-md-6">
                                                <div class="form-group text-left form-check">
                                                    <input type="checkbox" name="NC-Minor" class="form-check-input mr-3" id="will" <?php if ($final_approve->stat == 'Approved' && !$final_approve->reason == '') {
                                                        echo 'checked';
                                                    } ?>>
                                                    <label for="normal" class="form-check-label" style="text-align:left">
                                                        Approved With condition
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="normal" class="form-check-label" style="text-align:left">
                                                    : <?php if ($final_approve->stat == 'Approved' && !$final_approve->reason == '') {
                                                        echo $final_approve->reason;
                                                    } else {
                                                        echo "...........................";
                                                    }
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                    
                                        <div class="row" style="margin-left:3vh">
                                            <div class="col-md-6">
                                                <div class="form-group text-left form-check">
                                                    <input type="checkbox" class="form-check-input mr-3" id="will" <?php if ($final_approve->stat == 'Rejected') {
                                                        echo 'checked';
                                                    } ?>>
                                                    <label for="normal" class="form-check-label" style="text-align:left" >
                                                    Rejected with reason
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="normal" class="form-check-label" style="text-align:left">
                                                    : <?php if ($final_approve->stat == 'Rejected') {
                                                        echo $final_approve->reason;
                                                    } else {
                                                        echo "...........................";
                                                    }
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="5" style="width:50%;text-align:center;"><h6>PT. Denso Manufacturing Indonesia</h6></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align:center;"><h6>Quality Assurance Section</h6></td>
                                    <td colspan="2" style="text-align:center;"><h6>Purchasing Section</h6></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="text-align:center;">Written</p><br>
                                        <h6 style="text-align:center;font-size:10pt">
                                            <?php foreach ($final_written_qa as $qa):
                                                if ($qa->date_approve != '') {
                                                    echo "<p style='text-align:center;'>" . $qa->name . "</p>";
                                                }
                                            endforeach; ?>    <?= $final_written_qa[0]->date_approve; ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <p style="text-align:center;">Checked</p><br> 
                                        <h6 style="text-align:center;font-size:10pt">
                                            <?php foreach ($final_checked_qa as $qa):
                                                if ($qa->date_approve != '') {
                                                    echo "<p style='text-align:center;'>" . $qa->name . "</p>";
                                                }
                                            endforeach; ?>    <?= $final_checked_qa[0]->date_approve; ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <p style="text-align:center;">Approved</p><br>    
                                        <h6 style="text-align:center;font-size:10pt">
                                            <?php foreach ($final_approve_qa as $qa):
                                                if ($qa->date_approve != '') {
                                                    echo "<p style='text-align:center;'>" . $qa->name . "</p>";
                                                }
                                            endforeach; ?>    <?= $final_approve_qa[0]->date_approve; ?>
                                        </h6>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
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
                                <label for="reason_reject">REASON</label><!--judul label-->
                                </div>
                                <div class="col-md-10">
                                <textarea rows="2" type="text" name="reason_reject" class="form-control" id="reason_reject"></textarea><!--text area untuk reason-->
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
                    window.onafterprint = function () {
                        location.reload();
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
    <?php else: ?>
            <p style="text-align:center; font-size:32px; padding-top:120px; color:#000000;"><b>PCN Data With PCN Number: <span style="color:red;"><?= $hdrid ?></span> <br>Is Not Found</b></p>
    <?php endif; ?>
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
            url: "<?php echo base_url('C_Print_approvedDummy/ajax_getbyhdrid') ?>",
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
            vurl = "<?php echo base_url('#') ?>";
        } else {           
            vurl = "<?php echo base_url('C_Print_approvedDummy/ajax_update_answersheet') ?>";
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
    vurl = "<?php echo base_url('C_Print_approvedDummy/ajax_login') ?>";

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
            // berhasil(data.status);
            location.reload(); 
            // console.log(data);
            // fdata2.append("body_content",data.status); 

            $('#modal-confirm-approve').modal('hide');
            // window.location.reload();
            $('#modal-default').modal('hide');
            berhasil(data.status);

            var fdata2 = new FormData();

            fdata2.append('hdrid',"<?php echo $hdrid ?>");
            fdata2.append('nikreq', "<?php echo $tb_PCN->nik; ?>");//update position code
            fdata2.append('product', "<?php echo $tb_PCN->product_name; ?>");//update position code

            var vurl2; 
            vurl2 = "<?php echo base_url('C_Mail/ajax_mail_approve') ?>";

            $.ajax({
                url: vurl2,
                method: "post",
                processData: false,
                contentType: false,
                data: fdata2,
                success: function (data) {                 
                    // Pesan berhasil  
                    $('#modal-confirm-approve').modal('hide');
                    // $('#modal-default').modal('hide');
                    // berhasil('Berhasil');
                    location.reload();
                },
                error: function (e) {
                    // gagal(e);
                    // error
                    $('#modal-confirm-approve').modal('hide');
                    // $('#modal-default').modal('hide');
                    // berhasil(e);
                    // berhasil('Berhasil');
                    // location.reload();
                }
            });

        },
        error: function(e) {
            //Pesan Gagal
            // gagal(e);
            $('#modal-confirm-approve').modal('hide');
            // window.location.reload();
            $('#modal-default').modal('hide');
            // berhasil(data.status);
            
        }
        });

    }

      //@see Reject_data()
     ///@note fungsi untuk membuat reject data
     ///@attention
  function Reject_data() {

    // Validasi reason harus diisi
    if ($('#reason_reject').val() == '') {
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
    fdata.append('reason', $('#reason_reject').val());//reason
    fdata.append('position_code', "<?php echo $nik->position_code; ?>");//position_code username
    fdata.append('nikreq', "<?php echo $tb_PCN->nik; ?>");//update position code
    fdata.append('rejected_by', "<?php echo $this->session->nama; ?>");//update position code
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

        
        var fdata2 = new FormData();

        fdata2.append('hdrid',"<?php echo $hdrid ?>");
        fdata2.append('nikreq', "<?php echo $tb_PCN->nik; ?>");//update position code
        fdata2.append('rejected_by', "<?php echo $this->session->nama; ?>");//update position code
        fdata2.append('reason', $('#reason_reject').val());//reason

        var vurl2; 
        vurl2 = "<?php echo base_url('C_Mail/ajax_mail_reject') ?>";

        $.ajax({
            url: vurl2,
            method: "post",
            processData: false,
            contentType: false,
            data: fdata2,
            success: function (data) {                 
                // Pesan berhasil  
                $('#modal-confirm-approve').modal('hide');
                // $('#modal-default').modal('hide');
                berhasil('Berhasil');
                location.reload();
            },
            error: function (e) {
                // gagal(e);
                // error
                $('#modal-confirm-approve').modal('hide');
                // $('#modal-default').modal('hide');
                // berhasil(e);
                // berhasil('Berhasil');
                // location.reload();
            }
        });

      },
      error: function(e) {
        //Pesan Gagal
        berhasil('Berhasil Reject');
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


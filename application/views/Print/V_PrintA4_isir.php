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
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- DataTables Button-->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/toastr/toastr.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

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
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
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
    <script
        src="<?php echo base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
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
    <script
        src="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
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

        @media print {
            .timeline {
                display: none !important;
            }

            .hidePrint {
                display: none !important;
            }

        }

        /* @page {
            size:A4;
            margin: 11mm 5mm 6mm 5mm;
        } */
        .table-bordered,
        .table-bordered td,
        .table-bordered th,
        .table-bordered tr {
            /* padding: 0.05rem;
            margin: 0.05rem; */
            /* border-collapse: separate ; */
            border: 0.5px solid #000 !important;
        }

        h6 {
            /* padding: 0.05rem;
            margin-bottom: 0rem; */
        }

        p {
            /* padding: 0.05rem;
            margin-bottom: 0rem; */
        }

        .form-group {
            /* margin-bottom: 0rem; */
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
                                        <button class="mr-1 btn btn-danger float-right" onclick="window.close();"><i
                                                class="fa fa-times-circle"></i></button> <!--lambang cancel -->
                                    </a>
                                </div>


                                <!-- Buka Table-->
                                <table id="ecrtabel" class="table table-bordered table-hover"
                                    style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>ISIR</th>
                                            <th>DATE SUBMIT</th>
                                            <th>PIC PROC</th>
                                            <th>ISIR SUPPLIER</th>
                                            <th>ISIR IMPROVE</th>
                                            <th>RESULT (QC)</th>
                                            <th>PIC QC</th>
                                            <th>STATUS</th>
                                            <th>REMARK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tb_isir as $isir) {
                                            if ($isir != 'not found') { ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $isir->no_isir; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $isir->submit_date; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $isir->pic_pro; ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!$isir->isir == '') {
                                                            echo "<a href=" . base_url('assets/upload/isir/') . $isir->isir . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File";
                                                        }
                                                        ; ?>
                                                        <?php echo $isir->isir; ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!$isir->isir_imp == '') {
                                                            echo "<a href=" . base_url('assets/upload/isir/') . $isir->isir_imp . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File";
                                                        }
                                                        ; ?>
                                                        <?php echo $isir->isir_imp; ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!$isir->qc_result == '') {
                                                            echo "<a href=" . base_url('assets/upload/isir/') . $isir->qc_result . " class='btn btn-success' id='atachment_view' target='_blank'> <i class='fa fa-paperclip'></i> </a> Other File";
                                                        }
                                                        ; ?>
                                                        <?php echo $isir->qc_result; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $isir->pic_qc; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $isir->status; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $isir->remark; ?>
                                                    </td>
                                                </tr>
                                            <?php } else {
                                                echo "<tr><td colspan='9'>No data available in table</td> </tr>";
                                            }
                                            ;
                                        } ?>
                                    </tbody>
                                </table>


                            </div>
                            <!--  modal-confirm-login -->
                            <div class="modal fade" id="modal-confirm-login"> <!--untuk modal login-->
                                <div class="modal-dialog"><!--untuk modal dialog-->
                                    <div class="modal-content bg-primary"><!--untuk bg-primary-->

                                        <div class="modal-header"><!--untuk modal header-->
                                            <h4 class="modal-title">Login confirmation</h4><!--title modal-->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <!--fungsi button-->
                                                <span aria-hidden="true">&times;</span> <!--spam dengan lambang waktu-->
                                            </button>
                                        </div>

                                        <div class="modal-body"> <!--modal body-->

                                            <label id="error_login"> </label> <!--label error_login-->

                                            <div class="input-group mb-3"><!--fungsi input-->
                                                <input type="text" name="username" id="username" class="form-control"
                                                    placeholder="UserID"><!--Userid bisa input-->
                                                <div class="input-group-append"><!--class input-->
                                                    <div class="input-group-text"><!--class input-->
                                                        <span class="fas fa-user"></span><!--spam dengan lambang user-->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3"><!--fungsi input-->
                                                <input type="password" name="password" id="password"
                                                    class="form-control" placeholder="Password"><!--fungsi password-->
                                                <div class="input-group-append"><!--class input-->
                                                    <div class="input-group-text"><!--class input-->
                                                        <span class="fas fa-lock"></span><!--spam dengan lambang lock-->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer justify-content-between"> <!--untuk modal footer-->

                                            <button type="button" id="login" onclick="Login_data()"
                                                class="btn btn-outline-light">Login</button> <!--button untuk login-->
                                            <button type="button" class="btn btn-outline-light"
                                                data-dismiss="modal">Cancel</button><!--button untuk cancel-->

                                            <p class="mb-1">
                                                <a href="http://10.73.142.75/forgot_password/" target="_blank">I forgot
                                                    my password</a> <!--jika dipilih untuk lupa password-->
                                            </p>


                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->


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

        </section>
    </div>
    </div>
    </div>
    </div>
</body>

</html>


<script type="text/javascript">

    //@see formclose()
    ///@note fungsi untuk membuat form close
    ///@attention
    function formclose() {
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
        fdata.append('username', $('#username').val()); //update username
        fdata.append('password', $('#password').val());//update password

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
            success: function (data) {

                if (data.status == "OK") { //jika ok maka data akan refresh

                    // Refresh Page
                    location.reload();

                } else {

                    // Munculkan pesan
                    $('#error_login').text(data.status);
                    // Clear inputan login
                    $('#username').val("");
                    $('#password').val("");

                }

            },
            error: function (e) {
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

    function berhasil($data) {

        Toast.fire({
            type: 'success',
            title: $data
        });

    }

    function gagal($data) {

        Toast.fire({
            type: 'error',
            title: $data
        });
    }

</script>
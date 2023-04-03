<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header"><!-- untuk kepala judul aplikasi -->
  <div class="container-fluid"><!--untuk jenis container-->
    <div class="row mb-2"><!-- untuk row aplikasi-->
      <div class="col-sm-6"><!--untuk ukuran panjang container-->
        <h1 class="m-0 text-dark">PO Tooling</h1><!-- untuk menampilkan judul-->
      </div><!-- /.col -->
      <div class="col-sm-6"><!--untuk ukuran panjang container-->
        <ol class="breadcrumb float-sm-right"><!-- untuk tampilan dashboard aplikasi-->
          <li class="breadcrumb-item"><a href="C_dashboard_new">Dashboard PCN</a></li><!-- judul dashboard-->
          <li class="breadcrumb-item active"><a href="C_dashboard_new">DMIA E-PCN SYSTEM</a></li><!-- untuk container dashboard-->
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
    
    <!-- <php echo $this->session->flashdata('msg'); ?> -->

    <!-- ##################################### Batas Row 1 #####################################  -->

      <div class="col-12"> <!-- .col -->

        <div class="card"> <!-- .card -->

          <!-- .card-header -->
          <div class="card-header"> <!-- untuk bagian kepala aplikasi -->           
            <div class="row"><!-- untuk row aplikasi-->
               <div class="col-md-12"><!--untuk ukuran panjang container-->
                <div class="card">   <!--untuk class bagian kepala aplikasi-->              
                  <div class="card-header">    <!--untuk jenis bagian kepala aplikasi-->
                  <div id="accordion"><!--untuk menampilkan dan menyembunyikan element HTML-->
                      <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                      <div class="card card-primary"> <!--untuk primary kepala aplikasi-->

                        <div class="card-header"><!--untuk jenis bagian kepala aplikasi-->

                          <h4 class="card-title"><!--untuk judul bagian kepala aplikasi-->
                            <?php if(!empty($hak_akses)){ if ($hak_akses->allow_add=='on') { ?>
                              <a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal('1','Add')" href="#"><!--fungsi add data-->
                              <i class="fa fa-plus"></i> Add Data <!--judul add data-->
                              </a>
                            <?php } }?>
                            <?php if(!empty($hak_akses)){ if ($hak_akses->allow_import=='on') { ?>
                              <a data-toggle="modal" data-target="#modal-import"  href="#"><!--fungsi add data-->
                                <i class="fa fa-upload"></i> Import Data <!--judul add data-->
                              </a>
                            <?php } }?>
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsefilter"> <!--fungsi custom filler yang digunakan mencari tanggal input-->
                                 <i class="fa fa-binoculars"></i> Custom Filter <!--judul custom filler-->
                            </a>

                            <!-- <a href="<php echo base_url('C_Email/send2')?> "  Onclick='Delete_data()' >
                               <i class="fa fa-plus"></i> Send Mail
                            </a>

                            <button type="button" id="delete" onclick="Send_mail()" class="btn btn-outline-light">Send Mail 2</button>     -->

                          </h4>

                        </div>


                        <div id="collapsefilter" class="panel-collapse collapse in"> <!--untuk menampilkan dan menyembunyikan suatu menu--> 
                          <div class="card-body">  <!--untuk body pada kepala aplikasi-->

                              <!-- Date -->
                              <div class="form-group"> <!--untuk fungsi form-->                    

                                <label>Date From:</label> <!--judul date form-->
                                 
                                  <div class="input-group date" data-date-format="YYYY-MM-DD"  id="startdate" data-target-input="nearest"><!--untuk menentukan tanggal pada aplikasi-->
                                      <input type="text" id="search_fromdate" class="form-control datetimepicker-input" data-target="#startdate"/> <!--untuk menentukan mulai tanggal berapa -->
                                      <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker"><!--untuk menginput tanggal mulai-->
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>  <!--fungsi tanggal-->
                                      </div>
                                  </div>

                              </div>

                              <!-- Date To-->
                              <div class="form-group">
                                <label>Date To:</label>
                                  <div class="input-group date" data-date-format="YYYY-MM-DD" id="enddate" data-target-input="nearest"> <!--untuk menentukan tanggal pada aplikasi-->
                                      <input type="text" id="search_todate" class="form-control datetimepicker-input" data-target="#enddate"/> <!--untuk menentukan sampai tanggal berapa -->
                                      <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker"> <!--untuk sampai tanggal mulai-->
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div> <!--fungsi tanggal-->
                                      </div>
                                  </div>
                              </div>

                              <button type="button" id="search" class="btn btn-block btn-success" data-toggle="collapse" data-target="#collapseOne">Search</button> <!--fungsi tombol search tanggal dicari-->
                           
                          </div>
                        </div>
                      </div>
                    </div>            
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- END ACCORDION & CAROUSEL-->                                      
          </div> 
          <!-- /.card-header -->
          
          <div class="card-body">  <!-- .card-body -->

            <table id="example1" class="table table-bordered display nowrap table-striped">
       

              <thead>

              <tr>

                <!-- Th Macro Batas Sini -->
                <th>ACTION</th>
               <th>PCN NUMBER</th>
               <th>VENDOR SUBMISSION</th>
               <th>SUPPLIER NAME AND CODE</th>
               <th>PART NUMBER</th>
               <th>ASSY FOR</th>
               <th>PART NAME</th>
               <th>NUMBER OF TOOLING</th>
               <th>ORDERUP OR LESS CAPACITY</th>
               <th>COST DOWN</th>
               <th>QUALITY PROBLEM</th>
               <th>RENEWAL AND ADDITIONAL</th>
               <th>MONTH</th>
               <th>QTY</th>
               <th>START DELIVERY</th>
               <th>MOLD FINISH</th>
               <th>MOLD PRICE BEFORE</th>
               <th>MOLD PRICE AFTER</th>
               <th>M/C TONAGE BEFORE</th>
               <th>M/C TONAGE AFTER</th>
               <th>QTY CAVITY BEFORE</th>
               <th>QTY CAVITY AFTER</th>
               <th>CAVITY NO BEFORE</th>
               <th>CAVITY NO AFTER</th>
               <th>OUTPUT(Pcs/Hour)</th>
               <th>GUARANTEE SHOOT</th>
               <th>GAMBAR</th>
               <th>TOTAL RENEWAL</th>
               <th>CHANGE CORE</th>
               <th>CHANGE MOVING DIES</th>
               <th>CHANGE FIX DIES</th>
               <th>TOTAL SHOT</th>
               <th>T0/T1 TRIAL</th>
               <th>SAMPLE ISIR SUBMISSION</th>
               <th>CYCLE TIME</th>
               <th>CAVITY</th>
               <th>OUTPUT(Pcs/Hour)</th>
               <th>TOTAL OUTPUT/MONTH</th>
               <th>APPROVAL SUBMISSION OF RENEWAL MOLD</th>
               <th>APPROVED</th>
               <th>CHECKED</th>
               <th>PREPARED</th>
               <th>TOOLING NO</th>
               <th>TOOLING COST</th>
               <th>DEPRESIATION COST</th>
               <th>PART PRICE</th>
               <th>TOTAL COST</th>
               <th>REMARK</th>
               <th>APPROVAL</th>
               <th>LIFE SHOOT GUARANTEE</th>
               <th>FORCAST PC AND NENKEI</th>
               <th>QUOTATION</th>

                <!-- /Th Macro Batas Sini -->
                      
              </tr>

              </thead>

              <tbody></tbody>
          
            </table>
                    
          </div> <!-- /.card-body -->
         
        </div> <!-- /.card -->
      </div> <!-- /.col -->

    <!-- ##################################### / Batas Row 1 #####################################  -->
    </div> <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->    
</div>
<!-- /.content-wrapper -->

<!-- ##################################### Batas Modal #####################################  -->

 <!-- modal-Add / Update -->
 <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  <!--fungsi add data-->
    <div class="modal-dialog modal-lg" role="document" >  <!--untuk tampilan add data aplikasi-->
        <div class="modal-content">            <!--content add data-->
          <div class="modal-header"> <!--untuk header add data-->
              <h4 class="modal-title" id="exampleModalLabel">ADD DATA</h5> <!--judul add data-->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!--untuk fungsi tombol close-->
              <span aria-hidden="true">&times;</span>  <!-- jika data ditambah maka data akan muncul--> 
              </button>
          </div>

          <!-- form -->
          <form role="form" id="quickForm">

            <div class="card-body">
  

            <!---------------------------------- Form Macro Batas sini ---------------------------------->
                    <div class="card card-primary">
                      <div class="card-header" data-toggle="collapse" href="#collapseOne">
                        <h4 class="card-title" data-toggle="collapse" href="#collapseOne">
                            PO Tooling
                        </h4>
                      </div>
                      <!-- /card header -->
                    <div id="collapseOne" class="panel-collapse collapse">
                    <div class="card-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4">
                            <label for="hdrid">PCN NUMBER</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="hdrid" class="form-control" id="hdrid" placeholder="auto generate" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4">
                            <label for="vendor_submission">VENDOR SUBMISSION</label>
                          </div>
                          <div class="col-md-1">
                            <a class="btn btn-success" id="vendor_submission_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                          </div>
                          <div class="col-md-7">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="vendor_submission" multiple="" name="vendor_submission">
                              <label class="custom-file-label" for="vendor_submission" id="vendor_submission_label">Choose file</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="supplier_name_and_code">SUPPLIER NAME AND CODE</label>
                        </div>
                        <div class="col-md-8">
                          <input type="textarea" name="supplier_name_and_code" class="form-control" id="supplier_name_and_code" >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="part_number">PART NUMBER</label>
                          </div>
                          <div class="col-md-8">
                            <input type="textarea" name="part_number" class="form-control" id="part_number" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="assy_for">ASSY FOR</label>
                          </div>
                          <div class="col-md-8">
                            <input type="textarea" name="assy_for" class="form-control" id="assy_for" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="part_name">PART NAME</label>
                          </div>
                          <div class="col-md-8">
                            <input type="textarea" name="part_name" class="form-control" id="part_name" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="number_of_tooling">NUMBER OF TOOLING</label>
                          </div>
                          <div class="col-md-8">
                            <input type="textarea" name="number_of_tooling" class="form-control" id="number_of_tooling" >
                          </div>
                      </div>
                    </div>


                  </div>
                  <!-- Close Collapseone-->
                </div> 
                <!-- Close Card-->
              </div>

                <div class="card card-primary">
                    <div class="card-header" data-toggle="collapse"  href="#collapsetwo">
                      <h4 class="card-title" data-toggle="collapse"  href="#collapsetwo">
                          Reason
                      </h4>
                    </div>
                    <div id="collapsetwo" class="panel-collapse collapse in">
                    <div class="card-body" >
                      <div class="form-group" clearfix>
                        <div class="row">
                           <div class="icheck-primary d-inline">
                              <div class="col-md-12">
                                 <input type="checkbox" name="orderup_or_less_capacity" id="orderup_or_less_capacity" >
                                 <label for="orderup_or_less_capacity">
                                 ORDERUP/LESS CAPACITY ?
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group" clearfix>
                        <div class="row">
                           <div class="icheck-primary d-inline">
                              <div class="col-md-12">
                                 <input type="checkbox" name="cost_down" id="cost_down" >
                                 <label for="cost_down">
                                 COST DOWN
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  <div class="form-group" clearfix>
                     <div class="row">
                        <div class="icheck-primary d-inline">
                           <div class="col-md-12">
                              <input type="checkbox" name="quality_problem" id="quality_problem" >
                              <label for="quality_problem">
                              QUALITY PROBLEM
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group" clearfix>
                     <div class="row">
                        <div class="icheck-primary d-inline">
                           <div class="col-md-12">
                              <input type="checkbox" name="renewal_and_additional" id="renewal_and_additional" >
                              <label for="renewal_and_additional">
                              RENEWAl?ADDITIONAL?
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>

                </div>
                <!-- Close Collapsetwo-->
              </div> 
              <!-- Close Card body-->
              </div> 
              <!-- Close Card body-->

            


                    <div class="card card-primary">
                      <div class="card-header" data-toggle="collapse" href="#collapsethree">
                        <h4 class="card-title" data-toggle="collapse" href="#collapsethree">
                            Forecast
                        </h4>
                      </div>
                      <div  id="collapsethree" class="panel-collapse collapse in">
                      <div class="card-body">
                        <div class="form-group">
                          <div class="row">
                              <div class="col-md-4">
                                <label for="month">MONTH</label>
                              </div>
                              <div class="col-md-8">
                                <input type="text" name="month" class="form-control" id="month" >
                              </div>
                          </div>
                        </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="qty">QTY</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="qty" class="form-control" id="qty" >
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- Close Collapsethree -->
                  </div> 
                  <!-- Close Card body-->
                </div>
                <!-- /card -->

                    <div class="card card-primary">
                      <div class="card-header" data-toggle="collapse" href="#collapsefour">
                        <h4 class="card-title" data-toggle="collapse" href="#collapsefour">
                            Mold condition
                        </h4>
                      </div>
                      <div id="collapsefour" class="panel-collapse collapse in">
                      <div class="card-body">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="start_delivery">START DELIVERY</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="start_delivery" class="form-control" id="start_delivery" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="mold_finish">MOLD FINISH</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="mold_finish" class="form-control" id="mold_finish" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="mold_price">MOLD PRICE BEFORE</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="mold_price" class="form-control" id="mold_price" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="mold_price_2">MOLD PRICE AFTER</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="mold_price_2" class="form-control" id="mold_price_2" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="m_or_c_tonage">M/C TONAGE BEFORE</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="m_or_c_tonage" class="form-control" id="m_or_c_tonage" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="m_or_c_tonage_2">M/C TONAGE AFTER</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="m_or_c_tonage_2" class="form-control" id="m_or_c_tonage_2" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="qty_cavity">QTY CAVITY BEFORE</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="qty_cavity" class="form-control" id="qty_cavity" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="qty_cavity_2">QTY CAVITY AFTER</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="qty_cavity_2" class="form-control" id="qty_cavity_2" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="cavity_no">CAVITY NO BEFORE</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="cavity_no" class="form-control" id="cavity_no" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="cavity_no_2">CAVITY NO AFTER</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="cavity_no_2" class="form-control" id="cavity_no_2" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="output">OUTPUT(Pcs/Hour)</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="output" class="form-control" id="output" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="guarantee_shoot">GUARANTEE SHOOT</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="guarantee_shoot" class="form-control" id="guarantee_shoot" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4">
                            <label for="gambar">GAMBAR</label>
                          </div>
                          <div class="col-md-1">
                            <a class="btn btn-success" id="gambar_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                          </div>
                          <div class="col-md-7">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="gambar" multiple="" name="gambar">
                              <label class="custom-file-label" for="gambar" id="gambar_label">Choose file</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="form-group" clearfix>
                      <div class="row">
                        <div class="col-md-4">
                            <label hidden> Total Renewal </label>
                        </div>
                          <div class="icheck-primary d-inline">
                            <div class="col-md-12">
                                <input type="checkbox" name="total_renewal" id="total_renewal" >
                                <label for="total_renewal">
                                TOTAL RENEWAL
                                </label>
                            </div>
                          </div>
                          <div class="icheck-primary d-inline">
                            <div class="col-md-12">
                                <input type="checkbox" name="change_core" id="change_core" >
                                <label for="change_core">
                                CHANGE CORE
                                </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="form-group" clearfix>
                      <div class="row">
                      <div class="col-md-4">
                            <label hidden> CHANGE MOVING DIES </label>
                        </div>
                          <div class="icheck-primary d-inline">
                            <div class="col-md-12">
                                <input type="checkbox" name="change_moving_dies" id="change_moving_dies" >
                                <label for="change_moving_dies">
                                CHANGE MOVING DIES
                                </label>
                            </div>
                          </div>
                          <div class="icheck-primary d-inline">
                            <div class="col-md-12">
                                <input type="checkbox" name="change_fix_dies" id="change_fix_dies" >
                                <label for="change_fix_dies">
                                CHANGE FIX DIES
                                </label>
                            </div>
                          </div>
                        </div>
                      </div>


                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="total_shot">TOTAL SHOT</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="total_shot" class="form-control" id="total_shot" >
                          </div>
                      </div>
                    </div>
                    
                      <!-- Close Collapsefour -->
                      </div>
                    </div> 
                    <!-- Close Card body-->
                  </div> 
                  <!-- Close Card-->

                    <div class="card card-primary">
                      <div class="card-header" data-toggle="collapse" href="#collapsefive">
                        <h4 class="card-title" data-toggle="collapse" href="#collapsefive">
                           Schedule
                        </h4>
                      </div>
                      <div id="collapsefive" class="panel-collapse collapse in">
                      <div class="card-body" >
                      <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="t0_to_t1_trial">T0/T1 Trial</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="t0_to_t1_trial" class="form-control" id="t0_to_t1_trial" >
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="sample_isir_submission">SAMPLE (ISIR) SUBMISSION</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="sample_isir_submission" class="form-control" id="sample_isir_submission" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="cycle_time">CYCLE TIME</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="cycle_time" class="form-control" id="cycle_time" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="cavity">CAVITY</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="cavity" class="form-control" id="cavity" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="output_2">OUTPUT (Pcs/Hour)</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="output_2" class="form-control" id="output_2" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="total_output_pcs_per_month">TOTAL OUTPUT/MONTH</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="total_output_pcs_per_month" class="form-control" id="total_output_pcs_per_month" >
                          </div>
                      </div>
                    </div>

                      <!-- Close Collapsefive -->
                      </div>
                    </div> 
                    <!-- Close Card body-->
                    </div> 
                    <!-- Close Card-->

                    <div class="card card-primary">
                      <div class="card-header" data-toggle="collapse" href="#collapsesix">
                        <h4 class="card-title" data-toggle="collapse" href="#collapsesix">
                           Approval
                        </h4>
                      </div>
                      <div id="collapsesix" class="panel-collapse collapse in">
                      <div class="card-body" >

                      <div class="form-group">
                      <div class="row">
                        <!-- <div class="col-md-1">
                        </div> -->
                        <div class="col-md-4">
                          <label for="approval_submission_of_renewal_mold">APPROVAL SUBMISSION OF RENEWAL MOLD</label>
                        </div>
                        <div class="col md-1">
                          <a class="btn btn-success" id="approval_submission_of_renewal_mold_view" target="_blank"> <i class="fa fa-paperclip"></i></a> 
                        </div>
                        <div class="col-md-7">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="approval_submission_of_renewal_mold" multiple="" name="approval_submission_of_renewal_mold">
                            <label class="custom-file-label" for="approval_submission_of_renewal_mold" id="approval_submission_of_renewal_mold_label">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="approved">APPROVED</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="approved" class="form-control" id="approved" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="checked">CHECKED</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="checked" class="form-control" id="checked" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="prepared">PREPARED</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="prepared" class="form-control" id="prepared" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="tooling_no">TOOLING NO</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="tooling_no" class="form-control" id="tooling_no" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="tooling_cost">TOOLING COST</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="tooling_cost" class="form-control" id="tooling_cost" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="depresiation_cost">DEPRESIATION COST</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="depresiation_cost" class="form-control" id="depresiation_cost" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="part_price">PART PRICE</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="part_price" class="form-control" id="part_price" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="total_cost">TOTAL COST</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="total_cost" class="form-control" id="total_cost" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="remark">REMARK</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="remark" class="form-control" id="remark" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label>APPROVAL</label>
                        </div>
                        <div class="col-md-8">
                          <select class="form-control select2" id="approval" name="approval" onchange="handleSelectChange_approval(event)" style="width: 100%;">
                            <option value='' selected="selected">-Select-</option>
                            <?php
                              foreach ($approval as $value) {
                              echo "<option value='$value->checked'>$value->checked</option>"; //ganti sesuai fild request
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                      <!-- Close Collapsesix -->
                      </div>
                    </div> 
                    <!-- Close Card-->
                    </div> 
                    <!-- Close Card-->


                    <div class="card card-primary">
                      <div class="card-header" data-toggle="collapse" data-parent="#accordion" href="#collapseseven">
                        <h4 class="card-title" >
                           Document
                        </h4>
                      </div>
                      <div id="collapseseven" class="panel-collapse collapse in">
                      <div class="card-body" >
                      <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="life_shoot_guarantee">LIFE SHOOT GUARANTEE</label>
                        </div>
                        <div class="col-md-1">
                          <a class="btn btn-success" id="life_shoot_guarantee_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                        </div>
                        <div class="col-md-7">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="life_shoot_guarantee" multiple="" name="life_shoot_guarantee">
                            <label class="custom-file-label" for="life_shoot_guarantee" id="life_shoot_guarantee_label">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="forcast_pc_and_nenkei">FORCAST PC AND NENKEI</label>
                        </div>
                        <div class="col-md-1">
                          <a class="btn btn-success" id="forcast_pc_and_nenkei_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                        </div>
                        <div class="col-md-7">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="forcast_pc_and_nenkei" multiple="" name="forcast_pc_and_nenkei">
                            <label class="custom-file-label" for="forcast_pc_and_nenkei" id="forcast_pc_and_nenkei_label">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="quotation">QUOTATION</label>
                        </div>
                        <div class="col-md-1">
                          <a class="btn btn-success" id="quotation_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                        </div>
                        <div class="col-md-7">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="quotation" multiple="" name="quotation">
                            <label class="custom-file-label" for="quotation" id="quotation_label">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                      <!-- Close Collapseseven -->
                      </div>
                    </div> 
                    <!-- Close Card-->
                    </div> 
                    <!-- Close Card-->


    <!---------------------------------- / Form Macro Batas sini ---------------------------------->

                  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btnsubmit">Save To Draft</button>   <!-- button save ke draft--> 
                    <button type="button" class="btn btn-success" id="btnsend" onclick="sendDraft()">Send</button>  <!-- button send-->               
                    <button type="button" class="btn btn-success" id="btnsend2" onclick="sendDraft2()">Save And Send Email</button>      <!-- button save and send-->           
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>  <!-- button close--> 
                  </div>
                               
              </form>    
              <!-- /form  -->

            </div> 
            <!-- Close modal-content -->  
        </div>
        <!-- Close modal-dialog -->  
      </div>
      <!-- Close modal-Add / Update -->  
      </div>
      </div>


      <!-- modal-delete -->
      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Danger Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
               <label id="iddelete2" hidden> </label>Apakah ingin delete <label id="iddelete"> </label> ?              
            </div>

            <div class="modal-footer justify-content-between">             
              <form action="#" method="post">
                 <button type="button" id="delete" onclick="Delete_data()" class="btn btn-outline-light">Yes</button>    
              </form>     
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>       
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal Delete-->

      <!-- modal-import -->
      <div class="modal fade" id="modal-import"> <!-- untuk modal import--> 
        <div class="modal-dialog"> <!-- Close Card Body --> 
          <div class="modal-content"> <!-- untuk modal content--> 
            <div class="modal-header"><!-- untuk modal header--> 
              <h4 class="modal-title">Import Data</h4> <!-- untuk title modal import data--> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!--button close--> 
                <span aria-hidden="true">&times;</span> <!--jika diimport data lalu masuk maka data akan masuk aplikasi--> 
              </button>
            </div>

            <div class="modal-body"> <!-- untuk body modal--> 
               
              <form method="POST" action="<?php echo base_url('C_tooling/import'); ?>" enctype="multipart/form-data">

                  <div class="input-group form-group"><!-- input form group--> 
                    <span class="input-group-addon" id="sizing-addon2"> <!--input group addon--> 
                      <i class="glyphicon glyphicon-file"></i> <!--type file--> 
                    </span>
                    <input type="file" class="form-control" name="excel" aria-describedby="sizing-addon2"> <!--fungsi type file hanya excel--> 
                  </div>

                  <div class="form-group"> <!-- fungsi form group--> 
                    <div class="col-md-12">  <!--untuk ukuran panjang container-->
                        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i>Import Data</button> <!--button import data-->
                    </div>
                  </div>

              </form>
              
            </div>

            <div class="modal-footer justify-content-between">   
              
              <!-- <button type="button" id="delete"  class="btn btn-outline-light">Import</button>     -->               
              <!-- <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>  -->                    

            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal Delete-->
      </div>

      

<script type="text/javascript">

  $(document).ready(function () {

    $.validator.setDefaults({
      submitHandler: function () {

        //berhasil( "Form successful submitted!" );
        var status=$('#exampleModalLabel').text();
       
        if (status=="Add Data"){

          // Ajax insert data
           Simpan_data("Add");

        }else if(status=="Edit Data"){

           // Ajax update data
           Simpan_data("Update");

        }else{

          berhasil(status);

        }

      }
    });

    // $('input[type=radio][name=problem_name]').change(function() {
    //         if (this.value == 'problem_category') {
    //             $('#quickForm').rules('remove');
    //         }
    //         else if (this.value == 'external') {
                
    //         }
    //     });

    $('#quickForm').validate({
      rules: {

				// ---------------------------------- Rule input Macro Batas sini 1---------------------------------
 //    vendor_submission: {
// required: true,
// },
supplier_name_and_code: {
required: true,
},
part_number: {
required: true,
},
assy_for: {
required: true,
},
part_name: {
required: true,
},
number_of_tooling: {
required: true,
},
// orderup_or_less_capacity: {
// required: true,
// },
// cost_down: {
// required: true,
// },
// quality_problem: {
// required: true,
// },
// renewal_and_additional: {
// required: true,
// },
month: {
required: true,
},
qty: {
required: true,
},
start_delivery: {
required: true,
},
mold_finish: {
required: true,
},
mold_price: {
required: true,
},
mold_price_2: {
required: true,
},
m_or_c_tonage: {
required: true,
},
m_or_c_tonage_2: {
required: true,
},
qty_cavity: {
required: true,
},
qty_cavity_2: {
required: true,
},
cavity_no: {
required: true,
},
cavity_no_2: {
required: true,
},
output: {
required: true,
},
guarantee_shoot: {
required: true,
},
// gambar: {
// required: true,
// },
// total_renewal: {
// required: true,
// },
// change_core: {
// required: true,
// },
// change_moving_dies: {
// required: true,
// },
// change_fix_dies: {
// required: true,
// },
total_shot: {
required: true,
},
t0_to_t1_trial: {
required: true,
},
sample_isir_submission: {
required: true,
},
cycle_time: {
required: true,
},
cavity: {
required: true,
},
output_2: {
required: true,
},
total_output_pcs_per_month: {
required: true,
},
// approval_submission_of_renewal_mold: {
// required: true,
// },
approved: {
required: true,
},
checked: {
required: true,
},
prepared: {
required: true,
},
tooling_no: {
required: true,
},
tooling_cost: {
required: true,
},
depresiation_cost: {
required: true,
},
part_price: {
required: true,
},
total_cost: {
required: true,
},
remark: {
required: true,
},
approval: {
required: true,
},
// life_shoot_guarantee: {
// required: true,
// },
// forcast_pc_and_nenkei: {
// required: true,
// },
// quotation: {
// required: true,
// },




        // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

      },
      messages: {
    
				// ---------------------------------- Rule input Macro Batas sini 2---------------------------------
            vendor_submission: {
required: "Please Input vendor_submission",
minlength: 3
},
supplier_name_and_code: {
required: "Please Input supplier_name_and_code",
minlength: 3
},
part_number: {
required: "Please Input part_number",
minlength: 3
},
assy_for: {
required: "Please Input assy_for",
minlength: 3
},
part_name: {
required: "Please Input part_name",
minlength: 3
},
number_of_tooling: {
required: "Please Input number_of_tooling",
minlength: 3
},
orderup_or_less_capacity: {
required: "Please Input orderup_or_less_capacity",
minlength: 3
},
cost_down: {
required: "Please Input cost_down",
minlength: 3
},
quality_problem: {
required: "Please Input quality_problem",
minlength: 3
},
renewal_and_additional: {
required: "Please Input renewal_and_additional",
minlength: 3
},
month: {
required: "Please Input month",
minlength: 3
},
qty: {
required: "Please Input qty",
minlength: 3
},
start_delivery: {
required: "Please Input start_delivery",
minlength: 3
},
mold_finish: {
required: "Please Input mold_finish",
minlength: 3
},
mold_price: {
required: "Please Input mold_price",
minlength: 3
},
mold_price_2: {
required: "Please Input mold_price_2",
minlength: 3
},
m_or_c_tonage: {
required: "Please Input m_or_c_tonage",
minlength: 3
},
m_or_c_tonage_2: {
required: "Please Input m_or_c_tonage_2",
minlength: 3
},
qty_cavity: {
required: "Please Input qty_cavity",
minlength: 3
},
qty_cavity_2: {
required: "Please Input qty_cavity_2",
minlength: 3
},
cavity_no: {
required: "Please Input cavity_no",
minlength: 3
},
cavity_no_2: {
required: "Please Input cavity_no_2",
minlength: 3
},
output: {
required: "Please Input output",
minlength: 3
},
guarantee_shoot: {
required: "Please Input guarantee_shoot",
minlength: 3
},
gambar: {
required: "Please Input gambar",
minlength: 3
},
total_renewal: {
required: "Please Input total_renewal",
minlength: 3
},
change_core: {
required: "Please Input change_core",
minlength: 3
},
change_moving_dies: {
required: "Please Input change_moving_dies",
minlength: 3
},
change_fix_dies: {
required: "Please Input change_fix_dies",
minlength: 3
},
total_shot: {
required: "Please Input total_shot",
minlength: 3
},
t0_to_t1_trial: {
required: "Please Input t0_to_t1_trial",
minlength: 3
},
sample_isir_submission: {
required: "Please Input sample_isir_submission",
minlength: 3
},
cycle_time: {
required: "Please Input cycle_time",
minlength: 3
},
cavity: {
required: "Please Input cavity",
minlength: 3
},
output_2: {
required: "Please Input output_2",
minlength: 3
},
total_output_pcs_per_month: {
required: "Please Input total_output_pcs_per_month",
minlength: 3
},
approval_submission_of_renewal_mold: {
required: "Please Input approval_submission_of_renewal_mold",
minlength: 3
},
approved: {
required: "Please Input approved",
minlength: 3
},
checked: {
required: "Please Input checked",
minlength: 3
},
prepared: {
required: "Please Input prepared",
minlength: 3
},
tooling_no: {
required: "Please Input tooling_no",
minlength: 3
},
tooling_cost: {
required: "Please Input tooling_cost",
minlength: 3
},
depresiation_cost: {
required: "Please Input depresiation_cost",
minlength: 3
},
part_price: {
required: "Please Input part_price",
minlength: 3
},
total_cost: {
required: "Please Input total_cost",
minlength: 3
},
remark: {
required: "Please Input remark",
minlength: 3
},
approval: {
required: "Please Input approval",
minlength: 3
},
life_shoot_guarantee: {
required: "Please Input life_shoot_guarantee",
minlength: 3
},
forcast_pc_and_nenkei: {
required: "Please Input forcast_pc_and_nenkei",
minlength: 3
},
quotation: {
required: "Please Input quotation",
minlength: 3
},



        // ---------------------------------- / Rule input Macro Batas sini 2--------------------------------

        //rule input data harus terisi semua
      },
      errorElement: 'span', //span untuk true jika data harus terisi semua
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);//untuk jika tidak terisi maka akan error
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid'); //invalid function
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid'); //invalid function
      }
    });
  });
</script>

<script type="text/javascript">

      ///@see view_modal()
     ///@note fungsi digunakan menampilkan data
     ///@attention 
  function view_modal(hdrid1,status){
                             
          if (status=="Add"){
            
            // Default muncul Containment data
            // Default muncul Containment data


            $('#exampleModalLabel').text('Add Data');  // view pada add data
            $('#quickForm')[0].reset(); // reset form  
           

            var someDate0 = new Date(); //variable date
            var numberOfDaysToAdd0 = 0; //variable number of day
            var result0 = someDate0.setDate(someDate0.getDate() + numberOfDaysToAdd0);//variable date
            $('#date').val(new Date(result0).toISOString().slice(0, 10)); //variable issue date

            var someDate0 = new Date(); //variable date
            var numberOfDaysToAdd0 = 0; //variable number of day
            var result0 = someDate0.setDate(someDate0.getDate() + numberOfDaysToAdd0);//variable date
            $('#issue_date').val(new Date(result0).toISOString().slice(0, 10)); //variable issue date


            var someDate = new Date(); //variable date
            var numberOfDaysToAdd = 3; //variable number of day
            var result = someDate.setDate(someDate.getDate() + numberOfDaysToAdd); //variable date
            $('#containment_date').val(new Date(result).toISOString().slice(0, 10));//variable issue date

            var someDate2 = new Date();//variable date
            var numberOfDaysToAdd2 = 14; //variable number of day
            var result2 = someDate2.setDate(someDate2.getDate() + numberOfDaysToAdd2); //variable date
            $('#report_date').val(new Date(result2).toISOString().slice(0, 10));//variable issue date


            $('#btnsubmit').text('Save To Draft'); // name Save
            document.getElementById("btnsubmit").style.visibility = "visible";    // Visible button              
            //Ajax kosongkan data
            document.getElementById("btnsend").style.visibility = "hidden";    // Visible button              
            document.getElementById("btnsend2").style.visibility = "visible";    // Visible button              
            //Ajax kosongkan data

          }else {

            document.getElementById("btnsend").style.visibility = "visible";    // Visible button              
            //Ajax kosongkan data
           
            // Get Hdri ID
            $('#hdrid').val(hdrid1);
            var hdrid=hdrid1;   

            // Ajax isi data
              $.ajax({
              url: "<?php echo base_url('C_tooling/ajax_getbyhdrid')?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

                  // ---------------------------------- Data val Macro  Batas sini ------------------------------
                  document.getElementById('vendor_submission_label').innerHTML=data.vendor_submission;
 var a = document.getElementById('vendor_submission_view');
 if(!data.vendor_submission==''){
   a.href = "<?php echo base_url('assets/upload/tooling') ?>" + data.vendor_submission;
 }else{
   a.removeAttribute("href");
 };
$('#supplier_name_and_code').select2().val(data.supplier_name_and_code).trigger('change');
$('#part_number').val(data.part_number);
$('#assy_for').val(data.assy_for);
$('#part_name').val(data.part_name);
$('#number_of_tooling').val(data.number_of_tooling);
 if(data.orderup_or_less_capacity=='on'){
     document.getElementById('orderup_or_less_capacity').checked=true;
 }else {
      document.getElementById('orderup_or_less_capacity').checked=false;
 };
 if(data.cost_down=='on'){
     document.getElementById('cost_down').checked=true;
 }else {
      document.getElementById('cost_down').checked=false;
 };
 if(data.quality_problem=='on'){
     document.getElementById('quality_problem').checked=true;
 }else {
      document.getElementById('quality_problem').checked=false;
 };
 if(data.renewal_and_additional=='on'){
     document.getElementById('renewal_and_additional').checked=true;
 }else {
      document.getElementById('renewal_and_additional').checked=false;
 };
$('#month').val(data.month);
$('#qty').val(data.qty);
$('#start_delivery').select2().val(data.start_delivery).trigger('change');
$('#mold_finish').val(data.mold_finish);
$('#mold_price').val(data.mold_price);
$('#mold_price_2').val(data.mold_price_2);
$('#m_or_c_tonage').val(data.m_or_c_tonage);
$('#m_or_c_tonage_2').val(data.m_or_c_tonage_2);
$('#qty_cavity').val(data.qty_cavity);
$('#qty_cavity_2').val(data.qty_cavity_2);
$('#cavity_no').val(data.cavity_no);
$('#cavity_no_2').val(data.cavity_no_2);
$('#output').val(data.output);
$('#guarantee_shoot').val(data.guarantee_shoot);
document.getElementById('gambar_label').innerHTML=data.gambar;
 var a = document.getElementById('gambar_view');
 if(!data.gambar==''){
   a.href = "<?php echo base_url('assets/upload/tooling') ?>" + data.gambar;
 }else{
   a.removeAttribute("href");
 };
 if(data.total_renewal=='on'){
     document.getElementById('total_renewal').checked=true;
 }else {
      document.getElementById('total_renewal').checked=false;
 };
 if(data.change_core=='on'){
     document.getElementById('change_core').checked=true;
 }else {
      document.getElementById('change_core').checked=false;
 };
 if(data.change_moving_dies=='on'){
     document.getElementById('change_moving_dies').checked=true;
 }else {
      document.getElementById('change_moving_dies').checked=false;
 };
 if(data.change_fix_dies=='on'){
     document.getElementById('change_fix_dies').checked=true;
 }else {
      document.getElementById('change_fix_dies').checked=false;
 };
$('#total_shot').val(data.total_shot);
$('#t0_to_t1_trial').select2().val(data.t0_to_t1_trial).trigger('change');
$('#sample_isir_submission').val(data.sample_isir_submission);
$('#cycle_time').val(data.cycle_time);
$('#cavity').val(data.cavity);
$('#output_2').val(data.output_2);
$('#total_output_pcs_per_month').val(data.total_output_pcs_per_month);
document.getElementById('approval_submission_of_renewal_mold_label').innerHTML=data.approval_submission_of_renewal_mold;
 var a = document.getElementById('approval_submission_of_renewal_mold_view');
 if(!data.approval_submission_of_renewal_mold==''){
   a.href = "<?php echo base_url('assets/upload/tooling') ?>" + data.approval_submission_of_renewal_mold;
 }else{
   a.removeAttribute("href");
 };
$('#approved').val(data.approved);
$('#checked').val(data.checked);
$('#prepared').val(data.prepared);
$('#tooling_no').val(data.tooling_no);
$('#tooling_cost').val(data.tooling_cost);
$('#depresiation_cost').val(data.depresiation_cost);
$('#part_price').val(data.part_price);
$('#total_cost').val(data.total_cost);
$('#remark').val(data.remark);
$('#approval').select2().val(data.approval).trigger('change');
document.getElementById('life_shoot_guarantee_label').innerHTML=data.life_shoot_guarantee;
 var a = document.getElementById('life_shoot_guarantee_view');
 if(!data.life_shoot_guarantee==''){
   a.href = "<?php echo base_url('assets/upload/tooling') ?>" + data.life_shoot_guarantee;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('forcast_pc_and_nenkei_label').innerHTML=data.forcast_pc_and_nenkei;
 var a = document.getElementById('forcast_pc_and_nenkei_view');
 if(!data.forcast_pc_and_nenkei==''){
   a.href = "<?php echo base_url('assets/upload/tooling') ?>" + data.forcast_pc_and_nenkei;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('quotation_label').innerHTML=data.quotation;
 var a = document.getElementById('quotation_view');
 if(!data.quotation==''){
   a.href = "<?php echo base_url('assets/upload/tooling') ?>" + data.quotation;
 }else{
   a.removeAttribute("href");
 };


                // ---------------------------------- / Data val Macro  Batas sini ------------------------------
                                                           
                                                             
                },
              error: function (e) {
                      alert(e);
                     
                  }
            });
            
            // Disable and button submit dan text form           
            if(status=="View"){
              document.getElementById("btnsubmit").style.visibility = "hidden";   //fungsi hidden tombol submit
              document.getElementById("btnsend").style.visibility = "hidden";   //fungsi hidden tombol save dan send
              document.getElementById("btnsend2").style.visibility = "hidden";  //fungsi hidden tombol send
              $('#exampleModalLabel').text('View Data'); //name view              
            }else{
              $('#exampleModalLabel').text('Edit Data'); //name view 
              $('#btnsubmit').text('Update'); //name Update  
              document.getElementById("btnsend2").style.visibility = "hidden"; //fungsi hidden tombol send
              document.getElementById("btnsubmit").style.visibility = "visible";  //fungsi visible tombol submit
            }
          
          }

        
         //untuk hidden supplier data jika klik supplier maka akan muncul beberapa attach file saja
        $('input[type=radio][name=supplier').change(function() {
          if(this.value == 'supplier'){
          }else if(this.value =='NEW SUPPLIER(current denso supplier)'){//jika dipilih supplier akan menonaktikan beberapa attach file
            $("#20").css('display','none'); //beberapa attach file hidden
            $("#21").css('display','none');
            $("#23").css('display','none');
            $("#24").css('display','none');
          }else if(this.value =='ADDITIONAL SUPPLIER(current denso supplier)'){//jika dipilih supplier akan menonaktikan beberapa attach file
            $("#20").css('display','none');//beberapa attach file hidden
            $("#21").css('display','none');
            $("#23").css('display','none');
            $("#24").css('display','none');
          }else if(this.value =='CHANGE SUPPLIER(current denso supplier)'){//jika dipilih supplier akan menonaktikan beberapa attach file
            $("#20").css('display','none');//beberapa attach file hidden
            $("#21").css('display','none');
            $("#23").css('display','none');
            $("#24").css('display','none');
          }else if(this.value =='CHANGE PLACE PRODUCTION(same denso supplier)'){//jika dipilih supplier akan menonaktikan beberapa attach file
            $("#7").css('display','none');//beberapa attach file hidden
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#20").css('display','none');
            $("#21").css('display','none');
            $("#23").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
          }else if(this.value =='ADDITIONAL SUPPLIER'){//jika dipilih supplier akan menonaktikan beberapa attach file
            $("#7").css('display','none');//beberapa attach file hidden
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#20").css('display','none');
            $("#21").css('display','none');
            $("#23").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
          }else if(this.value =='CHANGE SUB SUPPLIER(change route)'){//jika dipilih supplier akan menonaktikan beberapa attach file
            $("#7").css('display','none');//beberapa attach file hidden
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#20").css('display','none');
            $("#21").css('display','none');
            $("#23").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
          }else{
            $("#supplier").removeAttr("checked"); //untuk check apakah sudah hidden
            $("#supplier2").css('display','block');//untuk blok attach file sudah dihidden
            }
          });

 //untuk hidden materia data jika klik material maka akan muncul beberapa attach file saja
        $('input[type=radio][name=material]').change(function() {
          if(this.value == 'CHANGE MATERIAL SPECIFICATION'){ //jika dipilih material akan menonaktikan beberapa attach file
            $("#15").css('display','none');//beberapa attach file hidden
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#20").css('display','none');
            $("#21").css('display','none');
            $("#22").css('display','none');
            $("#23").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');       
          }else if(this.value =='CHANGE MATERIAL MAKER'){ //jika dipilih material2 akan menonaktikan beberapa attach file
            $("#15").css('display','none');//beberapa attach file hidden
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#20").css('display','none');
            $("#21").css('display','none');
            $("#22").css('display','none');
            $("#23").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
          }else if(this.value =='CHANGE PLACE PRODUCTION(same material maker company)'){ //jika dipilih material3 akan menonaktikan beberapa attach file
            $("#15").css('display','none');//beberapa attach file hidden
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#20").css('display','none');
            $("#21").css('display','none');
            $("#22").css('display','none');
            $("#23").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
          }else{
            $("#material").removeAttr("checked");//untuk check apakah sudah hidden
            $("#material2").css('display','block');//untuk blok attach file sudah dihidden
            }
        });

         //untuk hidden quality improvement data jika klik quality improvement maka akan muncul beberapa attach file saja
        $('input[type=radio][name=quality_improvement').change(function() {
          if(this.value == 'ADDITIONAL PROCESS'){;//jika dipilih quality improvement akan menonaktikan beberapa attach file
            $("#5").css('display','none');//beberapa attach file hidden
            $("#7").css('display','none');
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#19").css('display','none');
            $("#20").css('display','none');
            $("#21").css('display','none');
            $("#22").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
          }else if(this.value =='CHANGE PROCESS'){//jika dipilih quality improvement 2 akan menonaktikan beberapa attach file
            $("#5").css('display','none');//beberapa attach file hidden
            $("#7").css('display','none');
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#19").css('display','none');
            $("#20").css('display','none');
            $("#21").css('display','none');
            $("#22").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
          }else{
            $("#quality_improvement").removeAttr("checked");//untuk check apakah sudah hidden
            $("#quality_improvement2").css('display','block');//untuk blok attach file sudah dihidden
            }
          });

          //untuk hidden tooling machine improvement data jika klik tooling machine improvement maka akan muncul beberapa attach file saja
          $('input[type=radio][name=tooling_machine').change(function() {
          if(this.value == 'RENEWAL DIES'){; //jika dipilih tooling machine akan menonaktikan beberapa attach file
            $("#3").css('display','none');//beberapa attach file hidden
            $("#4").css('display','none');
            $("#5").css('display','none');
            $("#6").css('display','none');
            $("#7").css('display','none');
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#18").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
            $("#26").css('display','none');
          }else if(this.value =='ADDITIONAL DIES'){//jika dipilih tooling machine 2 akan menonaktikan beberapa attach file
            $("#3").css('display','none');//beberapa attach file hidden
            $("#4").css('display','none');
            $("#5").css('display','none');
            $("#6").css('display','none');
            $("#7").css('display','none');
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#18").css('display','none');
            $("#22").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
            $("#26").css('display','none');
          }else if(this.value =='REACTIVATION DIES'){//jika dipilih tooling machine 3 akan menonaktikan beberapa attach file
            $("#3").css('display','none');//beberapa attach file hidden
            $("#4").css('display','none');
            $("#5").css('display','none');
            $("#6").css('display','none');
            $("#7").css('display','none');
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#18").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
            $("#26").css('display','none');
          }else if(this.value =='ADDITONAL MACHINE(existing machine)'){//jika dipilih tooling machine 4 akan menonaktikan beberapa attach file
            $("#3").css('display','none');//beberapa attach file hidden
            $("#4").css('display','none');
            $("#5").css('display','none');
            $("#6").css('display','none');
            $("#7").css('display','none');
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#18").css('display','none');
            $("#22").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
            $("#26").css('display','none');
          }else if(this.value =='ADDITONAL MACHINE(new machine)'){//jika dipilih tooling machine 5 akan menonaktikan beberapa attach file
            $("#3").css('display','none');//beberapa attach file hidden
            $("#4").css('display','none');
            $("#5").css('display','none');
            $("#6").css('display','none');
            $("#7").css('display','none');
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#18").css('display','none');
            $("#22").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
            $("#26").css('display','none');
          }else if(this.value =='YOKOTEN MACHINE SPEC'){//jika dipilih tooling machine 6 akan menonaktikan beberapa attach file
            $("#3").css('display','none');//beberapa attach file hidden
            $("#4").css('display','none');
            $("#5").css('display','none');
            $("#6").css('display','none');
            $("#7").css('display','none');
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#18").css('display','none');
            $("#22").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
            $("#26").css('display','none');
          }else if(this.value =='NEW MACHINE SPEC'){//jika dipilih tooling machine 7 akan menonaktikan beberapa attach file
            $("#3").css('display','none');//beberapa attach file hidden
            $("#4").css('display','none');
            $("#5").css('display','none');
            $("#6").css('display','none');
            $("#7").css('display','none');
            $("#8").css('display','none');
            $("#9").css('display','none');
            $("#10").css('display','none');
            $("#12").css('display','none');
            $("#13").css('display','none');
            $("#14").css('display','none');
            $("#15").css('display','none');
            $("#16").css('display','none');
            $("#17").css('display','none');
            $("#18").css('display','none');
            $("#22").css('display','none');
            $("#24").css('display','none');
            $("#25").css('display','none');
            $("#26").css('display','none');
          }else{
            $("#tooling_machine").removeAttr("checked");//untuk check apakah sudah hidden
            $("#tooling_machine2").css('display','block');//untuk blok attach file sudah dihidden
            }
          });





  }

</script>

<script type="text/javascript">

  ///@see Simpan_data()
     ///@note fungsi digunakan trigger simpan data
     ///@attention 
   function Simpan_data($trigger){

          // Form data
          var fdata = new FormData();
          
          // Form data collect name value
          var form_data = $('#quickForm').serializeArray();
          $.each(form_data, function (key, input) {
            fdata.append(input.name, input.value);
          });
          
          // Penanganan jika ada type check Box uncheck
          $('#quickForm input[type="checkbox"]:not(:checked)').each(function(i, e) {           
              fdata.append(e.getAttribute("name"),"Off");
          });

          // Penanganan jika ada type attach file
          $('#quickForm input[type="file"]').each(function(i, e) {     
              // jika ada file attach maka akan ditambahkan  
              if ($('#'+e.getAttribute("name")).val()) {   
                var file_data = $('#'+e.getAttribute("name")).prop('files')[0];
                fdata.append(e.getAttribute("name"),file_data);                            
              }
          });

          // Print_r(file_data);

          // Simpan or Update data          
          var vurl; 
          if($trigger == 'Add') {            
            vurl = "<?php echo base_url('C_tooling/ajax_add')?>";//link simpan data
          } else {           
            vurl = "<?php echo base_url('C_tooling/ajax_update')?>";//link update data
          }
        
          //untuk aja data sudah bisa dipost
          $.ajax({
              url: vurl,//url
              method: "post",//jenis method pst
              processData: false,//false process
              contentType: false,//false content
              data: fdata,
              success: function (data) {
                 
                   // Pesan berhasil
                   berhasil(data.status);
                   // Reset Form
                   $('#quickForm')[0].reset();               
                   // location.reload();
                    tabel.draw();
                  //location add
                   if(!vurl=="Add"){
                     $("#modal-default").modal('hide');
                   }

                   $("#modal-default").modal('hide');
                 
              },
              // function error
              error: function (e) {
                  gagal(e);
                  //location.reload();
                  //error
              }
          });

  }

   ///@see ajax_send_mail()
     ///@note fungsi digunakan mengirim data ke email
     ///@attention 
  function ajax_send_mail(){

// Form data
var fdata = new FormData();//variable untuk send mail
print_r(fdata); //untuk fungsi print

// Form data collect name value
var form_data = $('#quickForm').serializeArray();//variable form data
$.each(form_data, function (key, input) { //function untuk rule send email
  fdata.append(input.name, input.value);
});

// Penanganan jika ada type check Box uncheck
$('#quickForm input[type="checkbox"]:not(:checked)').each(function(i, e) {           
    fdata.append(e.getAttribute("name"),"Off");
});

// Simpan or Update data          
var vurl;  //url
vurl = "<?php echo base_url('C_Email/ajax_send_mail_v1')?>"; //link send email

$.ajax({ //ajax pada send email
    url: vurl, //url
    method: "post",//jenis method pst
    processData: false,//false process
    contentType: false,//false content
    data: fdata,
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

}

///@see sendDraft()
///@note fungsi digunakan mengirim data menjadi draft
///@attention 
function sendDraft(){

// Form data
var fdata = new FormData(); //variable untuk sendraft
fdata.append("hdrid",$('#hdrid').val()); //fungsi send draft dengan hdrid
fdata.append("nik",$('#nik').val());   //fungsi send draft dengan nik
var fdata2 = new FormData(); //variable untuk form data

fdata2.append("body_content","");  //fungsi body content
fdata2.append("comment","");  //fungsi comment
fdata2.append("status_subject","New");  //fungsi status subject

// Data 2
var form_data = $('#quickForm').serializeArray(); // variable quick form
$.each(form_data, function (key, input) { //function untuk rule senddraft
    fdata2.append(input.name, input.value);
}); 

// Penanganan jika ada type check Box uncheck
$('#quickForm input[type="checkbox"]:not(:checked)').each(function(i, e) {
fdata.append(e.getAttribute("name"), "Off");
});

// Penanganan jika ada type attach file
$('#quickForm input[type="file"]').each(function(i, e) {
// jika ada file attach maka akan ditambahkan  
if ($('#' + e.getAttribute("name")).val()) {
var file_data = $('#' + e.getAttribute("name")).prop('files')[0];
fdata.append(e.getAttribute("name"), file_data);
}
});

// Simpan or Update data          
var vurl; 
vurl = "<?php echo base_url('C_tooling/ajax_sendDraft')?>";//link senddraft
    
$.ajax({ //ajax pada send draft
    url: vurl, //url
    method: "post",//jenis method pst
    processData: false,//false process
    contentType: false,//false content
data: fdata,
success: function (data) {
  
        fdata2.append("hdrid",data.status);  //status sukses di hdrid
        fdata2.append("problem_name",$('#problem_name').val()); //status sukses di problem name
        fdata2.append("group_product_name",$('#group_product_name').val()); //status sukses di group_product_name
        fdata2.append("product_name",$('#product_name').val());  //status sukses di product_name
        fdata2.append("name2",$('#name2').val()); //status sukses di name2
        fdata2.append("problem_category_name",$('#problem_category_name').val()); //status sukses di problem_category_name
        fdata2.append("body_content",data.status_transaction); //status sukses di body_content
        fdata2.append("comment",""); //status group comment
        fdata2.append("status_subject","");//status group status_subject
        fdata2.append('position_code', "2");//status group position_code

      var vurl2; 
      vurl2 = "<?php echo base_url('C_Email/ajax_send_mail_v2')?>";//link send mail v2

      $.ajax({
          url: vurl2,
          method: "post", //jenis method pst
          processData: false,//false process
          contentType: false,//false content
          data: fdata2,
          success: function (data) {                 
             
          },
          error: function (e) {
              gagal(e);
             
          }
      });

      berhasil("Berhasil dikirim");   //jika sudah dikirim ke email maka akan muncul notif "berhasil dikirim"
      tabel.draw();
      $("#modal-default").modal('hide');

  
},
error: function (e) {
    gagal(e);
    //location.reload();
    //error
}
});

}



///@see sendDraft2()
///@note fungsi digunakan mengirim data menjadi draft
///@attention 
function sendDraft2() { //variable untuk sendraft2

    // Form data
    var fdata = new FormData();//variable untuk sendraft

    var fdata2 = new FormData();             
    fdata2.append("body_content",""); //fungsi body content
    fdata2.append("comment",""); //fungsi comment
    fdata2.append("status_subject","New");//fungsi status subject

    // Form data collect name value
    var form_data = $('#quickForm').serializeArray();// variable quick form
    $.each(form_data, function(key, input) { //function untuk rule senddraft
      fdata.append(input.name, input.value);
    });

    $.each(form_data, function(key, input) {
      fdata2.append(input.name, input.value);
    });

    // Penanganan jika ada type check Box uncheck
    $('#quickForm input[type="checkbox"]:not(:checked)').each(function(i, e) {
      fdata.append(e.getAttribute("name"), "Off");
    });

    // Penanganan jika ada type attach file
    $('#quickForm input[type="file"]').each(function(i, e) {
      // jika ada file attach maka akan ditambahkan  
      if ($('#' + e.getAttribute("name")).val()) {
        var file_data = $('#' + e.getAttribute("name")).prop('files')[0];
        fdata.append(e.getAttribute("name"), file_data);
      }
    });

    // Print_r(file_data); 
    // Pesan berhasil
    
    // Simpan or Update data          
    var vurl;
    vurl = "<?php echo base_url('C_tooling/ajax_sendDraft2') ?>"; //link senddraft2

    $.ajax({ //ajax pada send draft
      url: vurl, //url
      method: "post", //jenis method pst
      processData: false,//false process
      contentType: false,//false content
      data: fdata,
      success: function(data) {

        // gagal("hello" + data.status);
        // print_r(data.status);
        
        fdata2.append("hdrid",data.status); 
        fdata2.append("problem_name",$('#problem_name').val());  //status sukses di hdrid
        fdata2.append("group_product_name",$('#group_product_name').val()); //status sukses di problem name
        fdata2.append("product_name",$('#product_name').val()); //status sukses di group_product_name
        fdata2.append("name2",$('#name2').val()); //status sukses di product_name
        fdata2.append("problem_category_name",$('#problem_category_name').val()); //status sukses di name2
        fdata2.append("body_content",data.status_transaction); //status sukses di problem_category_name
        fdata2.append("comment",""); //status group comment
        fdata2.append("status_subject","");//status_subject
        fdata2.append('position_code', "2");//status group position_code

        // Kirim email
        var vurl2; 
        vurl2 = "<?php echo base_url('C_Email/ajax_send_mail_v2')?>";//link send mail v2
          $.ajax({
          url: vurl2, //url
          method: "post",//jenis method pst
          processData: false,//false process
          contentType: false,//false content
          data: fdata2,
          success: function (data) {                
                                                   
          },
          error: function (e) {
              gagal(e);
             
          }
        });


        berhasil(data.status);    //jika berhasil maka akan muncul notif "berhasil dikirim"
        tabel.draw();
        $("#modal-default").modal('hide');


      },
      error: function(e) {
        gagal(e);
        //location.reload();
        //error
      }
    });

}



///@see Delete_data()
///@note fungsi digunakan untuk delete data
///@attention 
function Delete_data(){

// Form data
var fdata = new FormData();

// Delete by Hdrid
fdata.append('hdrid',$('#iddelete').text());
// Url Post delete
vurl = "<?php echo base_url('C_tooling/ajax_delete')?>";

// Post data
$.ajax({
    url: vurl,
    method: "post",
    processData: false,
    contentType: false,
    data: fdata,
    success: function (data) {

        // Hide modal delete
        $('#modal-delete').modal('hide');
        // Delete rows datatables
        $('#example1').DataTable().row("#"+$('#iddelete2').text()).remove().draw();
        // Pesan berhasil
        berhasil(data.status);    

    },
    error: function (e) {
        //Pesan Gagal
        gagal(e);             
    }
});

}


// ///@see get send mail
// ///@note fungsi digunakan untuk mengirim email
// ///@attention 
// function Send_mail(){

//   // Url Post delete
//   vurl = "<php echo base_url('C_Email/Send_mail')?>";//link untuk send mail
//   // Form data
//   var fdata = new FormData();
//   fdata.append('hdrid','Hdrid123');


//   $.ajax({//ajax send mail
//         url: vurl,//url
//         method: "post",//jenis method pst
//         processData: false,//false process
//         contentType: false,//false content
//       data: fdata,
//       success: function (data) {
//       },
//       error: function (e) {
//           //Pesan Gagal
//           //gagal(e);             
//       }
//   });

// }


</script>

<!-- ***************************** Handle Button di datatable (View,edit,delete,row selected) ***************************** -->
<script type="text/javascript">

    //  HDRID selected konfirmasiHapus
    $(document).on("click", ".konfirmasiHapus", function() {        
        $('#iddelete').text($(this).attr("data-id")); 
    })

    //  HDRID selected  konfirmasiEdit
    $(document).on("click", ".konfirmasiEdit", function() {     
      view_modal($(this).attr("data-id"),'Edit');
    })
     
    //  HDRID selected  konfirmasiEdit
    $(document).on("click", ".konfirmasiView", function() {   
      view_modal($(this).attr("data-id"),'View');
    })

    // ID Rows selected
    $('#example1').on( 'click', 'tr', function () {
          $('#iddelete2').text($('#example1').DataTable().row( this ).id());             
    } );

</script>


<script type="text/javascript">

   $('.select2').select2();

    //Date range picker
    $('#reservationdate').datetimepicker({
            format: 'L'           
    });

    
    //Date range picker
    $('#startdate').datetimepicker({
            format: 'L'           
    });

    //Date range picker
    $('#enddate').datetimepicker({
            format: 'L'           
    });

</script>

<!-- <script type="text/javascript">
  document.getElementById('btnsubmit2').onclick = function() {
    var select = document.getElementById('multiple');
    var selected = [...select.options]
                      .filter(option => option.selected)
                      .map(option => option.value);
    alert(selected);
  } 
</script> -->

<!-- Handle datatable -->
<script type="text/javascript">

    var tabel = null;
    $(document).ready(function() {

        tabel = $('#example1').DataTable({//table
            "processing": true,//processing true jika data masuk table
            "scrollX" : true,
            // "responsive":true,//respon jika data masuk akan muncul pop up data
            "serverSide": true, //untuk data masuk server 
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            dom: "lfBrtip",
            <?php if(!empty($hak_akses)){ if ($hak_akses->allow_export=='on') { ?>
            buttons: [
            {
              extend: 'copyHtml5',//extend html
              className: 'btn btn-secondary',//button
              text: '<i class="fas fa-copy">&nbsp</i> Copy Data to Clipboard',//untuk copy cliboard
            },
            {
              extend: 'csvHtml5',//extend html
              className: 'btn btn-info',//button
              text: '<i class="fas fa-file-csv">&nbsp</i> Export Data to CSV',//untuk export data ke csv
            },
            {
              extend: 'excelHtml5',//extend html
              className: 'btn btn-success',//button
              text: '<i class="fas fa-file-excel">&nbsp</i> Export Data to Excel',//untuk export data ke excel
              customize: function ( xlsx ){//type data excel
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // jQuery selector to add a border
                $( 'row c', sheet ).attr( 's', '25' );
              }
            },
            {
              extend : 'pdfHtml5',   //extend html             
              className: 'btn btn-danger',  //button
              text: '<i class="fas fa-file-pdf">&nbsp</i> Export Data to PDF', //untuk export data ke pdf
              orientation : 'landscape', //type landscape
              pageSize : 'A4', //ukuran kertas
              download: 'open' //download 
            }
          ],
          <?php } }?>
            "ajax":
            {
                "url": "<?= base_url('C_tooling/view_data_where');?>", // URL file untuk proses select datanya
                "type": "POST", //post select datanya
                "data": function(data){     
                  data.searchByFromdate = $('#search_fromdate').val(); //value from date
                  data.searchByTodate = $('#search_todate').val(); //value to date
                }

            },
            "deferRender": true,
            "aLengthMenu": [[5, 10,100,1000,10000,100000,1000000,1000000000],[ 5, 10, 100,1000,10000,100000,1000000,"All"]], // Combobox Limit
            "columns": [
               {"data": 'hdrid',"sortable": false, //1
                    render: function (data, type, row, meta) {
                        // return meta.row + meta.settings._iDisplayStart + 1;
                        // return '<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div> <div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div> <div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                        mnu='';
                        mnu=mnu+'<div class="btn btn-success btn-sm konfirmasiView mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div>';
                      <?php if(!empty($hak_akses)){ if ($hak_akses->allow_edit=='on') { ?>
                        mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                      <?php } }?>
                      <?php if(!empty($hak_akses)){ if ($hak_akses->allow_delete=='on') { ?>
                        mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                      <?php } }?>
                        mnu = mnu + '<a class="btn btn-secondary btn-sm mr-2"  href="<?php echo base_url('C_Print_tooling/print_tooling?var1=') . "'+ data +' &var2='+ data +' &var2=1"  ?>"  target="_blank"> <i class="fas fa-print mr-1"></i>A4</a>'
                        
                        return mnu;

                    }  
                },
                
                // ---------------------------------- Datatables Macro Batas sini ---------------------------------
                 
                {"data":"hdrid"},
                {"data":"vendor_submission"},
                {"data":"supplier_name_and_code"},
                {"data":"part_number"},
                {"data":"assy_for"},
                {"data":"part_name"},
                {"data":"number_of_tooling"},
                {"data":"orderup_or_less_capacity"},
                {"data":"cost_down"},
                {"data":"quality_problem"},
                {"data":"renewal_and_additional"},
                {"data":"month"},
                {"data":"qty"},
                {"data":"start_delivery"},
                {"data":"mold_finish"},
                {"data":"mold_price"},
                {"data":"mold_price_2"},
                {"data":"m_or_c_tonage"},
                {"data":"m_or_c_tonage_2"},
                {"data":"qty_cavity"},
                {"data":"qty_cavity_2"},
                {"data":"cavity_no"},
                {"data":"cavity_no_2"},
                {"data":"output"},
                {"data":"guarantee_shoot"},
                {"data":"gambar"},
                {"data":"total_renewal"},
                {"data":"change_core"},
                {"data":"change_moving_dies"},
                {"data":"change_fix_dies"},
                {"data":"total_shot"},
                {"data":"t0_to_t1_trial"},
                {"data":"sample_isir_submission"},
                {"data":"cycle_time"},
                {"data":"cavity"},
                {"data":"output_2"},
                {"data":"total_output_pcs_per_month"},
                {"data":"approval_submission_of_renewal_mold"},
                {"data":"approved"},
                {"data":"checked"},
                {"data":"prepared"},
                {"data":"tooling_no"},
                {"data":"tooling_cost"},
                {"data":"depresiation_cost"},
                {"data":"part_price"},
                {"data":"total_cost"},
                {"data":"remark"},
                {"data":"approval"},
                {"data":"life_shoot_guarantee"},
                {"data":"forcast_pc_and_nenkei"},
                {"data":"quotation"},

                // ---------------------------------- / Datatables Macro Batas sini --------------------------------

            ],


        });

        // Search button
        $('#search').click(function(){

          
            if($('#search_fromdate').val() != '' && $('#search_todate').val() !='')
            {
                tabel.draw();
            }
            else
            {
              gagal("Both Date is Required");
            }

        });


    });
    
</script>


<script type="text/javascript">

     ///@see vreadonly()
     ///@note fungsi jika hanya user bisa melihat data tanpa diedit dan hanya administrator bisa edit
     ///@attention 
    function vreadonly(form,vboolean){
    
      // alert(form);

      // var x = $(form).serializeArray();

      // $.each(x, function(i, field){

      //   if(field.name=="hdrid"){
      //     if(vboolean==true){
      //       document.getElementsByName(field.name)[0].readOnly=true;
      //     }else{
      //       document.getElementsByName(field.name)[0].readOnly=false;
      //     }
      //   }
        
      // });".form_datetime" // '#timepickerreport_date'

     
    }


</script>

<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>


<script type="text/javascript">

      ///@see handleSelectChange_supplier_name_and_code()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_supplier_name_and_code(event) {
 
 var data = $('#supplier_name_and_code').select2('data')[0].text;
 
 if (data=='-Select-'){
   $('#part_number').val('');   
   $('#assy_for').val('');   
   $('#part_name').val('');   
   $('#number_of_tooling').val(''); 
   $('#month').val(''); 

 }else{
   var res = data.split("-");
   $('#part_number').val(res[1]);
   $('#assy_for').val(res[2]);
   $('#part_name').val(res[3]);
   $('#number_of_tooling').val(res[4]);
   $('#month').val(res[4]);
   
 };

}

    ///@see handleSelectChange_start_delivery()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_start_delivery(event) {
 
 var data = $('#start_delivery').select2('data')[0].text;
 
 if (data=='-Select-'){
   $('#mold_finish').val('');   
   $('#mold_price').val('');   
   $('#mold_price_2').val('');   
   $('#m_or_c_tonage').val(''); 
   $('#m_or_c_tonage_2').val(''); 
   $('#qty_cavity').val(''); 
   $('#qty_cavity_2').val(''); 
   $('#cavity_no').val(''); 
   $('#cavity_no_2').val(''); 
   $('#output').val(''); 
   $('#guarantee_shoot').val(''); 

 }else{
   var res = data.split("-");
   $('#mold_finish').val(res[1]);
   $('#mold_price').val(res[2]);
   $('#mold_price_2').val(res[3]);
   $('#m_or_c_tonage').val(res[4]);
   $('#m_or_c_tonage_2').val(res[5]);
   $('#qty_cavity').val(res[6]);
   $('#qty_cavity_2').val(res[7]);
   $('#cavity_no').val(res[8]);
   $('#cavity_no_2').val(res[9]);
   $('#output').val(res[10]);
   $('#guarantee_shoot').val(res[11]);
   
  };

  }


      ///@see handleSelectChange_t0_to_t1_trial()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_t0_to_t1_trial(event) {
 
 var data = $('#t0_to_t1_trial').select2('data')[0].text;
 
 if (data=='-Select-'){
   $('#sample_isir_submission').val('');   
   $('#cycle_time').val('');   
   $('#cavity').val('');   
   $('#output_2').val(''); 
   $('#total_output_pcs_per_month').val(''); 

 }else{
   var res = data.split("-");
   $('#sample_isir_submission').val(res[1]);
   $('#cycle_time').val(res[2]);
   $('#cavity').val(res[3]);
   $('#output_2').val(res[4]);
   $('#total_output_pcs_per_month').val(res[5]);
  };

  }
 ///@see handleSelectChange_part_number()
  ///@note fungsi untuk filter data
  ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_approval(event) {

var data = $('#approval').select2('data')[0].text;

         }




</script>

<script type="text/javascript">

          // Setting min max Report
          $(function () {
            
            var someDate2 = new Date();            
            var result0 = someDate2.setDate(someDate2.getDate() + 0);
            var result2 = someDate2.setDate(someDate2.getDate() + 14);
         
             $('#timepickerreport_date').datetimepicker(
               {
                minDate: new Date(result0).toISOString().slice(0, 10),
                maxDate: new Date(result2).toISOString().slice(0, 10)
               }
             );

         });

</script>


<script type="text/javascript">


// function test(event) {

// // var data = $('#temporary_action').select2('data')[0].text;
// // alert('berhasil');
// // document.getElementById('requirement_document').style.display ='block';
// // document.getElementById('requirement_document_1').style.display ='none';

// }

  </script>










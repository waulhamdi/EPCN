<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header"><!-- untuk kepala judul aplikasi -->
  <div class="container-fluid"><!--untuk jenis container-->
    <div class="row mb-2"><!-- untuk row aplikasi-->
      <div class="col-sm-6"><!--untuk ukuran panjang container-->
        <h1 class="m-0 text-dark">ISIR Register</h1><!-- untuk menampilkan judul-->
      </div><!-- /.col -->
      <div class="col-sm-6"><!--untuk ukuran panjang container-->
        <ol class="breadcrumb float-sm-right"><!-- untuk tampilan dashboard aplikasi-->
          <li class="breadcrumb-item"><a href="C_dashboard_new">Dashboard PCN</a></li><!-- judul dashboard-->
          <li class="breadcrumb-item active"><a href="C_dashboard_new">DMIA E-PCN SYSTEM</li><!-- untuk container dashboard-->
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
                            <?php if ($this->session->userdata('DepartmentAdd')||$this->session->userdata('rolename')=='Administrator Quality'||$this->session->userdata('rolename')=='User Procurement') { ?><!--untuk membuat rule hanya user bisa add data-->

                              <a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal('1','Add')" href="#"><!--fungsi add data-->
                              <i class="fa fa-plus"></i> Add Data <!--judul add data-->
                              </a>

                            <?php } ?>

                            <?php if ($this->session->userdata('DepartmentAdd')||$this->session->userdata('rolename')=='Administrator Quality'||$this->session->userdata('rolename')=='User Procurement') { ?><!--untuk membuat rule hanya user bisa add data-->

                              <a data-toggle="modal" data-target="#modal-import"  href="#"><!--fungsi add data-->
                                <i class="fa fa-upload"></i> Import Data <!--judul add data-->
                              </a>

                            <?php } ?>

                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <!--fungsi custom filler yang digunakan mencari tanggal input-->
                                 <i class="fa fa-binoculars"></i> Custom Filter <!--judul custom filler-->
                            </a>

                            <!-- <a href="<php echo base_url('C_Email/send2')?> "  Onclick='Delete_data()' >
                               <i class="fa fa-plus"></i> Send Mail
                            </a>

                            <button type="button" id="delete" onclick="Send_mail()" class="btn btn-outline-light">Send Mail 2</button>     -->

                          </h4>

                        </div>


                        <div id="collapseOne" class="panel-collapse collapse in"> <!--untuk menampilkan dan menyembunyikan suatu menu--> 
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
              <th>ISIR NUMBER</th>
              <th>PROCESS</th>
              <th>SUBMITAL</th>
              <th>IMPROVEMENT ACTIVITY</th>
              <th>SUPPLIER CODE</th>
              <th>SUPPLIER NAME</th>
              <th>PART NUMBER</th>
              <th>PART NAME</th>
              <th>TOOLING NO</th>
              <th>CAVITY NUMBER</th>
              <th>ASSY NO</th>
              <th>ASSY NAME</th>
              <th>MATERIAL MANUFACTURER</th>
              <th>GRADE NAME</th>
              <th>PROCESS NAME</th>
              <th>SUB-SUPPLIER NAME</th>
              <th>ADDRESS</th>
              <th>REMARKS</th>
              <th>INSPECTED DATE</th>
              <th>INSPECTOR</th>
              <th>MANAGER</th>
              <th>PRODUCT ADAPT TO DDS2004</th>
              <th>IMDS ID</th>
              <th>MILLSHEET</th>
              <th>ROHS CD</th>
              <th>ROHS HG</th>
              <th>ROHS PB</th>
              <th>ROHS CR</th>
              <th>ATTACH SOC</th>
              <th>DIMENSION RESULT</th>
              <th>APPROVED</th>
              <th>CHECKED</th>
              <th>PREPARED</th>
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
              <h4 class="modal-title" id="exampleModalLabel">Add Data</h5> <!--judul add data-->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!--untuk fungsi tombol close-->
              <span aria-hidden="true">&times;</span>  <!-- jika data ditambah maka data akan muncul--> 
              </button>
          </div>

          <!-- form -->
          <form role="form" id="quickForm">

            <div class="card-body">
  

            <!---------------------------------- Form Macro Batas sini ---------------------------------->
            <div class="card card-danger">
              <div class="card-header ">
                <h4 class="card-titles" data-toggle="collapse" href="#collapseTwoapproval1">
                    <b> ISIR Form </b>
                </h4>
              </div>
              <!-- /card header -->
              <div id="collapseTwoapproval1" class="panel-collapse collapse">
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
                          <label>PROCESS</label>
                        </div>
                        <div class="col-md-8">
                          <select class="form-control select2" id="process" name="process" onchange="handleSelectChange_process(event)" style="width: 100%;">
                            <option value='' selected="selected">-Select-</option>
                            <?php
                              foreach ($process as $value) {
                              echo "<option value='$value->tipe'>$value->tipe</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label>SUBMITAL</label>
                        </div>
                        <div class="col-md-8">
                          <select class="form-control select2" id="submital" name="submital" onchange="handleSelectChange_submital(event)" style="width: 100%;">
                            <option value='' selected="selected">-Select-</option>
                            <?php
                              foreach ($submital as $value) {
                              echo "<option value='$value->submital'>$value->submital -$value->email</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <label for="improvement_activity">IMPROVEMENT ACTIVITY</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="improvement_activity" class="form-control" id="improvement_activity" >
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label>SUPPLIER CODE</label>
                        </div>
                        <div class="col-md-8">
                          <select class="form-control select2" id="supplier_code" name="supplier_code" onchange="handleSelectChange_supplier_code(event)" style="width: 100%;">
                            <option value='' selected="selected">-Select-</option>
                            <?php
                              foreach ($supplier_code as $value) {
                              echo "<option value='$value->supplier_code'>$value->supplier_code</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label>SUPPLIER NAME</label>
                        </div>
                        <div class="col-md-8">
                          <select class="form-control select2" id="supplier_name" name="supplier_name" onchange="handleSelectChange_supplier_name(event)" style="width: 100%;">
                            <option value='' selected="selected">-Select-</option>
                            <?php
                              foreach ($supplier_name as $value) {
                              echo "<option value='$value->supplier_name'>$value->supplier_name -$value->part_number -$value->part_name -$value->tooling_number -$value->cavity_number
                              -$value->material_manufacture -$value->grade_name -$value->process_name -$value->sub_supplier_name -$value->address
                              -$value->remarks -$value->date_inspected -$value->inspector -$value->manager </option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4">
                            <label for="part_number">PART NUMBER</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="part_number" class="form-control" id="part_number" >
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4">
                            <label for="part_name">PART NAME</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="part_name" class="form-control" id="part_name" >
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
                              <label for="cavity_number">CAVITY NUMBER</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="cavity_number" class="form-control" id="cavity_number" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="assy_no">ASSY NO</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="assy_no" class="form-control" id="assy_no" >
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              <label for="assy_name">ASSY NAME</label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="assy_name" class="form-control" id="assy_name" >
                            </div>
                        </div>
                      </div>
                  </div>
                  <!-- /CARD BODY -->
              </div>
              <!-- /. -->
             </div>
             <!-- /div card -->

            <div class="card card-success">
              <div class="card-header">
                <h4 class="card-titles" data-toggle="collapse" href="#collapseTwoapproval2">
                    <b>Drawing Standard</b>
                </h4>
              </div>                  
            <div id="collapseTwoapproval2" class="panel-collapse collapse">
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="material_manufacture">MATERIAL MANUFACTURER</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="material_manufacture" class="form-control" id="material_manufacture" >
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="grade_name">GRADE NAME</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="grade_name" class="form-control" id="grade_name" >
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="process_name">PROCESS NAME</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="process_name" class="form-control" id="process_name" >
                    </div>
                  </div>
                </div>
              </div>
              <!-- /card body -->
            </div>
            <!-- /. -->
          </div>
        <!-- /card -->
              <div class="card card-warning">
                <div class="card-header">
                  <h4 class="card-titles" data-toggle="collapse" href="#collapseTwoapproval3"> 
                    <b>Sub-Supplier Information</b>
                  </h4>
                </div>                  
              <div id="collapseTwoapproval3" class="panel-collapse collapse">
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="sub_supplier_name">SUB SUPPLIER NAME</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="sub_supplier_name" class="form-control" id="sub_supplier_name" >
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="address">ADDRESS</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="address" class="form-control" id="address" >
                        </div>
                    </div>
                  </div>
                <hr style="border:1px solid red">
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="remarks">REMARKS</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="remarks" class="form-control" id="remarks" >
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label>INSPECTED DATE:</label>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerinspected_date" data-target-input="nearest">
                            <input type="text" id="inspected_date" name="inspected_date" class="form-control datetimepicker-input" data-target="#timepickerinspected_date"/>
                              <div class="input-group-append" data-target="#timepickerinspected_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <br>
                  <hr style="border:1px solid red">
                  <label>APPROVAL</label>
                  <hr style="border:1px solid red">
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="inspector">INSPECTOR</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="inspector" class="form-control" id="inspector" >
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="manager">MANAGER</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="manager" class="form-control" id="manager" >
                        </div>
                    </div>
                  </div>
                  <br>
                  <hr style="border:1px solid red">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label>PRODUCT ADAPT TO DDS2004</label>
                      </div>
                      <div class="col-md-8">
                        <select class="form-control select2" id="product_adapt_to_dds2004" name="product_adapt_to_dds2004" onchange="handleSelectChange_product_adapt_to_dds2004(event)" style="width: 100%;">
                          <option value='' selected="selected">-Select-</option>
                          <?php
                            foreach ($product_adapt_to_dds2004 as $value) {
                            echo "<option value='$value->adapt_to_dds2004'>$value->adapt_to_dds2004 -$value->imds_id</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="imds_id">IMDS ID</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="imds_id" class="form-control" id="imds_id" >
                        </div>
                    </div>
                  </div>
                          
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="millsheet">MILLSHEET</label>
                      </div>
                      <div class="col-md-1">
                        <a class="btn btn-success" id="millsheet_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-7">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="millsheet" multiple="" name="millsheet">
                          <label class="custom-file-label" for="millsheet" id="millsheet_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr style="border:1px solid red">
                  <label>RoHs(Soc)</label>
                  <hr style="border:1px solid red">
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="rohs_cd">RoHs(Soc) Cd<-0,01%</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="rohs_cd" class="form-control" id="rohs_cd" >
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="rohs_hg">RoHs(Soc) Hg<-0,1%</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="rohs_hg" class="form-control" id="rohs_hg" >
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="rohs_pb">RoHs(Soc) Pb<-0,1%</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="rohs_pb" class="form-control" id="rohs_pb" >
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="rohs_cr">RoHs(Soc) Cr6+<-0,1%</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="rohs_cr" class="form-control" id="rohs_cr" >
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="attach_soc">ATTACH SOC</label>
                      </div>
                      <div class="col-md-1">
                        <a class="btn btn-success" id="attach_soc_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-7">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="attach_soc" multiple="" name="attach_soc">
                          <label class="custom-file-label" for="attach_soc" id="attach_soc_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                      <label for="dimension_result">DIMENSION RESULT</label>
                      </div>
                      <div class="col-md-1">
                      <a class="btn btn-success" id="dimension_result_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-7">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="dimension_result" multiple="" name="dimension_result">
                          <label class="custom-file-label" for="dimension_result" id="dimension_result_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" >
                    <div class="row">
                        <div class="col-md-4" >
                          <label for="approved">APPROVED</label>
                        </div>
                        <div class="col-md-8" >
                          <input type="text" name="approved" class="form-control" id="approved" readonly>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4" >
                          <label for="checked">CHECKED</label>
                        </div>
                        <div class="col-md-8" >
                          <input type="text" name="checked" class="form-control" id="checked" readonly>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4" >
                          <label for="prepared">PREPARED</label>
                        </div>
                        <div class="col-md-8" >
                          <input type="text" name="prepared" class="form-control" id="prepared" readonly>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /card body -->
              </div>
              <!-- /. -->
            </div>
            <!-- /card -->

    <!---------------------------------- / Form Macro Batas sini ---------------------------------->


    
                <!-- Close Card Body -->  
                </div>
                  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btnsubmit">Save To Draft</button>   <!-- button save ke draft--> 
                    <button type="button" class="btn btn-success" id="btnsend" onclick="sendDraft()">Send</button>  <!-- button send-->               
                    <button type="button" class="btn btn-success" id="btnsend2" onclick="sendDraft2()">Save And Send</button>      <!-- button save and send-->           
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
      <div class="modal fade" id="modal-delete"> <!-- untuk class delete--> 
        <div class="modal-dialog">  <!-- Close Card Body --> 
          <div class="modal-content bg-danger"> <!-- untuk jenis warna button--> 
            <div class="modal-header"> <!-- untuk kepala delete--> 
              <h4 class="modal-title">Danger Modal</h4> <!-- untuk title modal--> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!--button close--> 
                <span aria-hidden="true">&times;</span> <!-- jika data dihapus maka data akan hilang--> 
              </button>
            </div>

            <div class="modal-body"> <!-- untuk body modal--> 
               <label id="iddelete2" hidden> </label>Apakah ingin delete <label id="iddelete"> </label> ?      <!-- judul apa ingin delete-->             
            </div>

            <div class="modal-footer justify-content-between">              <!-- untuk footer modal--> 
              <form action="#" method="post"> <!-- untuk crud delete--> 
                 <button type="button" id="delete" onclick="Delete_data()" class="btn btn-outline-light">Yes</button>     <!--button yes--> 
              </form>     
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>        <!--button no-->
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
               
              <form method="POST" action="<?php echo base_url('C_ISIR_information/import'); ?>" enctype="multipart/form-data">

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
        // isir_number: {
        // required: true,
        // },
        // process: {
        // required: true,
        // },
        // submital: {
        // required: true,
        // },
        // improvement_activity: {
        // required: true,
        // },
        // supplier_code: {
        // required: true,
        // },
        // supplier_name: {
        // required: true,
        // },
        // part_number: {
        // required: true,
        // },
        // part_name: {
        // required: true,
        // },
        // tooling_no: {
        // required: true,
        // },
        // cavity_number: {
        // required: true,
        // },
        // assy_no: {
        // required: true,
        // },
        // assy_name: {
        // required: true,
        // },
        // material_manufacture: {
        // required: true,
        // },
        // grade_name: {
        // required: true,
        // },
        // process_name: {
        // required: true,
        // },
        // sub_supplier_name: {
        // required: true,
        // },
        // address: {
        // required: true,
        // },
        // remarks: {
        // required: true,
        // },
        // inspected_date: {
        // required: true,
        // },
        // inspector: {
        // required: true,
        // },
        // manager: {
        // required: true,
        // },
        // product_adapt_to_dds2004: {
        // required: true,
        // },
        // imds_id: {
        // required: true,
        // },
        // // millsheet: {
        // // required: true,
        // // },
        // rohs_cd: {
        // required: true,
        // },
        // rohs_hg: {
        // required: true,
        // },
        // rohs_pb: {
        // required: true,
        // },
        // rohs_cr: {
        // required: true,
        // },
        // // attach_soc: {
        // // required: true,
        // // },
        // // dimension_result: {
        // // required: true,
        // // },
        // approved: {
        // required: true,
        // },
        // checked: {
        // required: true,
        // },
        // prepared: {
        // required: true,
        // },    



        // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

      },
      messages: {
    
				// ---------------------------------- Rule input Macro Batas sini 2---------------------------------
        isir_number: {
required: "Please Input isir_number",
minlength: 3
},
process: {
required: "Please Input process",
minlength: 3
},
submital: {
required: "Please Input submital",
minlength: 3
},
improvement_activity: {
required: "Please Input improvement_activity",
minlength: 3
},
supplier_code: {
required: "Please Input supplier_code",
minlength: 3
},
supplier_name: {
required: "Please Input supplier_name",
minlength: 3
},
part_number: {
required: "Please Input part_number",
minlength: 3
},
part_name: {
required: "Please Input part_name",
minlength: 3
},
tooling_no: {
required: "Please Input tooling_no",
minlength: 3
},
cavity_number: {
required: "Please Input cavity_number",
minlength: 3
},
assy_no: {
required: "Please Input assy_no",
minlength: 3
},
assy_name: {
required: "Please Input assy_name",
minlength: 3
},
material_manufacture: {
required: "Please Input material_manufacture",
minlength: 3
},
grade_name: {
required: "Please Input grade_name",
minlength: 3
},
process_name: {
required: "Please Input process_name",
minlength: 3
},
sub_supplier_name: {
required: "Please Input sub_supplier_name",
minlength: 3
},
address: {
required: "Please Input address",
minlength: 3
},
remarks: {
required: "Please Input remarks",
minlength: 3
},
inspected_date: {
required: "Please Input inspected_date",
minlength: 3
},
inspector: {
required: "Please Input inspector",
minlength: 3
},
manager: {
required: "Please Input manager",
minlength: 3
},
product_adapt_to_dds2004: {
required: "Please Input product_adapt_to_dds2004",
minlength: 3
},
imds_id: {
required: "Please Input imds_id",
minlength: 3
},
millsheet: {
required: "Please Input millsheet",
minlength: 3
},
rohs_cd: {
required: "Please Input rohs_cd",
minlength: 3
},
rohs_hg: {
required: "Please Input rohs_hg",
minlength: 3
},
rohs_pb: {
required: "Please Input rohs_pb",
minlength: 3
},
rohs_cr: {
required: "Please Input rohs_cr",
minlength: 3
},
attach_soc: {
required: "Please Input attach_soc",
minlength: 3
},
dimension_result: {
required: "Please Input dimension_result",
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
              url: "<?php echo base_url('C_ISIR_information/ajax_getbyhdrid1')?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

                  // ---------------------------------- Data val Macro  Batas sini ------------------------------
$('#process').select2().val(data.process).trigger('change');
$('#submital').select2().val(data.submital).trigger('change');
$('#improvement_activity').val(data.improvement_activity);
$('#supplier_code').select2().val(data.supplier_code).trigger('change');
$('#supplier_name').select2().val(data.supplier_name).trigger('change');
$('#part_number').val(data.part_number);
$('#part_name').val(data.part_name);
$('#tooling_no').val(data.tooling_no);
$('#cavity_number').val(data.cavity_number);
$('#assy_no').val(data.assy_no);
$('#assy_name').val(data.assy_name);
$('#material_manufacture').val(data.material_manufacture);
$('#grade_name').val(data.grade_name);
$('#process_name').val(data.process_name);
$('#sub_supplier_name').val(data.sub_supplier_name);
$('#address').val(data.address);
$('#remarks').val(data.remarks);
$('#inspected_date').val(data.inspected_date);
$('#inspector').val(data.inspector);
$('#manager').val(data.manager);
$('#product_adapt_to_dds2004').select2().val(data.product_adapt_to_dds2004).trigger('change');
$('#imds_id').val(data.imds_id);
document.getElementById('millsheet_label').innerHTML=data.millsheet;
 var a = document.getElementById('millsheet_view');
 if(!data.millsheet==''){
   a.href = "<?php echo base_url('assets/upload/ISIR_information') ?>" + data.millsheet;
 }else{
   a.removeAttribute("href");
 };
$('#rohs_cd').val(data.rohs_cd);
$('#rohs_hg').val(data.rohs_hg);
$('#rohs_pb').val(data.rohs_pb);
$('#rohs_cr').val(data.rohs_cr);
document.getElementById('attach_soc_label').innerHTML=data.attach_soc;
 var a = document.getElementById('attach_soc_view');
 if(!data.attach_soc==''){
   a.href = "<?php echo base_url('assets/upload/ISIR_information') ?>" + data.attach_soc;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('dimension_result_label').innerHTML=data.dimension_result;
 var a = document.getElementById('dimension_result_view');
 if(!data.dimension_result==''){
   a.href = "<?php echo base_url('assets/upload/ISIR_information') ?>" + data.dimension_result;
 }else{
   a.removeAttribute("href");
 };
$('#approved').val(data.approved);
$('#checked').val(data.checked);
$('#prepared').val(data.prepared);


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
            vurl = "<?php echo base_url('C_ISIR_information/ajax_add')?>";//link simpan data
          } else {           
            vurl = "<?php echo base_url('C_ISIR_information/ajax_update')?>";//link update data
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
vurl = "<?php echo base_url('C_ISIR_information/ajax_sendDraft')?>";//link senddraft
    
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
    vurl = "<?php echo base_url('C_ISIR_information/ajax_sendDraft2') ?>"; //link senddraft2

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
vurl = "<?php echo base_url('C_ISIR_information/ajax_delete')?>";//link untuk delete

// Post data
$.ajax({//ajax delete
url: vurl,//url
method: "post",//jenis method pst
processData: false,//false process
contentType: false,//false content
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
//   vurl = "<?php echo base_url('C_Email/Send_mail')?>";//link untuk send mail
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
            "ajax":
            {
                "url": "<?= base_url('C_ISIR_information/view_data_where');?>", // URL file untuk proses select datanya
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
                        mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>'; mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                        mnu = mnu + '<a class="btn btn-secondary btn-sm mr-2"  href="<?php echo base_url('C_print_isir/print_isir?var1=') . "'+ data +' &var2=1&var2=1"  ?>"  target="_blank"> <i class="fas fa-print mr-1"></i>A4</a>'
                        
                        return mnu;

                    }  
                },
                
                // ---------------------------------- Datatables Macro Batas sini ---------------------------------
                 
                {"data":"hdrid"},
                {"data":"process"},
                {"data":"submital"},
                {"data":"improvement_activity"},
                {"data":"supplier_code"},
                {"data":"supplier_name"},
                {"data":"part_number"},
                {"data":"part_name"},
                {"data":"tooling_no"},
                {"data":"cavity_number"},
                {"data":"assy_no"},
                {"data":"assy_name"},
                {"data":"material_manufacture"},
                {"data":"grade_name"},
                {"data":"process_name"},
                {"data":"sub_supplier_name"},
                {"data":"address"},
                {"data":"remarks"},
                {"data":"inspected_date"},
                {"data":"inspector"},
                {"data":"manager"},
                {"data":"product_adapt_to_dds2004"},
                {"data":"imds_id"},
                {"data":"millsheet"},
                {"data":"rohs_cd"},
                {"data":"rohs_hg"},
                {"data":"rohs_pb"},
                {"data":"rohs_cr"},
                {"data":"attach_soc"},
                {"data":"dimension_result"},
                {"data":"approved"},
                {"data":"checked"},
                {"data":"prepared"},



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


      ///@see handleSelectChange_proses_temporary_and_fullscale()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_process(event) {

var data = $('#process').select2('data')[0].text;

            }

    ///@see handleSelectChange_submital_isir()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
function handleSelectChange_submital(event) {

var data = $('#submital').select2('data')[0].text;
if (data=='-Select-'){
      $('#improvement_activity').val('');   
 
    }else{
      var res = data.split("-");
      $('#improvement_activity').val(res[1]);
    };

            }


    ///@see handleSelectChange_supplier_code()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
function handleSelectChange_supplier_code(event) {

var data = $('#supplier_code').select2('data')[0].text;

            }

    ///@see handleSelectChange_nama_supplier()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
function handleSelectChange_supplier_name(event) {

var data = $('#supplier_name').select2('data')[0].text;
    if (data=='-Select-'){
      $('#part_number').val('');   
      $('#part_name').val('');   
      $('#tooling_no').val('');   
      $('#cavity_number').val(''); 
      $('#material_manufacture').val('');   
      $('#grade_name').val('');   
      $('#process_name').val('');  
      $('#sub_supplier_name').val('');  
      $('#address').val('');  
      $('#remarks').val('');  
      $('#inspected_date').val('');  
      $('#inspector').val('');  
      $('#manager').val('');  
    }else{
      var res = data.split("-");
      $('#part_number').val(res[1]);
      $('#part_name').val(res[2]);
      $('#tooling_no').val(res[3]);
      $('#cavity_number').val(res[4]);
      $('#material_manufacture').val(res[5]);
      $('#grade_name').val(res[6]);
      $('#process_name').val(res[7]);
      $('#sub_supplier_name').val(res[8]);
      $('#address').val(res[9]);
      $('#remarks').val(res[10]);
      $('#inspected_date').val(res[11]);
      $('#inspector').val(res[12]);
      $('#manager').val(res[13]);
    };

            }

    ///@see handleSelectChange_part_number()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif          
function handleSelectChange_part_number(event) {

var data = $('#part_number').select2('data')[0].text;

            }

    ///@see handleSelectChange_part_number()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
function handleSelectChange_part_name(event) {

var data = $('#part_name').select2('data')[0].text;
if (data=='-Select-'){
      $('#no_tooling').val('');   
      $('#cavity_number').val('');     
    }else{
      var res = data.split("-");
      $('#no_tooling').val(res[1]);
      $('#cavity_number').val(res[2]);


      
    };

            }


  ///@see handleSelectChange_rohs()
  ///@note fungsi untuk filter data
  ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
function handleSelectChange_rohs(event) {

var data = $('#rohs').select2('data')[0].text;

            }

  ///@see ndleSelectChange_product_adapt_to_dds2004()
  ///@note fungsi untuk filter data
  ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
function handleSelectChange_product_adapt_to_dds2004(event) {

  var data = $('#product_adapt_to_dds2004').select2('data')[0].text;
if (data=='-Select-'){
      $('#imds_id').val('');      
    }else{
      var res = data.split("-");
      $('#imds_id').val(res[1]);


      
    };
            }

  ///@see ndleSelectChange_product_adapt_to_dds2004()
  ///@note fungsi untuk filter data
  ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
function handleSelectChange_imds_id(event) {

var data = $('#imds_id').select2('data')[0].text;

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










<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header"><!-- untuk kepala judul aplikasi -->
  <div class="container-fluid"><!--untuk jenis container-->
    <div class="row mb-2"><!-- untuk row aplikasi-->
      <div class="col-sm-6"><!--untuk ukuran panjang container-->
        <h1 class="m-0 text-dark">PCN Register</h1><!-- untuk menampilkan judul-->
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
                            <?php if (!empty($hak_akses)) {
                              if ($hak_akses->allow_add == 'on') { ?>
                                                                          <a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal('1','Add')" href="#" ><!--fungsi add data-->
                                                                          <i class="fa fa-plus"></i> Add Data <!--judul add data-->
                                                                          </a>

                                                  <?php }
                            } ?>

                            <?php if (!empty($hak_akses)) {
                              if ($hak_akses->allow_import == 'on') { ?>
                                                                          <a data-toggle="modal" data-target="#modal-import"  href="#"><!--fungsi import data-->
                                                                            <i class="fa fa-upload"></i> Import Data <!--judul import  data-->
                                                                          </a>

                                                  <?php }
                            } ?>

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
              <th>TRANSACTION ID</th>
              <th>STATUS</th>
              <th>EMAIL</th>
              <th>TRANSACTION DATE</th>
              <th>SUPPLIER NAME</th>
              <th>PREPARED</th>
              <th>CHECKED</th>
              <th>APPROVED</th>
              <th>ANY COST IMPACT?</th>
              <th>COST IMPACT</th>
              <th>CAPACITY IMPACT</th>
              <th>BEFORE CAPACITY</th>
              <th>AFTER CAPACITY</th>
              <th>PART NUMBER</th>
              <th>CAVITY</th>
              <th>PART NAME</th>
              <th>PRODUCT NAME</th>
              <th>COMMODITY</th>
              <th>OBJECT TYPE</th>
              <th>REASON TO CHANGE</th>
              <th>DESCRIPTION OF PROCESS CHANGE</th>
              <th>CURRENT PROCESS</th>
              <th>PROPOSED PROCESS</th>
              <th>CHARACTERISTICS AFFECTED</th>
              <th>CRITERIA CRITICAL ITEM</th>
              <th>TRIAL MANUFACTURING</th>
              <th>PROCESS CAPABILITY STUDY</th>
              <th>INITIAL SAMPLE INSPECTION COMPLETED</th>
              <th>INITIAL SAMPLE SUBMISSION</th>
              <th>TIMING DENSO APPROVAL</th>
              <th>MASS PRODUCTION STARTS</th>
              <th>MASS PRODUCTION SHIPMENT</th>
              <th>ENTRY SAMPLE START</th>
              <!-- <th>FOLDER</th> -->
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

          <div class="row">
            <div class="col-md-12">
              
                  <div id="accordion">
                    <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                    <div class="card card-primary">
                      <div class="card-header" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" data-target="#closepcn">
                        <h4 class="card-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            PCN
                          </a>
                        </h4>
                      </div>
                      <div class="collapse" id="closepcn">
                      <div class="card-body">
                          <br>
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
                                  <label for="email">EMAIL</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="email" class="form-control" id="email" >
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="supplier_name">SUPPLIER NAME</label>
                                </div>
                                <div class="col-md-8">
                                <select class="form-control select2" id="supplier_name" name="supplier_name" onchange="handleSelectChange_supplier(event)" style="width: 100%;">
                                  <option value='' selected="selected">-Select-</option>
                                  <?php
                                  foreach ($supplier as $value) {
                                    echo "<option value='$value->supplier'>$value->supplier</option>";
                                  }
                                  ?>
                                </select>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="prepared">WRITTEN by Supplier</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="prepared" class="form-control" id="prepared" >
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="checked">CHECKED by Supplier</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="checked" class="form-control" id="checked" >
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="approved">APPROVED by Supplier</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="approved" class="form-control" id="approved" >
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="any_cost_impact">Any Cost Impact?</label>
                                </div>
                                <div class="col-md-8">
                                  <!-- <input type="text" name="any_cost_impact" class="form-control" id="any_cost_impact" > -->
                                  <select class="form-control select2" id="any_cost_impact" name="any_cost_impact" onchange="handleSelectChange_any_cost_impact(event)" style="width: 100%;">
                                    <option value='' selected="selected">-Select-</option>
                                    <?php
                                    foreach ($any_cost_impact as $value) {
                                      echo "<option value='$value'>$value</option>";
                                    }
                                    ?>
                                  </select>
                                </div>
                            </div>
                          </div>

                           <!-- membuat div class untuk menampilkan / menyembunyikan name line yokotenkai -->
                      <div id="any_cost_impact_show">

                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="please_mention">Please Mention</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="please_mention" class="form-control" id="please_mention" placeholder="">
                                </div>
                            </div>
                          </div>

                      </div>
                      <!-- tutup div class untuk menampilkan / menyembunyikan name line yokotenkai -->

                          
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="affect_to_capacity">Affect To Capacity ?</label>
                                </div>
                                <div class="col-md-8">
                                  <select class="form-control select2" id="affect_to_capacity" name="affect_to_capacity" onchange="handleSelectChange_affect_to_capacity(event)" style="width: 100%;">
                                    <option value='' selected="selected">-Select-</option>
                                    <?php
                                    foreach ($any_cost_impact as $value) {
                                      echo "<option value='$value'>$value</option>";
                                    }
                                    ?>
                                  </select>
                                </div>
                            </div>
                          </div>

                          <div id="affect_to_capacity_show">
                            <div class="form-group">
                              <div class="row">
                                  <div class="col-md-4">
                                    <label for="before_capacity">Before Capacity</label>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" name="before_capacity" class="form-control" id="before_capacity" >
                                  </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                  <div class="col-md-4">
                                    <label for="after_capacity">After Capacity</label>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" name="after_capacity" class="form-control" id="after_capacity" >
                                  </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="row">
                                  <label for="after_capacity">Purchasing Section's Comment</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="cost_impact">Cost Impact</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="cost_impact" class="form-control" id="cost_impact" >
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="capacity_impact">Capacity Impact</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="capacity_impact" class="form-control" id="capacity_impact" >
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="part_number">PART NUMBER</label>
                                </div>
                                <div class="col-md-8">
                                <select class="form-control select2" id="part_number" name="part_number" onchange="handleSelectChange_part_number(event)" style="width: 100%;">
                                  <option value='' selected="selected">-Select-</option>
                                  <?php
                                  foreach ($part_number as $value) {
                                    echo "<option value='$value->part_number'>$value->part_number</option>";
                                  }
                                  ?>
                                </select>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <!-- <label for="cavity">CAVITY</label> -->
                                </div>
                                <div class="col-md-4">
                                  <input type="text" name="cavity" class="form-control" id="cavity" placeholder="Number Of Cavities">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="part_name">PART NAME</label>
                                </div>
                                <div class="col-md-8">
                                  <select class="form-control select2" id="part_name" name="part_name" onchange="handleSelectChange_part_name(event)" style="width: 100%;">
                                    <option value='' selected="selected">-Select-</option>
                                    <?php
                                    foreach ($part_name as $value) {
                                      echo "<option value='$value->part_name'>$value->part_name</option>";
                                    }
                                    ?>
                                  </select>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="product_name">PRODUCT NAME</label>
                                </div>
                                <div class="col-md-8">
                                <select class="form-control select2" id="product_name" name="product_name" onchange="handleSelectChange_product(event)" style="width: 100%;">
                                  <option value='' selected="selected">-Select-</option>
                                  <?php
                                  foreach ($product as $value) {
                                    echo "<option value='$value->product'>$value->product</option>";
                                  }
                                  ?>
                                </select>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="commodity">COMMODITY</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="commodity" class="form-control" id="commodity" >
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="reason_to_change">REASON TO CHANGE</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="reason_to_change" class="form-control" id="reason_to_change" >
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="description_of_process_change">DESCRIPTION OF PROCESS CHANGE</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="description_of_process_change" class="form-control" id="description_of_process_change" >
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="current_process">CURRENT PROCESS</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="current_process" class="form-control" id="current_process" >
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="proposed_process">PROPOSED PROCESS</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="proposed_process" class="form-control" id="proposed_process" >
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label for="characteristics_affected">CHARACTERISTICS AFFECTED</label>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" name="characteristics_affected" class="form-control" id="characteristics_affected" >
                                </div>
                            </div>
                          </div>
                      <!-- Close CollapseOne -->
                      </div>
                      </div>
                    </div> 
                    <!-- Close Card-->

                    <div class="card card-danger">
                      <div class="card-header" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" data-target="#closesup" >
                        <h4 class="card-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Criteria Change Process
                          </a>
                        </h4>
                      </div>
                      <div class="collapse" id="closesup">
                      <div class="card-body" id="collapseTwo">
                      <hr style="border:1px solid red">
                      <label>SUPPLIER</label>
                      <hr style="border:1px solid red">
                      <div class="form-group" clearfix>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="supplier" value="NEW SUPPLIER(never been in denso)" name="object_type">
                        <label for="supplier">
                            1.1 NEW SUPPLIER
                            (never been in denso)
                        </label>
                      </div>
                      <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="supplier2" value="NEW SUPPLIER(current denso supplier)" name="object_type">
                        <label for="supplier2">
                        1.2 NEW SUPPLIER
                        (current denso supplier)
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="supplier3" value="ADDITIONAL SUPPLIER(current denso supplier)" name="object_type" >
                        <label for="supplier3">
                        1.3 ADDITIONAL SUPPLIER
                        (current denso supplier)
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="supplier4" value="CHANGE SUPPLIER(current denso supplier)" name="object_type" >
                        <label for="supplier4">
                        1.4 CHANGE SUPPLIER
                        (current denso supplier)
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="supplier5" value="CHANGE PLACE PRODUCTION(same denso supplier)" name="object_type" >
                        <label for="supplier5">
                        1.5 CHANGE PLACE PRODUCTION
                        (same denso supplier)
                        </label>
                      </div>
                      <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="supplier6" value="ADDITIONAL SUPPLIER" name="object_type" >
                        <label for="supplier6">
                        1.6 ADDITIONAL SUPPLIER
                        </label>
                      </div>
                      <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="supplier7" value="CHANGE SUB SUPPLIER(change route)" name="object_type" >
                        <label for="supplier7">
                        1.7 CHANGE SUB SUPPLIER
                        (change route)
                        </label>
                      </div>
                      </div>

                      <br>

                      <hr style="border:1px solid red">
                      <label>IMPROVEMENT</label>
                      <hr style="border:1px solid red">

                      <div class="form-group" clearfix>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="quality_improvement" value="ADDITIONAL PROCESS" name="object_type"  >
                        <label for="quality_improvement">
                            2.1 ADDITIONAL PROCESS
                        </label>
                      </div>
                      <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="quality_improvement2" value="CHANGE PROCESS" name="object_type" >
                        <label for="quality_improvement2">
                          2.2  CHANGE PROCESS
                        </label>
                      </div>
                      </div>
                      <br>
                      <hr style="border:1px solid red">
                      <label>MATERIAL</label>
                      <hr style="border:1px solid red">
                      <div class="form-group" clearfix>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="material" value="CHANGE MATERIAL SPECIFICATION" name="object_type"  >
                        <label for="material">
                            3.1 CHANGE MATERIAL SPECIFICATION 
                        </label>
                      </div>
                      <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="material2" value="CHANGE MATERIAL MAKER" name="object_type" >
                        <label for="material2">
                            3.2 CHANGE MATERIAL MAKER
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="material3" value="CHANGE PLACE PRODUCTION(same material maker company)" name="object_type" >
                        <label for="material3">
                            3.3 CHANGE PLACE PRODUCTION
                            (same material maker company)
                        </label>
                      </div>
                      </div>

                      <br>
                      <hr style="border:1px solid red">
                      <label>TOOLING/MACHINE</label>
                      <hr style="border:1px solid red">
                      <div class="form-group" clearfix>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="tooling_machine" value="RENEWAL DIES" name="object_type"  >
                        <label for="tooling_machine">
                            4.1 RENEWAL DIES
                        </label>
                      </div>
                      <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="tooling_machine2" value="ADDITIONAL DIES" name="object_type" >
                        <label for="tooling_machine2">
                            4.2 ADDITIONAL DIES
                        </label>
                      </div>
                      <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="tooling_machine3" value="REACTIVATION DIES" name="object_type" >
                        <label for="tooling_machine3">
                            4.3 REACTIVATION DIES 
                        </label>
                      </div>
                      <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="tooling_machine4" value="ADDITONAL MACHINE(existing machine)" name="object_type" >
                        <label for="tooling_machine4">
                            4.4 ADDITONAL MACHINE
                            (existing machine)
                        </label>
                      </div>
                      <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="tooling_machine5" value="ADDITONAL MACHINE(new machine)" name="object_type" >
                        <label for="tooling_machine5">
                            4.5 ADDITONAL MACHINE
                            (new machine)
                        </label>
                      </div>
                      <!-- <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="tooling_machine6" value="YOKOTEN MACHINE SPEC" name="object_type" >
                        <label for="tooling_machine6">
                            4.5.1 YOKOTEN MACHINE SPEC
                        </label>
                      </div>
                      <br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="tooling_machine7" value="NEW MACHINE SPEC" name="object_type" >
                        <label for="tooling_machine7">
                            4.5.2 NEW MACHINE SPEC
                        </label>
                      </div> -->
                      </div>
                      </div>
                    </div>
                    </div>

                    <div class="card card-success">
                      <div class="card-header" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" data-target="#closecritical">
                        <h4 class="card-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                          Criteria Critical Item
                          </a>
                        </h4>
                      </div>
                      <div class="collapse" id="closecritical">
                      <div class="card-body" id="collapseThree" class="panel-collapse collapse">
                     
                            <hr style="border:1px solid red">
                            <label>CRITERIA CRITICAL ITEM</label>
                            <hr style="border:1px solid red">

                          <div class="form-group" clearfix>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="criteria_critical_item" value="SAFETY" name="criteria_critical_item"  >
                                <label for="criteria_critical_item">
                                     SAFETY<img src="<?php echo base_url() ?>assets/dist/img/safety.jpg" style="opacity: .8;width:100px">
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="criteria_critical_item2" value="ENVIRONMENT" name="criteria_critical_item" >
                                <label for="criteria_critical_item2">
                                    ENVIRONMENT<img src="<?php echo base_url() ?>assets/dist/img/environment.jpg" style="opacity: .8;width:90px">
                                </label>
                            </div>
                             <div class="icheck-primary d-inline">
                                <input type="radio" id="criteria_critical_item3" value="FUNCTION" name="criteria_critical_item" >
                                <label for="criteria_critical_item3">
                                   FUNCTION<img src="<?php echo base_url() ?>assets/dist/img/function.jpg" style="opacity: .8;width:100px">
                                </label>
                            </div>
                             <div class="icheck-primary d-inline">
                                <input type="radio" id="criteria_critical_item4" value="CRITICAL" name="criteria_critical_item" >
                                <label for="criteria_critical_item4">
                                    CRITICAL<img src="<?php echo base_url() ?>assets/dist/img/critical.jpg" style="opacity: .8;width:100px">
                                </label>
                            </div>
                             <div class="icheck-primary d-inline">
                                <input type="radio" id="criteria_critical_item5" value="REGULATION" name="criteria_critical_item" >
                                <label for="criteria_critical_item5">
                                    REGULATION<img src="<?php echo base_url() ?>assets/dist/img/regulation.jpg" style="opacity: .8;width:75px">
                                </label>
                            </div>
                             <div class="icheck-primary d-inline">
                                <input type="radio" id="criteria_critical_item6" value="NONE" name="criteria_critical_item" >
                                <label for="criteria_critical_item6">
                                    NONE
                                </label>
                            </div>
                            
                          </div>
                            
                      </div>
                      </div>
                    </div>

                    <div class="card card-warning">
                      <div class="card-header" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" data-target="#closeschedule">
                        <h4 class="card-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" >
                            Schedule
                          </a>
                        </h4>
                      </div>
                      <div class="collapse" id="closeschedule">
                      <div class="card-body" id="collapseFour" class="panel-collapse collapse">
                          <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>TRIAL MANUFACTURING:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickertrial_manufacturing" data-target-input="nearest">
                                    <input type="text" id="trial_manufacturing" name="trial_manufacturing" class="form-control datetimepicker-input" data-target="#timepickertrial_manufacturing"/>
                                      <div class="input-group-append" data-target="#timepickertrial_manufacturing" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div> -->
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>TRIAL MANUFACTURING COMPLETED:<br>( Prototype completed )</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickertrial_manufacturing" data-target-input="nearest">
                                  <input type="text" id="trial_manufacturing" name="trial_manufacturing" class="form-control datetimepicker-input" data-target="#timepickertrial_manufacturing"/>
                                      <div class="input-group-append" data-target="#timepickertrial_manufacturing" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label>TO</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickertrial_manufacturing_completed_finish" data-target-input="nearest">
                                  <input type="text" id="trial_manufacturing_completed_finish" name="trial_manufacturing_completed_finish" class="form-control datetimepicker-input" data-target="#timepickertrial_manufacturing_completed_finish"/>
                                      <div class="input-group-append" data-target="#timepickertrial_manufacturing_completed_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <br>
                            <br>

                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>PROCESS CAPABILITY STUDY COMPLETED:</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerprocess_capability_study" data-target-input="nearest">
                                    <input type="text" id="process_capability_study" name="process_capability_study" class="form-control datetimepicker-input" data-target="#timepickerprocess_capability_study"/>
                                      <div class="input-group-append" data-target="#timepickerprocess_capability_study" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label>TO</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerprocess_capability_study_completed_finish" data-target-input="nearest">
                                    <input type="text" id="process_capability_study_completed_finish" name="process_capability_study_completed_finish" class="form-control datetimepicker-input" data-target="#timepickerprocess_capability_study_completed_finish"/>
                                      <div class="input-group-append" data-target="#timepickerprocess_capability_study_completed_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <br>
                            <br>
                          <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>TRIAL MANUFACTURING COMPLETED FINISH:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickertrial_manufacturing_completed_finish" data-target-input="nearest">
                                    <input type="text" id="trial_manufacturing_completed_finish" name="trial_manufacturing_completed_finish" class="form-control datetimepicker-input" data-target="#timepickertrial_manufacturing_completed_finish"/>
                                      <div class="input-group-append" data-target="#timepickertrial_manufacturing_completed_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div> -->
                          <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                  <label>INITIAL SAMPLE INSPECTION COMPLETED:<br>(Supplier)</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerinitial_sample_inspection_completed" data-target-input="nearest">
                                    <input type="text" id="initial_sample_inspection_completed" name="initial_sample_inspection_completed" class="form-control datetimepicker-input" data-target="#timepickerinitial_sample_inspection_completed"/>
                                      <div class="input-group-append" data-target="#timepickerinitial_sample_inspection_completed" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label>TO</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerinitial_sample_inspection_completed_finish" data-target-input="nearest">
                                    <input type="text" id="initial_sample_inspection_completed_finish" name="initial_sample_inspection_completed_finish" class="form-control datetimepicker-input" data-target="#timepickerinitial_sample_inspection_completed_finish"/>
                                      <div class="input-group-append" data-target="#timepickerinitial_sample_inspection_completed_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <br>
                            <br>

                          <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>INITIAL SAMPLE INSPECTION COMPLETED:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickerinitial_sample_inspection_completed" data-target-input="nearest">
                                    <input type="text" id="initial_sample_inspection_completed" name="initial_sample_inspection_completed" class="form-control datetimepicker-input" data-target="#timepickerinitial_sample_inspection_completed"/>
                                      <div class="input-group-append" data-target="#timepickerinitial_sample_inspection_completed" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>INITIAL SAMPLE INSPECTION COMPLETED FINISH:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickerinitial_sample_inspection_completed_finish" data-target-input="nearest">
                                    <input type="text" id="initial_sample_inspection_completed_finish" name="initial_sample_inspection_completed_finish" class="form-control datetimepicker-input" data-target="#timepickerinitial_sample_inspection_completed_finish"/>
                                      <div class="input-group-append" data-target="#timepickerinitial_sample_inspection_completed_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div> -->
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>INITIAL SAMPLE SUBMISSION:</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerinitial_sample_submission" data-target-input="nearest">
                                    <input type="text" id="initial_sample_submission" name="initial_sample_submission" class="form-control datetimepicker-input" data-target="#timepickerinitial_sample_submission"/>
                                      <div class="input-group-append" data-target="#timepickerinitial_sample_submission" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label>TO</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerinitial_sample_submission_finish" data-target-input="nearest">
                                    <input type="text" id="initial_sample_submission_finish" name="initial_sample_submission_finish" class="form-control datetimepicker-input" data-target="#timepickerinitial_sample_submission_finish"/>
                                      <div class="input-group-append" data-target="#timepickerinitial_sample_submission_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <br>
                            <br>
                          <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>INITIAL SAMPLE SUBMISSION:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickerinitial_sample_submission" data-target-input="nearest">
                                    <input type="text" id="initial_sample_submission" name="initial_sample_submission" class="form-control datetimepicker-input" data-target="#timepickerinitial_sample_submission"/>
                                      <div class="input-group-append" data-target="#timepickerinitial_sample_submission" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>INITIAL SAMPLE SUBMISSION FINISH:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickerinitial_sample_submission_finish" data-target-input="nearest">
                                    <input type="text" id="initial_sample_submission_finish" name="initial_sample_submission_finish" class="form-control datetimepicker-input" data-target="#timepickerinitial_sample_submission_finish"/>
                                      <div class="input-group-append" data-target="#timepickerinitial_sample_submission_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div> -->
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>TIMING DENSO APPROVAL:<br><p style=''>(Min. 6 Months after documents completed if DMIA inform to customer)</p></label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickertiming_denso_approval" data-target-input="nearest">
                                  <input type="text" id="timing_denso_approval" name="timing_denso_approval" class="form-control datetimepicker-input" data-target="#timepickertiming_denso_approval"/>
                                      <div class="input-group-append" data-target="#timepickertiming_denso_approval" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label>TO</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickertiming_denso_approval_finish" data-target-input="nearest">
                                  <input type="text" id="timing_denso_approval_finish" name="timing_denso_approval_finish" class="form-control datetimepicker-input" data-target="#timepickertiming_denso_approval_finish"/>
                                      <div class="input-group-append" data-target="#timepickertiming_denso_approval_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <br>
                            <br>

                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>MASS PRODUCTION STARTS:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerm_or_p_starts" data-target-input="nearest">
                                    <input type="text" id="m_or_p_starts" name="m_or_p_starts" class="form-control datetimepicker-input" data-target="#timepickerm_or_p_starts"/>
                                      <div class="input-group-append" data-target="#timepickerm_or_p_starts" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label>TO</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickermass_production_starts_finish" data-target-input="nearest">
                                    <input type="text" id="mass_production_starts_finish" name="mass_production_starts_finish" class="form-control datetimepicker-input" data-target="#timepickermass_production_starts_finish"/>
                                      <div class="input-group-append" data-target="#timepickermass_production_starts_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>MASS PRODUCTION SHIPMENT:</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerm_or_p_shipment" data-target-input="nearest">
                                    <input type="text" id="m_or_p_shipment" name="m_or_p_shipment" class="form-control datetimepicker-input" data-target="#timepickerm_or_p_shipment"/>
                                      <div class="input-group-append" data-target="#timepickerm_or_p_shipment" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label>TO</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickermass_production_shipment_finish" data-target-input="nearest">
                                    <input type="text" id="mass_production_shipment_finish" name="mass_production_shipment_finish" class="form-control datetimepicker-input" data-target="#timepickermass_production_shipment_finish"/>
                                      <div class="input-group-append" data-target="#timepickermass_production_shipment_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>M_OR_P_SHIPMENT:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickerm_or_p_shipment" data-target-input="nearest">
                                    <input type="text" id="m_or_p_shipment" name="m_or_p_shipment" class="form-control datetimepicker-input" data-target="#timepickerm_or_p_shipment"/>
                                      <div class="input-group-append" data-target="#timepickerm_or_p_shipment" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>MASS_PRODUCTION_SHIPMENT_FINISH:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickermass_production_shipment_finish" data-target-input="nearest">
                                    <input type="text" id="mass_production_shipment_finish" name="mass_production_shipment_finish" class="form-control datetimepicker-input" data-target="#timepickermass_production_shipment_finish"/>
                                      <div class="input-group-append" data-target="#timepickermass_production_shipment_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div> -->
                          <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>ENTRY SAMPLE START:</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerentry_example_start" data-target-input="nearest">
                                    <input type="text" id="entry_example_start" name="entry_example_start" class="form-control datetimepicker-input" data-target="#timepickerentry_example_start"/>
                                      <div class="input-group-append" data-target="#timepickerentry_example_start" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label>TO</label>
                                </div>
                                <div class="col-md-4">
                                <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerentry_example_finish" data-target-input="nearest">
                                    <input type="text" id="entry_example_finish" name="entry_example_finish" class="form-control datetimepicker-input" data-target="#timepickerentry_example_finish"/>
                                      <div class="input-group-append" data-target="#timepickerentry_example_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <br>
                            <br> -->
                          <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>ENTRY EXAMPLE START:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickerentry_example_start" data-target-input="nearest">
                                    <input type="text" id="entry_example_start" name="entry_example_start" class="form-control datetimepicker-input" data-target="#timepickerentry_example_start"/>
                                      <div class="input-group-append" data-target="#timepickerentry_example_start" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>ENTRY EXAMPLE FINISH:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickerentry_example_finish" data-target-input="nearest">
                                    <input type="text" id="entry_example_finish" name="entry_example_finish" class="form-control datetimepicker-input" data-target="#timepickerentry_example_finish"/>
                                      <div class="input-group-append" data-target="#timepickerentry_example_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div> -->
                          <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>PROCESS CAPABILITY STUDY:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickerprocess_capability_study" data-target-input="nearest">
                                    <input type="text" id="process_capability_study" name="process_capability_study" class="form-control datetimepicker-input" data-target="#timepickerprocess_capability_study"/>
                                      <div class="input-group-append" data-target="#timepickerprocess_capability_study" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                  <label>PROCESS_CAPABILITY_STUDY_COMPLETED_FINISH:</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="input-group date" data-date-Form Macroat="YYYY-MM-DD"  id="timepickerprocess_capability_study_completed_finish" data-target-input="nearest">
                                    <input type="text" id="process_capability_study_completed_finish" name="process_capability_study_completed_finish" class="form-control datetimepicker-input" data-target="#timepickerprocess_capability_study_completed_finish"/>
                                      <div class="input-group-append" data-target="#timepickerprocess_capability_study_completed_finish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div> -->
                        


                      </div>
                      </div>
                    </div>

                    
                    <div class="card card-success">
                      <div class="card-header" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" data-target="#closeattach">
                        <h4 class="card-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                            Attach document
                          </a>
                        </h4>
                      </div>
                      <div class="collapse" id="closeattach">
                      <div class="card-body" id="collapseFive" class="panel-collapse collapse">
                      <div id="form_supplier" class="form_supplier">
                        
                <div id="hide_attachment">
                <div class="form-group" id='attach1'>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="attach_doc1">Detail Of Process Change (6M+EAS) <font color='red'>*</font></label>
                      </div>
                      <div class="col-md-1" id='delete_attach1'>
                        <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach1" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
                      </div>
                      <div class="col-md-1">
                        <a class="btn btn-success" id="attach_doc1_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-6">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="attach_doc1" multiple="" name="attach_doc1">
                          <label class="custom-file-label" for="attach_doc1" id="attach_doc1_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>

          <div class="form-group" id='attach2'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc2">Supplier Inspection Standard </label>
              </div>
              <div class="col-md-1" id='delete_attach2'>
                <a class="btn btn-danger"  data-id="attachment" target="_blank" data-value="attach2" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc2_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc2" multiple="" name="attach_doc2">
                  <label class="custom-file-label" for="attach_doc2" id="attach_doc2_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" id='attach3'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc3">Control Plan/QCPC </label>
              </div>
              <div class="col-md-1" id='delete_attach3'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach3" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc3_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc3" multiple="" name="attach_doc3">
                  <label class="custom-file-label" for="attach_doc3" id="attach_doc3_label">Choose file</label>
                </div>
              </div>
            </div>
           
          </div>
         
          <div class="form-group" id='attach4'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc4">FMEA </label>
              </div>
              <div class="col-md-1" id='delete_attach4'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach4" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc4_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc4" multiple="" name="attach_doc4">
                  <label class="custom-file-label" for="attach_doc4" id="attach_doc4_label">Choose file</label>
                </div>
              </div>
            </div>
            <br>
          </div>
          
          <div class="form-group" id='attach5'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc5">QA Network </label>
              </div>
              <div class="col-md-1" id='delete_attach5'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach5" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc5_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc5" multiple="" name="attach_doc5">
                  <label class="custom-file-label" for="attach_doc5" id="attach_doc5_label">Choose file</label>
                </div>
              </div>
            </div>
            
          </div>

          <div class="form-group" id='attach6'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc6">Initial Proces Capability Study (Cp,Cpk) </label>
              </div>
              <div class="col-md-1" id='delete_attach6'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach6" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc6_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc6" multiple="" name="attach_doc6">
                  <label class="custom-file-label" for="attach_doc6" id="attach_doc6_label">Choose file</label>
                </div>
              </div>
            </div>
            <br>
          </div>
          
          <div class="form-group" id='attach7'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc7">Material Performance Test Results/MiilSheet <font color='red'>*</font></label>
              </div>
              <div class="col-md-1" id='delete_attach7'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach7" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc7_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc7" multiple="" name="attach_doc7">
                  <label class="custom-file-label" for="attach_doc7" id="attach_doc7_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" id='attach8'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc8">Procces Flow Diagram </label>
              </div>
              <div class="col-md-1" id='delete_attach8'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach8" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc8_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc8" multiple="" name="attach_doc8">
                  <label class="custom-file-label" for="attach_doc8" id="attach_doc8_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" id='attach9'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc9">Dimensional Results (Layout Inspection,n=1) </label>
              </div>
              <div class="col-md-1" id='delete_attach9'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach9" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc9_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc9" multiple="" name="attach_doc9">
                  <label class="custom-file-label" for="attach_doc9" id="attach_doc9_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach10'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc10">Part Submission Warrant (PSW) </label>
              </div>
              <div class="col-md-1" id='delete_attach10'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach10" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc10_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc10" multiple="" name="attach_doc10">
                  <label class="custom-file-label" for="attach_doc10" id="attach_doc10_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach11'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc11">ISIR + Baloon Drawing (n=3/cavity) </label>
              </div>
              <div class="col-md-1" id='delete_attach11'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach11" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc11_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc11" multiple="" name="attach_doc11">
                  <label class="custom-file-label" for="attach_doc11" id="attach_doc11_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach12'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc12">Record Of SOC Compliance With Customer Specific Requiretments </label>
              </div>
              <div class="col-md-1" id='delete_attach12'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach12" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc12_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc12" multiple="" name="attach_doc12">
                  <label class="custom-file-label" for="attach_doc12" id="attach_doc12_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach13'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc13"> Proof Of SOC Compliance(10 substance)  </label>
              </div>
              <div class="col-md-1" id='delete_attach13'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach13" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc13_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc13" multiple="" name="attach_doc13">
                  <label class="custom-file-label" for="attach_doc13" id="attach_doc13_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach14'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc14">IMDS <font color='red'>*</font></label>
              </div>
              <div class="col-md-1" id='delete_attach14'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach14" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc14_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc14" multiple="" name="attach_doc14">
                  <label class="custom-file-label" for="attach_doc14" id="attach_doc14_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach15'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc15">Packaging Specification </label>
              </div>
              <div class="col-md-1" id='delete_attach15'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach15" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc15_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc15" multiple="" name="attach_doc15">
                  <label class="custom-file-label" for="attach_doc15" id="attach_doc15_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach16'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc16">QC PLAN </label>
              </div>
              <div class="col-md-1" id='delete_attach16'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach16" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc16_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc16" multiple="" name="attach_doc16">
                  <label class="custom-file-label" for="attach_doc16" id="attach_doc16_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach17'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc17">Lot Control System </label>
              </div>
              <div class="col-md-1" id='delete_attach17'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach17" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc17_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc17" multiple="" name="attach_doc17">
                  <label class="custom-file-label" for="attach_doc17" id="attach_doc17_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach18'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc18">Supply Chain </label>
              </div>
              <div class="col-md-1" id='delete_attach18'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach18" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc18_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc18" multiple="" name="attach_doc18">
                  <label class="custom-file-label" for="attach_doc18" id="attach_doc18_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach19'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc19">Sample Part (After ISIR Ok) </label>
              </div>
              <div class="col-md-1" id='delete_attach19'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach19" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc19_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc19" multiple="" name="attach_doc19">
                  <label class="custom-file-label" for="attach_doc19" id="attach_doc19_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach20'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc20">Company Profile <font color='red'>*</font></label>
              </div>
              <div class="col-md-1" id='delete_attach20'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach20" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc20_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc20" multiple="" name="attach_doc20">
                  <label class="custom-file-label" for="attach_doc20" id="attach_doc20_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach21'>
            <div class="row">
            <div class="col-md-4">
              <label for="attach_doc21">Production Layout Factory </label>
            </div>
            <div class="col-md-1" id='delete_attach21'>
              <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach21" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
            </div>
            <div class="col-md-1">
              <a class="btn btn-success" id="attach_doc21_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
            </div>
            <div class="col-md-6">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="attach_doc21" multiple="" name="attach_doc21">
                <label class="custom-file-label" for="attach_doc21" id="attach_doc21_label">Choose file</label>
              </div>
            </div>
            </div>
           </div>
            <div class="form-group" id='attach22'>
            <div class="row">
            <div class="col-md-4">
              <label for="attach_doc22">Capactiy Review </label>
            </div>
            <div class="col-md-1" id='delete_attach22'>
              <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach22" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
            </div>
            <div class="col-md-1">
              <a class="btn btn-success" id="attach_doc22_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
            </div>
            <div class="col-md-6">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="attach_doc22" multiple="" name="attach_doc22">
                <label class="custom-file-label" for="attach_doc22" id="attach_doc22_label">Choose file</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group" id='attach23'>
          <div class="row">
            <div class="col-md-4">
              <label for="attach_doc23">Quality System Certification </label>
            </div>
            <div class="col-md-1" id='delete_attach23'>
              <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach23" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
            </div>
            <div class="col-md-1">
              <a class="btn btn-success" id="attach_doc23_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
            </div>
            <div class="col-md-6">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="attach_doc23" multiple="" name="attach_doc23">
                <label class="custom-file-label" for="attach_doc23" id="attach_doc23_label">Choose file</label>
              </div>
            </div>
          </div>
        </div>

          <div class="form-group" id='attach24'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc24">Audit Report by DIAT(Spesial Process) </label>
              </div>
              <div class="col-md-1" id='delete_attach24'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach24" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc24_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc24" multiple="" name="attach_doc24">
                  <label class="custom-file-label" for="attach_doc24" id="attach_doc24_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" id='attach25'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc25">Audit Report by Denso OGC (IF Necesary) </label>
              </div>
              <div class="col-md-1" id='delete_attach25'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach25" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc25_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc25" multiple="" name="attach_doc25">
                  <label class="custom-file-label" for="attach_doc25" id="attach_doc25_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" id='attach26'> 
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc26">Kakotora With Prevention </label>
              </div>
              <div class="col-md-1" id='delete_attach26'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach26" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc26_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc26" multiple="" name="attach_doc26">
                  <label class="custom-file-label" for="attach_doc26" id="attach_doc26_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" id='attach27'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc_27">SUPPLIER AUDIT RESULT <br> (For New Supplier Raw material/ Subcont)</label>
              </div>
              <div class="col-md-1" id='delete_attach27'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach27" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc_27_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc_27" multiple="" name="attach_doc_27">
                  <label class="custom-file-label" for="attach_doc_27" id="attach_doc_27_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach28'>
            <div class="row">
              <div class="col-md-4">
                <label for="attach_doc28">DATA LIFE TIME SHOOT TOOLING <font color='red'>*</font></label>
              </div>
              <div class="col-md-1" id='delete_attach28'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach28" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc28_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc28" multiple="" name="attach_doc28">
                  <label class="custom-file-label" for="attach_doc28" id="attach_doc28_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" id='attach29'>
            <div class="row">
              <div class="col-md-4" >
                <label for="attach_doc29">PARAMETER SETTTING COMPARE OPTIONAL)</label>
              </div>
              <div class="col-md-1" id='delete_attach29'>
                <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach29" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
              </div>
              <div class="col-md-1">
                <a class="btn btn-success" id="attach_doc29_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
              </div>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="attach_doc29" multiple="" name="attach_doc29">
                  <label class="custom-file-label" for="attach_doc29" id="attach_doc29_label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
            <div class="col-md-4" >
              <label for="remark">REMARK</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="remark" class="form-control" id="remark" >
            </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
            <div class="col-md-4" >
              <label for="stat">STATUS</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="stat" class="form-control" id="stat" readonly>
            </div>
        </div>
      </div>
</div>
</div>


                
            </div>
            <!-- /.col -->
      
          </div>
          <!-- /.row -->
               
            <!---------------------------------- / Form Macro Batas sini ---------------------------------->

                <!-- Close Card Body -->  
                </div>
                </div>
               
                  
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary" id="btnsubmit">Save And Send</button>   <!-- button save ke draft--> 
                      </div>
                      <div class="col-lg-3">
                        <button type="button" class="btn btn-success" id="btnsend" onclick="sendDraft()" hidden>Send</button>  <!-- button send-->               
                      </div>
                      <div class="col-lg-3">
                        <button type="button" class="btn btn-success" id="btnsend2" onclick="sendDraft2()" hidden>Save And Send</button><!-- button save and send--> 
                      </div>
                      <div class="col-lg-3">
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>  <!-- button close--> 
                      </div>
                    </div>
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
               <label id="iddelete2" hidden> </label>Apakah ingin delete <label id="iddelete" hidden> </label> ?      <!-- judul apa ingin delete-->             
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
               
              <form method="POST" action="<?php echo base_url('C_PCN/import'); ?>" enctype="multipart/form-data">

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

      // 	// ---------------------------------- Rule input Macro Batas sini 1---------------------------------
      // email: {
      // required: true,
      // },
      // transaction_date: {
      // required: true,
      // },
      // supplier_name: {
      // required: true,
      // },
      // prepared: {
      // required: true,
      // },
      // checked: {
      // required: true,
      // },
      // approved: {
      // required: true,
      // },
      // any_cost_impact: {
      // required: true,
      // },
      // cost_impact: {
      // required: true,
      // },
      // capacity_impact: {
      // required: true,
      // },
      // before_capacity: {
      // required: true,
      // },
      // after_capacity: {
      // required: true,
      // },
      // part_number: {
      // required: true,
      // },
      // part_name: {
      // required: true,
      // },
      // product_name: {
      // required: true,
      // },
      // object_type: {
      // required: true,
      // },
      // reason_to_change: {
      // required: true,
      // },
      // description_of_process_change: {
      // required: true,
      // },
      // current_process: {
      // required: true,
      // },
      // proposed_process: {
      // required: true,
      // },
      // characteristics_affected: {
      // required: true,
      // },
      // criteria_critical_item: {
      // required: true,
      // },
      // trial_manufacturing: {
      // required: true,
      // },
      // trial_manufacturing_completed_finish: {
      // required: true,
      // },
      // process_capability_study: {
      // required: true,
      // },
      // process_capability_study_completed_finish: {
      // required: true,
      // },
      // initial_sample_inspection_completed: {
      // required: true,
      // },
      // initial_sample_inspection_completed_finish: {
      // required: true,
      // },
      // initial_sample_submission: {
      // required: true,
      // },
      // initial_sample_submission_finish: {
      // required: true,
      // },
      // timing_denso_approval: {
      // required: true,
      // },
      // timing_denso_approval_finish: {
      // required: true,
      // },
      // m_or_p_starts: {
      // required: true,
      // },
      // mass_production_starts_finish: {
      // required: true,
      // },
      // m_or_p_shipment: {
      // required: true,
      // },
      // mass_production_shipment_finish: {
      // required: true,
      // },
      // entry_example_start: {
      // required: true,
      // },
      // entry_example_finish: {
      // required: true,
      // },
      attach_doc1: {
      required: true,
      },
      attach_doc7: {
      required: true,
      },
      attach_doc14: {
      required: true,
      },
      attach_doc20: {
      required: true,
      },
      attach_doc28: {
      required: true,
      },

        // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

      },
      messages: {
    
        // ---------------------------------- Rule input Macro Batas sini 2---------------------------------
        email: {
        required: "Please Input email",
        minlength: 3
        },
        transaction_date: {
        required: "Please Input transaction_date",
        minlength: 3
        },
        supplier_name: {
        required: "Please Input supplier_name",
        minlength: 3
        },
        prepared: {
        required: "Please Input prepared",
        minlength: 3
        },
        checked: {
        required: "Please Input checked",
        minlength: 3
        },
        approved: {
        required: "Please Input approved",
        minlength: 3
        },
        any_cost_impact: {
        required: "Please Input any_cost_impact",
        minlength: 3
        },
        cost_impact: {
        required: "Please Input cost_impact",
        minlength: 3
        },
        capacity_impact: {
        required: "Please Input capacity_impact",
        minlength: 3
        },
        before_capacity: {
        required: "Please Input before_capacity",
        minlength: 3
        },
        after_capacity: {
        required: "Please Input after_capacity",
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
        product_name: {
        required: "Please Input product_name",
        minlength: 3
        },
        object_type: {
        required: "Please Input object_type",
        minlength: 3
        },
        reason_to_change: {
        required: "Please Input reason_to_change",
        minlength: 3
        },
        description_of_process_change: {
        required: "Please Input description_of_process_change",
        minlength: 3
        },
        current_process: {
        required: "Please Input current_process",
        minlength: 3
        },
        proposed_process: {
        required: "Please Input proposed_process",
        minlength: 3
        },
        characteristics_affected: {
        required: "Please Input characteristics_affected",
        minlength: 3
        },
        criteria_critical_item: {
        required: "Please Input criteria_critical_item",
        minlength: 3
        },
        trial_manufacturing: {
        required: "Please Input trial_manufacturing",
        minlength: 3
        },
        trial_manufacturing_completed_finish: {
        required: "Please Input trial_manufacturing_completed_finish",
        minlength: 3
        },
        process_capability_study: {
        required: "Please Input process_capability_study",
        minlength: 3
        },
        process_capability_study_completed_finish: {
        required: "Please Input process_capability_study_completed_finish",
        minlength: 3
        },
        initial_sample_inspection_completed: {
        required: "Please Input initial_sample_inspection_completed",
        minlength: 3
        },
        initial_sample_inspection_completed_finish: {
        required: "Please Input initial_sample_inspection_completed_finish",
        minlength: 3
        },
        initial_sample_submission: {
        required: "Please Input initial_sample_submission",
        minlength: 3
        },
        initial_sample_submission_finish: {
        required: "Please Input initial_sample_submission_finish",
        minlength: 3
        },
        timing_denso_approval: {
        required: "Please Input timing_denso_approval",
        minlength: 3
        },
        timing_denso_approval_finish: {
        required: "Please Input timing_denso_approval_finish",
        minlength: 3
        },
        m_or_p_starts: {
        required: "Please Input m_or_p_starts",
        minlength: 3
        },
        mass_production_starts_finish: {
        required: "Please Input mass_production_starts_finish",
        minlength: 3
        },
        m_or_p_shipment: {
        required: "Please Input m_or_p_shipment",
        minlength: 3
        },
        mass_production_shipment_finish: {
        required: "Please Input mass_production_shipment_finish",
        minlength: 3
        },
        entry_example_start: {
        required: "Please Input entry_example_start",
        minlength: 3
        },
        entry_example_finish: {
        required: "Please Input entry_example_finish",
        minlength: 3
        },
        attach_doc1: {
        required: "Please Attach Document",
        minlength: 3
        },
        attach_doc7: {
        required: "Please Attach Document",
        minlength: 3
        },
        attach_doc14: {
        required: "Please Attach Document",
        minlength: 3
        },
        attach_doc20: {
        required: "Please Attach Document",
        minlength: 3
        },
        attach_doc28: {
        required: "Please Attach Document",
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

      ///@see get view modal
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
            $('#transaction_date').val(new Date(result0).toISOString().slice(0, 10)); //variable issue date

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


            // $('#btnsubmit').text('Save To Draft'); // name Save
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
              url: "<?php echo base_url('C_PCN/ajax_getbyhdrid') ?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

                // ---------------------------------- / Data val Macro  Batas sini ------------------------------
                  $('#stat').val(data.stat);
                  $('#email').val(data.email);
                  $('#transaction_date').val(data.transaction_date);
                  $('#supplier_name').select2().val(data.supplier_name).trigger('change');
                  $('#prepared').val(data.prepared);
                  $('#checked').val(data.checked);
                  $('#approved').val(data.approved);
                  $('#any_cost_impact').select2().val(data.any_cost_impact).trigger('change');
                  $('#affect_to_capacity').select2().val(data.affect_to_capacity).trigger('change');
                  $('#cost_impact').val(data.cost_impact);
                  $('#capacity_impact').val(data.capacity_impact);
                  $('#before_capacity').val(data.before_capacity);
                  $('#after_capacity').val(data.after_capacity);
                  $('#part_number').val(data.part_number);
                  $('#cavity').val(data.cavity);
                  $('#part_name').val(data.part_name);
                  $('#product_name').select2().val(data.product_name).trigger('change');
                  $('#commodity').val(data.commodity);
                  $('#object_type').val(data.object_type);
                  $('#reason_to_change').val(data.reason_to_change);
                  $('#description_of_process_change').val(data.description_of_process_change);
                  $('#current_process').val(data.current_process);
                  $('#proposed_process').val(data.proposed_process);
                  $('#characteristics_affected').val(data.characteristics_affected);
                  $('#remark').val(data.remark);

                  if(data.criteria_critical_item=='SAFETY'){
                      document.getElementById('criteria_critical_item').checked=true;
                  }else if(data.criteria_critical_item=='ENVIRONMENT'){
                    document.getElementById('criteria_critical_item2').checked=true;
                  }else if(data.criteria_critical_item=='FUNCTION'){
                    document.getElementById('criteria_critical_item3').checked=true;
                  }else if(data.criteria_critical_item=='CRITICAL'){
                    document.getElementById('criteria_critical_item4').checked=true;
                  }else if(data.criteria_critical_item=='REGULATION'){
                    document.getElementById('criteria_critical_item5').checked=true;
                  }else if(data.criteria_critical_item=='NONE'){
                    document.getElementById('criteria_critical_item6').checked=true;
                  }else {
                        document.getElementById('criteria_critical_item').checked=false;
                        document.getElementById('criteria_critical_item2').checked=false;
                        document.getElementById('criteria_critical_item3').checked=false;
                        document.getElementById('criteria_critical_item4').checked=false;
                        document.getElementById('criteria_critical_item5').checked=false;
                        document.getElementById('criteria_critical_item6').checked=false;
                  };

                  if(data.object_type=='NEW SUPPLIER(never been in denso)'){  //1.1
                      document.getElementById('supplier').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='block';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='block';
                      document.getElementById('attach8').style.display ='block';
                      document.getElementById('attach9').style.display ='block';
                      document.getElementById('attach10').style.display ='block';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='block';
                      document.getElementById('attach13').style.display ='block';
                      document.getElementById('attach14').style.display ='block';
                      document.getElementById('attach15').style.display ='block';
                      document.getElementById('attach16').style.display ='block';
                      document.getElementById('attach17').style.display ='block';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='block';
                      document.getElementById('attach21').style.display ='block';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='block';
                      document.getElementById('attach24').style.display ='block';
                      document.getElementById('attach25').style.display ='block';
                      document.getElementById('attach26').style.display ='none';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='NEW SUPPLIER(current denso supplier)'){ //1.2
                      document.getElementById('supplier2').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='block';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='block';
                      document.getElementById('attach8').style.display ='block';
                      document.getElementById('attach9').style.display ='block';
                      document.getElementById('attach10').style.display ='block';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='block';
                      document.getElementById('attach13').style.display ='block';
                      document.getElementById('attach14').style.display ='block';
                      document.getElementById('attach15').style.display ='block';
                      document.getElementById('attach16').style.display ='block';
                      document.getElementById('attach17').style.display ='block';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='block';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='ADDITIONAL SUPPLIER(current denso supplier)'){ //1.3
                      document.getElementById('supplier3').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='block';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='block';
                      document.getElementById('attach8').style.display ='block';
                      document.getElementById('attach9').style.display ='block';
                      document.getElementById('attach10').style.display ='block';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='block';
                      document.getElementById('attach13').style.display ='block';
                      document.getElementById('attach14').style.display ='block';
                      document.getElementById('attach15').style.display ='block';
                      document.getElementById('attach16').style.display ='block';
                      document.getElementById('attach17').style.display ='block';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='block';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='CHANGE SUPPLIER(current denso supplier)'){  //1.4
                      document.getElementById('supplier4').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='block';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='block';
                      document.getElementById('attach8').style.display ='block';
                      document.getElementById('attach9').style.display ='block';
                      document.getElementById('attach10').style.display ='block';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='block';
                      document.getElementById('attach13').style.display ='block';
                      document.getElementById('attach14').style.display ='block';
                      document.getElementById('attach15').style.display ='block';
                      document.getElementById('attach16').style.display ='block';
                      document.getElementById('attach17').style.display ='block';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='block';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='CHANGE PLACE PRODUCTION(same denso supplier)'){ //1.5
                      document.getElementById('supplier5').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='block';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='none';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='none';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='none';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='block';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='ADDITIONAL SUPPLIER'){ //1.6
                      document.getElementById('supplier6').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='block';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='none';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='none';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='none';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='block';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='CHANGE SUB SUPPLIER(change route)'){ //1.7
                      document.getElementById('supplier7').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='block';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='none';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='none';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='none';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='block';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='ADDITIONAL PROCESS'){  //2.1
                      document.getElementById('quality_improvement').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='none';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='none';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='none';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='none';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='CHANGE PROCESS'){  //2.2
                      document.getElementById('quality_improvement2').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='none';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='none';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='none';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='none';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='CHANGE MATERIAL SPECIFICATION'){  //3.1
                      document.getElementById('material').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='none';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='block';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='block';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='block';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='none';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='CHANGE MATERIAL MAKER'){  //3.2
                      document.getElementById('material2').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='none';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='block';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='block';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='block';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='none';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='CHANGE PLACE PRODUCTION(same material maker company)'){  //3.3
                      document.getElementById('material3').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='block';
                      document.getElementById('attach4').style.display ='block';
                      document.getElementById('attach5').style.display ='none';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='block';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='block';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='block';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='block';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='none';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='RENEWAL DIES'){ //4.1
                      document.getElementById('tooling_machine').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='none';
                      document.getElementById('attach4').style.display ='none';
                      document.getElementById('attach5').style.display ='none';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='none';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='none';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='none';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='none';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='none';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='ADDITIONAL DIES'){  //4.2
                      document.getElementById('tooling_machine2').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='none';
                      document.getElementById('attach4').style.display ='none';
                      document.getElementById('attach5').style.display ='none';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='none';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='none';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='none';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='none';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='REACTIVATION DIES'){  //4.3
                      document.getElementById('tooling_machine3').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='none';
                      document.getElementById('attach4').style.display ='none';
                      document.getElementById('attach5').style.display ='none';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='none';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='none';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='none';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='none';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='none';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='ADDITONAL MACHINE(existing machine)'){  //4.4
                      document.getElementById('tooling_machine4').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='none';
                      document.getElementById('attach4').style.display ='none';
                      document.getElementById('attach5').style.display ='none';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='none';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='none';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='none';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='none';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }else if(data.object_type=='ADDITONAL MACHINE(new machine)'){  //4.5
                      document.getElementById('tooling_machine5').checked=true;
                      document.getElementById('attach1').style.display ='block';
                      document.getElementById('attach2').style.display ='block';
                      document.getElementById('attach3').style.display ='none';
                      document.getElementById('attach4').style.display ='none';
                      document.getElementById('attach5').style.display ='none';
                      document.getElementById('attach6').style.display ='block';
                      document.getElementById('attach7').style.display ='none';
                      document.getElementById('attach8').style.display ='none';
                      document.getElementById('attach9').style.display ='none';
                      document.getElementById('attach10').style.display ='none';
                      document.getElementById('attach11').style.display ='block';
                      document.getElementById('attach12').style.display ='none';
                      document.getElementById('attach13').style.display ='none';
                      document.getElementById('attach14').style.display ='none';
                      document.getElementById('attach15').style.display ='none';
                      document.getElementById('attach16').style.display ='none';
                      document.getElementById('attach17').style.display ='none';
                      document.getElementById('attach18').style.display ='none';
                      document.getElementById('attach19').style.display ='block';
                      document.getElementById('attach20').style.display ='none';
                      document.getElementById('attach21').style.display ='none';
                      document.getElementById('attach22').style.display ='block';
                      document.getElementById('attach23').style.display ='none';
                      document.getElementById('attach24').style.display ='none';
                      document.getElementById('attach25').style.display ='none';
                      document.getElementById('attach26').style.display ='block';
                      document.getElementById('attach27').style.display ='none';
                      document.getElementById('attach28').style.display ='none';
                      document.getElementById('attach29').style.display ='none';
                  }
                  // else if(data.object_type=='YOKOTEN MACHINE SPEC'){  //4.5.1
                  //     document.getElementById('tooling_machine6').checked=true;
                  // }else if(data.object_type=='NEW MACHINE SPEC'){  //4.5.2
                  //     document.getElementById('tooling_machine7').checked=true;
                  // }
                  else{
                      document.getElementById('supplier').checked=false;
                      document.getElementById('supplier2').checked=false;
                      document.getElementById('supplier3').checked=false;
                      document.getElementById('supplier4').checked=false;
                      document.getElementById('supplier5').checked=false;
                      document.getElementById('supplier6').checked=false;
                      document.getElementById('supplier7').checked=false;
                      document.getElementById('quality_improvement').checked=false;
                      document.getElementById('quality_improvement2').checked=false;
                      document.getElementById('material').checked=false;
                      document.getElementById('material2').checked=false;
                      document.getElementById('material3').checked=false;
                      document.getElementById('tooling_machine').checked=false;
                      document.getElementById('tooling_machine2').checked=false;
                      document.getElementById('tooling_machine3').checked=false;
                      document.getElementById('tooling_machine4').checked=false;
                      document.getElementById('tooling_machine5').checked=false;
                      // document.getElementById('tooling_machine6').checked=false;
                      // document.getElementById('tooling_machine7').checked=false;
                      document.getElementById('hide_attachment').style.display ='block';
                  }
                  
                

                  $('#trial_manufacturing').val(data.trial_manufacturing);
                  $('#trial_manufacturing_completed_finish').val(data.trial_manufacturing_completed_finish);
                  $('#process_capability_study').val(data.process_capability_study);
                  $('#process_capability_study_completed_finish').val(data.process_capability_study_completed_finish);
                  $('#initial_sample_inspection_completed').val(data.initial_sample_inspection_completed);
                  $('#initial_sample_inspection_completed_finish').val(data.initial_sample_inspection_completed_finish);
                  $('#initial_sample_submission').val(data.initial_sample_submission);
                  $('#initial_sample_submission_finish').val(data.initial_sample_submission_finish);
                  $('#timing_denso_approval').val(data.timing_denso_approval);
                  $('#timing_denso_approval_finish').val(data.timing_denso_approval_finish);
                  $('#m_or_p_starts').val(data.m_or_p_starts);
                  $('#mass_production_starts_finish').val(data.mass_production_starts_finish);
                  $('#m_or_p_shipment').val(data.m_or_p_shipment);
                  $('#mass_production_shipment_finish').val(data.mass_production_shipment_finish);
                  $('#entry_example_start').val(data.entry_example_start);
                  $('#entry_example_finish').val(data.entry_example_finish);

                  document.getElementById('attach_doc1_label').innerHTML=data.attach_doc1;
                  var a = document.getElementById('attach_doc1_view');
                  if(!data.attach_doc1==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc1;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc2_label').innerHTML=data.attach_doc2;
                  var a = document.getElementById('attach_doc2_view');
                  if(!data.attach_doc2==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc2;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc3_label').innerHTML=data.attach_doc3;
                  var a = document.getElementById('attach_doc3_view');
                  if(!data.attach_doc3==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc3;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc4_label').innerHTML=data.attach_doc4;
                  var a = document.getElementById('attach_doc4_view');
                  if(!data.attach_doc4==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc4;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc5_label').innerHTML=data.attach_doc5;
                  var a = document.getElementById('attach_doc5_view');
                  if(!data.attach_doc5==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc5;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc6_label').innerHTML=data.attach_doc6;
                  var a = document.getElementById('attach_doc6_view');
                  if(!data.attach_doc6==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc6;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc7_label').innerHTML=data.attach_doc7;
                  var a = document.getElementById('attach_doc7_view');
                  if(!data.attach_doc7==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc7;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc8_label').innerHTML=data.attach_doc8;
                  var a = document.getElementById('attach_doc8_view');
                  if(!data.attach_doc8==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc8;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc9_label').innerHTML=data.attach_doc9;
                  var a = document.getElementById('attach_doc9_view');
                  if(!data.attach_doc9==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc9;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc10_label').innerHTML=data.attach_doc10;
                  var a = document.getElementById('attach_doc10_view');
                  if(!data.attach_doc10==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc10;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc11_label').innerHTML=data.attach_doc11;
                  var a = document.getElementById('attach_doc11_view');
                  if(!data.attach_doc11==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc11;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc12_label').innerHTML=data.attach_doc12;
                  var a = document.getElementById('attach_doc12_view');
                  if(!data.attach_doc12==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc12;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc13_label').innerHTML=data.attach_doc13;
                  var a = document.getElementById('attach_doc13_view');
                  if(!data.attach_doc13==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc13;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc14_label').innerHTML=data.attach_doc14;
                  var a = document.getElementById('attach_doc14_view');
                  if(!data.attach_doc14==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc14;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc15_label').innerHTML=data.attach_doc15;
                  var a = document.getElementById('attach_doc15_view');
                  if(!data.attach_doc15==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc15;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc16_label').innerHTML=data.attach_doc16;
                  var a = document.getElementById('attach_doc16_view');
                  if(!data.attach_doc16==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc16;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc17_label').innerHTML=data.attach_doc17;
                  var a = document.getElementById('attach_doc17_view');
                  if(!data.attach_doc17==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc17;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc18_label').innerHTML=data.attach_doc18;
                  var a = document.getElementById('attach_doc18_view');
                  if(!data.attach_doc18==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc18;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc19_label').innerHTML=data.attach_doc19;
                  var a = document.getElementById('attach_doc19_view');
                  if(!data.attach_doc19==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc19;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc20_label').innerHTML=data.attach_doc20;
                  var a = document.getElementById('attach_doc20_view');
                  if(!data.attach_doc20==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc20;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc21_label').innerHTML=data.attach_doc21;
                  var a = document.getElementById('attach_doc21_view');
                  if(!data.attach_doc21==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc21;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc22_label').innerHTML=data.attach_doc22;
                  var a = document.getElementById('attach_doc22_view');
                  if(!data.attach_doc22==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc22;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc23_label').innerHTML=data.attach_doc23;
                  var a = document.getElementById('attach_doc23_view');
                  if(!data.attach_doc23==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc23;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc24_label').innerHTML=data.attach_doc24;
                  var a = document.getElementById('attach_doc24_view');
                  if(!data.attach_doc24==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc24;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc25_label').innerHTML=data.attach_doc25;
                  var a = document.getElementById('attach_doc25_view');
                  if(!data.attach_doc25==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc25;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc26_label').innerHTML=data.attach_doc26;
                  var a = document.getElementById('attach_doc26_view');
                  if(!data.attach_doc26==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc26;
                  };
                  
                  document.getElementById('attach_doc_27_label').innerHTML=data.attach_doc_27;
                  var a = document.getElementById('attach_doc_27_view');
                  if(!data.attach_doc_27==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc_27;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc28_label').innerHTML=data.attach_doc28;
                  var a = document.getElementById('attach_doc28_view');
                  if(!data.attach_doc28==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc28;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('attach_doc29_label').innerHTML=data.attach_doc29;
                  var a = document.getElementById('attach_doc29_view');
                  if(!data.attach_doc29==''){
                    a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc29;
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
              $('#exampleModalLabel').text('View Data'); //name view              
              document.getElementById("btnsubmit").style.visibility = "hidden";   //fungsi hidden tombol submit
              document.getElementById("btnsend").style.visibility = "hidden";   //fungsi hidden tombol save dan send
              document.getElementById("btnsend2").style.visibility = "hidden";  //fungsi hidden tombol send
              document.getElementById("delete_attach1").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach2").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach3").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach4").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach5").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach6").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach7").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach8").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach9").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach10").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach11").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach12").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach13").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach14").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach15").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach16").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach17").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach18").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach19").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach20").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach21").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach22").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach23").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach24").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach25").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach26").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach27").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach28").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
              document.getElementById("delete_attach29").style.visibility = "hidden";  //fungsi hidden tombol delete attachment
            }else{
              $('#exampleModalLabel').text('Edit Data'); //name view 
              $('#btnsubmit').text('Update'); //name Update  
              document.getElementById("btnsend2").style.visibility = "hidden"; //fungsi hidden tombol send
              document.getElementById("btnsubmit").style.visibility = "visible";  //fungsi visible tombol submit
              document.getElementById("delete_attach1").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach2").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach3").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach4").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach5").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach6").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach7").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach8").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach9").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach10").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach11").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach12").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach13").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach14").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach15").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach16").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach17").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach18").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach19").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach20").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach21").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach22").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach23").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach24").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach25").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach26").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach27").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach28").style.visibility = "visible";  //fungsi visible tombol delete attachment
              document.getElementById("delete_attach29").style.visibility = "visible";  //fungsi visible tombol delete attachment
            }
          
          }

          


         //untuk hidden supplier data jika klik supplier maka akan muncul beberapa attach file saja
        $('input[type=radio][name=object_type]').change(function() {
          if(this.value == 'NEW SUPPLIER(never been in denso)'){      //1.1
          //   if ($('#attach_doc1').val()==''){
          //     gagal("Please input attachment");
          //   return ;
          // }
          // if ($('#attach_doc7').val()==''){
          //     gagal("Please input attachment");
          //   return ;
          // }
          // if ($('#attach_doc14').val()==''){
          //     gagal("Please input attachment");
          //   return ;
          // }  
          // if ($('#attach_doc20').val()==''){
          //     gagal("Please input attachment");
          //   return ;
          // }
            $("#attach1").css('display','block'); //detail of proces chane *
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','block'); // QA Network
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','block'); //Material Performance *
            $("#attach8").css('display','block'); //Procces Flow Diagram
            $("#attach9").css('display','block');  //Dimensional Results (Layout Inspection,n=1)
            $("#attach10").css('display','block'); //Part Submission Warrant (PSW) 
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','block');   //Record Of SOC Compliance With Customer Specific Requiretments
            $("#attach13").css('display','block'); //Proof Of SOC Compliance(10 substance)
            $("#attach14").css('display','block'); //IMDS
            $("#attach15").css('display','block'); //Packaging Specification
            $("#attach16").css('display','block'); //QC PLAN 
            $("#attach17").css('display','block'); //Lot Control System
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','block'); //Company Profile 
            $("#attach21").css('display','block'); //Production Layout Factory
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','block'); //Quality System Certification
            $("#attach24").css('display','block'); //Audit Report by DIAT(Spesial Process) 
            $("#attach25").css('display','block'); //Audit Report by Denso OGC (IF Necesary)
            $("#attach26").css('display','none');     //kakotora with     
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional
            // $("#hide_attachment").css('display','none');
          }else if(this.value =='NEW SUPPLIER(current denso supplier)'){    //1.2
            // if ($('#attach_doc1').val()==''){
            //   gagal("Please input attachment");
            // return ;
            // }
            // if ($('#attach_doc7').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            // if ($('#attach_doc14').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','block'); // QA Network
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','block'); //Material Performance *
            $("#attach8").css('display','block'); //Procces Flow Diagram
            $("#attach9").css('display','block');  //Dimensional Results (Layout Inspection,n=1)
            $("#attach10").css('display','block'); //Part Submission Warrant (PSW) 
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','block');   //Record Of SOC Compliance With Customer Specific Requiretments
            $("#attach13").css('display','block'); //Proof Of SOC Compliance(10 substance)
            $("#attach14").css('display','block'); //IMDS
            $("#attach15").css('display','block'); //Packaging Specification
            $("#attach16").css('display','block'); //QC PLAN 
            $("#attach17").css('display','block'); //Lot Control System
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none'); //Company Profile 
            $("#attach21").css('display','none'); //Production Layout Factory
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none'); //Quality System Certification
            $("#attach24").css('display','none'); //Audit Report by DIAT(Spesial Process) 
            $("#attach25").css('display','block'); //Audit Report by Denso OGC (IF Necesary)
            $("#attach26").css('display','block');     //kakotora with     
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional
            // $("#hide_attachment").css('display','none');
          }else if(this.value =='ADDITIONAL SUPPLIER(current denso supplier)'){   //1.3
            // if ($('#attach_doc1').val()==''){
            //   gagal("Please input attachment");
            // return ;
            // }
            // if ($('#attach_doc7').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            // if ($('#attach_doc14').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','block'); // QA Network
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','block'); //Material Performance
            $("#attach8").css('display','block'); //Procces Flow Diagram
            $("#attach9").css('display','block');  //Dimensional Results (Layout Inspection,n=1)
            $("#attach10").css('display','block'); //Part Submission Warrant (PSW) 
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','block');   //Record Of SOC Compliance With Customer Specific Requiretments
            $("#attach13").css('display','block'); //Proof Of SOC Compliance(10 substance)
            $("#attach14").css('display','block'); //IMDS
            $("#attach15").css('display','block'); //Packaging Specification
            $("#attach16").css('display','block'); //QC PLAN 
            $("#attach17").css('display','block'); //Lot Control System
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none'); //Company Profile 
            $("#attach21").css('display','none'); //Production Layout Factory
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none'); //Quality System Certification
            $("#attach24").css('display','none'); //Audit Report by DIAT(Spesial Process) 
            $("#attach25").css('display','block'); //Audit Report by Denso OGC (IF Necesary)
            $("#attach26").css('display','block');     //kakotora with   
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional  
            // $("#hide_attachment").css('display','none');
          }else if(this.value =='CHANGE SUPPLIER(current denso supplier)'){     //1.4
            // if ($('#attach_doc1').val()==''){
            //   gagal("Please input attachment");
            // return ;
            // }
            // if ($('#attach_doc7').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            // if ($('#attach_doc14').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','block'); // QA Network
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','block'); //Material Performance
            $("#attach8").css('display','block'); //Procces Flow Diagram
            $("#attach9").css('display','block');  //Dimensional Results (Layout Inspection,n=1)
            $("#attach10").css('display','block'); //Part Submission Warrant (PSW) 
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','block');   //Record Of SOC Compliance With Customer Specific Requiretments
            $("#attach13").css('display','block'); //Proof Of SOC Compliance(10 substance)
            $("#attach14").css('display','block'); //IMDS
            $("#attach15").css('display','block'); //Packaging Specification
            $("#attach16").css('display','block'); //QC PLAN 
            $("#attach17").css('display','block'); //Lot Control System
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none'); //Company Profile 
            $("#attach21").css('display','none'); //Production Layout Factory
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none'); //Quality System Certification
            $("#attach24").css('display','none'); //Audit Report by DIAT(Spesial Process) 
            $("#attach25").css('display','block'); //Audit Report by Denso OGC (IF Necesary)
            $("#attach26").css('display','block');     //kakotora with   
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional  
            // $("#hide_attachment").css('display','none');
          }else if(this.value =='CHANGE PLACE PRODUCTION(same denso supplier)'){    //1.5
            // if ($('#attach_doc1').val()==''){
            //   gagal("Please input attachment");
            // return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','block'); // QA Network
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','none'); //Material Performance
            $("#attach8").css('display','none'); //Procces Flow Diagram
            $("#attach9").css('display','none');  //Dimensional Results (Layout Inspection,n=1)
            $("#attach10").css('display','none'); //Part Submission Warrant (PSW) 
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none');   //Record Of SOC Compliance With Customer Specific Requiretments
            $("#attach13").css('display','none'); //Proof Of SOC Compliance(10 substance)
            $("#attach14").css('display','none'); //IMDS
            $("#attach15").css('display','none'); //Packaging Specification
            $("#attach16").css('display','none'); //QC PLAN 
            $("#attach17").css('display','none'); //Lot Control System
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none'); //Company Profile 
            $("#attach21").css('display','none'); //Production Layout Factory
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none'); //Quality System Certification
            $("#attach24").css('display','none'); //Audit Report by DIAT(Spesial Process) 
            $("#attach25").css('display','none'); //Audit Report by Denso OGC (IF Necesary)
            $("#attach26").css('display','block');     //kakotora with     
            $("#attach27").css('display','block');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional
            // $("#hide_attachment").css('display','none');
          }else if(this.value =='ADDITIONAL SUPPLIER'){           //1.6
            // if ($('#attach_doc1').val()==''){
            //   gagal("Please input attachment");
            // return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','block'); // QA Network
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','none'); //Material Performance
            $("#attach8").css('display','none'); //Procces Flow Diagram
            $("#attach9").css('display','none');  //Dimensional Results (Layout Inspection,n=1)
            $("#attach10").css('display','none'); //Part Submission Warrant (PSW) 
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none');   //Record Of SOC Compliance With Customer Specific Requiretments
            $("#attach13").css('display','none'); //Proof Of SOC Compliance(10 substance)
            $("#attach14").css('display','none'); //IMDS
            $("#attach15").css('display','none'); //Packaging Specification
            $("#attach16").css('display','none'); //QC PLAN 
            $("#attach17").css('display','none'); //Lot Control System
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none'); //Company Profile 
            $("#attach21").css('display','none'); //Production Layout Factory
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none'); //Quality System Certification
            $("#attach24").css('display','none'); //Audit Report by DIAT(Spesial Process) 
            $("#attach25").css('display','none'); //Audit Report by Denso OGC (IF Necesary)
            $("#attach26").css('display','block');     //kakotora with 
            $("#attach27").css('display','block');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional    
            // $("#hide_attachment").css('display','none');
          }else if(this.value =='CHANGE SUB SUPPLIER(change route)'){     //1.7
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','block'); // QA Network
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','none'); //Material Performance
            $("#attach8").css('display','none'); //Procces Flow Diagram
            $("#attach9").css('display','none');  //Dimensional Results (Layout Inspection,n=1)
            $("#attach10").css('display','none'); //Part Submission Warrant (PSW) 
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none');   //Record Of SOC Compliance With Customer Specific Requiretments
            $("#attach13").css('display','none'); //Proof Of SOC Compliance(10 substance)
            $("#attach14").css('display','none'); //IMDS
            $("#attach15").css('display','none'); //Packaging Specification
            $("#attach16").css('display','none'); //QC PLAN 
            $("#attach17").css('display','none'); //Lot Control System
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none'); //Company Profile 
            $("#attach21").css('display','none'); //Production Layout Factory
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none'); //Quality System Certification
            $("#attach24").css('display','none'); //Audit Report by DIAT(Spesial Process) 
            $("#attach25").css('display','none'); //Audit Report by Denso OGC (IF Necesary)
            $("#attach26").css('display','block');     //kakotora with     
            $("#attach27").css('display','block');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional
            // $("#hide_attachment").css('display','none');
          }else if(this.value == 'ADDITIONAL PROCESS'){   //2.1
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','none');  //
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','none');
            $("#attach8").css('display','none');
            $("#attach9").css('display','none');
            $("#attach10").css('display','none');
            $("#attach11").css('display','block');  //isir (n=1)
            $("#attach12").css('display','none');   //
            $("#attach13").css('display','none');
            $("#attach14").css('display','none');
            $("#attach15").css('display','none');
            $("#attach16").css('display','none');
            $("#attach17").css('display','none');
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none');
            $("#attach21").css('display','none');
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none');
            $("#attach24").css('display','none');
            $("#attach25").css('display','none');
            $("#attach26").css('display','block');     //kakotora with   
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional
            $("#hide_attachment").css('display','block');   
          }else if(this.value == 'CHANGE PROCESS'){     //2.2
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','none'); //
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','none');
            $("#attach8").css('display','none');
            $("#attach9").css('display','none');
            $("#attach10").css('display','none');
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none'); //
            $("#attach13").css('display','none');
            $("#attach14").css('display','none');
            $("#attach15").css('display','none');
            $("#attach16").css('display','none');
            $("#attach17").css('display','none');
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none');
            $("#attach21").css('display','none');
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none');
            $("#attach24").css('display','none');
            $("#attach25").css('display','none');
            $("#attach26").css('display','block');     //kakotora with   
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional
            $("#hide_attachment").css('display','block');   
          }else if(this.value =='CHANGE MATERIAL SPECIFICATION'){       //3.1
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            // if ($('#attach_doc7').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','none'); // QA Network
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','block'); //Material Performance
            $("#attach8").css('display','none'); //Procces Flow Diagram
            $("#attach9").css('display','none');  //Dimensional Results (Layout Inspection,n=1)
            $("#attach10").css('display','block'); //Part Submission Warrant (PSW) 
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none');   //Record Of SOC Compliance With Customer Specific Requiretments
            $("#attach13").css('display','block'); //Proof Of SOC Compliance(10 substance)
            $("#attach14").css('display','none'); //IMDS
            $("#attach15").css('display','none'); //Packaging Specification
            $("#attach16").css('display','none'); //QC PLAN 
            $("#attach17").css('display','none'); //Lot Control System
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none'); //Company Profile 
            $("#attach21").css('display','none'); //Production Layout Factory
            $("#attach22").css('display','none'); //capacity review
            $("#attach23").css('display','none'); //Quality System Certification
            $("#attach24").css('display','none'); //Audit Report by DIAT(Spesial Process) 
            $("#attach25").css('display','none'); //Audit Report by Denso OGC (IF Necesary)
            $("#attach26").css('display','block');     //kakotora with     
            $("#attach27").css('display','block');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional
            // $("#hide_attachment").css('display','none');
          }else if(this.value =='CHANGE MATERIAL MAKER'){       //3.2
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            // if ($('#attach_doc7').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','none'); // QA Network
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','block'); //Material Performance
            $("#attach8").css('display','none'); //Procces Flow Diagram
            $("#attach9").css('display','none');  //Dimensional Results (Layout Inspection,n=1)
            $("#attach10").css('display','block'); //Part Submission Warrant (PSW) 
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none');   //Record Of SOC Compliance With Customer Specific Requiretments
            $("#attach13").css('display','block'); //Proof Of SOC Compliance(10 substance)
            $("#attach14").css('display','none'); //IMDS
            $("#attach15").css('display','none'); //Packaging Specification
            $("#attach16").css('display','none'); //QC PLAN 
            $("#attach17").css('display','none'); //Lot Control System
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none'); //Company Profile 
            $("#attach21").css('display','none'); //Production Layout Factory
            $("#attach22").css('display','none'); //capacity review
            $("#attach23").css('display','none'); //Quality System Certification
            $("#attach24").css('display','none'); //Audit Report by DIAT(Spesial Process) 
            $("#attach25").css('display','none'); //Audit Report by Denso OGC (IF Necesary)
            $("#attach26").css('display','block');     //kakotora with    
            $("#attach27").css('display','block');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional 
            // $("#hide_attachment").css('display','none');
          }else if(this.value =='CHANGE PLACE PRODUCTION(same material maker company)'){    //3.3
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            // if ($('#attach_doc7').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','block'); //control plan
            $("#attach4").css('display','block'); // fmea
            $("#attach5").css('display','none'); // QA Network
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','block'); //Material Performance
            $("#attach8").css('display','none'); //Procces Flow Diagram
            $("#attach9").css('display','none');  //Dimensional Results (Layout Inspection,n=1)
            $("#attach10").css('display','block'); //Part Submission Warrant (PSW) 
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none');   //Record Of SOC Compliance With Customer Specific Requiretments
            $("#attach13").css('display','block'); //Proof Of SOC Compliance(10 substance)
            $("#attach14").css('display','none'); //IMDS
            $("#attach15").css('display','none'); //Packaging Specification
            $("#attach16").css('display','none'); //QC PLAN 
            $("#attach17").css('display','none'); //Lot Control System
            $("#attach18").css('display','block'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none'); //Company Profile 
            $("#attach21").css('display','none'); //Production Layout Factory
            $("#attach22").css('display','none'); //capacity review
            $("#attach23").css('display','none'); //Quality System Certification
            $("#attach24").css('display','none'); //Audit Report by DIAT(Spesial Process) 
            $("#attach25").css('display','none'); //Audit Report by Denso OGC (IF Necesary)
            $("#attach26").css('display','block');     //kakotora with     
            $("#attach27").css('display','block');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','none');     //Parameter Settting Compare Optional
            // $("#hide_attachment").css('display','none');
          }else if(this.value == 'RENEWAL DIES'){   //4.1
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }  
            // if ($('#attach_doc28').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','none'); //control plan
            $("#attach4").css('display','none'); // fmea
            $("#attach5").css('display','none'); //
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','none');
            $("#attach8").css('display','none');
            $("#attach9").css('display','none');
            $("#attach10").css('display','none');
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none'); //
            $("#attach13").css('display','none');
            $("#attach14").css('display','none');
            $("#attach15").css('display','none');
            $("#attach16").css('display','none');
            $("#attach17").css('display','none');
            $("#attach18").css('display','none'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none');
            $("#attach21").css('display','none');
            $("#attach22").css('display','none'); //capacity review
            $("#attach23").css('display','none');
            $("#attach24").css('display','none');
            $("#attach25").css('display','none');
            $("#attach26").css('display','block');     //kakotora with   
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','block');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','block');     //Parameter Settting Compare Optional  
            // $("#hide_attachment").css('display','block');     
          }else if(this.value == 'ADDITIONAL DIES'){   //4.2
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','none'); //control plan
            $("#attach4").css('display','none'); // fmea
            $("#attach5").css('display','none'); //
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','none');
            $("#attach8").css('display','none');
            $("#attach9").css('display','none');
            $("#attach10").css('display','none');
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none'); //
            $("#attach13").css('display','none');
            $("#attach14").css('display','none');
            $("#attach15").css('display','none');
            $("#attach16").css('display','none');
            $("#attach17").css('display','none');
            $("#attach18").css('display','none'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none');
            $("#attach21").css('display','none');
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none');
            $("#attach24").css('display','none');
            $("#attach25").css('display','none');
            $("#attach26").css('display','block');     //kakotora with  
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','block');     //Parameter Settting Compare Optional
            $("#hide_attachment").css('display','block');        
          }else if(this.value == 'REACTIVATION DIES'){   //4.3
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }  
            // if ($('#attach_doc28').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','none'); //control plan
            $("#attach4").css('display','none'); // fmea
            $("#attach5").css('display','none'); //
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','none');
            $("#attach8").css('display','none');
            $("#attach9").css('display','none');
            $("#attach10").css('display','none');
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none'); //
            $("#attach13").css('display','none');
            $("#attach14").css('display','none');
            $("#attach15").css('display','none');
            $("#attach16").css('display','none');
            $("#attach17").css('display','none');
            $("#attach18").css('display','none'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none');
            $("#attach21").css('display','none');
            $("#attach22").css('display','none'); //capacity review
            $("#attach23").css('display','none');
            $("#attach24").css('display','none');
            $("#attach25").css('display','none');
            $("#attach26").css('display','block');     //kakotora with   
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','block');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','block');     //Parameter Settting Compare Optional    
            $("#hide_attachment").css('display','block');   
          }else if(this.value == 'ADDITONAL MACHINE(existing machine)'){   //4.4
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','none'); //control plan
            $("#attach4").css('display','none'); // fmea
            $("#attach5").css('display','none'); //
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','none');
            $("#attach8").css('display','none');
            $("#attach9").css('display','none');
            $("#attach10").css('display','none');
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none'); //
            $("#attach13").css('display','none');
            $("#attach14").css('display','none');
            $("#attach15").css('display','none');
            $("#attach16").css('display','none');
            $("#attach17").css('display','none');
            $("#attach18").css('display','none'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none');
            $("#attach21").css('display','none');
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none');
            $("#attach24").css('display','none');
            $("#attach25").css('display','none');
            $("#attach26").css('display','block');     //kakotora with    
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','block');     //Parameter Settting Compare Optional   
            $("#hide_attachment").css('display','block');   
          }else if(this.value == 'ADDITONAL MACHINE(new machine)'){   //4.5
            // if ($('#attach_doc1').val()==''){
            //     gagal("Please input attachment");
            //   return ;
            // }
            $("#attach1").css('display','block'); //detail of proces chane
            $("#attach2").css('display','block'); //supplier inspection
            $("#attach3").css('display','none'); //control plan
            $("#attach4").css('display','none'); // fmea
            $("#attach5").css('display','none'); //
            $("#attach6").css('display','block'); //initial process
            $("#attach7").css('display','none');
            $("#attach8").css('display','none');
            $("#attach9").css('display','none');
            $("#attach10").css('display','none');
            $("#attach11").css('display','block'); //isir (n=1)
            $("#attach12").css('display','none'); //
            $("#attach13").css('display','none');
            $("#attach14").css('display','none');
            $("#attach15").css('display','none');
            $("#attach16").css('display','none');
            $("#attach17").css('display','none');
            $("#attach18").css('display','none'); //supply chain
            $("#attach19").css('display','block'); //sample part
            $("#attach20").css('display','none');
            $("#attach21").css('display','none');
            $("#attach22").css('display','block'); //capacity review
            $("#attach23").css('display','none');
            $("#attach24").css('display','none');
            $("#attach25").css('display','none');
            $("#attach26").css('display','block');     //kakotora with     
            $("#attach27").css('display','none');     //Supplier Audit Result  
            $("#attach28").css('display','none');     //Data Life Time Shoot Tooling
            $("#attach29").css('display','block');     //Parameter Settting Compare Optional  
            $("#hide_attachment").css('display','block');   
          }
          // else if(this.value == 'YOKOTEN MACHINE SPEC'){   //4.5.1
          //   $("#attach1").css('display','block'); //detail of proces chane
          //   $("#attach2").css('display','block'); //supplier inspection
          //   $("#attach3").css('display','none'); //control plan
          //   $("#attach4").css('display','none'); // fmea
          //   $("#attach5").css('display','none'); //
          //   $("#attach6").css('display','block'); //initial process
          //   $("#attach7").css('display','none');
          //   $("#attach8").css('display','none');
          //   $("#attach9").css('display','none');
          //   $("#attach10").css('display','none');
          //   $("#attach11").css('display','block'); //isir (n=1)
          //   $("#attach12").css('display','none'); //
          //   $("#attach13").css('display','none');
          //   $("#attach14").css('display','none');
          //   $("#attach15").css('display','none');
          //   $("#attach16").css('display','none');
          //   $("#attach17").css('display','none');
          //   $("#attach18").css('display','none'); //supply chain
          //   $("#attach19").css('display','block'); //sample part
          //   $("#attach20").css('display','none');
          //   $("#attach21").css('display','none');
          //   $("#attach22").css('display','block'); //capacity review
          //   $("#attach23").css('display','none');
          //   $("#attach24").css('display','none');
          //   $("#attach25").css('display','none');
          //   $("#attach26").css('display','block');     //kakotora with       
          //   $("#hide_attachment").css('display','block');   
          // }else if(this.value == 'NEW MACHINE SPEC'){   //4.5.2
          //   $("#attach1").css('display','block'); //detail of proces chane
          //   $("#attach2").css('display','block'); //supplier inspection
          //   $("#attach3").css('display','none'); //control plan
          //   $("#attach4").css('display','none'); // fmea
          //   $("#attach5").css('display','none'); // QA Network
          //   $("#attach6").css('display','block'); //initial process
          //   $("#attach7").css('display','none'); //Material Performance
          //   $("#attach8").css('display','none'); //Procces Flow Diagram
          //   $("#attach9").css('display','none');  //Dimensional Results (Layout Inspection,n=1)
          //   $("#attach10").css('display','none'); //Part Submission Warrant (PSW) 
          //   $("#attach11").css('display','block'); //isir (n=1)
          //   $("#attach12").css('display','none');   //Record Of SOC Compliance With Customer Specific Requiretments
          //   $("#attach13").css('display','none'); //Proof Of SOC Compliance(10 substance)
          //   $("#attach14").css('display','none'); //IMDS
          //   $("#attach15").css('display','none'); //Packaging Specification
          //   $("#attach16").css('display','none'); //QC PLAN 
          //   $("#attach17").css('display','none'); //Lot Control System
          //   $("#attach18").css('display','none'); //supply chain
          //   $("#attach19").css('display','block'); //sample part
          //   $("#attach20").css('display','none'); //Company Profile 
          //   $("#attach21").css('display','none'); //Production Layout Factory
          //   $("#attach22").css('display','block'); //capacity review
          //   $("#attach23").css('display','none'); //Quality System Certification
          //   $("#attach24").css('display','none'); //Audit Report by DIAT(Spesial Process) 
          //   $("#attach25").css('display','none'); //Audit Report by Denso OGC (IF Necesary)
          //   $("#attach26").css('display','block');     //kakotora with       
          //   $("#hide_attachment").css('display','block');   
          // }
          else{
            $("#supplier").removeAttr("checked"); //untuk check apakah sudah hidden
            $("#hide_attachment").css('display','block');//untuk blok attach file sudah dihidden
            }
          });
          
  }

</script>

<script type="text/javascript">

  ///@see get simpan data
     ///@note fungsi digunakan trigger simpan data
     ///@attention 
   function Simpan_data($trigger){

          // //validasi data attachment
          
          $('input[type=radio][name=object_type]').change(function() {
          // console.log(this.value);
          if(this.value == 'NEW SUPPLIER(never been in denso)'){
            if ($('#attach_doc1').val()==''){
              gagal("Please input attachment");
            return ;
            }
            if ($('#attach_doc7').val()==''){
                gagal("Please input attachment");
              return ;
            }
            if ($('#attach_doc14').val()==''){
                gagal("Please input attachment");
              return ;
            }  
            if ($('#attach_doc20').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value =='NEW SUPPLIER(current denso supplier)'){    //1.2
            if ($('#attach_doc1').val()==''){
              gagal("Please input attachment");
            return ;
            }
            if ($('#attach_doc7').val()==''){
                gagal("Please input attachment");
              return ;
            }
            if ($('#attach_doc14').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value =='ADDITIONAL SUPPLIER(current denso supplier)'){   //1.3
            if ($('#attach_doc1').val()==''){
              gagal("Please input attachment");
            return ;
            }
            if ($('#attach_doc7').val()==''){
                gagal("Please input attachment");
              return ;
            }
            if ($('#attach_doc14').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value =='CHANGE SUPPLIER(current denso supplier)'){     //1.4
            if ($('#attach_doc1').val()==''){
              gagal("Please input attachment");
            return ;
            }
            if ($('#attach_doc7').val()==''){
                gagal("Please input attachment");
              return ;
            }
            if ($('#attach_doc14').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value =='CHANGE PLACE PRODUCTION(same denso supplier)'){    //1.5
            if ($('#attach_doc1').val()==''){
              gagal("Please input attachment");
            return ;
            }
        }else if(this.value =='ADDITIONAL SUPPLIER'){           //1.6
            if ($('#attach_doc1').val()==''){
              gagal("Please input attachment");
            return ;
            }
        }else if(this.value =='CHANGE SUB SUPPLIER(change route)'){     //1.7
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value == 'ADDITIONAL PROCESS'){   //2.1
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value == 'CHANGE PROCESS'){     //2.2
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value =='CHANGE MATERIAL SPECIFICATION'){       //3.1
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }
            if ($('#attach_doc7').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value =='CHANGE MATERIAL MAKER'){       //3.2
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }
            if ($('#attach_doc7').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value =='CHANGE PLACE PRODUCTION(same material maker company)'){    //3.3
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }
            if ($('#attach_doc7').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value == 'RENEWAL DIES'){   //4.1
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }  
            if ($('#attach_doc28').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value == 'ADDITIONAL DIES'){   //4.2
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value == 'REACTIVATION DIES'){   //4.3
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }  
            if ($('#attach_doc28').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value == 'ADDITONAL MACHINE(existing machine)'){   //4.4
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else if(this.value == 'ADDITONAL MACHINE(new machine)'){   //4.5
            if ($('#attach_doc1').val()==''){
                gagal("Please input attachment");
              return ;
            }
        }else{
          gagal("Please Input Attachment");
        }
      });

      
          // if ($('#attach_doc1').val()==''){
          //       gagal("Please input attachment");
          //     return ;
          //   }
          //   if ($('#attach_doc7').val()==''){
          //       gagal("Please input attachment");
          //     return ;
          //   }
          //   if ($('#attach_doc14').val()==''){
          //       gagal("Please input attachment");
          //     return ;
          //   }  
          //   if ($('#attach_doc20').val()==''){
          //       gagal("Please input attachment");
          //     return ;
          //   }  
          //   if ($('#attach_doc28').val()==''){
          //       gagal("Please input attachment");
          //     return ;
          //   }

          // Form data
          var fdata = new FormData();
          
          //validasi attacment mandatory
           
          

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
            vurl = "<?php echo base_url('C_PCN/ajax_add') ?>";//link simpan data
          } else {           
            vurl = "<?php echo base_url('C_PCN/ajax_update') ?>";//link update data
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
                  //  location.reload();
                    tabel.draw();
                  //location add
                   if(!vurl=="Add"){
                     $("#modal-default").modal('hide');
                   }
                 
                   
                  //  $("#modal-default").modal('hide');
                   var fdata3 = new FormData();
                   
                  fdata3.append('hdrid', data.hdrid);

                  $.ajax({
                  url: "<?php echo base_url('C_Mail/ajax_mail_approve') ?>",
                  method: "post",
                  processData: false,
                  contentType: false,
                  data: fdata3,
                  success: function (data) {
                          tabel.draw();
                         location.reload();
                      },
                      error: function (e) {
                          //  gagal(e);
                        berhasil(data.status);
                        tabel.draw();
                        // location.reload();

                      }
                  });
                 
              },
              // function error
              error: function (e) {
                  // gagal(e);
                  // location.reload();
                  //error
                    // Pesan berhasil
                  // berhasil(data.status);
                  // // Reset Form
                  // $('#quickForm')[0].reset();               
                  // // location.reload();
                  //   tabel.draw();
                  // //location add
                  // if(!vurl=="Add"){
                  //   $("#modal-default").modal('hide');
                  // }
                  // $("#modal-default").modal('hide');
                  var fdata3 = new FormData();
                   
                   fdata3.append('hdrid', $('#hdrid').val());
 
                   $.ajax({
                   url: "<?php echo base_url('C_Mail/ajax_mail_approve') ?>",
                   method: "post",
                   processData: false,
                   contentType: false,
                   data: fdata3,
                   success: function (data) {
                           tabel.draw();
                         //  location.reload();
                       },
                       error: function (e) {
                           //  gagal(e);
                         berhasil(data.status);
                         tabel.draw();
                         // location.reload();
 
                       }
                   });
              }
          });

  }

   ///@see get send email
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
vurl = "<?php echo base_url('C_Email/ajax_send_mail_v1') ?>"; //link send email

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

///@see get send draft
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
vurl = "<?php echo base_url('C_PCN/ajax_sendDraft') ?>";//link senddraft

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
      vurl2 = "<?php echo base_url('C_Email/ajax_send_mail_v2') ?>";//link send mail v2

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



///@see get send draft
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
    vurl = "<?php echo base_url('C_PCN/ajax_sendDraft2') ?>"; //link senddraft2

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
        vurl2 = "<?php echo base_url('C_Email/ajax_send_mail_v2') ?>";//link send mail v2
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



///@see get delete data
///@note fungsi digunakan untuk delete data
function Delete_data(){

// Form data
var fdata = new FormData();

// Delete by Hdrid
fdata.append('hdrid',$('#iddelete').text());
// Url Post delete
vurl = "<?php echo base_url('C_PCN/ajax_delete') ?>";//link untuk delete

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
//   vurl = "<?php echo base_url('C_Email/Send_mail') ?>";//link untuk send mail
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
     
    //  HDRID selected  konfirmasiview
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
            scrollY : '450px',
            scrollX : true,
            scrollCollapse: true,
            paging: true,
            fixedColumns: {
                left: 2
            },
            "processing": true,//processing true jika data masuk table
            // "responsive":true,//respon jika data masuk akan muncul pop up data
            
            "serverSide": true, //untuk data masuk server 
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)

            <?php if (!empty($hak_akses)) {
              if ($hak_akses->allow_export == 'on') { ?>
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
                                                            "url": "<?= base_url('C_PCN/view_data_where'); ?>", // URL file untuk proses select datanya
                                                            "type": "POST", //post select datanya
                                                            "data": function(data){     
                                                              data.searchByFromdate = $('#search_fromdate').val(); //value from date
                                                              data.searchByTodate = $('#search_todate').val(); //value to date
                                                              data.Number = "<?= $Number ?>";

                                                            }

                                                        },
                                  <?php }
            } ?>
            "deferRender": true,
            "aLengthMenu": [[5, 10,100,1000,10000,100000,1000000,1000000000],[ 5, 10, 100,1000,10000,100000,1000000,"All"]], // Combobox Limit
            "columns": [
               {"data": 'hdrid',"sortable": false, //1
                    render: function (data, type, row, meta) {
                        // return meta.row + meta.settings._iDisplayStart + 1;
                        // return '<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div> <div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div> <div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                        mnu='';
                        mnu=mnu+'<div class="btn btn-success btn-sm konfirmasiView mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div>';
                      <?php if (!empty($hak_akses)) {
                        if ($hak_akses->allow_edit == 'on') { ?>
                                                                    mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                                            <?php }
                      } ?>
                      <?php if (!empty($hak_akses)) {
                        if ($hak_akses->allow_delete == 'on') { ?>
                                                                    mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                                            <?php }
                      } ?>
                        mnu = mnu + '<a class="btn btn-secondary btn-sm mr-2"  href="<?php echo base_url('C_Print_approvedDummy/print_report2_approved?var1=' . "'+ data +' &var2=1&var2=1") ?>"  target="_blank"> <i class="fas fa-print mr-1"></i>A4</a>'
                        
                        return mnu;

                    }  
                },
                
                // ---------------------------------- Datatables Macro Batas sini ---------------------------------
                {"data":"hdrid"},
                {"data":"stat"},
                {"data":"email"},
                {"data":"transaction_date"},
                {"data":"supplier_name"},
                {"data":"prepared"},
                {"data":"checked"},
                {"data":"approved"},
                {"data":"any_cost_impact"},
                {"data":"cost_impact"},
                {"data":"capacity_impact"},
                {"data":"before_capacity"},
                {"data":"after_capacity"},
                {"data":"part_number"},
                {"data":"cavity"},
                {"data":"part_name"},
                {"data":"product_name"},
                {"data":"object_type"},
                {"data":"commodity"},
                {"data":"reason_to_change"},
                {"data":"description_of_process_change"},
                {"data":"current_process"},
                {"data":"proposed_process"},
                {"data":"characteristics_affected"},
                {"data":"criteria_critical_item"},
                {"data":"trial_manufacturing"},
                {"data":"process_capability_study"},
                {"data":"initial_sample_inspection_completed"},
                {"data":"initial_sample_submission"},
                {"data":"timing_denso_approval"},
                {"data":"m_or_p_starts"},
                {"data":"m_or_p_shipment"},
                {"data":"entry_example_start"},
                // ---------------------------------- / Datatables Macro Batas sini --------------------------------

            ],


        });

        // Search button
        $('#search').click(function(){

          
            if($('#search_fromdate').val() != '' && $('#search_todate').val() !='')// fungsi
            {
                tabel.draw();
            }
            else
            {
              gagal("Both Date is Required"); //pesan ketika tanggal pencarian tidak di isi
            }

        });


    });
    
</script>


<script type="text/javascript">

     ///@see get vreadonly
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

    ///@see handleSelectChange_supplier_name()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_supplier(event) {
    var data = $('#supplier_name').select2('data')[0].text;
  }
  function handleSelectChange_product(event) {
    var data = $('#product_name').select2('data')[0].text;
  }
  function handleSelectChange_part_number(event) {
    var data = $('#product_name').select2('data')[0].text;
  }

      ///@see handleSelectChange_any_cost_impact()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
//   function handleSelectChange_any_cost_impact(event) {

// var data = $('#any_cost_impact').select2('data')[0].text;
 
// if (data=='-Select-'){
//    $('#cost_impact').val('');   
//  }else{
//    var res = data.split("-");
//    $('#cost_impact').val(res[1]);
//  };

// }

function handleSelectChange_any_cost_impact(event) {

var data = $('#any_cost_impact').select2('data')[0].text;

  if (data =='-Select-'){
    $('#any_cost_impact').val('');
  }else if(
    data =='YES'){                                          
    $('#any_cost_impact').val('YES');    // jika yokotenkai pilih yes
    document.getElementById('any_cost_impact_show').style.display = "block";      // maka kolom name line yokotenkai akan ditampilkan
  }    
  else{
    //var res = data.split("-";
    $('#any_cost_impact').val('NO');     // jika yokotenkai pilih no             
    document.getElementById('any_cost_impact_show').style.display = "none";   // maka kolom name line yokotenkai di sembunyikan
    // $('#please_mention').val('');    // jika yokotenkai pilih yes
  };
}

function handleSelectChange_affect_to_capacity(event) {

var data = $('#affect_to_capacity').select2('data')[0].text;

  if (data =='-Select-'){
    $('#affect_to_capacity').val('');
  }else if(
    data =='YES'){                                          
    $('#affect_to_capacity').val('YES');    // jika yokotenkai pilih yes
    document.getElementById('affect_to_capacity_show').style.display = "block";      // maka kolom name line yokotenkai akan ditampilkan
  }    
  else{
    //var res = data.split("-";
    $('#affect_to_capacity').val('NO');             
    document.getElementById('affect_to_capacity_show').style.display = "none";   // maka kolom name line yokotenkai di sembunyikan
    // ('#before_capacity').val('');
    // ('#after_capacity').val('');
  };   
}

    ///@see handleSelectChange_capacity_impact()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
// function handleSelectChange_capacity_impact(event) {
 
//  var data = $('#capacity_impact').select2('data')[0].text;
 
//  if (data=='-Select-'){
//    $('#before_capacity').val('');   
//    $('#after_capacity').val('');   
//  }else{
//    var res = data.split("-");
//    $('#before_capacity').val(res[1]);
//    $('#after_capacity').val(res[2]);
//  };

// }

    ///@see handleSelectChange_description_of_process_change()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_description_of_process_change(event) {
 
 var data = $('#description_of_process_change').select2('data')[0].text;
 
 if (data=='-Select-'){
   $('#current_process').val('');   
   $('#proposed_process').val('');   
   $('#characteristics_affected').val(''); 
   $('#trial_manufacturing').val('');  
   $('#trial_manufacturing_completed_finish').val('');  
   $('#process_capability_study').val('');  
   $('#process_capability_study_completed_finish').val('');  
   $('#initial_sample_inspection_completed').val('');  
   $('#initial_sample_inspection_completed_finish').val('');  
   $('#initial_sample_submission').val('');  
   $('#initial_sample_submission_finish').val('');  
   $('#timing_denso_approval').val(''); 
   $('#timing_denso_approval_finish').val(''); 
   $('#m_or_p_starts').val(''); 
   $('#mass_production_starts_finish').val(''); 
   $('#m_or_p_shipment').val(''); 
   $('#mass_production_shipment_finish').val(''); 
   $('#entry_example_start').val(''); 
   $('#entry_example_finish').val(''); 


 }else{
   var res = data.split("-");
   $('#current_process').val(res[1]);
   $('#proposed_process').val(res[2]);
   $('#characteristics_affected').val(res[3]);
   $('#trial_manufacturing').val(res[4]);
   $('#trial_manufacturing_completed_finish').val(res[5]);
   $('#process_capability_study').val(res[6]);
   $('#process_capability_study_completed_finish').val(res[7]);
   $('#initial_sample_inspection_completed').val(res[8]);
   $('#initial_sample_inspection_completed_finish').val(res[9]);
   $('#initial_sample_submission').val(res[10]);
   $('#initial_sample_submission_finish').val(res[11]);
   $('#timing_denso_approval').val(res[12]);
   $('#timing_denso_approval_finish').val(res[13]);
   $('#m_or_p_starts').val(res[14]);
   $('#mass_production_starts_finish').val(res[15]);
   $('#m_or_p_shipment').val(res[16]);
   $('#mass_production_shipment_finish').val(res[17]);
   $('#entry_example_start').val(res[18]);
   $('#entry_example_finish').val(res[19]);
   
 };

}

      ///@see handleSelectChange_email()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_email(event) {

var data = $('#email').select2('data')[0].text;
 
if (data=='-Select-'){
   $('#stat').val('');   
 }else{
   var res = data.split("-");
   $('#stat').val(res[1]);
 };

}


   ///@see handleSelectChange_group_product_id()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_group_product_id(event) {

    var data = $('#group_product_id').select2('data')[0].text;
    
    if (data=='-Select-'){
      $('#group_product_name').val('');   
    }else{
      var res = data.split("-");
      $('#group_product_name').val(res[1]);
    };

  }

   ///@see handleSelectChange_product_id()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_product_id(event) {

    var data = $('#product_id').select2('data')[0].text;

    if (data=='-Select-'){
      $('#product_name').val('');   
    }else{
      var res = data.split("-");
      $('#product_name').val(res[1]);
      // $('#report_no').val(res[2]);
    };

  }

     ///@see handleSelectChange_customer_id()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_customer_id(event) {

    var data = $('#customer_id').select2('data')[0].text;

    if (data=='-Select-'){
      $('#customer_name').val('');   
    }else{
      var res = data.split("-");
      $('#customer_name').val(res[1]);
    };

  }

     ///@see handleSelectChange_source_information_id()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_source_information_id(event) {

    var data = $('#source_information_id').select2('data')[0].text;

    if (data=='-Select-'){
      $('#source_information_name').val('');   
    }else{
      var res = data.split("-");
      $('#source_information_name').val(res[1]);
    };

  }


     ///@see handleSelectChange_nik()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_nik(event) {

  var data = $('#nik').select2('data')[0].text;

  if (data=='-Select-'){
    $('#name').val('');   
    $('#section1').val('');    
    $('#email1').val('');    
  }else{
    var res = data.split("-");
    $('#name').val(res[1]);
    $('#section1').val(res[2]);
    $('#email1').val(res[3]);
  };

}

   ///@see handleSelectChange_nik2()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_nik2(event) {

  var data = $('#nik2').select2('data')[0].text;

  if (data=='-Select-'){
    $('#name2').val('');   
    $('#section2').val('');   
    $('#email2').val('');   
  }else{
    var res = data.split("-");
    $('#name2').val(res[1]);
    $('#section2').val(res[2]);
    $('#email2').val(res[3]);
  };

}

   ///@see handleSelectChange_rank_problem()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_rank_problem(event) {

  var data = $('#nik2').select2('data')[0].text;



}

   ///@see handleSelectChange_temporary_action()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_temporary_action(event) {

  var data = $('#temporary_action').select2('data')[0].text;

}

///@see delete_attachment()
  ///@note fungsi digunakan mengirim data ke email
  ///@attention 
  const links = document.getElementsByClassName("btn btn-danger");
  for (let i=0; i < links.length; i++){
    const link = links[i];
    link.addEventListener("click",function(event){
      event.preventDefault();
      const value= this.getAttribute("data-value");
      delete_attachment(value);
    });
  };
  function delete_attachment(value){
    // Url Post delete
    vurl = "<?php echo base_url('C_PCN/ajax_delete_attachment') ?>";
    // Form data
    var fdata = new FormData();
    fdata.append('hdrid', $('#hdrid').val());
    if (value=='attach1') {
      fdata.append('attachment', 1 );
      $("#attach_doc1").val('');
      $("#attach_doc1_label").empty('Choose file');
    } else if (value=='attach2'){
      fdata.append('attachment', 2 );
      $("#attach_doc2").val('');
      $("#attach_doc2_label").empty('Choose file');
    }else if (value=='attach3'){
      fdata.append('attachment', 3 );
      $("#attach_doc3").val('');
      $("#attach_doc3_label").empty('Choose file');
    }else if (value=='attach4'){
      fdata.append('attachment', 4 );
      $("#attach_doc4").val('');
      $("#attach_doc4_label").empty('Choose file');
    }else if (value=='attach5'){
      fdata.append('attachment', 5 );
      $("#attach_doc5").val('');
      $("#attach_doc5_label").empty('Choose file');
    }else if (value=='attach6'){
      fdata.append('attachment', 6);
      $("#attach_doc6").val('');
      $("#attach_doc6_label").empty('Choose file');
    }else if (value=='attach7'){
      fdata.append('attachment', 7);
      $("#attach_doc7").val('');
      $("#attach_doc7_label").empty('Choose file');
    }else if (value=='attach8'){
      fdata.append('attachment', 8);
      $("#attach_doc8").val('');
      $("#attach_doc8_label").empty('Choose file');
    }else if (value=='attach9'){
      fdata.append('attachment', 9);
      $("#attach_doc9").val('');
      $("#attach_doc9_label").empty('Choose file');
    }else if (value=='attach10'){
      fdata.append('attachment', 10);
      $("#attach_doc10").val('');
      $("#attach_doc10_label").empty('Choose file');
    }else if (value=='attach11'){
      fdata.append('attachment', 11);
      $("#attach_doc11").val('');
      $("#attach_doc11_label").empty('Choose file');
    }else if (value=='attach12'){
      fdata.append('attachment', 12);
      $("#attach_doc12").val('');
      $("#attach_doc12_label").empty('Choose file');
    }else if (value=='attach13'){
      fdata.append('attachment', 13);
      $("#attach_doc13").val('');
      $("#attach_doc13_label").empty('Choose file');
    }else if (value=='attach14'){
      fdata.append('attachment', 14);
      $("#attach_doc14").val('');
      $("#attach_doc14_label").empty('Choose file');
    }else if (value=='attach15'){
      fdata.append('attachment', 15);
      $("#attach_doc15").val('');
      $("#attach_doc15_label").empty('Choose file');
    }else if (value=='attach16'){
      fdata.append('attachment', 16);
      $("#attach_doc16").val('');
      $("#attach_doc16_label").empty('Choose file');
    }else if (value=='attach17'){
      fdata.append('attachment', 17);
      $("#attach_doc17").val('');
      $("#attach_doc17_label").empty('Choose file');
    }else if (value=='attach18'){
      fdata.append('attachment', 18);
      $("#attach_doc18").val('');
      $("#attach_doc18_label").empty('Choose file');
    }else if (value=='attach19'){
      fdata.append('attachment', 19);
      $("#attach_doc19").val('');
      $("#attach_doc19_label").empty('Choose file');
    }else if (value=='attach20'){
      fdata.append('attachment', 20);
      $("#attach_doc20").val('');
      $("#attach_doc20_label").empty('Choose file');
    }else if (value=='attach21'){
      fdata.append('attachment', 21);
      $("#attach_doc21").val('');
      $("#attach_doc21_label").empty('Choose file');
    }else if (value=='attach22'){
      fdata.append('attachment', 22);
      $("#attach_doc22").val('');
      $("#attach_doc22_label").empty('Choose file');
    }else if (value=='attach23'){
      fdata.append('attachment', 23);
      $("#attach_doc23").val('');
      $("#attach_doc23_label").empty('Choose file');
    }else if (value=='attach24'){
      fdata.append('attachment', 24);
      $("#attach_doc24").val('');
      $("#attach_doc24_label").empty('Choose file');
    }else if (value=='attach25'){
      fdata.append('attachment', 25);
      $("#attach_doc25").val('');
      $("#attach_doc25_label").empty('Choose file');
    }else if (value=='attach26'){
      fdata.append('attachment', 26);
      $("#attach_doc26").val('');
      $("#attach_doc26_label").empty('Choose file');
    }else if (value=='attach27'){
      fdata.append('attachment', 27);
      $("#attach_doc27").val('');
      $("#attach_doc27_label").empty('Choose file');
    }else if (value=='attach28'){
      fdata.append('attachment', 28);
      $("#attach_doc28").val('');
      $("#attach_doc28_label").empty('Choose file');
    }else if (value=='attach29'){
      fdata.append('attachment', 29);
      $("#attach_doc29").val('');
      $("#attach_doc29_label").empty('Choose file');
    }
      // Post data
        //untuk aja data sudah bisa dipost
        $.ajax({
            url: vurl, //url
            method: "post",//jenis method pst
            processData: false, //false process
            contentType: false, //false content
            data: fdata,
            success: function (data) {
              // Hide modal delete
              // berhasil(data.status);
              // $('#modal-default').modal('hide').draw();
      },
      error: function (e) {
          //Pesan Gagal
          //gagal(e);             
      }
    });
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


<script>

// function hideattachmentOptions () {
//   var radio = document.getElementById('radio');
//   var pilihan2 =  radio.querySelector('[value="#supplier2"]');
//   var pilihan3 =  radio.querySelector('[value="#supplier3"]');

//   if (pilihan2=='checked'){
//     // $('#supplier2').val('checked');
//     document.getElementById('#21').style.display = "display"
//   }else{
//     document.getElementById('#21').style.display = "none"
//   }   

//   document.getElementById('supplier2').addEventListener('change', hideattachmentOptions);
// }

</script>











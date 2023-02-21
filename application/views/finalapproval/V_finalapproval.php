
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid"><!-- untuk container-->
        <div class="row mb-2"><!-- untuk row aplikasi-->
          <div class="col-sm-6"><!--untuk ukuran panjang container-->
            <h1 class="m-0 text-dark">Final Approval</h1><!-- untuk menampilkan judul-->
          </div><!-- /.col -->
          <div class="col-sm-6"><!--untuk ukuran panjang container-->
            <ol class="breadcrumb float-sm-right">><!-- untuk tampilan dashboard aplikasi-->
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


        <!-- ##################################### Batas Row 1 #####################################  -->

          <div class="col-12"> <!-- .col -->

            <div class="card"> <!-- .card -->

              <!-- .card-header -->
              <div class="card-header"> 
                <!-- untuk bagian kepala aplikasi -->               
                <div class="row"><!-- untuk row aplikasi-->
                   <div class="col-md-12"><!--untuk ukuran panjang container-->
                    <div class="card">       <!--untuk class bagian kepala aplikasi-->       
                      <div class="card-header">    <!--untuk jenis bagian kepala aplikasi-->
                      <div id="accordion"> <!--untuk menampilkan dan menyembunyikan element HTML-->
                          <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                          <div class="card card-primary"> <!--untuk primary kepala aplikasi-->

                            <div class="card-header"><!--untuk jenis bagian kepala aplikasi-->

                              <h4 class="card-title"><!--untuk judul bagian kepala aplikasi-->
                               
                                <?php if ($this->session->userdata('DepartmentAdd')||$this->session->userdata('rolename')=='Administrator Quality'||$this->session->userdata('rolename')=='User Procurement') { ?>  <!--untuk membuat rule hanya user bisa add data-->

                                  <a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal('1','Add')" href="#"> <!--fungsi add data-->
                                    <i class="fa fa-plus"></i> Add Data <!--judul add data-->
                                  </a>

                                <?php } ?>

                                <?php if ($this->session->userdata('DepartmentAdd')||$this->session->userdata('rolename')=='Administrator Quality'||$this->session->userdata('rolename')=='User Procurement') { ?><!--untuk membuat rule hanya user bisa add data-->

                                  <a data-toggle="modal" data-target="#modal-import"  href="#"> <!--fungsi add data-->
                                    <i class="fa fa-upload"></i> Import Data<!--judul add data-->
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
                                  <div class="form-group">             <!--untuk fungsi form-->                    

                                    <label>Date From:</label>  <!--judul date form-->
                                     
                                      <div class="input-group date" data-date-format="YYYY-MM-DD"  id="startdate" data-target-input="nearest"> <!--untuk menentukan tanggal pada aplikasi-->
                                          <input type="text" id="search_fromdate" class="form-control datetimepicker-input" data-target="#startdate"/> <!--untuk menentukan mulai tanggal berapa -->
                                          <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker"> <!--untuk menginput tanggal mulai-->
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>  <!--fungsi tanggal-->
                                          </div>
                                      </div>

                                  </div>

                                  <!-- Date To-->
                                  <div class="form-group">
                                    <label>Date To:</label>
                                      <div class="input-group date" data-date-format="YYYY-MM-DD" id="enddate" data-target-input="nearest"> <!--untuk menentukan tanggal pada aplikasi-->
                                          <input type="text" id="search_todate" class="form-control datetimepicker-input" data-target="#enddate"/><!--untuk menentukan sampai tanggal berapa -->
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

                <table id="example1" class="table table-bordered display nowrap table-striped"> <!--jenis table-->

                  <thead>

                  <tr>

                    <!-- Th Macro Batas Sini -->
                    <th>ACTION</th>
                    <th>TRANSACTION ID</th>
                    <th>PCN NUMBER</th>
                    <th>SUPPLIER NAME</th>
                    <th>SUBMITALL SIGN</th>
                    <th>PART NUMBER</th>
                    <th>PART NAME</th>
                    <th>PRODUCT NAME</th>
                    <th>CRITERIA CRITICAL ITEM</th>
                    <th>CHANGE AFFECTED</th>
                    <th>CHANGE AFFECTED 2</th>
                    <th>CHANGE AFFECTED 3</th>
                    <th>PURCH SEC APPVL SIGN</th>
                    <th>PURCH SEC COMMENT COST IMPACT CAPACITY</th>
                    <th>REASON CHANGE OF PROCESS</th>
                    <th>CURRENT PROCESS</th>
                    <th>PROPOSED PROCESS</th>
                    <th>SCHEDULE ITEM ACTIVITY</th>
                    <th>REQUIREMENT DOCUMENT</th>
                    <th>CONTROL PLAN</th>
                    <th>SUPPLIER INSPECTION STANDARD</th>
                    <th>FMEA</th>
                    <th>QA NETWORK</th>
                    <th>ISIR DATA RESULT</th>
                    <th>PERFOMANCE DATA RESULT</th>
                    <th>ETC</th>
                    <th>OTHER REQUIREMENT COLUMN</th>
                    <th>DIGITAL FINAL APPROVAL PCN</th>









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
     <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!--fungsi add data-->
        <div class="modal-dialog modal-lg" role="document" > <!--untuk tampilan add data aplikasi-->
            <div class="modal-content">            <!--content add data-->
              <div class="modal-header">  <!--untuk header add data-->
                  <h4 class="modal-title" id="exampleModalLabel">ADD DATA</h5> <!--judul add data-->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!--untuk fungsi tombol close-->
                  <span aria-hidden="true">&times;</span> <!-- jika data ditambah maka data akan muncul--> 
                  </button>
              </div>

              <!-- form -->
              <form role="form" id="quickForm">

                <div class="card-body">

                <!---------------------------------- Form Macro Batas sini ---------------------------------->
                <div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="hdrid">TRANSACTION ID</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="hdrid" class="form-control" id="hdrid" placeholder="auto generate" readonly>
      </div>
   </div>
</div>
<div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="pcn_number">PCN NUMBER</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="pcn_number" class="form-control" id="pcn_number" >
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
            echo "<option value='$value'>$value</option>";
          }
        ?>
      </select>
    </div>
  </div>
</div>
<div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="submitall_sign">SUBMITALL SIGN</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="submitall_sign" class="form-control" id="submitall_sign" >
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
         <label for="product_name">PRODUCT NAME</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="product_name" class="form-control" id="product_name" >
      </div>
   </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label>CRITERIA CRITICAL ITEM</label>
    </div>
    <div class="col-md-8">
      <select class="form-control select2" id="criteria_critical_item" name="criteria_critical_item" onchange="handleSelectChange_criteria_critical_item(event)" style="width: 100%;">
        <option value='' selected="selected">-Select-</option>
        <?php
          foreach ($criteria_critical_item as $value) {
            echo "<option value='$value'>$value</option>";
          }
        ?>
      </select>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label>CHANGE AFFECTED</label>
    </div>
    <div class="col-md-8">
      <select class="form-control select2" id="change_affected" name="change_affected" onchange="handleSelectChange_change_affected(event)" style="width: 100%;">
        <option value='' selected="selected">-Select-</option>
        <?php
          foreach ($change_affected as $value) {
            echo "<option value='$value'>$value</option>";
          }
        ?>
      </select>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label>CHANGE AFFECTED 2</label>
    </div>
    <div class="col-md-8">
      <select class="form-control select2" id="change_affected_2" name="change_affected_2" onchange="handleSelectChange_change_affected_2(event)" style="width: 100%;">
        <option value='' selected="selected">-Select-</option>
        <?php
          foreach ($change_affected_2 as $value) {
            echo "<option value='$value'>$value</option>";
          }
        ?>
      </select>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label>CHANGE AFFECTED 3</label>
    </div>
    <div class="col-md-8">
      <select class="form-control select2" id="change_affected_3" name="change_affected_3" onchange="handleSelectChange_change_affected_3(event)" style="width: 100%;">
        <option value='' selected="selected">-Select-</option>
        <?php
          foreach ($change_affected_3 as $value) {
          echo "<option value='$value'>$value</option>";
          }
        ?>
      </select>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="purch_sec_appvl_sign">PURCH SEC APPVL SIGN</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="purch_sec_appvl_sign_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="purch_sec_appvl_sign" multiple="" name="purch_sec_appvl_sign">
         <label class="custom-file-label" for="purch_sec_appvl_sign" id="purch_sec_appvl_sign_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="purch_sec_comment_cost_impact_capacity">PURCH SEC COMMENT COST IMPACT CAPACITY</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="purch_sec_comment_cost_impact_capacity" class="form-control" id="purch_sec_comment_cost_impact_capacity" >
      </div>
   </div>
</div>
<div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="reason_change_of_process">REASON CHANGE OF PROCESS</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="reason_change_of_process" class="form-control" id="reason_change_of_process" >
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
        <label>SCHEDULE ITEM ACTIVITY:</label>
      </div>
      <div class="col-md-4">
        <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerschedule_item_activity" data-target-input="nearest">
          <input type="text" id="schedule_item_activity" name="schedule_item_activity" class="form-control datetimepicker-input" data-target="#timepickerschedule_item_activity"/>
            <div class="input-group-append" data-target="#timepickerschedule_item_activity" data-toggle="datetimepicker">
               <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
      </div>
   </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="requirement_document">REQUIREMENT DOCUMENT</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="requirement_document_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="requirement_document" multiple="" name="requirement_document">
         <label class="custom-file-label" for="requirement_document" id="requirement_document_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="control_plan">CONTROL PLAN</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="control_plan_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="control_plan" multiple="" name="control_plan">
         <label class="custom-file-label" for="control_plan" id="control_plan_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="supplier_inspection_standard">SUPPLIER INSPECTION STANDARD</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="supplier_inspection_standard_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="supplier_inspection_standard" multiple="" name="supplier_inspection_standard">
         <label class="custom-file-label" for="supplier_inspection_standard" id="supplier_inspection_standard_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="fmea">FMEA</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="fmea_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="fmea" multiple="" name="fmea">
         <label class="custom-file-label" for="fmea" id="fmea_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="qa_network">QA NETWORK</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="qa_network_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="qa_network" multiple="" name="qa_network">
         <label class="custom-file-label" for="qa_network" id="qa_network_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="isir_data_result">ISIR DATA RESULT</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="isir_data_result_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="isir_data_result" multiple="" name="isir_data_result">
         <label class="custom-file-label" for="isir_data_result" id="isir_data_result_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="perfomance_data_result">PERFOMANCE DATA RESULT</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="perfomance_data_result_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="perfomance_data_result" multiple="" name="perfomance_data_result">
         <label class="custom-file-label" for="perfomance_data_result" id="perfomance_data_result_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="etc">ETC</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="etc_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="etc" multiple="" name="etc">
         <label class="custom-file-label" for="etc" id="etc_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="other_requirement_column">OTHER REQUIREMENT COLUMN</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="other_requirement_column_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="other_requirement_column" multiple="" name="other_requirement_column">
         <label class="custom-file-label" for="other_requirement_column" id="other_requirement_column_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="digital_final_approval_pcn">DIGITAL FINAL APPROVAL PCN</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="digital_final_approval_pcn" class="form-control" id="digital_final_approval_pcn" >
      </div>
   </div>
</div>





                <!---------------------------------- / Form Macro Batas sini ---------------------------------->

                <!-- Close Card Body -->  
                </div>
                  
                  <div class="card-footer">  <!-- footer kepala aplikasi --> 
                    <button type="submit" class="btn btn-primary" id="btnsubmit">Save</button>     <!-- button save--> 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>    <!-- button close-->        
                  </div>
                               
              </form>    
              <!-- /form  -->

            </div> 
            <!-- Close modal-content -->  
        </div>
        <!-- Close modal-dialog -->  
      </div>
      <!-- Close modal-Add / Update -->  

      <!-- modal-delete -->
      <div class="modal fade" id="modal-delete"> <!-- untuk class delete--> 
        <div class="modal-dialog"> <!-- Close Card Body --> 
          <div class="modal-content bg-danger"> <!-- untuk jenis warna button--> 
            <div class="modal-header"> <!-- untuk kepala delete--> 
              <h4 class="modal-title">Danger Modal</h4> <!-- untuk title modal--> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!--button close--> 
                <span aria-hidden="true">&times;</span> <!-- jika data dihapus maka data akan hilang--> 
              </button>
            </div>

            <div class="modal-body">  <!-- untuk body modal--> 
               <label id="iddelete2" hidden> </label>Apakah ingin delete <label id="iddelete"> </label> ?      <!-- judul apa ingin delete-->          
            </div>

            <div class="modal-footer justify-content-between">    <!-- untuk footer modal-->          
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
      <div class="modal fade" id="modal-import">   <!-- untuk modal import--> 
        <div class="modal-dialog">  <!-- Close Card Body --> 
          <div class="modal-content"> <!-- untuk modal content--> 
            <div class="modal-header"> <!-- untuk modal header--> 
              <h4 class="modal-title">Import Data</h4> <!-- untuk title modal import data--> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!--button close--> 
                <span aria-hidden="true">&times;</span> <!--jika diimport data lalu masuk maka data akan masuk aplikasi--> 
              </button>
            </div>
 
            <div class="modal-body"> <!-- untuk body modal--> 
               
              <form method="POST" action="<?php echo base_url('C_finalapproval/import'); ?>" enctype="multipart/form-data"> <!--untuk connect ke controller--> 

                  <div class="input-group form-group"> <!-- input form group--> 
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

    $('#quickForm').validate({
      rules: {

				// ---------------------------------- Rule input Macro Batas sini 1---------------------------------
        pcn_number: {
required: true,
},
supplier_name: {
required: true,
},
submitall_sign: {
required: true,
},
part_number: {
required: true,
},
part_name: {
required: true,
},
product_name: {
required: true,
},
criteria_critical_item: {
required: true,
},
change_affected: {
required: true,
},
change_affected_2: {
required: true,
},
change_affected_3: {
required: true,
},
// purch_sec_appvl_sign: {
// required: true,
// },
purch_sec_comment_cost_impact_capacity: {
required: true,
},
reason_change_of_process: {
required: true,
},
current_process: {
required: true,
},
proposed_process: {
required: true,
},
schedule_item_activity: {
required: true,
},
// requirement_document: {
// required: true,
// },
// control_plan: {
// required: true,
// },
// supplier_inspection_standard: {
// required: true,
// },
// fmea: {
// required: true,
// },
// qa_network: {
// required: true,
// },
// isir_data_result: {
// required: true,
// },
// perfomance_data_result: {
// required: true,
// },
// etc: {
// required: true,
// },
// other_requirement_column: {
// required: true,
// },
digital_final_approval_pcn: {
required: true,
},




        // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

      },
      messages: {
    
				// ---------------------------------- Rule input Macro Batas sini 2---------------------------------
        pcn_number: {
required: "Please Input pcn_number",
minlength: 3
},
supplier_name: {
required: "Please Input supplier_name",
minlength: 3
},
submitall_sign: {
required: "Please Input submitall_sign",
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
criteria_critical_item: {
required: "Please Input criteria_critical_item",
minlength: 3
},
change_affected: {
required: "Please Input change_affected",
minlength: 3
},
change_affected_2: {
required: "Please Input change_affected_2",
minlength: 3
},
change_affected_3: {
required: "Please Input change_affected_3",
minlength: 3
},
purch_sec_appvl_sign: {
required: "Please Input purch_sec_appvl_sign",
minlength: 3
},
purch_sec_comment_cost_impact_capacity: {
required: "Please Input purch_sec_comment_cost_impact_capacity",
minlength: 3
},
reason_change_of_process: {
required: "Please Input reason_change_of_process",
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
schedule_item_activity: {
required: "Please Input schedule_item_activity",
minlength: 3
},
requirement_document: {
required: "Please Input requirement_document",
minlength: 3
},
control_plan: {
required: "Please Input control_plan",
minlength: 3
},
supplier_inspection_standard: {
required: "Please Input supplier_inspection_standard",
minlength: 3
},
fmea: {
required: "Please Input fmea",
minlength: 3
},
qa_network: {
required: "Please Input qa_network",
minlength: 3
},
isir_data_result: {
required: "Please Input isir_data_result",
minlength: 3
},
perfomance_data_result: {
required: "Please Input perfomance_data_result",
minlength: 3
},
etc: {
required: "Please Input etc",
minlength: 3
},
other_requirement_column: {
required: "Please Input other_requirement_column",
minlength: 3
},
digital_final_approval_pcn: {
required: "Please Input digital_final_approval_pcn",
minlength: 3
},




        // ---------------------------------- / Rule input Macro Batas sini 2--------------------------------

         //rule input data harus terisi semua
      },
      errorElement: 'span',  //span untuk true jika data harus terisi semua
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
              url: "<?php echo base_url('C_finalapproval/ajax_getbyhdrid')?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

   		            // ---------------------------------- Data val Macro Batas sini ---------------------------------                  
                   $('#pcn_number').val(data.pcn_number);
$('#supplier_name').select2().val(data.supplier_name).trigger('change');
$('#submitall_sign').val(data.submitall_sign);
$('#part_number').val(data.part_number);
$('#part_name').val(data.part_name);
$('#product_name').val(data.product_name);
$('#criteria_critical_item').select2().val(data.criteria_critical_item).trigger('change');
$('#change_affected').select2().val(data.change_affected).trigger('change');
$('#change_affected_2').select2().val(data.change_affected_2).trigger('change');
$('#change_affected_3').select2().val(data.change_affected_3).trigger('change');
document.getElementById('purch_sec_appvl_sign_label').innerHTML=data.purch_sec_appvl_sign;
 var a = document.getElementById('purch_sec_appvl_sign_view');
 if(!data.purch_sec_appvl_sign==''){
   a.href = "<?php echo base_url('assets/upload/') ?>" + data.purch_sec_appvl_sign;
 }else{
   a.removeAttribute("href");
 };
$('#purch_sec_comment_cost_impact_capacity').val(data.purch_sec_comment_cost_impact_capacity);
$('#reason_change_of_process').val(data.reason_change_of_process);
$('#current_process').val(data.current_process);
$('#proposed_process').val(data.proposed_process);
$('#schedule_item_activity').val(data.schedule_item_activity);
document.getElementById('requirement_document_label').innerHTML=data.requirement_document;
 var a = document.getElementById('requirement_document_view');
 if(!data.requirement_document==''){
   a.href = "<?php echo base_url('assets/upload/finalapproval') ?>" + data.requirement_document;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('control_plan_label').innerHTML=data.control_plan;
 var a = document.getElementById('control_plan_view');
 if(!data.control_plan==''){
   a.href = "<?php echo base_url('assets/upload/finalapproval') ?>" + data.control_plan;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('supplier_inspection_standard_label').innerHTML=data.supplier_inspection_standard;
 var a = document.getElementById('supplier_inspection_standard_view');
 if(!data.supplier_inspection_standard==''){
   a.href = "<?php echo base_url('assets/upload/finalapproval') ?>" + data.supplier_inspection_standard;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('fmea_label').innerHTML=data.fmea;
 var a = document.getElementById('fmea_view');
 if(!data.fmea==''){
   a.href = "<?php echo base_url('assets/upload/finalapproval') ?>" + data.fmea;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('qa_network_label').innerHTML=data.qa_network;
 var a = document.getElementById('qa_network_view');
 if(!data.qa_network==''){
   a.href = "<?php echo base_url('assets/upload/finalapproval') ?>" + data.qa_network;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('isir_data_result_label').innerHTML=data.isir_data_result;
 var a = document.getElementById('isir_data_result_view');
 if(!data.isir_data_result==''){
   a.href = "<?php echo base_url('assets/upload/finalapproval') ?>" + data.isir_data_result;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('perfomance_data_result_label').innerHTML=data.perfomance_data_result;
 var a = document.getElementById('perfomance_data_result_view');
 if(!data.perfomance_data_result==''){
   a.href = "<?php echo base_url('assets/upload/finalapproval') ?>" + data.perfomance_data_result;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('etc_label').innerHTML=data.etc;
 var a = document.getElementById('etc_view');
 if(!data.etc==''){
   a.href = "<?php echo base_url('assets/upload/finalapproval') ?>" + data.etc;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('other_requirement_column_label').innerHTML=data.other_requirement_column;
 var a = document.getElementById('other_requirement_column_view');
 if(!data.other_requirement_column==''){
   a.href = "<?php echo base_url('assets/upload/finalapproval') ?>" + data.other_requirement_column;
 }else{
   a.removeAttribute("href");
 };
$('#digital_final_approval_pcn').val(data.digital_final_approval_pcn);

                  // ---------------------------------- / Data val Macro  Batas sini ------------------------------

                                                           
                  },
              error: function (e) {
                      alert(e);
                     
                  }
            });
            
            // Disable and button submit dan text form           
            if(status=="View"){
              document.getElementById("btnsubmit").style.visibility = "hidden";  //hidden submit
              $('#exampleModalLabel').text('View Data'); //name view              
            }else{
              $('#exampleModalLabel').text('Edit Data'); //name view 
              $('#btnsubmit').text('Update'); //name Update  
              document.getElementById("btnsubmit").style.visibility = "visible";  //visible submit
            }
          
          }

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
            vurl = "<?php echo base_url('C_finalapproval/ajax_add')?>"; //link simpan data
          } else {           
            vurl = "<?php echo base_url('C_finalapproval/ajax_update')?>";//link update data
          }
         
          //untuk aja data sudah bisa dipost
          $.ajax({
              url: vurl, //url
              method: "post",//jenis method pst
              processData: false, //false process
              contentType: false, //false content
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
                 
              },
               // function error
              error: function (e) {
                  gagal(e);
                  //pesan gagal
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
      vurl = "<?php echo base_url('C_finalapproval/ajax_delete')?>";

          //untuk aja data sudah bisa dipost
          $.ajax({
              url: vurl, //url
              method: "post",//jenis method pst
              processData: false, //false process
              contentType: false, //false content
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

    ///@see Send_mail()
     ///@note fungsi digunakan mengirim data ke email
     ///@attention 
  function Send_mail(){

    // Url Post delete
    vurl = "<?php echo base_url('C_Email/Send_mail')?>";
    // Form data
    var fdata = new FormData();
    fdata.append('hdrid','Hdrid123');

         // Post data
          //untuk aja data sudah bisa dipost
          $.ajax({
              url: vurl, //url
              method: "post",//jenis method pst
              processData: false, //false process
              contentType: false, //false content
              data: fdata,
              success: function (data) {
        },
        error: function (e) {
            //Pesan Gagal
            //gagal(e);             
        }
    });

  }

 
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

   //Date range picker
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

   //variable table
    var tabel = null;
    $(document).ready(function() {

        tabel = $('#example1').DataTable({ //table
            "processing": true, //processing true jika data masuk table
            "responsive":true, //respon jika data masuk akan muncul pop up data
            "serverSide": true,//untuk data masuk server 
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            dom: "lfBrtip",
            buttons: [
            {
              extend: 'copyHtml5', //extend html
              className: 'btn btn-secondary', //button
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
              customize: function ( xlsx ){ //type data excel
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // jQuery selector to add a border
                $( 'row c', sheet ).attr( 's', '25' );
              }
            },
            {
              extend : 'pdfHtml5',   //extend html           
              className: 'btn btn-danger', //button
              text: '<i class="fas fa-file-pdf">&nbsp</i> Export Data to PDF', //untuk export data ke pdf
              orientation : 'landscape', //type landscape
              pageSize : 'A4', //ukuran kertas
              download: 'open' //download 
            }
          ],
            "ajax": 
            {
                "url": "<?= base_url('C_finalapproval/view_data_where');?>", // URL file untuk proses select datanya
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
                        mnu=mnu+'<div class="btn btn-success btn-sm konfirmasiView  mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div>';
                        mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit  mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>'; mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                        // <php if ($this->session->userdata('WT202105008Edit'||$this->session->userdata('rolename')=='Administrator Quality')) { ?>
                        //   mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                        //   // return '<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div> <div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div> <div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                        // <php } if ($this->session->userdata('WT202105008Delete')||$this->session->userdata('rolename')=='Administrator Quality') { ?>
                        //   mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                        //   // return '<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div> ';
                        // <php } ?>
                        
                        return mnu;

                    }  
                },
                
                // ---------------------------------- Datatables Macro Batas sini ---------------------------------
            {"data":"hdrid"},
            {"data":"pcn_number"},
            {"data":"supplier_name"},
            {"data":"submitall_sign"},
            {"data":"part_number"},
            {"data":"part_name"},
            {"data":"product_name"},
            {"data":"criteria_critical_item"},
            {"data":"change_affected"},
            {"data":"change_affected_2"},
            {"data":"change_affected_3"},
            {"data":"purch_sec_appvl_sign"},
            {"data":"purch_sec_comment_cost_impact_capacity"},
            {"data":"reason_change_of_process"},
            {"data":"current_process"},
            {"data":"proposed_process"},
            {"data":"schedule_item_activity"},
            {"data":"requirement_document"},
            {"data":"control_plan"},
            {"data":"supplier_inspection_standard"},
            {"data":"fmea"},
            {"data":"qa_network"},
            {"data":"isir_data_result"},
            {"data":"perfomance_data_result"},
            {"data":"etc"},
            {"data":"other_requirement_column"},
            {"data":"digital_final_approval_pcn"},










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
        

      // });

     
    }

</script>


<script type="text/javascript">

   //fungsi select filter
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>


<script type="text/javascript">

      ///@see handleSelectChange_nik()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_nik(event) {
 
  //  By Text
  var value = $("#nik option:selected").text();  
  var res = value.split("-");
  // $('#acc_number').val(res[0]);
  $('#name').val(res[1]);

  }

      ///@see handleSelectChange_supplier_name()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_supplier_name(event) {
  var data = $('#supplier_name').select2('data')[0].text;
  }
  
  
    ///@see handleSelectChange_criteria_critical_item()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_criteria_critical_item(event) {
  var data = $('#critera_critical_item').select2('data')[0].text;
  }
  
      ///@see handleSelectChange_change_affected()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_change_affected(event) {
  var data = $('#change_affected').select2('data')[0].text;
  }
  
      ///@see handleSelectChange_change_affected_2()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_change_affected_2(event) {
  var data = $('#change_affected_2').select2('data')[0].text;
  }

      ///@see handleSelectChange_change_affected_3()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_change_affected_3(event) {
  var data = $('#change_affected_3').select2('data')[0].text;
  }
  
  
  


</script>







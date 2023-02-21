  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid"><!-- untuk container-->
        <div class="row mb-2"><!-- untuk row aplikasi-->
          <div class="col-sm-6"><!--untuk ukuran panjang container-->
            <h1 class="m-0 text-dark">QCR LIST</h1><!-- untuk menampilkan judul-->
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
                    <th>QCR NUMBER</th>
                    <th>PCN NUMBER</th>
                    <th>SUPPLIER</th>
                    <th>SUPPLIER</th>
                    <th>PCN NUMBER</th>
                    <th>PART NUMBER</th>
                    <th>PRODUCT GROUP</th>
                    <th>REASON OF CHANGE</th>
                    <th>DATE OF REQUEST</th>
                    <th>ACTUAL FINISH DATE</th>
                    <th>N5 DOCUMENT DIMENSION</th>
                    <th>N5 DOCUMENT PERFORMANCE</th>
                    <th>CAPABILITY DATA DIMENSION</th>
                    <th>CAPABILITY DATA PERFOMANCE</th>
                    <th>AIR LEAK DATA</th>







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

                                
                <div class="card card-green">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-plus"></i>
                      QCR LIST
                    </h3>
                  </div>
                  
                  <div class="card-body">
                <div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="hdrid">QCR NUMBER</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="hdrid" class="form-control" id="hdrid" placeholder="auto generate" readonly>
      </div>
   </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label>PCN NUMBER</label>
    </div>
    <div class="col-md-8">
      <select class="form-control select2" id="pcn_number" name="pcn_number" onchange="handleSelectChange_pcn_number(event)" style="width: 100%;">
        <option value='' selected="selected">-Select-</option>
        <?php
          foreach ($pcn_number as $value) {
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
      <label>SUPPLIER</label>
    </div>
    <div class="col-md-8">
      <select class="form-control select2" id="supplier" name="supplier" onchange="handleSelectChange_supplier(event)" style="width: 100%;">
        <option value='' selected="selected">-Select-</option>
        <?php
          foreach ($supplier as $value) {
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
         <label for="supplier2">SUPPLIER</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="supplier2" class="form-control" id="supplier2" >
      </div>
   </div>
</div>
<div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="pcn_number2">PCN NUMBER</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="pcn_number2" class="form-control" id="pcn_number2" >
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
         <label for="product_group">PRODUCT GROUP</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="product_group" class="form-control" id="product_group" >
      </div>
   </div>
</div>
<div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="reason_of_change">REASON OF CHANGE</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="reason_of_change" class="form-control" id="reason_of_change" >
      </div>
   </div>
</div>
<div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="date_of_request">DATE OF REQUEST</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="date_of_request" class="form-control" id="date_of_request" >
      </div>
   </div>
</div>
<div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="actual_finish_date">ACTUAL FINISH DATE</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="actual_finish_date" class="form-control" id="actual_finish_date" >
      </div>
   </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="n5_document_dimension">N5 DOCUMENT DIMENSION</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="n5_document_dimension_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="n5_document_dimension" multiple="" name="n5_document_dimension">
         <label class="custom-file-label" for="n5_document_dimension" id="n5_document_dimension_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="n5_document_performance">N5 DOCUMENT PERFORMANCE</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="n5_document_performance_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="n5_document_performance" multiple="" name="n5_document_performance">
         <label class="custom-file-label" for="n5_document_performance" id="n5_document_performance_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="capability_data_dimension">CAPABILITY DATA DIMENSION</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="capability_data_dimension_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="capability_data_dimension" multiple="" name="capability_data_dimension">
         <label class="custom-file-label" for="capability_data_dimension" id="capability_data_dimension_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="capability_data_perfomance">CAPABILITY DATA PERFOMANCE</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="capability_data_perfomance_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="capability_data_perfomance" multiple="" name="capability_data_perfomance">
         <label class="custom-file-label" for="capability_data_perfomance" id="capability_data_perfomance_label">Choose file</label>
       </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      <label for="air_leak_data">AIR LEAK DATA</label>
    </div>
    <div class="col-md-1">
      <a class="btn btn-success" id="air_leak_data_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
    </div>
    <div class="col-md-7">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="air_leak_data" multiple="" name="air_leak_data">
         <label class="custom-file-label" for="air_leak_data" id="air_leak_data_label">Choose file</label>
       </div>
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
        </div>
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
               
              <form method="POST" action="<?php echo base_url('C_QCRLIST/import'); ?>" enctype="multipart/form-data"> <!--untuk connect ke controller--> 

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
supplier: {
required: true,
},
supplier2: {
required: true,
},
pcn_number2: {
required: true,
},
part_number: {
required: true,
},
product_group: {
required: true,
},
reason_of_change: {
required: true,
},
date_of_request: {
required: true,
},
actual_finish_date: {
required: true,
},
// n5_document_dimension: {
// required: true,
// },
// n5_document_performance: {
// required: true,
// },
// capability_data_dimension: {
// required: true,
// },
// capability_data_perfomance: {
// required: true,
// },
// air_leak_data: {
// required: true,
// },



        // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

      },
      messages: {
    
				// ---------------------------------- Rule input Macro Batas sini 2---------------------------------
        pcn_number: {
required: "Please Input pcn_number",
minlength: 3
},
supplier: {
required: "Please Input supplier",
minlength: 3
},
supplier2: {
required: "Please Input supplier2",
minlength: 3
},
pcn_number2: {
required: "Please Input pcn_number2",
minlength: 3
},
part_number: {
required: "Please Input part_number",
minlength: 3
},
product_group: {
required: "Please Input product_group",
minlength: 3
},
reason_of_change: {
required: "Please Input reason_of_change",
minlength: 3
},
date_of_request: {
required: "Please Input date_of_request",
minlength: 3
},
actual_finish_date: {
required: "Please Input actual_finish_date",
minlength: 3
},
n5_document_dimension: {
required: "Please Input n5_document_dimension",
minlength: 3
},
n5_document_performance: {
required: "Please Input n5_document_performance",
minlength: 3
},
capability_data_dimension: {
required: "Please Input capability_data_dimension",
minlength: 3
},
capability_data_perfomance: {
required: "Please Input capability_data_perfomance",
minlength: 3
},
air_leak_data: {
required: "Please Input air_leak_data",
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


      ///@see get view modal
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
              url: "<?php echo base_url('C_QCRLIST/ajax_getbyhdrid')?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

   		            // ---------------------------------- Data val Macro Batas sini ---------------------------------                  
                   $('#pcn_number').select2().val(data.pcn_number).trigger('change');
$('#supplier').select2().val(data.supplier).trigger('change');
$('#supplier2').val(data.supplier2);
$('#pcn_number2').val(data.pcn_number2);
$('#part_number').val(data.part_number);
$('#product_group').val(data.product_group);
$('#reason_of_change').val(data.reason_of_change);
$('#date_of_request').val(data.date_of_request);
$('#actual_finish_date').val(data.actual_finish_date);
document.getElementById('n5_document_dimension_label').innerHTML=data.n5_document_dimension;
 var a = document.getElementById('n5_document_dimension_view');
 if(!data.n5_document_dimension==''){
   a.href = "<?php echo base_url('assets/upload/qcrlist') ?>" + data.n5_document_dimension;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('n5_document_performance_label').innerHTML=data.n5_document_performance;
 var a = document.getElementById('n5_document_performance_view');
 if(!data.n5_document_performance==''){
   a.href = "<?php echo base_url('assets/upload/qcrlist') ?>" + data.n5_document_performance;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('capability_data_dimension_label').innerHTML=data.capability_data_dimension;
 var a = document.getElementById('capability_data_dimension_view');
 if(!data.capability_data_dimension==''){
   a.href = "<?php echo base_url('assets/upload/qcrlist') ?>" + data.capability_data_dimension;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('capability_data_perfomance_label').innerHTML=data.capability_data_perfomance;
 var a = document.getElementById('capability_data_perfomance_view');
 if(!data.capability_data_perfomance==''){
   a.href = "<?php echo base_url('assets/upload/qcrlist') ?>" + data.capability_data_perfomance;
 }else{
   a.removeAttribute("href");
 };
document.getElementById('air_leak_data_label').innerHTML=data.air_leak_data;
 var a = document.getElementById('air_leak_data_view');
 if(!data.air_leak_data==''){
   a.href = "<?php echo base_url('assets/upload/qcrlist') ?>" + data.air_leak_data;
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

    ///@see get simpan data
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
            vurl = "<?php echo base_url('C_QCRLIST/ajax_add')?>"; //link simpan data
          } else {           
            vurl = "<?php echo base_url('C_QCRLIST/ajax_update')?>";//link update data
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

    ///@see get delete data
     ///@note fungsi digunakan untuk delete data
     ///@attention 
  function Delete_data(){

      // Form data
      var fdata = new FormData();
     
      // Delete by Hdrid
      fdata.append('hdrid',$('#iddelete').text());
      // Url Post delete
      vurl = "<?php echo base_url('C_QCRLIST/ajax_delete')?>";

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

   ///@see get send email
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
                "url": "<?= base_url('C_QCRLIST/view_data_where');?>", // URL file untuk proses select datanya
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
                {"data":"supplier"},
                {"data":"supplier2"},
                {"data":"pcn_number2"},
                {"data":"part_number"},
                {"data":"product_group"},
                {"data":"reason_of_change"},
                {"data":"date_of_request"},
                {"data":"actual_finish_date"},
                {"data":"n5_document_dimension"},
                {"data":"n5_document_performance"},
                {"data":"capability_data_dimension"},
                {"data":"capability_data_perfomance"},
                {"data":"air_leak_data"},










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

      //@see get untuk filter
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_nik(event) {
 
  //  By Text
  var value = $("#nik option:selected").text();  
  var res = value.split("-");
  // $('#acc_number').val(res[0]);
  $('#name').val(res[1]);

  }
  
    //@see get untuk filter
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_pcn_number(event) {
  var data = $('#pcn_number').select2('data')[0].text;
  }


      //@see get untuk filter
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_supplier(event) {
  var data = $('#supplier').select2('data')[0].text;
  }
  

</script>







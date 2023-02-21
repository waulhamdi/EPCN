
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid"><!-- untuk container-->
        <div class="row mb-2"><!-- untuk row aplikasi-->
          <div class="col-sm-6"><!--untuk ukuran panjang container-->
            <h1 class="m-0 text-dark">QCR register</h1><!-- untuk menampilkan judul-->
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
                    <th>DATE</th>
                    <th>PART NUMBER</th>
                    <th>PART NAME</th>
                    <th>LOT NUMBER</th>
                    <th>FINISH TARGET</th>
                    <th>CHECK ITEM</th>
                    <th>DRAWING ATTACHED</th>
                    <th>REASON PURPOSE</th>
                    <th>CHECK RESULT</th>
                    <th>DIMENSION</th>
                    <th>PERFOMANCE</th>
                    <th>NOISE</th>







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
            <div class="modal-content">  <!--content add data-->
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
                      QCR
                    </h3>
                  </div>

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
                  <label>DATE</label>
                </div>
                <div class="col-md-4">
                  <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerdate" data-target-input="nearest">
                    <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#timepickerdate"/>
                      <div class="input-group-append" data-target="#timepickerdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
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
                  <label>LOT NUMBER</label>
                </div>
                <div class="col-md-8">
                  <select class="form-control select2" id="lot_number" name="lot_number" onchange="handleSelectChange_lot_number(event)" style="width: 100%;">
                    <option value='' selected="selected">-Select-</option>
                    <?php
                      foreach ($lot_number as $value) {
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
                  <label>FINISH TARGET</label>
                </div>
                <div class="col-md-8">
                  <select class="form-control select2" id="finish_target" name="finish_target" onchange="handleSelectChange_finish_target(event)" style="width: 100%;">
                    <option value='' selected="selected">-Select-</option>
                    <?php
                      foreach ($finish_target as $value) {
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
                  <label>CHECK ITEM</label>
                </div>
                <div class="col-md-2">
                  <div class="form-group" clearfix>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="check_item" value="n1" name="check_item"  >
                      <label for="check_item">
                            n1
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group" clearfix>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="check_item" value="n1" name="check_item"  >
                      <label for="check_item">
                            Follow Marking Drawing
                      </label>
                    </div>
                  </div>
                </div>
                <!-- attach -->
                <div class="col-md-1">
                  <div class="form-group" clearfix>???
                    <!-- <div class="icheck-primary d-inline">
                      <input type="radio" id="check_item" value="n1" name="check_item"  >
                      <label for="check_item">
                            Follow Marking Drawing
                      </label>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group" clearfix>
              <div class="row">
                <div class="col-md-4">
                  <!-- <label>CHECK ITEM</label> -->
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="check_item" value="n1" name="check_item"  >
                      <label for="check_item">
                            n5
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group" clearfix>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="check_item" value="n1" name="check_item"  >
                      <label for="check_item">
                            OTHERS
                      </label>
                    </div>
                  </div>
                </div>
                    
                <div class="col-md-1">
                  <div class="form-group" clearfix>???
                    <!-- <div class="icheck-primary d-inline">
                      <input type="radio" id="check_item" value="n1" name="check_item"  >
                      <label for="check_item">
                            Follow Marking Drawing
                      </label>
                    </div> -->
                  </div>
                </div>
              </div>
              </div>
                <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label for="pcn_number">PURPOSE/REASON REQUEST</label>
                  </div>
                  <div class="col-md-8">
                  <select class="form-control select2" id="pcn_number" name="pcn_number" onchange="handleSelectChange_pcn(event)" style="width: 100%;">
                    <option value='' selected="selected">-Select-</option>
                    <?php
                      foreach ($Tampil_pcn as $value) {
                        echo "<option value='$value->hdrid'>$value->hdrid'-'$value->part_number'-'$value->part_name</option>";
                      }
                    ?>
                  </select>
                  </div>
              </div>
              </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-md-4" style="text-align:center">
                    <label for="reason_propose">NOTE</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="reason_purpose" class="form-control" id="reason_purpose" >
                  </div>
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="row">
                  <div class="col-md-4">
                    <label for="item_propose">ITEM PROPOSE</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="item_propose" class="form-control" id="item_propose" >
                  </div>
              </div>
            </div> -->
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="drawing_attached">DRAWING ATTACHED</label>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-success" id="drawing_attached_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                </div>
                <div class="col-md-7">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="drawing_attached" multiple="" name="drawing_attached">
                    <label class="custom-file-label" for="drawing_attached" id="drawing_attached_label">Choose file</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="qcr_attached">QCR ATTACHED</label>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-success" id="qcr_attached_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                </div>
                <div class="col-md-7">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="qcr_attached" multiple="" name="qcr_attached">
                    <label class="custom-file-label" for="qcr_attached" id="qcr_attached_label">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="other_attached">OTHER ATTACHED</label>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-success" id="other_attached_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                </div>
                <div class="col-md-7">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="other_attached" multiple="" name="other_attached">
                    <label class="custom-file-label" for="other_attached" id="other_attached_label">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="perfomance">PERFOMANCE</label>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-success" id="perfomance_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                </div>
                <div class="col-md-7">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="perfomance" multiple="" name="perfomance">
                    <label class="custom-file-label" for="perfomance" id="perfomance_label">Choose file</label>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="noise">NOISE</label>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-success" id="noise_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                </div>
                <div class="col-md-7">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="noise" multiple="" name="noise">
                    <label class="custom-file-label" for="noise" id="noise_label">Choose file</label>
                  </div>
                </div>
              </div>
            </div> -->
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
                    </div>
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
               
              <form method="POST" action="<?php echo base_url('C_QCR/import'); ?>" enctype="multipart/form-data"> <!--untuk connect ke controller--> 

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
        // date: {
        // required: true,
        // },
        // pcn_number: {
        // required: true,
        // },
        // part_number: {
        // required: true,
        // },
        // part_name: {
        // required: true,
        // },
        // lot_number: {
        // required: true,
        // },
        // finish_target: {
        // required: true,
        // },
        // check_item: {
        // required: true,
        // },
        // reason_propose: {
        // required: true,
        // },
        // item_propose: {
        // required: true,
        // },
        // drawing_attached: {
        // required: true,
        // },
        // qcr_attached: {
        // required: true,
        // },
        // other_attached: {
        // required: true,
        // },




        // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

      },
      messages: {
    
				// ---------------------------------- Rule input Macro Batas sini 2---------------------------------
        date: {
        required: "Please Input date",
        minlength: 3
        },
        pcn_number: {
        required: "Please Input pcn_number",
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
        lot_number: {
        required: "Please Input lot_number",
        minlength: 3
        },
        finish_target: {
        required: "Please Input finish_target",
        minlength: 3
        },
        check_item: {
        required: "Please Input check_item",
        minlength: 3
        },
        reason_propose: {
        required: "Please Input reason_purpose",
        minlength: 3
        },
        item_propose: {
        required: "Please Input item_purpose",
        minlength: 3
        },
        drawing_attached: {
        required: "Please Input drawing_attached",
        minlength: 3
        },
        qcr_attached: {
        required: "Please Input qcr_attached",
        minlength: 3
        },
        other_attached: {
        required: "Please Input other_attached",
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
              url: "<?php echo base_url('C_QCR/ajax_getbyhdrid')?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

   		            // ---------------------------------- Data val Macro Batas sini ---------------------------------                  
                   $('#date').select2().val(data.date).trigger('change');
                   $('#pcn_number').select2().val(data.pcn_number).trigger('change');
                    $('#part_number').val(data.part_number);
                    $('#part_name').val(data.part_name);
                    $('#lot_number').select2().val(data.lot_number).trigger('change');
                    $('#finish_target').select2().val(data.finish_target).trigger('change');
                    $('#check_item').select2().val(data.check_item).trigger('change');
                    $('#reason_propose').val(data.reason_propose);
                    $('#item_propose').val(data.item_propose);
                    document.getElementById('drawing_attached_label').innerHTML=data.drawing_attached;
                    var a = document.getElementById('drawing_attached_view');
                    if(!data.drawing_attached==''){
                      a.href = "<?php echo base_url('assets/upload/qcr') ?>" + data.drawing_attached;
                    }else{
                      a.removeAttribute("href");
                    };
                    document.getElementById('qcr_attached_label').innerHTML=data.qcr_attached;
                    var a = document.getElementById('qcr_attached_view');
                    if(!data.qcr_attached==''){
                      a.href = "<?php echo base_url('assets/upload/qcr') ?>" + data.qcr_attached;
                    }else{
                      a.removeAttribute("href");
                    };
                    document.getElementById('other_attached_label').innerHTML=data.other_attached;
                    var a = document.getElementById('other_attached_view');
                    if(!data.other_attached==''){
                      a.href = "<?php echo base_url('assets/upload/qcr') ?>" + data.other_attached;
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
            vurl = "<?php echo base_url('C_QCR/ajax_add')?>"; //link simpan data
          } else {           
            vurl = "<?php echo base_url('C_QCR/ajax_update')?>";//link update data
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
      vurl = "<?php echo base_url('C_QCR/ajax_delete')?>";

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
                "url": "<?= base_url('C_QCR/view_data_where');?>", // URL file untuk proses select datanya
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
                {"data":"date"},
                {"data":"pcn_number"},
                {"data":"part_number"},
                {"data":"part_name"},
                {"data":"lot_number"},
                {"data":"finish_target"},
                {"data":"check_item"},
                {"data":"reason_propose"},
                {"data":"item_propose"},
                {"data":"drawing_attached"},
                {"data":"qcr_attached"},
                {"data":"other_attached"},

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

      ///@see get untuk filter
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
  function handleSelectChange_nik(event) {
 
  //  By Text
  var value = $("#nik option:selected").text();  
  var res = value.split("-");
  // $('#acc_number').val(res[0]);
  $('#name').val(res[1]);

  }
  
      ///@see get untuk filter
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_date(event) {
  var data = $('#date').select2('data')[0].text;
  }

      ///@see get untuk filter
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_part_number(event) {
  var data = $('#part_number').select2('data')[0].text;
  }

        ///@see get untuk filter
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_part_name(event) {
  var data = $('#part_name').select2('data')[0].text;
  }

        ///@see get untuk filter
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_lot_number(event) {
  var data = $('#lot_number').select2('data')[0].text;
  }

        ///@see get untuk filter
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_finish_target(event) {
  var data = $('#finish_target').select2('data')[0].text;
  }

        ///@see get untuk filter
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_check_item(event) {
  var data = $('#check_item').select2('data')[0].text;
  }

     ///@see handleSelectChange_pcn()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_pcn(event) {

        var data = $('#pcn_number').select2('data')[0].text;
      
        if (data=='-Select-'){
            $('#pcn_number').val('');   
            $('#part_number').val('');   
            $('#part_name').val('');   
     
        }else{
            var res = data.split("'-'");
            $('#pcn_number').val(res[0]);
            $('#part_number').val(res[1]);
            $('#part_name').val(res[2]);
          };
  }
</script>







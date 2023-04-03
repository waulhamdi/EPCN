
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Setting Application Response Member</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard PCN</a></li>
              <li class="breadcrumb-item active">DMIA E-PCN SYSTEM</li>
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
              <div class="card-header"> 
                <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->               
                <div class="row">
                   <div class="col-md-12">
                    <div class="card">              
                      <div class="card-header">    
                      <div id="accordion">
                          <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                          <div class="card card-primary">

                            <div class="card-header">

                              <h4 class="card-title">
                               <?php if(!empty($hak_akses)){ if ($hak_akses->allow_add=='on') { ?>
                                  <a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal('1','Add')" href="#">
                                    <i class="fa fa-plus"></i> Add Data
                                  </a>
                                <?php } }?>
                                <?php if(!empty($hak_akses)){ if ($hak_akses->allow_import=='on') { ?>
                                  <a data-toggle="modal" data-target="#modal-import"  href="#">
                                    <i class="fa fa-upload"></i> Import Data
                                  </a>
                              <?php } }?>
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                     <i class="fa fa-binoculars"></i> Custom Filter
                                </a>

                                <!-- <a href="<php echo base_url('C_Email/send2')?> "  Onclick='Delete_data()' >
                                   <i class="fa fa-plus"></i> Send Mail
                                </a>

                                <button type="button" id="delete" onclick="Send_mail()" class="btn btn-outline-light">Send Mail 2</button>     -->

                              </h4>

                            </div>

                            <div id="collapseOne" class="panel-collapse collapse in">
                              <div class="card-body">

                                  <!-- Date -->
                                  <div class="form-group">                                

                                    <label>Date From:</label>
                                     
                                      <div class="input-group date" data-date-format="YYYY-MM-DD"  id="startdate" data-target-input="nearest">
                                          <input type="text" id="search_fromdate" class="form-control datetimepicker-input" data-target="#startdate"/>
                                          <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>

                                  </div>

                                  <!-- Date To-->
                                  <div class="form-group">
                                    <label>Date To:</label>
                                      <div class="input-group date" data-date-format="YYYY-MM-DD" id="enddate" data-target-input="nearest">
                                          <input type="text" id="search_todate" class="form-control datetimepicker-input" data-target="#enddate"/>
                                          <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>
                                  </div>

                                  <button type="button" id="search" class="btn btn-block btn-success" data-toggle="collapse" data-target="#collapseOne">Search</button>
                               
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
                    <th>PRODUCT</th>
                    <th>PE MEMBER 1</th>
                    <th>PE MEMBER 2</th>
                    <th>PE MEMBER 3</th>
                    <th>QC MEMBER 1</th>
                    <th>QC MEMBER 2</th>
                    <th>QC MEMBER 3</th>
                    <th>MFG MEMBER 1</th>
                    <th>MFG MEMBER 2</th>
                    <th>MFG MEMBER 3</th>
                    <th>PC MEMBER 1</th>
                    <th>PC MEMBER 2</th>
                    <th>PC MEMBER 3</th>
                    <th>QA MEMBER 1</th>
                    <th>QA MEMBER 2</th>
                    <th>QA MEMBER 3</th>

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
     <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">            
              <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel">ADD DATA</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
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
                            <label for="product">PRODUCT</label>
                        </div>
                        <div class="col-md-8">
                        <select class="form-control select2" id="product" name="product" onchange="handleSelectChange_product(event)" style="width: 100%;">
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
                            <label for="pe_member_1">PE MEMBER 1</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" id="pe_member_1" name="pe_member_1" onchange="handleSelectChange_pe_member_1(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pe_member_2">PE MEMBER 2</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" id="pe_member_2" name="pe_member_2" onchange="handleSelectChange_pe_member_2(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pe_member_3">PE MEMBER 3</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" id="pe_member_3" name="pe_member_3" onchange="handleSelectChange_pe_member_3(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="qc_member_1">QC MEMBER 1</label>
                        </div>
                        <div class="col-md-8">
                           <select class="form-control select2" id="qc_member_1" name="qc_member_1" onchange="handleSelectChange_qc_member_1(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="qc_member_2">QC MEMBER 2</label>
                        </div>
                        <div class="col-md-8">
                           <select class="form-control select2" id="qc_member_2" name="qc_member_2" onchange="handleSelectChange_qc_member_2(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="qc_member_3">QC MEMBER 3</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" id="qc_member_3" name="qc_member_3" onchange="handleSelectChange_qc_member_3(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="mfg_member_1">MFG MEMBER 1</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" id="mfg_member_1" name="mfg_member_1" onchange="handleSelectChange_mfg_member_1(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="mfg_member_2">MFG MEMBER 2</label>
                        </div>
                        <div class="col-md-8">
                           <select class="form-control select2" id="mfg_member_2" name="mfg_member_2" onchange="handleSelectChange_mfg_member_2(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="mfg_member_3">MFG MEMBER 3</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" id="mfg_member_3" name="mfg_member_3" onchange="handleSelectChange_mfg_member_3(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pc_member_1">PC MEMBER 1</label>
                        </div>
                        <div class="col-md-8">
                           <select class="form-control select2" id="pc_member_1" name="pc_member_1" onchange="handleSelectChange_pc_member_1(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pc_member_2">PC MEMBER 2</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" id="pc_member_2" name="pc_member_2" onchange="handleSelectChange_pc_member_2(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pc_member_3">PC MEMBER 3</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" id="pc_member_3" name="pc_member_3" onchange="handleSelectChange_pc_member_3(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="qa_member_1">QA MEMBER 1</label>
                        </div>
                        <div class="col-md-8">
                           <select class="form-control select2" id="qa_member_1" name="qa_member_1" onchange="handleSelectChange_qa_member_1(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="qa_member_2">QA MEMBER 2</label>
                        </div>
                        <div class="col-md-8">
                           <select class="form-control select2" id="qa_member_2" name="qa_member_2" onchange="handleSelectChange_qa_member_2(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="qa_member_3">QA MEMBER 3</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" id="qa_member_3" name="qa_member_3" onchange="handleSelectChange_qa_member_3(event)" style="width: 100%;">
                                <option value='' selected="selected">-Select-</option>
                                <?php
                                    foreach ($nik as $value) {
                                    echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->office_email</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card End -->
            




                

                
                <!---------------------------------- / Form Macro Batas sini ---------------------------------->

                <!-- Close Card Body -->  
                </div>
                  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btnsubmit">Save</button>                 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                   
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
      <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Import Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
               
              <form method="POST" action="<?php echo base_url('C_setting_app_member/import'); ?>" enctype="multipart/form-data">

                  <div class="input-group form-group">
                    <span class="input-group-addon" id="sizing-addon2">
                      <i class="glyphicon glyphicon-file"></i>
                    </span>
                    <input type="file" class="form-control" name="excel" aria-describedby="sizing-addon2">
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i>Import Data</button>
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

                // product: {
                // required: true,
                // },
                // pe_member_1: {
                // required: true,
                // },
                // pe_member_2: {
                // required: true,
                // },
                // pe_member_3: {
                // required: true,
                // },
                // qc_member_1: {
                // required: true,
                // },
                // qc_member_2: {
                // required: true,
                // },
                // qc_member_3: {
                // required: true,
                // },
                // mfg_member_1: {
                // required: true,
                // },
                // mfg_member_2: {
                // required: true,
                // },
                // mfg_member_3: {
                // required: true,
                // },
                // pc_member_1: {
                // required: true,
                // },
                // pc_member_2: {
                // required: true,
                // },
                // pc_member_3: {
                // required: true,
                // },
                // qa_member_1: {
                // required: true,
                // },
                // qa_member_2: {
                // required: true,
                // },
                // qa_member_3: {
                // required: true,
                // },



        // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

      },
      messages: {
    
				// ---------------------------------- Rule input Macro Batas sini 2---------------------------------

                product: {
                required: "Please Input product",
                minlength: 3
                },
                pe_member_1: {
                required: "Please Input pe_member_1",
                minlength: 3
                },
                pe_member_2: {
                required: "Please Input pe_member_2",
                minlength: 3
                },
                pe_member_3: {
                required: "Please Input pe_member_3",
                minlength: 3
                },
                qc_member_1: {
                required: "Please Input qc_member_1",
                minlength: 3
                },
                qc_member_2: {
                required: "Please Input qc_member_2",
                minlength: 3
                },
                qc_member_3: {
                required: "Please Input qc_member_3",
                minlength: 3
                },
                mfg_member_1: {
                required: "Please Input mfg_member_1",
                minlength: 3
                },
                mfg_member_2: {
                required: "Please Input mfg_member_2",
                minlength: 3
                },
                mfg_member_3: {
                required: "Please Input mfg_member_3",
                minlength: 3
                },
                pc_member_1: {
                required: "Please Input pc_member_1",
                minlength: 3
                },
                pc_member_2: {
                required: "Please Input pc_member_2",
                minlength: 3
                },
                pc_member_3: {
                required: "Please Input pc_member_3",
                minlength: 3
                },
                qa_member_1: {
                required: "Please Input qa_member_1",
                minlength: 3
                },
                qa_member_2: {
                required: "Please Input qa_member_2",
                minlength: 3
                },
                qa_member_3: {
                required: "Please Input qa_member_3",
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
</script>

<script type="text/javascript">

  // Untuk Add,Edit,delete.
  
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
              url: "<?php echo base_url('C_setting_app_member/ajax_getbyhdrid')?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

   		            // ---------------------------------- Data val Macro Batas sini ---------------------------------    

                    $('#product').select2().val(data.product).trigger('change');
                    $('#pe_member_1').select2().val(data.pe_member_1).trigger('change');
                    $('#pe_member_2').select2().val(data.pe_member_2).trigger('change');
                    $('#pe_member_3').select2().val(data.pe_member_3).trigger('change');
                    $('#qc_member_1').select2().val(data.qc_member_1).trigger('change');
                    $('#qc_member_2').select2().val(data.qc_member_2).trigger('change');
                    $('#qc_member_3').select2().val(data.qc_member_3).trigger('change');
                    $('#mfg_member_1').select2().val(data.mfg_member_1).trigger('change');
                    $('#mfg_member_2').select2().val(data.mfg_member_2).trigger('change');
                    $('#mfg_member_3').select2().val(data.mfg_member_3).trigger('change');
                    $('#pc_member_1').select2().val(data.pc_member_1).trigger('change');
                    $('#pc_member_2').select2().val(data.pc_member_2).trigger('change');
                    $('#pc_member_3').select2().val(data.pc_member_3).trigger('change');
                    $('#qa_member_1').select2().val(data.qa_member_1).trigger('change');
                    $('#qa_member_2').select2().val(data.qa_member_2).trigger('change');
                    $('#qa_member_3').select2().val(data.qa_member_3).trigger('change');

                
              

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
              $('#exampleModalLabel').text('Edit Data'); //name view 
              $('#btnsubmit').text('Update'); //name Update  
              document.getElementById("btnsubmit").style.visibility = "visible"; 
            }
          
          }

  }

</script>

<script type="text/javascript">

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
            vurl = "<?php echo base_url('C_setting_app_member/ajax_add')?>";
          } else {           
            vurl = "<?php echo base_url('C_setting_app_member/ajax_update')?>";
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
                    tabel.draw();

                   if(!vurl=="Add"){
                     $("#modal-default").modal('hide');
                   }
                   location.reload();
                 
              },
              error: function (e) {
                  gagal(e);
                  //location.reload();
                  //error
              }
          });

  }


  function Delete_data(){

      // Form data
      var fdata = new FormData();
     
      // Delete by Hdrid
      fdata.append('hdrid',$('#iddelete').text());
      // Url Post delete
      vurl = "<?php echo base_url('C_setting_app_member/ajax_delete')?>";

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

  function Send_mail(){

    // Url Post delete
    vurl = "<?php echo base_url('C_Email/Send_mail')?>";
    // Form data
    var fdata = new FormData();
    fdata.append('hdrid','Hdrid123');

    // Post data
    $.ajax({
        url: vurl,
        method: "post",
        processData: false,
        contentType: false,
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

        tabel = $('#example1').DataTable({
            "processing": true,
            "responsive":true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            dom: "lfBrtip",
            buttons: [
              <?php if(!empty($hak_akses)){ if ($hak_akses->allow_export=='on') { ?>
            {
              extend: 'copyHtml5',
              className: 'btn btn-secondary',
              text: '<i class="fas fa-copy">&nbsp</i> Copy Data to Clipboard',
            },
            {
              extend: 'csvHtml5',
              className: 'btn btn-info',
              text: '<i class="fas fa-file-csv">&nbsp</i> Export Data to CSV',
            },
            {
              extend: 'excelHtml5',
              className: 'btn btn-success',
              text: '<i class="fas fa-file-excel">&nbsp</i> Export Data to Excel',
              customize: function ( xlsx ){
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // jQuery selector to add a border
                $( 'row c', sheet ).attr( 's', '25' );
              }
            },
            {
              extend : 'pdfHtml5',             
              className: 'btn btn-danger',
              text: '<i class="fas fa-file-pdf">&nbsp</i> Export Data to PDF',
              orientation : 'landscape',
              pageSize : 'A4',
              download: 'open'
            }<?php } }?>
          ],
            "ajax":
            {
                "url": "<?= base_url('C_setting_app_member/view_data_where');?>", // URL file untuk proses select datanya
                "type": "POST",
                "data": function(data){     
                  data.searchByFromdate = $('#search_fromdate').val();
                  data.searchByTodate = $('#search_todate').val();
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
                        mnu=mnu+'<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div>';
                        <?php if(!empty($hak_akses)){ if ($hak_akses->allow_edit=='on') { ?>
                          mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                          // return '<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div> <div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div> <div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                        <?php } }?>
                        <?php if(!empty($hak_akses)){ if ($hak_akses->allow_delete=='on') { ?> 
                        mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                        <?php } }?>
                          // return '<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div> ';
                        
                        //  mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                        
                        return mnu;

                    }  
                },
                
                // ---------------------------------- Datatables Macro Batas sini ---------------------------------
                 
                {"data":"hdrid"},
                {"data":"product"},
                {"data":"pe_member_1"},
                {"data":"pe_member_2"},
                {"data":"pe_member_3"},
                {"data":"qc_member_1"},
                {"data":"qc_member_2"},
                {"data":"qc_member_3"},
                {"data":"mfg_member_1"},
                {"data":"mfg_member_2"},
                {"data":"mfg_member_3"},
                {"data":"pc_member_1"},
                {"data":"pc_member_2"},
                {"data":"pc_member_3"},
                {"data":"qa_member_1"},
                {"data":"qa_member_2"},
                {"data":"qa_member_3"},

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
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>


<script type="text/javascript">


        /// @see handleSelectChange_pe_member_1()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_pe_member_1(event) {
      
        // //  By Text
        var value = $("#pe_member_1 option:selected").text();  
        var res = value.split("-");

        }
        /// @see handleSelectChange_pe_member_2()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_pe_member_2(event) {
      
        // //  By Text
        var value = $("#pe_member_2 option:selected").text();  
        var res = value.split("-");

        }
        /// @see handleSelectChange_pe_member_3()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_pe_member_3(event) {
      
        // //  By Text
        var value = $("#pe_member_3 option:selected").text();  
        var res = value.split("-");

        }


        /// @see handleSelectChange_qc_member_1()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_qc_member_1(event) {
      
        //  By Text
        var value = $("#qc_member_1 option:selected").text();  
        var res = value.split("-");
        }
        /// @see handleSelectChange_qc_member_2()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_qc_member_2(event) {
      
        //  By Text
        var value = $("#qc_member_2 option:selected").text();  
        var res = value.split("-");
        }

        /// @see handleSelectChange_qc_member_3()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_qc_member_3(event) {
      
        //  By Text
        var value = $("#qc_member_3 option:selected").text();  
        var res = value.split("-");

        }


        /// @see handleSelectChange_mfg_member_1()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_mfg_member_1(event) {
      
        //  By Text
        var value = $("#mfg_member_1 option:selected").text();  
        var res = value.split("-");

        }
        /// @see handleSelectChange_mfg_member_2()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_mfg_member_2(event) {
      
        //  By Text
        var value = $("#mfg_member_2 option:selected").text();  
        var res = value.split("-");

        }
        /// @see handleSelectChange_mfg_member_3()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_mfg_member_3(event) {
      
        //  By Text
        var value = $("#mfg_member_3 option:selected").text();  
        var res = value.split("-");

        }


        /// @see handleSelectChange_pc_member_1()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_pc_member_1(event) {
      
        //  By Text
        var value = $("#pc_member_1 option:selected").text();  
        var res = value.split("-");

        }
        /// @see handleSelectChange_pc_member_2()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_pc_member_2(event) {
      
        //  By Text
        var value = $("#pc_member_2 option:selected").text();  
        var res = value.split("-");

        }
        /// @see handleSelectChange_pc_member_3()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_pc_member_3(event) {
      
        //  By Text
        var value = $("#pc_member_3 option:selected").text();  
        var res = value.split("-");

        }


        /// @see handleSelectChange_qa_member_1()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_qa_member_1(event) {
      
        //  By Text
        var value = $("#qa_member_1 option:selected").text();  
        var res = value.split("-");

        }
        /// @see handleSelectChange_qa_member_2()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_qa_member_2(event) {
      
        //  By Text
        var value = $("#qa_member_2 option:selected").text();  
        var res = value.split("-");

        }
        /// @see handleSelectChange_qa_member_3()
        /// @note Mengisi field name,email
        /// @attention Select Filter
        function handleSelectChange_qa_member_3(event) {
      
        //  By Text
        var value = $("#qa_member_3 option:selected").text();  
        var res = value.split("-");

        }

        function handleSelectChange_product(event) {
      
        //  By Text
        var value = $("#product option:selected").text();  
        var res = value.split("-");

        }



  
</script>







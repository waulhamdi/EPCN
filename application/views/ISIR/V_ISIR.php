<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header"><!-- untuk kepala judul aplikasi -->
  <div class="container-fluid"><!--untuk jenis container-->
    <div class="row mb-2"><!-- untuk row aplikasi-->
      <div class="col-sm-6"><!--untuk ukuran panjang container-->
        <h1 class="m-0 text-dark">ISIR</h1><!-- untuk menampilkan judul-->
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
                <th>PCN NUMBER</th>
                <th>REMARK</th>
                <th>STATUS</th>
              
             
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
    <div class="modal-dialog modal-xl" role="document" >  <!--untuk tampilan add data aplikasi-->
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
          <div class="btn btn-success"  id="btn_add_row"  onclick="Add_row()"> Tambah isir </div> <!--fungsi untuk approve-->    

            <form class="form-horizntal" id="approvalform" role="form">
                  <div class="card-body">
                    <div class="table-responsive">

                      <table id="detailIsir" class="table table-bordered table-hover display nowrap table-striped" style="text-align:center">
                        <thead>
                          <tr>

                                      <th>ACTION</th>
                                      <th>NO ISIR</th>
                                      <th>ISIR SUPPLIER</th>
                                      <th>ISIR DETAIL IMPROVE</th>
                                      <th>ISIR RESULT QC</th>
                                      <th>REMARK</th>
                                      <th>STATUS</th>
                                      <!-- <th>OFFICE EMAIL</th>
                                      <th>POSITION CODE</th>
                                      <th>POSITION NAME</th>
                                      <th>DATE APPROVE</th> -->
                                    </tr>
                        </thead>
                        <tbody >
                        </tbody>

                        <tfoot>
                      
                        </tfoot>

                      </table>

                    </div>
                  </div>
                </form>
                
            

    <!---------------------------------- / Form Macro Batas sini ---------------------------------->


    
                <!-- Close Card Body -->  
                </div>
                  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btnsubmit" hidden>Save To Draft</button>   <!-- button save ke draft--> 
                    <!-- <button type="button" class="btn btn-success" id="btnsend" onclick="sendDraft()">Send</button>  button send                -->
                    <button type="button" class="btn btn-success" id="btnsend2" onclick="sendDraft2()">Save</button>      <!-- button save and send-->           
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
               
              <form method="POST" action="<?php echo base_url('C_ISIR/import'); ?>" enctype="multipart/form-data">

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

          <!-- modal-delete-isir -->
          <div class="modal fade" id="modal-delete-isir">
            <div class="modal-dialog">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Delete Data Isir</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <label id="hdrid_isir" > </label>Apakah ingin delete <label id="iddeleteisir"> </label> ?              
                </div>

                <div class="modal-footer justify-content-between">             
                  <form action="#" method="post">
                    <button type="button" id="delete" onclick="Delete_data_isir()" class="btn btn-outline-light">Yes</button>    
                  </form>     
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>       
                </div>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal Delete isir-->


           <!-- modal-isir-->
           <div class="modal fade" id="modal-isir">
           
            <div class="modal-dialog modal-lg">
              <div class="modal-content bg-white">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabelISIR">Edit Data ISIR</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <div class="form-group" hidden>
                    <div class="row">
                        <div class="col-md-4">
                          <label for="hdrid_cil">HdriD Cicilan</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="hdrid_cil" class="form-control" id="hdrid_cil">
                        </div>
                    </div>
                  </div> 
                  <form role="form" id="isirForm">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="no_isir">NO ISIR</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="no_isir" class="form-control" id="no_isir" readonly>
                        </div>
                    </div>
                  </div>  

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="remark">REMARK</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="remark" class="form-control" id="remark">
                        </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label>PIC PROCUREMENT</label>
                      </div>
                      <div class="col-md-8">
                        <select class="form-control select2" id="pic_pro" name="pic_pro" onchange="handleSelectChange_pic_pro(event)" style="width: 100%;">
                          <option value='' selected="selected">-Select-</option>
                          <?php
                            foreach ($user as $value) {
                            echo "<option value='$value->user_name'>$value->user_name - $value->name - $value->office_email - $value->department_name</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

              <div class="form-group" hidden>
                <div class="row">
                    <div class="col-md-4">
                      <label for="pro_name">PROCUREMENT NAME</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="pro_name" class="form-control" id="pro_name" readonly>
                    </div>
                </div>
              </div>

              <div class="form-group" hidden>
                <div class="row">
                    <div class="col-md-4">
                      <label for="pro_email">PRO EMAIL</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="pro_email" class="form-control" id="pro_email" readonly>
                    </div>
                </div>
              </div>


                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label>PIC QC</label>
                      </div>
                      <div class="col-md-8">
                        <select class="form-control select2" id="pic_qc" name="pic_qc" onchange="handleSelectChange_pic_qc(event)" style="width: 100%;">
                          <option value='' selected="selected">-Select-</option>
                          <?php
                            foreach ($user as $value) {
                            echo "<option value='$value->user_name'>$value->user_name - $value->name - $value->office_email - $value->department_name</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

              <div class="form-group" hidden>
                <div class="row">
                    <div class="col-md-4">
                      <label for="qc_name">QC NAME</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="qc_name" class="form-control" id="qc_name" readonly>
                    </div>
                </div>
              </div>

              <div class="form-group" hidden>
                <div class="row">
                    <div class="col-md-4">
                      <label for="qc_email">QC EMAIL</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="qc_email" class="form-control" id="qc_email" >
                    </div>
                </div>
              </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label>CC TO</label>
                      </div>
                      <div class="col-md-8">
                        <select class="form-control select2" id="cc_to1" name="cc_to1" onchange="handleSelectChange_cc_to1(event)" style="width: 100%;">
                          <option value='' selected="selected">-Select-</option>
                          <?php
                            foreach ($user as $value) {
                            echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->department_name</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label>CC TO</label>
                      </div>
                      <div class="col-md-8">
                        <select class="form-control select2" id="cc_to2" name="cc_to2" onchange="handleSelectChange_cc_to2(event)" style="width: 100%;">
                          <option value='' selected="selected">-Select-</option>
                          <?php
                            foreach ($user as $value) {
                            echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->department_name</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-1">
                        <a class="btn btn-success" id="isir_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-3">
                        <label for="isir">ISIR SUPPLIER</label>
                      </div>
                      <div class="col-md-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="isir" multiple="" name="isir">
                          <label class="custom-file-label" for="isir" id="isir_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  
               
                <div id="improvement">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-1">
                        <a class="btn btn-success" id="isir_imp_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-3">
                        <label for="isir_imp">DETAIL IMPROVE</label>
                      </div>
                      <div class="col-md-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="isir_imp" multiple="" name="isir_imp">
                          <label class="custom-file-label" for="isir_imp" id="isir_imp_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-1">
                        <a class="btn btn-success" id="deviasi_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-3">
                        <label for="deviasi">DEVIASI</label>
                      </div>
                      <div class="col-md-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="deviasi" multiple="" name="deviasi">
                          <label class="custom-file-label" for="deviasi" id="deviasi_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label>SUBMIT DATE:</label>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickersubmit_date" data-target-input="nearest">
                            <input type="text" id="submit_date" name="submit_date" class="form-control datetimepicker-input" data-target="#timepickersubmit_date"/>
                              <div class="input-group-append" data-target="#timepickersubmit_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-1">
                        <a class="btn btn-success" id="qc_result_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-3">
                        <label for="qc_result">QC RESULT</label>
                      </div>
                      <div class="col-md-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="qc_result" multiple="" name="qc_result">
                          <label class="custom-file-label" for="qc_result" id="qc_result_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-1">
                        <a class="btn btn-success" id="deviasi_result_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-3">
                        <label for="deviasi_result">DEVIASI RESULT</label>
                      </div>
                      <div class="col-md-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="deviasi_result" multiple="" name="deviasi_result">
                          <label class="custom-file-label" for="deviasi_result" id="deviasi_result_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label>QC SUBMIT DATE:</label>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerqc_submit_date" data-target-input="nearest">
                            <input type="text" id="qc_submit_date" name="qc_submit_date" class="form-control datetimepicker-input" data-target="#timepickerqc_submit_date"/>
                              <div class="input-group-append" data-target="#timepickerqc_submit_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>

                <div class="form-group" >
                  <div class="row">
                    <div class="col-md-4">
                      <label>STATUS</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2" id="status" name="status" onchange="handleSelectChange_status(event)" style="width: 100%;">
                        <option value='' selected="selected">-Select-</option>
                        <?php
                          foreach ($status as $value) {
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
                          <label for="comment">COMMENT</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="comment" class="form-control" id="comment">
                        </div>
                    </div>
                  </div> 
                
                

                
   
                </form>
                <div class="form-group" id="confirm_isir">
                    <div class="row">
                        <div class="col-md-4">
                          <label for="">Confirmation</label>
                        </div>
                        <div class="col-md-8">
                        <button class='btn btn-info ' id="received" data-toggle='modal' data-target='#modal-confirm-received' > Received </button>
                        <button class='btn btn-warning ' id="send_back" data-toggle='modal' data-target='#modal-confirm-back' > Send Back </button>
                        </div>
                    </div>
                  </div> 
                  <!-- <div>
                    <button class='btn btn-info ' data-toggle='modal' data-target='#modal-confirm-received' > Received </button>
                    <button class='btn btn-danger ' data-toggle='modal' data-target='#modal-confirm-back' > Send Back </button>
                  </div> -->
                </div>
                <div class="modal-footer justify-content-between">             
                  <form action="#" method="post">
                    <button type="button" id="insert_isir" onclick="Update_isir()" class="btn btn-primary">Update</button>    
                  </form>     
                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>       
                </div>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal isir-->

           <!-- Start modal-back -->
           <div class="modal fade" id="modal-confirm-back"> <!--untuk modal confirm approve-->
              <div class="modal-dialog"><!--untuk modal dialog-->
                  <div class="modal-content bg-danger"><!--untuk bg-success-->

                  <div class="modal-header"><!--untuk modal header-->
                      <h4 class="modal-title">Send Back To PIC Procurement</h4><!--title modal-->
                      <button type="button" class="close" data-dismiss="modal"  aria-label="Close"><!--fungsi button-->
                      <span aria-hidden="true">&times;</span><!--spam dengan lambang waktu-->
                      </button>
                  </div>

                  <div class="modal-body"><!--modal body-->
                      <div class="form-group"><!--form group-->
                      <div class="row"><!--row-->
                          <div class="col-md-3">
                          <label for="reason">REASON</label><!--judul label-->
                          </div>
                          <div class="col-md-9">
                          <textarea rows="2" type="text" name="reason" class="form-control" id="reason"></textarea><!--text area untuk reason-->
                          </div>
                      </div>
                      </div>
                  </div>

                  <div class="modal-footer justify-content-between"><!--untuk modal footer-->

                      <button type="button" id="delete" onclick="Send_Back()" class="btn btn-outline-light"><b>Send Back</b></button>
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal"><b>Cancel</b></button><!--button cancel-->

                  </div>

                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
          <!-- END modal-back -->

          <!-- Start modal-received -->
          <div class="modal fade" id="modal-confirm-received"> <!--untuk modal confirm approve-->
              <div class="modal-dialog"><!--untuk modal dialog-->
                  <div class="modal-content bg-info"><!--untuk bg-success-->

                  <div class="modal-header"><!--untuk modal header-->
                      <h4 class="modal-title">Confirmation Received</h4><!--title modal-->
                      <button type="button" class="close" data-dismiss="modal"  aria-label="Close"><!--fungsi button-->
                      <span aria-hidden="true">&times;</span><!--spam dengan lambang waktu-->
                      </button>
                  </div>

                  <div class="modal-body"><!--modal body-->
                      <div class="form-group"><!--form group-->
                      <div class="row"><!--row-->
                          <div class="col-md-3">
                          <label for="comment_rec">COMMENT</label><!--judul label-->
                          </div>
                          <div class="col-md-9">
                          <textarea rows="2" type="text" name="comment_rec" class="form-control" id="comment_rec"></textarea><!--text area untuk reason-->
                          </div>
                      </div>
                      </div>
                  </div>

                  <div class="modal-footer justify-content-between"><!--untuk modal footer-->

                      <button type="button" id="delete" onclick="Confirm_rec()" class="btn btn-outline-light"><b>Confirm</b></button>
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal"><b>Cancel</b></button><!--button cancel-->

                  </div>

                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
          <!-- END modal-received -->

      

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
            // document.getElementById("btnsend").style.visibility = "hidden";    // Visible button              
            document.getElementById("btnsend2").style.visibility = "visible";    // Visible button              
            //Ajax kosongkan data

          }else {

            // document.getElementById("btnsend").style.visibility = "visible";    // Visible button              
            //Ajax kosongkan data
           
            // Get Hdri ID
            $('#hdrid').val(hdrid1);
            var hdrid=hdrid1;   

            // Ajax isi data
              $.ajax({
              url: "<?php echo base_url('C_ISIR/ajax_getbyhdrid1')?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

                  // ---------------------------------- Data val Macro  Batas sini ------------------------------
              

              tabel3.draw();

                // ---------------------------------- / Data val Macro  Batas sini ------------------------------
                                                           
                                                             
                },
              error: function (e) {
                      alert(e);
                     
                  }
            });
            
            // Disable and button submit dan text form           
            if(status=="View"){
              document.getElementById("btnsubmit").style.visibility = "hidden";   //fungsi hidden tombol submit
              // document.getElementById("btnsend").style.visibility = "hidden";   //fungsi hidden tombol save dan send
              document.getElementById("btnsend2").style.visibility = "hidden";  //fungsi hidden tombol send
              $('#exampleModalLabel').text('View Data'); //name view  
              document.getElementById("btn_add_row").style.display = "none";  //fungsi hidden tombol send
            }else{
              $('#exampleModalLabel').text('Edit Data'); //name view 
              $('#btnsubmit').text('Update'); //name Update  
              document.getElementById("btnsend2").style.visibility = "hidden"; //fungsi hidden tombol send
              document.getElementById("btnsubmit").style.visibility = "visible";  //fungsi visible tombol submit
              document.getElementById("btn_add_row").style.display = "";  //fungsi hidden tombol send
        
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
            vurl = "<?php echo base_url('C_ISIR/ajax_add')?>";//link simpan data
          } else {           
            vurl = "<?php echo base_url('C_ISIR/ajax_update')?>";//link update data
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
vurl = "<?php echo base_url('C_ISIR/ajax_sendDraft')?>";//link senddraft
    
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
    vurl = "<?php echo base_url('C_ISIR/ajax_add') ?>"; //link senddraft2

    $.ajax({ //ajax pada send draft
      url: vurl, //url
      method: "post", //jenis method pst
      processData: false,//false process
      contentType: false,//false content
      data: fdata,
      success: function(data) {

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
vurl = "<?php echo base_url('C_ISIR/ajax_delete')?>";//link untuk delete

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

    //  HDRID selected  konfirmasiEdit
    $(document).on("click", ".konfirmasiEditIsir", function() {     
    view_modal_isir($(this).attr("data-id"),'Edit');
    })

    $(document).on("click", ".konfirmasiViewIsir", function() {     
    view_modal_isir($(this).attr("data-id"),'ViewIsir');
    })

    //  HDRID selected KonfirmasiReturn
    $(document).on("click", ".konfirmasiHapusisir", function() {
    let str = $(this).attr("data-id");
    const myArr = str.split("#");
    $('#hdrid_isir').text(myArr[0]);
    $('#iddeleteisir').text(myArr[1]);
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

    //Date range picker
    $('#timepickerqc_submit_date').datetimepicker({
            format: 'L',           
            minDate: new Date(2022,1-1)
    });

    //Date range picker
    $('#timepickersubmit_date').datetimepicker({
            format: 'L',           
            minDate: new Date(2022,1-1)
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

      tabel3 = $('#detailIsir').DataTable({
                
               
        "processing": true,//processing true jika data masuk table
        "scrollX" : true,
        // "responsive":true,//respon jika data masuk akan muncul pop up data
        "serverSide": true, //untuk data masuk server 
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 1, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        
          "ajax": {
            // status=="Edit Data"
            "url": "<?= base_url('C_isir/View_detail_isir');?>",
            "type": "POST",
            "data": function(data) {
              // data.searchByFromdate = $('#search_fromdate').val();
              // data.searchByTodate = $('#search_todate').val();
              data.hdrid = $('#hdrid').val();
            }

          },
          "deferRender": true,
          "aLengthMenu": [
            [10, 100, 1000, 10000, 100000, 1000000, 1000000000],
            [10, 100, 1000, 10000, 100000, 1000000, "All"]
          ], // Combobox Limit  
                
          "columns": [
            {"data": 'hdrid',"sortable": false, //1
                render: function (data, type, row, meta) {
                        // return meta.row + meta.settings._iDisplayStart + 1;
                        // return '<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div> <div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div> <div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                        mnu='';
                            // Tombol View
                            mnu=mnu+'<div class="btn btn-success btn-sm konfirmasiViewIsir mr-2"  data-id="'+ row.hdrid +"#"+ row.no_isir +'" data-toggle="modal" data-target="#modal-isir"> <i class="fa fa-eye"></i></div>';
                            
                            <?php if(!empty($hak_akses)){ if ($hak_akses->allow_edit=='on') { ?>
                            // Tombol Edit
                              mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEditIsir mr-2"  data-id="'+ row.hdrid +"#"+ row.no_isir +'" data-toggle="modal" data-target="#modal-isir"> <i class="fa fa-edit"></i></div>';
                            <?php } } ?>
                            <?php if(!empty($hak_akses)){ if ($hak_akses->allow_delete=='on') { ?>
                            //Tombol Delete
                              mnu=mnu+'<div class="btn btn-danger btn-sm konfirmasiHapusisir mr-2"  data-id="'+ row.hdrid +"#"+ row.no_isir +'" data-toggle="modal" data-target="#modal-delete-isir" > <i class="fa fa-trash"></i></div>';
                            <?php } } ?>

                        return mnu;
                    }  
                },
              {"data":"no_isir"},
              {"data":"isir"},
              {"data":"isir_imp"},
              {"data":"qc_result"},
              {"data":"remark"},
              {"data":"status"},

          ],

          
          }); //add tfoot

        tabel = $('#example1').DataTable({//table
            "processing": true,//processing true jika data masuk table
            // "scrollX" : true,
            "responsive":true,//respon jika data masuk akan muncul pop up data
            "serverSide": true, //untuk data masuk server 
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            dom: "lfBrtip",
            buttons: [
              <?php if(!empty($hak_akses)){ if ($hak_akses->allow_export=='on') { ?>
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
            }<?php } }?>
          ],
            "ajax":
            {
                "url": "<?= base_url('C_ISIR/view_data_where');?>", // URL file untuk proses select datanya
                "type": "POST", //post select datanya
                "data": function(data){     
                  data.searchByFromdate = $('#search_fromdate').val(); //value from date
                  data.searchByTodate = $('#search_todate').val(); //value to date
                  data.Number = "<?= $Number ?>";

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
                        mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                      <?php } }?>
                        mnu = mnu + '<a class="btn btn-secondary btn-sm mr-2"  href="<?php echo base_url('C_PrintA4_isir/print_report2_approved?Number=') . "'+ data +' "  ?>"  target="_blank"> <i class="fas fa-print mr-1"></i>A4</a>'
                        
                        return mnu;

                    }  
                },
                
                // ---------------------------------- Datatables Macro Batas sini ---------------------------------
               
                {"data":"hdrid"},
                {"data":"remark"},
                {"data":"status"},
 


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


      ///@see handleSelectChange_status()
      ///@note Handle untuk select filter
      ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
      function handleSelectChange_status(event) {
        
        var data = $('#status').select2('data')[0].text;
   
        // console.log(data);
        // if (data =='Accepted') {
        //    document.getElementById("comment").style.display = "none";
        //   // $("#comment1").css('display','block');


        // }else{
        //    document.getElementById("comment").style.display = "";
        //   // $("#comment1").css('display','none');

        // }
      
      }

      ///@see handleSelectChange_pic_pro()
      ///@note Handle untuk select filter
      ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
      function handleSelectChange_pic_pro(event) {
        
        var value = $("#pic_pro option:selected").text();  
        var res = value.split(" - ");
          $('#pic_pro').val(res[0]);
          $('#pro_name').val(res[1]);
          $('#pro_email').val(res[2]);
      }

      ///@see handleSelectChange_pic_qc()
      ///@note Handle untuk select filter
      ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
      function handleSelectChange_pic_qc(event) {
        
        var value = $("#pic_qc option:selected").text();  
        var res = value.split(" - ");
          $('#pic_qc').val(res[0]);
          $('#qc_name').val(res[1]);
          $('#qc_email').val(res[2]);
      }

      ///@see handleSelectChange_cc_to1()
      ///@note Handle untuk select filter
      ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
      function handleSelectChange_cc_to1(event) {
        
        var data = $('#cc_to1').select2('data')[0].text;
     
      }

      ///@see handleSelectChange_cc_to2()
      ///@note Handle untuk select filter
      ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
      function handleSelectChange_cc_to2(event) {
        
        var data = $('#cc_to2').select2('data')[0].text;
     
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

    /// @see view_modal_isir
    /// @note Menampilkan modal(View,Edit)
    /// @attention Menampilkan modal,mengisi data field apabila status view or edit or add(beberapa field otomatis terisi)
    function view_modal_isir(hdrid1,status){

      
     
          if (status=="Add"){

          }else {
           
            // Get Hdri ID
            
            let str = hdrid1;
            const myArr = str.split("#");
            $('#hdrid_cil').val(myArr[0]);
            $('#no_isir').val(myArr[1]);
            var hdrid=myArr[0];
            var no_isir=myArr[1];
           
                // Ajax isi data
                  $.ajax({
                  url: "<?php echo base_url('C_Isir/ajax_getbyisir')?>",
                  method: "get",
                  dataType : "JSON",              
                  data: {"hdrid":hdrid,"no_isir":no_isir},
                  success: function (data) {

                      // ---------------------------------- Data val Macro Batas sini ---------------------------------                  
                      $('#remark').val(data.remark);
                  
                      $('#pic_pro').select2().val(data.pic_pro).trigger('change');
                      $('#pic_qc').select2().val(data.pic_qc).trigger('change');
                      $('#cc_to1').select2().val(data.cc_to1).trigger('change');
                      $('#cc_to2').select2().val(data.cc_to2).trigger('change');

                      document.getElementById('isir_label').innerHTML=data.isir;
                      var a = document.getElementById('isir_view');
                      if(!data.isir==''){
                        a.href = "<?php echo base_url('assets/upload/isir/') ?>" + data.isir;
                      }else{
                        a.removeAttribute("href");
                      };
                      document.getElementById('isir_imp_label').innerHTML=data.isir_imp;
                      var a = document.getElementById('isir_imp_view');
                      if(!data.isir_imp==''){
                        a.href = "<?php echo base_url('assets/upload/isir/') ?>" + data.isir_imp;
                      }else{
                        a.removeAttribute("href");
                      };
                      $('#submit_date').val(data.submit_date);
                      document.getElementById('qc_result_label').innerHTML=data.qc_result;
                      var a = document.getElementById('qc_result_view');
                      if(!data.qc_result==''){
                        a.href = "<?php echo base_url('assets/upload/isir/') ?>" + data.qc_result;
                      }else{
                        a.removeAttribute("href");
                      };
                      document.getElementById('deviasi_label').innerHTML=data.deviasi;
                      var a = document.getElementById('deviasi_view');
                      if(!data.deviasi==''){
                        a.href = "<?php echo base_url('assets/upload/isir/') ?>" + data.deviasi;
                      }else{
                        a.removeAttribute("href");
                      };
                      document.getElementById('deviasi_result_label').innerHTML=data.deviasi_result;
                      var a = document.getElementById('deviasi_result_view');
                      if(!data.deviasi_result==''){
                        a.href = "<?php echo base_url('assets/upload/isir/') ?>" + data.deviasi_result;
                      }else{
                        a.removeAttribute("href");
                      };



                      $('#qc_submit_date').val(data.qc_submit_date);
                      $('#qc_email').val(data.qc_email);
                      $('#pro_email').val(data.pro_email);
                      $('#status').select2().val(data.status).trigger('change');
                      $('#comment').val(data.comment);

                      // Rule Access User
                      let nik="<?php echo $this->session->userdata('user_name') ?>";

                      if (nik == data.pic_pro ) {
                          document.getElementById('comment').readOnly = true; 
                          document.getElementById('status').disabled = true; 
                          document.getElementById('qc_submit_date').disabled = true; 
                          document.getElementById('deviasi_result').disabled = true; 
                          document.getElementById('qc_result').disabled = true; 
                          document.getElementById('received').disabled = true; 
                          document.getElementById('send_back').disabled = true; 
                          document.getElementById('insert_isir').disabled = false; 

                      } else if(nik == data.pic_qc || nik == data.cc_to1 || nik == data.cc_to2 ){
                          document.getElementById('remark').readOnly = true; 
                          document.getElementById('pic_pro').disabled = true; 
                          document.getElementById('pic_qc').disabled = true; 
                          document.getElementById('cc_to1').disabled = true; 
                          document.getElementById('cc_to2').disabled = true; 
                          document.getElementById('isir').disabled = true; 
                          document.getElementById('submit_date').disabled = true; 
                          document.getElementById('isir_imp').disabled = true; 
                          document.getElementById('deviasi').disabled = true; 
                          document.getElementById('insert_isir').disabled = false; 

                      } else {

                          document.getElementById('received').disabled = true; 
                          document.getElementById('send_back').disabled = true; 
                          document.getElementById('insert_isir').disabled = true; 

                      }
                      // Hide detail improve kalau ISIR T01
                      if (no_isir == 'T01') {
                        document.getElementById("improvement").style.display = "none";
                      }else{
                        document.getElementById("improvement").style.display = "";
                      }
                      
                      
                      // ---------------------------------- / Data val Macro  Batas sini ------------------------------
              
                                                              
                    },
                  error: function(e) {
                  alert(e);
                  }
                  });

           // Add Data


      // fungsi untuk disable dan enable button  
      if(status=="ViewIsir"){
        $('#exampleModalLabelISIR').text('View Data ISIR'); //name view 
        // $('#btnsubmit').text('Tes'); //name Update               
        document.getElementById("confirm_isir").style.display = "none"; 
        document.getElementById("insert_isir").style.display = "none"; 
        
    


      }else{

        // $('#exampleModalLabel').text('Edit Data'); //name view 
        // $('#btnsubmit').text('Update'); //name Update  
        document.getElementById("btnsubmit").style.visibility="visible"; 
        document.getElementById("confirm_isir").style.display = ""; 
        document.getElementById("insert_isir").style.display = ""; 

      
  
      
    }

      }

      }



      /// @see Add_row
      /// @note Tambah row cicilan
      /// @attention Menambah row di list cicilan
      function Add_row() {
      
      var fdata2 = new FormData();
      // if ($('#hdrid').val() == '') {
      //   fdata2.append('hdrid','<?php echo $this->session->userdata('user_name'); ?>');
      // } else {
        fdata2.append('hdrid',$('#hdrid').val());
      // }
        
    
      var vurl2; 
      vurl2 = "<?php echo base_url('C_Isir/Ajax_Add_Row')?>";

                $.ajax({
                url: vurl2,
                method: "post",
                processData: false,
                contentType: false,
                data: fdata2,
                success: function (data) {    
                  tabel3.draw();

                },
                error: function (e) {
                  
                        berhasil(e);
                }
            });

         }


        /// @see  Delete_data_isir()
        /// @note Delete data
        /// @attention Mengirim hdrid,no cicilan ke controller 
        function Delete_data_isir(){

        // Form data
        var fdata = new FormData();

        // Delete by Hdrid

        fdata.append('no_isir',$('#iddeleteisir').text());
        fdata.append('hdrid',$('#hdrid_isir').text());
        // Url Post delete
        vurl = "<?php echo base_url('C_Isir/ajax_delete_isir')?>";

        // Post data
        $.ajax({
            url: vurl,
            method: "post",
            processData: false,
            contentType: false,
            data: fdata,
            success: function (data) {

                // Hide modal delete
                $('#modal-delete-isir').modal('hide');
                // Delete rows datatables
                $('#detailIsir').DataTable().row("#"+$('#iddeleteisir').text()).remove().draw();
                // Pesan berhasil
                berhasil(data.status);   

            },
            error: function (e) {
                //Pesan Gagal
                gagal(e);             
            }
        });

        }

        /// @see  Update_isir()
        /// @note untuk membuat trigger jika data sudah terupdate
        /// @attention data update notifikasi juga terupdate
        function Update_isir(){

        // Form data
        var fdata = new FormData();

        fdata.append('hdrid',$('#hdrid_cil').val());
        // fdata.append('no_isir',$('#no_isir').val());
        // fdata.append('remark',$('#remark').val());
        // fdata.append('isir',$('#isir').val());
        // fdata.append('isir_imp',$('#isir_imp').val());
        // fdata.append('qc_result',$('#qc_result').val());
        // fdata.append('status',$('#status').val());

        var form_data = $('#isirForm').serializeArray();
          $.each(form_data, function (key, input) {
            fdata.append(input.name, input.value);
          });
          
          // Penanganan jika ada type check Box uncheck
          $('#isirForm input[type="checkbox"]:not(:checked)').each(function(i, e) {           
              fdata.append(e.getAttribute("name"),"Off");
          });

          // Penanganan jika ada type attach file
          $('#isirForm input[type="file"]').each(function(i, e) {     
              // jika ada file attach maka akan ditambahkan  
              if ($('#'+e.getAttribute("name")).val()) {   
                var file_data = $('#'+e.getAttribute("name")).prop('files')[0];
                fdata.append(e.getAttribute("name"),file_data);                            
              }
          });

          
     

        // Url Post delete
        vurl = "<?php echo base_url('C_Isir/ajax_update_isir')?>";

        // Post data
        $.ajax({
            url: vurl,
            method: "post",
            processData: false,
            contentType: false,
            data: fdata,
            success: function (data) {

                // Hide modal delete
                $('#modal-isir').modal('hide');
                $('#detailIsir').DataTable().row("#"+$('#no_isir').val()).draw();
                // Pesan berhasil
                berhasil(data.status);

                //  $("#modal-default").modal('hide');
                var fdata3 = new FormData();
                   
             
                fdata3.append('hdrid',data.hdrid);
                fdata3.append('no_isir',data.no_isir);
                fdata3.append('sender','<?php echo $this->session->userdata('user_name'); ?>');

                  $.ajax({
                  url: "<?php echo base_url('C_Mail/ajax_mail_isir')?>",
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
                        tabel.draw();
                        // location.reload();

                      }
                  });
            },
            error: function (e) {
                //Pesan Gagal
                gagal(e);             
            }
        });

        }

        /// @see  Confirm_rec()
        /// @note send email received to creator
        /// @attention Mengirim data ke controller
        function Confirm_rec(){

      

        // Form data
        var fdata = new FormData();

        // Delete by Hdrid

        fdata.append('hdrid', $('#hdrid').val());//reason
        fdata.append('page', "ISIR");//reason
        fdata.append('no_isir', $('#no_isir').val());//reason
        fdata.append('reason', $('#comment_rec').val());//reason
        fdata.append('sender', "<?php echo $this->session->nama; ?>");//update position code

        // Url Post delete
        vurl = "<?php echo base_url('C_Mail/ajax_received')?>";

        // Post data
        $.ajax({
            url: vurl,
            method: "post",
            processData: false,
            contentType: false,
            data: fdata,
            success: function (data) {

                // Hide modal delete
                $('#modal-confirm-received').modal('hide');
                // Delete rows datatables
                // $('#detailIsir').DataTable().row("#"+$('#iddeleteisir').text()).remove().draw();
                // Pesan berhasil
                berhasil(data.status);   

            },
            error: function (e) {
                //Pesan Gagal
                gagal(e);             
            }
        });

        }

        /// @see  Send_Back()
        /// @note Send email rejected to creator
        /// @attention Mengirim data ke controller 
        function Send_Back(){

        // Validasi reason harus diisi
        // if ($('#reason').val() == '') {
        //   gagal('Reason wajib diisi...');
        //   return false;
        // }

        // Form data
        var fdata = new FormData();

        // Delete by Hdrid

        fdata.append('hdrid', $('#hdrid').val());//reason
        fdata.append('page', "ISIR");//reason
        fdata.append('no_isir', $('#no_isir').val());//reason
        fdata.append('reason', $('#reason').val());//reason
        fdata.append('sender', "<?php echo $this->session->nama; ?>");//update position code

        // Url Post delete
        vurl = "<?php echo base_url('C_Mail/ajax_back')?>";

        // Post data
        $.ajax({
            url: vurl,
            method: "post",
            processData: false,
            contentType: false,
            data: fdata,
            success: function (data) {

                // Hide modal delete
                $('#modal-confirm-back').modal('hide');
                // Delete rows datatables
                // $('#detailIsir').DataTable().row("#"+$('#iddeleteisir').text()).remove().draw();
                // Pesan berhasil
                berhasil(data.status);   

            },
            error: function (e) {
                //Pesan Gagal
                gagal(e);             
            }
        });

        }


  </script>










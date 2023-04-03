  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid"><!-- untuk container-->
        <div class="row mb-2"><!-- untuk row aplikasi-->
          <div class="col-sm-6"><!--untuk ukuran panjang container-->
            <h1 class="m-0 text-dark">PCN LIST Form</h1><!-- untuk menampilkan judul-->
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


        <!-- ##################################### Batas Row 1 #####################################  -->

          <div class="col-12"> <!-- .col -->

            <div class="card"> <!-- .card -->

              <!-- .card-header -->
              <div class="card-header"> <!-- untuk bagian kepala aplikasi -->              
                <div class="row"><!-- untuk row aplikasi-->
                   <div class="col-md-12"><!--untuk ukuran panjang container-->
                    <div class="card">       <!--untuk class bagian kepala aplikasi-->       
                      <div class="card-header">    <!--untuk jenis bagian kepala aplikasi-->
                      <div id="accordion"> <!--untuk menampilkan dan menyembunyikan element HTML-->
                          <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                          <div class="card card-primary"> <!--untuk primary kepala aplikasi-->

                            <div class="card-header"><!--untuk jenis bagian kepala aplikasi-->

                              <h4 class="card-title"><!--untuk judul bagian kepala aplikasi-->
                               
                                <!-- <php if ($this->session->userdata('DepartmentAdd')||$this->session->userdata('rolename')=='Administrator Quality'||$this->session->userdata('rolename')=='User Procurement') { ?>  untuk membuat rule hanya user bisa add data -->

                                  <!-- <a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal('1','Add')" href="#"> fungsi add data -->
                                    <!-- <i class="fa fa-plus"></i> Add Data judul add data-->
                                  <!-- </a>  -->

                                <!-- <php } ?> -->

                                <?php if (!empty($hak_akses)) {
                                  if ($hak_akses->allow_import == 'on') { ?>
                                              <a data-toggle="modal" data-target="#modal-import"  href="#"><!--fungsi import data-->
                                                <i class="fa fa-upload"></i> Import Data <!--judul import  data-->
                                              </a>
                                      <?php }
                                } ?>
                                  <!-- <a data-toggle="modal" data-target="#modal-import"  href="#"> fungsi add data -->
                                    <!-- <i class="fa fa-upload"></i> Import Datajudul add data -->
                                  <!-- </a> -->


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
                <table id="example1" class="table table-bordered display nowrap table-striped" > <!--jenis table-->
                  <thead>
                    <tr>
                      <!-- Th Macro Batas Sini -->
                      <th>ACTION</th>
                      <!-- <th>TRANSACTION ID</th> -->
                      <th>NO DOKUMEN</th>
                      <th>STATUS</th>
                      <th>CATEGORY</th>
                      <th>SUPPLIER NAME</th>
                      <th>PRODUCT NAME</th>
                      <th>PART NAME</th>
                      <!-- <th>AE</th> -->
                      <th>PART NO</th>
                      <th>DESCRIPTION</th>
                      <th>PROSES PERUBAHAN (LAMA/BEFORE)</th>
                      <th>PROSES PERUBAHAN (BARU/AFTER)</th>
                      <th>CURRENT FLOW PIC</th>
                      <th>PIC PROC</th>
                      <th>CHECKED PROC</th>
                      <th>APPROVED PROC</th>
                      <th>COMMODITY</th>
                      <th>PIC QA</th>
                      <th>CHECKED QA</th>
                      <th>APPROVED QA</th>
                      <th>REGISTERED</th>
                      <th>MASSPRO SCHEDULE</th>
                      <th>ATTACHMENT</th>
                      <th>OTHER ATTACHMENT</th>
                      <!-- <th>Detail Of Process Change (6M+EAS)</th> -->
                      <!-- /Th Macro Batas Sini -->
                    </tr>
                  </thead>
                  <!-- <tbody></tbody> -->
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
                  <button type="button" class="close" aria-label="Close" data-dismiss="modal" > <!--untuk fungsi tombol close-->
                  <span aria-hidden="true">&times;</span> <!-- jika data ditambah maka data akan muncul--> 
                  </button>
              </div>

              <!-- form -->
              <form role="form" id="quickForm">

                <div class="card-body">

                <!---------------------------------- Form Macro Batas sini ---------------------------------->
                <!-- <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="pcn_number">TRANSACTION ID</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="pcn_number" class="form-control" id="pcn_number" placeholder="auto generate" readonly>
                      </div>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="no_dokumen">NO DOKUMEN</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="no_dokumen" class="form-control" id="no_dokumen" readonly>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="status">STATUS</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="status" class="form-control" id="status" readonly >
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="category">CATEGORY</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="category" class="form-control" id="category" readonly>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="supplier_name">SUPPLIER NAME</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="supplier_name" class="form-control" id="supplier_name" readonly>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="product_name">PRODUCT NAME</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="product_name" class="form-control" id="product_name" readonly>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="part_name">PART NAME</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="part_name" class="form-control" id="part_name" readonly>
                      </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="ae">AE</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="ae" class="form-control" id="ae" >
                      </div>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="part_no">PART NO</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="part_no" class="form-control" id="part_no" readonly>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="description">DESCRIPTION</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="description" class="form-control" id="description" readonly>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="proses_perubahan_lama">PROSES PERUBAHAN LAMA</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="proses_perubahan_lama" class="form-control" id="proses_perubahan_lama" readonly>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="proses_perubahan_baru">PROSES PERUBAHAN BARU</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="proses_perubahan_baru" class="form-control" id="proses_perubahan_baru" readonly>
                      </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="current_flow_pic">CURRENT FLOW PIC</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="current_flow_pic" class="form-control" id="current_flow_pic" >
                      </div>
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="pic_proc">PIC PROC</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="pic_proc" class="form-control" id="pic_proc" >
                      </div>
                  </div>
                </div> -->
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
                <!-- <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="qa_pic">QA PIC</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="qa_pic" class="form-control" id="qa_pic" >
                      </div>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label>REGISTERED</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="registered" class="form-control" id="registered" >
                      </div>
                  </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="attachment">ATTACHMENT</label>
                      </div>
                      <div class="col-md-1">
                        <a class="btn btn-danger" data-id="attachment" target="_blank" data-value="attach" onclick="delete_attachment()"> <i class="fa fa-trash"></i></a>
                      </div>
                      <div class="col-md-1">
                        <a class="btn btn-success" id="attachment_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-6">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="attachment" multiple="" name="attachment">
                          <label class="custom-file-label" for="attachment" id="attachment_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="attachment1" >OTHER ATTACHMENT</label>
                      </div>
                      <div class="col-md-1">
                        <a class="btn btn-danger" data-id="attachment1" target="_blank" data-value="attach1" onclick="delete_attachment()"> <i class="fa fa-trash"></i> </a>
                      </div>
                      <div class="col-md-1">
                        <a class="btn btn-success" id="attachment1_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                      </div>
                      <div class="col-md-6">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="attachment1" multiple="" name="attachment1">
                          <label class="custom-file-label" for="attachment1" id="attachment1_label">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Style dan Tombol View all attachment-->
                  <style>
                    #myBtn {
                      display: inline-block;
                      padding: 0.5em 1em;
                      background-color: #0074D9;
                      color: #ffffff;
                      border-radius: 4px;
                      text-decoration: none;
                    }
                    </style>
                    <!-- tutup style-->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label hidden>All Attachment</label>
                        </div>
                        <div class="col-md-8">
                          <a id="myBtn" class="btn" data-toggle="modal" data-target="#modal-attachment" >View All Attachment</a>
                        </div>
                      </div>
                    </div>

                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="masspro_schedule">MASSPRO SCHEDULE</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="masspro_schedule" class="form-control" id="masspro_schedule" >
                      </div>
                  </div>
                </div>

                <!-------------------- Modal Attachment -------------------->
            <!--  modal-attachment --> 
            <div class="modal fade" id="modal-attachment" tabindex="-1" role="dialog" aria-labelledby="modalattachmentlabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document" >
                    <div class="modal-content">            
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalattachmentlabel">ATTACHMENT PCN</h5>
                            <!-- <button type="button" class="btn-close" data-dismiss="#modal-attachment" aria-label="Close"> -->
                            <button type="button" class="btn btn-danger" onclick="document.getElementById('modal-attachment').style.display='none'">Close</button>
                            <!-- <span aria-hidden="true">&times;</span> -->
                            </button>
                        </div>

                    <!-- form -->
                    <form role="form" id="quickForm">

                        <div class="card-body">
                        <hr style="border:0.5px solid white;">
                        <!---------------------------------- Form Macro Batas sini ---------------------------------->
                                <div class="form-group" id='attach1'>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="attach_doc1">Detail Of Process Change (6M+EAS) <font color='red'>*</font></label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc1_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc2">Supplier Inspection Standard</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc2_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc3">Control Plan/QCPC</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc3_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc4">FMEA</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc4_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc5">QA Network</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc5_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc6">Initial Proces Capability Study (Cp,Cpk)</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc6_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc7_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc8">Procces Flow Diagram</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc8_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc9">Dimensional Results (Layout Inspection,n=1)</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc9_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc10">Part Submission Warrant (PSW)</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc10_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc11">ISIR + Baloon Drawing (n=3/cavity)</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc11_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc12">Record Of SOC Compliance With Customer Specific Requiretments</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc12_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc13"> Proof Of SOC Compliance(10 substance) </label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc13_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc14_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc15">Packaging Specification</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc15_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc16">QC PLAN</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc16_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc17">Lot Control System</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc17_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc18">Supply Chain</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc18_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc19">Sample Part (After ISIR Ok)</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc19_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attach_doc19" multiple="" name="attach_doc19">
                                        <label class="custom-file-label" for="attach_doc19" id="attach_doc19_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div id="form_supplier1" class="form_supplier1">
                                <div id="form_supplier1" class="form_supplier2">
                                <div class="form-group" id='attach20' value='20'>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="attach_doc20">Company Profile</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc20_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attach_doc20" multiple="" name="attach_doc20">
                                        <label class="custom-file-label" for="attach_doc20" id="attach_doc20_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group" id='attach21' value='21'>
                                  <div class="row">
                                  <div class="col-md-4">
                                    <label for="attach_doc21">Production Layout Factory</label>
                                  </div>
                                  <div class="col-md-1">
                                    <a class="btn btn-success" id="attach_doc21_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                  </div>
                                  <div class="col-md-7">
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
                                    <label for="attach_doc22">Capactiy Review <font color='red'>*</font></label>
                                  </div>
                                  <div class="col-md-1">
                                    <a class="btn btn-success" id="attach_doc22_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                  </div>
                                  <div class="col-md-7">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="attach_doc22" multiple="" name="attach_doc22">
                                      <label class="custom-file-label" for="attach_doc22" id="attach_doc22_label">Choose file</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group" id='attach23' value='23'>
                                <div class="row">
                                  <div class="col-md-4">
                                    <label for="attach_doc23">Quality System Certification</label>
                                  </div>
                                  <div class="col-md-1">
                                    <a class="btn btn-success" id="attach_doc23_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                  </div>
                                  <div class="col-md-7">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="attach_doc23" multiple="" name="attach_doc23">
                                      <label class="custom-file-label" for="attach_doc23" id="attach_doc23_label">Choose file</label>
                                    </div>
                                  </div>
                                </div>
                              </div>

                                <div class="form-group" id='attach24' value='24'>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="attach_doc24">Audit Report by DIAT(Spesial Process)</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc24_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc25">Audit Report by Denso OGC (IF Necesary)</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc25_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                      <label for="attach_doc26">Kakotora With Prevention</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc26_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc_27_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
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
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc28_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attach_doc28" multiple="" name="attach_doc28">
                                        <label class="custom-file-label" for="attach_doc28" id="attach_doc28_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group" id='attach29'>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="attach_doc29">PARAMETER SETTTING COMPARE OPTIONAL)</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attach_doc29_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attach_doc29" multiple="" name="attach_doc29">
                                        <label class="custom-file-label" for="attach_doc29" id="attach_doc29_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="attachment">ATTACHMENT</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attachment_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attachment" multiple="" name="attachment">
                                        <label class="custom-file-label" for="attachment" id="attachment_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="attachment1" >OTHER ATTACHMENT</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attachment1_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attachment1" multiple="" name="attachment1">
                                        <label class="custom-file-label" for="attachment1" id="attachment1_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="attachment2" >OTHER ATTACHMENT</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attachment2_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attachment2" multiple="" name="attachment2">
                                        <label class="custom-file-label" for="attachment2" id="attachment2_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="attachment3">OTHER ATTACHMENT</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="attachment3_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attachment3" multiple="" name="attachment3">
                                        <label class="custom-file-label" for="attachment3" id="attachment3_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="isir">ISIR</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="isir_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="isir" multiple="" name="isir">
                                        <label class="custom-file-label" for="isir" id="isir_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="qcr">QCR</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="qcr_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="qcr" multiple="" name="qcr">
                                        <label class="custom-file-label" for="qcr" id="qcr_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="report_pe">Technical Report PE</label>
                                    </div>
                                    <div class="col-md-1">
                                      <a class="btn btn-success" id="report_pe_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="report_pe" multiple="" name="report_pe">
                                        <label class="custom-file-label" for="report_pe" id="report_pe_label">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                            <br>
                        <hr style="border:0.5px solid white;">

                        <!-- Close Card Body -->  
                        </div>
                        
                            <div class="card-footer">               
                                <!-- <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button> -->
                                <button type="button" class="btn btn-danger float-right" onclick="document.getElementById('modal-attachment').style.display='none'">Close</button>                   
                            </div>
                                    
                    </form>    
                    <!-- /form  -->

                    </div> 
                    <!-- Close modal-content -->  
                </div>
                <!-- Close modal-dialog -->  
            </div>
            <!-- modal-attachment -->
                      <!---------------------------------- / Form Macro Batas sini ---------------------------------->
              
                    <div class="card-footer">  <!-- footer kepala aplikasi --> 
                      <button type="submit" class="btn btn-primary" id="btnsubmit">Save</button>     <!-- button save--> 
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>    <!-- button close-->        
                    </div>
                  </div>
                <!-- Close Card Body -->  
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
               
              <form method="POST" action="<?php echo base_url('C_PCNLIST/import'); ?>" enctype="multipart/form-data"> <!--untuk connect ke controller--> 

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
        // no_dokumen: {
        // required: true,
        // },
        // // status: {
        // // required: true,
        // // },
        // category: {
        // required: true,
        // },
        // supplier_name: {
        // required: true,
        // },
        // product_name: {
        // required: true,
        // },
        // part_name: {
        // required: true,
        // },
        // // ae: {
        // // required: true,
        // // },
        // part_no: {
        // required: true,
        // },
        // description: {
        // required: true,
        // },
        // proses_perubahan_lama: {
        // required: true,
        // },
        // proses_perubahan_baru: {
        // required: true,
        // },
        // current_flow_pic: {
        // required: true,
        // },
        // // pic_proc: {
        // // required: true,
        // // },
        // // checked_proc: {
        // // required: true,
        // // },
        // // approved_proc: {
        // // required: true,
        // // },
        // // commodity: {
        // // required: true,
        // // },
        // // qa_pic: {
        // // required: true,
        // // },
        // // qa_checked: {
        // // required: true,
        // // },
        // // qa_approved: {
        // // required: true,
        // // },
        // // registered: {
        // // required: true,
        // // },
        // masspro_schedule: {
        // required: true,
        // },

        // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

      },
      messages: {
    
        // ---------------------------------- Rule input Macro Batas sini 2---------------------------------
        no_dokumen: {
        required: "Please Input no_dokumen",
        minlength: 3
        },
        status: {
        required: "Please Input status",
        minlength: 3
        },
        category: {
        required: "Please Input category",
        minlength: 3
        },
        supplier_name: {
        required: "Please Input supplier_name",
        minlength: 3
        },
        product_name: {
        required: "Please Input product_name",
        minlength: 3
        },
        part_name: {
        required: "Please Input part_name",
        minlength: 3
        },
        // ae: {
        // required: "Please Input ae",
        // minlength: 3
        // },
        part_no: {
        required: "Please Input part_no",
        minlength: 3
        },
        description: {
        required: "Please Input description",
        minlength: 3
        },
        proses_perubahan_lama: {
        required: "Please Input proses_perubahan_lama",
        minlength: 3
        },
        proses_perubahan_baru: {
        required: "Please Input proses_perubahan_baru",
        minlength: 3
        },
        current_flow_pic: {
        required: "Please Input current_flow_pic",
        minlength: 3
        },
        // pic_proc: {
        // required: "Please Input pic_proc",
        // minlength: 3
        // },
        // checked_proc: {
        // required: "Please Input pic_proc",
        // minlength: 3
        // },
        // approved_proc: {
        // required: "Please Input pic_proc",
        // minlength: 3
        // },
        commodity: {
        required: "Please Input commodity",
        minlength: 3
        },
        // qa_pic: {
        // required: "Please Input qa_pic",
        // minlength: 3
        // },
        registered: {
        required: "Please Input registered",
        minlength: 3
        },
        masspro_schedule: {
        required: "Please Input masspro_schedule",
        minlength: 3
        },

        //rule input data harus terisi semua

      // ---------------------------------- / Rule input Macro Batas sini 2--------------------------------
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
  function view_modal(no_dokumen1,hdrid1,status){
                             
          if (status=="Add"){

            $('#exampleModalLabel').text('Add Data');  // name view
            $('#quickForm')[0].reset(); // reset form   
            $('#btnsubmit').text('Save'); // name Save
            document.getElementById("btnsubmit").style.visibility = "visible";    // Visible button              
            document.getElementById("btn-attachment").style.visibility = "hidden";    // Visible button              
            //Ajax kosongkan data

            var someDate0 = new Date(); //variable date
            var numberOfDaysToAdd0 = 0; //variable number of day
            var result0 = someDate0.setDate(someDate0.getDate() + numberOfDaysToAdd0);//variable date
            $('#date').val(new Date(result0).toISOString().slice(0, 10)); //variable issue date
          }else {
            // Get Hdri ID  
            $('#no_dokumen').val(no_dokumen1);
            var no_dokumen=no_dokumen1;   

            // Ajax isi data
            $.ajax({
              url: "<?php echo base_url('C_PCNLIST/ajax_getbyno_dokumen') ?>",
              method: "get",
              dataType : "JSON",              
              data: {no_dokumen:no_dokumen1},
              success: function (data) {

                   // ---------------------------------- Data val Macro Batas sini ---------------------------------                  
                  $('#no_dokumen').val(data.no_dokumen);
                  $('#status').val(data.status);
                  $('#category').val(data.category);
                  $('#supplier_name').val(data.supplier_name);
                  $('#product_name').val(data.product_name);
                  $('#part_name').val(data.part_name);
                  // $('#ae').val(data.ae);
                  $('#part_no').val(data.part_no);
                  $('#description').val(data.description);
                  $('#proses_perubahan_lama').val(data.proses_perubahan_lama);
                  $('#proses_perubahan_baru').val(data.proses_perubahan_baru);
                  $('#current_flow_pic').val(data.current_flow_pic);
                  $('#pic_proc').val(data.pic_proc);
                  $('#checked_proc').val(data.checked_proc);
                  $('#approved_proc').val(data.approved_proc);
                  $('#commodity').val(data.commodity);
                  $('#qa_pic').val(data.qa_pic);
                  $('#checked_qa').val(data.qa_checked);
                  $('#approved_qa').val(data.qa_approved);
                  $('#registered').val(data.registered);
                  document.getElementById('attachment_label').innerHTML=data.attachment;
                  var a = document.getElementById('attachment_view');
                  if(!data.attachment==''){
                    a.href = "<?php echo base_url('assets/upload/pcnlist/') ?>" + data.attachment;
                  }else{
                    a.removeAttribute("href");
                  };
                  document.getElementById('attachment1_label').innerHTML=data.attachment1;
                  var a = document.getElementById('attachment1_view');
                  if(!data.attachment1==''){
                    a.href = "<?php echo base_url('assets/upload/pcnlist/') ?>" + data.attachment1;
                  }else{
                    a.removeAttribute("href");
                  };
                  document.getElementById('attachment2_label').innerHTML=data.attachment2;
                  var a = document.getElementById('attachment2_view');
                  if(!data.attachment2==''){
                    a.href = "<?php echo base_url('assets/upload/pcnlist/') ?>" + data.attachment2;
                  }else{
                    a.removeAttribute("href");
                  };
                  document.getElementById('attachment3_label').innerHTML=data.attachment3;
                  var a = document.getElementById('attachment3_view');
                  if(!data.attachment3==''){
                    a.href = "<?php echo base_url('assets/upload/pcnlist/') ?>" + data.attachment3;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('isir_label').innerHTML=data.isir;
                  var a = document.getElementById('isir_view');
                  if(!data.isir==''){
                    a.href = "<?php echo base_url('assets/upload/pcnlist/') ?>" + data.isir;
                  }else{
                    a.removeAttribute("href");
                  };

                  document.getElementById('qcr_label').innerHTML=data.qcr;
                  var a = document.getElementById('qcr_view');
                  if(!data.qcr==''){
                    a.href = "<?php echo base_url('assets/upload/pcnlist/') ?>" + data.qcr;
                  }else{
                    a.removeAttribute("href");
                  };
                  document.getElementById('report_pe_label').innerHTML=data.report_pe;
                  var a = document.getElementById('report_pe_view');
                  if(!data.report_pe==''){
                    a.href = "<?php echo base_url('assets/upload/pcnlist/') ?>" + data.report_pe;
                  }else{
                    a.removeAttribute("href");
                  };
                  
                  // kondisi attachment sesuai dengan category 
                  if ($('#category').val() == 'NEW SUPPLIER(never been in denso)') { //1.1
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').show();
                      $('#attach6').show();
                      $('#attach7').show();
                      $('#attach8').show();
                      $('#attach9').show();
                      $('#attach10').show();
                      $('#attach11').show();
                      $('#attach12').show();
                      $('#attach13').show();
                      $('#attach14').show();
                      $('#attach15').show();
                      $('#attach16').show();
                      $('#attach17').show();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').show();
                      $('#attach21').show();
                      $('#attach22').show();
                      $('#attach23').show();
                      $('#attach24').show();
                      $('#attach25').show();
                      $('#attach26').hide();
                      $('#attach27').hide();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  } else if($('#category').val() == 'NEW SUPPLIER(current denso supplier)'){ //1.2
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').show();
                      $('#attach6').show();
                      $('#attach7').show();
                      $('#attach8').show();
                      $('#attach9').show();
                      $('#attach10').show();
                      $('#attach11').show();
                      $('#attach12').show();
                      $('#attach13').show();
                      $('#attach14').show();
                      $('#attach15').show();
                      $('#attach16').show();
                      $('#attach17').show();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').show();
                      $('#attach26').show();
                      $('#attach27').hide();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'ADDITIONAL SUPPLIER(current denso supplier)'){ //1.3
                    $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').show();
                      $('#attach6').show();
                      $('#attach7').show();
                      $('#attach8').show();
                      $('#attach9').show();
                      $('#attach10').show();
                      $('#attach11').show();
                      $('#attach12').show();
                      $('#attach13').show();
                      $('#attach14').show();
                      $('#attach15').show();
                      $('#attach16').show();
                      $('#attach17').show();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').show();
                      $('#attach26').show();
                      $('#attach27').hide();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'CHANGE SUPPLIER(current denso supplier)'){ //1.4
                    $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').show();
                      $('#attach6').show();
                      $('#attach7').show();
                      $('#attach8').show();
                      $('#attach9').show();
                      $('#attach10').show();
                      $('#attach11').show();
                      $('#attach12').show();
                      $('#attach13').show();
                      $('#attach14').show();
                      $('#attach15').show();
                      $('#attach16').show();
                      $('#attach17').show();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').show();
                      $('#attach26').show();
                      $('#attach27').hide();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'CHANGE PLACE PRODUCTION(same denso supplier)'){ //1.5
                    $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').show();
                      $('#attach6').show();
                      $('#attach7').hide();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').hide();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').hide();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').show();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'ADDITIONAL SUPPLIER'){ //1.6
                    $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').show();
                      $('#attach6').show();
                      $('#attach7').hide();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').hide();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').hide();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').show();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'CHANGE SUB SUPPLIER(change route)'){ //1.7
                    $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').show();
                      $('#attach6').show();
                      $('#attach7').hide();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').hide();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').hide();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').show();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'ADDITIONAL PROCESS'){ //2.1
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').hide();
                      $('#attach6').show();
                      $('#attach7').hide();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').hide();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').hide();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').hide();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'CHANGE PROCESS'){ //2.2
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').hide();
                      $('#attach6').show();
                      $('#attach7').hide();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').hide();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').hide();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').hide();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'CHANGE MATERIAL SPECIFICATION'){ //3.1
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').hide();
                      $('#attach6').show();
                      $('#attach7').show();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').show();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').show();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').hide();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').show();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'CHANGE MATERIAL MAKER'){ //3.2
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').hide();
                      $('#attach6').show();
                      $('#attach7').show();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').show();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').show();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').hide();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').show();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'CHANGE PLACE PRODUCTION(same material maker company)'){ //3.3
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').hide();
                      $('#attach6').show();
                      $('#attach7').show();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').show();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').show();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').hide();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').show();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'RENEWAL DIES'){  //4.1
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').hide();
                      $('#attach4').hide();
                      $('#attach5').hide();
                      $('#attach6').show();
                      $('#attach7').hide();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').hide();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').hide();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').hide();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').hide();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').show();
                      $('#attach28').hide();
                      $('#attach29').hide();
                  }else if($('#category').val() == 'ADDITIONAL DIES'){ //4.2
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').hide();
                      $('#attach4').hide();
                      $('#attach5').hide();
                      $('#attach6').show();
                      $('#attach7').hide();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').hide();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').hide();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').hide();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').hide();
                      $('#attach28').show();
                      $('#attach29').show();
                  }else if($('#category').val() == 'REACTIVATION DIES'){  //4.3
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').hide();
                      $('#attach4').hide();
                      $('#attach5').hide();
                      $('#attach6').show();
                      $('#attach7').hide();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').hide();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').hide();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').hide();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').hide();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').hide();
                      $('#attach28').hide();
                      $('#attach29').show();
                  }else if($('#category').val() == 'ADDITONAL MACHINE(existing machine)'){  //4.4
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').hide();
                      $('#attach4').hide();
                      $('#attach5').hide();
                      $('#attach6').show();
                      $('#attach7').hide();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').hide();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').hide();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').hide();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').hide();
                      $('#attach28').show();
                      $('#attach29').show();
                  }else if($('#category').val() == 'ADDITONAL MACHINE(new machine)'){ //4.5
                      $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').hide();
                      $('#attach4').hide();
                      $('#attach5').hide();
                      $('#attach6').show();
                      $('#attach7').hide();
                      $('#attach8').hide();
                      $('#attach9').hide();
                      $('#attach10').hide();
                      $('#attach11').show();
                      $('#attach12').hide();
                      $('#attach13').hide();
                      $('#attach14').hide();
                      $('#attach15').hide();
                      $('#attach16').hide();
                      $('#attach17').hide();
                      $('#attach18').hide();
                      $('#attach19').show();
                      $('#attach20').hide();
                      $('#attach21').hide();
                      $('#attach22').show();
                      $('#attach23').hide();
                      $('#attach24').hide();
                      $('#attach25').hide();
                      $('#attach26').show();
                      $('#attach27').hide();
                      $('#attach28').hide();
                      $('#attach29').show();
                  }else{
                    $('#attach1').show();
                      $('#attach2').show();
                      $('#attach3').show();
                      $('#attach4').show();
                      $('#attach5').show();
                      $('#attach6').show();
                      $('#attach7').show();
                      $('#attach8').show();
                      $('#attach9').show();
                      $('#attach10').show();
                      $('#attach11').show();
                      $('#attach12').show();
                      $('#attach13').show();
                      $('#attach14').show();
                      $('#attach15').show();
                      $('#attach16').show();
                      $('#attach17').show();
                      $('#attach18').show();
                      $('#attach19').show();
                      $('#attach20').show();
                      $('#attach21').show();
                      $('#attach22').show();
                      $('#attach23').show();
                      $('#attach24').show();
                      $('#attach25').show();
                      $('#attach26').show();
                      $('#attach27').show();
                      $('#attach28').show();
                      $('#attach29').show();
                  }

                  vurl2 = "<?php echo base_url('C_PCNLIST/ajax_getbyno_hdrid') ?>";
                    $.ajax({
                    url: vurl2,
                    method: "get",
                    dataType : "JSON",
                    data: {no_dokumen:no_dokumen1},
                    success: function (data) {                
                       //------------------------------------- / Data Attachment PCN -----------------------------------
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
                            }else{
                              a.removeAttribute("href");
                            };

                            document.getElementById('attach_doc27_label').innerHTML=data.attach_doc27;
                            var a = document.getElementById('attach_doc27_view');
                            if(!data.attach_doc27==''){
                              a.href = "<?php echo base_url('assets/upload/PCN/') ?>" + data.attach_doc27;
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
                                                
                    },
                    error: function (e) {
                        gagal(e);
                       
                    }
                  });
                  
                  $('#masspro_schedule').val(data.masspro_schedule);
                  // ---------------------------------- / Data val Macro  Batas sini ------------------------------                                
              },
              error: function (e) {
                  alert(e);
              }
            });
            
            // Disable and button submit dan text form           
            if(status=="View"){
              document.getElementById("btnsubmit").style.visibility = "hidden";  //hidden submit
              document.getElementById("btn-attachment").style.visibility = "visible";  //hidden submit
              $('#exampleModalLabel').text('View Data'); //name view              
            }else{
              $('#exampleModalLabel').text('Edit Data'); //name view 
              $('#btnsubmit').text('Update'); //name Update  
              document.getElementById("btnsubmit").style.visibility = "visible";  //visible submit
              // document.getElementById("btn-attachment").style.visibility = "hidden";  //visible submit
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
            vurl = "<?php echo base_url('C_PCNLIST/ajax_add'); ?>"; //link simpan data
          } else {           
            vurl = "<?php echo base_url('C_PCNLIST/ajax_update') ?>";//link update data
          }
         
          //untuk aja data sudah bisa dipost
          $.ajax({//ajax simpan data
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
     
      // Delete by no_dokumen
      fdata.append('no_dokumen',$('#iddelete').text());
      // Url Post delete
      vurl = "<?php echo base_url('C_PCNLIST/ajax_delete') ?>";//link untuk delete


          $.ajax({//ajax delete
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
    vurl = "<?php echo base_url('C_Email/Send_mail') ?>";
    // Form data
    var fdata = new FormData();
    fdata.append('no_dokumen','no_dokumen123');

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
  }

  function delete_attachment(value){
    console.log(value);
    // Url Post delete
    vurl = "<?php echo base_url('C_PCNLIST/ajax_delete_attachment') ?>";
    // Form data
    var fdata = new FormData();
    fdata.append('no_dokumen', $('#no_dokumen').val());
    if (value=='attach') {
      fdata.append('attachment', 1 );
      $("#attachment").val('');
      $("#attachment_label").text('Choose file');
    } else if (value=='attach1'){
      fdata.append('attachment', 2 );
      $("#attachment1").val('');
      $("#attachment1_label").text('Choose file');
    }else if (value=='attach2'){
      fdata.append('attachment', 3 );
    }else if (value=='attach3'){
      fdata.append('attachment', 4 );
    }else if (value=='isir'){
      fdata.append('attachment', 5 );
    }else if (value=='qcr'){
    fdata.append('attachment', 6);
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
              // $('#modal-default').modal('hide').draw();
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

    //  no_dokumen selected konfirmasiHapus
    $(document).on("click", ".konfirmasiHapus", function() {        
        $('#iddelete').text($(this).attr("data-id")); 
    })

    //  no_dokumen selected  konfirmasiEdit
    $(document).on("click", ".konfirmasiEdit", function() {     
      view_modal($(this).attr("data-id"),'Edit');
    })
     
    //  no_dokumen selected  konfirmasiEdit
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
<style>
  #example1 thead {
    position: sticky;
    top : 0;
  }
</style>
<!-- Handle datatable -->
<script type="text/javascript">

   //variable table
    var tabel = null;
    $(document).ready(function() {

        tabel = $('#example1').DataTable({ //table
            // "responsive":true, //respon jika data masuk akan muncul pop up data
            scrollY : '600px',
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
                            "url": "<?= base_url('C_PCNLIST/view_data_where'); ?>", // URL file untuk proses select datanya
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
            "aLengthMenu": [[10, 5, 100,1000,10000,100000,1000000,1000000000],[ 10, 5,  100,1000,10000,100000,1000000,"All"]], // Combobox Limit
            "columns": [
               {"data": 'no_dokumen',"sortable": false, //1
                    render: function (data, type, row, meta) {
                        // return meta.row + meta.settings._iDisplayStart + 1;
                        // return '<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div> <div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div> <div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                        mnu='';
                        mnu=mnu+'<div class="btn btn-success btn-sm konfirmasiView  mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div>';
                      <?php if (!empty($hak_akses)) {
                        if ($hak_akses->allow_edit == 'on') { ?>
                                    mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit  mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>'; 
                            <?php }
                      } ?>
                      <?php if (!empty($hak_akses)) {
                        if ($hak_akses->allow_delete == 'on') { ?>
                                    mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                            <?php }
                      } ?>
                        mnu = mnu + '<a class="btn btn-secondary btn-sm mr-2"  href="<?php echo base_url('C_Print_approvedDummy/print_report2_approved?var1=' . "'+ data +'") ?>"  target="_blank"> <i class="fas fa-print mr-1"></i>A4</a>';
                     
                        
                        return mnu;

                    }  
                },
                
                // ---------------------------------- Datatables Macro Batas sini ---------------------------------
                {"data":"no_dokumen"},
                {"data":"status"},
                {"data":"category"},
                {"data":"supplier_name"},
                {"data":"product_name"},
                {"data":"part_name"},
                // {"data":"ae"},
                {"data":"part_no"},
                {"data":"description"},
                {"data":"proses_perubahan_lama"},
                {"data":"proses_perubahan_baru"},
                {"data":"current_flow_pic"},
                {"data":"pic_proc"},
                {"data":"checked_proc"},
                {"data":"approved_proc"},
                {"data":"commodity"},
                {"data":"qa_pic"},
                {"data":"checked_qa"},
                {"data":"approved_qa"},
                {"data":"registered"},
                {"data":"masspro_schedule"},
                {"data":"attachment"},
                {"data":"attachment1"},
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

      //   if(field.name=="no_dokumen"){
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
  

    ///@see handleSelectChange_no_dokumen()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif          
     function handleSelectChange_no_dokumen(event) {

var data = $('#no_dokumen').select2('data')[0].text;

 }


     ///@see handleSelectChange_nama_supplier()
     ///@note fungsi untuk filter data
     ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
function handleSelectChange_nama_supplier(event) {

var data = $('#nama_supplier').select2('data')[0].text;

}

///@see handleSelectChange_date()
 ///@note fungsi untuk filter data
///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
     function handleSelectChange_date(event) {

var data = $('#date').select2('data')[0].text;

}


///@see handleSelectChange_category()
 ///@note fungsi untuk filter data
///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
function handleSelectChange_category(event) {

var data = $('#category').select2('data')[0].text;

}



</script>







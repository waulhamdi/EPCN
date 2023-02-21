<style>
  .modal{
    overflow-y:auto;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid"><!-- untuk container-->
        <div class="row mb-2"><!-- untuk row aplikasi-->
          <div class="col-sm-6"><!--untuk ukuran panjang container-->
            <h1 class="m-0 text-dark">APPLICATION RESPONSE OF PROCESS CHANGE</h1><!-- untuk menampilkan judul-->
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
                    <th>TRANSACTION ID</th>
                    <th>PCN NUMBER</th>
                    <th>SUPPLIER</th>
                    <th>PART NUMBER</th>
                    <th>PART NAME</th>
                    <th>PRODUCT NAME</th>
                    <th>CRITERIA CRITICAL ITEM</th>
                    <th>CURRENT PROCESS</th>
                    <th>COMPARISON DETAIL</th>
                    <th>QC INSPECTION DEPARTEMENT</th>
                    <th>QC COMMENT</th>
                    <th>CONFIRMATION QC</th>
                    <th>QC DECISION</th>
                    <th>PE DEPARTEMENT</th>
                    <th>PE COMMENT</th>
                    <th>CONFIRMATION PE</th>
                    <th>PE DECISION</th>
                    <th>MFG DEPARTEMENT</th>
                    <th>MFG COMMENT</th>
                    <th>CONFIRMATION MFG</th>
                    <th>MFG DECISION</th>
                    <th>PC DEPARTEMENT</th>
                    <th>PC COMMENT</th>
                    <th>CONFIRMATION PC</th>
                    <th>PC DECISION</th>
                    <th>QA DEPARTEMENT</th>
                    <th>QA COMMENT</th>
                    <th>CONFIRMATION QA</th>
                    <th>QA DECISION</th>
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

                
                <div class="card card-red">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-plus"></i>
                     APPLICATION APPROVAL
                    </h3>
                  </div>
                  </div>
                  
                  <div class="card">
                  <div class="card-body">
                <!-- <div class="form-group">
   <div class="row">
      <div class="col-md-4">
         <label for="hdrid">TRANSACTION ID</label>
      </div>
      <div class="col-md-8">
         <input type="text" name="hdrid" class="form-control" id="hdrid" placeholder="auto generate" readonly>
      </div>
   </div>
</div> -->
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="pcn_number">PCN NUMBER</label>
                    </div>
                    <div class="col-md-8">
                    <select class="form-control select2" id="pcn_number" name="pcn_number" onchange="handleSelectChange_pcn(event)" style="width: 100%;">
                      <option value='' selected="selected">-Select-</option>
                      <?php
                        foreach ($hdrid as $value) {
                          echo "<option value='$value->hdrid'>$value->hdrid--$value->supplier_name--$value->part_number--$value->part_name--$value->product_name--$value->criteria_critical_item--$value->current_process</option>";
                        }
                      ?>
                    </select>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="supplier">SUPPLIER</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="supplier" class="form-control" id="supplier" >
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
                    <input type="text" name="criteria_critical_item" class="form-control" id="criteria_critical_item">
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
                      <label for="comparison_detail">COMPARISON DETAIL</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="comparison_detail" class="form-control" id="comparison_detail" >
                    </div>
                </div>
              </div>

              <!-- tutup card -->
              </div>
              </div>


              <div class="card">
              <div class="card-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="">CONCERN POINT FOR 5 DIV</label>
                    </div>
                    <!-- <div class="col-md-8">
                      <input type="text" name="concern_point_for_5_div" class="form-control" id="concern_point_for_5_div" >
                    </div> -->
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="qc_nik">QCA/QCP INSPECTION DEPARTEMENT</label>
                    </div>
                    <div class="col-md-8">
                    <select class="form-control select2" id="qc_nik" name="qc_nik" onchange="handleSelectChange_qc(event)" style="width: 100%;" >
                      <option value='' selected="selected">-Select-</option>
                      <?php
                        foreach ($nik as $value) {
                          echo "<option value='$value->qc_nik'>$value->qc_nik - $value->qc_name - $value->product - $value->qc_pic</option>";
                        }
                      ?>
                    </select>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="comment_qc">CONCERN ITEM/WORRY POINT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="comment_qc" class="form-control" id="comment_qc" readonly>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="confirm_qc">CONFIRMATION REQUIREMENT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="confirm_qc" class="form-control" id="confirm_qc" readonly >
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="hold_or_go_qc">DECISION</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2" id="hold_or_go_qc" name="hold_or_go_qc" style="width: 100%;" disabled>
                        <option value='' selected='selected' >-Select-</option>
                        <option value='Hold'>Hold</option>
                        <option value='Go'>Go</option>
                      </select>
                    </div>
                </div>
              </div>
              <!-- tutup card qc-->
              </div>
              </div>

              <div class="card" >
              <div class="card-body" >
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="pe_nik" >PE DEPARTEMENT</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2" id="pe_nik" name="pe_nik" onchange="handleSelectChange_pe(event)" style="width: 100%;" >
                        <option value='' selected="selected" >-Select-</option>
                        <?php
                          foreach ($nik as $value) {
                            echo "<option value='$value->pe_nik'>$value->pe_nik - $value->pe_name - $value->product - $value->pe_pic</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                
                
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="comment_pe">CONCERN ITEM/WORRY POINT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="comment_pe" class="form-control" id="comment_pe" readonly >
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="confirm_pe">CONFIRMATION REQUIREMENT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="confirm_pe" class="form-control" id="confirm_pe" readonly>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="hold_or_go_pe">DECISION</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2" id="hold_or_go_pe" name="hold_or_go_pe" style="width: 100%;" disabled>
                        <option value='' selected='selected'>-Select-</option>
                        <option value='Hold'>Hold</option>
                        <option value='Go'>Go</option>
                      </select>
                    </div>
                </div>
              </div>
              <!--tutup card pe -->
              </div>
              </div>

              <div class="card">
              <div class="card-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="mfg_nik">MFG DEPARTEMENT</label>
                    </div>
                    <div class="col-md-8">
                    <select class="form-control select2" id="mfg_nik" name="mfg_nik" onchange="handleSelectChange_mfg(event)" style="width: 100%;" >
                      <option value='' selected="selected">-Select-</option>
                      <?php
                          foreach ($nik as $value) {
                            echo "<option value='$value->mfg_nik'>$value->mfg_nik - $value->mfg_name - $value->product - $value->mfg_pic</option>";
                          }
                        ?>
                    </select>
                    </div>
                </div>
              </div>


              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="comment_mfg">CONCERN ITEM/WORRY POINT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="comment_mfg" class="form-control" id="comment_mfg" readonly>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="confirm_mfg">CONFIRMATION REQUIREMENT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="confirm_mfg" class="form-control" id="confirm_mfg" readonly>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="hold_or_go_mfg">DECISION</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2" id="hold_or_go_mfg" name="hold_or_go_mfg" style="width: 100%;" disabled>
                        <option value='' selected='selected'>-Select-</option>
                        <option value='Hold'>Hold</option>
                        <option value='Go'>Go</option>
                      </select>
                    </div>
                </div>
              </div>
              <!-- tutup card mfg-->
              </div>
              </div>

              <div class="card">
              <div class="card-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="pc_nik">PC DEPARTEMENT</label>
                    </div>
                    <div class="col-md-8">
                    <select class="form-control select2" id="pc_nik" name="pc_nik" onchange="handleSelectChange_pc(event)" style="width: 100%;" >
                      <option value='' selected="selected">-Select-</option>
                      <?php
                        foreach ($nik as $value) {
                        echo "<option value='$value->pc_nik'>$value->pc_nik - $value->pc_name - $value->product - $value->pc_pic</option>";
                        }
                      ?>
                    </select>
                    </div>
                </div>
              </div>


              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="comment_pc">CONCERN ITEM/WORRY POINT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="comment_pc" class="form-control" id="comment_pc" readonly>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="confirm_pc">CONFIRMATION REQUIREMENT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="confirm_pc" class="form-control" id="confirm_pc" readonly>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="hold_or_go_pc">DECISION</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2" id="hold_or_go_pc" name="hold_or_go_pc" style="width: 100%;" disabled>
                        <option value='' selected='selected'>-Select-</option>
                        <option value='Hold'>Hold</option>
                        <option value='Go'>Go</option>
                      </select>
                    </div>
                </div>
              </div>
              <!-- tutup card pc-->
              </div>
              </div>

              <div class="card">
              <div class="card-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="qa_nik">QA DEPARTEMENT</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2" id="qa_nik" name="qa_nik" onchange="handleSelectChange_qa(event)" style="width: 100%;" >
                        <option value='' selected="selected">-Select-</option>
                        <?php
                          foreach ($nik as $value) {
                            echo "<option value='$value->qa_nik'>$value->qa_nik - $value->qa_name - $value->product - $value->qa_pic</option>";
                          }
                        ?>
                      </select>
                    </div>
                </div>
              </div>


              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="comment_qa">CONCERN ITEM/WORRY POINT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="comment_qa" class="form-control" id="comment_qa" readonly>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="confirm_qa">CONFIRMATION REQUIREMENT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="confirm_qa" class="form-control" id="confirm_qa" readonly>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="hold_or_go_qa">DECISION</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2" id="hold_or_go_qa" name="hold_or_go_qa" style="width: 100%;" disabled>
                        <option value='' selected='selected'>-Select-</option>
                        <option value='Hold'>Hold</option>
                        <option value='Go'>Go</option>
                      </select>
                    </div>
                </div>
              </div>
              <!-- tutup card qa-->
              </div>
              </div>

              <br>

              <!-- <label>Summary Verification Item</label>
              <div class="card border-secondary mb-3" style="width: 47,5rem;">
                <div class="card-header text-center" style="color: red">
                  <b>ITEM</b>
                </div>
                <ul class="list-group list-group-flush">
                  <php foreach ($pcn_number as $value) { 
                    echo "<li class='list-group-item'> $value->confirm_qc</li>";
                    echo "<li class='list-group-item'> $value->confirm_pe</li>";
                    echo "<li class='list-group-item'> $value->confirm_mfg</li>";
                    echo "<li class='list-group-item'> $value->confirm_pc</li>";
                    echo "<li class='list-group-item'> $value->confirm_qa</li>";
                  } 
                  ?>
                </ul>
              </div> -->

              <!-- <div class="form-group">
                <label for="summernote">SUMMARY</label>
                <div class="row">
                    <div class="col-md-12">
                      <input type="text" name="summernote" class="form-control" id="summernote" >
                    </div>
                </div>
              </div> -->

                <!---------------------------------- / Form Macro Batas sini ---------------------------------->

                <!-- Close Card Body -->  
                </div>
                  
                  <div class="card-footer">  <!-- footer kepala aplikasi --> 
                    <button type="submit" class="btn btn-primary" id="btnsubmit">Save</button>     <!-- button save--> 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>    <!-- button close-->        
                    <button type="button" class="btn btn-warning" id="send_email" onclick="Send_mail()">Send</button>    <!-- button close-->        
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
               
              <form method="POST" action="<?php echo base_url('C_application/import'); ?>" enctype="multipart/form-data"> <!--untuk connect ke controller--> 

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
        // pcn_number: {
        // required: true,
        // },
        // supplier: {
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
        // criteria_critical_item: {
        // required: true,
        // },
        // current_process: {
        // required: true,
        // },
        // comparison_detail: {
        // required: true,
        // },
        // qc_nik: {
        // required: true,
        // },
        // pe_departement: {
        // required: true,
        // },
        // mfg_departement: {
        // required: true,
        // },
        // pc_departement: {
        // required: true,
        // },
        // qa_departement: {
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
        current_process: {
        required: "Please Input current_process",
        minlength: 3
        },
        comparison_detail: {
        required: "Please Input comparison_detail",
        minlength: 3
        },
        qc_nik: {
        required: "Please Input qc_nik",
        minlength: 3
        },
        pe_departement: {
        required: "Please Input pe_departement",
        minlength: 3
        },
        mfg_departement: {
        required: "Please Input mfg_departement",
        minlength: 3
        },
        pc_departement: {
        required: "Please Input pc_departement",
        minlength: 3
        },
        qa_departement: {
        required: "Please Input qa_departement",
        minlength: 3
        }
      },

        // ---------------------------------- / Rule input Macro Batas sini 2--------------------------------

        //rule input data harus terisi semua
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
            $('#summernote').summernote('code', ''); // reset form with summernote 
            $("#criteria_critical_item").val(null).trigger("change"); // reset select filter
            $('#btnsubmit').text('Save'); // name Save
            document.getElementById("btnsubmit").style.visibility = "visible";    // Visible button              
            //Ajax kosongkan data

          }else {
           
            // Get Hdri ID
            $('#hdrid').val(hdrid1);
            var hdrid=hdrid1;   

            // Ajax isi data
              $.ajax({
              url: "<?php echo base_url('C_application/ajax_getbyhdrid')?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

   		            // ---------------------------------- Data val Macro Batas sini ---------------------------------                  
                   $('#pcn_number').select2().val(data.pcn_number).trigger('change');
                   $('#supplier').val(data.supplier)
                   $('#part_number').val(data.part_number);
                   $('#part_name').val(data.part_name);
                   $('#product_name').val(data.product_name);
                   $('#criteria_critical_item').val(data.criteria_critical_item);
                   $('#current_process').val(data.current_process);
                   $('#comparison_detail').val(data.comparison_detail);
                   $('#qc_nik').select2().val(data.qc_nik).trigger('change');
                   $('#comment_qc').val(data.comment_qc);
                   $('#confirm_qc').val(data.confirm_qc);
                   $('#hold_or_go_qc').select2().val(data.hold_or_go_qc).trigger('change');
                   $('#pe_nik').select2().val(data.pe_nik).trigger('change');
                   $('#comment_pe').val(data.comment_pe);
                   $('#confirm_pe').val(data.confirm_pe);
                   $('#hold_or_go_pe').select2().val(data.hold_or_go_pe).trigger('change');
                   $('#mfg_nik').select2().val(data.mfg_nik).trigger('change');
                   $('#comment_mfg').val(data.comment_mfg);
                   $('#confirm_mfg').val(data.confirm_mfg);
                   $('#hold_or_go_mfg').select2().val(data.hold_or_go_mfg).trigger('change');
                   $('#pc_nik').select2().val(data.pc_nik).trigger('change');
                   $('#comment_pc').val(data.comment_pc);
                   $('#confirm_pc').val(data.confirm_pc);
                   $('#hold_or_go_pc').select2().val(data.hold_or_go_pc).trigger('change');
                   $('#qa_nik').select2().val(data.qa_nik).trigger('change');
                   $('#comment_qa').val(data.comment_qa);
                   $('#confirm_qa').val(data.confirm_qa);
                   $('#hold_or_go_qa').select2().val(data.hold_or_go_qa).trigger('change');
                   $('#status').val(status);


                  // deklarasi nik
                  var nik_ses="<?php echo $this->session->userdata('user_name') ?>";

                  if(nik_ses == data.qc_nik){ 
                    document.getElementById('comment_qc').removeAttribute("readonly");
                    document.getElementById('confirm_qc').removeAttribute("readonly");
                    document.getElementById('hold_or_go_qc').removeAttribute("disabled");
                    // document.getElementById('comment_qc').readonly = false;
                    // document.getElementById('confirm_qc').readonly = false;
                    // document.getElementById('hold_or_go_qc').disabled = false;
                  }else if(nik_ses == data.pe_nik){
                    document.getElementById('comment_pe').removeAttribute("readonly");
                    document.getElementById('confirm_pe').removeAttribute("readonly");
                    document.getElementById('hold_or_go_pe').removeAttribute("disabled");
                  }else if(nik_ses == data.mfg_nik){
                    document.getElementById('comment_mfg').removeAttribute("readonly");
                    document.getElementById('confirm_mfg').removeAttribute("readonly");
                    document.getElementById('hold_or_go_mfg').removeAttribute("disabled");
                  }else if(nik_ses == data.pc_nik){
                    document.getElementById('comment_pc').removeAttribute("readonly");
                    document.getElementById('confirm_pc').removeAttribute("readonly");
                    document.getElementById('hold_or_go_pc').removeAttribute("disabled");
                  }else if(nik_ses == data.qa_nik){
                    document.getElementById('comment_qa').removeAttribute("readonly");
                    document.getElementById('confirm_qa').removeAttribute("readonly");
                    document.getElementById('hold_or_go_qa').removeAttribute("disabled");
                  }
                  // console.log(nik_ses == data.pc_nik );
                  // console.log(nik_ses == data.qa_nik );
                  
                  // if(nik_ses==data.user_nik){

                  // }
                  // let form_data = $('#quickForm').serializeArray();
                  //     $.each(form_data, function (key, input) {
                  //       document.getElementById(input.name).readOnly = true;
                  //       document.getElementById(input.name).disabled = true;
                  //   });

                  // $('#confirm_pc').val(confirm_pc);

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
            vurl = "<?php echo base_url('C_application/ajax_add')?>"; //link simpan data
          } else {           
            vurl = "<?php echo base_url('C_application/ajax_update')?>";//link update data
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
                   location.reload();
                    tabel.draw();
                   //location add
                   if(!vurl=="Add"){
                     $("#modal-default").modal('hide');
                   }
                 
              },
               // function error
              error: function (e) {
                  // gagal(e);
                  location.reload();

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
      vurl = "<?php echo base_url('C_application/ajax_delete')?>";

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
  // function Send_mail(){

  //   // Url Post delete
  //   vurl = "<?php echo base_url('C_Email/Send_mail')?>";
  //   // Form data
  //   var fdata = new FormData();
  //   fdata.append('hdrid','Hdrid123');

  //        // Post data
  //         //untuk aja data sudah bisa dipost
  //         $.ajax({
  //             url: vurl, //url
  //             method: "post",//jenis method pst
  //             processData: false, //false process
  //             contentType: false, //false content
  //             data: fdata,
  //             success: function (data) {
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
     
    //  HDRID selected  konfirmasiView
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
            // "responsive":true, //respon jika data masuk akan muncul pop up data
            "scrollX" : true,
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
                "url": "<?= base_url('C_application/view_data_where');?>", // URL file untuk proses select datanya
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
                        mnu=mnu+'<div class="btn btn-success btn-sm konfirmasiView  mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div>';
                        mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit  mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>'; mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                        mnu = mnu + '<a class="btn btn-secondary btn-sm ml-2"  href="<?php echo base_url('C_application/print_report2_approved?var1=' . "'+ data +' &var2=1&var2=1")  ?>"  target="_blank"> <i class="fas fa-print mr-1"></i>A4</a>'
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
                {"data":"part_number"},
                {"data":"part_name"},
                {"data":"product_name"},
                {"data":"criteria_critical_item"},
                {"data":"current_process"},
                {"data":"comparison_detail"},
                {"data":"qc_nik"},
                {"data":"comment_qc"},
                {"data":"confirm_qc"},
                {"data":"hold_or_go_qc"},
                {"data":"pe_nik"},
                {"data":"comment_pe"},
                {"data":"confirm_pe"},
                {"data":"hold_or_go_pe"},
                {"data":"mfg_nik"},
                {"data":"comment_mfg"},
                {"data":"confirm_mfg"},
                {"data":"hold_or_go_mfg"},
                {"data":"pc_nik"},  
                {"data":"comment_pc"},
                {"data":"confirm_pc"},
                {"data":"hold_or_go_pc"},
                {"data":"qa_nik"},
                {"data":"comment_qa"},
                {"data":"confirm_qa"},
                {"data":"hold_or_go_qa"},
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
            else{
                gagal("Both Date is Required");
                }
        });
    });   
</script>


<!-- <script type="text/javascript">

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

</script> -->


<script type="text/javascript">

   //fungsi select filter
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>


<script type="text/javascript">

            ///@see handleSelectChange_criteria_critical_item()
            ///@note fungsi untuk filter data
            ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
            function handleSelectChange_supplier(event) {
            var data = $('#supplier').select2('data')[0].text;
            }

            ///@see handleSelectChange_pcn()
            ///@note fungsi untuk filter data
            ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
            function handleSelectChange_pcn(event) {
              var value = $("#pcn_number option:selected").text();
              // var data = $('#pcn_number').select2('data')[0].text;
              var res = value.split("--");
              // console.log(res[0]);
              // $('#pcn_number').val(res[0]);
              $('#supplier').val(res[1]);
              $('#part_number').val(res[2]);
              $('#part_name').val(res[3]);
              $('#product_name').val(res[4]);
              $('#criteria_critical_item').val(res[5]);
              $('#current_process').val(res[6]);
            }


            ///@see handleSelectChange()
            ///@note fungsi untuk filter data
            ///@attention jika type filter tidak sesuai field maka filter tersebut tidak aktif
            function handleSelectChange_qc(event) {
              //  By Text
              var value = $("#qc_nik option:selected").text();  
              var res = value.split(" - ");
              $('#qc_nik').val(res[0]);
            }
            function handleSelectChange_pe(event) {
              //  By Text
              var value = $("#pe_nik option:selected").text();  
              var res = value.split(" - ");
              $('#pe_nik').val(res[0]);
            }
            function handleSelectChange_mfg(event) {
              //  By Text
              var value = $("#mfg_nik option:selected").text();  
              var res = value.split(" - ");
              $('#mfg_nik').val(res[0]);
            }
            function handleSelectChange_pc(event) {
              //  By Text
              var value = $("#pc_nik option:selected").text();  
              var res = value.split(" - ");
              $('#pc_nik').val(res[0]);
            }
            function handleSelectChange_qa(event) {
              //  By Text
              var value = $("#qa_nik option:selected").text();  
              var res = value.split(" - ");
              $('#qa_nik').val(res[0]);
            }


          /// @see Send_mail
          /// @note Send email to (5 Responden,User creator)
          /// @attention Mengirim pcn number sebagai key untuk mencari  email 
          function Send_mail(){

            // Form data
                
            var fdata = new FormData();
                  
            fdata.append('pcn_number',$('#pcn_number').val());


            // Url Post delete
            vurl = "<?php echo base_url('C_application/ajax_Send_mail')?>";

            // Post data
            $.ajax({
              url: vurl,
              method: "post",
              processData: false,
              contentType: false,
              data: fdata,
              success: function (data) {


                  berhasil(data.status);
                  location.reload();

              },
              error: function (e) {
                //Pesan Gagal
                location.reload();
                // berhasil(data.status);
                  // window.location.reload();
                  // gagal(e);             
              }
            });

          }

  

</script>

<!-- <script type="text/javascript">
  $(document).ready(function() {
  $('#summernote').summernote({
    toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['insert', ['link', 'picture']],
  ],
  popover: {
  image: [
    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
    ['float', ['floatLeft', 'floatRight', 'floatNone']],
    ['remove', ['removeMedia']]
  ]
  }
}
    
  );
});
</script> -->







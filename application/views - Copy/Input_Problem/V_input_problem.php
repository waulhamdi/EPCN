
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Input Problem Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home PCN</a></li>
              <li class="breadcrumb-item active">Dashboard PCN</li>
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
                                <?php if ($this->session->userdata('DepartmentAdd')||$this->session->userdata('rolename')=='Administrator Quality') { ?>

                                  <a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal('1','Add')" href="#">
                                    <i class="fa fa-plus"></i> Add Data
                                  </a>

                                <?php } ?>

                                <?php if ($this->session->userdata('DepartmentAdd')||$this->session->userdata('rolename')=='Administrator Quality') { ?>

                                  <a data-toggle="modal" data-target="#modal-import"  href="#">
                                    <i class="fa fa-upload"></i> Import Data
                                  </a>

                                <?php } ?>

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
                    <!-- <th>PROBLEM CATEGORY ID</th> -->
                    <th>PROBLEM CATEGORY NAME</th>
                    <!-- <th>GROUP PRODUCT ID</th> -->
                    <th>GROUP PRODUCT NAME</th>
                    <!-- <th>CUSTOMER PRODUCT ID</th> -->
                    <!-- <th>PRODUCT ID</th> -->
                    <th>PRODUCT NAME</th>
                    <!-- <th>CUSTOMER ID</th> -->
                    <th>CUSTOMER NAME</th>
                    <th>CONTACT PERSON NAME</th>
                    <!-- <th>SOURCE INFORMATION ID</th> -->
                    <th>SOURCE INFORMATION NAME</th>
                    <th>CUSTOMER REPORT NUMBER</th>
                    <th>PART NUMBER</th>
                    <th>QTY</th>
                    <th>LOT NUMBER PRODUCT</th>
                    <th>QTY LOT</th>
                    <th>PROBLEM</th>
                    <th>DETAIL PROBLEM</th>
                    <th>RESPONSIBLE SECTION</th>
                    <th>CONTAINMENT DATE</th>
                    <th>NIK</th>
                    <th>NAME</th>
                    <th>SECTION</th>
                    <th>EMAIL</th>
                    <th>NIK TO</th>
                    <th>NAME TO</th>
                    <th>SECTION TO</th>
                    <th>EMAIL TO</th>
                    <th>REPORT DATE</th>
                    <th>STATUS</th>
                    <th>PROBLEM NAME</th>
                    <!-- <th>DUE DATE</th> -->
                    <th>ISSUE DATE</th>
                    <th>RANK PROBLEM</th>
                    <!-- <th>ATTACH PICTURE</th> -->
                    <th>TEMPORARY ACTION</th>
                    <th>REMARK</th>
                    <th>DELIVERY STATUS</th>
                    <th>WHEN </th>
                    <th>SHIFT  </th>
                    <th>TIME</th>
                    <th>WHO (Found By)</th>
                    <th>WHERE </th>







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
                      <label for="hdrid">REPORT NO</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="hdrid" class="form-control" id="hdrid" placeholder="auto generate" readonly>
                    </div>
                </div>
              </div>
               
              <div class="row">
                
                <div class="col-md-4">
                 <label for="">PROBLEM</label>
                </div>

                <div class="col-md-4">
                  <div class="form-group" clearfix>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="problem_name" value="internal" name="problem_name"  >
                        <label for="problem_name">
                          INTERNAL
                        </label>
                    </div>
              <div class="icheck-primary d-inline">
                  <input type="radio" id="problem_name2" value="external" name="problem_name" >
                  <label for="problem_name2">
                      EXTERNAL
                  </label>
              </div>
            </div>
                </div>
              </div>

              <!-- <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label>DUE DATE:</label>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerdue_date" data-target-input="nearest">
                        <input type="text" id="due_date" name="due_date" class="form-control datetimepicker-input" data-target="#timepickerdue_date"/>
                          <div class="input-group-append" data-target="#timepickerdue_date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>
                </div>
              </div> -->

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="issue_date">ISSUE DATE</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="issue_date" class="form-control" id="issue_date" readonly placeholder="auto generate" >
                    </div>
                </div>
              </div>


              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>NIK</label>
                  </div>
                  <div class="col-md-8">
                    <select class="form-control select2" id="nik" name="nik" onchange="handleSelectChange_nik(event)" style="width: 100%;">
                      <option value='' selected="selected">-Select-</option>
                      <?php
                        foreach ($nik as $value) {
                        echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->department_name-$value->office_email</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="name">NAME</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="name" class="form-control" id="name" >
                    </div>
                </div>
              </div>
              <div class="form-group">
              <div class="row">
                  <div class="col-md-4">
                    <label for="section1">SECTION</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="section1" class="form-control" id="section1" >
                  </div>
              </div>
            </div>

            <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                  <label for="email1">EMAIL</label>
                </div>
                <div class="col-md-8">
                  <input type="text" name="email1" class="form-control" id="email1" >
                </div>
            </div>
          </div>


            <hr style="border:1px solid red;">
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label>NIK TO</label>
                </div>
                <div class="col-md-8">
                  <select class="form-control select2" id="nik2" name="nik2" onchange="handleSelectChange_nik2(event)" style="width: 100%;">
                    <option value='' selected="selected">-Select-</option>
                    <?php
                      foreach ($nik as $value) {
                      echo "<option value='$value->user_name'>$value->user_name-$value->name-$value->department_name-$value->office_email</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-md-4">
                    <label for="name2">NAME TO</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="name2" class="form-control" id="name2" >
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-md-4">
                    <label for="section2">SECTION TO</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="section2" class="form-control" id="section2" >
                  </div>
              </div>
            </div>

            <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                  <label for="email2">EMAIL TO</label>
                </div>
                <div class="col-md-8">
                  <input type="text" name="email2" class="form-control" id="email2" >
                </div>
            </div>
          </div>


              

              <div id="form_internal_external" clas="form_internal_external">
              <div id="form_internal" clas="form_internal">
              <hr style="border:1px solid red;">

              <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label>RANK PROBLEM</label>
                </div>
                <div class="col-md-8">
                  <select class="form-control select2" id="rank_problem" name="rank_problem" onchange="handleSelectChange_rank_problem(event)" style="width: 100%;">
                    <option value='' selected="selected">-Select-</option>
                    <?php
                      foreach ($ranks as $value) {
                      echo "<option value='$value'>$value</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>

            
            <div class="row">

            <div class="col-md-4">
             <label for="">DELIVERY STATUS</label>
            </div>

            <div class="col-md-4">
              
            <div class="form-group" clearfix>
              <div class="icheck-primary d-inline">
                  <input type="radio" id="delivery_status" value="urgent" name="delivery_status"  >
                  <label for="delivery_status">
                      URGENT
                  </label>
              </div>
              <div class="icheck-primary d-inline">
                  <input type="radio" id="delivery_status2" value="normal" name="delivery_status" >
                  <label for="delivery_status2">
                      NORMAL
                  </label>
              </div>
            </div>
            
            </div>
            

            </div>


              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>GROUP PRODUCT ID</label>
                  </div>
                  <div class="col-md-8">
                    <select class="form-control select2" id="group_product_id" name="group_product_id" onchange="handleSelectChange_group_product_id(event)" style="width: 100%;">
                      <option value='' selected="selected">-Select-</option>
                      <?php
                        foreach ($group_product as $value) {
                        echo "<option value='$value->hdrid'>$value->hdrid-$value->group_product_name</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="group_product_name">GROUP PRODUCT NAME</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="group_product_name" class="form-control" id="group_product_name" >
                    </div>
                </div>
              </div>

              


              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>PRODUCT ID</label>
                  </div>
                  <div class="col-md-8">
                    <select class="form-control select2" id="product_id" name="product_id" onchange="handleSelectChange_product_id(event)" style="width: 100%;">
                      <option value='' selected="selected">-Select-</option>
                      <?php
                        foreach ($product as $value) {
                        echo "<option value='$value->hdrid'>$value->hdrid-$value->product_name </option>";
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
                      <input type="text" name="product_name" class="form-control" id="product_name" >
                    </div>
                </div>
              </div>

              <!-- <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="report_no">REPORT NO</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="report_no" class="form-control" id="report_no" >
                    </div>
                </div>
              </div> -->

              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>PROBLEM CATEGORY ID</label>
                  </div>
                  <div class="col-md-8">
                    <select class="form-control select2" id="problem_category_id" name="problem_category_id" onchange="handleSelectChange_problem_category_id(event)" style="width: 100%;">
                      <option value='' selected="selected">-Select-</option>
                      <?php
                        foreach ($problem_category as $value) {
                        echo "<option value='$value->hdrid'>$value->hdrid-$value->problem_category_name</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="problem_category_name">PROBLEM CATEGORY NAME</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="problem_category_name" class="form-control" id="problem_category_name" >
                    </div>
                </div>
              </div>

              </div>

              <div class="form-group">
              <div class="row">
                  <div class="col-md-4">
                    <label for="problem">PROBLEM</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="problem" class="form-control" id="problem" >
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-md-4">
                    <label for="detail_problem">DETAIL PROBLEM</label>
                  </div>
                  <div class="col-md-8">
                    <textarea class="form-control" id="detail_problem" rows="3" name="detail_problem"></textarea>
                  </div>
              </div>
            </div>

            
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="attach_picture">ATTACH PICTURE  </label>
                  <p>(png,jpg,jpeg)</p>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-success" id="attach_picture_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                </div>
                <div class="col-md-7">
                  <div class="custom-file">
                   <input type="file" class="custom-file-input" id="attach_picture" multiple="" name="attach_picture">
                    <label class="custom-file-label" for="attach_picture" id="attach_picture_label">Choose file</label>
                    </div>
                    </div>
                  </div>
                </div>


              <div class="form-group">
              <div class="row">
              <div class="col-md-4">
                  <label for="atachment">ATACHMENT</label>
                  <p>(pdf)</p>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-success" id="atachment_view" target="_blank"> <i class="fa fa-paperclip"></i> </a>
                </div>
                <div class="col-md-7">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="atachment" multiple="" name="atachment">
                    <label class="custom-file-label" for="atachment" id="atachment_label">Choose file</label>
                  </div>
                </div>
              </div>
            </div>

              

              <hr style="border:1px solid red;">

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label>WHEN :</label>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickerwhen_problem" data-target-input="nearest">
                        <input type="text" id="when_problem" name="when_problem" class="form-control datetimepicker-input" data-target="#timepickerwhen_problem"/>
                          <div class="input-group-append" data-target="#timepickerwhen_problem" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="shift_problem">SHIFT  </label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="shift_problem" class="form-control" id="shift_problem" >
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="time_problem">TIME</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="time_problem" class="form-control" id="time_problem" >
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="who_problem">WHO (Found By)</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="who_problem" class="form-control" id="who_problem" >
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="where_problem">WHERE </label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="where_problem" class="form-control" id="where_problem" >
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
                      <label for="qty">QTY Defect</label>
                    </div>
                    <div class="col-md-8">
                      <input type="number" name="qty" class="form-control" id="qty" >
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="lot_number_product">LOT NUMBER PRODUCT</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="lot_number_product" class="form-control" id="lot_number_product" >
                    </div>
                </div>
              </div>

              <div class="form-group">
              <div class="row">
                  <div class="col-md-4">
                    <label for="qty_lot">QTY LOT</label>
                  </div>
                  <div class="col-md-8">
                    <input type="number" name="qty_lot" class="form-control" id="qty_lot" >
                  </div>
              </div>
            </div>

  

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label>TEMPORARY ACTION</label>
                      </div>
                      <div class="col-md-8">
                        <select class="form-control select2" id="temporary_action" name="temporary_action" onchange="handleSelectChange_temporary_action(event)" style="width: 100%;">
                          <option value='' selected="selected">-Select-</option>
                          <?php
                            foreach ($actions as $value) {
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
                          <label for="etc">REMARK</label>
                        </div>
                        <div class="col-md-8">
                          <textarea class="form-control" id="etc" rows="3" name="etc"></textarea>
                        </div>
                    </div>
                  </div>


              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="responsible_section">RESPONSIBLE SECTION</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="responsible_section" class="form-control" id="responsible_section" >
                    </div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label>CONTAINMENT DATE:</label>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group date" data-date-format="YYYY-MM-DD"  id="timepickercontainment_date" data-target-input="nearest">
                        <input type="text" id="containment_date" name="containment_date" class="form-control datetimepicker-input" data-target="#timepickercontainment_date"/>
                          <div class="input-group-append" data-target="#timepickercontainment_date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>
                </div>
              </div>

              <div class="form_external" id="form_external">
              <hr style="border:1px solid red;">

              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>CUSTOMER ID</label>
                  </div>
                  <div class="col-md-8">
                    <select class="form-control select2" id="customer_id" name="customer_id" onchange="handleSelectChange_customer_id(event)" style="width: 100%;">
                      <option value='' selected="selected">-Select-</option>
                      <?php
                        foreach ($customer as $value) {
                        echo "<option value='$value->hdrid'>$value->hdrid-$value->customer_name</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="customer_name">CUSTOMER NAME</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="customer_name" class="form-control" id="customer_name" >
                    </div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="customer_product_id">CUSTOMER PRODUCT ID</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="customer_product_id" class="form-control" id="customer_product_id" >
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="contact_person_name">CONTACT PERSON NAME</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="contact_person_name" class="form-control" id="contact_person_name" >
                    </div>
                </div>
              </div>

              

              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>SOURCE INFORMATION ID</label>
                  </div>
                  <div class="col-md-8">
                    <select class="form-control select2" id="source_information_id" name="source_information_id" onchange="handleSelectChange_source_information_id(event)" style="width: 100%;">
                      <option value='' selected="selected">-Select-</option>
                      <?php
                        foreach ($sourceInformation as $value) {
                        echo "<option value='$value->hdrid'>$value->hdrid-$value->source_information_name</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="source_information_name">SOURCE INFORMATION NAME</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="source_information_name" class="form-control" id="source_information_name" >
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="customer_report_number">CUSTOMER REPORT NUMBER</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="customer_report_number" class="form-control" id="customer_report_number" >
                    </div>
                </div>
              </div>

              </div>
              </div>
              
              <hr style="border:1px solid red;">

              
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>REPORT DATE:</label>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group date" data-date-format="YYYY-MM-DD" id="timepickerreport_date" data-target-input="nearest">
                      <input type="text" id="report_date" name="report_date" class="form-control datetimepicker-input" data-target="#timepickerreport_date" />
                      <div class="input-group-append" data-target="#timepickerreport_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
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



                <!---------------------------------- / Form Macro Batas sini ---------------------------------->

                <!-- Close Card Body -->  
                </div>
                  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btnsubmit">Save To Draft</button>  
                    <button type="button" class="btn btn-success" id="btnsend" onclick="sendDraft()">Send</button>                
                    <button type="button" class="btn btn-success" id="btnsend2" onclick="sendDraft2()">Save And Send</button>                
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>                   
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
               
              <form method="POST" action="<?php echo base_url('c_input_problem/import'); ?>" enctype="multipart/form-data">

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
        problem_category_id: {
        required: true,
        },
        problem_category_name: {
        required: true,
        },
        group_product_id: {
        required: true,
        },
        group_product_name: {
        required: true,
        },
        product_id: {
        required: true,
        },
        product_name: {
        required: true,
        },
        customer_id: {
        required: true,
        },
        
        customer_name: {
        required: true,
        },

        contact_person_name: {
        required: true,
        },
        source_information_id: {
        required: true,
        },
        source_information_name: {
        required: true,
        },
        customer_report_number: {
        required: true,
        },
        part_number: {
        required: true,
        },
        qty: {
        required: true,
        },
        lot_number_product: {
        required: true,
        },
        detail_problem: {
        required: true,
        },
        responsible_section: {
        required: true,
        },
        containment_date: {
        required: true,
        },
        nik: {
        required: true,
        },
        name: {
        required: true,
        },
        report_date: {
        required: true,
        },
        // status: {
        // required: true,
        // },




        // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

      },
      messages: {
    
				// ---------------------------------- Rule input Macro Batas sini 2---------------------------------
        problem_category_id: {
        required: "Please Input problem_category_id",
        minlength: 3
        },
        problem_category_name: {
        required: "Please Input problem_category_name",
        minlength: 3
        },
        group_product_id: {
        required: "Please Input group_product_id",
        minlength: 3
        },
        group_product_name: {
        required: "Please Input group_product_name",
        minlength: 3
        },
        product_id: {
        required: "Please Input product_id",
        minlength: 3
        },
        product_name: {
        required: "Please Input product_name",
        minlength: 3
        },
        customer_id: {
        required: "Please Input customer_id",
        minlength: 3
        },
        customer_name: {
        required: "Please Input customer_name",
        minlength: 3
        },
        contact_person_name: {
        required: "Please Input contact_person_name",
        minlength: 3
        },
        source_information_id: {
        required: "Please Input source_information_id",
        minlength: 3
        },
        source_information_name: {
        required: "Please Input source_information_name",
        minlength: 3
        },
        customer_report_number: {
        required: "Please Input customer_report_number",
        minlength: 3
        },
        part_number: {
        required: "Please Input part_number",
        minlength: 3
        },
        qty: {
        required: "Please Input qty",
        minlength: 3
        },
        lot_number_product: {
        required: "Please Input lot_number_product",
        minlength: 3
        },
        detail_problem: {
        required: "Please Input detail_problem",
        minlength: 3
        },
        responsible_section: {
        required: "Please Input responsible_section",
        minlength: 3
        },
        containment_date: {
        required: "Please Input containment_date",
        minlength: 3
        },
        nik: {
        required: "Please Input nik",
        minlength: 3
        },
        name: {
        required: "Please Input name",
        minlength: 3
        },
        report_date: {
        required: "Please Input report_date",
        minlength: 3
        },
        // status: {
        // required: "Please Input status",
        // minlength: 3
        // },




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
              url: "<?php echo base_url('C_input_problem/ajax_getbyhdrid')?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

   		            // ---------------------------------- Data val Macro Batas sini ---------------------------------                  
                    // $('#problem_category_id').select2().val(data.problem_category_id).trigger('change');
                    // $('#problem_category_name').val(data.problem_category_name);
                    // $('#group_product_id').select2().val(data.group_product_id).trigger('change');
                    // $('#group_product_name').val(data.group_product_name);
                    // $('#product_id').select2().val(data.product_id).trigger('change');
                    // $('#product_name').val(data.product_name);
                    // $('#customer_id').select2().val(data.customer_id).trigger('change');
                    // $('#customer_name').val(data.customer_name);
                    // $('#contact_person_name').val(data.contact_person_name);
                    // $('#source_information_id').select2().val(data.source_information_id).trigger('change');
                    // $('#source_information_name').val(data.source_information_name);
                    // $('#customer_report_number').val(data.customer_report_number);
                    // $('#part_number').val(data.part_number);
                    // $('#qty').val(data.qty);
                    // $('#lot_number_product').val(data.lot_number_product);
                    // $('#detail_problem').val(data.detail_problem);
                    // $('#responsible_section').val(data.responsible_section);
                    // $('#containment_date').val(data.containment_date);
                    // $('#nik').select2().val(data.nik).trigger('change');
                    // $('#name').val(data.name);
                    // $('#report_date').val(data.report_date);
                    // $('#status').val(data.status);
                    
                    $('#problem_category_id').select2().val(data.problem_category_id).trigger('change');
                    $('#problem_category_name').val(data.problem_category_name);
                    $('#group_product_id').select2().val(data.group_product_id).trigger('change');
                    $('#group_product_name').val(data.group_product_name);
                    $('#product_id').select2().val(data.product_id).trigger('change');
                    $('#product_name').val(data.product_name);
                    $('#customer_id').select2().val(data.customer_id).trigger('change');
                    $('#customer_name').val(data.customer_name);
                    $('#contact_person_name').val(data.contact_person_name);
                    $('#source_information_id').select2().val(data.source_information_id).trigger('change');
                    $('#source_information_name').val(data.source_information_name);
                    $('#customer_report_number').val(data.customer_report_number);
                    $('#part_number').val(data.part_number);
                    $('#qty').val(data.qty);
                    $('#lot_number_product').val(data.lot_number_product);
                    $('#problem').val(data.problem);
                    $('#detail_problem').val(data.detail_problem);
                    $('#responsible_section').val(data.responsible_section);
                    $('#containment_date').val(data.containment_date);
                    $('#nik').select2().val(data.nik).trigger('change');
                    $('#name').val(data.name);
                    $('#section1').val(data.section1);
                    $('#email1').val(data.email1);
                    $('#nik2').select2().val(data.nik2).trigger('change');
                    $('#name2').val(data.name2);
                    $('#section2').val(data.section2);
                    $('#email2').val(data.email2);
                    $('#report_date').val(data.report_date);
                    $('#status').val(data.status);
                    $('#when_problem').val(data.when_problem);
                    $('#shift_problem').val(data.shift_problem);
                    $('#time_problem').val(data.time_problem);
                    $('#who_problem').val(data.who_problem);
                    $('#where_problem').val(data.where_problem);
                    // $('#due_date').val(data.due_date);
                    $('#issue_date').val(data.issue_date);
                    $('#rank_problem').select2().val(data.rank_problem).trigger('change');
                    $('#temporary_action').select2().val(data.temporary_action).trigger('change');
                    $('#etc').val(data.etc);
                    $('#customer_product_id').val(data.customer_product_id);
                    $('#qty_lot').val(data.qty_lot);



                    if(data.delivery_status=='urgent'){
                      document.getElementById('delivery_status').checked=true;
                    }else if (data.delivery_status=='normal') {
                      document.getElementById('delivery_status2').checked=true;
                    }
                    else
                    {
                      document.getElementById('delivery_status').checked=false;
                      document.getElementById('delivery_status2').checked=false;
                    };

                    if(data.problem_name =='internal'){
                      document.getElementById('problem_name').checked=true;
                      document.getElementById('form_internal').style.display ='block';
                      document.getElementById('form_external').style.display ='none';
                    }else if(data.problem_name =='external')
                    {
                      document.getElementById('problem_name2').checked=true;
                      document.getElementById('form_external').style.display ='block';
                      document.getElementById('form_internal').style.display ='block';
                    }
                    else
                    {
                      document.getElementById('problem_name').checked=false;
                      document.getElementById('problem_name2').checked=false;
                      document.getElementById('form_internal_external').style.display ='block';
                      // document.getElementById('form_internal').style.display ='block';
                    };
                   

                    // NOTE:: ATTACH FILE NOT YET
                    // document.getElementById('attach_picture_label').innerHTML=data.attach_picture;
                    // var a = document.getElementById('attach_picture_view');
                    // if(!data.attach_picture==''){
                    //   a.href = "<php echo base_url('assets/upload/') ?>" + data.attach_picture;
                    // }else{
                    //   a.removeAttribute("href");
                    // };

                    document.getElementById('attach_picture_label').innerHTML = data.attach_picture;
                    var a = document.getElementById('attach_picture_view');
                    if (!data.attach_picture == '') {
                      a.href = "<?php echo base_url('assets/upload/PROBLEM/') ?>" + data.attach_picture;
                    } else {
                      a.removeAttribute("href");
                    };

                    document.getElementById('atachment_label').innerHTML=data.atachment;
                    var a = document.getElementById('atachment_view');
                    if(!data.atachment==''){
                      a.href = "<?php echo base_url('assets/upload/PROBLEM/') ?>" + data.atachment;
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
              document.getElementById("btnsubmit").style.visibility = "hidden";  
              document.getElementById("btnsend").style.visibility = "hidden";  
              document.getElementById("btnsend2").style.visibility = "hidden";  
              $('#exampleModalLabel').text('View Data'); //name view              
            }else{
              $('#exampleModalLabel').text('Edit Data'); //name view 
              $('#btnsubmit').text('Update'); //name Update  
              document.getElementById("btnsend2").style.visibility = "hidden";  
              document.getElementById("btnsubmit").style.visibility = "visible"; 
            }
          
          }

          // Show hide field yang diperlukan internal/external
         
        $('input[type=radio][name=problem_name]').change(function() {
          if(this.value == 'internal'){
            $("#form_external").css('display','none');
            $("#form_internal").css('display','block');
            $('#customer_id').val('');
            $('#customer_name').val('');
            $('#contact_person_name').val('');
            $('#source_information_id').val('');
            $('#source_information_name').val('');
            $('#customer_report_number').val('');
          }else if(this.value =='external'){
            $("#form_external").css('display','block');
            $("#form_internal").css('display','block');
            $('#problem_category_id').val('');
            $('#problem_category_name').val('');
            $('#group_product_id').val('');
            $('#group_product_name').val('');
            $('#product_id').val('');
            $('#product_name').val('');
          }else{
            $("#problem_name").removeAttr("checked");
            $("#form_internal_external").css('display','block');
            }
        });



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
            vurl = "<?php echo base_url('C_input_problem/ajax_add')?>";
          } else {           
            vurl = "<?php echo base_url('C_input_problem/ajax_update')?>";
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
                   // location.reload();
                    tabel.draw();

                   if(!vurl=="Add"){
                     $("#modal-default").modal('hide');
                   }

                   $("#modal-default").modal('hide');
                 
              },
              error: function (e) {
                  gagal(e);
                  //location.reload();
                  //error
              }
          });

  }

  function ajax_send_mail(){

          // Form data
          var fdata = new FormData();
          print_r(fdata);

          // Form data collect name value
          var form_data = $('#quickForm').serializeArray();
          $.each(form_data, function (key, input) {
            fdata.append(input.name, input.value);
          });

          // Penanganan jika ada type check Box uncheck
          $('#quickForm input[type="checkbox"]:not(:checked)').each(function(i, e) {           
              fdata.append(e.getAttribute("name"),"Off");
          });

          // Simpan or Update data          
          var vurl; 
          vurl = "<?php echo base_url('C_Email/ajax_send_mail_v1')?>";

          $.ajax({
              url: vurl,
              method: "post",
              processData: false,
              contentType: false,
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


  function sendDraft(){

      // Form data
      var fdata = new FormData();
      fdata.append("hdrid",$('#hdrid').val()); 
      fdata.append("nik",$('#nik').val());  

      var fdata2 = new FormData();
     
      fdata2.append("body_content",""); 
      fdata2.append("comment",""); 
      fdata2.append("status_subject","New"); 

      // Data 2
      var form_data = $('#quickForm').serializeArray();
      $.each(form_data, function (key, input) {
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
      vurl = "<?php echo base_url('C_input_problem/ajax_sendDraft')?>";
              
      $.ajax({
          url: vurl,
          method: "post",
          processData: false,
          contentType: false,
          data: fdata,
          success: function (data) {
            
                  fdata2.append("hdrid",data.status); 
                  fdata2.append("problem_name",$('#problem_name').val()); 
                  fdata2.append("group_product_name",$('#group_product_name').val()); 
                  fdata2.append("product_name",$('#product_name').val()); 
                  fdata2.append("name2",$('#name2').val()); 
                  fdata2.append("problem_category_name",$('#problem_category_name').val()); 
                  fdata2.append("body_content",data.status_transaction); 
                  fdata2.append("comment",""); 
                  fdata2.append("status_subject","");
                  fdata2.append('position_code', "2");


                var vurl2; 
                vurl2 = "<?php echo base_url('C_Email/ajax_send_mail_v2')?>";

                $.ajax({
                    url: vurl2,
                    method: "post",
                    processData: false,
                    contentType: false,
                    data: fdata2,
                    success: function (data) {                 
                       
                    },
                    error: function (e) {
                        gagal(e);
                       
                    }
                });

                berhasil("Berhasil dikirim");   
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


    function sendDraft2() {

              // Form data
              var fdata = new FormData();

              var fdata2 = new FormData();             
              fdata2.append("body_content",""); 
              fdata2.append("comment",""); 
              fdata2.append("status_subject","New");

              // Form data collect name value
              var form_data = $('#quickForm').serializeArray();
              $.each(form_data, function(key, input) {
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
              vurl = "<?php echo base_url('c_input_problem/ajax_sendDraft2') ?>";

              $.ajax({
                url: vurl,
                method: "post",
                processData: false,
                contentType: false,
                data: fdata,
                success: function(data) {

                  // gagal("hello" + data.status);
                  // print_r(data.status);
                  
                  fdata2.append("hdrid",data.status); 
                  fdata2.append("problem_name",$('#problem_name').val()); 
                  fdata2.append("group_product_name",$('#group_product_name').val()); 
                  fdata2.append("product_name",$('#product_name').val()); 
                  fdata2.append("name2",$('#name2').val()); 
                  fdata2.append("problem_category_name",$('#problem_category_name').val()); 
                  fdata2.append("body_content",data.status_transaction); 
                  fdata2.append("comment",""); 
                  fdata2.append("status_subject","");
                  fdata2.append('position_code', "2");

                  // Kirim email
                  var vurl2; 
                  vurl2 = "<?php echo base_url('C_Email/ajax_send_mail_v2')?>";
                    $.ajax({
                    url: vurl2,
                    method: "post",
                    processData: false,
                    contentType: false,
                    data: fdata2,
                    success: function (data) {                
                                                             
                    },
                    error: function (e) {
                        gagal(e);
                       
                    }
                  });


                  berhasil(data.status);   
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


      

  function Delete_data(){

      // Form data
      var fdata = new FormData();
     
      // Delete by Hdrid
      fdata.append('hdrid',$('#iddelete').text());
      // Url Post delete
      vurl = "<?php echo base_url('C_input_problem/ajax_delete')?>";

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
            }
          ],
            "ajax":
            {
                "url": "<?= base_url('C_input_problem/view_data_where');?>", // URL file untuk proses select datanya
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
                        mnu=mnu+'<div class="btn btn-success btn-sm konfirmasiView mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div>';
                        mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit mr-2" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>'; mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
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
                // {"data":"problem_category_id"},
                {"data":"problem_category_name"},
                // {"data":"group_product_id"},
                {"data":"group_product_name"},
                // {"data":"product_id"},
                {"data":"product_name"},
                // {"data":"customer_id"},
                {"data":"customer_name"},
                {"data":"contact_person_name"},
                // {"data":"source_information_id"},
                {"data":"source_information_name"},
                {"data":"customer_report_number"},
                {"data":"part_number"},
                {"data":"qty"},
                {"data":"lot_number_product"},
                {"data":"qty_lot"},
                {"data":"problem"},
                {"data":"detail_problem"},
                {"data":"responsible_section"},
                {"data":"containment_date"},
                {"data":"nik"},
                {"data":"name"},
                {"data":"section1"},
                {"data":"email1"},
                {"data":"nik2"},
                {"data":"name2"},
                {"data":"section2"},
                {"data":"email2"},
                {"data":"report_date"},
                {"data":"status"},
                {"data":"problem_name"},
                // {"data":"due_date"},
                {"data":"issue_date"},
                {"data":"rank_problem"},
                // {"data":"attach_picture"},
                {"data":"temporary_action"},
                {"data":"etc"},
                {"data":"delivery_status"},
                {"data":"when_problem"},
                {"data":"shift_problem"},
                {"data":"time_problem"},
                {"data":"who_problem"},
                {"data":"where_problem"},
                // {"data":"customer_product_id"},

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


  function handleSelectChange_problem_category_id(event) {
 
    var data = $('#problem_category_id').select2('data')[0].text;
    
    if (data=='-Select-'){
      $('#problem_category_name').val('');   
    }else{
      var res = data.split("-");
      $('#problem_category_name').val(res[1]);
    };

  }

  function handleSelectChange_group_product_id(event) {

    var data = $('#group_product_id').select2('data')[0].text;
    
    if (data=='-Select-'){
      $('#group_product_name').val('');   
    }else{
      var res = data.split("-");
      $('#group_product_name').val(res[1]);
    };

  }


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

  function handleSelectChange_customer_id(event) {

    var data = $('#customer_id').select2('data')[0].text;

    if (data=='-Select-'){
      $('#customer_name').val('');   
    }else{
      var res = data.split("-");
      $('#customer_name').val(res[1]);
    };

  }

  function handleSelectChange_source_information_id(event) {

    var data = $('#source_information_id').select2('data')[0].text;

    if (data=='-Select-'){
      $('#source_information_name').val('');   
    }else{
      var res = data.split("-");
      $('#source_information_name').val(res[1]);
    };

  }


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

  function handleSelectChange_rank_problem(event) {

  var data = $('#nik2').select2('data')[0].text;



}

  function handleSelectChange_temporary_action(event) {

  var data = $('#temporary_action').select2('data')[0].text;

}

  


  
  






// $("#containment_date").datetimepicker({
//       autoclose: true,
//       format: 'd-MM-yyyy'
      
//   });







</script>







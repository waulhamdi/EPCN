<style>
  #background {
      /* background-image: url('https://dev.azure.com/fitakwima3a/9dd192e4-e504-495a-8599-0a21852a9e5f/_apis/wit/attachments/f932e401-e06a-4dc6-97a3-d90439a8b406?fileName=internal-audit%20(2).jpg&download=true&api-version=5.0-preview.2'); */
      /* background-image: url("<php echo base_url() ?>assets/dist/img/Doc.control5.JPG");
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: cover; */
    }
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="background">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> -->
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

                            <!-- <div class="card-header"> -->
                            <div class="card-header">

                              <!-- <h4 class="card-title"> -->
                              <h4 class="card-title">

                                <!-- Jika ketemu hak akses -->
                                <?php if (!empty($hak_akses)) { ?> 
                                  <!-- Jika allow add = true -->
                                  <?php if ($hak_akses->allow_add=='on') { ?>
                                    <!-- menampilkan tombol add data-->
                                    <a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal('1','Add')" href="#">
                                      <i class="fa fa-plus"></i> Add Data
                                    </a>
                                  <?php } ?>
                                  <!-- /Jika allow add = true -->
                                <?php } ?>
                                <!-- /Jika ketemu hak akses -->

                                <!-- Jika ketemu hak akses -->
                                <?php if (!empty($hak_akses)) { ?>
                                  <!-- Jika allow_import = true -->
                                  <?php if ($hak_akses->allow_import=='on') { ?>
                                      <!-- <a data-toggle="modal" data-target="#modal-import"  href="#">
                                        <i class="fa fa-upload"></i> Import Data
                                      </a> -->
                                  <?php } ?>
                                 <!-- /Jika allow add = true -->
                                <?php } ?>
                                <!-- /Jika ketemu hak akses -->

                                <!-- custom filter bebas semua user -->
                                <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                     <i class="fa fa-binoculars"></i> Custom Filter
                                </a> -->

                              </h4>
                              <!-- /<h4 class="card-title"> -->

                            </div>
                            <!-- /<div class="card-header"> -->

                            <div id="collapseOne" class="panel-collapse collapse in">
                              <div class="card-body">

                                  <!-- Date from-->
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

                    <!-- Th Macro Batas Sini (kolom datatable)-->
 
                    <th>ACTION</th>
                    <th>TRANSACTION ID</th>
                    <th>MENU ID</th>
                    <th>MENU NAME</th>
                    <th>CONTROLLER</th>
                    <th>PARENT ID</th>
                    <th>LEVEL</th>
                    <th>ICON</th>


                    <!-- /Th Macro Batas Sini (kolom datatable)-->
                          
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


  <!-- ##################################### modal-default (Add,Edit,Delete) #####################################  -->

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

                <!---------------------------------- Form Macro Batas sini (Form Add,Edit,View)---------------------------------->

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
                        <label for="menu_id">MENU ID</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="menu_id" class="form-control" id="menu_id" >
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="menu_name">MENU NAME</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="menu_name" class="form-control" id="menu_name" >
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="controller">controller</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="controller" class="form-control" id="controller" >
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label>PARENT ID</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2" id="parentid" name="parentid" onchange="handleSelectChange_parentid(event)" style="width: 100%;">
                        <option value='' selected="selected">-Select-</option>
                        <?php
                          foreach ($parent_id as $value) {
                          echo "<option value='$value->menu_id'>$value->menu_id-$value->menu_name</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label>level</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2" id="level" name="level"  style="width: 100%;">
                        <option value='' selected="selected">-Select-</option>
                        <option value='1' >1</option>
                        <option value='2' >2</option>                        
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-4">
                        <label for="icon">icon</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="icon" class="form-control" id="icon" >
                      </div>
                  </div>
                </div>



                
                <!---------------------------------- / Form Macro Batas sini (Form Add,Edit,View)---------------------------------->

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

  <!-- ##################################### modal-delete #####################################  --> 

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
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>       
              <form action="#" method="post">
                <button type="button" id="delete" onclick="Delete_data()" class="btn btn-outline-light">Yes</button>    
              </form>     
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal Delete-->
  <!-- ##################################### / modal-delete #####################################  --> 

  <!-- ##################################### modal-import #####################################  --> 
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
               
              <form method="POST" action="<?php echo base_url('c_Menu/import'); ?>" enctype="multipart/form-data">

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

  <!-- ##################################### /modal-import #####################################  -->  

<script type="text/javascript">

 /// @see
 /// @note 
  $(document).ready(function () { // Jika dokumen terbuka
    $.validator.setDefaults({
      submitHandler: function () { //menangani submit data

        var status=$('#exampleModalLabel').text();       
        if (status=="Add Data"){ // jika form adalah Add Data         
           Simpan_data("Add"); // Fungsi simpan data  // Ajax insert data
        }else if(status=="Edit Data"){ // jika form adalah Edit Data            
           Simpan_data("Update"); // Ajax update data
        }else{
          berhasil(status);
        }

      }
    });

    $('#quickForm').validate({ //Validasi input data
      rules: {

				// ---------------------------------- Rule input Macro Batas sini 1---------------------------------

        menu_id: {
        required: true,
        },
        menu_name: {
        required: true,
        },
        controller: {
        required: true,
        },
      
        level: {
        required: true,
        },
        // icon: {
        // required: true,
        // },


        // ---------------------------------- / Rule input Macro Batas sini 1--------------------------------

      },
      messages: {
    
				// ---------------------------------- Rule input Macro Batas sini 2---------------------------------


        menu_id: {
        required: "Please Input menu_id",
        minlength: 3
        },
        menu_name: {
        required: "Please Input menu_name",
        minlength: 3
        },
        controller: {
        required: "Please Input controller",
        minlength: 3
        },       
        level: {
        required: "Please Input level",
        minlength: 3
        },
        // icon: {
        // required: "Please Input icon",
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
  
  /// @see fungsi view modal
   /// @note Jika tombol Add maka clear form dan jika tombol edit maka munculkan data 
  function view_modal(hdrid1,status){
                             
          if (status=="Add"){ // Jika tombol Add

            $('#exampleModalLabel').text('Add Data');  // name view
            $('#quickForm')[0].reset(); // reset form   
            $('#btnsubmit').text('Save'); // name Save
            document.getElementById("btnsubmit").style.visibility = "visible";    // tombol submit dimunculkan         
           

          }else { // Jika tombol Edit
           
            // Get Hdri ID
            $('#hdrid').val(hdrid1);
            var hdrid=hdrid1;   

             // Ajax get data berdasarkan ID
              $.ajax({
              url: "<?php echo base_url('C_Menu/ajax_getbyhdrid')?>",
              method: "get",
              dataType : "JSON",              
              data: {hdrid:hdrid1},
              success: function (data) {

   		            // ---------------------------------- Data val Macro Batas sini ---------------------------------         
                   
                    $('#menu_id').val(data.menu_id);
                    $('#menu_name').val(data.menu_name);
                    $('#controller').val(data.controller);
                    $('#parentid').select2().val(data.parentid).trigger('change');
                    $('#level').select2().val(data.level).trigger('change');
                    $('#icon').val(data.icon);



                  // ---------------------------------- / Data val Macro  Batas sini ------------------------------
                  
                  tabel.draw();
                  // location.reload();

                                                           
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

  /// @see fungsi ajax simpan data(Add/update)
  /// @note untuk memproses data Add / update
   function Simpan_data($trigger){

          // Buat Form data
          var fdata = new FormData();
          
          // Isi semua post data ke form data
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


          // Simpan or Update data          
          var vurl; 
          if($trigger == 'Add') {            
            vurl = "<?php echo base_url('C_Menu/ajax_add')?>"; // jika trigger ADD
          } else {           
            vurl = "<?php echo base_url('C_Menu/ajax_update')?>"; // Jika trigger update
          }
          
          //Ajax post data
          $.ajax({
              url: vurl,
              method: "post",
              processData: false,
              contentType: false,
              data: fdata,
              success: function (data) {
                 
                   // Pesan berhasil
                   berhasil(data.status);
                   // datatables reload
                  //  location.reload();
                   // Reset Form inputan
                   $('#quickForm')[0].reset();               
                  
                  
                    // $("#modal_default").modal('hide');
                    tabel.draw();

                   if(!vurl=="Add"){ // Jika Add maka form Add nututp
                     $("#modal-default").modal('hide');
                   }
                 
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
      vurl = "<?php echo base_url('C_Menu/ajax_delete')?>";

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
              // location.reload()  

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
            // "scrollX":true,
            // "scrollY":300,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 2, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)

            <?php if(!empty($hak_akses)){ if ($hak_akses->allow_export=='on') { ?> //Jika hak akses allow export

                dom: "lfBrtip",
                buttons: [
                // {
                //   extend: 'copyHtml5',
                //   className: 'btn btn-secondary',
                //   text: '<i class="fas fa-copy">&nbsp</i> Copy Data to Clipboard',
                // },
                // {
                //   extend: 'csvHtml5',
                //   className: 'btn btn-info',
                //   text: '<i class="fas fa-file-csv">&nbsp</i> Export Data to CSV',
                // },
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
                // {
                //   extend : 'pdfHtml5',             
                //   className: 'btn btn-danger',
                //   text: '<i class="fas fa-file-pdf">&nbsp</i> Export Data to PDF',
                //   orientation : 'landscape',
                //   pageSize : 'A4',
                //   download: 'open'
                // }
              ],

            <?php } } ?>

            "ajax":
            {
                "url": "<?= base_url('C_Menu/view_data_where');?>", // URL file untuk proses select datanya
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
                        mnu=mnu+'<div class="btn btn-success btn-sm konfirmasiView" style="margin-left:3.5 vh" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div>';
                       
                        //Tombol Edit
                        <?php if(!empty($hak_akses)){ if ($hak_akses->allow_edit=='on') { ?>
                            mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit" style="margin-left:1vh" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                        <?php } } ?>

                        //Tombol Delete
                        <?php if(!empty($hak_akses)){ if ($hak_akses->allow_delete=='on') { ?>
                            mnu=mnu+'<div class="btn btn-danger btn-sm konfirmasiHapus" style="margin-left:1vh" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                        <?php } } ?>


                        // <php if ($this->session->userdata('WT202105008Edit'||$this->session->userdata('rolename')=='Administrator')) { ?>
                        //   mnu=mnu+'<div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                         
                        //   // return '<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div>  <div class="btn btn-primary btn-sm konfirmasiEdit" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit"></i></div>';
                        // <php } if ($this->session->userdata('WT202105008Delete')||$this->session->userdata('rolename')=='Administrator') { ?>
                        //   mnu=mnu + '<div class="btn btn-danger btn-sm konfirmasiHapus" data-id="'+ data +'" data-toggle="modal" data-target="#modal-delete" > <i class="fa fa-trash"></i></div>';
                        //   // return '<div class="btn btn-success btn-sm konfirmasiView" data-id="'+ data +'" data-toggle="modal" data-target="#modal-default" > <i class="fa fa-eye"></i></div> ';
                        // <php } ?>
                        
                        return mnu;

                    }  
                },
                
                // ---------------------------------- Datatables Macro Batas sini ---------------------------------
                 
                  {"data":"hdrid"},
                  {"data":"menu_id"},
                  {"data":"menu_name"},
                  {"data":"controller"},
                  {"data":"parentid"},
                  {"data":"level"},
                  {"data":"icon"},

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

  ///@see menghandle select filter change nik
  ///@note ketika nik di select
  function handleSelectChange_nik(event) {

    //  By Text
    var value = $("#nik option:selected").text();  // ambil data yang diselect
    var res = value.split("-"); // split data yang diselect berdasarkan (-)
    $('#name').val(res[1]);  // Isi data hasil dari split

  }

  ///@see menghandle select filter change section
  ///@note ketika nik di select
  function handleSelectChange_parentid(event) {

    //  By Value
    var selectElement = event.target; // ambil data yang diselect
    var value = selectElement.value; // ambil berdasarkan value 

    if(value==''){     
      $('#level').select2().val('1').trigger('change');
    }   
    else{      
      $('#level').select2().val('2').trigger('change');
    }
    

  }

</script>







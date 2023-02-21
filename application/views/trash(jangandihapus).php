///@see get untuk search data List PCN
            ///@note fungsi untuk mencari data list pcn
            ///@attention jika data yang ditarik tidak sesuai maka tidak akan muncul
            var search2 = document.getElementById('search2');
            var listPCN2 = document.getElementById('listPCN2');

            search2.addEventListener('keyup', function() {
                if (search2.value == "") {
                    var isi = "all";
                } else {
                    var isi = search2.value;
                }
                $.ajax({
                    url: "<?php echo base_url('C_Dashboard_new/ajaxGet_pcn_has_temporaryApproved')?>",
                    type: "get",
                    dataType: "JSON",
                    data: {value:isi},
                    success: function(data) {
                        if(data.length == 0){
                            $('#listPCN2').empty();
                            $('#listPCN2').append('<tr><td colspan="9" style="text-align:center">=== Data Not Found ===</td></tr>');
                        }else{
                            console.log(data);
                            var i = 1;
                            $('#listPCN2').empty();
                            $.each(data, function(key, listPCN2) {
                                $('#listPCN2').append('<tr style="text-align:center; vertical-align: middle;"><td style="vertical-align: middle;">' + i + '</td><td style="vertical-align: middle;">' + listPCN2.hdrid + '</td><td style="vertical-align: middle;">' + listPCN2.supplier_name + '</td><td style="vertical-align: middle;">' + listPCN2.object_type + '</td><td style="vertical-align: middle;">' + listPCN2.product_name + '</td><td style="vertical-align: middle;">' + listPCN2.part_name + '</td><td style="vertical-align: middle;"><b>' + listPCN2.criteria_critical_item + '</b></td><td style="vertical-align: middle;"><b>' + listPCN2.stat + '</b></td><td style="vertical-align: middle;"><a href=""><button type="button" class="btn btn-primary">Detail</button></a></td></tr>');
                                i++;
                            });
                        }

                  }, 
                  error: function(e){
                    alert(e);
                  }
                });
            });


            public function ajaxGet_pcn_has_temporaryApproved(){
        $data = $this->M_PCN->ajaxGet_pcn_has_temporaryApproved();
		echo json_encode($data);
    }

    ///@see get untuk search data List PCN
            ///@note fungsi untuk mencari data list pcn
            ///@attention jika data yang ditarik tidak sesuai maka tidak akan muncul
            var search = document.getElementById('search');
            var listPCN = document.getElementById('listPCN');

            search.addEventListener('keyup', function() {
                console.log("wkwk");
                // if (search.value == "") {
                //     var isi = "all";
                // } else {
                //     var isi = search.value;
                // }
                // $.ajax({
                //   url: "<?php echo base_url('C_Dashboard_new/ajaxGet_pcn_list')?>",
                //   type: "get",
                //   dataType: "JSON",
                //   data: {value:isi},
                //   success: function(data) {
                //     console.log(data);
                //       // if(data.length == 0){
                //       //     $('#listPCN').empty();
                //       //     $('#listPCN').append('<tr><td colspan="9" style="text-align:center">=== Data Not Found ===</td></tr>');
                //       // }else{
                //       //     console.log(data);
                //       //     var i = 1;
                //       //     $('#listPCN').empty();
                //       //     $.each(data, function(key, listPCN) {
                //       //         $('#listPCN').append('<tr style="text-align:center; vertical-align: middle;"><td style="vertical-align: middle;">' + i + '</td><td style="vertical-align: middle;"><a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal('<?= $pcn->hdrid ?>', '<?= $pcn->object_type ?>')" href="#"><button type="button" class="btn btn-primary">Detail</button></a></td><td style="vertical-align: middle;">' + listPCN.hdrid + '</td><td style="vertical-align: middle;">' + listPCN.supplier_name + '</td><td style="vertical-align: middle;">' + listPCN.object_type + '</td><td style="vertical-align: middle;">' + listPCN.product_name + '</td><td style="vertical-align: middle;">' + listPCN.part_name + '</td><td style="vertical-align: middle;"><b>' + listPCN.criteria_critical_item + '</b></td><?php $output = explode("-", listPCN.stat)?><td style="vertical-align: middle;"><b><?= $output[0] ?></b></td><td style="vertical-align: middle;"><b><?= $output[1] ?></b></td><td style="vertical-align: middle;"><b><?= $output[2] ?></b></td></tr>');
                //       //         i++;
                //       //     });
                //       // }

                //   }, 
                //   error: function(e){
                //     alert(e);
                //   }
                // });

            });

            <section class="col-lg-12 connectedSortable"><!--untuk ukuran panjang container-->
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card"><!--untuk class bagian kepala aplikasi--> 
              <div class="card-header">  <!--untuk jenis bagian kepala aplikasi-->
                <h3 class="card-title">  <!--untuk jenis bagian judul aplikasi-->
                <i class="fas fa-th mr-2"></i><!--menambahkan ikon pada field-->
                  PCN Need your approval
                </h3>
                <div class="card-tools"><!--untuk jenis bagian tools aplikasi-->
                <button type="button" class="btn bg-dark btn-sm" data-card-widget="collapse"><!--penambahan button,warna dan collaps-->
                  <i class="fas fa-minus"></i><!--untuk mensilent bagian bawah dan tengah field-->
                </div>
              </div><!-- /.card-header -->
              <div class="card-body"><!--untuk jenis bagian badan aplikasi-->
              <?php if (count($pcn_list) > 0): ?>
                <div class="row mb-3">
                  <div class="col-lg-4">
                    <form action="simple-results.html">
                      <div class="input-group">
                        <input type="search" class="form-control form-control-lg" id="search2" placeholder="Type your keywords here">
                        <div class="input-group-append">
                          <button disabled type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>  
                    </form>
                  </div>
                </div>
                <div  style="overflow-x: hidden; overflow:scroll; max-height:520px; width:100%">
                  <table id="example1" class="table table-bordered display nowrap table-striped"> <!--jenis table-->
                    <thead>
                      <tr style="text-align:center">
                        <!-- Th Macro Batas Sini -->
                        <th >No.</th>
                        <th >Action</th>
                        <th >PCN Number</th>
                        <th >Supplier Name</th>
                        <th >Object Type</th>
                        <th >Prdoduct Name</th>
                        <th >Part Name</th>
                        <th >Critical Type</th>
                        <th >Current Approver</th>
                        <th >Dept.</th>
                        <th >Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; ?>
                      <?php foreach($pcn_list as $pcn):?>
                        <tr style="text-align:center; vertical-align: middle;">
                          <td style="vertical-align: middle;">
                            <?= $i ?>
                          </td>
                          <td style="vertical-align: middle;">
                            <a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal('<?= $pcn->hdrid ?>', '<?= $pcn->object_type ?>')" href="#">
                              <button type="button" class="btn btn-primary">Detail</button>
                            </a>
                          </td>
                          <td style="vertical-align: middle;">
                            <?= $pcn->hdrid; ?>
                          </td>
                          <td style="vertical-align: middle;">
                            <?= $pcn->supplier_name ?>
                          </td>
                          <td style="vertical-align: middle;">
                            <?= $pcn->object_type ?>
                          </td>
                          <td style="vertical-align: middle;">
                            <?= $pcn->product_name ?>
                          </td>
                          <td style="vertical-align: middle;">
                            <?= $pcn->part_name ?>
                          </td>
                          <td style="vertical-align: middle;">
                            <b><?= $pcn->criteria_critical_item ?></b>
                          </td>

                          <?php $output = explode("-", $pcn->stat)?>

                          <td style="vertical-align: middle;">
                            <b><?= $output[0] ?></b>
                          </td>
                          <td style="vertical-align: middle;">
                            <b><?= $output[1] ?></b>
                          </td>
                          <td style="vertical-align: middle;">
                            <b><?= $output[2] ?></b>
                          </td>
                        </tr>
                      <?php $i++; ?>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              <?php else: ?>
                <div class="col-md-12" style="text-align:center; font-size:24px; color:grey;"><b>Nothing PCN Need Your Approve</b></div>
              <?php endif; ?>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

          $('#listPCN').append('<tr style="text-align:center; vertical-align: middle;"><td style="vertical-align: middle;">' + i + '</td><td style="vertical-align: middle;"><a data-toggle="modal" data-target="#modal-default"  Onclick="view_modal(' + listPCN.hdrid +', ' + listPCN.object_type + ')" href="#"><button type="button" class="btn btn-primary">Detail</button></a></td><td style="vertical-align: middle;">' + listPCN.hdrid + '</td><td style="vertical-align: middle;">' + listPCN.supplier_name + '</td><td style="vertical-align: middle;">' + listPCN.object_type + '</td><td style="vertical-align: middle;">' + listPCN.product_name + '</td><td style="vertical-align: middle;">' + listPCN.part_name + '</td><td style="vertical-align: middle;"><b>' + listPCN.criteria_critical_item + '</b></td><?php $output = explode("-", ' + listPCN.stat + ')?><td style="vertical-align: middle;"><b><?= $output[0] ?></b></td><td style="vertical-align: middle;"><b><?= $output[1] ?></b></td><td style="vertical-align: middle;"><b><?= $output[2] ?></b></td></tr>');




          <!-- .card-header -->
          <div class="card-header" > <!-- untuk bagian kepala aplikasi -->              
                <div class="row"><!-- untuk row aplikasi-->
                   <div class="col-md-12"><!--untuk ukuran panjang container-->
                    <div class="card">       <!--untuk class bagian kepala aplikasi-->       
                      <div class="card-header">    <!--untuk jenis bagian kepala aplikasi-->
                      <div id="accordion"> <!--untuk menampilkan dan menyembunyikan element HTML-->
                          <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                          <div class="card card-primary" > <!--untuk primary kepala aplikasi-->
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
                        <div class="card-body">  <!-- .card-body -->
                          <table id="example2" class="table table-bordered display nowrap table-striped"> <!--jenis table-->
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
                              <th>COMMODITY</th>
                              <th>QA PIC</th>
                              <th>REGISTERED</th>
                              <th>MASSPRO SCHEDULE</th>
              
                              <!-- /Th Macro Batas Sini -->
                                    
                              </tr>
                            </thead>
                                <!-- <tbody></tbody> -->
                          </table>      
                        </div> <!-- /.card-body -->
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- END ACCORDION & CAROUSEL-->                                      
              </div> 
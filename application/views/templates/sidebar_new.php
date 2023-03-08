<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?php echo base_url() ?>assets/dist/img/Logo Denso DMIA.png" alt="AdminLTE Logo" style="opacity: .8">
    <span class="brand-text font-weight-light"> </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="image">
        <img src="<?php echo base_url() ?>assets/foto/login1.jpg" class="img-circle elevation-3" alt="User Image" />
      </div>

      <!-- Menampilkan foto -->
      <div class="image">

        <?php

        if ($this->session->userdata('authenticated')) {

          // $data = base64_encode($this->session->userdata('ImageData'))    ;    
          // echo '<img src="data:image/gif;base64,' . $data . '" class="img-circle elevation-3" alt="User Image"  />';

        } else {

          // echo '<img src="assets/foto/login1.jpg" class="img-circle elevation-3" alt="User Image"  />';

        }

        ?>

      </div>
      <div class="info">

        <a href="#" class="d-block">
          <?php
          if ($this->session->userdata('authenticated')) {
            echo $this->session->userdata('nama');
          } else {

            echo 'Anonymous';
          }

          ?>
        </a>
        <!-- email -->
        <a href="#" class="d-block">
          <?php
          if ($this->session->userdata('authenticated')) {
            echo '( '.$this->session->userdata('rolename').' )';   
          } else {
            echo '';
          }
          ?>
        </a>
      </div>
    </div>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <!-- nav-pills -->
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


        <?php  foreach ($menu_akses as $value) {  ?>

          <?php  if($value->parentid=='') {  ?>

            <!-- User Guide -->
            <li class="nav-item has-treeview">

                <!-- Ini apa ? --> 
                <a href="#" class="nav-link">
                  <i class="nav-icon fas <?php echo $value->icon ?>"></i>
                  <p>
                    <?php echo $value->menu_name ?>
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
            
                <!-- UL User Setting -->
                <ul class="nav nav-treeview">

                  <!-- Role  -->                
                  <?php  foreach ($menu_akses as $value2) {  ?>

                    <?php  if($value2->parentid==$value->menu_id) {  ?>
                      
                      <?php $menu_name = $value2->menu_name; ?>

                      <ul class="nav-item">
                        <a href="<?php echo base_url() ?><?php echo $value2->controller ?>?var=<?php echo $value2->menu_id ?>&var2=<?php echo $menu_name ?>" class="nav-link">
                          <i class="nav-icon fa <?php echo $value2->icon ?>"></i>
                          <p><?php echo $value2->menu_name ?></p>
                        </a>
                      </ul>

                    <?php } ?>

                  <?php } ?>

                </ul>
                <!-- /UL User Guide -->

            </li>
            <!-- /User Guide -->

          <?php } ?>
          
        <?php } ?>
        
        <!-- /Menu base on database -->
        
      
        <!-- Menu Setting -->
        <li class="nav-item has-treeview">

          <?php if ($this->session->userdata('rolename') == 'Super Admin') { ?>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Menu Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <?php } ?>

          <!-- UL User Setting -->
          <ul class="nav nav-treeview">

            <!-- Menu  -->
            <?php if ($this->session->userdata('rolename') == 'Super Admin') { ?>
              <ul class="nav-item">
                <a href="<?php echo base_url() ?>C_Menu" class="nav-link">
                  <i class="nav-icon fas fa-bars text-secondary"></i>
                  <p>Menu</p>
                </a>
              </ul>
            <?php } ?>


          </ul>
          <!-- /UL User Setting -->

        </li>
        <!-- /Menu Setting -->

        <!-- User Guide -->
        <li class="nav-item has-treeview">

          
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book text-danger"></i>
              <p>
                User Guide
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
         
            <!-- UL User Setting -->
            <ul class="nav nav-treeview">

              <!-- Role  -->
            
                <li class="nav-item">
                  <a href="<?php echo base_url('assets/userguide/userguide.pdf') ?>" target="_blank" class="nav-link">
                    <i class="nav-icon fa fa-user-cog"></i>
                    <p>Manual Instruction (PDF)</p>
                  </a>
                </li>

              <!-- User  -->
            
                <li class="nav-item">
                  <a href="<?php echo base_url('C_video') ?>" target="_blank" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Inisiator (Video)</p> 
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('C_video/video2') ?>" target="_blank" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Approver (Video)</p>
                  </a>
                </li>

              

            </ul>
            <!-- /UL User Guide -->

        </li>
        <!-- /User Guide -->

        
        <?php if($this->session->userdata('user_name')==''){ ?>
          <!-- Login -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('Auth/login') ?>" class="nav-link">
              <i class="nav-icon fa fa-power-off text-success"></i>
              <p>
                Login
              </p>
            </a>
          </li>
        <!-- /Login -->
          
          <?php }else{ ?>
        <!-- Logout -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('Auth/logout') ?>" class="nav-link">
              <i class="nav-icon fa fa-power-off text-danger"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        <!-- /Logout -->
        
        <?php } ?>

      </ul>
      <!-- /nav-pills -->

    </nav>

    <!-- /.sidebar-menu -->

  </div>

  <!-- /.sidebar -->

</aside>
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
  <!-- nama user -->
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

        <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->

        <!-- <php if($this->session->userdata('rolename')=='Administrator EPCN' ||  $this->session->userdata('rolename')=='Administrator EPCN' ){ ?>   
          <li class="nav-item has-treeview">
            <a href="<php echo base_url('C_employee') ?>" class="nav-link">              
              <i class="nav-icon fa fa-home"></i>
              <p>Employee</p>
            </a>   
          </li>
          <php } ?> -->

        <!-- Form -->
        <li class="nav-item has-treeview">

          <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' ||  $this->session->userdata('rolename') == 'Administrator EPCN') { ?> -->


              <!-- link pcn register -->
            <a href="#" class="nav-link">
              <i class="nav-icon fa  fa-folder"></i>
              <p>
                PCN
                <i class="fas fa-angle-left right"></i>
              </p>
                        
            </a>

           

          <!-- <php } ?> -->

          <!-- UL Forms -->
          <ul class="nav nav-treeview">

                <!--form pcn register-->
                <li class="nav-item">
                <a href="<?php echo base_url() ?>C_PCN" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    PCN REGISTER
                  </p>
                </a>
              </li>

               <!--form application-->
               <li class="nav-item">
                <a href="<?php echo base_url() ?>C_application" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                  APPLICATION RESPONSE
                  </p>
                </a>
              </li>
              
              <!--form po tooling-->
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_tooling" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    PO TOOLING
                  </p>
                </a>
              </li>

                 <!--form pcn list-->
                 <li class="nav-item">
                <a href="<?php echo base_url() ?>C_PCNLIST" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    PCN LIST
                  </p>
                </a>
              </li> 
            <!-- <php } ?> -->
          </ul>
          <!-- /UL Forms -->
        </li>
        <!-- /Forms -->

              <!-- Form application -->
              <!-- <li class="nav-item has-treeview"> -->

            <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' ||  $this->session->userdata('rolename') == 'Administrator EPCN') { ?> -->
              <!-- <a href="#" class="nav-link">
                <i class="nav-icon fa  fa-folder"></i>
                <p>
                  PLAN APPROVAL
                  <i class="fas fa-angle-left right"></i>
                </p>
                          
              </a>
              <ul class="nav nav-treeview">

               

              </ul> -->
                      <!-- /UL Forms -->

                    <!-- </li> -->

  
                    <!-- /Forms -->

              <!-- Form application -->
              <li class="nav-item has-treeview">

            <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' ||  $this->session->userdata('rolename') == 'Administrator EPCN') { ?> -->
              <!-- <a href="#" class="nav-link">
                <i class="nav-icon fa  fa-folder"></i>
                <p>
                  ISIR
                  <i class="fas fa-angle-left right"></i>
                </p>
                          
              </a> -->
              <!-- <ul class="nav nav-treeview"> -->
            <!-- form ISIR -->
                <li class="nav-item">
                <a href="<?php echo base_url() ?>C_ISIR" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    ISIR 
                  </p>
                </a>
              </li>
            <!-- form ISIR LIST  -->
               <!-- <li class="nav-item">
                <a href="<?php echo base_url() ?>C_ISIR_LIST" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    ISIR LIST
                  </p>
                </a>
              </li> 
            </ul> -->

            
            <!--form QCR-->
            <li class="nav-item has-treeview">
              <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' ||  $this->session->userdata('rolename') == 'Administrator EPCN') { ?> -->
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_QCR" class="nav-link">
                  <i class="nav-icon fa  fa-folder"></i>
                    <p>
                      QCR
                    </p>     
                </a>
              </li>
            </li>
                <!-- <ul class="nav nav-treeview">
                  <li class="nav-item">
                <a href="<php echo base_url() ?>C_QCR" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    QCR REGISTER
                  </p>
                </a>
      
                  </li>
              </li>    -->

                            

                  <!--form QCR LIST-->
                  <!-- <li class="nav-item">
                      <a href="<php echo base_url() ?>C_QCRLIST" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                          <p>
                            QCR LIST
                          </p>
                      </a>
                  </li>
              </ul> -->


                  <!--form final approval-->
                  <!-- <li class="nav-item">
                <a href="<php echo base_url() ?>C_finalapproval" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    FINAL APPROVAL
                  </p>
                </a>
       
              </li> -->

            

            
            
            
              <!-- Forms Input Problem  -->
            <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012') || $this->session->userdata('rolename') == 'User Quality') { ?>
              <li class="nav-item">
                <a href="<php echo base_url() ?>C_input_problem" class="nav-link">
                  <i class="nav-icon fas fa-sticky-note"></i>
                  <p>
                    Form Input Problem
                  </p>
                </a>
              </li>
            <php } else { ?>

            <php } ?> -->

             <!-- <li class="nav-item">
                <a href="<php echo base_url() ?>C_Print_approved/print_report2_approved?var1=BD/GS34/2022/01/002&var2=DM1902060&var3=widodo 12" target="_blank" class="nav-link">
                  <i class="nav-icon fas fa-sticky-note"></i>
                  <p>
                    Link
                  </p>
                </a>  
             </li> -->

            <!-- Forms Input Problem  -->
            <!-- <php if ($this->session->userdata('rolename') == 'Approver Quality' || $this->session->userdata('rolename') == 'Administrator EPCN') { ?> -->
              <!-- <li class="nav-item">
                <a href="<php echo base_url() ?>C_progress" class="nav-link">
                  <i class="nav-icon fas fa-sticky-note"></i>
                  <p>
                    Form Progress
                  </p>
                </a>
              </li> -->



        <!-- ppm & case -->
        <!-- <li class="nav-item has-treeview">

          <php if ($this->session->userdata('rolename') == 'Administrator EPCN' ||  $this->session->userdata('rolename') == 'Administrator EPCN') { ?>
            <a href="#" class="nav-link">
              <i class="nav-icon fa  fa-project-diagram"></i>
              <p>
                PPM & CASE
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <php } ?> -->

          <!-- UL ppm & case  -->
          <!-- <ul class="nav nav-treeview"> -->

            <!-- ppm & case  Input Problem  -->
            <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<php echo base_url() ?>C_ppm_case_target" class="nav-link">
                  <i class="nav-icon fas fa-sticky-note"></i>
                  <p>
                    Target PPM & CASE
                  </p>
                </a>
              </li>
            <php } ?> -->

            <!-- ppm & case  Input Problem  -->
            <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<php echo base_url() ?>C_ppm_case_target" class="nav-link">
                  <i class="nav-icon fas fa-sticky-note"></i>
                  <p>
                    Monthly PPM & CASE
                  </p>
                </a>
              </li>
            <php } ?> -->

            <!-- ppm & case  Input Problem  -->
            <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<php echo base_url() ?>C_ppm_case_target_yearly" class="nav-link">
                  <i class="nav-icon fas fa-sticky-note"></i>
                  <p>
                    Yearly PPM & CASE
                  </p><br>
                </a>
              </li>
            <php } ?> -->


            <!-- ppm & case  Input Problem  -->
            <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<php echo base_url() ?>C_ppm_case_input" class="nav-link">
                  <i class="nav-icon fas fa-sticky-note"></i>
                  <p>
                    Input PPM & CASE
                  </p>
                </a>
              </li>
            <php } ?> -->


          <!-- </ul> -->
          <!-- /UL ppm & case  -->

        <!-- </li> -->
        <!-- /ppm & case  -->

        <!-- User Setting -->
        <li class="nav-item has-treeview">

          <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' ||  $this->session->userdata('rolename') == 'Administrator EPCN') { ?>
            <a href="#" class="nav-link">
              <i class="nav-icon fa  fa-user-cog"></i>
              <p>
                User Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <?php } ?>

          <!-- UL User Setting -->
          <ul class="nav nav-treeview">

            <!-- Role  -->
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103011')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_Role" class="nav-link">
                  <i class="nav-icon fa fa-user-cog"></i>
                  <p>Role</p>
                </a>
              </li>
            <?php } ?>

            <!-- Role  access-->
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103011')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_Role_Access" class="nav-link">
                  <i class="nav-icon fa fa-user-cog"></i>
                  <p>Role Access</p>
                </a>
              </li>
            <?php } ?>

            <!-- User  -->
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' ||  $this->session->userdata('MN202103009')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_User" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>User System</p>
                </a>
              </li>
            <?php } ?>

          </ul>
          <!-- /UL User Setting -->

        </li>
        <!-- /User Setting -->

        <!-- System Setting  -->
        <li class="nav-item has-treeview">

          <!-- <php if($this->session->userdata('role_id')=='RL202104002' ){ ?> -->
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('rolename')=='User Procurement') { ?>

          <a href="#" class="nav-link">
            <i class="nav-icon fas  fa-tools"></i>
            <p>
              System Setting
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <?php } ?>

          <!-- UL Menu Setting  -->
          <ul class="nav nav-treeview">

            <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<php echo base_url() ?>C_Menu" class="nav-link">
                  <i class="nav-icon fas fa-chevron-circle-down"></i>
                  <p>
                    Menu Setting
                  </p>
                </a>
              </li>
            <php } ?> -->

             <!-- problem category -->
            <!-- <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_problem_category" class="nav-link">
                  <i class="nav-icon fas fa-exclamation-circle"></i>
                  <p>
                    Problem Category
                  </p>
                </a>
              </li>
            <?php } ?> -->

               <!-- group product -->
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_group_product" class="nav-link">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                    Group Product
                  </p>
                </a>
              </li>
            <?php } ?>

             <!-- product -->
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_product" class="nav-link">
                  <i class="nav-icon fas fa-box"></i>
                  <p>
                    Product
                  </p>
                </a>
              </li>
            <?php } ?>

             <!-- customer name
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_Customer_name" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Customer Name
                  </p>
                </a>
              </li>
            <?php } ?> -->

             <!-- source information
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_source_information" class="nav-link">
                  <i class="nav-icon fas fa-info-circle"></i>
                  <p>
                    Source Information
                  </p>
                </a>
              </li>
            <?php } ?> -->


               <!-- setting cc email
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_setting_approval" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Setting CC email
                  </p>
                </a>
              </li>
            <?php } ?> -->

               <!-- setting superior -->
            <!-- <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_superior" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Setting Superior
                  </p>
                </a>
              </li>
            <?php } ?> -->

            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_superior_proc" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Setting Superior Procurement
                  </p>
                </a>
              </li>
            <?php } ?>

            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_superior_qa" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Setting Superior QA
                  </p>
                </a>
              </li>
            <?php } ?>

            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_superior_qc" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Setting Superior QC
                  </p>
                </a>
              </li>
            <?php } ?>

            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_reminder" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Setting Reminder System
                  </p>
                </a>
              </li>
            <?php } ?>
         
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_sys_set_app" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Setting Application Response
                  </p>
                </a>
              </li>
            <?php } ?>

            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_setting_app_member" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Setting Application Response Member
                  </p>
                </a>
              </li>
            <?php } ?>
            
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN' || $this->session->userdata('MN202103012')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_ISIR_Mail" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Setting ISIR Mail
                  </p>
                </a>
              </li>
            <?php } ?>

             <!-- delegation -->
             <!-- <?php if ($this->session->userdata('rolename') == 'Administrator EPCN') { ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>C_delegation" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Delegation
                  </p>
                </a>
              </li>
            <?php } ?> -->
            

             <!-- departement-->
            <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' ||  $this->session->userdata('WT202105007')) { ?>
              <li class="nav-item">
                <a href="<php echo base_url() ?>C_Department" class="nav-link">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                    Department
                  </p>
                </a>
              </li>
            <php } ?> -->

            <!-- <php if ($this->session->userdata('rolename') == 'Administrator EPCN' ||  $this->session->userdata('WT202105007')) { ?>
              <li class="nav-item">
                <a href="<php echo base_url() ?>C_Position" class="nav-link">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                    Position
                  </p>
                </a>
              </li>
            <php } ?> -->

          </ul>
          <!-- /UL Menu Setting  -->

        </li>
        <!-- /System Setting  -->

        <!-- Monitoring Problem  -->
        <!-- <li class="nav-item has-treeview">
          <a href="<php echo base_url() ?>C_monitoring_problem" class="nav-link">
            <i class="nav-icon fa fa-tv"></i>
            <p>
              Monitoring Problem
            </p>
          </a>
        </li> -->
        <!-- /Monitoring Problem  -->

        <!-- Menu Setting -->
        <li class="nav-item has-treeview">

          <?php if ($this->session->userdata('rolename') == 'Administrator EPCN') { ?>
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
            <?php if ($this->session->userdata('rolename') == 'Administrator EPCN') { ?>
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
              <i class="nav-icon fas fa-book"></i>
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


        <li class="nav-item has-treeview">
          <a href="<?php echo base_url('Auth/logout') ?>" class="nav-link">
            <i class="nav-icon fa fa-power-off text-danger"></i>
            <p>
              Logout
            </p>
          </a>
        </li>

      </ul>
      <!-- /nav-pills -->

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
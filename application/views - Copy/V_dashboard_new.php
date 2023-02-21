 <!-- // ********************* PHP untuk memanggil array data dari Controller  ********************* -->

        <!-- // ********************* PIE CHART  ********************* -->

            <!-- Group Product -->
            <?php
                //Inisialisasi nilai variabel awal
                $group_product_name= "";
                $jumlah_group_product=NULL;
                foreach ($group_product as $item)
                {
                    $groupname=$item['group_product_name'];
                    $group_product_name .= "'$groupname'". ", ";

                    $jum=$item['total'];
                    $jumlah_group_product .= "$jum". ", ";
                }
            ?>
            
            <!-- Group Product = Body -->
            <?php
                //Inisialisasi nilai variabel awal
                $group_product_name_body= "";
                $jumlah_group_product_body=NULL;
                foreach ($group_product_body as $item)
                {
                $groupname=$item['problem_name'];
                $group_product_name_body .= "'$groupname'". ", ";
                $jum=$item['total'];
                $jumlah_group_product_body .= "$jum". ", ";
                }
                ?>

            <!-- Group Product = power_train -->
            <?php
                //Inisialisasi nilai variabel awal
                $group_product_name_power_train= "";
                $jumlah_group_product_power_train=NULL;
                foreach ($group_product_power_train as $item)
                {
                $groupname=$item['problem_name'];
                $group_product_name_power_train .= "'$groupname'". ", ";
                $jum=$item['total'];
                $jumlah_group_product_power_train .= "$jum". ", ";
                }
                ?>

            <!-- Group Product = thermal -->
            <?php
                //Inisialisasi nilai variabel awal
                $group_product_name_thermal= "";
                $jumlah_group_product_thermal=NULL;
                foreach ($group_product_thermal as $item)
                {
                $groupname=$item['problem_name'];
                $group_product_name_thermal .= "'$groupname'". ", ";
                $jum=$item['total'];
                $jumlah_group_product_thermal .= "$jum". ", ";
                }
                ?>

            <!-- Group Product = wiper_washer -->
            <?php
                //Inisialisasi nilai variabel awal
                $group_product_name_wiper_washer= "";
                $jumlah_group_product_wiper_washer=NULL;
                foreach ($group_product_wiper_washer as $item)
                {
                $groupname=$item['problem_name'];
                $group_product_name_wiper_washer .= "'$groupname'". ", ";
                $jum=$item['total'];
                $jumlah_group_product_wiper_washer .= "$jum". ", ";
                }
                ?>

            <!-- Group Product = logistic -->
            <?php
                //Inisialisasi nilai variabel awal
                $group_product_name_logistic= "";
                $jumlah_group_product_logistic=NULL;
                foreach ($group_product_logistic as $item)
                {
                $groupname=$item['problem_name'];
                $group_product_name_logistic .= "'$groupname'". ", ";
                $jum=$item['total'];
                $jumlah_group_product_logistic .= "$jum". ", ";
                }
                ?>

            <!-- Group Product = supplier -->
            <?php
                //Inisialisasi nilai variabel awal
                $group_product_name_supplier= "";
                $jumlah_group_product_supplier=NULL;
                foreach ($group_product_supplier as $item)
                {
                $groupname=$item['problem_name'];
                $group_product_name_supplier .= "'$groupname'". ", ";
                $jum=$item['total'];
                $jumlah_group_product_supplier .= "$jum". ", ";
                }
                ?>

        <!-- // ********************* AKHIR PIE CHART  ********************* -->




        <!-- // ********************* CALENDAR NO CLAIMS  ********************* -->
            <!-- Calendar no claims -->
        <?php
            //Inisialisasi nilai variabel awal
            $startDate= "";
            $endDate="";
            foreach ($calendar_no_claims as $item)
            {
            $events[] = array (
                'title' => 'no claims',
                'startDate' => $item['startDate'],
                'endDate' => $item['endDate'],
            );
            }
            ?>
        <!-- // ********************* AKHIR CALENDAR NO CLAIMS  ********************* -->



        <!-- // ********************* BAR CHART  ********************* -->
                <!-- Fiscal Years  -->
                <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_Fy= "";
                    $jumlah_fiscal_year_internal=null;
                    $jumlah_fiscal_year_external=null;
                    foreach ($fiscal_years_claim as $item)
                    {
                    $tahunFy=$item['Tahun'];
                    $Tahun_Fy .= "'$tahunFy'". ", ";

                    $totalInternal=$item['internal'];
                    $jumlah_fiscal_year_internal .= "$totalInternal". ", ";

                    $totalexternal=$item['eksternal'];
                    $jumlah_fiscal_year_external .= "$totalexternal". ", ";
                    }

                    ?>

                <!-- Fiscal Years = Body -->
                <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_Fy_Body= "";
                    $jumlah_fiscal_year_internal_Body=null;
                    $jumlah_fiscal_year_external_Body=null;
                    foreach ($fiscal_years_claim_Body as $item)
                    {
                    $tahunFyBody=$item['Tahun'];
                    $Tahun_Fy_Body .= "'$tahunFyBody'". ", ";

                    $totalInternalBody=$item['internal'];
                    $jumlah_fiscal_year_internal_Body .= "$totalInternalBody". ", ";

                    $totalexternalBody=$item['eksternal'];
                    $jumlah_fiscal_year_external_Body .= "$totalexternalBody". ", ";
                    }

                    ?>

                <!-- Fiscal Years = Power_Train -->
                <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_Fy_Power_Train= "";
                    $jumlah_fiscal_year_internal_Power_Train=null;
                    $jumlah_fiscal_year_external_Power_Train=null;
                    foreach ($fiscal_years_claim_Power_Train as $item)
                    {
                    $tahunFyPower_Train=$item['Tahun'];
                    $Tahun_Fy_Power_Train .= "'$tahunFyPower_Train'". ", ";

                    $totalInternalPower_Train=$item['internal'];
                    $jumlah_fiscal_year_internal_Power_Train .= "$totalInternalPower_Train". ", ";

                    $totalexternalPower_Train=$item['eksternal'];
                    $jumlah_fiscal_year_external_Power_Train .= "$totalexternalPower_Train". ", ";
                    }

                    ?>

                <!-- Fiscal Years = Thermal -->
                <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_Fy_Thermal= "";
                    $jumlah_fiscal_year_internal_Thermal=null;
                    $jumlah_fiscal_year_external_Thermal=null;
                    foreach ($fiscal_years_claim_Thermal as $item)
                    {
                    $tahunFyThermal=$item['Tahun'];
                    $Tahun_Fy_Thermal .= "'$tahunFyThermal'". ", ";

                    $totalInternalThermal=$item['internal'];
                    $jumlah_fiscal_year_internal_Thermal .= "$totalInternalThermal". ", ";

                    $totalexternalThermal=$item['eksternal'];
                    $jumlah_fiscal_year_external_Thermal .= "$totalexternalThermal". ", ";
                    }

                    ?>

                <!-- Fiscal Years = Wiper -->
                <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_Fy_Wiper= "";
                    $jumlah_fiscal_year_internal_Wiper=null;
                    $jumlah_fiscal_year_external_Wiper=null;
                    foreach ($fiscal_years_claim_Wiper as $item)
                    {
                    $tahunFyWiper=$item['Tahun'];
                    $Tahun_Fy_Wiper .= "'$tahunFyWiper'". ", ";

                    $totalInternalWiper=$item['internal'];
                    $jumlah_fiscal_year_internal_Wiper .= "$totalInternalWiper". ", ";

                    $totalexternalWiper=$item['eksternal'];
                    $jumlah_fiscal_year_external_Wiper .= "$totalexternalWiper". ", ";
                    }

                    ?>

                <!-- Fiscal Years = Logistic -->
                <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_Fy_Logistic= "";
                    $jumlah_fiscal_year_internal_Logistic=null;
                    $jumlah_fiscal_year_external_Logistic=null;
                    foreach ($fiscal_years_claim_Logistic as $item)
                    {
                    $tahunFyLogistic=$item['Tahun'];
                    $Tahun_Fy_Logistic .= "'$tahunFyLogistic'". ", ";

                    $totalInternalLogistic=$item['internal'];
                    $jumlah_fiscal_year_internal_Logistic .= "$totalInternalLogistic". ", ";

                    $totalexternalLogistic=$item['eksternal'];
                    $jumlah_fiscal_year_external_Logistic .= "$totalexternalLogistic". ", ";
                    }

                    ?>

                <!-- Fiscal Years = Supplier -->
                <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_Fy_Supplier= "";
                    $jumlah_fiscal_year_internal_Supplier=null;
                    $jumlah_fiscal_year_external_Supplier=null;
                    foreach ($fiscal_years_claim_Supplier as $item)
                    {
                    $tahunFySupplier=$item['Tahun'];
                    $Tahun_Fy_Supplier .= "'$tahunFySupplier'". ", ";

                    $totalInternalSupplier=$item['internal'];
                    $jumlah_fiscal_year_internal_Supplier .= "$totalInternalSupplier". ", ";

                    $totalexternalSupplier=$item['eksternal'];
                    $jumlah_fiscal_year_external_Supplier .= "$totalexternalSupplier". ", ";
                    }

                    ?>






        <!-- // ********************* AKHIR BAR CHART  ********************* -->


        <!-- // ********************* MIXED CHART  ********************* -->

            <!-- Customer Claim By Case -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date= "";
            $case_target=0;
            $case_actual=0;
            $Body_ppm_case=0;
            $Power_Train_ppm_case=0;
            $Thermal_ppm_case=0;
            $Wiper_ppm_case=0;
            $Logistic_ppm_case=0;
            $Supplier_ppm_case=0;
            
            foreach ($data_mixed_chart as $item)
            {
            $ppmCaseDate1=$item['Bulan'];
            $ppm_case_date .= "'$ppmCaseDate1'". ", ";

            $case_actuals1=$item['case_actual'];
            $case_actual .= "$case_actuals1". ", ";

            $case_targets1=$item['case_target'];
            $case_target .= "$case_targets1". ", ";

            $Body=$item['Body'];
            $Body_ppm_case .= "$Body". ", ";

            $Power_Train=$item['Power_Train'];
            $Power_Train_ppm_case .= "$Power_Train". ", ";

            $Thermal=$item['Thermal'];
            $Thermal_ppm_case .= "$Thermal". ", ";

            $Wiper=$item['Wiper'];
            $Wiper_ppm_case .= "$Wiper". ", ";

            $Logistic=$item['Logistic'];
            $Logistic_ppm_case .= "$Logistic". ", ";

            $Supplier=$item['Supplier'];
            $Supplier_ppm_case .= "$Supplier". ", ";
            
            }
            ?>

            <!-- Customer Claim By Case Group Product = Body -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_Body= "";
            $case_target_Body=0;
            $case_actual_Body=0;
            $Body_ppm_case_fy=0;
            
            foreach ($data_mixed_chart_Body as $item)
            {
            $ppmCaseDateBody=$item['Bulan'];
            $ppm_case_date_Body .= "'$ppmCaseDateBody'". ", ";

            $case_actualsBody=$item['case_actual'];
            $case_actual_Body .= "$case_actualsBody". ", ";

            $case_targetsBody=$item['case_target'];
            $case_target_Body .= "$case_targetsBody". ", ";

            $BodyPpmFy=$item['Body'];
            $Body_ppm_case_fy .= "$BodyPpmFy". ", ";
            
            }
            ?>

            <!-- Customer Claim By Case Group Product = Power_Train -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_Power_Train= "";
            $case_target_Power_Train=0;
            $case_actual_Power_Train=0;
            $Power_Train_ppm_case_fy=0;
            
            foreach ($data_mixed_chart_Power_Train as $item)
            {
            $ppmCaseDatePower_Train=$item['Bulan'];
            $ppm_case_date_Power_Train .= "'$ppmCaseDatePower_Train'". ", ";

            $case_actualsPower_Train=$item['case_actual'];
            $case_actual_Power_Train .= "$case_actualsPower_Train". ", ";

            $case_targetsPower_Train=$item['case_target'];
            $case_target_Power_Train .= "$case_targetsPower_Train". ", ";

            $Power_TrainPpmFy=$item['Power_Train'];
            $Power_Train_ppm_case_fy .= "$Power_TrainPpmFy". ", ";
            
            }
            ?>
            
            <!-- Customer Claim By Case Group Product = Thermal -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_Thermal= "";
            $case_target_Thermal=0;
            $case_actual_Thermal=0;
            $Thermal_ppm_case_fy=0;
            
            foreach ($data_mixed_chart_Thermal as $item)
            {
            $ppmCaseDateThermal=$item['Bulan'];
            $ppm_case_date_Thermal .= "'$ppmCaseDateThermal'". ", ";

            $case_actualsThermal=$item['case_actual'];
            $case_actual_Thermal .= "$case_actualsThermal". ", ";

            $case_targetsThermal=$item['case_target'];
            $case_target_Thermal .= "$case_targetsThermal". ", ";

            $ThermalPpmFy=$item['Thermal'];
            $Thermal_ppm_case_fy .= "$ThermalPpmFy". ", ";
            
            }
            ?>

            <!-- Customer Claim By Case Group Product = Wiper -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_Wiper= "";
            $case_target_Wiper=0;
            $case_actual_Wiper=0;
            $Wiper_ppm_case_fy=0;
            
            foreach ($data_mixed_chart_Wiper as $item)
            {
            $ppmCaseDateWiper=$item['Bulan'];
            $ppm_case_date_Wiper .= "'$ppmCaseDateWiper'". ", ";

            $case_actualsWiper=$item['case_actual'];
            $case_actual_Wiper .= "$case_actualsWiper". ", ";

            $case_targetsWiper=$item['case_target'];
            $case_target_Wiper .= "$case_targetsWiper". ", ";

            $WiperPpmFy=$item['Wiper'];
            $Wiper_ppm_case_fy .= "$WiperPpmFy". ", ";
            
            }
            ?>

            <!-- Customer Claim By Case Group Product = Logistic -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_Logistic= "";
            $case_target_Logistic=0;
            $case_actual_Logistic=0;
            $Logistic_ppm_case_fy=0;
            
            foreach ($data_mixed_chart_Logistic as $item)
            {
            $ppmCaseDateLogistic=$item['Bulan'];
            $ppm_case_date_Logistic .= "'$ppmCaseDateLogistic'". ", ";

            $case_actualsLogistic=$item['case_actual'];
            $case_actual_Logistic .= "$case_actualsLogistic". ", ";

            $case_targetsLogistic=$item['case_target'];
            $case_target_Logistic .= "$case_targetsLogistic". ", ";

            $LogisticPpmFy=$item['Logistic'];
            $Logistic_ppm_case_fy .= "$LogisticPpmFy". ", ";
            
            }
            ?>

            <!-- Customer Claim By Case Group Product = Supplier -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_Supplier= "";
            $case_target_Supplier=0;
            $case_actual_Supplier=0;
            $Supplier_ppm_case_fy=0;
            
            foreach ($data_mixed_chart_Supplier as $item)
            {
            $ppmCaseDateSupplier=$item['Bulan'];
            $ppm_case_date_Supplier .= "'$ppmCaseDateSupplier'". ", ";

            $case_actualsSupplier=$item['case_actual'];
            $case_actual_Supplier .= "$case_actualsSupplier". ", ";

            $case_targetsSupplier=$item['case_target'];
            $case_target_Supplier .= "$case_targetsSupplier". ", ";

            $SupplierPpmFy=$item['Supplier'];
            $Supplier_ppm_case_fy .= "$SupplierPpmFy". ", ";
            
            }
            ?>


        <!-- // ********************* Akhir MIXED CHART  ********************* -->


        <!-- // ********************* MIXED CHART 2  ********************* -->
        
            <!-- Customer Claim By PPM -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_ppm= "";
            $ppm_target="";
            $ppm_actual="";
            
            foreach ($data_mixed_chart2 as $item)
            {
            $ppmCaseDate2=$item['Bulan'];
            $ppm_case_date_ppm .= "'$ppmCaseDate2'". ", ";

            $ppm_targets2=$item['ppm_target'];
            $ppm_target .= "$ppm_targets2". ", ";

            $ppm_actuals2=$item['ppm_actual'];
            $ppm_actual .= "$ppm_actuals2". ", ";

         
            
            }
            ?>

            <!-- Customer Claim By PPM Group Product = Body -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_ppm_Body= "";
            $ppm_target_Body="";
            $ppm_actual_Body="";
            
            foreach ($data_mixed_chart2_Body as $item)
            {
            $ppmCaseDate2=$item['Bulan'];
            $ppm_case_date_ppm_Body .= "'$ppmCaseDate2'". ", ";

            $ppm_targets2=$item['ppm_target'];
            $ppm_target_Body .= "$ppm_targets2". ", ";

            $ppm_actuals2=$item['ppm_actual'];
            $ppm_actual_Body .= "$ppm_actuals2". ", ";
            
            }
            ?>

            <!-- Customer Claim By PPM Group Product = Power_Train -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_ppm_Power_Train= "";
            $ppm_target_Power_Train="";
            $ppm_actual_Power_Train="";
            
            foreach ($data_mixed_chart2_Power_Train as $item)
            {
            $ppmCaseDate2=$item['Bulan'];
            $ppm_case_date_ppm_Power_Train .= "'$ppmCaseDate2'". ", ";

            $ppm_targets2=$item['ppm_target'];
            $ppm_target_Power_Train .= "$ppm_targets2". ", ";

            $ppm_actuals2=$item['ppm_actual'];
            $ppm_actual_Power_Train .= "$ppm_actuals2". ", ";
            
            }
            ?>

            <!-- Customer Claim By PPM Group Product = Thermal -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_ppm_Thermal= "";
            $ppm_target_Thermal="";
            $ppm_actual_Thermal="";
            
            foreach ($data_mixed_chart2_Thermal as $item)
            {
            $ppmCaseDate2=$item['Bulan'];
            $ppm_case_date_ppm_Thermal .= "'$ppmCaseDate2'". ", ";

            $ppm_targets2=$item['ppm_target'];
            $ppm_target_Thermal .= "$ppm_targets2". ", ";

            $ppm_actuals2=$item['ppm_actual'];
            $ppm_actual_Thermal .= "$ppm_actuals2". ", ";
            
            }
            ?>

            <!-- Customer Claim By PPM Group Product = Wiper_Washer -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_ppm_Wiper_Washer= "";
            $ppm_target_Wiper_Washer="";
            $ppm_actual_Wiper_Washer="";
            
            foreach ($data_mixed_chart2_Wiper_Washer as $item)
            {
            $ppmCaseDate2=$item['Bulan'];
            $ppm_case_date_ppm_Wiper_Washer .= "'$ppmCaseDate2'". ", ";

            $ppm_targets2=$item['ppm_target'];
            $ppm_target_Wiper_Washer .= "$ppm_targets2". ", ";

            $ppm_actuals2=$item['ppm_actual'];
            $ppm_actual_Wiper_Washer .= "$ppm_actuals2". ", ";
            
            }
            ?>

            <!-- Customer Claim By PPM Group Product = Supplier -->
            <?php
            //Inisialisasi nilai variabel awal
            $ppm_case_date_ppm_Supplier= "";
            $ppm_target_Supplier="";
            $ppm_actual_Supplier="";
            
            foreach ($data_mixed_chart2_Supplier as $item)
            {
            $ppmCaseDate2=$item['Bulan'];
            $ppm_case_date_ppm_Supplier .= "'$ppmCaseDate2'". ", ";

            $ppm_targets2=$item['ppm_target'];
            $ppm_target_Supplier .= "$ppm_targets2". ", ";

            $ppm_actuals2=$item['ppm_actual'];
            $ppm_actual_Supplier .= "$ppm_actuals2". ", ";
            
            }
            ?>


        <!-- // ********************* Akhir MIXED CHART 2  ********************* -->

        <!-- // ********************* STACKED BAR  ********************* -->

            <!-- Data Case by Group Product -->
            <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_fy_group_product = "";
                    $Company_fy = "";
                    $Body_fy = "";
                    $Power_Train_fy = "";
                    $Thermal_fy = "";
                    $Wiper_fy = "";
                    $Logistic_fy = "";
                    $Supplier_fy = "";
                    $General_fy = "";
                   

                    foreach ($case_group_product as $item) {
                    $tahunfy = $item['Tahun'];
                    $Tahun_fy_group_product .= "'$tahunfy'" . ", ";

                    $CompanyFy = $item['Company'];
                    $Company_fy .= "'$CompanyFy'" . ", ";

                    $bodyFy = $item['Body'];
                    $Body_fy .= "'$bodyFy'" . ", ";

                    $Power_TrainFy = $item['Power_Train'];
                    $Power_Train_fy .= "'$Power_TrainFy'" . ", ";

                    $ThermalFy = $item['Thermal'];
                    $Thermal_fy .= "'$ThermalFy'" . ", ";

                    $WiperFy = $item['Wiper'];
                    $Wiper_fy .= "'$WiperFy'" . ", ";

                    $LogisticFy = $item['Logistic'];
                    $Logistic_fy .= "'$LogisticFy'" . ", ";
                  
                    $SupplierFy = $item['Supplier'];
                    $Supplier_fy .= "'$SupplierFy'" . ", ";

                    $GeneralFy = $item['General'];
                    $General_fy .= "'$GeneralFy'" . ", ";
                    }
                    ?>

            <!-- Data Case by Group Product=Body-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_fy_group_product_Body = "";
                    $Body_fyBody = "";

                    foreach ($case_group_product_Body as $item) {
                    $tahunfyBody = $item['Tahun'];
                    $Tahun_fy_group_product_Body .= "'$tahunfyBody'" . ", ";

                    $bodyFyBody = $item['Body'];
                    $Body_fyBody .= "'$bodyFyBody'" . ", ";

                    }
                    ?>

            <!-- Data Case by Group Product=Power_Train-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_fy_group_product_Power_Train = "";
                    $Power_Train_fyPower_Train = "";

                    foreach ($case_group_product_Power_Train as $item) {
                    $tahunfyPower_Train = $item['Tahun'];
                    $Tahun_fy_group_product_Power_Train .= "'$tahunfyPower_Train'" . ", ";

                    $Power_TrainFyPower_Train = $item['Power_Train'];
                    $Power_Train_fyPower_Train .= "'$Power_TrainFyPower_Train'" . ", ";

                    }
                    ?>

            <!-- Data Case by Group Product=Thermal-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_fy_group_product_Thermal = "";
                    $Thermal_fyThermal = "";

                    foreach ($case_group_product_Thermal as $item) {
                    $tahunfyThermal = $item['Tahun'];
                    $Tahun_fy_group_product_Thermal .= "'$tahunfyThermal'" . ", ";

                    $ThermalFyThermal = $item['Thermal'];
                    $Thermal_fyThermal .= "'$ThermalFyThermal'" . ", ";

                    }
                    ?>

            <!-- Data Case by Group Product=Wiper-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_fy_group_product_Wiper = "";
                    $Wiper_fyWiper = "";

                    foreach ($case_group_product_Wiper as $item) {
                    $tahunfyWiper = $item['Tahun'];
                    $Tahun_fy_group_product_Wiper .= "'$tahunfyWiper'" . ", ";

                    $WiperFyWiper = $item['Wiper'];
                    $Wiper_fyWiper .= "'$WiperFyWiper'" . ", ";

                    }
                    ?>

            <!-- Data Case by Group Product=Logistic-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_fy_group_product_Logistic = "";
                    $Logistic_fyLogistic = "";

                    foreach ($case_group_product_Logistic as $item) {
                    $tahunfyLogistic = $item['Tahun'];
                    $Tahun_fy_group_product_Logistic .= "'$tahunfyLogistic'" . ", ";

                    $LogisticFyLogistic = $item['Logistic'];
                    $Logistic_fyLogistic .= "'$LogisticFyLogistic'" . ", ";

                    }
                    ?>

            <!-- Data Case by Group Product=Supplier-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_fy_group_product_Supplier = "";
                    $Supplier_fySupplier = "";

                    foreach ($case_group_product_Supplier as $item) {
                    $tahunfySupplier = $item['Tahun'];
                    $Tahun_fy_group_product_Supplier .= "'$tahunfySupplier'" . ", ";

                    $SupplierFySupplier = $item['Supplier'];
                    $Supplier_fySupplier .= "'$SupplierFySupplier'" . ", ";

                    }
                    ?>
                    

            <!-- Data Case by Group Product=General-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $Tahun_fy_group_product_General = "";
                    $General_fyGeneral = "";

                    foreach ($case_group_product_General as $item) {
                    $tahunfyGeneral = $item['Tahun'];
                    $Tahun_fy_group_product_General .= "'$tahunfyGeneral'" . ", ";

                    $GeneralFyGeneral = $item['General'];
                    $General_fyGeneral .= "'$GeneralFyGeneral'" . ", ";

                    }
                    ?>

            <!-- // ********************* AKHIR STACKED BAR  ********************* -->

            <!-- // ********************* BAR CHART  ********************* -->
            <!-- Data PPM FY -->
            <?php
                    //Inisialisasi nilai variabel awal
                    $tahun_ppm_fy= "";
                    $ppm_actual_data="";
                    $ppm_target_data="";
                
                    foreach ($ppm_data_fy as $item)
                    {
                    $tahunPPM=$item['Tahun'];
                    $tahun_ppm_fy .= "'$tahunPPM'". ", ";

                    $ppmDataActual=$item['ppm_actual_yearly'];
                    $ppm_actual_data .= "$ppmDataActual". ", ";

                    $ppmDataTarget=$item['ppm_target_yearly'];
                    $ppm_target_data .= "$ppmDataTarget". ", ";

                    
                    }
                    ?>

            <!-- Data PPM FY = Body-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $tahun_ppm_fy_Body= "";
                    $ppm_actual_data_Body="";
                    $ppm_target_data_Body="";
                
                    foreach ($ppm_data_fy_Body as $item)
                    {
                    $tahunPPMBody=$item['Tahun'];
                    $tahun_ppm_fy_Body .= "'$tahunPPMBody'". ", ";

                    $ppmDataActualBody=$item['ppm_actual_yearly'];
                    $ppm_actual_data_Body .= "$ppmDataActualBody". ", ";

                    $ppmDataTargetBody=$item['ppm_target_yearly'];
                    $ppm_target_data_Body .= "$ppmDataTargetBody". ", ";

                    
                    }
                    ?>

            <!-- Data PPM FY = Power_Train-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $tahun_ppm_fy_Power_Train= "";
                    $ppm_actual_data_Power_Train="";
                    $ppm_target_data_Power_Train="";
                
                    foreach ($ppm_data_fy_Power_Train as $item)
                    {
                    $tahunPPMPower_Train=$item['Tahun'];
                    $tahun_ppm_fy_Power_Train .= "'$tahunPPMPower_Train'". ", ";

                    $ppmDataActualPower_Train=$item['ppm_actual_yearly'];
                    $ppm_actual_data_Power_Train .= "$ppmDataActualPower_Train". ", ";

                    $ppmDataTargetPower_Train=$item['ppm_target_yearly'];
                    $ppm_target_data_Power_Train .= "$ppmDataTargetPower_Train". ", ";

                    
                    }
                    ?>

            <!-- Data PPM FY = Thermal-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $tahun_ppm_fy_Thermal= "";
                    $ppm_actual_data_Thermal="";
                    $ppm_target_data_Thermal="";
                
                    foreach ($ppm_data_fy_Thermal as $item)
                    {
                    $tahunPPMThermal=$item['Tahun'];
                    $tahun_ppm_fy_Thermal .= "'$tahunPPMThermal'". ", ";

                    $ppmDataActualThermal=$item['ppm_actual_yearly'];
                    $ppm_actual_data_Thermal .= "$ppmDataActualThermal". ", ";

                    $ppmDataTargetThermal=$item['ppm_target_yearly'];
                    $ppm_target_data_Thermal .= "$ppmDataTargetThermal". ", ";

                    
                    }
                    ?>

            <!-- Data PPM FY = Wiper-->
            <?php

            
                    //Inisialisasi nilai variabel awal
                    $tahun_ppm_fy_Wiper= "";
                    $ppm_actual_data_Wiper="";
                    $ppm_target_data_Wiper="";
                
                    foreach ($ppm_data_fy_Wiper as $item)
                    {
                    $tahunPPMWiper=$item['Tahun'];
                    $tahun_ppm_fy_Wiper .= "'$tahunPPMWiper'". ", ";

                    $ppmDataActualWiper=$item['ppm_actual_yearly'];
                    $ppm_actual_data_Wiper .= "$ppmDataActualWiper". ", ";

                    $ppmDataTargetWiper=$item['ppm_target_yearly'];
                    $ppm_target_data_Wiper .= "$ppmDataTargetWiper". ", ";

                    
                    }
                    ?>

            <!-- Data PPM FY = Logistic-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $tahun_ppm_fy_Logistic= "";
                    $ppm_actual_data_Logistic="";
                    $ppm_target_data_Logistic="";
                
                    foreach ($ppm_data_fy_Logistic as $item)
                    {
                    $tahunPPMLogistic=$item['Tahun'];
                    $tahun_ppm_fy_Logistic .= "'$tahunPPMLogistic'". ", ";

                    $ppmDataActualLogistic=$item['ppm_actual_yearly'];
                    $ppm_actual_data_Logistic .= "$ppmDataActualLogistic". ", ";

                    $ppmDataTargetLogistic=$item['ppm_target_yearly'];
                    $ppm_target_data_Logistic .= "$ppmDataTargetLogistic". ", ";

                    
                    }
                    ?>

            <!-- Data PPM FY = Supplier-->
            <?php
                    //Inisialisasi nilai variabel awal
                    $tahun_ppm_fy_Supplier= "";
                    $ppm_actual_data_Supplier="";
                    $ppm_target_data_Supplier="";
                
                    foreach ($ppm_data_fy_Supplier as $item)
                    {
                    $tahunPPMSupplier=$item['Tahun'];
                    $tahun_ppm_fy_Supplier .= "'$tahunPPMSupplier'". ", ";

                    $ppmDataActualSupplier=$item['ppm_actual_yearly'];
                    $ppm_actual_data_Supplier .= "$ppmDataActualSupplier". ", ";

                    $ppmDataTargetSupplier=$item['ppm_target_yearly'];
                    $ppm_target_data_Supplier .= "$ppmDataTargetSupplier". ", ";

                    
                    }
                    ?>
        
        <!-- // ********************* AKHIR STACKED BAR  ********************* -->



   

        <!-- // ********************* Akhir PHP untuk memanggil array data dari Controller  ********************* -->





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DMIA E-PCN SYSTEM</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard PCN</a></li>
              <li class="breadcrumb-item active">DMIA E-PCN SYSTEM</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">

        <div class="col-md-4">

           
            <!-- Days No Claim -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Days No Claim</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              
              <div class="card-body">

                          <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">

                    <div class="row mt-2">
                      <div class="col-md-4"></div>
                         <div class="col-md-3" id="daysReport">
                            <h1 id="daysText"><?php
                              //Inisialisasi nilai variabel awal
                              $day= "";
                              foreach ($no_claims as $item)
                              {
                                $days=$item['day'];
                                echo $days;
                              }
                              ?>
                            </h1>
                           </div>
                          <div class="col-md-3">
                            <div class="row">
                              <h5>Days</h5>
                            </div>
                            <div class="row">
                              <p>No Claim</p>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->




          </div>
          <!-- /.col (RIGHT) -->
          

        
          <div class="col-md-4">

          <!-- <= $calendar_no_claims2 ?> -->

              <!-- PIE CHART -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Claim By Group (Current FY)</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body" id="pieReport">
                  
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              

          </div>
          <!-- /.col (LEFT) -->

          <div class="col-md-4">

            
            <!-- BAR CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Claim By FY (Current FY)</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="barReport">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            </div>



         
        </div>
        <!-- /.row -->




        
        <div class="row">

          <div class="col-md-4" style="margin-top: -130px;">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->


          <div class="col-md-4">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Customer Claim by Case (Current FY)  </h3>
                              
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="lineChart_mixedreport">
                  <canvas id="lineChart_mixed" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- col -->
          </div>

          <div class="col-md-4">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Customer Claim by PPM (Current FY)  </h3>
                              
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="lineChart_mixed2report">
                  <canvas id="lineChart_mixed2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- col -->
          </div>

          


         </div>
        <!-- /.row -->


        <div class="row">

                <div class="col-md-4">

                    <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div id=""></div>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (RIGHT) -->

          <div class="col-md-4" style="margin-top: -20px;">

                <!-- LINE CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Case Data by Group product (5 FY)</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart" id="stackedbarreport">
                        <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- col -->
            </div>


            <div class="col-md-4"  style="margin-top: -20px;">
            <!-- LINE CHART -->
            <div class="card card-success" >
              <div class="card-header">
                <h3 class="card-title">PPM Data (5 FY)</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="barChartPpmReport">
                  <canvas id="barChartPpm" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- col -->
          </div>

          

         </div>
        <!-- /.row -->






        


        


        <div class="row">

                 
           <div class="col-md">
             <button type="button" onclick="btnCompanyOnCLick()"class="btn btn-block btn-primary btn-lg">Company</button>
           </div>
         

            <div class="col-md">
              <button type="button" onclick="btnBodyOnClick()" class="btn btn-block btn-secondary btn-lg"  >Body</button>
           </div>
           

           <div class="col-md">
             <button type="button" onclick="btnPowerTrainOnClick()"  class="btn btn-block btn-success btn-lg">PowerTrain</button>
           </div>
           
           <div class="col-md">
             <button type="button" onclick="btnThermalOnClick()" class="btn btn-block btn-warning btn-lg">Thermal</button>
           </div>

            <div class="col-md">
             <button type="button" onclick="btnWiperWasherOnClick()" class="btn btn-block btn-info btn-lg">Wiper</button>
           </div>

            <div class="col-md">
             <button type="button" onclick="btnLogisticOnClick()" class="btn btn-block btn-light btn-lg btn-outline-dark">Logistic</button>
           </div>

            <div class="col-md">
             <button type="button" onclick="btnSupplierOnClick()" class="btn btn-block btn-dark btn-lg">Supplier</button>
           </div>
           <br><br><br>


           
           



        </div>
        <!-- /.row -->


      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->    
  </div>
  <!-- /.content-wrapper -->







 


    

  <script>
  $(function () {
    
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [ <?= $group_product_name ?> ],
      datasets: [
        {
          data: [<?= $jumlah_group_product ?> ],
          backgroundColor : ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc','#d1ce11', '#0b7ee3'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
      plugins: {
      labels: {
        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
        render: 'value',
         // font size, default is defaultFontSize
        fontSize: 16,
        // font color, default is '#fff'
        fontColor: '#fff',
        // font style, default is defaultFontStyle
        fontStyle: 'bold',
        }
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })



    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
      labels: [ <?= $Tahun_Fy ?> ],
      datasets: [
        {
          label : 'Internal',
          data: [<?= $jumlah_fiscal_year_internal ?>],
          backgroundColor : ['#f56954'],
        }
        ,{
          label : 'External',
          data: [<?= $jumlah_fiscal_year_external ?>],
          backgroundColor : ['#00a65a'],
        }
      ]
    }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
      ,plugins: {
      labels: {
        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
        render: 'value',
         // font size, default is defaultFontSize
        fontSize: 16,
        // font style, default is defaultFontStyle
        fontStyle: 'bold',
        }
      }
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })



    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
            var lineChartCanvas = $('#lineChart_mixed').get(0).getContext('2d')
            var lineChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }],
                        yAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }]
                    }
                    }
            var lineChartData = {
            labels: [<?=$ppm_case_date?>],
             datasets: [
                        {
                        type: 'line',
                        label: 'Case Actual',
                        data: [<?=$case_actual?>], 
                        fill: false,
                        yAxisID: "data-line1",
                        borderColor: '#3489eb',
                        backgroundColor: '#3489eb',
                    },
                    {
                        type: 'line',
                        label: 'Case Target',
                        data: [<?=$case_target?>],
                        yAxisID: "data-line2",
                        fill: false,
                        borderColor: '#ba34eb',
                        backgroundColor: '#ba34eb',
                        
                    },
                    {
                        type: 'bar',
                        label: 'Body',
                        data: [<?=$Body_ppm_case?>],
                        backgroundColor: "#94D0CC"
                    },
                    {
                        type: 'bar',
                        label: 'PowerTrain',
                        data: [<?=$Power_Train_ppm_case?>],
                        backgroundColor: 'rgb(255, 199, 56)'
                    },
                    {
                        type: 'bar',
                        label: 'Thermal',
                        data: [<?=$Thermal_ppm_case?>],
                        backgroundColor: "#555555",
                    },
                    {
                        type: 'bar',
                        label: 'Wiper Washer',
                        data: [<?=$Wiper_ppm_case?>],
                        backgroundColor: "#f20028"
                    },
                    {
                        type: 'bar',
                        label: 'Logistic',
                        data: [<?=$Logistic_ppm_case?>],
                        backgroundColor: "#02a345"
                    },
                    {
                        type: 'bar',
                        label: 'Supplier',
                        data: [<?=$Supplier_ppm_case?>],
                        backgroundColor: "#a1005e"
                    },
                    
                    
                    ]
                    };
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
            type: 'bar',
            data: lineChartData,
            options: {
                plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                // position to draw label, available value is 'default', 'border' and 'outside'
                // bar chart ignores this
                // default is 'default'
                position: 'default',
                }
                },
            tooltips: {
                displayColors: true,
            },
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [
                {
                stacked: true,
                id: 'axis-bar',
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                }, 
                {
                stacked: false,
                id: 'axis-time',
                display: false,
                },
                {
                stacked: false,
                id: 'axis-time2',
                display: false,
                },
                {
                stacked: false,
                position: 'left',
                id: 'data-line1',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                        
                    }
                },
                {
                stacked: false,
                id: 'data-line2',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                },
            ]
            },
                responsive: true,
                maintainAspectRatio: false,
                legend: { display: true },
                legendCallback: function(chart) {
                var text = [];
                text.push('<ul class="' + chart.id + '-legend">');
                var data = chart.data;
                var datasets = data.datasets;
                if (datasets.length) {
                    for (var i = 0; i < datasets.length; ++i) {
                        text.push('<li>');
                        if (datasets[i].type=='line') {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    } else {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    }
                    text.push(datasets[i].label);
                    text.push('</li>');
                    }
                }
                text.push('</ul>');
                return text.join('');
                }
            }
            })



    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
            var lineChartCanvas = $('#lineChart_mixed2').get(0).getContext('2d')
                    var lineChartOptions = {
                            maintainAspectRatio : false,
                            responsive : true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }],
                                yAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }]
                            }
                            }
                    var lineChartData = {
                    labels: [<?=$ppm_case_date_ppm?>],
                    datasets: [
                                {
                                type: 'line',
                                label: 'PPM Actual',
                                data: [<?=$ppm_actual?>], 
                                fill: false,
                                yAxisID: "data-line1",
                                 borderColor: '#3489eb',
 backgroundColor: '#3489eb'
                            },
                            {
                                type: 'line',
                                label: 'PPM Target',
                                data: [<?=$ppm_target?>],
                                yAxisID: "data-line2",
                                fill: false,
                                 borderColor: '#ba34eb',
 backgroundColor: '#ba34eb'
                            }
                            
                            ]
                            };
                    lineChartData.datasets[0].fill = false;
                    lineChartData.datasets[1].fill = false;
                    lineChartOptions.datasetFill = false

                    var lineChart = new Chart(lineChartCanvas, {
                    type: 'bar',
                    data: lineChartData,
                    options: {
                        plugins: {
                        labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'value',
                        // font size, default is defaultFontSize
                        fontSize: 12,
                        // position to draw label, available value is 'default', 'border' and 'outside'
                        // bar chart ignores this
                        // default is 'default'
                        position: 'default',
                        }
                        },
                    tooltips: {
                        displayColors: true,
                    },
                    scales: {
                        xAxes: [{
                        stacked: true,
                        }
                        ],
                        yAxes: [
                        {
                        stacked: true,
                        id: 'axis-bar',
                        display:true,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        }, {    
                        stacked: false,
                        id: 'axis-time',
                        display: false,
                        },{
                        stacked: false,
                        id: 'axis-time2',
                        display: false,
                        },
                        {
                        stacked: false,
                        id: 'data-line1',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                        {
                        stacked: false,
                        id: 'data-line2',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                    ]
                    },
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: { display: true },
                        legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul class="' + chart.id + '-legend">');
                        var data = chart.data;
                        var datasets = data.datasets;
                        if (datasets.length) {
                            for (var i = 0; i < datasets.length; ++i) {
                                text.push('<li>');
                                if (datasets[i].type=='line') {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            } else {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            }
                            text.push(datasets[i].label);
                            text.push('</li>');
                            }
                        }
                        text.push('</ul>');
                        return text.join('');
                        }
                    }
                    })



     // ---------------------
    // - STACKED BAR CHART by Group Product (5 FY) -
    // ---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = {
            labels: [<?= $Tahun_fy_group_product?>],
            datasets: [{
                label: 'Company',
                backgroundColor: '#00c0ef',
                borderColor: '#00c0ef',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Company_fy?>]
                },
                {
                label: 'Body',
                backgroundColor: '#00a65a',
                borderColor: '#00a65a',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [<?= $Body_fy ?>]
                },
                {
                label: 'PowerTrain',
                backgroundColor: '#7e59a8',
                borderColor: '#7e59a8',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Power_Train_fy ?>]
                },
                {
                label: 'Thermal',
                backgroundColor: '#f56954',
                borderColor: '#f56954',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Thermal_fy ?>]
                },
                {
                label: 'Wiper & Washer',
                backgroundColor: '#3c8dbc',
                borderColor: '#3c8dbc',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Wiper_fy ?>]
                },
                {
                label: 'Logistic',
                backgroundColor: "#02a345",
                borderColor: "#02a345",
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Logistic_fy ?>]
                },
                {
                label: 'Supplier',
                backgroundColor: "#a1005e",
                borderColor: "#a1005e",
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Supplier_fy ?>]
                },
                {
                label: 'General',
                backgroundColor: '#b37d00',
                borderColor: '#b37d00',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $General_fy ?>]
                },
            ]
            }

            var stackedBarChartOptions = {
            plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                }
                },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
            })



     //-------------
    //- BAR CHART PPM (5 FY) -
    //-------------
                var barChartCanvas = $('#barChartPpm').get(0).getContext('2d')
                var barChartData = {
                labels  : [<?= $tahun_ppm_fy?>],
                datasets: [
                    {
                    label               : 'PPM Target',
                    backgroundColor     : 'rgba(245, 39, 39,0.9)',
                    borderColor         : 'rgba(245, 39, 39,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(245, 39, 39,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(245, 39, 39,1)',
                    data                : [<?=$ppm_target_data?>]
                    },
                    {
                    label               : 'PPM Actual',
                    backgroundColor     : 'rgba(35, 167, 18,0.9)',
                    borderColor         : 'rgba(35, 167, 18,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(35, 167, 18,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(35, 167, 18,1)',
                    data                : [<?=$ppm_actual_data?>]
                    },
                    
                ]
                }
                var temp0 = barChartData.datasets[0]
                // var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp0
                // barChartData.datasets[1] = temp1

                var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
                ,plugins: {
                    labels: {
                    // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                    render: 'value',
                    // font size, default is defaultFontSize
                    fontSize: 18,
                    // position to draw label, available value is 'default', 'border' and 'outside'
                    // bar chart ignores this
                    // default is 'default'
                    position: 'default',
                    // font style, default is defaultFontStyle
                    fontStyle: 'bold',
                    }
                    },
                }

                var barChart = new Chart(barChartCanvas, {
                type: 'bar', 
                data: barChartData,
                options: barChartOptions
                })


           







    
  })
</script>


<!-- Page specific script -->
<script>

  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    // var containerEl = document.getElementById('external-events');
    // var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    // new Draggable(containerEl, {
    //   itemSelector: '.external-event',
    //   eventData: function(eventEl) {
    //     console.log(eventEl);
    //     return {
    //       title: eventEl.innerText,
    //       backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
    //       borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
    //       textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
    //     };
    //   }
    // });

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : ''
      },
      'font-size': 20,
      'themeSystem': 'bootstrap',
      contentHeight: '50px',
      aspectRation: 1,
      // plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      //  right : 'dayGridMonth,timeGridWeek,timeGridDay'
      //Random default events
      events    : <?= $calendar_no_claims2 ?>,
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }    
    }); 

    // title          : 'No Claim',
    //       start          : new Date([<= $startDate ?>]),
    //       end            : new Date([<= $endDate ?>]),
    //       allDay         : true,
    //       backgroundColor: '#00a65a', //Success (green)
    //       borderColor    : '#00a65a' //Success (green)

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })

    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
    




    

  })
</script>

 



<script type="text/javascript">


function btnCompanyOnCLick(){
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#pieReport").innerHTML = '<h5 class="font-weight-medium text-center">Body</h5> <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [ <?= $group_product_name ?> ],
      datasets: [
        {
          data: [<?= $jumlah_group_product ?> ],
          backgroundColor : ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc','#d1ce11', '#0b7ee3'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
      plugins: {
      labels: {
        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
        render: 'value',
         // font size, default is defaultFontSize
        fontSize: 16,
        // font color, default is '#fff'
        fontColor: '#fff',
        // font style, default is defaultFontStyle
        fontStyle: 'bold',
        }
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })



    //-------------
    //- BAR CHART -
    //-------------
    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#barReport").innerHTML = '<h5 class="font-weight-medium text-center">Body</h5><canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
      labels: [ <?= $Tahun_Fy ?> ],
      datasets: [
        {
          label : 'Internal',
          data: [<?= $jumlah_fiscal_year_internal ?>],
          backgroundColor : ['#f56954'],
        }
        ,{
          label : 'External',
          data: [<?= $jumlah_fiscal_year_external ?>],
          backgroundColor : ['#00a65a'],
        }
      ]
    }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
      ,plugins: {
      labels: {
        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
        render: 'value',
         // font size, default is defaultFontSize
        fontSize: 16,
        // font style, default is defaultFontStyle
        fontStyle: 'bold',
        }
      }
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })



    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
    document.querySelector("#lineChart_mixedreport").innerHTML = '<canvas id="lineChart_mixed" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var lineChartCanvas = $('#lineChart_mixed').get(0).getContext('2d')
            var lineChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }],
                        yAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }]
                    }
                    }
            var lineChartData = {
            labels: [<?=$ppm_case_date?>],
             datasets: [
                        {
                        type: 'line',
                        label: 'Case Actual',
                        data: [<?=$case_actual?>], 
                        fill: false,
                        yAxisID: "data-line1",
                        borderColor: '#3489eb',
                        backgroundColor: '#3489eb',
                    },
                    {
                        type: 'line',
                        label: 'Case Target',
                        data: [<?=$case_target?>],
                        yAxisID: "data-line2",
                        fill: false,
                        borderColor: '#ba34eb',
                        backgroundColor: '#ba34eb',
                        
                    },
                    {
                        type: 'bar',
                        label: 'Body',
                        data: [<?=$Body_ppm_case?>],
                        backgroundColor: "#94D0CC"
                    },
                    {
                        type: 'bar',
                        label: 'PowerTrain',
                        data: [<?=$Power_Train_ppm_case?>],
                        backgroundColor: 'rgb(255, 199, 56)'
                    },
                    {
                        type: 'bar',
                        label: 'Thermal',
                        data: [<?=$Thermal_ppm_case?>],
                        backgroundColor: "#555555",
                    },
                    {
                        type: 'bar',
                        label: 'Wiper Washer',
                        data: [<?=$Wiper_ppm_case?>],
                        backgroundColor: "#f20028"
                    },
                    {
                        type: 'bar',
                        label: 'Logistic',
                        data: [<?=$Logistic_ppm_case?>],
                        backgroundColor: "#02a345"
                    },
                    {
                        type: 'bar',
                        label: 'Supplier',
                        data: [<?=$Supplier_ppm_case?>],
                        backgroundColor: "#a1005e"
                    },
                    
                    
                    ]
                    };
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
            type: 'bar',
            data: lineChartData,
            options: {
                plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                // position to draw label, available value is 'default', 'border' and 'outside'
                // bar chart ignores this
                // default is 'default'
                position: 'default',
                }
                },
            tooltips: {
                displayColors: true,
            },
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [
                {
                stacked: true,
                id: 'axis-bar',
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                }, 
                {
                stacked: false,
                id: 'axis-time',
                display: false,
                },
                {
                stacked: false,
                id: 'axis-time2',
                display: false,
                },
                {
                stacked: false,
                position: 'left',
                id: 'data-line1',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                        
                    }
                },
                {
                stacked: false,
                id: 'data-line2',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                },
            ]
            },
                responsive: true,
                maintainAspectRatio: false,
                legend: { display: true },
                legendCallback: function(chart) {
                var text = [];
                text.push('<ul class="' + chart.id + '-legend">');
                var data = chart.data;
                var datasets = data.datasets;
                if (datasets.length) {
                    for (var i = 0; i < datasets.length; ++i) {
                        text.push('<li>');
                        if (datasets[i].type=='line') {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    } else {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    }
                    text.push(datasets[i].label);
                    text.push('</li>');
                    }
                }
                text.push('</ul>');
                return text.join('');
                }
            }
            })



    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#lineChart_mixed2report").innerHTML = '<canvas id="lineChart_mixed2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var lineChartCanvas = $('#lineChart_mixed2').get(0).getContext('2d')
                    var lineChartOptions = {
                            maintainAspectRatio : false,
                            responsive : true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }],
                                yAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }]
                            }
                            }
                    var lineChartData = {
                    labels: [<?=$ppm_case_date_ppm?>],
                    datasets: [
                                {
                                type: 'line',
                                label: 'PPM Actual',
                                data: [<?=$ppm_actual?>], 
                                fill: false,
                                yAxisID: "data-line1",
                                 borderColor: '#3489eb',
 backgroundColor: '#3489eb'
                            },
                            {
                                type: 'line',
                                label: 'PPM Target',
                                data: [<?=$ppm_target?>],
                                yAxisID: "data-line2",
                                fill: false,
                                 borderColor: '#ba34eb',
 backgroundColor: '#ba34eb'
                            }
                            
                            ]
                            };
                    lineChartData.datasets[0].fill = false;
                    lineChartData.datasets[1].fill = false;
                    lineChartOptions.datasetFill = false

                    var lineChart = new Chart(lineChartCanvas, {
                    type: 'bar',
                    data: lineChartData,
                    options: {
                        plugins: {
                        labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'value',
                        // font size, default is defaultFontSize
                        fontSize: 12,
                        // position to draw label, available value is 'default', 'border' and 'outside'
                        // bar chart ignores this
                        // default is 'default'
                        position: 'default',
                        }
                        },
                    tooltips: {
                        displayColors: true,
                    },
                    scales: {
                        xAxes: [{
                        stacked: true,
                        }
                        ],
                        yAxes: [
                        {
                        stacked: true,
                        id: 'axis-bar',
                        display:true,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        }, {    
                        stacked: false,
                        id: 'axis-time',
                        display: false,
                        },{
                        stacked: false,
                        id: 'axis-time2',
                        display: false,
                        },
                        {
                        stacked: false,
                        id: 'data-line1',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                        {
                        stacked: false,
                        id: 'data-line2',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                    ]
                    },
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: { display: true },
                        legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul class="' + chart.id + '-legend">');
                        var data = chart.data;
                        var datasets = data.datasets;
                        if (datasets.length) {
                            for (var i = 0; i < datasets.length; ++i) {
                                text.push('<li>');
                                if (datasets[i].type=='line') {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            } else {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            }
                            text.push(datasets[i].label);
                            text.push('</li>');
                            }
                        }
                        text.push('</ul>');
                        return text.join('');
                        }
                    }
                    })



     // ---------------------
    // - STACKED BAR CHART by Group Product (5 FY) -
    // ---------------------
    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#stackedbarreport").innerHTML = ' <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = {
            labels: [<?= $Tahun_fy_group_product?>],
            datasets: [{
                label: 'Company',
                backgroundColor: '#00c0ef',
                borderColor: '#00c0ef',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Company_fy?>]
                },
                {
                label: 'Body',
                backgroundColor: '#00a65a',
                borderColor: '#00a65a',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [<?= $Body_fy ?>]
                },
                {
                label: 'PowerTrain',
                backgroundColor: '#7e59a8',
                borderColor: '#7e59a8',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Power_Train_fy ?>]
                },
                {
                label: 'Thermal',
                backgroundColor: '#f56954',
                borderColor: '#f56954',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Thermal_fy ?>]
                },
                {
                label: 'Wiper & Washer',
                backgroundColor: '#3c8dbc',
                borderColor: '#3c8dbc',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Wiper_fy ?>]
                },
                {
                label: 'Logistic',
                backgroundColor: "#02a345",
                borderColor: "#02a345",
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Logistic_fy ?>]
                },
                {
                label: 'Supplier',
                backgroundColor: "#a1005e",
                borderColor: "#a1005e",
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Supplier_fy ?>]
                },
                {
                label: 'General',
                backgroundColor: '#b37d00',
                borderColor: '#b37d00',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $General_fy ?>]
                },
            ]
            }

            var stackedBarChartOptions = {
            plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                }
                },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
            })



     //-------------
    //- BAR CHART PPM (5 FY) -
    //-------------
    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#barChartPpmReport").innerHTML = '<h5 class="font-weight-medium text-center">Body</h5><canvas id="barChartPpm" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>'
                var barChartCanvas = $('#barChartPpm').get(0).getContext('2d')
                var barChartData = {
                labels  : [<?= $tahun_ppm_fy?>],
                datasets: [
                    {
                    label               : 'PPM Target',
                    backgroundColor     : 'rgba(245, 39, 39,0.9)',
                    borderColor         : 'rgba(245, 39, 39,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(245, 39, 39,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(245, 39, 39,1)',
                    data                : [<?=$ppm_target_data?>]
                    },
                    {
                    label               : 'PPM Actual',
                    backgroundColor     : 'rgba(35, 167, 18,0.9)',
                    borderColor         : 'rgba(35, 167, 18,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(35, 167, 18,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(35, 167, 18,1)',
                    data                : [<?=$ppm_actual_data?>]
                    },
                    
                ]
                }
                var temp0 = barChartData.datasets[0]
                // var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp0
                // barChartData.datasets[1] = temp1

                var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
                ,plugins: {
                    labels: {
                    // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                    render: 'value',
                    // font size, default is defaultFontSize
                    fontSize: 18,
                    // position to draw label, available value is 'default', 'border' and 'outside'
                    // bar chart ignores this
                    // default is 'default'
                    position: 'default',
                    // font style, default is defaultFontStyle
                    fontStyle: 'bold',
                    }
                    },
                }

                var barChart = new Chart(barChartCanvas, {
                type: 'bar', 
                data: barChartData,
                options: barChartOptions
                })


}


function btnBodyOnClick(){
    //-------------
    //- PIE CHART -
    //-------------

        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#pieReport").innerHTML = '<h5 class="font-weight-medium text-center">Body</h5> <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';

        
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = {
        labels: [ <?= $group_product_name_body ?> ],
        datasets: [
            {
            data: [<?= $jumlah_group_product_body ?> 0],
            backgroundColor : ['#00a65a', '#f56954'],
            }
        ]
        }
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font color, default is '#fff'
            fontColor: '#fff',
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions      
        })




   //-------------
   //- Days No Claims  -
   //-------------

    // ********************* Redraw Chart  ********************* -->
        document.querySelector("#daysReport").innerHTML = '<h1 id="daysText"><?php
    //Inisialisasi nilai variabel awal
        $group_product_name="";
        $day= "";
        foreach ($no_claims_body as $item)
        {
        $group_product_name=$item['group_product_name'];
        $days=$item['day'];
        echo $days;
        }
        ?>
        </h1>';
        


    //-------------
    //- BAR CHART -
    //-------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#barReport").innerHTML = '<h5 class="font-weight-medium text-center">Body</h5><canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
        labels: [ <?= $Tahun_Fy_Body ?> ],
        datasets: [
            {
            label : 'Internal',
            data: [<?= $jumlah_fiscal_year_internal_Body ?>],
            backgroundColor : ['#f56954'],
            }
            ,{
            label : 'External',
            data: [<?= $jumlah_fiscal_year_external_Body ?>],
            backgroundColor : ['#00a65a'],
            }
        ]
        }

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        ,plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var barChart = new Chart(barChartCanvas, {
        type: 'bar', 
        data: barChartData,
        options: barChartOptions
        })

   

    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#lineChart_mixedreport").innerHTML = '<canvas id="lineChart_mixed" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var lineChartCanvas = $('#lineChart_mixed').get(0).getContext('2d')
            var lineChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }],
                        yAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }]
                    }
                    }
            var lineChartData = {
            labels: [<?=$ppm_case_date_Body?>],
             datasets: [
                        {
                        type: 'line',
                        label: 'Case Actual',
                        data: [<?=$case_actual_Body?>], 
                        fill: false,
                        yAxisID: "data-line1",
                        borderColor: '#3489eb',
                        backgroundColor: '#3489eb',
                    },
                    {
                        type: 'line',
                        label: 'Case Target',
                        data: [<?=$case_target_Body?>],
                        yAxisID: "data-line2",
                        fill: false,
                        borderColor: '#ba34eb',
                        backgroundColor: '#ba34eb',
                        
                    },
                    {
                        type: 'bar',
                        label: 'Body',
                        data: [<?=$Body_ppm_case_fy?>],
                        backgroundColor: "#94D0CC"
                    },
                    
                    
                    ]
                    };
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
            type: 'bar',
            data: lineChartData,
            options: {
                plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                // position to draw label, available value is 'default', 'border' and 'outside'
                // bar chart ignores this
                // default is 'default'
                position: 'default',
                }
                },
            tooltips: {
                displayColors: true,
            },
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [
                {
                stacked: true,
                id: 'axis-bar',
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                }, 
                {
                stacked: false,
                id: 'axis-time',
                display: false,
                },
                {
                stacked: false,
                id: 'axis-time2',
                display: false,
                },
                {
                stacked: false,
                position: 'left',
                id: 'data-line1',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                        
                    }
                },
                {
                stacked: false,
                id: 'data-line2',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                },
            ]
            },
                responsive: true,
                maintainAspectRatio: false,
                legend: { display: true },
                legendCallback: function(chart) {
                var text = [];
                text.push('<ul class="' + chart.id + '-legend">');
                var data = chart.data;
                var datasets = data.datasets;
                if (datasets.length) {
                    for (var i = 0; i < datasets.length; ++i) {
                        text.push('<li>');
                        if (datasets[i].type=='line') {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    } else {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    }
                    text.push(datasets[i].label);
                    text.push('</li>');
                    }
                }
                text.push('</ul>');
                return text.join('');
                }
            }
            })


    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
            // ********************* Redraw Chart  ********************* -->
            document.querySelector("#lineChart_mixed2report").innerHTML = '<canvas id="lineChart_mixed2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var lineChartCanvas = $('#lineChart_mixed2').get(0).getContext('2d')
                    var lineChartOptions = {
                            maintainAspectRatio : false,
                            responsive : true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }],
                                yAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }]
                            }
                            }
                    var lineChartData = {
                    labels: [<?=$ppm_case_date_ppm_Body?>],
                    datasets: [
                                {
                                type: 'line',
                                label: 'PPM Actual',
                                data: [<?=$ppm_actual_Body?>], 
                                fill: false,
                                yAxisID: "data-line1",
                                 borderColor: '#3489eb',
 backgroundColor: '#3489eb'
                            },
                            {
                                type: 'line',
                                label: 'PPM Target',
                                data: [<?=$ppm_target_Body?>],
                                yAxisID: "data-line2",
                                fill: false,
                                 borderColor: '#ba34eb',
 backgroundColor: '#ba34eb'
                            }
                            
                            ]
                            };
                    lineChartData.datasets[0].fill = false;
                    lineChartData.datasets[1].fill = false;
                    lineChartOptions.datasetFill = false

                    var lineChart = new Chart(lineChartCanvas, {
                    type: 'bar',
                    data: lineChartData,
                    options: {
                        plugins: {
                        labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'value',
                        // font size, default is defaultFontSize
                        fontSize: 12,
                        // position to draw label, available value is 'default', 'border' and 'outside'
                        // bar chart ignores this
                        // default is 'default'
                        position: 'default',
                        }
                        },
                    tooltips: {
                        displayColors: true,
                    },
                    scales: {
                        xAxes: [{
                        stacked: true,
                        }
                        ],
                        yAxes: [
                        {
                        stacked: true,
                        id: 'axis-bar',
                        display:true,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        }, {    
                        stacked: false,
                        id: 'axis-time',
                        display: false,
                        },{
                        stacked: false,
                        id: 'axis-time2',
                        display: false,
                        },
                        {
                        stacked: false,
                        id: 'data-line1',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                        {
                        stacked: false,
                        id: 'data-line2',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                    ]
                    },
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: { display: true },
                        legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul class="' + chart.id + '-legend">');
                        var data = chart.data;
                        var datasets = data.datasets;
                        if (datasets.length) {
                            for (var i = 0; i < datasets.length; ++i) {
                                text.push('<li>');
                                if (datasets[i].type=='line') {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            } else {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            }
                            text.push(datasets[i].label);
                            text.push('</li>');
                            }
                        }
                        text.push('</ul>');
                        return text.join('');
                        }
                    }
                    })




     // ---------------------
    // - STACKED BAR CHART by Group Product (5 FY) -
    // ---------------------
    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#stackedbarreport").innerHTML = ' <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = {
            labels: [<?= $Tahun_fy_group_product_Body?>],
            datasets: [               
                {
                label: 'Body',
                backgroundColor: '#00a65a',
                borderColor: '#00a65a',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [<?= $Body_fyBody ?>]
                }
            ]
            }

            var stackedBarChartOptions = {
            plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                }
                },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
            })



    //-------------
    //- BAR CHART PPM (5 FY) = Body -
    //-------------
                // ********************* Redraw Chart  ********************* -->
                document.querySelector("#barChartPpmReport").innerHTML = '<h5 class="font-weight-medium text-center">Body</h5><canvas id="barChartPpm" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>'
                var barChartCanvas = $('#barChartPpm').get(0).getContext('2d')
                var barChartData = {
                labels  : [<?= $tahun_ppm_fy_Body?>],
                datasets: [
                    {
                    label               : 'PPM Target',
                    backgroundColor     : 'rgba(245, 39, 39,0.9)',
                    borderColor         : 'rgba(245, 39, 39,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(245, 39, 39,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(245, 39, 39,1)',
                    data                : [<?=$ppm_target_data_Body?>]
                    },
                    {
                    label               : 'PPM Actual',
                    backgroundColor     : 'rgba(35, 167, 18,0.9)',
                    borderColor         : 'rgba(35, 167, 18,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(35, 167, 18,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(35, 167, 18,1)',
                    data                : [<?=$ppm_actual_data_Body?>]
                    },
                    
                ]
                }
                var temp0 = barChartData.datasets[0]
                // var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp0
                // barChartData.datasets[1] = temp1

                var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
                ,plugins: {
                    labels: {
                    // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                    render: 'value',
                    // font size, default is defaultFontSize
                    fontSize: 18,
                    // position to draw label, available value is 'default', 'border' and 'outside'
                    // bar chart ignores this
                    // default is 'default'
                    position: 'default',
                    // font style, default is defaultFontStyle
                    fontStyle: 'bold',
                    }
                    },
                }

                var barChart = new Chart(barChartCanvas, {
                type: 'bar', 
                data: barChartData,
                options: barChartOptions
                })

    

}

function btnPowerTrainOnClick(){
    //-------------
    //- PIE CHART -
    //-------------

        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#pieReport").innerHTML = '<h5 class="font-weight-medium text-center">PowerTrain</h5> <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';

        
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = {
        labels: [ <?= $group_product_name_power_train ?> ],
        datasets: [
            {
            data: [<?= $jumlah_group_product_power_train ?> 0],
            backgroundColor : ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
        ]
        }
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font color, default is '#fff'
            fontColor: '#fff',
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions      
        })


    //-------------
   //- Days No Claims  -
   //-------------

    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#daysReport").innerHTML = '<h1 id="daysText"><?php
    //Inisialisasi nilai variabel awal
        $group_product_name="";
        $day= "";
        foreach ($no_claims_power_train as $item)
        {
        $group_product_name=$item['group_product_name'];
        $days=$item['day'];
        echo $days;
        }
        ?>
        </h1>';

        
    //-------------
    //- BAR CHART -
    //-------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#barReport").innerHTML = '<h5 class="font-weight-medium text-center">PowerTrain</h5><canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
        labels: [ <?= $Tahun_Fy_Power_Train ?> ],
        datasets: [
            {
            label : 'Internal',
            data: [<?= $jumlah_fiscal_year_internal_Power_Train ?>],
            backgroundColor : ['#f56954'],
            }
            ,{
            label : 'External',
            data: [<?= $jumlah_fiscal_year_external_Power_Train ?>],
            backgroundColor : ['#00a65a'],
            }
        ]
        }

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        ,plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var barChart = new Chart(barChartCanvas, {
        type: 'bar', 
        data: barChartData,
        options: barChartOptions
        })




    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#lineChart_mixedreport").innerHTML = '<canvas id="lineChart_mixed" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var lineChartCanvas = $('#lineChart_mixed').get(0).getContext('2d')
            var lineChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }],
                        yAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }]
                    }
                    }
            var lineChartData = {
            labels: [<?=$ppm_case_date_Power_Train?>],
             datasets: [
                        {
                        type: 'line',
                        label: 'Case Actual',
                        data: [<?=$case_actual_Power_Train?>], 
                        fill: false,
                        yAxisID: "data-line1",
                        borderColor: '#3489eb',
                        backgroundColor: '#3489eb',
                    },
                    {
                        type: 'line',
                        label: 'Case Target',
                        data: [<?=$case_target_Power_Train?>],
                        yAxisID: "data-line2",
                        fill: false,
                        borderColor: '#ba34eb',
                        backgroundColor: '#ba34eb',
                        
                    },
                    {
                        type: 'bar',
                        label: 'PowerTrain',
                        data: [<?=$Power_Train_ppm_case_fy?>],
                        backgroundColor: "#94D0CC"
                    },
                    
                    
                    ]
                    };
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
            type: 'bar',
            data: lineChartData,
            options: {
                plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                // position to draw label, available value is 'default', 'border' and 'outside'
                // bar chart ignores this
                // default is 'default'
                position: 'default',
                }
                },
            tooltips: {
                displayColors: true,
            },
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [
                {
                stacked: true,
                id: 'axis-bar',
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                }, 
                {
                stacked: false,
                id: 'axis-time',
                display: false,
                },
                {
                stacked: false,
                id: 'axis-time2',
                display: false,
                },
                {
                stacked: false,
                position: 'left',
                id: 'data-line1',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                        
                    }
                },
                {
                stacked: false,
                id: 'data-line2',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                },
            ]
            },
                responsive: true,
                maintainAspectRatio: false,
                legend: { display: true },
                legendCallback: function(chart) {
                var text = [];
                text.push('<ul class="' + chart.id + '-legend">');
                var data = chart.data;
                var datasets = data.datasets;
                if (datasets.length) {
                    for (var i = 0; i < datasets.length; ++i) {
                        text.push('<li>');
                        if (datasets[i].type=='line') {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    } else {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    }
                    text.push(datasets[i].label);
                    text.push('</li>');
                    }
                }
                text.push('</ul>');
                return text.join('');
                }
            }
            })
    
   

     //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
            // ********************* Redraw Chart  ********************* -->
            document.querySelector("#lineChart_mixed2report").innerHTML = '<canvas id="lineChart_mixed2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var lineChartCanvas = $('#lineChart_mixed2').get(0).getContext('2d')
                    var lineChartOptions = {
                            maintainAspectRatio : false,
                            responsive : true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }],
                                yAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }]
                            }
                            }
                    var lineChartData = {
                    labels: [<?=$ppm_case_date_ppm_Power_Train?>],
                    datasets: [
                                {
                                type: 'line',
                                label: 'PPM Actual',
                                data: [<?=$ppm_actual_Power_Train?>], 
                                fill: false,
                                yAxisID: "data-line1",
                                 borderColor: '#3489eb',
 backgroundColor: '#3489eb'
                            },
                            {
                                type: 'line',
                                label: 'PPM Target',
                                data: [<?=$ppm_target_Power_Train?>],
                                yAxisID: "data-line2",
                                fill: false,
                                 borderColor: '#ba34eb',
 backgroundColor: '#ba34eb'
                            }
                            
                            ]
                            };
                    lineChartData.datasets[0].fill = false;
                    lineChartData.datasets[1].fill = false;
                    lineChartOptions.datasetFill = false

                    var lineChart = new Chart(lineChartCanvas, {
                    type: 'bar',
                    data: lineChartData,
                    options: {
                        plugins: {
                        labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'value',
                        // font size, default is defaultFontSize
                        fontSize: 12,
                        // position to draw label, available value is 'default', 'border' and 'outside'
                        // bar chart ignores this
                        // default is 'default'
                        position: 'default',
                        }
                        },
                    tooltips: {
                        displayColors: true,
                    },
                    scales: {
                        xAxes: [{
                        stacked: true,
                        }
                        ],
                        yAxes: [
                        {
                        stacked: true,
                        id: 'axis-bar',
                        display:true,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        }, {    
                        stacked: false,
                        id: 'axis-time',
                        display: false,
                        },{
                        stacked: false,
                        id: 'axis-time2',
                        display: false,
                        },
                        {
                        stacked: false,
                        id: 'data-line1',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                        {
                        stacked: false,
                        id: 'data-line2',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                    ]
                    },
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: { display: true },
                        legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul class="' + chart.id + '-legend">');
                        var data = chart.data;
                        var datasets = data.datasets;
                        if (datasets.length) {
                            for (var i = 0; i < datasets.length; ++i) {
                                text.push('<li>');
                                if (datasets[i].type=='line') {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            } else {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            }
                            text.push(datasets[i].label);
                            text.push('</li>');
                            }
                        }
                        text.push('</ul>');
                        return text.join('');
                        }
                    }
                    })


    // ---------------------
    // - STACKED BAR CHART by Group Product (5 FY) -
    // ---------------------
    document.querySelector("#stackedbarreport").innerHTML = ' <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = {
            labels: [<?= $Tahun_fy_group_product_Power_Train?>],
            datasets: [               
                {
                label: 'PowerTrain',
                backgroundColor: '#00c0ef',
                borderColor: '#00c0ef',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Power_Train_fyPower_Train ?>]
                }
            ]
            }

            var stackedBarChartOptions = {
            plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                }
                },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
            })



    //-------------
    //- BAR CHART PPM (5 FY) = Power_Train -
    //-------------
                // ********************* Redraw Chart  ********************* -->
                document.querySelector("#barChartPpmReport").innerHTML = '<h5 class="font-weight-medium text-center">PowerTrain</h5><canvas id="barChartPpm" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>'
                var barChartCanvas = $('#barChartPpm').get(0).getContext('2d')
                var barChartData = {
                labels  : [<?= $tahun_ppm_fy_Power_Train?>],
                datasets: [
                    {
                    label               : 'PPM Target',
                    backgroundColor     : 'rgba(245, 39, 39,0.9)',
                    borderColor         : 'rgba(245, 39, 39,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(245, 39, 39,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(245, 39, 39,1)',
                    data                : [<?=$ppm_target_data_Power_Train?>]
                    },
                    {
                    label               : 'PPM Actual',
                    backgroundColor     : 'rgba(35, 167, 18,0.9)',
                    borderColor         : 'rgba(35, 167, 18,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(35, 167, 18,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(35, 167, 18,1)',
                    data                : [<?=$ppm_actual_data_Power_Train?>]
                    },
                    
                ]
                }
                var temp0 = barChartData.datasets[0]
                // var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp0
                // barChartData.datasets[1] = temp1

                var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
                ,plugins: {
                    labels: {
                    // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                    render: 'value',
                    // font size, default is defaultFontSize
                    fontSize: 18,
                    // position to draw label, available value is 'default', 'border' and 'outside'
                    // bar chart ignores this
                    // default is 'default'
                    position: 'default',
                    // font style, default is defaultFontStyle
                    fontStyle: 'bold',
                    }
                    },
                }

                var barChart = new Chart(barChartCanvas, {
                type: 'bar', 
                data: barChartData,
                options: barChartOptions
                })
                


}

function btnThermalOnClick(){
    //-------------
    //- PIE CHART -
    //-------------

        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#pieReport").innerHTML = '<h5 class="font-weight-medium text-center">Thermal</h5> <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';

        
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = {
        labels: [ <?= $group_product_name_thermal ?> ],
        datasets: [
            {
            data: [<?= $jumlah_group_product_thermal ?> 0],
            backgroundColor : ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
        ]
        }
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font color, default is '#fff'
            fontColor: '#fff',
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions      
        })



   //-------------
   //- Days No Claims  -
   //-------------

    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#daysReport").innerHTML = '<h1 id="daysText"><?php
    //Inisialisasi nilai variabel awal
        $group_product_name="";
        $day= "";
        foreach ($no_claims_thermal as $item)
        {
        $group_product_name=$item['group_product_name'];
        $days=$item['day'];
        echo $days;
        }
        ?>
        </h1>';

   
   //-------------
    //- BAR CHART -
    //-------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#barReport").innerHTML = '<h5 class="font-weight-medium text-center">Thermal</h5><canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
        labels: [ <?= $Tahun_Fy_Thermal ?> ],
        datasets: [
            {
            label : 'Internal',
            data: [<?= $jumlah_fiscal_year_internal_Thermal ?>],
            backgroundColor : ['#f56954'],
            }
            ,{
            label : 'External',
            data: [<?= $jumlah_fiscal_year_external_Thermal ?>],
            backgroundColor : ['#00a65a'],
            }
        ]
        }

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        ,plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var barChart = new Chart(barChartCanvas, {
        type: 'bar', 
        data: barChartData,
        options: barChartOptions
        })



    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#lineChart_mixedreport").innerHTML = '<canvas id="lineChart_mixed" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var lineChartCanvas = $('#lineChart_mixed').get(0).getContext('2d')
            var lineChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }],
                        yAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }]
                    }
                    }
            var lineChartData = {
            labels: [<?=$ppm_case_date_Thermal?>],
             datasets: [
                        {
                        type: 'line',
                        label: 'Case Actual',
                        data: [<?=$case_actual_Thermal?>], 
                        fill: false,
                        yAxisID: "data-line1",
                        borderColor: '#3489eb',
                        backgroundColor: '#3489eb',
                    },
                    {
                        type: 'line',
                        label: 'Case Target',
                        data: [<?=$case_target_Thermal?>],
                        yAxisID: "data-line2",
                        fill: false,
                        borderColor: '#ba34eb',
                        backgroundColor: '#ba34eb',
                        
                    },
                    {
                        type: 'bar',
                        label: 'Thermal',
                        data: [<?=$Thermal_ppm_case_fy?>],
                        backgroundColor: "#94D0CC"
                    },
                    
                    
                    ]
                    };
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
            type: 'bar',
            data: lineChartData,
            options: {
                plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                // position to draw label, available value is 'default', 'border' and 'outside'
                // bar chart ignores this
                // default is 'default'
                position: 'default',
                }
                },
            tooltips: {
                displayColors: true,
            },
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [
                {
                stacked: true,
                id: 'axis-bar',
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                }, 
                {
                stacked: false,
                id: 'axis-time',
                display: false,
                },
                {
                stacked: false,
                id: 'axis-time2',
                display: false,
                },
                {
                stacked: false,
                position: 'left',
                id: 'data-line1',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                        
                    }
                },
                {
                stacked: false,
                id: 'data-line2',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                },
            ]
            },
                responsive: true,
                maintainAspectRatio: false,
                legend: { display: true },
                legendCallback: function(chart) {
                var text = [];
                text.push('<ul class="' + chart.id + '-legend">');
                var data = chart.data;
                var datasets = data.datasets;
                if (datasets.length) {
                    for (var i = 0; i < datasets.length; ++i) {
                        text.push('<li>');
                        if (datasets[i].type=='line') {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    } else {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    }
                    text.push(datasets[i].label);
                    text.push('</li>');
                    }
                }
                text.push('</ul>');
                return text.join('');
                }
            }
            })

   

    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
            // ********************* Redraw Chart  ********************* -->
            document.querySelector("#lineChart_mixed2report").innerHTML = '<canvas id="lineChart_mixed2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var lineChartCanvas = $('#lineChart_mixed2').get(0).getContext('2d')
                    var lineChartOptions = {
                            maintainAspectRatio : false,
                            responsive : true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }],
                                yAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }]
                            }
                            }
                    var lineChartData = {
                    labels: [<?=$ppm_case_date_ppm_Thermal?>],
                    datasets: [
                                {
                                type: 'line',
                                label: 'PPM Actual',
                                data: [<?=$ppm_actual_Thermal?>], 
                                fill: false,
                                yAxisID: "data-line1",
                                 borderColor: '#3489eb',
 backgroundColor: '#3489eb'
                            },
                            {
                                type: 'line',
                                label: 'PPM Target',
                                data: [<?=$ppm_target_Thermal?>],
                                yAxisID: "data-line2",
                                fill: false,
                                 borderColor: '#ba34eb',
 backgroundColor: '#ba34eb'
                            }
                            
                            ]
                            };
                    lineChartData.datasets[0].fill = false;
                    lineChartData.datasets[1].fill = false;
                    lineChartOptions.datasetFill = false

                    var lineChart = new Chart(lineChartCanvas, {
                    type: 'bar',
                    data: lineChartData,
                    options: {
                        plugins: {
                        labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'value',
                        // font size, default is defaultFontSize
                        fontSize: 12,
                        // position to draw label, available value is 'default', 'border' and 'outside'
                        // bar chart ignores this
                        // default is 'default'
                        position: 'default',
                        }
                        },
                    tooltips: {
                        displayColors: true,
                    },
                    scales: {
                        xAxes: [{
                        stacked: true,
                        }
                        ],
                        yAxes: [
                        {
                        stacked: true,
                        id: 'axis-bar',
                        display:true,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        }, {    
                        stacked: false,
                        id: 'axis-time',
                        display: false,
                        },{
                        stacked: false,
                        id: 'axis-time2',
                        display: false,
                        },
                        {
                        stacked: false,
                        id: 'data-line1',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                        {
                        stacked: false,
                        id: 'data-line2',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                    ]
                    },
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: { display: true },
                        legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul class="' + chart.id + '-legend">');
                        var data = chart.data;
                        var datasets = data.datasets;
                        if (datasets.length) {
                            for (var i = 0; i < datasets.length; ++i) {
                                text.push('<li>');
                                if (datasets[i].type=='line') {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            } else {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            }
                            text.push(datasets[i].label);
                            text.push('</li>');
                            }
                        }
                        text.push('</ul>');
                        return text.join('');
                        }
                    }
                    })

     // ---------------------
    // - STACKED BAR CHART by Group Product (5 FY) -
    // ---------------------
    document.querySelector("#stackedbarreport").innerHTML = ' <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = {
            labels: [<?= $Tahun_fy_group_product_Thermal?>],
            datasets: [               
                {
                label: 'Thermal',
                backgroundColor: '#f56954',
                borderColor: '#f56954',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Thermal_fyThermal ?>]
                }
            ]
            }

            var stackedBarChartOptions = {
            plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                }
                },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
            })



    //-------------
    //- BAR CHART PPM (5 FY) = Thermal -
    //-------------
                // ********************* Redraw Chart  ********************* -->
                document.querySelector("#barChartPpmReport").innerHTML = '<h5 class="font-weight-medium text-center">Thermal</h5><canvas id="barChartPpm" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>'
                var barChartCanvas = $('#barChartPpm').get(0).getContext('2d')
                var barChartData = {
                labels  : [<?= $tahun_ppm_fy_Thermal?>],
                datasets: [
                    {
                    label               : 'PPM Target',
                    backgroundColor     : 'rgba(245, 39, 39,0.9)',
                    borderColor         : 'rgba(245, 39, 39,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(245, 39, 39,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(245, 39, 39,1)',
                    data                : [<?=$ppm_target_data_Thermal?>]
                    },
                    {
                    label               : 'PPM Actual',
                    backgroundColor     : 'rgba(35, 167, 18,0.9)',
                    borderColor         : 'rgba(35, 167, 18,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(35, 167, 18,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(35, 167, 18,1)',
                    data                : [<?=$ppm_actual_data_Thermal?>]
                    },
                    
                ]
                }
                var temp0 = barChartData.datasets[0]
                // var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp0
                // barChartData.datasets[1] = temp1

                var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
                ,plugins: {
                    labels: {
                    // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                    render: 'value',
                    // font size, default is defaultFontSize
                    fontSize: 18,
                    // position to draw label, available value is 'default', 'border' and 'outside'
                    // bar chart ignores this
                    // default is 'default'
                    position: 'default',
                    // font style, default is defaultFontStyle
                    fontStyle: 'bold',
                    }
                    },
                }

                var barChart = new Chart(barChartCanvas, {
                type: 'bar', 
                data: barChartData,
                options: barChartOptions
                })


}


function btnWiperWasherOnClick(){
    //-------------
    //- PIE CHART -
    //-------------

        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#pieReport").innerHTML = '<h5 class="font-weight-medium text-center">Wiper Washer</h5> <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';

        
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = {
        labels: [ <?= $group_product_name_wiper_washer ?> ],
        datasets: [
            {
            data: [<?= $jumlah_group_product_wiper_washer ?> 0],
            backgroundColor : ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
        ]
        }
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font color, default is '#fff'
            fontColor: '#fff',
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions      
        })


   //-------------
   //- Days No Claims  -
   //-------------

    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#daysReport").innerHTML = '<h1 id="daysText"><?php
    //Inisialisasi nilai variabel awal
        $group_product_name="";
        $day= "";
        foreach ($no_claims_wiper_washer as $item)
        {
        $group_product_name=$item['group_product_name'];
        $days=$item['day'];
        echo $days;
        }
        ?>
        </h1>';

    //-------------
    //- BAR CHART -
    //-------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#barReport").innerHTML = '<h5 class="font-weight-medium text-center">Wiper Washer</h5><canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
        labels: [ <?= $Tahun_Fy_Wiper ?> ],
        datasets: [
            {
            label : 'Internal',
            data: [<?= $jumlah_fiscal_year_internal_Wiper ?>],
            backgroundColor : ['#f56954'],
            }
            ,{
            label : 'External',
            data: [<?= $jumlah_fiscal_year_external_Wiper ?>],
            backgroundColor : ['#00a65a'],
            }
        ]
        }

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        ,plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var barChart = new Chart(barChartCanvas, {
        type: 'bar', 
        data: barChartData,
        options: barChartOptions
        })
    
    
    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#lineChart_mixedreport").innerHTML = '<canvas id="lineChart_mixed" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var lineChartCanvas = $('#lineChart_mixed').get(0).getContext('2d')
            var lineChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }],
                        yAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }]
                    }
                    }
            var lineChartData = {
            labels: [<?=$ppm_case_date_Wiper?>],
             datasets: [
                        {
                        type: 'line',
                        label: 'Case Actual',
                        data: [<?=$case_actual_Wiper?>], 
                        fill: false,
                        yAxisID: "data-line1",
                        borderColor: '#3489eb',
                        backgroundColor: '#3489eb',
                    },
                    {
                        type: 'line',
                        label: 'Case Target',
                        data: [<?=$case_target_Wiper?>],
                        yAxisID: "data-line2",
                        fill: false,
                        borderColor: '#ba34eb',
                        backgroundColor: '#ba34eb',
                        
                    },
                    {
                        type: 'bar',
                        label: 'Wiper Washer',
                        data: [<?=$Wiper_ppm_case_fy?>],
                        backgroundColor: "#94D0CC"
                    },
                    
                    
                    ]
                    };
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
            type: 'bar',
            data: lineChartData,
            options: {
                plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                // position to draw label, available value is 'default', 'border' and 'outside'
                // bar chart ignores this
                // default is 'default'
                position: 'default',
                }
                },
            tooltips: {
                displayColors: true,
            },
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [
                {
                stacked: true,
                id: 'axis-bar',
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                }, 
                {
                stacked: false,
                id: 'axis-time',
                display: false,
                },
                {
                stacked: false,
                id: 'axis-time2',
                display: false,
                },
                {
                stacked: false,
                position: 'left',
                id: 'data-line1',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                        
                    }
                },
                {
                stacked: false,
                id: 'data-line2',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                },
            ]
            },
                responsive: true,
                maintainAspectRatio: false,
                legend: { display: true },
                legendCallback: function(chart) {
                var text = [];
                text.push('<ul class="' + chart.id + '-legend">');
                var data = chart.data;
                var datasets = data.datasets;
                if (datasets.length) {
                    for (var i = 0; i < datasets.length; ++i) {
                        text.push('<li>');
                        if (datasets[i].type=='line') {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    } else {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    }
                    text.push(datasets[i].label);
                    text.push('</li>');
                    }
                }
                text.push('</ul>');
                return text.join('');
                }
            }
            })
   

    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
            // ********************* Redraw Chart  ********************* -->
            document.querySelector("#lineChart_mixed2report").innerHTML = '<canvas id="lineChart_mixed2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var lineChartCanvas = $('#lineChart_mixed2').get(0).getContext('2d')
                    var lineChartOptions = {
                            maintainAspectRatio : false,
                            responsive : true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }],
                                yAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }]
                            }
                            }
                    var lineChartData = {
                    labels: [<?=$ppm_case_date_ppm_Wiper_Washer?>],
                    datasets: [
                                {
                                type: 'line',
                                label: 'PPM Actual',
                                data: [<?=$ppm_actual_Wiper_Washer?>], 
                                fill: false,
                                yAxisID: "data-line1",
                                 borderColor: '#3489eb',
 backgroundColor: '#3489eb'
                            },
                            {
                                type: 'line',
                                label: 'PPM Target',
                                data: [<?=$ppm_target_Wiper_Washer?>],
                                yAxisID: "data-line2",
                                fill: false,
                                 borderColor: '#ba34eb',
 backgroundColor: '#ba34eb'
                            }
                            
                            ]
                            };
                    lineChartData.datasets[0].fill = false;
                    lineChartData.datasets[1].fill = false;
                    lineChartOptions.datasetFill = false

                    var lineChart = new Chart(lineChartCanvas, {
                    type: 'bar',
                    data: lineChartData,
                    options: {
                        plugins: {
                        labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'value',
                        // font size, default is defaultFontSize
                        fontSize: 12,
                        // position to draw label, available value is 'default', 'border' and 'outside'
                        // bar chart ignores this
                        // default is 'default'
                        position: 'default',
                        }
                        },
                    tooltips: {
                        displayColors: true,
                    },
                    scales: {
                        xAxes: [{
                        stacked: true,
                        }
                        ],
                        yAxes: [
                        {
                        stacked: true,
                        id: 'axis-bar',
                        display:true,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        }, {    
                        stacked: false,
                        id: 'axis-time',
                        display: false,
                        },{
                        stacked: false,
                        id: 'axis-time2',
                        display: false,
                        },
                        {
                        stacked: false,
                        id: 'data-line1',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                        {
                        stacked: false,
                        id: 'data-line2',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                    ]
                    },
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: { display: true },
                        legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul class="' + chart.id + '-legend">');
                        var data = chart.data;
                        var datasets = data.datasets;
                        if (datasets.length) {
                            for (var i = 0; i < datasets.length; ++i) {
                                text.push('<li>');
                                if (datasets[i].type=='line') {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            } else {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            }
                            text.push(datasets[i].label);
                            text.push('</li>');
                            }
                        }
                        text.push('</ul>');
                        return text.join('');
                        }
                    }
                    })


    // ---------------------
    // - STACKED BAR CHART by Group Product (5 FY) -
    // ---------------------
    document.querySelector("#stackedbarreport").innerHTML = ' <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = {
            labels: [<?= $Tahun_fy_group_product_Wiper?>],
            datasets: [               
                {
                label: 'Wiper Washer',
                backgroundColor: '#f56954',
                borderColor: '#f56954',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Wiper_fyWiper ?>]
                }
            ]
            }

            var stackedBarChartOptions = {
            plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                }
                },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
            })


    //-------------
    //- BAR CHART PPM (5 FY) = Wiper -
    //-------------
                // ********************* Redraw Chart  ********************* -->
                document.querySelector("#barChartPpmReport").innerHTML = '<h5 class="font-weight-medium text-center">Wiper Washer</h5><canvas id="barChartPpm" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>'
                var barChartCanvas = $('#barChartPpm').get(0).getContext('2d')
                var barChartData = {
                labels  : [<?= $tahun_ppm_fy_Wiper?>],
                datasets: [
                    {
                    label               : 'PPM Target',
                    backgroundColor     : 'rgba(245, 39, 39,0.9)',
                    borderColor         : 'rgba(245, 39, 39,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(245, 39, 39,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(245, 39, 39,1)',
                    data                : [<?=$ppm_target_data_Wiper?>]
                    },
                    {
                    label               : 'PPM Actual',
                    backgroundColor     : 'rgba(35, 167, 18,0.9)',
                    borderColor         : 'rgba(35, 167, 18,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(35, 167, 18,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(35, 167, 18,1)',
                    data                : [<?=$ppm_actual_data_Wiper?>]
                    },
                    
                ]
                }
                var temp0 = barChartData.datasets[0]
                // var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp0
                // barChartData.datasets[1] = temp1

                var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
                ,plugins: {
                    labels: {
                    // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                    render: 'value',
                    // font size, default is defaultFontSize
                    fontSize: 18,
                    // position to draw label, available value is 'default', 'border' and 'outside'
                    // bar chart ignores this
                    // default is 'default'
                    position: 'default',
                    // font style, default is defaultFontStyle
                    fontStyle: 'bold',
                    }
                    },
                }

                var barChart = new Chart(barChartCanvas, {
                type: 'bar', 
                data: barChartData,
                options: barChartOptions
                })

}

function btnLogisticOnClick(){
    //-------------
    //- PIE CHART -
    //-------------

        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#pieReport").innerHTML = '<h5 class="font-weight-medium text-center">Logistic</h5> <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';

        
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = {
        labels: [ <?= $group_product_name_logistic?> ],
        datasets: [
            {
            data: [<?= $jumlah_group_product_logistic?> 0],
            backgroundColor : ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
        ]
        }
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font color, default is '#fff'
            fontColor: '#fff',
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions      
        })


    //-------------
   //- Days No Claims  -
   //-------------

    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#daysReport").innerHTML = '<h1 id="daysText"><?php
    //Inisialisasi nilai variabel awal
        $group_product_name="";
        $day= "";
        foreach ($no_claims_logistic as $item)
        {
        $group_product_name=$item['group_product_name'];
        $days=$item['day'];
        echo $days;
        }
        ?>
        </h1>';

    //-------------
    //- BAR CHART -
    //-------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#barReport").innerHTML = '<h5 class="font-weight-medium text-center">Logistic</h5><canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
        labels: [ <?= $Tahun_Fy_Logistic ?> ],
        datasets: [
            {
            label : 'Internal',
            data: [<?= $jumlah_fiscal_year_internal_Logistic ?>],
            backgroundColor : ['#f56954'],
            }
            ,{
            label : 'External',
            data: [<?= $jumlah_fiscal_year_external_Logistic ?>],
            backgroundColor : ['#00a65a'],
            }
        ]
        }

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        ,plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var barChart = new Chart(barChartCanvas, {
        type: 'bar', 
        data: barChartData,
        options: barChartOptions
        })
    
    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#lineChart_mixedreport").innerHTML = '<canvas id="lineChart_mixed" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var lineChartCanvas = $('#lineChart_mixed').get(0).getContext('2d')
            var lineChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }],
                        yAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }]
                    }
                    }
            var lineChartData = {
            labels: [<?=$ppm_case_date_Logistic?>],
             datasets: [
                        {
                        type: 'line',
                        label: 'Case Actual',
                        data: [<?=$case_actual_Logistic?>], 
                        fill: false,
                        yAxisID: "data-line1",
                        borderColor: '#3489eb',
                        backgroundColor: '#3489eb',
                    },
                    {
                        type: 'line',
                        label: 'Case Target',
                        data: [<?=$case_target_Logistic?>],
                        yAxisID: "data-line2",
                        fill: false,
                        borderColor: '#ba34eb',
                        backgroundColor: '#ba34eb',
                        
                    },
                    {
                        type: 'bar',
                        label: 'Logistic',
                        data: [<?=$Logistic_ppm_case_fy?>],
                        backgroundColor: "#94D0CC"
                    },
                    
                    
                    ]
                    };
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
            type: 'bar',
            data: lineChartData,
            options: {
                plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                // position to draw label, available value is 'default', 'border' and 'outside'
                // bar chart ignores this
                // default is 'default'
                position: 'default',
                }
                },
            tooltips: {
                displayColors: true,
            },
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [
                {
                stacked: true,
                id: 'axis-bar',
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                }, 
                {
                stacked: false,
                id: 'axis-time',
                display: false,
                },
                {
                stacked: false,
                id: 'axis-time2',
                display: false,
                },
                {
                stacked: false,
                position: 'left',
                id: 'data-line1',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                        
                    }
                },
                {
                stacked: false,
                id: 'data-line2',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                },
            ]
            },
                responsive: true,
                maintainAspectRatio: false,
                legend: { display: true },
                legendCallback: function(chart) {
                var text = [];
                text.push('<ul class="' + chart.id + '-legend">');
                var data = chart.data;
                var datasets = data.datasets;
                if (datasets.length) {
                    for (var i = 0; i < datasets.length; ++i) {
                        text.push('<li>');
                        if (datasets[i].type=='line') {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    } else {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    }
                    text.push(datasets[i].label);
                    text.push('</li>');
                    }
                }
                text.push('</ul>');
                return text.join('');
                }
            }
            })


    // ---------------------
    // - STACKED BAR CHART by Group Product (5 FY) -
    // ---------------------
    document.querySelector("#stackedbarreport").innerHTML = ' <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = {
            labels: [<?= $Tahun_fy_group_product_Logistic?>],
            datasets: [               
                {
                label: 'Logistic',
                backgroundColor: '#f56954',
                borderColor: '#f56954',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Logistic_fyLogistic ?>]
                }
            ]
            }

            var stackedBarChartOptions = {
            plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                }
                },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
            })

    //-------------
    //- BAR CHART PPM (5 FY) = Logistic -
    //-------------
                // ********************* Redraw Chart  ********************* -->
                document.querySelector("#barChartPpmReport").innerHTML = '<h5 class="font-weight-medium text-center">Logistic</h5><canvas id="barChartPpm" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>'
                var barChartCanvas = $('#barChartPpm').get(0).getContext('2d')
                var barChartData = {
                labels  : [<?= $tahun_ppm_fy_Logistic?>],
                datasets: [
                    {
                    label               : 'PPM Target',
                    backgroundColor     : 'rgba(245, 39, 39,0.9)',
                    borderColor         : 'rgba(245, 39, 39,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(245, 39, 39,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(245, 39, 39,1)',
                    data                : [<?=$ppm_target_data_Logistic?>]
                    },
                    {
                    label               : 'PPM Actual',
                    backgroundColor     : 'rgba(35, 167, 18,0.9)',
                    borderColor         : 'rgba(35, 167, 18,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(35, 167, 18,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(35, 167, 18,1)',
                    data                : [<?=$ppm_actual_data_Logistic?>]
                    },
                    
                ]
                }
                var temp0 = barChartData.datasets[0]
                // var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp0
                // barChartData.datasets[1] = temp1

                var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
                ,plugins: {
                    labels: {
                    // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                    render: 'value',
                    // font size, default is defaultFontSize
                    fontSize: 18,
                    // position to draw label, available value is 'default', 'border' and 'outside'
                    // bar chart ignores this
                    // default is 'default'
                    position: 'default',
                    // font style, default is defaultFontStyle
                    fontStyle: 'bold',
                    }
                    },
                }

                var barChart = new Chart(barChartCanvas, {
                type: 'bar', 
                data: barChartData,
                options: barChartOptions
                })



}

function btnSupplierOnClick(){
    //-------------
    //- PIE CHART -
    //-------------

        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#pieReport").innerHTML = '<h5 class="font-weight-medium text-center">Supplier</h5> <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';

        
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = {
        labels: [ <?= $group_product_name_supplier?> ],
        datasets: [
            {
            data: [<?= $jumlah_group_product_supplier?> 0],
            backgroundColor : ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
        ]
        }
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font color, default is '#fff'
            fontColor: '#fff',
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions      
        })


    //-------------
   //- Days No Claims  -
   //-------------

    // ********************* Redraw Chart  ********************* -->
    document.querySelector("#daysReport").innerHTML = '<h1 id="daysText"><?php
    //Inisialisasi nilai variabel awal
        $group_product_name="";
        $day= "";
        foreach ($no_claims_supplier as $item)
        {
        $group_product_name=$item['group_product_name'];
        $days=$item['day'];
        echo $days;
        }
        ?>
        </h1>';





    //-------------
    //- BAR CHART -
    //-------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#barReport").innerHTML = '<h5 class="font-weight-medium text-center">Supplier</h5><canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
        labels: [ <?= $Tahun_Fy_Supplier ?> ],
        datasets: [
            {
            label : 'Internal',
            data: [<?= $jumlah_fiscal_year_internal_Supplier ?>],
            backgroundColor : ['#f56954'],
            }
            ,{
            label : 'External',
            data: [<?= $jumlah_fiscal_year_external_Supplier ?>],
            backgroundColor : ['#00a65a'],
            }
        ]
        }

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        ,plugins: {
        labels: {
            // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
            render: 'value',
            // font size, default is defaultFontSize
            fontSize: 16,
            // font style, default is defaultFontStyle
            fontStyle: 'bold',
            }
        }
        }

        var barChart = new Chart(barChartCanvas, {
        type: 'bar', 
        data: barChartData,
        options: barChartOptions
        })
    

    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
        // ********************* Redraw Chart  ********************* -->
        document.querySelector("#lineChart_mixedreport").innerHTML = '<canvas id="lineChart_mixed" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
        var lineChartCanvas = $('#lineChart_mixed').get(0).getContext('2d')
            var lineChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }],
                        yAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }]
                    }
                    }
            var lineChartData = {
            labels: [<?=$ppm_case_date_Supplier?>],
             datasets: [
                        {
                        type: 'line',
                        label: 'Case Actual',
                        data: [<?=$case_actual_Supplier?>], 
                        fill: false,
                        yAxisID: "data-line1",
                        borderColor: '#3489eb',
                        backgroundColor: '#3489eb',
                    },
                    {
                        type: 'line',
                        label: 'Case Target',
                        data: [<?=$case_target_Supplier?>],
                        yAxisID: "data-line2",
                        fill: false,
                        borderColor: '#ba34eb',
                        backgroundColor: '#ba34eb',
                        
                    },
                    {
                        type: 'bar',
                        label: 'Supplier',
                        data: [<?=$Supplier_ppm_case_fy?>],
                        backgroundColor: "#94D0CC"
                    },
                    
                    
                    ]
                    };
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
            type: 'bar',
            data: lineChartData,
            options: {
                plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                // position to draw label, available value is 'default', 'border' and 'outside'
                // bar chart ignores this
                // default is 'default'
                position: 'default',
                }
                },
            tooltips: {
                displayColors: true,
            },
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [
                {
                stacked: true,
                id: 'axis-bar',
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                }, 
                {
                stacked: false,
                id: 'axis-time',
                display: false,
                },
                {
                stacked: false,
                id: 'axis-time2',
                display: false,
                },
                {
                stacked: false,
                position: 'left',
                id: 'data-line1',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                        
                    }
                },
                {
                stacked: false,
                id: 'data-line2',
                display: false,
                ticks: {
                        min:0,
                        suggestedMax: 40,
                    }
                },
            ]
            },
                responsive: true,
                maintainAspectRatio: false,
                legend: { display: true },
                legendCallback: function(chart) {
                var text = [];
                text.push('<ul class="' + chart.id + '-legend">');
                var data = chart.data;
                var datasets = data.datasets;
                if (datasets.length) {
                    for (var i = 0; i < datasets.length; ++i) {
                        text.push('<li>');
                        if (datasets[i].type=='line') {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    } else {
                        text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                    }
                    text.push(datasets[i].label);
                    text.push('</li>');
                    }
                }
                text.push('</ul>');
                return text.join('');
                }
            }
            })
    


    //-------------
    //- LINE CHART WITH STACKED BAR NEW MIXED -
    //--------------
            // ********************* Redraw Chart  ********************* -->
            document.querySelector("#lineChart_mixed2report").innerHTML = '<canvas id="lineChart_mixed2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var lineChartCanvas = $('#lineChart_mixed2').get(0).getContext('2d')
                    var lineChartOptions = {
                            maintainAspectRatio : false,
                            responsive : true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }],
                                yAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }]
                            }
                            }
                    var lineChartData = {
                    labels: [<?=$ppm_case_date_ppm_Supplier?>],
                    datasets: [
                                {
                                type: 'line',
                                label: 'PPM Actual',
                                data: [<?=$ppm_actual_Supplier?>], 
                                fill: false,
                                yAxisID: "data-line1",
                                 borderColor: '#3489eb',
 backgroundColor: '#3489eb'
                            },
                            {
                                type: 'line',
                                label: 'PPM Target',
                                data: [<?=$ppm_target_Supplier?>],
                                yAxisID: "data-line2",
                                fill: false,
                                 borderColor: '#ba34eb',
 backgroundColor: '#ba34eb'
                            }
                            
                            ]
                            };
                    lineChartData.datasets[0].fill = false;
                    lineChartData.datasets[1].fill = false;
                    lineChartOptions.datasetFill = false

                    var lineChart = new Chart(lineChartCanvas, {
                    type: 'bar',
                    data: lineChartData,
                    options: {
                        plugins: {
                        labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'value',
                        // font size, default is defaultFontSize
                        fontSize: 12,
                        // position to draw label, available value is 'default', 'border' and 'outside'
                        // bar chart ignores this
                        // default is 'default'
                        position: 'default',
                        }
                        },
                    tooltips: {
                        displayColors: true,
                    },
                    scales: {
                        xAxes: [{
                        stacked: true,
                        }
                        ],
                        yAxes: [
                        {
                        stacked: true,
                        id: 'axis-bar',
                        display:true,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        }, {    
                        stacked: false,
                        id: 'axis-time',
                        display: false,
                        },{
                        stacked: false,
                        id: 'axis-time2',
                        display: false,
                        },
                        {
                        stacked: false,
                        id: 'data-line1',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                        {
                        stacked: false,
                        id: 'data-line2',
                        display: false,
                        ticks: {
                                min:0,
                                max:3,
                                stepsize:0.5
                            }
                        },
                    ]
                    },
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: { display: true },
                        legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul class="' + chart.id + '-legend">');
                        var data = chart.data;
                        var datasets = data.datasets;
                        if (datasets.length) {
                            for (var i = 0; i < datasets.length; ++i) {
                                text.push('<li>');
                                if (datasets[i].type=='line') {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            } else {
                                text.push('<span class="'+datasets[i].type+'" style="background-color:' + datasets[i].backgroundColor + '"></span>');
                            }
                            text.push(datasets[i].label);
                            text.push('</li>');
                            }
                        }
                        text.push('</ul>');
                        return text.join('');
                        }
                    }
                    })



    // ---------------------
    // - STACKED BAR CHART by Group Product (5 FY) -
    // ---------------------
    document.querySelector("#stackedbarreport").innerHTML = ' <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>';
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = {
            labels: [<?= $Tahun_fy_group_product_Supplier?>],
            datasets: [               
                {
                label: 'Supplier',
                backgroundColor: '#f56954',
                borderColor: '#f56954',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?= $Supplier_fySupplier ?>]
                }
            ]
            }

            var stackedBarChartOptions = {
            plugins: {
                labels: {
                // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                render: 'value',
                // font size, default is defaultFontSize
                fontSize: 12,
                }
                },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
            })



    //-------------
    //- BAR CHART PPM (5 FY) = Supplier -
    //-------------
                // ********************* Redraw Chart  ********************* -->
                document.querySelector("#barChartPpmReport").innerHTML = '<h5 class="font-weight-medium text-center">Supplier</h5><canvas id="barChartPpm" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>'
                var barChartCanvas = $('#barChartPpm').get(0).getContext('2d')
                var barChartData = {
                labels  : [<?= $tahun_ppm_fy_Supplier?>],
                datasets: [
                    {
                    label               : 'PPM Target',
                    backgroundColor     : 'rgba(245, 39, 39,0.9)',
                    borderColor         : 'rgba(245, 39, 39,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(245, 39, 39,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(245, 39, 39,1)',
                    data                : [<?=$ppm_target_data_Supplier?>]
                    },
                    {
                    label               : 'PPM Actual',
                    backgroundColor     : 'rgba(35, 167, 18,0.9)',
                    borderColor         : 'rgba(35, 167, 18,0.8)',
                    pointRadius         : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(35, 167, 18,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(35, 167, 18,1)',
                    data                : [<?=$ppm_actual_data_Supplier?>]
                    },
                    
                ]
                }
                var temp0 = barChartData.datasets[0]
                // var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp0
                // barChartData.datasets[1] = temp1

                var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
                ,plugins: {
                    labels: {
                    // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                    render: 'value',
                    // font size, default is defaultFontSize
                    fontSize: 18,
                    // position to draw label, available value is 'default', 'border' and 'outside'
                    // bar chart ignores this
                    // default is 'default'
                    position: 'default',
                    // font style, default is defaultFontStyle
                    fontStyle: 'bold',
                    }
                    },
                }

                var barChart = new Chart(barChartCanvas, {
                type: 'bar', 
                data: barChartData,
                options: barChartOptions
                })



}




</script>


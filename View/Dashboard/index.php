<?php

//Include dashboard controller
include '../../Controllers/DashboardController.php';

//Inherit dashboard controller
$DashboardController = new DashboardController();


//Clients growth
$clientsGrowth  = $DashboardController->clientsGrowthPercentage();

//reparation expenses growth
$reparationGrowth = $DashboardController->reparationGrowthPercentage();

//profit growth
$profitGrowth = $DashboardController->profitGrowthPercentage();

//this/prev month profit
$thisPrevMonthProfit = $DashboardController->profitThisPervMonth();

//Get sum profit from location
$TotalProfit = $DashboardController->getRevenuFromLocation();

//Get sum expenses From reparation
$TotalExpenses = $DashboardController->getExpenseFromReparation();

//Get total clients
$TotalClients = $DashboardController->getTotalClients();

//Total cars dispo
$TotalDispoCars = $DashboardController->getTotalCarsDispo();


//Get profit by month (location)
$profitByMonth = $DashboardController->getProfitByMonth();


//Get total location by month
$totalLocationBymonth = $DashboardController->getTotalLocationBymonth();

//Get total Reservation by month
$TotalReservationBymonth = $DashboardController->getTotalReservationBymonth();

//Get profit by car
$profitBycar = $DashboardController->profitByCar();


//Get top 3 rented cars
$TopRentCars = $DashboardController->topRentCars();

//Get top 3 reserved cars
$TopReservedCars = $DashboardController->topReservedCars();

//Get top 3 repaired cars
$TopRepairedCars = $DashboardController->topRepairedCars();

//Get recent renting
$recentRenting = $DashboardController->recentRenting();

//Get most citys rent
$mostCityClient = $DashboardController->mostClientCitys();

//GET company info
$company_info = $DashboardController->getComapnyInfo();
 ?>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <?php include '../includes/header.inc.php'; ?>

        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include '../includes/navbar.inc.php'; ?>

        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include '../includes/left_navbar.inc.php'; ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->



                      <div class="row">
                          <!-- metric -->
                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="text-muted">Nombre Clients</h5>
                                      <div class="metric-value d-inline-block">
                                          <h1 class="mb-1 text-dark"><?php echo $TotalClients;?></h1>
                                      </div>
                                      <?php if($clientsGrowth['stat'] == "up"){?>
                                        <div class="metric-label d-inline-block float-right text-success">
                                            <i class="fa fa-fw fa-caret-up"></i>
                                        <?php }else{?>
                                          <div class="metric-label d-inline-block float-right text-danger">
                                          <i class="fa fa-fw fa-caret-down"></i>
                                        <?php } ?>
                                          <span><?php echo $clientsGrowth['percentage'];?>%</span>
                                      </div>
                                  </div>
                                  <div id="sparkline-1"></div>
                              </div>
                          </div>
                          <!-- /. metric -->
                          <!-- metric -->
                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="text-muted">Couts reparation</h5>
                                      <div class="metric-value d-inline-block">
                                          <h1 class="mb-1 text-dark">
                                            <?php if(!empty($TotalExpenses)){?>
                                            <?php echo $TotalExpenses.$company_info['currency'];?>
                                          <?php }else{ ?>
                                            <?php echo '0'.$company_info['currency'];?>
                                          <?php } ?>
                                          </h1>
                                      </div>
                                      <?php if($reparationGrowth['stat'] == "up"){?>
                                        <div class="metric-label d-inline-block float-right text-success">
                                            <i class="fa fa-fw fa-caret-up"></i>
                                        <?php }else{?>
                                          <div class="metric-label d-inline-block float-right text-danger">
                                          <i class="fa fa-fw fa-caret-down"></i>
                                        <?php } ?>
                                          <span><?php echo $reparationGrowth['percentage'];?>%</span>
                                      </div>
                                  </div>
                                  <div id="sparkline-2"></div>
                              </div>
                          </div>
                          <!-- /. metric -->
                          <!-- metric -->
                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="text-muted">Profit Total</h5>
                                      <div class="metric-value d-inline-block">
                                          <h1 class="mb-1 text-dark">
                                            <?php if(!empty($TotalProfit)){?>
                                            <?php echo $TotalProfit.$company_info['currency']; ?>
                                          <?php }else{
                                            echo '0'.$company_info['currency'];
                                          } ?>
                                          </h1>
                                      </div>
                                      <?php if($profitGrowth['stat'] == "up"){?>
                                        <div class="metric-label d-inline-block float-right text-success">
                                            <i class="fa fa-fw fa-caret-up"></i>
                                        <?php }else{?>
                                          <div class="metric-label d-inline-block float-right text-danger">
                                          <i class="fa fa-fw fa-caret-down"></i>
                                        <?php } ?>
                                          <span><?php echo $profitGrowth['percentage'];?>%</span>
                                      </div>
                                  </div>
                                  <div id="sparkline-3">
                                  </div>
                              </div>
                          </div>
                          <!-- /. metric -->
                          <!-- metric -->
                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="text-muted">Vehicule disponible</h5>
                                      <div class="metric-value d-inline-block">
                                          <h1 class="mb-1 text-dark"><?php echo $TotalDispoCars;?></h1>
                                      </div>

                                  </div>
                                  <div id="sparkline-4"></div>
                              </div>
                          </div>
                          <!-- /. metric -->
                      </div>

                      <!-- revenue  -->
                      <!-- ============================================================== -->
                      <div class="row">
                          <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">
                                  <h5 class="card-header">Revenue</h5>
                                  <div class="card-body">
                                      <canvas id="revenue" width="400" height="150"></canvas>
                                  </div>

                              </div>
                          </div>
                          <!-- ============================================================== -->
                          <!-- end reveune  -->
                          <!-- ============================================================== -->
                          <!-- ============================================================== -->
                          <!-- total sale  -->
                          <!-- ============================================================== -->
                          <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">
                                  <h5 class="card-header">Vehicules plus profitable</h5>
                                  <div class="card-body">
                                      <canvas id="total-sale" width="220" height="155"></canvas>
                                      <div class="chart-widget-list">


                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- ============================================================== -->
                          <!-- end total sale  -->
                          <!-- ============================================================== -->
                      </div>


                        <div class="row">
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Location recent</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Vehicule</th>
                                                        <th class="border-0">Date depart</th>
                                                        <th class="border-0">Heure depart</th>
                                                        <th class="border-0">Date retour</th>
                                                        <th class="border-0">Heure retour</th>
                                                        <th class="border-0">N°jours</th>
                                                        <th class="border-0">Prix</th>
                                                        <th class="border-0">Paiement</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php foreach($recentRenting as $recentRent):?>
                                                    <tr>
                                                        <td><?php echo $recentRent['marque_vehicule'];?></td>
                                                          <td><?php echo $recentRent['date_depart'];?></td>
                                                            <td><?php echo $recentRent['heure_depart'];?></td>
                                                              <td><?php echo $recentRent['date_retour'];?></td>
                                                                <td><?php echo $recentRent['heure_retour'];?></td>
                                                                  <td><?php echo $recentRent['nb_jour'];?></td>
                                                                    <td><?php echo $recentRent['prix_ht'];?></td>
                                                        <?php if(date('m/d/Y')<$recentRent['paye_le']){?>
                                                        <td><span class="badge-dot badge-success mr-1"></span>Payée</td>
                                                       <?php }else{?>
                                                         <td><span class="badge-dot badge-brand mr-1"></span>Non Payée</td>
                                                       <?php }?>
                                                    </tr>
                                                  <?php endforeach;?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->


                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->
                        </div>

                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- total revenue  -->
                            <!-- ============================================================== -->


                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- category revenue  -->
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- end category revenue  -->
                            <!-- ============================================================== -->

                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-8 col-12">
                                <div class="card">
                                    <h5 class="card-header">Nombre location-reservation par mois</h5>
                                    <div class="card-body">
                                        <canvas id="chartjs_line"></canvas>
                                    </div>
                                </div>
                            </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-4 col-12">
                            <div class="card">
                                <h5 class="card-header">Location par ville </h5>
                                <div class="card-body p-0">
                                    <ul class="country-sales list-group list-group-flush">
                                      <?php foreach($mostCityClient as $city): ?>
                                        <li class="country-sales-content list-group-item"><span class="mr-2"><i class="flag-icon flag-icon-<?php echo strtolower($company_info['country']);?>" title="us" id="us"></i> </span>
                                            <span class=""><?php echo $city['ville'];?></span><span class="float-right text-dark"><?php echo $city['totalRent'];?></span>
                                        </li>
                                      <?php endforeach;?>

                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-12 col-12">
                                <!-- ============================================================== -->
                                <!-- sales traffice source  -->
                                <!-- ============================================================== -->
                                <div class="card">
                                    <h5 class="card-header"> Top vehicules loyée</h5>
                                    <div class="card-body p-0">
                                        <ul class="traffic-sales list-group list-group-flush">
                                          <?php foreach($TopRentCars as $topCar):?>
                                            <li class="traffic-sales-content list-group-item ">
                                              <span class="traffic-sales-name"><?php echo $topCar['marque_vehicule'];?></span>
                                              <span class="traffic-sales-amount"><?php echo $topCar['totalRent'];?><span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light">
                                            </li>
                                          <?php endforeach;?>

                                        </ul>
                                    </div>

                                </div>
                            </div>




                                                        <div class="col-xl-4 col-lg-6 col-md-4 col-sm-12 col-12">
                                                            <!-- ============================================================== -->
                                                            <!-- sales traffice source  -->
                                                            <!-- ============================================================== -->
                                                            <div class="card">
                                                                <h5 class="card-header"> Top vehicules reservée</h5>
                                                                <div class="card-body p-0">
                                                                    <ul class="traffic-sales list-group list-group-flush">
                                                                      <?php foreach($TopReservedCars as $topCar):?>
                                                                        <li class="traffic-sales-content list-group-item ">
                                                                          <span class="traffic-sales-name"><?php echo $topCar['marque_vehicule'];?></span>
                                                                          <span class="traffic-sales-amount"><?php echo $topCar['totalReservation'];?><span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light">
                                                                        </li>
                                                                      <?php endforeach;?>

                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>







                                                                                                                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-12 col-12">
                                                                                                                    <!-- ============================================================== -->
                                                                                                                    <!-- sales traffice source  -->
                                                                                                                    <!-- ============================================================== -->
                                                                                                                    <div class="card">
                                                                                                                        <h5 class="card-header"> Top vehicules repareé</h5>
                                                                                                                        <div class="card-body p-0">
                                                                                                                            <ul class="traffic-sales list-group list-group-flush">
                                                                                                                              <?php foreach($TopRepairedCars as $topCar):?>
                                                                                                                                <li class="traffic-sales-content list-group-item ">
                                                                                                                                  <span class="traffic-sales-name"><?php echo $topCar['marque'];?></span>
                                                                                                                                  <span class="traffic-sales-amount"><?php echo $topCar['totalRepaired'];?><span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light">
                                                                                                                                </li>
                                                                                                                              <?php endforeach;?>

                                                                                                                            </ul>
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>


                            <!-- ============================================================== -->
                            <!-- end sales traffice source  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- sales traffic country source  -->
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- end sales traffice country source  -->
                            <!-- ============================================================== -->



            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
                            <?php include '../includes/analyticsScripts.inc.php' ; ?>

                            <?php include '../includes/footer.inc.php'; ?>



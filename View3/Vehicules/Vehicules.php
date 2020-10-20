<?php

  include '../../Controllers/CarsController.php';

  require_once '../../lib/PaginationVehiculeManagement.php';


  //Cars Controller instance
  $carController = new CarsController();

 //Pagination modal
 $Pagination = new PaginationVehiculeManagaement();
 $pages_carsdispo  = $Pagination->get_pagination_numbers_dispocars();
 $pages_carsrented  = $Pagination->get_pagination_numbers_rented();
 $pages_carsreserved  = $Pagination->get_pagination_numbers_reserved();
 $pages_carsreparation  = $Pagination->get_pagination_numbers_inreparation();

 $current_page_dispo = $Pagination->current_page_cardispo();
 $current_page_rented = $Pagination->current_page_carrented();
 $current_page_reserved = $Pagination->current_page_carreserved();
 $current_page_inreparation = $Pagination->current_page_carinreparation();


  //Fetch Dispo  Cars
  $cars_dispo = $Pagination->get_data_carsdispo();

  //Fetch Cars en Cours
  $carsEnCours = $Pagination->get_data_carsencours();

  //Fetch Reserved cars
  $cars_reserved =  $Pagination->get_data_carsreserved();


  //Fetch Cars en reparation
  $cars_inReparation = $Pagination->get_data_carsinreparation();


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

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">

            <div class="tab-regular">
                <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="dispo-tab-justify" data-toggle="tab" href="#carDispo-justify" role="tab" aria-controls="home" aria-selected="true">Disponible</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="home-tab-justify" data-toggle="tab" href="#carEncours-justify" role="tab" aria-controls="home" aria-selected="true">En cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#carReserved-justify" role="tab" aria-controls="profile" aria-selected="false">Reserveé</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab-justify" data-toggle="tab" href="#carRepration-justify" role="tab" aria-controls="contact" aria-selected="false">En reparation</a>
                    </li>
                </ul>
                <div class="tab-content col-md-12" id="myTabContent7">


                  <!-- Cars Dispo -->
                    <div class="tab-pane fade show active" id="carDispo-justify" role="tabpanel" aria-labelledby="dispo-tab-justify">



                      <div class="row">
                          <!-- ============================================================== -->
                          <!-- data table  -->
                          <!-- ============================================================== -->
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">

                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table id="example" class="table table-striped table-bordered second" style="width:100%">




                                              <thead>
                                                  <tr>
                                                    <th>Marque</th>
                                                    <th>Model</th>
                                                    <th>Carbuant</th>
                                                    <th>Color</th>
                                                    <th>N°serie</th>
                                                    <th>Type vehicule</th>
                                                    <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php if($cars_dispo): ?>
                                                <?php foreach($cars_dispo as $car): ?>
                                                  <tr>
                                                    <td>
                                                      <a href="Vehicule_data.php?id=<?php echo $car['id'];?>&n_serie=<?php echo $car['n_serie'];?>">
                                                              <?php echo $car['marque']; ?>
                                                      </a>
                                                    </td>
                                                    <td><?php echo $car['model']; ?></td>
                                                    <td><?php echo $car['carburant']; ?></td>
                                                    <td><?php echo $car['color']; ?></td>
                                                    <td><?php echo $car['n_serie']; ?></td>
                                                    <td><?php echo $car['type_vehicule']; ?></td>
                                                    <td>
                                                      <a href="../Locations/Location_insert.php?marque_vehicule=<?php echo $car['marque'];?>&n_serie=<?php echo $car['n_serie'];?>" title="location">
                                                            <i class="fas fa-chevron-circle-down ml-2"></i>
                                                      </a>
                                                      <a href="../Reservation/reservation_insert.php?marque_vehicule=<?php echo $car['marque'];?>&n_serie=<?php echo $car['n_serie'];?>" title="reservation">  <i class=" fas fa-chevron-down ml-2"></i> </a>
                                                      <a href="../Reparation/reparation_insert.php?id=<?php echo $car['id'];?>" title="reparation">  <i class="fas fa-wrench ml-2"></i> </a>
                                                   </td>


                                                  </tr>
                                                <?php endforeach; ?>
                                              <?php endif; ?>
                                              </tbody>


                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3">

                                            <div class="col-sm-12 col-md-7">
                                              <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                              <ul class="pagination">
                                                <?php if($current_page_dispo >1): ?>

                                                <li class="paginate_button page-item previous " id="example_previous">
                                                  <a href="?page_cardispo=<?php echo $current_page_dispo-1; ?>" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                               </li>

                                              <?php endif;?>

                                                <?php for($i=1;$i<= $pages_carsdispo;$i++):?>

                                                <li class="paginate_button page-item ">
                                                  <a href="?page_cardispo=<?php echo $i; ?>" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a>
                                                </li>

                                              <?php endfor; ?>

                                              <?php if($current_page_dispo <  $pages_carsdispo): ?>

                                              <li class="paginate_button page-item next" id="example_next">
                                                <a href="?page_cardispo=<?php echo $current_page_dispo+1; ?>" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                              </li>

                                            <?php endif; ?>

                                              </ul>
                                            </div>
                                          </div>
                                        </div>



                                    </div>
                                  </div>
                              </div>
                          </div>
                          <!-- ============================================================== -->
                          <!-- end data table  -->
                          <!-- ============================================================== -->
                      </div>






                    </div>


                  <!-- Cars en cours -->
                    <div class="tab-pane fade show " id="carEncours-justify" role="tabpanel" aria-labelledby="home-tab-justify">



                      <div class="row">
                          <!-- ============================================================== -->
                          <!-- data table  -->
                          <!-- ============================================================== -->
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">

                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table id="example" class="table table-striped table-bordered second" style="width:100%">




                                              <thead>
                                                  <tr>
                                                    <th>Marque</th>
                                                    <th>Type client</th>
                                                    <th>N°jours</th>
                                                    <th>Date depart</th>
                                                    <th>Date retour</th>
                                                    <th>Heure retour</th>
                                                    <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php if($carsEnCours): ?>
                                                <?php foreach($carsEnCours as $car): ?>
                                                  <tr>
                                                    <td>
                                                      <a href="Vehicule_data.php?id=<?php echo $car['carId'];?>&n_serie=<?php echo $car['n_serie'];?>">
                                                              <?php echo $car['marque_vehicule']; ?>
                                                      </a>                                                    </td>
                                                    <td><?php echo $car['type_client']; ?></td>
                                                    <td><?php echo $car['nb_jour']; ?></td>
                                                    <td><?php echo $car['date_depart']; ?></td>
                                                    <td><?php echo $car['date_retour']; ?></td>
                                                    <td><?php echo $car['heure_retour']; ?></td>
                                                    <td>
                                                      <a href="../Locations/location_info.php?location_id=<?php echo $car['locationId'];?>">
                                                        <i class="fas fa-address-book"></i>
                                                      </a>
                                                    </td>



                                                  </tr>
                                                <?php endforeach; ?>
                                              <?php endif; ?>
                                              </tbody>


                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3">

                                            <div class="col-sm-12 col-md-7">
                                              <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                              <ul class="pagination">
                                                <?php if($current_page_rented >1): ?>

                                                <li class="paginate_button page-item previous " id="example_previous">
                                                  <a href="?page_carrented=<?php echo $current_page_rented-1; ?>" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                               </li>

                                              <?php endif;?>

                                                <?php for($i=1;$i<= $pages_carsrented;$i++):?>

                                                <li class="paginate_button page-item ">
                                                  <a href="?page_carrented=<?php echo $i; ?>" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a>
                                                </li>

                                              <?php endfor; ?>

                                              <?php if($current_page_rented <  $pages_carsrented): ?>

                                              <li class="paginate_button page-item next" id="example_next">
                                                <a href="?page_carrented=<?php echo $current_page_rented+1; ?>" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                              </li>

                                            <?php endif; ?>

                                              </ul>
                                            </div>
                                          </div>
                                        </div>


                                    </div>
                                  </div>
                              </div>
                          </div>
                          <!-- ============================================================== -->
                          <!-- end data table  -->
                          <!-- ============================================================== -->
                      </div>






                    </div>

                  <!-- Cars Reserved -->
                    <div class="tab-pane fade" id="carReserved-justify" role="tabpanel" aria-labelledby="profile-tab-justify">



                      <div class="row">
                          <!-- ============================================================== -->
                          <!-- data table  -->
                          <!-- ============================================================== -->
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">

                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table id="example" class="table table-striped table-bordered second" style="width:100%">



                                              <thead>
                                                  <tr>
                                                    <th>Marque</th>
                                                    <th>Model</th>
                                                    <th>N°jours</th>
                                                    <th>Date deparat</th>
                                                    <th>Date retour</th>
                                                    <th>Heure retour</th>
                                                    <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php if($cars_reserved): ?>
                                                <?php foreach($cars_reserved as $car): ?>
                                                  <tr>
                                                    <td>
                                                      <a href="Vehicule_data.php?id=<?php echo $car['car_id'];?>&n_serie=<?php echo $car['n_serie'];?>">
                                                              <?php echo $car['marque']; ?>
                                                      </a>                                                       </td>
                                                    <td><?php echo $car['model']; ?></td>
                                                    <td><?php echo $car['nb_jour']; ?></td>
                                                    <td><?php echo $car['date_depart']; ?></td>
                                                    <td><?php echo $car['date_retour']; ?></td>
                                                    <td><?php echo $car['heure_retour']; ?></td>
                                                    <td>
                                                      <a href="../Locations/Location_insert.php?marque_vehicule=<?php echo $car['marque'];?>&n_serie=<?php echo $car['n_serie'];?>&reservation_id=<?php echo $car['res_id'];?>" title="location">
                                                            <i class="fas fa-chevron-circle-down ml-2"></i>
                                                      </a>
                                                      <a href="../Reservation/reservation_info.php?reservation_id=<?php echo $car['res_id'];?>" title="reservation">  <i class=" fas fa-chevron-down ml-2"></i> </a>
                                                      <a href="../Reparation/reparation_insert.php?id=<?php echo $car['car_id'];?>" title="reparation">  <i class="fas fa-wrench ml-2"></i> </a>
                                                    </td>

                                                  </tr>
                                                <?php endforeach; ?>
                                              <?php endif;?>
                                              </tbody>
                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3">

                                            <div class="col-sm-12 col-md-7">
                                              <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                              <ul class="pagination">
                                                <?php if($current_page_reserved >1): ?>

                                                <li class="paginate_button page-item previous " id="example_previous">
                                                  <a href="?page_carreserved=<?php echo $current_page_reserved-1; ?>" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                               </li>

                                              <?php endif;?>

                                                <?php for($i=1;$i<= $pages_carsreserved;$i++):?>

                                                <li class="paginate_button page-item ">
                                                  <a href="?page_carreserved=<?php echo $i; ?>" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a>
                                                </li>

                                              <?php endfor; ?>

                                              <?php if($current_page_reserved <  $pages_carsreserved): ?>

                                              <li class="paginate_button page-item next" id="example_next">
                                                <a href="?page_carreserved=<?php echo $current_page_reserved+1; ?>" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                              </li>

                                            <?php endif; ?>

                                              </ul>
                                            </div>
                                          </div>
                                        </div>



                                    </div>
                                  </div>
                              </div>
                          </div>
                          <!-- ============================================================== -->
                          <!-- end data table  -->
                          <!-- ============================================================== -->
                      </div>




                    </div>


                    <!-- Cars In Reperation -->

                    <div class="tab-pane fade" id="carRepration-justify" role="tabpanel" aria-labelledby="contact-tab-justify">



                      <div class="row">
                          <!-- ============================================================== -->
                          <!-- data table  -->
                          <!-- ============================================================== -->
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">

                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table id="example" class="table table-striped table-bordered second" style="width:100%">



                                              <thead>
                                                  <tr>
                                                    <th>Marque</th>
                                                    <th>Model</th>
                                                    <th>Date mise circulation</th>
                                                    <th>Date entreé garage</th>
                                                    <th>Date sortie garage</th>
                                                    <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php if($cars_inReparation): ?>
                                                <?php foreach($cars_inReparation as $car): ?>
                                                  <tr>
                                                    <td>
                                                      <a href="Vehicule_data.php?id=<?php echo $car['id'];?>&n_serie=<?php echo $car['n_serie'];?>">
                                                              <?php echo $car['marque']; ?>
                                                      </a>
                                                    </td>
                                                    <td><?php echo $car['model']; ?></td>
                                                    <td><?php echo $car['date_mise_circulation']; ?></td>
                                                    <td><?php echo $car['date_entree_garage']; ?></td>
                                                    <td><?php echo $car['date_sortie_garage']; ?></td>
                                                    <td>
                                                      <a href="../Reparation/reparation_info.php?id=<?php echo $car['repId'];?>">
                                                        <i class="fas fa-address-book"></i>
                                                      </a>
                                                    </td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              <?php endif;?>
                                              </tbody>

                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3">

                                            <div class="col-sm-12 col-md-7">
                                              <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                              <ul class="pagination">
                                                <?php if($current_page_inreparation >1): ?>

                                                <li class="paginate_button page-item previous " id="example_previous">
                                                  <a href="?page_carinreparation=<?php echo $current_page_inreparation-1; ?>" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                               </li>

                                              <?php endif;?>

                                                <?php for($i=1;$i<= $pages_carsreparation;$i++):?>

                                                <li class="paginate_button page-item ">
                                                  <a href="?page_carinreparation=<?php echo $i; ?>" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a>
                                                </li>

                                              <?php endfor; ?>

                                              <?php if($current_page_inreparation <  $pages_carsreparation): ?>

                                              <li class="paginate_button page-item next" id="example_next">
                                                <a href="?page_carinreparation=<?php echo $current_page_inreparation+1; ?>" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                              </li>

                                            <?php endif; ?>

                                              </ul>
                                            </div>
                                          </div>
                                        </div>



                                    </div>
                                  </div>
                              </div>
                          </div>
                          <!-- ============================================================== -->
                          <!-- end data table  -->
                          <!-- ============================================================== -->
                      </div>




                    </div>
                </div>
            </div>
        </div>
      </div>


        <!-- footer -->
        <!-- ============================================================== -->
        <?php include '../includes/footer.inc.php'; ?>

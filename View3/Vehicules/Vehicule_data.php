<?php

  include '../../Controllers/CarsController.php';

if(isset($_GET['id'],$_GET['n_serie'])){

  $id = $_GET['id'];
  $n_serie = $_GET['n_serie'];

  //Cars Controller instance
  $carController = new CarsController();


  //Fetch Car info
  $car_info = $carController->getCarById($id);

  //Fetch Cars en Cours History
  $carEnCoursHistory = $carController->location_carHistory($n_serie);

  //Fetch Reserved car history
  $car_reservedHistory = $carController->reserved_carHistory($n_serie);


  //Fetch Cars reparation history
  $car_reparationHistory = $carController->car_reparationHistory($n_serie);




  //Delete Car
  if(isset($_POST['delete_car'])){

      $car_delete = $carController->deleteCar($id);
      header("Location:Vehicules.php");

  }

}



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
            <div class="section-block">
                <h5 class="section-title">Justified Tabs</h5>
                <p>Takes the basic nav from above and adds the .nav-tabs class to generate a tabbed interface..</p>
            </div>
            <div class="tab-regular">
                <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="info-tab-justify" data-toggle="tab" href="#carInfo-justify" role="tab" aria-controls="home" aria-selected="true">Informations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="home-tab-justify" data-toggle="tab" href="#carEncoursHistory-justify" role="tab" aria-controls="home" aria-selected="true">Historique location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#carReservedHistory-justify" role="tab" aria-controls="profile" aria-selected="false">Historique reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab-justify" data-toggle="tab" href="#carReprationHistory-justify" role="tab" aria-controls="contact" aria-selected="false">Historique reparation</a>
                    </li>
                </ul>
                <div class="tab-content col-md-12" id="myTabContent7">


                  <!-- Car info -->
                    <div class="tab-pane fade show active" id="carInfo-justify" role="tabpanel" aria-labelledby="info-tab-justify">



                      <!-- ============================================================== -->
                              <div class="row">
                              <!-- ============================================================== -->
                              <!-- four widgets   -->
                              <!-- ============================================================== -->
                              <!-- ============================================================== -->
                              <!-- total views   -->
                              <!-- ============================================================== -->
                              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-inline-block">
                                              <h5 class="text-muted">Fournisseur</h5>
                                              <h2 class="mb-0"> <?php echo $car_info['fournisseur'];?></h2>
                                          </div>
                                          <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                              <i class="fas fa-dolly fa-fw fa-sm text-info"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- ============================================================== -->
                              <!-- end total views   -->
                              <!-- ============================================================== -->
                              <!-- ============================================================== -->
                              <!-- total followers   -->
                              <!-- ============================================================== -->
                              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-inline-block">
                                              <h5 class="text-muted">Marque</h5>
                                              <h2 class="mb-0"><?php echo $car_info['marque'];?></h2>
                                          </div>
                                          <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                              <i class=" fab fa-500px fa-fw fa-sm text-primary"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- ============================================================== -->
                              <!-- end total followers   -->
                              <!-- ============================================================== -->
                              <!-- ============================================================== -->
                              <!-- partnerships   -->
                              <!-- ============================================================== -->
                              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-inline-block">
                                              <h5 class="text-muted">Model</h5>
                                              <h2 class="mb-0"><?php echo $car_info['model'];?></h2>
                                          </div>
                                          <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                              <i class="fas fa-car fa-fw fa-sm text-secondary"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- ============================================================== -->
                              <!-- end partnerships   -->
                              <!-- ============================================================== -->
                              <!-- ============================================================== -->
                              <!-- total earned   -->
                              <!-- ============================================================== -->

                              <!-- ============================================================== -->
                              <!-- end total earned   -->
                              <!-- ============================================================== -->
                          </div>








                    <div class="row">
                               <!-- ============================================================== -->
                               <!-- four widgets   -->
                               <!-- ============================================================== -->
                               <!-- ============================================================== -->
                               <!-- total views   -->
                               <!-- ============================================================== -->
                               <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="d-inline-block">
                                               <h5 class="text-muted">Date achat</h5>
                                               <h2 class="mb-0"><?php echo $car_info['date_achat'];?></h2>
                                           </div>
                                           <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                               <i class=" fas fa-calendar-alt fa-fw fa-sm text-info"></i>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- ============================================================== -->
                               <!-- end total views   -->
                               <!-- ============================================================== -->
                               <!-- ============================================================== -->
                               <!-- total followers   -->
                               <!-- ============================================================== -->
                               <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="d-inline-block">
                                               <h5 class="text-muted">Prix d'achat HT</h5>
                                               <h2 class="mb-0"><?php echo $car_info['prix_achat_ht'];?>tnd</h2>
                                           </div>
                                           <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                               <i class="far fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- ============================================================== -->
                               <!-- end total followers   -->
                               <!-- ============================================================== -->
                               <!-- ============================================================== -->
                               <!-- partnerships   -->
                               <!-- ============================================================== -->
                               <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="d-inline-block">
                                               <h5 class="text-muted">TVA</h5>
                                               <h2 class="mb-0"><?php echo $car_info['tva'];?>%</h2>
                                           </div>
                                           <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                               <i class="fas fa-percent fa-fw fa-sm text-secondary"></i>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- ============================================================== -->
                               <!-- end partnerships   -->
                               <!-- ============================================================== -->
                               <!-- ============================================================== -->
                               <!-- total earned   -->
                               <!-- ============================================================== -->
                               <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="d-inline-block">
                                               <h5 class="text-muted">Prix d'achat TTC</h5>
                                               <h2 class="mb-0"><?php echo $car_info['prix_achat_ttc'];?> tnd</h2>
                                           </div>
                                           <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                               <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- ============================================================== -->
                               <!-- end total earned   -->
                               <!-- ============================================================== -->
                           </div>









                     <div class="row">
                                <!-- ============================================================== -->
                                <!-- four widgets   -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- total views   -->
                                <!-- ============================================================== -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Durée de vie</h5>
                                                <h2 class="mb-0"><?php echo $car_info['duree_vie'];?></h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                                <i class="far fa-hourglass fa-fw fa-sm text-info"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end total views   -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- total followers   -->
                                <!-- ============================================================== -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Type vehicule</h5>
                                                <h2 class="mb-0"><?php echo $car_info['type_vehicule'];?></h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                                <i class="fas fa-truck fa-fw fa-sm text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Carbuant</h5>
                                                <h2 class="mb-0"><?php echo $car_info['carburant'];?></h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                                <i class="fas fa-battery-half fa-fw fa-sm text-brand"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end total followers   -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- partnerships   -->
                                <!-- ============================================================== -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Color</h5>
                                                <h2 class="mb-0"><?php echo $car_info['color'];?></h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                                <i class="fas fa-paint-brush fa-fw fa-sm text-secondary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end partnerships   -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- total earned   -->
                                <!-- ============================================================== -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">N°km</h5>
                                                <h2 class="mb-0"><?php echo $car_info['nb_km_avant_revision'];?></h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                                <i class="fas fa-tachometer-alt fa-fw fa-sm text-brand"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end total earned   -->
                                <!-- ============================================================== -->


                            </div>









                      <div class="row">
                                 <!-- ============================================================== -->
                                 <!-- four widgets   -->
                                 <!-- ============================================================== -->
                                 <!-- ============================================================== -->
                                 <!-- total views   -->
                                 <!-- ============================================================== -->
                                 <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="d-inline-block">
                                                 <h5 class="text-muted">Traites mensuel</h5>
                                                 <h2 class="mb-0"><?php echo $car_info['montant_traites_mensuel'];?>tnd</h2>
                                             </div>
                                             <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                                 <i class="fas fa-credit-card fa-fw fa-sm text-info"></i>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- ============================================================== -->
                                 <!-- end total views   -->
                                 <!-- ============================================================== -->
                                 <!-- ============================================================== -->
                                 <!-- total followers   -->
                                 <!-- ============================================================== -->
                                 <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="d-inline-block">
                                                 <h5 class="text-muted">N°traites</h5>
                                                 <h2 class="mb-0"><?php echo $car_info['nombre_traites'];?></h2>
                                             </div>
                                             <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                                 <i class="fas fa-sort-numeric-down  fa-fw fa-sm text-primary"></i>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- ============================================================== -->
                                 <!-- end total followers   -->
                                 <!-- ============================================================== -->
                                 <!-- ============================================================== -->
                                 <!-- partnerships   -->
                                 <!-- ============================================================== -->
                                 <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="d-inline-block">
                                                 <h5 class="text-muted">N°facture</h5>
                                                 <h2 class="mb-0"><?php echo $car_info['num_facture_fournisseur'];?></h2>
                                             </div>
                                             <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                                 <i class="fas fa-tasks fa-fw fa-sm text-secondary"></i>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- ============================================================== -->
                                 <!-- end partnerships   -->
                                 <!-- ============================================================== -->
                                 <!-- ============================================================== -->
                                 <!-- total earned   -->
                                 <!-- ============================================================== -->

                                 <!-- ============================================================== -->
                                 <!-- end total earned   -->
                                 <!-- ============================================================== -->
                             </div>








                       <div class="row">

                         <!-- total earned   -->
                         <!-- ============================================================== -->
                         <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                             <div class="card">
                                 <div class="card-body">
                                     <div class="d-inline-block">
                                         <h5 class="text-muted">Carte grise</h5>
                                         <h2 class="mb-0"><?php echo $car_info['carte_grise'];?></h2>
                                     </div>
                                     <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                         <i class="far fa-address-card fa-fw fa-sm text-brand"></i>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- ============================================================== -->
                         <!-- end total earned   -->
                         <!-- ============================================================== -->

                                  <!-- ============================================================== -->
                                  <!-- four widgets   -->
                                  <!-- ============================================================== -->
                                  <!-- ============================================================== -->
                                  <!-- total views   -->
                                  <!-- ============================================================== -->
                                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                      <div class="card">
                                          <div class="card-body">
                                              <div class="d-inline-block">
                                                  <h5 class="text-muted">Assurance</h5>
                                                  <h2 class="mb-0"><?php echo $car_info['n_assurance'];?></h2>
                                              </div>
                                              <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                                  <i class="fas fa-shield-alt fa-fw fa-sm text-info"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- ============================================================== -->
                                  <!-- end total views   -->
                                  <!-- ============================================================== -->
                                  <!-- ============================================================== -->
                                  <!-- total followers   -->
                                  <!-- ============================================================== -->
                                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                      <div class="card">
                                          <div class="card-body">
                                              <div class="d-inline-block">
                                                  <h5 class="text-muted">N°serie</h5>
                                                  <h2 class="mb-0"><?php echo $car_info['n_serie'];?></h2>
                                              </div>
                                              <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                                  <i class="fas fa-id-card-alt fa-fw fa-sm text-primary"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- ============================================================== -->
                                  <!-- end total followers   -->
                                  <!-- ============================================================== -->
                                  <!-- ============================================================== -->

                                  <!-- ============================================================== -->
                                  <!-- ============================================================== -->
                                  <!-- total earned   -->
                                  <!-- ============================================================== -->

                                  <!-- ============================================================== -->
                                  <!-- end total earned   -->
                                  <!-- ============================================================== -->
                              </div>
                              <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            Detail réparation
                                        </div>
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                                <p><?php echo $car_info['detail_reparation'];?></p>

                                            </blockquote>
                                        </div>
                                    </div>
                                  </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <h5 class="card-header">Basic Map</h5>
                                            <div class="card-body">
                                                <div id="map" class="gmaps"></div>
                                            </div>
                                        </div>
                                    </div>




                                                                    <div class="row">

                                                                      <form class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 mr-4" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                                                        <button type="submit"  name="delete_car" class="btn btn-outline-danger">Suprmier</button>
                                                                     </form>

                                                                    <a href="Vehicule_update.php?id=<?php echo $car_info['id'] ; ?>" class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12   btn btn-outline-success">Modifier</a>


                                                                  </div>


                                </div>






                        </div>




                  <!-- Car en cours History -->
                    <div class="tab-pane fade show " id="carEncoursHistory-justify" role="tabpanel" aria-labelledby="home-tab-justify">



                      <div class="row">
                          <!-- ============================================================== -->
                          <!-- data table  -->
                          <!-- ============================================================== -->
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">

                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table id="example" class="table table-striped table-bordered second" style="width:100%">

                                            <div class="row mb-2">
                                                <div class="col-sm-12 col-md-6">
                                                  <div class="dt-buttons">
                                                    <button class="btn btn-outline-light buttons-copy buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                      <span>Copy</span>
                                                    </button>
                                                    <button class="btn btn-outline-light buttons-excel buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                      <span>Excel</span>
                                                    </button>
                                                    <button class="btn btn-outline-light buttons-pdf buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                      <span>PDF</span>
                                                    </button>
                                                    <button class="btn btn-outline-light buttons-print" tabindex="0" aria-controls="example" type="button">
                                                      <span>Print</span>
                                                    </button>

                                                  </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                  <div id="example_filter" class="dataTables_filter">
                                                  <input type="search" class="form-control form-control-sm" placeholder="search for somthing.." aria-controls="example">
                                                  </div>
                                                </div>


                                              </div>


                                              <thead>
                                                  <tr>
                                                    <th>Marque</th>
                                                    <th>Type client</th>
                                                    <th>N°jours</th>
                                                    <th>Date depart</th>
                                                    <th>Date retour</th>
                                                    <th>Heure retour</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php

                                                      foreach($carEnCoursHistory as $car):

                                                  ?>
                                                  <tr>
                                                    <td><?php echo $car['marque_vehicule']; ?></td>
                                                    <td><?php echo $car['type_client']; ?></td>
                                                    <td><?php echo $car['nb_jour']; ?></td>
                                                    <td><?php echo $car['date_depart']; ?></td>
                                                    <td><?php echo $car['date_retour']; ?></td>
                                                    <td><?php echo $car['heure_retour']; ?></td>


                                                  </tr>
                                                <?php endforeach; ?>
                                              </tbody>


                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>



                                    </div>
                                  </div>
                              </div>
                          </div>
                          <!-- ============================================================== -->
                          <!-- end data table  -->
                          <!-- ============================================================== -->
                      </div>






                    </div>

                  <!-- Car Reserved History -->
                    <div class="tab-pane fade" id="carReservedHistory-justify" role="tabpanel" aria-labelledby="profile-tab-justify">



                      <div class="row">
                          <!-- ============================================================== -->
                          <!-- data table  -->
                          <!-- ============================================================== -->
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">

                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table id="example" class="table table-striped table-bordered second" style="width:100%">

                                            <div class="row mb-2">
                                                <div class="col-sm-12 col-md-6">
                                                  <div class="dt-buttons">
                                                    <button class="btn btn-outline-light buttons-copy buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                      <span>Copy</span>
                                                    </button>
                                                    <button class="btn btn-outline-light buttons-excel buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                      <span>Excel</span>
                                                    </button>
                                                    <button class="btn btn-outline-light buttons-pdf buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                      <span>PDF</span>
                                                    </button>
                                                    <button class="btn btn-outline-light buttons-print" tabindex="0" aria-controls="example" type="button">
                                                      <span>Print</span>
                                                    </button>

                                                  </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                  <div id="example_filter" class="dataTables_filter">
                                                  <input type="search" class="form-control form-control-sm" placeholder="search for somthing.." aria-controls="example">
                                                  </div>
                                                </div>


                                              </div>


                                              <thead>
                                                  <tr>
                                                    <th>Nom</th>
                                                    <th>Prenom</th>
                                                    <th>N°jours</th>
                                                    <th>Date deparat</th>
                                                    <th>Date retour</th>
                                                    <th>Heure retour</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php foreach($car_reservedHistory as $car): ?>
                                                  <tr>
                                                    <td><?php echo $car['nom']; ?></td>
                                                    <td><?php echo $car['prenom']; ?></td>
                                                    <td><?php echo $car['nb_jour']; ?></td>
                                                    <td><?php echo $car['date_depart']; ?></td>
                                                    <td><?php echo $car['date_retour']; ?></td>
                                                    <td><?php echo $car['heure_retour']; ?></td>


                                                  </tr>
                                                <?php endforeach; ?>
                                              </tbody>
                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>



                                    </div>
                                  </div>
                              </div>
                          </div>
                          <!-- ============================================================== -->
                          <!-- end data table  -->
                          <!-- ============================================================== -->
                      </div>




                    </div>


                    <!-- Car In Reperation -->

                    <div class="tab-pane fade" id="carReprationHistory-justify" role="tabpanel" aria-labelledby="contact-tab-justify">



                      <div class="row">
                          <!-- ============================================================== -->
                          <!-- data table  -->
                          <!-- ============================================================== -->
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">

                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table id="example" class="table table-striped table-bordered second" style="width:100%">

                                            <div class="row mb-2">
                                                <div class="col-sm-12 col-md-6">
                                                  <div class="dt-buttons">
                                                    <button class="btn btn-outline-light buttons-copy buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                      <span>Copy</span>
                                                    </button>
                                                    <button class="btn btn-outline-light buttons-excel buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                      <span>Excel</span>
                                                    </button>
                                                    <button class="btn btn-outline-light buttons-pdf buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                      <span>PDF</span>
                                                    </button>
                                                    <button class="btn btn-outline-light buttons-print" tabindex="0" aria-controls="example" type="button">
                                                      <span>Print</span>
                                                    </button>

                                                  </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                  <div id="example_filter" class="dataTables_filter">
                                                  <input type="search" class="form-control form-control-sm" placeholder="search for somthing.." aria-controls="example">
                                                  </div>
                                                </div>


                                              </div>


                                              <thead>
                                                  <tr>
                                                    <th>Mecanicien</th>
                                                    <th>Date mise circulation</th>
                                                    <th>Date entreé garage</th>
                                                    <th>Date sortie garage</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php foreach($car_reparationHistory as $car): ?>
                                                  <tr>
                                                    <td><?php echo $car['mecanicien']; ?></td>
                                                    <td><?php echo $car['date_mise_circulation']; ?></td>
                                                    <td><?php echo $car['date_entree_garage']; ?></td>
                                                    <td><?php echo $car['date_sortie_garage']; ?></td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              </tbody>

                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>



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

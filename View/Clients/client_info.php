<?php

 //Include Client Controller
 include '../../Controllers/ClientController.php';

 include '../../paginations/PaginationClientData.php';



 if(isset($_GET['cin'])){

   $cin = $_GET['cin'];


   //Inherit client controller
   $ClientController = new ClientController();


   $PaginationLocation = new PaginationClientData('location',$cin);
   $pagesLocation = $PaginationLocation->get_pagination_numbers();
   $currrent_pageLocation = $PaginationLocation->current_page();


   $PaginationReservation = new PaginationClientData('reservation',$cin);
   $pagesReservation = $PaginationReservation->get_pagination_numbers();
   $current_pageReservation  = $PaginationReservation->current_page();

   //Get Client data
   $client_info = $ClientController->getClientByCin($cin);

   //Get Client Reservation history
   $client_reservationHistory = $PaginationReservation->get_data();

   //Get Client Location history
   $client_locationHistory = $PaginationLocation->get_data();


   if(isset($_POST['delete_client'])){

     $delete_client = $ClientController->client_delete($cin);
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

                </ul>
                <div class="tab-content col-md-12" id="myTabContent7">


                  <!-- Car info -->
                    <div class="tab-pane fade show active" id="carInfo-justify" role="tabpanel" aria-labelledby="info-tab-justify">

                        <?php
                            if(isset($_GET['delete_error'])) {
                            delete_error_message();
                            }
                        ?>

                      <!-- ============================================================== -->
                              <div class="row">
                              <!-- ============================================================== -->
                              <!-- four widgets   -->
                              <!-- ============================================================== -->
                              <!-- ============================================================== -->
                              <!-- total views   -->
                              <!-- ============================================================== -->
                              <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-inline-block">
                                              <h5 class="text-muted">Nom</h5>
                                              <h2 class="mb-0"> <?php echo $client_info['nom'];?></h2>
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
                              <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-inline-block">
                                              <h5 class="text-muted">Prenom</h5>
                                              <h2 class="mb-0"><?php echo $client_info['prenom'];?></h2>
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
                              <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-inline-block">
                                              <h5 class="text-muted">Email</h5>
                                              <h2 class="mb-0"><?php echo $client_info['email'];?></h2>
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
                                               <h5 class="text-muted">Date naissance</h5>
                                               <h2 class="mb-0"><?php echo $client_info['date_naissance'];?></h2>
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
                                               <h5 class="text-muted">Telephone</h5>
                                               <h2 class="mb-0"><?php echo $client_info['telephone'];?></h2>
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
                                               <h5 class="text-muted">CIN</h5>
                                               <h2 class="mb-0"><?php echo $client_info['cin'];?></h2>
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
                                               <h5 class="text-muted">Adress</h5>
                                               <h2 class="mb-0"><?php echo $client_info['adress'];?></h2>
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
                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-inline-block">
                                                    <h5 class="text-muted">Ville</h5>
                                                    <h2 class="mb-0"><?php echo $client_info['ville'];?></h2>
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
                                                    <h5 class="text-muted">Pays</h5>
                                                    <h2 class="mb-0"><?php echo $client_info['pays'];?></h2>
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
                                                    <h5 class="text-muted">N°permis</h5>
                                                    <h2 class="mb-0"><?php echo $client_info['n_permis'];?></h2>
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
                                                    <h5 class="text-muted">Code postal </h5>
                                                    <h2 class="mb-0"><?php echo $client_info['code_postal'];?></h2>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- end total earned   -->
                                    <!-- ============================================================== -->
                                </div>

                                <div class="text-center">
                                  <a href="client_edit.php?cin=<?php echo $client_info['cin']; ?>" class="btn btn-outline-success">Modifier</a>
                                  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                                    <input class="btn btn-outline-danger mt-2" type="submit" name="delete_client" value="Supprimer">
                                  </form>
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

                        

                                              <thead>
                                                  <tr>
                                                    <th>Marque</th>
                                                    <th>N°jours</th>
                                                    <th>Date depart</th>
                                                    <th>Date retour</th>
                                                    <th>Heure retour</th>
                                                    <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                 if(!empty($client_locationHistory)){
                                                      foreach($client_locationHistory as $client):

                                                  ?>
                                                  <tr>
                                                    <td><?php echo $client['marque_vehicule']; ?></td>
                                                    <td><?php echo $client['nb_jour']; ?></td>
                                                    <td><?php echo $client['date_depart']; ?></td>
                                                    <td><?php echo $client['date_retour']; ?></td>
                                                    <td><?php echo $client['heure_retour']; ?></td>
                                                    <td>
                                                    <a href="../Locations/location_info.php?location_id=<?php echo $client['id'];?>" title="detail location">
                                                      <i class="fas fa-address-book"></i>
                                                    </a>
                                                  </td>


                                                  </tr>
                                                <?php endforeach; ?>
                                              <?php }else{} ?>
                                              </tbody>


                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3">

                                            <div class="col-sm-12 col-md-7">
                                              <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                              <ul class="pagination">
                                                <?php if($currrent_pageLocation>1): ?>

                                                <li class="paginate_button page-item previous " id="example_previous">
                                                  <a href="?pagereservation=<?php echo $currrent_pageLocation-1; ?>" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                               </li>

                                              <?php endif;?>

                                                <?php for($i=1;$i<=$pagesLocation;$i++):?>

                                                <li class="paginate_button page-item ">
                                                  <a href="?pagereservation=<?php echo $i; ?>" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a>
                                                </li>

                                              <?php endfor; ?>

                                              <?php if($currrent_pageLocation < $pagesLocation): ?>

                                              <li class="paginate_button page-item next" id="example_next">
                                                <a href="?pagereservation=<?php echo $currrent_pageLocation+1; ?>" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
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

                                              <thead>
                                                  <tr>

                                                    <th>N°jours</th>
                                                    <th>Date deparat</th>
                                                    <th>Date retour</th>
                                                    <th>Heure retour</th>
                                                    <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php

                                                if(!empty($client_reservationHistory)){
                                                    foreach($client_reservationHistory as $client): ?>
                                                  <tr>

                                                    <td><?php echo $client['nb_jour']; ?></td>
                                                    <td><?php echo $client['date_depart']; ?></td>
                                                    <td><?php echo $client['date_retour']; ?></td>
                                                    <td><?php echo $client['heure_retour']; ?></td>
                                                    <td>
                                                        <a href="../Reservation/reservation_info.php?reservation_id=<?php echo $client['id'];?>" title="detail reservation">
                                                          <i class="fas fa-address-book"></i>
                                                        </a>
                                                    </td>

                                                  </tr>
                                                <?php endforeach; ?>
                                              <?php }else{} ?>
                                              </tbody>
                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3">

                                            <div class="col-sm-12 col-md-7">
                                              <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                              <ul class="pagination">
                                                <?php if($current_pageReservation>1): ?>

                                                <li class="paginate_button page-item previous " id="example_previous">
                                                  <a href="?pagereservation=<?php echo $current_pageReservation-1; ?>" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                               </li>

                                              <?php endif;?>

                                                <?php for($i=1;$i<=$pagesReservation;$i++):?>

                                                <li class="paginate_button page-item ">
                                                  <a href="?pagereservation=<?php echo $i; ?>" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a>
                                                </li>

                                              <?php endfor; ?>

                                              <?php if($current_pageReservation < $pagesReservation): ?>

                                              <li class="paginate_button page-item next" id="example_next">
                                                <a href="?pagereservation=<?php echo $current_pageReservation+1; ?>" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
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

<?php

 //Include Fournisseur Controller
 include '../../Controllers/FournisseurController.php';

 include '../../paginations/PaginationFournisseurData.php';

 if(isset($_GET['id'])){

   $id = $_GET['id'];

   //Inherit Fournisseur Controller
   $FournisseurController = new FournisseurController();


   //Get fournisseur info
   $fournisseur_info = $FournisseurController->fournisseurEdit($id);
   $service = $fournisseur_info['service'];
   $PagintationFournisseur = new PaginationFournisseurData($service);
   $PagesFounrisseur = $PagintationFournisseur->get_pagination_numbers();
   $current_pageFournisseur = $PagintationFournisseur->current_page();


   //Get fournisseur history
   $fournisseur_history  = $PagintationFournisseur->get_data();

   if(isset($_POST['delete_fournisseur'])){

     $delete_fournisseur = $FournisseurController->fournisseurDelete($id);
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
            <?php /*var_dump($fournisseur_history); */?>
            <div class="tab-regular">
              <?php if(!isset($_GET['page'.$service])){ ?>
                <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="info-tab-justify" data-toggle="tab" href="#carInfo-justify" role="tab" aria-controls="home" aria-selected="true">Informations</a>
                    </li>
                    <?php if($fournisseur_history > 0){ ?>
                    <li class="nav-item">
                        <a class="nav-link " id="home-tab-justify" data-toggle="tab" href="#carEncoursHistory-justify" role="tab" aria-controls="home1" aria-selected="true"><?php if($fournisseur_info['service'] == 'vente'){

                           echo 'Historique Vente';}else{  echo 'Historique reparation';}
                        ?>
                      </a>
                    </li>
                  <?php } ?>



                </ul>
              <?php }else{?>


                <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link " id="info-tab-justify" data-toggle="tab" href="#carInfo-justify" role="tab" aria-controls="home" aria-selected="true">Informations</a>
                    </li>
                    <?php if($fournisseur_history > 0){ ?>
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#carEncoursHistory-justify" role="tab" aria-controls="home1" aria-selected="true"><?php if($fournisseur_info['service'] == 'vente'){

                           echo 'Historique Vente';}else{  echo 'Historique reparation';}
                        ?>
                      </a>
                    </li>
                  <?php } ?>



                </ul>
              <?php } ?>
                <div class="tab-content col-md-12" id="myTabContent7">

                <?php if(!isset($_GET['page'.$service])){  ?>
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
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-inline-block">
                                              <h5 class="text-muted">Nom</h5>
                                              <h2 class="mb-0"> <?php echo $fournisseur_info['nom_contact'];?></h2>
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
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-inline-block">
                                              <h5 class="text-muted">Prenom</h5>
                                              <h2 class="mb-0"><?php echo $fournisseur_info['prenom_contact'];?></h2>
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
                                              <h2 class="mb-0"><?php echo $fournisseur_info['email'];?></h2>
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
                                               <h2 class="mb-0"><?php echo $fournisseur_info['telephone'];?></h2>
                                           </div>

                                       </div>
                                   </div>
                               </div>


                               <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="d-inline-block">
                                               <h5 class="text-muted">GSM</h5>
                                               <h2 class="mb-0"><?php echo $fournisseur_info['gsm'];?></h2>
                                           </div>

                                       </div>
                                   </div>
                               </div>
                               <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="d-inline-block">
                                               <h5 class="text-muted">FAX</h5>
                                               <h2 class="mb-0"><?php echo $fournisseur_info['fax'];?></h2>
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
                                               <h5 class="text-muted">Adress</h5>
                                               <h2 class="mb-0"><?php echo $fournisseur_info['adress'];?></h2>
                                           </div>

                                       </div>
                                   </div>
                               </div>

                               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="d-inline-block">
                                               <h5 class="text-muted">Service</h5>
                                               <h2 class="mb-0"><?php echo $fournisseur_info['service'];?></h2>
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
                                                    <h5 class="text-muted">Ville</h5>
                                                    <h2 class="mb-0"><?php echo $fournisseur_info['ville'];?></h2>
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
                                                    <h2 class="mb-0"><?php echo $fournisseur_info['pays'];?></h2>
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
                                                    <h2 class="mb-0"><?php echo $fournisseur_info['code_postal'];?></h2>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-inline-block">
                                                    <h5 class="text-muted">Observation </h5>
                                                    <h2 class="mb-0"><?php echo $fournisseur_info['observation'];?></h2>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- end total earned   -->
                                    <!-- ============================================================== -->
                                </div>

                                <div class="text-center">
                                  <a href="fournisseur_update.php?id=<?php echo $fournisseur_info['id']; ?>" class="btn btn-outline-success">Modifier</a>
                                  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                                    <input class="btn btn-outline-danger mt-2" type="submit" name="delete_fournisseur" value="Supprimer">
                                  </form>
                                  </div>


                  </div>
                  <!-- Fournisseur History -->
                    <div class="tab-pane fade show  " id="carEncoursHistory-justify" role="tabpanel" aria-labelledby="home-tab-justify">













                      <div class="row">
                          <!-- ============================================================== -->
                          <!-- data table  -->
                          <!-- ============================================================== -->
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">

                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table id="example" class="table table-striped table-bordered second" style="width:100%">


                                              <?php if($fournisseur_info['service'] == 'reparation'){ ?>
                                              <thead>
                                                  <tr>
                                                    <th>Mecanicien</th>
                                                    <th>Date mise circulation</th>
                                                    <th>Date entreé garage</th>
                                                    <th>Date sortie garage</th>
                                                      <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php foreach($fournisseur_history as $car): ?>
                                                  <tr>
                                                    <td>
                                                        <?php echo $car['mecanicien']; ?>
                                                    </td>
                                                    <td><?php echo $car['date_mise_circulation']; ?></td>
                                                    <td><?php echo $car['date_entree_garage']; ?></td>
                                                    <td><?php echo $car['date_sortie_garage']; ?></td>
                                                      <td>
                                                          <a href="../Reparation/reparation_info.php?id=12<?php $car['id'];?>">
                                                              <i class="fas fa-address-book"></i>

                                                          </a>
                                                      </td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              </tbody>
                                            <?php }elseif($fournisseur_info['service'] == 'vente'){?>
                                              <thead>
                                                  <tr>
                                                    <th>Marque</th>
                                                    <th>Model</th>
                                                    <th>Date achat</th>
                                                    <th>Prix total</th>
                                                      <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php foreach($fournisseur_history as $car): ?>
                                                  <tr>
                                                    <td>
                                                            <?php echo $car['marque']; ?>
                                                    </td>
                                                    <td><?php echo $car['model']; ?></td>
                                                    <td><?php echo $car['date_achat']; ?></td>
                                                    <td><?php echo $car['prix_achat_ttc']; ?></td>
                                                      <td>
                                                          <a href="../Vehicules/Vehicule_data.php?id=<?php echo $car['id'];?>&n_serie=<?php echo $car['n_serie'];?>">
                                                              <i class="fas fa-address-book"></i>

                                                          </a>
                                                      </td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              </tbody>
                                            <?php } ?>
                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3">

                                            <div class="col-sm-12 col-md-7">
                                              <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                              <ul class="pagination">
                                                <?php if($current_pageFournisseur>1): ?>

                                                <li class="paginate_button page-item previous " id="example_previous">
                                                  <a href="?id=<?php echo $id;?>&page<?php echo $service;?>=<?php echo $current_pageFournisseur-1; ?>" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                               </li>

                                              <?php endif;?>

                                                <?php for($i=1;$i<=$PagesFounrisseur;$i++):?>

                                                <li class="paginate_button page-item ">
                                                  <a href="?id=<?php echo $id;?>&page<?php echo $service;?>=<?php echo $i; ?>" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a>
                                                </li>

                                              <?php endfor; ?>

                                              <?php if($current_pageFournisseur < $PagesFounrisseur): ?>

                                              <li class="paginate_button page-item next" id="example_next">
                                                <a href="?id=<?php echo $id;?>&page<?php echo $service;?>=<?php echo $current_pageFournisseur+1; ?>" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
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
              <?php }else { ?>
                <div class="tab-pane fade show " id="carInfo-justify" role="tabpanel" aria-labelledby="info-tab-justify">



                  <!-- ============================================================== -->
                          <div class="row">
                          <!-- ============================================================== -->
                          <!-- four widgets   -->
                          <!-- ============================================================== -->
                          <!-- ============================================================== -->
                          <!-- total views   -->
                          <!-- ============================================================== -->
                          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="d-inline-block">
                                          <h5 class="text-muted">Nom</h5>
                                          <h2 class="mb-0"> <?php echo $fournisseur_info['nom_contact'];?></h2>
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
                          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="d-inline-block">
                                          <h5 class="text-muted">Prenom</h5>
                                          <h2 class="mb-0"><?php echo $fournisseur_info['prenom_contact'];?></h2>
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
                                          <h2 class="mb-0"><?php echo $fournisseur_info['email'];?></h2>
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
                                           <h2 class="mb-0"><?php echo $fournisseur_info['telephone'];?></h2>
                                       </div>

                                   </div>
                               </div>
                           </div>


                           <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                               <div class="card">
                                   <div class="card-body">
                                       <div class="d-inline-block">
                                           <h5 class="text-muted">GSM</h5>
                                           <h2 class="mb-0"><?php echo $fournisseur_info['gsm'];?></h2>
                                       </div>

                                   </div>
                               </div>
                           </div>
                           <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                               <div class="card">
                                   <div class="card-body">
                                       <div class="d-inline-block">
                                           <h5 class="text-muted">FAX</h5>
                                           <h2 class="mb-0"><?php echo $fournisseur_info['fax'];?></h2>
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
                                           <h5 class="text-muted">Adress</h5>
                                           <h2 class="mb-0"><?php echo $fournisseur_info['adress'];?></h2>
                                       </div>

                                   </div>
                               </div>
                           </div>

                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                               <div class="card">
                                   <div class="card-body">
                                       <div class="d-inline-block">
                                           <h5 class="text-muted">Service</h5>
                                           <h2 class="mb-0"><?php echo $fournisseur_info['service'];?></h2>
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
                                                <h5 class="text-muted">Ville</h5>
                                                <h2 class="mb-0"><?php echo $fournisseur_info['ville'];?></h2>
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
                                                <h2 class="mb-0"><?php echo $fournisseur_info['pays'];?></h2>
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
                                                <h2 class="mb-0"><?php echo $fournisseur_info['code_postal'];?></h2>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Observation </h5>
                                                <h2 class="mb-0"><?php echo $fournisseur_info['observation'];?></h2>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end total earned   -->
                                <!-- ============================================================== -->
                            </div>

                            <div class="text-center">
                              <a href="fournisseur_update.php?id=<?php echo $fournisseur_info['id']; ?>" class="btn btn-outline-success">Modifier</a>
                              <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                                <input class="btn btn-outline-danger mt-2" type="submit" name="delete_fournisseur" value="Supprimer">
                              </form>
                              </div>


              </div>






                  <!-- Fournisseur History -->
                    <div class="tab-pane fade show  active" id="carEncoursHistory-justify" role="tabpanel" aria-labelledby="home-tab-justify">













                      <div class="row">
                          <!-- ============================================================== -->
                          <!-- data table  -->
                          <!-- ============================================================== -->
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card">

                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table id="example" class="table table-striped table-bordered second" style="width:100%">


                                              <?php if($fournisseur_info['service'] == 'reparation'){ ?>
                                              <thead>
                                                  <tr>
                                                    <th>Mecanicien</th>
                                                    <th>Date mise circulation</th>
                                                    <th>Date entreé garage</th>
                                                    <th>Date sortie garage</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php foreach($fournisseur_info as $car): ?>
                                                  <tr>
                                                    <td><?php echo $car['mecanicien']; ?></td>
                                                    <td><?php echo $car['date_mise_circulation']; ?></td>
                                                    <td><?php echo $car['date_entree_garage']; ?></td>
                                                    <td><?php echo $car['date_sortie_garage']; ?></td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              </tbody>
                                            <?php }elseif($fournisseur_info['service'] == 'vente'){?>
                                              <thead>
                                                  <tr>
                                                    <th>Marque</th>
                                                    <th>Model</th>
                                                    <th>Date achat</th>
                                                    <th>Prix total</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php foreach($fournisseur_history as $car): ?>
                                                  <tr>
                                                    <td><?php echo $car['marque']; ?></td>
                                                    <td><?php echo $car['model']; ?></td>
                                                    <td><?php echo $car['date_achat']; ?></td>
                                                    <td><?php echo $car['prix_achat_ttc']; ?></td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              </tbody>
                                            <?php } ?>
                                          </table>

                                          <!-- pagination -->
                                          <div class="row mt-3">

                                            <div class="col-sm-12 col-md-7">
                                              <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                              <ul class="pagination">
                                                <?php if($current_pageFournisseur>1): ?>

                                                <li class="paginate_button page-item previous " id="example_previous">
                                                  <a href="?id=<?php echo $id;?>&page<?php echo $service;?>=<?php echo $current_pageFournisseur-1; ?>" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                               </li>

                                              <?php endif;?>

                                                <?php for($i=1;$i<=$PagesFounrisseur;$i++):?>

                                                <li class="paginate_button page-item ">
                                                  <a href="?id=<?php echo $id;?>&page<?php echo $service;?>=<?php echo $i; ?>" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a>
                                                </li>

                                              <?php endfor; ?>

                                              <?php if($current_pageFournisseur < $PagesFounrisseur): ?>

                                              <li class="paginate_button page-item next" id="example_next">
                                                <a href="?id=<?php echo $id;?>&page<?php echo $service;?>=<?php echo $current_pageFournisseur+1; ?>" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
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

                  <?php } ?>
                </div>
            </div>
        </div>
      </div>




        <!-- footer -->
        <!-- ============================================================== -->
        <?php include '../includes/footer.inc.php'; ?>

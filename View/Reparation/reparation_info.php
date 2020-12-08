<?php

 //Include Reparation Controller
 include '../../Controllers/ReparationController.php';


 if(isset($_GET['id'])){

   $id = $_GET['id'];

   //Inherit Reparation Controller
   $ReparationController = new ReparationController();


   //Get Reparation info
   $reparation_info = $ReparationController->reparation_edit($id);


   if(isset($_POST['delete_reparation'])){

     $delete_reparation = $ReparationController->reparation_delete($id);
     header("Location:../Vehicules/Vehicules.php");
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
                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-inline-block">
                                              <h5 class="text-muted">Marque</h5>
                                              <h2 class="mb-0"> <?php echo $reparation_info['marque'];?></h2>
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
                                              <h5 class="text-muted">Model</h5>
                                              <h2 class="mb-0"><?php echo $reparation_info['model'];?></h2>
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
                                              <h5 class="text-muted">Date mise en circulation</h5>
                                              <h2 class="mb-0"><?php echo $reparation_info['date_mise_circulation'];?></h2>
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
                                               <h5 class="text-muted">Date entrée garage</h5>
                                               <h2 class="mb-0"><?php echo $reparation_info['date_entree_garage'];?></h2>
                                           </div>

                                       </div>
                                   </div>
                               </div>


                               <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="d-inline-block">
                                               <h5 class="text-muted">Date sortie garage</h5>
                                               <h2 class="mb-0"><?php echo $reparation_info['date_sortie_garage'];?></h2>
                                           </div>

                                       </div>
                                   </div>
                               </div>
                               <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="d-inline-block">
                                               <h5 class="text-muted">N°serie</h5>
                                               <h2 class="mb-0"><?php echo $reparation_info['n_serie'];?></h2>
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
                                               <h5 class="text-muted">Mecanicien</h5>
                                               <h2 class="mb-0"><?php echo $reparation_info['mecanicien'];?></h2>
                                           </div>

                                       </div>
                                   </div>
                               </div>

                               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="d-inline-block">
                                               <h5 class="text-muted">Montant</h5>
                                               <h2 class="mb-0"><?php echo $reparation_info['montant'];?></h2>
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
                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-inline-block">
                                                    <h5 class="text-muted">Panne </h5>
                                                    <h2 class="mb-0"><?php echo $reparation_info['panne'];?></h2>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============================================================== -->
                                    <!-- end total earned   -->
                                    <!-- ============================================================== -->
                                </div>

                                <div class="text-center">
                                  <a href="reparation_edit.php?id=<?php echo $reparation_info['id']; ?>" class="btn btn-outline-success">Modifier</a>
                                  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                                    <input class="btn btn-outline-danger mt-2" type="submit" name="delete_reparation" value="Supprimer">
                                  </form>
                                  </div>


                  </div>





                </div>
            </div>
        </div>
      </div>




        <!-- footer -->
        <!-- ============================================================== -->
        <?php include '../includes/footer.inc.php'; ?>

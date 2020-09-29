<?php

  include '../../Controllers/CarsController.php';


  //Cars Controller instance
  $carController = new CarsController();


  //Fetch Dispo  Cars
  $cars_dispo = $carController->cars_dispoList();

  //Fetch Cars en Cours
  $carsEnCours = $carController->location_cars();

  //Fetch Reserved cars
  $cars_reserved = $carController->reserved_cars();


  //Fetch Cars en reparation
  $cars_inReparation = $carController->cars_reparation();


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
                                                    <th>Model</th>
                                                    <th>Carbuant</th>
                                                    <th>Color</th>
                                                    <th>N°serie</th>
                                                    <th>Type vehicule</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
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
                                                    <th>Model</th>
                                                    <th>N°jours</th>
                                                    <th>Date deparat</th>
                                                    <th>Date retour</th>
                                                    <th>Heure retour</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
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
                                                    <th>Model</th>
                                                    <th>Date mise circulation</th>
                                                    <th>Date entreé garage</th>
                                                    <th>Date sortie garage</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
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

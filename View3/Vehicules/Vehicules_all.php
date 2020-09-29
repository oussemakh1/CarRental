<?php

  include '../../Controllers/CarsController.php';

  //Controller
  $carController = new CarsController();

  $cars = $carController->allCars();


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
                              <?php foreach($cars as $car): ?>
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


    <?php include '../includes/footer.inc.php'; ?>

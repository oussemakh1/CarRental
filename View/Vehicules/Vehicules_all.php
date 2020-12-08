<?php

  include '../../Controllers/CarsController.php';
  //Search class
  include '../../lib/Search.php';

  //Paginatin
  require_once '../../paginations/Pagination.php';

  //Pagination modal
  $Pagination = new Pagination('cars');
  $cars = $Pagination->get_data();
  $pages  = $Pagination->get_pagination_numbers();
  $current_page = $Pagination->current_page();
  //Search modal
  $Search = new Search();

  //Controller
  $carController = new CarsController();



if(isset($_GET['search']))
{
  $key = $_GET['search'];
  //Cars search
  $carsSearch = $Search->VehiculeSearch($key);
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
        <!-- ============================================================== -->
        <!-- data table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <!-- ERROR - SUCCESS MESSAGES -->
            <?php
            if(isset($_GET['insert_success'])) {
                insert_success_message();
            }

            if(isset($_GET['insert_error'])) {
                insert_error_message();
            }

            if(isset($_GET['update_success'])) {
                update_success_message();
            }

            if(isset($_GET['update_error'])) {
                update_error_message();
            }

            if(isset($_GET['delete_success'])) {
                delete_success_message();
            }

            if(isset($_GET['delete_error'])) {
                delete_error_message();
            }

            if(isset($_GET['error_noVehicule'])) {
                error_message($_GET['error_noVehicule']);
            }


            ?>
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">

                          <div class="row mb-2">
                    

                              <div class="col-sm-12 col-md-6">
                            <form action="<?php $_SERVER['PHP_SELF'];?>" method="GET">
                                <div id="example_filter" class="dataTables_filter">
                                <input type="search" name="search" class="form-control form-control-sm" placeholder="chercher quelque chose..." aria-controls="example">
                                </div>
                              </form>
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

                              <!-- IF SEARCH -->
                            <?php if(isset($_GET['search'])){?>
                              <?php foreach($carsSearch as $car): ?>
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
                            <?php }else{ ?>


                              <!-- END IF SEARCH -->


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

                            <?php } ?>
                            </tbody>


                        </table>

                        <!-- pagination -->
                        <div class="row mt-3">

                          <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                            <ul class="pagination">
                              <?php if($current_page>1): ?>

                              <li class="paginate_button page-item previous " id="example_previous">
                                <a href="?page=<?php echo $current_page-1; ?>" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                             </li>

                            <?php endif;?>

                              <?php for($i=1;$i<=$pages;$i++):?>

                              <li class="paginate_button page-item ">
                                <a href="?page=<?php echo $i; ?>" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a>
                              </li>

                            <?php endfor; ?>

                            <?php if($current_page < $pages): ?>

                            <li class="paginate_button page-item next" id="example_next">
                              <a href="?page=<?php echo $current_page+1; ?>" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
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


    <?php include '../includes/footer.inc.php'; ?>

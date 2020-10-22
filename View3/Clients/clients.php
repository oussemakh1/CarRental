<?php

//Include Clients Controller
include '../../Controllers/ClientController.php';
//Search class
include '../../lib/Search.php';

//Search modal
$Search = new Search();

if(isset($_GET['search']))
{
  $key = $_GET['search'];
  $clientsSearch = $Search->ClientSearch($key);
}
//Inherit Client Controller
$clientController = new ClientController();
//Paginatin
require_once '../../lib/Pagination.php';
//Pagination modal
$Pagination = new Pagination('clients');
$clients = $Pagination->get_data();
$pages  = $Pagination->get_pagination_numbers();
$current_page = $Pagination->current_page();
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
                                <form action="<?php $_SERVER['PHP_SELF'];?>" method="GET">
                                    <div id="example_filter" class="dataTables_filter">
                                    <input type="search" name="search" class="form-control form-control-sm" placeholder="search for somthing.." aria-controls="example">
                                    </div>
                                  </form>
                              </div>


                            </div>


                            <thead>
                                <tr>
                                  <th>Nom</th>
                                  <th>Prenom</th>
                                  <th>Telephone</th>
                                  <th>CIN</th>
                                </tr>
                            </thead>
                            <tbody>

                          <!-- Search start -->
                          <?php if(isset($_GET['search'])){?>

                              <?php foreach($clientsSearch as $client): ?>
                                <tr>

                                  <td><?php echo $client['nom']; ?></td>
                                  <td><?php echo $client['prenom']; ?></td>
                                  <td><?php echo $client['telephone']; ?></td>
                                  <td>
                                    <a href="client_info.php?cin=<?php echo $client['cin'];?>">
                                      <?php echo $client['cin']; ?>
                                    </a>
                                  </td>


                                </tr>
                              <?php endforeach; ?>
                            <?php }else{ ?>
                              <?php foreach($clients as $client): ?>
                                <tr>

                                  <td><?php echo $client['nom']; ?></td>
                                  <td><?php echo $client['prenom']; ?></td>
                                  <td><?php echo $client['telephone']; ?></td>
                                  <td>
                                    <a href="client_info.php?cin=<?php echo $client['cin'];?>">
                                      <?php echo $client['cin']; ?>
                                    </a>
                                  </td>


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

    <!-- footer -->
    <?php include '../includes/footer.inc.php'; ?>

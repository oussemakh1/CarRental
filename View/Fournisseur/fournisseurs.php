<?php

//Include Fournisseur Controller
include '../../Controllers/FournisseurController.php';

//Search class
include '../../lib/Search.php';



//Search modal
$Search = new Search();

if(isset($_GET['search']))
{
  $key = $_GET['search'];
  $FournisseurSearch = $Search->FournisseurSearch($key);
}
//Inherit Fournisseur Controller
$FournisseurController = new FournisseurController();




//Paginatin
require_once '../../paginations/Pagination.php';
//Pagination modal
$Pagination = new Pagination('fournisseur');
$Fournisseur = $Pagination->get_data();
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

                    if(isset($_GET['error_message'])) {
                        error_message($_GET['error_message']);
                    }

                    ?>

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
                                  <th>Soc/Civ</th>
                                  <th>Nom</th>
                                  <th>Prenom</th>
                                  <th>Telephone</th>
                                  <th>Service</th>
                                </tr>
                            </thead>
                            <tbody>

                          <!-- SEARCH -->
                            <?php if(isset($_GET['search'])){?>
                              <?php foreach($FournisseurSearch as $fournisseur): ?>
                                <tr>


                                  <?php if(!empty($fournisseur['societe'])){ ?>
                                    <td>
                                          <a href="fournisseur_info.php?id=<?php echo $fournisseur['id'];?>">
                                                 <?php echo $fournisseur['societe']; ?>
                                            </a>
                                    </td>
                                  <?php }else{ ?>
                                    <td>
                                         <a href="fournisseur_info.php?id=<?php echo $fournisseur['id'];?>">
                                                 <?php echo $fournisseur['civilite']; ?>
                                            </a>
                                    </td>
                                <?php   } ?>

                                  <td><?php echo $fournisseur['nom_contact']; ?></td>
                                  <td><?php echo $fournisseur['prenom_contact']; ?></td>
                                  <td>
                                      <?php echo $fournisseur['telephone']; ?>
                                  </td>
                                  <td><?php echo $fournisseur['service'];?>





                                </tr>
                              <?php endforeach; ?>
                          <?php } else{ ?>
                            <?php foreach($Fournisseur as $fournisseur): ?>
                              <tr>
                                  
                                  <?php if(!empty($fournisseur['societe'])){ ?>
                                      <td>
                                          <a href="fournisseur_info.php?id=<?php echo $fournisseur['id'];?>">
                                              <?php echo $fournisseur['societe']; ?>
                                          </a>
                                      </td>
                                  <?php }else{ ?>
                                      <td>
                                          <a href="fournisseur_info.php?id=<?php echo $fournisseur['id'];?>">
                                              <?php echo $fournisseur['civilite']; ?>
                                          </a>
                                      </td>
                                  <?php   } ?>


                                  <td><?php echo $fournisseur['nom_contact']; ?></td>

                                <td><?php echo $fournisseur['prenom_contact']; ?></td>
                                <td>
                                    <?php echo $fournisseur['telephone']; ?>
                                </td>
                                <td><?php echo $fournisseur['service'];?>





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

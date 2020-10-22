<?php

  //Inherit & include facture controller
  include '../../Controllers/FactureController.php';




  if(isset($_GET['location_id']))
  {
    $location_id = $_GET['location_id'];
    
     $data = $factureController->getFacture($location_id);

  }else{

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
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header p-4">
                 <a class="pt-2 d-inline-block" href="index.html">Concept</a>
                <div class="float-right"> <h3 class="mb-0">Facture</h3>
                Date: <?php echo $data['date_fact']; ?></div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">De:</h5>
                        <h3 class="text-dark mb-1">Gerald A. Garcia</h3>
                        <div>2546 Penn Street</div>
                        <div>Sikeston, MO 63801</div>
                        <div>Email: info@gerald.com.pl</div>
                        <div>Phone: +573-282-9117</div>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="mb-3">A:</h5>
                        <h3 class="text-dark mb-1"><?php echo $data['nom_client'] . ' ' . $data['prenom_client']; ?></h3>
                        <div><?php echo $data['nom_adress_fact']; ?></div>
                        <div>Code postal: <?php echo $data['code_postal_client']; ?></div>
                        <div>Telephone:<?php echo $data['telephone_client']; ?></div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Vehicule</th>
                                <th>N°jours</th>
                                <th class="right">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="left strong"><?php echo $data['marque_vehicule']; ?></td>
                                <td class="left"><?php echo $data['nb_jour']; ?></td>
                                <td class="right"><?php echo $data['date_depart']; ?></td>
                                <td class="center"><?php echo $data['date_retour']; ?></td>
                                <td class="right"><?php echo $data['prix']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Subtotal</strong>
                                    </td>
                                    <td class="right"><?php echo $data['prix']; ?></td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Remise (<?php echo $data['remisePercentage']; ?>%)</strong>
                                    </td>
                                    <td class="right"><?php
                                                    echo    $data['remise'];
                                                    ; ?></td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">TVA (<?php echo $data['tvaPercentage']; ?>%)</strong>
                                    </td>
                                    <td class="right"><?php

                                       echo  $data['tva'];

                                     ?></td>

                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong class="text-dark"><?php

                                            echo $data['total'];


                                         ?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p>
            </div>
        </div>
    </div>
</div>



<?php include '../includes/footer.inc.php'; ?>

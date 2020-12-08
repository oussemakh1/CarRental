<?php

if(isset($_GET['location_id'])){

  $id = $_GET['location_id'];

  //Location Controller
  include '../../Controllers/LocationController.php';






   //Inherit location controller
   $locationController = new LocationController();



   //Location data
   $location_data  = $locationController->getLocationById($id);

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
      <button class="btn btn-outline-light buttons-excel buttons-html5" id="export_excel"tabindex="0" aria-controls="example" type="button">
        <span>Excel</span>
      </button>
      <button class="btn btn-outline-light buttons-pdf buttons-html5" id="btn_pdf" tabindex="0" aria-controls="example" type="button">
        <span>PDF</span>
      </button>
      <input class="btn btn-outline-light buttons-print" onclick="printDiv('facture');" tabindex="0" aria-controls="example"type="button" Value="print">

        <div class="card mt-2" id="facture">
            <div class="card-header p-4">
                 <a class="pt-2 d-inline-block">Detail Location</a>


            </div>
            <div class="card-body">

            <!-- Personel info -->
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Adress</th>
                                <th>Email</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $location_data['nom']; ?></td>
                                <td><?php echo $location_data['prenom']; ?></td>
                                <td><?php echo $location_data['adress']; ?></td>
                                <td><?php echo $location_data['email']; ?></td>


                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>Date naissance</th>
                                <th>Telephone</th>
                                <th>CIN</th>




                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td><?php echo $location_data['date_naissance']; ?></td>
                                <td><?php echo $location_data['telephone']; ?></td>
                                <td><?php echo $location_data['cin']; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>


                                <th>Pays</th>
                                <th>Ville</th>
                                <th>Code postal</th>

                                <th>N°permis</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>


                                <td><?php echo $location_data['pays']; ?></td>
                                <td><?php echo $location_data['ville']; ?></td>
                                <td><?php echo $location_data['code_postal']; ?></td>
                                <td><?php echo $location_data['n_permis']; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- End personal info -->

            <!-- Business info -->
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                              <th>Lieu delivrance</th>
                              <th>Date delivrance</th>
                                <th>N°jours</th>







                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $location_data['lieu_delivrance']; ?></td>
                                <td><?php echo $location_data['date_delivrance']; ?></td>
                                <td><?php echo $location_data['nb_jour']; ?></td>




                            </tr>

                        </tbody>
                    </table>
                </div>



                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                              <th>Date depart</th>
                              <th>Heure depart</th>
                              <th>Date retour</th>
                              <th>Heure retour</th>
                              <th>Caution</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $location_data['date_depart']; ?></td>
                                <td><?php echo $location_data['heure_depart']; ?></td>
                                <td><?php echo $location_data['date_retour']; ?></td>
                                <td><?php echo $location_data['heure_retour']; ?></td>
                                <td><?php echo $location_data['caution']; ?></td>


                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                              <th>Prix</th>
                              <th>Remise</th>
                              <th>Tva</th>
                              <th>Total</th>




                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $location_data['prix_ht']; ?></td>
                                <td><?php echo $location_data['remise']; ?></td>
                                <td><?php echo $location_data['tva']; ?></td>
                                <td><?php echo $location_data['prix_ttc']; ?></td>



                            </tr>

                        </tbody>
                    </table>
                </div>
              <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                              <th>Marque vehicule</th>
                              <th>Etat vehicule</th>
                              <th>N°serie</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $location_data['marque_vehicule']; ?></td>
                                <td><?php echo $location_data['etat_vehicule']; ?></td>
                                <td><?php echo $location_data['n_serie']; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>

            <!-- End Business info -->

            </div>
            <div class="card-footer bg-white">

            </div>
        </div>
    </div>
</div>
  <div class="text-center">
      <a  href="location_edit.php?location_id=<?php echo $id;?>" class="mb-0 btn btn-outline-success">Modifier</a>
      <a  href="../Facture/facture_info.php?location_id=<?php echo $id;?>" class="mb-0 btn btn-outline-success">Voir facture</a>

  </div>




<?php include '../includes/footer.inc.php'; ?>

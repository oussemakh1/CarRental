<?php

if(isset($_GET['reservation_id'])){

  $id = $_GET['reservation_id'];

  //reservation Controller
  include '../../Controllers/ReservationController.php';

  //Devis Controller
  include '../../Controllers/DevisController.php';





   //Inherit reservation controller
   $reservationController = new ReservationController();

   //Inherit devis controller
   $devisController = new DevisController();

   //Reservation data
   $data  = $reservationController->getReservationById($id);
   //Devis data
   $devis_data = $devisController->edit_devis($id);

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
                 <a class="pt-2 d-inline-block">Detail reservation</a>


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
                                <td><?php echo $data['nom']; ?></td>
                                <td><?php echo $data['prenom']; ?></td>
                                <td><?php echo $data['adress']; ?></td>
                                <td><?php echo $data['email']; ?></td>


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

                                <td><?php echo $data['date_naissance']; ?></td>
                                <td><?php echo $data['telephone']; ?></td>
                                <td><?php echo $data['cin']; ?></td>

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


                                <td><?php echo $data['pays']; ?></td>
                                <td><?php echo $data['ville']; ?></td>
                                <td><?php echo $data['code_postal']; ?></td>
                                <td><?php echo $data['n_permis']; ?></td>

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
                                <td><?php echo $data['lieu_delivrance']; ?></td>
                                <td><?php echo $data['date_delivrance']; ?></td>
                                <td><?php echo $data['nb_jour']; ?></td>




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
                              <th>Heure retour</th



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data['date_depart']; ?></td>
                                <td><?php echo $data['heure_depart']; ?></td>
                                <td><?php echo $data['date_retour']; ?></td>
                                <td><?php echo $data['heure_retour']; ?></td>

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
                              <th>Date validité</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data['date_depart']; ?></td>
                                <td><?php echo $data['heure_depart']; ?></td>
                                <td><?php echo $data['date_retour']; ?></td>
                                <td><?php echo $data['heure_retour']; ?></td>
                                <td><?php echo $devis_data['date_validite']; ?></td>


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
                              <th>Total</th>




                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $devis_data['prix']; ?></td>
                                <td><?php echo $devis_data['remise']; ?></td>
                                <td><?php echo $devis_data['total']; ?></td>



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
                                <td><?php echo $data['marque_vehicule']; ?></td>
                                <td><?php echo $data['etat_vehicule']; ?></td>
                                <td><?php echo $data['n_serie']; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>

            <!-- End Business info -->

            </div>
            <div class="card-footer bg-white">
                <a  href="reservation_edit.php?reservation_id=<?php echo $id;?>" class="mb-0 btn btn-outline-success">Modifier</a>
            </div>
        </div>
    </div>
</div>



<?php include '../includes/footer.inc.php'; ?>

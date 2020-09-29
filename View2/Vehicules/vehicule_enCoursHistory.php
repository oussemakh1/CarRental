<?php


  //include controller
  include '../../Controllers/CarsController.php';
  include '../../Controllers/LocationController.php';

  //Cars Controller
  $carsController = new CarsController();

  //Location Controller
  $locationsController = new LocationController();


  //Get list locations by n_serie
if(isset($_GET['n_serie'])){

  $n_serie = $_GET['n_serie'];
  //Car  reservation history
  $carLocations = $carsController->location_carHistory($n_serie);

}
//Get location data by id
if(isset($_GET['location_id'])){

    $id = $_GET['location_id'];
    $location_data = $locationsController->getLocationById($id);
}




?>
<!-- header -->
<?php include '../includes/header.inc.php'; ?>
  <!-- Sidebar -->
  <?php include '../includes/sideBar.inc.php'; ?>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <?php include '../includes/topBar.inc.php';?>
      <!-- End of Topbar -->

      <!-- content -->
      <div class="container-fluid">




        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary  float-right shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>

            <div class="row">
            <h6 class="mt-2 font-weight-bold text-primary">Véhicule en cours</h6>
            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Nombre de jour</th>
                    <th>Prix ttc</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($carLocations  as $car): ?>
                  <tr>
                    <td><?php echo $car['nom']; ?></td>
                    <td><?php echo $car['prenom']; ?></td>
                    <td><?php echo $car['nb_jour']; ?></td>
                    <td><?php echo $car['prix_ttc']; ?></td>
                    <td><a  href="vehicule_enCoursHistory.php?n_serie=<?php echo $car['n_serie']; ?>&location_id=<?php echo $car['id']; ?>#location_id=<?php echo $car['id']; ?>"><i class="fas fa-edit" data-toggle="modal" data-target="#editModal"></i></a>&nbsp;
                      <a href="vehicule_enCoursHistory.php?n_serie=<?php echo $car['n_serie']; ?>"<i class="fas fa-tasks"></i></a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Edit modals -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                  <div class="row">




                    <div class="col">
                      <label>Nom</label>
                      <input type="text" name="marque" value="<?php echo $location_data['nom']; ?>" class="form-control" placeholder="">
                    </div>
                    <div class="col">
                      <label>Prenom</label>
                      <input type="text" name="model" class="form-control" value="<?php echo $location_data['prenom']; ?>" placeholder="">
                    </div>
                    <div class="col">
                      <label>Date naissance</label>
                      <input type="date" name="color" class="form-control" value="<?php echo $location_data['date_naissance']; ?>" placeholder="">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col">
                      <label>Adress</label>
                      <input type="text" name="color" class="form-control" value="<?php echo $location_data['adress']; ?>" placeholder="">
                    </div>
                    <div class="col">
                      <label>Code postal</label>
                      <input type="number" name="color" class="form-control" value="<?php echo $location_data['code_postal']; ?>" placeholder="">

                    </div>
                  </div>

                  <div class="row mt-4">

                    <div class="col">
                      <label>Ville</label>
                      <input type="text" name="color" class="form-control" value="<?php echo $location_data['ville']; ?>" placeholder="">

                    </div>

                    <div class="col">
                      <label>Pays</label>
                      <input type="text" name="n_serie" value="<?php echo $location_data['pays']; ?>" class="form-control" placeholder="">
                    </div>

                    <div class="col">
                      <label>Telephone</label>
                      <input type="text" name="n_assurance" class="form-control" type="text" value="<?php echo $location_data['telephone']; ?>" placeholder="">
                    </div>

                  </div>

                  <div class="row mt-4">

                    <div class="col">
                      <label>Email</label>
                      <input type="emal" name="carte_grise" class="form-control" type="text" value="<?php echo $location_data['email']; ?>" placeholder="">
                    </div>

                    <div class="col">
                      <label>N° Permis</label>
                      <input type="number" name="date_achat" type="text" value="<?php echo $location_data['n_permis']; ?>" class="form-control">
                    </div>

                    <div class="col">
                      <label>CIN</label>
                      <input type="number" name="prix_achat_ht" class="form-control" type="text" value="<?php echo $location_data['cin']; ?>" placeholder="">
                    </div>
                  <!-- Location data  -->


                      <div class="col">
                              <label>Type client</label>
                              <input type="text" name="tva" class="form-control" type="text" value="<?php echo $location_data['type_client']; ?>" placeholder="">
                        </div>
                  </div>

                  <div class="row mt-5">
                    <div class="col">
                      <label>Marque vehicule</label>
                      <input type="text" name="prix_achat_ttc" class="form-control" type="text" value="<?php echo $location_data['marque_vehicule']; ?>" placeholder="">
                    </div>


                    <div class="col">
                      <label>N°serie</label>
                      <input type="text" name="nombre_traites" class="form-control" type="number" value="<?php echo $location_data['n_serie']; ?>" placeholder="">
                    </div>

                    <div class="col">
                      <label>Etat vehicule</label>
                      <input type="text" name="num_facture_fournisseur" class="form-control" type="text" value="<?php echo $location_data['etat_vehicule']; ?>"placeholder="">
                    </div>





                    <div class="col">
                      <label>Assurance</label>
                      <input type="text" name="montant_traits_mensuel" class="form-control" type="text" value="<?php echo $location_data['assurance']; ?>" placeholder="">
                    </div>


                  </div>

                  <div class="row mt-4">

                    <div class="col">
                      <label>Date delivrance</label>
                      <input type="date" name="duree_vie" type="text" value="<?php echo $location_data['date_delivrance']; ?>"class="form-control" placeholder="">
                    </div>

                    <div class="col">
                      <label>Lieu delivrance</label>
                      <input type="text" name="nb_km" class="form-control" type="text" value="<?php echo $location_data['lieu_delivrance']; ?>" placeholder="">
                    </div>

                    <div class="col">
                      <label>Lieu retour</label>
                      <input type="text" name="nombre_traites" class="form-control" type="number" value="<?php echo $location_data['lieu_retour']; ?>" placeholder="">
                    </div>

                    <div class="col">
                      <label>Nombre de jours</label>
                      <input type="number" name="montant_traits_mensuel" class="form-control" type="text" value="<?php echo $location_data['nb_jour']; ?>" placeholder="">
                    </div>




                  </div>

                  <div class="row mt-4">

                    <div class="col">
                      <label>reglé un acompte</label>
                      <input type="text" name="montant_traits_mensuel" class="form-control" type="text" value="<?php echo $location_data['deja_regle_acompte']; ?>" placeholder="">
                    </div>


                   <div class="col">
                        <label>Date acompte</label>
                        <input type="date" name="nombre_traites" class="form-control" type="number" value="<?php echo $location_data['date_acompte']; ?>" placeholder="">
                  </div>

                    <div class="col">
                      <label>Caution</label>
                      <input type="number" name="nombre_traites" class="form-control" type="number" value="<?php echo $location_data['caution']; ?>" placeholder="">
                    </div>

                    <div class="col">
                      <label>Payé le</label>
                      <input type="date" name="num_facture_fournisseur" class="form-control" type="text" value="<?php echo $location_data['paye_le']; ?>"placeholder="">
                    </div>

                    <div class="col">
                      <label>Mode paiement</label>
                      <input type="text" name="num_facture_fournisseur" class="form-control"  value="<?php echo $location_data['mode_paiement']; ?>">
                    </div>

                  </div>


                  <div class="row mt-4">


                    <div class="col">
                        <label>Date depart</label>
                            <input type="date" name="nombre_traites" class="form-control" type="number" value="<?php echo $location_data['date_depart']; ?>" placeholder="">
                    </div>
                    <div class="col">
                          <label>Heure depart</label>
                          <input type="text" name="nombre_traites" class="form-control" type="number" value="<?php echo $location_data['heure_depart']; ?>" placeholder="">
                    </div>

                    <div class="col">
                      <label>Date retour</label>
                      <input type="date" name="num_facture_fournisseur" class="form-control"  value="<?php echo $location_data['date_retour']; ?>">
                    </div>

                    <div class="col">
                      <label>Heure retour</label>
                      <input type="text" name="nombre_traites" class="form-control" type="number" value="<?php echo $location_data['heure_retour']; ?>" placeholder="">
                    </div>

                  </div>


                  <div class="row mt-4">



                    <div class="col">
                      <label>Prix hors TVA</label>
                      <input type="number" name="montant_traits_mensuel" class="form-control" type="text" value="<?php echo $location_data['prix_ht']; ?>" placeholder="">
                    </div>

                    <div class="col">
                      <label>TVA</label>
                      <input type="number" name="nombre_traites" class="form-control" type="number" value="<?php echo $location_data['tva']; ?>" placeholder="">
                    </div>

                    <div class="col">
                      <label>Prix TTC</label>
                      <input type="date" name="nombre_traites" class="form-control" type="number" value="<?php echo $location_data['prix_ttc']; ?>" placeholder="">
                    </div>


                  </div>



                  <div class="row mt-4">

                    <div class="col">
                      <label>Detail reparation</label>
                          <textarea name="detail_reparation" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                  </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Suprimer</button>
                <input type="submit"  name="update_car" class="btn btn-success" value="Modifier">
              </div>
            </div>
          </div>
        </div>
        </form>

        <!-- Delete modal -->
              <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">êtes-vous sûr de vouloir supprimer cette voiture!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                           <input type="submit" class="btn btn-success" name="delete_car" value="Oui">
                     </from>
                    </div>
                  </div>
                </div>
              </div>


        <!-- footer -->
        <?php include '../includes/footer.inc.php';?>

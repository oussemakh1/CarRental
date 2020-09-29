<?php


  //include controller
  include '../../Controllers/CarsController.php';

//Cars Controller
$carsController = new CarsController();
if(isset($_GET['id'])){

    $id = $_GET['id'];
    //Get car by id
    $car_data = $carsController->getCarById($id);

}







?>




      <!-- header -->
      <?php include '../includes/header.inc.php'; ?>

      <!-- Main Navbar -->
      <?php include '../includes/navbar.inc.php'; ?>

      <!-- edit car -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-small mb-4 pt-3">

            <ul class="list-group list-group-flush">

              <li class="list-group-item p-4">
                <div class="row">
                  <div class="col">
                    <div class="card card-small mb-4">

                      <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">Fournisseur</th>
                              <th scope="col" class="border-0">Marque</th>
                              <th scope="col" class="border-0">Model</th>
                              <th scope="col" class="border-0">Carburant</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $car_data['fournisseur']; ?></td>
                              <td><?php echo $car_data['marque']; ?></td>
                              <td><?php echo $car_data['model']; ?></td>
                              <td><?php echo $car_data['carburant']; ?></td>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

              <li class="list-group-item p-4">
                <div class="row">
                  <div class="col">
                    <div class="card card-small mb-4">

                      <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">Date achat</th>
                              <th scope="col" class="border-0">Durée de vie</th>
                              <th scope="col" class="border-0">Type vehicule</th>
                              <th scope="col" class="border-0">N°KM avant revision</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $car_data['date_achat']; ?></td>
                              <td><?php echo $car_data['duree_vie']; ?> ans</td>
                              <td><?php echo $car_data['type_vehicule']; ?></td>
                              <td><?php echo $car_data['nb_km_avant_revision']; ?></td>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

              <li class="list-group-item p-4">
                <div class="row">
                  <div class="col">
                    <div class="card card-small mb-4">

                      <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">Prix d'achat</th>
                              <th scope="col" class="border-0">TVA</th>
                              <th scope="col" class="border-0">Prix d'achat TTC</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $car_data['prix_achat_ht']; ?></td>
                              <td><?php echo $car_data['tva']; ?>%</td>
                              <td><?php echo $car_data['prix_achat_ttc']; ?></td>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

              <li class="list-group-item p-4">
                <div class="row">
                  <div class="col">
                    <div class="card card-small mb-4">

                      <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">N°Assurance</th>
                              <th scope="col" class="border-0">N°Serie</th>
                              <th scope="col" class="border-0">Carte grise</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $car_data['n_assurance']; ?></td>
                              <td><?php echo $car_data['n_serie']; ?></td>
                              <td><?php echo $car_data['carte_grise']; ?></td>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

              <li class="list-group-item p-4">
                <div class="row">
                  <div class="col">
                    <div class="card card-small mb-4">

                      <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">N°Facture fournisseur</th>
                              <th scope="col" class="border-0">Montant traites mensuel</th>
                              <th scope="col" class="border-0">N°Traires</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $car_data['num_facture_fournisseur']; ?></td>
                              <td><?php echo $car_data['montant_traites_mensuel']; ?></td>
                              <td><?php echo $car_data['nombre_traites']; ?></td>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

              <li class="list-group-item p-4">
                <div class="row">
                  <div class="col">
                    <div class="card card-small mb-4">

                      <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">Detail reparation</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $car_data['detail_reparation']; ?></td>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <div class="text-center mt-3 mb-3">
              <a type="button" href="vehicule_reparationHistory.php?n_serie=<?php echo $car_data['n_serie']; ?>" class="mb-2 btn btn-sm btn-outline-primary mr-1">Historique réparation</a>
              <a type="button"  href="vehicule_reservationHistory.php?n_serie=<?php echo $car_data['n_serie']; ?>" class="mb-2 btn btn-sm btn-outline-success mr-1">Historique réservation</a>
              <a type="button" href="vehicule_locationHistory.php?n_serie=<?php echo $car_data['n_serie']; ?>" class="mb-2 btn btn-sm btn-outline-warning mr-1">historique location</a>
              <a type="button" href="vehicule_travauxHistory.php?n_serie=<?php echo $car_data['n_serie']; ?>" class="mb-2 btn btn-sm btn-outline-danger mr-1">historique travaux</a>

            </div>
          </div>
        </div>

      </div>
    </div>

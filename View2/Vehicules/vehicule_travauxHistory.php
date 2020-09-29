<?php


  //include controller
  include '../../Controllers/CarsController.php';

  //Cars Controller
  $carsController = new CarsController();

if(isset($_GET['n_serie'])){

  $n_serie = $_GET['n_serie'];
  //Car Travaux history
  $carTravaux = $carsController->car_travaux($n_serie);

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
                              <th scope="col" class="border-0">Date travaux</th>
                              <th scope="col" class="border-0">N°Heure</th>
                              <th scope="col" class="border-0">Montant</th>
                              <th scope="col" class="border-0">Mode reglement</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($carTravaux as $car_data): ?>
                            <tr>
                              <td><?php echo $car_data['date_travaux']; ?></td>
                              <td><?php echo $car_data['nb_heure']; ?></td>
                              <td><?php echo $car_data['montant']; ?>TND</td>
                              <td><?php echo $car_data['mode_reglement']; ?></td>

                            </tr>
                          <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

            </ul>
            <div class="text-center mt-3 mb-3">
              <button type="button" class="mb-2 btn btn-sm btn-outline-success mr-1">Historique réservation</button>
              <button type="button" class="mb-2 btn btn-sm btn-outline-warning mr-1">historique location</button>

            </div>
          </div>
        </div>

      </div>
    </div>

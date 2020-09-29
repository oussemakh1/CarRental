<?php


  //include controller
  include '../../Controllers/CarsController.php';

  //Cars Controller
  $carsController = new CarsController();

  //Cars List
  $carsList = $carsController->cars_dispoList();

  //List Of cars in reservation
  $carsInReservation = $carsController->reserved_cars();

  //List Of cars taken
  $carsAlreadyTaken = $carsController->location_cars();

  //List of cars in reparation
  $carsInReparation = $carsController->cars_reparation();


?>




      <!-- header -->
      <?php include '../includes/header.inc.php'; ?>

</script>
      <!-- Main Navbar -->
      <?php include '../includes/navbar.inc.php'; ?>
      <!-- List of cars -->
      <div class="row">
        <div class="col">
          <div class="card card-small mb-4">
            <div class="card-header border-bottom">
            <i class="fas fa-car fa-1x"> <span class="m-0"> Véhicules disponible</span></i>
            </div>
            <div class="card-body p-0 pb-3 text-center">
              <table class="table mb-0">
                <thead class="bg-light">
                  <tr>
                    <th scope="col" class="border-0">marque</th>
                    <th scope="col" class="border-0">model</th>
                    <th scope="col" class="border-0">carburant</th>
                    <th scope="col" class="border-0">color</th>
                    <th scope="col" class="border-0">N° serie</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($carsList as $car): ?>
                  <tr>
                    <td><a href="vehicule_edit.php?id=<?php echo $car['id']; ?>"><?php echo $car['marque']; ?></a></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['carburant']; ?></td>
                    <td><?php echo $car['color']; ?></td>
                    <td><?php echo $car['n_serie']; ?></td>
                    <td><i class="fas fa-edit"></i>&nbsp; <i class="fas fa-tasks"></i></td>

                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- List of cars in reservation -->
      <div class="row">
        <div class="col">
          <div class="card card-small mb-4">
            <div class="card-header border-bottom">
            <i class="far fa-address-book fa-1x"> <span class="m-0" style="font-weight:900;">Véhicules réservés</span> </i>
            </div>
            <div class="card-body p-0 pb-3 text-center">
              <table class="table mb-0">
                <thead class="bg-light">
                  <tr>
                    <th scope="col" class="border-0">marque</th>
                    <th scope="col" class="border-0">model</th>
                    <th scope="col" class="border-0">carburant</th>
                    <th scope="col" class="border-0">color</th>
                    <th scope="col" class="border-0">N° serie</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($carsInReservation as $car): ?>
                  <tr>
                    <td><?php echo $car['marque']; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['carburant']; ?></td>
                    <td><?php echo $car['color']; ?></td>
                    <td><?php echo $car['n_serie']; ?></td>
                    <td><i class="fas fa-edit"></i>&nbsp; <i class="fas fa-tasks"></i></td>

                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- List of cars taken -->
      <div class="row">
        <div class="col">
          <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <i class="fas fa-tachometer-alt"> <span class="m-0" style="font-weight:900;"> Vehicules en cours</span> </i>
            </div>
            <div class="card-body p-0 pb-3 text-center">
              <table class="table mb-0">
                <thead class="bg-light">
                  <tr>
                    <th scope="col" class="border-0">marque</th>
                    <th scope="col" class="border-0">model</th>
                    <th scope="col" class="border-0">carburant</th>
                    <th scope="col" class="border-0">color</th>
                    <th scope="col" class="border-0">N° serie</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($carsAlreadyTaken as $car): ?>
                  <tr>
                    <td><?php echo $car['marque']; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['carburant']; ?></td>
                    <td><?php echo $car['color']; ?></td>
                    <td><?php echo $car['n_serie']; ?></td>
                    <td><i class="fas fa-edit"></i>&nbsp; <i class="fas fa-tasks"></i></td>

                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- List of cars in reparation -->
      <div class="row">
        <div class="col">
          <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <i class="fas fa-wrench">  <span class="m-0" style="font-weight:900;"> Vehicules en réparation</span> </i>
            </div>
            <div class="card-body p-0 pb-3 text-center">
              <table class="table mb-0">
                <thead class="bg-light">
                  <tr>
                    <th scope="col" class="border-0">marque</th>
                    <th scope="col" class="border-0">model</th>
                    <th scope="col" class="border-0">carburant</th>
                    <th scope="col" class="border-0">color</th>
                    <th scope="col" class="border-0">N° serie</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($carsInReparation as $car): ?>
                  <tr>
                    <td><?php echo $car['marque']; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['carburant']; ?></td>
                    <td><?php echo $car['color']; ?></td>
                    <td><?php echo $car['n_serie']; ?></td>
                    <td><i class="fas fa-edit"></i>&nbsp; <i class="fas fa-tasks"></i></td>

                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

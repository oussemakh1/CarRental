<?php


  //include controller
  include '../../Controllers/CarsController.php';

  //Cars Controller
  $carsController = new CarsController();

  //List of cars in reparation
  $carsInReparation = $carsController->cars_reparation();


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

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary  float-right shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>

            <div class="row">
            <h6 class="mt-2 font-weight-bold text-primary">Véhicule en réparation</h6>
            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Marque</th>
                    <th>Model</th>
                    <th>Carburant</th>
                    <th>N°Serie</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($carsInReparation  as $car): ?>
                  <tr>
                    <td><?php echo $car['marque']; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['carburant']; ?></td>
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



      <!-- Footer -->
      <?php include '../includes/footer.inc.php'; ?>

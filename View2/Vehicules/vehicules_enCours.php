<?php


  //include controller
  include '../../Controllers/CarsController.php';

  //Cars Controller
  $carsController = new CarsController();

  //List Of cars taken
  $carsAlreadyTaken = $carsController->location_cars();

  //Fetch Car by id
  if(isset($_GET['id'])){

    $id = $_GET['id'];
    $car_data = $carsController->getCarById($id);

  }

  //Update car
  if(isset($_POST['update_car'])){

      $data = [
        "fournisseur" =>$_POST['fournisseur'],
        "marque"=>$_POST['marque'],
        "model"=>$_POST['model'],
        "carburant"=>  $_POST['carburant'],
        "date_achat"=>    $_POST['date_achat'],
        "duree_vie" => $_POST['duree_vie'],
        "nb_km_avant_revision" =>$_POST['nb_km'],
        "prix_achat_ht" =>   $_POST['prix_achat_ht'],
        "montant_traites_mensuel" =>   $_POST['montant_traits_mensuel'],
        "nombre_traites" =>     $_POST['nombre_traites'],
        "num_facture_fournisseur" =>   $_POST['num_facture_fournisseur'],
        "color" =>  $_POST['color'],
        "type_vehicule" => $_POST['type_vehicule'],
        "n_assurance" =>  $_POST['n_assurance'],
        "detail_reparation" => $_POST['detail_reparation'],
        "n_serie" => $_POST['n_serie'],
        "carte_grise" => $_POST['carte_grise'],
        "tva" => $_POST['tva'],
        "prix_achat_ttc" => $_POST['prix_achat_ttc']
      ];

    $id = $_GET['id'];
    $updateCar = $carsController->updateCar($id,$data);
    header("Location:vehicules_enCours.php");

  }

  //Delete Car
  if(isset($_POST['delete_car'])){

    $id = $_GET['id'];
    $delete_car = $carsController->deleteCar($id);

    header("Location:vehicules_enCours.php");
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

        <!-- Page Heading -->

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
                    <th>Marque</th>
                    <th>Model</th>
                    <th>Carburant</th>
                    <th>N°Serie</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Cars already taken data -->
                  <?php foreach($carsAlreadyTaken  as $car): ?>
                  <tr>
                    <td><?php echo $car['marque']; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['carburant']; ?></td>
                    <td><?php echo $car['n_serie']; ?></td>
                    <td><a href="?id=<?php echo $car['carId']; ?>#id=<?php echo $car['carId']; ?>"><i class="fas fa-edit" data-toggle="modal" data-target="#editModal"></i></a>&nbsp;
                      <a href="vehicule_enCoursHistory.php?n_serie=<?php echo $car['n_serie']; ?>"<i class="fas fa-tasks"></i></a></td>
                  </tr>
                <?php endforeach; ?>
                <!-- Cars Alreay taken data end -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

      <!-- Edit modals -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo $car_data['marque'].'-'.$car_data['model']; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="row">
                  <div class="col">
                    <label>Marque</label>
                    <input type="text" name="marque" value="<?php echo $car_data['marque']; ?>" class="form-control" placeholder="marque">
                  </div>
                  <div class="col">
                    <label>Model</label>
                    <input type="text" name="model" class="form-control" value="<?php echo $car_data['model']; ?>" placeholder="model">
                  </div>
                  <div class="col">
                    <label>Color</label>
                    <input type="text" name="color" class="form-control" value="<?php echo $car_data['color']; ?>" placeholder="color">
                  </div>
                </div>

                <div class="row mt-2">
                  <div class="col">
                    <label>Carburant</label>
                    <select name="carburant" class="form-control">
                      <option selected><?php echo $car_data['carburant']; ?></option>
                      <option>...</option>
                    </select>
                  </div>
                  <div class="col">
                    <label>Fournisseur</label>
                    <select  name="fournisseur"class="form-control">
                      <option selected><?php echo $car_data['fournisseur']; ?></option>
                      <option>...</option>
                    </select>
                  </div>
                </div>

                <div class="row mt-4">

                  <div class="col">
                    <label>Type vehicule</label>
                    <select name="type_vehicule"class="form-control">
                      <option selected><?php echo $car_data['type_vehicule']; ?></option>
                      <option>...</option>
                    </select>
                  </div>

                  <div class="col">
                    <label>N°serie</label>
                    <input type="text" name="n_serie" value="<?php echo $car_data['n_serie']; ?>" class="form-control" placeholder="N°serie">
                  </div>

                  <div class="col">
                    <label>Assurance</label>
                    <input type="text" name="n_assurance" class="form-control" type="text" value="<?php echo $car_data['n_assurance']; ?>" placeholder="Assurance">
                  </div>

                </div>

                <div class="row mt-4">

                  <div class="col">
                    <label>Carte grise</label>
                    <input type="text" name="carte_grise" class="form-control" type="text" value="<?php echo $car_data['carte_grise']; ?>" placeholder="carte grise">
                  </div>

                  <div class="col">
                    <label>Date d'achat</label>
                    <input type="date" name="date_achat" type="text" value="<?php echo $car_data['date_achat']; ?>" class="form-control">
                  </div>

                  <div class="col">
                    <label>Durée de vie</label>
                    <input type="number" name="duree_vie" type="text" value="<?php echo $car_data['duree_vie']; ?>"class="form-control" placeholder="durée de vie">
                  </div>

                </div>

                <div class="row mt-5">

                  <div class="col">
                    <label>N°kilométrage</label>
                    <input type="number" name="nb_km" class="form-control" type="text" value="<?php echo $car_data['nb_km_avant_revision']; ?>" placeholder="nombre de kileomtere avant revesion">
                  </div>

                  <div class="col">
                    <label>Prix achat</label>
                    <input type="number" name="prix_achat_ht" class="form-control" type="text" value="<?php echo $car_data['prix_achat_ht']; ?>" placeholder="prix d'achat">
                  </div>

                  <div class="col">
                    <label>TVA</label>
                    <input type="number" name="tva" class="form-control" type="text" value="<?php echo $car_data['tva']; ?>" placeholder="0%">
                  </div>

                  <div class="col">
                    <label>Prix d'achat ttc</label>
                    <input type="number" name="prix_achat_ttc" class="form-control" type="text" value="<?php echo $car_data['prix_achat_ttc']; ?>" placeholder="Prix d'achat ttc">
                  </div>

                </div>

                <div class="row mt-4">

                  <div class="col">
                    <label>N°Facture fournisseur</label>
                    <input type="number" name="num_facture_fournisseur" class="form-control" type="text" value="<?php echo $car_data['num_facture_fournisseur']; ?>"placeholder="N°Facture fournisseur">
                  </div>

                  <div class="col">
                    <label>Montant traites mensuel</label>
                    <input type="number" name="montant_traits_mensuel" class="form-control" type="text" value="<?php echo $car_data['montant_traites_mensuel']; ?>" placeholder="Montant traites">
                  </div>

                  <div class="col">
                    <label>N°Traites</label>
                    <input type="number" name="nombre_traites" class="form-control" type="number" value="<?php echo $car_data['nombre_traites']; ?>" placeholder="N°Traites">
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
      <!-- Footer -->
      <?php include '../includes/footer.inc.php'; ?>

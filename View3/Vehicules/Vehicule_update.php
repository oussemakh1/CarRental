<?php

  include '../../Controllers/CarsController.php';


  if(isset($_GET['id'])){

    $carController = new CarsController();
    $id = $_GET['id'];

    //Fetch Car data
    $car_data = $carController->getCarById($id);

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
        "montant_traites_mensuel" =>   $_POST['montant_traites_mensuel'],
        "nombre_traites" =>     $_POST['nombre_traites'],
        "num_facture_fournisseur" =>   $_POST['num_facture_fournisseur'],
        "color" =>  $_POST['color'],
        "type_vehicule" => $_POST['type_vehicule'],
        "n_assurance" =>  $_POST['n_assurance'],
        "detail_reparation" => $_POST['detail_reparation'],
        "n_serie" => $_POST['n_serie'],
        "carte_grise" => $_POST['carte_grise'],
        "prix_achat_ttc" => $_POST['prix_achat_ttc'],
        "tva" => $_POST['tva']
      ];

      //Update Car data
      $car_update = $carController->updateCar($id,$data);

        header('Location:Vehicules.php');


    }

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

        <!-- basic form  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                          <!-- row 1 -->
                          <div class="row">

                            <div class="form-group col-md-3">
                                <label for="input-select">Fournisseur</label>
                                <select name ="fournisseur" class="form-control" id="input-select">
                                   <option value="<?php echo $car_data['fournisseur']; ?>"><?php echo $car_data['fournisseur']; ?></option>
                                    <option>Choose Example</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label >Marque</label>
                                <input name="marque" type="text" value="<?php echo $car_data['marque']; ?>" placeholder="marque vehicule ..." class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label  >Model</label>
                                <input name="model" type="text" class="form-control" value="<?php echo $car_data['model']; ?>" placeholder="model vehicule ...">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="input-select">Carburant</label>
                                <select  name="carburant" class="form-control" >
                                  <option value="<?php echo $car_data['carburant']; ?>"><?php echo $car_data['carburant']; ?></option>
                                    <option value="Essence">Essence</option>
                                                                      <option value="Diesel">Diesel</option>
                                                                      <option value="Hybride">Hybride</option>

                                </select>
                            </div>

                          </div>
                          <!-- row 2 -->
                          <div class="row mt-2">

                            <div class="form-group col-md-3">
                                <label  >Durée de vie</label>
                                <input name="duree_vie" value="<?php echo $car_data['duree_vie']; ?>" type="number" class="form-control" placeholder="durée de vie ...">
                            </div>
                            <div class="form-group col-md-3">
                                <label >Date achat</label>
                                <input name="date_achat" value="<?php echo $car_data['date_achat']; ?>" type="date" placeholder="marque vehicule ..." class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Traites mensuel
                                </label>
                                <input  name="montant_traites_mensuel" value="<?php echo $car_data['montant_traites_mensuel']; ?>" type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="Montant traites mensuel...">
                            </div>
                            <div class="form-group col-md-3">
                                <label >N°traites</label>
                                <input name="nombre_traites" value="<?php echo $car_data['nombre_traites']; ?>" type="number" placeholder="nombre des traites" class="form-control">
                            </div>

                          </div>


                          <!-- row  3-->
                          <div class="row mt-2">

                            <div class="form-group col-md-6">
                                <label  >Prix d'achat HT</label>
                                <input name="prix_achat_ht" value="<?php echo $car_data['prix_achat_ht']; ?>" type="number" class="form-control" placeholder="prix d'achat hors tva...">
                            </div>

                            <div class="form-group col-md-6">
                                <label >TVA</label>
                                <input name="tva" type="number" value="<?php echo $car_data['tva']; ?>" class="form-control" placeholder="%">
                            </div>

                            <div class="form-group">

                                <input name="prix_achat_ttc" value="<?php echo $car_data['prix_achat_ttc']; ?>" type="number" class="form-control" placeholder="prix d'achat ttc..." hidden>
                            </div>


                          </div>




                                                    <!-- row  4-->
                                                    <div class="row mt-3">

                                                      <div class="form-group col-md-3">
                                                          <label for="input-select">Type vehicule</label>
                                                          <select name="type_vehicule" class="form-control" id="input-select">
                                                            <option value="<?php echo $car_data['type_vehicule'];?>"><?php echo $car['type_vehicule'];?></option>
                                                              <option value="Véhicule classique">Véhicule classique </option>
                                                              <option value="Utilitaire type kangoo">Utilitaire type kangoo</option>
                                                              <option value="Utilitaire type traffic">Utilitaire type traffic</option>

                                                          </select>
                                                      </div>

                                                      <div class="form-group col-md-3">
                                                          <label for="hue-demo">Color</label>
                                                          <input name="color" value="<?php echo $car_data['color']; ?>" type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                                      </div>

                                                      <div class="form-group col-md-4">
                                                          <label>N°km
                                                          </label>
                                                          <input name="nb_km_avant_revision" value="<?php echo $car_data['nb_km_avant_revision']; ?>" type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="N°km avant revision..." >
                                                      </div>


                                                    </div>

                                                    <!-- row  5-->
                                                    <div class="row mt-3">

                                                      <div class="form-group col-md-3">
                                                          <label >Carte grise </label>
                                                          <input name="carte_grise" value="<?php echo $car_data['carte_grise']; ?>" type="text" class="form-control" placeholder="carte grise...">
                                                      </div>

                                                      <div class="form-group col-md-3">
                                                          <label  >N°assurance</label>
                                                          <input name="n_assurance" value="<?php echo $car_data['n_assurance']; ?>" type="text" class="form-control" placeholder="N°assurance ...">
                                                      </div>

                                                      <div class="form-group col-md-3">
                                                          <label>N°serie
                                                          </label>
                                                          <input name="n_serie" value="<?php echo $car_data['n_serie']; ?>"  type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="N°serie..." >
                                                      </div>
                                                      <div class="form-group col-md-3">
                                                          <label>N°facture
                                                          </label>
                                                          <input name="num_facture_fournisseur" value="<?php echo $car_data['num_facture_fournisseur']; ?>" type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="N°facture..." >
                                                      </div>


                                                    </div>


                                                                                                        <!-- row  6-->
                                                                                                        <div class="row mt-3">

                                                                                                          <div class="form-group col-md-12">
                                                                                                              <label for="inputText3" >Detail reparation </label>
                                                                                                              <textarea  name="detail_reparation"class="form-control">
                                                                                                                <?php echo $car_data['detail_reparation']; ?>
                                                                                                              </textarea>
                                                                                                          </div>




                                                                                                        </div>
                                                    <div class="text-center mt-4">
                                                    <input name="update_car" type="submit" value="Modifier" class="btn btn-outline-success">
                                                  </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic form  -->


        <!-- footer -->
        <?php include '../includes/footer.inc.php'; ?>

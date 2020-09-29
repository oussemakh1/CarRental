<?php


  //include controller
  include '../../Controllers/CarsController.php';

  //Cars Controller
  $carsController = new CarsController();

if(isset($_GET['id'])){
  $id = $_GET['id'];
  //Car edit
  $car_data = $carsController->getCarById($id);

}




?>




      <!-- header -->
      <?php include '../includes/header.inc.php'; ?>

      <!-- Main Navbar -->
      <?php include '../includes/navbar.inc.php'; ?>

      <!-- edit car -->
      <div class="row">
        <div class="col-sm-12 col-md-12">

          <form>
            <div class="card card-small mb-4">
            <div class="card-body p-0 pb-3 text-center">
            <!-- row 1 -->
            <div class="form-row mt-4 ml-2 mr-2">
            <div class="form-group col-md-4">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="marque" aria-label="marque" aria-describedby="basic-addon1"> </div>
            </div>
            <div class="form-group col-md-4">
              <input type="password" class="form-control"  placeholder="model"> </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control"  placeholder="color"> </div>
          </div>

            <!-- row 2 -->
            <div class="form-row mt-2 ml-2 mr-2">
              <div class="form-group col-md-4">
                <select id="inputState" class="form-control">
                  <option selected>Choose carburant...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <select id="inputState" class="form-control">
                  <option selected>Choose fournisseur...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <select id="inputState" class="form-control">
                  <option selected>Choose type vehicule...</option>
                  <option>...</option>
                </select>
              </div>
            </div>

            <!-- row 3 -->
            <div class="form-row mt-3 ml-2 mr-2">
                <div class="form-group col-md-4">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="N° serie" aria-label="marque" aria-describedby="basic-addon1"> </div>
                </div>
                <div class="form-group col-md-4">
                  <input type="password" class="form-control"  placeholder="assurance"> </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control"  placeholder="carte grise"> </div>
            </div>
          </div>
        </div>

        <!-- card 2 -->
            <div class="card card-small mb-4">
            <div class="card-body p-0 pb-3 ">
            <!-- row 1 -->
                <div class="form-row mt-4 ml-2 mr-2">
                  <!-- f1 -->
                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <button class="btn btn-white" type="button">Date achat</button>
                    </div>
                    <input type="date" class="form-control" >
                  </div>
                  <!-- f2 -->
                  <div class="input-group col-md-3 mb-3">
                    <div class="input-group-prepend">
                      <button class="btn btn-white" type="button">Durée de vie</button>
                    </div>
                    <input type="number" placeholder="durée de vie" class="form-control" >
                  </div>
                  <!-- f3 -->
                  <div class="input-group col-md-6 mb-3">
                    <div class="input-group-prepend">
                      <button class="btn btn-white" type="button">N° kileomtere avant revesion</button>
                    </div>
                    <input type="number" placeholder="nombre de kileomtere avant revesion" class="form-control" >
                  </div>
                </div>

           <!-- row 2 -->
                      <div class="form-row mt-4 ml-2 mr-2">
                        <!-- f1 -->
                        <div class="input-group col-md-4 mb-3">
                          <div class="input-group-prepend">
                            <button class="btn btn-white" type="button">Prix achat</button>
                          </div>
                          <input type="number" placeholder="prix d'achat hors tva" class="form-control" >
                        </div>
                        <!-- f2 -->
                        <div class="input-group col-md-4 mb-3">
                          <div class="input-group-prepend">
                            <button class="btn btn-white" type="button">TVA</button>
                          </div>
                          <input type="number" placeholder="0%" class="form-control" >
                        </div>
                        <!-- f3 -->
                        <div class="input-group col-md-4 mb-3">
                          <div class="input-group-prepend">
                            <button class="btn btn-white" type="button">Prix d'achat ttc</button>
                          </div>
                          <input type="number" placeholder="prix d'achat ttc" class="form-control" >
                        </div>
                      </div>
          </div>
        </div>

        <!-- card 3 -->
            <div class="card card-small mb-4">
            <div class="card-body p-0 pb-3 ">
              <!--row 1 -->
              <div class="form-row mt-4 ml-2 mr-2">
                <!-- f1 -->
                <div class="input-group col-md-4 mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-white" type="button">N°Facture fournisseur</button>
                  </div>
                  <input type="number" placeholder="N°Facture fournisseur" class="form-control" >
                </div>
                <!-- f2 -->
                <div class="input-group col-md-4 mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-white" type="button">Montant traites</button>
                  </div>
                  <input type="number" placeholder="Montant traites" class="form-control" >
                </div>
                <!-- f3 -->
                <div class="input-group col-md-4 mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-white" type="button">N°Traites</button>
                  </div>
                  <input type="number" placeholder="N°Traites" class="form-control" >
                </div>
              </div>
              <!--row 2 -->
              <div class="form-row mt-4 ml-2 mr-2">
                <!-- f1 -->
                <div class="input-group col-md-12 mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-white" type="button">Detail reparation</button>
                  </div>
                  <textarea type="text"  class="form-control" > </textarea>
                </div>

            </div>
          </div>



          <div class="text-center">
              <button type="button" class="mb-2 ml-3 col-md-3 btn btn-outline-primary mr-2">Modifier</button>
              <button type="button" class="mb-2 ml-3 col-md-3 btn btn-outline-danger mr-2">Supprimer</button>

         </div>
          </form>
        </div>
      </div>
      </div>
    </div>

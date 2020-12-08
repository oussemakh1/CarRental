
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
                <div class="section-block" id="basicform">
                    <h3 class="section-title">Basic Form Elements</h3>
                    <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p>
                </div>
                <div class="card">
                    <h5 class="card-header">Basic Form</h5>
                    <div class="card-body">
                        <form>
                          <!-- row 1 -->
                          <div class="row">

                            <div class="form-group col-md-3">
                                <label for="input-select">Fournisseur</label>
                                <select class="form-control" id="input-select">
                                    <option>Choose Example</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail">Marque</label>
                                <input id="inputEmail" type="text" placeholder="marque vehicule ..." class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputText4" >Model</label>
                                <input id="inputText4" type="text" class="form-control" placeholder="model vehicule ...">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="input-select">Carburant</label>
                                <select class="form-control" id="input-select">
                                    <option>Choose Example</option>
                                </select>
                            </div>

                          </div>
                          <!-- row 2 -->
                          <div class="row mt-2">

                            <div class="form-group col-md-3">
                                <label for="inputText3" >Durée de vie</label>
                                <input id="inputText3" type="number" class="form-control" placeholder="durée de vie ...">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail">Date achat</label>
                                <input id="inputEmail" type="date" placeholder="marque vehicule ..." class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Traites mensuel
                                </label>
                                <input type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="Montant traites mensuel...">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword">N°traites</label>
                                <input id="inputPassword" type="number" placeholder="nombre des traites" class="form-control">
                            </div>

                          </div>


                          <!-- row  3-->
                          <div class="row mt-2">

                            <div class="form-group col-md-4">
                                <label for="inputText3" >Prix d'achat HT</label>
                                <input id="inputText3" type="number" class="form-control" placeholder="prix d'achat hors tva...">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputText3" >TVA</label>
                                <input id="inputText3" type="number" class="form-control" placeholder="%">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Prix d'achat TTC
                                </label>
                                <input type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="prix d'achat ttc..." disabled>
                            </div>


                          </div>




                                                    <!-- row  4-->
                                                    <div class="row mt-3">

                                                      <div class="form-group col-md-3">
                                                          <label for="input-select">Type vehicule</label>
                                                          <select name="type_vehicule" class="form-control" id="input-select">
                                                            <option value="<?php echo $car['type_vehicule'];?>"><?php echo $car['type_vehicule'];?></option>
                                                              <option value="Véhicule classique">Véhicule classique </option>
                                                              <option value="Utilitaire type kangoo">Utilitaire type kangoo</option>
                                                              <option value="Utilitaire type traffic">Utilitaire type traffic</option>

                                                          </select>
                                                      </div>

                                                      <div class="form-group col-md-3">
                                                          <label for="hue-demo">Color</label>
                                                          <input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                                      </div>

                                                      <div class="form-group col-md-4">
                                                          <label>N°km
                                                          </label>
                                                          <input type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="prix d'achat ttc..." >
                                                      </div>


                                                    </div>

                                                    <!-- row  5-->
                                                    <div class="row mt-3">

                                                      <div class="form-group col-md-3">
                                                          <label for="inputText3" >Carte grise </label>
                                                          <input id="inputText3" type="text" class="form-control" placeholder="prix d'achat hors tva...">
                                                      </div>

                                                      <div class="form-group col-md-3">
                                                          <label for="inputText3" >N°assurance</label>
                                                          <input id="inputText3" type="text" class="form-control" placeholder="%">
                                                      </div>

                                                      <div class="form-group col-md-3">
                                                          <label>N°serie
                                                          </label>
                                                          <input type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="prix d'achat ttc..." >
                                                      </div>
                                                      <div class="form-group col-md-3">
                                                          <label>N°facture
                                                          </label>
                                                          <input type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="prix d'achat ttc..." >
                                                      </div>


                                                    </div>


                                                                                                        <!-- row  6-->
                                                                                                        <div class="row mt-3">

                                                                                                          <div class="form-group col-md-12">
                                                                                                              <label for="inputText3" >Detail reparation </label>
                                                                                                              <textarea class="form-control"></textarea>
                                                                                                          </div>




                                                                                                        </div>
                                                    <div class="text-center mt-4">
                                                    <a href="#" class="btn btn-outline-success">Modifier</a>
                                                    <a href="#" class="btn btn-outline-danger">Suprmier</a>
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

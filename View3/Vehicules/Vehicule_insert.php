
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
                                <select name = "fournisseur" class="form-control" id="input-select">
                                    <option>Choose Example</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label >Marque</label>
                                <input name="marque" type="text" placeholder="marque vehicule ..." class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label  >Model</label>
                                <input name="model" type="text" class="form-control" placeholder="model vehicule ...">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="input-select">Carburant</label>
                                <select  name="carburant" class="form-control" >
                                    <option>Choose Example</option>
                                </select>
                            </div>

                          </div>
                          <!-- row 2 -->
                          <div class="row mt-2">

                            <div class="form-group col-md-3">
                                <label  >Durée de vie</label>
                                <input name="duree_vie" type="number" class="form-control" placeholder="durée de vie ...">
                            </div>
                            <div class="form-group col-md-3">
                                <label >Date achat</label>
                                <input name="date_achat" type="date" placeholder="marque vehicule ..." class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Traites mensuel
                                </label>
                                <input  name="montant_traites_mensuel" type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="Montant traites mensuel...">
                            </div>
                            <div class="form-group col-md-3">
                                <label >N°traites</label>
                                <input name="nombre_traites" type="number" placeholder="nombre des traites" class="form-control">
                            </div>

                          </div>


                          <!-- row  3-->
                          <div class="row mt-2">

                            <div class="form-group col-md-4">
                                <label  >Prix d'achat HT</label>
                                <input name="prix_achat_ht" type="number" class="form-control" placeholder="prix d'achat hors tva...">
                            </div>

                            <div class="form-group col-md-4">
                                <label >TVA</label>
                                <input name="tva" type="number" class="form-control" placeholder="%">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Prix d'achat TTC
                                </label>
                                <input name="prix_achat_ttc" type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="prix d'achat ttc..." disabled>
                            </div>


                          </div>




                                                    <!-- row  4-->
                                                    <div class="row mt-3">

                                                      <div class="form-group col-md-3">
                                                          <label for="input-select">Type vehicule</label>
                                                          <select name="type_vehicule" class="form-control" id="input-select">
                                                              <option>Choose Example</option>
                                                          </select>
                                                      </div>

                                                      <div class="form-group col-md-3">
                                                          <label for="hue-demo">Color</label>
                                                          <input name="color" type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                                      </div>

                                                      <div class="form-group col-md-4">
                                                          <label>N°km
                                                          </label>
                                                          <input name="nb_km_avant_revision" type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="N°km avant revision..." >
                                                      </div>


                                                    </div>

                                                    <!-- row  5-->
                                                    <div class="row mt-3">

                                                      <div class="form-group col-md-3">
                                                          <label >Carte grise </label>
                                                          <input name="carte_grise" type="text" class="form-control" placeholder="carte grise...">
                                                      </div>

                                                      <div class="form-group col-md-3">
                                                          <label  >N°assurance</label>
                                                          <input name="n_assurance" type="text" class="form-control" placeholder="N°assurance">
                                                      </div>

                                                      <div class="form-group col-md-3">
                                                          <label>N°serie
                                                          </label>
                                                          <input name="n_serie" type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="N° serie ..." >
                                                      </div>
                                                      <div class="form-group col-md-3">
                                                          <label>N°facture
                                                          </label>
                                                          <input name="num_facture_fournisseur" type="number" class="form-control currency-inputmask" id="currency-mask" placeholder="N°facture fournisseur..." >
                                                      </div>


                                                    </div>


                                                                                                        <!-- row  6-->
                                                                                                        <div class="row mt-3">

                                                                                                          <div class="form-group col-md-12">
                                                                                                              <label for="inputText3" >Detail reparation </label>
                                                                                                              <textarea  name="detail_reparation"class="form-control"></textarea>
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

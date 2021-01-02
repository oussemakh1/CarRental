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

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- Insert Fournisseur -->
            <?php
            //Include FournisseurController
            include '../../Controllers/FournisseurController.php';

            //Inherit Fournisseur Controller
            $FournisseurController = new FournisseurController();

            if(isset($_POST['insert_fournisseur']))
                    {

                    $data = [

                    "societe"=>$_POST['societe'],
                    "civilite"=>$_POST['civilite'],
                    "nom_contact"=>$_POST['nom_contact'],
                    "prenom_contact"=>$_POST['prenom_contact'],
                    "adress" =>$_POST['adress'],
                    "code_postal"=>$_POST['code_postal'],
                    "ville"=>$_POST['ville'],
                    "pays"=>$_POST['pays'],
                    "telephone"=>$_POST['telephone'],
                    "gsm"=>$_POST['gsm'],
                    "fax"=>$_POST['fax'],
                    "email"=>$_POST['email'],
                    "observation"=>$_POST['observation'],
                    "service"=>$_POST['service']
                    ];

                    //Change to string
                    $telephone = strval($_POST['telephone']);
                    $gsm = strval($_POST['gsm']);
                    $fax = strval($_POST['fax']);

                    if(empty($_POST['societe']) && empty($_POST['civilite'])) {
                        shouldNotBeEmpty("Champ societe ou civilite ne doit pas etre vide!");
                    }
                    elseif (strlen($telephone) < 8) {
                        lengthShouldBe(8,"Numero telephone");
                    }
                    elseif(!empty($_POST['gsm']) && strlen($gsm) < 8) {
                        lengthShouldBe(8,"Numero gsm");
                    }
                    elseif(!empty($_POST['fax']) && strlen($fax) < 8) {
                        lengthShouldBe(8,"Numero fax");
                    }
                    else {
                        //Insert Fournisseur
                        $FournisseurController->fournisseurInsert($data);

                    }



            }
            ?>
            <!-- General errors handleing -->
            <?php

                if(isset($_GET['error_message'])) {
                    error_message($_GET['error_message']);
                 }

                if(isset($_GET['insert_error'])) {
                   insert_error_message();
                }
            ?>

            <div class="card">
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                      <!-- row 1 -->
                      <div class="row">

                        <div class="form-group col-md-3">
                            <label >Societe</label>
                            <input name="societe" class="form-control" type="text" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Civilite</label>
                            <input name="civilite" type="text" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Nom</label>
                            <input name="nom_contact" type="text" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-select">Prenom</label>
                            <input name="prenom_contact" type="text" class="form-control" required>

                        </div>

                      </div>
                      <!-- row 2 -->
                      <div class="row mt-2">

                        <div class="form-group col-md-3">
                            <label  >Adress</label>
                            <input name="adress" type="text" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label  >Code postal</label>
                            <input name="code_postal" type="number" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label >Ville</label>
                            <input name="ville" type="text"  class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Pays
                            </label>
                            <input  name="pays" type="text" class="form-control currency-inputmask" id="currency-mask" required>
                        </div>


                      </div>


                      <!-- row  3-->
                      <div class="row mt-2">

                        <div class="form-group col-md-3">
                            <label  >email</label>
                            <input name="email" type="email" class="form-control" >
                        </div>

                        <div class="form-group col-md-3">
                            <label >telephone</label>
                            <input name="telephone" type="number" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label >GSM</label>
                            <input name="gsm" type="number" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label >FAX</label>
                            <input name="fax" type="number" class="form-control">
                        </div>


                      </div>




                                                <!-- row  5-->
                                                <div class="row mt-3">



                                                  <div class="form-group col-md-12">
                                                      <label  >Service</label>
                                                      <select name="service" class="form-control" id="input-select">
                                                          <option value="vente">Vente</option>
                                                          <option value="reparation">Reparation</option>

                                                      </select>
                                                    </div>

                                                  <div class="form-group col-md-12">
                                                      <label>Observation</label>
                                                      <input name="observation" type="text" class="form-control currency-inputmask" id="currency-mask" >
                                                  </div>



                                                </div>


                                                <div class="text-center mt-4">
                                                <input name="insert_fournisseur" type="submit" value="Inseré" class="btn btn-outline-success">
                                              </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <?php include '../includes/footer.inc.php'; ?>

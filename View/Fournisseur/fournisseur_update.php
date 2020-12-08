<?php

if(isset($_GET['id']))
{
    $id= $_GET['id'];

    //Include FournisseurController
    include '../../Controllers/FournisseurController.php';


    //Inherit Fournisseur Controller
    $FournisseurController = new FournisseurController();

    $fournisseur_info = $FournisseurController->fournisseurEdit($id);



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

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <!-- Update Fournisseur -->
            <?php
                 if(isset($_POST['update_fournisseur']))
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
                        //Update Fournisseur
                        $FournisseurController->fournisseurUpdate($id, $data);
                    }


                }
            ?>
            <div class="card">
                <?php
                    if(isset($_GET['update_error'])) {
                        update_error_message();
                    }
                ?>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                      <!-- row 1 -->
                      <div class="row">

                        <div class="form-group col-md-3">
                            <label >Societe</label>
                            <input name="societe" value="<?php echo $fournisseur_info['societe'];?>"class="form-control" type="text" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Civilite</label>
                            <input name="civilite" type="text" value="<?php echo $fournisseur_info['civilite'];?>" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Nom</label>
                            <input name="nom_contact" value="<?php echo $fournisseur_info['nom_contact'];?>" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-select">Prenom</label>
                            <input name="prenom_contact" type="text"  value="<?php echo $fournisseur_info['prenom_contact'];?>" class="form-control" >

                        </div>

                      </div>
                      <!-- row 2 -->
                      <div class="row mt-2">

                        <div class="form-group col-md-3">
                            <label  >Adress</label>
                            <input name="adress" type="text" value="<?php echo $fournisseur_info['adress'];?>" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label  >Code postal</label>
                            <input name="code_postal" type="number" value="<?php echo $fournisseur_info['code_postal'];?>" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label >Ville</label>
                            <input name="ville" type="text" value="<?php echo $fournisseur_info['ville'];?>"  class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Pays
                            </label>
                            <input  name="pays" type="text" value="<?php echo $fournisseur_info['pays'];?>" class="form-control currency-inputmask" id="currency-mask" >
                        </div>


                      </div>


                      <!-- row  3-->
                      <div class="row mt-2">

                        <div class="form-group col-md-3">
                            <label  >email</label>
                            <input name="email" type="email" value="<?php echo $fournisseur_info['email'];?>" class="form-control" >
                        </div>

                        <div class="form-group col-md-3">
                            <label >telephone</label>
                            <input name="telephone" value="<?php echo $fournisseur_info['telephone'];?>" type="number" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label >GSM</label>
                            <input name="gsm" value="<?php echo $fournisseur_info['gsm'];?>" type="number" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label >FAX</label>
                            <input name="fax" value="<?php echo $fournisseur_info['fax'];?>" type="number" class="form-control">
                        </div>


                      </div>




                                                <!-- row  5-->
                                                <div class="row mt-3">



                                                  <div class="form-group col-md-12">
                                                      <label  >Service</label>
                                                      <select name="service" class="form-control" id="input-select">
                                                        <option value="<?php echo $fournisseur_info['service'];?>"><?php echo $fournisseur_info['service'];?></option>

                                                        <?php if($fournisseur_info['service']=='vente'){
                                                          echo '<option value="reparation">Reparation</option>';

                                                        }else{
                                                            echo '<option value="vente">Vente</option>';
                                                        }
                                                        ?>

                                                      </select>
                                                    </div>

                                                  <div class="form-group col-md-12">
                                                      <label>Observation</label>
                                                      <input name="observation" type="text"  value="<?php echo $fournisseur_info['observation'];?>" class="form-control currency-inputmask" id="currency-mask" >
                                                  </div>



                                                </div>


                                                <div class="text-center mt-4">
                                                <input name="update_fournisseur" type="submit" value="Modifier" class="btn btn-outline-success">
                                              </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <?php include '../includes/footer.inc.php'; ?>

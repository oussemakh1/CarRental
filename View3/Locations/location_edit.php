<?php

if(isset($_GET['location_id'])){

  $id = $_GET['location_id'];

  //Location Controller
  include '../../Controllers/LocationController.php';

  //Facture Controller
  include '../../Controllers/FactureController.php';





   //Inherit location controller
   $locationController = new LocationController();

   //Inherit Facture controller
   $factureController = new FactureController();


   //Location data
   $location_data  = $locationController->getLocationById($id);

    //Insert Location
    if(isset($_POST['update_location']))
    {

      $data = [

        "nom"=>$_POST['nom'],
        "prenom"=>$_POST['prenom'],
        "date_naissance"=>$_POST['date_naissance'],
        "adress"=>$_POST['adress'],
        "code_postal" =>$_POST['code_postal'],
        "ville"=>$_POST['ville'],
        "pays"=>$_POST['pays'],
        "telephone"=>$_POST['telephone'],
        "email"=>$_POST['email'],
        "n_permis"=>$_POST['n_permis'],
        "date_delivrance"=>$_POST['date_delivrance'],
        "lieu_delivrance"=>$_POST['lieu_delivrance'],
        "cin"=>$_POST['cin'],
        "type_client"=>$_POST['type_client'],
        "marque_vehicule"=>$_POST['marque_vehicule'],
        "etat_vehicule"=>$_POST['etat_vehicule'],
        "assurance"=>$_POST['assurance'],
        "caution"=>$_POST['caution'],
        "mode_paiement"=>$_POST['mode_paiement'],
        "nb_jour"=>$_POST['nb_jour'],
        "date_depart"=>$_POST['date_depart'],
        "heure_depart"=>$_POST['heure_depart'],
        "date_retour"=>$_POST['date_retour'],
        "heure_retour"=>$_POST['heure_retour'],
        "prix_ht"=>$_POST['prix_ht'],
        "tva"=>$_POST['tva'],
        "remise"=>$_POST['remise'],
        "paye_le"=>$_POST['paye_le'],
        "deja_regle_acompte"=>$_POST['deja_regle_acompte'],
        "date_acompte"=>$_POST['date_acompte'],
        "lieu_retour"=>$_POST['lieu_retour'],
        "n_serie" =>$_POST['n_serie'],
        "prix_ttc"=>$_POST['prix_ttc']
      ];





        $Location_edit = $locationController->update_location($id,$data);
      }
      if(isset($_POST['delete_location']))
      {
        $changeFactStat = $factureController->ChangeStatFailed($id);
        $delete_location = $locationController->delete_location($id);

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









    <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card">
                    <h5 class="card-header">Modification Location</h5>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                          <!-- row 1 -->
                          <div class="row">


                            <div class="form-group ">
                                <input name="nom" value="<?php echo $location_data['nom']; ?>" class="form-control" type="text" hidden >
                            </div>
                            <div class="form-group ">
                                <input name="prenom" type="text" value="<?php $location_data['prenom']; ?>" class="form-control" hidden>
                            </div>
                            <div class="form-group ">
                                <input name="date_naissance" value="<?php echo $location_data['date_naissance']; ?>" type="date" class="form-control" hidden>
                            </div>
                            <div class="form-group ">
                                <input name="adress" value="<?php echo $location_data['adress']; ?>" type="text" class="form-control" hidden>

                            </div>

                          </div>
                          <!-- row 2 -->
                          <div class="row">

                            <div class="form-group">
                                <input name="code_postal" value="<?php echo $location_data['code_postal']; ?>" type="number" class="form-control" hidden >
                            </div>
                            <div class="form-group">
                                <input name="ville" value="<?php echo $location_data['ville']; ?>" type="text"  class="form-control" hidden>
                            </div>
                            <div class="form-group ">

                                <input  name="pays" value="<?php echo $location_data['pays']; ?>" type="text" class="form-control "  hidden>
                            </div>
                            <div class="form-group ">
                                <input name="telephone" value="<?php echo $location_data['telephone']; ?>" type="number" class="form-control" hidden>
                            </div>

                          </div>


                          <!-- row  3-->
                          <div class="row ">

                            <div class="form-group ">
                                <input name="email" value="<?php echo $location_data['email']; ?>" type="email" class="form-control" hidden >
                            </div>

                            <div class="form-group ">
                                <input name="n_permis"value="<?php echo $location_data['n_permis']; ?>"  type="number" class="form-control" hidden>
                            </div>


                            <div class="form-group ">
                                <input name="cin" value="<?php echo $location_data['cin']; ?>" type="text"  class="form-control "  hidden>
                            </div>




                          </div>




                          <!-- row  4-->
                          <div class="row">

                            <div class="form-group col-md-6">
                                <label for="input-select">Lieu delivrance</label>
                                <input name="lieu_delivrance" type="text" value="<?php echo $location_data['lieu_delivrance']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                            </div>


                            <div class="form-group col-md-6">
                                <label>Type client
                                </label>
                                <select name = "type_client" class="form-control" id="input-select">
                                    <option value="<?php echo $location_data['type_client']; ?>">
                                                <?php echo $location_data['type_client']; ?>
                                    </option>
                                </select>
                                    </div>


                          </div>

                          <!-- row  5-->
                          <div class="row mt-3">

                            <div class="form-group ">
                                  <input hidden name="marque_vehicule" value="<?php echo $location_data['marque_vehicule'];?>" class="form-control" id="input-select">

                               </div>

                            <div class="form-group col-md-5">
                                <label  >Etat vehicule</label>
                                <select name = "etat_vehicule" class="form-control" id="input-select">
                                  <option value="<?php echo $location_data['etat_vehicule']; ?>">
                                              <?php echo $location_data['etat_vehicule']; ?>
                                  </option>
                                </select>
                               </div>

                            <div class="form-group">
                                <input hidden name="assurance" value="<?php echo $location_data['assurance']; ?>" type="number" class="form-control currency-inputmask" id="currency-mask" >
                            </div>
                            <div class="form-group col-md-6">
                                <label>Caution
                                </label>
                                <input name="caution" value="<?php echo $location_data['caution']; ?>" type="number" class="form-control currency-inputmask" id="currency-mask"  >
                            </div>


                          </div>


                                                                              <!-- row  6-->
                                                                      <div class="row mt-3">

                                                                                <div class="form-group col-md-3">
                                                                                    <label for="inputText3" >Mode paiement</label>
                                                                                  <select name="mode_paiement" class="form-control">
                                                                                    <option value="<?php echo $location_data['mode_paiement']; ?>">
                                                                                                <?php echo $location_data['mode_paiement']; ?>
                                                                                    </option>
                                                                                  </select>
                                                                               </div>

                                                                               <div class="form-group col-md-3">
                                                                                   <label for="inputText3" >N°jours</label>
                                                                                   <input name="nb_jour"  value="<?php echo $location_data['nb_jour']; ?>" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                              </div>

                                                                              <div class="form-group col-md-3">
                                                                                  <label for="inputText3" >Date depart</label>
                                                                                  <input name="date_depart" value="<?php echo $location_data['date_depart']; ?>" type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                             </div>
                                                                             <div class="form-group col-md-3">
                                                                                 <label for="inputText3" >Heure depart</label>
                                                                                 <input name="heure_depart" type="text" value="<?php echo $location_data['heure_depart']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                                                                            </div>

                                                                                <div class="form-group col-md-3">
                                                                                      <label for="inputText3" >Date retour</label>
                                                                                      <input name="date_retour" type="date" value="<?php echo $location_data['date_retour']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                   </div>


                                                                                   <div class="form-group col-md-3">
                                                                                       <label for="inputText3" >Heure retour</label>
                                                                                       <input name="heure_retour" value="<?php echo $location_data['heure_retour']; ?>" type="text" class="form-control currency-inputmask" id="currency-mask" >

                                                                                  </div>

                                                                                  <div class="form-group col-md-3">
                                                                                      <label for="inputText3" >Prix ht</label>
                                                                                      <input name="prix_ht" type="number" value="<?php echo $location_data['prix_ht']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                 </div>
                                                                                 <div class="form-group col-md-3">
                                                                                     <label for="inputText3" >Remise</label>
                                                                                     <input name="remise" type="number" value="<?php echo $location_data['remise']; ?>" class="form-control currency-inputmask" placeholder="%"  >

                                                                                </div>
                                                                                 <div class="form-group col-md-12">
                                                                                     <label for="inputText3" >TVA</label>
                                                                                     <input name="tva" type="number" value="<?php echo $location_data['tva']; ?>" class="form-control currency-inputmask" id="currency-mask" >

                                                                                </div>

                                                                              </div>


                                                                              <!-- row  7-->




                                                                              <!-- row  8-->
                                                                        <div class="row mt-3">


                                                                              <div class="form-group col-md-3">
                                                                                  <label for="inputText3" >Paye le</label>
                                                                                  <input name="paye_le" type="date" value="<?php echo $location_data['paye_le']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                                                                             </div>

                                                                             <div class="form-group col-md-3">
                                                                                 <label for="inputText3" >Deja régle acompte</label>
                                                                                 <select name = "deja_regle_acompte" class="form-control" id="input-select">
                                                                                   <option value="<?php echo $location_data['deja_regle_acompte']; ?>">
                                                                                               <?php echo $location_data['deja_regle_acompte']; ?>
                                                                                   </option>
                                                                                   <option value="Oui">Oui</option>
                                                                                   <option value="Non">Non</option>
                                                                                 </select>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label for="inputText3" >Date acompte</label>
                                                                                <input name="date_acompte" value="<?php echo $location_data['date_acompte']; ?>" type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                           </div>

                                                                           <div class="form-group col-md-3">
                                                                               <label for="inputText3" >Lieu retour</label>
                                                                               <input name="lieu_retour" value="<?php echo $location_data['lieu_retour']; ?>" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                          </div>

                                                                          <div class="form-group ">
                                                                              <input hidden name="n_serie" value="<?php echo $location_data['n_serie']; ?>" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                         </div>

                                                                              </div>
                          <div class="text-center mt-4">
                          <input name="update_location" type="submit" value="Modifier" class="btn btn-outline-success">
                        </div>


                        </form>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="text-center mt-2">
                        <input name="delete_location" type="submit" value="Suprimer" class="btn btn-outline-danger">
                      </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

<?php

if(isset($_GET['id'],$_GET['marque_vehicule'],$_GET['n_serie'],$_GET['reservation_id'])){

  $id = $_GET['id'];
  //Client Controller
  include '../../Controllers/ClientController.php';
  //Location Controller
  include '../../Controllers/LocationController.php';
  //Reservation controller
  include '../../Controllers/ReservationController.php';

  include '../../lib/DateFunc.php';



    //Inherit client controller
    $clientController = new ClientController();



   //Inherit location controller
   $locationController = new LocationController();


  //Get car data
  $marque_vehicule = $_GET['marque_vehicule'];
  $n_serie = $_GET['n_serie'];

  $find_Client = $clientController->getClientByCin($id);


      $nom = $find_Client['nom'];
      $prenom = $find_Client['prenom'];
      $email = $find_Client['email'];
      $date_naissance = $find_Client['date_naissance'];
      $telephone = $find_Client['telephone'];
      $cin = $find_Client['cin'];
      $adress = $find_Client['adress'];
      $ville = $find_Client['ville'];
      $pays =$find_Client['pays'];
      $n_permis = $find_Client['n_permis'];
      $code_postal = $find_Client['code_postal'];
      $type_client = $find_client['type_client'];












    //Insert Location
    elseif(isset($_POST['insert_location']))
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
        "nb_jour"=>dateDiff($_POST['date_retour'],$_POST['date_depart']),
        "date_depart"=>$_POST['date_depart'],
        "heure_depart"=>$_POST['heure_depart'],
        "date_retour"=>$_POST['date_retour'],
        "heure_retour"=>$_POST['heure_retour'],
        "prix_ht"=>$_POST['prix_ht'],
        "tva"=>$_POST['tva'],
        "prix_ttc"=>$_POST['prix_ttc'],
        "paye_le"=>$_POST['paye_le'],
        "deja_regle_acompte"=>$_POST['deja_regle_acompte'],
        "date_acompte"=>$_POST['date_acompte'],
        "lieu_retour"=>$_POST['lieu_retour'],
        "remise"=>$_POST['remise'],
        "n_serie"=>$_POST['n_serie']
      ];

    if(isset($_GET['reservation_id'])){
      $reservation_id = $_GET['reservation_id'];
      $reservationController = new ReservationController();
          $changeReservationStatus = $reservationController->ReservationSuccess($reservation_id);

    }


      $locationController = new LocationController();
        $insertCar = $locationController->insert_location($data);


      }
  }elseif(isset($_GET['id'],$_GET['marque_vehicule'],$_GET['n_serie'])){

    $id = $_GET['id'];
    //Client Controller
    include '../../Controllers/ClientController.php';
    //Location Controller
    include '../../Controllers/LocationController.php';
    //Reservation controller
    include '../../Controllers/ReservationController.php';

    include '../../lib/DateFunc.php';



      //Inherit client controller
      $clientController = new ClientController();



     //Inherit location controller
     $locationController = new LocationController();


    //Get car data
    $marque_vehicule = $_GET['marque_vehicule'];
    $n_serie = $_GET['n_serie'];

    $find_Client = $clientController->getClientByCin($id);


        $nom = $find_Client['nom'];
        $prenom = $find_Client['prenom'];
        $email = $find_Client['email'];
        $date_naissance = $find_Client['date_naissance'];
        $telephone = $find_Client['telephone'];
        $cin = $find_Client['cin'];
        $adress = $find_Client['adress'];
        $ville = $find_Client['ville'];
        $pays =$find_Client['pays'];
        $n_permis = $find_Client['n_permis'];
        $code_postal = $find_Client['code_postal'];
        $type_client = $find_client['type_client'];












      //Insert Location
      if(isset($_POST['insert_location']))
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
          "nb_jour"=>dateDiff($_POST['date_retour'],$_POST['date_depart']),
          "date_depart"=>$_POST['date_depart'],
          "heure_depart"=>$_POST['heure_depart'],
          "date_retour"=>$_POST['date_retour'],
          "heure_retour"=>$_POST['heure_retour'],
          "prix_ht"=>$_POST['prix_ht'],
          "tva"=>$_POST['tva'],
          "prix_ttc"=>$_POST['prix_ttc'],
          "paye_le"=>$_POST['paye_le'],
          "deja_regle_acompte"=>$_POST['deja_regle_acompte'],
          "date_acompte"=>$_POST['date_acompte'],
          "lieu_retour"=>$_POST['lieu_retour'],
          "remise"=>$_POST['remise'],
          "n_serie"=>$_POST['n_serie']
        ];



        $locationController = new LocationController();
          $insertCar = $locationController->insert_location($data);


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

                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                          <!-- row 1 -->
                          <div class="row">

                            <input name="date_fact" value="<?php echo date('l jS \of F Y h:i:s A');?>" type="text" hidden >

                            <div >
                                <input name="nom" value="<?php echo $nom; ?>" class="form-control" type="text" hidden >
                            </div>
                            <div >
                                <input name="prenom" type="text" value="<?php echo $prenom; ?>" class="form-control" hidden>
                            </div>
                            <div >
                                <input name="date_naissance" value="<?php echo $date_naissance; ?>" type="date" class="form-control" hidden>
                            </div>
                            <div >
                                <input name="adress" value="<?php echo $adress; ?>" type="text" class="form-control" hidden>

                            </div>

                          </div>
                          <!-- row 2 -->
                          <div class="row">

                            <div >
                                <input name="code_postal" value="<?php echo $code_postal; ?>" type="number" class="form-control" hidden >
                            </div>
                            <div >
                                <input name="ville" value="<?php echo $ville; ?>" type="text"  class="form-control" hidden>
                            </div>
                            <div >

                                <input  name="pays" value="<?php echo $pays; ?>" type="text" class="form-control "  hidden>
                            </div>
                            <div >
                                <input name="telephone" value="<?php echo $telephone; ?>" type="number" class="form-control" hidden>
                            </div>

                          </div>


                          <!-- row  3-->
                          <div class="row ">

                            <div >
                                <input name="email" value="<?php echo $email; ?>" type="email" class="form-control" hidden >
                            </div>

                            <div >
                                <input name="n_permis"value="<?php echo $n_permis; ?>"  type="number" class="form-control" hidden>
                            </div>


                            <div >
                                <input name="cin" value="<?php echo $cin; ?>" type="text"  class="form-control "  hidden>
                            </div>




                          </div>




                          <!-- row  4-->
                          <div class="row">

                            <div class="form-group col-md-6">
                                <label for="input-select">Lieu delivrance</label>
                                <input name="lieu_delivrance" type="text" required class="form-control currency-inputmask" id="currency-mask"  >

                            </div>
                            <div class="form-group col-md-6">
                                <label for="input-select">Date delivrance</label>
                                <input name="date_delivrance" type="date" required class="form-control "   >

                            </div>



                                <select hidden name = "type_client"  value="<?php echo $type_client;?> "class="form-control" id="input-select">


                          </div>

                          <!-- row  5-->
                          <div class="row mt-3">


                            <input name="marque_vehicule" value="<?php echo $marque_vehicule; ?>" hidden>

                            <div class="form-group col-md-4">
                                <label  >Etat vehicule</label>
                                <select name = "etat_vehicule" class="form-control" id="input-select">
                                    <option value="bon">Bon etat</option>
                                    <option value="mauvais">Mauvais etat</option>
                                    <option value="panne">En panne</option>

                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Assurance
                                </label>
                                <select name ="assurance" class="form-control" id="input-select">
                                  <option value="Tous_risque">Tous risque</option>
                                  <option value="sans_assarnce">sans assarnce</option>
                                  <option value="tiers">tiers</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Caution
                                </label>
                                <input name="caution" type="number" required class="form-control currency-inputmask" id="currency-mask"  >
                            </div>


                          </div>


                                                                              <!-- row  6-->
                                                            <div class="row mt-3">

                                                                                <div class="form-group col-md-3">
                                                                                    <label for="inputText3" >Mode paiement</label>
                                                                                    <select name = "mode_paiement" class="form-control" id="input-select">
                                                                                      <option value="cheque">chèque</option>
                                                                                      <option value="virements_bancaires">virements bancaires</option>
                                                                                      <option value="carte_bancaire">carte bancaire</option>
                                                                                    </select>
                                                              </div>


                                                                              <div class="form-group col-md-3">
                                                                                  <label for="inputText3" >Date depart</label>
                                                                                  <input name="date_depart" required type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                             </div>
                                                                             <div class="form-group col-md-3">
                                                                                 <label for="inputText3" >Heure depart</label>
                                                                                 <input name="heure_depart" required type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                            </div>

                                                                                <div class="form-group col-md-3">
                                                                                      <label for="inputText3" >Date retour</label>
                                                                                      <input name="date_retour"  required type="date" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                   </div>
                                                                          </div>


                                                                            <div class="row">
                                                                                   <div class="form-group col-md-3">
                                                                                       <label for="inputText3" >Heure retour</label>
                                                                                       <input name="heure_retour" required type="text" class="form-control currency-inputmask" id="currency-mask" >

                                                                                  </div>

                                                                                  <div class="form-group col-md-3">
                                                                                      <label for="inputText3" >Prix ht</label>
                                                                                      <input name="prix_ht" type="number"  required class="form-control currency-inputmask" id="currency-mask"  >

                                                                                 </div>

                                                                                 <div class="form-group col-md-3">
                                                                                     <label for="inputText3" >TVA</label>
                                                                                     <input name="tva" type="number" required class="form-control currency-inputmask" id="currency-mask" >

                                                                                </div>
                                                                                <div class="form-group col-md-3">
                                                                                    <label for="inputText3" >Remise</label>
                                                                                    <input name="remise" type="number" required class="form-control currency-inputmask" id="currency-mask" >

                                                                               </div>


                                                                              </div>


                                                                              <!-- row  7-->




                                                                              <!-- row  8-->
                                                                        <div class="row mt-3">


                                                                              <div class="form-group col-md-3">
                                                                                  <label for="inputText3" >Paye le</label>
                                                                                  <input name="paye_le" type="date" required class="form-control currency-inputmask" id="currency-mask"  >

                                                                             </div>

                                                                             <div class="form-group col-md-3">
                                                                                 <label for="inputText3" >Deja régle acompte</label>
                                                                                 <select name = "deja_regle_acompte" class="form-control" id="input-select">
                                                                                   <option value="Oui">Oui</option>
                                                                                   <option value="Non">Non</option>
                                                                                 </select>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label for="inputText3" >Date acompte</label>
                                                                                <input name="date_acompte" type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                           </div>

                                                                           <div class="form-group col-md-3">
                                                                               <label for="inputText3" >Lieu retour</label>
                                                                               <input name="lieu_retour" required type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                          </div>


                                                                              <input name="n_serie" type="text" value="<?php echo $n_serie; ?>"  hidden>



                                                                              </div>
                          <div class="text-center mt-4">
                          <input name="insert_location" type="submit" value="Inseré" class="btn btn-outline-success">
                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>

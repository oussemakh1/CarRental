<?php

if(isset($_GET['cin'],$_GET['marque_vehicule'],$_GET['n_serie'])){

  $cin = $_GET['cin'];
  $marque_vehicule = $_GET['marque_vehicule'];
  $n_serie = $_GET['n_serie'];
  //Client Controller
  include '../../Controllers/ClientController.php';
  //Location Controller
  include '../../Controllers/ReservationController.php';

  include '../../lib/DateFunc.php';


    //Inherit client controller
    $clientController = new ClientController();


   //Inherit location controller
   $reservationController = new ReservationController();




  $find_Client = $clientController->getClientBycin($cin);


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










    }else{
      header("Location:reservation_insert.php");
    }
    //Insert Location
    if(isset($_POST['insert_reservation']))
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

        "nb_jour"=>dateDiff($_POST['date_retour'],$_POST['date_depart']),
        "date_depart"=>$_POST['date_depart'],
        "heure_depart"=>$_POST['heure_depart'],
        "date_retour"=>$_POST['date_retour'],
        "heure_retour"=>$_POST['heure_retour'],
        "n_serie"=>$_POST['n_serie']

      ];



      $reservationController = new ReservationController();


        $insertReservation= $reservationController->insert_reservation($data);
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
                    <h5 class="card-header">Insertion reservation</h5>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                          <!-- row 1 -->
                          <div class="row">


                            <div class="form-group ">
                                <input name="nom" value="<?php echo $nom; ?>" class="form-control" type="text" hidden >
                            </div>
                            <div class="form-group ">
                                <input name="prenom" type="text" value="<?php echo $prenom; ?>" class="form-control" hidden>
                            </div>
                            <div class="form-group ">
                                <input name="date_naissance" value="<?php echo $date_naissance; ?>" type="date" class="form-control" hidden>
                            </div>
                            <div class="form-group ">
                                <input name="adress" value="<?php echo $adress; ?>" type="text" class="form-control" hidden>

                            </div>

                          </div>
                          <!-- row 2 -->
                          <div class="row">

                            <div class="form-group">
                                <input name="code_postal" value="<?php echo $code_postal; ?>" type="number" class="form-control" hidden >
                            </div>
                            <div class="form-group">
                                <input name="ville" value="<?php echo $ville; ?>" type="text"  class="form-control" hidden>
                            </div>
                            <div class="form-group ">

                                <input  name="pays" value="<?php echo $pays; ?>" type="text" class="form-control "  hidden>
                            </div>
                            <div class="form-group ">
                                <input name="telephone" value="<?php echo $telephone; ?>" type="number" class="form-control" hidden>
                            </div>

                          </div>


                          <!-- row  3-->
                          <div class="row ">

                            <div class="form-group ">
                                <input name="email" value="<?php echo $email; ?>" type="email" class="form-control" hidden >
                            </div>

                            <div class="form-group ">
                                <input name="n_permis"value="<?php echo $n_permis; ?>"  type="number" class="form-control" hidden>
                            </div>


                            <div class="form-group ">
                                <input name="cin" value="<?php echo $cin; ?>" type="text"  class="form-control "  hidden>
                            </div>




                          </div>




                          <!-- row  4-->
                          <div class="row">

                            <div class="form-group col-md-12">
                                <label for="input-select">Lieu delivrance</label>
                                <input name="lieu_delivrance" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                            </div>





                          </div>

                          <!-- row  5-->
                          <div class="row mt-3">

                                <input hidden name = "marque_vehicule" value="<?php echo $marque_vehicule; ?>" class="form-control" id="input-select">


                            <div class="form-group col-md-6">
                                <label  >Etat vehicule</label>
                                <select name = "etat_vehicule" class="form-control" id="input-select">
                                  <option value="bon">Bon etat</option>
                                  <option value="mauvais">Mauvais etat</option>
                                  <option value="panne">En panne</option>
                                </select>                                                      </div>

                            <div class="form-group col-md-6">
                                <label>Assurance
                                </label>
                                <input name="assurance" type="number" class="form-control currency-inputmask" id="currency-mask" >
                            </div>



                          </div>


                                                                              <!-- row  6-->
                                                                      <div class="row mt-3">





                                                                              <div class="form-group col-md-3">
                                                                                  <label for="inputText3" >Date depart</label>
                                                                                  <input name="date_depart" type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                             </div>
                                                                             <div class="form-group col-md-3">
                                                                                 <label for="inputText3" >Heure depart</label>
                                                                                 <input name="heure_depart" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                            </div>

                                                                                <div class="form-group col-md-3">
                                                                                      <label for="inputText3" >Date retour</label>
                                                                                      <input name="date_retour" type="date" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                   </div>


                                                                                   <div class="form-group col-md-3">
                                                                                       <label for="inputText3" >Heure retour</label>
                                                                                       <input name="heure_retour" type="text" class="form-control currency-inputmask" id="currency-mask" >

                                                                                  </div>

                                                                                      <input hidden name="n_serie" value="<?php echo $n_serie; ?>" type="text" class="form-control currency-inputmask" id="currency-mask"  >


                                                                              </div>


                                                                              <!-- row  7-->





                          <div class="text-center mt-4">
                          <input name="insert_reservation" type="submit" value="Inseré" class="btn btn-outline-success">
                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

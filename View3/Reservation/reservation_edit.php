<?php

if(isset($_GET['reservation_id'])){

  $id = $_GET['reservation_id'];

  //reservation Controller
  include '../../Controllers/ReservationController.php';





   //Inherit reservation controller
   $reservationController = new ReservationController();


   //Location data
   $reservation_data  = $reservationController->getReservationById($id);

    //Insert reservation
    if(isset($_POST['update_reservation']))
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
        "marque_vehicule"=>$_POST['marque_vehicule'],
        "etat_vehicule"=>$_POST['etat_vehicule'],
        "assurance"=>$_POST['assurance'],

        "nb_jour"=>$_POST['nb_jour'],
        "date_depart"=>$_POST['date_depart'],
        "heure_depart"=>$_POST['heure_depart'],
        "date_retour"=>$_POST['date_retour'],
        "heure_retour"=>$_POST['heure_retour'],
        "n_serie"=>$_POST['n_serie']

      ];





        $reservation_edit = $reservationController->update_reservation($id,$data);
      }
      if(isset($_POST['delete_reservation']))
      {
        $reservation_delete = $reservationController->delete_reservation($id);
        header("Location:../Vehicules/Vehicules.php");
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
                    <h5 class="card-header">Modification reservation</h5>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                          <!-- row 1 -->
                          <div class="row">


                            <div class="form-group ">
                                <input name="nom" value="<?php echo $reservation_data['nom']; ?>" class="form-control" type="text" hidden >
                            </div>
                            <div class="form-group ">
                                <input name="prenom" type="text" value="<?php $reservation_data['prenom']; ?>" class="form-control" hidden>
                            </div>
                            <div class="form-group ">
                                <input name="date_naissance" value="<?php echo $reservation_data['date_naissance']; ?>" type="date" class="form-control" hidden>
                            </div>
                            <div class="form-group ">
                                <input name="adress" value="<?php echo $reservation_data['adress']; ?>" type="text" class="form-control" hidden>

                            </div>

                          </div>
                          <!-- row 2 -->
                          <div class="row">

                            <div class="form-group">
                                <input name="code_postal" value="<?php echo $reservation_data['code_postal']; ?>" type="number" class="form-control" hidden >
                            </div>
                            <div class="form-group">
                                <input name="ville" value="<?php echo $reservation_data['ville']; ?>" type="text"  class="form-control" hidden>
                            </div>
                            <div class="form-group ">

                                <input  name="pays" value="<?php echo $reservation_data['pays']; ?>" type="text" class="form-control "  hidden>
                            </div>
                            <div class="form-group ">
                                <input name="telephone" value="<?php echo $reservation_data['telephone']; ?>" type="number" class="form-control" hidden>
                            </div>

                          </div>


                          <!-- row  3-->
                          <div class="row ">

                            <div class="form-group ">
                                <input name="email" value="<?php echo $reservation_data['email']; ?>" type="email" class="form-control" hidden >
                            </div>

                            <div class="form-group ">
                                <input name="n_permis"value="<?php echo $reservation_data['n_permis']; ?>"  type="number" class="form-control" hidden>
                            </div>


                            <div class="form-group ">
                                <input name="cin" value="<?php echo $reservation_data['cin']; ?>" type="text"  class="form-control "  hidden>
                            </div>




                          </div>




                          <!-- row  4-->
                          <div class="row mt-3">

                            <div class="form-group col-md-6">
                                <label for="input-select">Lieu delivrance</label>
                                <input name="lieu_delivrance" type="text" value="<?php echo $reservation_data['lieu_delivrance']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                            </div>

                            <div class="form-group col-md-6">
                                <label for="input-select">Date delivrance</label>
                                <input name="date_delivrance" type="date" value="<?php echo $reservation_data['date_delivrance']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                            </div>






                          </div>

                          <!-- row  5-->
                          <div class="row mt-3">

                            <div class="form-group">
                                <input name ="marque_vehicule" value="<?php echo $reservation_data['marque_vehicule'];?>" hidden>
                               </div>

                            <div class="form-group col-md-12">
                                <label  >Etat vehicule</label>
                                <select name = "etat_vehicule" class="form-control" id="input-select">
                                  <option value="<?php echo $reservation_data['etat_vehicule']; ?>">
                                              <?php echo $reservation_data['etat_vehicule']; ?>
                                  </option>
                                </select>
                               </div>



                            <div class="form-group ">
                                <input  hidden name="assurance" value="<?php echo $reservation_data['assurance']; ?>" type="number" class="form-control currency-inputmask" id="currency-mask" >
                            </div>



                          </div>


                                                                              <!-- row  6-->
                                                                      <div class="row mt-3">



                                                                               <div class="form-group col-md-2">
                                                                                   <label for="inputText3" >N°jours</label>
                                                                                   <input name="nb_jour"  value="<?php echo $reservation_data['nb_jour']; ?>" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                              </div>

                                                                              <div class="form-group col-md-2">
                                                                                  <label for="inputText3" >Date depart</label>
                                                                                  <input name="date_depart" value="<?php echo $reservation_data['date_depart']; ?>" type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                             </div>
                                                                             <div class="form-group col-md-2">
                                                                                 <label for="inputText3" >Heure depart</label>
                                                                                 <input name="heure_depart" type="text" value="<?php echo $reservation_data['heure_depart']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                                                                            </div>

                                                                                <div class="form-group col-md-2">
                                                                                      <label for="inputText3" >Date retour</label>
                                                                                      <input name="date_retour" type="date" value="<?php echo $reservation_data['date_retour']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                   </div>


                                                                                   <div class="form-group col-md-2">
                                                                                       <label for="inputText3" >Heure retour</label>
                                                                                       <input name="heure_retour" value="<?php echo $reservation_data['heure_retour']; ?>" type="text" class="form-control currency-inputmask" id="currency-mask" >

                                                                                  </div>

                                                                              </div>


                                                                              <!-- row  7-->




                                                                              <!-- row  8-->
                                                                        <div class="row mt-3">





                                                                          <div class="form-group">
                                                                              <input name="n_serie" hidden value="<?php echo $reservation_data['n_serie']; ?>" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                         </div>

                                                                              </div>
                          <div class="text-center mt-4">
                          <input name="update_reservation" type="submit" value="Modifier" class="btn btn-outline-success">
                        </div>


                        </form>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="text-center mt-2">
                        <input name="delete_reservation" type="submit" value="Suprimer" class="btn btn-outline-danger">
                      </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

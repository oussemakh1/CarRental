<?php

 include '../../Controllers/ClientController.php';
 include '../../Controllers/LocationController.php';
 include '../../Controllers/FactureController.php';
 include '../../Controllers/ReservationController.php';
 include '../../lib/DateFunc.php';
//Inherit client controller
 $clientController = new ClientController();

//Inherit reservation controller
$reservationController = new ReservationController();

 //Inherit location controller
 $locationController = new LocationController();

 //Inherit Facture Controller
 $factureController = new FactureController();

//Fetch car data
$marque_vehicule = $_GET['marque_vehicule'];
$n_serie = $_GET['n_serie'];

$reservation_id = $_GET['reservation_id'];
//Paginatin
require_once '../../lib/Pagination.php';
//Pagination modal
$Pagination = new Pagination('clients');
$clients = $Pagination->get_data();
$pages  = $Pagination->get_pagination_numbers();
$current_page = $Pagination->current_page();

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
    "paye_le"=>$_POST['paye_le'],
    "deja_regle_acompte"=>$_POST['deja_regle_acompte'],
    "date_acompte"=>$_POST['date_acompte'],
    "lieu_retour"=>$_POST['lieu_retour'],
    "remise"=>$_POST['remise'],
    "n_serie" => $_POST['n_serie']
  ];






    $insertCar = $locationController->insert_location($data);
    $changeReservationStatus = $reservationController->ReservationSuccess($reservation_id);

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

      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">

          <div class="tab-vertical">
              <ul class="nav nav-tabs" id="myTab3" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="home-vertical-tab" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="home" aria-selected="true">Client passager</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="profile-vertical-tab" data-toggle="tab" href="#profile-vertical" role="tab" aria-controls="profile" aria-selected="false">List clients</a>
                  </li>

              </ul>
              <div class="tab-content" id="myTabContent3">
                  <div class="tab-pane fade show active" id="home-vertical" role="tabpanel" aria-labelledby="home-vertical-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                                      <!-- row 1 -->
                                      <div class="row">
                                          <input name="date_fact" value="<?php echo date('l jS \of F Y h:i:s A');?>" type="text" hidden >

                                        <div class="form-group col-md-3">
                                            <label >Nom</label>
                                            <input name="nom" class="form-control" type="text" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Prenom</label>
                                            <input name="prenom" type="text" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Date naissance</label>
                                            <input name="date_naissance" type="date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="input-select">Address</label>
                                            <input name="adress" type="text" class="form-control" >

                                        </div>

                                      </div>
                                      <!-- row 2 -->
                                      <div class="row mt-2">

                                        <div class="form-group col-md-3">
                                            <label  >Code postal</label>
                                            <input name="code_postal" type="number" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >Ville</label>
                                            <input name="ville" type="text"  class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Pays
                                            </label>
                                            <input  name="pays" type="text" class="form-control currency-inputmask" id="currency-mask" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >telephone</label>
                                            <input name="telephone" type="number" class="form-control">
                                        </div>

                                      </div>


                                      <!-- row  3-->
                                      <div class="row mt-2">

                                        <div class="form-group col-md-4">
                                            <label  >email</label>
                                            <input name="email" type="email" class="form-control" >
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label >N°permis</label>
                                            <input name="n_permis" type="number" class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Date delivrance
                                            </label>
                                            <input name="date_delivrance" type="date" class="form-control currency-inputmask" id="currency-mask"  >
                                        </div>


                                      </div>




                                                                <!-- row  4-->
                                                                <div class="row mt-3">

                                                                  <div class="form-group col-md-3">
                                                                      <label for="input-select">Lieu delivrance</label>
                                                                      <input name="lieu_delivrance" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                  </div>

                                                                  <div class="form-group col-md-3">
                                                                      <label for="hue-demo">CIN</label>
                                                                      <input name="cin" type="number" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                                                  </div>

                                                                  <div class="form-group col-md-4">
                                                                      <label>Type client
                                                                      </label>
                                                                      <select name = "type_client" class="form-control" id="input-select">
                                                                        <option value="personel">Personel</option>
                                                                        <option value="societe">Societe</option>
                                                                        <option value="tourist">Tourist</option>
                                                                      </select>                                                      </div>


                                                                </div>

                                                                <!-- row  5-->
                                                                <div class="row mt-3">

                                                                  <div class="">
                                                                      <input name="marque_vehicule" type="text" value="<?php echo $marque_vehicule;?>" hidden>
                                                                </div>

                                                                  <div class="form-group col-md-4">
                                                                      <label  >Etat vehicule</label>
                                                                      <select name = "etat_vehicule" class="form-control" id="input-select">
                                                                        <option value="bon">Bon etat</option>
                                                                        <option value="mauvais">Mauvais etat</option>
                                                                        <option value="panne">En panne</option>
                                                                      </select>                                                      </div>

                                                                  <div class="form-group col-md-4">
                                                                      <label>Assurance
                                                                      </label>
                                                                      <input name="assurance" type="number" class="form-control currency-inputmask" id="currency-mask" >
                                                                  </div>
                                                                  <div class="form-group col-md-4">
                                                                      <label>Caution
                                                                      </label>
                                                                      <input name="caution" type="number" class="form-control currency-inputmask" id="currency-mask"  >
                                                                  </div>


                                                                </div>


                                                                                                                    <!-- row  6-->
                                                                                                            <div class="row mt-3">

                                                                                                                      <div class="form-group col-md-4">
                                                                                                                          <label for="inputText3" >Mode paiement</label>
                                                                                                                          <select name = "mode_paiement" class="form-control" id="input-select">
                                                                                                                              <option value="cheque">chèque</option>
                                                                                                                              <option value="virements bancaires">virements bancaires</option>
                                                                                                                              <option value="carte bancaire">carte bancaire</option>


                                                                                                                          </select>
                                                                                                                     </div>


                                                                                                                    <div class="form-group col-md-4">
                                                                                                                        <label for="inputText3" >Date depart</label>
                                                                                                                        <input name="date_depart" type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                   </div>
                                                                                                                   <div class="form-group col-md-4">
                                                                                                                       <label for="inputText3" >Heure depart</label>
                                                                                                                       <input name="heure_depart" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                  </div>

                                                                                                                      <div class="form-group col-md-4">
                                                                                                                            <label for="inputText3" >Date retour</label>
                                                                                                                            <input name="date_retour" type="date" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                         </div>


                                                                                                                         <div class="form-group col-md-4">
                                                                                                                             <label for="inputText3" >Heure retour</label>
                                                                                                                             <input name="heure_retour" type="text" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-4">
                                                                                                                            <label for="inputText3" >Prix ht</label>
                                                                                                                            <input name="prix_ht" type="number" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                       </div>

                                                                                                                       <div class="form-group col-md-6">
                                                                                                                           <label for="inputText3" >TVA</label>
                                                                                                                           <input name="tva" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                      </div>
                                                                                                                      <div class="form-group col-md-6">
                                                                                                                          <label for="inputText3" >Remise</label>
                                                                                                                          <input name="remise" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                     </div>

                                                                                                                      <div class="form-group col-md-3">
                                                                                                                          <input hidden name="prix_ttc" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                     </div>
                                                                                                                    </div>


                                                                                                                    <!-- row  7-->




                                                                                                                    <!-- row  8-->
                                                                                                              <div class="row mt-3">


                                                                                                                    <div class="form-group col-md-3">
                                                                                                                        <label for="inputText3" >Paye le</label>
                                                                                                                        <input name="paye_le" type="date" class="form-control currency-inputmask" id="currency-mask"  >

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
                                                                                                                     <input name="lieu_retour" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                </div>

                                                                                                                <div class="">
                                                                                                                    <input name="n_serie" type="text" value="<?php echo $n_serie;?>" hidden >

                                                                                                               </div>

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
                  <div class="tab-pane fade" id="profile-vertical" role="tabpanel" aria-labelledby="profile-vertical-tab">




                  <div class="row">
                      <!-- ============================================================== -->
                      <!-- data table  -->
                      <!-- ============================================================== -->
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="card">

                              <div class="card-body">
                                  <div class="table-responsive">
                                      <table id="example" class="table table-striped table-bordered second" style="width:100%">

                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-6">
                                              <div class="dt-buttons">
                                                <button class="btn btn-outline-light buttons-copy buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                  <span>Copy</span>
                                                </button>
                                                <button class="btn btn-outline-light buttons-excel buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                  <span>Excel</span>
                                                </button>
                                                <button class="btn btn-outline-light buttons-pdf buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                  <span>PDF</span>
                                                </button>
                                                <button class="btn btn-outline-light buttons-print" tabindex="0" aria-controls="example" type="button">
                                                  <span>Print</span>
                                                </button>

                                              </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                              <div id="example_filter" class="dataTables_filter">
                                              <input type="search" class="form-control form-control-sm" placeholder="search for somthing.." aria-controls="example">
                                              </div>
                                            </div>


                                          </div>


                                          <thead>
                                              <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Telephone</th>
                                                <th>CIN</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <!-- Search start -->
                                            <?php if(isset($_GET['search'])){?>

                                                <?php foreach($clientsSearch as $client): ?>
                                                  <tr>

                                                    <td><?php echo $client['nom']; ?></td>
                                                    <td><?php echo $client['prenom']; ?></td>
                                                    <td><?php echo $client['telephone']; ?></td>
                                                    <td>
                                                      <a href="Location_insertOldClient.php?id=<?php echo $client['cin']; ?>&marque_vehicule=<?php echo $marque_vehicule;?>&n_serie=<?php echo $n_serie;?>&reservation_id=<?php echo $reservation_id;?>">
                                                        <?php echo $client['cin']; ?>
                                                      </a>
                                                    </td>


                                                  </tr>
                                                <?php endforeach; ?>
                                              <?php }else{ ?>
                                                <?php foreach($clients as $client): ?>
                                                  <tr>

                                                    <td><?php echo $client['nom']; ?></td>
                                                    <td><?php echo $client['prenom']; ?></td>
                                                    <td><?php echo $client['telephone']; ?></td>
                                                    <td>
                                                      <a href="Location_insertOldClient.php?id=<?php echo $client['cin']; ?>&marque_vehicule=<?php echo $marque_vehicule;?>&n_serie=<?php echo $n_serie;?>">
                                                        <?php echo $client['cin']; ?>
                                                      </a>
                                                    </td>


                                                  </tr>
                                                <?php endforeach; ?>

                                              <?php } ?>
                                  >
                                          </tbody>


                                      </table>

                                      <!-- pagination -->
                                      <div class="row mt-3">

                                        <div class="col-sm-12 col-md-7">
                                          <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                          <ul class="pagination">
                                            <?php if($current_page>1): ?>

                                            <li class="paginate_button page-item previous " id="example_previous">
                                              <a href="#profile-vertical?page=<?php echo $current_page-1; ?>" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                           </li>

                                          <?php endif;?>

                                            <?php for($i=1;$i<=$pages;$i++):?>

                                            <li class="paginate_button page-item ">
                                              <a href="#profile-vertical?page=<?php echo $i; ?>" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a>
                                            </li>

                                          <?php endfor; ?>

                                          <?php if($current_page < $pages): ?>

                                          <li class="paginate_button page-item next" id="example_next">
                                            <a href="#profile-vertical?page=<?php echo $current_page+1; ?>" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                          </li>

                                        <?php endif; ?>

                                          </ul>
                                        </div>
                                      </div>
                                    </div>



                                </div>
                              </div>
                          </div>
                      </div>
                      <!-- ============================================================== -->
                      <!-- end data table  -->
                      <!-- ============================================================== -->
                  </div>
                  </div>

              </div>






                  </div>

              </div>
          </div>
      </div>


      </div>










        <!-- footer -->
        <?php include '../includes/footer.inc.php'; ?>

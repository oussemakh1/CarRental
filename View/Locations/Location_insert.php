<?php

 include '../../Controllers/ClientController.php';
 include '../../Controllers/LocationController.php';
 include '../../Controllers/FactureController.php';
 include '../../Controllers/ReservationController.php';
 include '../../paginations/Pagination.php';
 include '../../lib/Search.php';
 include_once '../../func/DateFunc.php';


//Inherit Search
$Search = new Search();


//Inherit reservation controller
$reservationController = new ReservationController();

 //Inherit location controller
 $locationController = new LocationController();

 //Inherit Facture Controller
 $factureController = new FactureController();

 if(isset($_GET['reservation_id'],$_GET['n_serie'],$_GET['marque_vehicule'])){
   $n_serie = $_GET['n_serie'];
   $marque_vehicule = $_GET['marque_vehicule'];
   $reservation_id = $_GET['reservation_id'];
   $reservation = $reservationController->getReservationById($reservation_id);
   $clientCin = $reservation['cin'];
   header("Location:Location_insertOldClient.php?id=$clientCin&marque_vehicule=$marque_vehicule&n_serie=$n_serie");
 }


elseif(isset($_GET['n_serie'],$_GET['marque_vehicule']))
{
//Fetch car data
$marque_vehicule = $_GET['marque_vehicule'];
$n_serie = $_GET['n_serie'];

if(isset($_GET['search'])){
  $key = $_GET['search'];
  $clientsSearch = $Search->ClientSearch($key);
}

//Pagination modal
$Pagination = new Pagination('clients');
$clients = $Pagination->get_data();
$pages  = $Pagination->get_pagination_numbers();
$current_page = $Pagination->current_page();

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
    <!-- Insert location -->
        <?php
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
        "n_serie" => $_POST['n_serie'],
        "prix_ttc" =>''

        ];

        //Validations
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $cin = $_POST['cin'];
            $date_depart = $_POST['date_depart'];
            $date_retour = $_POST['date_retour'];
            $deja_relgle_acompt = $_POST['deja_regle_acompte'];
            $date_acompte = $_POST['date_acompte'];

            if(strlen($nom) < 4 ) {
                lengthShouldBe(4,'Champ nom');
            }
            elseif(strlen($prenom) < 2) {
                lengthShouldBe(2,'Champ prenom');
            }
            elseif(strlen($cin) < 4) {
                lengthShouldBe(4,"Champ cin");
            }
            elseif($date_depart > $date_retour or $date_depart == $date_retour) {
                errorInValues("date retour doit etre superieur a date depart!");
            }
            elseif ($deja_relgle_acompt == 'Oui' && empty($date_acompte)) {
                errorInValues("s\'il vous plais tapez le date d\'acompte!");
            }
            else {
                $insertCar = $locationController->insert_location($data);
                //  $changeReservationStatus = $reservationController->ReservationSuccess($reservation_id);
            }
        }
        ?>
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
                                            <input name="nom" class="form-control" type="text" required >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Prenom</label>
                                            <input name="prenom" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Date naissance</label>
                                            <input name="date_naissance" type="date" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="input-select">Address</label>
                                            <input name="adress" type="text" class="form-control" required >

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
                                            <input name="ville" type="text"  class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Pays
                                            </label>
                                            <input  name="pays" type="text" required class="form-control currency-inputmask" id="currency-mask" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >telephone</label>
                                            <input name="telephone" required type="number" class="form-control">
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
                                            <input name="n_permis" required type="number" class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Date delivrance
                                            </label>
                                            <input name="date_delivrance" required type="date" class="form-control currency-inputmask" id="currency-mask"  >
                                        </div>


                                      </div>




                                                                <!-- row  4-->
                                                                <div class="row mt-3">

                                                                  <div class="form-group col-md-3">
                                                                      <label for="input-select">Lieu delivrance</label>
                                                                      <select name="lieu_delivrance"  class="form-control">
                                                                          <option value="agence">agence</option>
                                                                          <option value="aeroport">aeroport</option>
                                                                      </select>
                                                                  </div>

                                                                  <div class="form-group col-md-3">
                                                                      <label for="hue-demo">CIN</label>
                                                                      <input name="cin" required type="number" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
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
                                                                      <select name ="assurance" class="form-control" id="input-select">
                                                                        <option value="Tous risque">Tous risque</option>
                                                                        <option value="sans assarnce">sans assarnce</option>
                                                                        <option value="tiers">tiers</option>
                                                                      </select>
                                                                    </div>

                                                                  <div class="form-group col-md-4">
                                                                      <label>Caution
                                                                      </label>
                                                                      <input required name="caution" type="number" class="form-control currency-inputmask" id="currency-mask"  >
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
                                                                                                                        <input name="date_depart" type="date"  required class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                   </div>
                                                                                                                   <div class="form-group col-md-4">
                                                                                                                       <label for="inputText3" >Heure depart</label>
                                                                                                                       <input name="heure_depart" type="time" required class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                  </div>

                                                                                                                      <div class="form-group col-md-4">
                                                                                                                            <label for="inputText3" >Date retour</label>
                                                                                                                            <input name="date_retour" type="date" required class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                         </div>


                                                                                                                         <div class="form-group col-md-4">
                                                                                                                             <label for="inputText3" >Heure retour</label>
                                                                                                                             <input name="heure_retour"  required type="time" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-4">
                                                                                                                            <label for="inputText3" >Prix ht</label>
                                                                                                                            <input name="prix_ht" type="number" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                       </div>

                                                                                                                       <div class="form-group col-md-6">
                                                                                                                           <label for="inputText3" >TVA</label>
                                                                                                                           <select name="tva"  class="form-control">
                                                                                                                               <option value="0" selected="selected">0%</option>
                                                                                                                               <option value="1">1%</option>
                                                                                                                               <option value="2">2%</option>
                                                                                                                               <option value="3">3%</option>
                                                                                                                               <option value="4">4%</option>
                                                                                                                               <option value="5">5%</option>
                                                                                                                               <option value="6">6%</option>
                                                                                                                               <option value="7">7%</option>
                                                                                                                               <option value="8">8%</option>
                                                                                                                               <option value="9">9%</option>
                                                                                                                               <option value="10">10%</option>
                                                                                                                               <option value="11">11%</option>
                                                                                                                               <option value="12">12%</option>
                                                                                                                               <option value="13">13%</option>
                                                                                                                               <option value="14">14%</option>
                                                                                                                               <option value="15">15%</option>
                                                                                                                               <option value="16">16%</option>
                                                                                                                               <option value="17">17%</option>
                                                                                                                               <option value="18">18%</option>
                                                                                                                               <option value="19">19%</option>
                                                                                                                               <option value="20">20%</option>
                                                                                                                               <option value="21">21%</option>
                                                                                                                               <option value="22">22%</option>
                                                                                                                               <option value="23">23%</option>
                                                                                                                               <option value="24">24%</option>
                                                                                                                               <option value="25">25%</option>
                                                                                                                               <option value="26">26%</option>
                                                                                                                               <option value="27">27%</option>
                                                                                                                               <option value="28">28%</option>
                                                                                                                               <option value="29">29%</option>
                                                                                                                               <option value="30">30%</option>
                                                                                                                               <option value="31">31%</option>
                                                                                                                               <option value="32">32%</option>
                                                                                                                               <option value="33">33%</option>
                                                                                                                               <option value="34">34%</option>
                                                                                                                               <option value="35">35%</option>
                                                                                                                               <option value="36">36%</option>
                                                                                                                               <option value="37">37%</option>
                                                                                                                               <option value="38">38%</option>
                                                                                                                               <option value="39">39%</option>
                                                                                                                               <option value="40">40%</option>
                                                                                                                               <option value="41">41%</option>
                                                                                                                               <option value="42">42%</option>
                                                                                                                               <option value="43">43%</option>
                                                                                                                               <option value="44">44%</option>
                                                                                                                               <option value="45">45%</option>
                                                                                                                               <option value="46">46%</option>
                                                                                                                               <option value="47">47%</option>
                                                                                                                               <option value="48">48%</option>
                                                                                                                               <option value="49">49%</option>
                                                                                                                               <option value="50">50%</option>
                                                                                                                               <option value="51">51%</option>
                                                                                                                               <option value="52">52%</option>
                                                                                                                               <option value="53">53%</option>
                                                                                                                               <option value="54">54%</option>
                                                                                                                               <option value="55">55%</option>
                                                                                                                               <option value="56">56%</option>
                                                                                                                               <option value="57">57%</option>
                                                                                                                               <option value="58">58%</option>
                                                                                                                               <option value="59">59%</option>
                                                                                                                               <option value="60">60%</option>
                                                                                                                               <option value="61">61%</option>
                                                                                                                               <option value="62">62%</option>
                                                                                                                               <option value="63">63%</option>
                                                                                                                               <option value="64">64%</option>
                                                                                                                               <option value="65">65%</option>
                                                                                                                               <option value="66">66%</option>
                                                                                                                               <option value="67">67%</option>
                                                                                                                               <option value="68">68%</option>
                                                                                                                               <option value="69">69%</option>
                                                                                                                               <option value="70">70%</option>
                                                                                                                               <option value="71">71%</option>
                                                                                                                               <option value="72">72%</option>
                                                                                                                               <option value="73">73%</option>
                                                                                                                               <option value="74">74%</option>
                                                                                                                               <option value="75">75%</option>
                                                                                                                               <option value="76">76%</option>
                                                                                                                               <option value="77">77%</option>
                                                                                                                               <option value="78">78%</option>
                                                                                                                               <option value="79">79%</option>
                                                                                                                               <option value="80">80%</option>
                                                                                                                               <option value="81">81%</option>
                                                                                                                               <option value="82">82%</option>
                                                                                                                               <option value="83">83%</option>
                                                                                                                               <option value="84">84%</option>
                                                                                                                               <option value="85">85%</option>
                                                                                                                               <option value="86">86%</option>
                                                                                                                               <option value="87">87%</option>
                                                                                                                               <option value="88">88%</option>
                                                                                                                               <option value="89">89%</option>
                                                                                                                               <option value="90">90%</option>
                                                                                                                               <option value="91">91%</option>
                                                                                                                               <option value="92">92%</option>
                                                                                                                               <option value="93">93%</option>
                                                                                                                               <option value="94">94%</option>
                                                                                                                               <option value="95">95%</option>
                                                                                                                               <option value="96">96%</option>
                                                                                                                               <option value="97">97%</option>
                                                                                                                               <option value="98">98%</option>
                                                                                                                               <option value="99">99%</option>
                                                                                                                               <option value="100">100%</option>
                                                                                                                           </select>

                                                                                                                      </div>
                                                                                                                      <div class="form-group col-md-6">
                                                                                                                          <label for="inputText3" >Remise</label>
                                                                                                                          <select name="remise"  class="form-control">
                                                                                                                              <option value="0" selected="selected">0%</option>
                                                                                                                              <option value="1">1%</option>
                                                                                                                              <option value="2">2%</option>
                                                                                                                              <option value="3">3%</option>
                                                                                                                              <option value="4">4%</option>
                                                                                                                              <option value="5">5%</option>
                                                                                                                              <option value="6">6%</option>
                                                                                                                              <option value="7">7%</option>
                                                                                                                              <option value="8">8%</option>
                                                                                                                              <option value="9">9%</option>
                                                                                                                              <option value="10">10%</option>
                                                                                                                              <option value="11">11%</option>
                                                                                                                              <option value="12">12%</option>
                                                                                                                              <option value="13">13%</option>
                                                                                                                              <option value="14">14%</option>
                                                                                                                              <option value="15">15%</option>
                                                                                                                              <option value="16">16%</option>
                                                                                                                              <option value="17">17%</option>
                                                                                                                              <option value="18">18%</option>
                                                                                                                              <option value="19">19%</option>
                                                                                                                              <option value="20">20%</option>
                                                                                                                              <option value="21">21%</option>
                                                                                                                              <option value="22">22%</option>
                                                                                                                              <option value="23">23%</option>
                                                                                                                              <option value="24">24%</option>
                                                                                                                              <option value="25">25%</option>
                                                                                                                              <option value="26">26%</option>
                                                                                                                              <option value="27">27%</option>
                                                                                                                              <option value="28">28%</option>
                                                                                                                              <option value="29">29%</option>
                                                                                                                              <option value="30">30%</option>
                                                                                                                              <option value="31">31%</option>
                                                                                                                              <option value="32">32%</option>
                                                                                                                              <option value="33">33%</option>
                                                                                                                              <option value="34">34%</option>
                                                                                                                              <option value="35">35%</option>
                                                                                                                              <option value="36">36%</option>
                                                                                                                              <option value="37">37%</option>
                                                                                                                              <option value="38">38%</option>
                                                                                                                              <option value="39">39%</option>
                                                                                                                              <option value="40">40%</option>
                                                                                                                              <option value="41">41%</option>
                                                                                                                              <option value="42">42%</option>
                                                                                                                              <option value="43">43%</option>
                                                                                                                              <option value="44">44%</option>
                                                                                                                              <option value="45">45%</option>
                                                                                                                              <option value="46">46%</option>
                                                                                                                              <option value="47">47%</option>
                                                                                                                              <option value="48">48%</option>
                                                                                                                              <option value="49">49%</option>
                                                                                                                              <option value="50">50%</option>
                                                                                                                              <option value="51">51%</option>
                                                                                                                              <option value="52">52%</option>
                                                                                                                              <option value="53">53%</option>
                                                                                                                              <option value="54">54%</option>
                                                                                                                              <option value="55">55%</option>
                                                                                                                              <option value="56">56%</option>
                                                                                                                              <option value="57">57%</option>
                                                                                                                              <option value="58">58%</option>
                                                                                                                              <option value="59">59%</option>
                                                                                                                              <option value="60">60%</option>
                                                                                                                              <option value="61">61%</option>
                                                                                                                              <option value="62">62%</option>
                                                                                                                              <option value="63">63%</option>
                                                                                                                              <option value="64">64%</option>
                                                                                                                              <option value="65">65%</option>
                                                                                                                              <option value="66">66%</option>
                                                                                                                              <option value="67">67%</option>
                                                                                                                              <option value="68">68%</option>
                                                                                                                              <option value="69">69%</option>
                                                                                                                              <option value="70">70%</option>
                                                                                                                              <option value="71">71%</option>
                                                                                                                              <option value="72">72%</option>
                                                                                                                              <option value="73">73%</option>
                                                                                                                              <option value="74">74%</option>
                                                                                                                              <option value="75">75%</option>
                                                                                                                              <option value="76">76%</option>
                                                                                                                              <option value="77">77%</option>
                                                                                                                              <option value="78">78%</option>
                                                                                                                              <option value="79">79%</option>
                                                                                                                              <option value="80">80%</option>
                                                                                                                              <option value="81">81%</option>
                                                                                                                              <option value="82">82%</option>
                                                                                                                              <option value="83">83%</option>
                                                                                                                              <option value="84">84%</option>
                                                                                                                              <option value="85">85%</option>
                                                                                                                              <option value="86">86%</option>
                                                                                                                              <option value="87">87%</option>
                                                                                                                              <option value="88">88%</option>
                                                                                                                              <option value="89">89%</option>
                                                                                                                              <option value="90">90%</option>
                                                                                                                              <option value="91">91%</option>
                                                                                                                              <option value="92">92%</option>
                                                                                                                              <option value="93">93%</option>
                                                                                                                              <option value="94">94%</option>
                                                                                                                              <option value="95">95%</option>
                                                                                                                              <option value="96">96%</option>
                                                                                                                              <option value="97">97%</option>
                                                                                                                              <option value="98">98%</option>
                                                                                                                              <option value="99">99%</option>
                                                                                                                              <option value="100">100%</option>
                                                                                                                          </select>

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
                                                                                                                     <select name="lieu_retour"  class="form-control">
                                                                                                                         <option value="agence">agence</option>
                                                                                                                         <option value="aeroport">aeroport</option>
                                                                                                                     </select>
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

                                            <!--
                                            <div class="col-sm-12 col-md-6">
                                                <form action="<?php //$_SERVER['PHP_SELF'];?>" method="GET">
                                                    <div id="example_filter" class="dataTables_filter">
                                                        <input type="search" name="search" class="form-control form-control-sm" placeholder="chercher quelque chose..." aria-controls="example">
                                                    </div>
                                                </form>
                                            </div>
                                            -->

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

                                                    <td>
                                                        <a href="Location_insertOldClient.php?id=<?php echo $client['cin']; ?>&marque_vehicule=<?php echo $marque_vehicule;?>&n_serie=<?php echo $n_serie;?>&reservation_id=<?php echo $reservation_id;?>">
                                                            <?php echo $client['nom']; ?>
                                                        </a>

                                                    </td>
                                                    <td><?php echo $client['prenom']; ?></td>
                                                    <td><?php echo $client['telephone']; ?></td>
                                                    <td><?php echo $client['cin']; ?></td>


                                                  </tr>
                                                <?php endforeach; ?>
                                              <?php }else{ ?>
                                                <?php foreach($clients as $client): ?>
                                                  <tr>

                                                    <td>
                                                        <a href="Location_insertOldClient.php?id=<?php echo $client['cin']; ?>&marque_vehicule=<?php echo $marque_vehicule;?>&n_serie=<?php echo $n_serie;?>">
                                                            <?php echo $client['nom']; ?>
                                                        </a>
                                                    </td>

                                                    <td><?php echo $client['prenom']; ?></td>
                                                    <td><?php echo $client['telephone']; ?></td>
                                                    <td> <?php echo $client['cin']; ?> </td>


                                                  </tr>
                                                <?php endforeach; ?>

                                              <?php } ?>
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

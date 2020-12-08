<?php

//Location Controller
include '../../Controllers/LocationController.php';

//Facture Controller
include '../../Controllers/FactureController.php';

//Inherit location controller
$locationController = new LocationController();

//Inherit Facture controller
$factureController = new FactureController();


if(isset($_GET['location_id'])){

  $id = $_GET['location_id'];

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
        "prix_ttc" =>  $_POST['prix_ttc']

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
        <?php
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
                        "prix_ttc" =>  $_POST['prix_ttc']

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
            $Location_edit = $locationController->update_location($id, $data);
        }



        }
        ?>
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

                            <div class="form-group col-md-12">
                                <label for="input-select">Lieu delivrance</label>
                                <select name="lieu_delivrance"  class="form-control">
                                    <option value="<?php echo $location_data['lieu_delivrance']; ?>"><?php echo $location_data['lieu_delivrance']; ?></option>
                                    <option value="agence">agence</option>
                                    <option value="aeroport">aeroport</option>
                                </select>

                            </div>


                              <input value="<?php echo $location_data['type_client'];?>" name="type_client" hidden >

                            </div>


                          <!-- row  5-->
                          <div class="row mt-3">

                            <div class="form-group ">
                                  <input hidden name="marque_vehicule" value="<?php echo $location_data['marque_vehicule'];?>" class="form-control" id="input-select">

                               </div>

                            <div class="form-group col-md-3">
                                <label  >Etat vehicule</label>
                                <select name = "etat_vehicule" class="form-control" id="input-select">
                                  <option value="<?php echo $location_data['etat_vehicule']; ?>">
                                              <?php echo $location_data['etat_vehicule']; ?>
                                  </option>
                                </select>
                               </div>

                            <div class="form-group col-md-3">
                              <label>Assurance </label>
                                <select name ="assurance" class="form-control" id="input-select">
                                  <option value="<?php echo $location_data['assurance']; ?>"><?php echo $location_data['assurance']; ?></option>
                                  <option value="Tous risque">Tous risque</option>
                                  <option value="sans assarnce">sans assarnce</option>
                                  <option value="tiers">tiers</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Caution
                                </label>
                                <input name="caution" value="<?php echo $location_data['caution']; ?>" type="number" class="form-control currency-inputmask" id="currency-mask"  >
                            </div>
                            <div class="form-group col-md-3">
                                <label>Date delivrance
                                </label>
                                <input name="date_delivrance" value="<?php echo $location_data['date_delivrance']; ?>" type="date" class="form-control currency-inputmask" id="currency-mask"  >
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
                                                                                 <input name="heure_depart" type="time" value="<?php echo $location_data['heure_depart']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                                                                            </div>

                                                                                <div class="form-group col-md-3">
                                                                                      <label for="inputText3" >Date retour</label>
                                                                                      <input name="date_retour" type="date" value="<?php echo $location_data['date_retour']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                   </div>


                                                                                   <div class="form-group col-md-3">
                                                                                       <label for="inputText3" >Heure retour</label>
                                                                                       <input name="heure_retour" value="<?php echo $location_data['heure_retour']; ?>" type="time" class="form-control currency-inputmask" id="currency-mask" >

                                                                                  </div>

                                                                                  <div class="form-group col-md-3">
                                                                                      <label for="inputText3" >Prix ht</label>
                                                                                      <input name="prix_ht" type="number" value="<?php echo $location_data['prix_ht']; ?>" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                 </div>
                                                                                 <div class="form-group col-md-3">
                                                                                     <label for="inputText3" >Remise</label>
                                                                                     <select name="remise"  class="form-control">
                                                                                         <?php if($location_data['remise']) { ?>
                                                                                         <option selected="selected" value="<?php echo $location_data['remise']; ?>"><?php echo $location_data['remise']; ?></option>
                                                                                         <option value="0">0%</option>
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
                                                                                         <?php }else { ?>
                                                                                         <option value="0">0%</option>
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
                                                                                         <?php } ?>
                                                                                     </select>


                                                                                 </div>
                                                                                 <div class="form-group col-md-12">
                                                                                     <label for="inputText3" >TVA</label>
                                                                                     <select name="tva"  class="form-control">
                                                                                         <?php if($location_data['tva']) { ?>
                                                                                             <option selected="selected" value="<?php echo $location_data['tva']; ?>"><?php echo $location_data['tva']; ?></option>
                                                                                             <option value="0">0%</option>
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
                                                                                         <?php }else { ?>
                                                                                             <option value="0">0%</option>
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
                                                                                         <?php } ?>
                                                                                     </select>

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
                                                                               <select name="lieu_retour"  class="form-control">
                                                                                   <option value="<?php echo $location_data['lieu_retour']; ?>"><?php echo $location_data['lieu_retour']; ?></option>
                                                                                   <option value="agence">agence</option>
                                                                                   <option value="aeroport">aeroport</option>
                                                                               </select>

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

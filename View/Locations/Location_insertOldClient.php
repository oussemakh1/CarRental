<?php

if(isset($_GET['id'],$_GET['marque_vehicule'],$_GET['n_serie'])){

  //Client Controller
  include '../../Controllers/ClientController.php';
  //Location Controller
  include '../../Controllers/LocationController.php';
  //Reservation controller
  include '../../Controllers/ReservationController.php';


  // inherit clients controller
  $clientController = new ClientController();


  // inherit location controller
  $locationController = new LocationController();


  //Get car data
  $marque_vehicule = $_GET['marque_vehicule'];
  $n_serie = $_GET['n_serie'];
  $cin = $_GET['id'];

  $find_Client = $clientController->getClientByCin($cin);

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
  $type_client = $find_Client['type_client'];


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
                        "prix_ttc"=>getTotal($_POST['remise'],$_POST['prix_ht'],$_POST['tva']),
                        "paye_le"=>$_POST['paye_le'],
                        "deja_regle_acompte"=>$_POST['deja_regle_acompte'],
                        "date_acompte"=>$_POST['date_acompte'],
                        "lieu_retour"=>$_POST['lieu_retour'],
                        "remise"=>$_POST['remise'],
                        "n_serie"=>$_POST['n_serie']
                    ];

                    //Validations
                    $date_depart = $_POST['date_depart'];
                    $date_retour = $_POST['date_retour'];
                    $deja_relgle_acompt = $_POST['deja_regle_acompte'];
                    $date_acompte = $_POST['date_acompte'];

                    if($date_depart > $date_retour or $date_depart == $date_retour) {
                        errorInValues("date retour doit etre superieur a date depart!");
                    }
                    elseif ($deja_relgle_acompt == 'Oui' && empty($date_acompte)) {
                        errorInValues("s\'il vous plais tapez le date d\'acompte!");
                    }
                    else {

                       if(isset($_GET['reservation_id'])){
                            $reservation_id = $_GET['reservation_id'];
                            $reservationController = new ReservationController();
                            $changeReservationStatus = $reservationController->ReservationSuccess($reservation_id);
                        } 

                       $locationController = new LocationController();
                       $insertCar = $locationController->insert_location($data); 

                    }




                }
                ?>
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
                                <input name="date_naissance" value="<?php echo $date_naissance; ?>" type="date" class="form-control"hidden >
                            </div>
                            <div >
                                <input name="adress" value="<?php echo $adress; ?>" type="text" class="form-control" hidden >

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

                              <input  name="type_client" type="text"  value="<?php echo $type_client;?> "class="form-control" hidden>
                              <input name="marque_vehicule" type="text" value="<?php echo $marque_vehicule; ?>" hidden>

                          </div>




                          <!-- row  4-->
                          <div class="row">

                            <div class="form-group col-md-6">
                                <label for="input-select">Lieu delivrance</label>
                                <select name="lieu_delivrance"  class="form-control">
                                    <option value="agence">agence</option>
                                    <option value="aeroport">aeroport</option>
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="input-select">Date delivrance</label>
                                <input name="date_delivrance" type="date" required class="form-control ">

                            </div>

                          </div>

                          <!-- row  5-->
                          <div class="row mt-3">

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
                                <select name="assurance" class="form-control">
                                  <option value="Tous_risque">Tous risque</option>
                                  <option value="sans_assarnce">sans assarnce</option>
                                  <option value="tiers">tiers</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Caution</label>
                                <input name="caution" type="number" class="form-control" required>
                            </div>


                          </div>


                            <!-- row  6-->
                            <div class="row mt-3">
                                <div class="form-group col-md-3">
                                    <label for="inputText3" >Mode paiement</label>
                                    <select name="mode_paiement" class="form-control">
                                        <option value="cheque">chèque</option>
                                        <option value="virements bancaires">virements bancaires</option>
                                        <option value="carte bancaire">carte bancaire</option>
                                        <option value="espèce">espèce</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputText3" >Date depart</label>
                                    <input name="date_depart"  type="date" class="form-control" required >
                                 </div>
                                <div class="form-group col-md-3">
                                    <label for="inputText3" >Heure depart</label>
                                    <input name="heure_depart"  type="time" class="form-control" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputText3" >Date retour</label>
                                    <input name="date_retour" type="date" class="form-control" required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="inputText3" >Heure retour</label>
                                    <input name="heure_retour" type="time" class="form-control" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputText3" >Prix ht</label>
                                    <input name="prix_ht" type="number" class="form-control" required >
                                </div>
                                <input type="number" name="prix_ttc" hidden>
                                <div class="form-group col-md-3">
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
                                        <option value="96">96%</option><option value="97">97%</option>
                                        <option value="98">98%</option>
                                        <option value="99">99%</option>
                                        <option value="100">100%</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
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
                                        <option value"71">71%</option>
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
                                    <input name="paye_le" type="date" class="form-control" required >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputText3" >Deja régle acompte</label>
                                    <select name="deja_regle_acompte" class="form-control" >
                                        <option value="Oui">Oui</option>
                                        <option value="Non">Non</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputText3" >Date acompte</label>
                                     <input name="date_acompte" value="00-00-00" type="date" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputText3" >Lieu retour</label>
                                    <select name="lieu_retour"  class="form-control">
                                        <option value="agence">agence</option>
                                        <option value="aeroport">aeroport</option>
                                    </select>
                                </div>

                                <input name="n_serie" type="text" value="<?php echo $n_serie; ?>" hidden  >
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

<?php

  //Cars Controller
  include '../../Controllers/CarsController.php';
  //Fournisseur Controller
  include '../../Controllers/FournisseurController.php';

  //Fournisseur Controller
  $fournisseurs = new FournisseurController();
  //Car Controller
  $carController = new CarsController();

$fournisseur_list = $fournisseurs->getAllFournisseurByService('vente');

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

        <!-- basic form  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Insert Vehicule -->
            <?php
              if(isset($_POST['insert_car']))
              {

                $prix_achat_ttc =  $_POST['prix_achat_ht'] * (1 + ($_POST['tva'] / 100));
                $data = [


                    "fournisseur" =>$_POST['fournisseur'],
                    "marque"=>$_POST['marque'],
                    "model"=>$_POST['model'],
                    "carburant"=>$_POST['carburant'],
                    "date_achat"=>$_POST['date_achat'],
                    "duree_vie" =>$_POST['duree_vie'],
                    "nb_km_avant_revision"=>$_POST['nb_km_avant_revision'],
                    "prix_achat_ht" =>$_POST['prix_achat_ht'],
                    "montant_traites_mensuel"=>$_POST['montant_traites_mensuel'],
                    "nombre_traites" =>$_POST['nombre_traites'],
                    "num_facture_fournisseur" =>$_POST['num_facture_fournisseur'],
                    "color"=>$_POST['color'],
                    "type_vehicule"=>$_POST['type_vehicule'],
                    "n_assurance"=>$_POST['n_assurance'],
                    "detail_reparation"=>$_POST['detail_reparation'],
                    "n_serie" =>$_POST['n_serie'],
                    "carte_grise" =>$_POST['carte_grise'],
                    "prix_achat_ttc"=>$prix_achat_ttc,
                    "tva"=>$_POST['tva']
                ];
                //Change to string
                $fournisseur = strval($data['fournisseur']);
                if(strlen($fournisseur) < 37) {
                    shouldNotBeEmpty("s\'il vous plais inserée un fournisseur de vente!");
                }
                else {
                   $carController->insertCar($data);
                  // print_r($data);
                }


            }
            ?>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if(isset($_GET['error'])) { error_message($_GET['error']); }  ?>

                <div class="card">
                    <h5 class="card-header">Insertion vehicule</h5>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                          <!-- row 1 -->
                          <div class="row">

                            <div class="form-group col-md-3">
                                <label for="input-select">Fournisseur</label>
                                <select name="fournisseur" class="form-control" id="input-select">
                                    <?php
                                      if(!empty($fournisseur_list)):
                                       foreach($fournisseur_list as $fournisseur): ?>
                                        <option selected value="<?php if(!empty($fournisseur)){
                                          echo $fournisseur['societe'];
                                      }else{
                                        echo $fournisseur['civilite'];
                                      } ?>
                                      "><?php if(!empty($fournisseur)){
                                        echo $fournisseur['societe'];
                                      }else{
                                        echo $fournisseur['civilite'];
                                      } ?>
                                      </option>
                                  <?php endforeach; endif;?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Marque</label>
                                <input name="marque" type="text"  required placeholder="marque vehicule ..." class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Model</label>
                                <input name="model" type="text" class="form-control" required placeholder="model vehicule ...">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="input-select">Carburant</label>
                                <select  name="carburant" class="form-control" >
                                          <option value="Essence">Essence</option>
                                          <option value="Diesel">Diesel</option>
                                          <option value="Hybride">Hybride</option>
                                </select>
                            </div>

                          </div>
                          <!-- row 2 -->
                          <div class="row mt-2">

                            <div class="form-group col-md-3">
                                <label  >Durée de vie</label>
                                <input name="duree_vie" type="number" value="0" class="form-control" placeholder="durée de vie ...">
                            </div>
                            <div class="form-group col-md-3">
                                <label >Date achat</label>
                                <input name="date_achat" type="date"  required class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Traites mensuel</label>
                                <input  name="montant_traites_mensuel" type="number" value="0"  class="form-control"  placeholder="Montant traites mensuel...">
                            </div>
                            <div class="form-group col-md-3">
                                <label >N°traites</label>
                                <input name="nombre_traites" type="number" value="0" placeholder="nombre des traites" class="form-control">
                            </div>

                          </div>


                          <!-- row  3-->
                          <div class="row mt-2">

                            <div class="form-group col-md-6">
                                <label  >Prix d'achat HT</label>
                                <input name="prix_achat_ht" type="number" required class="form-control" placeholder="prix d'achat hors tva...">
                            </div>

                            <div class="form-group col-md-6">
                                <label >TVA</label>
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

                          </div>
                            <!-- row  4-->
                            <div class="row mt-3">
                                <div class="form-group col-md-3">
                                    <label for="input-select">Type vehicule</label>
                                    <select name="type_vehicule" class="form-control" >
                                        <option value="Economy">Economy</option>
                                        <option value="Mini">Mini</option>
                                        <option value="Citadine">Citadine</option>
                                        <option value="Compact">Compact</option>
                                        <option value="Familial">Familial</option>
                                        <option value="Special">Special</option>
                                        <option value="Berline">Berline</option>
                                        <option value="SUV Crossover">SUV Crossover</option>
                                        <option value="SUV Urbain">SUV Urbain</option>
                                        <option value="PICK UP">PICK UP</option>
                                        <option value="Monospaces">Monospaces</option>
                                        <option value="MINIVAN">MINIVAN</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hue-demo">Color</label>
                                    <input name="color" type="text" class="form-control"  required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>N°km</label>
                                    <input name="nb_km_avant_revision"   type="number" class="form-control"  placeholder="N°km avant revision..." >
                                </div>
                            </div>
                            <!-- row  5-->
                            <div class="row mt-3">
                                <div class="form-group col-md-3">
                                    <label >Carte grise </label>
                                    <input name="carte_grise" type="text"  class="form-control" placeholder="carte grise...">
                                </div>
                                <div class="form-group col-md-3">
                                    <label  >N°assurance</label>
                                    <input name="n_assurance" type="text"  class="form-control" placeholder="N°assurance">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>N°serie</label>
                                    <input name="n_serie" type="text" class="form-control" required placeholder="N° serie ..." >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>N°facture</label>
                                    <input name="num_facture_fournisseur"  type="number" class="form-control" placeholder="N°facture fournisseur..." >
                                </div>
                            </div>
                            <!-- row  6-->
                            <div class="row mt-3">
                                <div class="form-group col-md-12">
                                    <label for="inputText3" >Detail reparation </label>
                                    <textarea  name="detail_reparation"   type="text" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <input name="insert_car" type="submit" value="Inserée" class="btn btn-outline-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic form  -->


        <!-- footer -->
        <?php include '../includes/footer.inc.php'; ?>

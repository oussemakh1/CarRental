<?php

if(isset($_GET['id']))
{
  //Repatartion controller
  include '../../Controllers/ReparationController.php';
  //Car Controller
  include '../../Controllers/CarsController.php';

  //Contravention Controller
  include '../../Controllers/ContraventionController.php';



  //Inherit reparation controller
  $reparationController = new ReparationController();
  //Inherit cars Controller
  $carsController = new CarsController();
  //Inherit Contravention controller
  $contraventionController= new ContraventionController();

  $id = $_GET['id'];


  //Get car info
  $car_info = $carsController->getCarById($id);

  $marque_vehicule = $car_info['marque'];
  $model = $car_info['model'];
  $n_serie = $car_info['n_serie'];


  //Get Mecaniciens
  $mecaniciens = $reparationController->Mecaniciens();


  if(isset($_POST['insert_reparation'])){

    $data = [

      "mecanicien"=>$_POST['mecanicien'],
      "marque"=>$_POST['marque_vehicule'],
      "model"=>$_POST['model'],
      "date_mise_circulation"=>$_POST['date_mise_circulation'],
      "date_entree_garage" =>$_POST['date_entree_garage'],
      "date_sortie_garage"=>$_POST['date_sortie_garage'],
      "montant" => $_POST['montant'],
      "panne"=>$_POST['panne'],
      "n_serie"=>$_POST['n_serie']

    ];

    $reparationController->reparation_insert($data);

  }

  if(isset($_POST['insert_contravention']))
  {
    $data = [

      "date_enregistrement" =>$_POST['date_enregistrement'],
      "avis_contravention"=>$_POST['avis_contravention'],
      "date_contravention"=>$_POST['date_contravention'],
      "nature_contravention"=>  $_POST['nature_contravention'],
      "lieu_infraction"=>    $_POST['lieu_infraction'],
      "commune_infraction" => $_POST['commune_infraction'],
      "montant_infraction" =>$_POST['montant_infraction'],
      "observation" =>   $_POST['observation'],
      "n_serie" =>   $n_serie


    ];

    $insertContravention = $contraventionController->contraventionInsert($data);
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
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
          <?php if(isset($_GET['error'])) { error_message($_GET['error']); }  ?>
          <div class="tab-vertical">
              <ul class="nav nav-tabs" id="myTab3" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="home-vertical-tab" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="home" aria-selected="true">Reparation</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="profile-vertical-tab" data-toggle="tab" href="#profile-vertical" role="tab" aria-controls="profile" aria-selected="false">Contravention</a>
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
                                        <div class="form-group">

                                            <input hidden name="marque_vehicule" value="<?php echo $marque_vehicule;?>" class="form-control" type="text" >
                                        </div>
                                        <div class="form-group">
                                            <input hidden name="model" value="<?php echo $model;?>" type="text" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Date mise circulation</label>
                                            <input name="date_mise_circulation" type="date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input-select">Date entreé garage</label>
                                            <input name="date_entree_garage" type="date" class="form-control" >

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input-select">Date sortie garage</label>
                                            <input name="date_sortie_garage" type="date" class="form-control" >

                                        </div>

                                      </div>
                                      <!-- row 2 -->
                                      <div class="row mt-2">

                                        <div class="form-group ">
                                            <input  hidden name="n_serie" type="text" value="<?php echo $n_serie;?>" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label >Mecanicien</label>
                                              <select name="mecanicien" class="form-control">
                                                <?php foreach($mecaniciens as $mecanicien): ?>
                                                  <option
                                                  value="<?php if(!empty($mecanicien['societe'])){ echo $mecanicien['societe'];}else{echo $mecanicien['civilite'];}?>">
                                                  <?php if(!empty($mecanicien['societe'])){ echo $mecanicien['societe'];}else{echo $mecanicien['civilite'];}?>
                                                  </option>
                                                <?php endforeach;?>
                                              </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Montant
                                            </label>
                                            <input  name="montant" type="number" class="form-control currency-inputmask" id="currency-mask" >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label >Panne</label>
                                            <input name="panne" type="text" class="form-control">
                                        </div>

                                      </div>









                                                                <div class="text-center mt-4">
                                                                <input name="insert_reparation" type="submit" value="Inseré" class="btn btn-outline-success">
                                                              </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile-vertical" role="tabpanel" aria-labelledby="profile-vertical-tab">




                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                                      <!-- row 1 -->
                                      <div class="row">


                                        <div class="form-group col-md-4">
                                            <label>Date enregistrement</label>
                                            <input name="date_enregistrement" type="date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input-select">Date contravention</label>
                                            <input name="date_contravention" type="date" class="form-control" >

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input-select">Nature contravention</label>
                                            <input name="nature_contravention" type="text" class="form-control" >

                                        </div>

                                      </div>
                                      <!-- row 2 -->
                                      <div class="row mt-2">



                                        <div class="form-group col-md-4">
                                            <label>Lieu infraction
                                            </label>
                                            <input  name="lieu_infraction" type="text" class="form-control currency-inputmask" id="currency-mask" >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label >Commune infraction</label>
                                            <input name="commune_infraction" type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Montant infraction
                                            </label>
                                            <input  name="montant_infraction" type="text" class="form-control currency-inputmask" id="currency-mask" >
                                        </div>

                                      </div>


                                      <!-- row 2 -->
                                      <div class="row mt-2">




                                        <div class="form-group col-md-12">
                                            <label >Observation</label>
                                            <input name="observation" type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label >Avis contravention</label>
                                            <input name="avis_contravention" type="text" class="form-control">
                                        </div>

                                      </div>









                                                                <div class="text-center mt-4">
                                                                <input name="insert_contravention" type="submit" value="Inseré" class="btn btn-outline-success">
                                                              </div>


                                    </form>
                                </div>
                            </div>
                        </div>
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


<?php

if(isset($_GET['id']))
{

    $id = $_GET['id'];
    //Repatartion controller
    include '../../Controllers/ReparationController.php';


    //Contravention Controller
    include '../../Controllers/ContraventionController.php';

    //Inherit Contravention controller
    $contraventionController= new ContraventionController();

    $id = $_GET['id'];




    //Get contravention info
    $data = $contraventionController->contraventionEdit($id);

    if(isset($_POST['update_contravention'])){

      $data = [

        "date_enregistrement" =>$_POST['date_enregistrement'],
        "avis_contravention"=>$_POST['avis_contravention'],
        "date_contravention"=>$_POST['date_contravention'],
        "nature_contravention"=>  $_POST['nature_contravention'],
        "lieu_infraction"=>    $_POST['lieu_infraction'],
        "commune_infraction" => $_POST['commune_infraction'],
        "montant_infraction" =>$_POST['montant_infraction'],
        "observation" =>   $_POST['observation'],
        "n_serie" =>   $_POST['n_serie']


      ];

        $contraventionController->contraventionUpdate($id,$data);
        header("Location:contravention_info.php?id=$id");
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


                        <div class="form-group col-md-4">
                            <label>Date enregistrement</label>
                            <input name="date_enregistrement"  value="<?php echo $data['date_enregistrement'];?>" type="date" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-select">Date contravention</label>
                            <input name="date_contravention" value="<?php echo $data['date_contravention'];?>" type="date" class="form-control" >

                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-select">Nature contravention</label>
                            <input name="nature_contravention" value="<?php echo $data['nature_contravention'];?>" type="text" class="form-control" >

                        </div>

                      </div>
                      <!-- row 2 -->
                      <div class="row mt-2">



                        <div class="form-group col-md-4">
                            <label>Lieu infraction
                            </label>
                            <input  name="lieu_infraction"value="<?php echo $data['lieu_infraction'];?>"type="text" class="form-control currency-inputmask" id="currency-mask" >
                        </div>
                        <div class="form-group col-md-4">
                            <label >Commune infraction</label>
                            <input name="commune_infraction" type="text" value="<?php echo $data['commune_infraction'];?>" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Montant infraction
                            </label>
                            <input  name="montant_infraction" value="<?php echo $data['montant_infraction'];?>" type="number" class="form-control currency-inputmask" id="currency-mask" >
                        </div>

                      </div>


                      <!-- row 2 -->
                      <div class="row mt-2">




                        <div class="form-group col-md-12">
                            <label >Observation</label>
                            <input name="observation" value="<?php echo $data['observation'];?>" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label >Avis contravention</label>
                            <input name="avis_contravention"  value="<?php echo $data['avis_contravention'];?>"type="text" class="form-control">
                        </div>
                        <input name="n_serie" type="text"value="<?php echo $data['n_serie'];?>"  hidden>

                      </div>









                                                <div class="text-center mt-4">
                                                <input name="update_contravention" type="submit" value="Modifier" class="btn btn-outline-success">
                                              </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Footer -->
<?php include '../includes/footer.inc.php'; ?>

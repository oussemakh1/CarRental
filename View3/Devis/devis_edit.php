<?php

//Devis controller
include '../../Controllers/DevisController.php';




if(isset($_GET['reservation_id']))
{
   //Inherit devis controller
   $devis = new DevisController();

   $reservation_id = $_GET['reservation_id'];

   $data = $devis->edit_devis($reservation_id);




        //Update devis
        if(isset($_POST['update_devis']))
        {
          $dataDevis = [

            "nom_client"=>$_POST['nom_client'],
            "prenom_client"=>$_POST['prenom_client'],
            "adress_client"=>  $_POST['adress_client'],
            "codepostal_client"=>    $_POST['codepostal_client'],
            "nb_jour" =>   $_POST['nb_jour'],
            "prix" =>   $_POST['prix'],
            "remise" =>   $_POST['remise'],
            "total" =>     ($_POST['prix'] - $_POST['remise']),
            "date_devis" =>   $_POST['date_devis'],
            "date_validite" =>   $_POST['date_validite'],
            "cin" => $_POST['cin'],
            "reservation_id" => $reservation_id



          ];

          $devis->update_devis($reservation_id,$dataDevis);
          header("Location:devis.php?data=".urlencode(serialize($dataDevis))."");
        }




}else{
  header("Location../Vehicules/Vehicules.php");
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


                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                                      <!-- row 1 -->
                                      <div class="row">

                                        <div class="form-group">
                                            <input name="nom_client" value="<?php echo $data['nom_client'];?>" type="text" class="form-control" hidden>
                                        </div>
                                        <div class="form-group ">
                                            <input name="prenom_client" value="<?php echo $data['prenom_client'];?>" type="text" class="form-control" hidden >
                                        </div>

                                        <div class="form-group ">
                                            <input name="adress_client" value="<?php echo $data['adress_client'];?>" type="text" class="form-control" hidden >

                                        </div>
                                        <input hidden name="cin" value="<?php echo $data['cin'];?>" type="number">
                                        <input  hidden name="reservation_id" value="<?php echo $reservation_id;?>" type="number">

                                      </div>










                                                                                                                    <!-- row  6-->
                                                                                                            <div class="row ">

                                                                                                              <div class="form-group">
                                                                                                                  <input hidden name="codepostal_client" value="<?php echo $data['codepostal_client'];?>" type="number" class="form-control" >
                                                                                                              </div>

                                                                                                              <div class="form-group ">
                                                                                                                  <input hidden  name="nb_jour" type="number" value="<?php echo $data['nb_jour'];?>" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                             </div>


                                                                                                                        <div class="form-group col-md-6">
                                                                                                                            <label for="inputText3" >Prix ht</label>
                                                                                                                            <input name="prix" type="number"  value="<?php echo $data['prix'];?>"  class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                       </div>

                                                                                                                       <div class="form-group col-md-6">
                                                                                                                           <label for="inputText3" >Remise</label>
                                                                                                                           <input name="remise" type="number" value="<?php echo $data['remise'];?>"  class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                      </div>



                                                                                                                    </div>




                                                                                                                    <!-- row  7-->




                                                                                                                    <!-- row  8-->
                                                                                                              <div class="row mt-3">


                                                                                                                  <div class="form-group col-md-6">
                                                                                                                      <label>Date devis</label>
                                                                                                                        <input  name="date_devis" value="<?php echo $data['date_devis'];?>"  type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                   </div>

                                                                                                                   <div class="form-group col-md-6">
                                                                                                                       <label>Date date_validite</label>
                                                                                                                         <input  name="date_validite" value="<?php echo $data['date_validite'];?>"  type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                    </div>
                                                                                                                  </div>

                                                                                                                <div class="">
                                                                                                                    <input name="n_serie" type="text" value="<?php echo $n_serie;?>" hidden >

                                                                                                               </div>

                                                                                                                    </div>
                                                                <div class="text-center mt-4 mb-3">
                                                                <input name="update_devis" type="submit" value="Modifier" class="btn btn-outline-success">
                                                              </div>


                                    </form>

                                </div>
                            </div>
                                                </div>
                    </div>
                  </div>












  <?php include '../includes/footer.inc.php'; ?>

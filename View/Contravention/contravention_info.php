<?php

if(isset($_GET['id'])){

  $id = $_GET['id'];

  //Include Contravention controller
  include '../../Controllers/ContraventionController.php';


  //Inherit contravention controller
  $contraventionController = new ContraventionController();

  //Get contravention info
  $data = $contraventionController->contraventionEdit($id);

if(isset($_POST['delete_contravention'])){
  //Delete contravetion
  $deleteContravention = $contraventionController->contraventionDelete($id);
  header("Location:contraventions.php");
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
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header p-4">
                 <a class="pt-2 d-inline-block">Detail contravetion</a>


            </div>
            <div class="card-body">

            <!-- Personel info -->
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date enregistrement</th>
                                <th>Date contravention</th>
                                <th>Nature contravetion</th>
                                <th>Lieu infraction</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data['date_enregistrement']; ?></td>
                                <td><?php echo $data['date_contravention']; ?></td>
                                <td><?php echo $data['nature_contravention']; ?></td>
                                <td><?php echo $data['lieu_infraction']; ?></td>


                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>Commune infraction</th>
                                <th>Avis contravetion</th>
                                <th>Montant</th>





                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td><?php echo $data['commune_infraction']; ?></td>
                                <td><?php echo $data['avis_contravention']; ?></td>
                                <td><?php echo $data['montant_infraction']; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>


                                <th>Observation</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>


                                <td><?php echo $data['observation']; ?></td>


                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- End personal info -->


            <!-- End Business info -->

            </div>
            <div class="card-footer bg-white">
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                  <a  href="contravention_edit.php?id=<?php echo $id;?>" class="mb-0 btn btn-outline-success">Modifier</a>
                  <input type="submit" name="delete_contravention" class="btn btn-outline-danger" value="Supprimer">
                </form>
            </div>
        </div>
    </div>
</div>



<?php include '../includes/footer.inc.php'; ?>

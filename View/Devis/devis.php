<?php

  //Inherit & include facture controller
  include '../../Controllers/DevisController.php';

  //Math funtions
  include '../../func/MathFunc.php';

  $devis = new DevisController();

    //Inherit & include facture controller
    include '../../Controllers/FactureController.php';
    $factureController = new FactureController();
    $company_data = $factureController->CompanyInfo();

  if(isset($_GET['data']))
  {
     $data = unserialize($_GET['data']);

     $devis_data = $devis->edit_devis($data['reservation_id']);
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
      <button class="btn btn-outline-light buttons-excel buttons-html5" id="export_excel"tabindex="0" aria-controls="example" type="button">
        <span>Excel</span>
      </button>
      <button class="btn btn-outline-light buttons-pdf buttons-html5" id="btn_pdf" tabindex="0" aria-controls="example" type="button">
        <span>PDF</span>
      </button>
      <input class="btn btn-outline-light buttons-print" onclick="printDiv('facture');" tabindex="0" aria-controls="example"type="button" Value="print">

        <div class="card mt-2" id="facture">
            <div class="card-header p-4">
                 <a class="pt-2 d-inline-block"><?php echo $company_data['nom_societe']; ?></a>

                <div class="float-right"> <h3 class="mb-0">Devis
                  <?php if(!empty($devis_data['date_devis'])){ ?>
                  <span class="text-danger"><?php if($devis_data['devis_status'] == 'Failed'){echo 'Non Validée';} ?></span>
                <?php } ?>
                </h3>
                    <br>
                    <?php if(!empty($devis_data['date_devis'])){ ?>
                        Date: <?php echo $devis_data['date_devis']; ?>
                    <?php }else{ ?>
                      Date: <?php echo $data['date_devis']; ?>
                    <?php }?>
              </div>
            </div>
            <div class="card-body">

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Adress</th>
                                <th>Code postal</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data['nom_client']; ?></td>
                                <td><?php echo $data['prenom_client']; ?></td>
                                <td><?php echo $data['adress_client']; ?></td>
                                <td><?php echo $data['codepostal_client']; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>N°jours</th>
                                <th>Date validite</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data['nb_jour']; ?></td>
                                <td><?php echo $data['date_validite']; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>Prix</th>
                                <th>Remise</th>
                                <th>Total</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data['prix']; ?></td>
                                <td><?php echo $data['remise']; ?></td>
                                <td>
                                <?php if($data['remise']){ ?>
                                  <?php echo ( $data['prix'] - $data['prix'] * ($data['remise']/100) ); ?>
                                <?php }else{ echo $data['prix']; } ?>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>


            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">
                    <?php echo $company_data['localisation_ville'];?>,
                    <?php echo $company_data['localisation_route'];?>
                </p>
            </div>
        </div>
        <div class="text-center">
            <a href="devis_edit.php?reservation_id=<?php echo $data['reservation_id'];?>" class="btn btn-outline-success mt-3">Modifier</a>
        </div>
    </div>

</div>



<?php include '../includes/footer.inc.php'; ?>

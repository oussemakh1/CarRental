<?php

  //Inherit & include facture controller
  include '../../Controllers/FactureController.php';


  if(isset($_GET['data']))
  {
    $factureController = new FactureController();
     $taken_data = $_GET['data];
     $data = unserialize($taken_data);
     $company_data = $factureController->CompanyInfo();
     $factureController->insert_facture($data);
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



    <div class="offset-xl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

      <button class="btn btn-outline-light buttons-excel buttons-html5" id="export_excel"tabindex="0" aria-controls="example" type="button">
        <span>Excel</span>
      </button>
      <button class="btn btn-outline-light buttons-pdf buttons-html5" id="btn_pdf" tabindex="0" aria-controls="example" type="button">
        <span>PDF</span>
      </button>
      <input class="btn btn-outline-light buttons-print" onclick="printDiv('facture');" tabindex="0" aria-controls="example"type="button" Value="print">

      <div class="row mb-2 mt-2">
        <div class="card" id="facture">
            <div class="card-header p-4">

                <div class="float-right"> <h3 class="mb-0">Facture</h3>
                  <?php if(!empty($date_fact)){?>
                    Date: <?php echo $data['date_fact']; ?>
                  <?php }else { ?>
                    Date: <?php echo date('l jS \of F Y h:i:s A') ; ?>
                  <?php }?>
              </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">De:</h5>
                        <h3 class="text-dark mb-1"><?php echo $company_data['nom_societe'];?></h3>
                        <div><?php echo $company_data['localisation_ville'];?></div>
                        <div><?php echo $company_data['localisation_route'];?></div>
                        <?php if(!empty($company_data['email'])){?>
                        <div>Email: <?php echo $company_data['email_societe'];?></div>
                      <?php }?>
                        <?php if(!empty($company_data['telephone'])){?>
                        <div>Telephone: <?php echo $company_data['telephone'];?></div>
                      <?php }?>
                        <?php if(!empty($company_data['gsm'])){?>
                        <div>Gsm: <?php echo $company_data['gsm'];?></div>
                      <?php }?>
                      <?php if(!empty($company_data['fax'])){?>
                        <div>Fax: <?php echo $company_data['fax'];?></div>
                      <?php }?>

                    </div>
                    <div class="col-sm-6">
                        <h5 class="mb-3">A:</h5>
                        <h3 class="text-dark mb-1"><?php echo $data['nom_client'] . ' ' . $data['prenom_client']; ?></h3>
                        <div><?php echo $data['nom_adress_fact']; ?></div>
                        <div>Code postal: <?php echo $data['code_postal_client']; ?></div>
                        <div>Telephone:<?php echo $data['telephone_client']; ?></div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Vehicule</th>
                                <th>N°jours</th>
                                <th class="right">Date depart</th>
                                <th class="center">Date retour</th>
                                <th class="right">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="left strong"><?php echo $data['marque_vehicule']; ?></td>
                                <td class="left"><?php echo $data['nb_jour']; ?></td>
                                <td class="right"><?php echo $data['date_depart']; ?></td>
                                <td class="center"><?php echo $data['date_retour']; ?></td>
                                <td class="right"><?php echo $data['prix']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Subtotal</strong>
                                    </td>
                                    <td class="right"><?php echo $data['prix']; ?></td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Remise (<?php echo $data['remisePercentage']; ?>%)</strong>
                                    </td>
                                    <td class="right"><?php
                                                    echo    $data['remise'];
                                                    ; ?></td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">TVA (<?php echo $data['tvaPercentage']; ?>%)</strong>
                                    </td>
                                    <td class="right"><?php

                                       echo  $data['tva'];

                                     ?></td>

                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong class="text-dark"><?php
                                            if(empty($data['total'])){
                                              echo 'empty';
                                            }else{
                                              echo $data['total'];

                                            }


                                         ?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">

            </div>
        </div>
    </div>

</div>



<?php include '../includes/footer.inc.php'; ?>

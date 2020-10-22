<?php


if(isset($_GET['cin']))
{

  include '../../Controllers/ClientController.php';

  $cin = $_GET['cin'];
  $clientController = new ClientController();

  $client_info = $clientController->getClientByCin($cin);

  if(isset($_POST['update_client']))
  {
    $data = [

      "nom" =>$_POST['nom'],
      "prenom"=>$_POST['prenom'],
      "email"=>$_POST['email'],
      "date_naissance"=>  $_POST['date_naissance'],
      "telephone"=>    $_POST['telephone'],
      "cin" => $_POST['cin'],
      "adress" =>$_POST['adress'],
      "ville" =>   $_POST['ville'],
      "pays" =>   $_POST['pays'],
      "n_permis" =>     $_POST['n_permis'],
      "code_postal" =>   $_POST['code_postal'],
      "type_client"=>$_POST['type_client']

    ];

    $insert_client = $clientController->client_update($cin,$data);
    header("Location:clients.php");
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
                <h5 class="card-header">Modification client</h5>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                      <!-- row 1 -->
                      <div class="row">


                        <div class="form-group col-md-3">
                            <label >Nom</label>
                            <input name="nom" value="<?php echo $client_info['nom']; ?>" class="form-control"type="text" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Prenom</label>
                            <input name="prenom" value="<?php echo $client_info['prenom']; ?>" type="text" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Date naissance</label>
                            <input name="date_naissance" value="<?php echo $client_info['date_naissance']; ?>" type="date" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-select">Address</label>
                            <input name="adress" value="<?php echo $client_info['adress']; ?>" type="text" class="form-control" >

                        </div>

                      </div>
                      <!-- row 2 -->
                      <div class="row mt-2">

                        <div class="form-group col-md-3">
                            <label  >Code postal</label>
                            <input name="code_postal" value="<?php echo $client_info['code_postal']; ?>"type="number" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label >Ville</label>
                            <input name="ville" value="<?php echo $client_info['ville']; ?>" type="text"  class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Pays
                            </label>
                            <input  name="pays" type="text" value="<?php echo $client_info['pays']; ?>"class="form-control currency-inputmask" id="currency-mask" >
                        </div>
                        <div class="form-group col-md-3">
                            <label >telephone</label>
                            <input name="telephone" type="number" value="<?php echo $client_info['telephone']; ?>" class="form-control">
                        </div>

                      </div>


                      <!-- row  3-->
                      <div class="row mt-2">

                        <div class="form-group col-md-6">
                            <label  >email</label>
                            <input name="email" type="email" value="<?php echo $client_info['email']; ?>" class="form-control" >
                        </div>

                        <div class="form-group col-md-6">
                            <label >N°permis</label>
                            <input name="n_permis" type="number" value="<?php echo $client_info['n_permis']; ?>" class="form-control">
                        </div>




                      </div>




                                                <!-- row  4-->
                                                <div class="row mt-3">



                                                  <div class="form-group col-md-6">
                                                      <label for="hue-demo">CIN</label>
                                                      <input name="cin" type="number" value="<?php echo $client_info['cin']; ?>" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>Type client
                                                      </label>
                                                      <select name ="type_client" class="form-control" id="input-select">
                                                        <option value="<?php echo $client_info['type_client']; ?>"><?php echo $client_info['type_client']; ?></option>
                                                          <option value="personel">Personel</option>
                                                          <option value="societe">Societe</option>
                                                          <option value="tourist">Tourist</option>


                                                      </select>
                                                    </div>


                                                </div>




                                                                                                    <!-- row  7-->





                                                <div class="text-center mt-4">
                                                <input name="update_client" type="submit" value="Modifier" class="btn btn-outline-success">
                                              </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include '../includes/footer.inc.php'; ?>

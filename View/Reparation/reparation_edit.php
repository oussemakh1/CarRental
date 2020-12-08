<?php

if(isset($_GET['id']))
{

  $id = $_GET['id'];
  //Repatartion controller
  include '../../Controllers/ReparationController.php';

  //Inherit reparation controller
  $reparationController = new ReparationController();

  //Get reparation by
  $reparation_info = $reparationController->reparation_edit($id);

  //Get Mecaniciens
  $mecaniciens = $reparationController->Mecaniciens();


  if(isset($_POST['update_reparation'])){

    $data = [

      "mecanicien"=>$_POST['mecanicien'],
      "marque"=>$_POST['marque_vehicule'],
      "model"=>$_POST['model'],
      "date_mise_circulation"=>$_POST['date_mise_circulation'],
      "date_entree_garage" =>$_POST['date_entree_garage'],
      "date_sortie_garage"=>$_POST['date_sortie_garage'],
      "montant" => $_POST['montant'],
      "panne"=>$_POST['panne'],
      "n_serie"=>$reparation_info['n_serie']

    ];

    $reparationController->reparation_update($id,$data);
    header("Location:../Vehicules/Vehicules.php");
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

          <div class="tab-vertical">
              <ul class="nav nav-tabs" id="myTab3" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="home-vertical-tab" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="home" aria-selected="true">Reparation</a>
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

                                            <input hidden name="marque_vehicule" value="<?php echo $reparation_info['marque'];?>" class="form-control" type="text" >
                                        </div>
                                        <div class="form-group">
                                            <input hidden name="model" value="<?php echo $reparation_info['model'];?>" type="text" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Date mise circulation</label>
                                            <input name="date_mise_circulation" value="<?php echo $reparation_info['date_mise_circulation']?>" type="date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input-select">Date entreé garage</label>
                                            <input name="date_entree_garage" value="<?php echo $reparation_info['date_entree_garage']?>" type="date" class="form-control" >

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input-select">Date sortie garage</label>
                                            <input name="date_sortie_garage" value="<?php echo $reparation_info['date_sortie_garage']?>" type="date" class="form-control" >

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
                                                <option value="<?php echo $reparation_info['mecanicien']?>"><?php echo $reparation_info['mecanicien']?></option>
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
                                            <input  name="montant" value="<?php echo $reparation_info['montant']?>" type="number" class="form-control currency-inputmask" id="currency-mask" >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label >Panne</label>
                                            <input name="panne" type="text"  value="<?php echo $reparation_info['panne']?>"class="form-control">
                                        </div>

                                      </div>









                                                                <div class="text-center mt-4">
                                                                <input name="update_reparation" type="submit" value="Modifier" class="btn btn-outline-success">
                                                              </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile-vertical" role="tabpanel" aria-labelledby="profile-vertical-tab">




                  <div class="row">
                      <!-- ============================================================== -->
                      <!-- data table  -->
                      <!-- ============================================================== -->
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="card">

                              <div class="card-body">
                                  <div class="table-responsive">
                                      <table id="example" class="table table-striped table-bordered second" style="width:100%">

                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-6">
                                              <div class="dt-buttons">
                                                <button class="btn btn-outline-light buttons-copy buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                  <span>Copy</span>
                                                </button>
                                                <button class="btn btn-outline-light buttons-excel buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                  <span>Excel</span>
                                                </button>
                                                <button class="btn btn-outline-light buttons-pdf buttons-html5" tabindex="0" aria-controls="example" type="button">
                                                  <span>PDF</span>
                                                </button>
                                                <button class="btn btn-outline-light buttons-print" tabindex="0" aria-controls="example" type="button">
                                                  <span>Print</span>
                                                </button>

                                              </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                              <div id="example_filter" class="dataTables_filter">
                                              <input type="search" class="form-control form-control-sm" placeholder="search for somthing.." aria-controls="example">
                                              </div>
                                            </div>


                                          </div>


                                          <thead>
                                              <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Telephone</th>
                                                <th>CIN</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php foreach($clients as $client): ?>
                                              <tr>

                                                <td><?php echo $client['nom']; ?></td>
                                                <td><?php echo $client['prenom']; ?></td>
                                                <td><?php echo $client['telephone']; ?></td>
                                                <td>
                                                  <a href="Location_insertOldClient.php?id=<?php echo $client['id']; ?>&marque_vehicule=<?php echo $marque_vehicule;?>&n_serie=<?php echo $n_serie;?>">
                                                    <?php echo $client['cin']; ?>
                                                  </a>
                                                </td>


                                              </tr>
                                            <?php endforeach; ?>
                                          </tbody>


                                      </table>

                                      <!-- pagination -->
                                      <div class="row mt-3"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>



                                </div>
                              </div>
                          </div>
                      </div>
                      <!-- ============================================================== -->
                      <!-- end data table  -->
                      <!-- ============================================================== -->
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

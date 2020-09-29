
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
          <div class="section-block">
              <h5 class="section-title">Vertical tabs</h5>
              <p>Takes the basic nav from above and adds the .nav-tabs class to generate a tabbed interface..</p>
          </div>
          <div class="tab-vertical">
              <ul class="nav nav-tabs" id="myTab3" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="home-vertical-tab" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="home" aria-selected="true">Tab Vertical #1</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="profile-vertical-tab" data-toggle="tab" href="#profile-vertical" role="tab" aria-controls="profile" aria-selected="false">Tab Vertical #2</a>
                  </li>

              </ul>
              <div class="tab-content" id="myTabContent3">
                  <div class="tab-pane fade show active" id="home-vertical" role="tabpanel" aria-labelledby="home-vertical-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="section-block" id="basicform">
                                <h3 class="section-title">Basic Form Elements</h3>
                                <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p>
                            </div>
                            <div class="card">
                                <h5 class="card-header">Basic Form</h5>
                                <div class="card-body">
                                    <form>
                                      <!-- row 1 -->
                                      <div class="row">


                                        <div class="form-group col-md-3">
                                            <label >Nom</label>
                                            <input name="nom" type="text" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Prenom</label>
                                            <input name="prenom" type="text" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Date naissance</label>
                                            <input name="date_naissance" type="date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="input-select">Address</label>
                                            <input name="adress" type="text" class="form-control" >

                                        </div>

                                      </div>
                                      <!-- row 2 -->
                                      <div class="row mt-2">

                                        <div class="form-group col-md-3">
                                            <label  >Code postal</label>
                                            <input name="code_postal" type="number" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >Ville</label>
                                            <input name="ville" type="text"  class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Pays
                                            </label>
                                            <input  name="pays" type="text" class="form-control currency-inputmask" id="currency-mask" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >telephone</label>
                                            <input name="telephone" type="number" class="form-control">
                                        </div>

                                      </div>


                                      <!-- row  3-->
                                      <div class="row mt-2">

                                        <div class="form-group col-md-4">
                                            <label  >email</label>
                                            <input name="email" type="email" class="form-control" >
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label >N°permis</label>
                                            <input name="n_permis" type="number" class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Date delivrance
                                            </label>
                                            <input name="date_delivrance" type="date" class="form-control currency-inputmask" id="currency-mask"  >
                                        </div>


                                      </div>




                                                                <!-- row  4-->
                                                                <div class="row mt-3">

                                                                  <div class="form-group col-md-3">
                                                                      <label for="input-select">Lieu delivrance</label>
                                                                      <input name="lieu_delivrance" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                  </div>

                                                                  <div class="form-group col-md-3">
                                                                      <label for="hue-demo">CIN</label>
                                                                      <input name="cin" type="number" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                                                  </div>

                                                                  <div class="form-group col-md-4">
                                                                      <label>Type client
                                                                      </label>
                                                                      <select name = "type_client" class="form-control" id="input-select">
                                                                          <option>Choose Example</option>
                                                                      </select>                                                      </div>


                                                                </div>

                                                                <!-- row  5-->
                                                                <div class="row mt-3">

                                                                  <div class="form-group col-md-3">
                                                                      <label >Marque vehicule</label>
                                                                      <select name = "marque_vehicule" class="form-control" id="input-select">
                                                                          <option>Choose Example</option>
                                                                      </select>                                                      </div>

                                                                  <div class="form-group col-md-3">
                                                                      <label  >Etat vehicule</label>
                                                                      <select name = "etat_vehicule" class="form-control" id="input-select">
                                                                          <option>Choose Example</option>
                                                                      </select>                                                      </div>

                                                                  <div class="form-group col-md-3">
                                                                      <label>Assurance
                                                                      </label>
                                                                      <input name="assurance" type="number" class="form-control currency-inputmask" id="currency-mask" >
                                                                  </div>
                                                                  <div class="form-group col-md-3">
                                                                      <label>Caution
                                                                      </label>
                                                                      <input name="caution" type="number" class="form-control currency-inputmask" id="currency-mask"  >
                                                                  </div>


                                                                </div>


                                                                                                                    <!-- row  6-->
                                                                                                                    <div class="row mt-3">

                                                                                                                      <div class="form-group col-md-3">
                                                                                                                          <label for="inputText3" >Mode paiement</label>
                                                                                                                          <select name = "mode_paiement" class="form-control" id="input-select">
                                                                                                                              <option>Choose Example</option>
                                                                                                                          </select>
                                                                                                                     </div>

                                                                                                                     <div class="form-group col-md-3">
                                                                                                                         <label for="inputText3" >N°jours</label>
                                                                                                                         <input name="nb_jour" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                    </div>

                                                                                                                    <div class="form-group col-md-3">
                                                                                                                        <label for="inputText3" >Date depart</label>
                                                                                                                        <input name="date_depart" type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                   </div>
                                                                                                                   <div class="form-group col-md-3">
                                                                                                                       <label for="inputText3" >Heure depart</label>
                                                                                                                       <input name="heure_depart" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                  </div>

                                                                                                                      <div class="form-group col-md-3">
                                                                                                                            <label for="inputText3" >Date retour</label>
                                                                                                                            <input name="date_retour" type="date" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                         </div>


                                                                                                                         <div class="form-group col-md-3s">
                                                                                                                             <label for="inputText3" >Heure retour</label>
                                                                                                                             <input name="heure_retour" type="text" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-3">
                                                                                                                            <label for="inputText3" >Prix ht</label>
                                                                                                                            <input name="prix_ht" type="number" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                       </div>

                                                                                                                       <div class="form-group col-md-12">
                                                                                                                           <label for="inputText3" >TVA</label>
                                                                                                                           <input name="tva" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                      </div>

                                                                                                                      <div class="form-group col-md-3">
                                                                                                                          <input hidden name="prix_ttc" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                     </div>
                                                                                                                    </div>


                                                                                                                    <!-- row  7-->




                                                                                                                    <!-- row  8-->
                                                                                                                    <div class="row mt-3">


                                                                                                                    <div class="form-group col-md-4">
                                                                                                                        <label for="inputText3" >Paye le</label>
                                                                                                                        <input name="paye_le" type="date" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                   </div>

                                                                                                                   <div class="form-group col-md-4">
                                                                                                                       <label for="inputText3" >Deja régle acompte</label>
                                                                                                                       <select name = "deja_regle_acompte" class="form-control" id="input-select">
                                                                                                                           <option>Choose Example</option>
                                                                                                                       </select>
                                                                                                                  </div>

                                                                                                                  <div class="form-group col-md-4">
                                                                                                                      <label for="inputText3" >Date acompte</label>
                                                                                                                      <input name="date_acompte" type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                 </div>

                                                                                                                 <div class="form-group col-md-4">
                                                                                                                     <label for="inputText3" >Lieu retour</label>
                                                                                                                     <input name="lieu_retour" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                </div>

                                                                                                                <div class="form-group col-md-4">
                                                                                                                    <label for="inputText3" >N°serie</label>
                                                                                                                    <input name="n_serie" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                               </div>

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
                  <div class="tab-pane fade" id="profile-vertical" role="tabpanel" aria-labelledby="profile-vertical-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="section-block" id="basicform">
                                <h3 class="section-title">Basic Form Elements</h3>
                                <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p>
                            </div>
                            <div class="card">
                                <h5 class="card-header">Basic Form</h5>
                                <div class="card-body">
                                    <form>
                                      <!-- row 1 -->
                                      <div class="row">


                                        <div class="form-group col-md-3">
                                            <label>Nom</label>
                                            <input name="nom" type="text" hidden>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Prenom</label>
                                            <input name="prenom" type="text" class="form-control" hidden>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Date naissance</label>
                                            <input name="date_naissance" type="date" class="form-control" hidden>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="input-select">Address</label>
                                            <input name="adress" type="text" class="form-control" hidden>

                                        </div>

                                      </div>
                                      <!-- row 2 -->
                                      <div class="row mt-2">

                                        <div class="form-group col-md-3">
                                            <label  >Code postal</label>
                                            <input name="code_postal" type="number" class="form-control" hidden>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >Ville</label>
                                            <input name="ville" type="text"  class="form-control" hidden>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Pays
                                            </label>
                                            <input  name="pays" type="text" class="form-control currency-inputmask" id="currency-mask" hidden>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >telephone</label>
                                            <input name="telephone" type="number" class="form-control" hidden>
                                        </div>

                                      </div>


                                      <!-- row  3-->
                                      <div class="row mt-2">

                                        <div class="form-group col-md-4">
                                            <label  >email</label>
                                            <input name="email" type="email" class="form-control" hidden>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label >N°permis</label>
                                            <input name="n_permis" type="number" class="form-control" hidden>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Date delivrance
                                            </label>
                                            <input name="date_delivrance" type="date" class="form-control currency-inputmask" id="currency-mask"  >
                                        </div>


                                      </div>




                                                                <!-- row  4-->
                                                                <div class="row mt-3">

                                                                  <div class="form-group col-md-3">
                                                                      <label for="input-select">Lieu delivrance</label>
                                                                      <input name="lieu_delivrance" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                  </div>

                                                                  <div class="form-group col-md-3">
                                                                      <label for="hue-demo">CIN</label>
                                                                      <input name="cin" type="number" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                                                  </div>

                                                                  <div class="form-group col-md-4">
                                                                      <label>Type client
                                                                      </label>
                                                                      <select name = "type_client" class="form-control" id="input-select">
                                                                          <option>Choose Example</option>
                                                                      </select>                                                      </div>


                                                                </div>

                                                                <!-- row  5-->
                                                                <div class="row mt-3">

                                                                  <div class="form-group col-md-3">
                                                                      <label >Marque vehicule</label>
                                                                      <select name = "marque_vehicule" class="form-control" id="input-select">
                                                                          <option>Choose Example</option>
                                                                      </select>                                                      </div>

                                                                  <div class="form-group col-md-3">
                                                                      <label  >Etat vehicule</label>
                                                                      <select name = "etat_vehicule" class="form-control" id="input-select">
                                                                          <option>Choose Example</option>
                                                                      </select>                                                      </div>

                                                                  <div class="form-group col-md-3">
                                                                      <label>Assurance
                                                                      </label>
                                                                      <input name="assurance" type="number" class="form-control currency-inputmask" id="currency-mask" >
                                                                  </div>
                                                                  <div class="form-group col-md-3">
                                                                      <label>Caution
                                                                      </label>
                                                                      <input name="caution" type="number" class="form-control currency-inputmask" id="currency-mask"  >
                                                                  </div>


                                                                </div>


                                                                                                                    <!-- row  6-->
                                                                                                                    <div class="row mt-3">

                                                                                                                      <div class="form-group col-md-3">
                                                                                                                          <label for="inputText3" >Mode paiement</label>
                                                                                                                          <select name = "mode_paiement" class="form-control" id="input-select">
                                                                                                                              <option>Choose Example</option>
                                                                                                                          </select>
                                                                                                                     </div>

                                                                                                                     <div class="form-group col-md-3">
                                                                                                                         <label for="inputText3" >N°jours</label>
                                                                                                                         <input name="nb_jour" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                    </div>

                                                                                                                    <div class="form-group col-md-3">
                                                                                                                        <label for="inputText3" >Date depart</label>
                                                                                                                        <input name="date_depart" type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                   </div>
                                                                                                                   <div class="form-group col-md-3">
                                                                                                                       <label for="inputText3" >Heure depart</label>
                                                                                                                       <input name="heure_depart" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                  </div>

                                                                                                                      <div class="form-group col-md-3">
                                                                                                                            <label for="inputText3" >Date retour</label>
                                                                                                                            <input name="date_retour" type="date" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                         </div>


                                                                                                                         <div class="form-group col-md-3s">
                                                                                                                             <label for="inputText3" >Heure retour</label>
                                                                                                                             <input name="heure_retour" type="text" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-3">
                                                                                                                            <label for="inputText3" >Prix ht</label>
                                                                                                                            <input name="prix_ht" type="number" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                       </div>

                                                                                                                       <div class="form-group col-md-12">
                                                                                                                           <label for="inputText3" >TVA</label>
                                                                                                                           <input name="tva" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                      </div>

                                                                                                                      <div class="form-group col-md-3">
                                                                                                                          <input hidden name="prix_ttc" type="number" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                     </div>
                                                                                                                    </div>


                                                                                                                    <!-- row  7-->




                                                                                                                    <!-- row  8-->
                                                                                                                    <div class="row mt-3">


                                                                                                                    <div class="form-group col-md-4">
                                                                                                                        <label for="inputText3" >Paye le</label>
                                                                                                                        <input name="paye_le" type="date" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                   </div>

                                                                                                                   <div class="form-group col-md-4">
                                                                                                                       <label for="inputText3" >Deja régle acompte</label>
                                                                                                                       <select name = "deja_regle_acompte" class="form-control" id="input-select">
                                                                                                                           <option>Choose Example</option>
                                                                                                                       </select>
                                                                                                                  </div>

                                                                                                                  <div class="form-group col-md-4">
                                                                                                                      <label for="inputText3" >Date acompte</label>
                                                                                                                      <input name="date_acompte" type="date" class="form-control currency-inputmask" id="currency-mask" >

                                                                                                                 </div>

                                                                                                                 <div class="form-group col-md-4">
                                                                                                                     <label for="inputText3" >Lieu retour</label>
                                                                                                                     <input name="lieu_retour" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                                </div>

                                                                                                                <div class="form-group col-md-4">
                                                                                                                    <label for="inputText3" >N°serie</label>
                                                                                                                    <input name="n_serie" type="text" class="form-control currency-inputmask" id="currency-mask"  >

                                                                                                               </div>

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

              </div>
          </div>
      </div>


      </div>










        <!-- footer -->
        <?php include '../includes/footer.inc.php'; ?>

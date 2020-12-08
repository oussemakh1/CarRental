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

   <!-- Insert User -->
    <?php


            //User controller
            include '../../Controllers/UserController.php';


            //Inherit User controller
            $UserController= new UserController();





            if(isset($_POST['insert_user'])){

                $data = [

                    "username" =>$_POST['username'],
                    "user_pass"=>$_POST['user_pass'],
                    "user_privileges"=>$_POST['user_privileges']


                ];

                //Change to string
                $user_pass = strval($_POST['user_pass']);
                $user_name = strval($_POST['username']);

                //Validations
                //Username Validation
                if(strlen($user_name) < 4) {
                    lengthShouldBe(4,"Votre nom utilisateur");
                }
                //Password Validtaion
                elseif (strlen($user_pass) < 6) {
                    lengthShouldBe(6,"Mots de passe");
                }
                else {
                    $UserController->Userinsert($data);
                }
            }






            ?>
   <!-- General error handleing -->
    <?php
        if(isset($_GET['error_message'])) {
            error_message($_GET['error_message']);
        }
        if(isset($_GET['insert_error'])) {
            insert_error_message();
        }
    ?>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card">
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                      <!-- row 1 -->
                      <div class="row">


                        <div class="form-group col-md-4">
                            <label>Nom d'utilisateur</label>
                            <input name="username"   type="text" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Mots de passe</label>
                            <input name="user_pass"   type="password" class="form-control">
                        </div>

                          <div class="form-group col-md-4">
                              <label>Privilege</label>
                                <select class="form-control" name="user_privileges">
                                    <option value="1">super admin</option>
                                    <option value="0">admin</option>
                                </select>
                          </div>




                      </div>






                                                <div class="text-center mt-1">
                                                <input name="insert_user" type="submit" value="Inseree" class="btn btn-outline-success">
                                              </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Footer -->
<?php include '../includes/footer.inc.php'; ?>

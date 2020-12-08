<?php include '../includes/header.inc.php'; ?>

<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->
<?php include '../includes/navbar.inc.php'; ?>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- ============================================================== -->

<!-- left sidebar -->
<?php include '../includes/left_navbar.inc.php'; ?>

    <!-- Delete user -->
    <?php
            include '../../Controllers/UserController.php';
            if(isset($_GET['id']))
            {

                $id = $_GET['id'];
                //User controller


                //Inherit User controller
                $UserController= new UserController();

                // DELETE USER
                if(isset($_POST['delete_user'])){
                    $UserController= new UserController();
                    $UserController->UserDelete($id);
                }

            }
    ?>
    <!-- update user -->
    <?php
                if(isset($_GET['id']))
                {

                    $id = $_GET['id'];
                    //Inherit User controller
                    $data = $UserController->UserEdit($id);

                    if(isset($_POST['update_user'])){

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
                            $UserController->Userupdate($id,$data);
                        }


                    }
                }
                ?>

    <!-- general errors handling -->
    <?php
        if(isset($_GET['error_message'])) {
            error_message($_GET['error_message']);
        }

        if(isset($_GET['update_error'])) {
            update_error_message();
        }

        if(isset($_GET['delete_error'])) {
            delete_error_message();
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
                            <label>Username</label>
                            <input name="username"  value="<?php echo $data['username'];?>" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Mots de passe</label>
                            <input name="user_pass"  value="<?php echo $data['user_pass'];?>" type="password" class="form-control">
                        </div>

                          <div class="form-group col-md-4">
                              <label>Privilege</label>
                              <select class="form-control" name="user_privileges">
                                  <?php if($data['user_privileges'] == 1){?>
                                  <option selected="selected" value="1">super admin</option>
                                      <option value="0">admin</option>
                                  <?php }else {?>
                                  <option value="1">super admin</option>
                                  <option selected="selected"  value="0">admin</option>
                                  <?php } ?>
                              </select>
                          </div>

                      </div>






                                                <div class="text-center mt-4">
                                                <input name="update_user" type="submit" value="Modifier" class="btn btn-outline-success">
                                                <input name="delete_user" type="submit" value="Supprimer" class="btn btn-outline-danger">
                                              </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Footer -->
<?php include '../includes/footer.inc.php'; ?>

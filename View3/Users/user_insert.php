
<?php


    //User controller
    include '../../Controllers/UserController.php';


    //Inherit User controller
    $UserController= new UserController();





    if(isset($_POST['insert_user'])){

      $data = [

          "username" =>$_POST['username'],
          "user_privileges"=>$_POST['user_privileges'],
          "user_pass"=>$_POST['user_pass']


      ];

        $UserController->Userinsert($data);
        header("Location:users.php");
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
                            <label>Nom d'utilisateur</label>
                            <input name="username"   type="text" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Mots de passe</label>
                            <input name="user_pass"   type="password" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Privilèges utilisateur</label>
                            <select name="user_privileges" class="form-control">
                              <option value="super_admin">Super Admin</option>
                              <option value="normal_admin">Normal Admin</option>
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

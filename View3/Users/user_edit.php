
<?php

include '../../Controllers/UserController.php';

if(isset($_GET['id']))
{

    $id = $_GET['id'];
    //User controller


    //Inherit User controller
    $UserController= new UserController();




      $data = $UserController->UserEdit($id);

      if(isset($_POST['update_user'])){

        $data2 = [

            "username" =>$_POST['username'],
            "user_privileges"=>$_POST['user_privileges'],
            "user_pass"=>$_POST['user_pass']


        ];

          $UserController->Userupdate($id,$data2);
          header("Location:users.php");
      }


}
if(isset($_GET['nom'])){

  $nom = $_GET['nom'];

  //Inherit User controller
  $UserController= new UserController();

  $userid = $UserController->getUserByname($nom);
  $idmanager = $userid['id'];
    $data = $UserController->UserEdit($idmanager);

    if(isset($_POST['update_user'])){

      $data = [

          "username" =>$_POST['username'],
          "user_privileges"=>$_POST['user_privileges'],
          "user_pass"=>$_POST['user_pass']


      ];

        $UserController->Userupdate($userid,$data);
        header("Location:users.php");

  }
}


if(isset($_POST['delete_user'])){
  $UserController= new UserController();
  $UserController->UserDelete($id);
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
                            <label>Username</label>
                            <input name="username"  value="<?php echo $data['username'];?>" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Mots de passe</label>
                            <input name="user_pass"  value="<?php echo $data['user_pass'];?>" type="password" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-select">User Privileges</label>
                            <select name="user_privileges" class="form-control">
                              <option value="<?php echo $data['user_privileges'];?>"><?php echo $data['user_privileges'];?></option>
                              <option value="super_admin">Super Admin</option>
                              <option value="normal_admin">Normal Admin</option>
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

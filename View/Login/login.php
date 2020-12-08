<?php

//Include and inherit database
include '../../lib/Database.php';
//Include sessions handler
include '../../lib/sessions.php';
$db = new Database();
$Session = new Sessions();


//Check if company info is set
$q2 = "SELECT * FROM company_info";
$fetch2 = $db->query($q2);
$company_info = $fetch2->fetch();

    if(!$company_info) {
        header("Location:../Activation/company_info.php");
    }

   if($Session::CheckAdminLogin() == true)
   {
     header("Location:../Dashboard/index.php");
   }

  if(isset($_GET['logout']) == 'true')
  {
     $Session::logout();
    header('login.php');
  }

  if(isset($_POST['login']))
  {
      $username = $_POST['username'];
      $user_pass = $_POST['user_pass'];

      //Query
      $query = "SELECT * FROM users WHERE username = ? AND user_pass = ?";

      $fetch = $db->select($query,[$username,$user_pass]);

      if($fetch){

        $data = $fetch->fetch();
        $Session::init();
        $Session::set("adminLogin",$username);
        $Session::set("adminPrivileges",$data['user_privileges']);

          $privileges = $Session::get('adminPrivileges');
          if($privileges == 0) {
              header("Location:../Vehicules/Vehicules.php");
          }else {
              header("Location:../Dashboard/index.php");
          }

      }

  }



?>





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a><span class="splash-description"></span></div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username"id="username" type="text" placeholder="Nom d'utilisateur" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="user_pass" id="password" type="password" placeholder="Mots de passe">
                    </div>

                    <button type="submit" name="login" class="btn btn-outline-success btn-lg btn-block">se connecter</button>
                </form>
            </div>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>

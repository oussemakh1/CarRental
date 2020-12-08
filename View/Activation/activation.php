
<?php

//include database
include_once '../../lib/Database.php';
//Check if already activated
$db = new Database();
$q = "SELECT * FROM activation";
$fetch = $db->query($q);
$code_activation = $fetch->fetch();
//Check if company info is set
$q2 = "SELECT * FROM company_info";
$fetch2 = $db->query($q2);
$company_info = $fetch2->fetch();
if(!$code_activation){
  if(isset($_POST['activation'])){

      //include activation
      include '../../func/activation_code.php';

      $code = $_POST['code'];
      if(in_array($code,$code_activation))
      {
        $query="INSERT INTO activation(activation) VALUES(?)";
        $fetch = $db->insert($query,[$code]);
        header("Location:company_info.php");
      }
  }
}elseif(!$company_info){
    header("Location:company_info.php");
}else {
    header("Location:../Login/login.php");

}






 ?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Activation</title>
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
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Veuillez saisir vos code activation.</span></div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="code" type="text" placeholder="Code d'activation" autocomplete="off">
                    </div>


                    <input type="submit" name="activation" class="btn btn-success btn-lg btn-block" value="Activé">
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

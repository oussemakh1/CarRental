
<?php

//include database
include '../../lib/Database.php';
//Check if already activated
$db = new Database();
$query = "SELECT * FROM company_info";
$fetch = $db->query($query)->fetch();
if(!$fetch){
  if(isset($_POST['insert_CompanyInfo'])){

        $nom_societe = $_POST['nom_societe'];
        $email_societe = $_POST['email_societe'];
        $telephone = $_POST['telephone'];
        $gsm = $_POST['gsm'];
        $fax = $_POST['fax'];
        $localisation_ville = $_POST['localisation_ville'];
        $localisation_route = $_POST['localisation_route'];
        $query="INSERT INTO company_info(nom_societe,email_societe,telephone,gsm,fax,localisation_ville,localisation_route) VALUES(?,?,?,?,?,?,?)";
        $fetch = $db->insert($query,[
          $nom_societe,$email_societe,$telephone,$gsm,$fax,$localisation_ville,$localisation_route
      ]);
        header("Location:../Login/login.php");

  }
}else{
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
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Veuillez saisir vos societe info.</span></div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="nom_societe" type="text" placeholder="Nom societe" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="email_societe" type="text" placeholder="Email societe" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="telephone" type="text" placeholder="Telephone" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="gsm" type="text" placeholder="gsm" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="fax" type="text" placeholder="fax" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="localisation_ville" type="text" placeholder="Tunise,sfax.." autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="localisation_route" type="text" placeholder="route gabes km6.." autocomplete="off">
                    </div>

                    <button type="submit" name="insert_CompanyInfo" class="btn btn-success btn-lg btn-block">Inseré</button>
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

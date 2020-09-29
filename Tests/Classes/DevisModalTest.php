<?php

require '../../vendor/autoload.php';


//insert devis test
if(isset($_POST['insert_devis'])){

  $data = [

    "nom_client"=>$_POST['nom_client'],
    "prenom_client"=>$_POST['prenom_client'],
    "adress_client"=>  $_POST['adress_client'],
    "codepostal_client"=>    $_POST['codepostal_client'],
    "reference_devis" => $_POST['reference_devis'],
    "designation_devis" =>$_POST['designation_devis'],
    "nb_jour" =>   $_POST['nb_jour'],
    "prix" =>   $_POST['prix'],
    "remise" =>   $_POST['remise'],
    "total" =>     $_POST['total'],
    "date_devis" =>   $_POST['date_devis'],
    "date_validite" =>   $_POST['date_validite']


  ];

  $devis = new Devis();

  $devis->insert_devis($data);



}

//update devis test
if(isset($_POST['update_devis'])){

  $data = [

    "nom_client"=>$_POST['nom_client'],
    "prenom_client"=>$_POST['prenom_client'],
    "adress_client"=>  $_POST['adress_client'],
    "codepostal_client"=>    $_POST['codepostal_client'],
    "reference_devis" => $_POST['reference_devis'],
    "designation_devis" =>$_POST['designation_devis'],
    "nb_jour" =>   $_POST['nb_jour'],
    "prix" =>   $_POST['prix'],
    "remise" =>   $_POST['remise'],
    "total" =>     $_POST['total'],
    "date_devis" =>   $_POST['date_devis'],
    "date_validite" =>   $_POST['date_validite']


  ];

  $devis = new Devis();
  $devis->update_devis('2',$data);

}

//delete devis test
if(isset($_POST['delete_devis']))
{

    $devis = new Devis();
    $devis->delete_devis('1');
}

//Fetch devis by id test
if(isset($_POST['fetch_devis']))
{

  $devis = new Devis();
  $devis_data = $devis->fetch_devis('2');

  echo $devis_data['nom_client'] . '<br>' . $devis_data['prenom_client'];


}

//Fetch all devis test
if(isset($_POST['fetch_allDevis']))
{

  $devis = new Devis();

  $all_devis = $devis->fetch_allDevis();

  foreach($all_devis as $devis)
  {
    echo $devis['nom_client'] . '<br>' . $devis['prenom_client'] .'<br> <br>';
  }
}

?>


<!-- insert devis
<form action="<?php /*$_SERVER['PHP_SELF']; */?>" method="POST">
    <input name="nom_client"   type="text">
    <input name="prenom_client"  type="text">
    <input name="adress_client"  type="text">
    <input name="codepostal_client"  type="text">
    <input name="reference_devis" type="text">
    <input name="designation_devis" type="text">
    <input name="nb_jour" type="text">
    <input name="prix" type="text">
    <input name="remise" type="text">
    <input name="total" type="number">

    <input name="date_devis" type="date">
    <input name="date_validite" type="date">



    <input type="submit" value="send" name="insert_devis">
  </form>

-->


<!-- update devis
<form action="<?php /*$_SERVER['PHP_SELF'];*/ ?>" method="POST">
  <input name="nom_client"   type="text">
  <input name="prenom_client"  type="text">
  <input name="adress_client"  type="text">
  <input name="codepostal_client"  type="text">
  <input name="reference_devis" type="text">
  <input name="designation_devis" type="text">
  <input name="nb_jour" type="text">
  <input name="prix" type="text">
  <input name="remise" type="text">
  <input name="total" type="number">

  <input name="date_devis" type="date">
  <input name="date_validite" type="date">

    <input type="submit" value="send" name="update_devis">
  </form>
  -->

<!-- delete devis
  <form action="<?php /*$_SERVER['PHP_SELF'];*/?>" method="POST">


      <input type="submit" value="send" name="delete_devis">
    </form>
-->

<!-- fetch devis data by id
<form action="<?php /*$_SERVER['PHP_SELF'];*/ ?>" method="POST">

    <input type="submit" value="send" name="fetch_devis">
  </form>
-->


<!-- fetch all cars
      <form action="<?php /*$_SERVER['PHP_SELF'];*/ ?>" method="POST">


          <input type="submit" value="send" name="fetch_allDevis">
        </form>
-->

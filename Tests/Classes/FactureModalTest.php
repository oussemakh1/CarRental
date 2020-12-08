<?php

require '../../vendor/autoload.php';


//insert facture test
if(isset($_POST['insert_facture'])){

  $data = [

    "societe_client"=>$_POST['societe_client'],
    "nom_client"=>$_POST['nom_client'],
    "prenom_client"=>  $_POST['prenom_client'],
    "telephone_client"=>    $_POST['telephone_client'],
    "code_postal_client" => $_POST['code_postal_client'],
    "nom_adress_fact" =>$_POST['nom_adress_fact'],
    "code_postal_fact" =>   $_POST['code_postal_fact'],
    "reference_fact" =>   $_POST['reference_fact'],
    "designation" =>   $_POST['designation'],
    "nb_jour" =>     $_POST['nb_jour'],
    "prix" =>     $_POST['prix'],
    "tva" =>   $_POST['tva'],
    "remise" =>   $_POST['remise'],
    "total" =>   $_POST['total'],
    "date_fact" =>   $_POST['date_fact'],
    "date_reglement" =>   $_POST['date_reglement'],
    "date_acompte" =>   $_POST['date_acompte'],
    "mode_reglement" =>   $_POST['mode_reglement'],
    "mode_livraison" =>   $_POST['mode_livraison']



  ];

  $facture = new Facture();

  $facture->insert_facture($data);



}

//update devis test
if(isset($_POST['update_facture'])){

  $data = [

    "societe_client"=>$_POST['societe_client'],
    "nom_client"=>$_POST['nom_client'],
    "prenom_client"=>  $_POST['prenom_client'],
    "telephone_client"=>    $_POST['telephone_client'],
    "code_postal_client" => $_POST['code_postal_client'],
    "nom_adress_fact" =>$_POST['nom_adress_fact'],
    "code_postal_fact" =>   $_POST['code_postal_fact'],
    "reference_fact" =>   $_POST['reference_fact'],
    "designation" =>   $_POST['designation'],
    "nb_jour" =>     $_POST['nb_jour'],
    "prix" =>     $_POST['prix'],
    "tva" =>   $_POST['tva'],
    "remise" =>   $_POST['remise'],
    "total" =>   $_POST['total'],
    "date_fact" =>   $_POST['date_fact'],
    "date_reglement" =>   $_POST['date_reglement'],
    "date_acompte" =>   $_POST['date_acompte'],
    "mode_reglement" =>   $_POST['mode_reglement'],
    "mode_livraison" =>   $_POST['mode_livraison']



  ];

  $facture = new Facture();
  $facture->update_facture('1',$data);

}

//delete facture test
if(isset($_POST['delete_facture']))
{

    $Facture = new Facture();
    $Facture->delete_facture('1');
}

//Fetch facture by id test
if(isset($_POST['fetch_facture']))
{

  $facture = new Facture();
  $all_facts = $facture->fetch_facture('2');
  echo $all_facts['nom_client'] . '<br>' . $all_facts['prenom_client'];


}

//Fetch all devis test
if(isset($_POST['fetch_allFacture']))
{

  $facture = new Facture();

  $all_fact = $facture->fetch_AllFacture();

  foreach($all_fact as $fact)
  {
    echo $fact['nom_client'] . '<br>' . $fact['prenom_client'] .'<br> <br>';
  }
}

?>


<!-- insert facture
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <input name="societe_client"   type="text">
    <input name="nom_client"  type="text">
    <input name="prenom_client"  type="text">
    <input name="telephone_client"  type="text">
    <input name="code_postal_client" type="text">
    <input name="nom_adress_fact" type="text">
    <input name="code_postal_fact" type="text">
    <input name="reference_fact" type="text">
    <input name="designation" type="text">
    <input name="nb_jour" type="text">
    <input name="prix" type="number">
    <input name="tva" type="number">
    <input name="remise" type="number">
    <input name="total" type="number">
    <input name="date_fact" type="date">
    <input name="date_reglement" type="date">
    <input name="date_acompte" type="date">

    <input name="mode_reglement" type="text">
    <input name="mode_livraison" type="text">






    <input type="submit" value="send" name="insert_facture">
  </form>

-->


<!-- update facture
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<input name="societe_client"   type="text">
<input name="nom_client"  type="text">
<input name="prenom_client"  type="text">
<input name="telephone_client"  type="text">
<input name="code_postal_client" type="text">
<input name="nom_adress_fact" type="text">
<input name="code_postal_fact" type="text">
<input name="reference_fact" type="text">
<input name="designation" type="text">
<input name="nb_jour" type="text">
<input name="prix" type="number">
<input name="tva" type="number">
<input name="remise" type="number">
<input name="total" type="number">
<input name="date_fact" type="date">
<input name="date_reglement" type="date">
<input name="date_acompte" type="date">

<input name="mode_reglement" type="text">
<input name="mode_livraison" type="text">






<input type="submit" value="send" name="update_facture">
  </form>
  -->

<!-- delete facture
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">


      <input type="submit" value="send" name="delete_facture">
    </form>
-->

<!-- fetch facy data by id
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

    <input type="submit" value="send" name="fetch_facture">
  </form>
-->


<!-- fetch all cars-->
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">


          <input type="submit" value="send" name="fetch_allFacture">
        </form>
-->

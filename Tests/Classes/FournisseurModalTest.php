<?php

require '../../vendor/autoload.php';


//insert facture test
if(isset($_POST['insert_fournisseur'])){

  $data = [

    "societe"=>$_POST['societe'],
    "civilite"=>$_POST['civilite'],
    "nom_contact"=>$_POST['nom_contact'],
    "prenom_contact"=>$_POST['prenom_contact'],
    "adresse" =>$_POST['adresse'],
    "code_postal"=>$_POST['code_postal'],
    "ville"=>$_POST['ville'],
    "pays"=>$_POST['pays'],
    "telephone"=>$_POST['telephone'],
    "gsm"=>$_POST['gsm'],
    "fax"=>$_POST['fax'],
    "email"=>$_POST['email'],
    "observation"=>$_POST['observation']




  ];

  $fournisseur = new Fournisseur();

  $fournisseur->insert_fournisseur($data);



}

//update Fournissuer test
if(isset($_POST['update_fournisseur'])){
  $data = [

    "societe"=>$_POST['societe'],
    "civilite"=>$_POST['civilite'],
    "nom_contact"=>$_POST['nom_contact'],
    "prenom_contact"=>$_POST['prenom_contact'],
    "adresse" =>$_POST['adresse'],
    "code_postal"=>$_POST['code_postal'],
    "ville"=>$_POST['ville'],
    "pays"=>$_POST['pays'],
    "telephone"=>$_POST['telephone'],
    "gsm"=>$_POST['gsm'],
    "fax"=>$_POST['fax'],
    "email"=>$_POST['email'],
    "observation"=>$_POST['observation']




  ];
  $fournisseur = new Fournisseur();
  $fournisseur->update_fournisseur('1',$data);

}

//delete fournisseur test
if(isset($_POST['delete_fournisseur']))
{

    $fournisseur = new Fournisseur();
    $fournisseur->delete_fournisseur('1');
}

//Fetch fournisseur by id test
if(isset($_POST['fetch_fournisseur']))
{

  $fournisseur = new Fournisseur();
  $fournisseur_byId = $fournisseur->fetch_Fournisseur('2');
  echo $fournisseur_byId['nom_contact'] . '<br>' . $fournisseur_byId['prenom_contact'];


}

//Fetch all fournisseur test
if(isset($_POST['fetch_allFournisseur']))
{

  $fournisseur = new Fournisseur();
  $all_fournisseur = $fournisseur->fetch_allFournisseur();

  foreach($all_fournisseur as $fournisseur)
  {
    echo $fournisseur['nom_contact'] . '<br>' . $fournisseur['prenom_contact'] .'<br> <br>';
  }
}

?>


<!-- insert fournisseur
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <input name="societe"   type="text">
    <input name="civilite"  type="text">
    <input name="nom_contact"  type="text">
    <input name="prenom_contact"  type="text">
    <input name="adresse" type="text">
    <input name="code_postal" type="text">
    <input name="ville" type="text">
    <input name="pays" type="text">
    <input name="telephone" type="text">
    <input name="gsm" type="text">
    <input name="fax" type="number">
    <input name="email" type="number">
    <input name="observation" type="number">

    <input type="submit" value="send" name="insert_fournisseur">
  </form>

-->


<!-- update fournisseur
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
      <input name="societe"   type="text">
      <input name="civilite"  type="text">
      <input name="nom_contact"  type="text">
      <input name="prenom_contact"  type="text">
      <input name="adresse" type="text">
      <input name="code_postal" type="text">
      <input name="ville" type="text">
      <input name="pays" type="text">
      <input name="telephone" type="text">
      <input name="gsm" type="text">
      <input name="fax" type="number">
      <input name="email" type="number">
      <input name="observation" type="number">

      <input type="submit" value="send" name="update_fournisseur">
  </form>
  -->

<!-- delete facture
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">


      <input type="submit" value="send" name="delete_fournisseur">
    </form>
-->

<!-- fetch fournisseur data by id
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

    <input type="submit" value="send" name="fetch_fournisseur">
  </form>
-->


<!-- fetch all fournisseur
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">


          <input type="submit" value="send" name="fetch_allFournisseur">
        </form>
-->

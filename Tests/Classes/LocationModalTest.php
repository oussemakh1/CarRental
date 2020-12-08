<?php

require '../../vendor/autoload.php';


//insert Location test
if(isset($_POST['insert_location'])){

  $data = [

    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "date_naissance"=>$_POST['date_naissance'],
    "adress"=>$_POST['adress'],
    "code_postal" =>$_POST['code_postal'],
    "ville"=>$_POST['ville'],
    "pays"=>$_POST['pays'],
    "telephone"=>$_POST['telephone'],
    "email"=>$_POST['email'],
    "n_permis"=>$_POST['n_permis'],
    "date_delivrance"=>$_POST['date_delivrance'],
    "lieu_delivrance"=>$_POST['lieu_delivrance'],
    "cin"=>$_POST['cin'],
    "type_client"=>$_POST['type_client'],
    "marque_vehicule"=>$_POST['marque_vehicule'],
    "immatriculation_vehicule"=>$_POST['immatriculation_vehicule'],
    "proprietaire"=>$_POST['proprietaire'],
    "etat_vehicule"=>$_POST['etat_vehicule'],
    "assurance"=>$_POST['assurance'],
    "caution"=>$_POST['caution'],
    "mode_paiement"=>$_POST['mode_paiement'],
    "nb_jour"=>$_POST['nb_jour'],
    "date_depart"=>$_POST['date_depart'],
    "heure_depart"=>$_POST['heure_depart'],
    "date_retour"=>$_POST['date_retour'],
    "heure_retour"=>$_POST['heure_retour'],
    "prix_ht"=>$_POST['prix_ht'],
    "tva"=>$_POST['tva'],
    "prix_ttc"=>$_POST['prix_ttc'],
    "paye_le"=>$_POST['paye_le'],
    "deja_regle_acompte"=>$_POST['deja_regle_acompte'],
    "date_acompte"=>$_POST['date_acompte'],
    "lieu_retour"=>$_POST['lieu_retour']




  ];

  $location = new Location();
  $location->insert_Location($data);


}

//update location test
if(isset($_POST['update_location'])){

    $data = [

      "nom"=>$_POST['nom'],
      "prenom"=>$_POST['prenom'],
      "date_naissance"=>$_POST['date_naissance'],
      "adress"=>$_POST['adress'],
      "code_postal" =>$_POST['code_postal'],
      "ville"=>$_POST['ville'],
      "pays"=>$_POST['pays'],
      "telephone"=>$_POST['telephone'],
      "email"=>$_POST['email'],
      "n_permis"=>$_POST['n_permis'],
      "date_delivrance"=>$_POST['date_delivrance'],
      "lieu_delivrance"=>$_POST['lieu_delivrance'],
      "cin"=>$_POST['cin'],
      "type_client"=>$_POST['type_client'],
      "marque_vehicule"=>$_POST['marque_vehicule'],
      "immatriculation_vehicule"=>$_POST['immatriculation_vehicule'],
      "proprietaire"=>$_POST['proprietaire'],
      "etat_vehicule"=>$_POST['etat_vehicule'],
      "assurance"=>$_POST['assurance'],
      "caution"=>$_POST['caution'],
      "mode_paiement"=>$_POST['mode_paiement'],
      "nb_jour"=>$_POST['nb_jour'],
      "date_depart"=>$_POST['date_depart'],
      "heure_depart"=>$_POST['heure_depart'],
      "date_retour"=>$_POST['date_retour'],
      "heure_retour"=>$_POST['heure_retour'],
      "prix_ht"=>$_POST['prix_ht'],
      "tva"=>$_POST['tva'],
      "prix_ttc"=>$_POST['prix_ttc'],
      "paye_le"=>$_POST['paye_le'],
      "deja_regle_acompte"=>$_POST['deja_regle_acompte'],
      "date_acompte"=>$_POST['date_acompte'],
      "lieu_retour"=>$_POST['lieu_retour']




    ];

    $location = new Location();
    $location->update_location('1',$data);
}

//delete location test
if(isset($_POST['delete_location']))
{

  $location = new Location();
  $location->delete_Location("1");
}

//Fetch location by id test
if(isset($_POST['fetch_location']))
{

  $location = new Location();
  $fetch_location = $location->fetch_location("2");

  echo $fetch_location['nom'];

}

//Fetch all Location test
if(isset($_POST['fetch_allLocation']))
{

  $location = new Location();
  $fetch_allLocation = $location->fetch_AllLocation();

  foreach($fetch_allLocation as $location)
  {
    echo $location['nom'] . '<br>' . $location['prenom'] .'<br> <br>';
  }
}

?>


<!-- insert Location
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <input name="nom"   type="text">
    <input name="prenom"  type="text">
    <input name="date_naissance"  type="text">
    <input name="adress"  type="text">
    <input name="code_postal" type="text">
    <input name="ville" type="text">
    <input name="pays" type="text">
    <input name="telephone" type="text">
    <input name="email" type="text">
    <input name="n_permis" type="text">
    <input name="date_delivrance" type="number">
    <input name="lieu_delivrance" type="number">
    <input name="cin" type="number">
    <input name="type_client" type="number">
    <input name="marque_vehicule" type="number">
    <input name="immatriculation_vehicule" type="number">
    <input name="proprietaire" type="number">
    <input name="etat_vehicule" type="number">
    <input name="assurance" type="number">
    <input name="caution" type="number">
    <input name="mode_paiement" type="number">
    <input name="nb_jour" type="number">
    <input name="date_depart" type="number">
    <input name="heure_depart" type="number">
    <input name="date_retour" type="number">
    <input name="heure_retour" type="number">
    <input name="prix_ht" type="number">
    <input name="tva" type="number">
    <input name="prix_ttc" type="number">
    <input name="paye_le" type="number">
    <input name="deja_regle_acompte" type="number">
    <input name="date_acompte" type="number">
    <input name="lieu_retour" type="number">

    <input type="submit" value="send" name="insert_location">
  </form>

-->


<!-- update location
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <input name="nom"   type="text">
    <input name="prenom"  type="text">
    <input name="date_naissance"  type="text">
    <input name="adress"  type="text">
    <input name="code_postal" type="text">
    <input name="ville" type="text">
    <input name="pays" type="text">
    <input name="telephone" type="text">
    <input name="email" type="text">
    <input name="n_permis" type="text">
    <input name="date_delivrance" type="number">
    <input name="lieu_delivrance" type="number">
    <input name="cin" type="number">
    <input name="type_client" type="number">
    <input name="marque_vehicule" type="number">
    <input name="immatriculation_vehicule" type="number">
    <input name="proprietaire" type="number">
    <input name="etat_vehicule" type="number">
    <input name="assurance" type="number">
    <input name="caution" type="number">
    <input name="mode_paiement" type="number">
    <input name="nb_jour" type="number">
    <input name="date_depart" type="number">
    <input name="heure_depart" type="number">
    <input name="date_retour" type="number">
    <input name="heure_retour" type="number">
    <input name="prix_ht" type="number">
    <input name="tva" type="number">
    <input name="prix_ttc" type="number">
    <input name="paye_le" type="number">
    <input name="deja_regle_acompte" type="number">
    <input name="date_acompte" type="number">
    <input name="lieu_retour" type="number">

    <input type="submit" value="send" name="update_location">

  </form>
  -->

<!-- delete facture
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">


      <input type="submit" value="send" name="delete_location">
    </form>
-->

<!-- fetch location data by id
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

    <input type="submit" value="send" name="fetch_location">
  </form>
-->


<!-- fetch all Location
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">


          <input type="submit" value="send" name="fetch_allLocation">
        </form>
-->

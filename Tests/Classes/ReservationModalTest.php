<?php

require '../../vendor/autoload.php';


//insert Reservation test
if(isset($_POST['insert_reservation'])){

  $data = [

    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "email"=>$_POST['email'],
    "adress"=>$_POST['adress'],
    "date_naissance"=>$_POST['date_naissance'],
    "code_postal" =>$_POST['code_postal'],
    "ville"=>$_POST['ville'],
    "pays"=>$_POST['pays'],
    "telephone"=>$_POST['telephone'],
    "n_permis"=>$_POST['n_permis'],
    "date_delivrance"=>$_POST['date_delivrance'],
    "lieu_delivrance"=>$_POST['lieu_delivrance'],
    "cin"=>$_POST['cin'],
    "marque_vehicule"=>$_POST['marque_vehicule'],
    "immatriculation_vehicule"=>$_POST['immatriculation_vehicule'],
    "proprietaire"=>$_POST['proprietaire'],
    "etat_vehicule"=>$_POST['etat_vehicule'],
    "assurance"=>$_POST['assurance'],
    "nb_jour"=>$_POST['nb_jour'],
    "date_depart"=>$_POST['date_depart'],
    "heure_depart"=>$_POST['heure_depart'],
    "date_retour"=>$_POST['date_retour'],
    "heure_retour"=>$_POST['heure_retour'],


  ];

  $reservation = new Reservation();
  $reservation->insert_reservation($data);


}

//update resesrvation test
if(isset($_POST['update_reservation'])){


    $data = [

      "nom"=>$_POST['nom'],
      "prenom"=>$_POST['prenom'],
      "email"=>$_POST['email'],
      "adress"=>$_POST['adress'],
      "date_naissance"=>$_POST['date_naissance'],
      "code_postal" =>$_POST['code_postal'],
      "ville"=>$_POST['ville'],
      "pays"=>$_POST['pays'],
      "telephone"=>$_POST['telephone'],
      "n_permis"=>$_POST['n_permis'],
      "date_delivrance"=>$_POST['date_delivrance'],
      "lieu_delivrance"=>$_POST['lieu_delivrance'],
      "cin"=>$_POST['cin'],
      "marque_vehicule"=>$_POST['marque_vehicule'],
      "immatriculation_vehicule"=>$_POST['immatriculation_vehicule'],
      "proprietaire"=>$_POST['proprietaire'],
      "etat_vehicule"=>$_POST['etat_vehicule'],
      "assurance"=>$_POST['assurance'],
      "nb_jour"=>$_POST['nb_jour'],
      "date_depart"=>$_POST['date_depart'],
      "heure_depart"=>$_POST['heure_depart'],
      "date_retour"=>$_POST['date_retour'],
      "heure_retour"=>$_POST['heure_retour'],


    ];

    $reservation = new Reservation();
    $reservation->update_reservation('1',$data);
}

//delete location test
if(isset($_POST['delete_reservation']))
{

  $reservation = new Reservation();
  $reservation->delete_reservation("1");
}

//Fetch Reservation by id test
if(isset($_POST['fetch_reservation']))
{

  $reservation = new Reservation();
  $fetch_reservation= $reservation->fetch_reservation("2");

  echo $fetch_reservation['nom'];

}

//Fetch all Location test
if(isset($_POST['fetch_allReservation']))
{

  $reservation = new Reservation();
  $fetch_reservation= $reservation->fetch_allReservation();


  foreach($fetch_reservation as $reservation)
  {
    echo $reservation['nom'] . '<br>' . $reservation['prenom'] .'<br> <br>';
  }
}

?>


<!-- insert reservation
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <input name="nom"   type="text">
    <input name="prenom"  type="text">
    <input name="email"  type="text">
    <input name="date_naissance"  type="text">
    <input name="adress"  type="text">
    <input name="code_postal" type="text">
    <input name="ville" type="text">
    <input name="pays" type="text">
    <input name="telephone" type="text">
    <input name="n_permis" type="text">
    <input name="date_delivrance" type="number">
    <input name="lieu_delivrance" type="number">
    <input name="cin" type="number">
    <input name="marque_vehicule" type="number">
    <input name="immatriculation_vehicule" type="number">
    <input name="proprietaire" type="number">
    <input name="etat_vehicule" type="number">
    <input name="assurance" type="number">
    <input name="nb_jour" type="number">
    <input name="date_depart" type="number">
    <input name="heure_depart" type="number">
    <input name="date_retour" type="number">
    <input name="heure_retour" type="number">

    <input type="submit" value="send" name="insert_reservation">
  </form>

-->


<!-- update reservation
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <input name="nom"   type="text">
    <input name="prenom"  type="text">
    <input name="email"  type="text">
    <input name="date_naissance"  type="text">
    <input name="adress"  type="text">
    <input name="code_postal" type="text">
    <input name="ville" type="text">
    <input name="pays" type="text">
    <input name="telephone" type="text">
    <input name="n_permis" type="text">
    <input name="date_delivrance" type="number">
    <input name="lieu_delivrance" type="number">
    <input name="cin" type="number">
    <input name="marque_vehicule" type="number">
    <input name="immatriculation_vehicule" type="number">
    <input name="proprietaire" type="number">
    <input name="etat_vehicule" type="number">
    <input name="assurance" type="number">
    <input name="nb_jour" type="number">
    <input name="date_depart" type="number">
    <input name="heure_depart" type="number">
    <input name="date_retour" type="number">
    <input name="heure_retour" type="number">

    <input type="submit" value="send" name="update_reservation">
  </form>
  -->

<!-- delete reservation
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">


      <input type="submit" value="send" name="delete_reservation">
    </form>
-->

<!-- fetch location data by id
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

    <input type="submit" value="send" name="fetch_reservation">
  </form>
-->


<!-- fetch all Location -->
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">


          <input type="submit" value="send" name="fetch_allReservation">
        </form>
-->

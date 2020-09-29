<?php

require '../../vendor/autoload.php';


//insert client test
if(isset($_POST['insert_client'])){

  $data = [

    "nom" =>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "email"=>$_POST['email'],
    "date_naissance"=>  $_POST['date_naissance'],
    "telephone"=>    $_POST['telephone'],
    "cin" => $_POST['cin'],
    "adress" =>$_POST['adress'],
    "ville" =>   $_POST['ville'],
    "pays" =>   $_POST['pays'],
    "n_permis" =>     $_POST['n_permis'],
    "code_postal" =>   $_POST['code_postal']

  ];

  $client = new Client();

  $client->insert_client($data);



}

//update client test
if(isset($_POST['update_client'])){

  $data = [

    "nom" =>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "email"=>$_POST['email'],
    "date_naissance"=>  $_POST['date_naissance'],
    "telephone"=>    $_POST['telephone'],
    "cin" => $_POST['cin'],
    "adress" =>$_POST['adress'],
    "ville" =>   $_POST['ville'],
    "pays" =>   $_POST['pays'],
    "n_permis" =>     $_POST['n_permis'],
    "code_postal" =>   $_POST['code_postal']

  ];

  $client = new Client();
  $client->update_client('4',$data);
}

//delete client test
if(isset($_POST['delete_client']))
{
    $client = new Client();
    $client->delete_client('5');
}

//Fetch client by id test
if(isset($_POST['fetch_client']))
{

  $client = new Client();
  $client_data = $client->fetch_client('1');

  echo $client_data['nom'] . '<br>' . $client_data['prenom'];


}

//Fetch all clients test
if(isset($_POST['fetch_allClients']))
{

  $client = new Client();

  $all_clients = $client->fetch_allClients();

  foreach($all_clients as $client)
  {
    echo $client['nom'] . '<br>' . $client['prenom'] .'<br> <br>';
  }
}

?>


<!-- insert client
<form action="<?php /*$_SERVER['PHP_SELF']; */?>" method="POST">
    <input name="nom"   type="text">
    <input name="prenom"  type="text">
    <input name="email"  type="text">
    <input name="date_naissance"  type="text">
    <input name="telephone" type="text">
    <input name="cin" type="text">
    <input name="adress" type="text">
    <input name="ville" type="text">
    <input name="pays" type="text">
    <input name="n_permis" type="number">

    <input name="code_postal" type="number">


    <input type="submit" value="send" name="insert_client">
  </form>

-->
<!-- update client
<form action="<?/*php $_SERVER['PHP_SELF']; */?>" method="POST">
    <input name="nom"   type="text">
    <input name="prenom"  type="text">
    <input name="email"  type="text">
    <input name="date_naissance"  type="text">
    <input name="telephone" type="text">
    <input name="cin" type="text">
    <input name="adress" type="text">
    <input name="ville" type="text">
    <input name="pays" type="text">
    <input name="n_permis" type="number">

    <input name="code_postal" type="number">


    <input type="submit" value="send" name="update_client">
  </form>
  -->

<!-- delete client
  <form action="<?php /*$_SERVER['PHP_SELF'];*/?>" method="POST">


      <input type="submit" value="send" name="delete_client">
    </form>
-->

<!-- fetch client data by id
<form action="<?php /*$_SERVER['PHP_SELF'];*/ ?>" method="POST">

    <input type="submit" value="send" name="fetch_client">
  </form>
-->


<!-- fetch all cars
      <form action="<?php /*$_SERVER['PHP_SELF'];*/ ?>" method="POST">


          <input type="submit" value="send" name="fetch_allClients">
        </form>
-->

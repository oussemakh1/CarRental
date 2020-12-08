<?php

require '../../vendor/autoload.php';


//insert Reservation test
if(isset($_POST['insert_reparation'])){

  $data = [

    "immatriculation"=>$_POST['immatriculation'],
    "marque"=>$_POST['marque'],
    "model"=>$_POST['model'],
    "type_vehicule"=>$_POST['type_vehicule'],
    "date_mise_circulation"=>$_POST['date_mise_circulation'],
    "date_entree_garage" =>$_POST['date_entree_garage'],
    "date_sortie_garage"=>$_POST['date_sortie_garage'],
    "kilometrage"=>$_POST['kilometrage'],
    "niveau_essence"=>$_POST['niveau_essence'],
    "n_serie"=>$_POST['n_serie']

  ];

  $reparation = new Reparation();

  $reparation->insert_reparation($data);


}

//update resesrvation test
if(isset($_POST['update_reparation'])){


    $data = [

      "immatriculation"=>$_POST['immatriculation'],
      "marque"=>$_POST['marque'],
      "model"=>$_POST['model'],
      "type_vehicule"=>$_POST['type_vehicule'],
      "date_mise_circulation"=>$_POST['date_mise_circulation'],
      "date_entree_garage" =>$_POST['date_entree_garage'],
      "date_sortie_garage"=>$_POST['date_sortie_garage'],
      "kilometrage"=>$_POST['kilometrage'],
      "niveau_essence"=>$_POST['niveau_essence'],
      "n_serie"=>$_POST['n_serie']

    ];

    $reparation = new Reparation();

    $reparation->update_reparation('1',$data);
}

//delete reparataion test
if(isset($_POST['delete_reparation']))
{

  $reparation = new Reparation();

  $reparation->delete_reparation('1');
}

//Fetch reparation by id test
if(isset($_POST['fetch_reparation']))
{

  $reparation = new Reparation();

  $fetch_reparation = $reparation->fetch_reparation('2');

  echo $fetch_reparation['marque'];

}

//Fetch all Location test
if(isset($_POST['fetch_allReparation']))
{

  $reparation = new Reparation();

  $fetch_allReparation = $reparation->fetch_allReparation('2');


  foreach($fetch_allReparation as $reparation)
  {
    echo $reparation['marque'] . '<br>' . $reparation['model'] .'<br> <br>';
  }
}

?>


<!-- insert reparation
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <input name="immatriculation"   type="text">
    <input name="marque"  type="text">
    <input name="model"  type="text">
    <input name="type_vehicule"  type="text">
    <input name="date_mise_circulation"  type="text">
    <input name="date_entree_garage" type="text">
    <input name="date_sortie_garage" type="text">
    <input name="kilometrage" type="text">
    <input name="niveau_essence" type="text">
    <input name="n_serie" type="text">

    <input type="submit" value="send" name="insert_reparation">
  </form>

-->


<!-- update reservation
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <input name="immatriculation"   type="text">
    <input name="marque"  type="text">
    <input name="model"  type="text">
    <input name="type_vehicule"  type="text">
    <input name="date_mise_circulation"  type="text">
    <input name="date_entree_garage" type="text">
    <input name="date_sortie_garage" type="text">
    <input name="kilometrage" type="text">
    <input name="niveau_essence" type="text">
    <input name="n_serie" type="text">

    <input type="submit" value="send" name="update_reparation">
</form>
  -->

<!-- delete reservation
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">


      <input type="submit" value="send" name="delete_reparation">
    </form>
-->

<!-- fetch reparation data by id
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

    <input type="submit" value="send" name="fetch_reparation">
  </form>
-->


<!-- fetch all reparation -->
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">


          <input type="submit" value="send" name="fetch_allReparation">
        </form>
-->

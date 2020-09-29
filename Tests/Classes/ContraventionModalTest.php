<?php

require '../../vendor/autoload.php';


//insert_contravention test
if(isset($_POST['insert_contravention'])){

  $data = [

    "date_enregistrement" =>$_POST['date_enregistrement'],
    "avis_contravention"=>$_POST['avis_contravention'],
    "date_contravention"=>$_POST['date_contravention'],
    "nature_contravention"=>  $_POST['nature_contravention'],
    "lieu_infraction"=>    $_POST['lieu_infraction'],
    "commune_infraction" => $_POST['commune_infraction'],
    "montant_infraction" =>$_POST['montant_infraction'],
    "observation" =>   $_POST['observation'],
    "n_serie" =>   $_POST['n_serie']


  ];

  $contravention = new Contraventions();

  $contravention->insert_contravention($data);



}

//update contravention test
if(isset($_POST['update_contravention'])){

  $data = [

    "date_enregistrement" =>$_POST['date_enregistrement'],
    "avis_contravention"=>$_POST['avis_contravention'],
    "date_contravention"=>$_POST['date_contravention'],
    "nature_contravention"=>  $_POST['nature_contravention'],
    "lieu_infraction"=>    $_POST['lieu_infraction'],
    "commune_infraction" => $_POST['commune_infraction'],
    "montant_infraction" =>$_POST['montant_infraction'],
    "observation" =>   $_POST['observation'],
    "n_serie" =>   $_POST['n_serie']

  ];

  $contravention = new Contraventions();
  $contravention->update_contravention('1',$data);
}

//delete contravention test
if(isset($_POST['delete_contravention']))
{
    $contravention = new Contraventions();
    $contravention->delete_contravention('2');
}

//Fetch contravention by id test
if(isset($_POST['fetch_contravention']))
{

  $contravention = new Contraventions();
  $fetch_contravention = $contravention->fetch_contravention('1');

  echo $fetch_contravention['avis_contravention'] . '<br>' . $fetch_contravention['date_enregistrement'];


}

//Fetch all contravention test
if(isset($_POST['fetch_allContravention']))
{

  $contravention = new Contraventions();

  $all_contravention = $contravention->fetch_allContravention();

  foreach($all_contravention as $contravention)
  {
    echo $contravention['avis_contravention'] . '<br>' . $contravention['date_enregistrement'] .'<br> <br>';
  }
}

?>


<!-- insert contravention
  <form action="<?php /*$_SERVER['PHP_SELF']; */?>" method="POST">
      <input name="date_enregistrement"   type="date">
      <input name="avis_contravention"  type="text">
      <input name="date_contravention"  type="text">
      <input name="nature_contravention"  type="text">
      <input name="lieu_infraction" type="text">
      <input name="commune_infraction" type="text">
      <input name="observation" type="text">
      <input name="n_serie" type="text">
      <input name="montant_infraction" type="number">

      <input type="submit" value="send" name="insert_contravention">
    </form>
-->


<!-- update contravention
<form action="<?php /*$_SERVER['PHP_SELF']; */?>" method="POST">
      <input name="date_enregistrement"   type="date">
      <input name="avis_contravention"  type="text">
      <input name="date_contravention"  type="date">
      <input name="nature_contravention"  type="text">
      <input name="lieu_infraction" type="text">
      <input name="commune_infraction" type="text">
      <input name="observation" type="text">
      <input name="n_serie" type="number">
      <input name="montant_infraction" type="number">

      <input type="submit" value="send" name="update_contravention">
    </form>
  -->

<!-- delete contravention
  <form action="<?php /*$_SERVER['PHP_SELF'];*/?>" method="POST">


      <input type="submit" value="send" name="delete_contravention">
    </form>
-->

<!-- fetch contravention data by id
<form action="<?php /*$_SERVER['PHP_SELF']; */?>" method="POST">

    <input type="submit" value="send" name="fetch_contravention">
  </form>
-->


<!-- fetch all clients-->
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">


          <input type="submit" value="send" name="fetch_allContravention">
        </form>
-->

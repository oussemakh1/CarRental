<?php

require '../../vendor/autoload.php';


//insert car test
if(isset($_POST['insert_car'])){

  $data = [

    "fournisseur" =>$_POST['fournisseur'],
    "marque"=>$_POST['marque'],
    "model"=>$_POST['model'],
    "carburant"=>  $_POST['carburant'],
    "date_achat"=>    $_POST['date_achat'],
    "duree_vie" => $_POST['duree_vie'],
    "nb_km_avant_revision" =>$_POST['nb_km'],
    "prix_achat_ht" =>   $_POST['prix_achat_ht'],
    "montant_traites_mensuel" =>   $_POST['montant_traits_mensuel'],
    "nombre_traites" =>     $_POST['nombre_traits'],
    "num_facture_fournisseur" =>   $_POST['num_facture_fournisseur'],
    "color" =>  $_POST['color'],
    "type_vehicule" => $_POST['type_vehicule'],
    "categorie" => $_POST['categorie'],
    "n_assurance" =>  $_POST['n_assurance'],
    "detail_reparation" => $_POST['detail_reparation'],
    "n_serie" => $_POST['n_serie'],
    "carte_grise" => $_POST['carte_grise'],
    "img" =>   $_POST['img'],
    "tva" => $_POST['tva'],
    "prix_achat_ttc" => $_POST['prix_achat_ttc']
  ];

  $cars = new Cars();

  $cars->insert_car($data);



}

//update car test
if(isset($_POST['update_car'])){

  $data = [

    "fournisseur" =>$_POST['fournisseur'],
    "marque"=>$_POST['marque'],
    "model"=>$_POST['model'],
    "carburant"=>  $_POST['carburant'],
    "date_achat"=>    $_POST['date_achat'],
    "duree_vie" => $_POST['duree_vie'],
    "nb_km_avant_revision" =>$_POST['nb_km'],
    "prix_achat_ht" =>   $_POST['prix_achat_ht'],
    "montant_traites_mensuel" =>   $_POST['montant_traits_mensuel'],
    "nombre_traites" =>     $_POST['nombre_traits'],
    "num_facture_fournisseur" =>   $_POST['num_facture_fournisseur'],
    "color" =>  $_POST['color'],
    "type_vehicule" => $_POST['type_vehicule'],
    "categorie" => $_POST['categorie'],
    "n_assurance" =>  $_POST['n_assurance'],
    "detail_reparation" => $_POST['detail_reparation'],
    "n_serie" => $_POST['n_serie'],
    "carte_grise" => $_POST['carte_grise'],
    "img" =>   $_POST['img'],
    "tva" => $_POST['tva'],
    "prix_achat_ttc" => $_POST['prix_achat_ttc']
  ];

  $cars = new Cars();

  $cars->update_car('12',$data);

}

//delete car test
if(isset($_POST['delete_car']))
{
  $car = new Cars();
  $car->delete_car(11);
}

//Fetch car by id test
if(isset($_POST['fetch_car']))
{
  $car = new Cars();

  $car_OldData = $car->get_CarById(10);
  echo $car_OldData['fournisseur'] .'<br>' . $car_OldData['marque'];


}

//Fetch all cars test
if(isset($_POST['fetch_allCars']))
{
  $cars = new Cars();

  $all_cars = $cars->get_allCars();

  foreach($all_cars as $car)
  {
    echo $car['fournisseur'] . '<br>' . $car['marque'] .'<br> <br>';
  }
}

?>

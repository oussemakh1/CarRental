<?php

//include database class
require_once '../../lib/Database.php';
//include messages
include_once '../../func/messages.php';
//include Validations
include_once '../../func/Validations.php';



class Cars {

private  $db;
private  $fournisseur;
private  $marque;
private  $model;
private  $carburant;
private  $date_achat;
private  $duree_vie;
private  $nb_km_avant_revision ;
private  $prix_achat_ht;
private  $tva;
private  $prix_achat_ttc;
private  $montant_traites_mensuel;
private  $nombre_traites;
private  $num_facture_fournisseur ;
private  $color;
private  $type_vehicule;
private  $n_assurance;
private  $detail_reparation;
private  $n_serie ;
private  $carte_grise;
private  $img ;


//Execute database connection
public function __construct()
{
  $this->db = new Database();
}

private function cars_data_collect($data){

  $this->fournisseur = $data['fournisseur'];
  $this->marque = $data['marque'];
  $this->model = $data['model'];
  $this->carburant = $data['carburant'];
  $this->date_achat = $data['date_achat'];
  $this->duree_vie = $data['duree_vie'];
  $this->nb_km_avant_revision = $data['nb_km_avant_revision'];
  $this->prix_achat_ht = $data['prix_achat_ht'];
  $this->tva = $data['tva'];
  $this->prix_achat_ttc = $data['prix_achat_ttc'];
  $this->montant_traites_mensuel = $data['montant_traites_mensuel'];
  $this->nombre_traites = $data['nombre_traites'];
  $this->num_facture_fournisseur = $data['num_facture_fournisseur'];
  $this->color = $data['color'];
  $this->type_vehicule = $data['type_vehicule'];
  $this->n_assurance = $data['n_assurance'];
  $this->detail_reparation = $data['detail_reparation'];
  $this->n_serie = $data['n_serie'];
  $this->carte_grise = $data['carte_grise'];


}

private function carExist($n_serie)
{
  $query ="SELECT n_serie FROM cars WHERE n_serie = ?";
  $fetch_car = $this->db->select($query,[$n_serie]);

  if($fetch_car)
  {
    return true;
  } else {
    return false;
  }
}


//Insert new car function
public function insert_car($data)
{

    //Data collection
    $this->cars_data_collect($data);
    //check if car already exists else insert it into database
    $car_status = $this->carExist($this->n_serie);
    if($car_status == false){
      //Query
      $query = "INSERT INTO cars(fournisseur,marque,model,carburant,date_achat,duree_vie,nb_km_avant_revision,prix_achat_ht,
                tva,prix_achat_ttc,montant_traites_mensuel,nombre_traites,num_facture_fournisseur,color,type_vehicule,
                n_assurance,detail_reparation,n_serie,carte_grise)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


      //Insert new car
      $new_car = $this->db->insert(
          $query,
          [
              $this->fournisseur,
              $this->marque,
              $this->model,
              $this->carburant,
              $this->date_achat,
              $this->duree_vie,
              $this->nb_km_avant_revision,
              $this->prix_achat_ht,
              $this->tva,
              $this->prix_achat_ttc,
              $this->montant_traites_mensuel,
              $this->nombre_traites,
              $this->num_facture_fournisseur,
              $this->color,
              $this->type_vehicule,
              $this->n_assurance,
              $this->detail_reparation,
              $this->n_serie,
              $this->carte_grise

          ]
      );

      //Error handling
      if($new_car){
        return header("Location:../Vehicules/Vehicules_all.php?insert_success");
      }else{
        return insert_error_message();
      }

    } else {
      return header("Location:?error_message=Cette vehicule déja exist");
    }
}



//Update car function
public function update_car($id,$data)
{

  //Data collection
  $this->cars_data_collect($data);

  //Query
  $query = "UPDATE cars SET  fournisseur = ?,
    marque = ?,
    model = ?,
    carburant = ?,
    date_achat = ?,
    duree_vie = ?,
    nb_km_avant_revision = ?,
    prix_achat_ht = ?,
    tva =? ,
    prix_achat_ttc = ? ,
    montant_traites_mensuel =?,
    nombre_traites =?,
    num_facture_fournisseur=?,
    color=?,
    type_vehicule=?,
    n_assurance=?,
    detail_reparation=?,
    n_serie=?,
    carte_grise=?
    WHERE id = ?";

  //Update car
  $car_update = $this->db->update(
      $query,
      [
        $this->fournisseur,
        $this->marque,
        $this->model,
        $this->carburant,
        $this->date_achat,
        $this->duree_vie,
        $this->nb_km_avant_revision ,
        $this->prix_achat_ht,
        $this->tva,
        $this->prix_achat_ttc,
        $this->montant_traites_mensuel,
        $this->nombre_traites,
        $this->num_facture_fournisseur,
        $this->color,
        $this->type_vehicule,
        $this->n_assurance,
        $this->detail_reparation,
        $this->n_serie,
        $this->carte_grise,
        $id
     ]
  );

  //Error handling
  if($car_update->rowCount() > 0){
    return header("Location:../Vehicules/Vehicules_all.php?update_success");
  }
  else{
    return update_error_message();
  }

}


//Delete car function
public function delete_car($id)
{

  //Query
  $query = "DELETE FROM cars  WHERE id = ?";

  //Delete car
  $delete_car = $this->db->delete($query,[$id]);

  //Error handling
  if($delete_car)
  {
    return header("Location:../Vehicules/Vehicules_all.php?delete_success");
  }
  else{
    return delete_error_message();
  }

}


//Get car By id  Function
public function get_CarById($id)
{
  //Fetch car
  $query ="SELECT * FROM cars WHERE id =?";
  $fetch_car = $this->db->select($query,[$id]);

  if($fetch_car){
    return $fetch_car->fetch();
  }else{
    return header("Location:?error=Cette vehicule n'exist pas!");
  }
}


//Get all cars function
public function get_allCars()
{
  //Fetch Cars
  $query =" SELECT * FROM cars ORDER BY id DESC";
  $fetch_cars = $this->db->query($query);

  if($fetch_cars){
    return $fetch_cars->fetchAll();
  }else{
    return header("Location:?error_noVehicule=il n y pas des vehicules pour le moment!");
  }
}


}

 ?>

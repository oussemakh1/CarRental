<?php

//include database class
require_once '../../lib/Database.php';
//include messages
include '../../lib/messages.php';



class Cars {

private $db;
private  $fournisseur;
private  $marque;
private  $model;
private  $carburant;
private  $date_achat;
private  $duree_vie;
private  $nb_km_avant_revision ;
private $prix_achat_ht;
private $tva;
private $prix_achat_ttc;
private $montant_traites_mensuel;
private  $nombre_traites;
private  $num_facture_fournisseur ;
private $color;
private  $type_vehicule;
private  $categorie ;
private  $n_assurance;
private  $detail_reparation;
private  $n_serie ;
private  $carte_grise;
private  $img ;


//Execute database connection
public function __construct(){
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


  /*Filtring data

  if(empty($this->fournisseur)){
    return empty_field('fournisseur');
  }
  elseif(empty($this->marque)){
    return empty_field('marque');
  }
  elseif(empty($this->model)){
    return empty_field('model');
  }
  elseif(empty($this->carburant)){
    return empty_field('carburant');
  }
  elseif(empty($this->date_achat)){
    return empty_field("date achat");
  }
  elseif(empty($this->duree_vie)){
    $this->duree_vie = "5";
  }
  elseif(empty($this->nb_km)){
    $this->nb_km = 0;
  }
  elseif(empty($this->prix_achat_ht)){
    return empty_field("prix d'achat hors tva");
  }
  elseif(empty($this->montant_traits_mensuel)){
      $this->montant_traits_mensuel = 0;
  }
  elseif(empty($this->nombre_traits)){
    $this->nombre_traits = 0;
  }
  elseif(empty($this->num_facture_fournisseur)){
    $this->num_facture_fournisseur = 0;
  }
  elseif(empty($this->color)){
    $this->color = "non défini";
  }
  elseif(empty($this->type_vehicule)){
    return empty_field('type vehicule');
  }
  elseif(empty($this->categorie)){
    return empty_field('categorie');
  }
  elseif(empty($this->n_assurance)){
    return empty_field('numero assurance');
  }
  elseif(empty($this->detail_reparation)){
    $this->detail_reparation = "non défini";
  }
  elseif(empty($this->n_serie)){
    return empty_field('numero serie');
  }
  elseif(empty($this->carte_grise)){
    return empty_field('carte grise');
  }*/



}

//Insert new car function
public function insert_car($data){

    //Data collection
    $this->cars_data_collect($data);
    echo $this->marque;

    //check if car already exists else insert it into database
    $query ="SELECT n_serie FROM cars WHERE n_serie = ?";
    $fetch_car = $this->db->select($query,[$this->n_serie]);
    if($fetch_car){
      return error_message('ce véhicule déjà existe!');
    }else{

      //Query
      $query = "INSERT INTO cars (fournisseur,marque,model,carburant,date_achat,duree_vie,nb_km_avant_revision,
        prix_achat_ht,tva,prix_achat_ttc,montant_traites_mensuel,nombre_traites,num_facture_fournisseur,color,
        type_vehicule,categorie,n_assurance,detail_reparation,n_serie,carte_grise
      ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

      //Insert new car
      $new_car = $this->db->insert($query,[
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
        $this->categorie,
        $this->n_assurance,
        $this->detail_reparation,
        $this->n_serie,
        $this->carte_grise

      ]);
      //Error handling
      if($new_car){
        return header("Location:../Vehicules/Vehicules_all.php");
      }else{

      }


    }





}



//Update car function
public function update_car($id,$data){

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
  $car_update = $this->db->update($query,[
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
  ]);

  //Error handling
  if($car_update->rowCount() > 0){
    return update_success_message();
  }else{
    return update_error_message();
  }

}


//Delete car function
public function delete_car($id){

  //Query
  $query = "DELETE FROM cars  WHERE id = ?";

  //Delete car
  $delete_car = $this->db->delete($query,[$id]);

  //Error handling
  if($delete_car){
    return delete_success_message();
  }else{
    return delete_message();
  }

}


//Get car By id  Function
public function get_CarById($id){
  //Fetch car
  $query ="SELECT * FROM cars WHERE id =?";
  $fetch_car = $this->db->select($query,[$id]);

  if($fetch_car){
    return $fetch_car->fetch();
  }else{
    return error_message("ce véhicule n'existe pas");
  }
}




//Get all cars function
public function get_allCars(){
  //Fetch Cars
  $query =" SELECT * FROM cars ORDER BY id DESC";
  $fetch_cars = $this->db->query($query);

  if($fetch_cars){
    return $fetch_cars->fetchAll();
  }else{
    return error_message("il n'y a pas de véhicule pour le moment!");
  }
}


}

 ?>

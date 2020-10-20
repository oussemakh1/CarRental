<?php

//include  database
include_once '../../lib/Database.php';



class Reparation{

private $db;
private $marque;
private $model;
private $date_mise_circulation;
private $date_entree_garage;
private $date_sortie_garage;
private $montant;
private $panne;
private $n_serie;
//Execute database connection
public function __construct(){
  $this->db = new Database();
}

//Data collector function
public function reparation_data_collector($data){

  $this->mecanicien = $data['mecanicien'];
  $this->marque = $data['marque'];
  $this->model = $data['model'];
  $this->date_mise_circulation = $data['date_mise_circulation'];
  $this->date_entree_garage = $data['date_entree_garage'];
  $this->date_sortie_garage = $data['date_sortie_garage'];
  $this->n_serie = $data['n_serie'];
  $this->montant= $data['montant'];
  $this->panne = $data['panne'];

}


//Insert vehicule into reparation
public function insert_reparation($data){
  //Data collector
  $this->reparation_data_collector($data);

  //Query
  $query = "INSERT INTO reparation(mecanicien,marque,model,
                      date_mise_circulation,date_entree_garage,
                        date_sortie_garage,n_serie,montant,panne)
                        VALUES(?,?,?,?,?,?,?,?,?)";
  //Insert reparation
  $new_reparation = $this->db->insert($query,[
    $this->mecanicien,$this->marque,$this->model,$this->date_mise_circulation,
    $this->date_entree_garage,$this->date_sortie_garage,
    $this->n_serie,$this->montant,$this->panne
  ]);

  //Error handling
  if($new_reparation){
    return insert_success_message();
  }else{
    return insert_error_message();
  }
}


//Update reparation
public function update_reparation($id,$data){
  //Data collector
  $this->reparation_data_collector($data);

  //Query
  $query = "UPDATE reparation SET mecanicien=?,
                                  marque=?,
                                  model=?,
                                  date_mise_circulation=?,
                                  date_entree_garage=?,
                                  date_sortie_garage=?,
                                  n_serie=?,
                                  montant = ?,
                                  panne = ?
                                  WHERE id = ?
                                  ";

  //Update reparation
  $reparation_update = $this->db->update($query,[
    $this->mecanicien,$this->marque,$this->model,$this->date_mise_circulation,
    $this->date_entree_garage,$this->date_sortie_garage,
    $this->n_serie,$this->montant,$this->panne,$id
  ]);

  //Error handling
  if($reparation_update){
  }else{
    return update_error_message();
  }
}

//Delete reparation
public function delete_reparation($id){
  //Query
  $query = "DELETE  FROM reparation WHERE id = ?";

  //Delete reparation
  $reparation_delete = $this->db->delete($query,[$id]);

  //Error handling
  if($reparation_delete){
    return delete_success_message();
  }else{
    return delete_error_message();
}
}

//Fetch reparation by id
public function fetch_reparation($id){

  //Query
  $query = "SELECT * FROM reparation WHERE id = ?";

  //Fetch
  $fetch_reparation = $this->db->select($query,[$id]);

  if($fetch_reparation){
    return $fetch_reparation->fetch();
  }else{
    return error_message("cette reparation n'existe pas");
  }
}

//Fetch all reparation
public function fetch_allReparation(){

  //Query
  $query = "SELECT * FROM  reparation";

  $fetch_allReparation = $this->db->query($query);

  if($fetch_allReparation){
    return $fetch_allReparation->fetchAll();
  }else{
    return error_message("il n'y a pas des reparation pour le moment!");
  }
}


//Fetch mecanicien
public function fetch_allMecanicien()
{
  //Query
  $query = "SELECT * FROM fournisseur WHERE service = 'reparation'";

  //Execute
  $fetch_mecanicien = $this->db->query($query);

  if($fetch_mecanicien){
    return $fetch_mecanicien->fetchAll();
  }
}

}

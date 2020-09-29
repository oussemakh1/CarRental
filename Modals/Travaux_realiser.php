<?php

//include database
include_once '../../lib/db.php';
//include messages
include '../../lib/messages.php';


class Travaux{

private $db;
private $marque;
private $model;
private $n_serie;
private $date_travaux;
private $nb_heure;
private $montant;
private $mode_reglement;



//Execute database connection
public function __construct(){
  $this->db = new Database();
}

//Data collector function
public function travaux_data_collect($data){
  $this->marque = $data['marque'];
  $this->model = $data['model'];
  $this->n_serie = $data['n_serie'];
  $this->date_travaux = $data['date_travaux'];
  $this->travaux_effectues = $data['travaux_effectues'];
  $this->nb_heure = $data['nb_heure'];
  $this->montant = $data['montant'];
  $this->mode_reglement = $data['mode_reglement'];

}


//Insert travaux
public function insert_travaux($data){
  //Data collector
  $this->travaux_data_collect($data);

  //Query
  $query  = "INSERT INTO travaux_realiser(marque,model,n_serie,date_travaux,travaux_effectues,nb_heure,montant,mode_reglement)
                         VALUES(?,?,?,?,?,?,?,?);
                    ";
  //insert travaux
  $new_travaux = $this->db->insert($query,[
    $this->marque,$this->model,$this->n_serie,$this->date_travaux,$this->travaux_effectues,$this->nb_heure,
    $this->montant,$this->mode_reglement
  ]);
  //Error handling
  if($new_travaux->rowCount() > 0){
    return insert_success_message();
  }else{
    return insert_error_message();
  }

}


//Update travaux
public function update_travaux($id,$data){

  //Data collector
  travaux_data_collect($data);

  //Query
  $query = "UPDATE travaux_realiser SET marque=?,
                                        model=?,
                                        n_serie=?,
                                        date_travaux=?,
                                        travaux_effectues=?,
                                        nb_heure=?,
                                        montant=?,
                                        mode_reglement=?
                                        WHERE id =?
                                         ";

  //Update travaux
  $travaux_update = $this->db->update($query,[
    $this->marque,$this->model,$this->n_serie,$this->date_travaux,$this->travaux_effectues,$this->nb_heure,
    $this->montant,$this->mode_reglement,$id
  ]);

  //Error handling
  if($travaux_update->rowCount() > 0){
    return insert_success_message();
  }else{
    return insert_error_message();
  }

}



//Delete Travaux
public function delete_travaux($id){
  //Query
  $query = "DELETE  FROM travaux_realiser WHERE id = ?";

  //Delete travaux
  $travaux_delete = $this->db->delete($query,[$id]);

  //Error handling
  if($travaux_delete){
    return delete_success_message();
  }else{
    return delete_error_message();
  }
}


//Fetch travaux by id
public function fetch_travaux($id){

  //Query
  $query = "SELECT * FROM travaux_realiser WHERE id = ?";

  $fetch_travaux = $this->db->select($query,[$id]);

  if($fetch_travaux->rowCount() > 0){

     return $fetch_travaux->fetch();
  }else{
    return error_message("cette travaux n n'existe pas");
  }
}


//Fetch  all travaux
public function fetch_allTravaux(){

  //Query
  $query = "SELECT * FROM travaux_realiser ORDER BY id DESC";

  $fetch_allTravaux = $this->db->query($query);

  if($fetch_allTravaux->rowCount()>0){
    return $fetch_allTravaux->fetchAll();
  }else{
    return error_message("il n'y a pas des reservations pour le moment!");
  }
}
}

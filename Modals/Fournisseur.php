<?php

  //include database
  include_once '../../lib/Database.php';


class Fournisseur{

private $db;
private $societe;
private $civilite;
private $nom_contact;
private $prenom_contact;
private $adress;
private $code_postal;
private $ville;
private $pays;
private $telephone;
private $gsm;
private $fax;
private $email;
private $observation;
private $service;

//Execute database connection
public function __construct(){
  $this->db = new Database();
}



//Data collection function
public function fournisseur_data_collect($data){

  $this->societe = $data['societe'];
  $this->civilite = $data['civilite'];
  $this->nom_contact = $data['nom_contact'];
  $this->prenom_contact = $data['prenom_contact'];
  $this->adress = $data['adress'];
  $this->code_postal = $data['code_postal'];
  $this->ville = $data['ville'];
  $this->pays = $data['pays'];
  $this->telephone = $data['telephone'];
  $this->gsm = $data['gsm'];
  $this->fax = $data['fax'];
  $this->email = $data['email'];
  $this->observation = $data['observation'];
  $this->service = $data['service'];

}



//Insert new fournisseur
public function insert_fournisseur($data){

  //Data collector
  $this->fournisseur_data_collect($data);

  //Query
  $query = "INSERT INTO  fournisseur(societe,civilite,nom_contact,prenom_contact,adress,code_postal,ville,pays,telephone,gsm,fax,email,observation,service)
                         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  //Insert new fournisseur
  $new_fournisseur = $this->db->insert($query,[
    $this->societe,$this->civilite,$this->nom_contact,$this->prenom_contact,$this->adress,$this->code_postal,$this->ville,$this->pays,$this->telephone,$this->gsm,$this->fax,$this->email,$this->observation,$this->service
  ]);


  //Error handling
  if($new_fournisseur->rowCount() > 0){
    return header('Location:fournisseurs.php');
  }else{

  }


}



//Update fournisseur
public function update_fournisseur($id,$data){

  //Data collector
  $this->fournisseur_data_collect($data);

  //Query
  $query = "UPDATE fournisseur SET societe =?,
                                   civilite=?,
                                   nom_contact=?,
                                   prenom_contact=?,
                                   adress = ?,
                                   code_postal=?,
                                   ville =?,
                                   pays=?,
                                   telephone=?,
                                   gsm=?,
                                   fax=?,
                                   email=?,
                                   observation=?,
                                   service = ?
                                   WHERE id = ?
                                   ";
  //Update fournisseur
  $fournisseur_update = $this->db->update($query,[

    $this->societe,$this->civilite,
    $this->nom_contact,$this->prenom_contact,
    $this->adress,$this->code_postal,$this->ville,
    $this->pays,$this->telephone,$this->gsm,$this->fax,
    $this->email,$this->observation,$this->service,$id

  ]);

  //Error handling
  if($fournisseur_update){
    return header("Location:fournisseurs.php");
  }else{

  }

}



//Delete fournisseur
public function delete_fournisseur($id){

  //Query
  $query = "DELETE  FROM fournisseur WHERE id = ?";

  //Delete fournisseur
  $fournisseur_delete = $this->db->delete($query,[$id]);

  //Error handling
  if($fournisseur_delete){
    return delete_success_message();
  }else{
    return delete_error_message();
  }

}


///Fetch Fournisseur By id
public function fetch_Fournisseur($id){

    //Query
    $query = "SELECT * FROM  fournisseur WHERE id =? ";

    $fetch_fournisseur = $this->db->select($query,[$id]);

    if($fetch_fournisseur){
      return $fetch_fournisseur->fetch();
    }else{
      return error_message("cette fournisseur n'existe pas");
    }
}


//Fetch all fournissuers
public function fetch_allFournisseur(){

  //Query
  $query = "SELECT * FROM fournisseur ORDER BY id DESC";
  $all_Fournisseur = $this->db->query($query);

  if($all_Fournisseur){
    return $all_Fournisseur->fetchAll();
  }else{
    return error_message("il n'y a pas des fournisseurs pour le moment!");
  }
}



//Fetch fournisseur By service
public function fetchFournisseurByService($service)
{
    if($service == 'vente'){
      //Query
      $query = "SELECT * FROM cars INNER JOIN fournisseur ON fournisseur.societe = cars.fournisseur OR fournisseur.civilite = cars.fournisseur WHERE fournisseur.service = '$service'";
    }elseif($service == 'reparation'){
      //Query
      $query = "SELECT * FROM reparation INNER JOIN fournisseur ON fournisseur.societe = reparation.mecanicien OR fournisseur.civilite = reparation.mecanicien WHERE fournisseur.service = '$service'";
    }


  //Execute
  $fetchFournisseur = $this->db->query($query);

  if($fetchFournisseur){
    return $fetchFournisseur->fetchAll();
  }else{
    return 0;
  }
}

//Fetch fournisseur name by fournisseur
public function fetchAllFournisseurByservice($service)
{
  //Query
  $query = "SELECT societe,civilite FROM fournisseur WHERE service = '$service'";

  $fetch = $this->db->query($query);
  if($fetch)
  {
    return $fetch->fetchAll();
  }else{
    return false;
  }
}

}
?>

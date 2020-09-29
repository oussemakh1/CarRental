<?php

  //include database
  include_once '../../lib/Database.php';
  //include messages
  include '../../lib/messages.php';

class Fournisseur{

private $db;
private $societe;
private $civilite;
private $nom_contact;
private $prenom_contact;
private $adresse;
private $code_postal;
private $ville;
private $pays;
private $telephone;
private $gsm;
private $fax;
private $email;
private $observation;

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
  $this->adresse = $data['adresse'];
  $this->code_postal = $data['code_postal'];
  $this->ville = $data['ville'];
  $this->pays = $data['pays'];
  $this->telephone = $data['telephone'];
  $this->gsm = $data['gsm'];
  $this->fax = $data['fax'];
  $this->email = $data['email'];
  $this->observation = $data['observation'];

}



//Insert new fournisseur
public function insert_fournisseur($data){

  //Data collector
  $this->fournisseur_data_collect($data);

  //Query
  $query = "INSERT INTO  fournisseur(societe,civilite,nom_contact,prenom_contact,adresse,code_postal,ville,pays,telephone,gsm,fax,email,observation)
                         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
  //Insert new fournisseur
  $new_fournisseur = $this->db->insert($query,[
    $this->societe,$this->civilite,$this->nom_contact,$this->prenom_contact,$this->adresse,$this->code_postal,$this->ville,$this->pays,$this->telephone,$this->gsm,$this->fax,$this->email,$this->observation
  ]);


  //Error handling
  if($new_fournisseur->rowCount() > 0){
    return insert_success_message();
  }else{
    return insert_error_message();
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
                                   adresse = ?,
                                   code_postal=?,
                                   ville =?,
                                   pays=?,
                                   telephone=?,
                                   gsm=?,
                                   fax=?,
                                   email=?,
                                   observation=?
                                   WHERE id = ?
                                   ";
  //Update fournisseur
  $fournisseur_update = $this->db->update($query,[

    $this->societe,$this->civilite,
    $this->nom_contact,$this->prenom_contact,
    $this->adresse,$this->code_postal,$this->ville,
    $this->pays,$this->telephone,$this->gsm,$this->fax,
    $this->email,$this->observation,$id

  ]);

  //Error handling
  if($fournisseur_update){
    return update_success_message();
  }else{
    return update_error_message();
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



}
?>

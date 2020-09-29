<?php

  //include database
  include_once '../../lib/Database.php';
  //inlucde messages


class Location{

private $db;

  private $nom;
  private $prenom;
  private $date_naissance;
  private $adress;
  private $code_postal;
  private $ville;
  private $pays;
  private $telephone;
  private $email;
  private $n_permis;
  private $date_delivrance;
  private $lieu_delivrance;
  private $cin;
  private $type_client;
  private $marque_vehicule;
  private $immatriculation_vehicule;
  private $proprietaire;
  private $etat_vehicule;
  private $assurance;
  private $caution;
  private $mode_paiement;
  private $nb_jour;
  private $date_depart;
  private $heure_depart;
  private $date_retour;
  private $heure_retour;
  private $prix_ht;
  private $tva;
  private $prix_ttc;
  private $paye_le;
  private $deja_regle_acompte;
  private $date_acompte;
  private $lieu_retour;

//Execute databse connection
public function __construct(){
  $this->db = new Database();
}


//Data collector function
public function Location_data_collect($data){


  $this->nom = $data['nom'];
  $this->prenom = $data['prenom'];
  $this->date_naissance = $data['date_naissance'];
  $this->adress = $data['adress'];
  $this->code_postal = $data['code_postal'];
  $this->ville = $data['ville'];
  $this->pays = $data['pays'];
  $this->telephone = $data['telephone'];
  $this->email = $data['email'];
  $this->n_permis = $data['n_permis'];
  $this->date_delivrance = $data['date_delivrance'];
  $this->lieu_delivrance =  $data['lieu_delivrance'];
  $this->cin = $data['cin'];
  $this->type_client = $data['type_client'];
  $this->marque_vehicule = $data['marque_vehicule'];
  $this->immatriculation_vehicule = $data['immatriculation_vehicule'];
  $this->proprietaire = $data['proprietaire'];
  $this->etat_vehicule = $data['etat_vehicule'];
  $this->assurance = $data['assurance'];
  $this->caution = $data['caution'];
  $this->mode_paiement = $data['mode_paiement'];
  $this->nb_jour = $data['nb_jour'];
  $this->date_depart = $data['date_depart'];
  $this->heure_depart = $data['heure_depart'];
  $this->date_retour = $data['date_retour'];
  $this->heure_retour = $data['heure_retour'];
  $this->prix_ht = $data['prix_ht'];
  $this->tva = $data['tva'];
  $this->prix_ttc = $data['prix_ttc'];
  $this->paye_le = $data['paye_le'];
  $this->deja_regle_acompte = $data['deja_regle_acompte'];
  $this->date_acompte = $data['date_acompte'];
  $this->lieu_retour = $data['lieu_retour'];

}


//Insert new Location
public function insert_Location($data){
    $this->Location_data_collect($data);


  //check database if cin exists
  $query = "SELECT * FROM clients WHERE cin = ?";
  $fetch_client = $this->db->select($query,[$this->cin]);
  if(!$fetch_client){
    //Query
    $query = "INSERT INTO  clients (nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,n_permis,code_postal)
              VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    //Insert new client
    $new_client = $this->db->insert($query,[$this->nom,$this->prenom,$this->email,$this->date_naissance,
                                            $this->telephone,$this->cin,$this->adress,$this->ville,$this->pays,$this->n_permis,$this->code_postal]);




                                            //Insert new Location
                                            $query = "INSERT INTO  location(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,
                                                                             n_permis,code_postal,date_delivrance,lieu_delivrance,type_client,
                                                                             marque_vehicule,immatriculation_vehicule,proprietaire,etat_vehicule,
                                                                             assurance,caution,mode_paiement,nb_jour,date_depart,heure_depart,
                                                                             date_retour,heure_retour,prix_ht,tva,prix_ttc,paye_le,
                                                                             deja_regle_acompte,date_acompte,lieu_retour)
                                                      VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                            $insert_location = $this->db->insert($query,[

                                                $this->nom,
                                                $this->prenom,
                                                $this->email,
                                                $this->date_naissance,
                                                $this->telephone,
                                                $this->cin,
                                                $this->adress,
                                                $this->ville,
                                                $this->pays,
                                                $this->n_permis,
                                                $this->code_postal,
                                                $this->date_delivrance,
                                                $this->lieu_delivrance,
                                                $this->type_client,
                                                $this->marque_vehicule,
                                                $this->immatriculation_vehicule,
                                                $this->proprietaire,
                                                $this->etat_vehicule,
                                                $this->assurance,
                                                $this->caution,
                                                $this->mode_paiement,
                                                $this->nb_jour,
                                                $this->date_depart,
                                                $this->heure_depart,
                                                $this->date_retour,
                                                $this->heure_retour,
                                                $this->prix_ht,
                                                $this->tva,
                                                $this->prix_ttc,
                                                $this->paye_le,
                                                $this->deja_regle_acompte,
                                                $this->date_acompte,
                                                $this->lieu_retour
                                            ]);

                                            //Error handeling
                                            if($insert_location->rowCount() > 0){
                                              return insert_success_message();
                                            }else{
                                              return insert_error_message();
                                            }


  }else{
    //Insert new Location
    $query = "INSERT INTO  location(nom,prenom,email,date_naissance,telephone,cin,adress,ville,pays,n_permis,code_postal,date_delivrance,lieu_delivrance,type_client,marque_vehicule,immatriculation_vehicule,proprietaire,etat_vehicule,assurance,caution,mode_paiement,nb_jour,date_depart,heure_depart,date_retour,heure_retour,prix_ht,tva,prix_ttc,paye_le,deja_regle_acompte,date_acompte,lieu_retour)
              VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $insert_location = $this->db->insert($query,[

        $this->nom,
        $this->prenom,
        $this->email,
        $this->date_naissance,
        $this->telephone,
        $this->cin,
        $this->adress,
        $this->ville,
        $this->pays,
        $this->n_permis,
        $this->code_postal,
        $this->date_delivrance,
        $this->lieu_delivrance,
        $this->type_client,
        $this->marque_vehicule,
        $this->immatriculation_vehicule,
        $this->proprietaire,
        $this->etat_vehicule,
        $this->assurance,
        $this->caution,
        $this->mode_paiement,
        $this->nb_jour,
        $this->date_depart,
        $this->heure_depart,
        $this->date_retour,
        $this->heure_retour,
        $this->prix_ht,
        $this->tva,
        $this->prix_ttc,
        $this->paye_le,
        $this->deja_regle_acompte,
        $this->date_acompte,
        $this->lieu_retour
    ]);

    //Error handeling
    if($insert_location->rowCount() > 0){
      return insert_success_message();
    }else{
      return insert_error_message();
    }

  }
}




//Update location
public function update_location($id,$data){
  //Data collector
  $this->Location_data_collect($data);

  //Query
  $query = "UPDATE  location SET nom=?,
                                 prenom=?,
                                 email=?,
                                 date_naissance=?,
                                 telephone=?,
                                 cin=?,
                                 adress=?,
                                 ville=?,
                                 pays=?,
                                 n_permis=?,
                                 code_postal=?,
                                 date_delivrance=?,
                                 lieu_delivrance=?,
                                 type_client=?,
                                 marque_vehicule=?,
                                 immatriculation_vehicule=?,
                                 proprietaire=?,
                                 etat_vehicule=?,
                                 assurance=?,
                                 caution=?,
                                 mode_paiement=?,
                                 nb_jour=?,
                                 date_depart=?,
                                 heure_depart=?,
                                 date_retour=?,
                                 heure_retour=?,
                                 prix_ht=?,
                                 tva=?,
                                 prix_ttc=?,
                                 paye_le=?,
                                 deja_regle_acompte=?,
                                 date_acompte=?,
                                 lieu_retour=?
                                 WHERE id =?
                                 ";

  //Update Location
  $location_update = $this->db->update($query,[
    $this->nom,
    $this->prenom,
    $this->email,
    $this->date_naissance,
    $this->telephone,
    $this->cin,
    $this->adress,
    $this->ville,
    $this->pays,
    $this->n_permis,
    $this->code_postal,
    $this->date_delivrance,
    $this->lieu_delivrance,
    $this->type_client,
    $this->marque_vehicule,
    $this->immatriculation_vehicule,
    $this->proprietaire,
    $this->etat_vehicule,
    $this->assurance,
    $this->caution,
    $this->mode_paiement,
    $this->nb_jour,
    $this->date_depart,
    $this->heure_depart,
    $this->date_retour,
    $this->heure_retour,
    $this->prix_ht,
    $this->tva,
    $this->prix_ttc,
    $this->paye_le,
    $this->deja_regle_acompte,
    $this->date_acompte,
    $this->lieu_retour,
    $id
  ]);

  //Error handling
  if($location_update->rowCount() > 0){
    return update_success_message();
  }else{
    return update_error_message();
  }
}




//Delete Location
public function delete_location($id){

  $query = "DELETE  FROM location WHERE id  = ?";

  //Delete Location
  $location_delete = $this->db->delete($query,[$id]);

  //Error handling
  if($location_delete){
    return delete_success_message();
  }else{
    return delete_error_message();
  }



}


//Fetch Location by id
public function fetch_location($id){

  //Query
  $query = "SELECT * FROM location WHERE id = ?";

  $fetch_location = $this->db->select($query,[$id]);

  if($fetch_location){
    return $fetch_location->fetch();
  }else{
    return error_message("cette location n'existe pas");
  }
}

//Fetch all Location
public function fetch_allLocation(){

  //Query
  $query = "SELECT * FROM location";

  $fetch_allLocation = $this->db->query($query);

  if($fetch_allLocation){
    return $fetch_allLocation->fetchAll();
  }else{
    return error_message("il n'y a pas des locations pour le moment!");
  }
}

}


?>

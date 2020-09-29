<?php


  //include databae
  include_once '../../lib/Database.php';
  //include messages
  include '../../lib/messages.php';

  ?>

<?php
class Facture {

private $db;
private $societe_client;
private $nom_client;
private $prenom_client;
private $telephone;
private $code_postal_client;
private $nom_adress_fact;
private $adress_fact;
private $code_postal_fact;
private $reference_fact;
private $designation_fact;
private $nb_jour;
private $prix;
private $tva;
private $remise;
private $total;
private $date_fact;
private $date_reglement;
private $date_acompte;
private $mode_reglement;
private $mode_livraison;

//Execute database connection
public function __construct(){
  $this->db = new Database();
}


//Data collector
public function facture_data_collector($data){

  $this->societe_client = $data['societe_client'];
  $this->nom_client = $data['nom_client'];
  $this->prenom_client = $data['prenom_client'];
  $this->telephone_client = $data['telephone_client'];
  $this->code_postal_client = $data['code_postal_client'];
  $this->nom_adress_fact = $data['nom_adress_fact'];
  $this->code_postal_fact = $data['code_postal_fact'];
  $this->reference_fact = $data['reference_fact'];
  $this->designation_fact = $data['designation'];
  $this->nb_jour = $data['nb_jour'];
  $this->prix = $data['prix'];
  $this->tva = $data['tva'];
  $this->remise = $data['remise'];
  $this->total = $data['total'];
  $this->date_fact =  $data['date_fact'];
  $this->date_reglement = $data['date_reglement'];
  $this->date_acompte = $data['date_acompte'];
  $this->mode_reglement = $data['mode_reglement'];
  $this->mode_livraison = $data['mode_livraison'];


  /** Filtring data



  **/


}

//Insert  New Facture
public function insert_facture($data){

    //Data collect
    $this->facture_data_collector($data);

    //Query
    $query = "INSERT INTO facture(societe_client,nom_client,prenom_client,telephone_client,
                                  code_postal_client,nom_adress_fact,code_postal_fact,reference_fact,
                                  designation_fact,nb_jour,prix,tva,total,date_fact,date_reglement,date_acompte,mode_reglement,mode_livraison)
                          VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
                                  ";

    //Insert facture
    $new_facture = $this->db->insert($query,[
       $this->societe_client,$this->nom_client,$this->prenom_client,$this->telephone_client,
                                     $this->code_postal_client,$this->nom_adress_fact,$this->code_postal_fact,$this->reference_fact,
                                     $this->designation_fact,$this->nb_jour,$this->prix,$this->tva,$this->total,$this->date_fact,$this->date_reglement,$this->date_acompte,$this->mode_reglement,$this->mode_livraison
     ]);

   //Error Handeling
   if($new_facture->rowCount() > 0){
     return insert_success_message();
   }else{
     return insert_error_message();
   }

}


//Update Facture
public function update_facture($id,$data){

  //Data collect
  $this->facture_data_collector($data);

  //Query
  $query = "UPDATE facture SET societe_client =?,
                               nom_client=?,
                               prenom_client=?,
                               telephone_client=?,
                               code_postal_client=?,
                               nom_adress_fact=?,
                               code_postal_fact=?,
                               reference_fact=?,
                               designation_fact=?,
                               nb_jour=?,
                               prix=?,
                               tva=?,
                               total=?,
                               date_fact=?,
                               date_reglement=?,
                               date_acompte=?,
                               mode_reglement=?,
                               mode_livraison=?
                               WHERE id =?
                               ";




  //Update facture
  $facture_update = $this->db->update($query,[
    $this->societe_client,$this->nom_client,$this->prenom_client,$this->telephone_client,
    $this->code_postal_client,$this->nom_adress_fact,$this->code_postal_fact,$this->reference_fact,
    $this->designation_fact,$this->nb_jour,$this->prix,$this->tva,$this->total,$this->date_fact,$this->date_reglement,$this->date_acompte,$this->mode_reglement,$this->mode_livraison,$id
  ]);

  //Error handling
  if($facture_update){
    return update_success_message();
  }else{
    return update_error_message();
  }
}



//Delete facture
public function delete_facture($id){
  //Query
  $query  = "DELETE  FROM facture WHERE id = ?";
  //Delete facture
  $delete_facture = $this->db->delete($query,[$id]);

  //Error handling
  if($delete_facture){
    return delete_success_message();
  }else{
    return  delete_error_message();
  }
}


//Fetch facture by id
public function fetch_facture($id){
  //Query
  $query  = "SELECT * FROM facture WHERE id = ?";

  $fetch_facture = $this->db->select($query,[$id]);

  if($fetch_facture->rowCount()> 0){
    return $fetch_facture->fetch();
  }else{
    return error_message("cette facture n'existe pas");
  }
}

//Fetch AllFacts
public function fetch_AllFacture(){
  //Query
  $query = "SELECT * FROM facture";
  $fetch_all = $this->db->query($query);

  if($fetch_all->rowCount() > 0){
    return $fetch_all->fetchAll();
  }else{
    return error_message("il n'y a pas des factures pour le moment!");
  }
}

}

<?php


  //include databae
  include_once '../../lib/Database.php';
  //include messages
  include_once '../../func/messages.php';



class Facture {

private $db;
private $nom_client;
private $prenom_client;
private $telephone;
private $code_postal_client;
private $nom_adress_fact;
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
private $location_id;
private $cin;

//Execute database connection
public function __construct()
{
  $this->db = new Database();
}


//Data collector
public function facture_data_collector($data)
{

  $this->nom_client = $data['nom_client'];
  $this->prenom_client = $data['prenom_client'];
  $this->telephone_client = $data['telephone_client'];
  $this->code_postal_client = $data['code_postal_client'];
  $this->nom_adress_fact = $data['nom_adress_fact'];
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
  $this->location_id = $data['location_id'];
  $this->cin = $data['cin'];

}

//Insert  New Facture
public function insert_facture($data){

    //Data collect
    $this->facture_data_collector($data);

    //Query
    $query = "INSERT INTO facture(nom_client,prenom_client,telephone_client,
                                  code_postal_client,nom_adress_fact,nb_jour,prix,tva,
                                  remise,total,date_fact,date_reglement,date_acompte,mode_reglement,
                                  mode_livraison,location_id,cin)
                          VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
                                  ";

    //Insert facture
    $new_facture = $this->db->insert(
        $query,
        [
            $this->nom_client,$this->prenom_client,$this->telephone_client,
            $this->code_postal_client,$this->nom_adress_fact,$this->nb_jour,
            $this->prix,$this->tva,$this->remise,$this->total,$this->date_fact,
            $this->date_reglement,$this->date_acompte,$this->mode_reglement,
            $this->mode_livraison, $this->location_id,$this->cin
       ]
    );

   //Error Handeling


}


//Update Facture
public function update_facture($id,$data){

  //Data collect
  $this->facture_data_collector($data);

  //Query
  $query = "UPDATE facture SET
                               nom_client=?,
                               prenom_client=?,
                               telephone_client=?,
                               code_postal_client=?,
                               nom_adress_fact=?,
                               nb_jour=?,
                               prix=?,
                               tva=?,
                               remise=?,
                               total=?,
                               date_fact=?,
                               date_reglement=?,
                               date_acompte=?,
                               mode_reglement=?,
                               mode_livraison=?,
                               cin=?
                               WHERE location_id=?
                               ";




  //Update facture
  $facture_update = $this->db->update($query,[
    $this->nom_client,$this->prenom_client,$this->telephone_client,
    $this->code_postal_client,$this->nom_adress_fact,$this->nb_jour,$this->prix,$this->tva,$this->remise,$this->total,$this->date_fact,$this->date_reglement,$this->date_acompte,$this->mode_reglement,$this->mode_livraison,
    $this->cin,$id
  ]);

  if(!$facture_update){
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
  $query  = "SELECT *,facture.tva as tva_fact,location.date_depart,location.date_retour,location.marque_vehicule
             FROM facture INNER JOIN location ON facture.location_id = location.id  WHERE location_id = ?";

  $fetch_facture = $this->db->select($query,[$id]);

  if($fetch_facture){
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


//Change facture status  failed
public function ChangeStatFailed($location_id)
{
      //Query
      $query = "UPDATE facture SET facture_stat = 'Failed' WHERE location_id = ? ";

      //Execute changement
      $changeFailed = $this->db->insert($query,[$location_id]);
}



}

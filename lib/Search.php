<?php




class Search
{
     private $db;

     public function __construct()
     {
       $this->db = new Database();
     }

     //Clients Search
     public function ClientSearch($key)
     {
       //Query
       $query = "SELECT * FROM clients WHERE nom = '$key' OR prenom = '$key' OR email = '$key' OR date_naissance = '$key' OR telephone = '$key' OR cin = '$key' OR adress = '$key' OR ville = '$key' OR pays = '$key' OR n_permis = '$key'
                                              OR code_postal = '$key' OR type_client = '$key' ";

       //fetch
       $fetch = $this->db->query($query);

       if($fetch)
       {
         return $fetch->fetchAll();
       }
     }


     //Fournisseurs Search
     public function FournisseurSearch($key)
     {
       //Query
       $query = "SELECT * FROM fournisseur WHERE service = '$key' OR societe = '$key' OR civilite = '$key' OR nom_contact = '$key'
                                                 OR prenom_contact = '$key' OR adress = '$key' OR code_postal = '$key' OR ville = '$key'
                                                 OR pays = '$key' OR  telephone = '$key' OR gsm = '$key' OR  fax = '$key' OR email = '$key' ";
       //Fetch
       $fetch = $this->db->query($query);
       if($fetch)
       {
         return $fetch->fetchAll();
       }
     }




     //Vehicules Search
     public function VehiculeSearch($key)
     {
       //Query
       $query = "SELECT * FROM cars WHERE fournisseur = '$key' OR marque = '$key' OR model = '$key' OR carburant = '$key' OR date_achat = '$key' OR n_serie = '$key' OR type_vehicule = '$key' OR color = '$key'";

       //Fetch
       $fetch = $this->db->query($query);

       if($fetch)
       {
         return $fetch->fetchAll();
       }
     }

}



 ?>

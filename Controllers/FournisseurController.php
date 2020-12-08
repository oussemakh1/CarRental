<?php

//include fournisseur modal
include '../../Modals/Fournisseur.php';


class FournisseurController
{


    private $db;
    private $Fournisseur;



    public function __construct()
    {
       $this->db = new Database();
       $this->Fournisseur  = new Fournisseur();

    }



    //Fournisseurs
    public function FournisseursList()
    {
        return $this->Fournisseur->fetch_allFournisseur();
    }


    //Insert Fournisseur
    public function fournisseurInsert($data)
    {
      return $this->Fournisseur->insert_fournisseur($data);
    }

    //Edit Fournisseur
    public function fournisseurEdit($id)
    {
      return $this->Fournisseur->fetch_Fournisseur($id);
    }


    //Update Fournisseur
    public function fournisseurUpdate($id,$data)
    {
        return $this->Fournisseur->update_fournisseur($id,$data);
    }


    //Delete Fournisseur
    public function fournisseurDelete($id)
    {
      return $this->Fournisseur->delete_fournisseur($id);
    }


    //Get fournisseur by service
    public function getFournisseurByService($service)
    {
      return $this->Fournisseur->fetchFournisseurByService($service);
    }

    //Get all fournisseur by service
    public function getAllFournisseurByService($service)
    {
      return $this->Fournisseur->fetchAllFournisseurByservice($service);
    }


}

<?php

//Include contravention modal
include '../../Modals/Contraventions.php';


class ContraventionController
{

  private $db;
  private $Contravention;


  public function __construct()
  {
    $this->db  = new Database();
    $this->Contravention = new Contraventions();
  }


  //Contraventions
  public function contraventions()
  {
    return $this->Contravention->fetch_allContravention();
  }

  //Insert Contravention
  public function contraventionInsert($data)
  {
    return $this->Contravention->insert_contravention($data);
  }


  //Edit contravention
  public function contraventionEdit($id)
  {
    return $this->Contravention->fetch_contravention($id);
  }


  //Update contravention
  public function contraventionUpdate($id,$data)
  {
    return $this->Contravention->update_contravention($id,$data);
  }


  //Delete contravention
  public function contraventionDelete($id)
  {
    return $this->Contravention->delete_contravention($id);
  }







}







?>

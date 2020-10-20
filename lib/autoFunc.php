<?php

function ChangeDevisStat()
{
  //Query
  $query = "UPDATE devis set devis_status ='Failed' WHERE date_validite < CURRENT_DATE() ";

  //Exectute
  $update_devis = $this->db->query($query);
}

function License()
{
  //Query

    $query = "DELETE activation FROM activation WHERE CURRENT_DATE == end_date";;

    $execute = $this->db>query($query);
}


?>

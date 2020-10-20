<?php

  /*  Facture   */

  //Remise
   function getDiscount($remise,$prix_ht){
        if($remise > 0 ){
          return ($remise/100) * $prix_ht;
        }else{
          $remise =0;
          return $remise;
        }
  }

  //Tva
 function getTva($remise,$prix_ht,$tva)
  {

      $discount = getDiscount($remise,$prix_ht);

      if($tva > 0){
        return ($prix_ht - $discount) * ($tva / 100);
      }else{
        $tva =0;
        return $tva;
      }
  }

  //Total
   function getTotal($remise,$prix_ht,$tva)
  {
      $discount = getDiscount($remise,$prix_ht);
      $tva2 = getTva($remise,$prix_ht,$tva);

      if($discount > 0  AND $tva2 > 0){
        return  ($prix_ht - $discount) + $tva2;
      }elseif($discount < 0 AND $tva2 > 0){
        return  $prix_ht + $tva2 ;
      }elseif($discount > 0 AND $tva2 < 0){
        return $prix_ht - $discount;
      }elseif($discount == 0 AND $tva2 == 0){
        return $prix_ht;
      }
  }



 ?>

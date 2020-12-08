<?php


/** Editable messages functions **/

 function success_message($message){
     echo "<script> toastr.success('".$message."')</script>";
}

function error_message($message){
   echo "<script> toastr.error('".$message."')</script>";
}

/** Prefixed messages functions  **/

    //Insert
 function insert_success_message(){
     echo "<script> toastr.success('bien inseré dans le base donné!')</script>";

    }

   function insert_error_message(){
       echo "<script> toastr.error('pas inseré dans le base donné!')</script>";

    }

    //Update
   function update_success_message(){
       echo "<script> toastr.success('éte changé dans le base donné!')</script>";


   }

     function  update_error_message(){
         echo "<script> toastr.error('il n y pas changement dans le base donné!')</script>";



     }


    //Delete
     function delete_success_message(){

         echo "<script> toastr.success('éte suprimé dans le base donné!')</script>";

     }

  function  delete_error_message(){
      echo "<script> toastr.error('il n y pas suprimé dans le base donné!')</script>";
  }

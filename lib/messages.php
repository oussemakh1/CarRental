<?php


/** Editable messages functions **/

 function success_message($message){
  echo '<div class="success">'.$message.'</div>';
}

function error_message($message){
  echo '<div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">' . $message .'
  </div>
</div>';

}

//Empty field Message
function empty_field($message){
  echo '<div class="danger">le champ '.$message.' ne doit pas être vide</div>';

}

/** Prefixed messages functions  **/

    //Insert
 function insert_success_message(){
      echo '<div class="success"> bien inseré dans le base donné!</div>';

    }

   function insert_error_message(){
      echo '<div class="danger">pas  inseré dans le base donné!</div>';

    }

    //Update
   function update_success_message(){
      echo '<div class="success"> éte changé dans le base donné!</div>';

    }

     function  update_error_message(){
      echo '<div class="danger"> il n y pas changement dans le base donné!</div>';

    }


    //Delete
     function delete_success_message(){
      echo '<div class="success"> éte suprimé dans le base donné!</div>';

    }

  function  delete_error_message(){
      echo '<div class="danger"> il n y pas suprimé dans le base donné!</div>';

    }

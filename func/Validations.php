<?php


function lengthShouldBe($minLength, $fieldName)
{
        echo "<script> toastr.warning('" . $fieldName . " ne devrait pas être inférieur à " . $minLength . " caractères ou nombre!')</script>";
}

function shouldNotBeEmpty($message) {
    echo "<script> toastr.warning('".$message."')</script>";

}

function errorInValues($message) {
    echo "<script> toastr.warning('".$message."')</script>";

}

function leaveAndReturnDates($date_leave,$date_return) {

    if($date_return < $date_leave) {
        echo "<script> toastr.warning('date de retour doit être supérieure à la date du départ!')</script>";
    }

}

function clientPaiedAvance($fieldValue) {
    if($fieldValue == 'Oui') {
        echo "<script> toastr.warning('vous devez taper la date d\'avance!')</script>";
    }
}

?>
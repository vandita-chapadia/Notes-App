<?php
function prep_input($data){
    $data =  htmlspecialchars( trim($data));
    return $data;
}
?>
<?php
require_once("includes/db.php");

    $id = $_GET["id"];
    if(isset($id)){
        $query = "delete from notes where id = '$id' limit 1";
        if( mysqli_query($conn,$query)){
            header("Location: index.php");
        }
        else{
            echo "Failed to delete!";
        }
    }
require_once("includes/footer.php");
?>
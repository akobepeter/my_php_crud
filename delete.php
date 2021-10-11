<?php

include_once ('config/db.php');

$id = (!empty($_GET['id'])) ?$_GET['id'] : '';
$query = "DELETE FROM  players WHERE id = $id";

if(mysqli_query($conn,$query)){
    echo 'Delete item successfully';
    header('location:index.php?deleted_successfully');
}else{
    echo 'not deleted';
}


?>
<?php
include "connection.php";

if (isset($_GET['id'])) 
{
    $id1 = $_GET['id'];
    $query1 = "DELETE FROM sub_category WHERE id ='$id1'";
     $result = $connection->query($query1);
     if ($result == TRUE) {
        header('Location: view_sub_category.php');
    }else{
        echo "Error ";
    }
}
?>
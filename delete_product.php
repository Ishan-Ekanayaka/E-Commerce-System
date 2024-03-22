<?php
include "connection.php";

if (isset($_GET['id'])) 
{
    $id1 = $_GET['id'];
    $query1 = "DELETE FROM product WHERE id ='$id1'";
     $result = $connection->query($query1);
     if ($result == TRUE) {
        header('Location: view_product.php');
    }else{
        echo "Error ";
    }
}
?>
<?php
include "connection.php";

if (isset($_GET['id'])) 
{
    $id1 = $_GET['id'];
    $query1 = "DELETE FROM category WHERE id ='$id1'";
    $query2 = "DELETE FROM sub_category WHERE main_category ='$id1'";

    $result1 = $connection->query($query1);
    $result2 = $connection->query($query2);

     if ($result1 == TRUE && $result2==TRUE) {
        header('Location: view_category.php');
    }else{
        echo "Error ";
    }
}
?>
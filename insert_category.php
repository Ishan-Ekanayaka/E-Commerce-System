<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Category</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <h3><a href="index.php">Home</a></h3>
    <h3><a href="view_category.php">&emsp;View Categories</a></h3>
    <h1>Enter New Category</h1>
    
    <center>
    <form  method="POST" >

        <table width="40%">

            <tr>
                <td>New Category Name :</td>
                <td><input type="text" name="category_name" required></td>
            </tr>
   
        </table>
        </br>
        </br>
        
        <input type="submit" name="submit" value="submit">&emsp;
        <input type="reset">
    </form>
    </center>
</body>
</html>



<?php
include "connection.php";

  if (isset($_POST['submit'])) 
  {
    $category_name = $_POST['category_name'];
    
    $query1 = "INSERT INTO category(name) VALUES ('$category_name');";

    $result = $connection->query($query1);

    if ($result == TRUE) 
    {
      echo "New record created successfully.";
      header('Location: insert_category.php');
    }
    else
    {
      echo "Error:";
    }
    $connection->close();
  }
?>






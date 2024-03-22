<?php
include "connection.php";
if (isset($_GET['id'])) 
{
	$id1 = $_GET['id'];
	$query1 = "SELECT * FROM category WHERE id='$id1'";
	$result = $connection->query($query1);
	$row = $result->fetch_assoc();

    $name = $row['name'];
    

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<title>Update Main Category Details</title>

</head>

<body>

	<h3><a href="index.php">Home</a></h3>
    <h3><a href="view_category.php">View Categories </a></h3>
    <h1>Update Details</h1>

    <center>
    <form  method="POST" >

        <table width="40%">

            <tr>
                <td> Category Name :</td>
                <td><input type="text" name="category_name" required value="<?php echo $name; ?>"></td>
            </tr>

            
        </table>

        </br>
        </br>
        
        <input type="submit" name="upd" value="Update">&emsp;
        <input type="button" onclick="window.location.href='view_category.php';" value="Cancel">

       
    </form>
    </center>
</body>
</html>

	<?php

  if (isset($_POST['upd'])) {

    $category_name = $_POST['category_name'];
    
    
    $query2 = "UPDATE category SET name='$category_name' WHERE id='$id1';";

    $result = $connection->query($query2);

    if ($result == TRUE) {
      header('Location: view_category.php');
    }else{
      echo "Error:";
    }
    $connection->close();
  }

}

?>
<?php
include "connection.php";
if (isset($_GET['id'])) 
{
	$id1 = $_GET['id'];
	$query1 = "SELECT * FROM sub_category WHERE id='$id1'";
	$result = $connection->query($query1);
	$row = $result->fetch_assoc();

    $name = $row['name'];
    
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<title>Update Sub Category Details</title>

</head>

<body>

	<h3><a href="index.php">Home</a></h3>
    <h3><a href="view_sub_category.php">View Categories </a></h3>
    <h1>Update Details</h1>

    <center>
    <form  method="POST" >

        <table width="40%">

            <tr>
                <td>Select Main Category Name :</td>
                <td>
                    <select name="main_category" class="select">
                        <?php

                        $query1 = "SELECT * FROM category";
                        $result = $connection->query($query1);
                        if ($result->num_rows > 0) 
                        {
                            while ($row = $result->fetch_assoc()) 
                            {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                        <?php 
                             }
                         }
                        ?>
                    </select>


                </td>
            </tr>

            

            <tr>
                <td>Sub Category Name :</td>
                <td><input type="text" name="sub_category" required value="<?php echo $name; ?>"></td>
            </tr>

            

        </table>

        </br>
        </br>
        
        <input type="submit" name="upd" value="Update">&emsp;
        <input type="button" onclick="window.location.href='view_sub_category.php';" value="Cancel">

       
    </form>
    </center>
</body>
</html>

	<?php

  if (isset($_POST['upd'])) 
  {

    $main_category = $_POST['main_category'];
    $sub_category = $_POST['sub_category'];
    
    
    $query2 = "UPDATE sub_category SET name='$sub_category',main_category='$main_category' WHERE id='$id1';";

    $result = $connection->query($query2);

    if ($result == TRUE) {
      header('Location: view_sub_category.php');
    }else{
      echo "Error:";
    }
    $connection->close();
  }

}

?>
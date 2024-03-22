<?php
include "connection.php";
if (isset($_GET['id'])) 
{
	$id1 = $_GET['id'];
	$query1 = "SELECT * FROM product WHERE id='$id1'";
	$result1 = $connection->query($query1);
	$row = $result1->fetch_assoc();

    $name = $row['name'];
    $qty = $row['quantity'];   
    $price = $row['price'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<title>Update Product Details</title>

</head>

<body>

	<h3><a href="index.php">Home</a></h3>
    <h3><a href="view_product.php">View Products </a></h3>
    <h1>Update Details</h1>

    <center>
    <form  method="POST" >

       <table width="60%">

            <tr>
                <td>Product name :</td>
                <td colspan="2"><input type="text" name="name" required value="<?php echo $name; ?>"></td>
            </tr>

            <tr>
                <td>Select category :</td>
                <td>
                    <label for="main"> Main Category </label>
                    <select name="main_category" required id="main" class="select">
                        <?php
                        $query2 = "SELECT * FROM category";
                        $result2 = $connection->query($query2);
                        if ($result2->num_rows > 0) 
                        {
                            while ($row1 = $result2->fetch_assoc()) 
                            {   
                        ?>
                        <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>

                        <?php 
                             }
                         }
                        ?>
                    </select>
                </td>
                <td>
                    <label for="sub">Sub Category</label>
                    <select name="sub_category" required id="sub" class="select">
                        <?php
                        $query3 = "SELECT * FROM sub_category ";
                        $result3 = $connection->query($query3);
                        if ($result3->num_rows > 0) 
                        {
                            while ($row2 = $result3->fetch_assoc()) 
                            {
                        ?>

                    <option value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>

                        <?php 
                             }
                         }
                        ?>

                </td>
            </tr>

            <tr>
                <td>Quantity :</td>
                <td colspan="2">  <input type="number" name="qty" required value="<?php echo $qty; ?>"></td>
            </tr>

            <tr>
                <td>Unit price :</td>
                <td colspan="2"><input type="number" name="price" required value="<?php echo $price; ?>"></td>
            </tr>

            <tr>
                <td>Upload Image :</td>
                <td colspan="2"><input type="file" name="photo" >              
            </tr>

        </table>

        </br>
        </br>
        
        <input type="submit" name="upd" value="Update">&emsp;
        <input type="button" onclick="window.location.href='view_product.php';" value="Cancel">

       
    </form>
    </center>
</body>
</html>

	<?php

  if (isset($_POST['upd'])) 
  {

    $name = $_POST['name'];
    $maincategory = $_POST['main_category'];
    $subcategory = $_POST['sub_category'];
    $qty = $_POST['qty'];   
    $price = $_POST['price'];

    $file_name=$_FILES['photo']['name'];
    $temp_name=$_FILES['photo']['tmp_name'];
    $store="images/" . $file_name;
    
    
    $query4 = "UPDATE product SET name=' $name',main_category='$maincategory',sub_category=' $subcategory',quantity='$qty',price='$price',photo='$file_name' WHERE id='$id1';";

    $result4 = $connection->query($query4);

    if ($result4 == TRUE) {
      header('Location: view_product.php');
    }else{
      echo "Error:";
    }
    $connection->close();
  }

}

?>
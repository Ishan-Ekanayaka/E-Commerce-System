<?php
include "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Product</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <h3><a href="index.php">Home</a></h3>
    <h3><a href="view_product.php">&emsp;View Products</a></h3>
    <h1>Enter New Product</h1>
    
    <center>
    <form  method="POST" enctype="multipart/form-data">

        <table width="60%">

            <tr>
                <td>Product name :</td>
                <td colspan="2"><input type="text" name="name" required></td>
            </tr>

            <tr>
                <td>Select category :</td>
                <td>
                    <label for="main">Main Category</label>
                    <select name="main_category" required id="main" class="select">
                        <?php
                        $query1 = "SELECT * FROM category";
                        $result1 = $connection->query($query1);
                        if ($result1->num_rows > 0) 
                        {
                            while ($row1 = $result1->fetch_assoc()) 
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
                        $query2 = "SELECT * FROM sub_category ";
                        $result2 = $connection->query($query2);
                        if ($result2->num_rows > 0) 
                        {
                            while ($row2 = $result2->fetch_assoc()) 
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
                <td colspan="2">  <input type="number" name="qty" required></td>
            </tr>

            <tr>
                <td>Unit price :</td>
                <td colspan="2"><input type="number" name="price" required></td>
            </tr>

            <tr>
                <td>Upload Image :</td>
                <td colspan="2"><input type="file" name="photo" required>              
            </tr>

        </table>
        </br>
        </br>
        
        <input type="submit" name="submit" value="Submit">&emsp;
        <input type="reset">
    </form>
    </center>
</body>
</html>

  </body>
</html>


<?php

  if (isset($_POST['submit'])) 
  {
    $name = $_POST['name'];
    $maincategory = $_POST['main_category'];
    $subcategory = $_POST['sub_category'];
    $qty = $_POST['qty'];   
    $price = $_POST['price'];

    $file_name=$_FILES['photo']['name'];
    $temp_name=$_FILES['photo']['tmp_name'];
    $store="images/" . $file_name;
    

    move_uploaded_file($temp_name, $store);

    $query1 = "INSERT INTO product (name,main_category,sub_category,quantity,price,photo) VALUES ('$name', '$maincategory', '$subcategory', '$qty', '$price', '$file_name');";

    $result = $connection->query($query1);

    if ($result == TRUE) 
    {
      echo "New record created successfully.";
      header('Location: insert_product.php');
    }
    else
    {
      echo "Error:";
    }
    $connection->close();
  }
?>






<?php
include "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Sub Category</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <h3><a href="index.php">Home</a></h3>
    <h3><a href="view_sub_category.php">&emsp;View Categories</a></h3>
    <h1>Enter New Sub Category</h1>
    
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
                <td>New Sub Category Name :</td>
                <td><input type="text" name="sub_category" required></td>
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
    $main_category = $_POST['main_category'];
    $sub_category = $_POST['sub_category'];
    
    $query2 = "INSERT INTO sub_category(name,main_category) VALUES ('$sub_category','$main_category');";

    $result = $connection->query($query2);

    if ($result == TRUE) 
    {
      echo "New record created successfully.";
      header('Location: insert_sub_category.php');
    }
    else
    {
      echo "Error:";
    }
    $connection->close();
  }
?>





<?php
include "connection.php";
?>

<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Product Details</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<h3><a href="index.php">Home</a></h3>
    <h3><a href="insert_product.php">Add new Product</a></h3>
    <h1>Current Product Details</h1>
	<center>
	<table class="td2" >
		<tr>
			<th>ID </th>
			<th>Name</th>
			<th>Main Category </th>
			<th>Sub Category </th>	
			<th>Quantity </th>	
			<th>Unit price</th>	
			<th>Image</th>
		</tr>

		<?php
                $query1 = "SELECT * FROM product";
                $result = $connection->query($query1);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>

        <tr>
        	<td class="td2"><?php echo $row['id']; ?></td>
        	<td class="td2"><?php echo $row['name']; ?></td>
        	<td class="td2"><?php echo $row['main_category']; ?></td>
        	<td class="td2"><?php echo $row['sub_category']; ?></td>
        	<td class="td2"><?php echo $row['quantity']; ?></td>
        	<td class="td2"><?php echo $row['price']; ?></td>      	
        	<td class="td2"><img src="images/<?php echo $row['photo']; ?>"  width=50px height="50px"> </td>

        	<td class="td2"><a class="a1" href="update_product.php?id=<?php echo $row['id']; ?>"> Edit &emsp;</a></td>
            <td class="td2"><a class="a1" href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a></td>



        </tr>
       <?php 
    			}
    		}
    	?>
	</table>
	</center>

</body>
</html>

	
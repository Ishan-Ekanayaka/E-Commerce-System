<?php
include "connection.php";
?>

<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Sub Category Details</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<h3><a href="index.php">Home</a></h3>
    <h3><a href="insert_sub_category.php">Add new Category</a></h3>
    <h1>Current Sub Categories </h1>
	<center>
	<table class="td2" >
		<tr>
			<th>ID </th>
			<th>Sub Category Name</th>
			<th>Main Category</th>
		</tr>

		<?php
                $query1 = "SELECT * FROM sub_category";
                $result = $connection->query($query1);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>

        <tr>
        	<td class="td2"><?php echo $row['id']; ?></td>
        	<td class="td2"><?php echo $row['name']; ?></td>
        	<td class="td2"><?php echo $row['main_category']; ?></td>

        	<td class="td2"><a class="a1" href="update_sub_category.php?id=<?php echo $row['id']; ?>"> Edit &emsp;</a></td>
            <td class="td2"><a class="a1" href="delete_sub_category.php?id=<?php echo $row['id']; ?>">Delete</a></td>


        </tr>
       <?php 
    			}
    		}
    	?>
	</table>

		</br></br></br>
		<a class="a1" href="view_with_subcategory.php">Show Category Details</a>

	</center>

</body>
</html>

	
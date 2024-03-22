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
    <h3><a href="insert_category.php">Add new Category</a></h3>
    <h1>Current Categories Details</h1>
	

<div class="list">
		<ul>

			<?php
				
                $query1 = "SELECT * FROM category";
                $result1 = $connection->query($query1);
                if ($result1->num_rows > 0) 
                {
                	while ($row1 = $result1->fetch_assoc()) 
                	{     $mid=$row1['id'];
        	?>

			<li><?php echo $row1['name']; ?></li>
				<ul>
					<?php
                		$query2 = "SELECT * FROM sub_category WHERE main_category=$mid ";
                		$result2 = $connection->query($query2);
                		if ($result2->num_rows > 0) 
                		{
                			while ($row2 = $result2->fetch_assoc()) 
                			{
        				?>

        			<li>
        				<?php echo $row2['name']; ?>
        				
        			</li>
					
					<?php 
    						}
    					}
    				?>
    			</ul>


			<?php 
    				}
    			}
    		?>

		</ul>
	</div>

	<center>
		</br></br></br>
		<a class="a1" href="view_sub_category.php">Edit / Delete Sub Categories</a>

	</center>

</body>
</html>

	
<?php

	$server = "localhost";
	$user = "root";
	$pword = "";
	$db = "system_db";

	$connection = new mysqli($server,$user,$pword,$db);

	if ($connection->connect_error)
	{
		die("Not connection with Database");
	}

?>

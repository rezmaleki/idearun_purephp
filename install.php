<?php



require "config.php";


try 
{
	$connection = new PDO("mysql:host=$host", $username, $password);
	$sql = file_get_contents("data/init.sql");
	$connection->exec($sql);
	
	echo " created successfully.";
}

catch(PDOException $error)
{
	echo $sql . "<br>" . $error->getMessage();
}
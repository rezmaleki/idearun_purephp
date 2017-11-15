<?php




if (isset($_POST['submit']))
{
	
	require "../config.php";

	try 
	{
		$connection = new PDO($dsn, $username, $password);

		var_dump($_POST['title']);
		$new_task = array(
			"title" => $_POST['title'],
            "groups"     => $_POST['groups'],
            "status"  => $_POST['status'],

		);

		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"tasks",
				implode(", ", array_keys($new_task)),
				":" . implode(", :", array_keys($new_task))
		);
		
		$statement = $connection->prepare($sql);
		$statement->execute($new_task);
	}

	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}
	
}
?>



<?php 
if (isset($_POST['submit']) && $statement) 
{ ?>
	<blockquote><?php echo $_POST['title']; ?> successfully added.</blockquote>
<?php 
} ?>

<h2>Add new TASK</h2>

<form method="post">
	<label for="title">Title</label>
	<input type="text" name="title" id="title">
    <label for="status">status</label>
	<input type="text" name="status" id="status">
	<label for="groups">group</label>
	<input type="text" name="groups" id="groups">
    <br><br>
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>


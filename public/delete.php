
<form method="post">
<input type="text" name="id" id="id">
<br><br>
<input type="submit" name="submit" value="Delete">

</form>

<a href="index.php">Back to home</a>
<br>

<?php

require "../config.php";


$conn = new mysqli($servername, $username, $password, $dbname);


$delete_task = $_POST['id'];

$sql = "DELETE FROM tasks WHERE  id=$delete_task  AND status =0 ";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
}
$conn->close();
?>


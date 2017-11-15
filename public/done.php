
<form method="post">
<input type="text" name="id" id="id">
<br><br>
<input type="submit" name="submit" value="Submit">

</form>

<a href="index.php">Back to home</a>
<br>

<?php


require "../config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

$done_task = $_POST['id'];


$sql = "UPDATE  tasks  SET status =1   WHERE  id=$done_task  AND status =0 ";

if ($conn->query($sql) === TRUE) {
    echo "Task  marked Done! successfully";
}

$conn->close();
?>


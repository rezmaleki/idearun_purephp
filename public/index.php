

<ul>
	<li><a href="create.php"><strong>Create</strong></a> - add new task</li>
	<li><a href="delete.php"><strong>Delete</strong></a> - Delete Pending tasks</li>
    <li><a href="done.php"><strong>Done!</strong></a> - Mark as Done </li>



</ul>



<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Title</th><th>status</th><th>Group</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
require "../config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, title,status ,groups FROM tasks");

    $stmt->execute();


    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>


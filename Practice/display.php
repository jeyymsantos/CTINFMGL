<?php
include_once("database.php");

$sql = "SELECT * FROM tblaccounts";
$accounts = $conn->query($sql) or die($conn->error);

// print_r($row);

while($row = $accounts->fetch_assoc()) {
    echo $row["email"] . " | " . $row["password"] . " | " . $row["campus"] . "</br>";
}


?>
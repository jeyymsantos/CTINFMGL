<?php

// Create your Connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "ctinfmgl";

// Initialize
$conn = mysqli_connect($servername, $username, $password, $database);

// Query your Data
$query = "SELECT * FROM tblAccounts";
$accounts = $conn->query($query);

// while($row = $accounts->fetch_assoc()){
//     echo $row["campus"] . "<br />";
// }

?>
<?php
include("database.php");

// Declaration
$uemail = $_POST["email"];
$upassword = $_POST["password"];
$ucampus = $_POST["campus"];

// Initialize Stmnt
$query = "INSERT INTO tblAccounts (email, password, campus) VALUES (?,?,?)";
$stmnt = mysqli_stmt_init($conn);

// Prepare & Bind
mysqli_stmt_prepare($stmnt, $query);
mysqli_stmt_bind_param($stmnt, "sss", $uemail, $upassword, $ucampus);

// Execute
mysqli_stmt_execute($stmnt);
echo "Hello, " . $uemail . "! Your record is saved!";

?>
<?php

$email = $_POST["email"];
$pass = $_POST["password"];
$campus = $_POST["campus"];

// print_r($_POST);
// var_dump($email, $password, $campus);

$servername = "localhost";
$username = "root";
$password = "";
$database = "CTINFMGL";

// Create Connection
$conn = mysqli_connect( hostname: $servername, 
                username: $username, 
                password: $password, 
                database: $database);

if(mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

// Initialize Statement
$sql = "INSERT INTO tblaccounts (email, password, campus)
        VALUES (?, ?, ?)";
$stmnt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmnt, $sql)){
    die(mysqli_error($conn));
}

// Bind Parameters
mysqli_stmt_bind_param( $stmnt, "sss", 
                        $email, 
                        $pass, 
                        $campus);

// Execute
mysqli_stmt_execute($stmnt);
echo "Record saved!";


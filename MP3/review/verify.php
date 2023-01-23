<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ctinfmgl";

// Iniatilize Connection (OOP Method)
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Connection Failed" . $conn->connect_error);
}

// Form Record
$username = $_POST['username'];
$password = $_POST['password'];

// Database Record
$sql = "SELECT * FROM users";
$users = $conn->query($sql);

$isAvailable = false;

if($users->num_rows > 0){
    while($user = $users->fetch_assoc()){
        if($username == $user['cEmail'] && $password == $user['cPswd']){

            $isAvailable = true;
            if($user['cLevel'] == 1){
                header("Location:user1.php?c=" . $user['cID']);
            }else{
                header("Location:user2.phpc=" . $user['cID']);
            }

        }

    }

}

if(!$isFound){
    header("Location:index_error.html");
}



?>
<?php

$localhost = "localhost";
$username = "root";
$password = "";
$database = "ctinfmgl";

$conn = new mysqli($localhost, $username, $password, $database);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$users = $conn->query($sql);

$isFound = false;
if($users->num_rows > 0){
    while($user = $users->fetch_assoc()) {
        if($user["cEmail"] == $_POST['inputUsername'] && $user["cPswd"] == $_POST['inputPassword']){
            $isFound = true;
            if($user["cLevel"] == 1){
                header("Location:user1.php?c=" . $user["cID"]);
            }else {
                header("Location:user2.php?c=" . $user["cID"]);
            }
        }
    }
}

if(!$isFound){
    header("Location:index_error.html");
}

?>
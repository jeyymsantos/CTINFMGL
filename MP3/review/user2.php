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

$sql = "SELECT * FROM users WHERE cID = " . $_GET['c'];
$users = $conn->query($sql);
$user = $users->fetch_assoc();
?>


<h3> Level 2 User Page</h3>
<hr>
<h4> Good day, welcome!</h4>
<hr>

<table border="1" width="400px">
    <tr>
        <td>First Name</td>
        <td> <?= $user['cFirst'] ?></td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><?= $user['cLast'] ?></td>
    </tr>
    <tr>
        <td>Email Address</td>
        <td><?= $user['cEmail'] ?></td>
    </tr>
    <tr>
        <td>User Level</td>
        <td><?= $user['cLevel'] ?></td>
    </tr>
    <tr>
        <td>Registation</td>
        <td><?= $user['cReg'] ?></td>
    </tr>
</table>

<hr>
<a href="index.html">Log Out</a>

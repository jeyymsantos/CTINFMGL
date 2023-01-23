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

$getData = "SELECT * FROM users";
$records = $conn->query($getData);

?>



<h3> Level 1 User Page</h3>
<hr>
<p> Welcome, <?= $user['cFirst'] . " " . $user['cLast']?>! </p>
<hr>
<table border="1" width="400px">
    <tr>
        <th> First Name </th>
        <th> Last Name </th>
        <th> Email Address </th>
        <th> User Level </th>
    </tr>

    <?php
        while($record = $records->fetch_assoc()):
    ?>

    <tr>
        <td> <?= $record['cFirst'] ?> </td>
        <td> <?= $record['cLast'] ?></td>
        <td> <?= $record['cEmail'] ?> </td>
        <td> <?= $record['cLevel'] ?> </td>
    </tr>

    <?php
        endwhile;
    ?>
</table>

<hr>
<a href="index.html"> Log Out </a>
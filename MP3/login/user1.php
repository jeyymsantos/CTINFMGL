<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "ctinfmgl";

$conn = new mysqli($localhost, $username, $password, $database);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$getUser = "SELECT * FROM users WHERE cID = " . $_GET['c'] ;
$users = $conn->query($getUser);
$user = $users->fetch_assoc();

$getAll = "SELECT * FROM users";
$data = $conn->query($getAll);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
<h3> Level 1 User Page</h3>
<hr>
<p> Welcome, <?=$user['cFirst'] . " " . $user['cLast']?>!</p>
<hr>

<table width="400px" border="1">
    <tr>
        <th>First Name</th>
        <th>Last Name </th>
        <th>Email Address</th>
        <th>User Level</th>
    </tr>

    <?php while($row = $data->fetch_assoc()): ?>
    <tr>
        <td> <?=$row['cFirst'] ?></td>
        <td> <?=$row['cLast'] ?></td>
        <td> <?=$row['cEmail'] ?></td>
        <td> <?=$row['cLevel'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<hr>
<a href="index.html"> Log Out</a>

</body>
</html>
<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "ctinfmgl";

$conn = new mysqli($localhost, $username, $password, $database);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE cID = " . $_GET['c'] ;
$users = $conn->query($sql);

$user = $users->fetch_assoc()
?>

<h3> Level 2 User Page</h3>
<hr>
<h4> Good day, welcome!</h4>
<hr>

<table width="400px" border="1">
    <tr>
        <td>First Name</td>
        <td> <?=$user['cFirst'] ?> </td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td> <?=$user['cLast'] ?> </td>
    </tr>
    <tr>
        <td>Email Address</td>
        <td> <?=$user['cEmail'] ?> </td>
    </tr>
    <tr>
        <td>User Level</td>
        <td> <?=$user['cLevel'] ?> </td>
    </tr>
    <tr>
        <td>Registration</td>
        <td> <?=$user['cReg'] ?> </td>
    </tr>
</table>

<hr>
<a href="index.html"> Log Out</a>
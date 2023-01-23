<?php

require "connection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM participants WHERE id = $id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <style>
        td {
            width: 200px;
        }
    </style>
</head>

<body>

    <h2> Car Racing Competition </h2>
    <hr>
    <h3> Participant's Info </h3>

    <table>
        <tr>
            <td> Record Number </td>
            <td> <?= $row['id'] ?> </td>
        </tr>
        <tr>
            <td> Full Name </td>
            <td> <?= $row['name'] ?> </td>
        </tr>
        <tr>
            <td> License Number </td>
            <td> <?= $row['license'] ?> </td>
        </tr>
        <tr>
            <td> Date of Birth </td>
            <td> <?= $row['dateOfBirth'] ?> </td>
        </tr>
        <tr>
            <td> Email Address </td>
            <td> <?= $row['email'] ?> </td>
        </tr>
        <tr>
            <td> Registered Date </td>
            <td> <?= $row['registration'] ?> </td>
        </tr>

    </table>

    <hr>
    <a href="index.php"><i class="bi bi-house-fill"></i></a>

</body>

</html>
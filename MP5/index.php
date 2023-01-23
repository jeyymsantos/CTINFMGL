<?php

require "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $license = $_POST['license'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $email = $_POST['email'];

    $sql = "INSERT INTO participants (name, license, dateOfBirth, email)
    VALUES ('$name', '$license', '$dateOfBirth', '$email')";
    $conn->query($sql);
}

$sql = "SELECT id, registration, name, email FROM participants";
$result = $conn->query($sql);

$sql = "SELECT id, registration, name, email FROM archive";
$archive = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <style>
        td {
            width: 200px;
        }
    </style>
</head>

<body>

    <h3> Car Racing Competition </h3>
    <p> Feel free to sign up for the Car Competition that will happen on February 14, 2023. You are all invited to join as long as you have your driver's license and not yet a senior citizen.</p>
    <hr>

    <form action="index.php" method="POST">
        <label> Name of Participant </label> <br>
        <input type="text" name="name" placeholder="Exact Name on the License" size="100" required /> <br>

        <label> License Number</label> <br>
        <!-- <input type="text" name="license" placeholder="XX9-99999" pattern="[A-Za-z]{2}+[0-9]{1}+-+[0-9}{4}" maxlength="9" size="100" required /> <br> -->
        <input type="text" name="license" placeholder="XX9-99999" pattern="^[A-Z]{2}[0-9]{1}\W[0-9]{5}$" maxlength="9" size="100" required /> <br>
                                                                          
        <label> Date of Birth (February 13, 1963 to February 12, 2005) </label> <br>
        <input type="date" name="dateOfBirth" min="1963-02-13" max="2005-02-12" required /> <br>

        <label> Email Address </label> <br>
        <input type="email" name="email" placeholder="Valid Email Address" size="100" required /> <br>

        <hr />
        <button type="submit">Insert</button>
        <button type="reset">Reset</button> <br>
        <hr />
    </form>

    <h3> Qualified Participant(s)</h3>
    <table>
        <tr>
            <td>#</td>
            <td>Registration</td>
            <td>Participant</td>
            <td>Email Address</td>
            <td>Action</td>
        </tr>

        <?php
        $num = 1;
        while ($row = $result->fetch_assoc()) :
        ?>

            <tr>
                <td> <?= $num ?> </td>
                <td> <?= $row['registration'] ?></td>
                <td> <?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a href="delete.php?id=<?= $row['id'] ?>"><i class="bi bi-trash"></i></a>
                    <a href="edit.php?id=<?= $row['id'] ?>"><i class="bi bi-pencil"></i></a>
                    <a href="view.php?id=<?= $row['id'] ?>"><i class="bi bi-search"></i></a>
                </td>
            </tr>

        <?php
            $num++;
        endwhile;
        ?>

    </table>

    <h3> Deleted Registration</h3>
    <table>
        <tr>
            <td>#</td>
            <td>Registration</td>
            <td>Participant</td>
            <td>Email Address</td>
            <td>Action</td>
        </tr>

        <?php
        $num = 1;
        while ($row = $archive->fetch_assoc()) :
        ?>

            <tr>
                <td> <?= $num ?> </td>
                <td> <?= $row['registration'] ?></td>
                <td> <?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a href="revert.php?id=<?= $row['id'] ?>"><i class="bi bi-arrow-clockwise"></i></a>
                </td>
            </tr>

        <?php
            $num++;
        endwhile;
        ?>

    </table>
</body>

</html>
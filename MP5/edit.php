<?php

require "connection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM participants WHERE id = $id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $license = $_POST['license'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $email = $_POST['email'];

    $sql = "UPDATE participants SET 
    license='$license',
    dateOfBirth='$dateOfBirth',
    email='$email'
    WHERE id=$id";
    $conn->query($sql);

    header("Location: view.php?id=$id");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Records</title>
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

    <form method="POST" action="edit.php?id=<?= $id ?>">
        <table>
            <tr>
                <td> Record Number </td>
                <td> <input type="text" name="id" value="<?=$row['id']?>" size="30" disabled/> <br> </td>
            </tr>
            <tr>
                <td> Full Name </td>
                <td> <input type="text" name="name" value="<?=$row['name']?>" size="100" disabled/> <br> </td>
            </tr>
            <tr>
                <td> License Number </td>
                <td> <input type="text" name="license" placeholder="XX9-99999" size="100" pattern="^[A-Z]{2}[0-9]{1}-[0-9]{5}$" maxlength="9" value="<?=$row['license']?>"/> <br> </td>
            </tr>
            <tr>
                <td> Date of Birth </td>
                <td> <input type="date" name="dateOfBirth" min="1963-02-13" max="2005-02-12" value="<?=$row['dateOfBirth']?>"/> <br> </td>
            </tr>
            <tr>
                <td> Email Address </td>
                <td> <input type="email" name="email" placeholder="Exact Name on the License" size="100" value="<?=$row['email']?>"/> <br> </td>
            </tr>
            <tr>
                <td> Registered Date </td>
                <td> <input type="text" name="regisration" placeholder="2022" size="30" disabled value="<?=$row['registration']?>"/> <br> </td>
            </tr>

        </table>

        <button type="submit">Update</button>
    </form>

    <hr>
    <a href="index.php"><i class="bi bi-house-fill"></i></a>

</body>

</html>
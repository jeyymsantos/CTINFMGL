<?php
include_once("database.php");

$sql = "SELECT * FROM tblaccounts";
$accounts = $conn->query($sql) or die($conn->error);

$email = $_POST["email"];
$pass = $_POST["password"];
$campus = $_POST["campus"];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Machine Problem 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row mt-3">
            <div class="col-5">
                <form action="process-form.php" method="post">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword">
                    </div>

                    <div class="mb-3">
                        <label for="inputCampus" class="form-label">Select NU Campus</label>
                        <select id="inputCampus" name="campus" class="form-select" aria-label="Default select example">
                            <option value="1" selected>NU Baliwag</option>
                            <option value="2">NU Manila</option>
                            <option value="3">NU Clark</option>
                        </select>
                    </div>

                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Campus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $accounts->fetch_assoc()) :
                        ?>
                            <tr>
                                <th scope="row"> <?= $row["id"] ?> </th>
                                <td> <?= $row["email"] ?> </td>
                                <td> <?= $row["password"] ?></td>
                                <td> <?= $row["campus"] ?></td>
                            </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
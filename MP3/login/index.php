<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <center>
        <h3> Sample Login Page </h3>
        <hr width="30%">
        <form method="POST" action="verify.php">
            <label for="username"> Username: </label> <br>
            <input type="email" size="50" required placeholder="sample@gmail.com" name="inputUsername" id="username"><br><br>
            <label for="password"> Password: </label><br>
            <input type="password" size="50" required name="inputPassword" id="password"><br><br><br>
            <hr width="30%">
            <button type="submit">Sign In </button>
        </form>
    </center>
</body>

</html>
<?php

include "connection.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];

$sql = "INSERT INTO tblInfo (firstName, lastName, email) VALUES ('$firstName', '$lastName', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


?>
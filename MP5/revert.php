<?php

require 'connection.php';

$id = $_GET['id'];

$sql = "SELECT * FROM archive WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        $name = $row['name'];
        $license =  $row['license'];
        $dateOfBirth =  $row['dateOfBirth'];
        $email =  $row['email'];
        $registration =  $row['registration'];

        $sql = "INSERT INTO participants (id, name, license, dateOfBirth, email, registration)
        VALUES ('$id', '$name', '$license', '$dateOfBirth', '$email', '$registration')";
        $conn->query($sql);
    }
  } else {
    echo "0 results";
  }

// sql to delete a record
$sql = "DELETE FROM archive WHERE id=$id";
$conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: index.php');
  } else {
    echo "Error deleting record: " . $conn->error;
  }

?>
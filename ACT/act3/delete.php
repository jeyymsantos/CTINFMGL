<?php

include "connection.php";

$id = $_POST['id'];

$sql = "DELETE FROM tblInfo WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
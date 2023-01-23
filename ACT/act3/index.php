
<form method="POST" action="insert.php">
    <h3>Data Entry</h3>
    <hr />
    <input type="text" name="firstName" placeholder="First Name"><br>
    <input type="text" name="lastName" placeholder="Last Name"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <hr />
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
</form>

<hr />
<form method="POST" action="delete.php">
    <h3>Delete Entry</h3>
    <hr />
    <input type="text" name="id" placeholder="Enter ID">
    <input type="submit" value="Delete">
</form>
<hr />

<h3>Display Table</h3>
<?php
include "connection.php";

$sql = "SELECT id, firstName, lastName FROM tblInfo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["firstName"] . " " . $row["lastName"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
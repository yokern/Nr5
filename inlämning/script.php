<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "123";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM 123table";
$result = $conn->query($sql);

$login_success = false;
$full_name = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (
            $row["username"] == $_POST["username"] &&
            $row["password"] == $_POST["password"]
        ) {
            $login_success = true;
            echo "Welcome " . $_POST["username"];
        }
    }
} else {
    echo "0 results";
}
$conn->close();

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
  <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT * FROM webbserverprogrammering";
$result = $conn->query($sql);


$login_success = false;
$full_name = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row["username"] == $_POST["username"] &&
					$row["password"] == $_POST["password"]) {
			$login_success = true;
            echo "Welcome " . $_POST["username"] ;
			}
	} if($login_success == false) {
        echo "Login failed" ;
    }
} else {
    echo "0 results";
}
$conn->close();

    if ($login_success) {
        session_start();
        $_SESSION["username"] = $_POST["username"];
    }

    if (isset($_POST['logout'])) {
        session_start();
        session_destroy();
        header("Location:checklogin.php");
        exit;
    }

    ?>
    <form method="post">
        <input type="submit" name="logout" class="button" value="Sign out">
    </form>
</body>

</html>
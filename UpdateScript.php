<?php


$EmployeeID = $_POST["EmployeeID"];
$Name = $_POST["Name"];
$Email = $_POST["Email"];
$PhoneNumber = $_POST["PhoneNumber"];
$Title= $_POST["Title"];

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Employee Registration";

$conn = new mysqli($servername, $username, $password, $db);



if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "update Information set Name='$Name', Email='$Email', PhoneNumber='$PhoneNumber', Title='$Title' WHERE EmployeeID='$EmployeeID'";

if ($conn->query($sql) === TRUE) {
 echo '<script>alert("Records inserted successfully.")</script>';
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Records Successfully Changed!</h1>
    <p>
        <a href="index.html" class="btn btn-warning">Go to Home page</a>
        <a href="links.php" class="btn btn-danger ml-3">Go to Links pagee</a>
    </p>

</body>
</html>
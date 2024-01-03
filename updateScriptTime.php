<?php


$EmployeeID2 = $_POST["EmployeeID2"];
$EntryTime = $_POST["EntryTime"];
$ExitTime = $_POST["ExitTime"];
$Date = $_POST["Date"];
$CommentsM = $_POST["CommentsM"];
$CommentsE = $_POST["CommentsE"];

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Attendance_System";

$conn = new mysqli($servername, $username, $password, $db);



if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}


$sql = "update $EmployeeID2 set EntryTime='$EntryTime', Date='$Date', CommentsM='$CommentsM', CommentsE='$CommentsE', ExitTime='$ExitTime' WHERE Date='$Date'";

if ($conn->query($sql) === TRUE) {
	 echo '<script>alert("Records updated successfully.")</script>';
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
        <a href="links.php" class="btn btn-danger ml-3">Go to other links</a>
    </p>

</body>
</html>
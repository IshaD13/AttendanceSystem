


<!DOCTYPE html> 

<head>
    <meta charset='UTF-8'>
    <title>Update Information</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css'>
    <style type='text/css'>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>

<?php


    // set the employee id entered in the previous form as the variable $EmployeeID
if(isset($_POST['submit'])) {
    $EmployeeID2= $_POST['EmployeeID2'];
    $EmployeeID3 = "E".$EmployeeID2;
}
if(isset($_POST['submit'])) {
    $Date2= $_POST['Date2'];
}



$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Attendance_System";



session_start();


// connect to the database
    
$conn = new mysqli($servername, $username, $password, $db);

// set these variables as null

$Name  = $PhoneNumber= $Email = "";
$Name_err  = $PhoneNumber_err = $Email_err = "";

// inform user if the program isn't able to connect to the database
if($conn->connect_error){
	die("Connection failed ".$conn->connect_error);
}

// find the information for the emplyee id the supervisor entered in the previous form
$sql = "select * from $EmployeeID3 WHERE Date='$Date2'";

$result = $conn->query($sql);

// if in the database data exits for the employee id entered, echo the table form with the information automatically entered

if ($result->num_rows > 0){

$row = $result->fetch_assoc();

$EntryTime = $row["EntryTime"];
$Date = $row["Date"];
    $ExitTime = $row["ExitTime"];
     $CommentsM = $row["CommentsM"];
     $CommentsE = $row["CommentsE"];

echo



    "<html>
<head>
    <meta charset='UTF-8'>
    <title>Update Information</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css'>
    <style type='text/css'>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
     <form action= 'updateScriptTime.php' method='post'>
    <div class='wrapper'>
        <h2>Update Information</h2>
        <p>Please fill this form update the user's account.</p>
        Employee ID: $EmployeeID3<br>
<input type='hidden' name='EmployeeID2'  value='$EmployeeID3'> <br>

          <div class='form-group  (!empty($Email_err)) ? 'has-error' : ''?>
                <label>Date</label>
                <input type='text' name='Date' class='form-control' value='$Date' readonly>
                <span class='help-block'>$Email_err </span>
            </div>   
            <div class='form-group  (!empty($Name_err))  'has-error' : '' '>
                <label>Time of Entry</label>
                <input type='text' name='EntryTime' class='form-control' value='$EntryTime'>
                <span class='help-block'> $Name_err</span>
            </div>   
              <div class='form-group  (!empty($Name_err))  'has-error' : '' '>
                <label>Time of Exit</label>
                <input type='text' name='ExitTime' class='form-control' value='$ExitTime'>
                <span class='help-block'> $Name_err</span>
            </div>   
            <div class='form-group  (!empty($Email_err)) ? 'has-error' : ''?>
                <label>Comments (Morning)</label>
                <input type='text' name='CommentsM' class='form-control' value='$CommentsM'>
                <span class='help-block'>$Email_err </span>
            </div>   
            <div class='form-group  (!empty($Email_err)) ? 'has-error' : ''?>
                <label>Comments (Evening)</label>
                <input type='text' name='CommentsE' class='form-control' value='$CommentsE'>
                <span class='help-block'>$Email_err </span>
            </div>   
         
            <div class='form-group'>
                <input type='submit' class='btn btn-primary' value='Submit'>
                <input type='reset' class='btn btn-default' value='Reset'>
            </div>
        </form>
    </div>    
</body>
</html>";
    
    
    
    
    
    
    
    
// if no information appars, output this instead:
} else {
	echo "     <html>
<head>
    <meta charset='UTF-8'>
    <title>Update Information</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css'>
    <style type='text/css'>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class='wrapper'>
        <h2>No user found</h2>
        <p>Please click the button below to enter another employee ID.</p>
    
    
   <form  action = 'updateTimeForm.php' >
                           <button id='buttonRegister' type='submit' class='btn btn-primary js-scroll-trigger'  data toggle='button'> Click Me </button>
                      </form>";
    
    
   // <form action='IDform.php' method='POST'>
//  <input type='submit>
//</form> ";
    
   // </h3> <br> <br> <input action='IDform.php' method='POST' type='submit' class='btn btn-primary' value='Submit'> ";
}
$conn->close();

?>

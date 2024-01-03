


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
$Name = "";
$Name_err  = "";

?>

 

<html>
<head>
    <meta charset='UTF-8'>
    <title>Update Registration Employees</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css'>
    <style type='text/css'>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class='wrapper'>
        <h2>Enter Employee ID (Employees Only)</h2>
        <p>Please enter the Employee ID of whose account you wish to update.</p>

           <form name="inputID"  action= 'updateReg.php' method='post'>
            <div class='form-group  (!empty($Name_err))  'has-error' : '' '>
                <label>Employee ID</label>
                <input type='text' name = "EmployeeID" class='form-control' >
               
            </div>   
               
<input type='submit' class='btn btn-primary' value='Submit' name = "1submit">
        </form>
    </div>
    </body>
</html>

<?php
   if(isset($_POST['1submit'])) {

    // set the employee id entered in the previous form as the variable $EmployeeID
if(isset($_POST['1submit'])) {
    $EmployeeID= $_POST['EmployeeID'];
}



$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Employee Registration";



session_start();


// connect to the database
    
$conn = new mysqli($servername, $username, $password, $db);

// set these variables as null

$Name  = $PhoneNumber= $Email = $Title = "";
$Name_err  = $PhoneNumber_err = $Email_err = $Title_err = "";

// inform user if the program isn't able to connect to the database
if($conn->connect_error){
	die("Connection failed ".$conn->connect_error);
}

// find the information for the emplyee id the supervisor entered in the previous form
$sql = "select * from Information where EmployeeID = '$EmployeeID'";

$result = $conn->query($sql);

// if in the database data exits for the employee id entered, echo the table form with the information automatically entered

if ($result->num_rows > 0){

$row = $result->fetch_assoc();

$Name = $row["Name"];
$Email = $row["Email"];
$PhoneNumber = $row["PhoneNumber"];
    $Title = $row["Title"];
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
     <form action= 'UpdateScript.php' method='post'>
    <div class='wrapper'>
        <h2>Update Information</h2>
        <p>Please fill this form update the user's account.</p>
        Employee ID: $EmployeeID<br>
<input type='hidden' name='EmployeeID'  value='$EmployeeID'> <br>

      
            <div class='form-group  (!empty($Name_err))  'has-error' : '' '>
                <label>Name</label>
                <input type='text' name='Name' class='form-control' value='$Name'>
                <span class='help-block'> $Name_err</span>
            </div>   
            <div class='form-group  (!empty($Email_err)) ? 'has-error' : ''?>
                <label>Email</label>
                <input type='text' name='Email' class='form-control' value='$Email'>
                <span class='help-block'>$Email_err </span>
            </div>   
            <div class='form-group  (!empty($PhoneNumber_err)) ? 'has-error' : ''; '>
                <label>Phone Number</label>
                <input type='number' name='PhoneNumber' class='form-control' value='$PhoneNumber' 
                <span class='help-block'>$PhoneNumber_err</span>
            </div>   
              <div class='form-group  (!empty($Title_err)) ? 'has-error' : ''; '>
                <label>Title</label>
                <input type='text' name='Title' class='form-control' value='$Title' 
                <span class='help-block'>$Title_err</span>
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
    
    
   <form  action = 'updateRegForm.php' >
                           <button id='buttonRegister' type='submit' class='btn btn-primary js-scroll-trigger'  data toggle='button'> Click Me </button>
                      </form>";
}
    
    
   // <form action='IDform.php' method='POST'>
//  <input type='submit>
//</form> ";
    
   // </h3> <br> <br> <input action='IDform.php' method='POST' type='submit' class='btn btn-primary' value='Submit'> ";


$conn->close();
 }

?>


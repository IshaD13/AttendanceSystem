<?php

  $conn = mysqli_connect("127.0.0.1", "root", "", "Attendance_System");
  if($conn === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

?>

<!DOCTYPE html>
<html>
<head>
           <link href="css/styles.css" rel="stylesheet" />
<title>newTable</title>
</head>

<body>

</body>

</html>


<?php
$Name = "";
$Name_err  = "";

if(isset($_POST['submit'])) {
    $EmployeeID3= $_POST['EmployeeID3'];
}

if(isset($_POST['submitR'])) {
    $Name= $_POST['Name'];
}

?>



<html>
<head>
    <meta charset='UTF-8'>
    <title>Enter Employee ID</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css'>
    <style type='text/css'>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class='wrapper'>
        <h2>Finalize Registration 2</h2>
        <p>Please your Employee ID to finish registration.</p>

           <form name="inputID"  action= 'newTable.php' method='post'>
            <div class='form-group  (!empty($Name_err))  'has-error>
                <label>Employee ID:</label>
                <input type='text' name = "EmployeeID3" class='form-control' >
            </div>

<input type='submit' class='btn btn-primary' value='Submit' name = "submit" >
        </form>
    </div>
    </body>
</html>

 <?php

// require the document including the form so the form is displayed on this docuement instead so two documents aen't needed 



    // define data collected from the form as a variable 
if(isset($_POST['EmployeeID3']))
{
 if(isset($_POST['submit'])) {
    $EmployeeID3= $_POST['EmployeeID3'];
}
    
    // concatenate the employee id with the letters M and E and set each as a seperate variable
    $EmployeeID4 = "E".$EmployeeID3;
    
        // when user clicks the button, create a table for entry time and date with these specifics:
$sql = "CREATE TABLE $EmployeeID4 (
    EntryTime varchar(15),
     ExitTime varchar(15),
    Date varchar(15),
    CommentsM varchar(255),
    CommentsE varchar(255)
)";
    
            // inform the user if the information has been input into the database, and if not, list specific error   
if(mysqli_query($conn, $sql)){
      header("location: index.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
    
   
    }


mysqli_close($conn);

?>

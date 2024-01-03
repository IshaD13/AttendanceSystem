

<?php
    $link = new mysqli ("127.0.0.1", "root", "", "Attendance_System");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<html>
<head>
        <title>Buttons</title>

<link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    </head>
     <style type="text/css">



        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>

        
        <!-- navbar start -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
    <li class="breadcrumb-item"><a href="LoginIA.php">Login</a></li>
    <li class="breadcrumb-item active" aria-current="page">Insert Data</li>
  </ol>
</nav>
     <!-- navbar end -->
    
<!-- -------- -------- -------- -------- -------- -------- -------- -------- -------- -------- -------- ------- ------- ----- -->
<!-- -------- -------- -------- -------- -------- -------- -------- -------- -------- -------- -------- ------- ------- ----- -->
<!-- -------- -------- -------- -------- -------- -------- -------- -------- -------- -------- -------- ------- ------- ----- -->    
  <section>
    
<div class='wrapper'>
    <h2>Employee ID:</h2>
<form method="post">

            <input type='text' name = "EmployeeID13" class='form-control' >
    </div>
<div id="buttonsDiv">
<div class="row" >
    <!---  Created a div which includes the photos, buttons, and comments  -->
   <div class="container3">
    <img class="imgButtons" src="assets/img/demo-image-01.jpg" alt="Snow">
          <!---  Check-in button  -->
        <div class="centered3"><h2 id="buttons">Check-in</h2>
             <input type='text' name='CommentsM' class='form-control'> 
   <input type='submit' id="Cbutton" class='btn btn-dark' value='Check-In' name='Submit'>
      </div>
    </div>


    <!---  Created a div which includes the photos, buttons, and comments  -->
   <div class="container3">
         
    <img class="imgButtons" src="assets/img/demo-image-01.jpg" alt="Snow">

          <!---  Check-in button  -->
        <div class="centered3"><h2 id="buttons" >Check-Out</h2>
                            <input type='text' name='CommentsE' class='form-control'> 
    <input  type='submit' id="Cbutton" class='btn btn-dark' value='Check-Out' name='Submit12'>

      </div>
        
    </div>
    </div>
    

    

        </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    

<?php


    // button for check-in

if (isset($_POST['Submit'])){
    // set $EmployeeID13 as the input to the form 
    $EmployeeID13 = $_POST['EmployeeID13'];
        // set $EmployeeID14 as E(EmployeeID13) as all the tables start with the letter E
    $EmployeeID14 = "E".$EmployeeID13;
    // Define variables as the real current time and date
   $EntryTime = date('H:i', strtotime('now', strtotime('+8')));
    $Date = date('Y:m:d');
// insert time and date into database
 $sql1 = "INSERT INTO $EmployeeID14 (EntryTime, Date) VALUES ('$EntryTime', '$Date')";
// give the users confirmation that the time is inserted using Javascript alerts or show the error which occured
if(mysqli_query($link, $sql1)){
     echo '<script>alert("Morning records inserted successfully.")</script>';
    }
};

if(isset($_POST['Submit'])){
    // set $CommentsM as the input to the form 
            $CommentsM = $_POST['CommentsM'];
        // Define variables as the current date
       $Date = date('Y:m:d');
    // update comments for the input where the date field is the same as current date
    $sql = "update $EmployeeID14 set CommentsM='$CommentsM' WHERE Date='$Date'";
if(mysqli_query($link, $sql)){
    // give confirmatin that comments are inputted in DB
     echo '<script>alert("Morning comments inserted successfully.")</script>';
} else{
      echo '<script>alert("ERROR: Could not able to execute $sql. " . mysqli_error($link)")</script>';
}

  }
    
    if (isset($_POST['Submit12'])){
    
    $EmployeeID13 = $_POST['EmployeeID13'];
            $EmployeeID14 = "E".$EmployeeID13;

   $ExitTime = date('H:i', strtotime('now', strtotime('+8')));
    $Date = date('Y:m:d');
            
// insert into database
$sql = "update $EmployeeID14 set ExitTime='$ExitTime' WHERE Date='$Date'";


// give the users confirmation that the time is inserted using Javascript alerts or show the error which occured
if(mysqli_query($link, $sql)){
     echo '<script>alert("Records inserted successfully.")</script>';
}

};

        
    



    
    
if(isset($_POST['Submit12'])){
            $CommentsE = $_POST['CommentsE'];
       $Date = date('Y:m:d');
   

  $sql = "update $EmployeeID14 set CommentsE='$CommentsE' WHERE Date='$Date'";
if(mysqli_query($link, $sql)){
     echo '<script>alert("Evening comments inserted successfully.")</script>';
} else{
      echo '<script>alert("ERROR: Could not able to execute $sql. " . mysqli_error($link)")</script>';
}

  }
    
?>










</body>

</html>
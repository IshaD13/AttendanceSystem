
<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>
    
   <?php  if(isset($_POST['submit'])) {
    $NameHA= $_POST['NameHA'];
}
?>

<html>
<head>
    <meta charset='UTF-8'>
    <title>Enter Name</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css'>
    <style type='text/css'>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class='wrapper'>
        <h2>Finalise Registration</h2>
        <p>Please enter your name below (<i>exactly</i> how it was spelled in the previous form)</p>
        
        <form  action="enterNameha.php" method="post">
            <div class='form-group  (!empty($Name_err))  'has-error''>
<h4>Name: <input type="text" name="NameHA" class='form-control' /></h4>


            </div>
            
           

<input name = "entername2" type='submit' class='btn btn-primary' value='Submit' name = "submit2">
        </form>
    </div>
    </body>
</html>


    <?php
    $link = new mysqli ("127.0.0.1", "root", "", "demo");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


  $conn = mysqli_connect("127.0.0.1", "root", "", "Attendance_System");
  if($conn === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }


        
$Name = '';
if (isset($_POST['entername2']))
{

 
    function fetch_data()  
 {  

         $NameHA = ($_POST['NameHA']);
        
      $output = '';  
      $conn = mysqli_connect("127.0.0.1", "root", "", "Employee Registration");
      $sql = "SELECT Name, Email, PhoneNumber, EmployeeID FROM HigherAccess WHERE Name = '$NameHA '";
       
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      
      $output .= '<tr>  
                          <td>'.$row["Name"].'</td>  
                          <td>'.$row["Email"].'</td>  
                          <td>'.$row["PhoneNumber"].'</td>  
                          <td>'.$row["EmployeeID"].'</td>  
                     </tr>  
                          ';  
      }  
          echo ($_POST['Email']);
      return $output;  
      

 }  

              
    ?>
    
    

    
        <br />
           <div class="container">  
                <h4 align="center"> Is the Information Below Correct?</h4><br />  
              <b>*Please remember your Employee ID, you will need it to access files in the future</b>
                <div class="table-responsive">  
                    <div class="col-md-12" align="right">
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="30%">Name</th>  
                               <th width="30%">Email</th>  
                               <th width="25%">PhoneNumber</th>  
                               <th width="15%">EmployeeID</th>  
                          </tr>  
                     <?php  
                     echo fetch_data(); 
    
                     ?>  
                         
                     </table>  
                    
                </div>
               
                   <form>      
                 
            </form>
     <button onclick="location.href='index.html'">The Information is Correct</button> <br/> <br/> <br/>
                 

           
    




<?php

    }

    ?>
        
         
             
    
   
</body>

</html>




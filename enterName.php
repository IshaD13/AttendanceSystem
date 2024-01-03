

<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>
    
   <?php  if(isset($_POST['submit'])) {
    $Name= $_POST['Name'];
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
        <h2>Finalise Registration 1</h2>
        <p>Please enter your name below (<i>exactly</i> how it was spelled in the previous form)</p>
        
        <form  action="enterName.php" method="post">
            <div class='form-group  (!empty($Name_err))  'has-error''>
<h4>Name: <input type="text" name="Name" class='form-control' /></h4>


            </div>
            
           

<input name = "entername" type='submit' class='btn btn-primary' value='Submit' name = "submit">
        </form>
    </div>
    </body>
</html>


    <?php


  $conn = mysqli_connect("127.0.0.1", "root", "", "Attendance_System");
  if($conn === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }


        
$Name = '';
if (isset($_POST['entername']))
{

 
    function fetch_data()  
 {  

         $Name = ($_POST['Name']);
        
      $output = '';  
      $conn = mysqli_connect("127.0.0.1", "root", "", "Employee Registration");
      $sql = "SELECT Name, Email, PhoneNumber, EmployeeID FROM Information WHERE Name = '$Name '";
       
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
      return $output;  

        $test123 = "test";
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
     <button onclick="location.href='newTable.php'">The Information is Correct</button> <br/> <br/> <br/>
               If the information is incorrect, please inform the supervisor

           
    




<?php

    }

    ?>
        
         
             
    
   
</body>

</html>






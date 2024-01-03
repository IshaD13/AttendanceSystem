<?php
// Include config file
require_once "configIA.php";
 
// Define variables and initialize with empty values
$Name  = $Email =  $PhoneNumber = $Title = $password = $confirm_password = "";
$Name_err  = $Email_err = $PhoneNumber_err = $Title_err =  $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["Name"]))){
        $Name_err = "Please enter your Name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT EmployeeID FROM Information WHERE Name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Name);
            
            // Set parameters
            $param_Name = trim($_POST["Name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $Name_err = "This name is already taken.";
                } else{
                    $Name = trim($_POST["Name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
      
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    //Email
    if(empty(trim($_POST["Email"]))){
        $Email_err = "Please enter your email.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $Email_err = "Email must have atleast 6 characters.";
    } else{
        $Email = trim($_POST["Email"]);
    }
    //PhoneNumber
      if(empty(trim($_POST["PhoneNumber"]))){
        $PhoneNumber_err = "Please enter your PhoneNumber.";     
    } else{
        $PhoneNumber = trim($_POST["PhoneNumber"]);
    }
    
    //Title
      if(empty(trim($_POST["Title"]))){
        $Title_err = "Please enter your Title.";     
    } else{
        $Title = trim($_POST["Title"]);
    }
    
    // Check input errors before inserting in database
    if(empty($Name_err)  &&empty($password_err) && empty($confirm_password_err) && empty($Email_err) && empty($PhoneNumber_err) && empty($Title_err) ){
        
        // Prepare an insert statement
        $sql = "INSERT INTO Information (Name, password, Email, PhoneNumber, Title) VALUES (?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_Name, $param_password, $param_Email, $param_PhoneNumber, $param_Title);
            
            // Set parameters
            $param_Name = $Name;
             $param_Email =  $Email;
            $param_PhoneNumber = $PhoneNumber;
            $param_Title = $Title;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: enterName.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up (Employees)</h2>
        <p>Please fill this form to create an account.</p>
        <form name = "register123s" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($Name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="Name" class="form-control" value="<?php echo $Name; ?>">
                <span class="help-block"><?php echo $Name_err; ?></span>
            </div>    
                <div class="form-group">
              <label for="Email">Email:</label>
              <input type="email" class="form-control" name="Email" id="lname" required="required" maxlength="80">
            </div>
               <div class="form-group">
              <label for="PhoneNumber">Phone Number:</label>
              <input type="number" class="form-control" name="PhoneNumber" required="required" maxlength="80">
            </div>
                 <div class="form-group">
              <label for="PhoneNumber">Title:</label>
              <input type="text" class="form-control" name="Title" required="required" maxlength="80">
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="LoginIA.php">Login here</a>.</p>
        </form>
    </div>    
<script>
$(document).ready(function(){

$('#button1').click(function(){
var button1=$(this).val();

$.post('function.php',{id:button1},function(data)
{
 alert(successfully)
})


});

});
</script>
</body>
</html>
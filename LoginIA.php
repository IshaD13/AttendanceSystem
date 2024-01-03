<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page


// Include config file
require_once "configIA.php";
 
// Define variables and initialize with empty values
$Name = $password = "";
$Name_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["Name"]))){
        $Name_err = "Please enter your name.";
    } else{
        $Name = trim($_POST["Name"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($Name_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT EmployeeID, Name, password FROM Information WHERE Name = ?";
        
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Name);
            
            // Set parameters
            $param_Name = $Name;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $EmployeeID, $Name, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["EmployeeID"] = $EmployeeID;
                            $_SESSION["Name"] = $Name;                            
                            
                            // Redirect user to welcome page
                            header("location: buttons.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $Name = "No account found with that Name.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>

    
    <div class="wrapper">
        <h2>Login (Employees)</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($Name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="Name" class="form-control" value="<?php echo $Name; ?>">
                <span class="help-block"><?php echo $Name_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            </div>
            <p>Don't have an account? <a href="ProcessIA.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>
 

 








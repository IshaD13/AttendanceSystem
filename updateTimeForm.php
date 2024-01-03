
<?php
$Name = "";
$Name_err  = "";

?>

 

<html>
<head>
    <meta charset='UTF-8'>
    <title>Enter Employee ID</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css'>
    <style type='text/css'>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class='wrapper'>
        <h2>Enter Employee ID</h2>
        <p>Please enter the Employee ID of whose account you wish to update.</p>

           <form name="inputID"  action= 'UpdateTime.php' method='post'>
            <div class='form-group  (!empty($Name_err))  'has-error' : '' '>
                <label>Employee ID:</label>
                <input type='text' name = "EmployeeID2" class='form-control' >
            </div>   
                 <div class='form-group  (!empty($Name_err))  'has-error' : '' '>
                <label>For the date:</label>
                <input type='text' name = "Date2" class='form-control' placeholder="( Y:m:d --> 0000:00:00 )">
            </div>   
               
<input type='submit' class='btn btn-primary' value='Submit' name = "submit">
        </form>
    </div>
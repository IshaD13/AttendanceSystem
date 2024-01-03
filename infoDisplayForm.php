
<?php
$Name = "";
$Name_err  = "";

if(isset($_POST['submit'])) {
    $EmployeeID= $_POST['EmployeeID'];
}
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
        <p>Please enter the Employee ID of whose account details you wish to see.</p>

           <form name="inputID"  action= 'infoDisplay.php' method='post'>
            <div class='form-group  (!empty($Name_err))  'has-error''>
                <label>Employee ID</label>
                <input type='text' name = "EmployeeID" class='form-control' >

            </div>

<input type='submit' class='btn btn-primary' value='Submit' name = "submit">
        </form>
    </div>
    </body>
</html>

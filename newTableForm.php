
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
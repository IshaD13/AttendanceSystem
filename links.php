<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
</head>
<body>
            <!-- breadcrumb start -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
    <li class="breadcrumb-item"><a href="LoginIA.php">Login</a></li>
    <li class="breadcrumb-item active" aria-current="page">Links</li>
  </ol>
</nav>
     <!-- breadcrumb end -->
    
          <section class="projects-section bg-light" id="projects">
            <div class="container">
               
                
                
                
                
                
                <!-- Project One Row-->
                <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                       <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h3 class="text-white">View Attendance Records</h3>
                                   <br><br><br>
                                     <form  action = "infoDisplayForm.php" method="get" target="_blank" >
                            <button id="buttonRegister" type="submit" class="btn btn-primary js-scroll-trigger"  data toggle="button"> Click Me </button>
                        </form>
                                    <hr class="d-none d-lg-block mb-0 ml-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h3 class="text-white">Edit Attendance Records</h3>
                                   <br><br><br>
                                     <form  action = "updateTimeForm.php" method="get" target="_blank" >
                            <button id="buttonRegister" type="submit" class="btn btn-primary js-scroll-trigger"  data toggle="button"> Click Me </button>
                        </form>
                                         <hr class="d-none d-lg-block mb-0 mr-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
            <div class="row justify-content-center no-gutters">
                       <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h3 class="text-white">Edit Registration Information for Employees</h3>
                                   <br><br><br>
                                     <form  action = "updateReg.php" method="get" target="_blank" >
                            <button id="buttonRegister" type="submit" class="btn btn-primary js-scroll-trigger"  data toggle="button"> Click Me </button>
                        </form>
                                    <hr class="d-none d-lg-block mb-0 ml-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h3 class="text-white">Edit Registration Information for Supervisors</h3>
                                   <br><br><br>
                                     <form  action = "updateRegha.php"method="get" target="_blank" >
                            <button id="buttonRegister" type="submit" class="btn btn-primary js-scroll-trigger"  data toggle="button"> Click Me </button>
                        </form>
          <hr class="d-none d-lg-block mb-0 mr-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <!-- Project Three Row-->
                        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                       <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h3 class="text-white">Delete registration record for Employees</h3>
                                   <br><br><br>
                                     <form  action = "dropTable.php"method="get" target="_blank" >
                            <button id="buttonRegister" type="submit" class="btn btn-primary js-scroll-trigger"  data toggle="button"> Click Me </button>
                        </form>
                                    <hr class="d-none d-lg-block mb-0 ml-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h3 class="text-white">Delete registration record for Supervisors</h3>
                                   <br><br><br>
                                     <form  action = "dropTableha.php" method="get" target="_blank" >
                            <button id="buttonRegister" type="submit" class="btn btn-primary js-scroll-trigger"  data toggle="button"> Click Me </button>
                        </form>
                                              <hr class="d-none d-lg-block mb-0 mr-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    
</body>
</html>
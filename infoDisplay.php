<?php


require_once "infoDisplayForm.php";


$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Attendance_System";


     if(isset($_POST['submit'])) {
     $EmployeeID= $_POST['EmployeeID'];
     }

function fetch_data()
 {
    if(isset($_POST['submit'])) {
    $EmployeeID= $_POST['EmployeeID'];
}
    $EmployeeID1 = "E".$EmployeeID;
    
      $output = '';
      $conn = mysqli_connect("127.0.0.1", "root", "", "Attendance_System");
      $sql = "SELECT * FROM $EmployeeID1 ORDER BY Date ASC";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result))
      {
      $output .= '<tr>
                         <td>'.$row["Date"].'</td>
                         <td>'.$row["EntryTime"].'</td>
                         <td>'.$row["ExitTime"].'</td>
                         <td>'.$row["CommentsM"].'</td>
                         <td>'.$row["CommentsE"].'</td>   
                     </tr>
                          ';
      }
      return $output;
 }

function createpdf(){
if(isset($_POST["generate_pdf"]))  {
     ob_start();

      require_once('/opt/lampp/phpmyadmin/vendor/tecnickcom/tcpdf/tcpdf.php');
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("Employees Registration Information");
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->SetDefaultMonospacedFont('helvetica');
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);
      $obj_pdf->SetAutoPageBreak(TRUE, 10);
      $obj_pdf->SetFont('helvetica', '', 12);
      $obj_pdf->AddPage();
      $content = '';
      $content .= '
      <h4 align="center">Employees Registration Information</h4><br />
      <table border="1" cellspacing="0" cellpadding="3">
           <tr>
                <th width="25%">Name</th>
                <th width="32%">Email</th>
                <th width="23%">PhoneNumber</th>
                <th width="15%">EmployeeID</th>
           </tr>
      ';
      $content .= fetch_data();
      $content .= '</table>';
      $obj_pdf->writeHTML($content);
      $obj_pdf->Output('file.pdf', 'I');
 }
}
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>SoftAOX | Employees Registration Information"</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      </head>
      <body>
           <br />
           <div class="container">
                <h4 align="center"> Employees Registration Information</h4><br />
                <div class="table-responsive">
                    <div class="col-md-12" align="right">
              <!---       <form method="post">
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" /> -->
                     </form>
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">
                          <tr>
                                <th width="15%">Date</th>
                                <th width="10%">EntryTime</th>
                               <th width="10%">ExitTime</th>
                              <th width="30%">Morning Comments </th>
                              <th width="30%">Evening Comments</th>
                    
                            
                          </tr>
                     <?php
                     echo fetch_data();
                     ?>
                     </table>
                </div>
           </div>

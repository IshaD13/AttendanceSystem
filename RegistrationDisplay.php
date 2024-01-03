
<?php


function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("127.0.0.1", "root", "", "Employee Registration");
      $sql = "SELECT * FROM Information ORDER BY EmployeeID ASC";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["Name"].'</td>  
                          <td>'.$row["Email"].'</td>  
                          <td>'.$row["PhoneNumber"].'</td>  
                          <td>'.$row["EmployeeID"].'</td>  
                           <td>'.$row["Title"].'</td> 
                     </tr>  
                          ';  
      }  
      return $output;  
 }  



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
                               <th width="20%">Email</th>  
                               <th width="20%">PhoneNumber</th>  
                               <th width="15%">EmployeeID</th>  
                               <th width="20%">Title</th> 
           </tr>  
           
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Registration Display</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center"> Employees Registration Information</h4><br />  
                <div class="table-responsive">  
                    <div class="col-md-12" align="right">
                  <form method="post">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
                     </form>  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="25%">Name</th>  
                               <th width="20%">Email</th>  
                               <th width="15%">PhoneNumber</th>  
                               <th width="7%">EmployeeID</th>  
                               <th width="15%">Title</th> 
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>  
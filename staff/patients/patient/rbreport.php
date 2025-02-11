<?php

function fetch_data()
{
  $output='';
  include('../../../staff/admin/db.php');
   if(isset($_GET['apapsid']))
   {
    $em=$_GET['apapsid'];
   }
    $result = $mysqli->query("select lab_test.*,patients.firstname as pfirstname,patients.lastname as plastname,doctors.firstname as dfirstname,doctors.lastname as dlastname from lab_test join patients on patients.email=lab_test.patient_email join doctors on doctors.email=lab_test.doctors_email where patient_email='$em' and lab_test.status='payment_completed' or lab_test.status='drug_received'  order by id desc") or die($mysqli->error);
   
      while ($row=$result->fetch_assoc())
      {
      $output.=
  "
      
      <tr>
    
       <td>" . $row['id'] . "</td>

                                           <td>" . $row['patient_email'] . "</td>
                                           <td>" . $row['pfirstname'] . "</td>
                                           <td>" . $row['plastname'] . "</td>
                                           <td>" . $row['doctors_email'] . "</td>
                                           <td>" . $row['dfirstname'] . "</td>
                                           <td>" . $row['dlastname'] . "</td>
                                           <td>" . $row['treatment'] . "</td>
                                           <td>" . $row['drugname'] . "</td>
                                           <td>" . $row['prescription'] . "</td>
 <td>" . $row['nchv_comment'] . "</td>
                                           <td>" . $row['status'] . "</td>
  
      </tr>
      ";

}
return $output;
}

// Include the main TCPDF library (search for installation path).
include('../../../library/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('John Elton');
$pdf->SetTitle('customer receipt');
$pdf->SetSubject('TCPDF ');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, 'universal_health', 'P.O.BOX  1123 ln(), Meru', array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$content='Dear esteemed client,Thank you for choosing us, its been a pleasure serving you:)';
$content.='
<style>
table
{
border-collapse:collapse;

}
th,td
{
  
  border:1px solid #888;
}
table tr th
{
 
  color:fff;
  font-weight:bold; 
}

</style>

';
$content.='







<h3 align="center"><u>Patients Receipt</u></h3>
<div class="table-responsive">
<table class="table table-bordered">
<tr>
  <th>ID</th>

                                    <th>Patient Email</th>
                                    <th>Patient Firstname</th>
                                    <th>Patient Lastname</th>
                                    <th>Doctors Email</th>
                                    <th>Doctors Firstname</th>
                                    <th>Doctors Lastname</th>
                                    <th>Treatment</th>
                                    <th>Prescribed Drug</th>
                                    <th>Quantity</th>
                                    <th>NCHV Comment</th>
                                    <th>Status</th>



</tr>
';
$content.=fetch_data();
$content.='</table>';
$pdf->writeHTML($content);
$pdf->output('Treatment History.pdf','I');



// Print text using writeHTMLCell()
;


// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->writeHTML($content);

//============================================================+
// END OF FILE
//============================================================+
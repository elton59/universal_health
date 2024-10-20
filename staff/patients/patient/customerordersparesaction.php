<?php
$captcha = "" ;
include "includes/connect.php";
include "connection.php";
if(isset($_POST['submit'])) {
	/*if (isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
		  $error = "Please check captcha too";
		  include ('addpaymenthistory.php');
		  exit();
        }
        $secretKey = "6LeD3hEUAAAAADNeeaGRfKmABjn1gnsXxrpdTa2J";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
		  $error = "You are spammer !";
        }*/
$name = mysqli_real_escape_string($conn, $_POST['appointmenttype']);
$name9 = mysqli_real_escape_string($conn,$_POST['doctors_email']);
$name8 = mysqli_real_escape_string($conn,$_POST['patient_email']);
$name6 = mysqli_real_escape_string($conn,$_POST['date_of_appointment']);




$sql=mysqli_query($conn,'INSERT INTO appointments(appointmenttype,status,doctors_email,patient_email,date_of_appointment,userid)
VALUES("'.$_POST['appointmenttype'].'","pending","'.$_POST['doctors_email'].'","'.$_POST['patient_email'].'","'.$_POST['date_of_appointment'].'","'.$_POST['customerid'].'")');
		 if (!$sql) {
		 die (mysqli_error($conn));
}

else {
$err= "Operation successful  <a href= 'customerorder.php'>Back </a>";
include"customerorder.php";
exit();
}
}
else {
	 $error="<center><h4><font color='#FF0000'>Registration Failed Due To Error !</h4></center></font>";
     include"customerorder.php";
}
?>
<script>
									function loanamount()
									{
									var original=document.getElementById("'.$_POST['orderedquantity'].'").value;
									var day=document.getElementById("days").value;


									var total=(Number(original)*Number(day))/1;



									document.getElementById("totalpaid").value=total;


									}
							</script>

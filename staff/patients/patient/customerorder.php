<?php
include('connection.php');
session_start();

$q1=mysqli_query($conn,'select * from patients where email="'.$_SESSION['finance'].'"');
$r1=mysqli_fetch_assoc($q1);?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Book Appointment</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <!------MENU SECTION START-->
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">

</div>
</div>

<script>
function showLoanDetails(data)
{

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("loandetails").innerHTML=xmlhttp.responseText;
}
}
//alert(data);
xmlhttp.open("GET","show_group_ajaxx.php?loan_details="+data,true);
xmlhttp.send();
}
</script>
<!--LOGIN PANEL START-->
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 <font color="green">Book Appointment</font>
</div>
<div class="panel-body">
  <form action= "customerordersparesaction.php" method= "post" id="myform" >


	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>




      <div class="row" style="margin-top:10px">

  		<div class="col-sm-5">
  		<input type="hidden" name="patient_email"   value="<?php echo $_SESSION['finance']?>" class="form-control"  required/>
</div>
</div>
<div class="row" style="margin-top:10px">

<div class="col-sm-5">
<input type="hidden" name="customerid"  value="<?php  $q1=mysqli_query($conn,'select * from users where email="'.$_SESSION['finance'].'"');
$r1=mysqli_fetch_assoc($q1);echo $r1['id'];  ?>" class="form-control"  required/>
</div>
</div>
  <div class="row" style="margin-top:10px">
		<div class="col-sm-4">Search Doctor</div>
		<div class="col-sm-5">
		<select name="doctors_spec" onchange="showLoanDetails(this.value)" class="form-control" required>
			<option value="">Search  </option>
			<?php
$q1=mysqli_query($conn,"select * from users where specialization='doctor' and status='approved'");
while($r1=mysqli_fetch_assoc($q1))
{
echo "<option value='".$r1['profession']."'>".$r1['profession']."</option>";
}
			?>
		</select>
		</div>
	</div>

  <script>
                    // function loanamount()
                    // {
                    // var original=document.getElementById("amount").value;
                    // var day=document.getElementById("days").value;


                    // var total=(Number(original)*Number(day))/1;



                    // document.getElementById("totalpaid").value=total;


                    // }
                </script>


                <div class="row" style="margin-top:10px">
                <div class="col-sm-4">Reason For Appointment</div>
                <div class="col-sm-5">
                <input type="text" name="appointmenttype"  class="form-control"  required/>

                </div>
              </div>
    <div class="row" style="margin-top:10px">
		<div class="col-sm-4">Appointment Date</div>
		<div class="col-sm-5">
		<input type="datetime-local" name="date_of_appointment"  class="form-control"  required/>

		</div>
	</div>
  <div class="row" id="loandetails"
  <div class="row" style="margin-top:10px">

    <div class="col-sm-5">
    <input type="hidden" readonly="true"  name="firstname" placeholder="Doctors FirstName"class="form-control" required/></div>
  </div>
  <div class="row" id="loandetails"
  <div class="row" style="margin-top:10px">

    <div class="col-sm-5">
    <input type="hidden" readonly="true"  name="firstname" placeholder="Doctors FirstName"class="form-control" required/></div>
  </div>

<div class="row" id="loandetails"
  <div class="row" style="margin-top:10px">

    <div class="col-sm-5">
    <input type="hidden" readonly="true"  name="firstname" placeholder="Doctors FirstName"class="form-control" required/></div>
  </div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">


<input type="submit"  name="submit" value="SubmitAppointment" class="btn btn-info"/>
		<input type="reset" class="btn btn-danger"/>
		</div>
	</div>

</form>



          </div>
              <div class="clearfix"></div>
      </form>
  </div>
</div>
</div>


          </div>
        </form>
      </div>
    </div>








     <!-- FOOTER SECTION END-->
   <script src="assets/js/jquery-1.10.2.js"></script>
   <!-- BOOTSTRAP SCRIPTS  -->
   <script src="assets/js/bootstrap.js"></script>
     <!-- CUSTOM SCRIPTS  -->
   <script src="assets/js/custom.js"></script>
</script>
</body>
</html>

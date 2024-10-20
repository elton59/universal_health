<?php
include("sidebar.php");
include("topbar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Book Appointment</title>

    <!-- Custom fonts for this template -->
    <link href="../../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Book Appointment</h1>
                    <div class="invinsible">
                    <p class="mb-4 invisible" type="hidden">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                   </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">BookAppointment</h6>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                        <form method="POST"  id="myForm2" action='createappointment.php'>
                                    <div class="form-group">
                                    <label>Search Doctor</label>
                                         <select  placeholder="search drug" id="branch" name="sapdatid" class="form-control">
                                        
                                      <?php 
                                       $result=$mysqli->query("select * from users where specialization='doctor' and status='approved' order by id  ")or die($mysqli->error);
                                       $drivers_list=array('search doctor...');
                                       
                                       while( $row=$result->fetch_array())
                                       {
                                     
                                           $driver_email=$row['email'];
                                          
                                          
                                           array_push($drivers_list,$driver_email);
                                       
                                       
                                          
                                       }
                                       foreach($drivers_list as $drivers)
                                       {

                                          echo "
                                          
                                          <option value='$drivers' class='form-control' >$drivers</option>";
                                
                                       }
                                      
                                      ?>
                              </select>
                             
                                    </div>
                                   
                                </form>
                                <?php
                                if(isset($_POST['sapdatid']))
                                {
                                  
                                    $sapdatid=$_POST['sapdatid'];
                                    $result=$mysqli->query("select * from users where email='$sapdatid' limit 1");
                                    $row=$result->fetch_assoc();
                                    $fname=$row['firstname'];
                                    $lname=$row['lastname'];
                                    $spec=$row['profession'];
                                    $em=$row['email'];
                                  
                                }else
                                {
                                    $fname='';
                                    $lname='';
                                    $spec='';
                                    $em='';   
                                }
                                ?>
                            
                            <div class="table-responsive"  >
                                <form method="POST"  id="myForm3" action="process.php"> 
                                <label>Reason For Appointment</label>
                               <div class="form-group">
                                        <input class="form-control" type="text" name="aptype" placeholder="Appointment Type" required/>
                               </div>
                               <label>Appointment Date</label>
                               <div class="form-group">
                                        <input class="form-control" type="datetime-local" name="apdate" placeholder="Appointment Date" min="<?php echo date('Y-m-d')?>"required/>
                               </div>
                               <div class="form-group">
                                        <input class="form-control" type="hidden" name="apcom" placeholder="Comment" required/>
                               </div>
                              
                                                          
                               <div class="form-group">
                                        <input class="form-control" type="hidden"   name="apdatid" placeholder="Doctors firstname" value="<?php echo $em?>" readonly required/>
                               </div>
                               <label>Doctor's Firstname</label>
                               <div class="form-group">
                                        <input class="form-control" type="text"  placeholder="Doctors firstname" value="<?php echo $fname?>" readonly required/>
                               </div>
                              
                               <label>Doctor's LastName</label>
                               <div class="form-group">
                                        <input class="form-control" type="text"  placeholder="Doctors Lastname"  value="<?php echo $lname?>"readonly required/>
                               </div>
                               <label>Doctor's Specialization</label>
                               <div class="form-group">
                                        <input class="form-control" type="text"  value="<?php echo $spec?>"  placeholder="Doctors Specialization" required readonly/>
                               </div>
                               <div class="form-group">
                                        <input class="form-control" type="hidden" name="appatid" placeholder="staffid" value="<?php echo $login_session ?>" required readonly/>
                               </div>
                               <div class="form-group">
                                   <input class="from control btn btn-primary" type="submit" value="submit" name="createappointment"/>
                                   <input class="from control btn btn-danger" type="reset" value="Cancel"/>
                                   

                               </div>
                                   
                               </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;were 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript"> 
    document.getElementById('branch').onchange = function() {
       
        localStorage.setItem('selecteditem', document.getElementById('branch').value);
        document.getElementById("myForm2").submit();
      
       
    };
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../assets/js/demo/datatables-demo.js"></script>

</body>

</html>
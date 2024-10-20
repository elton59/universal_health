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

    <title> Payment</title>

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

                <?php
                if(isset($_GET['apapsid']))
                {
                    $apapsid=$_GET['apapsid'];
                }
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Payment</h1>
                    <div class="invinsible">
                    <p class="mb-4 invisible" type="hidden">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                   </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> Payment</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"  >
                                <form method="POST" action="process.php"> 
                                <div class="form-group">
                                  <p>Dear customer , we currently support mpesa payments only; please follow the following <b>instructions <u>carefully</u></b> to proceed:
                                <ul><ol><li>Navigate to safaricom SDK/Safaricom App</li>
                                <li>Select Lipa na MPESA, input Paybill 777123</li>
                                <li>Enter Account number as universal_health123 </li>
                                <li>Pay the exact amount requested below or your payment will be rejected (we do not offer refund)</li>
                                <li>Copy the transaction code below and click submit</li>
                            </ol></ul></p>
                              
                               </div>
                               
                               <div class="form-group">
                               <input class="form-control" type="hidden" name="id" placeholder="id"  value="<?php echo $apapsid?>"required/>
                                        <input class="form-control" type="text" name="paytid"    maxlength="10" 
       style="text-transform:uppercase" placeholder="transaction code" required/>
                               </div>
                               <div class="form-group">
                                   <label>Amount Ksh:</label>
                                         <select n class="form-control">
                                      
                                      <?php 
                                      
                                       $result=$mysqli->query("select * from lab_test where id='$apapsid'")or die($mysqli->error);
                                       $drivers_list=array();
                                      
                                       while( $row=$result->fetch_array())
                                       {
                                     
                                           $driver_email=$row['totalcost'];
                                           array_push($drivers_list,$driver_email);
                                       
                                       
                                          
                                       }
                                       foreach($drivers_list as $drivers)
                                       {

                                          echo "<option value='$drivers' class='form-control'>$drivers</option>";
                                
                                       }
                                      ?>
                              </select>
                                  

                               </div>
                                                  
                            
                               </div>
                              
                               <input class="from control" name='pdate' type="hidden" value="<?php echo date('Y-m-d')?>" name="createpayment"/> 
                              
                               <div class="form-group">
                                   <input class="from control btn btn-primary" type="submit" value="submit" name="createpayment"/>
                                   <input class="from control btn btn-danger" type="reset" value="Cancel"/>
                                   
                               </div>
                                   
                               </form>
                        </div>
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
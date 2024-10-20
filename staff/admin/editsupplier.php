<?php
include('db.php');
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

    <title>Edit Supplier</title>

    <!-- Custom fonts for this template -->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">Edit Suppliers</h1>
                    <div class="invinsible">
                    <p class="mb-4 invisible" type="hidden">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                   </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Suppliers</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"  >
                            <table class="table table-bordered">
                                <th>CompanyName</th>
                                <th>Email</th>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>Gender</th>
                                    <th>PhoneNumber</th>
                                    <th>Password</th>
                                    
                                        <?php
                                        $result=$mysqli->query("select * from medicalsuppliers") or die($mysqli->error);
                                        while($row=$result->fetch_assoc())
                                        {
                                            echo
                                            "
                                            <tbody>
                                            <td>".$row['company']."</td>
                                           <td>".$row['email']."</td>
                                           <td>".$row['firstname']."</td>
                                           <td>".$row['lastname']."</td>
                                           <td>".$row['gender']."</td>
                                           <td>".$row['phonenumber']."</td>
                                           <td>".$row['password']."</td>
                                           <td><a href='editsupplier.php?suprid=$row[id]' class='btn btn-primary'>Edit</a>
                                           <a href='../process.php?rsuprid=$row[id]' class='btn btn-danger'>Delete</a></td>
                                            </tbody>
                                            ";
                                        }
                                        ?>
                                    </tbody>
                                 </table>
                                 <?php
                                 if(isset($_GET['suprid']))
                                 {
                                     $id=$_GET['suprid'];
                                     $result=$mysqli->query("select * from medicalsuppliers  where id='$id'")or die($mysqli->error);
                                     $row=$result->fetch_assoc();
                                     $supremail=$row['email'];
                                     $suprpass=$row['password'];
                                     $suprfname=$row['firstname'];
                                     $suprlname=$row['lastname'];
                                     $suprgen=$row['gender'];
                                     $suprpno=$row['phonenumber'];
                                     $suprcomname=$row['company'];
                                     echo "success";
    
                                    }
                                    else
                                    {
                                        echo "record will be displayed here";
                                    }
                                    
                                 ?>
                                   <form method="POST" action="../process.php">
                                   <div class="form-group">
                                        <input type="hidden" class="form-control" name="id" placeholder="Input Companyname"  value="<?php echo $id?>" required/>
                               </div>
                                <div class="form-group">
                                        <input class="form-control" name="suprcomname" placeholder="Input Companyname" value="<?php echo $suprcomname?>" required/>
                               </div> 
                               <div class="form-group">
                                        <input class="form-control" name="suprfname" placeholder="Input FirstName" value="<?php echo $suprfname?>" required/>
                               </div>
                               <div class="form-group">
                                        <input class="form-control" name="suprlname" placeholder="Input LastName"  value="<?php echo $suprlname?>"required/>
                               </div>
                               <div class="form-group">
                                        <input class="form-control" name="suprgen" value="<?php echo $suprgen?>">
                                          
                               </div>
                               <div class="form-group">
                                        <input class="form-control" name="suprpno" placeholder="Input phonenumber" value="<?php echo $suprpno?>" required/>
                               </div>
                               <div class="form-group">
                                        <input class="form-control" name="supremail" placeholder="Input Email" value="<?php echo $supremail?>" required/>
                               </div>
                               <div class="form-group">
                                        <input class="form-control" name="suprpass" placeholder="Input password" value="<?php echo $suprpass?>" required/>
                               </div>
                               <div class="form-group">
                                   <input class="from control btn btn-primary" type="submit" value="submit" name="editsupplier"/>
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

    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../assets/js/demo/datatables-demo.js"></script>

</body>

</html>
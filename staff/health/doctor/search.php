<?php
include('../../Admin/db.php');
include("sidebar.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search results</title>

    <!-- Custom fonts for this template -->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                    <h1 class="h3 mb-2 text-gray-800">Search Results</h1>
                    <div class="invinsible">
                    <p class="mb-4 invisible" type="hidden">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                   </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Search Results</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive"  >
                            <table class="table table-bordered" id="appointment">
                                    <th>Specialization</th>
                                    <th>Profesion</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>PhoneNumber</th>
                                    <th>Email</th>
                                
                                 
                                    
                                        <?php
                                        if(isset($_GET['search']))
                                        {
                                            $search=$_GET['search'];
                                        $result=$mysqli->query("SELECT * FROM users
                                        WHERE(firstname LIKE '%".$search."%') OR (lastname LIKE '%".$search."%')") or die($mysqli->error);
                                        while($row=$result->fetch_assoc())
                                        {
                                            echo
                                          
                                            "
                                            <tbody>
                                           <td>".$row['specialization']."</td>
                                           <td>".$row['profession']."</td>
                                           <td>".$row['firstname']."</td>
                                           <td>".$row['lastname']."</td>
                                           <td>".$row['gender']."</td>
                                           <td>".$row['adress']."</td>
                                           <td>".$row['phonenumber']."</td>
                                           <td>".$row['email']."</td>
                                    
                                            </tbody>
                                            ";
                                        }
                                     
                                    }
                                    
                                 
                              
                                        ?>
                                    </tbody>
                                 </table>
                                 <button onclick="fnExcelReport()" class="btn btn-success" >Export to Excel</a></td>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
     
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

function fnExcelReport()

{

   var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";

   var textRange; var j=0;

   tab = document.getElementById('appointment'); // id of table



   for(j = 0 ; j < tab.rows.length ; j++) 

   {     

       tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";

       //tab_text=tab_text+"</tr>";

   }



   tab_text=tab_text+"</table>";

   tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table

   tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table

   tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params



   var ua = window.navigator.userAgent;

   var msie = ua.indexOf("MSIE "); 



   if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer

   {

       txtArea1.document.open("txt/html","replace");

       txtArea1.document.write(tab_text);

       txtArea1.document.close();

       txtArea1.focus(); 

       sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");

   }  

   else                 //other browser not tested on IE 11

       sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  



   return (sa);

}

</script>
    <!-- Bootstrap core JavaScript-->
    <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../.../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../assets/js/demo/datatables-demo.js"></script>

</body>

</html>
<?php
session_start();
if(isset($_SESSION['adminID']))
{
    $admin = $_SESSION['adminID'];
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-Financial</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/styleadmin.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="dashAdmin.php">E-Financial</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout().php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a class="nav-link" href="dashAdmin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="issueBill.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Issue Bill
                            </a>
                            <a class="nav-link" href="adminbill.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Bill Folder
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: Admin</div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Bill Details </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashStudent.php">Dashboard </a> / <a href="adminbill.php"> Bill Folder</a></li>
                            <li class="breadcrumb-item active">Bill Details</li>
                        </ol>
                        <div>
                        <?php
                            include("dbconn.php");
                                
                            $billno = $_POST['billNo'];
                            
                            $sql = "SELECT * FROM bill WHERE billNo=$billno" ;
                            
                            $qry = mysqli_query($dbconn,$sql);
                            $rows = mysqli_num_rows($qry);
                                
                            if($rows != 0)
                            {
                                $bill = mysqli_fetch_assoc($qry);
                                echo "<table border = '1' style=width:40%";
                                echo "<tr>";
                                    echo "<th> Bill Number </th>";
                                    echo "<td>" .$bill['billNo']. "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<th> Bill Name </th>";
                                    echo "<td>" .$bill['billName']. "</td>";
                                echo "</tr>";
                                echo "</tr>";
                                    echo "<th> Bill Date </th>";
                                    echo "<td>" .$bill['billDate']. "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<th> Amount (RM) </th>";
                                    echo "<td>" .$bill['amount']. "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<th> Deadline </th>";
                                    echo "<td>" .$bill['deadline']. "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<th> Admin ID </th>";
                                    echo "<td> " .$bill['adminID']. "</td>";
                                echo "</tr>";
                            }
                            else
                            {
                                echo "none";
                            }
                            ?>
                        </div>
                        
                        <?php
                            include("dbconn.php");
                
                            $sbillno = $_POST['billNo'];
                            
                            $sql1 = "SELECT B.billNo, B.studentBillNo, B.studentID, S.studentName, P.statusName, B.statusID FROM studentbill B, student S, status P WHERE B.studentID = S.studentID AND B.statusID = P.statusID AND billNo = $sbillno";
                            $no = 1;
                            $qry1 = mysqli_query($dbconn,$sql1);
                                
                            if(mysqli_num_rows($qry1) > 0)
                            {
                                echo "<h2>List of Student</h2>";
                                echo "<table border = '1' width='200'";
                                echo "<tr>";
                                    echo "<th> No. </th>";
                                    echo "<th> Student Bill Number </th>";
                                    echo "<th> Student ID </th>";
                                    echo "<th> Student Name </th>";
                                    echo "<th> Status </th>";
                                    echo "<th> Receipt </th>";
                                    echo "<th> Action </th>";
                                echo "</tr>";
                                while($sbill = mysqli_fetch_assoc($qry1)) {
                                    echo "<tr>";
                                        echo "<td>" .$no. "</td>";
                                        echo "<td>" .$sbill['studentBillNo']. "</td>";
                                        echo "<td>" .$sbill['studentID']. "</td>";
                                        echo "<td>" .$sbill['studentName']. "</td>";
                                        echo "<td>" .$sbill['statusName']. "</td>";
                                        
                                        if ($sbill['statusID']==1){
                                            echo "<td>No receipt attached</td>";
                                        }
                                        elseif ($sbill['statusID'] >1){ 
                                            echo "<td>Receipt.pdf</td>";
                                        }
                                        if ($sbill['statusID']==1){
                                            echo "<td>No action</td>";
                                        }
                                        elseif ($sbill['statusID']==2){ ?>
                                            <form action="validatepayment().php" method="post" enctype="multipart/form-data"><?php
                                                echo " <td><input type=hidden name=sbillno value='".$sbill['studentBillNo']."'> ";
                                                echo "<button type=submit name=validate>Verify</button></td>";?>
                                            </form><?php
                                        }
                                        else {
                                            echo "<td>Verified</td>";
                                        }  
                                    echo "</tr>";
                                    $no++;
                                }
                            }
                            else
                            {
                                echo "none";
                            }?>
                    </div>
                </main>
                <!--<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>-->
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
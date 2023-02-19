<?php
session_start();
if(isset($_SESSION['studentID']))
{
    $studentID = $_SESSION['studentID'];
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-Financal</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">E-Financial</a>
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
                            
                            <a class="nav-link" href="dashStudent.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="settlebill.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Settle Bill
                            </a>
                            <a class="nav-link" href="studentbill.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Student Bill
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Student Bill</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashStudent.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student Bill</li>
                        </ol>
                        <!----- All bill for a student ----->
                            <?php
                            include("dbconn.php");
                            
                            $sql = "SELECT A.studentBillNo, D.billDate, D.billName, D.amount, D.deadline, A.statusID, C.statusName, A.receipt FROM studentbill A, student B, status C, bill D WHERE A.studentID = B.studentID AND A.statusID = C.statusID AND A.billNo = D.billNo AND A.studentID = '$studentID' ORDER BY studentBillNo DESC";
                            $qry = mysqli_query($dbconn,$sql);
                            
                                
                            if(mysqli_num_rows($qry) != 0)
                            {
                                echo "<div class=studentlist>";
                                echo "<table border = '1' class='studentlist'";
                                echo "<tr>";
                                    echo "<th> Student Bill Number </th>";
                                    echo "<th> Bill Date </th>";
                                    echo "<th> Bill Name </th>";
                                    echo "<th> Amount (RM) </th>";
                                    echo "<th> Deadline </th>";
                                    echo "<th> Status </th>";
                                    echo "<th> Receipt </th>";
                                echo "</tr>";
                                while($sbill = mysqli_fetch_assoc($qry)) {
                                    echo "<tr>";
                                        echo "<td>" .$sbill['studentBillNo']. "</td>";
                                        echo "<td>" .$sbill['billDate']. "</td>";
                                        echo "<td>" .$sbill['billName']. "</td>";
                                        echo "<td>" .$sbill['amount']. "</td>";
                                        echo "<td>" .$sbill['deadline']. "</td>";
                                        echo "<td>" .$sbill['statusName']. "</td>";
                                        if ($sbill['statusID'] > 1){
                                            echo "<td>Receipt .pdf</td>";
                                        }
                                        else {?>
                                        <!-- upload receipt --> 
                                            <form action="attachfile().php" method="post" enctype="multipart/form-data"><?php
                                                echo "<td><input type=file name=file>";
                                                     echo "<input type=hidden name=sbillno value=".$sbill['studentBillNo'].">";
                                                echo "<button type=submit name=submit>Attach</button></td>";?>
                                            </form><?php
                                            
                                        }
                                    echo "</tr>";
                                }
                                echo "</div>";
                            }
                            else
                            {
                                echo "No bill issued by admin for now.";
                            }
                            ?>
                        
                        <!----- All bill for a student ----->
                    </div>
                </main>
            </div>
        </div>
        <!--    
        <footer class="py-4 bg-light mt-auto">
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
       
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

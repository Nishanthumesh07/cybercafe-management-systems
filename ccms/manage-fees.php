<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid'] == 0)) {
    header('location:logout.php');
} else {
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>Fee Details</title>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark" style="
background-image: url('images/222.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;">
    <?php include_once('includes/sidebar.php');?>
    <div id="right-panel" class="right-panel">
        <?php include_once('includes/header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Accounts Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                           
                            <li class="active">Accounts</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

       <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-body">
                        <h1 align='center' background-color='red' class="card-title text-center"> Fee Records </h1>
                        <div class="table-responsive">
                            <table align='center' class="table table-bordered">
                                <thead>
                                    <tr>
									<th>SL NO</th>
                                        <th>User Name</th>
                                        <th>Usage Time (in hours) </th>
                                        <th>Bill Amount</th>
                                        <th>Extra Amount</th>
                                        <th>Total Amount</th>
                                        
                                    </tr>
                                </thead>
								<?php
                                        $ret=mysqli_query($con,"SELECT * FROM tblfee");
                                        $cnt=1;
                                        while ($row=mysqli_fetch_array($ret)) {
                                    ?>
                                <tr>
                                        <td><?php echo $cnt;?></td>
                                        <td><?php echo $row['username'];?></td>
                                        <td><?php echo $row['usage_time'];?></td>
					<td><?php echo $row['bill_amount'];?></td>
                                        <td><?php echo $row['extra_amount'];?></td>
                                        <td><?php echo $row['total_amount'];?></td>
                                        
                                    </tr>
                                    <?php 
                                        $cnt=$cnt+1;
                                    }?>
                                </table>
                            
                       <div class="text-center mb-3" style="position: fixed; bottom: 50px; left: 0; right: 0; width: 100%;">
    <div class="d-flex justify-content-center">
        <div class="mr-2">
            <a href="dashboard.php" class="btn btn-primary">Back</a>
        </div>
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="insertDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Insert Record
            </button>
            <div class="dropdown-menu" aria-labelledby="insertDropdown">
                <a class="dropdown-item" href="edit-fee-detail.php">Insert New User</a>
                <a class="dropdown-item" href="editmemberuser fee detail.php">Insert Membership user</a>
            </div>
        </div>
    </div>
</div>

                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>

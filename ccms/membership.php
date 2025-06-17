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
    <title>Manage Memberships</title>
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
                        <h1>View Memberships</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="membership.php">Manage Memberships</a></li>
                            <li class="active">Manage Memberships</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Manage Memberships</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Membership ID</th>
                                            <th>User Name</th>
                                            <th>Plan</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action</th> <!-- New column for delete button -->
                                        </tr>
                                    </thead>
                                    <?php
                                        $ret = mysqli_query($con, "SELECT * FROM tblmembership");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $cnt;?></td>
                                        <td><?php echo $row['M_id'];?></td>
                                        <td><?php echo $row['username'];?></td>
                                        <td><?php echo $row['Plan_name'];?></td>
                                        <td><?php echo $row['Start_date'];?></td>
                                        <td><?php echo $row['End_date'];?></td>
                                        <td>
                                            <a href="delete_member.php?mid=<?php echo $row['M_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                        </td>
                                    </tr>
                                    <?php 
                                        $cnt = $cnt + 1;
                                    }?>
                                </table>
                            </div>
                            <div class="text-center mb-3" style="position: fixed; bottom: 50px; left: 50px; width: 100%;">
                                <a href="dashboard.php" class="btn btn-primary"><i>Back</i></a>
                                <a href="edit_member.php" class="btn btn-success"><i>Insert Record</i></a>
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

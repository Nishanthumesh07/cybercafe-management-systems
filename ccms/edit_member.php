<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['ccmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {

        $cmsaid = $_SESSION['ccmsaid'];
		$M_id = $_POST['M_id'];
        $username = $_POST['username'];
        $Plan_name = $_POST['Plan_name'];
        $Start_date = $_POST['Start_date'];
        $End_date = $_POST['End_date'];
       

        $query = mysqli_query($con, "INSERT INTO `tblmembership`(`M_id`,`username`, `Plan_name`, `Start_date`, `End_date`) VALUES ('$M_id','$username','$Plan_name','$Start_date','$End_date')");

        if ($query) {
            echo '<script>alert("Fee Detail has been added.")</script>';
            echo "<script>window.location.href ='edit_member.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>CCMS Add Fee Detail</title>

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
    <!-- Left Panel -->
    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Membership </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="membership.php">Membership Details</a></li>
                            <li class="active">Member</li>
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
                            <div class="card-header"><strong>Membership</strong><small> Details</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center">
                                    <?php if ($msg) {
                                        echo $msg;
                                    } ?>
                                </p>
                                <div class="card-body card-block">
                                    <div class="form-group"><label for="company" class=" form-control-label">Membership ID</label>
                                        <input type="text" name="M_id" value="" class="form-control" id="M_id" required="true">
                                    </div>
    <div class="form-group"><label for="username" class="form-control-label">User Name</label>
    <input type="text" name="username" id="username" class="form-control" required="true">
</div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group"><label for="city" class=" form-control-label">Plan</label>
                                                <input type="text" name="Plan_name" id="Plan_name" value="" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group"><label for="city" class=" form-control-label">Start Date</label>
                                                <input type="text" name="Start_date" id="Start_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" required="true">


                                            </div>
                                        </div>
										<div class="col-12">
    <div class="form-group"><label for="city" class="form-control-label">Number of Days</label>
        <input type="text" name="number_of_days" id="number_of_days" class="form-control" required="true" oninput="updateEndDate()">
    </div>
</div>

<div class="col-12">
    <div class="form-group"><label for="city" class=" form-control-label">End Date</label>
        <input type="text" name="End_date" id="End_date" value="" class="form-control" required="true" readonly>
    </div>
</div>
										
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                            <i class="fa fa-dot-circle-o"></i> Add
                                        </button></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

	
<script>
    function updateEndDate() {
        var startDateString = document.getElementById('Start_date').value;
        var numberOfDays = parseFloat(document.getElementById('number_of_days').value) || 0;

        if (startDateString && !isNaN(numberOfDays)) {
            var startDate = new Date(startDateString);
            startDate.setDate(startDate.getDate() + numberOfDays);

            var endYear = startDate.getFullYear();
            var endMonth = (startDate.getMonth() + 1).toString().padStart(2, '0');
            var endDay = startDate.getDate().toString().padStart(2, '0');

            var endDateString = endYear + '-' + endMonth + '-' + endDay;

            document.getElementById('End_date').value = endDateString;
        }
    }
</script>
</body>

</html>
<?php } ?>

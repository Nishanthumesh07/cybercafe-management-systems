<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['ccmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {

        $cmsaid = $_SESSION['ccmsaid'];
        $username = $_POST['username'];
        $usage_time = $_POST['usage_time'];
        $bill_amount = $_POST['bill_amount'];
        $extra_amount = $_POST['extra_amount'];
        $total_amount = $bill_amount + $extra_amount;

        $query = mysqli_query($con, "INSERT INTO `tblfee`(`username`, `usage_time`, `bill_amount`, `extra_amount`, `total_amount`) VALUES ('$username','$usage_time','$bill_amount','$extra_amount','$total_amount')");

        if ($query) {
            echo '<script>alert("Fee Detail has been added.")</script>';
            echo "<script>window.location.href ='edit-fee-detail.php'</script>";
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
                        <h1>Fees Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-fees.php">Fees Details</a></li>
                            <li class="active">Add</li>
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
                            <div class="card-header"><strong>Fees</strong><small> Details</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center">
                                    <?php if ($msg) {
                                        echo $msg;
                                    } ?>
                                </p>
                                <div class="card-body card-block">
                                    <div class="form-group"><label for="company" class=" form-control-label">UserName</label>
                                        <input type="text" name="username" value="" class="form-control" id="username" required="true">
                                    </div>
    <div class="form-group">
    <label for="usage_time" class="form-control-label">Usage Time (in hours)</label>
    <input type="text" name="usage_time" id="usage_time" class="form-control" required="true">
</div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group"><label for="city" class=" form-control-label">bill_amount</label>
                                                <input type="text" name="bill_amount" id="bill_amount" value="" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group"><label for="city" class=" form-control-label">extra_amount</label>
                                                <input type="text" name="extra_amount" id="extra_amount" value="" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group"><label for="city" class=" form-control-label">total_amount</label>
                                                <input type="text" name="total_amount" id="total_amount" value="" class="form-control" required="true" readonly>
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
       document.getElementById('usage_time').addEventListener('input', updateBillAmount);

function updateBillAmount() {
    var usageTime = parseFloat(document.getElementById('usage_time').value) || 0;
    var ratePerHour = 35; // Change this value as needed

    var billAmount = usageTime * ratePerHour;

    document.getElementById('bill_amount').value = billAmount.toFixed(2);
    updateTotalAmount(); // After updating the bill amount, also update the total amount
}

document.getElementById('bill_amount').addEventListener('input', updateTotalAmount);
document.getElementById('extra_amount').addEventListener('input', updateTotalAmount);

function updateTotalAmount() {
    var billAmount = parseFloat(document.getElementById('bill_amount').value) || 0;
    var extraAmount = parseFloat(document.getElementById('extra_amount').value) || 0;

    var totalAmount = billAmount + extraAmount;

    document.getElementById('total_amount').value = totalAmount.toFixed(2);
}



    </script>
</body>

</html>
<?php } ?>


<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>CCMS Admin Dashboard</title>
   

    <link rel="apple-touch-icon" href="apple-icon.png">
   

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


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
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="background=transparent;"><B>ISE LAB</B></h1>
						
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">PESITM</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            


<div class="col-sm-6 col-lg-6">
    <a href="view-allusers.php" style="text-decoration: none; color: inherit;">
        <div class="card text-white" style="
background-image: url('images/1.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;">
            <div class="card-body pb-0">
                
                <?php
                $query = mysqli_query($con, "Select * from  tblusers");
                $usercounts = mysqli_num_rows($query);
                ?>
                <h4 class="mb-0">
                    <span class="count"><?php echo $usercounts; ?></span>
                </h4>
                <p class="text-light">Total Number of Users</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
    </a>
</div>

<!-- ... (remaining code) ... -->

<!-- ... (remaining code) ... -->


            <!--/.col-->

           <div class="col-sm-6 col-lg-6">
    <a href="manage-computer.php" style="text-decoration: none; color: inherit;">
        <div class="card text-white" style="
background-image: url('images/v.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;">
            <div class="card-body pb-0">
                
                
                <?php $query1=mysqli_query($con,"Select * from  tblcomputers");
                $totalcomp=mysqli_num_rows($query1);
                
                ?>
                <h4 class="mb-0">
                    <span class="count"><?php echo $totalcomp; ?></span>
                </h4>
                <p class="text-light">Total Computers</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
    </a>
</div>
  
<!-- ... (existing code) ... -->
<div class="content mt-3">
            <div class="col-sm-6 col-lg-6">
                <a href="manage-fees.php" style="text-decoration: none; color: inherit;">
                    <div class="card text-white" style="
background-image: url('images/qq.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;">
                        <div class="card-body pb-0">
                            <?php
                            $feeQuery = mysqli_query($con, "SELECT SUM(total_amount) AS totalFee FROM tblfee");
                            $feeData = mysqli_fetch_assoc($feeQuery);
                            $totalFee = $feeData['totalFee'];
                            ?>
                            <h4 class="mb-0">
                                <span class="count"><?php echo number_format($totalFee,2); ?></span>
                            </h4>
                            <p class="text-light">Total Fees Collected</p>

                            <div class="chart-wrapper px-10"style="height:70px;" height="70">
                                <!-- You can add a chart here if needed -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
			
			
			
 <div class="col-sm-6 col-lg-6">
    <a href="membership.php" style="text-decoration: none; color: inherit;">
        <div class="card text-white" style="
background-image: url('images/t.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;">
            <div class="card-body pb-0">
                
                
                <?php $query1=mysqli_query($con,"Select * from  tblmembership");
                $totalcomp=mysqli_num_rows($query1);
                
                ?>
                <h4 class="mb-0">
                    <span class="count"><?php echo $totalcomp; ?></span>
                </h4>
                <p class="text-light">View Members</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
    </a>
</div>
<!-- ... (remaining code) ... -->

 <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Membership Holders</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                  <th>M.NO</th>
            
                  <th>User Name</th>


<th>Plan name</th>

                           
                  
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$ret=mysqli_query($con,"SELECT `M_id`, `username`, `Plan_name` FROM tblmembership");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                 
            
                  <td><?php  echo $row['M_id'];?></td>
<td><?php  echo $row['username'];?></td>

<td><?php  echo $row['Plan_name'];?></td>		

                </tr>
                <?php 
$cnt=$cnt+1;
}?>



                                </table>
                            </div>
                        </div>
                    </div>

            
           
           

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor:null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>

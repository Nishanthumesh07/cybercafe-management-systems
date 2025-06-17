<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['ccmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    
    <title>CCMS Admin Login</title>
    <style>
        body {
            background-image: url('images/456.jpeg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .sufee-login {
            background-color: rgba(0, 0, 0, 0); /* Fully transparent background */
            border-radius: 0; /* Optional: Add border-radius for a rounded appearance */
            padding: 20px;
            width: 100%;
            text-align: center; /* Center the content horizontally */
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto; /* Center the login form within the container */
        }
		.login-logo {
            background-color: transparent; /* Make the login logo background transparent */
        }
    </style>

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
background-image: url('images/456.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;">

    <div class="sufee-login">
        <div class="login-content">
            <div class="login-logo">
                <h3 style="color: ; text-align: center;"><b>Cyber Cafe Management System</b></h3>
                <hr color="red"/>
            </div>
            <div class="login-form">
                <form action="" method="post" name="login">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg) { echo $msg; } ?> </p>
                    <div class="form-group">
                        <label><i>User Name</i></label>
                        <input type="text" class="form-control" placeholder="User Name" required="true" name="username">
                    </div>
                    <div class="form-group">
                        <label><i>Password</i></label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                    </div>
                    <div class="checkbox">
                        <label class="pull-right">
                            <a href="forgot-password.php">Forgot Password?</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Sign in</button>
                </form>
            </div>
        </div>
    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>

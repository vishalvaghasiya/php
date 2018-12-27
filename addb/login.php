<?php
session_start();
// get response of registration


 if (isset($_SESSION['response'])){
     echo '<h1><li style="color=red;">' . $_SESSION['response'] . '</li></h1>';
     unset($_SESSION['response']);

//     echo $_SESSION['response'];
//     unset($_SESSION['response']);
 }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./assets/helper.css" rel="stylesheet">
    <link href="./assets/style.css" rel="stylesheet">

</head>

<body class="fix-header fix-sidebar">

<div id="alert-box" class="alert alert-success" role="alert" style="display: none;">
    <h6 id="message-box">Login Success</h6>
</div>

<!-- Preloader - style you can find in spinners.css -->
<!--<div class="preloader">-->
<!--    <svg class="circular" viewBox="25 25 50 50">-->
<!--        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>-->
<!--    </svg>-->
<!--</div>-->
<!-- Main wrapper  -->
<div id="main-wrapper">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4>Login</h4>
                            <form method="post" action="./controller/login-controller.php">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password"
                                           required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                    <label class="pull-right">
                                        <a href="./common/model/forget-password-modal.php">Forgotten Password?</a>
                                    </label>

                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="register.php"> Sign Up Here</a></p>
                                    <!-- registration link -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>




</body>
</html>
<?php
session_start();
if (isset($_SESSION['response'])){
    echo $_SESSION['response'];
    unset($_SESSION['response']);
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" >
    <!--    css-->
    <link href="./assets/helper.css" rel="stylesheet">
    <link href="./assets/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]-->
    <!--    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <!--
    <!-- [endif]-->-->

</head>
<body class="fix-header fix-sidebar">
<!-- hidden output show box -->
<div id="alert-box" class="alert alert-success" role="alert" style="display: none;">
    <h6 id="message-box">Not a Register succesfull </h6>
</div>


<!-- Preloader - style you can find in spinners.css -->
<!--<div id="LoginModal" class="modal fade" role="dialog">-->
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
                            <h4>Register</h4>



                            <form action="./controller/register-controller.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="fname"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
                                </div>

                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Conform Password</label>
                                    <input type="password" class="form-control" placeholder="Conform Password"
                                           name="confpassword" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> <a href="#"> Agree the terms and policy
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                <div class="register-link m-t-15 text-center">
                                    <p>Already have account ? </p>
                                    <p><a href="./login.php"> Sign in</a></p>
                                </div>

                                <?php
                                if (isset($_SESSION['response'])) {
                                    echo $_SESSION['response'];
                                    unset($_SESSION['response']);
                                }
                                ?>
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
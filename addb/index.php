<?php
/**
 * Created by PhpStorm.
 * User: 13-U004TU
 * Date: 26-12-2018
 * Time: 12:43 PM
 */

session_start();

if(isset($_SESSION['SESS_ID']) && $_SESSION['SESS_ID'] != ''){

}else{
    header('Location:./login.php');
}
 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>addb</title>
</head>
<body>



<h1>welcome index page </h1>
<div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-default btn-sm m-2" type="button" onclick="logout()">Logout</button>
            <script>
                function logout(){
                    window.location = './controller/logout-controller.php';
                }
            </script>

        </form>


</div>

<script src="assets/js/plugin/jquery-3.3.1.min.js"></script>
<script src="assets/js/plugin/bootstrap.min.js"></script>
<script src="assets/js/function.js"></script>
</body>
</html>

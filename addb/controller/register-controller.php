<?php
/**
 * Created by PhpStorm.
 * User: sunil
 * Date: 22-10-2018
 * Time: 05:25 PM
 */
session_start();
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confpassword'])){
    require_once '../config/db.php';

    $fname = esacpe_string($con ,$_POST['fname']);
    $lname = esacpe_string($con ,$_POST['lname']);
    $email = esacpe_string($con ,$_POST['email']);
    $password = esacpe_string($con ,$_POST['password']);
    $conf_pass = esacpe_string($con ,$_POST['confpassword']);

    if(filter_var($email , FILTER_VALIDATE_EMAIL)){
        if($password == $conf_pass){
            $query = "INSERT INTO _user VALUES(DEFAULT , '".$fname."' , '".$lname."' , '".$email."' , '".md5($password)."' , DEFAULT ,  0)";
            mysqli_query($con , $query);
            if(mysqli_affected_rows($con) > 0){
                $id = mysqli_insert_id($con);
                $_SESSION['response'] = 'Successfully registered, Login to continue.';
//                echo 'Successfully registered, Login to continue.';
            }else{
                $_SESSION['response'] = 'Server not responding Query failed with message '.mysqli_error($con);
//                echo 'Server not responding Query failed with message '.mysqli_error($con);
            }
        }else{
            $_SESSION['response'] = 'Password Does not matched.';
//            echo 'Password Does not matched.';
        }
    }else{
        $_SESSION['response'] = 'Invalid email format given.';
//        echo 'Invalid email format given.';
    }
}else{
    $_SESSION['response'] = 'Insufficient parameters given to controller.';
//    echo'Insufficient parameters given to controller.';
}

header('Location:../login.php');
?>
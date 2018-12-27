<?php
/**
 * Created by PhpStorm.
 * User: sunil
 * Date: 22-10-2018
 * Time: 05:25 PM
 */
session_start();
if(isset($_POST['email']) && isset($_POST['password'])){
    require_once '../config/db.php';

    $email = esacpe_string($con ,$_POST['email']);
    $password = esacpe_string($con ,$_POST['password']);

    if(filter_var($email , FILTER_VALIDATE_EMAIL)){

        $query = "SELECT email , password FROM _user WHERE email ='".$email."'";
        $result = mysqli_query($con , $query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if(md5($password) == $row['password']){
                $_SESSION['SESS_ID'] = session_id();
                header('Location:../index.php');
            }else{
                $_SESSION['response'] = 'Wrong Password given!';
                errorRedirect();
            }
        }else{
            $_SESSION['response'] = 'No user found with email '.$email;
            errorRedirect();
        }
    }else{
        $_SESSION['response'] = 'Invalid email format given.';
        errorRedirect();
    }
}else{
    $_SESSION['response'] = 'Insufficient parameters given to controller.';
    errorRedirect();
}

function errorRedirect(){
    header('Location:../login.php');

}

?>
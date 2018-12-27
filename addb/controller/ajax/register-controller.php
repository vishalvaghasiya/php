<?php
/**
 * Created by PhpStorm.
 * User: sunil
 * Date: 22-10-2018
 * Time: 05:25 PM
 */
session_start();
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['conf_password'])){
    require_once '../../config/db.php';

    $name = esacpe_string($con ,$_POST['name']);
    $email = esacpe_string($con ,$_POST['email']);
    $password = esacpe_string($con ,$_POST['password']);
    $conf_pass = esacpe_string($con ,$_POST['conf_password']);

    if(filter_var($email , FILTER_VALIDATE_EMAIL)){
        if($password == $conf_pass){
            $query = "INSERT INTO _reg VALUES(DEFAULT , '".$name."' , '".$email."' , '".md5($password)."')";
            //$query = 'INSERT INTO _reg VALUES(DEFAULT , \''.$name.'\' , \''.$email.'\' , \''.md5($password).'\'';
            mysqli_query($con , $query);
            if(mysqli_affected_rows($con)){
                $id = mysqli_insert_id($con);
                echo 'Successfully registered, Login to continue.';
            }else{
                echo 'Server not responding Query failed with message '.mysqli_error($con);
            }
        }else{
            echo 'Password Does not matched.';
        }
    }else{
        echo 'Invalid email format given.';
    }
}else{
    echo 'Insufficient parameters given to controller.';
}
?>
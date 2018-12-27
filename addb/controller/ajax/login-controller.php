<?php
/**
 * Created by PhpStorm.
 * User: sunil
 * Date: 22-10-2018
 * Time: 05:25 PM
 */
session_start();
$response = new \stdClass();
if(isset($_POST['email']) && isset($_POST['password'])){

    require_once '../../config/db.php';

    $email = esacpe_string($con ,$_POST['email']);
    $password = esacpe_string($con ,$_POST['password']);

    if(filter_var($email , FILTER_VALIDATE_EMAIL)){

        $query = "SELECT email , password FROM _reg WHERE email ='".$email."'";
        $result = mysqli_query($con , $query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if(md5($password) == $row['password']){
                $_SESSION['SESS_ID'] = session_id();
                $response->status = true;
                $response->res = 'Login Success';
                echo json_encode($response);
            }else{
                $response->status = true;
                $response->res = 'Wrong Password';
                echo json_encode($response);
            }
        }else{
            $response->status = true;
            $response->res = 'No Such User Exist';
            echo json_encode($response);
        }
    }else{
        $response->status = true;
        $response->res = 'Invalid email format';
        echo json_encode($response);
    }
}else{
    $response->status = true;
    $response->res = 'Insufficient parameters given to controller.';
    echo json_encode($response);
}
//echo json_encode($response);
location: ("index.php");
?>
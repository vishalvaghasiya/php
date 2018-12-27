<?php
/**
 * Created by PhpStorm.
 * User: 13-U004TU
 * Date: 29-10-2018
 * Time: 09:18 PM
 */
    $response = new \stdClass();
    if(isset($_POST['email'])){
        require_once '../../config/db.php';
        $email = mysqli_real_escape_string($con , $_POST['email']);
        if(filter_var($email , FILTER_VALIDATE_EMAIL)){
            $query = "SELECT _id FROM _reg WHERE email = '".$email."'";
            $result = mysqli_query($con , $query);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $_id = $row['_id'];
                $code = rand(00000001 , 99999999);

                $query = "INSERT INTO _reset_password VALUES(".$_id." , '".md5($code)."') ON DUPLICATE KEY UPDATE reset_code = VALUES(reset_code)";
                if(mysqli_query($con , $query) && mysqli_affected_rows($con) > 0){

                    $subject = 'Reset your Password for AdiPro';
                    $message = 'You have requested to reset the password of your account '.$email.' to reset the password use code '.$code;
                    if(mail($email , $subject , $message)){
                        $response->status = true;
                        $response->res = 'We have sent an email to '.$email.' use the given code to reset the password';
                    }else{
                        $response->status = false;
                        $response->res = 'We can\'t process your request at the moment please try again!';
                    }
                }else{
                    $response->status = false;
                    $response->res = 'We can not process your request at the moment, please try again!';
                }
            }else{
                $response->status = false;
                $response->res = 'We didn\'t found any user having email '.$email.' if you are new user then you can <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#RegisterModal">Register</button>';
            }
        }else{
            $response->status = false;
            $response->res = 'Invalid email format given!';
        }
    }else{
        $response->status = false;
        $response->res = 'No data specified please provide email!';
    }

    echo json_encode($response);
?>
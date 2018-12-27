<?php
/**
 * Created by PhpStorm.
 * User: 13-U004TU
 * Date: 26-12-2018
 * Time: 12:42 PM
 */

$con = mysqli_connect('localhost' , 'root' , '' , 'addb' , 3306);

function esacpe_string($connection , $var){
    $var = mysqli_real_escape_string($connection , $var);
    return $var;
}
?>


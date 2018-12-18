<?php
    $con = mysqli_connect('localhost' , 'root' , '' , 'sample' , 3306);

    function esacpe_string($connection , $var){
        $var = mysqli_real_escape_string($connection , $var);
        return $var;
    }
?>
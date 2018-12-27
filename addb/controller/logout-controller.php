<?php
/**
 * Created by PhpStorm.
 * User: 13-U004TU
 * Date: 22-10-2018
 * Time: 09:43 PM
 */
session_start();
unset($_SESSION['SESS_ID']);
session_destroy();
session_unset();

header('Location:'.$_SERVER['HTTP_REFERER']);

?>
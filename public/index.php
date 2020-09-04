<?php

/* Original homepage but was redirected to welcome.php. When application is opened, user will be transferred to the login page, rather than index.php */

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>


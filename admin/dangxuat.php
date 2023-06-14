<?php 
session_start();
$_SESSION['admin_logined']=$eid;  
header('location:../index.php'); 
?>
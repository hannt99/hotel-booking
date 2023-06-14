<?php 
session_start();
$_SESSION['logined']=$eid;  
$_SESSION['signup']=$eid;  
header('location:index.php'); 
?>
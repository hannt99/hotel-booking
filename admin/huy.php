<?php 
    include('../connection.php');

    $id=$_GET['id'];

    if(mysqli_query($con,"delete from datphong where madp='$id' "))
    {
        header('location:main.php?option=lsdp');	
    }

?>
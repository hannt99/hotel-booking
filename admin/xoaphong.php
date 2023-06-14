<?php 
    include('../connection.php');

    $id=$_GET['id'];

    if(mysqli_query($con,"delete from phong where sophong='$id' "))
    {
        header('location:main.php?option=phong');	
    }

?>
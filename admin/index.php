<?php 
session_start();
error_reporting(1);
require('../connection.php');
extract($_REQUEST);
if(isset($login))
{

	$sql=mysqli_query($con,"select * from taikhoan where TenTK='$tk' && MatKhau='$mk' ");
    if(mysqli_num_rows($sql))
    {
        $_SESSION['admin_logined']=$tk;	
        header('location:main.php');	
    }
    else
    {
        echo '<script type="text/javascript">
            window.onload = function () { alert("Tên đăng nhập hoặc mật khẩu không đúng"); }</script>';
    }	
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dat Phong Khach san</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <link type="text/css" href="../design/style.css" rel="stylesheet">
</head> 

<body style="margin-top: 70px; background-color: #777777;">
	<?php
        include('menubar.php');
	?>

<div class="container-fluid"style="">

    <div class="container"><br>
        <div class="form">
            <form method="post" class="admin-form" style="border: 30px solid white;">
                <center><h2 style="margin-top: 20px; margin-bottom: 15px;"><b>Admin</b></h2></center><br>
                <input type="text" name="tk" placeholder="Tài khoản" required> <br>
                <input type="password" name="mk" placeholder="Mật khẩu" required> <br>
                <button id="btnRegis" type="submit" name="login" value=""required>Đăng Nhập</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

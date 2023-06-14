<?php
include('connection.php');
session_start();
error_reporting(1);

extract($_REQUEST);
if(isset($save))
{
    $sql= mysqli_query($con,"select * from khachhang where email='$email'");
    if($mk != $xnmk){
        $msg= "<p style='color:red'>Mật khẩu không trùng khớp!</p>";
    }
    if(mysqli_num_rows($sql))
    {
        $msg= "<p style='color:red'>Email này đã đăng ký tài khoản!</p>";    
    }
    else
    {
        $sql= mysqli_query($con,"select * from khachhang where taikhoan='$tk'");
        if(mysqli_num_rows($sql))
        {
            $msg= "<p style='color:red'>Tên tài khoản đã tồn tại!</p>";    
        }
        else{
            $sql="insert into khachhang(email,taikhoan,matkhau,tenkh,sdt) values('$email','$tk','$mk','$ten','$sdt')";
            if(mysqli_query($con,$sql))
            {
                echo '<script type="text/javascript">
                window.onload = function () { alert("Đăng ký tài khoản thành công"); }</script>';
                $_SESSION['signup']=$tk;
                header('location:dangnhap.php'); 
            }
        }
        
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
  <link type="text/css" href="design/style.css" rel="stylesheet">
</head> 

<body style="margin-top:70px;">
    <?php 
    include('menubar.php');
    ?>

<div class="container-fluid"style="">

    <div class="container">
        <div class="form">
            <form method="post" class="register-form">
                <center><h2 style="margin-top: 90px; margin-bottom: 15px;"><b>Đăng ký tài khoản</b></h2></center>
                <center><?php echo @$msg;?></center><br>
                <input type="email" name="email" placeholder="Nhập địa chỉ email" required> </br>
                <input type="text" name="tk" placeholder="Nhập tên tài khoản" required> </br>
                <input type="password" name="mk" placeholder="Nhập mật khẩu (Mật khẩu phải lớn hơn 6 ký tự)" required> </br>
                <input type="password" name="xnmk" placeholder="Xác nhận mật khẩu" required> </br>
                <input type="text" name="ten" placeholder="Nhập tên của bạn" required> </br>
                <input type="text" name="sdt" placeholder="Nhập số điện thoại" required> </br>
                <button id="btnRegis" type="submit" name="save" value=""required>Đăng Ký</button>
            </form>
        </div>

    </div>
</div>

    <div class="footer mt-4" id="lienhe">
        <div class="container text-footer">
            <b style="font-size: 30px;">Hotel</b>
            <p>19 Nguyễn Hữu Thọ, phường Tân Phong, Quận 7, Thành phố Hồ Chí Minh.
                <br>
                Liên hệ: 0357766990  -  Email: hotelbooking@gmail.com
                <br>
                Copyright &copy; 2022 Đặt phòng khách sạn
            </p>
        </div>
    </div>
</body>
</html>

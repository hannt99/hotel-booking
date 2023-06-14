<?php 
session_start();
error_reporting(1);
if($_SESSION['signup']!="")
{
    echo '<script type="text/javascript">
            window.onload = function () { alert("Đăng ký tài khoản thành công"); }</script>';
}
$_SESSION['signup']=$eid; 
error_reporting(1);
require('connection.php');
extract($_REQUEST);
if(isset($login))
{

    $sql=mysqli_query($con,"select * from khachhang where taikhoan='$tk' && matkhau='$mk' ");
    if(mysqli_num_rows($sql))
    {
        $_SESSION['logined']=$tk;  
        header('location:index.php'); 
    }
    else
    {
        echo '<script type="text/javascript">
            window.onload = function () { alert("Tên tài khoản hoặc mật khẩu không đúng"); }</script>';
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
            <form method="post" class="dangnhap-form">
                <center><h2 style="margin-top: 100px; margin-bottom: 15px;"><b>Đăng Nhập</b></h2></center>
                <center><?php echo @$msg;?></center><br>
                <?php 
                if($_SESSION['signup']!=""){ ?>
                    <input type="text" name="tk" placeholder="Nhập tên tài khoản" value="<?php echo $_SESSION['signup'];?>" required> <br>
                    <input type="password" name="mk" placeholder="Nhập mật khẩu" required> <br>
                    <button type="submit" name="login" value=""required>Đăng Nhập</button>

                <?php } else{ ?>
                    <input type="text" name="tk" placeholder="Nhập tên tài khoản" required> <br>
                    <input type="password" name="mk" placeholder="Nhập mật khẩu" required> <br>
                    <button type="submit" name="login" value=""required>Đăng Nhập</button>
                <?php }?>
            </form>
            <br>
            <div class="form-group forget">
                <a href="#">Quên mật khẩu?</a>
                <a href="dangky.php" style="float: right;">Đăng ký</a>
            </div>
        </div>

    </div>
</div>

<br><br><br><br><br>
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
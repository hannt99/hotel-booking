<?php 
include('connection.php');
extract($_REQUEST);
session_start();
error_reporting(1);
$tentk = $_SESSION['logined'];
if($_SESSION['logined']!="")
{
    $sql = mysqli_query($con,"select * from khachhang where taikhoan='$tentk'");
    $khach = mysqli_fetch_assoc($sql);
}
$matkhau = $khach['matkhau'];
if(isset($edit))
{
    $sql = mysqli_query($con,"select * from khachhang where taikhoan='$tentk'");

    if($mk == $matkhau){
        $sql = mysqli_query($con,"update khachhang set tenkh='$tenkh', email='$email', sdt='$sdt'");
        echo '<script type="text/javascript">
            window.onload = function () { alert("Cập nhật thông tin thành công"); }</script>';
    }
    else{
        echo '<script type="text/javascript">
            window.onload = function () { alert("Mật khẩu không đúng"); }</script>';
    }
}

if(isset($yes))
{
    $sql = mysqli_query($con,"select * from khachhang where taikhoan='$tentk'");
    if($mkcu == $matkhau){
        $sql = mysqli_query($con,"update khachhang set matkhau='$mkmoi' where taikhoan='$tentk'");
        echo '<script type="text/javascript">
            window.onload = function () { alert("Đổi mật khẩu thành công"); }</script>';
    }
    else{
        echo '<script type="text/javascript">
            window.onload = function () { alert("Mật khẩu không đúng"); }</script>';
    }
    if($mkmoi!=$xnmk){
        echo '<script type="text/javascript">
            window.onload = function () { alert("Mật khẩu mới không trùng khớp"); }</script>';
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

<body style="margin-top:119px;">

<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
    })
</script>
    <?php 
        include('menubar.php')
    ?>
    <div class="container" >
        <center><form method="post" class="kh-form" style="width: 32%;">
            <table class="table"  style="background-color: white;">
                <tr>
                    <td colspan="2"><center><h4>Tài khoản</h4></center></td>	
                </tr>
                <tr>
                    <td>Tên tài khoản:</td>	
                    <td><?php echo $khach['taikhoan']; ?></td>	
                </tr>
                <tr>
                    <td>Tên khách hàng:</td>	
                    <td><input type="text" name="tenkh" value="<?php echo $khach['tenkh']; ?>" style="width: 100%;" required/></td>	
                </tr>
                <tr>
                    <td>Email:</td>	
                    <td><input type="text" name="email" value="<?php echo $khach['email']; ?>" style="width: 100%;" required/></td>	
                </tr>
                <tr>
                    <td>Số điện thoại:</td>	
                    <td><input type="text" name="sdt" value="<?php echo $khach['sdt']; ?>" style="width: 100%;" required/></td>	
                </tr>
                <tr>
                    <td>Mật khẩu:</td>	
                    <td><input type="password" name="mk"  style="width: 100%;" required/></td>	
                </tr>

            </table><br>

            <input type="submit" class="btn btn-primary" value="Chỉnh sửa thông tin" name="edit"/>&emsp;&emsp;&emsp;
        
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Đổi mật khẩu</button>
        </form></center>

        <form method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Đổi mật khẩu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <center><div class="modal-body">
                            <input type="password" name="mkcu"  placeholder="Mật khẩu cũ" style="width: 60%; margin: 10px;" required/>
                            <input type="password" name="mkmoi"  placeholder="Mật khẩu mới" style="width: 60%; margin: 10px;" required/>
                            <input type="password" name="xnmk"  placeholder="Xác nhận mật khẩu" style="width: 60%; margin: 10px;" required/>
                    </div></center>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="yes">Xác nhận</button>
                    </div>
                    </div>
                </div>
            </div> 
        
        </form>

<!-- Button trigger modal -->



    </div><br><br><br>
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
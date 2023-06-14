<?php 
session_start();
extract($_REQUEST);
include('../connection.php');
$admin=$_SESSION['admin_logined'];	
if($admin=="")
{
	header('location:index.php');
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
  <link type="text/css" href="main.css" rel="stylesheet">
</head> 
  <body>
  <nav class="navbar navbar-expand-sm nav-1">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><img src="../image/logo.jpg"/width="50px"style="margin-top:5px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#banner">Trang chủ&emsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" >Xin chào <?php echo $admin; ?></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="dangxuat.php">Đăng xuất</a>
                    </li>
                </u>
            </div>
        </div>
    </nav>  

    <!-- <div class="container-fluid"> -->
        <div class="row" style="height: 88vh;">
            <div class="col-sm-3 col-md-2 sidebar" style="background-color: #4e4e4e; ">
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a class="nav-link" id="taikhoan" href="main.php?option=admin">Tài khoản admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="qlphong" href="main.php?option=phong">Quản lý phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="qlkh" href="main.php?option=qlkh">Quản lý khách hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="qldp" href="main.php?option=lsdp">Lịch sử đặt phòng</a>
                </li>
            </ul>
            </div>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php 
            @$opt=$_GET['option'];
            if($opt=="")
            {
                include('tkadmin.php');	
                echo '<style> #taikhoan{ background-color: #222222;}</style>';
            }
            else if($opt=="phong")
            {
                include('qlphong.php');	
                echo '<style> #qlphong{ background-color: #222222;}</style>';
            }
            else if($opt=="suaphong")
            {
                include('suaphong.php');	
            }
            
            else if($opt=="lsdp")
            {
                include('lsdatphong_admin.php');
                echo '<style> #qldp{ background-color: #222222;}</style>';
            }
            else if($opt=="qlkh")
            {
                include('qlkhachhang.php');	
                echo '<style> #qlkh{ background-color: #222222;}</style>';
            }
            else if($opt=="admin")
            {
                include('tkadmin.php');
                echo '<style> #taikhoan{ background-color: #222222;}</style>';
            }
            ?>      
        </div>
        
      <!-- </div> -->
    </div>
  </body>
</html>

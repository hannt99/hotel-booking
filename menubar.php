<?php 
session_start();
// $eid=$_SESSION['logined'];
error_reporting(1);
?>
<!--Menu Bar Close Here-->
<nav class="navbar navbar-expand-sm nav-1">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="image/logo.jpg"/width="50px"style="margin-top:5px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#banner">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#xemphong">Xem Phòng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lsdatphong.php">Lịch sử đặt phòng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#lienhe">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/index.php">Admin</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php 
                if($_SESSION['logined']!="")
                {
                    ?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" 
                    data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['logined'];?></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="thongtinkh.php">Thông tin</a></li>
                        <li><a class="dropdown-item" href="lsdatphong.php">Lịch sử đặt phòng</a></li>
                        <li><a class="dropdown-item" href="dangxuat.php">Đăng xuất</a></li>
                    </ul>
                    </li>
                    <?PHP } else
                    {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dangnhap.php">Đăng Nhập &ensp;|</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dangky.php">Đăng Ký</a>
                        </li>
                    <?php 
                    } ?>

                    
                </ul>
            </div>
        </div>
    </nav>  

<!--Menu Bar Close Here-->

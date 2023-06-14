<?php 
session_start();
error_reporting(1);
include('connection.php');
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

<body style="margin-top: 70px;">
    <?php 
        include('menubar.php')
    ?>

    <!-- <img src="image/banner.jfif" alt="" class="image" id="banner" style="height: 605px; width: 100%;"> -->
        
    <div class="container-fluid">   
        <div class="container">
        
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="image/banner1.jpg" class="d-block w-100" alt="...">
                        <div class="overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Khách sạn cao cấp, sang trọng</h1><br><br><br>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="image/banner2.jpg" class="d-block w-100" alt="...">
                        <div class="overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Đầy đủ lợi ích, tiện nghi</h1><br><br><br>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="image/banner3.jpg" class="d-block w-100" alt="...">
                        <div class="overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Phòng ngủ thoáng mát, rộng rãi</h1><br><br><br>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    
    
    
        <div class="container mt-3" id="xemphong">  

            <div class="row">
                <h3>Các loại phòng</h3>
                <?php 
                $sql=mysqli_query($con,"select * from phong");
                while($r_res=mysqli_fetch_assoc($sql))
                {
                ?>
                <div class="col-sm-4 mt-3" id="col">
                    <img class="img1" src="image/<?php echo $r_res['anh']; ?>">
                    <h5 class="phong"><?php echo $r_res['tenphong']; ?></h5>
                    <h5 class="gia">Giá: <?php echo number_format($r_res['gia']); ?> VND</h5>
                    <p class="ttct"><?php echo substr($r_res['chitiet'],0,100); ?></p>
                    <a href="datphong.php?sophong=<?php echo $r_res['sophong']; ?>" class="btn btn-danger text-center">Đặt Ngay</a><br><br>        
                </div>
                <?php } ?>
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
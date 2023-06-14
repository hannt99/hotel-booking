<?php 
include('connection.php');
$id=$_GET['sophong'];
$sql=mysqli_query($con,"select * from phong where sophong='$id'");
$res=mysqli_fetch_assoc($sql);

session_start();
error_reporting(1);
$tentk = $_SESSION['logined'];
if($_SESSION['logined']!="")
{
    $sql = mysqli_query($con,"select * from khachhang where taikhoan='$tentk'");
    $khach = mysqli_fetch_assoc($sql);
}
$num = $res['sophong'];
$tenp = $res['tenphong'];
$gia = $res['gia'];

extract($_REQUEST);
if(isset($xacnhan))
{
    $tong = $gia*(strtotime($checkout) - strtotime($checkin))/86400;
    if(isset($dichvu1)){
        $tong += 100000;
        $dv = $dichvu1;
        if(isset($dichvu2)){
            $tong += 100000;
            $dv = $dv. ", " . $dichvu2;
        }
    }
    else if(isset($dichvu2)){
        $tong += 100000;
        $dv = $dichvu2;
    }

    $sql="insert into datphong(tenkh,email,sdt,sophong,tenphong,dichvu,ngayden,ngaydi,sotien) 
    values('$ten','$email','$sdt','$num','$tenp','$dv','$checkin','$checkout',$tong)";
    if(mysqli_query($con,$sql))
    {
        echo '<script type="text/javascript">
            window.onload = function () { alert("Đặt phòng thành công"); }</script>';
        //header('location:index.php#xemphong'); 
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
        include('menubar.php')
    ?>
    
    <div id="ql" style="margin-top: 90px; margin-left: 20px;">
        <a href="index.php#xemphong" class="btn btn-outline-secondary">⬅ Quay lại</a><br>
    </div>

    <div class="container-fluid mt-3">

        <div class="container mt-3">
            <h5>Nhập thông tin để đặt phòng:</h5><br>
            <form method="post" class="dat-form">
                <div class="ttkh">
                <?php 
                    if($_SESSION['logined']!=""){?>

                    <label for="ten">Tên:</label>
                    <input type="text" name="ten" placeholder="Tên khách hàng" value="<?php echo $khach['tenkh']; ?>" style="display: inline-block; width: 14%;" required>&emsp;&emsp;
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Địa chỉ email" value="<?php echo $khach['email']; ?>" style="display: inline-block; width: 20%;" required>&emsp;&emsp;
                    <label for="sdt">Số điện thoại:</label>
                    <input type="text" name="sdt" placeholder="Số điện thoại" value="<?php echo $khach['sdt']; ?>" style="display: inline-block; width: 14%;" required>
                    
                    <?php } else{?>
                    <label for="ten">Tên:</label>
                    <input type="text" name="ten" placeholder="Tên khách hàng" style="display: inline-block; width: 14%;" required>&emsp;&emsp;
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Địa chỉ email" style="display: inline-block; width: 20%;" required>&emsp;&emsp;
                    <label for="sdt">Số điện thoại:</label>
                    <input type="text" name="sdt" placeholder="Số điện thoại" style="display: inline-block; width: 14%;" required>
                    <?PHP } ?>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="image/<?php echo $res['anh']; ?>"class="img-responsive">
                        
                    </div>
                    <div class="col-sm-6" id="col2">
                        <h3><?php echo $res['tenphong']; ?></h3>
                        
                        <h5>Giá: <?php echo number_format($res['gia']); ?> VND</h5>
                        <h5>Số phòng: <?php echo $res['sophong']; ?></h5>
                        <h5>Số người ở: <?php echo $res['songuoi']; ?></h5>
                        <p class="text-justify"><?php echo $res['chitiet']; ?></p><br>

                        <input type="hidden" id="giaphong" value="<?php echo $res['gia']; ?>">
                        <label for="checkin">Chọn ngày đến:</label>
                        <input type="date" id="checkin" name="checkin" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" required>&nbsp;
                        <label for="checkout">Chọn ngày đi:</label>
                        <input type="date" id="checkout" name="checkout" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                        <br><br>
                        <h4>Chọn thêm các tiện ích:</h4>
                        <input type="checkbox" name="dichvu1" value="Đưa đón">
                        <label for="dichvu1"> Đưa đón tại sân bay    <i>(phí dịch vụ: 100,000 VND)</i></label><br>
                        <input type="checkbox" name="dichvu2" value="Ăn sáng">
                        <label for="dichvu2"> Ăn sáng tại khách sạn  <i>(phí dịch vụ: 100,000 VND)</i></label><br><br>
                        <div id="datphong">
                            <div id="tong">
                                <h3 style="display: inline-block;">Tổng số tiền: </h3>
                                <h3 style="display: inline-block;" name="tien" id="tongtien">0 VND</h3>
                            </div>
                            <div id="datngay">
                            <!-- <button id="btnRegis" type="submit" name="xacnhan" value=""required>Đăng Ký</button> -->
                                <button class="btn btn-primary btn-lg" name="xacnhan" type="submit" value=""required>Xác nhận</button><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<script>
    const checkinInput = document.getElementById('checkin');
    const checkoutInput = document.getElementById('checkout');
    const dichvu1Input = document.getElementsByName('dichvu1')[0];
    const dichvu2Input = document.getElementsByName('dichvu2')[0];
    const totalElement = document.getElementById('tongtien');
    const giaphongInput = document.getElementById('giaphong');


    function calculateTotal() {
        const checkin = new Date(checkinInput.value);
        const checkout = new Date(checkoutInput.value);
        const giaphong = Number(giaphongInput.value);
        let total = 0;
        
        const songay = (Date.parse(checkout) - Date.parse(checkin)) / (1000 * 60 * 60 * 24);

        total = giaphong*songay;

        if (dichvu1Input.checked) {
            total += 100000;
        }
        if (dichvu2Input.checked) {
            total += 100000;
        }
        
        totalElement.innerHTML = total.toLocaleString() + ' VND';
    }

    checkinInput.addEventListener('change', calculateTotal);
    checkoutInput.addEventListener('change', calculateTotal);
    dichvu1Input.addEventListener('change', calculateTotal);
    dichvu2Input.addEventListener('change', calculateTotal);

    calculateTotal();
</script>


    

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

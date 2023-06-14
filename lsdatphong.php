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

<body style="margin-top:120px;">
    <?php 
        include('menubar.php')
    ?>
    <div class="container-fluid">
        <div class="container mt-3">
            <h6 style="color: #294e94"> Nhập email và số điện thoại để xem lịch sử đặt phòng: </h6>
            <center><form method="post" class="themtk">
                <div class="nhaptk" style="margin-bottom: 30px; margin-top: 30px; border: 1px solid #294e94; height: 80px; padding-top: 20px;">
                <?php
                    if($_SESSION['logined']!=""){?>
                    <label for="ten">Email:</label>
                    <input type="text" name="email" placeholder="Email" value="<?php echo $khach['email']; ?>" style="display: inline-block; width: 20%;" required>&emsp;&emsp;
                    <label for="email">Số điện thoại:</label>
                    <input type="text" name="sdt" placeholder="Số điện thoại" value="<?php echo $khach['sdt']; ?>" style="display: inline-block; width: 20%;" required>&emsp;&emsp;
                    <input type="submit" class="btn btn-info" value="Xem lịch sử đặt phòng" name="view"/>

                    <?php } else{?>
                    <label for="ten">Email:</label>
                    <input type="text" name="email" placeholder="Email" style="display: inline-block; width: 20%;" required>&emsp;&emsp;
                    <label for="email">Số điện thoại:</label>
                    <input type="text" name="sdt" placeholder="Số điện thoại" style="display: inline-block; width: 20%;" required>&emsp;&emsp;
                    <input type="submit" class="btn btn-info" value="Xem lịch sử đặt phòng" name="view"/>
                    <?php } ?>
                </div>
            </form></center>

            <table class="table table-bordered">
                <tr>	
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Số phòng</th>
                    <th>Tên phòng</th>
                    <th>Dịch vụ</th>
                    <th>Ngày đến</th>
                    <th>Ngày đi</th>
                    <th>Số tiền</th>
                </tr>

                <?php 
                if(isset($view))
                {
                    $sql=mysqli_query($con,"select * from datphong where email='$email' and sdt='$sdt'");

                    if(mysqli_num_rows($sql))
                    {
                        $i=1;
                        while($dp=mysqli_fetch_assoc($sql))
                        {
                        ?>
                        <tr>
                            <td><?php echo $i;$i++; ?></td>
                            <td><?php echo $dp['tenkh']; ?></td>
                            <td><?php echo $dp['email']; ?></td>
                            <td><?php echo $dp['sdt']; ?></td>
                            <td><?php echo $dp['sophong']; ?></td>
                            <td><?php echo $dp['tenphong']; ?></td>
                            <td><?php echo $dp['dichvu']; ?></td>
                            <td><?php echo $dp['ngayden']; ?></td>
                            <td><?php echo $dp['ngaydi']; ?></td>
                            <td><?php echo number_format($dp['sotien']); ?></td>
                            </td>
                            </tr>
                        <?php 	
                        }
                    }
                    else
                    {	
                        echo '<script type="text/javascript">
                            window.onload = function () { alert("Không có lịch sử đặt phòng."); }</script>';
                    }
                }
                ?>
            </table> 
        </div>
    </div>
</body>
</html>
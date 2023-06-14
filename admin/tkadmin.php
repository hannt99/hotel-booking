<?php 
if(isset($add))
{
	$sql=mysqli_query($con,"select * from taikhoan where TenTK='$tentk'");
	if($mk==""){
        echo '<center>Hãy nhập mật khẩu</center>';
    }
    else if(mysqli_num_rows($sql))
	{
        echo '<script type="text/javascript">
            window.onload = function () { alert("Tên tài khoản đã tồn tại"); }</script>';
	}
	else
	{	
        mysqli_query($con,"insert into taikhoan values('$tentk','$mk','Admin')");
        echo '<script type="text/javascript">
            window.onload = function () { alert("Thêm tài khoản thành công"); }</script>';
	}
    
}
if(isset($xoa))
{
	$sql=mysqli_query($con,"select * from taikhoan where TenTK='$tentk'");
	if(mysqli_num_rows($sql))
	{
        mysqli_query($con,"delete from taikhoan where TenTK ='$tentk'");
	    echo '<script type="text/javascript">
            window.onload = function () { alert("Xóa tài khoản thành công"); }</script>';
	}		
	else
	{	
        echo '<script type="text/javascript">
            window.onload = function () { alert("Tên tài khoản không tồn tại"); }</script>';
	}
    
}
?>

<form method="post" class="themtk">
    <div class="nhaptk" style="margin: 30px;">
        <label for="ten">Tên tài khoản:</label>
        <input type="text" name="tentk" placeholder="Tên tài khoản" style="display: inline-block; width: 14%;" required>&emsp;&emsp;
        <label for="email">Mật khẩu:</label>
        <input type="text" name="mk" placeholder="Mật khẩu" style="display: inline-block; width: 20%;">&emsp;&emsp;
        <input type="submit" class="btn btn-info" value="Thêm tài khoản" name="add"/>&emsp;&emsp;
        <input type="submit" class="btn btn-info" value="Xóa tài khoản" name="xoa"/>

    </div>
</form>

    <table class="table table-bordered">
        <tr>	
            <th>STT</th>
            <th>Tên tài khoản</th>
            <th>Mật khẩu</th>
            <th>Loại tài khoản</th>
        </tr>

        <?php 
        $i=1;
        $sql=mysqli_query($con,"select * from taikhoan");
        while($admin=mysqli_fetch_assoc($sql))
        {
        ?>
        <tr>
            <td><?php echo $i;$i++; ?></td>
            <td><?php echo $admin['TenTK']; ?></td>
            <td><?php echo $admin['MatKhau']; ?></td>
            <td><?php echo $admin['LoaiTK']; ?></td>
        </tr>
        <?php 	
        }
        ?>
    </table> 

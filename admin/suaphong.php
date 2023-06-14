<?php 
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from phong where sophong='$id'");
$res=mysqli_fetch_assoc($sql);

extract($_REQUEST);
if(isset($sua))
{
    mysqli_query($con,"update phong set tenphong='$tp',gia='$gia',songuoi='$sn', chitiet='$ct' where sophong='$id' ");
    header('location:main.php?option=phong');
}
?>

<form method="post" style="margin-left: 30px;">
<!-- </form>enctype="multipart/form-data"> -->
    <h3>Sửa thông tin phòng:</h3>
    <table class="table table-bordered" style="margin: 20px;">
        
        <tr>	
            <th>Ảnh:</th>
            <td><img src="../image/<?php echo $res['anh'];?>" width="250" height="150"/></td>
        </tr>
        <tr>	
            <th>Số phòng:</th>
            <td><input type="disabled" value="<?php echo $res['sophong']; ?>"/></td>
        </tr>
        
        <tr>	
            <th>Tên phòng:</th>
            <td><input type="text" name="tp" value="<?php echo $res['tenphong']; ?>" required/></td>
        </tr>
        
        <tr>	
            <th>Giá:</th>
            <td><input type="text" name="gia"  value="<?php echo $res['gia']; ?>"required/></td>
        </tr>
        <tr>	
            <th>Số người ở:</th>
            <td><input type="number" name="sn" value="<?php echo $res['songuoi']; ?>"required/></td>
        </tr>
        
        <tr>	
            <th>Chi tiết:</th>
            <td><textarea rows="5" cols="70" value="" name="ct" required><?php echo $res['chitiet']; ?></textarea></td>
        </tr>
    </table> 
    <input type="submit" class="btn btn-primary" value="xác nhận" name="sua" style="margin-left: 200px;"/>
</form>
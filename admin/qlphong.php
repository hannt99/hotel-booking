<?php 
if(isset($them))
{
	$sql=mysqli_query($con,"select * from phong where sophong='$num'");
	if(mysqli_num_rows($sql))
	{
        echo '<script type="text/javascript">
            window.onload = function () { alert("Số phòng đã tồn tại"); }</script>';
	}
	else
	{	
        mysqli_query($con,"insert into phong values('$num','$tenphong','$gia','$sn','$mota','$anh')");
        echo '<script type="text/javascript">
            window.onload = function () { alert("Thêm phòng thành công"); }</script>';
	}
}

?>
<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
    })


	function xoa(id)
	{
		if(confirm("Bạn có chắc chắn muốn xóa phòng này?"))
		{
            window.location.href='xoaphong.php?id='+id;	
		}
	}

</script>
    <table class="table table-bordered">
        <tr>	
            <th>STT</th>
            <th>Ảnh</th>
            <th width="90">Số phòng</th>
            <th width="100">Tên Phòng</th>
            <th>Giá</th>
            <th width="110">Số người ở</th>
            <th>Chi tiết</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>

        <?php 
        $i=1;
        $sql=mysqli_query($con,"select * from phong");
        while($admin=mysqli_fetch_assoc($sql))
        {
            ?>
            <tr>
                <td><?php echo $i;$i++; ?></td>
                <td><img src="../image/<?php echo $admin['anh']; ?>" width="150" height="100"/></td>
                <td><?php echo $admin['sophong']; ?></td>
                <td><?php echo $admin['tenphong']; ?></td>
                <td><?php echo number_format($admin['gia']); ?></td>
                <td><?php echo $admin['songuoi']; ?></td>
                <td><?php echo $admin['chitiet']; ?></td>
                <td><a href="main.php?option=suaphong&id=<?php echo $admin['sophong']; ?>">📝</a></td>
                <td><a href="#" onclick="xoa('<?php echo $admin['sophong']; ?>')">❌</a></td>
            </tr>
        <?php 	
        }
        ?>
    </table> 

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm phòng</button>

    <form method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm phòng</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <center><div class="modal-body">
                        <table style="width: 80%;">
                            <tr>
                                <td>Số phòng:</td>
                                <td><input type="number" name="num"  placeholder="Số phòng" style= "width: 100%; margin: 10px;" required/></td>
                            </tr>
                            <tr>
                                <td style= "width: 25%;">Tên phòng:</td>
                                <td><input type="text" name="tenphong"  placeholder="Tên phòng" style= "width: 100%; margin: 10px;" required/></td>
                            </tr>
                            <tr>
                                <td>Giá:</td>
                                <td><input type="number" name="gia"  placeholder="Giá" style= "width: 100%; margin: 10px;" required/></td>
                            </tr>
                            <tr>
                                <td>Số người ở:</td>
                                <td><input type="number" name="sn"  placeholder="Số người ở" style= "width: 100%; margin: 10px;" required/></td>
                            </tr>
                            <tr>
                                <td>Chọn ảnh:</td>
                                <td><select name="anh" style= "width: 100%; margin: 10px;">
                                        <option value="phongtieuchuan.jpg">Ảnh phòng tiêu chuẩn</option>
                                        <option value="phongcaocap.jpg">Ảnh phòng cao cấp</option>
                                        <option value="phongview.jpg">Ảnh phòng view</option>
                                        <option value="phongsuite.jpg">Ảnh phòng suite</option>
                                        <option value="phongVIP.jpg">Ảnh phòng VIP</option>
                                        <option value="phong2giuong.jpg">Ảnh phòng 2 giường</option>
                                    </select></td>
                            </tr>
                        </table>
                            <textarea name="mota" rows="7" cols="50" placeholder="Mô tả chi tiết phòng" required></textarea><br>
                            
                    </div></center>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="them">Xác nhận</button>
                    </div>
                    </div>
                </div>
            </div> 
        </form>
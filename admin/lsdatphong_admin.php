<script>
	function huy(id)
	{
		if(confirm("Bạn có chắc chắn muốn hủy đơn này?"))
		{
            window.location.href='huy.php?id='+id;	
		}
	}
</script>

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
            <th>Hủy</th>
        </tr>

        <?php 
        $sql=mysqli_query($con,"select * from datphong");
        if(mysqli_num_rows($sql))
        {
            $i=1;
            $tong=0;
            while($dp=mysqli_fetch_assoc($sql))
            {
                $tong += $dp['sotien'];
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
                <td><a href="#" onclick="huy('<?php echo $dp['madp']; ?>')">❌</a></td>
            </tr>
            <?php 	
            }
        }
        ?>
        <br><center><h4 style="color: red;"> Thống kê thu nhập: <?php echo number_format($tong); ?> VND</h4><br>
    </table> 

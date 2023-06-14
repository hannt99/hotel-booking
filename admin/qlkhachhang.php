
<table class="table table-bordered">
        <tr>	
            <th>STT</th>
            <th>Email</th>
            <th>Tên tài khoản</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
        </tr>

        <?php 
        $sql=mysqli_query($con,"select * from khachhang");
        if(mysqli_num_rows($sql))
        {
            $i=1;
            while($dp=mysqli_fetch_assoc($sql))
            {
            ?>
            <tr>
                <td><?php echo $i;$i++; ?></td>
                <td><?php echo $dp['email']; ?></td>
                <td><?php echo $dp['taikhoan']; ?></td>
                <td><?php echo $dp['tenkh']; ?></td>
                <td><?php echo $dp['sdt']; ?></td>
            </tr>
            <?php 	
            }
        }
        ?>
    </table> 

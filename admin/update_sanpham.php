<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="./css/sidebar.css">
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/content.css">  
    <?php
            include 'connect.php';
            $id=$_GET['ma_sp'];
            $sql= "SELECT san_pham.ma_sp, san_pham.ten_sp, san_pham.gia, san_pham.mo_ta,
            san_pham.hinh_anh, loai_sp.ten_loai, nhan_hieu.ten_nhan_hieu, san_pham.trang_thai
            FROM (san_pham INNER JOIN loai_sp ON san_pham.ma_lsp = loai_sp.ma_lsp)
            INNER JOIN nhan_hieu ON san_pham.ma_nh = nhan_hieu.ma_nh WHERE ma_sp = $id";
            $recordset= mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($recordset);
    ?>
    <?php
        if (isset($_POST['button'])) {
           
        
        $id=$_POST['txtid'];
        $ten=$_POST['txtten'];
        $gia=$_POST['txtgia'];
        $mo_ta=$_POST['txtmota'];
        
        $trang_thai =$_POST['trangthai'];
        $loai=$_POST['txtloaisp'];
        $thuonghieu=$_POST['txtthuonghieu'];

        $filename=$_FILES['hinhanh']['name'];
        
            if ($filename != null) {
                $path ='../public/images/';
                $filename=$_FILES['hinhanh']['name'];
                $tempname = $_FILES['hinhanh']['tmp_name'];
                move_uploaded_file($tempname,$path.$filename);
                $sql1= "UPDATE san_pham set  
                hinh_anh='$filename' where ma_sp=$id";
                 mysqli_query($con,$sql1);
                 header('Location:qly_sanpham.php');
                 
            }  
                $sql1= "UPDATE san_pham set  
                ten_sp='$ten',gia='$gia',mo_ta='$mo_ta',trang_thai='$trang_thai',ma_lsp='$loai',ma_nh='$thuonghieu'
                where ma_sp=$id";
            
                mysqli_query($con,$sql1);
                header('Location:qly_sanpham.php');           
        
    }
    ?>
    <form action="update_sanpham.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
            <table class="update">
            <h2>Update</h2>
                <tr>
                    
                <td><input type="hidden" name="txtid" value="<?php echo $row['ma_sp'] ?>"></td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td><input type="text" name="txtten" value="<?php echo $row['ten_sp'] ?>"></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><input type="number" name="txtgia" min="0" step="100" value="<?php echo $row['gia'] ?>"></td>
            
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td colspan="5"><textarea style="width: 50%" name="txtmota" ><?php echo $row['mo_ta'] ?></textarea></td>				
                </tr>
                <tr>
                    <td>Ảnh minh họa</td>
					<td colspan="5">
                        <img style="width:100px" src='../public/images/<?php echo $row['hinh_anh']; ?>'>
                       <input type="file" name="hinhanh" id="hinhanh" value="<?php echo $row['hinh_anh']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td><input type="radio" name="trangthai" value="1" checked ="1">hiển thị
                        <input type="radio" name="trangthai" value="2">ẩn
                        
                    </td>
                    <td>Mã loại sp</td>
                    <td>
                        <select name="txtloaisp" >
                <?php
                   
                    $sql = "SELECT * FROM loai_sp";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['ma_lsp'] . '">' . $row['ten_loai'] . '</option>';
                        }
                    } else {
                        echo "-----";}
                ?>
                        </select>
                    </td>
                    <td>Mã nhãn hiệu</td>
                    <td>
                        <select name="txtthuonghieu" >
                        <?php
                   
                   $sql = "SELECT * FROM nhan_hieu";
                   $result = mysqli_query($con, $sql);
                   if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                           echo '<option value="' . $row['ma_nh'] . '">' . $row['ten_nhan_hieu'] . '</option>';
                       }
                   } else {
                       echo "-----";}
               ?>
                </tr>
                <tr>
                <td colspan="4">
                    <input type="submit" name="button" value="Sửa">
                    <input type="reset" value="Làm lại">
                    </td>
                </tr>
                </table>
            </form>

    
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="./css/sidebar.css">
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/content.css">   
<header>
        <?php
            include_once "header.php";
            
        ?>
    </header>
    <nav>
        <?php
            include_once "sidebar.php";
        ?>
    </nav>
        <div class="content">
            <h2>Quản lý sản phẩm</h2>
            <!-- mo ket noi -->
            <?php
                include_once "connect.php";
                
                   $sql=  "SELECT * FROM san_pham";
            ?>
            <!-- thêm sp -->
            <?php
                if (isset($_POST['submit'])) {
                    $ten_sp = $_POST['tensp'];
                    $gia =$_POST['gia'];
                    $mo_ta = $_POST['mota'];
                    $filename=$_FILES['fileToUpload']['name'];
                    $tempname = $_FILES['fileToUpload']['tmp_name'];
                    move_uploaded_file($tempname,'../public/images/'.$filename);
                    $trang_thai=$_POST['trangthai'];
                    $ma_lsp =$_POST['loai'];
                    $ma_nh =$_POST['nhanhieu'];
                    
                    $sql ="INSERT INTO `san_pham`(`ten_sp`, `gia`, `mo_ta`, `hinh_anh`, `trang_thai`, `ma_lsp`, `ma_nh`) VALUES
                    ('$ten_sp','$gia','$mo_ta','$filename','$trang_thai','$ma_lsp','$ma_nh')";
                    $result=mysqli_query($con,$sql);
                  
                }   
            ?>
            <form action="qly_sanpham.php" method="post" enctype="multipart/form-data">
            <table class="sanpham" >
            <tr>
                    <td>Tên sản phẩm</td>
                    <td><input type="text" name="tensp" ></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><input type="number" name="gia" min="0" step="100"></td>
            
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td colspan="5"><textarea style="width: 50%" name="mota"></textarea></td>				
                </tr>
                <tr>
                    <td>Ảnh minh họa</td>
					<td colspan="5">
                        <img style="width:100px" src='../public/images/<?php echo $row['hinh_anh']; ?>'>
                        <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $row['hinh_anh']; ?>">
                    </td>
                </tr>
                <tr>
                    
                    <td>Mã loại sp</td>
                    <td>
                        <select name="loai" >
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
                        <select name="nhanhieu" >
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
                <td>Trạng thái</td>
                    <td>
                    <input type="radio" name="trangthai" value="1" checked="1">
                    <input type="radio" name="trangthai" value="2">
                    </td>
                </tr>
                <tr>
                <td colspan="4">
                    <input type="submit" name="submit" value="Thêm">
                    <input type="reset" value="Làm lại">
                    </td>
                </tr>
                </table>
            </form>
            <?php
                include_once "timkiem.php";
                
                $sql ="SELECT san_pham.ma_sp, san_pham.ten_sp, san_pham.gia, san_pham.mo_ta,
                san_pham.hinh_anh, loai_sp.ten_loai, nhan_hieu.ten_nhan_hieu, san_pham.trang_thai
                FROM (san_pham INNER JOIN loai_sp ON san_pham.ma_lsp = loai_sp.ma_lsp)
                INNER JOIN nhan_hieu ON san_pham.ma_nh = nhan_hieu.ma_nh";
                
                include "phantrang_sp.php";
                
                if (mysqli_num_rows($result) > 0 ) {
            ?>
                <table border="1"  cellpadding="6" cellspacing="2" class="sanpham1">
                    <tr class ="tr">
                        <th>Mã sp</th>
                        <th>Tên sp </th>
                        <th>Ảnh minh họa</th>
                        <th>Mô tả</th>
                        <th>Loại sp</th>
                        <th>Nhãn hiệu</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Sửa</th>
                        <th>Xóa</th>

                    </tr>
                    <?php
                        if (isset($_GET['search'])) {
                            $output ='';
                            $search = $_GET['search'];
                            $search = preg_replace("#[^0-9a-z]i#","", $search);
                            $query = mysqli_query($con,"SELECT san_pham.ma_sp, san_pham.ten_sp, san_pham.gia, san_pham.mo_ta,
                san_pham.hinh_anh, loai_sp.ten_loai, nhan_hieu.ten_nhan_hieu, san_pham.trang_thai
                FROM (san_pham INNER JOIN loai_sp ON san_pham.ma_lsp = loai_sp.ma_lsp)
                INNER JOIN nhan_hieu ON san_pham.ma_nh = nhan_hieu.ma_nh where ten_sp LIKE '%$search%'
                or ten_nhan_hieu like '%$search%' or ten_loai like '%$search%'");
                            $count = mysqli_num_rows($query);
                            if($count == 0){
                                $search = "There was no search results!";
                            
                              }else{
                                while ($row = mysqli_fetch_array($query)) {

                            
                    ?>
                    <tr class ="tr">
                            <td> <?php echo $row['ma_sp'];?> </td>
                            <td> <?php echo $row['ten_sp']; ?></td>
                            <td style='text-align: center'><img width='50' height='50' src='../public/images/<?php echo $row["hinh_anh"];?>' alt='Lỗi hiển thị ảnh'></td>
                            <td> <?php echo $row['mo_ta']; ?></td>
                            <td> <?php echo $row['ten_loai'];?></td>
                            <td> <?php echo $row['ten_nhan_hieu'];?></td>
                            <td> <?php echo $row['gia'];?></td>
                            <?php
                                if ($row['trang_thai'] == 1) {
                                    echo "<td>
                                        <img src='../admin/image/Ok-icon.png' alt='tick'>
                                    </td>";
                                } else {
                                    echo "<td>
                                    <img src='../admin/image/Lock-icon.png' alt='lock'>
                                    </td>";
                            
                                } 
                            ?>
                            <td>
                                <a href="update_sanpham.php?ma_sp=<?php echo $row['ma_sp'];?>">
                                <img src="../admin/image/update.png" alt="sửa">
                                </a>
                             </td>
                            <td><a href="delete_sp.php?ma_sp=<?php echo $row['ma_sp'];?>"onClick="return confirm('Bạn có thực sự muốn xóa ?');">
                                <img src="../admin/image/Error-icon.png" alt="xóa">
                            </a></td>
                            </tr>
                             
                    <?php
                        }}}else{
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr class ="tr">
                            <td> <?php echo $row['ma_sp'];?> </td>
                            <td> <?php echo $row['ten_sp']; ?></td>
                            <td style='text-align: center'><img width='50' height='50' src='../public/images/<?php echo $row["hinh_anh"];?>' alt='Lỗi hiển thị ảnh'></td>
                            <td> <?php echo $row['mo_ta']; ?></td>
                            <td> <?php echo $row['ten_loai'];?></td>
                            <td> <?php echo $row['ten_nhan_hieu'];?></td>
                            <td> <?php echo $row['gia'];?></td>
                            <?php
                                if ($row['trang_thai'] == 1) {
                                    echo "<td>
                                        <img src='../admin/image/Ok-icon.png' alt='tick'>
                                    </td>";
                                } else {
                                    echo "<td>
                                    <img src='../admin/image/Lock-icon.png' alt='lock'>
                                    </td>";
                            
                                } 
                            ?>
                            <td >
                                <a href="update_sanpham.php?ma_sp=<?php echo $row['ma_sp'];?>">
                                <img src="../admin/image/update.png" alt="sửa" style='margin:5px'>
                                </a>
                            </td>    
                            <td>
                                <a href="delete_sp.php?ma_sp=<?php echo $row['ma_sp'];?>"onClick="return confirm('Bạn có thực sự muốn xóa ?');">
                                <img src="../admin/image/Error-icon.png" alt="xóa">
                            </a></td>
                             
                        </tr>       
                    <?php
                        }
                    }
                    ?>
                </table>
            <?php
				}
            ?>
            <?php mysqli_close($con);?>

        </div>
    
    <footer>
        <?php
            
            include_once "footer.php";
        ?>
    </footer>
    
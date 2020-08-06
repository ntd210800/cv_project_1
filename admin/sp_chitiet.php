<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="./css/sidebar.css">
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/content.css">   

<?php
    if (isset($_POST['submit'])) {
        $ten_sp = $_POST['tensp'];
        $gia =$_POST['gia'];
        $mo_ta = $_POST['mota'];
        $filename=$_FILES['fileToUpload']['name'];
        $tempname = $_FILES['fileToUpload']['tmp_name'];
        move_uploaded_file($tempname,'../public/image/'.$filename);
        $trang_thai=$_POST['trangthai'];
        $ma_lsp =$_POST['loai'];
        $ma_nh =$_POST['nhanhieu'];
    
}   
?>
<?php
    $id=$_GET['id'];
    $sql ="SELECT san_pham.ma_sp, san_pham.ten_sp, san_pham.gia, san_pham.mo_ta,
                san_pham.hinh_anh, loai_sp.ten_loai, nhan_hieu.ten_nhan_hieu, san_pham.trang_thai
                FROM (san_pham INNER JOIN loai_sp ON san_pham.ma_lsp = loai_sp.ma_lsp)
                INNER JOIN nhan_hieu ON san_pham.ma_nh = nhan_hieu.ma_nh where ma_sp = '$id'";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($query);
    
?>
<table>
    <tr>
        <td>Tên sản phẩm</td>
        <a href="qly_sanpham.php"><td><?php echo $row['ten_sp']?></td></a>
    </tr>
</table>
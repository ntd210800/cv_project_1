<link rel="stylesheet" href="./css/sidebar.css">
<nav class="sidebar">
    <h2>Quản lý hệ thống</h2>
        <ul>
        <li><a href="index.php" title="trangchu">Trang chủ</a></li>
        <li><a href="qly_sanpham.php" title="sanpham">Sản phẩm</a></li>
        <li><a href="qly_khachhang.php" title="khachhang">Khách hàng</a></li>
        <li><a href="qly_hoadon.php" title="hoadon">Hóa đơn</a></li>
        <li><a href="qly_pttt.php" title="thanhtoan">Phương thức thanh toán</a></li>
        <li><a href="qly_ptvc.php" title="vanchuyen">Phương thức vận chuyển</a></li>
        <li <?php if(@$_SESSION['nhanvien']){ echo "hidden";} ?>><a href="qly_admin.php" title="taikhoan">Admin</a></li>
        </ul>
</nav>
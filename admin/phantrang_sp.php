<?php 
        // PHẦN XỬ LÝ PHP
        //mở kêt nối
        include "connect.php"; 
        $limit = 5;
        $result = mysqli_query($con, "select ma_sp from san_pham");
        $row = mysqli_fetch_assoc($result);
        $total_records = mysqli_num_rows(mysqli_query($con,"SELECT * FROM san_pham"));
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
       
        $start = ($current_page - 1) * $limit;
       $result = mysqli_query($con, "SELECT san_pham.ma_sp, san_pham.ten_sp, san_pham.gia, san_pham.mo_ta,
       san_pham.hinh_anh, loai_sp.ten_loai, nhan_hieu.ten_nhan_hieu, san_pham.trang_thai
       FROM (san_pham INNER JOIN loai_sp ON san_pham.ma_lsp = loai_sp.ma_lsp)
       INNER JOIN nhan_hieu ON san_pham.ma_nh = nhan_hieu.ma_nh ORDER BY ma_sp ASC limit $start, $limit");
    
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page){
            $current_page = $total_page;
        }else if ($current_page < 1){
            $current_page = 1;
        } 
        


        ?>
        <div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANfG
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="qly_sanpham.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="qly_sanpham.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="qly_sanpham.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
<?php
    // Kết nối đến máy chủ MySQL
    $kn = mysqli_connect("localhost", "root", "") or die("Không thể kết nối: " . mysqli_error($kn));

    // Chọn cơ sở dữ liệu
    $csdl = mysqli_select_db($kn, "online_shop") or die("Không thể kết nối cơ sở dữ liệu: " . mysqli_error($kn));
?>

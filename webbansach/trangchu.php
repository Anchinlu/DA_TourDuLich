<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang sách và cuộc sống</title>
    <style>
        /* Cải thiện một chút về giao diện */
        body {
            font-family: Arial, sans-serif;
        }

        iframe {
            width: 100%;
            height: 500px;
            border: none;
        }
    </style>
</head>
<body bgcolor="#f5f5f5">
    <table width="1000" border="1" align="center" cellspacing="0" bgcolor="white">
        <!-- Banner -->
        <tr id="banner">
            <td colspan="3" align="center">
                <img src="hinhanh/sachhay_new1.gif" alt="Banner trang sách và cuộc sống">
            </td>
        </tr>

        <!-- Thanh menu -->
        <tr>
            <td colspan="3">
                <table width="100%" border="0">
                    <tr>
                        <td align="left">
                            <a href="index.php">Trang chủ</a>
                        </td>
                        <td align="center">
                            <marquee behavior="scroll" direction="left">Cùng bạn đi tìm tri thức</marquee>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Nội dung chính -->
        <tr>
            <!-- Cột trái -->
            <td width="200" valign="top" bgcolor="#ffffffff">
                <table width="100%" border="1" cellspacing="0">
                    <tr><td><a href="baitap/bt1.php" target="khung_noi_dung">BT1</a></td></tr>
                    <tr><td><a href="baitap/bt2.php" target="khung_noi_dung">BT2</a></td></tr>
                    <tr><td><a href="baitap/bt3.php" target="khung_noi_dung">BT3</a></td></tr>
                    <tr><td><a href="baitap/index.php" target="khung_noi_dung">BT4</a></td></tr>
                    <tr><td><a href="baitap/bt5.php" target="khung_noi_dung">BT5</a></td></tr>
                    <tr><td><a href="baitap/bt6.php" target="khung_noi_dung">BT6</a></td></tr>
                    <tr><td><a href="baitap/bt7.php" target="khung_noi_dung">BT7</a></td></tr>
                    <tr><td><a href="baitap/bt8.php" target="khung_noi_dung">BT8</a></td></tr>
                    <tr><td><a href="baitap/bt9.php" target="khung_noi_dung">BT9</a></td></tr>
                    <tr><td><a href="baitap/TH_PHP_Bai10.php" target="khung_noi_dung">BT10</a></td></tr>
                    <tr><td><a href="baitap/bt11.php" target="khung_noi_dung">BT11</a></td></tr>
                    <tr><td><a href="baitap/cau_12/bt12.php" target="khung_noi_dung">BT12</a></td></tr>
                    <tr><td><a href="baitap/bt13.php" target="khung_noi_dung">BT13</a></td></tr>
                    <tr><td><a href="baitap/bt14.php" target="khung_noi_dung">BT14</a></td></tr>
                </table>
            </td>

            <!-- Cột giữa (iframe để hiển thị nội dung bài tập) -->
            <td valign="top" align="center">
                <iframe name="khung_noi_dung">
                    <!-- Nếu trình duyệt không hỗ trợ iframe -->
                    <p>Trình duyệt của bạn không hỗ trợ iframe.</p>
                </iframe>
            </td>

            <!-- Cột phải -->
            <td width="200" valign="top" bgcolor="#ffffffff">
                <form name="formnhap" action="" method="post">
                    <table width="100%">
                        <tr>
                            <td>
                                <label for="txtNhap">Tên đăng nhập:</label><br>
                                <input type="text" id="txtNhap" name="txtNhap" size="20">
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>

        <!-- Chân trang -->
        <tr>
            <td colspan="3" align="center" bgcolor="#e0e0e0">
                <p>&copy; 2025 Trang Sách và Cuộc Sống</p>
            </td>
        </tr>
    </table>
</body>
</html>

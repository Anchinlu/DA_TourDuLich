<?php
// Xử lý khi người dùng bấm submit
$kq = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];

    if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
        $a = floatval($a);
        $b = floatval($b);
        $c = floatval($c);

        if ($a > 0 && $b > 0 && $c > 0 && ($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a)) {
            if ($a == $b && $b == $c) {
                $kq = "🔺 Đây là <b>tam giác đều</b>";
            } elseif ($a == $b || $a == $c || $b == $c) {
                if (pow($a,2) + pow($b,2) == pow($c,2) ||
                    pow($a,2) + pow($c,2) == pow($b,2) ||
                    pow($b,2) + pow($c,2) == pow($a,2)) {
                    $kq = "🔺 Đây là <b>tam giác vuông cân</b>";
                } else {
                    $kq = "🔺 Đây là <b>tam giác cân</b>";
                }
            } elseif (pow($a,2) + pow($b,2) == pow($c,2) ||
                      pow($a,2) + pow($c,2) == pow($b,2) ||
                      pow($b,2) + pow($c,2) == pow($a,2)) {
                $kq = "🔺 Đây là <b>tam giác vuông</b>";
            } else {
                $kq = "🔺 Đây là <b>tam giác thường</b>";
            }
        } else {
            $kq = "❌ Ba cạnh này <b>không tạo thành tam giác</b>";
        }
    } else {
        $kq = "⚠️ Vui lòng nhập số hợp lệ";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra tam giác</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: #fff;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0px 8px 25px rgba(0,0,0,0.25);
            width: 380px;
            text-align: center;
            animation: fadeIn 0.7s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 {
            color: #764ba2;
            margin-bottom: 25px;
        }
        input[type="text"] {
            width: 85%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: 0.3s;
        }
        input[type="text"]:focus {
            border-color: #764ba2;
            box-shadow: 0px 0px 6px #764ba2;
        }
        input[type="submit"] {
            background: #764ba2;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
margin-top: 15px;
            transition: background 0.3s;
        }
        input[type="submit"]:hover {
            background: #5a358a;
        }
        .result {
            margin-top: 25px;
            padding: 18px;
            background: #f1f1f1;
            border-left: 6px solid #764ba2;
            border-radius: 8px;
            font-size: 17px;
            color: #333;
            animation: fadeIn 0.5s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>🔎 Kiểm tra tam giác</h2>
        <form method="post" action="">
            <input type="text" name="a" placeholder="Nhập cạnh a" required><br>
            <input type="text" name="b" placeholder="Nhập cạnh b" required><br>
            <input type="text" name="c" placeholder="Nhập cạnh c" required><br>
            <input type="submit" value="Kiểm tra">
        </form>
        <?php if ($kq != ""): ?>
            <div class="result"><?php echo $kq; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>

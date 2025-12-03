<?php
function giaiPhuongTrinhBac1($b, $c) {
    if ($b == 0) {
        if ($c == 0) {
            return "Phương trình vô số nghiệm.";
        } else {
            return "Phương trình vô nghiệm.";
        }
    } else {
        $x = -$c / $b;
        return "Nghiệm của phương trình bậc 1: x = $x";
    }
}

function giaiPhuongTrinhBac2($a, $b, $c) {
    if ($a == 0) {
        return giaiPhuongTrinhBac1($b, $c);
    }
    $delta = $b * $b - 4 * $a * $c;
    if ($delta > 0) {
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        $x2 = (-$b - sqrt($delta)) / (2 * $a);
        return "Phương trình có 2 nghiệm phân biệt: x1 = $x1, x2 = $x2";
    } elseif ($delta == 0) {
        $x = -$b / (2 * $a);
        return "Phương trình có nghiệm kép: x = $x";
    } else {
        $phanThuc = -$b / (2 * $a);
        $phanAo = sqrt(-$delta) / (2 * $a);
        return "Phương trình có 2 nghiệm phức: x1 = {$phanThuc}+{$phanAo}i, x2 = {$phanThuc}-{$phanAo}i";
    }
}

$a = $b = $c = "";
$ketQua = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
        $ketQua = giaiPhuongTrinhBac2($a, $b, $c);
    } else {
        $ketQua = "Vui lòng nhập số hợp lệ cho a, b, c.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giải phương trình bậc 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f7;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 50px;
        }
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 25px;
            padding: 15px;
            background-color: #e6f7ff;
            border-left: 5px solid #007bff;
            border-radius: 6px;
            color: #0056b3;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Giải phương trình bậc 2</h2>
        <form method="post">
            <label for="a">Hệ số a:</label>
            <input type="text" id="a" name="a" value="<?php echo htmlspecialchars($a); ?>">

            <label for="b">Hệ số b:</label>
            <input type="text" id="b" name="b" value="<?php echo htmlspecialchars($b); ?>">

            <label for="c">Hệ số c:</label>
            <input type="text" id="c" name="c" value="<?php echo htmlspecialchars($c); ?>">

            <input type="submit" value="Giải phương trình">
        </form>

        <?php if ($ketQua != ""): ?>
            <div class="result"><?php echo $ketQua; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>

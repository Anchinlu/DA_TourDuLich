

<?php
/* Dùng php để viết chương trình giải phương trình bậc 2: ax^2 + bx +c = 0 với a, b, c nhập từ bàn phím.
Nếu khi nhập a = 0 thì viết chương trình con, giải phương trình bậc 1. (Không giữ lại form sau khi thực thi.) */

function giaiBac1($a, $b):String{
    if ($a == 0) {
        if ($b == 0) {
            return "Phương trình có vô số nghiệm";
        } else {
            return "Phương trình vô nghiệm";
        }
    } else {
        $x = -$b / $a;
        return "Nghiệm của phương trình bậc 1: x = " . round($x, 4);
    }
}

function giaiBac2($a, $b, $c):String{ 
    if ($a == 0) {
        return giaiBac1($b, $c);
    }
    else{
        $delta = $b * $b - 4 * $a * $c;

        if ($delta > 0) {
            $x1 = (-$b + sqrt($delta)) / (2 * $a);
            $x2 = (-$b - sqrt($delta)) / (2 * $a);
            return "Phương trình có 2 nghiệm phân biệt:<br>x1 = " . round($x1, 4) . "<br>x2 = " . round($x2, 4);
        } elseif ($delta == 0) {
            $x = -$b / (2 * $a);
            return "Phương trình có nghiệm kép: x = " . round($x, 4);
        } else {    
            return "Phương trình vô nghiệm (delta < 0)";
        }
    }
}

$ketqua="";

if ($_POST){
    $a = floatval($_POST['a']);
    $b = floatval($_POST['b']);      
    $c = floatval($_POST['c']);

    if($a == 0){
        $ketqua = giaiBac1($b, $c);
    }
    else{
        $ketqua = giaiBac2($a, $b, $c);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải Phương Trình Bậc 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="number"]:focus {
            border-color: #0011ffff;
            outline: none;
        }
        button {
            background-color: #0011ffff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }
        button:hover {
            background-color: #00054dff;
        }
        .equation {
            text-align: center;
            font-size: 18px;
            margin: 20px 0;
            color: #666;
        }
        .result {
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 5px;
            border-left: 4px solid #0011ffff;
            margin: 20px 0;
        }
        .result h3 {
            margin-top: 0;
            color: #0011ffff;
        }
        .result p {
            margin-bottom: 0;
            font-size: 16px;
            line-height: 1.5;
        }
        .note {
            background-color: #e7f3ff;
            padding: 15px;
            border-left: 4px solid #2196F3;
            margin-top: 20px;
            border-radius: 0 5px 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Giải Phương Trình Bậc 2</h1>
        
        <div class="equation">
            ax² + bx + c = 0
        </div>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="a">Hệ số a:</label>
                <input type="number" step="any" name="a" id="a" required placeholder="Nhập hệ số a">
            </div>
            
            <div class="form-group">
                <label for="b">Hệ số b:</label>
                <input type="number" step="any" name="b" id="b" required placeholder="Nhập hệ số b">
            </div>
            
            <div class="form-group">
                <label for="c">Hệ số c:</label>
                <input type="number" step="any" name="c" id="c" required placeholder="Nhập hệ số c">
            </div>
            
            <button type="submit">Giải Phương Trình</button>
        </form>
        
        <?php if (!empty($ketqua)): ?>
        <div class="result">
            <h3>Kết quả:</h3>
            <p><?php echo $ketqua; ?></p>
        </div>
        <?php endif; ?>
        
        <div class="note">
            <strong>Lưu ý:</strong>
            <ul>
                <li>Nếu a = 0: Chương trình sẽ giải phương trình bậc 1 (bx + c = 0)</li>
                <li>Nếu a ≠ 0: Chương trình sẽ giải phương trình bậc 2</li>
                <li>Kết quả sẽ hiển thị trong popup và form sẽ được làm mới</li>
            </ul>
        </div>
    </div>
</body>
</html>

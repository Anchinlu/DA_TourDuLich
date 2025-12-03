<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài tập 3 - Câu 1</title>
    <style>
        body {
            background: #f2f6fc;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 600px;
            margin: 40px auto 0 auto;
            padding: 32px 40px 28px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        }
        h2 {
            color: #2d5be3;
            text-align: center;
            margin-top: 0;
        }
        h3 {
            color: #333;
            margin-bottom: 10px;
        }
        ul {
            padding-left: 22px;
            margin-bottom: 18px;
        }
        li {
            margin-bottom: 4px;
            font-size: 16px;
        }
        hr {
            border: none;
            border-top: 1.5px solid #e0e6ed;
            margin: 24px 0;
        }
        form {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }
        input[type="number"] {
            padding: 7px 10px;
            border: 1px solid #bfc9d9;
            border-radius: 5px;
            font-size: 16px;
            width: 120px;
            transition: border 0.2s;
        }
        input[type="number"]:focus {
            border: 1.5px solid #2d5be3;
            outline: none;
        }
        input[type="submit"] {
            background: #2d5be3;
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s;
        }
        input[type="submit"]:hover {
            background: #1746a2;
        }
        p {
            font-size: 17px;
            color: #222;
        }
        b {
            color: #2d5be3;
        }
        @media (max-width: 700px) {
            .container {
                padding: 18px 8px 16px 8px;
            }
            form {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bài tập: Câu 11</h2>
        <p><b>Đề bài:</b> Viết chương trình cho phép nhập vào một số. Sau đó dùng PHP để tính tổng các số tự nhiên từ 1 đến số vừa nhập.</p>

        <h3>Thành viên nhóm:</h3>
        <ul>
            <li>Mai Hồng Lợi - 110122106</li>
            <li>Nguyễn Ngọc Anh Khoa - 110122095</li>
            <li>Nguyễn Đỗ Thành Lộc - 110122105</li>
            <li>Hoàng Tuấn Kiệt - 110122099</li>
        </ul>

        <hr>

        <h3>Nhập số để tính tổng:</h3>
        <form method="post">
            Nhập số n: <input type="number" name="n" required>
            <input type="submit" value="Tính tổng">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = intval($_POST["n"]);
            $tong = 0;

            for ($i = 1; $i <= $n; $i++) {
                $tong += $i;
            }

            echo "<p><b>Kết quả:</b> Tổng các số từ 1 đến $n là: <b>$tong</b></p>";
        }
        ?>
    </div>
</body>
</html>

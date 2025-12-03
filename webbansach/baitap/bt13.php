<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính điểm trung bình học kỳ</title>
    <style>
        /* Background gợn sóng nhiều màu */
        body {
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
            background: #2575fc;
        }

        /* Lớp sóng */
        body::before, body::after {
            content: "";
            position: absolute;
            top: 70%;
            left: 50%;
            width: 200%;
            height: 200%;
            border-radius: 45%;
            transform: translateX(-50%);
            background: radial-gradient(circle at 50% 50%, #6a11cb 0%, #2575fc 40%, #00c6ff 70%, #ff6ec4 100%);
            opacity: 0.5;
            animation: waveMove 12s ease-in-out infinite alternate;
            z-index: 0;
        }

        body::after {
            top: 65%;
            background: radial-gradient(circle at 50% 50%, #ff9a9e 0%, #fad0c4 40%, #a18cd1 70%, #fbc2eb 100%);
            opacity: 0.4;
            animation: waveMove 18s ease-in-out infinite alternate-reverse;
        }

        @keyframes waveMove {
            0% { transform: translateX(-50%) rotate(0deg) scale(1); }
            50% { transform: translateX(-48%) rotate(15deg) scale(1.05); }
            100% { transform: translateX(-52%) rotate(-15deg) scale(1); }
        }

        /* Container hiện đại */
        .container {
            background: rgba(255,255,255,0.9);
            padding: 30px 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
            width: 400px;
            text-align: center;
            z-index: 1;
            position: relative;
        }
        h2 {
            margin-bottom: 15px;
            color: #222;
            font-size: 22px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        /* Nút ? hiển thị chú thích */
        .info-icon {
            display: inline-block;
            width: 22px;
            height: 22px;
            background: #007bff;
            color: #fff;
            border-radius: 50%;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
            line-height: 22px;
            text-align: center;
            position: relative;
        }
        .tooltip {
            display: none;
            position: absolute;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            color: #333;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            width: 280px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
            text-align: left;
            z-index: 2;
        }
        .info-icon:hover .tooltip,
        .info-icon:focus .tooltip {
            display: block;
        }

        label {
            display: block;
            margin-top: 14px;
            font-weight: bold;
            color: #444;
            text-align: left;
        }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: border 0.3s, box-shadow 0.3s;
        }
        input[type="number"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 6px rgba(0,123,255,0.5);
            outline: none;
        }
        .btn {
            margin-top: 18px;
            padding: 14px;
            width: 100%;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: #fff;
            font-weight: bold;
            transition: transform 0.2s, background 0.3s;
        }
        .btn-calc {
            background: linear-gradient(90deg, #007bff, #00c6ff);
        }
        .btn-calc:hover {
            background: linear-gradient(90deg, #0056b3, #0099cc);
            transform: scale(1.05);
        }
        .btn-reset {
            background: linear-gradient(90deg, #dc3545, #ff4d6d);
            margin-top: 12px;
        }
        .btn-reset:hover {
            background: linear-gradient(90deg, #a71d2a, #cc0033);
            transform: scale(1.05);
        }
        .result {
            margin-top: 22px;
            font-size: 19px;
            font-weight: bold;
            color: #222;
            background: #f9f9f9;
            padding: 14px;
            border-radius: 10px;
            box-shadow: inset 0 2px 6px rgba(0,0,0,0.1);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }
        .result.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>
        Tính điểm trung bình học kỳ
        <div class="info-icon" tabindex="0">?
            <div class="tooltip">
                📌 Công thức tính điểm trung bình học kỳ:  
                <br><br>
                <b>(TKW × 3 tín chỉ + TRR × 2 tín chỉ + TK&PTDL × 3 tín chỉ) / 8</b>
            </div>
        </div>
    </h2>
    <?php
        $tkw = $trr = $tkptdl = "";
        $diemTB = 0;

        if (isset($_POST['tinh'])) {
            $tkw = $_POST['tkw'];
            $trr = $_POST['trr'];
            $tkptdl = $_POST['tkptdl'];

            if ($tkw >= 0 && $tkw <= 10 && $trr >= 0 && $trr <= 10 && $tkptdl >= 0 && $tkptdl <= 10) {
                $tc_tkw = 3;
                $tc_trr = 2;
                $tc_tkptdl = 3;
                $tongTinChi = $tc_tkw + $tc_trr + $tc_tkptdl;

                $diemTB = ($tkw * $tc_tkw + $trr * $tc_trr + $tkptdl * $tc_tkptdl) / $tongTinChi;
            }
        }

        if (isset($_POST['reset'])) {
            $tkw = $trr = $tkptdl = "";
            $diemTB = 0;
        }
    ?>

    <form method="post">
        <label for="tkw">Thiết kế web (3 tín chỉ):</label>
        <input type="number" step="0.1" min="0" max="10" name="tkw" id="tkw"
               value="<?php echo htmlspecialchars($tkw); ?>">

        <label for="trr">Toán rời rạc (2 tín chỉ):</label>
        <input type="number" step="0.1" min="0" max="10" name="trr" id="trr"
               value="<?php echo htmlspecialchars($trr); ?>">

        <label for="tkptdl">Thống kê & phân tích dữ liệu (3 tín chỉ):</label>
        <input type="number" step="0.1" min="0" max="10" name="tkptdl" id="tkptdl"
               value="<?php echo htmlspecialchars($tkptdl); ?>">

        <button type="submit" name="tinh" class="btn btn-calc">Tính điểm trung bình</button>
        <button type="submit" name="reset" class="btn btn-reset">Reset</button>
    </form>

    <div class="result <?php echo (isset($_POST['tinh']) || isset($_POST['reset'])) ? 'show' : ''; ?>">
        Điểm trung bình học kỳ: <b><?php echo round($diemTB, 2); ?></b>
    </div>
</div>

</body>
</html>

<?php

$so1 = $_POST['so1'];
$so2 = $_POST['so2'];
$so3 = $_POST['so3'];
$so4 = $_POST['so4'];

$tong = $so1 + $so2 + $so3 + $so4;

$ketqua = '';


if($so1 == $so2 && $so1 == $so3 && $so1 == $so4) {
    $ketqua = 'số đẹp';
}
elseif($tong % 10 == 9) {
    $ketqua = 'số đẹp';
} else {
    $ketqua = 'số không đẹp';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Nhập 4 số</h1>
    <form action="process.php" method="post">
        <input type="number" max="9" min="0" name="so1" value="<?php echo $so1 ?>">

        <input type="number" max="9" min="0" name="so2" value="<?php echo $so2 ?>">

        <input type="number" max="9" min="0" name="so3" value="<?php echo $so3 ?>">

        <input type="number" max="9" min="0" name="so4" value="<?php echo $so4 ?>">

        <input type="submit" value="gửi">
    </form>
    <h1>
        <?php echo $ketqua; ?>
    </h1>
</body>
</html>
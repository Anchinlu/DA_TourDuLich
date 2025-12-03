<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nhập năm</title>
    <link rel="stylesheet" type="text/css" href="TH.css">
    <script>
    function kiemtra(){
        let nam = document.getElementById("nam").value;

       
        if(nam.trim() === ""){
            alert("Chưa nhập năm");
            document.getElementById("nam").focus();
            return false;
        }

   
        if(isNaN(nam)){
            alert("Vui lòng nhập số");
            document.getElementById("nam").focus();
            return false;
        }

       
        if(parseInt(nam) <= 0){
            alert("Năm phải lớn hơn 0");
            document.getElementById("nam").focus();
            return false;
        }

        return true; 
    }
</script>
  </head>
  <body>
    <div class="content">
      <h2>Kiểm tra năm nhuần </h2>
      <form action="" method="post" onsubmit="return kiemtra()">
            <input type="text" name="nam" id="nam" placeholder="nhập năm" /><br />
            <input type="submit" name="kiemtra" value="Kiểm tra" />
      </form>
    </div>
  </body>
<?php
if ((isset($_POST['kiemtra'])) && ($_POST['kiemtra'])) {
    $nam = $_POST['nam'];

    if (!is_numeric($nam) || (int)$nam <= 0) {
        echo "<p style='color:orange; text-align: center;'>Vui lòng nhập năm hợp lệ (lớn hơn 0)</p>";
    } else {
        $nam = (int)$nam;
        if (($nam % 400 == 0) || ($nam % 4 == 0 && $nam % 100 != 0)) {
            echo "<p style='color:green; text-align: center;'>$nam là năm nhuận</p>";
        } else {
            echo "<p style='color:red; text-align: center;'>$nam không phải là năm nhuận</p>";
        }
    }
}
?>

</html>

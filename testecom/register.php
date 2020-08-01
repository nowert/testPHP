<?php require_once('Connections/dbcon.php'); ?>
<?php
if (isset($_POST["B_Submit"]) or $_POST["B_Submit"]<>NULL){
mysql_select_db($database_dbcon, $dbcon);
$query_insert = "insert into member values('NULL','".$_POST["mem_nm"]."','".$_POST["mem_email"]."','".$_POST["mem_pass"]."','".$_POST["mem_tel"]."','".$_POST["mem_address"]."','webuser')";

$in_mem = mysql_query($query_insert, $dbcon) or die(mysql_error());
header("location:suc_regis.php");
}
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<title>shopping</title>
</head>

<body>
<?php include("navbar.php"); ?>

<div align="center">
  <div style="width:70%">
  <fieldset>
  <legend><h1>สมัครสมาชิก</h1></legend>
    <form id="form1" name="form1" method="post" action="">
      <p>
        <label for="mem_nm"></label>
        <input name="mem_nm" type="text" id="mem_nm" size="45" placeholder="ป้อนชื่อ-นามสกุล" required class="input-lg">
      </p>
      <p>
        <label for="mem_email"></label>
        <input name="mem_email" type="text" id="mem_email" size="45" placeholder="ป้อนอีเมล์" required class="input-lg">
      </p>
      <p>
        <label for="mem_pass"></label>
        <input name="mem_pass" type="text" id="mem_pass" size="45" placeholder="ป้อนรหัสผ่าน" required class="input-lg">
      </p>
      <p>
        <label for="mem_tel"></label>
        <input name="mem_tel" type="text" id="mem_tel" size="45" placeholder="ป้อนหมายเลขโทรศัพท์" required class="input-lg">
      </p>
      <p>
        <label for="mem_address"></label>
        <textarea name="mem_address" id="mem_address" cols="48" rows="5" placeholder="ป้อนที่อยู่" required class="input-lg"></textarea>
      </p>
      <p>
        <input type="submit" name="B_Submit" id="button" value="ลงทะเบียน" class="btn btn-success btn-lg">
        <a href="login.php" class="btn btn-primary btn-lg">เข้าสู่ระบบ</a>
      </p>
    </form></fieldset>
  </div>
</div>
<div style=" position:absolute; bottom:0; width:100%;">
<?php include("footer.php"); ?>
</div>
</body>
</html>
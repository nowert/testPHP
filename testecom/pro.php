<?php require_once('Connections/dbcon.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_get_one_product = "-1";
if (isset($_GET['id'])) {
  $colname_get_one_product = $_GET['id'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_get_one_product = sprintf("SELECT * FROM product WHERE pro_id = %s", GetSQLValueString($colname_get_one_product, "int"));
$get_one_product = mysql_query($query_get_one_product, $dbcon) or die(mysql_error());
$row_get_one_product = mysql_fetch_assoc($get_one_product);
$totalRows_get_one_product = mysql_num_rows($get_one_product);
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

<body style="background-color:#ededed; font-size:18px;">
<?php include("navbar.php"); ?>

<!------->
<div class="container" style="background-color:#fff;">
<div class="row" style="padding-top:20px;">

	<div class="col-sm-6">
    <div class="thumbnail">
    <img src="image/product/<?php echo $row_get_one_product['pro_pic']; ?>" class="img-responsive img-rounded" style="padding-top:20px; padding-bottom:20px;">
    </div>
    </div>
    
    <br>
    <div class="col-sm-6">
    <div class="row">
    <div class="col-sm-12">ชื่อสินค้า <?php echo $row_get_one_product['pro_nm']; ?></div>
    </div>
    
    <br>
    <div class="row">
    <div class="col-sm-3">ราคา</div>
    <div class="col-sm-9"><?php echo $row_get_one_product['pro_price']; ?></div>
    </div>
    
    <br>
    <div class="row">
    <div class="col-sm-3">รายละเอียด</div>
    <div class="col-sm-9" style="padding-right:40px;"><?php echo $row_get_one_product['pro_detail']; ?><br>
    </div>
    </div>
    
    <br>
    <div class="row">
    <div class="col-sm-3">จำนวน</div>
    <div class="col-sm-9">
    <input type="number" size="5" value="1" min="1" max="<?php echo $row_get_one_product['pro_unit']; ?>">
    </div>
    
    
    <br><br>
    
    <div class="row">
    <div class="col-sm-offset-3 col-sm-4">
    <button name="" type="button" class="btn btn-info">เพิ่มลงตะกร้าสินค้า</button>
    </div>
    <div class="col-sm-4">
    <button name="" type="button" class="btn btn-danger">สั่งซื้อสินค้า</button>
    </div>
    </div>
    
    
    
    
    <br>
    </div>
</div>
</div>

<br>
<br>




</div><?php include("footer.php"); ?>
<?php
mysql_free_result($get_one_product);
?>
</body>
</html>
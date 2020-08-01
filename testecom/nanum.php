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

$maxRows_get_product_desc = 4;
$pageNum_get_product_desc = 0;
if (isset($_GET['pageNum_get_product_desc'])) {
  $pageNum_get_product_desc = $_GET['pageNum_get_product_desc'];
}
$startRow_get_product_desc = $pageNum_get_product_desc * $maxRows_get_product_desc;

mysql_select_db($database_dbcon, $dbcon);
$query_get_product_desc = "SELECT * FROM product ORDER BY pro_id DESC";
$query_limit_get_product_desc = sprintf("%s LIMIT %d, %d", $query_get_product_desc, $startRow_get_product_desc, $maxRows_get_product_desc);
$get_product_desc = mysql_query($query_limit_get_product_desc, $dbcon) or die(mysql_error());
$row_get_product_desc = mysql_fetch_assoc($get_product_desc);

if (isset($_GET['totalRows_get_product_desc'])) {
  $totalRows_get_product_desc = $_GET['totalRows_get_product_desc'];
} else {
  $all_get_product_desc = mysql_query($query_get_product_desc);
  $totalRows_get_product_desc = mysql_num_rows($all_get_product_desc);
}
$totalPages_get_product_desc = ceil($totalRows_get_product_desc/$maxRows_get_product_desc)-1;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div class="row">

  <?php do { ?>
    <div class="col-sm-3">
      <div class="thumbnail" style="padding:15px;">
        <img src="image/product/<?php echo $row_get_product_desc['pro_pic']; ?>" alt="Lights" style="width:100%">
        <br>
        <div class="row">
          <div class="col-sm-12">ชื่อสินต้า :<?php echo $row_get_product_desc['pro_nm']; ?> </div>
        </div>
        <div class="row">
          <div class="col-sm-12">ราคา : <?php echo $row_get_product_desc['pro_price']; ?></div>
          <!--<div class="col-sm-6">----</div> -->
        </div>
        <center>
          <a class="btn btn-danger" href="basket.php?id=<?php echo $row_get_product_desc['pro_id']; ?>">ใส่ตระกร้า</a>
          <a class="btn btn-primary" href="pro.php?id=<?php echo $row_get_product_desc['pro_id']; ?>">รายละเอียด</a>
        </center>
      </div>
    </div>
    <?php } while ($row_get_product_desc = mysql_fetch_assoc($get_product_desc)); ?>


</div>
</body>
</html>
<?php
mysql_free_result($get_product_desc);
?>

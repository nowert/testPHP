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

mysql_select_db($database_dbcon, $dbcon);
$query_get_product = "SELECT * FROM product";
$get_product = mysql_query($query_get_product, $dbcon) or die(mysql_error());
$row_get_product = mysql_fetch_assoc($get_product);
$totalRows_get_product = mysql_num_rows($get_product);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<table border="1">
  <tr>
    <td>pro_id</td>
    <td>pro_nm</td>
    <td>pro_detail</td>
    <td>pro_price</td>
    <td>pro_unit</td>
    <td>pro_pic</td>
    <td>pro_type</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_get_product['pro_id']; ?></td>
      <td><?php echo $row_get_product['pro_nm']; ?></td>
      <td><?php echo $row_get_product['pro_detail']; ?></td>
      <td><?php echo $row_get_product['pro_price']; ?></td>
      <td><?php echo $row_get_product['pro_unit']; ?></td>
      <td><?php echo $row_get_product['pro_pic']; ?></td>
      <td><?php echo $row_get_product['pro_type']; ?></td>
    </tr>
    <?php } while ($row_get_product = mysql_fetch_assoc($get_product)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($get_product);
?>

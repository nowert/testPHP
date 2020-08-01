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
if (isset($_GET["id"])){ 
$query_get_product = "SELECT * FROM product where pro_type='".$_GET["id"]."'";
 }else {
 $query_get_product = "SELECT * FROM product";
 }
$get_product = mysql_query($query_get_product, $dbcon) or die(mysql_error());
$row_get_product = mysql_fetch_assoc($get_product);
$totalRows_get_product = mysql_num_rows($get_product);

mysql_select_db($database_dbcon, $dbcon);
$query_get_producttype = "SELECT * FROM product_type ORDER BY protype_name ASC";

$get_producttype = mysql_query($query_get_producttype, $dbcon) or die(mysql_error());
$row_get_producttype = mysql_fetch_assoc($get_producttype);
$totalRows_get_producttype = mysql_num_rows($get_producttype);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div>
  <div align="center">
    <p><a href="prod.php">ALL</a> |
      <?php do { ?>
        <a href="prod.php?id=<?php echo $row_get_producttype['protype_id']; ?>"><?php echo "|".$row_get_producttype['protype_name']; ?></a>
        <?php } while ($row_get_producttype = mysql_fetch_assoc($get_producttype)); ?>
    </p>
    <p>&nbsp;</p>
  </div>
  <table border="1" align="center">
    <tr>
      <td>pro_id</td>
      <td>pro_nm</td>
      <td>pro_price</td>
      <td>pro_unit</td>
      <td>pro_pic</td>
      <td>pro_type</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_get_product['pro_id']; ?></td>
        <td><?php echo $row_get_product['pro_nm']; ?></td>
        <td><?php echo $row_get_product['pro_price']; ?></td>
        <td><?php echo $row_get_product['pro_unit']; ?></td>
        <td><?php echo $row_get_product['pro_pic']; ?></td>
        <td><?php echo $row_get_product['pro_type']; ?></td>
      </tr>
      <?php } while ($row_get_product = mysql_fetch_assoc($get_product)); ?>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($get_product);

mysql_free_result($get_producttype);
?>

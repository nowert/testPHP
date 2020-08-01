<?php require_once('Connections/dbcon.php'); ?>
<?php



$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO product (pro_nm, pro_detail, pro_price, pro_unit, pro_pic, pro_type) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['pro_nm'], "text"),
                       GetSQLValueString($_POST['pro_detail'], "text"),
                       GetSQLValueString($_POST['pro_price'], "double"),
                       GetSQLValueString($_POST['pro_unit'], "int"),
                       GetSQLValueString($_POST['pro_pic'], "text"),
                       GetSQLValueString($_POST['pro_type'], "int"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());
}

mysql_select_db($database_dbcon, $dbcon);
$query_get_type = "SELECT * FROM product_type ORDER BY protype_name ASC";
$get_type = mysql_query($query_get_type, $dbcon) or die(mysql_error());
$row_get_type = mysql_fetch_assoc($get_type);
$totalRows_get_type = mysql_num_rows($get_type);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pro_nm:</td>
      <td><input type="text" name="pro_nm" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Pro_detail:</td>
      <td><textarea name="pro_detail" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pro_price:</td>
      <td><input type="text" name="pro_price" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pro_unit:</td>
      <td><input type="text" name="pro_unit" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pro_pic:</td>
      <td><input type="file" name="pro_pic" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pro_type:</td>
      <td><select name="pro_type">
        <?php
do {  
?>
        <option value="<?php echo $row_get_type['protype_id']?>"><?php echo $row_get_type['protype_name']?></option>
        <?php
} while ($row_get_type = mysql_fetch_assoc($get_type));
  $rows = mysql_num_rows($get_type);
  if($rows > 0) {
      mysql_data_seek($get_type, 0);
	  $row_get_type = mysql_fetch_assoc($get_type);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($get_type);
?>

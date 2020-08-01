<?php require_once('Connections/dbcon.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user_log'])) {
  $loginUsername=$_POST['user_log'];
  $password=$_POST['pass_log'];
  $MM_fldUserAuthorization = "mem_status";
  $MM_redirectLoginSuccess = "product_report.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_dbcon, $dbcon);
  	
  $LoginRS__query=sprintf("SELECT mem_email, mem_password, mem_status FROM member WHERE mem_email=%s AND mem_password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $dbcon) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'mem_status');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_Order']=$Orderid;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div align="center">
<div>
<?php include("navbar.php"); ?>
<form id="form1" name="form1" method="post" action="<?php echo $loginFormAction; ?>">
<fieldset><legend><h1><>เข้าสู่ระบบ</h1></legend>  <label for="user_log"></label>
 <input type="text" name="user_log" id="user_log" required class="input-lg" placeholder="ชือผู้ใช้">
  <label for="pass_log"></label>
  <div style="margin-top:10px;"><input type="password" name="pass_log" id="pass_log" required class="input-lg"  placeholder="รหัสผ่าน"></div>
  <div style="margin-top:10px;"><input type="submit" name="button" id="button" value="เข้าสู่ระบบ" class="btn btn-success btn-lg">
  <a href="register.php" class="btn btn-primary btn-lg">สมัครสมาชิก</a></div>
  </fieldset>
</form>
</div></div>
<div style=" position:absolute; bottom:0; width:100%;">
<?php include("footer.php"); ?>
</div>
</body>
</html>
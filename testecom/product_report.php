<?php require_once('Connections/dbcon.php'); ?>
<?php

if ($logoutAction){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['MM_Order']);
  header("Location: index.php");
  exit;
  }

?>

<!doctype html>
<html>
<head>
<?php include("titleheder.php"); ?>
</head>

<body>
<p><?php echo $_SESSION['MM_Username']; ?> <?php echo $_SESSION['MM_UserGroup']; ?> <?php echo $_SESSION['MM_Order']; ?><a href="<?php echo $logoutAction ?>" class="btn btn-primary">ออกจากระบบ</a></p>
<p>รายงานผลสินค้า </p>
<a class="btn btn-primary"></a>
</body>
</html>
<?php require_once('Connections/dbcon.php'); ?>
<?php

mysql_select_db($database_dbcon, $dbcon);
$query_get_p_desc = "SELECT * FROM product ORDER BY pro_id DESC";
$get_p_desc = mysql_query($query_get_p_desc, $dbcon) or die(mysql_error());
$row_get_p_desc = mysql_fetch_assoc($dbcon,$get_p_desc);
$totalRows_get_p_desc = mysql_num_rows($get_p_desc);


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
<!----------------------------------navbar---------------------------->
<?php include("navbar.php"); ?>

<!----------------------------------search---------------------------->
<?php include("search.php"); ?>



<!----------------------------------slide---------------------------->
<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">

	<div class="item active">
    <img src="image/chicago.jpg">
    </div>
    
    <div class="item">
    <img src="image/la.jpg">
    </div>

	<div class="item">
    <img src="image/ny.jpg">
    </div>
</div>

	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    
    <a class="right carousel-control" href="#myCarousel" data-slide="nexr">
    <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
</div>
<br>
<br>


<!----------------------------------สินค้าแนะนำ---------------------------->
<div class="container" style="background-color:#fff;">
<h2>สินค้าแนะนำ</h2>
<hr>
<?php include("nanum.php"); ?>
</div>
<br>
<br>



<!----------------------------------หมวดหมู่---------------------------->
<div class="container" style="background-color:#fff;" >
<h2>หมวดหมู่ : <a name="category">
<a href="index.php#category" class="btn btn-primary btn-lg">ALL</a>
<!--<a href="prod.php" class="btn btn-primary btn-lg">ALL</a> -->
      <?php do { ?>
      <a href="index.php?id=<?php echo $row_get_producttype['protype_id']; ?>#category" class="btn btn-primary btn-lg"><?php echo $row_get_producttype['protype_name']; ?></a>
        <?php } while ($row_get_producttype = mysql_fetch_assoc($get_producttype)); ?>
        
        
<!--		<a href="#category" class="btn btn-primary btn-lg">เสื้อผ้า</a> 
		<a href="#category" class="btn btn-primary btn-lg">กางเกง</a> 
		<a href="#category" class="btn btn-primary btn-lg">รองเท้า</a> 
        <a href="#category" class="btn btn-primary btn-lg">กระเป๋า</a></h2> -->
<hr>
<!--<div class="row">
<div class="col-md-3">
<div class="thumbnail">
	<img src="image/product/img02.png" class="img-responsive img-rounded" style="width:90%;">
    <br>
    เสื้อเชิ๊ตใส่สบาย
    ราคา <del>350</del>250
    
</div>

</div> -->
<!-- -->
<div class="row">
   <?php do { ?>
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="/w3images/lights.jpg">
        <img src="image/product/<?php echo $row_get_product['pro_pic']; ?>" alt="Lights" style="width:100%">
        <div class="caption">
          <p>Lorem ipsum...</p>
          <a href="#" class="btn btn-danger btn-lg">หยิบลงตระกร้า</a><a href="#" class="btn btn-primary btn-lg">รายละเอียด</a>
        </div>
      </a>
    </div>
  </div>
 <?php } while ($row_get_product = mysql_fetch_assoc($get_product)); ?>
</div>
<!-- -->


</div>
 </div>
 </div>
<br>
<br>




<!----------------------------------footer---------------------------->

<?php include("footer.php"); ?>

</body>
</html>
<?php mysql_free_result($get_producttype);?>
<?php mysql_free_result($get_product); ?>
<?php mysql_free_result($get_p_desc); ?>
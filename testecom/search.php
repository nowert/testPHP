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

<body style="font-size:20px;">
<div class="container">
	<div class="panel-body center-block">
	  <form name="form1" method="post" action="">
      <label for="keyword"></label>
       
      <div class="col-xs-3">
      <input type="text" name="keyword" id="keyword" class="form-control input-lg" placeholder="search">
      </div>
      
      <div class="col-xs-3">
      <select name="select" id="select" class="form-control input-lg">
      <option value="0" selected>เลือก</option>
      <option value="1">เสื้อ</option>
      <option value="2">กางเกง</option>
      </select>
      </div>
      
      <div class="col-xs-3">
      <select name="select" id="select" class="form-control input-lg">
      <option value="0" selected>เลือก</option>
      <option value="1">มากไปน้อย</option>
      <option value="2">น้อยไปมาก</option>
      </select>
      </div>
      
      <div class="col-xs-3">
      <input type="submit" name="button" id="button" class="btn btn-primary btn-lg" value="ค้นหา">
      </div>
      </form>
    
    </div>
</div>
</body>
</html>
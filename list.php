<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/function/database.php");

use sw\function\database;

//ดึง class database จาก folder function
$database = new database();

?>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>รายการอาหาร</title>
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
</head>

<body style="padding-top: 70px">
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark"> <a class="navbar-brand"
			href="#">ร้านอาหาร&nbsp;</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
			aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span
				class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent1">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"> <a class="nav-link" href="/index.php">หน้าหลัก <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active"> <a class="nav-link" href="#">รายการอาหาร</a></li>
			</ul>
			<a class="btn btn-outline-success my-2 my-sm-0" href="/login.php">Login</a>
		</div>
	</nav>

	<div class="container d-flex justify-content-end">
		ประเภท : 
		<form action="/list.php" method="get">
			<div class="input-group mb-3" style="width: 30rem">
			<select name="type_food" id="type_food" class="form-control">
			<option value="all">ทั้งหมด</option>
			<?php
				$data_food = $database->foodtypeAll();
				print_r($data_food);

				foreach($data_food as $item){
					echo '<option value="'.$item[0].'">'.$item[0].'</option>';
				}
			?>
			</select>
			<button type="summit" class="btn btn-success">ค้นหา</button>
			</div>
		</form>
	</div>
	<div class="container">
		<div class="row row-cols-3">
			<?php
			$data_food = $database->foodDataAll($_GET['type_food']);
			//print_r($data_food);
			foreach($data_food as $item){
			echo '<div class="col">
			<div class="card bg-dark text-white" style="max-height: 30rem"> <img class="card-img-top" src="images/card-img.png" alt="Card image cap">
				<div class="card-body"><h5 class="card-title">'.$item[1].'</h5>
				<p class="card-text">'.$item[2].'</p>
				<a href="/food.php?id='.$item[0].'" class="btn btn-primary">ดูเพิ่มเติม</a>
				</div>
				</div>
				</div>';
			}
      		?>
		</div>
	</div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"><nav aria-label="breadcrumb">
		</nav></script>
	<script src="js/bootstrap-4.4.1.js"></script>
</body>

<body style="padding-top: 70px">
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
</body>

</html>
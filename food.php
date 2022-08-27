
<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/function/database.php");

use sw\function\database;

//ดึง class database จาก folder function
$database = new database();
$data_of_food = $database->foodData($_GET["id"]);


if($_SERVER["REQUEST_METHOD"] == "POST"){
	$id = $_POST["id"];
  $point = $_POST["point"];

  $database->vote($id, $point);
  header('location:food.php?id='.$_GET["id"]);
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>อาหาร</title>
  <link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">

  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.4.1.js"></script>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap-4.4.1.js"></script>
  
  <script>
  $(document).ready(function(){
    $("#id").click(function(){
      $.post("/vote.php",
      {
        id: <?php echo $_GET["id"]; ?>,
        point: $("#point").val()
      },
      function(data,status){
        alert("โหวตสำเร็จ");
      });
    });
  });
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <a class="navbar-brand"
      href="#">ร้านอาหาร&nbsp;</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
      aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span
        class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link" href="/index.php">หน้าหลัก <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"> <a class="nav-link" href="/list.php?type_food=all">รายการอาหาร</a></li>
      </ul>
      <a class="btn btn-outline-success my-2 my-sm-0" href="/login.php">Login</a>
    </div>
  </nav>

  <div class="container d-flex justify-content-center" style="width: 40rem">
  
    <img class="d-block mx-auto" src="<?php echo $data_of_food["image"]; ?>">
  </div>
  <div class="container" style="height: 1rem"></div>
  <div class="container d-flex justify-content-center">
    <div class="card bg-dark text-white" style="width: 60rem">
      <div class="card-header text-center"><h4>ข้อมูล</h4></div>
      <div class="card-body">
        <h5 class="card-title"><?php echo $data_of_food["name"]; ?></h5>
        <p class="card-text"><?php echo $data_of_food["data"]; ?></p>
      </div>
      <div class="card-footer">วันที่โพสต์ : <?php echo $data_of_food["date"]; ?></div>
    </div>
  </div>

    <div class="container" style="height: 1rem"></div>
    <div class="container d-flex justify-content-center">
      <div class="card justify-content-center align-items-center bg-dark text-white" style="width: 60rem">
        <div class="card-header text-center">โหวต</div>
        <div class="card-body">
          <div class="input-group" style="width: 30rem">
            <select class="form-control" id="point">
              <option value="1">1คะแนน - แย่มาก</option>
              <option value="2">2คะแนน - แย่</option>
              <option value="3">3คะแนน - ใช้ได้</option>
              <option value="4">4คะแนน - ดีมาก</option>
              <option value="5">5คะแนน - ดีมาก</option>
            </select>
			      <button  id="id" value="<?php echo $_GET["id"]?>" type="summit" class="btn btn-success">โหวต</button>
            </div>
        </div>
      </div>
    </div>
</body>

</html>
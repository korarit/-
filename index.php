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
  <title>หน้าหลัก</title>
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
        <li class="nav-item active"> <a class="nav-link" href="#">หน้าหลัก <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item"> <a class="nav-link" href="/list.php?type_food=all">รายการอาหาร</a></li>
      </ul>
      <a class="btn btn-outline-success my-2 my-sm-0" href="/login.php">Login</a>
    </div>
  </nav>

  <?php
    $data_slide = $database->ImageSlide(); 
    //print_r($data);
  ?>

  <div class="container d-flex justify-content-center" style="width: 40rem">
    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: grey">
      <ol class="carousel-indicators">
        <?php 
          $num_slide = 0;
          foreach($data_slide as $item){
            if($num_slide == 0){
              echo '<li data-target="#carouselExampleIndicators1" data-slide-to="'.$num_slide.'" class="active"></li>';
            }else{
              echo '<li data-target="#carouselExampleIndicators1" data-slide-to="'.$num_slide.'"></li>';
            }

            $num_slide += 1;
          }
        ?>        
      </ol>
      <div class="carousel-inner" role="listbox">
      </div>
        <?php 
          //นำรูปขึ้น slide
          $i = 0;
          foreach($data_slide as $item){
            if($i == 0){
              echo '<div class="carousel-item active"> <img class="" src="'.$item["image"].'" alt=""><div class="carousel-caption"></div></div>';
            }else{
              echo '<div class="carousel-item"> <img class="" src="'.$item["image"].'" alt=""><div class="carousel-caption"></div></div>';
            }

            $i += 1;
          }
        ?> 
      </div>
    </div>
  </div>
  <div class="container" style="height: 1rem"></div>
  <div class="container d-flex justify-content-center" style="width: 70rem">
    <div class="card text-center md-3 bg-dark text-white" style="width: 70rem">
      <div class="card-header">ประกาศ</div>
      <div class="card-body">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ข้อมูล</th>
              <th scope="col">วันที่</th>
            </tr>
          </thead>
          <tbody>
            <?php

            //ดึงข้อมูลประกาศ
              $data_publish = $database->Getpublish();
              foreach($data_publish as $item){
                echo "<tr>
                  <th scope='row'>".$item["id"]."</th>
                  <td>".$item["id"]."</td>
                  <td>".$item["date"]."</td>
                </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="container" style="height: 1rem"></div>

  <div class="container d-flex justify-content-center" style="width: 70rem">
    <div class="card text-center md-3 bg-dark text-white" style="width: 70rem">
      <div class="card-header"><h5>ตัวอย่างอาหาร</h5></div>
    </div>
  </div>



  <div class="container" style="width: 70rem">
    <div class="row row-cols-3">
      <?php
        $data_food = $database->foodDataAll("all");
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
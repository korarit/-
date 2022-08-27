<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/function/database.php");

use sw\function\database;

//ดึง class database จาก folder function
$database = new database();

$id = $_POST["id"];
$point = $_POST["point"];

$database->vote($id, $point);
?>
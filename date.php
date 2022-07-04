<?php
date_default_timezone_set("Asia/Shanghai");
echo "当前时间是 " . date("Y-m-d h:i:s");
require_once "conn.php";
header("Content-type: text/html; charset=utf-8");

//取得表單資料

//建立資料連接
$link = create_connection();

$id = $_COOKIE['id'];

$sql = "SELECT `cellphone`, `address`, `email` FROM `members` WHERE `id` =' $id'";
$result = execute_sql($link, "web110b_12", $sql);
$row = mysqli_fetch_assoc($result);

// var_dump($result);
print_r($result);
print_r($row);
echo "<br>" . $row["cellphone"] . "<br>";
echo $row["address"] . "<br>";
echo $row["email"];

// $pd[] = new $result;

// echo $pd[1];
// $sql = "SELECT * FROM members Where account = '$account' AND password = '$password'";
// $result = execute_sql($link, "web110b_12", $sql);
// $id = mysqli_fetch_object($result)->id;
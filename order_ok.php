<?php
require_once "conn.php";
$link = create_connection();

$id = $_COOKIE["id"];
$pd_no_array = explode(",", $_COOKIE["pd_no_list"]);
$pd_name_array = explode(",", $_COOKIE["pd_name_list"]);
$price_array = explode(",", $_COOKIE["price_list"]);
$quantity_array = explode(",", $_COOKIE["quantity_list"]);
date_default_timezone_set("Asia/Shanghai");
$date = date("Y-m-d h:i:s");

for ($i = 0; $i < count($pd_name_array); $i++) {
    //計算小計
    $sub_total = $price_array[$i] * $quantity_array[$i];

    //計算總計
    // $total += $sub_total;

    //顯示各欄位資料
    // echo "<tr>";
    // echo "<td align='center'><img src='images/" . $pd_no_array[$i] . ".jpg' width='20' height='40'></td>";

    // echo "<td align='center'>" . $pd_name_array[$i] . "</td>";
    // echo "<td align='center'>$" . $price_array[$i] . "</td>";
    // echo "<td align='center'>" . $quantity_array[$i] . "</td>";
    // echo "<td align='center'>$" . $sub_total . "</td>";
    // echo "</tr>";

    $sql = "INSERT INTO `order`(`id`, `pd_name`, `pd_no`, `price`, `quantity`, `total`,`time`) VALUES ('$id','$pd_name_array[$i]','$pd_no_array[$i]','$price_array[$i]','$quantity_array[$i]','$sub_total','$date')";
    $result = execute_sql($link, "web110b_12", $sql);
}
header("location:shopping_car_clear.php");
<?php
//取得表單資料
$pd_no = $_GET["pd_no"];
$quantity = $_POST["quantity"];

//取得購物車資料
$pd_no_array = explode(",", $_COOKIE["pd_no_list"]);
$pd_name_array = explode(",", $_COOKIE["pd_name_list"]);
$price_array = explode(",", $_COOKIE["price_list"]);
$quantity_array = explode(",", $_COOKIE["quantity_list"]);

$key = array_search($pd_no, $pd_no_array);

//若數量等於0，則將該產品從購物車中刪除
if ($quantity == 0 || empty($quantity)) {
    unset($pd_no_array[$key]);
    unset($pd_name_array[$key]);
    unset($price_array[$key]);
    unset($quantity_array[$key]);
} else {
    //若數量不等於0，則更新數量
    $quantity_array[$key] = $quantity;
}

//儲存購物車資料
setcookie("pd_no_list", implode(",", $pd_no_array));
setcookie("pd_name_list", implode(",", $pd_name_array));
setcookie("price_list", implode(",", $price_array));
setcookie("quantity_list", implode(",", $quantity_array));

//導向 shopping_car.php 網頁
header("location:shopping_car.php");
<?php
//清除購物車資料
setcookie("pd_no_list", "");
setcookie("pd_name_list", "");
setcookie("price_list", "");
setcookie("quantity_list", "");

//導向到shopping_car.php網頁
header("location:shopping_car.php");
<?php
//清除 cookie 內容
setcookie("id", "");
setcookie("account", "");
setcookie("passed", "");
setcookie("pd_no_list", "");
setcookie("pd_name_list", "");
setcookie("price_list", "");
setcookie("quantity_list", "");

//將使用者導回主網頁
header("location:index.php");
exit();
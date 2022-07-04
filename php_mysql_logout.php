<?php
//清除 cookie 內容
setcookie("id", "");
setcookie("account", "");
setcookie("passed", "");

//將使用者導回主網頁
header("location:index.php");
exit();
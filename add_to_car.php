<?php
$passed = $_COOKIE["passed"];

/*  如果 cookie 中的 passed 變數不等於 TRUE
表示尚未登入網站，將使用者導向首頁 index.html    */
if ($passed != "TRUE") {
    header("location:login.html");
    exit();
}
//取得表單資料
$pd_no = $_GET["pd_no"];
$pd_name = $_GET["pd_name"];
$price = $_GET["price"];
$quantity = $_POST["quantity"];
if (empty($quantity)) {
    $quantity = 1;
}

//若購物車沒有任何項目，則直接加入產品資料
if (empty($_COOKIE["pd_no_list"])) {
    setcookie("pd_no_list", $pd_no);
    setcookie("pd_name_list", $pd_name);
    setcookie("price_list", $price);
    setcookie("quantity_list", $quantity);
} else {
    //取得購物車資料
    $pd_no_array = explode(",", $_COOKIE["pd_no_list"]);
    $pd_name_array = explode(",", $_COOKIE["pd_name_list"]);
    $price_array = explode(",", $_COOKIE["price_list"]);
    $quantity_array = explode(",", $_COOKIE["quantity_list"]);

    //判斷選擇的物品有在購物車中
    if (in_array($pd_no, $pd_no_array)) {
        //如果選擇的物品已經在購物車中，變更物品數量即可
        $key = array_search($pd_no, $pd_no_array);
        $quantity_array[$key] += $quantity;
    } else {
        //如果選擇的物品沒有在購物車中，則將物品資料加入購物車
        $pd_no_array[] = $pd_no;
        $pd_name_array[] = $pd_name;
        $price_array[] = $price;
        $quantity_array[] = $quantity;
    }

    //儲存購物車資料
    setcookie("pd_no_list", implode(",", $pd_no_array));
    setcookie("pd_name_list", implode(",", $pd_name_array));
    setcookie("price_list", implode(",", $price_array));
    setcookie("quantity_list", implode(",", $quantity_array));
}
header("location:catalog.php");
?>
<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body bgcolor="lightyellow">
    <p align="center"><img src="fig1.jpg"></p>
    <p align="center">您所選取的產品及數量已成功放入購物車！</p>
    <p align="center"><a href="catalog.php">繼續購物</a></p>
</body>

</html> -->
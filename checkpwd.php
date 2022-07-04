<?php
require_once "conn.php";
header("Content-type: text/html; charset=utf-8");

//取得表單資料
$account = $_POST["account"];
$password = $_POST["password"];

//建立資料連接
$link = create_connection();

$sql_ad = "SELECT * FROM admin Where account = '$account' AND password = '$password'";
$result_ad = execute_sql($link, "web110b_12", $sql_ad);
if (mysqli_num_rows($result_ad) == 0) {

//檢查帳號密碼是否正確
    $sql = "SELECT * FROM members Where account = '$account' AND password = '$password'";
    $result = execute_sql($link, "web110b_12", $sql);

//如果帳號密碼錯誤
    if (mysqli_num_rows($result) == 0) {
        //釋放 $result 佔用的記憶體
        mysqli_free_result($result);

        //關閉資料連接
        mysqli_close($link);

        //顯示訊息要求使用者輸入正確的帳號密碼
        echo "<script type='text/javascript'>";
        echo "alert('帳號密碼錯誤，請查明後再登入');";
        echo "history.back();";
        echo "</script>";
    }

//如果帳號密碼正確
    else {
        //取得 id 欄位
        $id = mysqli_fetch_object($result)->id;

        //釋放 $result 佔用的記憶體
        mysqli_free_result($result);

        //關閉資料連接
        mysqli_close($link);

        //將使用者資料加入 cookies
        setcookie("id", $id);
        setcookie("account", $account);
        setcookie("passed", "TRUE");
        header("location:catalog.php");
    }
} else {
    //取得 id 欄位
    $account = mysqli_fetch_object($result_ad)->account;

//釋放 $result 佔用的記憶體
    mysqli_free_result($result_ad);

//關閉資料連接
    mysqli_close($link);

//將使用者資料加入 cookies
    setcookie("account", $account);
    setcookie("passed", "TRUE");
    header("location:php_mysqli-read.php");

}
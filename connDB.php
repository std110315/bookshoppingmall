<?php
header("Content-Type:text/html;charset:utf-8");
$host = 'localhost';
$user = 'web110b_12';
$pw = '1Qaz@wsx_12';
$db = 'web110b_12';
$con = mysqli_connect($host, $user, $pw, $db);
if ($con) {
    mysqli_select_db($con, $db);
    mysqli_query($con, 'set names utf8');
    mysqli_query($con, 'set character_set_client = utf8');
    mysqli_query($con, 'set character_set_results = utf8');
    $sql = 'select * from users where 1';

} else {
    echo "連線失敗";
}
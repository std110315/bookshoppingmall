<!DOCTYPE html>
<html>

<head>
    <title>檔案上傳</title>
    <meta charset="utf-8">
</head>

<body>
    <!-- <p align="center"><img src="title.jpg"></p> -->
    <?php
require_once "conn.php";
$pd_no = $_POST["pd_no"];
$pd_name = $_POST["pd_name"];
$price = $_POST["price"];

//更改名稱
$fileName = $_FILES['myfile']['name'];
// if ($fileName != '') {
$name = explode('.', $fileName);
$newPath = $pd_no . '.' . $name[1];
//指定用來存放檔案的資料夾名稱及檔名
//$_FILES["myfile"]["name"]
$upload_dir = "./images/";
$upload_file = $upload_dir . $to = iconv("UTF-8", "Big5", $newPath);

// } elseif ($pd_no == '') {
//     echo "書號未填寫!<br>";
// } elseif ($pd_name == '') {
//     echo "書名為填寫!<br>";
// } elseif ($price == '') {
//     echo "價格未填寫!<br>";
// } else {
//     echo "未上傳圖片!!<br>";
//     $upload_file = '';
// }

//建立資料連接

$link = create_connection();

//將上傳的檔案由暫存資料夾移至指定的資料夾
if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_file)) {
    $sql = "INSERT INTO `store`(`pd_no`, `pd_name`, `price`) VALUES ('$pd_no','$pd_name','$price')";
    $result = execute_sql($link, "web110b_12", $sql);

    echo "<strong>檔案上傳成功</strong><hr>";

    //顯示檔案資訊
    echo "檔案名稱：" . $newPath . "<br>";
    echo "書號:" . $pd_no . "<br>";
    echo "書名:" . $pd_name . "<br>";
    echo "價格:" . $price . "<br>";

    // echo "暫存檔名：" . $_FILES["myfile"]["tmp_name"] . "<br>";
    // echo "檔案大小：" . $_FILES["myfile"]["size"] . "Bytes<br>";
    // echo "檔案類型：" . $_FILES["myfile"]["type"] . "<br>";
    echo "<p><a href='upload.html'>繼續上傳</a></p>";
    echo "<p><a href='php_mysqli-read.php'>會員管理主頁</a></p>";
} else {
    echo "檔案上傳失敗 (" . $_FILES["myfile"]["error"] . ")<br><br>";
    echo "<a href='javascript:history.back()'>重新上傳</a>";
}
mysqli_close($link);

?>
</body>

</html>
<?php
//檢查 cookie 中的 passed 變數是否等於 TRUE
$passed = $_COOKIE["passed"];

/*  如果 cookie 中的 passed 變數不等於 TRUE
表示尚未登入網站，將使用者導向首頁 index.html    */
if ($passed != "TRUE") {
    header("location:index.html");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>會員管理</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- <script>
    function delall() {
        console.log('del all');
        if (confirm('\\n你確定要刪除這筆資料嗎?\\n刪除後無法恢復喔!\\n')) {
            URL("location:index.html");

        }
        return false;
    }
    </script> -->

</head>

<body bgcolor="#ccc">
    <!-- <p align="center"><img src="management.jpg"></p> -->
    <p align="center">
        <a href="catalog.php" class="btn btn-success mt-5">首頁</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="modify.php" class="btn btn-success mt-5">修改會員資料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="delete.php" class="btn btn-danger mt-5">刪除會員資料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="logout.php" class="btn btn-info mt-5">登出網站</a>
    </p>
</body>

</html>
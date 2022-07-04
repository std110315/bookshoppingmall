<?php

echo "web110_12";
<!-- <?php
//檢查 cookie 中的 passed 變數是否等於 TRUE
$passed = $_COOKIE["passed"];

/*  如果 cookie 中的 passed 變數不等於 TRUE
表示尚未登入網站，將使用者導向首頁 index.html    */
if ($passed = "TRUE") {
    header("location:index.html");
    exit();
}
?>
<?php echo $_COOKIE["account"] ?>
<?php for ($i = 0; $i <= 100 - 2 * strlen($_COOKIE["account"]); $i++) {
    echo "&nbsp;";
}
?> -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="js/logoCtrl.js"></script>
        -->
    <script src="jquery-3.6.0.min.js"></script>
    <script>
    $(function() {
        $('#login').css('display', 'hidden');
        // $('#logo').click(function () {
        //     // alert('logo');
        //     window.location.href = 'catalog.php';
        // });
    });
    // if (condition) {
    //     function login() {
    //         document.getElementById('login').setAttribute(href);
    //     }
    // }
    </script>
    <style>
    #logo a {
        cursor: pointer;
        color: white;
        text-decoration: none;
    }
    </style>
</head>

<body bgcolor="#9CCDCD">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark navBg">
        <h1 class="navbar-brand textShadow" id="logo"><a href="catalog.php" target="bottom">ShoppingMall</a></h1>
        <button data-toggle="collapse" data-target="#subMenu" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse justify-content-end" id="subMenu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="catalog.php" class="nav-link" title="" data-toggle="tooltip" target="bottom">產品主頁</a>
                </li>
                <li class="nav-item">
                    <a href="login.html" class="nav-link" title="" data-toggle="tooltip" id="login" target="bottom"
                        onclick="login()">登入 </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link" title="" data-toggle="tooltip" id="logout" target="bottom">登出
                    </a>
                </li>

                <li class="nav-item">
                    <a href="join.html" class="nav-link" title="" data-toggle="tooltip" target="bottom">註冊</a>
                </li>
                <li class="nav-item">
                    <a href="shopping_car.php" class="nav-link" data-toggle="tooltip" target="bottom"><img
                            src="images/shopping-cart.png" width="25" height="25" /></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- <table align="center" width="60%" border="0">
            <tr height="30" bgcolor="#EDF5F5" align="center">
                <td><a href="catalog.php" target="bottom">產品型錄</a></td>
                <td><a href="shopping_car.php" target="bottom">檢視購物車</a></td>
                <td><a href="print_order.php" target="bottom">列印訂購單</a></td>
                <td><a href="../member/modify.php" target="bottom">會員管理</a></td>
            </tr>
        </table> -->
</body>

</html>

?>

<?php
$passed = $_COOKIE["passed"];
$account = $_COOKIE["account"];

/*  如果 cookie 中的 passed 變數不等於 TRUE
表示尚未登入網站，將使用者導向首頁 index.html    */
if ($passed != "TRUE") {
    header("location:login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <style>
    #logo a {
        cursor: pointer;
        color: white;
        text-decoration: none;
    }

    nav {
        height: 60px;
    }

    nav ul .nav-item {
        padding-top: 5px;

    }

    table {
        margin-top: 10px;
    }
    </style>
</head>

<body bgcolor="LightYellow">

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





                <!-- <li class='nav-item'>;
                    <a href='logout.php' class='nav-link' title='' data-toggle='tooltip' id='logout' target='bottom'>登出
                    </a>;
                </li>; -->

                <?php
if ($passed != true) {
    echo "<li class='nav-item'>";
    echo "<a href='login.html' class='nav-link' title='' data-toggle='tooltip' id='login'
                        target='bottom' onclick='login()'><span class='lo'>登入</span> </a>";
    echo "</li>";
} else {

    echo "<li class='nav-item dropdown'>";
    echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDarkDropdownMenuLink' role='button'
                        data-bs-toggle='dropdown' aria-expanded='false'>$account</a></a>";
    echo "<ul class='dropdown-menu dropdown-menu-dark' aria-labelledby='navbarDarkDropdownMenuLink'>";
    echo " <li><a class='dropdown-item' href='modify.php'>我的帳戶</a></li>";
    echo "<li><a class='dropdown-item' href='order_detail.php'>購買清單</a></li>";

    echo "<li><a href='logout.php' class='dropdown-item' id='logout'>登出
                            </a></li>";
    echo "</ul>";

    echo "</li>";

}

?>

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


    <table border="0" align="center" width="800">
        <tr bgcolor="#ACACFF" height="30" align="center">
            <td>圖片</td>
            <td>書名</td>
            <td>定價</td>
            <td>數量</td>
            <td>小計</td>
            <td>變更數量</td>
        </tr>
        <?php
//若購物車是空的，就顯示 "目前購物車內沒有任何產品及數量" 訊息
if (empty($_COOKIE["pd_no_list"])) {
    echo "<tr align='center'>";
    echo "<td colspan='6'>目前購物車內沒有任何產品及數量！</td>";
    echo "</tr>";
} else {
    //取得購物車資料
    $pd_no_array = explode(",", $_COOKIE["pd_no_list"]);
    $pd_name_array = explode(",", $_COOKIE["pd_name_list"]);
    $price_array = explode(",", $_COOKIE["price_list"]);
    $quantity_array = explode(",", $_COOKIE["quantity_list"]);

    //顯示購物車內容
    $total = 0;
    for ($i = 0; $i < count($pd_no_array); $i++) {
        //計算小計
        $sub_total = $price_array[$i] * $quantity_array[$i];

        //計算總計
        $total += $sub_total;

        //顯示各欄位資料
        echo "<form method='post' action='change.php?pd_no=" .
            $pd_no_array[$i] . "'>";
        echo "<tr bgcolor='#EDEAB1'>";
        echo "<td align='center'><img src='images/" . $pd_no_array[$i] . ".jpg' width='50' height='50'></td>";
        echo "<td align='center'>" . $pd_name_array[$i] . "</td>";
        echo "<td align='center'>$" . $price_array[$i] . "</td>";
        echo "<td align='center'><input type='text' name='quantity' value='" .
            $quantity_array[$i] . "' size='5'></td>";
        echo "<td align='center'>$" . $sub_total . "</td>";
        echo "<td align='center'><input type='submit' value='修改'></td>";
        echo "</tr>";
        echo "</form>";
    }

    echo "<tr align='right' bgcolor='#EDEAB1'>";
    echo "<td colspan='6'>總金額 = " . $total . "</td>";
    echo "</tr>";
    echo "<tr align='center'>";
    echo "<td colspan='6'>" . "<br><input type='button' value='結帳'
              onClick=\"javascript:window.open('order.php','_self')\">";
    echo "</td>";
    echo "</tr>";
}
// header("location:order.php");
?>
    </table>
</body>

</html>
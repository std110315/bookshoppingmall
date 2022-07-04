<?php
$passed = $_COOKIE['passed'];
$account = $_COOKIE['account'];
//若購物車是空的，就顯示尚未選購產品
if (empty($_COOKIE["pd_no_list"])) {
    echo "<script type='text/javascript'>";
    echo "alert('您尚未選購任何產品');";
    echo "history.back();";
    echo "</script>";
}
require_once "conn.php";
$link = create_connection();

$id = $_COOKIE['id'];
$sql = "SELECT `cellphone`, `address`, `email` FROM `members` WHERE `id` =' $id'";
$result = execute_sql($link, "web110b_12", $sql);
$row = mysqli_fetch_assoc($result);

//取得 id 欄位

$cellphone = $row['cellphone'];
$address = $row['address'];
$email = $row['email'];

mysqli_free_result($result);

//關閉資料連接
mysqli_close($link);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />

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
    <script>
    function check() {

        alert("訂單已成功送出");

    }
    </script>
    <style>
    table {
        width: 684px;
        margin-top: 10px;
    }

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
    </style>

</head>

<body>
    <!-- <h3>注意事項</h3>
    <ol type="1">
        <li>
            訂購方法一：請填妥信用卡專用訂購單後裝訂，免貼郵票，
            直接投郵即可，亦可放大傳真至 02-23695588。
        </li>
        <li>
            訂購方法二：請利用郵局劃撥單，填妥姓名、戶名、書名、數量、
            電話，直接至郵局劃撥付款。帳號：12345678戶名：快樂書城
        </li>
        <li>
            寄書與補書：您將於付款之後的3-5天收到書籍，若沒有收到，
            請來電洽詢 02-23695599。
        </li>
    </ol> -->
    <!-- <hr> -->

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

                <li class='nav-item'>
                    <a href='login.html' class='nav-link' title='' data-toggle='tooltip' id='login' target='bottom'
                        onclick='login()'><span class='lo'>登入</span> </a>
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

    <table border="1" bgcolor="white" rules="cols" align="center" cellpadding="5">
        <tr height="25">
            <td colspan="5" align="Center" bgcolor="#CCCC00">個人資料</td>
        </tr>
        <tr height="25">
            <td colspan="5">姓名：<?php echo $_COOKIE["account"];
//                  for ($i = 0; $i <= 100 - 2 * strlen($_COOKIE["account"]); $i++) {
// echo "&nbsp;";

?>
            </td>
        </tr>
        <tr height="25">
            <td colspan="5">電話：<?php echo $cellphone;

//    echo" <u>";
//                 for ($i = 0; $i <= 100; $i++) {
//     echo "&nbsp;";

// }
 ?></u>
            </td>
        </tr>
        <tr height="25">
            <td colspan="5">地址：<?php echo $address;

// echo " <u>";
// for ($i = 0; $i <= 100; $i++) {
//     echo "&nbsp;";

// }
 ?></u>
            </td>
        </tr>
        <!-- <tr height="25">
            <td colspan="5">
                郵寄方式：□國內限時&nbsp;&nbsp;&nbsp;&nbsp;□國內掛號 (另加20元郵資)
            </td>
        </tr>
        <tr height="25">
            <td colspan="5">
                付款方式：□JCB CARD&nbsp;&nbsp;&nbsp;□VISA CARD&nbsp;&nbsp;&nbsp;□MASTER CARD
            </td>
        </tr>
        <tr height="25">
            <td colspan="5">
                信用卡卡號：<u><?php for ($i = 0; $i <= 89; $i++) {
    echo "&nbsp;";
}
?></u>
            </td>
        </tr>
        <tr height="25">
            <td colspan="5">
                有效日期：<u>西元<?php for ($i = 0; $i <= 85; $i++) {
    echo "&nbsp;";
}
?></u>
            </td>
        </tr>
        <tr height="25">
            <td colspan="5">
                簽名(與信用卡簽名相同)：<u><?php for ($i = 0; $i <= 66; $i++) {
    echo "&nbsp;";
}
?></u>
            </td>
        </tr>
        <tr height="25">
            <td colspan="5">
                支付總金額：<u><?php for ($i = 0; $i <= 89; $i++) {
    echo "&nbsp;";
}
?></u>
            </td>
        </tr>
        <tr height="25">
            <td colspan="5">
                開立發票：□二聯式&nbsp;&nbsp;&nbsp;&nbsp;□三聯式
            </td>
        </tr>
        <tr height="25">
            <td colspan="5">
                發票地址：<u><?php for ($i = 0; $i <= 93; $i++) {
    echo "&nbsp;";
}
?></u>
            </td>
        </tr>
        <tr height="25">
            <td colspan="5">
                統一編號：<u><?php for ($i = 0; $i <= 93; $i++) {
    echo "&nbsp;";
}
?></u>
            </td>
        </tr>  -->
        <tr height="25">
            <td colspan="5" align="center" bgcolor="#CCCC00">訂單細目</td>
        </tr>
        <tr height="25" align="center" bgcolor="FFFF99">
            <td>圖片</td>
            <td>書名</td>
            <td>定價</td>
            <td>數量</td>
            <td>小計</td>
        </tr>
        <?php

//取得購物車資料
$pd_no_array = explode(",", $_COOKIE["pd_no_list"]);
$pd_name_array = explode(",", $_COOKIE["pd_name_list"]);
$price_array = explode(",", $_COOKIE["price_list"]);
$quantity_array = explode(",", $_COOKIE["quantity_list"]);

//顯示購物車內容
$total = 0;
for ($i = 0; $i < count($pd_name_array); $i++) {
    //計算小計
    $sub_total = $price_array[$i] * $quantity_array[$i];

    //計算總計
    $total += $sub_total;

    //顯示各欄位資料
    echo "<tr>";
    echo "<td align='center'><img src='images/" . $pd_no_array[$i] . ".jpg' width='20' height='40'></td>";

    echo "<td align='center'>" . $pd_name_array[$i] . "</td>";
    echo "<td align='center'>$" . $price_array[$i] . "</td>";
    echo "<td align='center'>" . $quantity_array[$i] . "</td>";
    echo "<td align='center'>$" . $sub_total . "</td>";
    echo "</tr>";
}
echo "<tr align='right' bgcolor='#CCCC00'>";
echo "<td colspan='5'>總金額 = " . $total . "</td>";
echo "</tr>";
echo "<tr align='right' bgcolor='#CCCC00'>";

echo "<td colspan='5'><a href='order_ok.php' class='btn btn-primary btn-sm' onclick='check()'>訂單送出</a></td>";
echo "</tr>";

?>
    </table>
</body>

</html>
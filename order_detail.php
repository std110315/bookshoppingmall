<?php
$passed = $_COOKIE['passed'];
$account = $_COOKIE['account'];
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

    <style>
    table {
        width: 684px;
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



                <?php
if ($passed != true) {
    echo "<li class='nav-item'>";
    echo "<a href='login.html' class='nav-link' title='' data-toggle='tooltip' id='login' target='bottom'
                        onclick='login()'><span class='lo'>登入</span> </a>";
    echo "</li>";
} else {

    echo "<li class='nav-item dropdown'>";
    echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDarkDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>$account</a></a>";
    echo "<ul class='dropdown-menu dropdown-menu-dark' aria-labelledby='navbarDarkDropdownMenuLink'>";
    echo " <li><a class='dropdown-item' href='modify.php'>我的帳戶</a></li>";
    echo "<li><a class='dropdown-item' href='order_detail.php'>購買清單</a></li>";

    echo "<li><a href='logout.php' class='dropdown-item' id='logout'>登出
                    </a></li>";
    echo "</ul>";

    echo "</li>";

}

?>

                <!-- <li class='nav-item'>;
                    <a href='logout.php' class='nav-link' title='' data-toggle='tooltip' id='logout' target='bottom'>登出
                    </a>;
                </li>; -->



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
        <?php for ($i = 0; $i <= 93; $i++) {
    echo "&nbsp;";
}
?></u>
        </td>
        </tr>
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
require_once "conn.php";
$id = $_COOKIE['id'];

$link = create_connection();
$sql = "SELECT * FROM `order` where `id`='$id' ORDER BY `time`";
$result = execute_sql($link, "web110b_12", $sql);

$total_records = mysqli_num_rows($result);

//列出所有產品資料
for ($i = 0; $i < $total_records; $i++) {
    //取得產品資料
    $row = mysqli_fetch_assoc($result);

    //顯示產品各欄位的資料

    echo "<tr align='center' bgcolor='#EDEAB1'>";
    echo "<td>" . "<img src='images/" . $row["pd_no"] . ".jpg' width='50' height='50'></td>";
    echo "<td>" . $row["pd_name"] . "</td>";

    echo "<td>$" . $row["price"] . "</td>";
    echo "<td>" . $row["quantity"] . "</td>";

    echo "<td>$" . $row["total"] . "</td>";
    // echo "<td>" . $row["time"] . "</td>";
    echo "</tr>";

}

//釋放資源及關閉資料連接
mysqli_free_result($result);
mysqli_close($link);
?>
    </table>
</body>

</html>
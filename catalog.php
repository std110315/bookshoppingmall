<?php
$passed = $_COOKIE['passed'];
$account = $_COOKIE['account'];

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

    <script src="jquery-3.6.0.min.js"></script>
    <script>
    function car() {
        console.log('car');
        alert("商品已成功加入購物車");

    }
    </script>
    <style>
    #logo a {
        cursor: pointer;
        color: white;
        text-decoration: none;
    }

    button {
        background-color: #c0c0c0;
        /* Green*/
        border: none;
        color: white;
    }

    table {
        margin-top: 10px;
    }


    table td {
        padding-top: 15px;
        width: 225px;
        height: 167px;
    }

    nav {
        height: 60px;
    }

    nav ul .nav-item {
        padding-top: 5px;

    }
    </style>
</head>

<body bgcolor="#ccc">
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




    <table border="0" align="center" width="900" cellspacing="2">
        <!-- <tr bgcolor="#BABA76" height="30" align="center">
            <td>書號</td>
            <td>書號</td>
            <td>書名</td>
            <td>定價</td>
            <td>輸入數量</td>
            <td>進行訂購</td>
        </tr> -->
        <?php
require_once "conn.php";

//建立資料連接
$link = create_connection();

//篩選出所有產品資料
$sql = "SELECT * FROM store";
$result = execute_sql($link, "web110b_12", $sql);

//計算總記錄數
$total_records = mysqli_num_rows($result);

//列出所有產品資料
echo "<tr align='center' bgcolor='#ccc'>";

for ($i = 1; $i < $total_records + 1; $i++) {
    //取得產品資料
    $row = mysqli_fetch_assoc($result);

    //顯示產品各欄位的資料
    echo "<form method='post' action='add_to_car.php?pd_no=" .
    $row["pd_no"] . "&pd_name=" . urlencode($row["pd_name"]) .
        "&price=" . $row["price"] . "'>";
    if ($i % 3 == 1) {echo "<tr align='center' bgcolor='#c0c0c0
'>";}
    echo "<td>" . "<img src='images/" . $row["pd_no"] . ".jpg' width='80' height='80'><br>";
    echo $row["pd_no"] . "<br>";
    echo $row["pd_name"] . "<br>";
    echo "$" . $row["price"] . "<br>";
    echo "<input type='text' name='quantity' size='1' value='1'>&emsp;";
    echo "<button type='submit' onclick='car()'
'> <img src='images/shopping-cart.png' width='15' height='15'></button></td>";
    if ($i % 3 == 0) {echo "</tr>";}

    echo "</form>";
}
echo "</tr>";

//釋放資源及關閉資料連接
mysqli_free_result($result);
mysqli_close($link);
?>
    </table>
</body>

</html>
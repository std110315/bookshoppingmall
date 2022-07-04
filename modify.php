<?php
//檢查 cookie 中的 passed 變數是否等於 TRUE
$passed = $_COOKIE["passed"];

//如果 cookie 中的 passed 變數不等於 TRUE
//表示尚未登入網站，將使用者導向首頁 index.html
if ($passed != "TRUE") {
    header("location:index.html");
    exit();
}

//如果 cookie 中的 passed 變數等於 TRUE
//表示已經登入網站，取得使用者資料
else {
    require_once "conn.php";

    $id = $_COOKIE["id"];

    //建立資料連接
    $link = create_connection();

    //執行 SELECT 陳述式取得使用者資料
    $sql = "SELECT * FROM members Where id = $id";
    $result = execute_sql($link, "web110b_12", $sql);

    $row = mysqli_fetch_assoc($result);
    ?>


<!DOCTYPE html>
<html>

<head>
    <title>修改會員資料</title>
    <meta charset="utf-8">

    <script type="text/javascript">
    function check_data() {
        if (document.myForm.password.value.length == 0) {
            alert("「使用者密碼」一定要填寫哦...");
            return false;
        }
        if (document.myForm.password.value.length > 10) {
            alert("「使用者密碼」不可以超過 10 個字元哦...");
            return false;
        }
        if (document.myForm.re_password.value.length == 0) {
            alert("「密碼確認」欄位忘了填哦...");
            return false;
        }
        if (document.myForm.password.value != document.myForm.re_password.value) {
            alert("「密碼確認」欄位與「使用者密碼」欄位一定要相同...");
            return false;
        }
        if (document.myForm.name.value.length == 0) {
            alert("您一定要留下真實姓名哦！");
            return false;
        }
        if (document.myForm.year.value.length == 0) {
            alert("您忘了填「出生年」欄位了...");
            return false;
        }
        if (document.myForm.month.value.length == 0) {
            alert("您忘了填「出生月」欄位了...");
            return false;
        }
        if (document.myForm.month.value > 12 | document.myForm.month.value < 1) {
            alert("「出生月」應該介於 1-12 之間哦！");
            return false;
        }
        if (document.myForm.day.value.length == 0) {
            alert("您忘了填「出生日」欄位了...");
            return false;
        }
        if (document.myForm.month.value == 2 & document.myForm.day.value > 29) {
            alert("二月只有 28 天，最多 29 天");
            return false;
        }
        if (document.myForm.month.value == 4 | document.myForm.month.value == 6 |
            document.myForm.month.value == 9 | document.myForm.month.value == 11) {
            if (document.myForm.day.value > 30) {
                alert("4 月、6 月、9 月、11 月只有 30 天哦！");
                return false;
            }
        } else {
            if (document.myForm.day.value > 31) {
                alert("1 月、3 月、5 月、7 月、8 月、10 月、12 月只有 31 天哦！");
                return false;
            }
        }
        if (document.myForm.day.value > 31 | document.myForm.day.value < 1) {
            alert("出生日應該在 1-31 之間");
            return false;
        }
        myForm.submit();
    }
    </script>
    <style>
    table {
        width: 500px;
        height: 500px;
        background-color: #cccc;
        /* border: #fff; */
        border-radius: 10px;
    }

    table th {
        font-size: 20px;
        text-align: center;
    }
    </style>
</head>

<body>

    <form name="myForm" method="post" action="update.php">
        <table align="center">
            <tr>
                <th colspan="2" bgcolor="#99FF99" align="center">
                    <font>會員資料修改</font>
                </th>
            </tr>
            <tr>
                <td align="right">使用者帳號：</td>
                <td><?php echo $row["account"] ?></td>
            </tr>
            <tr bgcolor="#99FF99">
                <td align="right">使用者密碼：</td>
                <td>
                    <input type="password" name="password" size="15" value="<?php echo $row["password"] ?>">

                </td>
            </tr>
            <tr bgcolor="#99FF99">
                <td align="right">密碼確認：</td>
                <td>
                    <input type="password" name="re_password" size="15" value="<?php echo $row["password"] ?>">

                </td>
            </tr>
            <tr bgcolor="#99FF99">
                <td align="right">姓名：</td>
                <td><input type="text" name="name" size="8" value="<?php echo $row["name"] ?>"></td>
            </tr>
            <tr bgcolor="#99FF99">
                <td align="right">性別：</td>
                <td>
                    <input type="radio" name="sex" value="男" checked>男
                    <input type="radio" name="sex" value="女">女
                </td>
            </tr>
            <tr bgcolor="#99FF99">
                <td align="right">生日：</td>
                <td>民國
                    <input type="text" name="year" size="2" value="<?php echo $row["year"] ?>">年
                    <input type="text" name="month" size="2" value="<?php echo $row["month"] ?>">月
                    <input type="text" name="day" size="2" value="<?php echo $row["day"] ?>">日
                </td>
            </tr>
            <tr bgcolor="#99FF99">
                <td align="right">行動電話：</td>
                <td>
                    <input type="text" name="cellphone" size="20" value="<?php echo $row["cellphone"] ?>">

                </td>
            </tr>
            <tr bgcolor="#99FF99">
                <td align="right">地址：</td>
                <td><input type="text" name="address" size="45" value="<?php echo $row["address"] ?>"></td>
            </tr>
            <tr bgcolor="#99FF99">
                <td align="right">E-mail 帳號：</td>
                <td><input type="text" name="email" size="30" value="<?php echo $row["email"] ?>"></td>
            </tr>
            <tr bgcolor="#99FF99">
                <td align="right">備註：</td>
                <td><textarea name="remark" rows="4" cols="45"><?php echo $row["remark"] ?></textarea></td>
            </tr>
            <tr bgcolor="#99FF99">
                <td colspan="2" align="CENTER">
                    <input type="button" value="修改資料" onClick="check_data()">
                    <input type="reset" value="重新填寫">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
//釋放資源及關閉資料連接
    mysqli_free_result($result);
    mysqli_close($link);
}
?>
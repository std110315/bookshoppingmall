<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>
table {
    width: 500px;
    height: 500px;
    background-color: #cccccc;
    border: #fff;
    border-radius: 10px;
}

table th {
    font-size: 20px;
    text-align: center;
}
</style>

<?php
if (isset($_POST['action']) && ($_POST['action']) == "create") {

    require_once "connDB.php";
    $sql = "INSERT INTO members(account,password,name,sex,year,month,day,cellphone,address,email,remark)VALUES(";
    $sql .= "'" . $_POST["account"] . "',";
    $sql .= "'" . $_POST["password"] . "',";
    $sql .= "'" . $_POST["name"] . "',";
    $sql .= "'" . $_POST["sex"] . "',";
    $sql .= "'" . $_POST["year"] . "',";
    $sql .= "'" . $_POST["month"] . "',";
    $sql .= "'" . $_POST["day"] . "',";
    $sql .= "'" . $_POST["cellphone"] . "',";
    $sql .= "'" . $_POST["address"] . "',";
    $sql .= "'" . $_POST["email"] . "',";
    $sql .= "'" . $_POST["remark"] . "')";

    mysqli_query($con, $sql);
    mysqli_close($con);
    header("Location:php_mysqli-read.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 align='center'>會員資料管理系統 - 新增資料</h1>
    <p align='center'><a href="php_myaqli_read.php"></a> </p>
    <form action="" method="post">
        <table border="1" align='center' cellpadding="4">
            <tr>
                <th>欄位</th>
                <th>資料</th>
            </tr>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="account" id="account" required></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="text" name="password" id="password" required></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name" id="name" required></td>
            </tr>
            <tr>
                <td>性別</td>
                <td><input type="radio" name="sex" value="男" checked>男
                    <input type="radio" name="sex" value="女">女
                </td>
            </tr>
            <tr>
                <td>生日</td>
                <td><input type="text" name="year" id="year" size=2 required>年<input type="text" name="month" id="month"
                        size=2>月<input type="day" name="day" id="day" size=2>日</td>
            </tr>
            <tr>
                <td>手機</td>
                <td><input type="text" name="cellphone" id="cellphone" required></td>
            </tr>
            <tr>
                <td>地址</td>
                <td><input type="text" name="address" id="address" required></td>
            </tr>
            <tr>
                <td>郵件</td>
                <td>
                    <input type="text" name="email" id="email" required>
                </td>
            </tr>
            <tr>
                <td>備註</td>
                <td>
                    <input type="text" name="remark" id="remark">
                </td>
            </tr>
            <tr>
                <td colspan="2" align='center'>
                    <input type="hidden" name="action" value="create">
                    <input type="submit" name="button" id="button" class='btn btn-primary' value="新增資料">
                    <input type="reset" name="button2" id="button2" class='btn btn-primary' value="重新填寫">
                </td>
            </tr>

        </table>
    </form>
</body>

</html>
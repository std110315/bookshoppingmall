<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<?php
require_once "connDB.php";

if (isset($_POST["action"]) && ($_POST["action"] == "update")) {
    $sql = "UPDATE `students` SET";
    $sql .= "`account`='" . $_POST["account"] . "',";
    $sql .= "`password`='" . $_POST["password"] . "',";
    $sql .= "`year`='" . $_POST["year"] . "',";
    $sql .= "`month`='" . $_POST["month"] . "',";
    $sql .= "`day`='" . $_POST["day"] . "',";
    $sql .= "`cellphone`='" . $_POST["cellphone"] . "',";
    $sql .= "`address`='" . $_POST["address"] . "',";
    $sql .= "`email`='" . $_POST["email"] . "',";
    $sql .= "`remark`='" . $_POST["remark"] . "'  ";
    $sql .= "WHERE `id` = " . $_POST["id"];

    // echo $sql;
    // exit();

    mysqli_query($con, $sql);

    mysqli_free_result($result);
    mysqli_close($con);
    header("Location:php_mysqli-read.php");

}

$sql = "SELECT * FROM `members` WHERE `id` = " . $_GET['id'];
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>

<body>
    <h1 align='center'>會員資料管理系統 - 修改資料</h1>
    <p align='center'><a href="php_myaqli_read.php"></a> </p>
    <form action="" method="post">
        <table border="1" align='center' cellpadding="4">
            <tr>
                <th>欄位</th>
                <th>資料</th>
            </tr>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="account" id="account" value="<?php echo $row['account']; ?>"></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="text" name="password" id="password" value="<?php echo $row['password']; ?>"></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name" id="name" value="<?php echo $row['name']; ?>"></td>
            </tr>
            <tr>
                <td>sex</td>
                <td><input type="radio" name="sex" value="男" <?php if ($row["sex"] == "男") {
    echo "checked";}?>>男
                    <input type="radio" name="cSex" value="女" <?php if ($row["sex"] == "女") {
    echo "checked";}?>>女


                </td>
            </tr>
            <tr>
                <td>生日</td>
                <td>民國
                    <input type="text" name="year" size="2" value="<?php echo $row["year"] ?>">年
                    <input type="text" name="month" size="2" value="<?php echo $row["month"] ?>">月
                    <input type="text" name="day" size="2" value="<?php echo $row["day"] ?>">日
                </td>
            </tr>
            <tr>
                <td>電話</td>
                <td>
                    <input type="text" name="cellphone" id="cellphone" value="<?php echo $row['cellphone']; ?>"
                        required>
                </td>
            </tr>
            <tr>
                <td>郵件</td>
                <td>
                    <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" required>
                </td>
            </tr>

            <tr>
                <td>地址</td>
                <td>
                    <input type="text" name="address" id="address" value="<?php echo $row['address']; ?>" required>
                </td>
            </tr>

            <tr>
                <td colspan="2" align='center'>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="button" id="button" class='btn btn-success' value="更新資料">
                    <input type="reset" name="button2" id="button2" class='btn btn-danger' value="重新填寫">
                </td>
            </tr>

        </table>
    </form>
</body>

</html>
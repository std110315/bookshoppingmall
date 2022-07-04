<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<?php
require_once "connDB.php";

if (isset($_POST["action"]) && ($_POST["action"] == "delete")) {
    $sql = "DELETE FROM `students` WHERE `cID` = " . $_POST["cID"];
    mysqli_query($con, $sql);

    mysqli_free_result($result);
    mysqli_close($con);
    header("Location:php_mysqli-read.php");

}
$sql = "SELECT * FROM `students` WHERE `cID` = " . $_GET['cID'];
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
</head>

<body>
    <h1 align='center'>學生資料管理系統 - 刪除資料</h1>
    <p align='center'><a href="php_myaqli_read.php"></a> </p>
    <form action="" method="post" onsubmit="return confirm('\n 確定要刪除這筆資料嗎');">
        <table border="1" align='center' cellpadding="4" class='table table-dark'>
            <tr>
                <th>欄位</th>
                <th>資料</th>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="cName" id="cName" value="<?php echo $row['cName']; ?>"></td>
            </tr>
            <tr>
                <td>性別</td>
                <td><input type="radio" name="cSex" value="M" <?php if ($row["cSex"] == "M") {
    echo "checked";}?>>men
                    <input type="radio" name="cSex" value="F" <?php if ($row["cSex"] == "F") {
    echo "checked";}?>>women


                </td>
            </tr>
            <tr>
                <td>生日</td>
                <td><input type="date" name="cBirthday" id="cBirthday" value="<?php echo $row['cBirthday']; ?>"
                        required></td>
            </tr>
            <tr>
                <td>郵件</td>
                <td>
                    <input type="text" name="cEmail" id="email" value="<?php echo $row['cEmail']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>電話</td>
                <td>
                    <input type="text" name="cPhone" id="cPhone" value="<?php echo $row['cPhone']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>地址</td>
                <td>
                    <input type="text" name="cAddr" id="cAddr" value="<?php echo $row['cAddr']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>身高</td>
                <td>
                    <input type="number" name="cHeight" id="cHeight" value="<?php echo $row['cHeight']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>體重</td>
                <td>
                    <input type="number" name="cWeight" id="cWeight" value="<?php echo $row['cWeight']; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td colspan="2" align='center'>
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="cID" value="<?php echo $row['cID']; ?>">
                    <input type="submit" name="button" id="button" class='btn btn-success' value="刪除資料">&emsp;
                    <input type="reset" name="button2" id="button2" class='btn btn-success' value="取消">
                </td>
            </tr>

        </table>
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    table,
    td {
        border-collapse: collapse;
    }
    </style>

</head>

<body>

    <h1 align='center'>學生資料管理系統</h1>
    <p align='center'>
    <table border='1'>
        <tr>
            <th>座號</th>
            <th>姓名</th>
            <th>性別</th>
            <th>生日</th>
            <th>電子郵件</th>
            <th>電話</th>
            <th>住址</th>
            <th>身高</th>
            <th>體重</th>
        </tr>
        <?php
require_once "connDB.php";
$sql = "SELECT * FROM `students`";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    ?><tr align='center'>
            <td>
                <?php echo $row['cID']; ?>
            </td>
            <td>
                <?php echo $row['cName']; ?>
            </td>
            <td>
                <?php echo $row['cSex']; ?>
            </td>
            <td>
                <?php echo $row['cBirthday']; ?>
            </td>
            <td>
                <?php echo $row['cEmail']; ?>
            </td>
            <td>
                <?php echo $row['cPhone']; ?>
            </td>
            <td>
                <?php echo $row['cAddr']; ?>
            </td>
            <td>
                <?php echo $row['cHeight']; ?>
            </td>
            <td>
                <?php echo $row['cWeight']; ?>
            </td>

        </tr>

        <?php }?>

    </table>
    </p>
</body>

</html>
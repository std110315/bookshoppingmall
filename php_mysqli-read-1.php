<?php

echo "<style>
table,
td {
    border-collapse: collapse;
}
</style>
<h1 align='center'>學生資料管理系統</h1>
";
require_once "connDB.php";

$sql = "SELECT * FROM `students`";
$result = mysqli_query($con, $sql);

// echo "  {$row['cID']}
//         {$row['cName']}
//         {$row['cSex']}
//         {$row['cBirthday']}
//         {$row['cEmail']}
//         {$row['cPhone']}
//         {$row['cAddr']}
//         {$row['cHeight']}
//         {$row['cWeight']}
//         <br>";
echo "<p align='center'>
    <table border='1'>
";
echo "<tr>
    <th>座號</th>
    <th>姓名</th>
    <th>性別</th>
    <th>生日</th>
    <th>電子郵件</th>
    <th>電話</th>
    <th>住址</th>
    <th>身高</th>
    <th>體重</th></tr>
";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr align='center'>";
    echo "
        <td>{$row['cID']}</td>
        <td>{$row['cName']}</td>
        <td>{$row['cSex']}</td>
        <td>{$row['cBirthday']}</td>
        <td>{$row['cEmail']}</td>
        <td>{$row['cPhone']}</td>
        <td>{$row['cAddr']}</td>
        <td>{$row['cHeight']}</td>
        <td>{$row['cWeight']}</td>
        ";

    echo "</tr>";

}
echo "</table></p>";
mysqli_free_result($result);
mysqli_close($con);

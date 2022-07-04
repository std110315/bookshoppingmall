<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="0" align="center" width="800" cellspacing="2">
        <tr bgcolor="#BABA76" height="30" align="center">
            <th>id</th>
            <th>書名</th>
            <th>書號</th>
            <th>定價</th>
            <th>數量</th>
            <th>金額</th>
            <th>時間</th>
        </tr>


        <?php
require_once "conn.php";

$link = create_connection();
$sql = "SELECT * FROM `order`  ORDER BY `time`,`id`";
$result = execute_sql($link, "web110b_12", $sql);

$total_records = mysqli_num_rows($result);

//列出所有產品資料
for ($i = 0; $i < $total_records; $i++) {
    //取得產品資料
    $row = mysqli_fetch_assoc($result);

    //顯示產品各欄位的資料

    echo "<tr align='center' bgcolor='#EDEAB1'>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["pd_name"] . "</td>";
    echo "<td>" . $row["pd_no"] . "</td>";
    echo "<td>$" . $row["price"] . "</td>";
    echo "<td>" . $row["quantity"] . "</td>";

    echo "<td>$" . $row["total"] . "</td>";
    echo "<td>" . $row["time"] . "</td>";
    echo "</tr>";

}

//釋放資源及關閉資料連接
mysqli_free_result($result);
mysqli_close($link);
?>
    </table>
</body>

</html>
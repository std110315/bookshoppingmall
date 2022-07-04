<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<?php
$passed = $_COOKIE["passed"];
$account = $_COOKIE["account"];

/*  如果 cookie 中的 passed 變數不等於 TRUE
表示尚未登入網站，將使用者導向首頁 index.html    */
if ($passed != "TRUE" && $account != "admin") {
    header("location:../index.html");
    exit();
}
//示範將 html tag 嵌入到 php 內
echo "<script>
function delall(){
   console.log('del all');
   if( confirm('\\n你確定要刪除這筆資料嗎?\\n刪除後無法恢復喔!\\n') ){
     form1.submit();
   }
   return false;
}
</script>";

echo "
  <style>
    table, td {
      border-collapse: collapse;
    }
tr.tr-only-hide {color: #D20B2A;}

@media (max-width: 736px) {
  .table-rwd{min-width: 100%;}
  /*針對tr去做隱藏*/
  tr.tr-only-hide {display: none !important;}
  /*讓tr變成區塊主要讓他有個區塊*/
  .table-rwd tr{
    display: block;
    border: 1px solid #ddd;
    margin-top: 5px;
  }
  .table-rwd td {
    text-align: left;
    font-size: 15px;
    overflow: hidden;
    width: 100%;
    display: block;
	}
	.table-rwd td:before {
    /*最重要的  就是這串*/
    content: attr(data-th) ' : ';
    /*最重要的就是這串*/
    display: inline-block;
    text-transform: uppercase;
    font-weight: bold;
	  margin-right: 10px;
    color: #D20B2A;
  }
  /*當RWD縮小的時候.table-bordered 會有兩條線，所以針對.table-bordered去做修正*/
  .table-rwd.table-bordered td,.table-rwd.table-bordered th,.table-rwd.table-bordered{border:0;}

}


  </style>

";

require_once "connDB.php";

// $result = mysqli_query($con, $sql);

//分頁效果
//預設每頁筆數
$pageRow_records = 3;
//預設頁數
$num_pages = 1;

if (isset($_GET['page'])) {
    $num_pages = $_GET['page'];
}

//每頁有 3 筆資料
//     $num_pages         $startRow_records    e
// page 1          record 0                  ~ 2
// page 2          record 3                  ~ 5
// page 3          record 6                  ~ 8
// :
//依據 $num_pages 與 $pageRow_records 的值，找出每頁的起始筆數 $startRow_records 的值
// 每頁的起始筆數
$startRow_records = ($num_pages - 1) * $pageRow_records;

//未加限制顯示筆數的時候的 SQL 查詢子句
$sql_query = "SELECT * FROM `members`"; //大小寫無關

//加上限制顯示筆數的時候的 SQL 查詢子句，由本頁開始紀錄筆數開始，每頁顯示預設筆數
$sql_query_limit = $sql_query . "LIMIT " . $startRow_records . ", " . $pageRow_records;
//echo $sql_query_limit;

$result = mysqli_query($con, $sql_query_limit);
$all_result = mysqli_query($con, $sql_query);
//計算總筆數
$total_records = mysqli_num_rows($all_result);
//計算總頁數= (總筆數/每頁有 3 筆資料) 後無條件進位
$total_pages = ceil($total_records / $pageRow_records);

//取出一筆資料，並轉換成關聯式陣列資料
//$row = mysqli_fetch_assoc($result);
// echo $row['cID'] . " " . $row['cName'] . " " . $row['cSex'] . " " . $row['cBirthday'] . " " . $row['cEmail'] . " " . $row['cPhone'] . " " . $row['cAddr'] . $row['cHeight'] . " " . $row['cWeight'];

// echo "{$row['cID']} {$row['cName']} {$row['cSex']} {$row['cBirthday']} {$row['cEmail']} {$row['cPhone']} {$row['cAddr']} {$row['cHeight']} {$row['cWeight']}  <br />";

echo " <div class='p-3 mb-2 bg-light text-dark'><form align='center' action='php-mysqli-delete-all.php' name='form1' method='post'>
<h1 align='center'>會員資料管理系統</h1>
<p align='center'>目前資料筆數: {$total_records}  &emsp;
<a href='php_mysqli_create.php' class='btn btn-info'>新增會員資料</a>&emsp;<a href='#' onclick='delall();' class='btn btn-info'>刪除被選取資料</a>&emsp;
<a href='upload.html'class='btn btn-info'>新增產品</a> &emsp;
<a href='total_order.php'class='btn btn-info'>訂單</a> &emsp;
<a href='php_mysql_logout.php' class='btn btn-info'>登出</a>
</p>
";

echo "<p align='center'>
     <table border='1'class='table table-dark ' >";

//定義表格欄位
echo "
<tr class='tr-only-hide'>
  <th>id</th>
  <th>account</th>
  <th>password</th>
  <th>name</th>
  <th>sex</th>
  <th>year</th>
  <th>month</th>
  <th>day</th>
  <th>cellphone</th>
  <th>address</th>
  <th>email</th>
  <th>remark</th>
  <th colspan=3>功能</th>
</tr>
";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr align='center'>";
    echo "  <td data-th='id'> {$row['id']} </td>";
    echo "  <td data-th='account'>" . $row['account'] . "</td>";
    echo "  <td data-th= 'pasword'> {$row['password']}      </td>";
    echo "  <td data-th='name'> {$row['name']} </td>";
    echo "  <td data-th='sex'> {$row['sex']} </td>";
    echo "  <td data-th='year'> {$row['year']}    </td>";
    echo "  <td data-th='month'> {$row['month']}    </td>";
    echo "  <td data-th='day'> {$row['day']}     </td>";
    echo "  <td data-th='cellphone'> {$row['cellphone']}   </td>";
    echo "  <td data-th= 'address'> {$row['address']}   </td>";
    echo "  <td data-th= 'email'> {$row['email']}   </td>";
    echo "  <td data-th= 'remark'> {$row['remark']}   </td>";
    echo "<td data-th='功能' ><a href='php-mysqli-update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>修改</td>";
    echo "<td data-th='功能'><a href='php-mysqli-delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>刪除</td>";
    echo "<td data-th='功能'><input type='checkbox' name='del[]' value='{$row['id']}'></td>";
    echo "</tr>";
}

echo "</table></p></form>";
echo "<br><br>";
echo "<p align='center'><table>";

$prev = $num_pages - 1;
$next = $num_pages + 1;

if ($num_pages > 1) {
    echo "<a href='?page=1'class='btn btn-success'>第一頁</a>&emsp;<a href='?page=$prev' class='btn btn-success'>上一頁</a>&emsp; ";
}
if ($num_pages < $total_pages) {
    echo "<a href='?page=$next' class='btn btn-success'>下一頁</a>&emsp;<a href='?page=$total_pages' class='btn btn-success'>最末頁</a>&emsp; ";
}

echo "</table></p></div>";

//釋放資源
mysqli_free_result($result);
//關閉資料庫連接
mysqli_close($con);
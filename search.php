<?php
require_once "conn.php";
header("Content-type: text/html; charset=utf-8");

//取得表單資料
$account = $_POST["account"];
$email = $_POST["email"];
// $show_method = $_POST["show_method"];

//建立資料連接
$link = create_connection();

//檢查查詢的帳號是否存在
$sql = "SELECT name, password FROM members WHERE
          account = '$account' AND email = '$email'";
$result = execute_sql($link, "web110b_12", $sql);

//如果帳號不存在
if (mysqli_num_rows($result) == 0) {
    //顯示訊息告知使用者，查詢的帳號並不存在
    echo "<script type='text/javascript'>
            alert('您所查詢的資料不存在，請檢查是否輸入錯誤。');
            history.back();
          </script>";
} else //如果帳號存在
{
    $row = mysqli_fetch_object($result);
    $name = $row->name;
    $password = $row->password;
    $message = "
      <!doctype html>
      <html>
        <head>
          <title></title>
          <meta charset='utf-8'>
           <link
            href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'
            rel='stylesheet'
            integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3'
            crossorigin='anonymous'
        />
          <style>
            .container {
                width: 400px;
                height: 300px;
                margin-top: 8%;
                margin-left: 40%;
                background-color: #99ff99;
                border-radius: 10px;
                text-align: center;
            }
            form {
                /* background-color: green; */
                width: 350px;
            }
            table {
                height: 140px;
                width: 350px;
                margin-left: 30px;

                /* background-color: red; */
            }
            table td{
              font-family: Microsoft JhengHei;
              color:blue;
              padding-top: 10px;

}

            #title {
                font-family: Microsoft JhengHei;
            }
            a {
                font-family: Microsoft JhengHei;

            }
            span{
              font-family: Microsoft JhengHei;
              color:blue;
}
        </style>
        </head>
        <body>
        <div class='container'>
        <table>
          <tr>
          <th colspan='2'><span>$name</span> 您好，您的帳號資料如下：</th>
          </tr>
          <tr>
          　　<td>帳號：</td><td>$account</td>
          </tr>
          <tr>
          　　<td>密碼：</td><td>$password</td>
          </tr>
          <tr>
            <td colspan='2'><a href='login.html' class='btn btn-info text-warning mr-2 mt-3'>按此登入本站</a></td>
          </tr>
        </table>
        </div>
          </body>
      </html>
    ";

    // if ($show_method == "網頁顯示") {
    echo $message; //顯示訊息告知使用者帳號密碼
    // } else {
    // $subject = "=?utf-8?B?" . base64_encode("帳號通知") . "?=";
    // $headers = "MIME-Version: 1.0" . "\r\n";
    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // mail($email, $subject, $message, $headers);

    // //顯示訊息告知帳號密碼已寄至其電子郵件了
    // echo "$name 您好，您的帳號資料已經寄至 $email<br><br>
    //         <a href='index.html'>按此登入本站</a>";
    // // }
}

//釋放 $result 佔用的記憶體
mysqli_free_result($result);

//關閉資料連接
mysqli_close($link);
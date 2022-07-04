<?php
require_once "connDB.php";
$del = $_POST['del'];

foreach ($del as $value) {
    mysqli_query($con, "DELETE FROM `students` WHERE `cID`= {$value} ");
}
mysqli_close($con);
header("Location:php_mysqli-read.php");

// if (isset($_POST["action"]) && ($_POST["action"] == "delete")) {
//     $sql = "DELETE FROM `students` WHERE `cID` = " . $_POST["cID"];
//     mysqli_query($con, $sql);

//     mysqli_free_result($result);
//     mysqli_close($con);
//     header("Location:php_mysqli-read.php");

// }
// $sql = "SELECT * FROM `students` WHERE `cID` = " . $_GET['cID'];
// $result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result, MYSQLI_BOTH);
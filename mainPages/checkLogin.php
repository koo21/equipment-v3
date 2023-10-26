<?php
session_start();
include '../conn/conn.php';

echo "MainPage";


// try {
//     $stmt = $coon->prepare("SELECT*FROM admin WHERE admin_username = ? AND admin_password =?");
//     $stmt->execute([$_POST["user"], $_POST["pass"]]);
//     $row->rowCount($stmt);
//     $r = $stmt->fetch(PDO::FETCH_ASSOC);

//     if ($row == 0) {
//         echo "don't connect ka";
//     } else {
//         echo  $_SESSION["checkLogin"] = $r["admin_check_login"];
//         //header("location:pages/index.php");
//     }
// } catch (Exception $e) {
//     echo "no" . $e->getMessage();
// }

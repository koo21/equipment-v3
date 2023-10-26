<?php
session_start();
include '../conn/conn.php';

echo "MainPage";



$stmt = $coon->prepare("SELECT*FROM admin WHERE admin_username = ? AND admin_password =?");
$stmt->execute([$_POST["user"], $_POST["pass"]]);
$row->rowCount($stmt);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($stmt)) {
    echo "don't connect ka";
} else {
    $_SESSION["checkLogin"] = $row["admin_check_login"];

    header("location:pages/index.php");
}

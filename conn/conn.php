<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'db_main_tool';
$db1 = 'user_authen';

$coon = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$coon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$coon->exec('SET NAMES UTF8');
date_default_timezone_set('Asia/Bangkok');

$coonName = new PDO("mysql:host=$host;dbname=$db1", $user, $pass);
$coonName->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$coonName->exec('SET NAMES UTF8');

// if (empty($coon)) {
//     echo "No";
// } else {
//     echo "yes";
// }
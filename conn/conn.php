<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'db_main_tool';

$coon = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$coon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$coon->exec('SET NAMES UTF8');
date_default_timezone_set('Asia/Bangkok');

// if (empty($coon)) {
//     echo "No";
// } else {
//     echo "yes";
// }

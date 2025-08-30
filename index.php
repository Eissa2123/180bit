<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

defined('HOST') || define("HOST", __DIR__ . DIRECTORY_SEPARATOR);

// **احذف هذا السطر لأنه غير مستخدم الآن**
// defined('APP') || define("APP", '180bit');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

// WEB الآن يشير مباشرة للمجلد الحالي بدون أي APP إضافي
defined('WEB') || define('WEB', $protocol . '://' . $host . '/');

require_once("Dispatcher.php");

$D = new Dispatcher(true);
$D->Start();

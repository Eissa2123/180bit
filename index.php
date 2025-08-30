<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

defined('HOST') || define("HOST", __DIR__ . DIRECTORY_SEPARATOR);

$protocol  = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host      = $_SERVER['HTTP_HOST'] ?? 'localhost';

// استخدم مسار السكربت نفسه لمعرفة مجلد المشروع (سواء كان / أو /ebsapp)
$script    = $_SERVER['SCRIPT_NAME'] ?? '/index.php';
$basePath  = rtrim(str_replace('\\', '/', dirname($script)), '/'); // يعطي "" أو "/ebsapp"
$baseUrl   = $protocol . '://' . $host . (($basePath === '' || $basePath === '/') ? '' : $basePath);

if (!empty($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === 'staging.ebstor.com') {
    define('WEB', $protocol . '://' . $host . '/');
}


defined('WEB') || define('WEB', $baseUrl . '/'); // يضمن سلاش واحد في النهاية

require_once("Dispatcher.php");

$D = new Dispatcher(true);
$D->Start();

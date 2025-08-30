<?php
// حاول أوّلًا تحميل إعدادات محلية إن وجدت (على جهاز التطوير فقط)
$__envLocal = __DIR__ . '/env.local.php';
if (is_file($__envLocal)) {
    require_once $__envLocal; // يعرّف ثوابت DB_* للمحلي
}

// إن ما كانت الثوابت معرّفة بعد (يعني ما في env.local.php) نستخدم إعدادات السيرفر الحالية
defined('DB_HOST')     || define('DB_HOST', 'localhost');
defined('DB_NAME')     || define('DB_NAME', 'ebstorco_dbrzxnug82xl18');
defined('DB_USERNAME') || define('DB_USERNAME', 'ebstorco_180bit');
defined('DB_PASSWORD') || define('DB_PASSWORD', '180BIT');
defined('DB_CHARSET')  || define('DB_CHARSET', 'utf8mb4');

// (اختياري) أنشئ اتصال PDO إن ما كان موجود مسبقًا
if (!isset($GLOBALS['PDO']) || !($GLOBALS['PDO'] instanceof \PDO)) {
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        $GLOBALS['PDO'] = new \PDO($dsn, DB_USERNAME, DB_PASSWORD, [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    } catch (\Throwable $e) {
        error_log('[DB] ' . $e->getMessage());
        // خليه يفشل بوضوح بدل ما يستمر بكائن null
        die('Database connection failed.');
    }
}

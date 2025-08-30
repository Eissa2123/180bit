<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
require __DIR__.'/system/libs/composer/vendor/autoload.php';
if (!defined('_MPDF_TEMP_PATH'))      define('_MPDF_TEMP_PATH',      __DIR__.'/tmp/mpdf/');
if (!defined('_MPDF_TTFONTDATAPATH')) define('_MPDF_TTFONTDATAPATH', __DIR__.'/tmp/mpdf/ttfontdata/');
$mpdf = new \Mpdf\Mpdf(['tempDir'=>_MPDF_TEMP_PATH]);
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();

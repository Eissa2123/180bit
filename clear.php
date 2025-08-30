<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$root = rtrim(__DIR__, '/').'/';
$dirs = [
  $root.'system/libs/composer/vendor/mpdf/mpdf/ttfontdata', // الكاش التالف غالبًا هنا
  $root.'logs/mpdf-tmp',         // بنحط tmp هنا لاحقًا
  $root.'logs/mpdf-fonts',       // وبنحط كاش الخطوط هنا لاحقًا
];

$deleted = 0;
foreach ($dirs as $dir) {
  if (!is_dir($dir)) continue;
  $it = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::CHILD_FIRST
  );
  foreach ($it as $f) {
    $path = $f->getPathname();
    if ($f->isFile()) { @unlink($path) && $deleted++; }
  }
}
echo "Cleared files: $deleted";

<?php
$projectRoot = realpath(__DIR__ . ''); 
$logoPath = $projectRoot . '/public/assets/themes/default/images/goleenkit.png';

if (is_file($logoPath)) {
    $mime = mime_content_type($logoPath);
    $base64 = base64_encode(file_get_contents($logoPath));
    $logoSrc = 'data:' . $mime . ';base64,' . $base64;

    echo "Data URI:<br>";
    echo substr($logoSrc, 0, 200) . "...<br>"; // عرض أول 200 حرف
    echo "<img src='$logoSrc' style='width:150px'>"; // اختبار مباشر في المتصفح
} else {
    echo "الصورة غير موجودة أو لا يمكن قراءتها";
}
?>

<link rel="stylesheet" href="<?= WASSETS ?>css/textField.css">

<?php
// === Custom Text Field Variables ===
$name        = $name        ?? 'input';
$type        = $type        ?? 'text';
$value       = $value       ?? '';
$label       = $label       ?? '';
$icon        = $icon        ?? '';           // HTML للأيقونة (اختياري)
$icon_pos    = $icon_pos    ?? 'start';      // 'start' أو 'end'
$required    = $required    ?? false;
$placeholder = $placeholder ?? '';
$readonly    = $readonly    ?? false;
$id          = $id          ?? ($name . '_id');
$rtl         = isset($rtl) ? $rtl : (preg_match('/[\x{0600}-\x{06FF}]/u', $label));
$error       = $error       ?? '';

$isPassword  = ($type === 'password');


// متغيرات ستايل اختيارية (CSS variables)
$style_vars = $style_vars ?? [];
$style_attr = '';
if ($style_vars) {
    $pairs = [];
    foreach ($style_vars as $k => $v) {
        $pairs[] = $k . ':' . $v;
    }
    $style_attr = ' style="' . implode(';', $pairs) . '"';
}

// كلاسات الغلاف
$sanType = preg_replace('/[^a-z0-9_-]/i', '', (string)$type);
$wrapper_classes = ['custom-input-wrapper', $sanType];
if ($icon) {
    $wrapper_classes[] = 'has-icon';
}
if ($icon && $icon_pos === 'end') {
    $wrapper_classes[] = 'icon-end';
}
if ($isPassword) {
    $wrapper_classes[] = 'has-eye';
}
$wrapper_class_attr = implode(' ', $wrapper_classes);
?>

<div class="custom-text-field<?= $rtl ? ' rtl' : '' ?>">
    <?php if ($label): ?>
        <label for="<?= htmlspecialchars($id) ?>">
            <?= htmlspecialchars($label) ?><?= $required ? ' *' : '' ?>
        </label>
    <?php endif; ?>

    <!-- نستخدم الكلاسات ومتغيرات الستايل فعليًا -->
    <div class="<?= $wrapper_class_attr ?>" <?= $style_attr ?>>
        <?php if ($icon): ?>
            <span class="input-icon"><?= $icon ?></span>
        <?php endif; ?>

        <input
            id="<?= htmlspecialchars($id) ?>"
            type="<?= $type === 'currency' ? 'text' : htmlspecialchars($type) ?>"
            name="<?= htmlspecialchars($name) ?>"
            value="<?= htmlspecialchars($value) ?>"
            class="form-control"
            placeholder="<?= htmlspecialchars($placeholder) ?>"
            <?= $required ? 'required' : '' ?>
            <?= $readonly ? 'readonly' : '' ?>>

        <?php if ($isPassword): ?>
            <button type="button"
                class="toggle-eye"
                aria-label="Toggle password visibility"
                onclick="
          (function(){
            var i=document.getElementById('<?= htmlspecialchars($id) ?>');
            var b=this;
            if(i.type==='password'){ i.type='text';  b.textContent='🙈'; }
            else{                    i.type='password'; b.textContent='👁'; }
          })();
        ">👁</button>
        <?php endif; ?>
    </div>

    <?php if ($error !== ''): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
</div>
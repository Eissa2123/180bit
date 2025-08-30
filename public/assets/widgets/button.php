<link rel="stylesheet" href="<?= WASSETS ?>css/button.css">
<script src="https://unpkg.com/@phosphor-icons/web"></script>

<?php
if (!function_exists('renderButton')) {
    function renderButton(array $cfg = [])
    {
        $label     = $cfg['label']      ?? '';
        $href      = $cfg['href']       ?? null;          // لو موجود -> <a>
        $type      = $cfg['type']       ?? 'button';      // button|submit|reset
        $icon      = $cfg['icon']       ?? '';
        $icon_pos  = $cfg['icon_pos']   ?? 'end';         // start|end
        $variant   = $cfg['variant']    ?? 'primary';     // primary|outline|ghost|danger|success|warning|solid...
        $size      = $cfg['size']       ?? 'md';          // xs|sm|md|lg
        $rounded   = $cfg['rounded']    ?? 'md';          // none|sm|md|lg|full
        $width     = $cfg['width']      ?? 'auto';        // auto|full
        $attrs     = $cfg['attrs']      ?? [];
        $styleVars = $cfg['style_vars'] ?? [];

        // الكلاسات الأساسية
        $classes = ['btn', 'btn-' . $variant, 'btn-' . $size, 'rounded-' . $rounded];
        if ($width === 'full') $classes[] = 'btn-block';

        // دمج كلاس إضافي من: class | classList | attrs['class']
        $extra = [];
        if (!empty($cfg['class'])) {
            $extra = array_merge($extra, preg_split('/\s+/', trim($cfg['class'])));
        }
        if (!empty($cfg['classList']) && is_array($cfg['classList'])) {
            $extra = array_merge($extra, $cfg['classList']);
        }
        if (!empty($attrs['class'])) {
            $extra = array_merge($extra, preg_split('/\s+/', trim($attrs['class'])));
            unset($attrs['class']); // لا نطبعها مرتين
        }
        if (!empty($extra)) {
            $classes = array_values(array_filter(array_merge($classes, $extra)));
        }

        // ستايل إنلاين عبر CSS variables
        $style = '';
        if (!empty($styleVars)) {
            $pairs = [];
            foreach ($styleVars as $k => $v) $pairs[] = $k . ':' . $v;
            $style = implode(';', $pairs);
        }

        // خصائص إضافية
        $attrHtml = '';
        foreach ($attrs as $k => $v) {
            if ($v === null) continue;
            $attrHtml .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '"';
        }

        // المحتوى
        $content = '';
        if ($icon && $icon_pos === 'start') $content .= $icon . ' ';
        $content .= htmlspecialchars($label);
        if ($icon && $icon_pos === 'end')   $content .= ' ' . $icon;

        // الرندر
        if ($href) {
            echo '<a href="' . htmlspecialchars($href) . '" class="' . implode(' ', $classes) . '" style="' . $style . '"' . $attrHtml . '>' . $content . '</a>';
        } else {
            echo '<button type="' . htmlspecialchars($type) . '" class="' . implode(' ', $classes) . '" style="' . $style . '"' . $attrHtml . '>' . $content . '</button>';
        }
    }
}

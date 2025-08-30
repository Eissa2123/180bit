<?php

/**
 * DataTable (Server Pager Only)
 * - بدون length dropdown
 * - البيجنج يشتغل فورًا لأنه مربوط بداخل الودجت (inline JS لكل جدول)
 */
if (!function_exists('renderDataTable')) {

    // helpers
    function _dt_get($row, $path)
    {
        if (!$path) return '';
        if (strpos($path, '.') === false) return (is_array($row) && array_key_exists($path, $row)) ? $row[$path] : '';
        $cur = $row;
        foreach (explode('.', $path) as $p) {
            if (is_array($cur) && array_key_exists($p, $cur)) $cur = $cur[$p];
            else return '';
        }
        return $cur;
    }
    function _dt_tok($tpl, $row)
    {
        return preg_replace_callback(
            '/\{([A-Za-z0-9_.]+)\}/',
            fn($m) => htmlspecialchars((string)_dt_get($row, $m[1])),
            (string)$tpl
        );
    }

    function renderDataTable(array $cfg = [])
    {
        $id      = $cfg['id']      ?? ('dt_' . substr(md5(mt_rand()), 0, 6));
        $dir     = $cfg['dir']     ?? 'rtl';
        $cols    = $cfg['columns'] ?? [];
        $rows    = $cfg['rows']    ?? [];
        $acts    = $cfg['actions'] ?? [];
        $footer  = $cfg['footer']  ?? null;
        $empty   = $cfg['empty']   ?? 'No results';

        // pager (server-driven)
        $pager         = $cfg['pager']        ?? null;          // array: Current, Max, Previous, Next, Count...
        $pagerFormSel  = $cfg['pager_form']   ?? '#SalesFilter';
        $pageFieldName = $cfg['pager_field']  ?? 'Page';        // اسم الحقل اللي يقرأه الباك-إند
        $labels = array_merge([
            'prev'   => 'Previous',
            'next'   => 'Next',
            'page'   => 'Page',
            'from'   => 'From',
            'length' => 'Length',
        ], $cfg['pager_labels'] ?? []);
        $showCount = (bool)($cfg['pager_show_count'] ?? false);

        echo '<div class="dt-wrap" dir="' . htmlspecialchars($dir) . '" id="' . htmlspecialchars($id) . '">';

        if (!is_array($rows) || count($rows) === 0) {
            echo '<div class="dt-empty">' . htmlspecialchars($empty) . '</div></div>';
            return;
        }

        echo '<table class="dt-table"><thead><tr>';
        foreach ($cols as $c) {
            $lab = $c['label'] ?? ($c['key'] ?? '');
            $cls = [];
            if (!empty($c['hide_xs'])) $cls[] = 'hide-xs';
            if (!empty($c['hide_sm'])) $cls[] = 'hide-sm';
            echo '<th class="' . implode(' ', $cls) . '">' . htmlspecialchars($lab) . '</th>';
        }
        if (!empty($acts)) {
            echo '<th class="dt-actions-col">' . htmlspecialchars($cfg['actions_label'] ?? '') . '</th>';
        }
        echo '</tr></thead><tbody>';

        $i = 0;
        foreach ($rows as $r) {
            $i++;
            echo '<tr>';
            foreach ($cols as $c) {
                $lab   = $c['label'] ?? ($c['key'] ?? '');
                $align = $c['align'] ?? 'center';
                $cls   = [];
                $cls[] = ($align === 'center' ? 'text-center' : 'text-left');
                if (!empty($c['class']))   $cls[] = $c['class'];
                if (!empty($c['hide_xs'])) $cls[] = 'hide-xs';
                if (!empty($c['hide_sm'])) $cls[] = 'hide-sm';

                if (!empty($c['render']) && is_callable($c['render'])) {
                    $html = (string)call_user_func($c['render'], $r, $i);
                } else {
                    $html = htmlspecialchars((string)_dt_get($r, $c['key'] ?? null));
                }
                echo '<td class="' . implode(' ', $cls) . '" data-th="' . htmlspecialchars($lab) . '">' . $html . '</td>';
            }

            if (!empty($acts)) {
                echo '<td class="dt-actions">';
                foreach ($acts as $a) {
                    $title  = $a['title']  ?? '';
                    $icon   = $a['icon']   ?? '';
                    $href   = isset($a['href']) ? _dt_tok($a['href'], $r) : 'javascript:void(0)';
                    $target = $a['target'] ?? null;
                    $attrs  = '';
                    if (!empty($a['attrs']) && is_array($a['attrs'])) {
                        foreach ($a['attrs'] as $k => $v) {
                            if ($v === null) continue;
                            $attrs .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '"';
                        }
                    }
                    echo '<a class="dt-action" href="' . $href . '" title="' . htmlspecialchars($title) . '"'
                        . ($target ? ' target="' . htmlspecialchars($target) . '"' : '')
                        . $attrs . '>' . ($icon ?: htmlspecialchars($title)) . '</a>';
                }
                echo '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';

        if ($footer && !empty($footer['cells'])) {
            echo '<tfoot><tr>';
            foreach ($footer['cells'] as $f) {
                $cls = [];
                $cls[] = ((($f['align'] ?? 'center') === 'center') ? 'text-center' : 'text-left');
                if (!empty($f['class']))   $cls[] = $f['class'];
                if (!empty($f['hide_xs'])) $cls[] = 'hide-xs';
                if (!empty($f['hide_sm'])) $cls[] = 'hide-sm';
                $colsp = isset($f['colspan']) ? (int)$f['colspan'] : 1;
                echo '<th colspan="' . $colsp . '" class="' . implode(' ', $cls) . '">' . ($f['text'] ?? '') . '</th>';
            }
            echo '</tr></tfoot>';
        }

        echo '</table></div>'; // .dt-wrap

        // ====== Pager markup + inline JS (مربوط بهذا الجدول فقط) ======
        if ($pager && is_array($pager)) {
            $curr = max(1, (int)($pager['Current'] ?? 1));
            $max  = max(1, (int)($pager['Max']     ?? $curr));
            $prev = $curr > 1    ? $curr - 1 : null;
            $next = $curr < $max ? $curr + 1 : null;

            $pid = $id . '_pager';
            echo '<div class="panel-footer dt-pager" id="' . htmlspecialchars($pid) . '"'
                . ' data-form="' . htmlspecialchars($pagerFormSel) . '"'
                . ' data-page-name="' . htmlspecialchars($pageFieldName) . '"'
                . ' data-current="' . $curr . '"'
                . ' data-max="' . $max . '">';

            echo '<span class="only-xs text-center block">'
                . htmlspecialchars($labels['page']) . ' ' . $curr . ' '
                . htmlspecialchars($labels['from']) . ' ' . $max
                . '</span>';

            echo '<nav class="text-center"><ul class="pager">';

            echo '<li class="previous' . ($prev ? '' : ' disabled') . '">';
            if ($prev) echo '<a href="#" data-page="' . $prev . '">&larr; ' . htmlspecialchars($labels['prev']) . '</a>';
            echo '</li>';

            echo '<li class="current disabled hide-xs"><span>';
            if ($showCount && isset($pager['Count'])) {
                echo htmlspecialchars($labels['length']) . ' ' . (int)$pager['Count'] . ' | ';
            }
            echo htmlspecialchars($labels['page']) . ' ' . $curr . ' ' . htmlspecialchars($labels['from']) . ' ' . $max;
            echo '</span></li>';

            echo '<li class="next' . ($next ? '' : ' disabled') . '">';
            if ($next) echo '<a href="#" data-page="' . $next . '">' . htmlspecialchars($labels['next']) . ' &rarr;</a>';
            echo '</li>';

            echo '</ul></nav></div>';

?>

<?php
        }
    }
}

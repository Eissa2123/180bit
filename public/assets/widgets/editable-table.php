<link rel="stylesheet" href="<?= WASSETS ?>css/editable_table.css">

<?php
if (!function_exists('renderEditableTable')) {

    require_once __DIR__ . '/custom-dropdown.php';

    /**
     * جدول مرن لإضافة/حذف صفوف + (اختياري) ربط بالدروب داون + (اختياري) أعمدة محسوبة.
     *
     * @param string $tableName   مفتاح المصفوفة في POST (مثال: 'Products' أو 'Employees')
     * @param array  $columns     تعريف الأعمدة. مثال لكل عمود:
     *   [
     *     'key' => 'Price',
     *     'label' => 'السعر',
     *     'type' => 'text' | 'number' | 'dropdown',
     *     'readonly' => true/false,
     *     'noPost' => true/false,
     *     'dropdownOptions' => [...],  // فقط لو type = dropdown
     *     'labelField' => 'label',     // للدروب داون
     *     'displayField' => 'display', // للدروب داون
     *     'bindFields' => ['Name','Price',...], // للدروب داون (اختياري)
     *     'compute' => 'Price*Quantity' // يحسب قيمة هذا العمود من المعادلة (اختياري)
     *   ]
     * @param array  $oldRows     بيانات لإعادة العرض (POST سابق)
     * @param array  $config      إعدادات إضافية (اختياري)
     */
    function renderEditableTable(string $tableName, array $columns, array $oldRows = [], array $config = [])
    {
        // ابحث إن كان فيه عمود دروب داون (اختياري الآن)
        $dropdownCol = null;
        foreach ($columns as $col) {
            if (($col['type'] ?? '') === 'dropdown') {
                $dropdownCol = $col;
                break;
            }
        }

        // جهّز خيارات الدروب داون فقط لو موجود
        $optionsMap = [];
        if ($dropdownCol) {
            $options = $dropdownCol['dropdownOptions'] ?? [];
            foreach ($options as $id => $opt) {
                $std = [];
                foreach ($opt as $k => $v) $std[ucfirst($k)] = $v;
                // TaxRate افتراضي لو لزم الأمر (يستخدم فقط إذا عمودك يحتوي Tax/Total)
                if (isset($opt['VAT']) && is_numeric($opt['VAT']))        $std['TaxRate'] = (float)$opt['VAT'];
                elseif (isset($opt['vat']) && is_numeric($opt['vat']))     $std['TaxRate'] = (float)$opt['vat'];
                elseif (isset($std['Tax']) && $std['Tax'] > 0 && $std['Tax'] <= 100) {
                    $std['TaxRate'] = (float)$std['Tax'];
                    unset($std['Tax']);
                } else $std['TaxRate'] = 15.0;

                $std += [
                    'ID'          => $id,
                    'Quantity'    => $std['Quantity'] ?? 1,
                    'Price'       => $std['Price'] ?? 0,
                    'Name'        => $std['Name'] ?? '',
                    'Description' => $std['Description'] ?? '',
                    'Code'        => $std['Code'] ?? ($std['display'] ?? ''),
                    'Total'       => $std['Total'] ?? 0,
                    'label'       => $std['label'] ?? '',
                    'display'     => $std['display'] ?? '',
                ];
                $optionsMap[(string)$id] = $std;
            }
        }

        $bindFields = $dropdownCol['bindFields'] ?? [];

        // اجمع الميتاداتا (للJS) عن الأعمدة (نحتاج compute مثلاً)
        $colsMeta = [];
        foreach ($columns as $c) {
            $colsMeta[] = [
                'key'      => $c['key'],
                'type'     => $c['type'] ?? 'text',
                'compute'  => $c['compute'] ?? null,
                'readonly' => !empty($c['readonly']),
                'noPost'   => !empty($c['noPost']),
            ];
        }

        $tableId = 'et_' . $tableName . '_' . substr(md5(mt_rand()), 0, 6);
?>
        <div class="editable-table-wrap" id="<?= htmlspecialchars($tableId) ?>" dir="rtl">
            <table class="editable-table">
                <thead>
                    <tr>
                        <th></th>
                        <?php foreach ($columns as $col): ?>
                            <th><?= htmlspecialchars($col['label'] ?? $col['key']) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rows = (is_array($oldRows) && count($oldRows) > 0) ? $oldRows : [[]];
                    foreach ($rows as $i => $row) {
                        renderEditableTableRow($tableName, $columns, $i, $row, false);
                    }
                    ?>
                </tbody>
            </table>

            <div class="et-actions" style="margin-top:10px;">
                <?php
                require_once 'public/assets/widgets/button.php';
                renderButton([
                    'type'   => 'button',
                    'label'  => '+',
                    'icon'   => '',
                    'variant' => 'solid',
                    'size'   => 'md',
                    'rounded' => 'md',
                    'class'  => 'et-add-row',
                    'style_vars' => [
                        '--btn-bg'       => '#ffffffff',
                        '--btn-text'     => '#000000ff',
                        '--btn-border'  => '#000000',
                        '--btn-hover-bg' => '#c4c4c4ff',
                        '--btn-px'       => '15px',
                        '--btn-py'       => '5px',
                    ],
                ]);
                ?>
            </div>

            <!-- قالب صف -->
            <template class="et-row-template">
                <?php renderEditableTableRow($tableName, $columns, '__INDEX__', [], true); ?>
            </template>

            <!-- بيانات للـ JS -->
            <script>
                window.__ET_DATA = window.__ET_DATA || {};
                window.__ET_DATA["<?= addslashes($tableId) ?>"] = {
                    tableName: "<?= addslashes($tableName) ?>",
                    hasDropdown: <?= $dropdownCol ? 'true' : 'false' ?>,
                    optionsById: <?= json_encode($optionsMap, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>,
                    bindFields: <?= json_encode(array_values($bindFields)) ?>,
                    columns: <?= json_encode($colsMeta, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>
                };
            </script>
        </div>

        <script>
            (function() {
                function setInputName(input, name) {
                    if (name) input.setAttribute('name', name);
                    else input.removeAttribute('name');
                }

                function q(el, sel) {
                    return el.querySelector(sel);
                }

                function qa(el, sel) {
                    return Array.prototype.slice.call(el.querySelectorAll(sel));
                }

                function toNumber(v) {
                    var n = parseFloat((v || '').toString().replace(/[^\d.-]/g, ''));
                    return isNaN(n) ? 0 : n;
                }

                function round2(n) {
                    return Math.round(n * 100) / 100;
                }

                // بسيط: قيّم تعبير compute مثل "Price*Quantity"
                function evalCompute(expr, row) {
                    if (!expr) return null;
                    // استبدل مفاتيح الأعمدة بقيمها الرقمية
                    var safe = expr.replace(/[A-Za-z_][A-Za-z0-9_]*/g, function(key) {
                        var el = row.querySelector('[data-key="' + key + '"]');
                        if (!el) return '0';
                        return String(toNumber(el.value));
                    });
                    try {
                        return eval(safe);
                    } catch (e) {
                        return null;
                    }
                }

                function recalcRow(rootCfg, row) {
                    // 1) حساب الأعمدة اللي فيها compute (لو موجودة)
                    (rootCfg.columns || []).forEach(function(col) {
                        if (!col.compute) return;
                        var target = row.querySelector('[data-key="' + col.key + '"]');
                        if (!target) return;
                        var safe = col.compute.replace(/[A-Za-z_][A-Za-z0-9_]*/g, function(key) {
                            var el = row.querySelector('[data-key="' + key + '"]');
                            if (!el) return '0';
                            var v = parseFloat((el.value || '').toString().replace(/[^\d.-]/g, ''));
                            return isNaN(v) ? '0' : String(v);
                        });
                        var val = null;
                        try {
                            val = eval(safe);
                        } catch (e) {
                            val = null;
                        }
                        if (val != null && isFinite(val)) {
                            target.value = Math.round(val * 100) / 100;
                        }
                    });

                    // 2) الحسبة القديمة (Backward compatible) لو عندك Price/Quantity و Tax/Total
                    var priceEl = row.querySelector('[data-key="Price"]');
                    var qtyEl = row.querySelector('[data-key="Quantity"]');
                    var taxEl = row.querySelector('[data-key="Tax"]');
                    var totEl = row.querySelector('[data-key="Total"]');

                    if (priceEl && qtyEl && (taxEl || totEl)) {
                        var price = parseFloat((priceEl.value || '').toString().replace(/[^\d.-]/g, '')) || 0;
                        var qty = parseFloat((qtyEl.value || '').toString().replace(/[^\d.-]/g, '')) || 1;
                        var sub = price * qty;

                        var rate = parseFloat(row.getAttribute('data-tax-rate'));
                        if (isNaN(rate)) rate = 15.0; // عدّلها لو تبغى افتراضي غير 15%

                        var tax = Math.round((sub * (rate / 100)) * 100) / 100;
                        var total = Math.round((sub + tax) * 100) / 100;

                        if (taxEl) taxEl.value = tax;
                        if (totEl) totEl.value = total;
                    }
                }

                function onProductChange(rootCfg, row, selectedId) {
                    if (!rootCfg.hasDropdown) return;
                    var data = (rootCfg.optionsById || {})[String(selectedId)];
                    if (!data) return;

                    (rootCfg.bindFields || []).forEach(function(fieldKey) {
                        var el = row.querySelector('[data-key="' + fieldKey + '"]');
                        if (!el) return;
                        if (fieldKey === 'Quantity' && (el.value === '' || el.value === '0')) {
                            el.value = (data.Quantity != null ? data.Quantity : 1);
                        } else if (data[fieldKey] != null && (el.hasAttribute('data-readonly') || el.value === '')) {
                            el.value = data[fieldKey];
                        } else if (data[fieldKey] != null) {
                            el.value = data[fieldKey];
                        }
                    });

                    recalcRow(rootCfg, row);
                }

                function renumberNames(tbody, tableName) {
                    qa(tbody, 'tr').forEach(function(r, i) {
                        qa(r, 'input,select,textarea').forEach(function(input) {
                            var key = input.getAttribute('data-key');
                            if (!key) return;
                            if (input.hasAttribute('data-nopost')) {
                                input.removeAttribute('name');
                                return;
                            }
                            setInputName(input, tableName + '[' + i + '][' + key + ']');
                        });
                    });
                }

                function bindRow(rootCfg, tableName, row, index) {
                    // set names
                    qa(row, 'input,select,textarea').forEach(function(input) {
                        var key = input.getAttribute('data-key');
                        if (!key) return;
                        if (input.hasAttribute('data-nopost')) {
                            input.removeAttribute('name');
                            return;
                        }
                        setInputName(input, tableName + '[' + index + '][' + key + ']');
                    });

                    // delete
                    var del = q(row, '.et-del');
                    if (del) del.onclick = function() {
                        var tbody = row.parentNode;
                        tbody.removeChild(row);
                        renumberNames(tbody, tableName);
                    };

                    // inputs trigger compute
                    qa(row, 'input,select,textarea').forEach(function(el) {
                        el.addEventListener('input', function() {
                            recalcRow(rootCfg, row);
                        });
                        el.addEventListener('change', function() {
                            recalcRow(rootCfg, row);
                        });
                    });

                    // dropdown binding (اختياري)
                    if (rootCfg.hasDropdown) {
                        var idInput = row.querySelector('.custom-dropdown input[type="hidden"][data-role="value"], input[type="hidden"][data-key="ID"], input[type="hidden"][name$="[ID]"]') || row.querySelector('input[data-key="ID"]');
                        if (idInput) {
                            if (idInput.value) onProductChange(rootCfg, row, idInput.value);
                            idInput.addEventListener('change', function() {
                                onProductChange(rootCfg, row, idInput.value);
                            });
                            var dd = idInput.closest('.custom-dropdown');
                            if (dd) dd.addEventListener('cd:change', function(e) {
                                var val = e.detail && e.detail.value != null ? e.detail.value : idInput.value;
                                if (val != null) onProductChange(rootCfg, row, val);
                            });
                        }
                    }

                    recalcRow(rootCfg, row);
                }

                // قبل الإرسال: نظّف noPost
                document.addEventListener('submit', function() {
                    document.querySelectorAll('.editable-table [data-nopost]').forEach(function(i) {
                        i.removeAttribute('name');
                    });
                }, true);

                window.EditableTable = window.EditableTable || {};
                window.EditableTable.rebind = function(rootId) {
                    var root = document.getElementById(rootId);
                    if (!root) return;
                    var cfg = window.__ET_DATA[rootId];
                    if (!cfg) return;
                    var tableName = cfg.tableName;
                    if (!tableName) return;

                    var tbody = root.querySelector('tbody');
                    qa(tbody, 'tr').forEach(function(row, i) {
                        bindRow(cfg, tableName, row, i);
                    });

                    var addBtn = root.querySelector('.et-add-row');
                    var tpl = root.querySelector('.et-row-template');
                    if (addBtn && tpl) {
                        addBtn.onclick = function() {
                            var node = tpl.content.firstElementChild.cloneNode(true);
                            tbody.appendChild(node);
                            bindRow(cfg, tableName, node, qa(tbody, 'tr').length - 1);
                        };
                    }
                };

                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelectorAll('.editable-table-wrap').forEach(function(wrap) {
                        var id = wrap.id;
                        if (id) window.EditableTable.rebind(id);
                    });
                });
            })();
        </script>
<?php
    }

    // يرسم صف واحد (مع العناوين للموبايل عبر data-th)
    function renderEditableTableRow(string $tableName, array $columns, $rowIndex, array $row, bool $isTemplate)
    {
        echo '<tr>';
        echo '<td data-th="حذف"><button type="button" class="et-del" aria-label="حذف">×</button></td>';

        foreach ($columns as $col) {
            $key   = $col['key'];
            $type  = $col['type'] ?? 'text';
            $ro    = !empty($col['readonly']);
            $val   = $row[$key] ?? '';
            $noPost = (!empty($col['noPost']));
            $labelText = $col['label'] ?? $col['key'];

            $attrs = $ro ? ' class="et-readonly" readonly data-readonly="1"' : '';
            if ($noPost) $attrs .= ' data-nopost="1"';

            echo '<td data-th="' . htmlspecialchars($labelText) . '">';

            if ($type === 'dropdown') {
                // لا نعطي name للـ template؛ خله فاضي عشان EditableTable يعين الاسم بالأندكس
                $inputName = (!$isTemplate && !$noPost) ? ($tableName . '[' . $rowIndex . '][' . $key . ']') : '';

                // مرّر hiddenKey = اسم العمود (مثلاً ID)
                renderCustomDropdown([
                    'name'         => $inputName,
                    'hiddenKey'    => $key, // <<< مهم جداً
                    'options'      => $col['dropdownOptions'] ?? [],
                    'selected'     => $val,
                    'labelField'   => $col['labelField'] ?? 'label',
                    'displayField' => $col['displayField'] ?? 'display',
                    'bindFields'   => $col['bindFields'] ?? [],
                ]);
            } else {
                $inputType = ($type === 'number') ? 'number' : 'text';
                $nameAttr = (!$isTemplate && !$noPost) ? ' name="' . htmlspecialchars($tableName . '[' . $rowIndex . '][' . $key . ']') . '"' : '';
                echo '<input type="' . $inputType . '" data-key="' . htmlspecialchars($key) . '"'
                    . $nameAttr
                    . ' value="' . htmlspecialchars((string)$val) . '"'
                    . $attrs . ' />';
            }

            echo '</td>';
        }
        echo '</tr>';
    }
}

<!-- لا تغيّر هذا الرابط -->
<link rel="stylesheet" href="<?= WASSETS ?>css/dropdown.css">

<?php
if (!function_exists('renderCustomDropdown')) {
    function renderCustomDropdown($params)
    {
        $name          = $params['name'] ?? 'select';
        $label         = $params['label'] ?? '';
        $required      = $params['required'] ?? false;
        $multiple      = $params['multiple'] ?? false;
        $options       = $params['options'] ?? [];
        $selected      = $params['selected'] ?? ($multiple ? [] : '');
        $translate     = $params['translate'] ?? [];

        // 👇 الحقول الجديدة
        $labelField    = $params['labelField'] ?? 'label';
        $displayField  = $params['displayField'] ?? 'display';
        $bindFields    = $params['bindFields'] ?? [];

        $hiddenKey = $params['hiddenKey'] ?? null;
        if (!$hiddenKey) {
            // لو الاسم مثل Products[__INDEX__][ID] نقتبس "ID"
            if (preg_match('/\[([^\[\]]+)\]\s*$/', $name, $m)) {
                $hiddenKey = $m[1];
            }
        }


        $placeholder     = $translate['placeholder']     ?? 'اختر';
        $nSelectedText   = $translate['nSelected']       ?? 'تم تحديد %s عناصر';
        $allSelectedText = $translate['allSelected']     ?? 'تم تحديد الكل';
        $selectAllText   = $translate['selectAll']       ?? 'تحديد الكل';



        // encode bindFields كـ JSON ومررها إلى data-config
        $configJson = htmlspecialchars(json_encode([
            'displayField' => $displayField,
            'bindFields' => $bindFields
        ]));
?>

        <div class="custom-dropdown <?= $multiple ? 'dropdown-multiple' : '' ?>" data-name="<?= $name ?>" data-placeholder="<?= htmlspecialchars($placeholder) ?>" data-config='<?= $configJson ?>'>
            <label class="dropdown-label">
                <?= $label ?>
                <?php if ($required): ?>
                    <span class="required-star">*</span>
                <?php endif; ?>
            </label>

            <div class="dropdown-selected" onclick="toggleDropdown(this)">
                <span class="selected-text">
                    <?php
                    if ($multiple) {
                        $selectedTexts = array_filter(array_map(function ($val) use ($options, $labelField) {
                            return isset($options[$val][$labelField]) ? $options[$val][$labelField] : null;
                        }, $selected));
                        echo !empty($selectedTexts) ? implode(', ', $selectedTexts) : $placeholder;
                    } else {
                        echo !empty($selected) && isset($options[$selected][$displayField])
                            ? $options[$selected][$displayField]
                            : $placeholder;
                    }
                    ?>
                </span>
                <svg class="dropdown-icon" viewBox="0 0 20 20">
                    <path d="M5 7l5 5 5-5H5z" />
                </svg>
            </div>

            <?php if ($multiple): ?>
                <?php foreach ($selected as $val): ?>
                    <input type="hidden" name="<?= $name ?>[]" value="<?= $val ?>">
                <?php endforeach; ?>
            <?php else: ?>
                <input
                    type="hidden"
                    data-role="value"
                    <?php if (!empty($hiddenKey)): ?>
                    data-key="<?= htmlspecialchars($hiddenKey) ?>"
                    <?php endif; ?>
                    name="<?= $name ?>"
                    value="<?= $selected ?>">
            <?php endif; ?>

            <div class="dropdown-menu">
                <input type="text" class="dropdown-search" placeholder="ابحث..." onkeyup="filterDropdown(this)">
                <div class="dropdown-options">
                    <div class="dropdown-option" data-value="" onclick="selectDropdownOption(this, <?= $multiple ? 'true' : 'false' ?>)"><?= $placeholder ?></div>

                    <?php foreach ($options as $value => $data): ?>
                        <?php
                        $text = $data[$labelField] ?? '';
                        $attrs = '';
                        foreach ($data as $k => $v) {
                            $attrs .= " data-{$k}=\"" . htmlspecialchars($v) . "\"";
                        }
                        $isSelected = $multiple ? in_array($value, $selected) : $value == $selected;
                        ?>
                        <div class="dropdown-option<?= $isSelected ? ' selected' : '' ?>"
                            data-value="<?= $value ?>"
                            <?= $attrs ?>
                            onclick="selectDropdownOption(this, <?= $multiple ? 'true' : 'false' ?>)">
                            <?= htmlspecialchars($text) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

<?php
    }
}
?>



<script>
    function toggleDropdown(elem) {
        const container = elem.closest('.custom-dropdown');
        const menu = container.querySelector('.dropdown-menu');
        const isOpen = menu.style.display === 'block';
        closeAllDropdowns();
        if (!isOpen) {
            menu.style.display = 'block';
        }
    }

    function selectDropdownOption(option, isMultiple = false) {
        const container = option.closest('.custom-dropdown');
        const selectedTextSpan = container.querySelector('.selected-text');
        const placeholder = container.dataset.placeholder || 'اختر';
        const value = option.dataset.value;


        // ✅ قراءة الإعدادات المرنة من data-config
        const config = JSON.parse(container.dataset.config || '{}');
        const displayField = config.displayField || 'display';
        const bindFields = config.bindFields || [];

        const displayText = option.dataset[displayField] || value;
        selectedTextSpan.innerText = displayText || placeholder;

        if (isMultiple) {
            let currentValues = Array.from(container.querySelectorAll("input[type='hidden']")).map(i => i.value);
            let currentTexts = selectedTextSpan.innerText === placeholder ? [] : selectedTextSpan.innerText.split(', ');

            const index = currentValues.indexOf(value);

            if (value === '') {
                currentValues = [];
                currentTexts = [];
                container.querySelectorAll('.dropdown-option').forEach(opt => opt.classList.remove('selected'));
            } else if (index >= 0) {
                currentValues.splice(index, 1);
                currentTexts.splice(index, 1);
                option.classList.remove('selected');
            } else {
                currentValues.push(value);
                currentTexts.push(displayText);
                option.classList.add('selected');
            }

            container.querySelectorAll("input[type='hidden']").forEach(i => i.remove());

            const menu = container.querySelector('.dropdown-menu');
            currentValues.forEach(val => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = container.dataset.name + '[]';
                input.value = val;
                container.insertBefore(input, menu);
            });

            selectedTextSpan.innerText = currentTexts.length > 0 ? currentTexts.join(', ') : placeholder;

        } else {
            const hiddenInput = container.querySelector("input[type='hidden']");
            if (hiddenInput) {
                hiddenInput.value = value;
                // ✅ مهم: خلّي الجدول/الحاسبة تسمع بالتغيير فوراً
                hiddenInput.dispatchEvent(new Event('change', {
                    bubbles: true
                }));
                container.dispatchEvent(new CustomEvent('cd:change', {
                    detail: {
                        value: value
                    }
                }));
            }


            selectedTextSpan.innerText = displayText || placeholder;

            container.querySelector('.dropdown-menu').style.display = 'none';
            container.querySelectorAll('.dropdown-option').forEach(opt => opt.classList.remove('selected'));
            option.classList.add('selected');

            const row = container.closest('tr');
            if (row) {
                // نقرأ الإعدادات
                const config = JSON.parse(container.dataset.config || '{}');
                const bindFields = config.bindFields || [];

                // helper: يحط قيمة مع إطلاق حدث input (عشان الحاسبة تشتغل)
                const setField = (key, val) => {
                    const input = row.querySelector(`[name*='[${key}]']`);
                    if (!input) return;
                    input.value = val ?? '';
                    input.dispatchEvent(new Event('input', {
                        bubbles: true
                    }));
                };

                // لاحظ: مفاتيح الداتا تكون lowercase داخل dataset
                const getData = (k) => option.dataset[k] ?? option.dataset[k.toLowerCase()] ?? '';

                // عبّي الحقول المرتبطة
                bindFields.forEach(k => setField(k, getData(k)));

                // لو ما وجدت كمية، حط 1 افتراضيًا
                const qtyInput = row.querySelector(`[name*='[Quantity]']`);
                if (qtyInput && (qtyInput.value === '' || Number.isNaN(+qtyInput.value))) {
                    setField('Quantity', getData('quantity') || 1);
                }

                // لا نعبّي Tax ولا Total يدويًا — الحاسبة تحسبهم
            }

            // أعِد الحساب مباشرة
            if (window.recalcTable) window.recalcTable();
        }

    }




    function filterDropdown(input) {
        const filter = input.value.toLowerCase();
        const options = input.nextElementSibling.querySelectorAll('.dropdown-option');

        options.forEach(opt => {
            opt.style.display = opt.innerText.toLowerCase().includes(filter) ? 'block' : 'none';
        });
    }

    function closeAllDropdowns() {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.style.display = 'none';
        });
    }

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.custom-dropdown')) {
            closeAllDropdowns();
        }
    });
</script>
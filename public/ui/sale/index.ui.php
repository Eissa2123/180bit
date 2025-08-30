<link rel="stylesheet" href="<?= WASSETS ?>css/sale_index.css">
<link rel="stylesheet" href="<?= WASSETS ?>css/base.css">
<link rel="stylesheet" href="<?= WASSETS ?>css/data_table.css">




<?php
// اتجاه اللغة (لـ RTL/LTR)
$lang  = isset($Lang) ? strtolower($Lang) : 'ar';
$isRTL = in_array($lang, ['ar', 'fa', 'ur', 'he']);
$dir   = $isRTL ? 'rtl' : 'ltr';
?>

<div class="page-wrapper" dir="<?= $dir ?>" lang="<?= htmlspecialchars($lang) ?>">
    <div class="page-header">
        <!---Path Pages Header---->
        <div class="breadcrumbs">
            <a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a>
            <span>›</span>
            <strong class="active"><?= V($LTranslates, 'Sales') ?></strong>
        </div>
    </div>

    <!-- Tool Bar for Button (Add + Print)-->
    <div class="toolbar">
        <div class="toolbar-actions">
            <!----Add Button---->
            <?php
            $lang  = isset($Lang) ? strtolower($Lang) : 'ar';
            $isRTL = in_array($lang, ['ar', 'fa', 'ur', 'he']);
            $backIcon = $isRTL ? '<i class="ph ph-plus"></i>' : '<i class="ph ph-plus"></i>';
            require_once 'public/assets/widgets/button.php';
            renderButton([
                'href'      => WLink('sale/add'),
                'label'     => V($LTranslates, 'Add'),
                'icon'      => $backIcon,
                'icon_pos'  => 'end',
                'variant'   => 'ghost',
                'size'      => 'md',
                'rounded'   => 'lg',
                'style_vars' => [
                    '--btn-bg'      => '#ffffffff',
                    '--btn-text'    => '#000000ff',
                    '--btn-border'  => '#000000ff',
                    '--btn-hover-bg' => '#e2e1e1ff',
                    '--btn-px'      => '15px',
                    '--btn-py'      => '8px',
                ]
            ]);
            ?>
            <form action="<?= WLink('sale/prints') ?>" method="post" target="_blank" class="print-form">
                <input type="hidden" name="code" value="<?= V($LPosts, 'Code') ?>">
                <input type="hidden" name="sdatefrom" value="<?= V($LPosts, 'SDateFrom') ?>">
                <input type="hidden" name="sdateto" value="<?= V($LPosts, 'SDateTo') ?>">
                <input type="hidden" name="edatefrom" value="<?= V($LPosts, 'EDateFrom') ?>">
                <input type="hidden" name="edateto" value="<?= V($LPosts, 'EDateTo') ?>">
                <input type="hidden" name="from" value="<?= V($LPosts, 'From') ?>">
                <input type="hidden" name="to" value="<?= V($LPosts, 'To') ?>">
                <input type="hidden" name="length" value="<?= V($LPosts, 'Length') ?>">
                <input type="hidden" name="page" value="<?= V($LPosts, 'Page') ?>">

                <?php if (L($LPosts, 'Customers')) {
                    foreach ($LPosts['Customers'] as $Customer) { ?>
                        <input type="hidden" name="customers[]" value="<?= $Customer ?>">
                <?php }
                } ?>

                <?php if (L($LPosts, 'States')) {
                    foreach ($LPosts['States'] as $State) { ?>
                        <input type="hidden" name="states[]" value="<?= $State ?>">
                <?php }
                } ?>

                <!-----------------Print Button------>
                <?php
                require_once 'public/assets/widgets/button.php';
                renderButton([
                    'type'   => 'submit',
                    'name' => 'btn_print',
                    'label'  => V($LTranslates, 'Print'),
                    'variant' => 'solid',
                    'size'   => 'md',
                    'rounded' => 'lg',
                    'class' => 'btn btn-default btn-block',
                    'style_vars' => [
                        '--btn-bg'      => '#000000',
                        '--btn-text'    => '#ffffff',
                        '--btn-border'  => '#000000',
                        '--btn-hover-bg' => '#5c5c5c',
                        '--btn-px'      => '35px',
                        '--btn-py'      => '8px',
                    ],
                ]);
                ?>
            </form>
        </div>
    </div>


    <!----Main Panel Contain---->
    <div class="panel">
        <div class="panel-header">
            <!--Search Filters-->
            <form id="SalesFilter" action="<?= WLink('sale') ?>" method="post">
                <div class="filters-grid">
                    <!-----Code Textfield------>
                    <div class="fg-item span-3">
                        <?php
                        $label = V($LTranslates, 'Code');
                        $type = 'text';
                        $name = 'code';
                        $value = V($LPosts, 'Code');
                        $icon = '';
                        $required = false;
                        $placeholder = V($LTranslates, 'Code');
                        $readonly = false;
                        include 'public/assets/widgets/textField.php';
                        ?>
                    </div>

                    <!-----Customer------>
                    <div class="fg-item span-9">
                        <?php
                        require_once 'public/assets/widgets/custom-dropdown.php';
                        $customerOptions = [];
                        if (!empty($LCustomers)) {
                            foreach ($LCustomers as $Customer) {
                                $id   = (string) V($Customer, 'ID');
                                $text = V($Customer, 'Code') . ' - ' . V($Customer, 'Companyname') . ' : ' . V($Customer, 'Job');
                                $customerOptions[$id] = ['id' => $id, 'label' => $text, 'display' => $text];
                            }
                        }
                        $selectedCustomer = '';
                        if (!empty($LPosts['Customers'])) {
                            $first = is_array($LPosts['Customers']) ? reset($LPosts['Customers']) : $LPosts['Customers'];
                            $selectedCustomer = (string)$first;
                        }
                        renderCustomDropdown([
                            'name'      => 'customers',
                            'label'     => V($LTranslates, 'Customer'),
                            'multiple'  => false,
                            'required'  => false,
                            'options'   => $customerOptions,
                            'selected'  => $selectedCustomer,
                            'translate' => [
                                'placeholder' => V($LTranslates, 'SelectAll'),
                            ],
                        ]);
                        echo '<div id="mirror-slot-customers"></div>';
                        ?>
                    </div>

                    <!-----Date (From) Textfield------>
                    <div class="fg-item span-3">
                        <?php
                        $label = V($LTranslates, 'From');
                        $type = 'date';
                        $name = 'atfrom';
                        $value = V($LPosts, 'ATFrom');
                        $icon = '';
                        $required = false;
                        $placeholder = '';
                        $readonly = false;
                        include 'public/assets/widgets/textField.php';
                        ?>
                    </div>

                    <!-----Date (To) Textfield------>
                    <div class="fg-item span-3">
                        <?php
                        $label = V($LTranslates, 'To');
                        $type = 'date';
                        $name = 'atto';
                        $value = V($LPosts, 'ATTo');
                        $icon = '';
                        $required = false;
                        $placeholder = '';
                        $readonly = false;
                        include 'public/assets/widgets/textField.php';
                        ?>
                    </div>

                    <!-----Date (To) Textfield------>
                    <div class="fg-item span-3">
                        <?php
                        $label = V($LTranslates, 'CAT') . ' ' . V($LTranslates, 'From');
                        $type = 'date';
                        $name = 'from';
                        $value = V($LPosts, 'From');
                        $icon = '';
                        $required = false;
                        $placeholder = '';
                        $readonly = false;
                        include 'public/assets/widgets/textField.php';
                        ?>
                    </div>

                    <!-----Date (From) Textfield------>
                    <div class="fg-item span-3">
                        <?php
                        $label = V($LTranslates, 'CAT') . ' ' . V($LTranslates, 'To');
                        $type = 'date';
                        $name = 'to';
                        $value = V($LPosts, 'To');
                        $icon = '';
                        $required = false;
                        $placeholder = '';
                        $readonly = false;
                        include 'public/assets/widgets/textField.php';
                        ?>
                    </div>

                    <!-----State------>
                    <div class="fg-item span-3">
                        <?php
                        $stateOptions = [];
                        if (!empty($LStates)) {
                            foreach ($LStates as $State) {
                                $id   = (string) V($State, 'ID');
                                $name = V($State, 'Name' . LNG);
                                $stateOptions[$id] = ['id' => $id, 'label' => $name, 'display' => $name];
                            }
                        }
                        $selectedState = '';
                        if (!empty($LPosts['States'])) {
                            $first = is_array($LPosts['States']) ? reset($LPosts['States']) : $LPosts['States'];
                            $selectedState = (string)$first;
                        }
                        renderCustomDropdown([
                            'name'      => 'states',
                            'label'     => V($LTranslates, 'State'),
                            'multiple'  => false,
                            'required'  => false,
                            'options'   => $stateOptions,
                            'selected'  => $selectedState,
                            'translate' => [
                                'placeholder' => V($LTranslates, 'SelectAll'),
                            ],
                        ]);
                        echo '<div id="mirror-slot-states"></div>';
                        ?>
                    </div>

                    <!-----Lengths------>
                    <div class="fg-item span-3">
                        <?php
                        $lengthOptions = [];
                        if (!empty($LLengths)) {
                            foreach ($LLengths as $len) {
                                $id = (string)$len;
                                $lengthOptions[$id] = ['id' => $id, 'label' => $id, 'display' => $id];
                            }
                        }
                        $selectedLength = isset($_POST['length'])
                            ? (string)$_POST['length']
                            : (string)V($LPosts, 'Length');

                        renderCustomDropdown([
                            'name'      => 'length',
                            'label'     => V($LTranslates, 'Length'),
                            'multiple'  => false,
                            'required'  => false,
                            'options'   => $lengthOptions,
                            'selected'  => $selectedLength,
                            'translate' => ['placeholder' => V($LTranslates, 'Length')],
                        ]);
                        echo '<div id="mirror-slot-length"></div>';
                        ?>
                    </div>

                    <!-----Search Button And Clean Button------>
                    <div class="fg-item span-12">
                        <!-----Search Button------>
                        <div class="actions-row">
                            <?php
                            require_once 'public/assets/widgets/button.php';
                            renderButton([
                                'type'   => 'submit',
                                'name' => 'btn_search',
                                'label'  => V($LTranslates, 'Search'),
                                'variant' => 'solid',
                                'size'   => 'lg',
                                'rounded' => 'lg',
                                'class' => 'btn btn-default btn-block',
                                'style_vars' => [
                                    '--btn-bg'      => '#000000',
                                    '--btn-text'    => '#ffffff',
                                    '--btn-border'  => '#000000',
                                    '--btn-hover-bg' => '#5c5c5c',
                                    '--btn-py'      => '10px',
                                ],
                            ]);
                            ?>

                            <!-----Clean Button------>
                            <?php
                            require_once 'public/assets/widgets/button.php';
                            renderButton([
                                'href'   => WLink('sale'),
                                'label'  => V($LTranslates, 'Clean'),
                                'variant' => 'solid',
                                'size'   => 'lg',
                                'rounded' => 'lg',
                                'class' => 'btn btn-default btn-block',
                                'style_vars' => [
                                    '--btn-bg'      => '#000000',
                                    '--btn-text'    => '#ffffff',
                                    '--btn-border'  => '#000000',
                                    '--btn-hover-bg' => '#5c5c5c',
                                    '--btn-py'      => '10px',
                                ],
                            ]);
                            ?>
                            <input type="hidden" name="page" value="<?= V($LPosts, 'Page') ?>">
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <!---------------Table Contain The Data------------------>
        <div class="panel-body" id="repport">
            <?php
            require_once 'public/assets/widgets/data-table.php';

            renderDataTable([
                'id'  => 'salesTable',
                'dir' => (in_array(strtolower($Lang ?? 'ar'), ['ar', 'fa', 'ur', 'he']) ? 'rtl' : 'ltr'),
                'columns' => [
                    ['key' => 'ID', 'label' => V($LTranslates, 'ID'), 'align' => 'center', 'hide_xs' => true],
                    ['key' => 'Code', 'label' => V($LTranslates, 'Code'), 'align' => 'center'],
                    ['key' => 'Customer.Companyname', 'label' => V($LTranslates, 'Customer'), 'align' => 'center', 'hide_xs' => true],
                    ['key' => 'AT', 'label' => V($LTranslates, 'AT'), 'align' => 'center', 'hide_xs' => true, 'hide_sm' => true],
                    ['key' => 'TTC', 'label' => V($LTranslates, 'TTC'), 'align' => 'left', 'class' => 'tel', 'hide_xs' => true],
                    ['key' => 'Paids', 'label' => V($LTranslates, 'Paid'), 'align' => 'left', 'class' => 'tel', 'hide_xs' => true],
                    ['key' => 'Return', 'label' => V($LTranslates, 'Return'), 'align' => 'left', 'class' => 'tel', 'hide_xs' => true],
                    ['key' => 'Rest', 'label' => V($LTranslates, 'Rest'), 'align' => 'left', 'class' => 'tel', 'hide_xs' => true],
                    [
                        'key' => 'State.Name' . LNG,
                        'label' => V($LTranslates, 'State'),
                        'align' => 'center',
                        'hide_xs' => true,
                        'hide_sm' => true,
                        'render' => function ($row) {
                            $cls = htmlspecialchars(V($row, 'State', 'Class'));
                            $txt = htmlspecialchars(V($row, 'State', 'Name' . LNG));
                            return '<span class="label label-' . $cls . '">' . $txt . '</span>';
                        }
                    ],
                ],
                'rows' => $LSales ?? [],
                'actions_label' => V($LTranslates, 'Actions'),
                'actions' => [
                    ['title' => V($LTranslates, 'Print'), 'href' => WLink('sale/print/{ID}'), 'target' => '_blank', 'icon' => '<span class="glyphicon glyphicon-print"></span>'],
                    ['title' => V($LTranslates, 'Display'), 'href' => WLink('sale/display/{ID}'), 'icon' => '<span class="glyphicon glyphicon-eye-open"></span>'],
                    ['title' => V($LTranslates, 'Payments'), 'href' => WLink('salepayment/{ID}'), 'icon' => '<span class="glyphicon glyphicon-usd"></span>'],
                    ['title' => V($LTranslates, 'Returns'), 'href' => WLink('salereturn/{ID}'), 'icon' => '<span class="glyphicon glyphicon-share-alt"></span>'],
                ],
                'footer' => [
                    'cells' => [
                        ['colspan' => 4, 'text' => '', 'hide_xs' => true, 'hide_sm' => true],
                        ['text' => V($TPR, 'TTCs'), 'align' => 'left', 'class' => 'tel hide-xs hide-sm'],
                        ['text' => V($TPR, 'Paids'), 'align' => 'left', 'class' => 'tel hide-xs hide-sm'],
                        ['text' => V($TPR, 'Returns'), 'align' => 'left', 'class' => 'tel hide-xs hide-sm'],
                        ['text' => V($TPR, 'Rests'), 'align' => 'left', 'class' => 'tel hide-xs hide-sm'],
                        ['colspan' => 2, 'text' => V($LTranslates, 'Currency'), 'align' => 'center', 'hide_xs' => true, 'hide_sm' => true],
                    ]
                ],
                // المهم هنا:
                'pager'        => $Pager ?? null,   // مصفوفة الباك-إند (Current, Max, Next, Previous, Count...)
                'pager_form'   => '#SalesFilter',   // نفس الفورم حق الفلاتر
                'pager_field'  => 'Page',           // اسم الحقل اللي يقرأه الباك-إند
                'pager_labels' => [
                    'prev'   => V($LTranslates, 'Previous'),
                    'next'   => V($LTranslates, 'Next'),
                    'page'   => V($LTranslates, 'Page'),
                    'from'   => V($LTranslates, 'From'),
                    'length' => V($LTranslates, 'Lenght'),
                ],
                'pager_show_count' => false,
                'empty' => V($LTranslates, 'EResults'),
            ]);

            ?>
        </div>

        <?php /*if (isset($Pager)) { ?>
            <div class="panel-footer">
                <span class="only-xs text-center block"><?= V($LTranslates, 'Page') ?> <?= V($Pager, 'Current') ?> <?= V($LTranslates, 'From') ?> <?= V($Pager, 'Max') ?></span>
                <nav class="text-center">
                    <ul class="pager">
                        <?php if (isset($Pager['Previous'])) { ?>
                            <li class="previous"><a href="" data-page="<?= V($Pager, 'Previous') ?>">&larr; <?= V($LTranslates, 'Previous') ?></a></li>
                        <?php } ?>
                        <li class="current disabled hide-xs"><span><?= V($LTranslates, 'Lenght') ?> <?= V($Pager, 'Count') ?> | <?= V($LTranslates, 'Page') ?> <?= V($Pager, 'Current') ?> <?= V($LTranslates, 'From') ?> <?= V($Pager, 'Max') ?></span></li>
                        <?php if (isset($Pager['Next'])) { ?>
                            <li class="next"><a href="" data-page="<?= V($Pager, 'Next') ?>"><?= V($LTranslates, 'Next') ?> &rarr;</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        <?php } */ ?>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('form[action="<?= WLink('sale') ?>"]');
            if (!form) return;

            // يضمن أننا نرجّع للصفحة 1 كل ما تغيّر فلتر
            var pageInput = form.querySelector('input[name="page"]');
            if (!pageInput) {
                pageInput = document.createElement('input');
                pageInput.type = 'hidden';
                pageInput.name = 'page';
                pageInput.value = '1';
                form.appendChild(pageInput);
            }

            function findHiddenByName(name) {
                return form.querySelector('.custom-dropdown input[type="hidden"][name="' + name + '"]') ||
                    form.querySelector('input[type="hidden"][name="' + name + '"]');
            }

            function writeArrayIntoSlot(slotId, mirrorName, values) {
                var slot = document.getElementById(slotId);
                if (!slot) {
                    slot = document.createElement('div');
                    slot.id = slotId;
                    form.appendChild(slot);
                }
                slot.innerHTML = '';
                if (!values || values.length === 0) return; // بدون شيء = "الكل"
                values.forEach(function(v) {
                    var inp = document.createElement('input');
                    inp.type = 'hidden';
                    inp.name = mirrorName;
                    inp.value = v;
                    slot.appendChild(inp);
                });
            }

            function currentValuesOfSingle(name) {
                var hid = findHiddenByName(name);
                var v = hid && hid.value ? String(hid.value).trim() : '';
                return v ? [v] : [];
            }

            // عمل المرآة
            function setupMirrorSingle(fieldName, mirrorName, slotId) {
                // أول مرة
                writeArrayIntoSlot(slotId, mirrorName, currentValuesOfSingle(fieldName));

                // استماع لحدث ودجتكم (يطلق cd:change)
                var root = findHiddenByName(fieldName);
                root = root ? root.closest('.custom-dropdown') : null;
                if (root) {
                    root.addEventListener('cd:change', function(e) {
                        var vals = [];
                        if (e.detail) {
                            if (Array.isArray(e.detail.values)) vals = e.detail.values.map(String);
                            else if (e.detail.value != null) vals = [String(e.detail.value)];
                        } else {
                            vals = currentValuesOfSingle(fieldName);
                        }
                        writeArrayIntoSlot(slotId, mirrorName, vals);
                        pageInput.value = 1;
                    });
                }

                // وأثناء الإرسال نتأكد آخر قيمة مكتوبة
                form.addEventListener('submit', function() {
                    writeArrayIntoSlot(slotId, mirrorName, currentValuesOfSingle(fieldName));
                });
            }

            // العملاء: الواجهة اسمها customers (واحد)، الباك إند يبغى customers[]
            setupMirrorSingle('customers', 'customers[]', 'mirror-slot-customers');

            // الحالة: الواجهة اسمها states (واحد)، الباك إند يبغى states[]
            setupMirrorSingle('states', 'states[]', 'mirror-slot-states');

            // الطول: الواجهة والباك إند نفس الاسم length (قيمة واحدة فقط)
            // هنا ما نحتاج []، فنكتب input hidden واحد في نفس السلوْت:
            (function setupLength() {
                var slotId = 'mirror-slot-length';
                var hid = findHiddenByName('length');

                function writeLength() {
                    var slot = document.getElementById(slotId);
                    if (!slot) {
                        slot = document.createElement('div');
                        slot.id = slotId;
                        form.appendChild(slot);
                    }
                    slot.innerHTML = '';
                    if (!hid || !hid.value) return;
                    var inp = document.createElement('input');
                    inp.type = 'hidden';
                    inp.name = 'length'; // بالضبط
                    inp.value = hid.value;
                    slot.appendChild(inp);
                }

                writeLength();

                var root = hid ? hid.closest('.custom-dropdown') : null;
                if (root) {
                    root.addEventListener('cd:change', function() {
                        writeLength();
                        pageInput.value = 1;
                    });
                }
                form.addEventListener('submit', writeLength);
            })();

            // احتياط: أي cd:change داخل الفورم يرجّع الصفحة للأولى
            form.addEventListener('cd:change', function() {
                pageInput.value = 1;
            }, true);
        });
    </script>

    <script>
        // يرسل فورًا عند الضغط على أزرار البيجر (التالي/السابق)
        document.addEventListener('click', function(e) {
            var link = e.target.closest('.dt-pager a[data-page]');
            if (!link) return;
            e.preventDefault();

            var pager = link.closest('.dt-pager');
            if (!pager) return;

            // لو الودجت يطبع data-form/data-page-name نستخدمها، وإلا نطيح لـ #SalesFilter و Page
            var formSel = pager.getAttribute('data-form') || '#SalesFilter';
            var pageField = pager.getAttribute('data-page-name') || 'Page';
            var form = document.querySelector(formSel) || document.querySelector('#SalesFilter');
            if (!form) return;

            var to = parseInt(link.getAttribute('data-page'), 10) || 1;

            // نقيّد داخل المدى لو متوفر data-current/data-max من الودجت
            var max = parseInt(pager.getAttribute('data-max'), 10);
            if (!isNaN(max)) {
                if (to < 1) to = 1;
                if (to > max) to = max;
            }

            // نكتب نفس الرقم في الاسمين (احتياط لبعض الباك إند)
            function ensure(name) {
                var inp = form.querySelector('input[name="' + name + '"]');
                if (!inp) {
                    inp = document.createElement('input');
                    inp.type = 'hidden';
                    inp.name = name;
                    form.appendChild(inp);
                }
                inp.value = String(to);
            }
            ensure(pageField); // الحقل المتفق عليه من الودجت (مثلاً Page)
            ensure('Page'); // احتياط
            ensure('page'); // احتياط

            // أرسل الفورم فورًا
            if (typeof form.requestSubmit === 'function') {
                form.requestSubmit(); // يمر على أي onsubmit موجود
            } else {
                form.submit();
            }
        }, true);
    </script>

</div>
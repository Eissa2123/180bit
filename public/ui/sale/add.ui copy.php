<link rel="stylesheet" href="<?= WASSETS ?>css/add-invo.css">
<script src="<?= WASSETS ?>js/finance-calculator.js"></script>

<?php if (!empty($RedirectTo)): ?>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.location.replace('<?= $RedirectTo ?>');
        });
    </script>
    <?php return; ?>
<?php endif; ?>



<div class="page-wrapper">
    <div class="page-header">
        <div class="breadcrumbs">
            <a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a>
            <span>›</span>
            <a href="<?= WLink('sale') ?>"><?= V($LTranslates, 'Sales') ?></a>
            <span>›</span>
            <strong><?= V($LTranslates, 'Add') ?></strong>
        </div>
        <div class="actions">
            <a href="<?= WLink('sale') ?>" class="button secondary">
                <?= V($LTranslates, 'Back') ?>
                <i class="ph ph-arrow-left"></i>
            </a>
        </div>
    </div>

    <div class="page-body">
        <?php if (!empty($Success)) : ?>
            <div class="alert success"><?= V($LTranslates, 'ASuccess') ?></div>
        <?php elseif (!empty($Errors)) : ?>
            <div class="alert error"><?= V($LTranslates, 'ADanger') ?></div>
        <?php endif; ?>


        <form class="sale-form" action="<?= WLink('sale/add') ?>" method="post">
            <input type="hidden" name="POSTS[btn_add]" value="1">
            <div class="form-section">
                <?php
                $customerOptions = [];
                foreach ($LCustomers as $Customer) {
                    $id = V($Customer, 'ID');
                    $company = V($Customer, 'Companyname');
                    $customerOptions[$id] = [
                        'label'   => $company,
                        'display' => $company,
                        'id'      => $id
                    ];
                }
                include 'public/assets/widgets/custom-dropdown.php';
                renderCustomDropdown([
                    'name'     => 'Customer',
                    'label'    => V($LTranslates, 'Customer'),
                    'required' => true,
                    'multiple' => false,
                    'options'  => $customerOptions,
                    'selected' => $_POST['Customer'] ?? ($selectedCustomer ?? ''),
                    'translate' => [
                        'placeholder' => V($LTranslates, 'SelectAll'),
                    ]
                ]);
                ?>

                <?php
                $label = V($LTranslates, 'AT');
                $type = 'date';
                $name = 'AT';
                $value = V($LPosts, 'AT') != "" ? V($LPosts, 'AT') : DT;
                $icon = '';
                $required = true;
                $placeholder = '';
                $readonly = false;
                include 'public/assets/widgets/textField.php';
                ?>
            </div>


            <!---VAT---->
            <?php
            /*
            $label = V($LTranslates, 'Code');
            $type = 'text';
            $name = 'Code';
            $value = V($LPosts, 'Code');
            $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
            $required = false;
            $placeholder = V($LTranslates, 'Code');
            $readonly = false;
            include 'public/assets/widgets/textField.php';
            */ ?>




            <div class="form-section">
                <?php
                $productOptionsByCode = [];
                foreach ($LProducts as $p) {
                    $id     = V($p, 'ID');
                    $code   = V($p, 'Code');
                    $name   = V($p, 'Name');
                    $desc   = V($p, 'Description');
                    $price  = V($p, 'Price');
                    $vat    = V($p, 'VAT');

                    $productOptionsByCode[$id] = [
                        'label'       => "{$name} [{$code}]",
                        'display'     => $code,
                        'id'          => $id,
                        'code'        => $code,
                        'name'        => $name,
                        'description' => $desc,
                        'price'       => $price,
                        'quantity'    => 1,
                        'tax'         => $vat,
                        'total'       => 0,
                    ];
                }

                $columns = [
                    [
                        'key' => 'ID',
                        'label' => 'الكود',
                        'type' => 'dropdown',
                        'dropdownOptions' => $productOptionsByCode,
                        'labelField' => 'label',
                        'displayField' => 'display',
                        'bindFields' => ['Name', 'Description', 'Price', 'Quantity'],
                    ],
                    ['key' => 'Name', 'label' => 'الاسم', 'type' => 'text', 'readonly' => true],
                    ['key' => 'Description', 'label' => 'الوصف', 'type' => 'text'],
                    ['key' => 'Price', 'label' => 'السعر', 'type' => 'text'],
                    ['key' => 'Quantity', 'label' => 'الكمية', 'type' => 'text'],
                    ['key' => 'Tax', 'label' => 'الضريبة', 'type' => 'text', 'readonly' => true, 'noPost' => true],
                    ['key' => 'Total', 'label' => 'الإجمالي', 'type' => 'text', 'readonly' => true, 'noPost' => true],
                ];



                require_once 'public/assets/widgets/editable-table.php';
                $oldRows = $_POST['Products'] ?? [];
                renderEditableTable('Products', $columns, $oldRows);
                ?>
            </div>

            <div class="form-section grid-2-cols">
                <!---VAT---->
                <?php
                $label = V($LTranslates, 'TVA');
                $type = 'currency';
                $name = 'TVA';
                $value = V($LPosts, 'TVA') ? V($LPosts, 'TVA') : V($Setting, 'TVA');
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = true;
                include 'public/assets/widgets/textField.php';
                ?>

                <!---TAX---->
                <?php
                $label = V($LTranslates, 'Tax');
                $type = 'currency';
                $name = 'Tax';
                $value = V($LPosts, 'Tax') ? V($LPosts, 'Tax') : V($Setting, 'Tax');
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = true;
                include 'public/assets/widgets/textField.php';
                ?>


                <!---Coupon---->
                <?php
                $cobonOptions = [];
                $selectedCobon = V($LPosts, 'cobon') ?? '';
                foreach ($LCobons as $Cobon) {
                    $id = V($Cobon, 'ID');
                    $name = V($Cobon, 'Name');
                    $discount = floatval(V($Cobon, 'Discount'));
                    $displayText = $discount > 0 ? "{$name} (% {$discount})" : "{$name} (0%)";

                    $cobonOptions[$id] = [
                        'label'   => $displayText,
                        'display' => $displayText,
                        'id'      => $id
                    ];

                    // حدد أول كوبون خصمه 0% فقط إذا لم يكن هناك قيمة محفوظة مسبقًا
                    if ($selectedCobon === '' && $discount === 0.0) {
                        $selectedCobon = $id;
                    }
                }

                include 'public/assets/widgets/custom-dropdown.php';
                renderCustomDropdown([
                    'name'     => 'Cobon',
                    'label'    => V($LTranslates, 'Cobon'),
                    'required' => true,
                    'multiple' => false,
                    'options'  => $cobonOptions,
                    'selected' => $selectedCobon,
                    'translate' => [
                        'placeholder' => V($LTranslates, 'SelectAll'),
                    ]
                ]);
                ?>



                <!---Coupon Cost---->
                <?php
                $label = V($LTranslates, 'Gift');
                $type = 'currency';
                $name = 'Gift';
                $value = V($LPosts, 'Gift') ? V($LPosts, 'Gift') : '0.00';
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = true;
                include 'public/assets/widgets/textField.php';
                ?>

                <!---Discount Cost---->
                <?php
                $label = V($LTranslates, 'Reduction');
                $type = 'currency';
                $name = 'Reduction';
                $value = V($LPosts, 'Reduction') ? V($LPosts, 'Reduction') : '0.00';
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = false;
                include 'public/assets/widgets/textField.php';
                ?>

                <!---Expense Cost---->
                <?php
                $label = V($LTranslates, 'Expense');
                $type = 'currency';
                $name = 'Expense';
                $value = V($LPosts, 'Expense') ? V($LPosts, 'Expense') : '0.00';
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = false;
                include 'public/assets/widgets/textField.php';
                ?>


                <!---Total Without VAT---->
                <?php
                $label = V($LTranslates, 'HT');
                $type = 'currency';
                $name = 'HT';
                $value = V($LPosts, 'HT') ? V($LPosts, 'HT') : '0.00';
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = true;
                include 'public/assets/widgets/textField.php';
                ?>

                <!---Total With VAT---->
                <?php
                $label = V($LTranslates, 'TTC');
                $type = 'currency';
                $name = 'TTC';
                $value = V($LPosts, 'TTC') ? V($LPosts, 'TTC') : '0.00';
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = true;
                include 'public/assets/widgets/textField.php';
                ?>

                <!---Paid In Cash---->
                <?php
                $label = V($LTranslates, 'Paid') . ' ' . V($LTranslates, 'Monetary');
                $type = 'currency';
                $name = 'PaidMonetary';
                $value = V($LPosts, 'PaidMonetary') != '' ? V($LPosts, 'PaidMonetary') : '0.00';
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = false;
                include 'public/assets/widgets/textField.php';
                ?>

                <!---Paid In Credit---->
                <?php
                $label = V($LTranslates, 'Paid') . ' ' . V($LTranslates, 'Online');
                $type = 'currency';
                $name = 'PaidOnline';
                $value = V($LPosts, 'PaidOnline') != '' ? V($LPosts, 'PaidOnline') : '0.00';
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = false;
                include 'public/assets/widgets/textField.php';
                ?>


                <!---Total Paid---->
                <?php
                $label = V($LTranslates, 'Paid');
                $type = 'currency';
                $name = 'Paid';
                $value = V($LPosts, 'Paid') != '' ? V($LPosts, 'Paid') : '0.00';
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = true;
                include 'public/assets/widgets/textField.php';
                ?>


                <!---Total Rest---->
                <?php
                $label = V($LTranslates, 'Rest');
                $type = 'currency';
                $name = 'Rest';
                $value = V($LPosts, 'Rest') ? V($LPosts, 'Rest') : '0.00';
                $icon = '<img src="' . WASSETS . 'images/Saudi_Riyal.svg.png" alt="SAR" style="height: 1rem;">';
                $required = true;
                $placeholder = '';
                $readonly = true;
                include 'public/assets/widgets/textField.php';
                ?>

            </div>


            <div class="form-section">
                <?php
                $termsOptions = [];
                foreach ($LTerms as $Terms) {
                    $id = V($Terms, 'ID');
                    $name = V($Terms, 'Name');
                    $termsOptions[$id] = [
                        'label'   => $name,
                        'display' => $name,
                        'id'      => $id
                    ];
                }

                renderCustomDropdown([
                    'name'     => 'Terms',
                    'label'    => V($LTranslates, 'Terms'),
                    'required' => false,
                    'multiple' => false,
                    'options'  => $termsOptions,
                    'selected' => $selectedTerms ?? '',
                    'translate' => [
                        'placeholder' => V($LTranslates, 'SelectAll'),
                    ]
                ]);
                ?>
            </div>

            <div class="form-section">
                <?php
                $label = V($LTranslates, 'Notes');
                $type = 'text';
                $name = 'notes';
                $value = V($LPosts, 'Notes');
                $icon = '';
                $required = false;
                $placeholder = V($LTranslates, 'Notes');
                $readonly = false;
                include 'public/assets/widgets/textField.php';
                ?>
            </div>

            <div class="form-actions">
                <button type="submit" class="button primary" name="btn_add" value="1">
                    <?= V($LTranslates, 'Save') ?>
                    <i class="glyphicon glyphicon-ok"></i>
                </button>

                <?php if (isset($Cells['ID'])) { ?>
                    <a class="button success" href="<?= WLink('sale/display/' . V($Cells, 'ID')) ?>">
                        <?= V($LTranslates, 'Display') ?>
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>

                    <a class="button info" href="<?= WLink('sale/print/' . V($Cells, 'ID')) ?>" target="_blank">
                        <?= V($LTranslates, 'Print') ?>
                        <i class="glyphicon glyphicon-print"></i>
                    </a>
                <?php } ?>
            </div>

        </form>
    </div>
</div>
<?php
// شعار Base64 (آمن لـ mPDF)
$projectRoot = realpath(__DIR__ . '/../../../'); // ui/sale ← public ← root
$logoPath    = $projectRoot . '/public/assets/themes/default/images/goleenkit.png';

if (!is_file($logoPath)) {
    $p = parse_url(IMGS . 'goleenkit.png', PHP_URL_PATH);
    if ($p) {
        $alt = rtrim($_SERVER['DOCUMENT_ROOT'], '/\\') . $p;
        if (is_file($alt)) $logoPath = $alt;
    }
}
$logoSrc = '';
if (is_file($logoPath)) {
    $mime    = function_exists('mime_content_type') ? mime_content_type($logoPath) : 'image/png';
    $logoSrc = 'data:' . $mime . ';base64,' . base64_encode(file_get_contents($logoPath));
}
?>

<page class="inv">

    <!-- الهيدر العلوي: QR يسار / شعار يمين -->
    <table class="hdr-top no-border" dir="ltr" cellspacing="0" cellpadding="0">
        <colgroup>
            <col width="50%" />
            <col width="50%" />
        </colgroup>
        <tr>
            <td style="text-align:left; vertical-align:top;">
                <barcode code="<?= V($Cells, 'TLV') ?>" size="1.05" type="QR" error="M" class="barcode" disableborder="1" />
            </td>
            <td style="text-align:right; vertical-align:top;">
                <?php if ($logoSrc): ?><img class="logo" src="<?= $logoSrc ?>" alt="logo"><?php endif; ?>
            </td>
        </tr>
    </table>

    <!-- معلومات الشركة: إنجليزي يسار | عربي يمين -->
    <table class="coinfo no-border" dir="ltr" cellspacing="0" cellpadding="0">
        <colgroup>
            <col width="50%" />
            <col width="50%" />
        </colgroup>
        <tr>
            <td class="co-en ltr text-left">
                <div class="co-name">Golden Kit For Uniform Cloths, Designing, Printing &amp; Sportswear</div>
                <div class="co-line">C.R.: <?= V(COMPANY, 'RC') ?></div>
                <div class="co-line">VAT: <?= V(COMPANY, 'TaxNumber') ?></div>
                <div class="co-line"><?= V(COMPANY, 'Email1') ?></div>
            </td>
            <td class="co-ar rtl text-right">
                <div class="co-name">الطقم الذهبي للزي الموحد والتصميم والطباعة والملابس الرياضية</div>
                <div class="co-line">س.ت: <?= V(COMPANY, 'RC') ?></div>
                <div class="co-line">الرقم الضريبي: <?= V(COMPANY, 'TaxNumber') ?></div>
                <div class="co-line"><?= V(COMPANY, 'Email1') ?></div>
            </td>
        </tr>
    </table>

    <div class="hr"></div>

    <!-- ميتاداتا الفاتورة: عربي | القيمة | إنجليزي -->
    <table class="meta no-border">
        <tr>
            <th class="rtl text-right w30">تاريخ الفاتورة</th>
            <td class="text-center w40"><?= V($Cells, 'AT') ?></td>
            <th class="ltr text-left w30">Bill Date</th>
        </tr>
        <tr>
            <th class="rtl text-right">رقم الفاتورة</th>
            <td class="text-center"><?= V($Cells, 'Code') ?></td>
            <th class="ltr text-left">Invoice No.</th>
        </tr>
        <tr>
            <th class="rtl text-right">رقم العميل</th>
            <td class="text-center"><?= V($Cells, 'Customer', 'Code') ?></td>
            <th class="ltr text-left">Customer Code</th>
        </tr>
        <tr>
            <th class="rtl text-right">اسم العميل</th>
            <td class="text-center"><?= V($Cells, 'Customer', 'Companyname') ?></td>
            <th class="ltr text-left">Customer Name</th>
        </tr>
        <tr>
            <th class="rtl text-right">الرقم الضريبي للعميل</th>
            <td class="text-center"><?= V($Cells, 'Customer', 'Taxnumber') ?></td>
            <th class="ltr text-left">Customer VAT</th>
        </tr>
    </table>

    <br>
    <!-- جدول الأصناف (نمط مكدّس: اسم الصنف فوق / الوصف تحت) -->
    <table class="items items-stacked">
        <thead>
            <tr>
                <th style="width:60%;">الصنف / البيان<br><span class="sub ltr">Item / Description</span></th>
                <th style="width:8%;">الكمية<br>QTY</th>
                <th style="width:12%;">سعر الوحدة<br>Unit Price</th>
                <th style="width:12%;">الإجمالي<br>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($Cells['Products'])): ?>
                <?php foreach ($Cells['Products'] as $cell): ?>
                    <tr>
                        <td class="rtl">
                            <div class="stk-top">
                                <span class="stk-name"><?= V($cell, 'Product', 'Name') ?></span>
                                <?php if (V($cell, 'Product', 'Code')): ?>
                                    <span class="stk-sep">•</span>
                                    <span class="stk-code"><?= V($cell, 'Product', 'Code') ?></span>
                                <?php endif; ?>
                            </div>

                            <?php if (V($cell, 'Description')): ?>
                                <div class="stk-desc"><?= V($cell, 'Description') ?></div>
                            <?php endif; ?>
                        </td>
                        <td class="text-center"><?= V($cell, 'Quantity') ?></td>
                        <td class="text-right"><?= V($cell, 'Price') ?></td>
                        <td class="text-right"><?= V($cell, 'HT') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td class="text-center" colspan="4">No items</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


    <!-- المجاميع + الملاحظات -->
    <table class="totals no-border">
        <tr>
            <td class="notes">
                <div class="notes-head ltr">Payment Terms / شروط الدفع</div>
                <div class="notes-line"></div>
                <div class="amount-words rtl">المبلغ بالحروف: <span>......</span></div>
            </td>
            <td class="sum">
                <table class="sum-box">
                    <tr>
                        <td class="lbl ltr">Subtotal / الإجمالي قبل الضريبة</td>
                        <td class="val text-right"><?= V($Cells, 'HT') ?></td>
                    </tr>
                    <tr>
                        <td class="lbl ltr">Discount (Cobon <?= V($Cells, 'Cobon', 'Ratio') ?>%)</td>
                        <td class="val text-right"><?= V($Cells, 'Gift') ?></td>
                    </tr>
                    <tr>
                        <td class="lbl ltr">VAT (<?= V($Cells, 'TVA') ?>%) / الضريبة</td>
                        <td class="val text-right"><?= V($Cells, 'Tax') ?></td>
                    </tr>
                    <tr>
                        <td class="lbl ltr">Paid (<?= V($Cells, 'Method', 'Name' . LNG) ?>)</td>
                        <td class="val text-right"><?= V($Cells, 'Paids') ?></td>
                    </tr>
                    <tr>
                        <td class="lbl strong ltr">Total Due / المستحق</td>
                        <td class="val strong text-right">SAR <?= V($Cells, 'TTC') ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="hr"></div>

    <!-- البنك -->
    <table class="bank3">
        <thead>
            <tr>
                <th colspan="3">Bank Details / بيانات البنك</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="rtl text-right bank-lbl" style="width:25%;">اسم الحساب</td>
                <td class="text-center"><?= V(COMPANY, 'RIB') ?></td>
                <td class="ltr text-left bank-lbl" style="width:25%;">Account Name</td>
            </tr>
            <tr>
                <td class="rtl text-right bank-lbl">اسم البنك</td>
                <td class="text-center"><?= V(COMPANY, 'Bankname') ?></td>
                <td class="ltr text-left bank-lbl">Bank Name</td>
            </tr>
            <?php if (V(COMPANY, 'IBAN')): ?>
                <tr>
                    <td class="rtl text-right bank-lbl">رقم الآيبان</td>
                    <td class="text-center ltr"><?= V(COMPANY, 'IBAN') ?></td>
                    <td class="ltr text-left bank-lbl">IBAN</td>
                </tr>
            <?php endif; ?>
            <?php if (V(COMPANY, 'Swift')): ?>
                <tr>
                    <td class="rtl text-right bank-lbl">سويفت</td>
                    <td class="text-center ltr"><?= V(COMPANY, 'Swift') ?></td>
                    <td class="ltr text-left bank-lbl">SWIFT</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


    <div class="hr"></div>

    <!-- التواقيع -->
    <table class="sign-wrap">
        <tr>
            <td>
                <table class="sig-box" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="sig-title">المستلم • Receiver</td>
                    </tr>
                    <tr>
                        <td class="sig-pad"></td>
                    </tr>
                    <tr class="sig-meta">
                        <td>
                            <table class="no-border" style="width:100%;">
                                <tr>
                                    <td class="rtl text-right">الاسم / Name</td>
                                    <td class="ltr text-left">التاريخ / Date</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="sig-box" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="sig-title">البائع • Seller</td>
                    </tr>
                    <tr>
                        <td class="sig-pad"></td>
                    </tr>
                    <tr class="sig-meta">
                        <td>
                            <table class="no-border" style="width:100%;">
                                <tr>
                                    <td class="rtl text-right">الاسم / Name</td>
                                    <td class="ltr text-left">التاريخ / Date</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>



</page>
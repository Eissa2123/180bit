<?php
// ─[1] شعار الشركة كـ Data URI لضمان ظهوره في PDF ──────────────────────────────
$projectRoot = realpath(__DIR__ . '');
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

<!-- ╭─────────────────────────────── CSS المخصص لـ mPDF ────────────────────────────────╮ -->
<style>
    body {
        font-family: 'DejaVu Sans', sans-serif;
        font-size: 11px;
        color: #222;
    }

    .rtl {
        direction: rtl;
        text-align: right;
    }

    .ltr {
        direction: ltr;
        text-align: left;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .text-left {
        text-align: left;
    }

    .fw-bold {
        font-weight: bold;
    }

    .muted {
        color: #666;
    }

    .small {
        font-size: 10px;
    }

    .xsmall {
        font-size: 9px;
    }

    .mt-5 {
        margin-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .mb-5 {
        margin-bottom: 5px;
    }

    .mb-10 {
        margin-bottom: 10px;
    }

    .py-4 {
        padding-top: 4px;
        padding-bottom: 4px;
    }

    .px-6 {
        padding-left: 6px;
        padding-right: 6px;
    }

    .table {
        width: 90%;
        margin: 0 auto;
        border-collapse: collapse;
    }

    .table.narrow {
        width: 90%;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 6px 8px;
        vertical-align: middle;
    }

    .table th {
        background: #f4f6f8;
        font-weight: bold;
    }

    .table.no-border th,
    .table.no-border td {
        border: none;
    }

    .table.clean td {
        border-color: #fff;
    }

    /* لمسافات بيضاء بين صفوف العناصر */
    .items thead th {
        font-size: 10px;
    }

    .items td,
    .items th {
        font-size: 10px;
    }

    .money {
        direction: ltr;
        text-align: right;
    }

    .badge {
        background: #111;
        color: #fff;
        border-radius: 3px;
        padding: 2px 6px;
        font-size: 10px;
        display: inline-block;
    }

    .hr {
        width: 90%;
        height: 1px;
        background: #000;
        margin: 10px auto;
    }

    .totals {
        width: 90%;
        margin: 0 auto;
        border-collapse: collapse;
    }

    .totals td,
    .totals th {
        padding: 6px 8px;
    }

    .totals .card {
        border: 1px solid #ddd;
        background: #fff;
    }

    .totals .label {
        width: 40%;
    }

    .totals .value {
        width: 60%;
        text-align: right;
    }

    /* مربّع التواقيع */
    .sign-line {
        border-bottom: 1px solid #ccc;
        height: 22px;
    }

    .sign-box {
        width: 90%;
        margin: 0 auto;
    }

    /* تصحيح ثنائي اللغة داخل نفس الصف */
    .split-3 {
        width: 90%;
        margin: 0 auto;
        border-collapse: collapse;
    }

    .split-3 td {
        border: none;
        padding: 2px 0;
    }

    .split-3 .col-ar,
    .split-3 .col-en {
        width: 35%;
    }

    .split-3 .col-mid {
        width: 30%;
        text-align: center;
    }

    /* ترويسة الفاتورة */
    .header-title {
        font-size: 14px;
        letter-spacing: .3px;
    }

    .brand {
        font-size: 12px;
    }
</style>
<!-- ╰──────────────────────────────────────────────────────────────────────────────╯ -->

<page>

    <!-- ───────────── Header ───────────── -->
    <table class="table no-border narrow">
        <tr>
            <td class="text-right rtl brand" style="width:35%">
                الطقم الذهبي للزي الموحد والتصميم<br />
                والطباعة والملابس الرياضية
            </td>
            <td class="text-center" style="width:30%">
                <?php if ($logoSrc): ?>
                    <img src="<?= $logoSrc ?>" style="width:150px;" alt="logo">
                <?php endif; ?>
                <div class="header-title mt-5">
                    <span class="badge">فاتورة / Invoice</span>
                </div>
            </td>
            <td class="text-left ltr brand" style="width:35%">
                Golden Kit for Uniform Clothes,<br />
                Designing, Printing & Sportswear
            </td>
        </tr>
        <tr>
            <td class="text-right rtl small">
                س.ت: <?= V(COMPANY, 'RC') ?><br />
                <?= V(COMPANY, 'Email1') ?><br />
                الرقم الضريبي: <?= V(COMPANY, 'TaxNumber') ?><br />
            </td>
            <td></td>
            <td class="text-left ltr small">
                C.R.: <?= V(COMPANY, 'RC') ?><br />
                <?= V(COMPANY, 'Email1') ?><br />
                VAT No: <?= V(COMPANY, 'TaxNumber') ?><br />
            </td>
        </tr>
    </table>

    <div class="hr"></div>

    <!-- ───────────── Invoice meta (AR | value | EN) ───────────── -->
    <table class="split-3">
        <tr>
            <td class="col-ar text-right rtl fw-bold">تاريخ الفاتورة</td>
            <td class="col-mid fw-bold"><?= V($Cells, 'AT') ?></td>
            <td class="col-en text-left ltr fw-bold">Bill Date</td>
        </tr>
        <tr>
            <td class="col-ar text-right rtl fw-bold">رقم الفاتورة</td>
            <td class="col-mid fw-bold"><?= V($Cells, 'Code') ?></td>
            <td class="col-en text-left ltr fw-bold">Bill Code</td>
        </tr>
        <tr>
            <td class="col-ar text-right rtl">رقم العميل</td>
            <td class="col-mid"><?= V($Cells, 'Customer', 'Code') ?></td>
            <td class="col-en text-left ltr">Customer Code</td>
        </tr>
        <tr>
            <td class="col-ar text-right rtl">اسم العميل</td>
            <td class="col-mid"><?= V($Cells, 'Customer', 'Companyname') ?></td>
            <td class="col-en text-left ltr">Customer Name</td>
        </tr>
        <tr>
            <td class="col-ar text-right rtl">الرقم الضريبي للعميل</td>
            <td class="col-mid"><?= V($Cells, 'Customer', 'Taxnumber') ?></td>
            <td class="col-en text-left ltr">Customer VAT</td>
        </tr>
    </table>

    <br />

    <!-- ───────────── Items table ───────────── -->
    <table class="table items" autosize="1">
        <thead>
            <tr>
                <th class="text-center" style="width:10%">
                    الرمز<br /><span class="small">Code</span>
                </th>
                <th class="text-center" style="width:22%">
                    الصنف<br /><span class="small">Item</span>
                </th>
                <th class="text-center">
                    البيان<br /><span class="small">Description</span>
                </th>
                <th class="text-center" style="width:6%">
                    الكمية<br /><span class="small">QTY</span>
                </th>
                <th class="text-center" style="width:10%">
                    سعر الوحدة<br /><span class="small">Unit Price</span>
                </th>
                <th class="text-center" style="width:12%">
                    إجمالي السعر<br /><span class="small">Total</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($Cells['Products'])): ?>
                <?php foreach ($Cells['Products'] as $cell): ?>
                    <tr>
                        <td class="text-center"><?= V($cell, 'Product', 'Code') ?></td>
                        <td class="text-right rtl"><?= V($cell, 'Product', 'Name') ?></td>
                        <td class="text-right rtl"><?= V($cell, 'Description') ?></td>
                        <td class="text-center"><?= V($cell, 'Quantity') ?></td>
                        <td class="money"><?= V($cell, 'Price') ?></td>
                        <td class="money"><?= V($cell, 'HT') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center muted">لا توجد أصناف</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br />

    <!-- ───────────── Totals + QR ───────────── -->
    <table class="totals">
        <tr>
            <td style="width:50%; vertical-align:top;">
                <!-- QR Code -->
                <div class="text-center card" style="padding:10px;">
                    <barcode code="<?= V($Cells, 'TLV') ?>" size="1.2" type="QR" error="M" class="barcode" disableborder="1" />
                    <div class="xsmall muted mt-5">فاتورة إلكترونية — TLV QR</div>
                </div>
            </td>
            <td style="width:50%; vertical-align:top;">
                <table class="table no-border card" style="width:100%;">
                    <tr>
                        <td class="label text-right rtl fw-bold">المجموع قبل الضريبة</td>
                        <td class="value money"><?= V($Cells, 'HT') ?></td>
                    </tr>
                    <tr>
                        <td class="text-right rtl">الضريبة VAT (<?= V($Cells, 'TVA') ?> %)</td>
                        <td class="value money"><?= V($Cells, 'Tax') ?></td>
                    </tr>
                    <tr>
                        <td class="text-right rtl">الكوبون Cobon (<?= V($Cells, 'Cobon', 'Ratio') ?> %)</td>
                        <td class="value money"><?= V($Cells, 'Gift') ?></td>
                    </tr>
                    <tr>
                        <td class="text-right rtl">المدفوع (<?= V($Cells, 'Method', 'Name' . LNG) ?>)</td>
                        <td class="value money"><?= V($Cells, 'Paids') ?></td>
                    </tr>
                    <tr>
                        <td class="text-right rtl fw-bold">المبلغ المستحق / Due</td>
                        <td class="value money fw-bold">SAR <?= V($Cells, 'TTC') ?></td>
                    </tr>
                </table>
                <div class="small mt-10">
                    <span class="fw-bold">المبلغ بالحروف:</span>
                    <span>......</span>
                </div>
            </td>
        </tr>
    </table>

    <div class="hr"></div>

    <!-- ───────────── Bank info ───────────── -->
    <table class="table no-border narrow">
        <tr>
            <td class="text-right rtl" style="width:25%;">اسم الحساب</td>
            <td class="text-center"><?= V(COMPANY, 'RIB') ?></td>
            <td class="text-left ltr" style="width:25%;">Account Name</td>
        </tr>
        <tr>
            <td class="text-right rtl">اسم البنك</td>
            <td class="text-center"><?= V(COMPANY, 'Bankname') ?></td>
            <td class="text-left ltr">Bank Name</td>
        </tr>
    </table>

    <br /><br />

    <!-- ───────────── Signatures ───────────── -->
    <table class="sign-box">
        <tr>
            <td class="text-right rtl" style="width:25%;">اسم المستلم</td>
            <td style="width:25%;">
                <div class="sign-line"></div>
            </td>
            <td class="text-right rtl" style="width:25%;">اسم البائع</td>
            <td style="width:25%;">
                <div class="sign-line"></div>
            </td>
        </tr>
        <tr>
            <td class="text-right rtl">توقيع المستلم</td>
            <td>
                <div class="sign-line"></div>
            </td>
            <td class="text-right rtl">توقيع البائع</td>
            <td>
                <div class="sign-line"></div>
            </td>
        </tr>
        <tr>
            <td class="text-right rtl">التاريخ</td>
            <td colspan="2">
                <div class="sign-line"></div>
            </td>
            <td class="text-left ltr">Date</td>
        </tr>
    </table>

    <!-- ───────────── Footer ───────────── -->
    <div class="page-footer text-center xsmall">
        <br /><br /><br /><br /><br />
        Jeddah, Saudi Arabia — Faisaliyah Dist., in front of N2 Mall Gate 6 — Mob: 0555680650
    </div>

</page>
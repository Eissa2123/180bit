<?php
// [1] حدد جذر المشروع بالنسبة لهذا الملف (هذا الملف داخل system/views → نطلع مستويين)
$projectRoot = realpath(__DIR__ . ''); // عدّلها لو مسار الملف مختلف

// [2] ابني مسار الشعار على القرص
$logoPath = $projectRoot . '/public/assets/themes/default/images/goleenkit.png';

// [3] لو ما لقاه، جرّب تحويل IMGS إلى مسار ملف عبر DOCUMENT_ROOT
if (!is_file($logoPath)) {
    $p = parse_url(IMGS . 'goleenkit.png', PHP_URL_PATH);
    if ($p) {
        $alt = rtrim($_SERVER['DOCUMENT_ROOT'], '/\\') . $p;
        if (is_file($alt)) $logoPath = $alt;
    }
}

// [4] حوّل الصورة إلى Data URI (Base64) أو خلّيها فاضية لو ما لقاها
$logoSrc = '';
if (is_file($logoPath)) {
    $mime = function_exists('mime_content_type') ? mime_content_type($logoPath) : 'image/png';
    $logoSrc = 'data:' . $mime . ';base64,' . base64_encode(file_get_contents($logoPath));
}
?>


<page>

    <div class="page-body">
        <table class="no-bordered" style="width:90%;height:60px;">
            <tbody>
                <tr style="height:60%;">
                    <td class="text-right" style="width:35%;height:30px;">
                        <br />
                        الطقم الذهبي للزي الموحد و التصميم
                        <br />
                        والطباعة والملابس الرياضية
                    </td>
                    <td class="text-center" style="width:30%;height:40px;" rowspan="4">
                        <br />
                        <?php if ($logoSrc): ?>
                            <img src="<?= $logoSrc ?>" style="width:150px;" alt="logo">
                        <?php endif; ?>


                    </td>
                    <td class="text-left" style="width:35%;height:40px;">
                        <br />
                        Golden Kit For Uniform Cloths,
                        <br />
                        Designing, Printing and Sport Cloths
                    </td>
                </tr>
                <tr>
                    <td class="text-right" style="width:20%;height:10px;">
                        س. ت. <?= V(COMPANY, 'RC') ?><br />
                        <?= V(COMPANY, 'Email1') ?><br />
                        الرقم الضريبي <?= V(COMPANY, 'TaxNumber') ?><br />
                    </td>
                    <td class="text-left" style="width:30%;height:10px;">
                        C.R. <?= V(COMPANY, 'RC') ?><br />
                        <?= V(COMPANY, 'Email1') ?><br />
                        VAT No <?= V(COMPANY, 'TaxNumber') ?><br />
                    </td>
                </tr>
            </tbody>
        </table>

        <hr style="width:90%;margin:auto;margin-top:10px;margin-bottom:10px;color:#000;height:1px;" />

        <table style="border:none;">
            <thead>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">تاريخ الفاتورة</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'AT') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Bill Date</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">رقم الفاتورة</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'Code') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Bill Code</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">رقم العميل</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'Customer', 'Code') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Customer Code</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">إسم العميل</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'Customer', 'Companyname') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Customer Name</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">الرقم الضريبي للعميل</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'Customer', 'Taxnumber') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Customer VAT</th>
                </tr>
            </thead>
        </table>

        <br />

        <table style="font-size:11px;">
            <thead>
                <tr>
                    <th class="text-center" style="width:10%;font-size:10px;">
                        الرمز
                        <br /><br />
                        Code
                    </th>
                    <th class="text-center" style="width:25%;font-size:10px;">
                        الصنف
                        Item
                    </th>
                    <th class="text-center" style="font-size:10px;">
                        البيان

                        Item Description
                    </th>
                    <th class="text-center" style="width:6%;font-size:10px;">
                        الكمية
                        <br /><br />
                        QTY
                    </th>
                    <th class="text-center" style="width:8%;font-size:10px;">
                        سعر الوحدة
                        <br /><br />
                        Unit Price
                    </th>
                    <th class="text-center" style="width:8%;font-size:10px;">
                        إجمالي السعر
                        <br /><br />
                        Total Price
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center" style="border-bottom:1px solid #fff;">&nbsp;</td>
                    <td class="text-center" style="border-bottom:1px solid #fff;">&nbsp;</td>
                    <td class="text-center" style="border-bottom:1px solid #fff;">&nbsp;</td>
                    <td class="text-center" style="border-bottom:1px solid #fff;">&nbsp;</td>
                    <td class="text-center" style="border-bottom:1px solid #fff;">&nbsp;</td>
                    <td class="text-center" style="border-bottom:1px solid #fff;">&nbsp;</td>
                </tr>
                <?php foreach ($Cells['Products'] as $cell) { ?>
                    <tr>
                        <td class="text-center" style="border-bottom:1px solid #fff;"><?= V($cell, 'Product', 'Code') ?></td>
                        <td class="text-right" style="border-bottom:1px solid #fff;"><?= V($cell, 'Product', 'Name') ?></td>
                        <td class="text-right" style="border-bottom:1px solid #fff;"><?= V($cell, 'Description') ?></td>
                        <td class="text-center" style="border-bottom:1px solid #fff;"><?= V($cell, 'Quantity') ?></td>
                        <td class="text-right" style="border-bottom:1px solid #fff;"><?= V($cell, 'Price') ?></td>
                        <td class="text-right" style="border-bottom:1px solid #fff;"><?= V($cell, 'HT') ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="text-center">&nbsp;</td>
                    <td class="text-center">&nbsp;</td>
                    <td class="text-center">&nbsp;</td>
                    <td class="text-center">&nbsp;</td>
                    <td class="text-center">&nbsp;</td>
                    <td class="text-center">&nbsp;</td>
                </tr>
            </tbody>
        </table>

        <br />

        <table>
            <tbody>
                <tr>
                    <th class="text-center" rowspan="6" style="width:50%;background-color:while;color:#000;border-top:none;border-right:none;border-bottom:none;">
                        <barcode code="<?= V($Cells, 'TLV') ?>" size="1" type="QR" error="M" class="barcode" disableborder="1" />
                    </th>
                </tr>
                <tr>
                    <th class="text-center" colspan="2" style="background-color:while;color:#000">المجموع الكلي</th>
                    <th class="text-right" style="background-color:while;color:#000;"><?= V($Cells, 'HT') ?></th>
                </tr>
                <tr>
                    <th class="text-right">الضريبة VAT</th>
                    <th class="text-right ltr"><?= V($Cells, 'TVA') ?> %</th>
                    <th class="text-right"><?= V($Cells, 'Tax') ?></th>
                </tr>
                <tr>
                    <th class="text-right">الكوبون Cobon</th>
                    <th class="text-right ltr"><?= V($Cells, 'Cobon', 'Ratio') ?> %</th>
                    <th class="text-right"><?= V($Cells, 'Gift') ?></th>
                </tr>
                <tr>
                    <th class="text-right">المدفوع Payed</th>
                    <th class="text-center ltr"><?= V($Cells, 'Method', 'Name' . LNG) ?></th>
                    <th class="text-right"><?= V($Cells, 'Paids') ?></th>
                </tr>
                <tr>
                    <th class="text-center" colspan="2" style="background-color:while;color:#000">المبلغ المستحق Due Amount</th>
                    <th class="text-right" style="background-color:while;color:#000;font-size:18px;">
                        SAR <?= V($Cells, 'TTC') ?>
                    </th>
                </tr>
                <tr>
                    <td colspan="3">
                        المبلغ المستحق بالحروف
                        :
                        <br />
                        <span style="font-weight:bold;">......</span>
                    </td>
                </tr>
            </tbody>
        </table>

        <hr style="width:90%;margin:auto;margin-top:10px;margin-bottom:10px;color:#000;height:1px;" />

        <table>
            <tbody>
                <tr>
                    <td style="border:none;width:25%;" class="text-right">إسم الحساب</td>
                    <td style="border:none;" class="text-center"><?= V(COMPANY, 'RIB') ?></td>
                    <td style="border:none;width:25%;" class="text-left">Account Name</td>
                </tr>
                <tr>
                    <td style="border:none;width:25%;" class="text-right">إسم البنك</td>
                    <td style="border:none;" class="text-center"><?= V(COMPANY, 'Bankname') ?></td>
                    <td style="border:none;width:25%;" class="text-left">Bank Name</td>
                </tr>
            </tbody>
        </table>

        <br />
        <br />

        <table>
            <tbody>
                <tr>
                    <td style="border:none;" class="text-right">إسم المستلم</td>
                    <td style="border:none;" class="text-left">Receiver Name</td>
                    <td style="border:none;" class="text-right">إسم البائع</td>
                    <td style="border:none;" class="text-left">Seller Name</td>
                </tr>
                <tr>
                    <td style="border:none;font-size:9px;color:#ccc;" class="text-center" colspan="2">
                        ........................................................................
                    </td>
                    <td style="border:none;font-size:9px;color:#ccc;" class="text-center" colspan="2">
                        ........................................................................
                    </td>
                </tr>
                <tr>
                    <td style="border:none;" class="text-right">توقيع المستلم</td>
                    <td style="border:none;" class="text-left">Receiver Sign</td>
                    <td style="border:none;" class="text-right">توقيع البائع</td>
                    <td style="border:none;" class="text-left">Seller Sign</td>
                </tr>
                <tr>
                    <td style="border:none;font-size:9px;color:#ccc;" class="text-center" colspan="2">
                        ........................................................................
                    </td>
                    <td style="border:none;font-size:9px;color:#ccc;" class="text-center" colspan="2">
                        ........................................................................
                    </td>
                </tr>
                <tr>
                    <td style="border:none;" class="text-right">التاريخ</td>
                    <td style="border:none;font-size:9px;color:#ccc;" class="text-center" colspan="2">
                        ........................................................................
                    </td>
                    <td style="border:none;" class="text-left">Date</td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="page-footer text-center" style="font-size:9px;">
        <br />
        <br />
        <br />
        <br />
        <br />
        Jeddah, Sudia Arabia. Faisalyah dist. Front Of N2 Mall Gate 6 - Mob/0555680650 6 - ج/ 055568065
    </div>

</page>
<?php       if(V($LPosts,'ID') == '1'){ ?>

<page id="model01">
    <br />
    <h3>Total Expensing Statement - بيان إجماليات المصروفات</h3>

    <hr />
    
    <table style="width:90%;" >
        <tbody>
            <tr>
                <td style="width:10%; border:none;">From: </td>
                <td style="width:90%; border:none;"><?= V($LPosts,'From') ?></td>
            </tr>
            <tr>
                <td style="width:10%; border:none;">To: </td>
                <td style="width:90%; border:none;"><?= V($LPosts,'To') ?></td>
            </tr>
        </tbody>
    </table>

    <hr />
    <br />
    <br />

    <table style="width:90%;">
        <tbody>
            <tr style="border-top:1px solid #000;">
                <td class="text-right" style="border:none;">Total Supplier Expenses :</td>
                <td class="text-center" style="border:1px solid #000;width:150px;"><?= V($Incomes, 'TotalExpenseProviders') ?></td>
                <td class="text-left" style="border:none;">:إجمالي المصروفات للموردين</td>
            </tr>
            <tr style="border-top:1px solid #000;">
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right" style="border:none;">Total Manager Expenses :</td>
                <td class="text-center" style="border:1px solid #000;width:150px;"><?= V($Incomes, 'TotalExpenseLeaders') ?></td>
                <td class="text-left" style="border:none;">:إجمالي المصروفات للمدير العام</td>
            </tr>
            <tr style="border-top:1px solid #000;">
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right" style="border:none;">Total Pelly Expenses :</td>
                <td class="text-center" style="border:1px solid #000;width:150px;"><?= V($Incomes, 'TotalExpenseOthers') ?></td>
                <td class="text-left" style="border:none;">:إجمالي المصروفات النثرية</td>
            </tr>
            <tr style="border-top:1px solid #000;">
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right" style="border:none;">Total Employees Receipt :</td>
                <td class="text-center" style="border:1px solid #000;width:150px;"><?= V($Incomes, 'TotalExpenseEmployees') ?></td>
                <td class="text-left" style="border:none;">:إجمالي المصروفات للموظفين</td>
            </tr>
            <tr style="border-top:1px solid #000;">
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right" style="border:none;">Total Marketer Receipt :</td>
                <td class="text-center" style="border:1px solid #000;width:150px;"><?= V($Incomes, 'TotalExpenseMarketers') ?></td>
                <td class="text-left" style="border:none;">:إجمالي المصروفات للمسوقين</td>
            </tr>
            <tr style="border-top:1px solid #000;">
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right" style="border:none;">Total TVA :</td>
                <td class="text-center" style="border:1px solid #000;width:150px;"><?= V($Incomes, 'TotalExpenseTaxs') ?></td>
                <td class="text-left" style="border:none;">:إجمالي الضريبة المضافة</td>
            </tr>
            <tr style="border-top:1px solid #000;">
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
                <td class="text-right" style="border:none;">&nbsp;</td>
            </tr>
            <tr style="border-top:1px solid #000">
                <td class="text-right" style="border:none;">Total All Expenses :</td>
                <td class="text-center" style="border:1px solid #000;width:150px;"><b><?= V($Incomes, 'TotalExpenses') ?></b></td>
                <td class="text-left" style="border:none;">:إجمالي المصروفات</td>
            </tr>
        </tbody>
    </table>
</page>

<?php } else if(V($LPosts,'ID') == '2'){ ?>

<page id="model02">

    لا يوجد

</page>

<?php } else if(V($LPosts,'ID') == '3'){ ?>

<page id="model03">
    <br />
    <h3>Provider Expense Statement - بيان مصروفات مورد</h3>
    
    <table style="width:90%;" >
        <tbody>
            <tr>
                <td style="width:10%; border:none;">From: </td>
                <td style="width:90%; border:none;"><?= V($LPosts,'From') ?></td>
            </tr>
            <tr>
                <td style="width:10%; border:none;">To: </td>
                <td style="width:90%; border:none;"><?= V($LPosts,'To') ?></td>
            </tr>
        </tbody>
    </table>

    <?php if (isset($LPurchases)){  ?>
        <table style="width:90%;" >
            <thead>
                <tr>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch. No<br />رقم الشراء</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Refer. No<br />مرجعكم</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Supplier Name<br />اسم المورد</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purchase Type<br />نوع الشراء</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Total Price<br />إجمالي السعر</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Note<br />البيان</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Date<br />التاريخ</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($LPurchases as $Purchase) { ?>
                    <tr style="border-bottom:1px solid #000;">
                        <td style="border:none;"><?= V($Purchase,'Code') ?></td>
                        <td class="text-left" style="border:none;"><?= V($Purchase, 'Code') ?></td>
                        <td class="text-left" style="border:none;"><?= V($Purchase, 'Provider', 'Companyname') ?></td>
                        <td class="text-left" style="border:none;"><?= V($Purchase, '') ?></td>
                        <td class="text-right" style="border:none;"><?= V($Purchase, 'Paid') ?></td>
                        <td class="text-left" style="border:none;"><?= V($Purchase, 'Notes') ?></td>
                        <td class="text-left" style="border:none;"><?= V($Purchase, 'AT') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr style="border-bottom:1px solid #000;">
                    <td style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-right" style="border-top:1px solid #000;"><?= $Paids ?></td>
                    <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                </tr>
            </tfoot>
        </table>
    <?php } ?>
</page>


<?php } else if(V($LPosts,'ID') == '4'){ ?>

<page id="model04">
    <br />
    <h3>Expenses Statement - بيان المصروفات</h3>
    
        <table style="width:90%;" >
            <tbody>
                <tr>
                    <td style="width:10%; border:none;">From: </td>
                    <td style="width:90%; border:none;"><?= V($LPosts,'From') ?></td>
                </tr>
                <tr>
                    <td style="width:10%; border:none;">To: </td>
                    <td style="width:90%; border:none;"><?= V($LPosts,'To') ?></td>
                </tr>
            </tbody>
        </table>
        <table style="width:90%;" >
            <thead>
                <tr>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Code<br />الرقم</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Note<br />البيان</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">For <br /> الجهة</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Date<br />التاريخ</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Amount<br />المبلغ</td>
                </tr>
            </thead>
            <tbody>

                <?php if (isset($LExpenses)){  ?>
                    <?php foreach ($LExpenses as $Purchase) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border:none;"><?= V($Purchase,'Code') ?></td>
                            <td class="text-left" style="border:none;"><?= V($Purchase, 'Name') ?></td>
                            <td class="text-center" style="border:none;">
                                <?php if ($Purchase['Employee'] != null) { ?>
                                    <?= V($Purchase, 'Employee', 'Firstname') ?> <?= V($Purchase, 'Employee', 'Lastname') ?>
                                <?php } ?>
                                <?php if ($Purchase['Marketer'] != null) { ?>
                                    <?= V($Purchase, 'Marketer', 'Name') ?>
                                <?php } ?>
                                <?php if ($Purchase['Tax'] == '1') { ?>
                                    TVA
                                <?php } ?>
                            </td>
                            <td class="text-center" style="border:none;"><?= V($Purchase, 'AT') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Purchase, 'Amount') ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>

                <?php if (isset($LPurchases)){  ?>
                    <?php foreach ($LPurchases as $Purchase) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border:none;"><?= V($Purchase,'Code') ?></td>
                            <td class="text-left" style="border:none;">سند صرف لفاتورة شراء رقم <?= V($Purchase, 'Code') ?></td>
                            <td class="text-center" style="border:none;">فاتورة شراء</td>
                            <td class="text-center" style="border:none;"><?= V($Purchase, 'AT') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Purchase, 'Amount') ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>

            </tbody>
            <tfoot>
                <tr style="border-bottom:1px solid #000;">
                    <td style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-right" style="border-top:1px solid #000;"><?= $TTCs ?></td>
                </tr>
            </tfoot>
        </table>
</page>

<?php } ?>

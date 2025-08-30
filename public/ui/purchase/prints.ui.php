<?php       if(V($LPosts,'ID') == '1'){ ?>

<page id="model01">
    <br />
    <h3>Purchases Statement - بيان المشتريات</h3>
    
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
                        <td class="text-right" style="border:none;"><?= V($Purchase, 'TTC') ?></td>
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
                    <td class="text-right" style="border-top:1px solid #000;"><?= $TTCs ?></td>
                    <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                </tr>
            </tfoot>
        </table>
    <?php } ?>
</page>

<?php } else if(V($LPosts,'ID') == '2'){ ?>

<page id="model02">
    <br />
    <h3>Purchases Statement - بيان المشتريات</h3>
    
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
                            <td class="text-right" style="border:none;"><?= V($Purchase, 'TTC') ?></td>
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
                        <td class="text-right" style="border-top:1px solid #000;"><?= $TTCs ?></td>
                        <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                        <td class="text-left" style="border-top:1px solid #000;">&nbsp;</td>
                    </tr>
                </tfoot>
            </table>
        <?php } ?>
</page>

<?php } else if(V($LPosts,'ID') == '3'){ ?>

<page id="model03">
    <br />
    <h3>Deptor Statement - بيان المبلغ المدين</h3>

    <?php if (isset($LProviders)){  ?>
        <table style="width:90%;" >
            <thead>
                <tr>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Supplier Name<br />اسم المورد</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purchares Amounts<br />مبلغ الشراء</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Returns Amounts<br />مبلغ المرتجعات</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Payment Amounts<br />المبلغ المدفوع</td>
                    <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Deptor Amounts<br />المبلغ المدين</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($LProviders as $Provider) { ?>
                    <tr style="border-bottom:1px solid #000;">
                        <td style="border:none;"><?= V($Provider,'Companyname') ?></td>
                        <td class="text-right" style="border:none;"><?= V($Provider, 'TTC') ?></td>
                        <td class="text-right" style="border:none;"><?= V($Provider, 'Return') ?></td>
                        <td class="text-right" style="border:none;"><?= V($Provider, 'Payement') ?></td>
                        <td class="text-right" style="border:none;"><?= V($Provider, 'Deptor') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr style="border-bottom:1px solid #000;">
                    <td style="border-top:1px solid #000;">&nbsp;</td>
                    <td class="text-right" style="border-top:1px solid #000;"><?= $TTCs ?></td>
                    <td class="text-right" style="border-top:1px solid #000;"><?= $Returns ?></td>
                    <td class="text-right" style="border-top:1px solid #000;"><?= $Payements ?></td>
                    <td class="text-right" style="border-top:1px solid #000;"><?= $Deptors ?></td>
                </tr>
            </tfoot>
        </table>
    <?php } ?>
</page>

<?php } ?>
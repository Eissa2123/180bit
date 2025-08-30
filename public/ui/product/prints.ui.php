<?php       if(V($LPosts,'ID') == '1'){ ?>

<page id="model01">
    <br />
    <h3>Items Statement - بيان الأصناف</h3>

        <?php if (isset($LProducts)){  ?>
            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">ID <br />رقم الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Item<br />الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Item Classification <br />تصنيف الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Price <br />السعر</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Item Group <br />مجموعة الصنف</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LProducts as $Product) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border:none;"><?= V($Product,'Code') ?></td>
                            <td class="text-left" style="border:none;"><?= V($Product,'Name') ?></td>
                            <td style="border:none;"><?= V($Product,'Category', 'Name') ?></td>
                            <td class="text-right"  style="border:none;"><?= V($Product,'Price') ?></td>
                            <td style="border:none;"><?= V($Product,'Category', '') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    <hr style="width:95%;" />
</page>

<?php } else if(V($LPosts,'ID') == '2'){ ?>

<page id="model02">
    <br />
    <h3>Stock Statement - بيان المخزون</h3>

        <?php if (isset($LProducts)){  ?>
            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">ID <br />رقم الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Item<br />الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المشتراة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المرتجعة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المباعة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المرتجعة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;" colspan="2">Purch.QYT<br />الكمية المتبقية</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LProducts as $Product) { ?>
                        <tr>
                            <td style="border:none;"><?= V($Product,'Code') ?></td>
                            <td style="border:none;"class="text-left" ><?= V($Product,'Name') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'Purchase') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'PurchaseReturn') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'Sale') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'SaleReturn') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'PurchaseQuantity') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'SaleQuantity') ?></td>
                        </tr>
                        <tr>
                            <td style="border-bottom:1px solid #000;">&nbsp;</td>
                            <td style="border-bottom:1px solid #000;">&nbsp;</td>
                            <td style="border-bottom:1px solid #000;" class="text-center" colspan="2"><b><?= V($Product,'PurchaseQuantity') ?></b></td>
                            <td style="border-bottom:1px solid #000;" class="text-center" colspan="2"><b><?= V($Product,'SaleQuantity') ?></b></td>
                            <td style="border-bottom:1px solid #000;" class="text-center" colspan="2"><?= V($Product,'Quantity') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
</page>

<?php } else if(V($LPosts,'ID') == '3'){ ?>

<page id="model03">
    <br />
    <h3>Out Of Stock Statement - بيان المنتجات المنتهية من المخزن</h3>

        <?php if (isset($LProducts)){  ?>
            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">ID <br />رقم الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Item<br />الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المشتراة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المرتجعة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المباعة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المرتجعة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المتبقية</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LProducts as $Product) { ?>
                        <tr>
                            <td style="border:none;"><?= V($Product,'Code') ?></td>
                            <td style="border:none;"class="text-left" ><?= V($Product,'Name') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'Purchase') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'PurchaseReturn') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'Sale') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'SaleReturn') ?></td>
                            <td style="border:none;"class="text-center" ><?= V($Product,'Quantity') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
</page>

<?php } else if(V($LPosts,'ID') == '4'){ ?>

<page id="model04">
    <br />
    <h3>Sold Items Statement - بيان مبيعات الاصناف</h3>

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

        <?php if (isset($LProducts)){  ?>
            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">ID <br />رقم الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Item<br />الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المباعة</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LProducts as $Product) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td class="text-center" style="border:none;"><?= V($Product,'Code') ?></td>
                            <td class="text-left" style="border:none;"><?= V($Product,'Name') ?></td>
                            <td class="text-center" style="border:none;"><?= V($Product,'Sale') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    <hr style="width:95%;" />
</page>

<?php } else if(V($LPosts,'ID') == '5'){ ?>

<page id="model05">
    <br />
    <h3>Sold Item Statement - بيان مبيعات الصنف</h3>

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

        <?php if (isset($LProducts)){  ?>
            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">ID <br />رقم الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Item<br />الصنف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Purch.QYT<br />الكمية المباعة</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LProducts as $Product) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td class="text-center" style="border:none;"><?= V($Product,'Code') ?></td>
                            <td class="text-left" style="border:none;"><?= V($Product,'Name') ?></td>
                            <td class="text-center" style="border:none;"><?= V($Product,'Sale') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    <hr style="width:95%;" />
</page>

<?php } ?>
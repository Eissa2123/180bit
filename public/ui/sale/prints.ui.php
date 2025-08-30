<?php if(V($LPosts,'ID') == '1'){ ?>
    <?php if(V($LPosts,'General') == 0){ ?>
        
        <page id="model01">
            <br />
            <p class="text-center"><img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;"></p>
            <h3>تقرير تفصيلي للمبيعات</h3>
            <h3>Detailed Sales Report</h3>
            <h4>From <?= V($LPosts,'From') ?> To <?= V($LPosts,'To') ?></h4>
            <hr />

            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Invoice No.<br />رقم الفاتورة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Date<br />التاريخ</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;width:40%;">Customer Name<br />اسم العميل</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Total<br />الإجمالي</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Ruturned<br />المرتجع</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Paid<br />المدفوعة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Unpaid<br />الغير مدفوعة</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LSales as $Sale) { ?>
                        <tr style="border-bottom:1px solid #000;">

                            <td style="border:none;"><?= V($Sale,'Code') ?></td>
                            <td class="text-left" style="border:none;"><?= V($Sale, 'AT') ?></td>
                            <td class="text-center" style="border:none;"><?= V($Sale, 'Customer', 'Companyname') ?></td>

                            <td class="text-right" style="border:none;"><?= V($Sale, 'TTC') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Sale, 'Ruturned') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Sale, 'Paid') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Sale, 'Unpaid') ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr style="border-bottom:1px solid #000;">

                        <td class="text-center" style="border-top:1px solid #000;" colspan="3">Net Total الإجمالي الكلي</td>

                        <td class="text-right" style="border-top:1px solid #000;"><?= V($Sales, 'TTCs') ?></td>
                        <td class="text-right" style="border-top:1px solid #000;"><?= V($Sales, 'Ruturneds') ?></td>
                        <td class="text-right" style="border-top:1px solid #000;"><?= V($Sales, 'Paids') ?></td>
                        <td class="text-right" style="border-top:1px solid #000;"><?= V($Sales, 'Unpaids') ?></td>

                    </tr>
                </tfoot>
            </table>

        </page>

    <?php } else if(V($LPosts,'General') == 1){ ?>

        <page id="model02">
            <br />
            <p class="text-center"><img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;"></p>
            <h3>تقرير إجمالي المبيعات</h3>
            <h3>Total Sales Report</h3>
            <h4>From <?= V($LPosts,'From') ?> To <?= V($LPosts,'To') ?></h4>
            <hr />
            

            <br /><br /><br /><br />
            <br /><br /><br /><br />

            <table style="width:50%;" >
                <tbody>

                    <!-- إجمالي المبيعات -->
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="vertical-align:middle;" rowspan="2"><?= V($Totals, 'Sales') ?></td>
                        <td class="text-right" style="">إجمالي المبيعات</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border:none;">Total Sales</td>
                    </tr>

                    <!-- إجمالي المرتجعات -->
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border-top:1px solid #000;vertical-align:middle;" rowspan="2"><?= V($Totals, 'SalesReturns') ?></td>
                        <td class="text-right" style="border-top:1px solid #000;">إجمالي المرتجعات</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border:none;">Total Returns</td>
                    </tr>

                    <!-- المدفوعات النقدية -->
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border-top:1px solid #000;vertical-align:middle;" rowspan="2"><?= V($Totals, 'CashsPayments') ?></td>
                        <td class="text-right" style="border-top:1px solid #000;">المدفوعات النقدية</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border:none;">Cash Payments</td>
                    </tr>

                    <!-- المدفوعات البنكية -->
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border-top:1px solid #000;vertical-align:middle;" rowspan="2"><?= V($Totals, 'BankPayments') ?></td>
                        <td class="text-right" style="border-top:1px solid #000;">المدفوعات البنكية</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border:none;">Bank Payments</td>
                    </tr>

                    <!-- الغير مدفوع -->
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border-top:1px solid #000;vertical-align:middle;" rowspan="2"><?= V($Totals, 'SalesUnpaids') ?></td>
                        <td class="text-right" style="border-top:1px solid #000;">الغير مدفوع</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border:none;">Unpaid</td>
                    </tr>

                    <!-- صافي المبيعات -->
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border-top:1px solid #000;vertical-align:middle;" rowspan="2"><?= V($Totals, 'SalesNets') ?></td>
                        <td class="text-right" style="border-top:1px solid #000;">صافي المبيعات</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border:none;">Net Sales</td>
                    </tr>

                    <!-- صافي المبيعات المدفوعة -->
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="border-top:1px solid #000;vertical-align:middle;" rowspan="2"><?= V($Totals, 'SalesNetPaid') ?></td>
                        <td class="text-right" style="border-top:1px solid #000;">صافي المبيعات المدفوعة</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-right" style="">Net Sales Paid</td>
                    </tr>

                </tbody>
            </table>
        </page>

    <?php } ?>
<?php }else if(V($LPosts,'ID') == '2'){ ?>
    <?php if(V($LPosts,'General') == 0){ ?>
        
        <page id="model03">
            <br />
            <p class="text-center"><img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;"></p>
            <h3>تقرير تفصيلي لمدفوعات المبيعات</h3>
            <h3>Detailed Sales Paid Report</h3>
            <h4>From <?= V($LPosts,'From') ?> To <?= V($LPosts,'To') ?></h4>

            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Invoice No.<br />رقم الفاتورة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Date<br />التاريخ</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;width:40%;">Method<br />الطريقة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Paid<br />المدفوعة</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LCustomers as $Customer) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border:none" colspan="2"><?= V($Customer, 'Companyname') ?></td>
                            <td style="border:none" colspan="2">&nbsp;</td>
                        </tr>
                        <?php if(L($Customer, 'Sales')){ ?>
                            <?php foreach ($Customer['Sales'] as $Sale) { ?>
                                <?php if(L($Sale, 'Payements')){ ?>
                                    <?php foreach ($Sale['Payements'] as $Payement) { ?>
                                        <tr style="border-bottom:1px solid #000;">
                                            <td style="border:none;"><?= V($Sale, 'Code') ?></td>
                                            <td class="text-left" style="border:none;"><?= V($Sale, 'AT') ?></td>
                                            <td class="text-center" style="border:none;"><?= V($Payement, 'Method', 'Name'.LNG) ?></td>
                                            <td class="text-right" style="border:none;"><?= V($Payement, 'Amount') ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border-bottom:1px solid #000;" colspan="3">Total المجموع</td>
                            <td class="text-right" style="border:1px solid #000;"><?= V($Customer, 'Payements') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr style="border:none;">
                        <td class="text-center" style="border:1px solid #000;" colspan="4">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-center" style="border:1px solid #000;" colspan="3">Net Total الإجمالي الكلي</td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Sales') ?></td>
                    </tr>
                </tfoot>
            </table>

        </page>

    <?php } else if(V($LPosts,'General') == 1){ ?>
        
        <page id="model04">
            <br />
            <p class="text-center"><img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;"></p>
            <h3>تقرير تفصيلي للمبيعات</h3>
            <h3>Detailed Sales Report</h3>
            <h4>From <?= V($LPosts,'From') ?> To <?= V($LPosts,'To') ?></h4>
            <hr />

            <table style="width:50%;" >
                <thead>
                    <tr>
                        <td class="text-left" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">التاريخ<br />Date</td>
                        <td class="text-right" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">إجمالي المدفوع<br />Total Paid</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LPayements as $Payement) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td class="text-left" style="border:none;"><?= V($Payement, 'AT') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Payement, 'Amount') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-left" style="border-top:1px solid #000;">Net Total الإجمالي الكلي</td>
                        <td class="text-right" style="border-top:1px solid #000;"><?= V($Totals, 'Paids') ?></td>
                    </tr>
                </tfoot>
            </table>

        </page>

    <?php } ?>

<?php }else if(V($LPosts,'ID') == '3'){ ?>

    <?php if(V($LPosts,'General') == 0){ ?>

        <page id="model05">
            <br />
            <p class="text-center"><img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;"></p>
            <h3>تقرير تفصيلي لمدفوعات المبيعات</h3>
            <h3>Detailed Sales Paid Report</h3>
            <h4>From <?= V($LPosts,'From') ?> To <?= V($LPosts,'To') ?></h4>

            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Invoice No.<br />رقم الفاتورة</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Date<br />التاريخ</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Unpaid<br />الغير مدفوعة</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LCustomers as $Customer) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border:none" colspan="2"><?= V($Customer, 'Companyname') ?></td>
                            <td style="border:none" colspan="2">&nbsp;</td>
                        </tr>
                        <?php if(L($Customer, 'Sales')){ ?>
                            <?php foreach ($Customer['Sales'] as $Sale) { ?>
                                <tr style="border-bottom:1px solid #000;">
                                    <td style="border:none;"><?= V($Sale, 'Code') ?></td>
                                    <td class="text-left" style="border:none;"><?= V($Sale, 'AT') ?></td>
                                    <td class="text-right" style="border:none;"><?= V($Sale, 'Unpaid') ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border-bottom:1px solid #000;" colspan="2">Total المجموع</td>
                            <td class="text-right" style="border:1px solid #000;"><?= V($Customer, 'Unpaid') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr style="border:none;">
                        <td class="text-center" style="border:1px solid #000;" colspan="3">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-center" style="border:1px solid #000;" colspan="2">Net Total الإجمالي الكلي</td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Unpaid') ?></td>
                    </tr>
                </tfoot>
            </table>

        </page>

    <?php } else if(V($LPosts,'General') == 1){ ?>

        <page id="model06">
            <br />
            <p class="text-center"><img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;"></p>
            <h3>تقرير إجمالي الغير مدفوع من المبيعات</h3>
            <h3>Total Sales Unpaid Report</h3>
            <h4>From <?= V($LPosts,'From') ?> To <?= V($LPosts,'To') ?></h4>

            <table style="width:50%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Date<br />التاريخ</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Unpaid<br />الغير مدفوعة</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LCustomers as $Customer) { ?>
                        <?php if(L($Customer, 'Sales')){ ?>
                            <?php foreach ($Customer['Sales'] as $Sale) { ?>
                                <tr style="border-bottom:1px solid #000;">
                                    <td class="text-left" style="border:none;"><?= V($Sale, 'AT') ?></td>
                                    <td class="text-right" style="border:none;"><?= V($Sale, 'Unpaid') ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-center" style="border:1px solid #000;">Net Total الإجمالي الكلي</td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Unpaid') ?></td>
                    </tr>
                </tfoot>
            </table>

        </page>

    <?php } ?>

<?php }else if(V($LPosts,'ID') == '4'){ ?>

    <?php if(V($LPosts,'General') == 0){ ?>

        <page id="model07">
            <br />
            <p class="text-center"><img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;"></p>
            <h3>كشف حساب عميل</h3>
            <h3>Customer Account Statement</h3>
            <h4>From <?= V($LPosts,'From') ?> To <?= V($LPosts,'To') ?></h4>

            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Record No.<br />رقم القيد</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Date<br />التاريخ</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Description<br />الوصف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;" colspan="2">Opretion<br />العملية</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;" colspan="2">Balance<br />الرصيد</td>
                    </tr>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;<br />&nbsp;</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;<br />&nbsp;</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;<br />&nbsp;</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Debit<br />مدين</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Credit<br />دائن</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Debit<br />مدين</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Credit<br />دائن</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LCustomers as $Customer) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border:none" colspan="2"><span style="font-weight:bold;"><?= V($Customer, 'Companyname') ?></span></td>
                            <td style="border:none" colspan="2">&nbsp;</td>
                        </tr>
                        <?php if(L($Customer, 'Statements')){ ?>
                            <?php foreach ($Customer['Statements'] as $Statement) { ?>
                                <tr style="border-bottom:1px solid #000;">
                                    <td style="border:none;"><?= V($Statement, 'Code') ?></td>
                                    <td class="text-left" style="border:none;"><?= V($Statement, 'AT') ?></td>
                                    <td class="text-left" style="border:none;"><p class="ltr"><?= V($Statement, 'Description') ?></p></td>
                                    <td class="text-right" style="border:none;"><?= V($Statement, 'Opretion', 'Debit') ?></td>
                                    <td class="text-right" style="border:none;"><?= V($Statement, 'Opretion', 'Credit') ?></td>
                                    <td class="text-right" style="border:none;"><?= V($Statement, 'Balance', 'Debit') ?></td>
                                    <td class="text-right" style="border:none;"><?= V($Statement, 'Balance', 'Credit') ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border-bottom:1px solid #000;" colspan="3">Total المجموع</td>
                            <td class="text-right" style="border:1px solid #000;"><?= V($Customer, 'OpretionDebit') ?></td>
                            <td class="text-right" style="border:1px solid #000;"><?= V($Customer, 'OpretionCredit') ?></td>
                            <td class="text-right" style="border:1px solid #000;"><?= V($Customer, 'BalanceDebit') ?></td>
                            <td class="text-right" style="border:1px solid #000;"><?= V($Customer, 'BalanceCredit') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr style="border:none;">
                        <td class="text-center" style="border:1px solid #000;" colspan="5">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-center" style="border:1px solid #000;" colspan="3">Net Total الإجمالي الكلي</td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'OpretionDebit') ?></td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'OpretionCredit') ?></td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'BalanceDebit') ?></td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'BalanceCredit') ?></td>
                    </tr>
                </tfoot>
            </table>

        </page>

    <?php } ?>

<?php }else if(V($LPosts,'ID') == '5'){ ?>

    <?php if(V($LPosts,'General') == 0){ ?>

        <page id="model08">
            <br />
            <p class="text-center"><img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;"></p>
            <h3>تقرير أرصدة  العميل </h3>
            <h3>Customer Balance Report</h3>
            <h4>From <?= V($LPosts,'From') ?> To <?= V($LPosts,'To') ?></h4>

            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Account No.<br />رقم الحساب</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Name<br />الإسم</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Total Sales<br />إجمالي المبيعات</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Total Rutrun<br />إجمالي المرتجع</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Net Sales<br />صافي المبيعات</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Total Paid<br />إجمالي المدفوعات</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Inpaid<br />الغير المدفوع</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LCustomers as $Customer) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border:none;"><?= V($Customer, 'Code') ?></td>
                            <td style="border:none"><span style="font-weight:bold;"><?= V($Customer, 'Companyname') ?></span></td>
                            <td class="text-right" style="border:none;"><?= V($Customer, 'Sales') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Customer, 'Rutruns') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Customer, 'Nets') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Customer, 'Paids') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Customer, 'Inpaids') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr style="border:none;">
                        <td class="text-center" style="border:1px solid #000;" colspan="5">&nbsp;</td>
                    </tr>
                    <tr style="border-bottom:1px solid #000;">
                        <td class="text-center" style="border:1px solid #000;" colspan="2">Net Total الإجمالي الكلي</td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Sales') ?></td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Rutruns') ?></td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Nets') ?></td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Paids') ?></td>
                        <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Inpaids') ?></td>
                    </tr>
                </tfoot>
            </table>

        </page>

    <?php } ?>

<?php }else if(V($LPosts,'ID') == '6'){ ?>

        <?php if(V($LPosts,'General') == 0){ ?>

            <page id="model09">
                <br />
                <p class="text-center"><img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;"></p>
                <h3>كشف تفصيلي المبيعات حسب العميل</h3>
                <h3>Detailed Sales Paid Report</h3>
                <h4>From <?= V($LPosts,'From') ?> To <?= V($LPosts,'To') ?></h4>

                <table style="width:90%;" >
                    <thead>
                        <tr>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Invoice No.<br />رقم الفاتورة</td>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Date<br />التاريخ</td>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Total<br />الإجمالي</td>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Ruturned<br />المرتجع</td>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Paid<br />المدفوعة</td>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Unpaid<br />الغير مدفوعة</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($LCustomers as $Customer) { ?>
                            <tr style="border-bottom:1px solid #000;">
                                <td style="border:none" colspan="2"><?= V($Customer, 'Companyname') ?></td>
                                <td style="border:none" colspan="2">&nbsp;</td>
                            </tr>
                            <?php if(L($Customer, 'Sales')){ ?>
                                <?php foreach ($Customer['Sales'] as $Sale) { ?>
                                    <tr style="border-bottom:1px solid #000;">
                                        <td style="border:none;"><?= V($Sale, 'Code') ?></td>
                                        <td class="text-center" style="border:none;"><?= V($Sale, 'AT') ?></td>
                                        <td class="text-right" style="border:none;"><?= V($Sale, 'TTC') ?></td>
                                        <td class="text-right" style="border:none;"><?= V($Sale, 'Rutruns') ?></td>
                                        <td class="text-right" style="border:none;"><?= V($Sale, 'Paids') ?></td>
                                        <td class="text-right" style="border:none;"><?= V($Sale, 'Inpaids') ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            <tr style="border-bottom:1px solid #000;">
                                <td style="border-bottom:1px solid #000;" colspan="2">Total المجموع</td>
                                <td class="text-right" style="border:1px solid #000;"><?= V($Customer, 'TTCs') ?></td>
                                <td class="text-right" style="border:1px solid #000;"><?= V($Customer, 'Rutruns') ?></td>
                                <td class="text-right" style="border:1px solid #000;"><?= V($Customer, 'Paids') ?></td>
                                <td class="text-right" style="border:1px solid #000;"><?= V($Customer, 'Inpaids') ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr style="border:none;">
                            <td class="text-center" style="border:1px solid #000;" colspan="5">&nbsp;</td>
                        </tr>
                        <tr style="border-bottom:1px solid #000;">
                            <td class="text-center" style="border:1px solid #000;" colspan="2">Net Total الإجمالي الكلي</td>
                                <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'TTCs') ?></td>
                                <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Rutruns') ?></td>
                                <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Paids') ?></td>
                                <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Inpaids') ?></td>
                        </tr>
                    </tfoot>
                </table>

            </page>
            
        <?php } else if(V($LPosts,'General') == 1){ ?>

            <page id="model10">
                <br />
                <p class="text-center"><img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;"></p>
                <h3>تقرير المبيعات حسب  العميل  </h3>
                <h3>Sales Report By Customer</h3>
                <h4>From <?= V($LPosts,'From') ?> To <?= V($LPosts,'To') ?></h4>

                <table style="width:90%;" >
                    <thead>
                        <tr>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Customer Name<br />اسم العميل</td>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Total<br />الإجمالي</td>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Ruturned<br />المرتجع</td>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Paid<br />المدفوعة</td>
                            <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Unpaid<br />الغير مدفوعة</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($LCustomers as $Customer) { ?>
                            <tr style="border-bottom:1px solid #000;">
                                <td style="border:none"><?= V($Customer, 'Companyname') ?></td>
                                <td class="text-right" style="border:none;"><?= V($Customer, 'TTCs') ?></td>
                                <td class="text-right" style="border:none;"><?= V($Customer, 'Rutruns') ?></td>
                                <td class="text-right" style="border:none;"><?= V($Customer, 'Paids') ?></td>
                                <td class="text-right" style="border:none;"><?= V($Customer, 'Inpaids') ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr style="border-bottom:1px solid #000;">
                            <td class="text-center" style="border:1px solid #000;">Net Total الإجمالي الكلي</td>
                            <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'TTCs') ?></td>
                            <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Rutruns') ?></td>
                            <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Paids') ?></td>
                            <td class="text-right" style="border:1px solid #000;"><?= V($Totals, 'Inpaids') ?></td>
                        </tr>
                    </tfoot>
                </table>

            </page>

        <?php } ?>

<?php } ?>

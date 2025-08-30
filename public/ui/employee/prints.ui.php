<?php       if(V($LPosts,'ID') == '1'){ ?>

    <page id="model01">
        <br />
        <h3>Employees Statement - بيان الموظفين</h3>
        <hr style="width:95%;" />
        <?php if (isset($LEmployees)){  ?>
            <?php foreach ($LEmployees as $Employee) { ?>
                <table style="width:90%;" >
                    <tbody>
                        <tr>
                            <td style="width:25%; border:none;">
                                Emp. ID - رقم الموظف :<br />
                                Emp. Name - إسم الموظف :<br />
                                Gender - عوالن :<br />
                                Salary - الراتب :<br />
                                Job - الوظيفة :
                            </td>
                            <td style="width:20%;border:none;">
                                <?= V($Employee,'Code') ?><br />
                                <?= V($Employee,'Firstname') ?> <?= V($Employee,'Lastname') ?><br />
                                <?= V($Employee,'Gender', 'Name'.LNG) ?><br />
                                <?= V($Employee,'Salary') ?> SAR<br />
                                <?= V($Employee,'Job') ?>
                            </td>
                            <td style="width:25%;border:none;">
                                Identity No. - رقم الهوية :<br />
                                Nationality - الجنسية :<br />
                                Iss. Date - تاريخ الاصدار :<br />
                                Exp. Date - تاريخ الانتهاء :<br />
                                State - الحالة :
                            </td>
                            <td style="width:20%;border:none;">
                                <?= V($Employee,'NCID') ?><br />
                                <?= V($Employee,'Country') ?><br />
                                <?= V($Employee,'IDate') ?><br />
                                <?= V($Employee,'EDate') ?><br />
                                <?= V($Employee,'State', 'Name'.LNG) ?>
                            </td>
                            <td style="border:none;">
                                <img src="<?= V($Employee,'Picture') ?>" style="width:15%;height:12%; border:1px solid #ccc;" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr style="width:95%;" />
            <?php } ?>
        <?php } ?>
    </page>

<?php }else if(V($LPosts,'ID') == '2'){ ?>

    <page id="model02" style="margin:100px;">
        <br />
        <h3>Employee Statement - بيان الموظف</h3>
        <hr style="width:95%;" />
        <?php if (isset($Employee)){  ?>
            <table style="width:90%;" >
                <tbody>
                    <tr>
                        <td style="border:none;">&nbsp;</td>
                        <td class="text-center" style="border:none;">
                            <img src="<?= V($Employee,'Picture') ?>" style="width:15%;height:12%; border:1px solid #ccc;" />
                        </td>
                        <td style="border:none;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width:30%; border:none;height:30px;"><br />
                            Emp. ID<br /><br />
                            Emp. Name<br /><br />
                            Gender<br /><br />
                            Salary<br /><br />
                            Job<br /><br />
                            Identity No.<br /><br />
                            Nationality<br /><br />
                            Iss. Date<br /><br />
                            Exp. Date<br /><br />
                            State - الحالة :
                        </td>
                        <td class="text-center" style="width:40%;border:none;height:30px;"><br />
                            <?= V($Employee,'Code') ?><br /><br />
                            <?= V($Employee,'Firstname') ?> <?= V($Employee,'Lastname') ?><br /><br />
                            <?= V($Employee,'Gender', 'Name'.LNG) ?><br /><br />
                            <?= V($Employee,'Salary') ?> SAR<br /><br />
                            <?= V($Employee,'Job') ?><br /><br />
                            <?= V($Employee,'NCID') ?><br /><br />
                            <?= V($Employee,'Country') ?><br /><br />
                            <?= V($Employee,'IDate') ?><br /><br />
                            <?= V($Employee,'EDate') ?><br /><br />
                            <?= V($Employee,'State', 'Name'.LNG) ?>
                        </td>
                        <td class="text-right" style="width:30%;border:none;height:30px;"><br />
                            رقم الموظف<br /><br />
                            إسم الموظف<br /><br />
                            عوالن<br /><br />
                            الراتب<br /><br />
                            الوظيفة<br /><br />
                            رقم الهوية<br /><br />
                            الجنسية<br /><br />
                            تاريخ الاصدار<br /><br />
                            تاريخ الانتهاء<br /><br />
                            الحالة
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr style="width:95%;" />
        <?php } ?>
    </page>

<?php }else if(V($LPosts,'ID') == '3'){ ?>
    
    <page id="model03">
        <br />
        <h3>Employee Salary Statement - بيان راتب موظف</h3>

        <table style="width:90%;" >
            <tbody>
                <tr>
                    <td style="width:15%; border:none;">Employee ID : </td>
                    <td style="width:40%; border:none;"><?= V($Employee,'Code') ?></td>
                    <td style="width:10%; border:none;">From: </td>
                    <td style="width:20%; border:none;"><?= V($LPosts,'From') ?></td>
                </tr>
                <tr>
                    <td style="width:15%; border:none;">Employee Name : </td>
                    <td style="width:40%; border:none;"><?= V($Employee,'Firstname') ?> <?= V($Employee,'Lastname') ?></td>
                    <td style="width:10%; border:none;">To: </td>
                    <td style="width:20%; border:none;"><?= V($LPosts,'To') ?></td>
                </tr>
            </tbody>
        </table>

        <?php if (isset($LExpenses)){  ?>
            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">ID <br />الرقم</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Amount <br />المبلغ</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Note <br />البيان</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Date <br />التاريخ</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Discount <br />المبلغ</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Reward <br />التاريخ</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Net Salary <br />صافي الراتب</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LExpenses as $Expense) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border:none;"><?= V($Expense,'Code') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Expense,'Amount') ?></td>
                            <td style="border:none;"><?= V($Expense,'Name') ?></td>
                            <td style="border:none;"><?= V($Expense,'AT') ?></td>
                            <td class="text-right"  style="border:none;">0.00</td>
                            <td style="border:none;"><?= V($Expense,'X') ?></td>
                            <td class="text-right" style="border:none;"><?= V($Expense,'Amount') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;</td>
                        <td class="text-right" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">0.00</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;</td>
                        <td class="text-right" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">0.00</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;</td>
                        <td class="text-right" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">0.00</td>
                    </tr>
                </tfoot>
            </table>
        <?php } ?>
    </page>
    
<?php }else if(V($LPosts,'ID') == '4'){ ?>
    
    <page id="model04">
        <br />
        <h3>Employees Salary Statement - بيان رواتب الموظفين</h3>

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

        <?php if (isset($LEmployees)){  ?>
            <table style="width:90%;" >
                <thead>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Employee ID <br />كود الموظف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Employee Name <br />اسم الموظف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Employee Gender <br />النوع</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Salary <br />الراتب</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Reward <br />المكافات</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Discount <br />الخصم</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Cash Receipt <br />المبلغ المصروف</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">Net Salary <br />صافي الراتب</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($LEmployees as $Employee) { ?>
                        <tr style="border-bottom:1px solid #000;">
                            <td style="border:none;"><?= V($Employee,'Code') ?></td>
                            <td style="border:none;"><?= V($Employee,'Firstname') ?> <?= V($Employee,'Lastname') ?></td>
                            <td class="text-center" style="border:none;"><?= V($Employee,'Gender', 'Name'.LNG) ?></td>
                            <td class="text-right" style="border:none;"><?= V($Employee,'Salary') ?></td>
                            <td class="text-right" style="border:none;">0.00</td>
                            <td class="text-right" style="border:none;">0.00</td>
                            <td class="text-right"  style="border:none;">0.00</td>
                            <td class="text-right" style="border:none;"><?= V($Employee,'Salary') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;</td>
                        <td class="text-center" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;</td>
                        <td class="text-right" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;"><?= $Salaries ?></td>
                        <td class="text-right" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">0.00</td>
                        <td class="text-right" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">0.00</td>
                        <td class="text-right" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;">0.00</td>
                        <td class="text-right" style="border:none;border-top:1px solid #000;border-bottom:1px solid #000;"><?= $Salaries ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php } ?>
    </page>
    
<?php } ?>

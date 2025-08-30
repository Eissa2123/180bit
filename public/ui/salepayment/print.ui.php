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
                        <img src="<?= IMGS.'goleenkit.png' ?>" style="width:150px;">
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

        <?php if(V($Cells, 'Type') == "1"){ ?>
            <h1>سند قبض</h1>
        <?php }else if(V($Cells, 'Type') == "-1"){ ?>
            <h1>سند صرف</h1>
        <?php } ?>

        <table style="border:none;min-height:300px;">
            <thead>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">رقم الفاتورة</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'Code') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Bill Code</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">تاريخ الفاتورة</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'Facture') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Bill Date</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">إسم العميل</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'Customer', 'Companyname') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Customer Name</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">رقم الدفع</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'Code') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Payment Code</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">تاريخ الدفع</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'AT') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Payment Date</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">المبلغ</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'Amount', 'Companyname') ?></th>
                    <th class="text-left" style="width:30%;border:none;">Amount</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">طريقة الدفع</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'Method', 'Name'.LNG) ?></th>
                    <th class="text-left" style="width:30%;border:none;">Payment Mode</th>
                </tr>
                <tr>
                    <th class="text-right" style="width:30%;border:none;">الحالة</th>
                    <th class="text-center" style="width:40%;border:none;"><?= V($Cells, 'State', 'Name'.LNG) ?></th>
                    <th class="text-left" style="width:30%;border:none;">State</th>
                </tr>
            </thead>
        </table>

	 </div>

	<div class="page-footer text-center" style="font-size:9px;margin-top:20px;">
        <?= CURRENT_DATETIME ?>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        Jeddah, Sudia Arabia. Faisalyah dist. Front Of N2 Mall Gate 6 - Mob/0555680650 6 - ج/ 055568065
	</div>

</page>
<page>

	 <div class="page-header">

	 </div>

	 <div class="page-body">

		<h1><?= V($LTranslates,'Purchase') ?></h1>

        <hr />
		
		<table class="no-bordered" style="width:90%;">
			<tbody>
				<tr>
					<td class="text-right" style="width:35%;">
                        <table class="no-bordered" style="width:100%;">
                            <thead>
                                <tr><th><?= V($LTranslates,'Provider') ?></th></tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><?= V($Cells,'Code') ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <?= V($Cells, 'Provider', 'Companyname') ?> <br /> 
                                        <?= V($Cells, 'Provider', 'Name') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <?= V($Cells, 'Provider', 'Address') ?> <br /> 
                                        <?= V($Cells, 'Provider', 'City') ?> 
                                        <?= V($Cells, 'Provider', 'Country') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center" style="direction:ltr;">
                                        <?= V($Cells, 'Provider', 'Phonenumber') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <?= V($Cells, 'Provider', 'Email') ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
					</td>
					<td class="text-right" style="width:35%;">
                        <table class="no-bordered" style="width:100%;">
                            <thead>
                                <tr><th><?= V($LTranslates,'Customer') ?></th></tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><?= V($Cells,'Code') ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <?= V($Cells, 'Provider', 'Companyname') ?> <br />  
                                        <?= V($Cells, 'Provider', 'Name') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <?= V($Cells, 'Provider', 'Address') ?> <br /> 
                                        <?= V($Cells, 'Provider', 'City') ?> 
                                        <?= V($Cells, 'Provider', 'Country') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center" style="direction:ltr;">
                                        <?= V($Cells, 'Provider', 'Phonenumber') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <?= V($Cells, 'Provider', 'Email') ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
					</td>
					<td class="text-center" style="width:20%;">
                        <?= V($Cells, 'Code') ?>
                        <br />
						<barcode code="REF: <?= V($Cells,'Code') ?>\nDATE: <?= V($Cells,'AT') ?>\nTTC: <?= V($Cells,'TTC') ?> MAD" size="1" type="QR" error="M" class="barcode" disableborder="1" />
                        <br />
                        <?= V($Cells, 'AT') ?>
					</td>
				</tr>
			</tbody>
		</table>
        
		<table class="">
			<thead>
				<tr>
					<th class="text-center" style="width:15%;"><?= V($LTranslates,'Code') ?></th>
					<th class="text-center" style="width:45%;"><?= V($LTranslates,'Name') ?></th>
					<th class="text-center" style="width:15%;"><?= V($LTranslates, 'Product', 'Price') ?></th>
					<th class="text-center" style="width:15%;"><?= V($LTranslates, 'Quantity') ?></th>
					<th class="text-center" style="width:15%;"><?= V($LTranslates, 'Total') ?></th>
				</tr>
			</thead>
			<tbody>
                <?php foreach($Cells['Products'] as $cell){ ?>
				<tr>
					<td class="text-center"><?= V($cell,'Product', 'Code') ?></td>
					<td class="text-right"><?= V($cell,'Product', 'Name') ?></td>
					<td class="text-right"><?= V($cell,'Price') ?></td>
					<td class="text-center"><?= V($cell,'Quantity') ?></td>
					<td class="text-right"><?= V($cell,'HT') ?></td>
				</tr>
                <?php } ?>
			</tbody>
			<tbody>
                <tr>
					<td class="text-center" rowspan="5" colspan="2" style="background-color:while;border:none;">
						<barcode code="<?= V($Cells,'Code') ?>" text="1" size="0.8" height="1.5" type="C128A" error="M" class="barcode" disableborder="1" />
                        <br />
                        <?= V($Cells,'Code') ?>
                    </td>
					<th class="text-right" style="width:15%;"><?= V($LTranslates, 'TVA') ?></th>
					<th class="text-right ltr" style="width:15%;"><?= V($Cells, 'TVA') ?> %</th>
					<th class="text-right" style="width:15%;"><?= V($Cells, 'Tax') ?></th>
				</tr>
                <tr>
					<th class="text-right" style="width:15%;"><?= V($LTranslates, 'Cobon') ?></th>
					<th class="text-right ltr" style="width:15%;"><?= V($Cells, 'Cobon', 'Ratio') ?> %</th>
					<th class="text-right" style="width:15%;"><?= V($Cells, 'Gift') ?></th>
				</tr>
                <tr>
					<th class="text-right" style="width:15%;"><?= V($LTranslates, 'Reduction') ?></th>
					<th class="text-right ltr" style="width:15%;"></th>
					<th class="text-right" style="width:15%;"><?= V($Cells, 'Reduction') ?></th>
				</tr>
                <tr>
					<th class="text-right" style="width:15%;"><?= V($LTranslates, 'Expense') ?></th>
					<th class="text-right ltr" style="width:15%;"></th>
					<th class="text-right" style="width:15%;"><?= V($Cells, 'Expense') ?></th>
				</tr>
                <tr>
					<th class="text-center" colspan="2" style="width:15%;background-color:while;color:#000"><?= V($LTranslates, 'TTC') ?></th>
					<th class="text-right" style="width:15%;background-color:while;color:#000;"><?= V($Cells, 'TTC') ?></th>
				</tr>
			</tbody>
		</table>
	 </div>

	<div class="page-footer">

	</div>

</page>
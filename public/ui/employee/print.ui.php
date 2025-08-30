<page>

	 <div class="page-header">

	 </div>

	 <div class="page-body">
		 

		<h3><?= V($LTranslates,'Employee') ?></h3>

		<table class="no-bordered">
			<tbody>
				<tr>
					<td class="text-center">
						<img src="<?= V($Cells,'Picture') ?>" style="width:20%;text-align:center;margin:auto;" />
					</td>
					</td>
				</tr>
			</tbody>
		</table>

		<table class="no-bordered single">
			<tbody>
				<tr>
					<td class="text-left"><?= V($LTranslates,'Code') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'Code') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'NCID') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'NCID') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'Firstname') ?> <?= V($LTranslates,'AND') ?> <?= V($LTranslates,'Lastname') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'Firstname') ?> <?= V($Cells,'Lastname') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'Gender') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'Gender', 'Name'.LNG) ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'EBilive') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'EBilive') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'SWork') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'SWork') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'Username') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'Username') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'Job') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'Job', 'Name'.LNG) ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'Country') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'Country') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'City') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'City') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'Address') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'Address') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'Email') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'Email') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'Phonenumber') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'Phonenumber') ?></td>
				</tr>
				<tr>
					<td class="text-left"><?= V($LTranslates,'State') ?></td>
					<td class="text-center">:</td>
					<td class="text-right"><?= V($Cells,'State', 'Name'.LNG) ?></td>
				</tr>
			</tbody>
		</table>
		
		<table class="no-bordered">
			<tbody>
				<tr>
					<td class="text-center">
						<barcode code="<?= V($Cells,'Code') ?>" size="1" type="QR" error="M" class="barcode" disableborder="1" />
					</td>
				</tr>
				<tr>
					<td class="text-center">
						<barcode code='<?= V($Cells,'Code') ?>' size="1.4" type='C39' />
					</td>
				</tr>
			</tbody>
		</table>
	 </div>

	<div class="page-footer">

	</div>

</page>
<link rel="stylesheet" href="<?= WASSETS ?>css/setting-edit.css">
<link rel="stylesheet" href="<?= WASSETS ?>css/base.css">


<?php
// ====== language & direction 
$lang  = isset($Lang) ? strtolower($Lang) : 'ar';
$isRTL = in_array($lang, ['ar', 'fa', 'ur', 'he']);
$dir   = $isRTL ? 'rtl' : 'ltr';
?>
<?php if (!empty($RedirectTo)): ?>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.location.replace('<?= $RedirectTo ?>');
        });
    </script>
    <?php return; ?>
<?php endif; ?>

<div class="page-wrapper" dir="<?= $dir ?>" lang="<?= htmlspecialchars($lang) ?>">
	<div class="page-header">
		<!---Path Pages Header---->
		<div class="breadcrumbs">
			<a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a>
			<span>›</span>
			<a href="<?= WLink('setting') ?>"><?= V($LTranslates, 'Settings') ?></a>
			<span>›</span>
			<strong><?= V($LTranslates, 'Edit') ?></strong>
		</div>

		<!---Back Button---->
		<div class="actions">
			<?php
			$lang  = isset($Lang) ? strtolower($Lang) : 'ar';
			$isRTL = in_array($lang, ['ar', 'fa', 'ur', 'he']);
			$backIcon = $isRTL ? '<i class="ph ph-arrow-left"></i>' : '<i class="ph ph-arrow-right"></i>';
			require_once 'public/assets/widgets/button.php';
			renderButton([
				'href'      => WLink('setting'),
				'label'     => V($LTranslates, 'List'),
				'icon'      => $backIcon,
				'icon_pos'  => 'end',
				'variant'   => 'ghost',
				'size'      => 'lg',
				'rounded'   => 'lg',
				'style_vars' => [
					'--btn-bg'      => '#ffffffff',
					'--btn-text'    => '#000000ff',
					'--btn-border'  => '#000000ff',
					'--btn-hover-bg' => '#e2e1e1ff',
					'--btn-px'      => '15px',
					'--btn-py'      => '8px',
				]
			]);
			?>
		</div>
	</div>


	<?php if (isset($Success)) : ?>
		<div class="alert alert--success"><?= V($LTranslates, 'ESuccess') ?></div>
	<?php endif; ?>

	<form action="<?= WLink('setting/edit/') ?>" method="post" enctype="multipart/form-data" class="c-form">

		<div class="grid grid--3">
			<!-- العمود 1 -->
			<details class="acc" open>
				<summary class="acc__header">المؤسسة : الاسم، الرخص، المقر، التواصل، الشعار</summary>
				<div class="acc__body">

					<fieldset class="fs">
						<legend>الإسم</legend>

						<div class="input-group">
							<span class="input-addon">بالعربية</span>
							<?php
							//===Name Textfield===//
							$name = 'companynamear';
							$type = 'text';
							$value = V($Cells, 'CompanynameAR');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
						</div>

						<div class="input-group">
							<span class="input-addon">بالإنجليزية</span>
							<?php
							//===Name Textfield===//
							$name = 'companynameen';
							$type = 'text';
							$value = V($Cells, 'CompanynameEN');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
						</div>
					</fieldset>

					<fieldset class="fs">
						<legend>المدير</legend>

						<div class="input-group">
							<span class="input-addon">بالعربية</span>
							<?php
							//===Name Textfield===//
							$name = 'bossnamear';
							$type = 'text';
							$value = V($Cells, 'BossnameAR');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
						</div>

						<div class="input-group">
							<span class="input-addon">بالإنجليزية</span>
							<?php
							//===Name Textfield===//
							$name = 'bossnameen';
							$type = 'text';
							$value = V($Cells, 'BossnameEN');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
						</div>
					</fieldset>

					<fieldset class="fs">
						<legend>الرخص</legend>
						<div class="input-group">
							<span class="input-addon">الرقم التجاري</span>
							<?php
							//===Name Textfield===//
							$name = 'rc';
							$type = 'text';
							$value = V($Cells, 'RC');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
						</div>
						<div class="input-group">
							<span class="input-addon">الرقم الضريبي</span>
							<?php
							//===Name Textfield===//
							$name = 'taxnumber';
							$type = 'text';
							$value = V($Cells, 'TaxNumber');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
						</div>
					</fieldset>

					<fieldset class="fs">
						<legend>الضريبة</legend>
						<div class="input-group">
							<span class="input-addon">قيمة الضريبة المضافة</span>
							<?php
							//===Name Textfield===//
							$name = 'tva';
							$type = 'text';
							$value = V($Cells, 'TVA');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
							<span class="input-addon input-addon--suffix">%</span>
						</div>
					</fieldset>

					<fieldset class="fs">
						<legend>البنك</legend>
						<div class="input-group">
							<span class="input-addon">الإسم</span>
							<?php
							//===Name Textfield===//
							$name = 'bankname';
							$type = 'text';
							$value = V($Cells, 'Bankname');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
						</div>
						<div class="input-group">
							<span class="input-addon">RIB</span>
							<?php
							//===Name Textfield===//
							$name = 'rib';
							$type = 'text';
							$value = V($Cells, 'RIB');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
						</div>
						<div class="input-group">
							<span class="input-addon">IBAN</span>
							<?php
							//===Name Textfield===//
							$name = 'iban';
							$type = 'text ltr';
							$value = V($Cells, 'IBAN');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
						</div>
						<div class="input-group">
							<span class="input-addon">SWIFT</span>
							<?php
							//===Name Textfield===//
							$name = 'swift';
							$type = 'text ltr';
							$value = V($Cells, 'SWIFT');
							$required = true;
							$style_vars = [
								'--tf-py'         => '19px',
								'--tf-fs'         => '14px',
								'--tf-radius'     => '6px',
							];
							include 'public/assets/widgets/textField.php';
							?>
						</div>
					</fieldset>

					<fieldset class="fs">
						<legend>الشعار</legend>
						<label class="file">
							<input type="file" name="logo" id="picture">
							<span class="file__btn"><i class="ph ph-image"></i> اختر صورة</span>
						</label>
						<img src="<?= V($Cells, 'Logo') ?>" data-default="<?= IMG_DEFAULT ?>" class="thumb" id="img-picture" alt="Logo">
					</fieldset>

				</div>
			</details>

			<!-- العمود 2 -->
			<details class="acc">
				<summary class="acc__header">
					<?= V($LTranslates, 'Country') ?>، <?= V($LTranslates, 'City') ?>، <?= V($LTranslates, 'Region') ?>، <?= V($LTranslates, 'Address') ?>
				</summary>
				<div class="acc__body">

					<fieldset class="fs">
						<legend><?= V($LTranslates, 'Address') ?></legend>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'AR') ?></span><input type="text" class="input" name="addressar" value="<?= V($Cells, 'AddressAR') ?>" required></div>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'EN') ?></span><input type="text" class="input" name="addressen" value="<?= V($Cells, 'AddressEN') ?>" required></div>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'FR') ?></span><input type="text" class="input" name="addressfr" value="<?= V($Cells, 'AddressFR') ?>" required></div>
					</fieldset>

					<fieldset class="fs">
						<legend><?= V($LTranslates, 'ZIPCode') ?></legend>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'ZIPCode') ?></span><input type="text" class="input" name="zipcode" value="<?= V($Cells, 'ZIPCode') ?>" required></div>
					</fieldset>

					<fieldset class="fs">
						<legend><?= V($LTranslates, 'Region') ?></legend>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'AR') ?></span><input type="text" class="input" name="regionar" value="<?= V($Cells, 'RegionAR') ?>" required></div>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'EN') ?></span><input type="text" class="input" name="regionen" value="<?= V($Cells, 'RegionEN') ?>" required></div>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'FR') ?></span><input type="text" class="input" name="regionfr" value="<?= V($Cells, 'RegionFR') ?>" required></div>
					</fieldset>

					<fieldset class="fs">
						<legend><?= V($LTranslates, 'City') ?></legend>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'AR') ?></span><input type="text" class="input" name="cityar" value="<?= V($Cells, 'CityAR') ?>" required></div>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'EN') ?></span><input type="text" class="input" name="cityen" value="<?= V($Cells, 'CityEN') ?>" required></div>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'FR') ?></span><input type="text" class="input" name="cityfr" value="<?= V($Cells, 'CityFR') ?>" required></div>
					</fieldset>

					<fieldset class="fs">
						<legend><?= V($LTranslates, 'Country') ?></legend>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'AR') ?></span><input type="text" class="input" name="countryar" value="<?= V($Cells, 'CountryAR') ?>" required></div>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'EN') ?></span><input type="text" class="input" name="countryen" value="<?= V($Cells, 'CountryEN') ?>" required></div>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'FR') ?></span><input type="text" class="input" name="countryfr" value="<?= V($Cells, 'CountryFR') ?>" required></div>
					</fieldset>

				</div>
			</details>

			<!-- العمود 3 -->
			<details class="acc">
				<summary class="acc__header">
					<?= V($LTranslates, 'WSID') ?>، <?= V($LTranslates, 'WSState') ?>، <?= V($LTranslates, 'WSLanguges') ?>، <?= V($LTranslates, 'WSTheme') ?>
				</summary>
				<div class="acc__body">

					<fieldset class="fs">
						<legend><?= V($LTranslates, 'WSID') ?></legend>
						<input type="hidden" name="id" value="<?= V($Cells, 'ID') ?>">
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'AR') ?></span><input type="text" class="input" name="namear" value="<?= V($Cells, 'NameAR') ?>" required></div>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'EN') ?></span><input type="text" class="input" name="nameen" value="<?= V($Cells, 'NameEN') ?>" required></div>
						<div class="input-group"><span class="input-addon"><?= V($LTranslates, 'FR') ?></span><input type="text" class="input" name="namefr" value="<?= V($Cells, 'NameFR') ?>" required></div>
					</fieldset>

					<fieldset class="fs">
						<legend><?= V($LTranslates, 'WSState') ?></legend>
						<?php $stateId = (int) V($Cells, 'State', 'ID'); ?>
						<ul class="choices">
							<li>
								<label>
									<input type="radio" name="state" value="2" <?= $stateId === 2 ? 'checked' : '' ?> required>
									<span class="state-chip state-chip--ok"><?= V($LTranslates, 'StateEnabled') ?></span>
								</label>
								<label>
									<input type="radio" name="state" value="3" <?= $stateId === 3 ? 'checked' : '' ?>>
									<span class="state-chip state-chip--danger"><?= V($LTranslates, 'StateDisabled') ?></span>
								</label>

							</li>
						</ul>
					</fieldset>

					<fieldset class="fs">
						<legend><?= V($LTranslates, 'WSLanguges') ?></legend>
						<ul class="choices">
							<li><label><input type="checkbox" class="websitelangs" name="langar" value="AR" disabled <?= (V($Cells, 'AR', 'ID') == '2') ? 'checked' : '' ?>> <?= V($LTranslates, 'AR') ?></label></li>
							<li><label><input type="checkbox" class="websitelangs" name="langen" value="EN" <?= (V($Cells, 'EN', 'ID') == '2') ? 'checked' : '' ?>> <?= V($LTranslates, 'EN') ?></label></li>
							<li><label><input type="checkbox" class="websitelangs" name="langfr" value="FR" <?= (V($Cells, 'FR', 'ID') == '2') ? 'checked' : '' ?>> <?= V($LTranslates, 'FR') ?></label></li>
						</ul>

						<div class="input-group">
							<select name="defaultlang" class="input">
								<option value="" selected><?= V($LTranslates, 'LangDefault') ?></option>
								<option value="AR" <?= V($Cells, 'Langue') == 'AR' ? 'selected' : '' ?>><?= V($LTranslates, 'AR') ?></option>
								<option value="EN" <?= V($Cells, 'Langue') == 'EN' ? 'selected' : '' ?>><?= V($LTranslates, 'EN') ?></option>
								<option value="FR" <?= V($Cells, 'Langue') == 'FR' ? 'selected' : '' ?>><?= V($LTranslates, 'FR') ?></option>
							</select>
						</div>
					</fieldset>

					<fieldset class="fs">
						<legend><?= V($LTranslates, 'WSTheme') ?></legend>
						<div class="input-group">
							<select name="theme" class="input">
								<option value="default"><?= V($LTranslates, 'ThemeDefault') ?></option>
							</select>
						</div>
					</fieldset>

				</div>
			</details>
		</div>
		<input type="hidden" name="btn_edit" value="1">

		<div class="form-actions">
			<?php
			require_once 'public/assets/widgets/button.php';
			renderButton([
				'type'     => 'submit',
				'name'     => 'btn_edit',
				'label'    => V($LTranslates, 'Save'),
				'variant'  => 'solid',
				'size'     => 'lg',
				'rounded'  => 'lg',
				'width'    => 'full',
				'style_vars' => [
					'--btn-bg'      => '#0ea5e9',
					'--btn-text'    => '#fff',
					'--btn-border'  => '#0ea5e9',
					'--btn-hover-bg' => '#0284c7',
					'--btn-py'      => '14px',
				],
			]);
			?>
		</div>

	</form>
</div>
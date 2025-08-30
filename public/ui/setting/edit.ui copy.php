<div class="container-fluid">
	<div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('setting') ?>"><?= V($LTranslates, 'Settings') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('setting') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'List') ?>  
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Success)){  ?>
					<div class="alert alert-success alert-edit" role="alert"><?= V($LTranslates, 'ESuccess') ?></div>
				<?php } ?>
			</div>
		</div>
		
		<form action="<?= WLink('setting/edit/') ?>" method="post" enctype="multipart/form-data">
		
			<div class="panel-group" id="panel-group-01" role="tablist" aria-multiselectable="true">
				<div class="row">

					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

						<div class="panel panel-default" style="margin-bottom:5px;">
							<div class="panel-header">
								<a role="button" data-toggle="collapse" data-parent="#panel-005" href="#collapse-005" aria-expanded="true" aria-controls="collapse-005" class="btn-block">
								المؤسسة : الاسم, الرخص, المقر, التوصل, الشعار
								</a>
							</div>
							<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-005">
								<fieldset>
									<legend>الإسم</legend>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">بالعربية</span>
												<input type="text" class="form-control text-center" name="companynamear" value="<?= V($Cells, 'CompanynameAR') ?>" required="required">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">بالإنجليزية</span>
												<input type="text" class="form-control text-center" name="companynameen" value="<?= V($Cells, 'CompanynameEN') ?>" required="required">
											</div>
										</div>
								</fieldset>
								<fieldset>
									<legend>المدير</legend>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">بالعربية</span>
												<input type="text" class="form-control text-center" name="bossnamear" value="<?= V($Cells, 'BossnameAR') ?>" required="required">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">بالإنجليزية</span>
												<input type="text" class="form-control text-center" name="bossnameen" value="<?= V($Cells, 'BossnameEN') ?>" required="required">
											</div>
										</div>
								</fieldset>
								<fieldset>
									<legend>الرخص</legend>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">الرقم التجاري</span>
												<input type="text" class="form-control text-center" name="rc" value="<?= V($Cells, 'RC') ?>" required="required">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">الرقم الضريبي</span>
												<input type="text" class="form-control text-center" name="taxnumber" value="<?= V($Cells, 'TaxNumber') ?>" required="required">
											</div>
										</div>
								</fieldset>
								<fieldset>
									<legend>الضريبة</legend>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">قيمة الضريبة المضافة</span>
												<input type="number" class="form-control text-center" name="tva" value="<?= V($Cells, 'TVA') ?>" step="0.01" required="required" min="0.00" max="100.00">
												<span class="input-group-addon addon-20">%</span>
											</div>
										</div>
								</fieldset>
								<fieldset>
									<legend>البنك</legend>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">الإسم</span>
												<input type="text" class="form-control text-center" name="bankname" value="<?= V($Cells, 'Bankname') ?>" required="required">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">RIB</span>
												<input type="text" class="form-control text-center" name="rib" value="<?= V($Cells, 'RIB') ?>" required="required">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">IBAN</span>
												<input type="text" class="form-control text-center" name="iban" value="<?= V($Cells, 'IBAN') ?>" required="required">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">SWIFT</span>
												<input type="text" class="form-control text-center" name="swift" value="<?= V($Cells, 'SWIFT') ?>" required="required">
											</div>
										</div>
								</fieldset>
								<fieldset>
									<legend>الشعار</legend>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon addon-20"><i class="glyphicon glyphicon-folder-open"></i></span>
											<button class="btn btn-default form-control upload" type="button">
												<i class="glyphicon glyphicon-picture"></i>
												<input type="file" name="logo" id="picture">
											</button>
										</div>
									</div>
									<img src="<?= V($Cells,'Logo') ?>" data-default="<?= IMG_DEFAULT ?>"class="thumbnail" id="img-picture" style="width:100px;">
								</fieldset>
							</div>
						</div>

					</div>

					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

						<div class="panel panel-default" style="margin-bottom:5px;">
							<div class="panel-header">
								<a role="button" data-toggle="collapse" data-parent="#panel-003" href="#collapse-003" aria-expanded="true" aria-controls="collapse-003" class="btn-block">
									<?= V($LTranslates, 'Country') ?>,  
									<?= V($LTranslates, 'City') ?>, 
									<?= V($LTranslates, 'Region') ?>, 
									<?= V($LTranslates, 'Address') ?>
								</a>
							</div>
							<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-003">
								<fieldset>
									<legend><?= V($LTranslates, 'Address') ?></legend>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'AR') ?></span>
											<input type="text" class="form-control" name="addressar" value="<?= V($Cells, 'AddressAR') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'EN') ?></span>
											<input type="text" class="form-control" name="addressen" value="<?= V($Cells, 'AddressEN') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'FR') ?></span>
											<input type="text" class="form-control" name="addressfr" value="<?= V($Cells, 'AddressFR') ?>" required="required">
										</div>
									</div>
								</fieldset>
								<fieldset>
									<legend><?= V($LTranslates, 'ZIPCode') ?></legend>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'ZIPCode') ?></span>
											<input type="text" class="form-control" name="zipcode" value="<?= V($Cells, 'ZIPCode') ?>" required="required">
										</div>
									</div>
								</fieldset>
								<fieldset>
									<legend><?= V($LTranslates, 'Region') ?></legend>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'AR') ?></span>
											<input type="text" class="form-control" name="regionar" value="<?= V($Cells, 'RegionAR') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'EN') ?></span>
											<input type="text" class="form-control" name="regionen" value="<?= V($Cells, 'RegionEN') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'FR') ?></span>
											<input type="text" class="form-control" name="regionfr" value="<?= V($Cells, 'RegionFR') ?>" required="required">
										</div>
									</div>
								</fieldset>
								<fieldset>
									<legend><?= V($LTranslates, 'City') ?></legend>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'AR') ?></span>
											<input type="text" class="form-control" name="cityar" value="<?= V($Cells, 'CityAR') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'EN') ?></span>
											<input type="text" class="form-control" name="cityen" value="<?= V($Cells, 'CityEN') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'FR') ?></span>
											<input type="text" class="form-control" name="cityfr" value="<?= V($Cells, 'CityFR') ?>" required="required">
										</div>
									</div>
								</fieldset>
								<fieldset>
									<legend><?= V($LTranslates, 'Country') ?></legend>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'AR') ?></span>
											<input type="text" class="form-control" name="countryar" value="<?= V($Cells, 'CountryAR') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'EN') ?></span>
											<input type="text" class="form-control" name="countryen" value="<?= V($Cells, 'CountryEN') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><?= V($LTranslates, 'FR') ?></span>
											<input type="text" class="form-control" name="countryfr" value="<?= V($Cells, 'CountryFR') ?>" required="required">
										</div>
									</div>
								</fieldset>
							</div>
						</div>

						<div class="panel panel-default" style="margin-bottom:5px;">
							<div class="panel-header">
								<a role="button" data-toggle="collapse" data-parent="#panel-004" href="#collapse-004" aria-expanded="true" aria-controls="collapse-004" class="btn-block">
								<?= V($LTranslates, 'Phonenumber') ?>, <?= V($LTranslates, 'Fax') ?>, <?= V($LTranslates, 'Email') ?>
								</a>
							</div>
							<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-004">
								<fieldset>
									<legend><?= V($LTranslates, 'Phonenumber') ?></legend>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">1</span>
											<input type="text" class="form-control tel" name="pn1" value="<?= V($Cells, 'PN1') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">2</span>
											<input type="text" class="form-control tel" name="pn2" value="<?= V($Cells, 'PN2') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">3</span>
											<input type="text" class="form-control tel" name="pn3" value="<?= V($Cells, 'PN3') ?>" required="required">
										</div>
									</div>
								</fieldset>
								<fieldset>
									<legend><?= V($LTranslates, 'Fax') ?></legend>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">1</span>
											<input type="text" class="form-control tel" name="fax" value="<?= V($Cells, 'Fax') ?>" required="required">
										</div>
									</div>
								</fieldset>
								<fieldset>
									<legend><?= V($LTranslates, 'Email') ?></legend>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">1</span>
											<input type="text" class="form-control tel" name="email1" value="<?= V($Cells, 'Email1') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">2</span>
											<input type="text" class="form-control tel" name="email2" value="<?= V($Cells, 'Email2') ?>" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">3</span>
											<input type="text" class="form-control tel" name="email3" value="<?= V($Cells, 'Email3') ?>" required="required">
										</div>
									</div>
								</fieldset>
							</div>
						</div>

					</div>

					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

						<div class="panel panel-default" style="margin-bottom:5px;">
							<div class="panel-header">
								<a role="button" data-toggle="collapse" data-parent="#panel-006" href="#collapse-006" aria-expanded="true" aria-controls="collapse-006" class="btn-block">
								<?= V($LTranslates, 'WSID') ?>, <?= V($LTranslates, 'WSState') ?>, <?= V($LTranslates, 'WSLanguges') ?>, <?= V($LTranslates, 'WSTheme') ?>
								</a>	
							</div>
							<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-006">
								<fieldset>
									<legend><?= V($LTranslates, 'WSID') ?></legend>
									<div class="form-group">
											<input type="hidden" class="form-control" name="id" value="<?= V($Cells, 'ID') ?>" />
											<div class="input-group">
												<span class="input-group-addon addon-20"><?= V($LTranslates, 'AR') ?></span>
												<input type="text" class="form-control" name="namear" value="<?= V($Cells, 'NameAR') ?>" required="required">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20"><?= V($LTranslates, 'EN') ?></span>
												<input type="text" class="form-control" name="nameen" value="<?= V($Cells, 'NameEN') ?>" required="required">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20"><?= V($LTranslates, 'FR') ?></span>
												<input type="text" class="form-control" name="namefr" value="<?= V($Cells, 'NameFR') ?>" required="required">
											</div>
										</div>
								</fieldset>
								<fieldset>
									<legend><?= V($LTranslates, 'WSState') ?></legend>
									<div class="form-group">
										<ul>
											<li style="display:inline-block;">
												<input type="radio" name="state" value="2" <?= V($Cells, 'State', 'ID') === '2' ? 'checked="checked"' : '' ?> />
												<span class="label label-success"><?= V($LTranslates, 'StateEnabled') ?></span>
											</li>
											<li style="display:inline-block;">
												<input type="radio" name="state" value="3" <?= V($Cells, 'State', 'ID') === '3' ? 'checked="checked"' : '' ?> />
												<span class="label label-danger"><?= V($LTranslates, 'StateDisabled') ?></span>
											</li>
										</ul>
									</div>
								</fieldset>
								<fieldset>
									<legend><?= V($LTranslates, 'WSLanguges') ?></legend>
									<div class="form-group">
										<div class="form-group">
											<ul>
												<li style="display:inline-block;">
													<input type="checkbox" class="websitelangs" name="langar" value="AR" disabled="disabled" <?= (V($Cells, 'AR', 'ID') == '2') ? 'checked="checked"' : '' ?> />
													<label for=""><?= V($LTranslates, 'AR') ?></label>
												</li>
												<li style="display:inline-block;">
													<input type="checkbox" class="websitelangs" name="langen" value="EN" <?= (V($Cells, 'EN', 'ID') == '2') ? 'checked="checked"' : '' ?> />
													<label for=""><?= V($LTranslates, 'EN') ?></label>
												</li>
												<li style="display:inline-block;">
													<input type="checkbox" class="websitelangs" name="langfr" value="FR" <?= (V($Cells, 'FR', 'ID') == '2') ? 'checked="checked"' : '' ?> />
													<label for=""><?= V($LTranslates, 'FR') ?></label>
												</li>
											
											</ul>
										</div>
									</div>
									<div class="form-group">
										<select name="defaultlang" class="form-control">
											<option value="" selected="selected"><?= V($LTranslates, 'LangDefault') ?></option>
											<option value="AR" <?= V($Cells, 'Langue') == 'AR' ? 'selected="selected"' : '' ?>><?= V($LTranslates, 'AR') ?></option>
											<option value="EN" <?= V($Cells, 'Langue') == 'EN' ? 'selected="selected"' : '' ?>><?= V($LTranslates, 'EN') ?></option>
											<option value="FR" <?= V($Cells, 'Langue') == 'FR' ? 'selected="selected"' : '' ?>><?= V($LTranslates, 'FR') ?></option>
										</select>
									</div>
								</fieldset>
								<fieldset>
									<legend><?= V($LTranslates, 'WSTheme') ?></legend>
									<div class="form-group">
										<select name="theme" class="form-control">
											<option value="default"><?= V($LTranslates, 'ThemeDefault') ?></option>
											<?php //<option value="">قياسي</option> ?>
											<?php //<option value="">احترافي</option> ?>
										</select>
									</div>
								</fieldset>
							</div>
						</div>

						<?php /*
						<div class="panel panel-default" style="margin-bottom:5px;">
							<div class="panel-header">
								<a role="button" data-toggle="collapse" data-parent="#panel-007" href="#collapse-007" aria-expanded="true" aria-controls="collapse-007" class="btn-block">
								التقارير : اعلى الورقة, اسفل الورقة
								</a>
							</div>
							<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-007">
								<fieldset>
									<legend>اعلى الورقة</legend>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">بالعربية</span>
												<input type="text" class="form-control" name="pageheaderar" value="اعلى الورقة بالعربي" />
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">بالإنجليزية</span>
												<input type="text" class="form-control ltr" name="pagefooterar" value="Arabic Page Header" />
											</div>
										</div>
								</fieldset>
								<fieldset>
									<legend>اسفل الورقة</legend>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">بالعربية</span>
												<input type="text" class="form-control" name="pageheaderen" value="اسفل الورقة بالعربي" />
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon addon-20">بالإنجليزية</span>
												<input type="text" class="form-control ltr" name="pagefooteren" value="Arabic Page Footer" />
											</div>
										</div>
								</fieldset>
							</div>
						</div>
						*/?>

					</div>

				</div>
				
				<hr />

				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block" name="btn_edit">
								<?= V($LTranslates,'Save') ?>
								<i class="glyphicon glyphicon-ok"></i> 
							</button>
						</div>
					</div>
				</div>

			</div>

		</form>

    </div>
</div>
<div class="container-fluid container-height">
	<div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><a href="<?= WLink('report') ?>"><?= V($LTranslates, 'Reports') ?></a></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink() ?>" class="btn btn-default btn-block btn-control" role="button">
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
		
		<div class="panel-group" id="panel-group-01" role="tablist" aria-multiselectable="true">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

					<div class="panel panel-default" style="margin-bottom:5px;">
						<div class="panel-header">
							<a role="button" data-toggle="collapse" data-parent="#panel-a001" href="#collapse-a001" aria-expanded="true" aria-controls="collapse-a001" class="btn-block">
								الموظفين	
							</a>
						</div>
						<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-a001">
							
							<fieldset style="display:none;">
								<legend>بيان معلومات بكامل الموظفين</legend>
								<form action="<?= WLink('employee/prints/1') ?>" method="post" target="_blank">
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="display:none;">
								<legend>بيان معلومات موظف معين</legend>
								<form action="<?= WLink('employee/prints/2') ?>" method="post" target="_blank">
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-employees-a001-002" name="employees[]" data-multiple-name="الموظفين">
											<option value="0">&nbsp;</option>
											<?php foreach ($LEmployees as $Employee) { ?>
												<option value="<?= V($Employee,'ID') ?>">
													<?= V($Employee,'NCID') ?> -
													<?= V($Employee,'Firstname') ?> <?= V($Employee,'Lastname') ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="display:none;">
								<legend>بيان راتب موظف معين دائن ومدين</legend>
								<form action="<?= WLink('employee/prints/3') ?>" method="post" target="_blank">
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-employees-a001-003" name="employees[]" data-multiple-name="الموظفين">
											<option value="0">&nbsp;</option>
											<?php foreach ($LEmployees as $Employee) { ?>
												<option value="<?= V($Employee,'ID') ?>">
													<?= V($Employee,'NCID') ?> -
													<?= V($Employee,'Firstname') ?> <?= V($Employee,'Lastname') ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="display:none;">
								<legend>بيان رواتب الموظفين لفترة معينة</legend>
								<form action="<?= WLink('employee/prints/4') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

						</div>
					</div>

					<div class="panel panel-default" style="margin-bottom:5px;">
						<div class="panel-header">
							<a role="button" data-toggle="collapse" data-parent="#panel-a002" href="#collapse-a002" aria-expanded="true" aria-controls="collapse-a002" class="btn-block">
							المسوقين	
							</a>
						</div>
						<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-a002">
							
							<fieldset style="display:none;">
								<legend>بيان الارباح التي تضاف لحساب جميع المسوق</legend>
								<form action="<?= WLink('provider/report/') ?>" method="post">
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>
							
							<fieldset style="display:none;">
								<legend>بيان الارباح التي تضاف لحساب مسوق معين</legend>
								<form action="<?= WLink('provider/report/') ?>" method="post">
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-marketers-a002-001" name="marketers[]" multiple="multiple" data-multiple-name="المسوقين">
											<option value="">A</option>
											<option value="">B</option>
											<option value="">C</option>
											<option value="">D</option>
										</select>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>
							
							<fieldset style="display:none;">
								<legend>بيان الخصومات التي تمت لجميع المسوقين</legend>
								<form action="<?= WLink('provider/report/') ?>" method="post">
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>
							
							<fieldset style="display:none;">
								<legend>بيان الخصومات التي تمت لمسوق معين</legend>
								<form action="<?= WLink('provider/report/') ?>" method="post">
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-marketers-a002-002" name="marketers[]" multiple="multiple" data-multiple-name="المسوقين">
											<option value="">A</option>
											<option value="">B</option>
											<option value="">C</option>
											<option value="">D</option>
										</select>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

						</div>
					</div>

					<div class="panel panel-default" style="margin-bottom:5px;">
						<div class="panel-header">
							<a role="button" data-toggle="collapse" data-parent="#panel-b001" href="#collapse-b001" aria-expanded="true" aria-controls="collapse-b001" class="btn-block">
								المنتجات (المخزن)
							</a>
						</div>
						<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-b001">
							
							<fieldset style="display:none;">
								<legend>بيان المنتجات</legend>
								<form action="<?= WLink('product/prints/1') ?>" method="post" target="_blank">
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="display:none;">
								<legend>بيان المخزن لكل المنتجات</legend>
								<form action="<?= WLink('product/prints/2') ?>" method="post" target="_blank">
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="display:none;">
								<legend>بيان المنتجات المنتهية من المخزن</legend>
								<form action="<?= WLink('product/prints/3') ?>" method="post" target="_blank">
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="display:none;">
								<legend>بيان مبيعات كميات كل منتج لفترة معينة</legend>
								<form action="<?= WLink('product/prints/4') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="display:none;">
								<legend>بيان مبيعات كميات منتج محدد لفترة معينة</legend>
								<form action="<?= WLink('product/prints/5') ?>" method="post" target="_blank">
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-products-a001-003" name="products[]" data-multiple-name="المنتجات">
											<option value="0">&nbsp;</option>
											<?php foreach ($LProducts as $Product) { ?>
												<option value="<?= V($Product,'ID') ?>">
													<?= V($Product,'Code') ?> - <?= V($Product,'Name') ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

						</div>
					</div>

				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

					<div class="panel panel-default" style="margin-bottom:5px;">
						<div class="panel-header">
							<a role="button" data-toggle="collapse" data-parent="#panel-c001" href="#collapse-c001" aria-expanded="true" aria-controls="collapse-c001" class="btn-block">
								المشتريات	
							</a>
						</div>
						<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-c001">
							
							<fieldset style="background-color:#ffe3af;">
								<legend>تقرير مشتريات حسب االمورد</legend>
								<form action="<?= WLink('sale/prints/1') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
										<input type="radio" name="general" value="1" /> 
										<label>إجمالي</label>&nbsp;
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset>
								<legend>تقرير مدفوعات المشتريات</legend>
								<form action="<?= WLink('sale/prints/2') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-methods54" name="methods54">
											<option value="0">&nbsp;</option>
											<?php foreach ($LMethods as $Method) { ?>
												<option value="<?= V($Method,'ID') ?>">
													<?= V($Method,'Name'.LNG) ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
										<input type="radio" name="general" value="1" /> 
										<label>إجمالي</label>&nbsp;
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset>
								<legend>تقرير الغير مدفوع للمشتريات</legend>
								<form action="<?= WLink('sale/prints/2') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
										<input type="radio" name="general" value="1" /> 
										<label>إجمالي</label>&nbsp;
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset>
								<legend>كشف حساب مورد</legend>
								<form action="<?= WLink('sale/prints/2') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-providers-purchases-01" name="providers[]" data-multiple-name="الموردين">
											<option value="0">&nbsp;</option>
											<?php foreach ($LProviders as $Provider) { ?>
												<option value="<?= V($Provider,'ID') ?>">
													<?= V($Provider,'Code') ?> - <?= V($Provider,'Companyname') ?> <?= V($Provider,'Name') ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
										<input type="radio" name="general" value="1" /> 
										<label>إجمالي</label>&nbsp;
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset>
								<legend>تقرير أرصدة مورد</legend>
								<form action="<?= WLink('sale/prints/2') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-providers-purchases-02" name="providers[]" data-multiple-name="الموردين">
											<option value="0">&nbsp;</option>
											<?php foreach ($LProviders as $Provider) { ?>
												<option value="<?= V($Provider,'ID') ?>">
													<?= V($Provider,'Code') ?> - <?= V($Provider,'Companyname') ?> <?= V($Provider,'Name') ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
										<input type="radio" name="general" value="1" /> 
										<label>إجمالي</label>&nbsp;
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

						</div>
					</div>

					<div class="panel panel-default" style="margin-bottom:5px;">
						<div class="panel-header">
							<a role="button" data-toggle="collapse" data-parent="#panel-c002" href="#collapse-c002" aria-expanded="true" aria-controls="collapse-c002" class="btn-block">
								المبيعات	
							</a>
						</div>
						<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-c002">
							
							<fieldset style="background-color:#d6ffd6;">
								<legend>تقرير مبيعات الفواتير</legend>
								<form action="<?= WLink('sale/prints/1') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" require="require" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" require="require" />
										</div>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
										<input type="radio" name="general" value="1" /> 
										<label>إجمالي</label>&nbsp;
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="background-color:#d6ffd6;">
								<legend>تقرير مدفوعات الفواتير</legend>
								<form action="<?= WLink('sale/prints/2') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-methods54A" name="methods[]" multiple="multiple">
											<?php foreach ($LMethods as $Method) { ?>
												<option value="<?= V($Method,'ID') ?>">
													<?= V($Method,'Name'.LNG) ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
										<input type="radio" name="general" value="1" /> 
										<label>إجمالي</label>&nbsp;
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="background-color:#d6ffd6;">
								<legend>تقرير الغير مدفوع من الفواتير</legend>
								<form action="<?= WLink('sale/prints/3') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
										<input type="radio" name="general" value="1" /> 
										<label>إجمالي</label>&nbsp;
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="background-color:#d6ffd6;">
								<legend>كشف حساب عميل</legend>
								<form action="<?= WLink('sale/prints/4') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-customers-sales-01" name="customers[]" data-multiple-name="<?= V($LTranslates,'Customer') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>" multiple="multiple">
                                            <?php if (isset($LCustomers)){  ?>
                                                <?php foreach ($LCustomers as $Customer) { ?>
                                                <option value="<?= V($Customer,'ID') ?>">
                                                    <?= V($Customer, 'Companyname') ?>
                                                </option>
                                                <?php }  ?>
                                            <?php }  ?>
                                        </select>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="background-color:#d6ffd6;">
								<legend>تقرير أرصدة عميل</legend>
								<form action="<?= WLink('sale/prints/5') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-customers-sales-02" name="customers[]" data-multiple-name="<?= V($LTranslates,'Customer') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>" multiple="multiple">
                                            <?php if (isset($LCustomers)){  ?>
                                                <?php foreach ($LCustomers as $Customer) { ?>
                                                <option value="<?= V($Customer,'ID') ?>">
                                                    <?= V($Customer, 'Companyname') ?>
                                                </option>
                                                <?php }  ?>
                                            <?php }  ?>
                                        </select>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

							<fieldset style="background-color:#d6ffd6;">
								<legend>تقرير مبيعات حسب العميل</legend>
								<form action="<?= WLink('sale/prints/6') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-customers-sales-03" name="customers[]" data-multiple-name="<?= V($LTranslates,'Customer') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>" multiple="multiple">
                                            <?php if (isset($LCustomers)){  ?>
                                                <?php foreach ($LCustomers as $Customer) { ?>
                                                <option value="<?= V($Customer,'ID') ?>">
                                                    <?= V($Customer, 'Companyname') ?>
                                                </option>
                                                <?php }  ?>
                                            <?php }  ?>
                                        </select>
									</div>
									<div class="form-group">
										<input type="radio" name="general" value="0" checked="checked" />
										<label>تفصيلي</label>
										<input type="radio" name="general" value="1" /> 
										<label>إجمالي</label>&nbsp;
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>

						</div>
					</div>

					<div class="panel panel-default" style="margin-bottom:5px;">
						<div class="panel-header">
							<a role="button" data-toggle="collapse" data-parent="#panel-c003" href="#collapse-c003" aria-expanded="true" aria-controls="collapse-c003" class="btn-block">
								المصروفات	
							</a>
						</div>
						<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-c003">
							<fieldset style="display:none;">
								<legend>بيان إجماليات المصروفات لفترة معينة</legend>
								<form action="<?= WLink('expense/prints/1') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>
							<fieldset style="display:none;">
								<legend>بيان المصروفات لصنف معين</legend>
								<form action="<?= WLink('expense/prints/2') ?>" method="post" target="_blank">
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-categories-c003-001" name="categories[]" data-multiple-name="الاصناف">
											<option value="0">&nbsp;</option>
											<?php foreach ($LProductsExpense as $Product) { ?>
												<option value="<?= V($Product,'ID') ?>">
													<?= V($Product,'Code') ?> - <?= V($Product,'Name') ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>
							<fieldset style="display:none;">
								<legend>بيان المصروفات لمورد معين</legend>
								<form action="<?= WLink('expense/prints/3') ?>" method="post" target="_blank">
									<div class="form-group">
										<select class="form-control multiselect" id="multiselect-providers-c003-002" name="providers[]" data-multiple-name="الموردين">
											<option value="0">&nbsp;</option>
											<?php foreach ($LProviders as $Provider) { ?>
												<option value="<?= V($Provider,'ID') ?>">
													<?= V($Provider,'Code') ?> - <?= V($Provider,'Companyname') ?> <?= V($Provider,'Name') ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>
							<fieldset style="display:none;">
								<legend>بيان فواتير المصروفات لفترة معينة</legend>
								<form action="<?= WLink('expense/prints/4') ?>" method="post" target="_blank">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>
						</div>
					</div>

					<div class="panel panel-default" style="margin-bottom:5px;">
						<div class="panel-header">
							<a role="button" data-toggle="collapse" data-parent="#panel-c004" href="#collapse-c004" aria-expanded="true" aria-controls="collapse-c004" class="btn-block">
								القيود المحاسبية	
							</a>
						</div>
						<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-c004">
							<fieldset style="display:none;">
								<legend>بيان القيود المحاسبية لفترة معينة</legend>
								<form action="<?= WLink('provider/report/') ?>" method="post">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">من</span>
											<input type="date" class="form-control" name="from" />
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">الى</span>
											<input type="date" class="form-control" name="to" />
										</div>
									</div>
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>
						</div>
					</div>

				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

					<div class="panel panel-default" style="margin-bottom:5px;">
						<div class="panel-header">
							<a role="button" data-toggle="collapse" data-parent="#panel-e001" href="#collapse-e001" aria-expanded="true" aria-controls="collapse-e001" class="btn-block">
								الصندوق
							</a>	
						</div>
						<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-e001">
							<fieldset style="display:none;">
								<legend>بيان اجماليات الصندوق ليوم واحد</legend>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">التاريخ</span>
										<input type="date" class="form-control" name="from" />
									</div>
								</div>
								<button type="submit" class="btn btn-default btn-block" name="btn_prints">
									معاينة 
									<i class="glyphicon glyphicon-eye-open"></i>
								</button>
							</fieldset>
							<fieldset style="display:none;">
								<legend>بيان الصندوق التفصيلي ليوم واحد</legend>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">التاريخ</span>
										<input type="date" class="form-control" name="from" />
									</div>
								</div>
								<button type="submit" class="btn btn-default btn-block" name="btn_prints">
									معاينة 
									<i class="glyphicon glyphicon-eye-open"></i>
								</button>
							</fieldset>
							<fieldset style="display:none;">
								<legend>بيان الصندوق لفترة معينة</legend>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">من</span>
										<input type="date" class="form-control" name="from" />
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">الى</span>
										<input type="date" class="form-control" name="to" />
									</div>
								</div>
								<button type="submit" class="btn btn-default btn-block" name="btn_prints">
									معاينة 
									<i class="glyphicon glyphicon-eye-open"></i>
								</button>
							</fieldset>
						</div>
					</div>

					<div class="panel panel-default" style="margin-bottom:5px;">
						<div class="panel-header">
							<a role="button" data-toggle="collapse" data-parent="#panel-e002" href="#collapse-e002" aria-expanded="true" aria-controls="collapse-e002" class="btn-block">
								الضريبية
							</a>	
						</div>
						<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-e002">
							<fieldset style="display:none;">
								<legend>الاقرار الضريبي</legend>
								<form action="<?= WLink('sale/prints/6') ?>" method="post" target="_blank">
									<button type="submit" class="btn btn-default btn-block" name="btn_prints">
										معاينة	 
										<i class="glyphicon glyphicon-eye-open"></i>
									</button>
								</form>
							</fieldset>
						</div>
					</div>

					<div class="panel panel-default" style="margin-bottom:5px;">
						<div class="panel-header">
							<a role="button" data-toggle="collapse" data-parent="#panel-e003" href="#collapse-e003" aria-expanded="true" aria-controls="collapse-e003" class="btn-block">
								التقرير النهائي الشامل 
							</a>	
						</div>
						<div class="panel-body panel-collapse collapse out" role="tabpanel" id="collapse-e003">
							<fieldset style="display:none;">
								<legend>التقرير النهائي الشامل لفترة معينة</legend>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">من</span>
										<input type="date" class="form-control" name="from" />
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">الى</span>
										<input type="date" class="form-control" name="to" />
									</div>
								</div>
								<button type="submit" class="btn btn-default btn-block" name="btn_prints">
									معاينة 
									<i class="glyphicon glyphicon-eye-open"></i>
								</button>
							</fieldset>
						</div>
					</div>

				</div>
			</div>
		</div>

    </div>
</div>
<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('expense') ?>"><?= V($LTranslates, 'Expenses') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('expense/display/'.V($Cells, 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('expense') ?>" class="btn btn-default btn-block btn-control" role="button">
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
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Errors)){  ?>
					<div class="alert alert-danger" role="alert"><?= V($LTranslates, 'EDanger') ?></div>
				<?php } ?>
			</div>
		</div>
        
        <div class="panel panel-default">
            <div class="panel-body">
				<form action="<?= WLink('expense/edit/'.V($Cells, 'ID')) ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<input type="hidden" class="form-control" name="id" value="<?= V($Cells, 'ID') ?>" />
								<label for="code"><?= V($LTranslates,'Code') ?></label>
								<input type="text" class="form-control" name="code" value="<?= V($Cells, 'Code') ?>" disabled="disabled" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="name"><?= V($LTranslates,'Name') ?></label>
								<input type="text" class="form-control" name="name" value="<?= V($Cells, 'Name') ?>" required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="amount"><?= V($LTranslates,'Amount') ?></label>
								<input type="text" class="form-control" name="amount" value="<?= V($Cells, 'Amount') ?>" required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="at"><?= V($LTranslates,'AT') ?></label>
								<input type="text" class="form-control" name="at" value="<?= V($Cells, 'AT') ?>" required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="method"><?= V($LTranslates,'Method') ?></label>
								<select class="form-control" name="method" required="required" >
									<option value="" disabled="disabled"><?= V($LTranslates,'Method') ?></option>
									<?php if (isset($LMethods)){  ?>
										<?php foreach ($LMethods as $Method) { ?>
										<option value="<?= V($Method,'ID') ?>" <?= (V($Method,'ID') == V($Cells, 'Method', 'ID')) ? 'selected="selected"' : '' ?>>
											<?= V($Method,'Name'.LNG) ?>
										</option>
										<?php }  ?>
									<?php }  ?>
								</select>
							</div>
						</div>

						<?php if(isset($Cells['Employee']) and is_array($Cells['Employee'])){ ?>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="employee"><?= V($LTranslates,'Employee') ?></label>
								<select class="form-control" name="employee">
									<option value="" disabled="disabled"><?= V($LTranslates,'Employee') ?></option>
									<option value=""></option>
									<?php if (isset($LEmployees)){  ?>
										<?php foreach ($LEmployees as $Employee) { ?>
										<option value="<?= V($Employee,'ID') ?>" <?= (V($Employee,'ID') == V($Cells, 'Employee', 'ID')) ? 'selected="selected"' : '' ?>>
											<?= V($Employee,'Code') ?> - <?= V($Employee,'Firstname') ?> <?= V($Employee,'Lastname') ?>
										</option>
										<?php }  ?>
									<?php }  ?>
								</select>
							</div>
						</div>
						<?php }  ?>

						<?php if(isset($Cells['Marketer']) and is_array($Cells['Marketer'])){ ?>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="marketer"><?= V($LTranslates,'Marketer') ?></label>
								<select class="form-control" name="marketer">
									<option value="" disabled="disabled"><?= V($LTranslates,'Marketer') ?></option>
									<option value=""></option>
									<?php if (isset($LMarketers)){  ?>
										<?php foreach ($LMarketers as $Marketer) { ?>
										<option value="<?= V($Marketer,'ID') ?>" <?= (V($Marketer,'ID') == V($Cells, 'Marketer', 'ID')) ? 'selected="selected"' : '' ?>>
											<?= V($Marketer,'Code') ?> - <?= V($Marketer,'Name') ?>
										</option>
										<?php }  ?>
									<?php }  ?>
								</select>
							</div>
						</div>
						<?php }  ?>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="state"><?= V($LTranslates,'State') ?></label>
								<select class="form-control" name="state" required="required" >
									<option value="" disabled="disabled"><?= V($LTranslates,'State') ?></option>
									<?php if (isset($LStates)){  ?>
										<?php foreach ($LStates as $State) { ?>
										<option value="<?= V($State,'ID') ?>" <?= (V($State,'ID') == V($Cells, 'State', 'ID')) ? 'selected="selected"' : '' ?>>
											<?= V($State,'Name'.LNG) ?>
										</option>
										<?php }  ?>
									<?php }  ?>
								</select>
							</div>
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
                </form>
            </div>
        </div>
    </div>
</div>
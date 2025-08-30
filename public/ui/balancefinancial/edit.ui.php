<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('balance') ?>"><?= V($LTranslates, 'Balances') ?></a></li>
                    <li><a href="<?= WLink('balancefinancial') ?>"><?= V($LTranslates, 'BalanceFinancials') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('balancefinancial/display/'.V($Cells, 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('balancefinancial') ?>" class="btn btn-default btn-block btn-control" role="button">
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
				<form action="<?= WLink('balancefinancial/edit/'.V($Cells, 'ID')) ?>" method="post" enctype="multipart/form-data">
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
								<label for="name"><?= V($LTranslates,'Notes') ?></label>
								<input type="text" class="form-control" name="name" value="<?= V($Cells, 'Name') ?>" required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="employee"><?= V($LTranslates,'Employee') ?></label>
								<select class="form-control" name="employee" required="required">
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
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="amount"><?= V($LTranslates,'Amount') ?></label>
								<input type="text" class="form-control" name="amount" value="<?= V($Cells, 'Amount') ?>" required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
							<div class="form-group">
								<label for="method"><?= V($LTranslates,'Method') ?></label>
								<select class="form-control" name="method" required="required">
									<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Method') ?></option>
									<option value=""></option>
									<option value="B" <?= (V($Cells, 'Method') === 'B') ? 'selected="selected"' : '' ?>><?= V($LTranslates,'Bank') ?></option>
									<option value="C" <?= (V($Cells, 'Method') === 'C') ? 'selected="selected"' : '' ?>><?= V($LTranslates,'Cashbox') ?></option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="at"><?= V($LTranslates,'AT') ?></label>
								<input type="date" class="form-control" name="at" value="<?= V($Cells, 'AT') ?>" required="required" />
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
<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('balance') ?>"><?= V($LTranslates, 'Balances') ?></a></li>
                    <li><a href="<?= WLink('balancecustomer') ?>"><?= V($LTranslates, 'BalanceCustomers') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('balancecustomer/display/'.V($Cells, 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('balancecustomer') ?>" class="btn btn-default btn-block btn-control" role="button">
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
				<form action="<?= WLink('balancecustomer/edit/'.V($Cells, 'ID')) ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
							<div class="form-group">
								<input type="hidden" class="form-control" name="id" value="<?= V($Cells, 'ID') ?>" />
								<label for="code"><?= V($LTranslates,'Code') ?></label>
								<input type="text" class="form-control" name="code" value="<?= V($Cells, 'Code') ?>" disabled="disabled" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="customer"><?= V($LTranslates, 'Customer') ?></label>
								<select class="form-control" name="customer" required="required">
									<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Customer') ?></option>
									<?php if (isset($LCustomers)){  ?>
										<?php foreach ($LCustomers as $Customer) { ?>
										<option value="<?= V($Customer,'ID') ?>" <?= V($Cells, 'Customer', 'ID') === V($Customer,'ID') ? 'selected="selected"' : '' ?>><?= V($Customer,'Code') ?> : <?= V($Customer,'Companyname') ?> - <?= V($Customer,'Name') ?></option>
										<?php }  ?>
									<?php }  ?>
								</select>
							</div>
						</div> 
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
							<div class="form-group">
								<label for="amount"><?= V($LTranslates,'Amount') ?></label>
								<input type="text" class="form-control" name="amount" value="<?= V($Cells, 'Amount') ?>" required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
							<div class="form-group">
								<label for="at"><?= V($LTranslates,'AT') ?></label>
								<input type="text" class="form-control" name="at" value="<?= V($Cells, 'AT') ?>" required="required" />
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
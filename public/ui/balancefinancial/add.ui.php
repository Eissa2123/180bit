<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('balance') ?>"><?= V($LTranslates, 'Balances') ?></a></li>
                    <li><a href="<?= WLink('balancefinancial') ?>"><?= V($LTranslates, 'BalanceFinancials') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Add') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('balancefinancial') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Back') ?>  
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Success)){  ?>
					<div class="alert alert-success alert-add" role="alert"><?= V($LTranslates, 'ASuccess') ?></div>
				<?php } ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Errors)){  ?>
					<div class="alert alert-danger" role="alert"><?= V($LTranslates, 'ADanger') ?></div>
				<?php } ?>
			</div>
		</div>
		
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= WLink('balancefinancial/add') ?>" method="post" enctype="multipart/form-data">
					<div class="row"> 
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
							<div class="form-group">
								<label for="code"><?= V($LTranslates,'Code') ?></label>
								<input type="text" class="form-control" id="code" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="name"><?= V($LTranslates,'Notes') ?></label>
								<input type="text" class="form-control" id="name" name="name" value="<?= V($LPosts, 'Name') ?>" placeholder="<?= V($LTranslates,'Name') ?>" required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
							<div class="form-group">
								<label for="employee"><?= V($LTranslates,'Employee') ?></label>
								<select class="form-control" name="employee" required="required">
									<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Employee') ?></option>
									<option value=""></option>
									<?php if (isset($LEmployees)){  ?>
										<?php foreach ($LEmployees as $Employee) { ?>
										<option value="<?= V($Employee,'ID') ?>" <?= (V($LPosts, 'Employee') === V($Employee,'ID')) ? 'selected="selected"' : '' ?>><?= V($Employee,'Code') ?> : <?= V($Employee,'Firstname') ?> <?= V($Employee,'Lastname') ?></option>
										<?php }  ?>
									<?php }  ?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
							<div class="form-group">
								<label for="amount"><?= V($LTranslates,'Amount') ?></label>
								<input type="number" min="0" step="0.01" class="form-control" id="amount" name="amount" value="<?= V($LPosts, 'Ratio') ?>" placeholder="<?= V($LTranslates,'Amount') ?>" required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
							<div class="form-group">
								<label for="method"><?= V($LTranslates,'Method') ?></label>
								<select class="form-control" name="method" required="required">
									<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Method') ?></option>
									<option value=""></option>
									<option value="B" <?= (V($LPosts, 'Method') === 'B') ? 'selected="selected"' : '' ?>><?= V($LTranslates,'Bank') ?></option>
									<option value="C" <?= (V($LPosts, 'Method') === 'C') ? 'selected="selected"' : '' ?>><?= V($LTranslates,'Cashbox') ?></option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
							<div class="form-group">
								<label for="at"><?= V($LTranslates,'AT') ?></label>
								<input type="date" class="form-control" id="at" name="at" value="<?= V($LPosts, 'AT') != "" ? V($LPosts, 'AT') : DT ?>" placeholder="<?= V($LTranslates,'AT') ?>" />
							</div>
						</div>
					</div>
					<hr />
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block" name="btn_add">
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
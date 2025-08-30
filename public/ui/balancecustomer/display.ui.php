<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('balance') ?>"><?= V($LTranslates, 'Balances') ?></a></li>
                    <li><a href="<?= WLink('balancecustomer') ?>"><?= V($LTranslates, 'BalanceCustomers') ?></a></li>
                    <li class="active"><?= V($Cells, 'ID') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <a href="<?= WLink('balancecustomer') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Back') ?>   
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
					<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">        
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Code') ?> : </strong></label>
									<label><?= V($Cells,'Code') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Customer') ?> : </strong></label>
									<label><?= V($Cells,'Customer', 'Companyname') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Amount') ?> : </strong></label>
									<label><?= V($Cells,'Amount') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'AT') ?> : </strong></label>
									<label><?= V($Cells,'AT') ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr />
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-sm-offset-2 col-md-offset-3 col-lg-offset-4">
                        <div class="form-group">
                            <a href="<?= WLink('balancecustomer/edit/'.V($Cells,'ID')) ?>" class="btn btn-warning btn-block" role="button">
                                <?= V($LTranslates,'Edit') ?>  
                                <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="form-group">
                            <a href="<?= WLink('balancecustomer/remove/'.V($Cells,'ID')) ?>" class="btn btn-danger btn-block" role="button">  
                                <?= V($LTranslates,'Remove') ?>  
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
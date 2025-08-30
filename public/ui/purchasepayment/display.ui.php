<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('purchase') ?>"><?= V($LTranslates, 'Purchases') ?></a></li>
                    <li><a href="<?= WLink('purchase/display/'.V($Cells, 'Facture', 'ID')) ?>"><?= V($Cells, 'Facture', 'ID') ?></a></li>
                    <li><a href="<?= WLink('purchasepayment/'.V($Cells, 'Facture', 'ID')) ?>"><?= V($LTranslates, 'Payments') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Display') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <a href="<?= WLink('purchasepayment/'.V($Cells, 'Facture', 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'List') ?>   
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
                            <label><strong><?= V($LTranslates,'Code') ?> : </strong></label>
                            <label><?= V($Cells,'Code') ?></label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
                            <label><strong><?= V($LTranslates,'Facture') ?> : </strong></label>
                            <label><?= V($Cells, 'Facture', 'Code') ?></label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label><strong><?= V($LTranslates,'Amount') ?> : </strong></strong></label>
							<label><?= V($Cells, 'Amount') ?> <?= V($LTranslates, 'Currency') ?></label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label><strong><?= V($LTranslates,'Method') ?> : </strong></strong></label>
							<label><?= V($Cells, 'Method', 'Code') ?> - <?= V($Cells, 'Method', 'Name'.LNG) ?></label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label><strong><?= V($LTranslates,'AT') ?> : </strong></strong></label>
							<label><?= V($Cells, 'AT') ?></label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label><strong><?= V($LTranslates,'State') ?> : </strong></label>
                            <label class="label label-<?= V($Cells,'State','Class') ?>"><?= V($Cells,'State','Name'.LNG) ?></label>
						</div>
					</div>
				</div>
                <?php /*
				<hr />
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 col-sm-offset-2 col-md-offset-3 col-lg-offset-4">
                        <div class="form-group">
                            <a href="<?= WLink('purchasepayment/edit/'.V($Cells,'ID')) ?>" class="btn btn-warning btn-block" role="button">
                                <?= V($LTranslates,'Edit') ?>  
                                <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <div class="form-group">
                            <a href="<?= WLink('purchasepayment/remove/'.V($Cells,'ID')) ?>" class="btn btn-danger btn-block" role="button">  
                                <?= V($LTranslates,'Remove') ?>  
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </div>
                    </div>
                </div>
                */ ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('sale') ?>"><?= V($LTranslates, 'Sales') ?></a></li>
                    <li><a href="<?= WLink('sale/display/'.V($Cells, 'Facture', 'ID')) ?>"><?= V($Cells, 'Facture', 'ID') ?></a></li>
                    <li><a href="<?= WLink('salepayment/'.V($Cells, 'Facture', 'ID')) ?>"><?= V($LTranslates, 'Payments') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Display') ?></li>
                </ol>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WEB ?>salepayment/display/<?= V($Cells, 'ID') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('salepayment/'.V($Cells, 'Facture', 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates,'List') ?>  
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Success)){  ?>
					<div class="alert alert-success" role="alert"><?= V($LTranslates, 'RSuccess') ?></div>
				<?php } ?>
				<?php if(isset($Errors)) { ?>
					<div class="alert alert-danger" role="alert"><?= V($LTranslates, 'RDanger') ?></div>
				<?php } ?>
			</div>
		</div>
		
        <div class="panel panel-default">
            <div class="panel-body">
                <?php if(isset($Cells) and V($Cells, 'ISD') == '0'){ ?>
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
				<hr />
				<p class="text-center"><?= V($LTranslates,'Confirmation') ?></p> 
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 col-sm-offset-2 col-md-offset-3 col-lg-offset-4">
                        <div class="form-group">
                            <form action="<?= WEB ?>salepayment/remove/<?= V($Cells,'ID') ?>" method="post">
                                <input type="hidden" name="id" value="<?= V($Cells,'ID') ?>" />
                                <button type="submit" class="btn btn-danger btn-block" name="btn_remove">
                                    <?= V($LTranslates, 'Confirm') ?>
                                    <i class="glyphicon glyphicon-hand-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <div class="form-group">
                            <a href="<?= WEB ?>salepayment/display/<?= V($Cells,'ID') ?>" class="btn btn-warning btn-block" role="button">  
                                <?= V($LTranslates, 'Cancel') ?>
                                <i class="glyphicon glyphicon-thumbs-down"></i> 
                            </a>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
						<a href="<?= WLink('salepayment/'.V($Cells, 'Facture', 'ID')) ?>" class="btn btn-primary btn-block" role="button"> 
							<i class="glyphicon glyphicon-home"></i>  
							<?= V($LTranslates, 'Payment') ?> 
							<i class="glyphicon glyphicon-home"></i>  
						</a>
					</div>
				</div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('provider') ?>"><?= V($LTranslates, 'Providers') ?></a></li>
                    <li class="active"><?= V($Cells, 'ID') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <a href="<?= WLink('provider') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Back') ?>   
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
					<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
						<div class="form-group">
							<img src="<?= V($Cells,'Picture') ?>" class="thumbnail img-circle avatar-4" id="img-picture">
						</div>
					</div>
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
									<label><strong><?= V($LTranslates,'RC') ?> : </strong></label>
									<label><?= V($Cells,'RC') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Taxnumber') ?> : </strong></label>
									<label><?= V($Cells,'Taxnumber') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Companyname') ?> : </strong></label>
									<label><?= V($Cells,'Companyname') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Type') ?> : </strong></label>
									<label><?= V($Cells,'Type', 'Name'.LNG) ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Country') ?> : </strong></label>
									<label><?= V($Cells,'Country') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'City') ?> : </strong></label>
									<label><?= V($Cells,'City') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Address') ?> : </strong></label>
									<label><?= V($Cells,'Address') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Email') ?> : </strong></label>
									<label><?= V($Cells,'Email') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Phonenumber') ?> : </strong></label>
									<label><?= V($Cells,'Phonenumber') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label><strong><?= V($LTranslates, 'Categories') ?> : </strong></label>
								<?php if(L($Cells, 'LCategories')){ ?> 
									<?php foreach($Cells['LCategories'] as $Category){ ?> 
										<?php if(I($Category, 'ID', $Cells, 'Categories')){ ?>
											<label class="label label-gray"><?= V($Category, 'Name') ?></label>
										<?php } ?>
									<?php } ?>
								<?php } ?>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'State') ?> : </strong></label>
									<label class="label label-<?= V($Cells, 'State', 'Class') ?>"><?= V($Cells, 'State', 'Name'.LNG) ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr />
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-sm-offset-2 col-md-offset-3 col-lg-offset-4">
                        <div class="form-group">
                            <a href="<?= WLink('provider/edit/'.V($Cells,'ID')) ?>" class="btn btn-warning btn-block" role="button">
                                <?= V($LTranslates,'Edit') ?>  
                                <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="form-group">
                            <a href="<?= WLink('provider/remove/'.V($Cells,'ID')) ?>" class="btn btn-danger btn-block" role="button">  
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
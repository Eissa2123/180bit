<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('employee') ?>"><?= V($LTranslates, 'Employee') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Remove') ?></li>
                </ol>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('employee/display/'.V($Cells, 'ID') ) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('employee') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates,'List') ?>  
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Success)){  ?>
					<div class="alert alert-success alert-remove" role="alert"><?= V($LTranslates, 'RSuccess') ?></div>
				<?php } ?>
				<?php if(isset($Errors)) { ?>
					<div class="alert alert-danger alert-remove" role="alert"><?= V($LTranslates, 'RDanger') ?></div>
				<?php } ?>
			</div>
		</div>
		
        <div class="panel panel-default">
            <div class="panel-body">
                <?php if(isset($Cells)){ ?>
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
									<label><strong><?= V($LTranslates,'NCID') ?> : </strong></label>
									<label><?= V($Cells,'NCID') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Firstname') ?> <?= V($LTranslates,'AND') ?> <?= V($LTranslates,'Lastname') ?> : </strong></label>
									<label><?= V($Cells,'Firstname') ?> <?= V($Cells,'Lastname') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Gender') ?> : </strong></label>
									<label><?= V($Cells,'Gender', 'Name'.LNG) ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'SBilive') ?> : </strong></label>
									<label><?= V($Cells,'SBilive') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'EBilive') ?> : </strong></label>
									<label><?= V($Cells,'EBilive') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'SWork') ?> : </strong></label>
									<label><?= V($Cells,'SWork') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'EWork') ?> : </strong></label>
									<label><?= V($Cells,'EWork') ?></label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Username') ?> : </strong></label>
									<label><?= V($Cells,'Username') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Password') ?> : </strong></label>
									<label class="label label-primary"><?= V($Cells,'Password') ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Job') ?> : </strong></label>
									<label><?= V($Cells,'Job', 'Name'.LNG) ?></label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label><strong><?= V($LTranslates,'Country') ?> : </strong></label>
									<label><?= V($Cells,'Country', 'Name') ?></label>
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
						</div>
						<div class="row">
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
                            <form action="<?= WEB ?>employee/remove/<?= V($Cells,'ID') ?>" method="post">
                                <input type="hidden" name="id" value="<?= V($Cells,'ID') ?>" />
                                <button type="submit" class="btn btn-danger btn-block" name="btn_remove">
                                    <?= V($LTranslates, 'Confirm') ?>
                                    <i class="glyphicon glyphicon-hand-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="form-group">
                            <a href="<?= WLink('employee/display/'.V($Cells,'ID')) ?>" class="btn btn-warning btn-block" role="button">  
                                <?= V($LTranslates, 'Cancel') ?>
                                <i class="glyphicon glyphicon-thumbs-down"></i> 
                            </a>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
                        <a href="<?= WLink('employee') ?>" class="btn btn-primary btn-block" role="button"> 
                            <i class="glyphicon glyphicon-home"></i>  
                            <?= V($LTranslates, 'Employee') ?> 
                            <i class="glyphicon glyphicon-home"></i>  
                        </a>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
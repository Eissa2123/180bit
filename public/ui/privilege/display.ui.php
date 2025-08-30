<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('privilege') ?>"><?= V($LTranslates, 'Privilege') ?></a></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <a href="<?= WLink('privilege') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'List') ?>   
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
        <div class="panel panel-default table-borderd">
            <div class="panel-body">  
				<div class="row">
					<div class="col-xs-12 col-sm-2 col-md-1 col-lg-1">
						<div class="form-group">
                            <label><strong><?= V($LTranslates,'Code') ?> : </strong></label>
                            <label><?= V($Cells,'Code') ?></label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<div class="form-group">
							<label><strong><?= V($LTranslates,'NameAR') ?> : </strong></label>
                            <label><?= V($Cells,'NameAR') ?></label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<div class="form-group">
							<label><strong><?= V($LTranslates,'NameEN') ?> : </strong></label>
                            <label><?= V($Cells,'NameEN') ?></label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<div class="form-group">
							<label><strong><?= V($LTranslates,'NameFR') ?> : </strong></label>
                            <label><?= V($Cells,'NameFR') ?></label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
						<div class="form-group">
							<label><strong><?= V($LTranslates,'State') ?> : </strong></label>
                            <label class="label label-<?= V($Cells,'State','Class') ?>"><?= V($Cells,'State','Name'.LNG) ?></label>
						</div>
					</div>
				</div>
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <div class="form-group">
                                <label><?= V($LTranslates, 'Privileges') ?></label>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-list"></i> <?= V($LTranslates,'Browses') ?></th>
                                            <th class="text-center">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($Cells['Browse'] as $Cell){ ?>
                                        <tr>
                                            <td><?= V($Cell, 'Name'.LNG) ?></td>
                                            <td class="text-center">
												<label class="label label-<?= V($Cell, 'State', 'Class') ?>"><?= V($Cell, 'State', 'Name'.LNG) ?></label>
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-search"></i> <?= V($LTranslates,'Searchs') ?></th>
                                            <th class="text-center">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($Cells['Search'] as $Cell){ ?>
                                        <tr>
                                            <td><?= V($Cell, 'Name'.LNG) ?></td>
                                            <td class="text-center">
												<label class="label label-<?= V($Cell, 'State', 'Class') ?>"><?= V($Cell, 'State', 'Name'.LNG) ?></label>
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-eye-open"></i> <?= V($LTranslates,'Detail') ?></th>
                                            <th class="text-center">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($Cells['Display'] as $Cell){ ?>
                                        <tr>
                                            <td><?= V($Cell, 'Name'.LNG) ?></td>
                                            <td class="text-center">
												<label class="label label-<?= V($Cell, 'State', 'Class') ?>"><?= V($Cell, 'State', 'Name'.LNG) ?></label>
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-plus"></i> <?= V($LTranslates,'Adds') ?></th>
                                            <th class="text-center">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($Cells['Add'] as $Cell){ ?>
                                        <tr>
                                            <td><?= V($Cell, 'Name'.LNG) ?></td>
                                            <td class="text-center">
												<label class="label label-<?= V($Cell, 'State', 'Class') ?>"><?= V($Cell, 'State', 'Name'.LNG) ?></label>
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-edit"></i> <?= V($LTranslates,'Edits') ?></th>
                                            <th class="text-center">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($Cells['Edit'] as $Cell){ ?>
                                        <tr>
                                            <td><?= V($Cell, 'Name'.LNG) ?></td>
                                            <td class="text-center">
												<label class="label label-<?= V($Cell, 'State', 'Class') ?>"><?= V($Cell, 'State', 'Name'.LNG) ?></label>
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-remove"></i> <?= V($LTranslates,'Removes') ?></th>
                                            <th class="text-center">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($Cells['Remove'] as $Cell){ ?>
                                        <tr>
                                            <td><?= V($Cell, 'Name'.LNG) ?></td>
                                            <td class="text-center">
												<label class="label label-<?= V($Cell, 'State', 'Class') ?>"><?= V($Cell, 'State', 'Name'.LNG) ?></label>
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
					
					</div>
				<hr />
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 col-sm-offset-2 col-md-offset-3 col-lg-offset-4">
                        <div class="form-group">
                            <a href="<?= WLink('privilege/edit/'.V($Cells,'ID')) ?>" class="btn btn-warning btn-block" role="button">
                                <?= V($LTranslates,'Edit') ?>  
                                <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <div class="form-group">
                            <a href="<?= WLink('privilege/remove/'.V($Cells,'ID')) ?>" class="btn btn-danger btn-block" role="button">  
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
<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('cobon') ?>"><?= V($LTranslates, 'Cobons') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('cobon/display/'.V($Cells, 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('cobon') ?>" class="btn btn-default btn-block btn-control" role="button">
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
				<form action="<?= WLink('cobon/edit/'.V($Cells, 'ID')) ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<input type="hidden" class="form-control" name="id" value="<?= V($Cells, 'ID') ?>" />
								<label for="code"><?= V($LTranslates,'Code') ?></label>
								<input type="text" class="form-control" name="code" value="<?= V($Cells, 'Code') ?>" disabled="disabled" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="name"><?= V($LTranslates,'Name') ?></label>
								<input type="text" class="form-control" name="name" value="<?= V($Cells, 'Name') ?>" required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="ratio"><?= V($LTranslates,'Ratio') ?></label>
								<input type="number" min="0" step="0.01" class="form-control" name="ratio" value="<?= V($Cells, 'Ratio') ?>"  required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="ratios"><?= V($LTranslates,'Ratios') ?></label>
								<input type="number" min="0" step="0.01" class="form-control" name="ratios" value="<?= V($Cells, 'Ratios') ?>"  required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="marketer"><?= V($LTranslates,'Marketer') ?></label>
								<select class="form-control" name="marketer" required="required" >
									<option value="" disabled="disabled"><?= V($LTranslates,'Marketer') ?></option>
									<?php if (isset($LMarketers)){  ?>
										<?php foreach ($LMarketers as $Marketer) { ?>
										<option value="<?= V($Marketer,'ID') ?>" <?= (V($Marketer,'ID') == V($Cells, 'Marketer', 'ID')) ? 'selected="selected"' : '' ?>>
											<?= V($Marketer,'Name') ?>
										</option>
										<?php }  ?>
									<?php }  ?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="state"><?= V($LTranslates,'State') ?></label>
								<select class="form-control" name="state" required="required">
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
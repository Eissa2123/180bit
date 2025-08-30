<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WEB ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('purchasequotation') ?>"><?= V($LTranslates, 'Purchasequotation') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Remove') ?></li>
                </ol>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WEB ?>salequotation/display/<?= V($Cells, 'ID') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WEB ?>salequotation" class="btn btn-default btn-block btn-control" role="button">
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
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<label><strong><?= V($LTranslates, 'Code') ?> : </strong></label>
						<label><?= V($Cells, 'Code') ?></label>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
						<label><strong><?= V($LTranslates, 'AT') ?> : </strong></label>
						<label><?= V($Cells, 'AT') ?></label>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
						<label><strong><?= V($LTranslates, 'State') ?>: </strong></label>
						<label class="label label-<?= V($Cells, 'State', 'Class') ?>"><?= V($Cells, 'State', 'Name'.LNG) ?></label>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
						<label><strong><?= V($LTranslates, 'Customer') ?> : </strong></label>
						<label><?= V($Cells, 'Customer', 'Code') ?> - <?= V($Cells, 'Customer', 'Companyname') ?> | <?= V($Cells, 'Customer', 'Name') ?> : <?= V($Cells, 'Customer', 'Job') ?></label>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php if (isset($Cells['Products'])){  ?>
							<table class="table table-bordered table-">
								<thead>
									<tr class="gray">
										<th class="text-center"><?= V($LTranslates, 'Code') ?></th>
										<th class="text-center" style="width:60%"><?= V($LTranslates, 'Name') ?></th>
										<th class="text-center"><?= V($LTranslates, 'Price') ?></th>
										<th class="text-center"><?= V($LTranslates, 'Quantity') ?></th>
										<th class="text-center"><?= V($LTranslates, 'Total') ?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($Cells['Products'] as $Product) { ?>
										<tr>
											<td class="text-center"><?= V($Product, 'Product', 'Code') ?></td>
											<td><?= V($Product, 'Product', 'Name') ?></td>
											<td><?= V($Product, 'Price') ?></td>
											<td class="text-center"><?= V($Product, 'Quantity') ?></td>
											<td><?= V($Product, 'HT') ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						<?php }else{ ?>
							<div class="alert alert-warning" role="alert"><?= V($LTranslates,'EResults') ?></div>
						<?php } ?>
					</div>
				</div>

				<br />

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label><strong><?= V($LTranslates, 'HT') ?> : </strong></label>
								<label><?= V($Cells, 'HT') ?> <?= V($LTranslates, 'Currency') ?></label>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label><strong><?= V($LTranslates, 'TVA') ?> : </strong></label>
								<label><?= V($Cells, 'TVA') ?> % | <?= V($Cells, 'Tax') ?> <?= V($LTranslates, 'Currency') ?></label>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label><strong><?= V($LTranslates, 'Cobon') ?> : </strong></label>
								<label><?= V($Cells, 'Cobon', 'Ratio') ?> % | <?= V($Cells, 'Gift') ?> <?= V($LTranslates, 'Currency') ?></label>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label><strong><?= V($LTranslates, 'Reduction') ?> : </strong></label>
								<label><?= V($Cells, 'Reduction') ?> <?= V($LTranslates, 'Currency') ?></label>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label><strong><?= V($LTranslates, 'Expense') ?> : </strong></label>
								<label><?= V($Cells, 'Expense') ?> <?= V($LTranslates, 'Currency') ?></label>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
								<table>
									<tbody>
										<tr>
											<td><h4><?= V($LTranslates, 'TTC') ?> : </h4></td>
											<td><h4><?= V($Cells, 'TTC') ?> <?= V($LTranslates, 'Currency') ?></h4></td>
										</tr>
										<tr>
											<td><h4><?= V($LTranslates, 'Paid') ?> : </h4></td>
											<td><h4><?= V($Cells, 'Paid') ?> <?= V($LTranslates, 'Currency') ?></h4></td>
										</tr>
										<tr>
											<td><h4><?= V($LTranslates, 'Rest') ?> : </h4></td>
											<td><h4><?= V($Cells, 'Rest') ?> <?= V($LTranslates, 'Currency') ?></h4></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<div class="row">
								<div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
									<label><strong><?= V($LTranslates, 'Notes') ?> : </strong></label>
								</div>
								<div class="col-xs-6 col-sm-9 col-md-9 col-lg-10">
									<label><?= V($Cells, 'Notes') ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label><strong><?= V($LTranslates, 'Terms') ?> : </strong></label>
						<?php if(L($Cells, 'LTerms')){ ?> 
							<?php foreach($Cells['LTerms'] as $Term){ ?> 
								<?php if(I($Term, 'ID', $Cells, 'Terms')){ ?>
									<label class="label label-gray"><?= V($Term, 'Name') ?></label>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</div>
				</div>

				<hr />
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-sm-offset-2 col-md-offset-3 col-lg-offset-4">
                        <div class="form-group">
                            <form action="<?= WEB ?>purchasequotation/remove/<?= V($Cells,'ID') ?>" method="post">
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
                            <a href="<?= WEB ?>purchasequotation/display/<?= V($Cells,'ID') ?>" class="btn btn-warning btn-block" role="button">  
                                <?= V($LTranslates, 'Cancel') ?>
                                <i class="glyphicon glyphicon-thumbs-down"></i> 
                            </a>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
                            <a href="<?= WEB ?>purchasequotation" class="btn btn-primary btn-block" role="button"> 
                                <i class="glyphicon glyphicon-home"></i>  
                                <?= V($LTranslates, 'Salequotations') ?> 
                                <i class="glyphicon glyphicon-home"></i>  
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
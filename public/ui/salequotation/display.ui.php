<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('salequotation') ?>"><?= V($LTranslates, 'Salequotations') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Display') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
				<a href="<?= WLink('salequotation/print/'.V($Cells, 'ID')) ?>" target="_blank" class="btn btn-info btn-block" role="button">  
					<?= V($LTranslates, 'Print') ?>
					<i class="glyphicon glyphicon-print"></i>
				</a>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <a href="<?= WLink('salequotation') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Back') ?>  
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
				
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
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="text-center" colspan="7"><?= V($LTranslates, 'Products') ?></th>
									</tr>
									<tr class="gray">
										<th class="text-center"><?= V($LTranslates, 'Code') ?></th>
										<th class="text-center" style="width:50%"><?= V($LTranslates, 'Name') ?></th>
										<th class="text-center"><?= V($LTranslates, 'Price') ?></th>
										<th class="text-center"><?= V($LTranslates, 'Quantity') ?></th>
										<th class="text-center"><?= V($LTranslates, 'TVA') ?></th>
										<th class="text-center"><?= V($LTranslates, 'Total') ?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($Cells['Products'] as $Product) { ?>
										<tr>
											<td class="text-center"><?= V($Product, 'Product', 'Code') ?></td>
											<td>
												<?= V($Product, 'Product', 'Name') ?><br />
												<label style="font-size:10px;"><?= V($Product, 'Description') ?></label>
											</td>
											<td class="text-left"><?= V($Product, 'Price') ?></td>
											<td class="text-center"><?= V($Product, 'Quantity') ?></td>
											<td class="text-left"><?= V($Product, 'Tax') ?></td>
											<td class="text-left"><?= V($Product, 'HT') ?></td>
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
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td><h4><?= V($LTranslates, 'TVA') ?> : </h4></td>
									<td><h4><?= V($Cells, 'TVA') ?> % | <?= V($Cells, 'Tax') ?> <?= V($LTranslates, 'Currency') ?></h4></td>
								</tr>
								<tr>
									<td><h4><?= V($LTranslates, 'Cobon') ?> : </h4></td>
									<td><h4><?= V($Cells, 'Cobon', 'Ratio') ?> % | <?= V($Cells, 'Gift') ?> <?= V($LTranslates, 'Currency') ?></h4></td>
								</tr>
								<tr>
									<td><h4><?= V($LTranslates, 'Reduction') ?> : </h4></td>
									<td><h4><?= V($Cells, 'Reduction') ?> <?= V($LTranslates, 'Currency') ?></h4></td>
								</tr>
								<tr>
									<td><h4><?= V($LTranslates, 'Expense') ?> : </h4></td>
									<td><h4><?= V($Cells, 'Expense') ?> <?= V($LTranslates, 'Currency') ?></h4></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-5">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td><h4><?= V($LTranslates, 'HT') ?> : </h4></td>
									<td><h4><?= V($Cells, 'HT') ?> <?= V($LTranslates, 'Currency') ?></h4></td>
								</tr>
								<tr>
									<td><h4><?= V($LTranslates, 'TTC') ?> : </h4></td>
									<td><h4><?= V($Cells, 'TTC') ?> <?= V($LTranslates, 'Currency') ?></h4></td>
								</tr>
							</tbody>
						</table>
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
				<?php /*
				<hr />

				<div class="row">
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-md-offset-3 col-lg-offset-4">
						<div class="form-group">
							<a href="<?= WLink('salequotation/edit/'.V($Cells, 'ID')) ?>" class="btn btn-warning btn-block" role="button">  
								<?= V($LTranslates, 'Edit') ?>
								<i class="glyphicon glyphicon-edit"></i>
							</a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
						<div class="form-group">
							<a href="<?= WLink('salequotation/remove/'.V($Cells, 'ID')) ?>" class="btn btn-danger btn-block" role="button">  
								<?= V($LTranslates, 'Remove') ?>
								<i class="glyphicon glyphicon-remove"></i>
							</a>
						</div>
					</div>
				</div>

				*/?>

            </div>
        </div>
    </div>
</div>
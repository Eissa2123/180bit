<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('balance') ?>"><?= V($LTranslates, 'Balances') ?></a></li>
                    <li><a href="<?= WLink('balanceproduct') ?>"><?= V($LTranslates, 'BalanceProducts') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('balanceproduct/display/'.V($Cells, 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('balanceproduct') ?>" class="btn btn-default btn-block btn-control" role="button">
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
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php if (isset($send['ESuccess'])){  ?>
                    <div class="alert alert-success" role="alert"><?= V($LTranslates, 'ESuccess') ?></div>
                <?php } ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php if (isset($CErrors)){  ?>
                    <div class="alert alert-danger" role="alert">
                        <label for=""><?= V($LTranslates,'Core') ?> :</label>
                        <?php foreach ($CErrors as $E) { ?>
                            <span class="label label-danger"><strong><?= V($LTranslates,$E) ?></strong></span> 
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php if (isset($MErrors['Empty']) or isset($MErrors['Exists'])){  ?>
                    <div class="alert alert-warning" role="alert">
                        <?php if (isset($MErrors['Empty'])) { ?>
                            <label for=""><?= V($LTranslates,'EEmpty') ?> :</label>
                            <?php foreach ($MErrors['Empty'] as $E) { ?>
                                <span class="label label-warning"><strong><?= V($LTranslates,$E) ?></strong></span> 
                            <?php } ?>
                        <?php } ?>
                        <?php if (isset($MErrors['Exists'])) { ?>
                            <label for=""><?= V($LTranslates,'EExists') ?> :</label>
                            <?php foreach ($MErrors['Exists'] as $E) { ?>
                                <span class="label label-warning"><strong><?= V($LTranslates,$E) ?></strong></span> 
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= WLink('balanceproduct/edit/'.V($Cells, 'ID')) ?>" method="post">  
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?= V($Cells, 'ID') ?>" />
                                <label for="cobon"><?= V($LTranslates, 'Product') ?></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><?= V($Cells, 'Product', 'Code') ?></span>
                                    <input type="text" class="form-control" name="name" value="<?= V($Cells, 'Product', 'Name') ?>" aria-label="Amount (to the nearest dollar)" readonly="readonly" >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="price"><?= V($LTranslates, 'Price') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="price" value="<?= V($Cells, 'Price') ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required" >
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="quantity"><?= V($LTranslates, 'Quantity') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="quantity" value="<?= V($Cells, 'Quantity') ?>" min="1" step="1" required="required" >
                                </div>
                            </div>
                        </div>
                        <?php /*<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="state"><?= V($LTranslates,'State') ?></label>
                                <select class="form-control" name="state" required="required">
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'State') ?></option>
                                    <?php if (isset($LStates)){  ?>
                                        <?php foreach ($LStates as $State) { ?>
                                            <option value="<?= V($State,'ID') ?>" <?= (V($State,'ID') == V($Cells, 'State', 'ID')) ? 'selected="selected"' : '' ?>>
                                                <?= V($State,'Name'.LNG) ?>
                                            </option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>*/ ?>
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
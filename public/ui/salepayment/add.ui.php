<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('sale') ?>"><?= V($LTranslates, 'Sales') ?></a></li>
                    <li><a href="<?= WLink('sale/display/'.V($LPosts, 'Sale')) ?>"><?= V($LPosts, 'Sale') ?></a></li>
                    <li><a href="<?= WLink('salepayment/'.V($LPosts, 'Sale')) ?>"><?= V($LTranslates, 'Payments') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Add') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('salepayment/'.V($LPosts, 'Sale')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'List') ?> 
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Success)){  ?>
					<div class="alert alert-success alert-addx" role="alert"><?= V($LTranslates, 'ASuccess') ?></div>
				<?php } ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Errors)){  ?>
					<div class="alert alert-danger alert-addx" role="alert"><?= V($LTranslates, 'ADanger') ?></div>
				<?php } ?>
			</div>
		</div>
		
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= WLink('salepayment/add/'.V($LPosts, 'Sale')) ?>" method="post">  
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="sale" value="<?= V($LPosts, 'Sale') ?>" />
                                <label for="code"><?= V($LTranslates,'Code') ?></label>
                                <input type="text" class="form-control" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label><?= V($LTranslates,'Sale') ?></label>
                                <input type="text" class="form-control" value="<?= V($Cells, 'Code') ?>" readonly="readonly" />
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="customer"><?= V($LTranslates, 'Customer') ?></label>
                                <select class="form-control" name="customer" required="required">
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Customer') ?></option>
                                    <option value=""></option>
                                    <?php if (isset($LCustomers)){  ?>
                                        <?php foreach ($LCustomers as $Customer) { ?>
                                        <option value="<?= V($Customer,'ID') ?>" <?= (V($Cells,'Customer') == V($Customer,'ID')) ? 'selected="selected"' : '' ?>><?= V($Customer,'Code') ?> - <?= V($Customer,'Companyname') ?> <?= V($Customer,'Name') ?> : <?= V($Customer,'Job') ?></option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="type"><?= V($LTranslates,'Receipt') ?></label>
                                <select class="form-control" name="type" required="required">
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Receipt') ?></option>
                                        
                                    <option value="-1" <?= (V($LPosts,'Type') == '-1') ? 'selected="selected"' : '' ?>>
                                        <?= V($LTranslates,'ReceiptOUT') ?>
                                    </option>
                                    
                                    <option value="1" <?= (V($LPosts,'Type') == '1') ? 'selected="selected"' : '' ?>>
                                        <?= V($LTranslates,'ReceiptIN') ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="amount"><?= V($LTranslates,'Amount') ?></label>
                                <div class="input-group">
									<input type="number" class="form-control" name="amount" value="<?= V($LPosts, 'Amount') !== '' ? V($LPosts, 'Amount') : V($Cells, 'Rest')  ?>" min="0.00" step="0.01" required="required" />
                                    <span class="input-group-addon" id='number-amount'><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="at"><?= V($LTranslates,'AT') ?></label>
                                <input type="date" class="form-control" name="at" value="<?= V($LPosts, 'AT') != "" ? V($LPosts, 'AT') : DT ?>" required="required" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="code"><?= V($LTranslates,'Method') ?></label>
                                <select class="form-control" name="method" required="required">
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Method') ?></option>
									<?php if (isset($LMethods)){  ?>
                                        <?php foreach ($LMethods as $Method) { ?>
                                        <option value="<?= V($Method,'ID') ?>" <?= (V($LPosts,'Method') == V($Method,'ID')) ? 'selected="selected"' : '' ?>>
											<?= V($Method,'Code') ?> - <?= V($Method,'Name'.LNG) ?>
										</option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="code"><?= V($LTranslates,'State') ?></label>
                                <select class="form-control" name="state" required="required">
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'State') ?></option>
									<?php if (isset($LStates)){  ?>
                                        <?php foreach ($LStates as $State) { ?>
                                        <option value="<?= V($State,'ID') ?>" <?= (V($LPosts,'State') == V($State,'ID')) ? 'selected="selected"' : '' ?>>
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
                                <button type="submit" class="btn btn-success btn-block" name="btn_add">
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
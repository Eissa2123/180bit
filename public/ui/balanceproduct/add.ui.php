<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('balance') ?>"><?= V($LTranslates, 'Balances') ?></a></li>
                    <li><a href="<?= WLink('balanceproduct') ?>"><?= V($LTranslates, 'BalanceProducts') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Add') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('balanceproduct') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Back') ?> 
                    <i class="glyphicon glyphicon-repeat"></i> 
                </a>
            </div>
        </div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Success)){  ?>
					<div class="alert alert-success alert-add" role="alert"><?= V($LTranslates, 'ASuccess') ?></div>
				<?php } ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Errors)){  ?>
					<div class="alert alert-danger" role="alert"><?= V($LTranslates, 'ADanger') ?></div> 
				<?php } ?>
			</div>
		</div>
		
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= WLink('balanceproduct/add') ?>" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="form-group">
                                <label for="cobon"><?= V($LTranslates, 'Products') ?></label>
                                <select class="form-control multiselect" id="multiselect-products" name="product" data-multiple-name="<?= V($LTranslates,'Product') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                    <option value="">&nbsp;</option>
                                    <?php if (isset($LProducts)){  ?>
                                        <?php foreach ($LProducts as $Product) { ?>
                                        <option value="<?= V($Product,'ID') ?>" data-id="<?= V($Product,'ID') ?>"  data-code="<?= V($Product,'Code') ?>" data-name="<?= V($Product,'Name') ?>" data-price="<?= V($Product,'Price') ?>" data-Category="<?= V($Product,'Category', 'ID') ?>">
                                            <?= V($Product,'Category', 'Name') ?> : <?= V($Product,'Name') ?>
                                        </option>
                                        <?php }  ?>
                                    <?php }  ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="price"><?= V($LTranslates, 'Price') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="price" value="" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required" >
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="quantity"><?= V($LTranslates, 'Quantity') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="quantity" value="" min="1" step="1" required="required" >
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
                                        <option value="<?= V($State,'ID') ?>" <?= (V($LPosts, 'State') === V($State,'ID')) ? 'selected="selected"' : '' ?>><?= V($State,'Name'.LNG) ?></option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div> */ ?>
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

<script type="text/javascript">
    $(document).ready(function(){

        /*$('body').on('change', '#multiselect-products', function(){
            var $product = $("#multiselect-products :selected").first();

            $("input[name='Product']").val($product.data('id'));
            $("input[name='name']").val($product.data('name'));
            $("input[name='price']").val($product.data('price'));
        });*/

    });
</script>
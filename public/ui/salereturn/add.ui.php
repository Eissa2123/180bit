<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('sale') ?>"><?= V($LTranslates, 'Sales') ?></a></li>
                    <li><a href="<?= WLink('salereturn/'.V($LPosts, 'Facture')) ?>"><?= V($LPosts, 'Facture') ?></a></li>
                    <li><a href="<?= WLink('salereturn/'.V($LPosts, 'Facture')) ?>"><?= V($LTranslates, 'Returns') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Add') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('salereturn/'.V($LPosts, 'Facture')) ?>" class="btn btn-default btn-block btn-control" role="button">
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
                <form action="<?= WLink('salereturn/add/'.V($LPosts, 'Facture')) ?>" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="code"><?= V($LTranslates, 'Code') ?></label>
                                <input type="hidden" name="facture" value="<?= V($LPosts, 'Facture') ?>" />
                                <input type="text" class="form-control" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="at"><?= V($LTranslates, 'AT') ?></label>
                                <input type="date" class="form-control" name="at" value="<?= V($LPosts, 'AT') != "" ? V($LPosts, 'AT') : DT ?>"  required="required" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""><?= V($LTranslates, '') ?></label>
                            <div class="row articals">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="gray">
                                                <th class="text-center" colspan="7"><?= V($LTranslates, 'Products') ?></th>
                                            </tr>
                                            <tr>
                                                <th class="text-center"><?= V($LTranslates, 'Code') ?></th>
                                                <th class="text-center" style="width:50%"><?= V($LTranslates, 'Name') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'Price') ?></th>
                                                <th class="text-center" style="width:10%"><?= V($LTranslates, 'Quantity') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'TVA') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'Total') ?></th>
                                                <th class="text-center action-1">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (L($Cells, 'Products') or L($LPosts, 'Products')){ ?>
                                                <?php foreach (J($Cells, $LPosts, 'Products') as $KProduct => $VProduct) { ?>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="products[<?= $KProduct ?>][id]" value="<?= V($VProduct, 'ID') ?>" >

                                                            <input type="hidden" class="form-control" name="products[<?= $KProduct ?>][ref]" value="<?= V($VProduct, 'REF') ?>" >

                                                            <input type="text" class="form-control text-center" name="products[<?= $KProduct ?>][code]" value="<?= V($VProduct, 'Code') ?>" readonly="readonly">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="products[<?= $KProduct ?>][name]" value="<?= V($VProduct, 'Name') ?>" readonly="readonly">
                                                            <span style="font-size:10px;"><?= V($VProduct, 'Description') ?></span>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <?php //<span class="input-group-addon span-plus">+</span> ?>
                                                                <input type="number" class="form-control text-center input-price" name="products[<?= $KProduct ?>][price]" value="<?= V($VProduct, 'Price') ?>" min="0.00" step="0.01" required="required" readonly="readonly" />
                                                                <?php //<span class="input-group-addon span-minus">-</span> ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon span-plus">+</span>
                                                                <input type="number" class="form-control text-center input-quantity" name="products[<?= $KProduct ?>][quantity]" value="<?= V($VProduct, 'Quantity') ?>" min="1" max="<?= V($VProduct, 'Quantity') ?>" step="1" required="required">
                                                                <span class="input-group-addon span-minus">-</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control text-center input-tax" name="products[<?= $KProduct ?>][tax]" value="<?= V($VProduct, 'Tax') ?>" readonly="readonly">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control text-center input-ht" name="products[<?= $KProduct ?>][ht]" value="<?= V($VProduct, 'HT') ?>" readonly="readonly">
                                                        </td>
                                                        <td class="text-center action-1" style="vertical-align:middle;">
                                                            <a class="text-center action-1" style="vertical-align:middle;">
                                                                <span class="glyphicon glyphicon-trash span-delete"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <br />
                        
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="tva"><?= V($LTranslates, 'TVA') ?></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tva" value="<?= V($Cells, 'TVA') ? V($Cells, 'TVA') : '0.00' ?>" readonly="readonly" />
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="tax"><?= V($LTranslates, 'Tax') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="tax" value="<?= V($LPosts, 'Tax') ? V($LPosts, 'Tax') : '0.00' ?>" readonly="readonly">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="cobon"><?= V($LTranslates, 'Cobon') ?></label>
                                <div class="input-group">
                                    <select class="form-control" name="cobon" readonly="readonly">
                                        <?php if (isset($LCobons)){ ?>
                                            <?php foreach ($LCobons as $Cobon) { ?>
                                            <option value="<?= V($Cobon,'ID') ?>" <?= (V($Cells, 'Cobon', 'ID') == V($Cobon,'ID')) ? 'selected="selected"' : '' ?> data-ratio="<?= V($Cobon,'Ratio') ?>"><?= V($Cobon,'Name') ?></option>
                                            <?php }  ?>
                                        <?php }  ?>
                                    </select>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="gift"><?= V($LTranslates, 'Gift') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="gift" value="<?= V($Cells, 'Gift') ? V($LTranslates,'Gift') : '0.00' ?>" readonly="readonly">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="reduction"><?= V($LTranslates, 'Reduction') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="reduction" value="<?= V($LPosts, 'Reduction') ? V($LPosts,'Reduction') : '0.00' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="expense"><?= V($LTranslates, 'Expense') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="expense" value="<?= V($LPosts, 'Expense') ? V($LPosts,'Expense') : '0.00' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="ht"><?= V($LTranslates, 'HT') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="ht" value="<?= V($LPosts, 'HT') ? V($LPosts,'HT') : '0.00' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="ttc"><?= V($LTranslates, 'TTC') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="ttc" value="<?= V($LPosts, 'TTC') ? V($LPosts,'TTC') : '0.00' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="notes"><?= V($LTranslates, 'Notes') ?></label>
                                <input type="text" class="form-control" name="notes" value="<?= V($LPosts, 'Notes') ?>" placeholder="<?= V($LTranslates,'Notes') ?>" />
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

<script type="text/javascript">
    $(document).ready(function(){

        $('body').on('change', 'input[name="tva"]', function() {
            recalcule_rows();
        });

        $('body').on('change', 'select[name="cobon"]', function() {
            recalcule_rows();
        });

        $('body').on('change', 'input[name="reduction"]', function() {
            recalcule_rows();
        });

        $('body').on('change', 'input[name="expense"]', function() {
            recalcule_rows();
        });

        $('body').on('click', 'span.span-plus', function() {
            var input = $(this).parent().find("input[type='number']");
            if(input.val() == input.attr("max")){
                return;
            }
            input[0].stepUp();
            input.val(input.val());

            var price = parseFloat($(this).parent().parent().parent().find("input.input-price").val()).toFixed(3);
            var quantity = parseFloat($(this).parent().parent().parent().find("input.input-quantity").val()).toFixed(3);
            
            var ht = $(this).parent().parent().parent().find("input.input-ht");
            ht.val((quantity * price).toFixed(3));
            
            recalcule_rows();
        });

        $('body').on('click', 'span.span-minus', function() {
            var input = $(this).parent().find("input[type='number']");
            input[0].stepDown();
            input.val(input.val());
            
            var price = parseFloat($(this).parent().parent().parent().find("input.input-price").val()).toFixed(3);
            var quantity = parseFloat($(this).parent().parent().parent().find("input.input-quantity").val()).toFixed(3);
            
            var ht = $(this).parent().parent().parent().find("input.input-ht");
            ht.val((quantity * price).toFixed(3));
            
            recalcule_rows();
        });

        $('tbody').on('change', 'input.input-price', function() {
            var price = parseFloat($(this).parent().parent().parent().find("input.input-price").val()).toFixed(3);
            var quantity = parseFloat($(this).parent().parent().parent().find("input.input-quantity").val()).toFixed(3);
            
            var ht = $(this).parent().parent().parent().find("input.input-ht");
            ht.val((quantity * price).toFixed(3));

            recalcule_rows();
        });

        $('tbody').on('change', 'input.input-quantity', function() {
            var price = parseFloat($(this).parent().parent().parent().find("input.input-price").val()).toFixed(2);
            var quantity = parseFloat($(this).parent().parent().parent().find("input.input-quantity").val()).toFixed(2);
            
            var ht = $(this).parent().parent().parent().find("input.input-ht");
            ht.val((quantity * price).toFixed(2));

            recalcule_rows();
        });

        $('tbody').on('click', 'span.span-delete', function() {
            var p = $(this).parent().parent().parent().remove();
            recalcule_rows();
        });

        function recalcule_rows(){

            recalcule_rows_tva();
            
            var tax = 0.0;
            $(".input-tax").each(function(){
                tax += parseFloat($(this).val());
            });

            console.log("tax :" + tax);

            var ht = 0.0;
            $(".input-ht").each(function(){
                ht += parseFloat($(this).val());
            });
            console.log("ht :" + ht);
            ht = ht - tax;
            console.log("ht :" + ht);

            var tva = parseFloat($("input[name='tva']").val());
            var tax = ht * tva / 100;
            
            var reduction = parseFloat($("input[name='reduction']").val());
            var expense = parseFloat($("input[name='expense']").val());

            var cobon = $("select[name='cobon']").val();
            var ratio = parseFloat($("select[name='cobon'] option[value='" + cobon + "']").data("ratio"));
            var gift = 0;
            if(cobon > 0){
                gift = ht * ratio / 100;
            }

            var ttc = ht + (tax + expense) - (reduction + gift);

            $("input[name='ht']").val(ht.toFixed(2));
            $("input[name='tax']").val(tax.toFixed(2));
            $("input[name='gift']").val(gift.toFixed(2));
            $("input[name='ttc']").val(ttc.toFixed(2));
        }

        function recalcule_rows_tva(){
            var tva = $("input[name='tva']").val();
            console.log("TVA : " + tva);

            var rows = $("table tbody tr");

            rows.each(function(index){
                console.log("PRODUCT : " + index);

                var price = $(this).find("input.input-price").val();
                var quantity = $(this).find("input.input-quantity").val();
                var tax = $(this).find("input.input-tax").val();

                var ht = price * quantity;

                var tax = (ht / 100) * tva;

                var ttc = ht + tax;

                console.log("TVA : " + tva + ", Price : " + price + ", Quantity : " + quantity + ", Tax : " + tax);

                $(this).find("input.input-tax").val(tax.toFixed(2));
                $(this).find("input.input-ht").val(ttc.toFixed(2));
            });
        }

        recalcule_rows();

    });
</script>
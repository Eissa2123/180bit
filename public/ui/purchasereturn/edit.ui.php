<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('purchase') ?>"><?= V($LTranslates, 'Purchases') ?></a></li>
                    <li><a href="<?= WLink('purchasereturn/'.V($Cells, 'Facture', 'ID')) ?>"><?= V($LTranslates, 'Returns') ?> <?= V($LTranslates, 'Purchase') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Return') ?> <?= V($LTranslates, 'Purchase') ?></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('salereturn/'.V($Cells, 'Facture', 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Back') ?> 
                    <i class="glyphicon glyphicon-repeat"></i> 
                </a>
            </div>
        </div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Success)){  ?>
					<div class="alert alert-success" role="alert"><?= V($LTranslates, 'ASuccess') ?></div>
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
                <form action="<?= WLink('purchasereturn/edit/'.V($Cells, 'ID')) ?>" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="code"><?= V($LTranslates, 'Code') ?></label>
                                <input type="hidden" name="id" value="<?= V($LPosts, 'ID') ?>" />
                                <input type="text" class="form-control" name="code" value="<?= V($Cells, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" readonly="readonly" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="at"><?= V($LTranslates, 'AT') ?></label>
                                <input type="date" class="form-control" name="at" value="<?= V($Cells, 'AT') ?>"  required="required" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="notes"><?= V($LTranslates, 'Notes') ?></label>
                                <input type="text" class="form-control" name="notes" value="<?= V($Cells, 'Notes') ?>" placeholder="<?= V($LTranslates,'Notes') ?>" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""><?= V($LTranslates, '') ?></label>
                            <div class="row articals">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="gray">
                                                <th class="text-center" colspan="6"><?= V($LTranslates, 'Products') ?></th>
                                            </tr>
                                            <tr>
                                                <th class="text-center"><?= V($LTranslates, 'Code') ?></th>
                                                <th class="text-center" style="width:50%"><?= V($LTranslates, 'Name') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'Price') ?></th>
                                                <th class="text-center" style="width:10%"><?= V($LTranslates, 'Quantity') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'Total') ?></th>
                                                <th class="text-center action-1">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (L($Cells, 'Products') or L($LPosts, 'Products')){ ?>
                                                <?php foreach (J($Cells, $LPosts, 'Products') as $KProduct => $VProduct) { ?>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="products[<?= $KProduct ?>][id]" value="<?= V($VProduct, 'Product', 'ID') ?>" >
                                                            
                                                            <input type="hidden" class="form-control" name="products[<?= $KProduct ?>][ref]" value="<?= V($VProduct, 'REF') ?>" >

                                                            <input type="text" class="form-control text-center" name="products[<?= $KProduct ?>][code]" value="<?= V($VProduct, 'Product', 'Code') ?>" readonly="readonly">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="products[<?= $KProduct ?>][name]" value="<?= V($VProduct, 'Product', 'Name') ?>" readonly="readonly">
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon span-plus">+</span>
                                                                <input type="number" class="form-control text-center input-price" name="products[<?= $KProduct ?>][price]" value="<?= V($VProduct, 'Price') ?>" min="0.000" step="0.001" required="required">
                                                                <span class="input-group-addon span-minus">-</span>
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
                                    <input type="number" class="form-control" name="tva" value="<?= V($LPosts, 'TVA') ? V($LPosts, 'TVA') : '0.000' ?>" min="0.00" step="0.001" aria-label="Amount (to the nearest dollar)" required="required">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="tax"><?= V($LTranslates, 'Tax') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="tax" value="<?= V($LPosts, 'Tax') ? V($LPosts, 'Tax') : '0.000' ?>" min="0.000" step="0.001" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="cobon"><?= V($LTranslates, 'Cobon') ?></label>
                                <div class="input-group">
                                    <select class="form-control" name="cobon" required="required">
                                        <!--<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Cobon') ?></option>-->
                                        <?php if (isset($LCobons)){ ?>
                                            <?php foreach ($LCobons as $Cobon) { ?>
                                            <option value="<?= V($Cobon,'ID') ?>" <?= (V($LPosts, 'Cobon') == V($Cobon,'ID')) ? 'selected="selected"' : '' ?> data-ratio="<?= V($Cobon,'Ratio') ?>"><?= V($Cobon,'Name') ?></option>
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
                                    <input type="number" class="form-control" name="gift" value="<?= V($LPosts, 'Gift') ? V($LTranslates,'Gift') : '0.000' ?>" min="0.000" step="0.001" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="reduction"><?= V($LTranslates, 'Reduction') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="reduction" value="<?= V($LPosts, 'Reduction') ? V($LPosts,'Reduction') : '0.000' ?>" min="0.000" step="0.001" aria-label="Amount (to the nearest dollar)" required="required">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label for="expense"><?= V($LTranslates, 'Expense') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="expense" value="<?= V($LPosts, 'Expense') ? V($LPosts,'Expense') : '0.000' ?>" min="0.000" step="0.001" aria-label="Amount (to the nearest dollar)" required="required">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="ht"><?= V($LTranslates, 'HT') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="ht" value="<?= V($LPosts, 'HT') ? V($LPosts,'HT') : '0.000' ?>" min="0.000" step="0.001" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="ttc"><?= V($LTranslates, 'TTC') ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="ttc" value="<?= V($LPosts, 'TTC') ? V($LPosts,'TTC') : '0.000' ?>" min="0.000" step="0.001" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                    <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                </div>
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

        $('tbody').on('click', 'span.span-delete', function() {
            var p = $(this).parent().parent().parent().remove();
            recalcule_rows();
        });

        $("#btn_new").on("click", function(){
            var $table = $('table').first().find('tbody');
            var from = $table.children('tr').length; 
            var products = $("#multiselect-products").val();
            var to = products.length;  
            for(var i = 0;i < to;i++){
                add_new_row($table, from + i, products[i]);
            }
            recalcule_rows();
        });

        function add_new_row(table, i, product){
            var row = $("<tr>");

            //product
            var option = $("#multiselect-products option[value='" + product + "']");
            
            //id
            var input_id= $("<input>").attr({
                type: "hidden",
                class : "form-control",
                name: "products[" + i + "][id]",
                value : option.data("id")
            });

            //code
            var input_code= $("<input>").attr({
                type: "text",
                class : "form-control text-center",
                name: "products[" + i + "][code]",
                value : option.data("code"),
                readonly : "readonly"
            });

            var column_code = $('<td>');

            column_code.append(input_id);
            column_code.append(input_code);

            row.append(column_code);

            //name
            var input_name= $("<input>").attr({
                type: "text",
                class : "form-control",
                name: "products[" + i + "][name]",
                value : option.data("name"),
                readonly : "readonly"
            });
            var column_name = $('<td>').append(input_name);
            row.append(column_name);

            //price
            var input_price= $("<input>").attr({
                type: "number",
                class : "form-control text-center input-price",
                name: "products[" + i + "][price]",
                value : parseFloat(option.data("price")).toFixed(3),
                min : 0.000,
                step : 0.001,
                required : "required"
            });
            
            var span_addon_price_1 = $("<span>").attr({
                class : "input-group-addon span-plus",
            }).html('+');
            var span_addon_price_2 = $("<span>").attr({
                class : "input-group-addon span-minus"
            }).html('-');

            var div_price = $("<div>").attr({
                class : "input-group"
            });

            div_price.append(span_addon_price_1, input_price, span_addon_price_2);

            var column_price = $('<td>').append(div_price);
            row.append(column_price);

            //quantity
            var input_quantity= $("<input>").attr({
                type: "number",
                class : "form-control text-center input-quantity",
                name: "products[" + i + "][quantity]",
                value : 1,
                min : 1,
                step : 1,
                required : "required"
            });
            
            var span_addon_quantity_1 = $("<span>").attr({
                class : "input-group-addon span-plus"
            }).html('+');
            var span_addon_quantity_2 = $("<span>").attr({
                class : "input-group-addon span-minus"
            }).html('-');

            var div_quantity = $("<div>").attr({
                class : "input-group"
            });

            div_quantity.append(span_addon_quantity_1, input_quantity, span_addon_quantity_2);

            var column_quantity = $('<td>').append(div_quantity);
            row.append(column_quantity);
            
            //ht
            var input_ht= $("<input>").attr({
                type: "number",
                class : "form-control text-center input-ht",
                name: "products[" + i + "][ht]",
                value : parseFloat(option.data("price")).toFixed(3),
                readonly : "readonly"
            });
            var column_ht = $('<td>').append(input_ht);
            row.append(column_ht);

            //delete
            var span_addon_delete = $("<span>").attr({
                class : "glyphicon glyphicon-trash span-delete"
            });
            var button_delete= $("<a>").attr({
                class : "text-center action-1",
                style : "vertical-align:middle;"
            });
            button_delete.append(span_addon_delete);
            var column_delete = $('<td>').attr({
                class : "text-center action-1",
                style : "vertical-align:middle;"
            }).append(button_delete);
            row.append(column_delete);

            //row
            table.append(row);
        }

        function recalcule_rows(){
            var ht = 0.0;
            $(".input-ht").each(function(){
                ht += parseFloat($(this).val());
            });

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

            $("input[name='ht']").val(ht.toFixed(3));
            $("input[name='tax']").val(tax.toFixed(3));
            $("input[name='gift']").val(gift.toFixed(3));
            $("input[name='ttc']").val(ttc.toFixed(3));
        }

        recalcule_rows();

    });
</script>
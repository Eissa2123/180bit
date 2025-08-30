<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('purchasequotation') ?>"><?= V($LTranslates, 'Purchasequotations') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Add') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('purchasequotation') ?>" class="btn btn-default btn-block btn-control" role="button">
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
                <form action="<?= WLink('purchasequotation/add') ?>" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <?php /*<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="code"><?= V($LTranslates, 'Code') ?></label>
                                        <input type="text" class="form-control" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
                                    </div>
                                </div>
                                </div>*/ ?>
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                    <div class="form-group">
                                        <label for="provider"><?= V($LTranslates, 'Provider') ?></label>
                                        <select class="form-control multiselect" id="multiselect-providers" name="provider" data-multiple-name="<?= V($LTranslates,'Provider') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                            <option value="">&nbsp;</option>
                                            <?php if (isset($LProviders)){  ?>
                                                <?php foreach ($LProviders as $Provider) { ?>
                                                <option value="<?= V($Provider,'ID') ?>" data-id="<?= V($Provider,'ID') ?>" <?= I($Provider, 'ID', $LPosts, 'Provider') ? 'selected="selected"' : '' ?>>
                                                    <?= V($Provider, 'Companyname') ?> : <?= V($Provider,'Job') ?>
                                                </option>
                                                <?php }  ?>
                                            <?php }  ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="at"><?= V($LTranslates, 'AT') ?></label>
                                        <input type="date" class="form-control" name="at" value="<?= V($LPosts, 'AT') != "" ? V($LPosts, 'AT') : DT ?>"  required="required" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="barcode"><?= V($LTranslates, 'Barcode') ?></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </span>
                                            <input type="text" class="form-control" class="input-barcode" name="barcode" value="<?= V($LPosts, 'Codebar') ?>" />
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-barcode"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                    <div class="form-group">
                                        <label for="cobon"><?= V($LTranslates, 'Products') ?></label>
                                        <select class="form-control multiselect" id="multiselect-products" name="products[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'Product') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                            
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
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                                    <label for="cobon">&nbsp;</label>
                                    <a class="btn btn-default btn-block" role="button" id="btn_new">
                                        <?= V($LTranslates, 'AddProduct') ?>
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""><?= V($LTranslates, '') ?></label>
                            <div class="row articals">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <table class="table table-bordered">
                                    <thead>
                                            <tr>
                                                <th class="text-center"><?= V($LTranslates, 'Code') ?></th>
                                                <th class="text-center" style="width:20%"><?= V($LTranslates, 'Name') ?></th>
                                                <th class="text-center" style="width:30%"><?= V($LTranslates, 'Description') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'Price') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'Quantity') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'TVA') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'Total') ?></th>
                                                <th class="text-center action-1">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (L($LPosts, 'Products')){  ?>
                                            <?php foreach ($LPosts['Products'] as $KProduct => $VProduct) { ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" class="form-control" name="products[<?= $KProduct ?>][id]" value="<?= V($VProduct, 'ID') ?>" >

                                                        <input type="text" class="form-control text-center" name="products[<?= $KProduct ?>][code]" value="<?= V($VProduct, 'Code') ?>" readonly="readonly">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="products[<?= $KProduct ?>][name]" value="<?= V($VProduct, 'Name') ?>" readonly="readonly">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="products[<?= $KProduct ?>][description]" value="<?= V($VProduct, 'Description') ?>">
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-addon span-plus">+</span>
                                                            <input type="number" class="form-control text-center input-price" name="products[<?= $KProduct ?>][price]" value="<?= V($VProduct, 'Price') ?>" min="0.00" step="0.01" required="required">
                                                            <span class="input-group-addon span-minus">-</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-addon span-plus">+</span>
                                                            <input type="number" class="form-control text-center input-quantity" name="products[<?= $KProduct ?>][quantity]" value="<?= V($VProduct, 'Quantity') ?>" min="0.00" step="0.01" required="required">
                                                            <span class="input-group-addon span-minus">-</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control text-center input-tax" name="products[<?= $KProduct ?>][tax]" value="<?= V($VProduct, 'TVA') ?>" readonly="readonly">
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
                        
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="tva"><?= V($LTranslates, 'TVA') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="tva" value="<?= V($LPosts, 'TVA') ? V($LPosts, 'TVA') : V($Setting, 'TVA') ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="tax"><?= V($LTranslates, 'Tax') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="tax" value="<?= V($LPosts, 'Tax') ? V($LPosts, 'Tax')  : '0.00' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 clear">
                                    <div class="form-group">
                                        <label for="reduction"><?= V($LTranslates, 'Reduction') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="reduction" value="<?= V($LPosts, 'Reduction') ? V($LPosts, 'Reduction') : '0.00' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="expense"><?= V($LTranslates, 'Expense') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="expense" value="<?= V($LPosts, 'Expense') ? V($LPosts, 'Expense') : '0.00' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="ht"><?= V($LTranslates, 'HT') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="ht" value="<?= V($LPosts, 'HT') ? V($LPosts, 'HT') : '0.00' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="ttc"><?= V($LTranslates, 'TTC') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="ttc" value="<?= V($LPosts, 'TTC') ? V($LPosts, 'TTC') : '0.00' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="terms"><?= V($LTranslates, 'Terms') ?></label>
                                <select class="form-control multiselect" id="multiselect-terms" name="terms[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'Terms') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                    
                                    <?php if (isset($LTerms)){  ?>
                                        <?php foreach ($LTerms as $Term) { ?>
                                        <option value="<?= V($Term,'ID') ?>" <?= K($Term, 'ID', $LPosts, $LPosts, 'Terms') ? 'selected="selected"' : '' ?>>
                                            <?= V($Term,'Name') ?>
                                        </option>
                                        <?php }  ?>
                                    <?php }  ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <div class="form-group">
                                <label for="notes"><?= V($LTranslates, 'Notes') ?></label>
                                <input type="text" class="form-control" name="notes" value="<?= V($LPosts, 'Notes') ?>" placeholder="<?= V($LTranslates,'Notes') ?>" />
                            </div>
                        </div>
						<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
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
        
        $('body').on('change', '#multiselect-categories', function(){
            var cats = [];

            console.clear();
            var $categories = $("#multiselect-categories :selected");
            var $products = $("#multiselect-products option");

            if($categories != null && $categories.length > 0){
                $.each($categories, function(index, value){
                    cats.push($(this).val());
                });
            }

            if($products != null && $products.length > 0){
                $.each($products, function(index, value){
                    $(this).addClass('multiselect-item-show');
                    $(this).removeClass('multiselect-item-hide');
                    $(this).prop("selected", false);
                });
            }

            if($products != null && $products.length > 0){
                $.each($products, function(index, value){
                    var $prod = $("#multiselect-products option[value='" + $(this).val() + "']");
                    var cat = $("#multiselect-products option[value='" + $(this).val() + "']").data('category');
                    
                    $prod.removeClass('multiselect-item-show');
                    $prod.addClass('multiselect-item-hide');
                    $.each(cats, function(i, v){
                        if(cat == v){
                            $prod.addClass('multiselect-item-show');
                        }
                    });
                });
            }
            $('#multiselect-products').multiselect('rebuild');
        });

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
        
        $('body').on('change', 'input[name="paidmonetary"], input[name="paidonline"]', function() {
            recalcule_rows();
        });

        $('body').on('change', 'input[name="rest"]', function() {
            recalcule_rows();
        });

        $('body').on('click', 'span.span-plus', function() {
            var input = $(this).parent().find("input[type='number']");
            input[0].stepUp();
            input.val(input.val());

            /*var price = parseFloat($(this).parent().parent().parent().find("input.input-price").val()).toFixed(2);
            var quantity = parseFloat($(this).parent().parent().parent().find("input.input-quantity").val()).toFixed(2);
            
            var ht = $(this).parent().parent().parent().find("input.input-ht");
            ht.val((quantity * price).toFixed(2));*/
            
            recalcule_rows();
        });

        $('body').on('click', 'span.span-minus', function() {
            var input = $(this).parent().find("input[type='number']");
            input[0].stepDown();
            input.val(input.val());
            
            /*var price = parseFloat($(this).parent().parent().parent().find("input.input-price").val()).toFixed(2);
            var quantity = parseFloat($(this).parent().parent().parent().find("input.input-quantity").val()).toFixed(2);
            
            var ht = $(this).parent().parent().parent().find("input.input-ht");
            ht.val((quantity * price).toFixed(2));*/
            
            recalcule_rows();
        });

        $('tbody').on('change', 'input.input-price', function() {
            /*var price = parseFloat($(this).parent().parent().parent().find("input.input-price").val()).toFixed(2);
            var quantity = parseFloat($(this).parent().parent().parent().find("input.input-quantity").val()).toFixed(2);
            
            var ht = $(this).parent().parent().parent().find("input.input-ht");
            ht.val((quantity * price).toFixed(2));*/

            recalcule_rows();
        });

        $('tbody').on('change', 'input.input-quantity', function() {
            /*var price = parseFloat($(this).parent().parent().parent().find("input.input-price").val()).toFixed(2);
            var quantity = parseFloat($(this).parent().parent().parent().find("input.input-quantity").val()).toFixed(2);
            
            var ht = $(this).parent().parent().parent().find("input.input-ht");
            ht.val((quantity * price).toFixed(2));*/

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

            $("#multiselect-products").multiselect('deselectAll', true);
            $("#multiselect-products").multiselect('refresh');
        });

        $('body').on('keyup', 'input[name="barcode"]', function(e) {
            if (e.key === 'Enter') {
                search_product();
            }
            return false;
        });

        /*$(".tva-option").click(function(){

            $(".tva-option").not(this).each(function(){
                $(this).prop('checked', false);
            });

            var tva = 0;
            if($(this).prop('checked')){
                tva = parseFloat($(this).val());
            }

            $("input[name='tva']").val(tva.toFixed(2));

            recalcule_rows_tva();
            recalcule_rows();
        });*/

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

            //description
            var input_description= $("<input>").attr({
                type: "text",
                class : "form-control",
                name: "products[" + i + "][description]",
                value : option.data("description")
            });
            var column_description = $('<td>').append(input_description);
            row.append(column_description);

            //price
            var input_price= $("<input>").attr({
                type: "number",
                class : "form-control text-center input-price",
                name: "products[" + i + "][price]",
                value : parseFloat(option.data("price")).toFixed(2),
                min : 0.00,
                step : 0.01,
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
                min : 0,
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

            //tax
            var input_tax= $("<input>").attr({
                type: "number",
                class : "form-control text-center input-tax",
                name: "products[" + i + "][tax]",
                value : parseFloat(0.00).toFixed(2),
                min : 0.00,
                step : 0.01,
                readonly : "readonly"
            });
            var column_tax = $('<td>').append(input_tax);
            row.append(column_tax);
            
            //ht
            var input_ht= $("<input>").attr({
                type: "number",
                class : "form-control text-center input-ht",
                name: "products[" + i + "][ht]",
                value : parseFloat(option.data("price")).toFixed(2),
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

			recalcule_rows();
            recalcule_rows_tva();
        }

        function recalcule_rows(){
			
            var tva = parseFloat($("input[name='tva']").val());
            var reduction = parseFloat($("input[name='reduction']").val());
            var expense = parseFloat($("input[name='expense']").val());
            var paidmonetary = parseFloat($("input[name='paidmonetary']").val());
            var paidonline = parseFloat($("input[name='paidonline']").val());
            var paidmonetary = parseFloat($("input[name='paidmonetary']").val());
            var cobon = $("select[name='cobon']").val();
            var ratio = parseFloat($("select[name='cobon'] option[value='" + cobon + "']").data("ratio"));

            var tax = 0.0;
            var ht = 0.0;
			
			var rows = $("table tbody tr");
            rows.each(function(index){
				var subPrice = parseFloat($(this).find(".input-price").val());
				var subQuantity = parseInt($(this).find(".input-quantity").val());
				var subHT = subPrice * subQuantity;
				var subTax = subHT * (tva / 100);
				
				var subTTC = subHT + subTax;
				
				tax += subTax;
				ht += subHT;
				
				$(this).find(".input-tax").val(subTax.toFixed(2))
				$(this).find(".input-ht").val(subTTC.toFixed(2))
			});

            var gift = 0;
            if(cobon > 0){
                gift = (ht * ratio) / 100;
            }

            var ttc = ht + (tax + expense) - (reduction + gift);
            var paid = paidmonetary + paidonline;
            var rest = ttc - paid;

            $("input[name='ht']").val(ht.toFixed(2));
            $("input[name='tax']").val(tax.toFixed(2));
            $("input[name='gift']").val(gift.toFixed(2));
            $("input[name='ttc']").val(ttc.toFixed(2));
            $("input[name='paid']").val(paid.toFixed(2));
            $("input[name='rest']").val(rest.toFixed(2));

            recalcule_rows_tva();
        }

        function recalcule_rows_tva(){
            /*var tva = $("input[name='tva']").val();
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
            });*/
        }
        
        function search_product(){
            var barcode = $('input[name="barcode"]').val();

            var $products = $("#multiselect-products option");

            if($products != null && $products.length > 0){
                $.each($products, function(index, value){
                    var code = $("#multiselect-products option[value='" + $(this).val() + "']").data('code');
                    //console.log(barcode + "/" + code);
                    if(barcode == code){
                        add_product($(this).val());
                        return false;
                    }
                });
            }

            $('input[name="barcode"]').val("");

            return false;
        }

        function add_product(product){
            console.log("product : [" + product + "]");
            var $table = $('table').first().find('tbody');
            var length = $table.children('tr').length; 
            add_new_row($table, length + 1, product);
            recalcule_rows();
        }

        recalcule_rows();

        //$('input.input-quantity').change();
    });
</script>
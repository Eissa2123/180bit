<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('purchasequotation') ?>"><?= V($LTranslates, 'Purchasequotation') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('purchasequotation/display/'.V($Cells, 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('purchasequotation') ?>" class="btn btn-default btn-block btn-control" role="button">
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
                <form action="<?= WLink('purchasequotation/edit/'.V($Cells, 'ID')) ?>" method="post">  
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id" value="<?= V($Cells, 'ID') ?>" />
                                        <label for="code"><?= V($LTranslates, 'Code') ?></label>
                                        <input type="text" class="form-control" name="code" value="<?= V($Cells, 'Code') ?>" disabled="disabled" />
                                    </div>
                                </div>   
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="at"><?= V($LTranslates,'AT') ?></label>
                                        <input type="date" class="form-control" name="at" value="<?= V($Cells,'AT') ?>" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="provider"><?= V($LTranslates, 'Provider') ?></label>
                                                <select class="form-control" name="provider" required="required">
                                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Provider') ?></option>
                                                    <?php if (isset($LProviders)){  ?>
                                                        <?php foreach ($LProviders as $Provider) { ?>
                                                        <option value="<?= V($Provider,'ID') ?>" <?= V($Cells, 'Provider', 'ID') === V($Provider,'ID') ? 'selected="selected"' : '' ?>><?= V($Provider,'Code') ?> : <?= V($Provider,'Companyname') ?> - <?= V($Provider,'Name') ?></option>
                                                        <?php }  ?>
                                                    <?php }  ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>   
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
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
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <label for="">&nbsp;</label>
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
                                                <th class="text-center" style="width:50%"><?= V($LTranslates, 'Name') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'Price') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'Quantity') ?></th>
                                                <th class="text-center"><?= V($LTranslates, 'Total') ?></th>
                                                <th class="text-center action-1">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($Cells['Products'])){ ?>
                                                <?php foreach ($Cells['Products'] as $KProduct => $VProduct) { ?>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="products[<?= $KProduct ?>][id]" value="<?= V($VProduct, 'Product', 'ID') ?>" >

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
                                                                <input type="number" class="form-control text-center input-quantity" name="products[<?= $KProduct ?>][quantity]" value="<?= V($VProduct, 'Quantity') ?>" min="1" step="1" required="required">
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
                        
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="tva"><?= V($LTranslates, 'TVA') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="tva" value="<?= V($Cells, 'TVA') ? V($Cells, 'TVA') : '0.000' ?>" min="0.00" step="0.001" aria-label="Amount (to the nearest dollar)" required="required">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="tax"><?= V($LTranslates, 'Tax') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="tax" value="<?= V($Cells, 'Tax') ? V($Cells, 'Tax') : '0.000' ?>" min="0.000" step="0.001" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="cobon"><?= V($LTranslates, 'Cobon') ?></label>
                                        <div class="input-group">
                                            <select class="form-control" name="cobon" required="required">
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
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="gift"><?= V($LTranslates, 'Gift') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="gift" value="<?= V($Cells, 'Gift') ? V($Cells,'Gift') : '0.000' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="reduction"><?= V($LTranslates, 'Reduction') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="reduction" value="<?= V($Cells, 'Reduction') ? V($Cells,'Reduction') : '0.000' ?>" min="0.000" step="0.001" aria-label="Amount (to the nearest dollar)" required="required">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="expense"><?= V($LTranslates, 'Expense') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="expense" value="<?= V($Cells, 'Expense') ? V($Cells,'Expense') : '0.000' ?>" min="0.00" step="0.001" aria-label="Amount (to the nearest dollar)" required="required">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="ht"><?= V($LTranslates, 'HT') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="ht" value="<?= V($Cells, 'HT') ? V($Cells,'HT') : '0.000' ?>" min="0.00" step="0.01" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="ttc"><?= V($LTranslates, 'TTC') ?></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="ttc" value="<?= V($Cells, 'TTC') ? V($Cells,'TTC') : '0.000' ?>" min="0.000" step="0.001" aria-label="Amount (to the nearest dollar)" required="required" readonly="readonly">
                                            <span class="input-group-addon"><?= V($LTranslates, 'Currency') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="state"><?= V($LTranslates,'State') ?></label>
                                        <select class="form-control" name="state">
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
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="terms"><?= V($LTranslates, 'Terms') ?></label>
                                        <select class="form-control multiselect" id="multiselect-terms" name="terms[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'Terms') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                            
                                            <?php if (isset($LTerms)){  ?>
                                                <?php foreach ($LTerms as $Term) { ?>
                                                <option value="<?= V($Term,'ID') ?>" <?= I($Term, 'ID', $Cells, 'Terms') ? 'selected="selected"' : '' ?>>
                                                    <?= V($Term,'Name') ?>
                                                </option>
                                                <?php }  ?>
                                            <?php }  ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="notes"><?= V($LTranslates,'Notes') ?></label>
                                        <input type="texr" class="form-control" name="notes" value="<?= V($Cells,'Notes') ?>" />
                                    </div>
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

        $('body').on('click', 'span.span-plus', function() {
            var input = $(this).parent().find("input[type='number']");
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
        
        $('body').on('keyup', 'input[name="barcode"]', function(e) {
            if (e.key === 'Enter') {
                search_product();
            }
            return false;
        });

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
            //console.log("product : [" + product + "]");
            var $table = $('table').first().find('tbody');
            var length = $table.children('tr').length; 
            add_new_row($table, length + 1, product);
            recalcule_rows();
        }

        recalcule_rows();

    });
</script>
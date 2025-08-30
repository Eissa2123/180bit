<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('expense') ?>"><?= V($LTranslates, 'Expenses') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Add') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('expense') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Back') ?>  
                    <i class="glyphicon glyphicon-list"></i> 
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
                <form action="<?= WLink('expense/add') ?>" method="post" enctype="multipart/form-data">
					<div class="row"> 
						<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
							<div class="form-group">
								<label for="code"><?= V($LTranslates,'Code') ?></label>
								<input type="text" class="form-control" id="code" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="form-group">
								<label for="name"><?= V($LTranslates,'Name') ?></label>
								<span style="float:left;"><input type="checkbox" name="tax" value="1" data-tax="<?= V($Cells, 'Impayed') ?>" /> <?= V($LTranslates,'Tax') ?></span>
								<input type="text" class="form-control" id="name" name="name" value="<?= V($LPosts, 'Name') ?>" placeholder="<?= V($LTranslates,'Name') ?>" required="required" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="employee"><?= V($LTranslates,'Employee') ?></label>
								<select class="form-control" name="employee">
									<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Employee') ?></option>
									<option value=""></option>
									<?php if (isset($LEmployees)){  ?>
										<?php foreach ($LEmployees as $Employee) { ?>
										<option value="<?= V($Employee,'ID') ?>" <?= (V($LPosts, 'Employee') === V($Employee,'ID')) ? 'selected="selected"' : '' ?>><?= V($Employee,'Code') ?> : <?= V($Employee,'Firstname') ?> <?= V($Employee,'Lastname') ?></option>
										<?php }  ?>
									<?php }  ?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="marketer"><?= V($LTranslates,'Marketer') ?></label>
								<select class="form-control" name="marketer">
									<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Marketer') ?></option>
									<option value=""></option>
									<?php if (isset($LMarketers)){  ?>
										<?php foreach ($LMarketers as $Marketer) { ?>
										<option value="<?= V($Marketer,'ID') ?>" <?= (V($LPosts, 'Marketer') === V($Marketer,'ID')) ? 'selected="selected"' : '' ?>><?= V($Marketer,'Code') ?> : <?= V($Marketer,'Name') ?></option>
										<?php }  ?>
									<?php }  ?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
							<div class="form-group">
								<label for="amount"><?= V($LTranslates,'Amount') ?></label>
								<input type="number" min="0" step="0.001" class="form-control" id="amount" name="amount" value="<?= V($LPosts, 'Amount') ?>" placeholder="<?= V($LTranslates,'Amount') ?>" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
							<div class="form-group">
								<label for="at"><?= V($LTranslates,'AT') ?></label>
								<input type="date" class="form-control" id="at" name="at" value="<?= V($LPosts, 'AT') != "" ? V($LPosts, 'AT') : DT ?>" placeholder="<?= V($LTranslates,'AT') ?>" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
							<div class="form-group">
								<label for="method"><?= V($LTranslates,'Method') ?></label>
								<select class="form-control" name="method" required="required">
									<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Method') ?></option>
									<?php if (isset($LMethods)){  ?>
										<?php foreach ($LMethods as $Method) { ?>
										<option value="<?= V($Method,'ID') ?>" <?= (V($LPosts, 'Method') === V($Method,'ID')) ? 'selected="selected"' : '' ?>><?= V($Method,'Name'.LNG) ?></option>
										<?php }  ?>
									<?php }  ?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
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

<script>
	$(document).ready(function(){
		$("input[name='tax']").click(function(){
			var checked = $(this).is(":checked");
			var tax = $(this).data("tax");

			var $amount = $("input[name='amount']");
			var $employee = $("select[name='employee']");
			var $marketer = $("select[name='marketer']");

			if(checked){
				$amount.val(tax);

				$employee.prop('disabled', true);
				$marketer.prop('disabled', true);

				$employee.val('');
				$marketer.val('');
			}else{
				$amount.val("0.00");

				$employee.prop('disabled', false);
				$marketer.prop('disabled', false);
			}
		});

		$("select[name='employee']").change(function(){
			var employee = $(this).val();
			var $marketer = $("select[name='marketer']");

			if(employee != ""){
				$marketer.prop('disabled', true);
				$marketer.val('');
			}else{
				$marketer.prop('disabled', false);
			}
		});

		$("select[name='marketer']").change(function(){
			var marketer = $(this).val();
			var $employee = $("select[name='employee']");

			if(marketer != ""){
				$employee.prop('disabled', true);
				$employee.val('');
			}else{
				$employee.prop('disabled', false);
			}
		});
	});
</script>
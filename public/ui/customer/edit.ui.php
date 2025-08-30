<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('customer') ?>"><?= V($LTranslates, 'Customers') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('customer/display/'.V($Cells, 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('customer') ?>" class="btn btn-default btn-block btn-control" role="button">
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
        
        <div class="panel panel-default">
            <div class="panel-body">
				<form action="<?= WLink('customer/edit/'.V($Cells, 'ID')) ?>" method="post" enctype="multipart/form-data">
                   <div class="row">
						<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
							<div class="form-group">
								<img src="<?= V($Cells,'Picture') ?>" data-default="<?= IMG_DEFAULT ?>" class="thumbnail img-circle avatar-4" id="img-picture">
							</div>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
									<div class="form-group">
										<input type="hidden" class="form-control" name="id" value="<?= V($Cells, 'ID') ?>" />
										<label for="code"><?= V($LTranslates,'Code') ?></label>
										<input type="text" class="form-control" name="code" value="<?= V($Cells, 'Code') ?>" disabled="disabled" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="rc"><?= V($LTranslates,'RC') ?></label>
										<input type="text" class="form-control" name="rc" value="<?= V($Cells, 'RC') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="taxnumber"><?= V($LTranslates,'Taxnumber') ?></label>
										<input type="text" class="form-control" name="taxnumber" value="<?= V($Cells, 'Taxnumber') ?>"/>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="type"><?= V($LTranslates,'Type') ?></label>
										<select class="form-control" name="type" required="required" >
											<option value="" disabled="disabled"><?= V($LTranslates,'Type') ?></option>
											<?php if (isset($LTypes)){  ?>
												<?php foreach ($LTypes as $Type) { ?>
												<option value="<?= V($Type,'ID') ?>" <?= (V($Type,'ID') == V($Cells, 'Type', 'ID')) ? 'selected="selected"' : '' ?>>
													<?= V($Type,'Name'.LNG) ?>
												</option>
												<?php }  ?>
											<?php }  ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="companyname"><?= V($LTranslates,'Companyname') ?></label>
										<input type="text" class="form-control" name="companyname" value="<?= V($Cells, 'Companyname') ?>" required="required" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="name"><?= V($LTranslates,'Country') ?></label>
										<input type="text" class="form-control" name="country" value="<?= V($Cells, 'Country') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="city"><?= V($LTranslates,'City') ?></label>
										<input type="text" class="form-control" name="city" value="<?= V($Cells, 'City') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="address"><?= V($LTranslates,'Address') ?></label>
										<input type="text" class="form-control" name="address" value="<?= V($Cells, 'Address') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="email"><?= V($LTranslates,'Email') ?></label>
										<input type="email" class="form-control" name="email" value="<?= V($Cells, 'Email') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="phonenumber"><?= V($LTranslates,'Phonenumber') ?></label>
										<input type="text" class="form-control tel" name="phonenumber" value="<?= V($Cells, 'Phonenumber') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-2 col-lg-3">
									<div class="form-group">
										<label for="picture"><?= V($LTranslates,'Picture') ?></label>
										<button class="btn btn-default form-control upload" type="button">
											<?= V($LTranslates,'Upload') ?>
											<i class="glyphicon glyphicon-picture"></i>
											<input type="file" name="picture" id="picture" />
										</button>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="state"><?= V($LTranslates,'State') ?></label>
										<select class="form-control" name="state" required="required" >
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
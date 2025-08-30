<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('customer') ?>"><?= V($LTranslates, 'Customers') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Add') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('customer') ?>" class="btn btn-default btn-block btn-control" role="button">
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
                <form action="<?= WLink('customer/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
						<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
							<div class="form-group">
								<img src="<?= IMG_DEFAULT ?>" data-default="<?= IMG_DEFAULT ?>" class="thumbnail img-circle avatar-4" id="img-picture">
							</div>
						</div>  
						<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="code"><?= V($LTranslates,'Code') ?></label>
										<input type="text" class="form-control" id="code" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="rc"><?= V($LTranslates,'RC') ?></label>
										<input type="text" class="form-control" id="rc" name="rc" value="<?= V($LPosts, 'RC') ?>" placeholder="<?= V($LTranslates,'RC') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="taxnumber"><?= V($LTranslates,'Taxnumber') ?></label>
										<input type="text" class="form-control" id="taxnumber" name="taxnumber" value="<?= V($LPosts, 'Taxnumber') ?>" placeholder="<?= V($LTranslates,'Taxnumber') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="type"><?= V($LTranslates,'Type') ?></label>
										<select class="form-control" name="type" required="required">
											<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Type') ?></option>
											<?php if (isset($LTypes)){  ?>
												<?php foreach ($LTypes as $Type) { ?>
												<option value="<?= V($Type,'ID') ?>" <?= (V($LPosts, 'Type') === V($Type,'ID')) ? 'selected="selected"' : '' ?>><?= V($Type,'Name'.LNG) ?></option>
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
										<input type="text" class="form-control" id="companyname" name="companyname" value="<?= V($LPosts, 'Companyname') ?>" placeholder="<?= V($LTranslates,'Companyname') ?>" required="required" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="country"><?= V($LTranslates,'Country') ?></label>
										<input type="text" class="form-control" id="city" name="country" value="<?= V($LPosts, 'Country') ?>" placeholder="<?= V($LTranslates,'Country') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="city"><?= V($LTranslates,'City') ?></label>
										<input type="text" class="form-control" id="city" name="city" value="<?= V($LPosts, 'City') ?>" placeholder="<?= V($LTranslates,'City') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="address"><?= V($LTranslates,'Address') ?></label>
										<input type="text" class="form-control" id="address" name="address" value="<?= V($LPosts, 'Address') ?>" placeholder="<?= V($LTranslates,'Address') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="email"><?= V($LTranslates,'Email') ?></label>
										<input type="email" class="form-control" id="email" name="email" value="<?= V($LPosts, 'Email') ?>" placeholder="<?= V($LTranslates,'Email') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="phonenumber"><?= V($LTranslates,'Phonenumber') ?></label>
										<input type="tel" class="form-control" id="phonenumber" name="phonenumber" value="<?= V($LPosts, 'Phonenumber') ?>" placeholder="<?= V($LTranslates,'Phonenumber') ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="picture"><?= V($LTranslates,'Picture') ?></label>
										<button class="btn btn-default form-control upload" type="button">
											<?= V($LTranslates,'Upload') ?>
											<i class="glyphicon glyphicon-picture"></i>
											<input type="file" name="picture" id="picture" />
										</button>
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
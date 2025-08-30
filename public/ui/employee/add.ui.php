<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('employee') ?>"><?= V($LTranslates, 'Employee') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Add') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('employee') ?>" class="btn btn-default btn-block btn-control" role="button">
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
                <form action="<?= WLink('employee/add') ?>" method="post" enctype="multipart/form-data">
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
										<label for="ncid"><?= V($LTranslates,'NCID') ?></label>
										<input type="text" class="form-control" id="ncid" name="ncid" value="<?= V($LPosts, 'NCID') ?>" placeholder="<?= V($LTranslates,'NCID') ?>" required="required" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="firstname"><?= V($LTranslates,'Firstname') ?></label>
										<input type="text" class="form-control" id="firstname" name="firstname" value="<?= V($LPosts, 'Firstname') ?>" placeholder="<?= V($LTranslates,'Firstname') ?>" required="required" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
								   <div class="form-group">
										<label for="lastname"><?= V($LTranslates,'Lastname') ?></label>
										<input type="text" class="form-control" id="lastname" name="lastname" value="<?= V($LPosts, 'Lastname') ?>" placeholder="<?= V($LTranslates,'Lastname') ?>" required="required" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="gender"><?= V($LTranslates,'Gender') ?></label>
										<select class="form-control" name="gender" required="required">
											<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Gender') ?></option>
											<?php if (isset($LGenders)){  ?>
												<?php foreach ($LGenders as $Gender) { ?>
												<option value="<?= V($Gender,'ID') ?>" <?= (V($LPosts, 'Gender') === V($Gender,'ID')) ? 'selected="selected"' : '' ?>><?= V($Gender,'Name'.LNG) ?></option>
												<?php }  ?>
											<?php }  ?>
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="salary"><?= V($LTranslates, 'Salary') ?></label>
										<input type="number" min="0" class="form-control" name="salary" value="<?= V($LPosts, 'Salary') ?>" required="required" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="sbilive"><?= V($LTranslates, 'SBilive') ?></label>
										<input type="date" class="form-control" name="sbilive" value="<?= V($LPosts, 'SBilive') ?>" required="required" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="ebilive"><?= V($LTranslates, 'EBilive') ?></label>
										<input type="date" class="form-control" name="ebilive" value="<?= V($LPosts, 'EBilive') ?>" required="required" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="swork"><?= V($LTranslates, 'SWork') ?></label>
										<input type="date" class="form-control" name="swork" value="<?= V($LPosts, 'SWork') ?>" required="required" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="ework"><?= V($LTranslates, 'EWork') ?></label>
										<input type="date" class="form-control" name="ework" value="<?= V($LPosts, 'EWork') ?>" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="country"><?= V($LTranslates,'Country') ?></label>
										<input type="text" class="form-control" id="country" name="country" value="<?= V($LPosts, 'Country') ?>" placeholder="<?= V($LTranslates,'Country') ?>" />
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
										<label for="username"><?= V($LTranslates,'Username') ?></label>
										<input type="text" class="form-control" name="username" value="<?= V($LPosts, 'Username') ?>" placeholder="<?= V($LTranslates,'Username') ?>" required="required"/>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="password"><?= V($LTranslates,'Password') ?></label>
										<input type="password" class="form-control" name="password" value="<?= V($LPosts, 'Password') ?>" placeholder="<?= V($LTranslates,'Password') ?>" required="required"/>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="job"><?= V($LTranslates,'Job') ?></label>
										<select class="form-control" name="job" required="required">
											<option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Job') ?></option>
											<?php if (isset($LStates)){  ?>
												<?php foreach ($LJobs as $Job) { ?>
												<option value="<?= V($Job,'ID') ?>" <?= (V($LPosts, 'Job') === V($Job,'ID')) ? 'selected="selected"' : '' ?>><?= V($Job,'Name'.LNG) ?></option>
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
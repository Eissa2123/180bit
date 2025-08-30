<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('privilege') ?>"><?= V($LTranslates, 'Privilege') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Add') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('privilege') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'List') ?> 
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Success)){  ?>
					<div class="alert alert-success alert-add" role="alert"><?= V($LTranslates, 'ASuccess')  ?></div>
				<?php } ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Errors)){  ?>
					<div class="alert alert-danger" role="alert"><?= V($LTranslates, 'ADanger')  ?></div>
				<?php } ?>
			</div>
		</div>
		
        <div class="panel panel-default table-borderd">
            <div class="panel-body">
                <form action="<?= WLink('privilege/add') ?>" method="post">        
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                            <div class="form-group">
                                <label for="code"><?= V($LTranslates,'Code') ?></label>
								<input type="text" class="form-control" id="code" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" required="required" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                            <div class="form-group">
                                <label for="namear"><?= V($LTranslates,'NameAR') ?></label>
								<input type="text" class="form-control" id="namear" name="namear" value="<?= V($LPosts, 'NameAR') ?>" placeholder="<?= V($LTranslates,'NameAR') ?>" required="required" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                            <div class="form-group">
                                <label for="nameen"><?= V($LTranslates,'NameEN') ?></label>
								<input type="text" class="form-control" id="nameen" name="nameen" value="<?= V($LPosts, 'NameEN') ?>" placeholder="<?= V($LTranslates,'NameEN') ?>" required="required" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                            <div class="form-group">
                                <label for="namefr"><?= V($LTranslates,'NameFR') ?></label>
								<input type="text" class="form-control" id="namefr" name="namefr" value="<?= V($LPosts, 'NameFR') ?>" placeholder="<?= V($LTranslates,'NameFR') ?>" required="required" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
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

                    <?php if($LItems !== null and count($LItems) > 0){ ?>
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <div class="form-group">
                                <label><?= V($LTranslates, 'Privileges') ?></label>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-list"></i> <?= V($LTranslates,'Browses') ?></th>
                                            <th class="text-center">
												<input type="checkbox" class="autoselect" />
												<input type="checkbox" class="autoselect" />
												<input type="checkbox" class="autoselect" />
											</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($LItems as $Item){ ?>
                                        <tr>
                                            <td><?= $Item['Name'.LNG] ?></td>
                                            <td class="text-center">
												<input type="radio" name="browse[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Browse', $Item['ID'], '1') ?> class="autoselect2" />
												<input type="radio" name="browse[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Browse', $Item['ID'], '2') ?> class="autoselect2" />
												<input type="radio" name="browse[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Browse', $Item['ID'], '3') ?> class="autoselect2" />
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-search"></i> <?= V($LTranslates,'Searchs') ?></th>
                                            <th class="text-center">
												<input type="checkbox" class="autoselect"/>
												<input type="checkbox" class="autoselect"/>
												<input type="checkbox" class="autoselect"/>
											</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($LItems as $Item){ ?>
                                        <tr>
                                            <td><?= $Item['Name'.LNG] ?></td>
                                            <td class="text-center">
												<input type="radio" name="search[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Search', $Item['ID'], '1') ?> class="autoselect2" />
												<input type="radio" name="search[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Search', $Item['ID'], '2') ?> class="autoselect2" />
												<input type="radio" name="search[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Search', $Item['ID'], '3') ?> class="autoselect2" />
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-eye-open"></i> <?= V($LTranslates,'Detail') ?></th>
                                            <th class="text-center">
												<input type="checkbox" class="autoselect"/>
												<input type="checkbox" class="autoselect"/>
												<input type="checkbox" class="autoselect"/>
											</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($LItems as $Item){ ?>
                                        <tr>
                                            <td><?= $Item['Name'.LNG] ?></td>
                                            <td class="text-center">
												<input type="radio" name="display[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Display', $Item['ID'], '1') ?> class="autoselect2" />
												<input type="radio" name="display[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Display', $Item['ID'], '2') ?> class="autoselect2" />
												<input type="radio" name="display[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Display', $Item['ID'], '3') ?> class="autoselect2" />
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-plus"></i> <?= V($LTranslates,'Adds') ?></th>
                                            <th class="text-center">
												<input type="checkbox" class="autoselect"/>
												<input type="checkbox" class="autoselect"/>
												<input type="checkbox" class="autoselect"/>
											</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($LItems as $Item){ ?>
                                        <tr>
                                            <td><?= $Item['Name'.LNG] ?></td>
                                            <td class="text-center">
												<input type="radio" name="add[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Add', $Item['ID'], '1') ?> class="autoselect2" />
												<input type="radio" name="add[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Add', $Item['ID'], '2') ?> class="autoselect2" />
												<input type="radio" name="add[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Add', $Item['ID'], '3') ?> class="autoselect2" />
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-edit"></i> <?= V($LTranslates,'Edits') ?></th>
                                            <th class="text-center">
												<input type="checkbox" class="autoselect"/>
												<input type="checkbox" class="autoselect"/>
												<input type="checkbox" class="autoselect"/>
											</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($LItems as $Item){ ?>
                                        <tr>
                                            <td><?= $Item['Name'.LNG] ?></td>
                                            <td class="text-center">
												<input type="radio" name="edit[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Edit', $Item['ID'], '1') ?> class="autoselect2" />
												<input type="radio" name="edit[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Edit', $Item['ID'], '2') ?> class="autoselect2" />
												<input type="radio" name="edit[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Edit', $Item['ID'], '3') ?> class="autoselect2" />
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="glyphicon glyphicon-remove"></i> <?= V($LTranslates,'Removes') ?></th>
                                            <th class="text-center">
												<input type="checkbox" class="autoselect"/>
												<input type="checkbox" class="autoselect"/>
												<input type="checkbox" class="autoselect"/>
											</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($LItems as $Item){ ?>
                                        <tr>
                                            <td><?= $Item['Name'.LNG] ?></td>
                                            <td class="text-center">
												<input type="radio" name="remove[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Remove', $Item['ID'], '1') ?> class="autoselect2" />
												<input type="radio" name="remove[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Remove', $Item['ID'], '2') ?> class="autoselect2" />
												<input type="radio" name="remove[<?= $Item['NameEN'] ?>]" <?= checked($LPosts, 'Privileges', 'Item', 'Remove', $Item['ID'], '3') ?> class="autoselect2" />
											</td>
                                        </tr>
										<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
					
					</div> 
                    <?php } ?>

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
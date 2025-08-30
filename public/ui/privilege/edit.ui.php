<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('privilege') ?>"><?= V($LTranslates, 'Privilege') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('privilege/display/'.V($Cells, 'ID')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Details') ?>  
                    <i class="glyphicon glyphicon-eye-open"></i> 
                </a>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <a href="<?= WLink('privilege') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'List') ?>  
                    <i class="glyphicon glyphicon-list"></i> 
                </a>
            </div>
        </div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Success)){  ?>
					<div class="alert alert-success" role="alert"><?= V($LTranslates, 'ESuccess') ?></div>
				<?php } ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php if (isset($Errors)){  ?>
					<div class="alert alert-danger" role="alert"><?= V($LTranslates, 'EDanger') ?></div>
				<?php } ?>
			</div>
		</div>
        
        <div class="panel panel-default table-borderd checkboxradio-appearance">
            <div class="panel-body">
                <form action="<?= WLink('privilege/edit/'.V($Cells, 'ID')) ?>" method="post">        
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?= V($Cells, 'ID') ?>" />
                                <input type="hidden" class="form-control" name="job" value="<?= V($Cells, 'ID') ?>" />
                                <label for="name"><?= V($LTranslates,'Code') ?></label>
                                <input type="text" class="form-control" name="code" value="<?= V($Cells, 'Code') ?>" required="required" />
                            </div>
                        </div>
					</div>
					 <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="name"><?= V($LTranslates,'NameAR') ?></label>
                                <input type="text" class="form-control" name="namear" value="<?= V($Cells, 'NameAR') ?>" required="required" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="name"><?= V($LTranslates,'NameEN') ?></label>
                                <input type="text" class="form-control" name="nameen" value="<?= V($Cells, 'NameEN') ?>" required="required" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="name"><?= V($LTranslates,'NameFR') ?></label>
                                <input type="text" class="form-control" name="namefr" value="<?= V($Cells, 'NameFR') ?>" required="required" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
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
												<input data-id="<?= $Item['ID'] ?>"  type="radio" name="browse[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Browse', $Item['ID'], '1') ?> value="1" class="autoselect2" />
												<input data-id="<?= $Item['ID'] ?>"  type="radio" name="browse[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Browse', $Item['ID'], '2') ?> value="2" class="autoselect2" />
												<input data-id="<?= $Item['ID'] ?>"  type="radio" name="browse[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Browse', $Item['ID'], '3') ?> value="3" class="autoselect2" />
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
												<input type="radio" name="search[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Search', $Item['ID'], '1') ?> value="1" class="autoselect2" />
												<input type="radio" name="search[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Search', $Item['ID'], '2') ?> value="2" class="autoselect2" />
												<input type="radio" name="search[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Search', $Item['ID'], '3') ?> value="3" class="autoselect2" />
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
												<input type="radio" name="display[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Display', $Item['ID'], '1') ?> value="1" class="autoselect2" />
												<input type="radio" name="display[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Display', $Item['ID'], '2') ?> value="2" class="autoselect2" />
												<input type="radio" name="display[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Display', $Item['ID'], '3') ?> value="3" class="autoselect2" />
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
												<input type="radio" name="add[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Add', $Item['ID'], '1') ?> value="1" class="autoselect2" />
												<input type="radio" name="add[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Add', $Item['ID'], '2') ?> value="2" class="autoselect2" />
												<input type="radio" name="add[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Add', $Item['ID'], '3') ?> value="3" class="autoselect2" />
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
												<input type="radio" name="edit[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Edit', $Item['ID'], '1') ?> value="1" class="autoselect2" />
												<input type="radio" name="edit[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Edit', $Item['ID'], '2') ?> value="2" class="autoselect2" />
												<input type="radio" name="edit[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Edit', $Item['ID'], '3') ?> value="3" class="autoselect2" />
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
												<input type="radio" name="remove[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Remove', $Item['ID'], '1') ?> value="1" class="autoselect2" />
												<input type="radio" name="remove[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Remove', $Item['ID'], '2') ?> value="2" class="autoselect2" />
												<input type="radio" name="remove[<?= $Item['NameEN'] ?>]" <?= checked($Cells, 'Privalages', 'Item', 'Remove', $Item['ID'], '3') ?> value="3" class="autoselect2" />
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
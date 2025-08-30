<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Historiques') ?></li>
                </ol>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-header">
                <div class="row">
                    <form action="<?= WLink('historique') ?>" method="post">
                        <div class="col-xs-12 col-sm-8 col-md-4 col-lg-3">
                            <div class="form-group">
                                <select class="form-control" name="action" >
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Action') ?></option>
                                    <option value=""></option>
                                    <?php if (isset($LActions)){  ?>
                                        <?php foreach ($LActions as $Action) { ?>
                                        <option value="<?= V($Action,'ID') ?>" <?= (V($LPosts,'Action') == V($Action,'ID')) ? 'selected="selected"' : '' ?>><?= V($Action,'Name'.LNG) ?></option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <select class="form-control" name="tablename" >
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Tablename') ?></option>
                                    <option value=""></option>
                                    <?php if (isset($LTables)){  ?>
                                        <?php foreach ($LTables as $Table) { ?>
                                        <option value="<?= V($Table,'Name') ?>" <?= (V($LPosts,'Tablename') == V($Table,'Name')) ? 'selected="selected"' : '' ?>><?= V($Table,'Name') ?></option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-4 col-lg-3">
                            <div class="form-group">
                                <select class="form-control" name="employee" >
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Member') ?></option>
                                    <option value=""></option>
                                    <?php if (isset($LEmployees)){  ?>
                                        <?php foreach ($LEmployees as $Employee) { ?>
                                        <option value="<?= V($Employee,'ID') ?>" <?= (V($LPosts,'Employee') == V($Employee,'ID')) ? 'selected="selected"' : '' ?>><?= V($Employee,'Code') ?> : <?= V($Employee,'Firstname') ?> <?= V($Employee,'Lastname') ?></option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'From') ?></span>
									<input type="date" class="form-control" name="atfrom" value="<?= V($LPosts, 'ATFrom') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'To') ?></span>
									<input type="date" class="form-control" name="atto" value="<?= V($LPosts, 'ATTo') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <select class="form-control" name="length">
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Length') ?></option>
									<?php if (isset($LLengths)){  ?>
                                        <?php foreach ($LLengths as $Length) { ?>
                                        <option value="<?= $Length ?>" <?= (V($LPosts,'Length') == $Length) ? 'selected="selected"' : '' ?>><?= $Length ?></option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="hidden" name="page" value="<?= V($LPosts,'Page') ?>" />
                                <button type="submit" class="btn btn-primary btn-block" name="btn_search"> 
                                <?= V($LTranslates,'Search') ?> <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <a href="<?= WLink('historique') ?>" class="btn btn-danger btn-block btn-control" role="button">
                                <?= V($LTranslates,'Clean') ?>  
                                <i class="glyphicon glyphicon-repeat"></i> 
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body" id="printer">
			<?php if (isset($LHistoriques)){  ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <th class="text-center"><?= V($LTranslates,'ID') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'Tablename') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'Action') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'Member') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'AT') ?></th>
						<th class="text-center actions">
                            <a href="" class="btn_print" data-print="printer"><span class="glyphicon glyphicon-print"></span>
                            </a>
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach ($LHistoriques as $Historique) { ?>
                        <tr class="<?= V($Historique,'Action', 'Class') ?>">
                            <td class="text-center"><?= V($Historique,'ID') ?></td> 
                            <td class="text-center hidden-xs"><?= V($Historique,'Tablename') ?></td>
                            <td class="text-center hidden-xs hidden-sm"><?= V($Historique,'Action', 'Name'.LNG) ?></td> 
                            <td class="text-center hidden-xs hidden-sm"><?= V($Historique,'Member', 'Code') ?> : <?= V($Historique,'Member', 'Firstname') ?> <?= V($Historique,'Member', 'Lastname') ?></td> 
                            <td class="text-center tel hidden-xs hidden-sm"><?= V($Historique,'AT') ?></td>
                            <td class="text-center actions">
                                <a href="<?= WLink('historique/display/'.$Historique['ID']) ?>" title="<?= V($LTranslates,'Display') ?>"><span class="glyphicon glyphicon-eye-open"></span></a>	
                                <a href="<?= WLink('historique/remove/'.V($Historique,'ID')) ?>" title="<?= V($LTranslates,'Remove') ?>"><span class="glyphicon glyphicon-trash"></span></a>	
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
			<?php }else{ ?>
				<div class="alert alert-warning" role="alert"><?= V($LTranslates,'EResults') ?></div>
			<?php } ?>
            </div>
           <?php if (isset($Pager)){  ?>
            <div class="panel-footer">
                <span class="visible-xs text-center"><?= V($LTranslates,'Page') ?> <?= V($Pager,'Current') ?> <?= V($LTranslates,'From') ?> <?= V($Pager,'Max') ?></span>
                <nav class="text-center">
                    <ul class="pager">
                        <?php if (isset($Pager['Previous'])){  ?>
                        <li class="previous">
                            <a href="" data-page="<?= V($Pager,'Previous') ?>"><span aria-hidden="true">&rarr;</span> <?= V($LTranslates,'Previous') ?></a>
                        </li>
                        <?php } ?>
                        <li class="current disabled hidden-xs"><span><?= V($LTranslates,'Lenght') ?> <?= V($Pager,'Count') ?>  | <?= V($LTranslates,'Page') ?> <?= V($Pager,'Current') ?> <?= V($LTranslates,'From') ?> <?= V($Pager,'Max') ?></span></li>
                        <?php if (isset($Pager['Next'])){  ?>
                        <li class="next">
                            <a href="" data-page="<?= V($Pager,'Next') ?>"><?= V($LTranslates,'Next') ?> <span aria-hidden="true">&larr;</span></a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
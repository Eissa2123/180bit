<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Privileges') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('privilege/add') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Add') ?>   
                    <i class="glyphicon glyphicon-plus"></i> 
                </a>
            </div>
        </div>
        <div class="panel panel-default checkboxradio">
            <div class="panel-header">
                <div class="row">
                    <form action="<?= WLink('privilege') ?>" method="post">
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="<?= V($LPosts, 'Name') ?>"  placeholder="<?= V($LTranslates,'Name') ?>"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                            <div class="form-group">
                               <select class="form-control" name="state">
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'State') ?></option>
                                    <option value=""></option>
									
									<?php if (isset($LStates)){  ?>
                                        <?php foreach ($LStates as $State) { ?>
                                        <option value="<?= V($State,'ID') ?>" <?= (V($LPosts,'Job', 'State') == V($State,'ID')) ? 'selected="selected"' : '' ?>>
											<?= V($State,'Name'.LNG) ?>
										</option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
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
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
									<a href="<?= WEB ?>privilege" class="btn btn-danger btn-block btn-control" role="button"><?= V($LTranslates,'Clean') ?>  
										<i class="glyphicon glyphicon-repeat"></i> 
									</a>
								</div>
							</div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                <?php if (isset($LJobs)){  ?>
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'ID') ?></th>
                        <th class="text-center"><?= V($LTranslates,'Code') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'NameAR') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'NameFR') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'NameEN') ?></th>
                        <th class="text-center"><?= V($LTranslates,'State') ?></th>
                        <th class="text-center actions">
							<a href="" class="btn_print" data-print="printer"><span class="glyphicon glyphicon-print"></span></a>
						</th>
                    </thead>
                    <tbody>
						<?php foreach ($LJobs as $Job) { ?>
                        <tr class="<?= V($Job,'State', 'Class') ?>">
                            <td class="text-center hidden-xs hidden-sm"><?= V($Job,'ID') ?></td> 
                            <td class="text-center"><?= V($Job,'Code') ?></td> 
                            <td class="hidden-xs"><?= V($Job,'NameAR') ?></td> 
                            <td class="hidden-xs text-right"><?= V($Job,'NameFR') ?></td> 
                            <td class="hidden-xs text-right"><?= V($Job,'NameEN') ?></td> 
                            <td class="text-center"><span class="label label-<?= V($Job,'State', 'Class') ?>"><?= V($Job,'State','Name'.LNG) ?></span></td> 
                            <td class="text-center actions">
								<a href="<?= WLink('privilege/display/'.V($Job,'ID')) ?>" title="<?= V($LTranslates,'Display') ?>"><span class="glyphicon glyphicon-eye-open"></span></a>	
                                <a href="<?= WLink('privilege/edit/'.V($Job,'ID')) ?>" title="<?= V($LTranslates,'Edit') ?>"><span class="glyphicon glyphicon-edit"></span></a>	
                                <a href="<?= WLink('privilege/remove/'.V($Job,'ID')) ?>" title="<?= V($LTranslates,'Remove') ?>"><span class="glyphicon glyphicon-trash"></span></a>									
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
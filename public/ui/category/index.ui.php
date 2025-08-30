<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Categories') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('category/add') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Add') ?>  
                    <i class="glyphicon glyphicon-plus"></i> 
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <form action="<?= WLink('category/prints') ?>" method="post" target="_blank">

                    <input type="hidden" name="code" value="<?= V($LPosts, 'Code') ?>" />
                    <input type="hidden" name="name" value="<?= V($LPosts, 'Name') ?>" />
                    <input type="hidden" name="country" value="<?= V($LPosts, 'Country') ?>" />
                    <input type="hidden" name="from" value="<?= V($LPosts, 'From') ?>" />
                    <input type="hidden" name="to" value="<?= V($LPosts, 'To') ?>" />
                    <input type="hidden" name="length" value="<?= V($LPosts, 'Length') ?>" />
                    <input type="hidden" name="page" value="<?= V($LPosts, 'Page') ?>" />

                    <?php if(L($LPosts, 'Categories')){ ?>
                        <?php foreach (V($LPosts, 'Categories') as $Category) { ?>
                            <input type="hidden" name="categories[]" value="<?= $Category ?>" />
                        <?php }  ?>
                    <?php }  ?>
                    
                    <?php if(L($LPosts, 'States')){ ?>
                        <?php foreach (V($LPosts, 'States') as $State) { ?>
                            <input type="hidden" name="states[]" value="<?= $State ?>" />
                        <?php }  ?>
                    <?php }  ?>

                    <button type="submit" class="btn btn-default btn-control btn-block" name="btn_print">
                        <?= V($LTranslates, 'Print') ?>   
                        <i class="glyphicon glyphicon-print"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            
            
            <div class="panel-header">
                <div class="row">
                    <form action="<?= WLink('category') ?>" method="post">
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="<?= V($LPosts, 'Name') ?>" placeholder="<?= V($LTranslates,'Name') ?>"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <select class="form-control multiselect" id="multiselect-categories" name="categories[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'Category') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                    <?php if (isset($LParents)){  ?>
                                        <?php foreach ($LParents as $Category) { ?>
                                        <option value="<?= V($Category,'ID') ?>"<?= I($Category, 'ID', $LPosts,'Categories') ? 'selected="selected"' : '' ?>>
                                            <?= V($Category,'Name') ?>
                                        </option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 clear">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'CAT') ?> <?= V($LTranslates,'From') ?></span>
									<input type="date" class="form-control" name="from" value="<?= V($LPosts, 'From') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'CAT') ?> <?= V($LTranslates,'To') ?></span>
									<input type="date" class="form-control" name="to" value="<?= V($LPosts, 'To') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <select class="form-control multiselect" id="multiselect-states" name="states[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'State') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
									
                                    <?php if (isset($LStates)){  ?>
                                        <?php foreach ($LStates as $State) { ?>
                                        <option value="<?= V($State,'ID') ?>" <?= I($State, 'ID', $LPosts,'States') ? 'selected="selected"' : '' ?>>
                                            <?= V($State,'Name'.LNG) ?>
                                        </option>
                                        <?php }  ?>
                                    <?php }  ?>

                                </select>
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
                            <a href="<?= WLink('category') ?>" class="btn btn-danger btn-block btn-control" role="button">
                                <?= V($LTranslates,'Clean') ?>  
                                <i class="glyphicon glyphicon-repeat"></i> 
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel-body" id="printer">
			<?php if (isset($LCategories)){  ?>
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center"><?= V($LTranslates,'ID') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Code') ?></th>
                        <th class="text-center"><?= V($LTranslates,'Name') ?></th>
                        <th class="text-center"><?= V($LTranslates,'Category', 'Name') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'State') ?></th>
						<th class="text-center actions">
                            <a href="" class="btn_print" data-print="printer"><span class="glyphicon glyphicon-print"></span>
                            </a>
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach ($LCategories as $category) { ?>
                        <tr class="<?= V($category,'State', 'Class') ?>">
                            <td class="text-center"><?= V($category,'ID') ?></td> 
                            <td class="text-center hidden-xs"><?= V($category,'Code') ?></td> 
                            <td class="text-center"><?= V($category, 'Name') ?></td>
                            <td class="text-center"><?= V($category, 'Category', 'Name') ?></td>
                            <td class="text-center hidden-xs"><span class="label label-<?= V($category,'State', 'Class') ?>"><?= V($category,'State','Name'.LNG) ?></span></td> 
                            <td class="text-center actions">
                                <a href="<?= WLink('category/print/'.$category['ID']) ?>" title="<?= V($LTranslates,'Print') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                                <a href="<?= WLink('category/display/'.V($category,'ID')) ?>" title="<?= V($LTranslates,'Display') ?>"><span class="glyphicon glyphicon-eye-open"></span></a>	
                                <a href="<?= WLink('category/edit/'.V($category,'ID')) ?>" title="<?= V($LTranslates,'Edit') ?>"><span class="glyphicon glyphicon-edit"></span></a>	
                                <a href="<?= WLink('category/remove/'.V($category,'ID')) ?>" title="<?= V($LTranslates,'Remove') ?>"><span class="glyphicon glyphicon-trash"></span></a>	
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
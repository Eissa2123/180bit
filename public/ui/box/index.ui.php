<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Box') ?></li>
                </ol>
            </div>
        </div>
        <div class="panel panel-default">

            <?php if(Has('S', 'Box', ALL)){ ?>
            <div class="panel-header">
                <div class="row">
                    <form action="<?= WLink('box') ?>" method="post">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'CAT') ?> <?= V($LTranslates,'From') ?></span>
									<input type="date" class="form-control" name="from" value="<?= V($LPosts, 'From') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'CAT') ?> <?= V($LTranslates,'To') ?></span>
									<input type="date" class="form-control" name="to" value="<?= V($LPosts, 'To') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
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
                            <a href="<?= WLink('box') ?>" class="btn btn-danger btn-block btn-control" role="button">
                                <?= V($LTranslates,'Clean') ?>  
                                <i class="glyphicon glyphicon-repeat"></i> 
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>

            <div class="panel-body" id="printer">
			<?php if (isset($LExpenses)){  ?>
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Code') ?></th>
                        <th class="text-center"><?= V($LTranslates,'SRC') ?></th>
                        <th class="text-center"><?= V($LTranslates,'Name') ?></th>
                        <th class="text-center"><?= V($LTranslates,'AT') ?></th>
                        <th class="text-center"><?= V($LTranslates,'IN') ?></th>
                        <th class="text-center"><?= V($LTranslates,'OUT') ?></th>
                        <th class="text-center"><?= V($LTranslates,'Method') ?></th>
                        <?php if(Has('D', 'Box', ALL)){ ?>
						    <th class="text-center actions">&nbsp;</th>
                        <?php } ?>
                    </thead>
                    <tbody>
                        <?php foreach ($LBoxs as $box) { ?>
                        <tr class="<?= V($box,'State', 'Class') ?>">
                            <td class="text-center hidden-xs"><?= V($box,'Code') ?></td> 
                            <td class="text-center"><?= V($LTranslates, V($box, 'SRC')) ?></td>
                            <td class="text-center"><?= V($box, 'Name') ?></td>
                            <td class="text-center"><?= V($box, 'AT') ?> </td>
                            <td class="text-left"><?= V($box, 'IN') ?></td>
                            <td class="text-left"><?= V($box, 'OUT') ?></td>
                            <td class="text-center"><?= V($box, 'Method', 'Name'.LNG) ?> </td>
                            <?php if(Has('D', 'Box', ALL)){ ?>
                                <td class="text-center actions">
                                    <?php if(Has('D', 'Box', ALL)){ ?>
                                        <a href="<?= WLink(V($box,'Details')) ?>" title="<?= V($LTranslates,'Display') ?>"><span class="glyphicon glyphicon-eye-open"></span></a>	
                                    <?php } ?>
                                </td>
                            <?php } ?>
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
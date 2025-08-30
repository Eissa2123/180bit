<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Salequotations') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('salequotation/add') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Add') ?>   
                    <i class="glyphicon glyphicon-plus"></i> 
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <form action="<?= WLink('salequotation/prints') ?>" method="post" target="_blank">

                    <input type="hidden" name="code" value="<?= V($LPosts, 'Code') ?>" />
                    <input type="hidden" name="sdatefrom" value="<?= V($LPosts, 'SDateFrom') ?>" />
                    <input type="hidden" name="sdateto" value="<?= V($LPosts, 'SDateTo') ?>" />
                    <input type="hidden" name="edatefrom" value="<?= V($LPosts, 'EDateFrom') ?>" />
                    <input type="hidden" name="edateto" value="<?= V($LPosts, 'EDateTo') ?>" />
                    <input type="hidden" name="from" value="<?= V($LPosts, 'From') ?>" />
                    <input type="hidden" name="to" value="<?= V($LPosts, 'To') ?>" />
                    <input type="hidden" name="length" value="<?= V($LPosts, 'Length') ?>" />
                    <input type="hidden" name="page" value="<?= V($LPosts, 'Page') ?>" />

                    <?php if(L($LPosts, 'Customers')){ ?>
                        <?php foreach ($LPosts['Customers'] as $Customer) { ?>
                            <input type="hidden" name="customers[]" value="<?= $Customer ?>" />
                        <?php }  ?>
                    <?php }  ?>
                    
                    <?php if(L($LPosts, 'States')){ ?>
                        <?php foreach ($LPosts['States'] as $State) { ?>
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
                    <form action="<?= WLink('salequotation') ?>" method="post">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
                            <div class="form-group">
                                <select class="form-control multiselect" id="multiselect-customers" name="customers[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'Customer') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                    <?php if (isset($LCustomers)){  ?>
                                        <?php foreach ($LCustomers as $Customer) { ?>
                                        <option value="<?= V($Customer,'ID') ?>" <?= I($Customer, 'ID', $LPosts,'Customers') ? 'selected="selected"' : '' ?>>
                                        <?= V($Customer,'Code') ?> - <?= V($Customer,'Companyname') ?> : <?= V($Customer,'Job') ?></option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 clear">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'ATFrom') ?> <?= V($LTranslates,'From') ?></span>
									<input type="date" class="form-control" name="atfrom" value="<?= V($LPosts, 'ATFrom') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'ATTo') ?> <?= V($LTranslates,'To') ?></span>
									<input type="date" class="form-control" name="atto" value="<?= V($LPosts, 'ATTo') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'CAT') ?> <?= V($LTranslates,'From') ?></span>
									<input type="date" class="form-control" name="from" value="<?= V($LPosts, 'From') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'CAT') ?> <?= V($LTranslates,'To') ?></span>
									<input type="date" class="form-control" name="to" value="<?= V($LPosts, 'To') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="form-group">
                                <select class="form-control multiselect" id="multiselect-states" name="states[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'State') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
									
                                    <?php if (isset($LStates)){  ?>
                                        <?php foreach ($LStates as $State) { ?>
                                        <option value="<?= V($State,'ID') ?>" <?= I($State, 'ID', $LPosts, 'States') ? 'selected="selected"' : '' ?>>
                                            <?= V($State,'Name'.LNG) ?>
                                        </option>
                                        <?php }  ?>
                                    <?php }  ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
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
									<a href="<?= WLink('sale') ?>" class="btn btn-danger btn-block btn-control" role="button"><?= V($LTranslates,'Clean') ?>  
										<i class="glyphicon glyphicon-repeat"></i> 
									</a>
								</div>
							</div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body" id="repport">
                <?php if (isset($LSales)){  ?>
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'ID') ?></th>
                        <th class="text-center"><?= V($LTranslates,'Code') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Customer') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'AT') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'TTC') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'State') ?></th>
                        <th class="text-center actions">&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php foreach ($LSales as $Sale) { ?>
                        <tr class="<?= V($Sale,'State', 'Class') ?>">
                            <td class="text-center hidden-xs"><?= V($Sale,'ID') ?></td> 
                            <td class="text-center"><?= V($Sale,'Code') ?></td> 
                            <td class="text-center hidden-xs">
                                <?= V($Sale,'Customer','Companyname') ?>
                            </td> 
                            <td class="text-center hidden-xs hidden-sm"><?= V($Sale,'AT') ?></td> 
                            <td class="text-left hidden-xs tel"><?= V($Sale,'TTC') ?></td>
                            <td class="text-center hidden-xs hidden-sm"><span class="label label-<?= V($Sale,'State', 'Class') ?>"><?= V($Sale,'State','Name'.LNG) ?></span></td> 
                            <td class="text-center actions">
                                <a href="<?= WLink('salequotation/print/'.V($Sale,'ID')) ?>" title="<?= V($LTranslates,'Print') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                                <a href="<?= WLink('salequotation/display/'.V($Sale,'ID')) ?>" title="<?= V($LTranslates,'Display') ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <?php //if(V($Sale,'State', 'ID') == '2') { ?>
                                <a href="<?= WLink('sale/add/'.V($Sale,'ID')) ?>" title="<?= V($LTranslates,'Add') ?> <?= V($LTranslates,'Sale') ?>"><span class="glyphicon glyphicon-share"></span></a>
                                <?php //} ?>
                                <?php /*<a href="<?= WLink('salequotation/edit/'.V($Sale,'ID')) ?>" title="<?= V($LTranslates,'Edit') ?>"><span class="glyphicon glyphicon-edit"></span></a>	
                                <a href="<?= WLink('salequotation/remove/'.V($Sale,'ID')) ?>" title="<?= V($LTranslates,'Remove') ?>"><span class="glyphicon glyphicon-trash"></span></a>*/?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <th class="text-center hidden-xs hidden-sm" colspan="4"></th>
                        <th class="text-left hidden-xs hidden-sm tel"><?= V($TPR, 'TTCs') ?></th>
                        <th class="text-center hidden-xs hidden-sm" colspan="2"><?= V($LTranslates, 'Currency') ?></th>
                    </tfoot>
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
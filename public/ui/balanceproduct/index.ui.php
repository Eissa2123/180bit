<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('balance') ?>"><?= V($LTranslates, 'Balances') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'BalanceProducts') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('balanceproduct/add') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Add') ?>
                    <i class="glyphicon glyphicon-plus"></i> 
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <form action="<?= WLink('balanceproduct/prints') ?>" method="post" target="_blank">

                    <input type="hidden" name="code" value="<?= V($LPosts, 'Code') ?>" />
                    <input type="hidden" name="ncid" value="<?= V($LPosts, 'NCID') ?>" />
                    <input type="hidden" name="firstname" value="<?= V($LPosts, 'Firstname') ?>" />
                    <input type="hidden" name="lastname" value="<?= V($LPosts, 'Lastname') ?>" />
                    <input type="hidden" name="username" value="<?= V($LPosts, 'Username') ?>" />
                    <input type="hidden" name="country" value="<?= V($LPosts, 'Country') ?>" />
                    <input type="hidden" name="sdatefrom" value="<?= V($LPosts, 'SDateFrom') ?>" />
                    <input type="hidden" name="sdateto" value="<?= V($LPosts, 'SDateTo') ?>" />
                    <input type="hidden" name="edatefrom" value="<?= V($LPosts, 'EDateFrom') ?>" />
                    <input type="hidden" name="edateto" value="<?= V($LPosts, 'EDateTo') ?>" />
                    <input type="hidden" name="from" value="<?= V($LPosts, 'From') ?>" />
                    <input type="hidden" name="to" value="<?= V($LPosts, 'To') ?>" />
                    <input type="hidden" name="length" value="<?= V($LPosts, 'Length') ?>" />
                    <input type="hidden" name="page" value="<?= V($LPosts, 'Page') ?>" />
                    
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
                    <form action="<?= WLink('balanceproduct') ?>" method="post">
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                            <div class="form-group">
                                <select class="form-control multiselect" id="multiselect-products" name="products[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'Product') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                    <?php if (isset($LProducts)){  ?>
                                        <?php foreach ($LProducts as $Product) { ?>
                                        <option value="<?= V($Product,'ID') ?>" <?= I($Product, 'ID', $LPosts,'Products') ? 'selected="selected"' : '' ?>>
                                        <?= V($Product,'Code') ?> - <?= V($Product,'Name') ?></option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
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
									<a href="<?= WLink('purchase') ?>" class="btn btn-danger btn-block btn-control" role="button"><?= V($LTranslates,'Clean') ?>  
										<i class="glyphicon glyphicon-repeat"></i> 
									</a>
								</div>
							</div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body" id="repport">
                <?php if (isset($LBalances)){  ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'ID') ?></th>
                        <th class="text-center"><?= V($LTranslates,'Product') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Price') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Quantity') ?></th>
                        <?php /*<th class="text-center hidden-xs"><?= V($LTranslates,'State') ?></th> */ ?>
                        <th class="text-center actions">&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php foreach ($LBalances as $Balance) { ?>
                        <tr>
                            <td class="text-center hidden-xs"><?= V($Balance,'ID') ?></td> 
                            <td class="text-center"><?= V($Balance,'Product', 'Name') ?></td> 
                            <td class="text-left hidden-xs tel"><?= V($Balance,'Price') ?></td>
                            <td class="text-center hidden-xs tel"><?= V($Balance,'Quantity') ?></td>
                            <?php /*<td class="text-center">
                                <span class="label label-<?= V($Balance,'State', 'Class') ?>"><?= V($Balance,'State','Name'.LNG) ?></span> 
                            </td> */?>
                            <td class="text-center actions">
                                <a href="<?= WLink('balanceproduct/print/'.V($Balance,'ID')) ?>" title="<?= V($LTranslates,'Print') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                                <a href="<?= WLink('balanceproduct/display/'.V($Balance,'ID')) ?>" title="<?= V($LTranslates,'Display') ?>"><span class="glyphicon glyphicon-eye-open"></span></a>	
                                <a href="<?= WLink('balanceproduct/edit/'.V($Balance,'ID')) ?>" title="<?= V($LTranslates,'Edit') ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                <a href="<?= WLink('balanceproduct/remove/'.V($Balance,'ID')) ?>" title="<?= V($LTranslates,'Remove') ?>"><span class="glyphicon glyphicon-trash"></span></a>

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
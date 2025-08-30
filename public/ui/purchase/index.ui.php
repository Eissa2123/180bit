<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Purchases') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('purchase/add') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Add') ?>   
                    <i class="glyphicon glyphicon-plus"></i> 
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <form action="<?= WLink('purchase/prints') ?>" method="post" target="_blank">

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

                    <?php if(L($LPosts, 'Genders')){ ?>
                        <?php foreach (V($LPosts, 'Genders') as $Gender) { ?>
                            <input type="hidden" name="genders[]" value="<?= $Gender ?>" />
                        <?php }  ?>
                    <?php }  ?>

                    <?php if(L($LPosts, 'Jobs')){ ?>
                        <?php foreach (V($LPosts, 'Jobs') as $Job) { ?>
                            <input type="hidden" name="jobs[]" value="<?= $Job ?>" />
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
                    <form action="<?= WLink('purchase') ?>" method="post">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
                            <div class="form-group">
                                <select class="form-control multiselect" id="multiselect-providers" name="providers[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'Provider') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                    <?php if (isset($LProviders)){  ?>
                                        <?php foreach ($LProviders as $Provider) { ?>
                                        <option value="<?= V($Provider,'ID') ?>" <?= I($Provider, 'ID', $LPosts,'Providers') ? 'selected="selected"' : '' ?>>
                                        <?= V($Provider,'Code') ?> - <?= V($Provider,'Companyname') ?> : <?= V($Provider,'Job') ?></option>
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
                <?php if (isset($LPurchases)){  ?>
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'ID') ?></th>
                        <th class="text-center"><?= V($LTranslates,'Code') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Provider') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'AT') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'TTC') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Paid') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Return') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Rest') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'State') ?></th>
                        <th class="text-center actions">&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php foreach ($LPurchases as $Purchase) { ?>
                        <tr class="<?= V($Purchase,'State', 'Class') ?>">
                            <td class="text-center hidden-xs"><?= V($Purchase,'ID') ?></td> 
                            <td class="text-center"><?= V($Purchase,'Code') ?></td> 
                            <td class="text-center hidden-xs">
                                <?= V($Purchase,'Provider','Companyname') ?>
                            </td> 
                            <td class="text-center hidden-xs hidden-sm"><?= V($Purchase,'AT') ?></td> 
                            <td class="text-left hidden-xs tel"><?= V($Purchase,'TTC') ?></td>
                            <td class="text-left hidden-xs tel"><?= V($Purchase,'Paid') ?></td>
                            <td class="text-left hidden-xs tel"><?= V($Purchase,'Return') ?></td>
                            <td class="text-left hidden-xs tel"><?= V($Purchase,'Rest') ?></td>
                            <td class="text-center hidden-xs hidden-sm"><span class="label label-<?= V($Purchase,'State', 'Class') ?>"><?= V($Purchase,'State','Name'.LNG) ?></span></td> 
                            <td class="text-center actions">
                                <a href="<?= WLink('purchase/print/'.V($Purchase,'ID')) ?>" title="<?= V($LTranslates,'Print') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                                <a href="<?= WLink('purchase/display/'.V($Purchase,'ID')) ?>" title="<?= V($LTranslates,'Display') ?>"><span class="glyphicon glyphicon-eye-open"></span></a>	
                                <a href="<?= WLink('purchasepayment/'.V($Purchase,'ID')) ?>" title="<?= V($LTranslates,'Payments') ?>"><span class="glyphicon glyphicon-usd"></span></a>
                                <a href="<?= WLink('purchasereturn/'.V($Purchase,'ID')) ?>" title="<?= V($LTranslates,'Returns') ?>"><span class="glyphicon glyphicon-share-alt"></span></a>
                                <?php /*
                                <a href="<?= WLink('purchase/edit/'.V($Purchase,'ID')) ?>" title="<?= V($LTranslates,'Edit') ?>"><span class="glyphicon glyphicon-edit"></span></a>	
                                <a href="<?= WLink('purchase/remove/'.V($Purchase,'ID')) ?>" title="<?= V($LTranslates,'Remove') ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                */ ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <th class="text-center hidden-xs hidden-sm" colspan="4"></th>
                        <th class="text-left hidden-xs hidden-sm tel"><?= V($TPR, 'TTCs') ?></th>
                        <th class="text-left hidden-xs hidden-sm tel"><?= V($TPR, 'Paids') ?></th>
                        <th class="text-left hidden-xs hidden-sm tel"><?= V($TPR, 'Returns') ?></th>
                        <th class="text-left hidden-xs hidden-sm tel"><?= V($TPR, 'Rests') ?></th>
                        <th class="text-center hidden-xs hidden-sm" colspan="3"><?= V($LTranslates, 'Currency') ?></th>
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
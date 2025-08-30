<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('purchase') ?>"><?= V($LTranslates, 'Purchases') ?></a></li>
                    <li><a href="<?= WLink('purchase/display/'.V($LPosts, 'Facture')) ?>"><?= V($LTranslates, 'Purchase') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Returns') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('purchasereturn/add/'.V($LPosts, 'Facture')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Add') ?>   
                    <i class="glyphicon glyphicon-plus"></i> 
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <form action="<?= WLink('purchasereturn/prints') ?>" method="post" target="_blank">

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
            <div class="panel-body" id="repport">
                <?php if (isset($LPurchasereturns)){  ?>
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'ID') ?></th>
                        <th class="text-center"><?= V($LTranslates,'Code') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'AT') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'TTC') ?></th>
                        <th class="text-center actions">&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php foreach ($LPurchasereturns as $Purchasereturn) { ?>
                        <tr>
                            <td class="text-center hidden-xs"><?= V($Purchasereturn,'ID') ?></td> 
                            <td class="text-center"><?= V($Purchasereturn,'Code') ?></td> 
                            <td class="text-center hidden-xs hidden-sm"><?= V($Purchasereturn,'AT') ?></td> 
                            <td class="text-left hidden-xs"><?= V($Purchasereturn,'TTC') ?></td>
                            <td class="text-center actions">
                                <a href="<?= WLink('purchasereturn/print/'.V($Purchasereturn,'ID')) ?>" title="<?= V($LTranslates,'Print') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a>	
                                <a href="<?= WLink('purchasereturn/display/'.V($Purchasereturn,'ID')) ?>" title="<?= V($LTranslates,'Display') ?>"><span class="glyphicon glyphicon-eye-open"></span></a>	
                                <?php /*
                                <a href="<?= WLink('purchasereturn/edit/'.V($Purchasereturn,'ID')) ?>" title="<?= V($LTranslates,'Edit') ?>"><span class="glyphicon glyphicon-edit"></span></a>	
                                <a href="<?= WLink('purchasereturn/remove/'.V($Purchasereturn,'ID')) ?>" title="<?= V($LTranslates,'Remove') ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                */?>	
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <th class="text-center hidden-xs hidden-sm" colspan="3"><?= V($LTranslates,'TTC') ?></th>
                        <th class="text-left hidden-xs hidden-sm"><?= V($TPR, 'Total') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates, 'Currency') ?></th>
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
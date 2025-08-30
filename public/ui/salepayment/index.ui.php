<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('sale') ?>"><?= V($LTranslates, 'Sales') ?></a></li>
                    <li><a href="<?= WLink('sale/display/'.V($LPosts, 'Sale')) ?>"><?= V($LPosts, 'Sale') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Payments') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('salepayment/add/'.V($LPosts, 'Sale')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Add') ?>  
                    <i class="glyphicon glyphicon-plus"></i> 
                </a>
            </div>
            <?php /*<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <form action="<?= WLink('salepayment/prints') ?>" method="post" target="_blank">

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
            </div> */ ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body" id="printer">
                <?php if (isset($LSalepayments)){ ?>
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'ID') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Code') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Facture') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Customer') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'AT') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Amount') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'Method') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'Receipt') ?></th>
                        <th class="text-center"><?= V($LTranslates,'State') ?></th>
                        <th class="text-center actions">&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php foreach ($LSalepayments as $Payment) { ?>
                            <tr class="<?= V($Payment,'State', 'Class') ?>">
                                <td class="text-center hidden-xs hidden-sm"><?= V($Payment,'ID') ?></td> 
                                <td class="text-center hidden-xs"><?= V($Payment,'Code') ?></td> 
                                <td class="text-center hidden-xs"><?= V($Payment,'Facture', 'Code') ?></td> 
                                <td class="text-center hidden-xs">
                                    <?= V($Payment,'Customer', 'Companyname') ?>
                                </td> 
                                <td class="text-center hidden-xs hidden-sm"><?= V($Payment,'AT') ?></td> 
                                <td class="text-left hidden-xs"><?= V($Payment,'Amount') ?></td> 
								<td class="text-center hidden-xs hidden-sm"><?= V($Payment,'Method', 'Name'.LNG) ?></td>
								<td class="text-center hidden-xs hidden-sm">
                                    <?php if(V($Payment,'Type') == '-1'){ ?>
                                        <label class="label label-danger">
                                            <span class="glyphicon glyphicon-arrow-up"></span> <?= V($LTranslates,'ReceiptOUT') ?>
                                        </label>
                                    <?php }else{  ?>
                                        <label class="label label-success">
                                            <span class="glyphicon glyphicon-arrow-down"></span> <?= V($LTranslates,'ReceiptIN') ?>
                                        </label>
                                    <?php } ?>
                                </td>
                                <td class="text-center"><span class="label label-<?= V($Payment,'State', 'Class') ?>"><?= V($Payment,'State', 'Name'.LNG) ?></span></td> 
                                <td class="text-center actions">
                                    <a href="<?= WLink('salepayment/print/'.V($Payment,'ID')) ?>" title="<?= V($LTranslates,'Edit') ?>" target="_black"><span class="glyphicon glyphicon-print"></span></a>	
                                    <?php /*
                                    <a href="<?= WLink('salepayment/edit/'.V($Payment,'ID')) ?>" title="<?= V($LTranslates,'Edit') ?>"><span class="glyphicon glyphicon-edit"></span></a>	
                                    <a href="<?= WLink('salepayment/remove/'.V($Payment,'ID')) ?>" title="<?= V($LTranslates,'Remove') ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    */?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php }else{ ?>
                    <div class="alert alert-warning" role="alert"><?= V($LTranslates,'EResults') ?></div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('purchase') ?>"><?= V($LTranslates, 'Purchases') ?></a></li>
                    <li><a href="<?= WLink('purchase/display/'.V($LPosts, 'Purchase')) ?>"><?= V($LPosts, 'Purchase') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Payments') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('purchasepayment/add/'.V($LPosts, 'Purchase')) ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Add') ?>  
                    <i class="glyphicon glyphicon-plus"></i> 
                </a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body" id="printer">
                <?php if (isset($LPurchasepayments)){ ?>
                <table class="table table-bordered">
                    <thead>
                        <?php /*<th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'ID') ?></th> */?>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Code') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Facture') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Provider') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'AT') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Amount') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'Method') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'Receipt') ?></th>
                        <th class="text-center"><?= V($LTranslates,'State') ?></th>
                        <th class="text-center actions">&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php foreach ($LPurchasepayments as $Payment) { ?>
                            <tr class="<?= V($Payment,'State', 'Class') ?>">
                                <?php /*<td class="text-center hidden-xs hidden-sm"><?= V($Payment,'ID') ?></td> */?>
                                <td class="text-center hidden-xs"><?= V($Payment,'Code') ?></td> 
                                <td class="text-center hidden-xs"><?= V($Payment,'Facture', 'Code') ?></td> 
                                <td class="text-center hidden-xs">
                                    <?= V($Payment,'Provider', 'Companyname') ?>
                                </td> 
                                <td class="text-center hidden-xs hidden-sm"><?= V($Payment,'AT') ?></td> 
                                <td class="text-left hidden-xs"><?= V($Payment,'Amount') ?></td> 
								<td class="text-center hidden-xs hidden-sm"><?= V($Payment,'Method', 'Name'.LNG) ?></td>
								<td class="text-center hidden-xs hidden-sm">
                                    <?php if(V($Payment,'Type') == '-1'){ ?>
                                        <label class="label label-danger">
                                            <span class="glyphicon glyphicon-arrow-up"></span> <?= V($LTranslates,'ReceiptOUT') ?>
                                        </label>
                                    <?php }else if(V($Payment,'Type') == '1'){  ?>
                                        <label class="label label-success">
                                            <span class="glyphicon glyphicon-arrow-down"></span> <?= V($LTranslates,'ReceiptIN') ?>
                                        </label>
                                    <?php } ?>
                                </td>
                                <td class="text-center"><span class="label label-<?= V($Payment,'State', 'Class') ?>"><?= V($Payment,'State', 'Name'.LNG) ?></span></td> 
                                <td class="text-center actions">
                                    <a href="<?= WLink('purchasepayment/print/'.V($Payment,'ID')) ?>" title="<?= V($LTranslates,'Print') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a>	
                                    <?php /*<a href="<?= WLink('purchasepayment/edit/'.V($Payment,'ID')) ?>" title="<?= V($LTranslates,'Edit') ?>"><span class="glyphicon glyphicon-edit"></span></a>	
                                    <a href="<?= WLink('purchasepayment/remove/'.V($Payment,'ID')) ?>" title="<?= V($LTranslates,'Remove') ?>"><span class="glyphicon glyphicon-trash"></span></a>	
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
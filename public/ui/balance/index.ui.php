<div class="container-fluid">
	<div id="content">
        
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Balances') ?></li>
                </ol>
            </div>
        </div>
        <div class="panel panel-default panel-noborder">
            <div class="panel-body">

                <div class="row">
                    
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('balancefinancial') ?>">
                            <div class="thumbnail thumbnail-1 bb-485a69">
                                <img src="<?= WASSETS ?>themes/default/images/revenue.png" />
                                <div class="caption">
                                    <h4 class="text-center"><strong><?= V($LTranslates,'Financials') ?></strong></h4>
                                </div>
                                <div class="verified"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('balancecustomer') ?>">
                            <div class="thumbnail thumbnail-1 bb-485a69">
                                <img src="<?= WASSETS ?>themes/default/images/revenue.png" />
                                <div class="caption">
                                    <h4 class="text-center"><strong><?= V($LTranslates,'Customers') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('balanceprovider') ?>">
                            <div class="thumbnail thumbnail-1 bb-485a69">
                                <img src="<?= WASSETS ?>themes/default/images/revenue.png" />
                                <div class="caption">
                                    <h4 class="text-center"><strong><?= V($LTranslates,'Providers') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('balanceproduct') ?>">
                            <div class="thumbnail thumbnail-1 bb-485a69">
                                <img src="<?= WASSETS ?>themes/default/images/revenue.png" />
                                <div class="caption">
                                    <h4 class="text-center"><strong><?= V($LTranslates,'Products') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
					
                </div>
                
            </div>
        </div>
    </div>
</div>
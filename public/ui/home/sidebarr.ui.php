<!DOCTYPE html>
<html lang="en"> 

      <?php if(Has('B', 'Box|Reports|Providers|Marketers|Expenses|Purchasesquotations|Purchases|Purchasespayments|Customers|Revenues|Salesquotations|Sales|Salespayments|Employees|Categories|Products|Cobons|Restrictions|Terms|Settings|Privileges|Tools|Historiques', ALL)){ ?>
          <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
          <link rel="stylesheet" href="styles.css">
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          
        <div class="body">
            <div class="col-sm-3">
                                
                <div class="sidebar-nav">

                 <ul><li><a href="#">Home</a></li></ul>


                 <ul>
                    <li class="dropdown"><a href="#">sales<span>&rsaquo;</span></a>
                     <ul>
                        <li><a href="#">invoice</a></li>
                        <li><a href="#">payments</a></li>
                        <li><a href="#">quta</a></li>
                     </ul>
                    </li>

                 </ul>
                </div>

                
            </div>

                    <div class="row-md-1">
					 <?php if(Has('B', 'Box', ALL)){ ?>
                     <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('box') ?>">
                            <div class="thumbnail thumbnail-1 bb-9ccb5b">
                                <label class="bg-9ccb5b"><?= V($Boxs, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/box.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Box') ?></strong></h4>
                                </div>
                                <div class="verified"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                     </div>
                     <?php } ?>
					
                     <?php if(Has('B', 'Reports', ALL)){ ?>
                     <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('report') ?>">
                            <div class="thumbnail thumbnail-1 bb-eb5151">
                                <label class="bg-eb5151"><?= V($Reports, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/report.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Reports') ?></strong></h4>
                                </div>
                                <div class="verified"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                     </div>
                     <?php } ?>
                    </div>

                    <div class="row-md-1">
                    
                     <?php if(Has('B', 'Providers', ALL)){ ?>
                      <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('provider') ?>">
                            <div class="thumbnail thumbnail-1 bb-485a69">
                                <label class="bg-485a69"><?= V($Providers, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/provider.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Providers') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                      </div>
                     <?php } ?>

                     <?php if(Has('B', 'Marketers', ALL)){ ?>
                      <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('marketer') ?>">
                            <div class="thumbnail thumbnail-1 bb-485a69">
                                <label class="bg-485a69"><?= V($Marketers, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/marketer.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Marketers') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                      </div>
                     <?php } ?>
                    
                     <?php if(Has('B', 'Expenses', ALL)){ ?>
                      <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('expense') ?>">
                            <div class="thumbnail thumbnail-1 bb-ebf0f1">
                                <label class="bg-ebf0f1"><?= V($Expenses, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img class="img-bg" src="<?= WASSETS ?>themes/default/images/expense.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Expenses') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                      </div>
                     <?php } ?>
                    
                     <?php if(Has('B', 'Purchasesquotations', ALL)){ ?>
                     <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('purchasequotation') ?>">
                            <div class="thumbnail thumbnail-1 bb-eb5151">
                                <label class="bg-eb5151"><?= V($PurchasesQuotations, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/purchases-quotations.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'PurchasesQuotations') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                     </div>
                     <?php } ?>
                    
                     <?php if(Has('B', 'Purchases', ALL)){ ?>
                     <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('purchase') ?>">
                            <div class="thumbnail thumbnail-1 bb-4fa7a0">
                                <label class="bg-4fa7a0"><?= V($PurchasesInvoices, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/purchase-invoices.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'PurchasesInvoices') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                     </div>
                     <?php } ?>
                    
                     <?php if(Has('B', 'Purchasespayments', ALL)){ ?>
                     <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('purchasepayment') ?>">
                            <div class="thumbnail thumbnail-1 bb-4fa7a0">
                                <label class="bg-4fa7a0"><?= V($PurchasesPayments, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/purchase-payments.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'PurchasesBills') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                     </div>
                     <?php } ?>
                    </div>

                    
		</div>

    <?php }else{ ?> 

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
                <img style="width:85%;background-color:#485a69;border-radius:50%;" src="<?= $LogoContent ?>" />
            </div>
        </div>

    <?php } ?>

</html>

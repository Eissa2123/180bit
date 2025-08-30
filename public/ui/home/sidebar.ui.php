
    <div class="container-fluid">
    </div>
	<div id="content">

      <?php if(Has('B', 'Box|Reports|Providers|Marketers|Expenses|Purchasesquotations|Purchases|Purchasespayments|Customers|Revenues|Salesquotations|Sales|Salespayments|Employees|Categories|Products|Cobons|Restrictions|Terms|Settings|Privileges|Tools|Historiques', ALL)){ ?>

        <div class="panel panel-default panel-noborder" style="min-height:400px;">
            <div class="panel-body">
                 <nav class="sidebar close">
                    <header>
                    <!--Logo-->
                      <div class="image-text">
                        <span class="image">
                         <img src="<?= WASSETS ?>themes/default/images/goleenkit.png" alt="logo"/>
                        </span>
                      </div>   
                    <!--Logo-->

                    <!--Image Text-->
                      <div class="text header-text">
                        <span class="name">180BIT</span>
                        <span class="profession">Company</span>
                      </div>   
                    <!--Image Text-->

                    <!--Icon-->
                     <i class='bx bx-chevron-left toggle'></i>
                    <!--Icon-->
                    </header>

                   <div class="menu">
                  <!--MENU SIDEBAR-->
                   <?php if(Has('B', 'Box', ALL)){ ?>
                      <ul>
                       <li>
                         <a href="<?= WLink('box') ?>">
                           <i class='bx bxs-bank icon'></i>
                           <span class="text text-left"><strong><?= V($LTranslates,'Box') ?></strong></span>
                         </a>
                       </li>
                      </ul>
                    <?php } ?>  
                  <!--MENU SIDEBAR-->

                  <!--MENU SIDEBAR-->
                                    <?php if(Has('B', 'Box', ALL)){ ?>
                      <ul>
                       <li>
                         <a href="<?= WLink('box') ?>">
                           <i class='bx bxs-bank icon'></i>
                           <span class="text text-left"><strong><?= V($LTranslates,'Box') ?></strong></span>
                         </a>
                       </li>
                      </ul>
                    <?php } ?>  
                  <!--MENU SIDEBAR-->

                  <!--MENU SIDEBAR-->
                                    <?php if(Has('B', 'Box', ALL)){ ?>
                      <ul>
                       <li>
                         <a href="<?= WLink('box') ?>">
                           <i class='bx bxs-bank icon'></i>
                           <span class="text text-left"><strong><?= V($LTranslates,'Box') ?></strong></span>
                         </a>
                       </li>
                      </ul>
                    <?php } ?>  
                  <!--MENU SIDEBAR-->

                  <!--MENU SIDEBAR-->
                                    <?php if(Has('B', 'Box', ALL)){ ?>
                      <ul>
                       <li>
                         <a href="<?= WLink('box') ?>">
                           <i class='bx bxs-bank icon'></i>
                           <span class="text text-left"><strong><?= V($LTranslates,'Box') ?></strong></span>
                         </a>
                       </li>
                      </ul>
                    <?php } ?>  
                  <!--MENU SIDEBAR-->






                  <!--LOGOUT & SWICH MODE-->
                    <div class="bottom">
                     <ul>
                      <li class="">
                       <a href="<?= WLink('authentification/logout') ?>">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text text-left"><strong>LOGOUT<?= V($LTranslates,'Exit') ?></strong></span>
                       </a>
                      </li>
                     </ul>
                    </div>
                  <!--LOGOUT & SWICH MODE-->
                 </div>
                </nav> 
                  <div class="row">
                    
                    <?php 
                    /*<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <div class="thumbnail thumbnail-1 bb-16b9ba">
                            <label class="bg-16b9ba"
                               <!-- <span class="glyphicon glyphicon-dashboard"></span>
                                <span class="glyphicon glyphicon-dashboard"></span>
                                <span class="glyphicon glyphicon-dashboard"></span>
                                <span class="glyphicon glyphicon-dashboard"></span>
                                <span class="glyphicon glyphicon-dashboard"></span>-->
                            </label>
                            <div class="triangle"></div>
                            <img src="<?= WASSETS ?>themes/default/images/dashboard.png" />
                            <div class="caption">
                                <h4 class="text-center"><a href="<?= WLink('dashboard') ?>"><strong><?= V($LTranslates,'Dashboard') ?></strong></a></h4>
                            </div>
                        </div>
                    </div> 
                    */ ?>
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

                <div class="row">
                    
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

                <div class="row">
                    
                    <?php if(Has('B', 'Customers', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('customer') ?>">
                            <div class="thumbnail thumbnail-1 bb-f5eee5">
                                <label class="bg-f5eee5"><?= V($Customers, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/customer.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Customers') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Revenues', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('balance') ?>">
                            <div class="thumbnail thumbnail-1 bb-3498db">
                                <label class="bg-3498db"></label>
                                <div class="triangle"></div>
                                <img class="img-bg" src="<?= WASSETS ?>themes/default/images/revenue.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Revenues') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Salesquotations', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('salequotation') ?>">
                            <div class="thumbnail thumbnail-1 bb-698e7e">
                                <label class="bg-698e7e"><?= V($SalesQuotations, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/sales-quotations.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'SalesQuotations') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Sales', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('sale') ?>">
                            <div class="thumbnail thumbnail-1 bb-4fa7a0">
                                <label class="bg-4fa7a0"><?= V($SalesInvoices, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/sale-invoices.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'SalesInvoices') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Salespayments', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('salepayment') ?>">
                            <div class="thumbnail thumbnail-1 bb-4fa7a0">
                                <label class="bg-4fa7a0"><?= V($SalesPayments, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/sales-payments.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'SalesBills') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
					
                </div>
				
				<div class="row">
                    
                    <?php if(Has('B', 'Employees', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('employee') ?>">
                            <div class="thumbnail thumbnail-1 bb-f5eee5">
                                <label class="bg-f5eee5"><?= V($Employees, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/employee.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Employees') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Categories', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('category') ?>">
                            <div class="thumbnail thumbnail-1 bb-e0e0d1">
                                <label class="bg-e0e0d1"><?= V($Categories, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img class="img-bg" src="<?= WASSETS ?>themes/default/images/category.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Categories') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Products', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('product') ?>">
                            <div class="thumbnail thumbnail-1 bb-62bee7">
                                <label class="bg-62bee7"><?= V($Products, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img class="img-bg" src="<?= WASSETS ?>themes/default/images/product.svg" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Products') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Cobons', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('cobon') ?>">
                            <div class="thumbnail thumbnail-1 bb-5fbac5">
                                <label class="bg-5fbac5"><?= V($Cobons, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img class="img-bg" src="<?= WASSETS ?>themes/default/images/cobon.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Cobons') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Restrictions', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('restriction') ?>">
                            <div class="thumbnail thumbnail-1 bb-77b3d4">
                                <label class="bg-77b3d4"><?= V($Restrictions, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img class="img-bg" src="<?= WASSETS ?>themes/default/images/restriction.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Restrictions') ?></strong></h4>
                                </div>
                            </div>
                            <div class="verified"><span class="glyphicon glyphicon-ok"></span></div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Terms', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('term') ?>">
                            <div class="thumbnail thumbnail-1 bb-76c2af">
                                <label class="bg-76c2af"><?= V($Terms, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img class="img-bg" src="<?= WASSETS ?>themes/default/images/term.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Terms') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
					
				</div>
				
				<div class="row">
                    
                    <?php if(Has('B', 'Settings', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('setting') ?>">
                            <div class="thumbnail thumbnail-1 bb-334d5c">
                                <label class="bg-334d5c"><?= V($Settings, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/setting.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Settings') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Privileges', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('privilege') ?>">
                            <div class="thumbnail thumbnail-1 bb-c75c5c">
                                <label class="bg-c75c5c"><?= V($Jobs, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/privilege.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Jobs') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Tools', ALL)){ ?>
                    <?php /*<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('tool') ?>">
                            <div class="thumbnail thumbnail-1 bb-76c2af">
                                <label class="bg-76c2af"><?= V($Tools, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/tool.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Tools') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div> */ ?>
                    <?php } ?>
                    
                    <?php if(Has('B', 'Historiques', ALL)){ ?>
                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                        <a href="<?= WLink('historique') ?>">
                            <div class="thumbnail thumbnail-1 bb-76c2af">
                                <label class="bg-fdd93b"><?= V($Historiques, 'Count') ?></label>
                                <div class="triangle"></div>
                                <img src="<?= WASSETS ?>themes/default/images/historique.png" />
                                <div class="caption">
                                    <h4 class="text-left"><strong><?= V($LTranslates,'Historiques') ?></strong></h4>
                                </div>
                                <div class="verified verified-ok"><span class="glyphicon glyphicon-ok"></span></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                </div>
                
            </div>
        </div>
        
    <?php }else{ ?> 

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
                <img style="width:85%;background-color:#485a69;border-radius:50%;" src="<?= $LogoContent ?>" />
            </div>
        </div>

    <?php } ?>
 </div>
    <div></div>
</div>


                  <!--MENU WITH SUB SIDEBAR-->
                  <ul>
                     <li class="dropdowne">
                        <a href="#">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text ">Sales</span>
                            <span>&rsaquo;</span>
                        </a>
                      <ul>
                        <li><a href="#">invoice</a></li>
                        <li><a href="#">payments</a></li>
                        <li><a href="#">quta</a></li>
                      </ul>
                     </li>
                    </ul>
                  <!--MENU WITH SUB SIDEBAR-->







                    <!--- HEADER --->
  <div class="header">
    <div class="company-img"><img src="<?= WASSETS ?>themes/default/images/goleenkit.png" alt="logo" /></div>
    <div class="title">
      <p class="first">GOLDEN KIT EST</p>
      <p class="last">FOR CLODHTS</p>
    </div>
  </div>
  <!--- HEADER --->

  <!--- MENU --->
  <div class="nav">
    <div class="menu">
      <ul>
        <!--- MENU WITH DROPDOWN FOR PURCHASES--->
        <li>
          <a href="#">
            <img src="<?= WASSETS ?>themes/default/images/expenses.png" alt="logo" style="width:20px;" />
            <span class="text2">المنتجات</strong></span>
            <i class="arrow ph-bold ph-caret-down"></i>
          </a>
          <ul class="sub-menu">
            <li>
              <?php if (Has('B', 'Categories', ALL)) { ?>
                <a href="<?= WLink('category') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'Categories') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Products', ALL)) { ?>
                <a href="<?= WLink('product') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'Products') ?></strong></span>
                </a>
              <?php } ?>
            </li>
          </ul>
        </li>
        <!--- MENU WITH DROPDOWN FOR PURCHASES--->


        <!--- MENU WITH DROPDOWN FOR PURCHASES--->
        <li>
          <a href="#">
            <img src="<?= WASSETS ?>themes/default/images/expenses.png" alt="logo" style="width:20px;" />
            <span class="text2">المشتريات</strong></span>
            <i class="arrow ph-bold ph-caret-down"></i>
          </a>
          <ul class="sub-menu">
            <li>
              <?php if (Has('B', 'Providers', ALL)) { ?>
                <a href="<?= WLink('provider') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'Providers') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Purchases', ALL)) { ?>
                <a href="<?= WLink('purchase') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'PurchasesInvoices') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Purchasesquotations', ALL)) { ?>
                <a href="<?= WLink('purchasequotation') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'PurchasesQuotations') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Purchasespayments', ALL)) { ?>
                <a href="<?= WLink('purchasepayment') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'PurchasesBills') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Expenses', ALL)) { ?>
                <a href="<?= WLink('expense') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'Expenses') ?></strong></span>
                </a>
              <?php } ?>
            </li>
          </ul>
        </li>
        <!--- MENU WITH DROPDOWN FOR PURCHASES--->

        <!--- MENU WITH DROPDOWN FOR SALES--->
        <li>
          <a href="#">
            <img src="<?= WASSETS ?>themes/default/images/growth.png" alt="logo" style="width:20px;" />
            <span class="text2"><strong>المبيعات</strong></span>
            <i class="arrow ph-bold ph-caret-down"></i>
          </a>
          <ul class="sub-menu">
            <li>
              <?php if (Has('B', 'Customers', ALL)) { ?>
                <a href="<?= WLink('customer') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'Customers') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Sales', ALL)) { ?>
                <a href="<?= WLink('sale') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'SalesInvoices') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Salesquotations', ALL)) { ?>
                <a href="<?= WLink('salequotation') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'SalesQuotations') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Salespayments', ALL)) { ?>
                <a href="<?= WLink('salepayment') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'SalesBills') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Marketers', ALL)) { ?>
                <a href="<?= WLink('marketer') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'Marketers') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Cobons', ALL)) { ?>
                <a href="<?= WLink('cobon') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'Cobons') ?></strong></span>
                </a>
              <?php } ?>
            </li>
            <li>
              <?php if (Has('B', 'Terms', ALL)) { ?>
                <a href="<?= WLink('term') ?>">
                  <span class="text2"><strong><?= V($LTranslates, 'Terms') ?></strong></span>
                </a>
              <?php } ?>
            </li>
          </ul>
        </li>
        <!--- MENU WITH DROPDOWN FOR SALES--->

        <!--- MENU WITHOUT DROPDOWN --->
        <li>
          <?php if (Has('B', 'Box', ALL)) { ?>
            <a href="<?= WLink('box') ?>">
              <img src="<?= WASSETS ?>themes/default/images/safe-box.png" alt="logo" style="width:20px;" />
              <span class="text2"><strong><?= V($LTranslates, 'Box') ?></strong></span>
            </a>
          <?php } ?>
        </li>

        <li>
          <?php if (Has('B', 'Reports', ALL)) { ?>
            <a href="<?= WLink('report') ?>">
              <img src="<?= WASSETS ?>themes/default/images/reports.png" alt="logo" style="width:20px;" />
              <span class="text2"><strong><?= V($LTranslates, 'Reports') ?></strong></span>
            </a>
          <?php } ?>
        </li>
        <!--- MENU WITHOUT DROPDOWN --->
      </ul>
    </div>

    <!--- MENU FOR SITTINGS --->
    <div class="menu">
      <ul>
        <li>
          <?php if (Has('B', 'Settings', ALL)) { ?>
            <a href="<?= WLink('setting') ?>">
              <img src="<?= WASSETS ?>themes/default/images/settings.png" alt="logo" style="width:20px;" />
              <span class="text2"><strong><?= V($LTranslates, 'Settings') ?></strong></span>
            </a>
          <?php } ?>
        </li>
        <li>
          <?php if (Has('B', 'Privileges', ALL)) { ?>
            <a href="<?= WLink('privilege') ?>">
              <i class="arrow ph-bold ph-gear"></i>
              <span class="text2"><strong><?= V($LTranslates, 'Jobs') ?></strong></span>
            </a>
          <?php } ?>
        </li>
        <li>
          <?php if (Has('B', 'Historiques', ALL)) { ?>
            <a href="<?= WLink('historique') ?>">
              <i class="arrow ph-bold ph-gear"></i>
              <span class="text2"><strong><?= V($LTranslates, 'Historiques') ?></strong></span>
            </a>
          <?php } ?>
        </li>
      </ul>
    </div>
    <!--- MENU FOR SITTINGS --->
  </div>

  <!--- MENU FOR LOGOUT AND PROFILE --->
  <div class="menu">
    <ul>
      <li>
        <a href="<?= WLink('authentification/profile') ?>">
          <img src="<?= WASSETS ?>themes/default/images/user.png" alt="logo" style="width:20px;" />
          <span class="text2"><strong>Profile</strong></span>
        </a>
      </li>
      <li>
        <a href="<?= WLink('authentification/logout') ?>">
          <img src="<?= WASSETS ?>themes/default/images/logout.png" alt="logo" style="width:20px;" />
          <span class="text2"><strong>Logout</strong></span>
        </a>
      </li>
    </ul>
  </div>
  <!--- MENU FOR LOGOUT AND PROFILE --->
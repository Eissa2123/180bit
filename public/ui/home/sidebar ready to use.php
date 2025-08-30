
<div class="container-fluid">
    </div>
	<div id="content">

      <?php if(Has('B', 'Box|Reports|Providers|Marketers|Expenses|Purchasesquotations|Purchases|Purchasespayments|Customers|Revenues|Salesquotations|Sales|Salespayments|Employees|Categories|Products|Cobons|Restrictions|Terms|Settings|Privileges|Tools|Historiques', ALL)){ ?>
          <!---------CSS-------->
          <link rel="stylesheet" href="styles.css">
          <!---------CSS-------->

          <!--- Boxicons CSS --->
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
          <!--- Boxicons CSS ---> 
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
                <section class="home">
                  <div class="row">
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
              </section>
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






/*Google Font Import*/
@import url('https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap');
*{
    font-family: 'Almarai', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.body{
	min-height:720px;
	background: rgb(232, 232, 232);
}
.sidebar{
    position:relative;
	top: 0;
	left: 0%;
	width: 230px;
	min-height:720px;
    padding: 10Px 14px;
	background: rgb(255, 255, 255);
	transition: .3s ease;
    border-radius:1%;
    float: right;
    z-index:100 ;
}

.sidebar.close{
	width: 90px;
    opacity: 100%;
}

/*logo*/
.sidebar .image{
    min-width: 70px;
    display: flex;
    align-items: center;
}

.sidebar .image-text img{
    width:65px;
    border-radius:1px;
    padding-bottom: 2px;
}

.sidebar header .image-text{
    display: flex;
    align-items: center;

}
/*logo*/


/*text logo*/
.sidebar.text{
    font-family: 'Almarai', sans-serif;
    font-size: 16px;
    font-weight: 500;
    color: #707070;
    
}

.sidebar.close .text{
    opacity: 0;
}

header .image-text .header-text{
    display: flex;
    
}


.header-text .name{
    font-weight: 600;
}


.header-text .profession{
    margin-top: 2px;
}
/*text logo*/


/*Icon-Slider*/
 .sidebar header .toggle{
    position: absolute;
    float: right;
    left: -13px;
    transform: translateY(-160%);
    height: 25px;
    width: 25px;
    background: #695CFE;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 22px;
    color: white;
}
/*Icon-Slider*/





/*MENU SIDEBAR*/
.sidebar ul{
    position: relative;
    list-style-type: none;
}


.sidebar ul li{
    height: 60px;
}


.sidebar ul li a {
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    font-size: 1.15em;
    text-decoration: none;
    padding: 4px 5px;
    color: #707070;
    transition: 0s ease;
    border-radius: 6px;
}


.sidebar ul li .icon{
    min-width: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    font-weight: 500;
}


.sidebar ul li .icon,
.sidebar ul li .text{
    color: #707070;
    transition: 0s ease;
}


.sidebar ul li a:hover .icon,
.sidebar ul li a:hover .text{
   
    color: white;
    
}


.sidebar ul li a:hover
{
    background: #695CFE;
   
    transition: 0s ease;
}


.sidebar ul ul{
    position: absolute;
    top: 25px;
    right: 220px;
    width:140px;
    display: none;
   
}

.sidebar ul ul span{
    position: absolute;
    left:10px;
}

.sidebar ul .dropdowne{
    position: relative;

}

.sidebar ul  .dropdowne:hover ul{
display: inline;
}
/*MENU SIDEBAR*/


.home{
    position: absolute;
    right: 230px;
    width: calc(100% - 95px);
    background: rgb(241, 240, 240);
}

.sidebar.close ~ .home{
    right: 90px;
     
}


.home .row{
    font-size: larger;
    font-weight: 100;
    padding: 0px 60px;
}
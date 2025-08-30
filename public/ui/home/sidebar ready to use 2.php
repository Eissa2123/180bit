<script src="https://unpkg.com/@phosphor-icons/web"></script>

<div class="container2">
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
              </div> 
            <div class="sidebare">

              <!--- HEADER ---> 
                <div class="header">
                    <div class="company-img"><img src="<?= WASSETS ?>themes/default/images/goleenkit.png" alt="logo"/></div>
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
                            <img src="<?= WASSETS ?>themes/default/images/expenses.png" alt="logo" style="width:20px;"/>
                            <span class="text2">المنتجات</strong></span>
                            <i class="arrow ph-bold ph-caret-down"></i>
                           </a>
                           <ul class="sub-menu">
                            <li>
                              <?php if(Has('B', 'Categories', ALL)){ ?>
                               <a href="<?= WLink('category') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'Categories') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>    
                            <li>
                              <?php if(Has('B', 'Products', ALL)){ ?>
                               <a href="<?= WLink('product') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'Products') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>                
                           </ul>
                         </li>
                        <!--- MENU WITH DROPDOWN FOR PURCHASES--->


                        <!--- MENU WITH DROPDOWN FOR PURCHASES--->
                         <li>
                           <a href="#">
                            <img src="<?= WASSETS ?>themes/default/images/expenses.png" alt="logo" style="width:20px;"/>
                            <span class="text2">المشتريات</strong></span>
                            <i class="arrow ph-bold ph-caret-down"></i>
                           </a>
                           <ul class="sub-menu">
                            <li>
                              <?php if(Has('B', 'Providers', ALL)){ ?>
                               <a href="<?= WLink('provider') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'Providers') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>    
                            <li>
                              <?php if(Has('B', 'Purchases', ALL)){ ?>
                               <a href="<?= WLink('purchase') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'PurchasesInvoices') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li> 
                            <li>
                              <?php if(Has('B', 'Purchasesquotations', ALL)){ ?>
                               <a href="<?= WLink('purchasequotation') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'PurchasesQuotations') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>     
                            <li>
                              <?php if(Has('B', 'Purchasespayments', ALL)){ ?>
                               <a href="<?= WLink('purchasepayment') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'PurchasesBills') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>  
                            <li>
                              <?php if(Has('B', 'Expenses', ALL)){ ?>
                               <a href="<?= WLink('expense') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'Expenses') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>                        
                           </ul>
                         </li>
                        <!--- MENU WITH DROPDOWN FOR PURCHASES--->

                        <!--- MENU WITH DROPDOWN FOR SALES--->
                         <li>
                           <a href="#">
                            <img src="<?= WASSETS ?>themes/default/images/growth.png" alt="logo" style="width:20px;"/>
                            <span class="text2"><strong>المبيعات</strong></span>
                            <i class="arrow ph-bold ph-caret-down"></i>
                           </a>
                           <ul class="sub-menu">
                            <li>
                              <?php if(Has('B', 'Customers', ALL)){ ?>
                               <a href="<?= WLink('customer') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'Customers') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>    
                            <li>
                              <?php if(Has('B', 'Sales', ALL)){ ?>
                               <a href="<?= WLink('sale') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'SalesInvoices') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li> 
                            <li>
                              <?php if(Has('B', 'Salesquotations', ALL)){ ?>
                               <a href="<?= WLink('salequotation') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'SalesQuotations') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>    
                            <li>
                              <?php if(Has('B', 'Salespayments', ALL)){ ?>
                               <a href="<?= WLink('salepayment') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'SalesBills') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>   
                            <li>
                              <?php if(Has('B', 'Marketers', ALL)){ ?>
                               <a href="<?= WLink('marketer') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'Marketers') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>  
                            <li>
                              <?php if(Has('B', 'Cobons', ALL)){ ?>
                               <a href="<?= WLink('cobon') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'Cobons') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>   
                            <li>
                              <?php if(Has('B', 'Terms', ALL)){ ?>
                               <a href="<?= WLink('term') ?>">
                                <span class="text2"><strong><?= V($LTranslates,'Terms') ?></strong></span>
                               </a>
                              <?php } ?>
                            </li>                   
                          </ul>
                         </li>
                        <!--- MENU WITH DROPDOWN FOR SALES--->

                        <!--- MENU WITHOUT DROPDOWN --->
                         <li>
                          <?php if(Has('B', 'Box', ALL)){ ?>
                           <a href="<?= WLink('box') ?>">
                            <img src="<?= WASSETS ?>themes/default/images/safe-box.png" alt="logo" style="width:20px;"/>
                            <span class="text2"><strong><?= V($LTranslates,'Box') ?></strong></span>
                           </a>
                          <?php } ?>
                         </li>

                         <li>
                          <?php if(Has('B', 'Reports', ALL)){ ?>
                           <a href="<?= WLink('report') ?>">
                            <img src="<?= WASSETS ?>themes/default/images/reports.png" alt="logo" style="width:20px;"/>
                            <span class="text2"><strong><?= V($LTranslates,'Reports') ?></strong></span>
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
                               <?php if(Has('B', 'Settings', ALL)){ ?>
                                <a href="<?= WLink('setting') ?>">
                                 <img src="<?= WASSETS ?>themes/default/images/settings.png" alt="logo" style="width:20px;"/>
                                 <span class="text2"><strong><?= V($LTranslates,'Settings') ?></strong></span>
                                </a>
                              <?php } ?>
                             </li>
                             <li>
                              <?php if(Has('B', 'Privileges', ALL)){ ?>
                               <a href="<?= WLink('privilege') ?>">
                                <i class="arrow ph-bold ph-gear"></i>
                                <span class="text2"><strong><?= V($LTranslates,'Jobs') ?></strong></span>
                               </a>
                              <?php } ?>
                             </li>
                             <li>
                             <?php if(Has('B', 'Historiques', ALL)){ ?>
                              <a href="<?= WLink('historique') ?>">
                                <i class="arrow ph-bold ph-gear"></i>
                                <span class="text2"><strong><?= V($LTranslates,'Historiques') ?></strong></span>
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
                           <img src="<?= WASSETS ?>themes/default/images/user.png" alt="logo" style="width:20px;"/>
                            <span class="text2"><strong>Profile</strong></span>
                           </a>
                         </li>
                         <li>
                           <a href="<?= WLink('authentification/logout') ?>">
                           <img src="<?= WASSETS ?>themes/default/images/logout.png" alt="logo" style="width:20px;"/>
                            <span class="text2"><strong>Logout</strong></span>
                           </a>
                         </li>
                      </ul> 
                   </div> 
                        <!--- MENU FOR LOGOUT AND PROFILE --->
            </div> 
          </div> 

            <script> scr="actions.js"</script>




            .container2{
    position: absolute;
    right:25%;
    width: 100%;

}

.sidebare{
    height:auto;
    min-height: 650px;
    width: 256px;
    background:rgba(204, 204, 204, 0.441);
    display: flex;
    gap: 5px;
    flex-direction:column;
    padding:20px;
    border-radius: 30px;
}

.sidebare .header{
    display: flex;
    gap: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #f6f6f6;
}

.company-img{
    width: 60px;
    height: 60px;
}

.company-img img{
    width: 100%;
    object-fit: cover;
}

.title .first{
    font-size: 12px;
    font-weight: 500;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #757575;
    text-transform: uppercase;
}

.title .last{
    font-size: 12px;
    font-weight: 500;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}


.menu .title2{
    font-size: 6px;
    font-weight: 500;
    color: #757575;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.menu ul li{
    list-style:none;
    margin-bottom: 2px;
  
}

.menu ul li a{
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 300;
    text-decoration: none;
    color: #949393;
    border-radius: 8px;
    padding: 7px ;
    transition: all 0.3s;
}

.menu ul li > a:hover{
    color: #000;
    background-color: #f6f6f6;
}



.menu ul li .arrow{
    font-size: 14px;
    color: #000;
}


.menu .sub-menu{
    display: none;
    margin-left: 1px;
    padding-left: 1px;
    padding-top: 1px;
    border-left: 1px solid #f6f6f6;
}

.menu .sub-menu li a{
    padding: 7px 1px;
    font-size: 11px;
}


.menu:not(:last-child){
    padding: 1px;
    margin-bottom: 2px;
    border-bottom: 2px solid #f6f6f6;
}

.nav{
    flex: 1px;
}






$(".menu > ul > li").click(function(e){
        //Open Sub Menu//
        $(this).find("ul").slideToggle();

        //Close Any Sub Menu When Open Onther//
        $(this).siblings().find("ul").slideUp();

        //Remove Sub Menu 
      })
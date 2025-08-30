<div id="content" class="span10">
    
    <div class="row-fluid hideInIE8 circleStats">

        <div class="span4 noMargin" onTablet="span12" onDesktop="span4">
            <div class="circleStatsItemBox blue">
                <div class="header"><?= V($LTranslates, 'Payments') ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="100" class="whiteCircle" />
                </div>		
                <div class="footer">
                    <span class="value">
                        <span class="number"><?= V($Payements, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>
        
        <div class="span2 noMargin" onTablet="span3" onDesktop="span2">
            <div class="circleStatsItemBox green">
                <div class="header"><?= V($Payements, 'Payed', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Payements, 'Payed', 'Percent') ?>" class="whiteCircle" />
                </div>		
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Payements, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>

        <div class="span2" onTablet="span2" onDesktop="span2">
            <div class="circleStatsItemBox red">
                <div class="header"><?= V($Payements, 'Waiting', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Payements, 'Waiting', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Payements, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>

        <div class="span2" onTablet="span2" onDesktop="span2">
            <div class="circleStatsItemBox yellow">
                <div class="header"><?= V($Payements, 'Completed', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Payements, 'Completed', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Payements, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>

        <div class="span2 noMargin" onTablet="span2" onDesktop="span2">
            <div class="circleStatsItemBox pink">
                <div class="header"><?= V($Payements, 'Bloked', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Payements, 'Bloked', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Payements, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>
                
    </div>
    
    <div class="row-fluid hideInIE8 circleStats">

        <div class="span2 noMargin" onTablet="span2" onDesktop="span2">
            <div class="circleStatsItemBox gray">
                <div class="header"><?= V($Payements, 'Canceled', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Payements, 'Canceled', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Payements, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>
        
        <div class="span2 noMargin" onTablet="span2" onDesktop="span2">
            <div class="circleStatsItemBox olive">
                <div class="header"><?= V($Payements, 'Cash', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Payements, 'Cash', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Payements, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>
        
        <div class="span2 noMargin" onTablet="span2" onDesktop="span2">
            <div class="circleStatsItemBox salmon">
                <div class="header"><?= V($Payements, 'Card', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Payements, 'Card', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Payements, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>
        
        <div class="span2 noMargin" onTablet="span2" onDesktop="span2">
            <div class="circleStatsItemBox teal">
                <div class="header"><?= V($Payements, 'Transfer', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Payements, 'Transfer', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Payements, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>
                
    </div>	

</div>
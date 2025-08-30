<div id="content" class="span10">
					
    <div class="row-fluid hideInIE8 circleStats">
        
        <div class="span4 noMargin" onTablet="span12" onDesktop="span4">
            <div class="circleStatsItemBox blue">
                <div class="header"><?= V($LTranslates, 'Employees') ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="100" class="whiteCircle" />
                </div>		
                <div class="footer">
                    <span class="value">
                        <span class="number"><?= V($Employees, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="span2 noMargin" onTablet="span3" onDesktop="span2">
            <div class="circleStatsItemBox green">
                <div class="header"><?= V($Employees, 'Enable', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Employees, 'Enable', 'Percent') ?>" class="whiteCircle" />
                </div>		
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Employees, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>

        <div class="span2" onTablet="span3" onDesktop="span2">
            <div class="circleStatsItemBox red">
                <div class="header"><?= V($Employees, 'Disable', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Employees, 'Disable', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Employees, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>

        <div class="span2" onTablet="span3" onDesktop="span2">
            <div class="circleStatsItemBox yellow">
                <div class="header"><?= V($Employees, 'Bloked', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Employees, 'Bloked', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Employees, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>

        <div class="span2" onTablet="span3" onDesktop="span2">
            <div class="circleStatsItemBox gray">
                <div class="header"><?= V($Employees, 'Canceled', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Employees, 'Canceled', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Employees, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>
                
    </div>	

</div>
		
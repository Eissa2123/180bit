<div id="content" class="span10">
					
    <div class="row-fluid hideInIE8 circleStats">
        
        <div class="span4 noMargin" onTablet="span12" onDesktop="span4">
            <div class="circleStatsItemBox blue">
                <div class="header"><?= V($LTranslates, 'Customers') ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="100" class="whiteCircle" />
                </div>		
                <div class="footer">
                    <span class="value">
                        <span class="number"><?= V($Customers, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>
        
        <div class="span2 noMargin" onTablet="span3" onDesktop="span2">
            <div class="circleStatsItemBox green">
                <div class="header"><?= V($Customers, 'Enable', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Customers, 'Enable', 'Percent') ?>" class="whiteCircle" />
                </div>		
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Customers, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>

        <div class="span2" onTablet="span3" onDesktop="span2">
            <div class="circleStatsItemBox red">
                <div class="header"><?= V($Customers, 'Disable', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Customers, 'Disable', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Customers, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>

        <div class="span2" onTablet="span3" onDesktop="span2">
            <div class="circleStatsItemBox yellow">
                <div class="header"><?= V($Customers, 'Bloked', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Customers, 'Bloked', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Customers, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>

        <div class="span2" onTablet="span3" onDesktop="span2">
            <div class="circleStatsItemBox gray">
                <div class="header"><?= V($Customers, 'Canceled', 'Cells', 'Name'.LNG) ?></div>
                <span class="percent">%</span>
                <div class="circleStat">
                    <input type="text" value="<?= V($Customers, 'Canceled', 'Percent') ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                    <span class="count">
                        <span class="number"></span>
                        <span class="unit"></span>
                    </span>
                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?= V($Customers, 'Count') ?></span>
                        <span class="unit"></span>
                    </span>	
                </div>
            </div>
        </div>
                
    </div>
                    
    <?php if(isset($Customers['Cells']) and count($Customers['Cells']) > 0){ ?>
    <div class="row-fluid">
        
        <div class="widget blue span12" onTablet="span12" onDesktop="span12">
            <div class="content">
                <h4 style="text-align:center;"><?php //V($LTranslates, 'Customers') ?></h4>
                <div class="verticalChart">
                    <?php foreach ($Customers['Cells'] as $Cell) { ?>
                        <div class="singleBar">
                            <div class="bar">
                                <div class="value">
                                    <span><?= $Cell['Percent'] ?>%</span>
                                </div>
                            </div>
                            <div class="title"><?= $Cell['Code'] ?></div>
                        </div>
                    <?php } ?>
            </div>
            
        </div>
    
    </div>
    <?php } ?>

    <div class="row-fluid">	
        <div class="span12 widget green" onTablet="span12" onDesktop="span12">
            <div id="chartContainer1" style="height: 400px;"></div>
        </div>
    </div>

</div>

<script type="text/javascript">

    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer1", JSON.parse('<?= $json ?>'));
        chart.render();
    }

</script>

		
<div id="navbar-content" class="span10">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid" style="padding-top:10px;">
				<div class="row-fluid" style="margin-bottom:0px;direction:<?= LNG === 'AR' ? 'rtl' : 'ltr' ?>;">
                    <form method="post">
                        <div class="span4">
                            <select class="autosubmit" style="width:100%;" name="client">
                                <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Client') ?></option>
                                <option value=""></option>
                                <?php if (isset($LClients)){  ?>
                                    <?php foreach ($LClients as $Client) { ?>
                                    <option value="<?= V($Client,'ID') ?>" <?= V($Client, 'ID') === V($LPosts,'Client') ? 'selected="selected"' : '' ?>>
                                    <?= V($Client,'Code') ?> - <?= V($Client, 'Firstname') ?> <?= V($Client, 'Lastname') ?></option>
                                    <?php }  ?>
                                <?php }  ?>
                            </select>
                        </div>
                        <div class="span3">
                            <select class="autosubmit" style="width:38%;text-align:center;" name="syear">
                                <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'SYear') ?></option>
                                <option value=""></option>
                                <?php if (isset($LYears)){  ?>
                                    <?php foreach ($LYears as $Year) { ?>
                                    <option value="<?= V($Year,'YearPDate') ?>" <?= V($Year, 'YearPDate') == V($LPosts,'SYear') ? 'selected="selected"' : '' ?>>
                                    <?= V($Year,'YearPDate') ?>
                                    </option>
                                    <?php }  ?>
                                <?php }  ?>
                            </select>
                            <select class="autosubmit" style="width:60%;" name="smonth">
                                <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'SMonth') ?></option>
                                <option value=""></option>
                                <?php if (isset($LMonths)){  ?>
                                    <?php foreach ($LMonths as $KMonth => $VMonth) { ?>
                                    <option value="<?= $KMonth ?>" <?= $KMonth == V($LPosts,'SMonth') ? 'selected="selected"' : '' ?>>
                                    <?= $VMonth ?>
                                    </option>
                                    <?php }  ?>
                                <?php }  ?>
                            </select>
                        </div>
                        <div class="span3">
                            <select class="autosubmit" style="width:38%;" name="eyear">
                                <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'EYear') ?></option>
                                <option value=""></option>
                                <?php if (isset($LYears)){  ?>
                                    <?php foreach ($LYears as $Year) { ?>
                                    <option value="<?= V($Year,'YearPDate') ?>" <?= V($Year, 'YearPDate') == V($LPosts,'EYear') ? 'selected="selected"' : '' ?>>
                                    <?= V($Year,'YearPDate') ?>
                                    </option>
                                    <?php }  ?>
                                <?php }  ?>
                            </select>
                            <select class="autosubmit" style="width:60%;" name="emonth">
                                <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'EMonth') ?></option>
                                <option value=""></option>
                                <?php if (isset($LMonths)){  ?>
                                    <?php foreach ($LMonths as $KMonth => $VMonth) { ?>
                                    <option value="<?= $KMonth ?>" <?= $KMonth == V($LPosts,'EMonth') ? 'selected="selected"' : '' ?>>
                                    <?= $VMonth ?>
                                    </option>
                                    <?php }  ?>
                                <?php }  ?>
                            </select>
                        </div>
                        <div class="span1">
                            <button style="width:100%;"> <?= V($LTranslates,'Search') ?> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="span10">

    <div class="row-fluid">	
        
        <a class="quick-button metro purple span2">
            <i class="icon-group"></i>
            <p><?= V($LTranslates, 'Employees') ?></p>
            <span class="badge"><?= V($Cells, 'Employees', 'Count') ?></span>
        </a>

        <a class="quick-button metro yellow span2">
            <i class="icon-group"></i>
            <p><?= V($LTranslates, 'Customers') ?></p>
            <span class="badge"><?= V($Cells, 'Customers', 'Count') ?></span>
        </a>

        <a class="quick-button metro blue span2">
            <i class="icon-group"></i>
            <p><?= V($LTranslates, 'Clients') ?></p>
            <span class="badge"><?= V($Cells, 'Clients', 'Count') ?></span>
        </a>
        
        <a class="quick-button metro deeppink span2">
            <i class="icon-barcode"></i>
            <p><?= V($LTranslates, 'Expenses') ?></p>
            <span class="badge"><?= V($Cells, 'Expenses', 'Count') ?></span></span>
        </a>
        
        <a class="quick-button metro pink span2">
            <i class="icon-gift"></i>
            <p><?= V($LTranslates, 'Debts') ?></p>
            <span class="badge"><?= V($Cells, 'Debts', 'Count') ?></span></span>
        </a>

        <a class="quick-button metro teal span2">
            <i class="icon-shopping-cart"></i>
            <p><?= V($LTranslates, 'Invoices') ?></p>
            <span class="badge"><?= V($Cells, 'Invoices', 'Count') ?></span></span>
        </a>

    </div>

    <div class="row-fluid">	    

        <a class="quick-button metro gray span4">
            <i class="icon-bell"></i>
            <p><?= V($Cells, 'Totals', 'Amount') ?> <?= V($LTranslates, 'Currencycode') ?></p>
            <span class="badge"><?= V($LTranslates, 'Totals') ?></span>
        </a>    

        <a class="quick-button metro green span4">
            <i class="icon-ok-sign"></i>
            <p><?= V($Cells, 'Totals2', 'Amount') ?> <?= V($LTranslates, 'Currencycode') ?></p>
            <span class="badge"><?= V($LTranslates, 'Payements') ?></span>
        </a>
       
        <a class="quick-button metro red span4">
            <i class="icon-warning-sign"></i>
            <p><?= V($Cells, 'Totals3', 'Amount') ?> <?= V($LTranslates, 'Currencycode') ?></p>
            <span class="badge"><?= V($LTranslates, 'Credits') ?></span>
        </a>

    </div>

    <div class="row-fluid">	 

        <a class="quick-button metro pink span4">
            <i class="icon-gift"></i>
            <p><?= V($Cells, 'Debts', 'Amounts') ?> <?= V($LTranslates, 'Currencycode') ?></p>
            <span class="badge"><?= V($LTranslates, 'Debts') ?></span>
        </a>  

        <a class="quick-button metro pink span4">
            <i class="icon-gift"></i>
            <p><?= V($Cells, 'Net', 'Amount') ?> <?= V($LTranslates, 'Currencycode') ?></p>
            <span class="badge"><?= V($LTranslates, 'Payements2') ?></span>
        </a>

        <a class="quick-button metro pink span4">
            <i class="icon-gift"></i>
            <p><?= V($Cells, 'Credits', 'Amount') ?> <?= V($LTranslates, 'Currencycode') ?></p>
            <span class="badge"><?= V($LTranslates, 'Credits') ?></span>
        </a>

    </div>

    <div class="row-fluid">	
        
        <a class="quick-button metro teal span4">
            <i class="icon-shopping-cart"></i>
            <p><?= V($Cells, 'Invoices', 'Amount') ?> <?= V($LTranslates, 'Currencycode') ?></p>
            <span class="badge"><?= V($LTranslates, 'Invoices') ?></span>
        </a> 

        <a class="quick-button metro teal span4">
            <i class="icon-shopping-cart"></i>
            <p><?= V($Cells, 'Payements', 'Amount') ?> <?= V($LTranslates, 'Currencycode') ?></p>
            <span class="badge"><?= V($LTranslates, 'Payements') ?></span>
        </a>

        <a class="quick-button metro teal span4">
            <i class="icon-shopping-cart"></i>
            <p><?= V($Cells, 'Credits2', 'Amount') ?> <?= V($LTranslates, 'Currencycode') ?></p>
            <span class="badge"><?= V($LTranslates, 'Credits') ?></span>
        </a>

    </div>
				
    <div class="row-fluid">	
        <div class="span6 widget" onTablet="span6" onDesktop="span6">
            <div id="chartContainer1" style="height:300px"></div>
        </div> 
        <div class="span6 widget" onTablet="span6" onDesktop="span6">
            <div id="chartContainer2" style="height:300px"></div>
        </div> 
    </div>

</div>

<script type="text/javascript">

    var json1 = JSON.parse('<?= $json1 ?>');
    var json2 = JSON.parse('<?= $json2 ?>');

    window.onload = function () {

        var chart1 = new CanvasJS.Chart("chartContainer1", json1);
        chart1.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", json2);
        chart2.render();

    }
</script>
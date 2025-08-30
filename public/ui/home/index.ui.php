<script src="https://unpkg.com/@phosphor-icons/web"></script>

<!-- Page Content -->
<main class="home-page">
  <div class="dashboard-container">
    <h2 class="section-title"><?= V($LTranslates, 'Home') ?></h2>
    <div class="dashboard-grid">
      <!--------Box Card--------->
      <?php if (Has('B', 'Box', ALL)) { ?>
        <a class="dashboard-card color-box" href="<?= WLink('box') ?>">
          <div class="card-icon">
            <i class="ph ph-vault"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Box') ?></span>
            <span class="card-count"><?= V($Boxs, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Report Card--------->
      <?php if (Has('B', 'Reports', ALL)) { ?>
        <a class="dashboard-card color-reports" href="<?= WLink('report') ?>">
          <div class="card-icon">
            <i class="ph ph-file-text"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Reports') ?></span>
            <span class="card-count"><?= V($Reports, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Expenses Card--------->
      <?php if (Has('B', 'Expenses', ALL)) { ?>
        <a class="dashboard-card color-expenses" href="<?= WLink('expense') ?>">
          <div class="card-icon">
            <i class="ph ph-currency-circle-dollar"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Expenses') ?></span>
            <span class="card-count"><?= V($Expenses, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Providers Card--------->
      <?php if (Has('B', 'Providers', ALL)) { ?>
        <a class="dashboard-card color-provider" href="<?= WLink('provider') ?>">
          <div class="card-icon">
            <i class="ph ph-user-circle"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Providers') ?></span>
            <span class="card-count"><?= V($Providers, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Marketers Card--------->
      <?php if (Has('B', 'Marketers', ALL)) { ?>
        <a class="dashboard-card color-marketer" href="<?= WLink('marketer') ?>">
          <div class="card-icon">
            <i class="ph ph-megaphone"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Marketers') ?></span>
            <span class="card-count"><?= V($Marketers, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Purchases Quotations Card--------->
      <?php if (Has('B', 'Purchasesquotations', ALL)) { ?>
        <a class="dashboard-card color-purchases-quotations" href="<?= WLink('purchasequotation') ?>">
          <div class="card-icon">
            <i class="ph ph-file-arrow-down"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'PurchasesQuotations') ?></span>
            <span class="card-count"><?= V($PurchasesQuotations, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Purchases Card--------->
      <?php if (Has('B', 'Purchases', ALL)) { ?>
        <a class="dashboard-card color-Purchases" href="<?= WLink('purchase') ?>">
          <div class="card-icon">
            <i class="ph ph-receipt"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'PurchasesInvoices') ?></span>
            <span class="card-count"><?= V($PurchasesInvoices, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Purchases Payments Card--------->
      <?php if (Has('B', 'Purchasespayments', ALL)) { ?>
        <a class="dashboard-card color-purchases-payments" href="<?= WLink('purchasepayment') ?>">
          <div class="card-icon">
            <i class="ph ph-credit-card"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'PurchasesBills') ?></span>
            <span class="card-count"><?= V($PurchasesPayments, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>


      <!--------Customer Card--------->
      <?php if (Has('B', 'Customers', ALL)) { ?>
        <a class="dashboard-card color-customers" href="<?= WLink('customer') ?>">
          <div class="card-icon">
            <i class="ph ph-users"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Customers') ?></span>
            <span class="card-count"><?= V($Customers, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Revenues Card--------->
      <?php if (Has('B', 'Revenues', ALL)) { ?>
        <a class="dashboard-card color-revenues" href="<?= WLink('revenue') ?>">
          <div class="card-icon">
            <i class="ph ph-trend-up"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Revenues') ?></span>
            <span class="card-count"><?= V($Revenues, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Sales Quotations Card--------->
      <?php if (Has('B', 'Salesquotations', ALL)) { ?>
        <a class="dashboard-card color-sales-q" href="<?= WLink('salequotation') ?>">
          <div class="card-icon">
            <i class="ph ph-file-arrow-up"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'SalesQuotations') ?></span>
            <span class="card-count"><?= V($SalesQuotations, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Sales Card--------->
      <?php if (Has('B', 'Sales', ALL)) { ?>
        <a class="dashboard-card color-sales" href="<?= WLink('sale') ?>">
          <div class="card-icon">
            <i class="ph ph-invoice"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'SalesInvoices') ?></span>
            <span class="card-count"><?= V($SalesInvoices, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>


      <!--------Sales Payments Card--------->
      <?php if (Has('B', 'Salespayments', ALL)) { ?>
        <a class="dashboard-card color-sales-p" href="<?= WLink('salepayment') ?>">
          <div class="card-icon">
            <i class="ph ph-wallet"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'SalesBills') ?></span>
            <span class="card-count"><?= V($SalesPayments, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Employees Card--------->
      <?php if (Has('B', 'Employees', ALL)) { ?>
        <a class="dashboard-card color-category" href="<?= WLink('employee') ?>">
          <div class="card-icon">
            <i class="ph ph-identification-card"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Employees') ?></span>
            <span class="card-count"><?= V($Employees, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Categories Card--------->
      <?php if (Has('B', 'Categories', ALL)) { ?>
        <a class="dashboard-card color-category" href="<?= WLink('category') ?>">
          <div class="card-icon">
            <i class="ph ph-list-dashes"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Categories') ?></span>
            <span class="card-count"><?= V($Categories, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Products Card--------->
      <?php if (Has('B', 'Products', ALL)) { ?>
        <a class="dashboard-card color-products" href="<?= WLink('product') ?>">
          <div class="card-icon">
            <i class="ph ph-cube"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Products') ?></span>
            <span class="card-count"><?= V($Products, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Cobons Card--------->
      <?php if (Has('B', 'Cobons', ALL)) { ?>
        <a class="dashboard-card color-coupons" href="<?= WLink('cobon') ?>">
          <div class="card-icon">
            <i class="ph ph-ticket"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Cobons') ?></span>
            <span class="card-count"><?= V($Cobons, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>


      <!--------Restrictions Card--------->
      <?php if (Has('B', 'Restrictions', ALL)) { ?>
        <a class="dashboard-card color-restriction" href="<?= WLink('restriction') ?>">
          <div class="card-icon">
            <i class="ph ph-lock"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Restrictions') ?></span>
            <span class="card-count"><?= V($Restrictions, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

      <!--------Terms Card--------->
      <?php if (Has('B', 'Terms', ALL)) { ?>
        <a class="dashboard-card color-term" href="<?= WLink('term') ?>">
          <div class="card-icon">
            <i class="ph ph-note"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Terms') ?></span>
            <span class="card-count"><?= V($Terms, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>


      <!--------Privileges Card--------->
      <?php if (Has('B', 'Privileges', ALL)) { ?>
        <a class="dashboard-card color-privilege" href="<?= WLink('privilege') ?>">
          <div class="card-icon">
            <i class="ph ph-shield-check"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Jobs') ?></span>
            <span class="card-count"><?= V($Jobs, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>


      <!--------Tools Card--------->
      <?php /*if (Has('B', 'Tools', ALL)) { ?>
        <a class="dashboard-card color-tools" href="<?= WLink('tool') ?>">
          <div class="card-icon">
            <i class="ph ph-shield-check"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Tools') ?></span>
            <span class="card-count"><?= V($Tools, 'Count') ?></span>
          </div>
        </a>
      <?php } */ ?>


      <!--------Histories Card--------->
      <?php if (Has('B', 'Historiques', ALL)) { ?>
        <a class="dashboard-card color-historique" href="<?= WLink('historique') ?>">
          <div class="card-icon">
            <i class="ph ph-clock-counter-clockwise"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Historiques') ?></span>
            <span class="card-count"><?= V($Historiques, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>


      <!--------Settings Card--------->
      <?php if (Has('B', 'Settings', ALL)) { ?>
        <a class="dashboard-card color-setting" href="<?= WLink('setting') ?>">
          <div class="card-icon">
            <i class="ph ph-gear"></i>
          </div>
          <div class="card-info">
            <span class="card-title"><?= V($LTranslates, 'Settings') ?></span>
            <span class="card-count"><?= V($Settings, 'Count') ?></span>
          </div>
        </a>
      <?php } ?>

    </div>
  </div>
</main>


<script>
  scr = "actions.js"
</script>
<?php if ($Bottom) { ?>

    <head>
        <link rel="stylesheet" href="/public/assets/packages/bootstrap-multiselect/bootstrap-multiselect.css">
        <script src="/public/assets/packages/bootstrap-multiselect/bootstrap-multiselect.min.js"></script>

        <!-- Custom Footer CSS -->
        <link rel="stylesheet" href="<?= WASSETS ?>css/footer.css">
    </head>


    <?php if (DASHBOARD_ON) { ?>
        </div>
        </div>
    <?php } else { ?>

        <footer class="site-footer">
            <div class="footer-top">
                <div class="footer-left">
                    <div class="footer-logo">
                        <img src="<?= htmlspecialchars(isset($Logo) ? $Logo : V($FCells, 'Logo')) ?>" alt="Logo" />
                        <img src="<?= htmlspecialchars($Logoblock ?? '') ?>" alt="Secondary Logo" />
                    </div>



                    <nav class="footer-nav">
                        <a href="#"><?= V($LFooterTranslates, 'About Us') ?></a>
                        <a href="#"><?= V($LFooterTranslates, 'Services') ?></a>
                        <a href="#"><?= V($LFooterTranslates, 'Pricing') ?></a>
                        <a href="#"><?= V($LFooterTranslates, 'Support') ?></a>
                        <a href="#"><?= V($LFooterTranslates, 'PrivacyPolicy') ?></a>

                    </nav>
                </div>
                <div class="footer-right">
                    <p><?= V($LFooterTranslates, 'SubscribeNewsletter') ?></p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="<?= V($LFooterTranslates, 'Enter your email') ?>" />
                        <button type="submit"><?= V($LFooterTranslates, 'Subscribe') ?></button>
                    </form>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© <?= date('Y') ?> <?= V($LFooterTranslates, 'CompanyName') ?>. <?= V($LFooterTranslates, 'AllRightsReserved') ?></p>
                <div class="footer-links">
                    <a href="#"><?= V($LFooterTranslates, 'Terms') ?></a>
                    <a href="#"><?= V($LFooterTranslates, 'Privacy') ?></a>
                    <a href="#"><?= V($LFooterTranslates, 'Cookies') ?></a>
                </div>
            </div>
        </footer>



        <!-- <div class="container-fluid">
                    <footer>
                        <br />
                        <div class="row text-center bg-485a69">
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center" style="padding:20px;font-size:13px;">
                                <dl>
                                    <dt><strong class="gb-e9b500"><?= V($LFooterTranslates, 'Address') ?></strong></dt>
                                    <dd><?= V($FCells, 'Address' . LNG) ?></dd>
                                    <dd><?= V($FCells, 'Region' . LNG) ?></dd>
                                    <dd><?= V($FCells, 'City' . LNG) ?> - <?= V($FCells, 'Country' . LNG) ?></dd>
                                </dl>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center" style="padding:20px;font-size:13px;">
                                <dl>
                                    <dt><strong class="gb-e9b500"><?= V($LFooterTranslates, 'Email') ?></strong></dt>
                                    <dd><?= V($FCells, 'Email1') ?></dd>
                                    <dd><?= V($FCells, 'Email2') ?></dd>
                                    <dd><?= V($FCells, 'Email3') ?></dd>
                                </dl>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center" style="padding:20px;font-size:13px;">
                                <dl>
                                    <dt><strong class="gb-e9b500"><?= V($LFooterTranslates, 'Phone') ?></strong></dt>
                                    <dd class="tel"><?= V($FCells, 'PN1') ?></dd>
                                    <dd class="tel"><?= V($FCells, 'PN2') ?></dd>
                                    <dd class="tel"><?= V($FCells, 'PN3') ?></dd>
                                </dl>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 logo-name" style="padding:0px">
                                <img style="width:150px;" src="<?= V($FCells, 'Logo') ?>" />
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 text-center" style="padding-top:25px">
                                <dl>
                                    <dd class="logo-name gb-94c947"><img class="dlogo" src="<?= $Logo ?>" /></dd>
                                </dl>
                            </div>
                            <div class="col-md-12 col-xl-12 text-center" style="border-top:1px solid #ffcf26;font-size:12px;">
                                <h6 class="text-copyright"><?= V($LFooterTranslates, 'Copyright') ?></h6>
                            </div>
                        </div>
                </div>
                </footer>
                </div> -->

    <?php } ?>

<?php } ?>

<?php foreach ($FScripts as $script) { ?>
    <script type="text/javascript" src="<?= $script ?>"></script>
<?php } ?>
</div> <!-- end layout-container -->
</body>

</html>
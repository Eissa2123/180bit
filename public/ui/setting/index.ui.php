<link rel="stylesheet" href="<?= WASSETS ?>css/setting-index.css">
<link rel="stylesheet" href="<?= WASSETS ?>css/base.css">



<?php
// ====== language & direction 
$lang  = isset($Lang) ? strtolower($Lang) : 'ar';
$isRTL = in_array($lang, ['ar', 'fa', 'ur', 'he']);
$dir   = $isRTL ? 'rtl' : 'ltr';
?>
<?php if (!empty($RedirectTo)): ?>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.location.replace('<?= $RedirectTo ?>');
        });
    </script>
    <?php return; ?>
<?php endif; ?>

<div class="page-wrapper" dir="<?= $dir ?>" lang="<?= htmlspecialchars($lang) ?>">

    <div class="page-header">
        <!---Path Pages Header---->
        <div class="breadcrumbs">
            <a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a>
            <span>›</span>
            <strong><?= V($LTranslates, 'Settings') ?></strong>
        </div>

        <!---Back Button---->
        <div class="actions">
            <?php
            $lang  = isset($Lang) ? strtolower($Lang) : 'ar';
            $isRTL = in_array($lang, ['ar', 'fa', 'ur', 'he']);
            require_once 'public/assets/widgets/button.php';
            renderButton([
                'href'      => WLink('setting/edit'),
                'label'     => V($LTranslates, 'Edit'),
                'icon'      => '',
                'icon_pos'  => '',
                'variant'   => 'ghost',
                'size'      => 'lg',
                'rounded'   => 'lg',
                'style_vars' => [
                    '--btn-bg'      => '#ffffffff',
                    '--btn-text'    => '#000000ff',
                    '--btn-border'  => '#000000ff',
                    '--btn-hover-bg' => '#e2e1e1ff',
                    '--btn-px'      => '15px',
                    '--btn-py'      => '8px',
                ]
            ]);
            ?>
        </div>
    </div>


    <section class="card">
        <h2 class="card__title text-center"><?= V($LTranslates, 'GeneralSettings') ?></h2>
        <div class="card__body">

            <table class="prop-table">
                <tbody>
                    <!-- اسم الموقع -->
                    <tr>
                        <th rowspan="3"><?= V($LTranslates, 'WSName') ?></th>
                        <td><?= V($LTranslates, 'AR') ?></td>
                        <td class="value"><?= V($Cells, 'NameAR') ?></td>
                    </tr>
                    <tr>
                        <td><?= V($LTranslates, 'FR') ?></td>
                        <td class="value"><?= V($Cells, 'NameFR') ?></td>
                    </tr>
                    <tr>
                        <td><?= V($LTranslates, 'EN') ?></td>
                        <td class="value"><?= V($Cells, 'NameEN') ?></td>
                    </tr>

                    <!-- اللغات -->
                    <tr>
                        <th rowspan="4"><?= V($LTranslates, 'WSLanguges') ?></th>
                        <td><?= V($LTranslates, 'LangDefault') ?></td>
                        <td class="value">
                            <span class="chip chip--success"><?= V($LTranslates, V($Cells, 'Langue')) ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><?= V($LTranslates, 'AR') ?></td>
                        <td class="value"><span class="chip chip--<?= V($Cells, 'AR', 'Class') ?>"><?= V($Cells, 'AR', 'Name' . LNG) ?></span></td>
                    </tr>
                    <tr>
                        <td><?= V($LTranslates, 'EN') ?></td>
                        <td class="value"><span class="chip chip--<?= V($Cells, 'EN', 'Class') ?>"><?= V($Cells, 'EN', 'Name' . LNG) ?></span></td>
                    </tr>
                    <tr>
                        <td><?= V($LTranslates, 'FR') ?></td>
                        <td class="value"><span class="chip chip--<?= V($Cells, 'FR', 'Class') ?>"><?= V($Cells, 'FR', 'Name' . LNG) ?></span></td>
                    </tr>

                    <!-- العناوين -->
                    <tr>
                        <th rowspan="3"><?= V($LTranslates, 'Address') ?></th>
                        <td><?= V($LTranslates, 'AR') ?></td>
                        <td class="value">
                            <?= V($Cells, 'AddressAR') ?><br>
                            <?= V($Cells, 'RegionAR') ?><br>
                            <?= V($Cells, 'CityAR') ?><br>
                            <?= V($Cells, 'CountryAR') ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= V($LTranslates, 'EN') ?></td>
                        <td class="value">
                            <?= V($Cells, 'AddressEN') ?><br>
                            <?= V($Cells, 'RegionEN') ?><br>
                            <?= V($Cells, 'CityEN') ?><br>
                            <?= V($Cells, 'CountryEN') ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= V($LTranslates, 'FR') ?></td>
                        <td class="value">
                            <?= V($Cells, 'AddressFR') ?><br>
                            <?= V($Cells, 'RegionFR') ?><br>
                            <?= V($Cells, 'CityFR') ?><br>
                            <?= V($Cells, 'CountryFR') ?>
                        </td>
                    </tr>

                    <!-- الهواتف -->
                    <tr>
                        <th rowspan="3"><?= V($LTranslates, 'Phonenumber') ?></th>
                        <td>—</td>
                        <td class="value tel"><?= V($Cells, 'PN1') ?></td>
                    </tr>
                    <tr>
                        <td>—</td>
                        <td class="value tel"><?= V($Cells, 'PN2') ?></td>
                    </tr>
                    <tr>
                        <td>—</td>
                        <td class="value tel"><?= V($Cells, 'PN3') ?></td>
                    </tr>

                    <!-- الإيميلات -->
                    <tr>
                        <th rowspan="3"><?= V($LTranslates, 'Email') ?></th>
                        <td>—</td>
                        <td class="value tel"><?= V($Cells, 'Email1') ?></td>
                    </tr>
                    <tr>
                        <td>—</td>
                        <td class="value tel"><?= V($Cells, 'Email2') ?></td>
                    </tr>
                    <tr>
                        <td>—</td>
                        <td class="value tel"><?= V($Cells, 'Email3') ?></td>
                    </tr>

                    <!-- حالة/ثيم -->
                    <tr>
                        <th colspan="2"><?= V($LTranslates, 'WSState') ?></th>
                        <td class="value"><span class="chip chip--<?= V($Cells, 'State', 'Class') ?>"><?= V($Cells, 'State', 'Name' . LNG) ?></span></td>
                    </tr>
                    <tr>
                        <th colspan="2"><?= V($LTranslates, 'WSTheme') ?></th>
                        <td class="value"><?= V($Cells, 'Theme') ?></td>
                    </tr>

                    <!-- التطبيق -->
                    <tr>
                        <th rowspan="4"><?= V($LTranslates, 'WSApp') ?></th>
                        <td><?= V($LTranslates, 'WSID') ?></td>
                        <td class="value"><?= V($Cells, 'Appcode') ?></td>
                    </tr>
                    <tr>
                        <td><?= V($LTranslates, 'WSName') ?></td>
                        <td class="value"><?= V($Cells, 'Appname') ?></td>
                    </tr>
                    <tr>
                        <td><?= V($LTranslates, 'WSVersion') ?></td>
                        <td class="value"><?= V($Cells, 'Appversion') ?></td>
                    </tr>
                    <tr>
                        <td><?= V($LTranslates, 'Date') ?></td>
                        <td class="value"><?= V($Cells, 'Appdate') ?></td>
                    </tr>

                </tbody>
            </table>

        </div>
    </section>
</div>
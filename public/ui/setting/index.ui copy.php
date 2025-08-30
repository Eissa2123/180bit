


<div class="container-fluid">
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('setting') ?>"><?= V($LTranslates, 'Settings') ?></a></li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-header text-center"><?= V($LTranslates, 'GeneralSettings') ?></div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-left text-middle" rowspan="3"><?= V($LTranslates, 'WSName') ?></td>
                                            <td class="text-left"><?= V($LTranslates, 'AR') ?></td>
                                            <td class="text-center"><?= V($Cells, 'NameAR') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><?= V($LTranslates, 'FR') ?></td>
                                            <td class="text-center"><?= V($Cells, 'NameFR') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><?= V($LTranslates, 'EN') ?></td>
                                            <td class="text-center"><?= V($Cells, 'NameEN') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left text-middle" rowspan="4"><?= V($LTranslates, 'WSLanguges') ?></td>
                                            <td class="text-left"><?= V($LTranslates, 'LangDefault') ?></td>
                                            <td class="text-center">
                                                <span class="label label-success"><?= V($LTranslates, V($Cells, 'Langue')) ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><?= V($LTranslates, 'AR') ?></td>
                                            <td class="text-center"><span class="label label-<?= V($Cells, 'AR', 'Class') ?>"><?= V($Cells, 'AR', 'Name' . LNG) ?></span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><?= V($LTranslates, 'EN') ?></td>
                                            <td class="text-center"><span class="label label-<?= V($Cells, 'EN', 'Class') ?>"><?= V($Cells, 'EN', 'Name' . LNG) ?></span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><?= V($LTranslates, 'FR') ?></td>
                                            <td class="text-center"><span class="label label-<?= V($Cells, 'FR', 'Class') ?>"><?= V($Cells, 'FR', 'Name' . LNG) ?></span></td>
                                        </tr>

                                        <tr>
                                            <td class="text-left text-middle" rowspan="3"><?= V($LTranslates, 'Address') ?></td>
                                            <td class="text-left text-middle"><?= V($LTranslates, 'AR') ?></td>
                                            <td class="text-center">
                                                <?= V($Cells, 'AddressAR') ?><br />
                                                <?= V($Cells, 'RegionAR') ?><br />
                                                <?= V($Cells, 'CityAR') ?><br />
                                                <?= V($Cells, 'CountryAR') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left text-middle"><?= V($LTranslates, 'EN') ?></td>
                                            <td class="text-center">
                                                <?= V($Cells, 'AddressEN') ?><br />
                                                <?= V($Cells, 'RegionEN') ?><br />
                                                <?= V($Cells, 'CityEN') ?><br />
                                                <?= V($Cells, 'CountryEN') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left text-middle"><?= V($LTranslates, 'FR') ?></td>
                                            <td class="text-center">
                                                <?= V($Cells, 'AddressFR') ?><br />
                                                <?= V($Cells, 'RegionFR') ?><br />
                                                <?= V($Cells, 'CityFR') ?><br />
                                                <?= V($Cells, 'CountryFR') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left text-middle" colspan="2" rowspan="3"><?= V($LTranslates, 'Phonenumber') ?></td>
                                            <td class="text-center tel"><?= V($Cells, 'PN1') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center tel"><?= V($Cells, 'PN2') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center tel"><?= V($Cells, 'PN3') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left text-middle" colspan="2" rowspan="3"><?= V($LTranslates, 'Email') ?></td>
                                            <td class="text-center tel"><?= V($Cells, 'Email1') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center tel"><?= V($Cells, 'Email2') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center tel"><?= V($Cells, 'Email3') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left" colspan="2"><?= V($LTranslates, 'WSState') ?></td>
                                            <td class="text-center"><span class="label label-<?= V($Cells, 'State', 'Class') ?>"><?= V($Cells, 'State', 'Name' . LNG) ?></span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left" colspan="2"><?= V($LTranslates, 'WSTheme') ?></td>
                                            <td class="text-center"><?= V($Cells, 'Theme') ?></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="4" class="text-left text-middle"><?= V($LTranslates, 'WSApp') ?></td>
                                            <td rowspan="2" class="text-left text-middle"><?= V($LTranslates, 'WSID') ?></td>
                                            <td class="text-center text-middle"><?= V($Cells, 'Appcode') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle"><?= V($Cells, 'Appname') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-middle" rowspan="2"><?= V($LTranslates, 'WSVersion') ?></td>
                                            <td class="text-center"><?= V($Cells, 'Appversion') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?= V($Cells, 'Appdate') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-9 col-md-6 col-lg-9"></div>
                                    <div class="col-xs-4 col-sm-3 col-md-6 col-lg-3">
                                        <a href="<?= WLink('setting/edit') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            <?= V($LTranslates, 'Edit') ?>
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php
            /*<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">إعدادات الموظفين</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle">الرمز</td>
                                            <td class="text-center text-middle">employee</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإسم</td>
                                            <td class="text-center text-middle">الموظفين</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الرابط</td>
                                            <td class="text-center text-middle">/employee/</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الحالة</td>
                                            <td class="text-center text-middle"><span class="label label-success">مفعل</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"></div>
                                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                                        <a href="<?= WLink('employee/setting') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">إعدادات المزودون</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle">الرمز</td>
                                            <td class="text-center text-middle">customer</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإسم</td>
                                            <td class="text-center text-middle">المزودون</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الرابط</td>
                                            <td class="text-center text-middle">/customer/</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الحالة</td>
                                            <td class="text-center text-middle"><span class="label label-success">مفعل</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"></div>
                                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                                        <a href="<?= WLink('customer/setting') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل 
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">إعدادات الزبائن</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle">الرمز</td>
                                            <td class="text-center text-middle">client</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإسم</td>
                                            <td class="text-center text-middle">الزبائن</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الرابط</td>
                                            <td class="text-center text-middle">/client/</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الحالة</td>
                                            <td class="text-center text-middle"><span class="label label-success">مفعل</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"></div>
                                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                                        <a href="<?= WLink('client/setting') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل 
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">إعدادات الإشتراكات</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle">الرمز</td>
                                            <td class="text-center text-middle">expense</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإسم</td>
                                            <td class="text-center text-middle">الإشتراكات</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الرابط</td>
                                            <td class="text-center text-middle">/expense/</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الحالة</td>
                                            <td class="text-center text-middle"><span class="label label-success">مفعل</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"></div>
                                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                                        <a href="<?= WLink('expense/setting') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل 
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">إعدادات الفواتير</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle">الرمز</td>
                                            <td class="text-center text-middle">invoice</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإسم</td>
                                            <td class="text-center text-middle">الفواتير</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الرابط</td>
                                            <td class="text-center text-middle">/invoice/</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الحالة</td>
                                            <td class="text-center text-middle"><span class="label label-success">مفعل</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"></div>
                                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                                        <a href="<?= WLink('invoice/setting') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل 
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">إعدادات الدفعات</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle">الرمز</td>
                                            <td class="text-center text-middle">payment</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإسم</td>
                                            <td class="text-center text-middle">الدفعات</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الرابط</td>
                                            <td class="text-center text-middle">/payment/</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الحالة</td>
                                            <td class="text-center text-middle"><span class="label label-success">مفعل</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"></div>
                                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                                        <a href="<?= WLink('payment/setting') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل 
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">إعدادات القروض</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle">الرمز</td>
                                            <td class="text-center text-middle">debt</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإسم</td>
                                            <td class="text-center text-middle">القروض</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الرابط</td>
                                            <td class="text-center text-middle">/debt/</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الحالة</td>
                                            <td class="text-center text-middle"><span class="label label-success">مفعل</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"></div>
                                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                                        <a href="<?= WLink('debt/setting') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل 
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">إعدادات القيادة</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle">الرمز</td>
                                            <td class="text-center text-middle">dashboard</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإسم</td>
                                            <td class="text-center text-middle">القيادة</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الرابط</td>
                                            <td class="text-center text-middle">/dashboard/</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الحالة</td>
                                            <td class="text-center text-middle"><span class="label label-success">مفعل</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"></div>
                                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                                        <a href="<?= WLink('dashboard/setting') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل 
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">إعدادات الصلاحيات</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle">الرمز</td>
                                            <td class="text-center text-middle">privilege</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإسم</td>
                                            <td class="text-center text-middle">الصلاحيات</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الرابط</td>
                                            <td class="text-center text-middle">/privilege/</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الحالة</td>
                                            <td class="text-center text-middle"><span class="label label-success">مفعل</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"></div>
                                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                                        <a href="<?= WLink('privilege/setting') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل 
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">إعدادات الأدوات</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="text-center text-middle">الرمز</td>
                                                <td class="text-center text-middle">tool</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center text-middle">الإسم</td>
                                                <td class="text-center text-middle">الأدوات</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center text-middle">الرابط</td>
                                                <td class="text-center text-middle">/tool/</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center text-middle">الحالة</td>
                                                <td class="text-center text-middle"><span class="label label-success">مفعل</span></td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"></div>
                                    <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
                                        <a href="<?= WLink('tool/setting') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل 
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
             */ ?>
        </div>
    </div>
</div>
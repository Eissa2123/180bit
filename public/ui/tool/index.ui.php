<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><a href="<?= WLink('tool') ?>"><?= V($LTranslates, 'Tools') ?></a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            
            <?php /*<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div> */ ?>
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-header text-center"><?= V($LTranslates, 'Website') ?></div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle"><?= V($LTranslates, 'Server') ?></td>
                                            <td class="text-center text-middle"><?= V($Cells, 'Server') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle"><?= V($LTranslates, 'WSName') ?></td>
                                            <td class="text-center text-middle"><?= V($Cells, 'Appname') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-6 col-lg-8"></div>
                                    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2">
                                        <a href="<?= WLink('tool/clear') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            <?= V($LTranslates, 'Clear') ?> 
                                            <i class="glyphicon glyphicon-flash"></i> 
                                        </a>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2">
                                        <a href="<?= WLink('tool/backup') ?>" target="_blank" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            <?= V($LTranslates, 'Backup') ?> 
                                            <i class="glyphicon glyphicon-export"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-header text-center"><?= V($LTranslates, 'Database') ?></div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle"><?= V($LTranslates, 'Server') ?></td>
                                            <td class="text-center text-middle"><?= V($Cells, 'Server') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle"><?= V($LTranslates, 'DBName') ?></td>
                                            <td class="text-center text-middle"><?= V($Cells, 'DBName') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-9 col-lg-10"></div>
                                    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2">
                                        <a href="<?= WLink('tool/export') ?>" target="_blank" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            <?= V($LTranslates, 'Backup') ?> 
                                            <i class="glyphicon glyphicon-export"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-header text-center"><?= V($LTranslates, 'Attachments') ?></div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle"><?= V($LTranslates, 'Server') ?></td>
                                            <td class="text-center text-middle"><?= V($Cells, 'Server') ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle"><?= V($LTranslates, 'WSName') ?></td>
                                            <td class="text-center text-middle"><?= V($Cells, 'Appname') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-9 col-lg-10"></div>
                                    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2">
                                        <a href="<?= WLink('tool/uploaded') ?>" target="_blank" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            <?= V($LTranslates, 'Backup') ?> 
                                            <i class="glyphicon glyphicon-export"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <?php /*<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-header text-center">المكونات</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-middle">القيادة</td>
                                            <td class="text-right text-middle">/dashboard/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span> <span class="label label-default">افتراضي</span></td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الموظف</td>
                                            <td class="text-right text-middle">/employee/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span></td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">المزود</td>
                                            <td class="text-right text-middle">/customer/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span></td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الزبون</td>
                                            <td class="text-right text-middle">/client/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span></td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإشتراك</td>
                                            <td class="text-right text-middle">/expense/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span></td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الفاتورة</td>
                                            <td class="text-right text-middle">/invoice/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span></td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الدفعة</td>
                                            <td class="text-right text-middle">/payment/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span></td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">القرض</td>
                                            <td class="text-right text-middle">/debt/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span></td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الصلاحيات</td>
                                            <td class="text-right text-middle">/privilege/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span> <span class="label label-default">افتراضي</span></td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الإعدادات</td>
                                            <td class="text-right text-middle">/setting/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span> <span class="label label-default">افتراضي</span></td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center text-middle">الأدوات</td>
                                            <td class="text-right text-middle">/tool/</td>
                                            <td class="text-center"><span class="label label-success">مفعل</span> <span class="label label-default">افتراضي</span></td> 
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-2 col-md-3 col-lg-3"></div>
                                    <div class="col-xs-4 col-sm-2 col-md-3 col-lg-3">
                                        <a href="<?= WLink('tool/add') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            إضافة 
                                            <i class="glyphicon glyphicon-plus"></i> 
                                        </a>
                                    </div>
                                    <div class="col-xs-4 col-sm-2 col-md-3 col-lg-3">
                                        <a href="<?= WLink('tool/edit') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            تعديل 
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>
                                    </div>
                                    <div class="col-xs-4 col-sm-2 col-md-3 col-lg-3">
                                        <a href="<?= WLink('tool/remove') ?>" class="btn btn-default btn-block btn-control btn-inline" role="button">
                                            حذف 
                                            <i class="glyphicon glyphicon-trash"></i> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> */ ?>
        </div>
    </div>
</div>
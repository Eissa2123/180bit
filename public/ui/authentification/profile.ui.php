<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Profile') ?></li>
                </ol>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                        <div class="form-group">
                            <img src="<?= V($Cells,'Picture') ?>" class="thumbnail img-circle avatar-4" id="img-picture">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'Code') ?>  : </strong></label>
                                    <label><?= V($Cells,'Code') ?></label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'Firstname') ?> <?= V($LTranslates,'AND') ?> <?= V($LTranslates,'Lastname') ?>  : </strong></label>
                                    <label><?= V($Cells,'Firstname') ?> <?= V($Cells,'Lastname') ?></label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'Gender') ?> : </strong></label>
                                    <label><?= V($Cells,'Gender', 'Name'.LNG) ?></label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'Username') ?> : </strong></label>
                                    <label><?= V($Cells,'Username') ?></label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'Job') ?> : </strong></label>
                                    <label><?= V($Cells,'Job', 'Name'.LNG) ?></label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'Country') ?> : </strong></label>
                                    <label><?= V($Cells,'Country', 'Name') ?></label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'City') ?> : </strong></label>
                                    <label><?= V($Cells,'City') ?></label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'Address') ?> : </strong></label>
                                    <label><?= V($Cells,'Address') ?></label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'Email') ?> : </strong></label>
                                    <label><?= V($Cells,'Email') ?></label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'Phonenumber') ?> : </strong></label>
                                    <label class="tel"><?= V($Cells,'Phonenumber') ?></label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label><strong><?= V($LTranslates,'State') ?> : </strong></label>
                                    <label class="label label-<?= V($Cells,'State','Class') ?>"><?= V($Cells,'State', 'Name'.LNG) ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <hr />
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
                        <div class="form-group">
                            <a href="<?= WLink('authentification/edit') ?>" class="btn btn-warning btn-block" role="button">  
                                <i class="glyphicon glyphicon-edit"></i> <?= V($LTranslates,'Edit') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
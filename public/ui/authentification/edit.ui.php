<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li><a href="<?= WLink('authentification/profile') ?>"><?= V($LTranslates, 'Profile') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Edit') ?></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php if (isset($Success)){  ?>
                    <div class="alert alert-success alert-edit" role="alert"><?= V($LTranslates, 'ESuccess') ?></div>
                <?php } ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php if (isset($Errors)){  ?>
                    <div class="alert alert-danger alert-edit" role="alert"><?= V($LTranslates, 'EDanger') ?></div>
                <?php } ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= WLink('authentification/edit') ?>" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?= V($Cells, 'ID') ?>" />
                                <label for="opassword"><?= V($LTranslates, 'OPassword') ?></label>
                                <input type="password" class="form-control" name="opassword" required="required" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
                            <div class="form-group">
                                <label for="npassword"><?= V($LTranslates, 'NPassword') ?></label>
                                <input type="password" class="form-control" name="npassword" required="required" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
                            <div class="form-group">
                                <label for="nconfirmation"><?= V($LTranslates, 'NPConfirm') ?></label>
                                <input type="password" class="form-control" name="npconfirm" required="required" />
                            </div>
                        </div>
                    </div> 
                    <hr />
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block" name="btn_edit">
                                    <?= V($LTranslates, 'Save') ?>
                                    <i class="glyphicon glyphicon-ok"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
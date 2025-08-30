<div class="container-fluid">
	<div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="<?= WLink() ?>"><?= V($LTranslates, 'Panel') ?></a></li>
                    <li class="active"><?= V($LTranslates, 'Employees') ?></li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <a href="<?= WLink('employee/add') ?>" class="btn btn-default btn-block btn-control" role="button">
                    <?= V($LTranslates, 'Add') ?>  
                    <i class="glyphicon glyphicon-plus"></i> 
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                <form action="<?= WLink('employee/prints') ?>" method="post" target="_blank">

                    <input type="hidden" name="code" value="<?= V($LPosts, 'Code') ?>" />
                    <input type="hidden" name="ncid" value="<?= V($LPosts, 'NCID') ?>" />
                    <input type="hidden" name="firstname" value="<?= V($LPosts, 'Firstname') ?>" />
                    <input type="hidden" name="lastname" value="<?= V($LPosts, 'Lastname') ?>" />
                    <input type="hidden" name="username" value="<?= V($LPosts, 'Username') ?>" />
                    <input type="hidden" name="country" value="<?= V($LPosts, 'Country') ?>" />
                    <input type="hidden" name="sdatefrom" value="<?= V($LPosts, 'SDateFrom') ?>" />
                    <input type="hidden" name="sdateto" value="<?= V($LPosts, 'SDateTo') ?>" />
                    <input type="hidden" name="edatefrom" value="<?= V($LPosts, 'EDateFrom') ?>" />
                    <input type="hidden" name="edateto" value="<?= V($LPosts, 'EDateTo') ?>" />
                    <input type="hidden" name="from" value="<?= V($LPosts, 'From') ?>" />
                    <input type="hidden" name="to" value="<?= V($LPosts, 'To') ?>" />
                    <input type="hidden" name="length" value="<?= V($LPosts, 'Length') ?>" />
                    <input type="hidden" name="page" value="<?= V($LPosts, 'Page') ?>" />

                    <?php if(L($LPosts, 'Genders')){ ?>
                        <?php foreach ($LPosts['Genders'] as $Gender) { ?>
                            <input type="hidden" name="genders[]" value="<?= $Gender ?>" />
                        <?php }  ?>
                    <?php }  ?>

                    <?php if(L($LPosts, 'Jobs')){ ?>
                        <?php foreach ($LPosts['Jobs'] as $Job) { ?>
                            <input type="hidden" name="jobs[]" value="<?= $Job ?>" />
                        <?php }  ?>
                    <?php }  ?>

                    <?php if(L($LPosts, 'States')){ ?>
                        <?php foreach ($LPosts['States'] as $State) { ?>
                            <input type="hidden" name="states[]" value="<?= $State ?>" />
                        <?php }  ?>
                    <?php }  ?>

                    <button type="submit" class="btn btn-default btn-control btn-block" name="btn_print">
                        <?= V($LTranslates, 'Print') ?>   
                        <i class="glyphicon glyphicon-print"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            
            <div class="panel-header">
                <form action="<?= WLink('employee') ?>" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="code" value="<?= V($LPosts, 'Code') ?>" placeholder="<?= V($LTranslates,'Code') ?>" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="ncid" value="<?= V($LPosts, 'NCID') ?>" placeholder="<?= V($LTranslates,'NCID') ?>"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="firstname" value="<?= V($LPosts, 'Firstname') ?>" placeholder="<?= V($LTranslates,'Firstname') ?>"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastname" value="<?= V($LPosts, 'Lastname') ?>" placeholder="<?= V($LTranslates,'Lastname') ?>"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
								<input type="text" class="form-control" name="username" value="<?= V($LPosts, 'Username') ?>" placeholder="<?= V($LTranslates,'Username') ?>"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <select class="form-control multiselect" id="multiselect-genders" name="genders[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'Gender') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                    <?php if (isset($LGenders)){  ?>
                                        <?php foreach ($LGenders as $Gender) { ?>
                                        <option value="<?= V($Gender,'ID') ?>"<?= I($Gender, 'ID', $LPosts,'Genders') ? 'selected="selected"' : '' ?>>
                                            <?= V($Gender,'Name'.LNG) ?>
                                        </option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <select class="form-control multiselect" id="multiselect-jobs" name="jobs[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'Job') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
                                    <?php if (isset($LJobs)){  ?>
                                        <?php foreach ($LJobs as $Job) { ?>
                                        <option value="<?= V($Job,'ID') ?>" <?= I($Job, 'ID', $LPosts,'Jobs') ? 'selected="selected"' : '' ?>><?= V($Job,'Name'.LNG) ?></option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-3 col-lg-3">
                        <div class="form-group">
								<input type="text" class="form-control" name="country" value="<?= V($LPosts, 'Country') ?>" placeholder="<?= V($LTranslates,'Country') ?>"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 clear">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'SDate') ?> <?= V($LTranslates,'From') ?></span>
									<input type="date" class="form-control" name="sdatefrom" value="<?= V($LPosts, 'SDateFrom') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'SDate') ?> <?= V($LTranslates,'To') ?></span>
									<input type="date" class="form-control" name="sdateto" value="<?= V($LPosts, 'SDateFrom') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'EDate') ?><?= V($LTranslates,'From') ?></span>
									<input type="date" class="form-control" name="edatefrom" value="<?= V($LPosts, 'EDateFrom') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'EDate') ?><?= V($LTranslates,'To') ?></span>
									<input type="date" class="form-control" name="edateto" value="<?= V($LPosts, 'EDateTo') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'CAT') ?> <?= V($LTranslates,'From') ?></span>
									<input type="date" class="form-control" name="from" value="<?= V($LPosts, 'From') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><?= V($LTranslates,'CAT') ?> <?= V($LTranslates,'To') ?></span>
									<input type="date" class="form-control" name="to" value="<?= V($LPosts, 'To') ?>"  />
								</div>
							</div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <select class="form-control multiselect" id="multiselect-states" name="states[]" multiple="multiple" data-multiple-name="<?= V($LTranslates,'State') ?>" data-multiple-nselected="<?= V($LTranslates,'NSelectedText') ?>" data-multiple-allselected="<?= V($LTranslates,'AllSelectedText') ?>" data-multiple-selectall="<?= V($LTranslates,'SelectAll') ?>">
									
                                    <?php if (isset($LStates)){  ?>
                                        <?php foreach ($LStates as $State) { ?>
                                        <option value="<?= V($State,'ID') ?>" <?= I($State, 'ID', $LPosts,'States') ? 'selected="selected"' : '' ?>>
                                            <?= V($State,'Name'.LNG) ?>
                                        </option>
                                        <?php }  ?>
                                    <?php }  ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <select class="form-control" name="length">
                                    <option value="" disabled="disabled" selected="selected"><?= V($LTranslates,'Length') ?></option>
									<?php if (isset($LLengths)){  ?>
                                        <?php foreach ($LLengths as $Length) { ?>
                                        <option value="<?= $Length ?>" <?= (V($LPosts,'Length') == $Length) ? 'selected="selected"' : '' ?>><?= $Length ?></option>
                                        <?php }  ?>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="hidden" name="page" value="<?= V($LPosts,'Page') ?>" />
                                <button type="submit" class="btn btn-primary btn-block" name="btn_search"> 
                                <?= V($LTranslates,'Search') ?> <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <a href="<?= WEB ?>employee" class="btn btn-danger btn-block btn-control" role="button">
                                <?= V($LTranslates,'Clean') ?>  
                                <i class="glyphicon glyphicon-repeat"></i> 
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="panel-body" id="printer">
			<?php if (isset($LEmployees)){  ?>
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center"><?= V($LTranslates,'ID') ?></th>
                        <th class="text-center hidden-xs"><?= V($LTranslates,'Code') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'NCID') ?></th>
                        <th class="text-center"><?= V($LTranslates,'Firstname') ?> <?= V($LTranslates,'AND') ?> <?= V($LTranslates,'Lastname') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'Job') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'Gender') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'Country') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'SWork') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'EWork') ?></th>
                        <th class="text-center hidden-xs hidden-sm"><?= V($LTranslates,'State') ?></th>
                         
                        <?php //if(V($Privilage, 'D') === ALL or V($Privilage, 'E') === ALL or V($Privilage, 'R') === ALL){ ?> 
						<th class="text-center actions">&nbsp;</th>
                        <?php //}?>
                    </thead>
                    <tbody>
                        <?php foreach ($LEmployees as $Employee) { ?>
                        <tr class="<?= V($Employee,'State', 'Class') ?>">
                            <td class="text-center"><?= V($Employee,'ID') ?></td> 
                            <td class="text-center hidden-xs"><?= V($Employee,'Code') ?></td> 
                            <td class="text-center hidden-xs hidden-sm"><?= V($Employee,'NCID') ?></td> 
                            <td class="text-center">
                                <?= V($Employee, 'Firstname') ?> <?= V($Employee, 'Lastname') ?><br />
                                <label class="label label-default">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <?= V($Employee, 'Username') ?>
                                </label>
                            </td> 
                            <td class="text-center hidden-xs hidden-sm"><?= V($Employee, 'Job', 'Name'.LNG) ?></td> 
                            <td class="text-center hidden-xs hidden-sm"><?= V($Employee,'Gender', 'Name'.LNG) ?></td> 
                            <td class="text-center hidden-xs hidden-sm"><?= V($Employee,'Country', 'Name') ?></td>
                            <td class="text-center hidden-xs hidden-sm"><?= V($Employee,'SWork') ?></td>
                            <td class="text-center hidden-xs hidden-sm"><?= V($Employee,'EWork') ?></td>
                            <td class="text-center hidden-xs hidden-sm">
                                <span class="label label-<?= V($Employee,'State', 'Class') ?>"><?= V($Employee,'State','Name'.LNG) ?></span> 
                                <?php /*<span class="label label-default"><?= V($Employee,'ISD') ?></span>*/?>
                            </td> 
                            
                            <?php //if(V($Privilage, 'D') === ALL or V($Privilage, 'E') === ALL or V($Privilage, 'R') === ALL){ ?> 
                            <td class="text-center actions">
                                
                                <?php /*if(V($Privilage, 'D') === ALL){?> 
                                <a href="<?= WEB ?>employee/print/<?= $Employee['ID'] ?>" title="<?= V($LTranslates,'Display') ?>"><span class="glyphicon glyphicon-print"></span></a>	
                                <?php }*/ ?>

                                        
                                <?php //if(V($Privilage, 'D') === ALL){?> 
                                <a href="<?= WLink('employee/print/'.$Employee['ID']) ?>" title="<?= V($LTranslates,'Print') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a>	
                                <?php //} ?>


                                <?php //if(V($Privilage, 'D') === ALL){?> 
                                <a href="<?= WLink('employee/display/'.$Employee['ID']) ?>" title="<?= V($LTranslates,'Display') ?>"><span class="glyphicon glyphicon-eye-open"></span></a>	
                                <?php //} ?>

                                <?php //if(V($Privilage, 'E') === ALL){?> 
                                <a href="<?= WLink('employee/edit/'.$Employee['ID']) ?>" title="<?= V($LTranslates,'Edit') ?>"><span class="glyphicon glyphicon-edit"></span></a>	
                                <?php //} ?>

                                <?php //if(V($Privilage, 'R') === ALL){?> 
                                <a href="<?= WLink('employee/remove/'.$Employee['ID']) ?>" title="<?= V($LTranslates,'Remove') ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                <?php //} ?>

                                <?php /*<a href="<?= WLink('employee/recovery/'.$Employee['ID']) ?>" title="<?= V($LTranslates,'Recovery') ?>"><span class="glyphicon glyphicon-import"></span></a>*/?>
                            </td>
                            <?php //} ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
			<?php }else{ ?>
				<div class="alert alert-warning" role="alert"><?= V($LTranslates,'EResults') ?></div>
			<?php } ?>
            </div>
           <?php if (isset($Pager)){  ?>
            <div class="panel-footer">
                <span class="visible-xs text-center"><?= V($LTranslates,'Page') ?> <?= V($Pager,'Current') ?> <?= V($LTranslates,'From') ?> <?= V($Pager,'Max') ?></span>
                <nav class="text-center">
                    <ul class="pager">
                        <?php if (isset($Pager['Previous'])){  ?>
                        <li class="previous">
                            <a href="" data-page="<?= V($Pager,'Previous') ?>"><span aria-hidden="true">&rarr;</span> <?= V($LTranslates,'Previous') ?></a>
                        </li>
                        <?php } ?>
                        <li class="current disabled hidden-xs"><span><?= V($LTranslates,'Lenght') ?> <?= V($Pager,'Count') ?>  | <?= V($LTranslates,'Page') ?> <?= V($Pager,'Current') ?> <?= V($LTranslates,'From') ?> <?= V($Pager,'Max') ?></span></li>
                        <?php if (isset($Pager['Next'])){  ?>
                        <li class="next">
                            <a href="" data-page="<?= V($Pager,'Next') ?>"><?= V($LTranslates,'Next') ?> <span aria-hidden="true">&larr;</span></a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
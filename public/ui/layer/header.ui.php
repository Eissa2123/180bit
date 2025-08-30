<?php if ($Top) { ?>
	<!DOCTYPE html>
	<html>

	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@0.9.15/dist/css/bootstrap-multiselect.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@0.9.15/dist/js/bootstrap-multiselect.min.js"></script>

		<?php if (!(isset($Print) and $Print)) { ?>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<meta name="Description" content="GHOME - ج هوم" />
			<title><?= V($HCells, 'Name' . LNG) ?></title>
			<link rel="shortcut icon" type="image/x-icon" href="<?= $Icon ?>" />
		<?php } ?>

		<?php foreach ($Styles as $style) { ?>
			<link rel="stylesheet" type="text/css" href="<?= $style ?>" />
		<?php } ?>

		<?php if (isset($CurrentPage) && $CurrentPage === 'dashboard') { ?>
			<link rel="stylesheet" href="/public/assets/css/dashboard.css">
		<?php } ?>

		<!-- Custom Header CSS -->
		<link rel="stylesheet" href="<?= WASSETS ?>css/header.css">
		<link rel="stylesheet" href="<?= WASSETS ?>css/base.css">
		<link rel="stylesheet" href="<?= WASSETS ?>css/home.css">


		<!-- Custom Header JS -->
		<script src="<?= WASSETS ?>js/header.js"></script>
	</head>

	<body>
		<div class="layout-container">

			<?php if (!(isset($Print) and $Print)) { ?>

				<?php if (!DASHBOARD_ON) { ?>
					<!-- Modern App Header -->
					<header class="app-header">

						<!-- Toggle button for mobile-->
						<button class="menu-toggle"></button>

						<!-- Logo for mobile-->
						<div class="header-center">
							<a href="<?= WLink() ?>" class="logo">
								<img src="<?= $Logoinline ?>" alt="Logo">
							</a>
						</div>

						<div class="mobile-header-right">
							<?php
							$enEnabled = (int) V($HCells, 'EN', 'ID') === 2;
							$frEnabled = (int) V($HCells, 'FR', 'ID') === 2;
							$hasMultiple = (1 + (int)$enEnabled + (int)$frEnabled) > 1;
							?>
							<?php if ($hasMultiple): ?>
								<div class="lang-select dropdown">
									<button class="dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
										🌐 <?= V($LHeadTranslates, LNG) ?>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="<?= WLink(null, 'ar', true) ?>"><?= V($LHeadTranslates, 'AR') ?></a></li>
										<?php if ($enEnabled): ?>
											<li><a href="<?= WLink(null, 'en', true) ?>"><?= V($LHeadTranslates, 'EN') ?></a></li>
										<?php endif; ?>
										<?php if ($frEnabled): ?>
											<li><a href="<?= WLink(null, 'fr', true) ?>"><?= V($LHeadTranslates, 'FR') ?></a></li>
										<?php endif; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>

						<!--Header for desktop-->
						<div class="header-left">

							<a href="<?= WLink() ?>" class="logo">
								<img src="<?= $Logoinline ?>" alt="Logo">
							</a>
							<span class="app-name"><?= V($HCells, 'Name' . LNG) ?></span>
						</div>

						<!-- Header right -->
						<div class="header-right">
							<?php
							$enEnabled = (int) V($HCells, 'EN', 'ID') === 2;
							$frEnabled = (int) V($HCells, 'FR', 'ID') === 2;
							$hasMultiple = (1 + (int)$enEnabled + (int)$frEnabled) > 1;
							?>
							<?php if ($hasMultiple): ?>
								<div class="lang-select dropdown">
									<button class="dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
										🌐 <?= V($LHeadTranslates, LNG) ?>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="<?= WLink(null, 'ar', true) ?>"><?= V($LHeadTranslates, 'AR') ?></a></li>
										<?php if ($enEnabled): ?>
											<li><a href="<?= WLink(null, 'en', true) ?>"><?= V($LHeadTranslates, 'EN') ?></a></li>
										<?php endif; ?>
										<?php if ($frEnabled): ?>
											<li><a href="<?= WLink(null, 'fr', true) ?>"><?= V($LHeadTranslates, 'FR') ?></a></li>
										<?php endif; ?>
									</ul>
								</div>
							<?php endif; ?>



							<!-- User picture -->
							<div class="user-menu dropdown">
								<?php
								$userImage = !empty($Session['Image'])
									? $Session['Image']
									: WASSETS . "images/default.png";
								?>
								<button class="dropdown-toggle">
									<img src="<?= $userImage ?>" alt="User" class="profile-pic">
								</button>
								<ul class="dropdown-menu">
									<li class="dropdown-header"><?= $Session['Firstname'] ?> <?= $Session['Lastname'] ?> (<?= $Session['Username'] ?>)</li>
									<li><a href="<?= WLink('authentification/profile') ?>"> <?= V($LHeadTranslates, 'Profile') ?></a></li>
									<li><a href="<?= WLink('authentification/logout') ?>"> <?= V($LHeadTranslates, 'Exit') ?></a></li>
								</ul>
							</div>
						</div>
					</header>
					<!-- Sidebar -->
					<div id="mobileSidebar" class="sidebarMobile <?= (LNG == 'ar') ? 'sidebar-rtl' : 'sidebar-ltr' ?>">
					</div>


				<?php } ?>

			<?php } ?>
		<?php } ?>
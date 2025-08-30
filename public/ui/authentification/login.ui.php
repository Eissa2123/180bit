<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="goldenkit company" />
    <title>180Bit System</title>
    <!--<link rel="shortcut icon" type="image/x-icon" href="<?= $Icon ?>" />-->


    <?php foreach ($Styles as $style) { ?>
        <link rel="stylesheet" href="<?= WASSETS ?>css/base.css">
        <link rel="stylesheet" href="<?= WASSETS ?>css/login.css">
    <?php } ?>
</head>

<body>
    <div class="login-page" dir="rtl">
        <!--Picture Said-->
        <aside class="login-visual">
            <img src="<?= WASSETS ?>images/log.png" alt="">
        </aside>

        <!----Form Said--->
        <div class="login-card">
            <!-----Logo Block----->
            <div class="logo">
                <!----Construction Logo------>
                <?php if (isset(COMPANY['State']['ID']) && COMPANY['State']['ID'] != 2): ?>
                    <div class="login-construction">
                        <img src="<?= IMGS ?>construction/7.webp" alt="">
                    </div>
                <?php endif; ?>

                <!----180Bit Logo------>
                <div class="login-logo">
                    <img class="" src="<?= WASSETS ?>themes/default/images/apps/180bit.png" alt="Logo" />
                </div>
            </div>

            <!----------Form----------->
            <form method="post" action="<?= WLink('authentification/login') ?>" class="login-form" id="loginForm">
                <input type="submit" name="btn_login" value="1" hidden>

                <!----Tittle----->
                <div class="tittle">
                    <h2 class="login-title"><?= V($LTranslates, 'Authentification') ?></h2>
                    <h5 class="login-title2"><?= V($LTranslates, 'Authentification2') ?></h5>
                </div>


                <!-----Name and Password Textfield----->
                <div class="fields">
                    <div class="name-field">
                        <?php
                        //===Name Textfield===//
                        $name = 'username';
                        $type = 'text';
                        $label = V($LTranslates, 'Username');
                        $placeholder = $label;
                        $required = true;
                        $icon = '<i class="ph ph-user-circle-dashed"></i>';
                        $icon_pos = 'start';
                        $style_vars = [
                            '--tf-py'         => '15px',
                            '--tf-fs'         => '14px',
                            '--tf-radius'     => '12px',
                            '--tf-icon-color' => '#7b7f83ff',
                            '--tf-icon-size'  => '18px',
                            '--tf-icon-space' => '30px',
                        ];
                        include 'public/assets/widgets/textField.php';
                        ?>
                    </div>

                    <div class="pass-field">
                        <?php
                        //===Password Textfield===//
                        $icon = '<i class="ph ph-password"></i>';
                        $icon_pos = 'start';
                        $style_vars = [
                            '--tf-py'        => '15px',
                            '--tf-fs'        => '14px',
                            '--tf-radius'    => '12px',
                            '--tf-icon-color' => '#7b7f83ff',
                            '--tf-eye-space' => '2.2rem',
                            '--tf-eye-inset' => '8px',
                        ];

                        $name = 'password';
                        $type = 'password';
                        $label = V($LTranslates, 'Password');
                        $placeholder = $label;
                        $required = true;
                        $id = 'password_id';

                        include 'public/assets/widgets/textField.php';
                        ?>
                    </div>
                </div>
                <!-----Login Button------>
                <div class="action-but">
                    <?php
                    require_once 'public/assets/widgets/button.php';
                    renderButton([
                        'type'   => 'submit',
                        'name' => 'btn_login',
                        'label'  => V($LTranslates, 'Login'),
                        'variant' => 'solid',
                        'size'   => 'lg',
                        'rounded' => 'lg',
                        'width'  => 'full',
                        'class' => 'c-btn c-btn--primary',
                        'attrs'  => ['name' => 'btn_login', 'value' => '1'],
                        'style_vars' => [
                            '--btn-bg'      => '#000000',
                            '--btn-text'    => '#ffffff',
                            '--btn-border'  => '#000000',
                            '--btn-hover-bg' => '#5c5c5c',
                            '--btn-py'      => '15px',
                        ],
                    ]);
                    ?>
                </div>
            </form>

            <!-------All Rights Section-------->
            <div class="footer-bottom">
                <p>© <?= date('Y') ?> <?= V($LTranslates, 'CompanyName') ?>. <?= V($LTranslates, 'AllRightsReserved') ?></p>
            </div>
        </div>
    </div>



    <!-----Scripts------->
    <?php foreach ($FScripts as $script) { ?>
        <script type="text/javascript" src="<?= $script ?>"></script>
    <?php } ?>

    <!-----Script for Enter Press------->
    <script>
        (function() {
            const form = document.getElementById('loginForm');
            if (!form) return;

            form.addEventListener('keydown', function(e) {
                if (e.key !== 'Enter') return;
                if (e.target.tagName === 'TEXTAREA') return;

                if (form.reportValidity && !form.reportValidity()) return;

                e.preventDefault();

                // اختَر السبميتّر اللي اسمه btn_login
                const submitter =
                    form.querySelector('button[type="submit"][name="btn_login"], input[type="submit"][name="btn_login"]') ||
                    form.querySelector('button[type="submit"], input[type="submit"]');

                if (form.requestSubmit && submitter) {
                    form.requestSubmit(submitter);
                } else if (form.requestSubmit) {
                    form.requestSubmit();
                } else {
                    form.submit();
                }
            });

            // اختياري: شِل زر 👁 من ترتيب التبويب
            form.querySelectorAll('.toggle-eye').forEach(b => b.setAttribute('tabindex', '-1'));
        })();
    </script>

</body>

</html>
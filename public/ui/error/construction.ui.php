<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Construction</title>
        <style>
            *{
                padding:0;
                margin:0;
            }
            body {
                background-color:#f6f6f6;
            }
            img{
                width:40%;
                margin-left:30%;
            }
        </style>
    </head>
    <body>
        <img src="<?= IMGS.'construction/3.jpg' ?>">
    </body>

    <script>
        var redirectURL = "<?= WLink('authentification/login') ?>";
        setTimeout("location.href = redirectURL;", 2000);
    </script>
</html>
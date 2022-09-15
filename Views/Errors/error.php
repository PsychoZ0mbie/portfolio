<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=DESCRIPTION?>">
    <meta name="author" content="David Parrado" />
    <meta name="copyright" content="David Parrado"/>
    <meta name="robots" content="index,follow"/>
    <meta name="keywords" content="<?=KEYWORDS?>"/>

    <link rel="canonical" href="<?=base_url();?>"/>
    <link rel ="shortcut icon" href="<?=media()?>/template/images/logo.png" sizes="114x114" type="image/png">

    <title><?=$data['page_title']?></title>
    <!------------------------------Frameworks--------------------------------->
    <link rel="stylesheet" href="<?=media()?>/template/frameworks/bootstrap/bootstrap.min.css">
    <!------------------------------Plugins--------------------------------->
    <script src="https://kit.fontawesome.com/3207833fba.js" crossorigin="anonymous"></script>
    <!------------------------------Normalize--------------------------------->
    <link rel="stylesheet" href="<?=media()?>/css/normalize.css">
    <!------------------------------My Styles--------------------------------->
    <link rel="stylesheet" href="<?=media()?>/template/css/style.css">
</head>
<body>
    <div class="error">
        <div class="text-center">
            <h1 class="fs-1">ERROR 404</h1>
            <p>La página que estás buscando no existe</p>
            <a href="<?=base_url()?>" class="button button-bg-th button-hover-h1">Volver</a>
        </div>
    </div>
</body>
</html>
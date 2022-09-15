<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?=$data['page_title']?></title>
    <link rel ="shortcut icon" href="<?=media()?>/template/images/logo.png" sizes="114x114" type="image/png">
    <!-- Font Awesome 5-->
    <link href="<?=media()?>/css/icons/font-awesome.min.css">
    <!-- AdminKit CSS file -->
    <link href="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/css/style.css" rel="stylesheet">
    <!-- My Styles -->
    <link rel="stylesheet" href="<?=media()?>/css/style.css">
</head>
<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center" id=<?=$data['page_name']?>>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-12 p-4 mb-0">
                            <div class="card-body" id="cardLogin">
                                <h1>Iniciar sesión</h1>
                                <p class="text-medium-emphasis">Login to your account</p>
                                <form id="formLogin">
                                    <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                        </svg></span>
                                        <input class="form-control" type="text" placeholder="Tu correo" id="txtEmail" name="txtEmail">
                                    </div>
                                    <div class="input-group mb-4"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg></span>
                                        <input class="form-control" type="password" placeholder="Tu contraseña" id="txtPassword" name="txtPassword">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <button class="btn btn-primary px-4 w-100" type="submit" id="btnLogin">Iniciar sesión</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------Admin template--------------------------------->
    <script src="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
        <script src="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/simplebar/js/simplebar.min.js"></script>
        <script src="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/utils/js/coreui-utils.js"></script>

        <!------------------------------Frameworks--------------------------------->
        <script src="<?= media(); ?>/frameworks/bootstrap/popper.min.js"></script>
        <script src="<?= media(); ?>/frameworks/bootstrap/bootstrap.min.js"></script>
        
        
        <!------------------------------Plugins--------------------------------->
        <script src="<?= media();?>/plugins/fontawesome/fontawesome.js"></script>
        <script src="<?= media();?>/plugins/sweetalert/sweetalert.js"></script>

        <!------------------------------My functions--------------------------------->

        <script>
          const base_url = "<?= base_url(); ?>";
        </script>
    
        <script src="<?= media(); ?>/js/functions.js"></script>
        <script src="<?= media(); ?>/js/functions_login.js"></script>
</body>
</html>
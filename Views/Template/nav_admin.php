<!--sidebar-->
  <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <a href="<?=base_url()?>" class="fs-4 m-0 text-decoration-none text-white d-flex align-items-center justify-content-between">
            <img src="<?=media()?>/template/images/logo.png" alt="David Parrado" width="50" height="46" class="p-1 me-1 bg-white rounded">
            David Parrado
        </a>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>/dashboard">
                                    <svg class="nav-icon">
                                        <use xlink:href="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                                    </svg> 
                                    Dashboard<span class="badge badge-sm bg-info ms-auto"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>/customer">
                                    <svg class="nav-icon">
                                        <use xlink:href="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/icons/svg/free.svg#cil-sign-language"></use>
                                    </svg> 
                                    Habilidades<span class="badge badge-sm bg-info ms-auto"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>/projects">
                                    <svg class="nav-icon">
                                        <use xlink:href="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/icons/svg/free.svg#cil-folder"></use>
                                    </svg> 
                                    Proyectos<span class="badge badge-sm bg-info ms-auto"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>/orders">
                                    <svg class="nav-icon">
                                        <use xlink:href="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/icons/svg/free.svg#cil-send"></use>
                                    </svg> 
                                    Correo<span class="badge badge-sm bg-info ms-auto"></span>
                                </a>
                            </li>
                            <!--
                            <li class="nav-group">
                                <a class="nav-link nav-group-toggle" href="#">
                                    <svg class="nav-icon">
                                        <use xlink:href="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/icons/svg/free.svg#cil-cart"></use>
                                    </svg> Tienda
                                </a>
                                <ul class="nav-group-items">
                                    <?php 
                                    /*
                                    $emails = "";
                                    if($notification>0){
                                        $emails = '<span class="badge badge-sm bg-danger ms-auto">'.$notification.'</span>';
                                    }else{
                                        $emails = "";
                                    }*/
                                    ?>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/store/coupon"><span class="nav-icon"></span> Cupones</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/store/mailbox"><span class="nav-icon"></span> Correo <?=$emails?></a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/store/subscribers"><span class="nav-icon"></span> Suscriptores</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/store/shipping"><span class="nav-icon"></span> Envio</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/store/about"><span class="nav-icon"></span> Nosotros</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url()?>/store/policies"><span class="nav-icon"></span> Politicas</a></li>
                                </ul>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>/logout">
                                    <svg class="nav-icon">
                                        <use xlink:href="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                    </svg> Cerrar sesión
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 843px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
        </div>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
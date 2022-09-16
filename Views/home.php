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
    <link rel="stylesheet" href="<?=media()?>/template/css/normalize.css">
    <!------------------------------My Styles--------------------------------->
    <link rel="stylesheet" href="<?=media()."/template/css/style.css?n=".rand()?>">
</head>
<body>
    <div class="modal fade" id="modalProject"  data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-th">
                    <h5 class="modal-title " id="staticBackdropLabel"></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <div class="project-modal-img">
                                <img src="" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div id="data"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="button button-bg-th button-hover-h1" target="__blank">Ver página</a>
                    <button type="button" class="button button-bg-ft button-hover-h1" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap">
        <header class="main">
            <div id="closeBars">
                <i class="fa-solid fa-x"></i>
            </div>
            <div class="logo">
                <img src="<?=media()?>/template/images/logo.png" alt="David Parrado Desarrollador web">
                <h3>David Parrado</h3>
                <h4>Desarrollador web</h4>
            </div>
            <nav>
                <ul>
                    <li><div href="#" onclick="showLoading(0)">Inicio</div><span></span><span></span><span></span><span></span></li>
                    <li><div href="#" onclick="showLoading(1)">Sobre mí</div><span></span><span></span><span></span><span></span></li>
                    <li><div href="#" onclick="showLoading(2)">Habilidades</div><span></span><span></span><span></span><span></span></li>
                    <li><div href="#" onclick="showLoading(3)">Proyectos</div><span></span><span></span><span></span><span></span></li>
                    <li><div href="#" onclick="showLoading(4)">Servicios</div><span></span><span></span><span></span><span></span></li>
                </ul>
            </nav>
            <div class="info">
                <ul class="info-social">
                    <li><a href="<?=WHATSAPP?>" target="__blank"><i class="fa fa-whatsapp"></i></a></li>
                    <li><a href="<?=INSTAGRAM?>" target="__blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="<?=FACEBOOK?>" target="__blank"><i class="fa fa-facebook-f"></i></a></li>
                </ul>
                <p class="info-copyright">2022 © David Parrado. Todos los derechos reservados</p>
            </div>
        </header>
        <main class="content animation">
            <div class="loading">
                <div class="loading-content">
                    <img src="<?=media()?>/template/images/logo.png" alt="David Parrado Diseñador & Desarrollador web">
                    <p>David está pensando</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar"  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <div id="bars">
                <div>
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <section class="content-home">
                <img src="<?=media()?>/template/images/david.png" alt="David Parrado" class="img-content">
                <div class="presentation">
                    <div class="presentation-title-wrap">
                        <div class="presentation-title">
                            <h1>Hola! Soy David Parrado</h1>
                            <span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                    <div class="position-relative">
                        <div class="presentation-subtitle"><h2>Desarrollador web</h2></div>
                        <button type="button" onclick="showLoading(4)" class="button button-bg-th button-hover-h1" id="btnAbout">Contáctame</button>
                    </div>
                </div>
            </section>
            <section class="content-about d-none">
                <div class="w-100 h-100 d-flex justify-content-center align-items-center flex-column">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-6 mb-3">
                            <div class="about-image">
                                <img src="<?=media()?>/template/images/david.png" alt="David Parrado">
                                <span></span><span></span><span></span><span></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-description">
                                <h2 class="m-0 mb-3">Sobre mi</h2>
                                <p>
                                    Soy un desarrollador web fullstack autodidacta que me encanta poner a prueba mis conocimientos y habilidades para crear
                                    sitios creativos, dinámicos e intuitivos para el usuario. Además, cuento con experiencia de 3 años trabajando en equipo.
                                    <br><br>Siempre busco la mejor solución para brindarle a las personas una imágen profesional con un trabajo de calidad, superando
                                    sus expectativas.
                                </p>
                            </div>
                            <button type="button" onclick="showLoading(4)" class="mt-3 mb-3 button button-bg-th button-hover-h1">Contáctame</button>
                        </div>
                        
                    </div>
                </div>
            </section>
            <section class="content-skill d-none">
                <h2>Habilidades</h2>
                <div class="row p-2">
                    <div class="h-100 col-lg-4 skill-item">
                        <div>
                            <i class="fa fa-html5" style="color:#f06529;"></i>
                            <p>HTML</p>
                            <p>Lenguaje de marcado de hipertexto para la maquetación de sitios web</p>
                        </div>
                    </div>
                    <div class="h-100 col-lg-4 skill-item">
                        <div>
                            <i class="fa-brands fa-css3-alt" style="color:#2965f1"></i>
                            <p>CSS3</p>
                            <p>Hoja de estilos en cascada para el diseño web</p>
                        </div>
                    </div>
                    <div class="h-100 col-lg-4 skill-item">
                        <div>
                            <i class="fa-brands fa-js" style="color:#F0DB4F"></i>
                            <p>Javascript</p>
                            <p>Lenguaje de programación del lado del cliente para la funcionalidad del sitio web</p>
                        </div>
                    </div>
                    <div class="h-100 col-lg-4 skill-item">
                        <div>
                            <i class="fa-brands fa-sass" style="color:#CD6799"></i>
                            <p>Sass</p>
                            <p>Preprocesador de css para generar hojas de estilo en cascada de forma automática</p>
                        </div>
                    </div>
                    <div class="h-100 col-lg-4 skill-item">
                        <div>
                            <i class="fa-brands fa-bootstrap" style="color:#602C50"></i>
                            <p>Bootstrap</p>
                            <p>Biblioteca o framework para el diseño de sitios y aplicaciones web</p>
                        </div>
                    </div>
                    <div class="h-100 col-lg-4 skill-item">
                        <div>
                            <i class="fa-brands fa-php" style="color:#8993be"></i>
                            <p>PHP</p>
                            <p>Lenguaje de programación del lado del servidor para el procesamiento de datos</p>
                        </div>
                    </div>
                    <div class="h-100 col-lg-4 skill-item">
                        <div>
                            <i class="fa-solid fa-database" style="color:#F29111"></i>
                            <p>MySQL</p>
                            <p>Sistema de gestión de base de datos</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content-projects d-none">
                <h2>Proyectos</h2>
                <div class="row" id="projectList">
                    <?=$data['projects']?>
                </div>
            </section>
            <section class="content-services d-none">
                <div aria-live="polite" aria-atomic="true" class="position-relative">
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" auto-hide>
                            <div class="toast-body bg-danger text-white">
                                Todos los campos son obligatorios
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service">
                    <div class="row">
                        <h2 class="text-center m-0 mb-3">Iniciemos un proyecto juntos</h2>
                        <div class="col-md-7 mb-3 d-flex align-items-center">
                            <form class="p-4 w-100 bg-ft" id="formContact" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 form-field">
                                            <label for="txtName" class="form-label">¿Cuál es tu nombre?</label>
                                            <input type="text" class="form-control" id="txtName" name="txtName" placeholder="John Doe">
                                            <span class="form-focus-effect"></span>
                                        </div>
                                        <div class="mb-3 form-field">
                                            <label for="txtEmail" class="form-label">¿Cuál es tu correo?</label>
                                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="john@doe.com">
                                            <span class="form-focus-effect"></span>
                                        </div>
                                        <div class="mb-3 form-field">
                                            <label for="txtBusiness" class="form-label">¿Cuál es tu empresa?</label>
                                            <input type="text" class="form-control" id="txtBusiness" name="txtBusiness" placeholder="John & Doe SAS">
                                            <span class="form-focus-effect"></span>
                                        </div>
                                        <div class="mb-3 form-field">
                                            <label for="txtServices" class="form-label">¿Qué servicios buscas?</label>
                                            <input type="text" class="form-control" name="txtServices" id="txtServices" placeholder="Página corporativa, landing page, e-commerce, etc.">
                                            <span class="form-focus-effect"></span>
                                        </div>
                                        <div class="mb-3 form-field">
                                            <label for="txtMessage" class="form-label">Tu mensaje</label>
                                            <textarea class="form-control" rows="3" id="txtMessage" name="txtMessage" placeholder="Hola David, ¿Puedes ayudarme con...?"></textarea>
                                            <span class="form-focus-effect"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="btnSubmit" class="button button-bg-th button-hover-h1 mt-2">Enviar mensaje</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 mb-3 services">
                            <div class="service-item">
                                <i class="fa-solid fa-layer-group"></i>
                                <h3>Diseño & desarrollo web</h3>
                                <p>Diseños modernos y optimizados para los motores de búsqueda</p>
                            </div>
                            <div class="service-item">
                                <i class="fa-solid fa-store"></i>
                                <h3>E-commerce</h3>
                                <p>Tiendas en línea con integración de pasarelas de pago</p>
                            </div>
                            <div class="service-item">
                                <i class="fa-solid fa-mobile"></i>
                                <h3>Responsivo</h3>
                                <p>Diseño adaptable a cualquier dispositivo inteligente</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <footer>
        <script>
            const empresa = "<?=EMPRESA?>";
            const base_url = "<?=base_url()?>";
        </script>
        <!------------------------------Frameworks--------------------------------->
        <script src="<?=media()?>/template/frameworks/bootstrap/popper.min.js"></script>
        <script src="<?=media()?>/template/frameworks/bootstrap/bootstrap.min.js"></script>
        <!------------------------------Plugins--------------------------------->
        <!------------------------------My functions--------------------------------->
        <script src="<?=media()."/js/functions.js"?>"></script>
        <script src="<?=media()."/template/js/main.js?v=".rand()?>"></script>
    </footer>
</body>
</html>
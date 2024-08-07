<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="../../Statics/Styles/principal.css">
    <link rel="shortcut icon" href="../../Statics/media/img/favicon.png" type="image/png"> 
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <script src="../../libs/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../Dynamics/js/admin.js"></script>
</head> 
<body id="body">
    <header>
        <div id="logos">
            <img src="../../Statics/media/img/escudo_unam.png" alt="escudo unam" id="unam">
            <img src="../../Statics/media/img/escudo_prepa9.png" alt="escudo enp 9" id="enp9">
        </div>
        <h1 id="titulo">Portal de tutorias</h1>
        <div id="barra-busqueda">
            <?php
                //seteo la vida de la session en 7200 segundos    
                ini_set("session.cookie_lifetime","7200");
                //seteo el maximo tiempo de vida de la session
                ini_set("session.gc_maxlifetime","7200");
                //inicio la session    
                session_start();
                if(isset($_SESSION['usuario'])){
                    $usuario=$_SESSION['usuario'];
                }else{
                    header('Location: ../../indexAdmin.php');
                }
            ?>
            <div id="busqueda"><input id="texto_busqueda" type="text" placeholder="Búsqueda"></div>
            <div id="lupa"><img src="../../Statics/media/img/lupa.png" alt="lupa" id="img_lupa"></div>
        </div>
        <div id="mas" data-valor="0"><p id="simbolo_mas">≡</p></div>
    </header>
    <main>
        <section id="fondo-carrusel">
            <div id="carrusel">
                <div id="carouselExampleAutoplaying" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../../Statics/media/inicio/poster.jpg" class="img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../../Statics/media/inicio/post-its.jpg" class="img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../../Statics/media/inicio/gimnasio.jpg" class="img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../../Statics/media/inicio/noche.jpg" class="img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../../Statics/media/inicio/toquin.jpg" class="img-fluid mx-auto d-block" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
        <section id="opciones">
            <div id="usuarios" class="opc_admin">
                <p class="usuarios_texto" id="user1">Usuarios</p>
                <p class="usuarios_texto" id="user3">Gestionar Administradores</p>
            </div>
            <div id="recursos_admi" class="opc_admin">
                <p class="recursosadmi_texto" id="recur1">Recursos</p>
            </div>
            <div id="cuestionarios" class="opc_admin">
                <p class="cuestionarios_texto" id="cuest1">Cuestionarios</p>
            </div>
        </section>
    </main>
    <footer>

    </footer>
</body>
</html>
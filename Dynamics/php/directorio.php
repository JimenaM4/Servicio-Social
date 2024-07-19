<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio</title>
    <link rel="stylesheet" href="../../Statics/Styles/inicioSesion.css">
    <link rel="stylesheet" href="../../Statics/Styles/directorio.css">
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="shortcut icon" href="../../Statics/media/img/favicon.png" type="image/png"> 
    <script src="../../libs/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
    <favicon href="../../Statics/media/img/favicon.png" type="image/x-icon">
    <script src="../js/borrarAdmin.js"></script>
</head>
<body>
    <header id="barra">
        <nav id="navbar">
            <div>
                <a class="navbar-brand text-light" href="http://www.prepa9.unam.mx/"><img src="../../Statics/media/img/escudo_unam.png" alt="UNAM" class="escudo"></a>
            </div>
            <div id="text">
                <h1 id="titulo">Portal de Tutorías</h1>
            </div>   
            <div>
                <a class="navbar-brand text-light" href="http://www.prepa9.unam.mx/"><img src="../../Statics/media/img/escudo_prepa9.png" alt="ENP9" id="ENP9" class="escudo"></a>
            </div>
        </nav>
    </header>
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 class="modal_text">Confirmación</h3>
            <p class="modal_text" >¿Está seguro que desea eliminar a este administrador permanentemente?</p>
            <button id="confirmacion" class="boton_modal">Eliminar</button>
            <button id="cancelar" class="boton_modal">Cancelar</button>
        </div>
    </div>
    <div class="directorio"> 
            <div class="div_directorio">
                <h1>Directorio</h1>
                    <section class="secciones">
                        <article class="sub_secciones">
                            <h2>Coordinadores</h2>
                            <button type="button" id= "btnEditCo" class= "btnEdit">Editar</button>
                        </article>
                        <article class="tarjetas">
                            <div class="tarjeta">
                                <h4>Coordinador General</h4>
                                <h5>Luis Perez Pérez</h5>
                                <img src=".jpg" class="imagen">
                                <h6>Correo: luisPP@gmail.com</h6>
                            </div>
                            <div class="tarjeta"></div>
                            <div class="tarjeta"></div>
                        </article>
                    </section>
            </div>
        
    </div>
    <footer id="pie-pagina">
        <!-- <p>© 2021 Portal de tutorias</p> -->
    </footer>
</body>
</html>
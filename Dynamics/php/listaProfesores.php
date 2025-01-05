<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesores</title>
    <link rel="stylesheet" href="../../Statics/Styles/inicioSesion.css">
    <link rel="stylesheet" href="../../Statics/Styles/admin.css">
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="shortcut icon" href="../../Statics/media/img/favicon.png" type="image/png"> 
    <script src="../../libs/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
    <favicon href="../../Statics/media/img/favicon.png" type="image/x-icon">
    <script src="../js/listaProfesores.js"></script>
</head>
<body>
   <!-- SESSIONS     -->
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
    <div class="admins"> 
        <form id="admin">
            <div class="form_admin">
                <h1>Profesores</h1>
                <h4>De la siguiente lista de profesores seleccione aquel que quiere oficializar como tutor dentro del directorio.</h4>
                <article id="container">
                    <div id="id_admin" style="display:none;"></div>                                                                                                                                                                                                                                                                                                                                                     
                    <!-- <div id="administrador">
                        <img class="imagen">
                        <element class="texto_borrar" >
                            <h3>Luis Perez</h3>
                            <h5>12345678</h5>
                        </element>
                        <element class = "botones">
                            <button type="button" id="btnSelect" class="btn_select" data-id="${element.id}" >Seleccionar</button>
                        </element>
                    </div> -->
                </article>

            </div>
        </form>
        
    </div>
    <footer id="pie-pagina">
        <!-- <p>© 2021 Portal de tutorias</p> -->
    </footer>
</body>
</html>
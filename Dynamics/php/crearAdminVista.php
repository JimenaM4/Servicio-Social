<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Administrador</title>
    <link rel="stylesheet" href="../../Statics/Styles/inicioSesion.css">
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="shortcut icon" href="../../Statics/media/img/favicon.png" type="image/png"> 
    <script src="../../libs/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
    <script src="../js/crearAdmin.js"></script>
    <favicon href="../../Statics/media/img/favicon.png" type="image/x-icon">
</head>
<body> 
    <div id="modaldiv">
        <div id="Modal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <p id="modalText"></p>
            </div>
    </div>
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
    <div id="cuerpo">
        <div id="contenido"> 
            <form id="crear">
                <div class="form_inicio">
                    <h1>Crear Administrador</h1>
                    <input class="datos" type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                    <input class="datos" type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                    <button  class="button" id="enviar" name="enviar" type="submit">
                        Crear
                    </button>
                </div>
            </div>
        </form>
    </div>
    <footer id="pie-pagina">
        <!-- <p>© 2021 Portal de tutorias</p> -->
    </footer>
</body>
</html>
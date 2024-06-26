<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar administrador</title>
    <link rel="stylesheet" href="../../Statics/Styles/inicioSesion.css">
    <link rel="stylesheet" href="../../Statics/Styles/admin.css">
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="shortcut icon" href="../../Statics/media/img/favicon.png" type="image/png"> 
    <script src="../../libs/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
    <script src="../../Dynamics/js/editarAdmin.js"></script>
    <favicon href="../../Statics/media/img/favicon.png" type="image/x-icon">
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
    <div id="formulario">
        <form id="cambiar" method="post" target="_self" action="../Dynamics/php/editarAdmin.php">
            <fieldset id="centrar">
                <legend class="texto">Editar contraseña</legend>
                <label class="texto">Usuario:
                    <input id="usuario" name="usuario" type="text">
                </label>
                <br>
                <label class="texto">Constraseña:
                    <input id="contrasena" name="contrasena" type="password">
                </label>
                <br>
                <label class="texto">Contraseña nueva:
                    <input id="contrasena" name="contrasenaNew" type="password">
                </label>
                <br>
                <button class="texto" id="enviar" name="enviar" type="submit">Listo</button>
            </fieldset>
        </form>
    </div>
    <footer id="pie-pagina">
        <!-- <p>© 2021 Portal de tutorias</p> -->
    </footer>
</body>
</html>
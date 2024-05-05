<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="./Statics/styles/inicioSesion.css">
    <link rel="stylesheet" href="./libs/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="shortcut icon" href="./Statics/media/img/favicon.png" type="image/png"> 
    <script src="./libs/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
    <script src="./Dynamics/js/inicioSesion_admin.js"></script>
    <favicon href="./Statics/media/img/favicon.png" type="image/x-icon">
</head>
<body>
    <!-- Barra de navegación -->
    <header id="barra">
        <nav id="navbar">
            <div>
                <a class="navbar-brand text-light" href="http://www.prepa9.unam.mx/"><img src="./Statics/media/img/escudo_unam.png" alt="UNAM" class="escudo"></a>
            </div>
            <div id="text">
                <h1 id="titulo">Portal de Tutorías</h1>
            </div>   
            <div>
                <a class="navbar-brand text-light" href="http://www.prepa9.unam.mx/"><img src="./Statics/media/img/escudo_prepa9.png" alt="ENP9" id="ENP9" class="escudo"></a>
            </div>
        </nav>
    </header>
    <div id="modaldiv">
        <div id="Modal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <p id="modalText"></p>
            </div>
    </div>
    <div id="cuerpo">
        <div id="contenido"> 
        <form id="inicioSesion" method="post" target="_self" action="./Dynamics/php/iniciarSesionAdmin.php">
            <?php
                if (isset($_GET['error'])) {
                ?>
                <p class="error">
                    <?php
                        echo $_GET['error']; 
                    ?>
                </p>
                <?php
                }
            ?>
            <div class="form_inicio">
                <h1>Iniciar sesión</h1>
                <hr>
                <input class="datos" type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                <input class="datos" type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                <button class="button" id="btnIniciarSesion" type="submit">
                    Ingresar
                </button>
            </div>
        </div>
        </form>
    </div>
        <!-- footer -->
        <footer id="pie-pagina">
            <!-- <p>© 2021 Portal de tutorias</p> -->
        </footer>
</body>
</html>
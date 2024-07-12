<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Administrador</title>
    <link rel="stylesheet" href="../../Statics/Styles/inicioSesion.css">
    <link rel="stylesheet" href="../../Statics/Styles/admin.css">
    <link rel="stylesheet" href="../../libs/bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="shortcut icon" href="../../Statics/media/img/favicon.png" type="image/png"> 
    <script src="../../libs/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
    <favicon href="../../Statics/media/img/favicon.png" type="image/x-icon">
    <script src="../js/borrarAdmin.js"></script>
</head>
<body>
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
    <div class="borrar"> 
        <form id="borrar">
            <div class="form_borrar">
                <h1>Borrar Administrador(es)</h1>
                
                    <article id="container">
                        <div id="id_admin" style="display:none;"></div>
                        <!-- <div id="administrador"></div> -->
                        <!-- <img src=".jpg" class="imagen">
                        <element class="texto_borrar">
                            <h3>Luis Perez</h3>
                            <h5>12345678</h5>
                        </element>
                        <button class="btn_borrar" >Borrar</button> -->
                    </article>

            </div>
        </form>
        
    </div>
    <footer id="pie-pagina">
        <!-- <p>© 2021 Portal de tutorias</p> -->
    </footer>
</body>
</html>
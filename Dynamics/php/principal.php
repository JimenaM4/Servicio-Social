<?php
    if(profe)
    {
        echo"
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Principal</title>
            <link rel='stylesheet' href='../Statics/Styles/principal_profe.css'>
        </head>
        <body>
            <header>
                <img src='../Statics/media/unam.png' alt='escudo unam' id='unam'>
                <img src='../Statics/media/enp9.png' alt='escudo enp 9' id='enp9'>
                <h1 id='titulo'>Portal de tutorías</h1>
                <div id='busqueda'><p id='texto_busqueda'>Búsqueda</p></div>
                <div id='lupa'><img src='../Statics/media/lupa.png' alt='lupa' id='img_lupa'></div>
                <div id='mas'><p id='simbolo_mas'>≡</p></div>
            </header>
            <main>
                <section id='carrusel'>
                    <p id='menor_que'>&lt;</p>
                    <article class='img_lados' id='img_izquierda'><img src='../Statics/media/camara.png' alt='imagen' id='imagen_izquierda'></article>
                    <article id='img_medio'><img src='../Statics/media/camara.png' alt='imagen' id='imagen_medio'></article>
                    <article class='img_lados' id='img_derecha'><img src='../Statics/media/camara.png' alt='imagen' id='imagen_derecha'></article>
                    <p id='mayor_que'>></p>
                </section>
                <section id='opciones'>
                    <article class='cuadro_op' id='organigrama'><img class='icon' id='organigrama_icon' src='../Statics/media/organigrama_icon.png' alt='imagen organigrama'><br><p id='organigrama_texto'>Organigrama y directorio</p></article>
                    <article class='cuadro_op' id='PAT'><p id='PAT_texto'>PAT</p></article>
                    <article class='cuadro_op' id='recursos'><img class='icon' id='recursos_icon' src='../Statics/media/recursos_icon.png' alt='imagen recursos'><br><p id='recursos_texto'>Recursos</p></article>
                    <article class='cuadro_op' id='registrarse'><img class='icon' id='registrarse_icon' src='../Statics/media/registrarse_icon.png' alt='imagen registrarse'><br><p id='registrarse_texto'>Registrarse como tutor</p></article>
                </section>
            </main>
            <footer>
        
            </footer>
        </body>
        </html>"
    }
    else if(alumno)
    {
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Principal</title>
            <link rel='stylesheet' href='../Statics/Styles/principal.css'>
        </head>
        <body>
            <header>
                <img src='../Statics/media/unam.png' alt='escudo unam' id='unam'>
                <img src='../Statics/media/enp9.png' alt='escudo enp 9' id='enp9'>
                <h1 id='titulo'>Portal de tutorias</h1>
                <div id='busqueda'><p id='texto_busqueda'>Busqueda</p></div>
                <div id='lupa'><img src='../Statics/media/lupa.png' alt='lupa' id='img_lupa'></div>
                <div id='mas'><p id='simbolo_mas'>≡</p></div>
            </header>
            <main>
                <section id='carrusel'>
                    <p id='menor_que'>&lt;</p>
                    <article class='img_lados' id='img_izquierda'><img src='../Statics/media/camara.png' alt='imagen' id='imagen_izquierda'></article>
                    <article id='img_medio'><img src='../Statics/media/camara.png' alt='imagen' id='imagen_medio'></article>
                    <article class='img_lados' id='img_derecha'><img src='../Statics/media/camara.png' alt='imagen' id='imagen_derecha'></article>
                    <p id='mayor_que'>></p>
                </section>
                <section id='opciones'>
                    <article class='cuadro_op' id='organigrama'><img class='icon' id='organigrama_icon' src='../Statics/media/organigrama_icon.png' alt='imagen organigrama'><br><p id='organigrama_texto'>Organigrama y directorio</p></article>
                    <article class='cuadro_op' id='cuestionarios'><img class= 'icon' id='cuestionario_icon' src='../Statics/media/cuestionarios_icon.png' alt='imagen cuestionarios'><br><p id='cuestionarios_texto'>Cuestionarios</p></article>
                    <article class='cuadro_op' id='recursos'><img class='icon' id='recursos_icon' src='../Statics/media/recursos_icon.png' alt='imagen recursos'><br><p id='recursos_texto'>Recursos</p></article>
                    <article class='cuadro_op' id='PAT'><p id='PAT_texto'>PAT</p></article>
                </section>
            </main>
            <footer>

            </footer>
        </body>
        </html>"
    }
    else
    {
        echo"
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Principal</title>
            <link rel='stylesheet' href='../Statics/Styles/principal_tutor.css'>
        </head>
        <body>
            <header>
                <img src='../Statics/media/unam.png' alt='escudo unam' id='unam'>
                <img src='../Statics/media/enp9.png' alt='escudo enp 9' id='enp9'>
                <h1 id='titulo'>Portal de tutorias</h1>
                <div id='busqueda'><p id='texto_busqueda'>Busqueda</p></div>
                <div id='lupa'><img src='../Statics/media/lupa.png' alt='lupa' id='img_lupa'></div>
                <div id='mas'><p id='simbolo_mas'>≡</p></div>
            </header>
            <main>
                <section id='carrusel'>
                    <p id='menor_que'>&lt;</p>
                    <article class='img_lados' id='img_izquierda'><img src='../Statics/media/camara.png' alt='imagen' id='imagen_izquierda'></article>
                    <article id='img_medio'><img src='../Statics/media/camara.png' alt='imagen' id='imagen_medio'></article>
                    <article class='img_lados' id='img_derecha'><img src='../Statics/media/camara.png' alt='imagen' id='imagen_derecha'></article>
                    <p id='mayor_que'>></p>
                </section>
                <section id='opciones'>
                    <article class='cuadro_op' id='organigrama'><img class='icon' id='organigrama_icon' src='../Statics/media/organigrama_icon.png' alt='imagen organigrama'><br><p id='organigrama_texto'>Organigrama y directorio</p></article>
                    <article class='cuadro_op' id='recursos'><img class='icon' id='recursos_icon' src='../Statics/media/recursos_icon.png' alt='imagen recursos'><br><p id='recursos_texto'>Recursos</p></article>
                    <article class='cuadro_op' id='cuestionarios'><img class= 'icon' id='cuestionario_icon' src='../Statics/media/estadisticas_icon.png' alt='imagen cuestionarios y estadisticas'><br><p id='cuestionarios_texto'>Cuestionarios y estadisticas</p></article>
                    <article class='cuadro_op' id='PAT'<p id='PAT_texto'>PAT</p></article>
                    <article class='cuadro_op' id='expediente'><img class='icon' id='expediente_icon' src='../Statics/media/expedientes_icon.png' alt='imagen estadisticas'><br><p id='expediente_texto'>Expedientes de alumnos y tutores</p></article>
                </section>
            </main>
            <footer>

            </footer>
        </body>
        </html>
        "
    }
?>
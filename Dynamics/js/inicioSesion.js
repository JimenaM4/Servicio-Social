window.addEventListener("load",()=>{
    const tipoUsuario = document.getElementById("select");
    const usuario = document.getElementById('usuario');
    const contrasena = document.getElementById('contrasena');
    const btnIniciarSesion = document.getElementById('btnIniciarSesion');

    const inicioSesion = document.getElementById("inicioSesion");

    // function ocultar() {//funcion para ocultar los elementos
    //     var elements = [nombre, apellidoPat, apellidoMat, correo, numTrabajador, btnRegistro, numCuenta, fechaNacimiento, grupo, asignatura, RFC];
    //     for (var i = 0; i < elements.length; i++) {
    //         elements[i].style.display = "none";
    //     }
    // }
    
    // function mostrar(elements) {//funcion para mostrar los elementos
    //     for (var i = 0; i < elements.length; i++) {
    //         elements[i].style.display = "block";
    //         elements[i].ariaRequired = "true";
    //     }
    // }

    // fechaNacimiento.addEventListener("focus",()=>{//cambiar el tipo de input para que se muestre el calendario
    //     fechaNacimiento.type = "date";
    // });

    // fechaNacimiento.addEventListener("blur",()=>{//regresar el tipo de input a text para que se muestre el placeholder
    //     fechaNacimiento.type = "text";
    // });

    // ocultar();//ocultar todos los elementos al inicio

    // usuario.addEventListener('change', function() {
    //     if (usuario.value == "0") {//si el usuario selecciona la opcion de seleccionar
    //         // ocultar();
    //         cuerpo.style.backgroundImage = "url(../../Statics/media/img/img_registro.png)";
    //     }
    //     if (usuario.value == "1") {//si el usuario selecciona la opcion de alumno
    //         // ocultar();
    //         // mostrar([numCuenta, nombre, apellidoPat, apellidoMat, correo, fechaNacimiento, btnRegistro, grupo]);
    //         // form.style.height = "93%";
    //         cuerpo.style.backgroundImage = "url(../../Statics/media/img/img_regis_alum.png)";
    //     }
    //     if (usuario.value == "2") {//si el usuario selecciona la opcion de profesor
    //         // ocultar();
    //         // form.style.height = "86%";
    //         // mostrar([nombre, apellidoPat, apellidoMat, correo, numTrabajador, btnRegistro, RFC]);
    //         cuerpo.style.backgroundImage = "url(../../Statics/media/img/img_regis_prof.png)";
    //     }
    //     if (usuario.value == "3") {//si el usuario selecciona la opcion de tutor
    //         // ocultar();
    //         // form.style.height = "86%";
    //         // mostrar([RFC, grupo, asignatura, btnRegistro]);
    //         cuerpo.style.backgroundImage = "url(../../Statics/media/img/img_regis_tut.png)";
    //     }
    // });

    function testRegex(value, regex, message) {
        if (!regex.test(value)) {
            var modal = document.getElementById("Modal");
            var span = document.getElementsByClassName("close")[0];
            document.getElementById("modalText").innerText = message;
            modal.style.display = "block";
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            return false;
        }
        return true;
    }

    function testResultados(results, usuario) {//funcion para verificar que todos los resultados sean true
        if (tipoUsuario == "1" && results.length == 2) {
            for (let i = 0; i < results.length; i++) {
                if (!results[i]) {
                    return false;
                }
            }
        }
        if (tipoUsuario == "2" && results.length == 2) {
            for (let i = 0; i < results.length; i++) {
                if (!results[i]) {
                    return false;
                }
            }
        }
        if (tipoUsuario == "3" && results.length == 2) {
            for (let i = 0; i < results.length; i++) {
                if (!results[i]) {
                    return false;
                }
            }
        }
        return true;
    }

    btnIniciarSesion.addEventListener('click', (e) => {
        e.preventDefault();
        let results = []; //array para guardar los resultados de los regex
        if (tipoUsuario.value == "1") {
            results.push(testRegex(usuario.value, /^[0-9]{9}$/i, "Número de cuenta inválido, verifica que contenga 9 dígitos, sin espacios ni guiones"), 1);
            results.push(testRegex(contrasena.value, /^[0-9]{8}$/i, "Fecha de nacimiento inválida, verifica que sea una fecha válida"), 1);
        }
        if (tipoUsuario.value == "2") {    
            results.push(testRegex(contrasena.value, /^[0-9]{5,6}$/i, "Número de trabajador inválido, verifica que contenga de 5 a 6 dígitos, sin espacios ni guiones"), 2);
            results.push(testRegex(usuario.value, /^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/i, "RFC inválido, verifica que contenga 13 carácteres"), 2);
        }
        if (tipoUsuario.value == "3") {
            results.push(testRegex(usuario.value, /^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/i, "RFC inválido, verifica que contenga 13 carácteres"), 2);
            results.push(testRegex(contrasena.value, /^[0-9]{5,6}$/i, "Número de trabajador inválido, verifica que contenga de 5 a 6 dígitos, sin espacios ni guiones"), 2);
        }

        if (testResultados(results, tipoUsuario.value)) {
            btnIniciarSesion.value = tipoUsuario.value;      
            datosForm = new FormData(inicioSesion);
            datosForm.append("tipoUsuario", tipoUsuario.value);
            fetch("./Dynamics/php/iniciarSesion.php",{
                method: "POST",
                body: datosForm,
                })
            .then((respuesta)=>{
                return respuesta.json();
            }).then((datosJSON)=>{
                console.log(datosJSON.mensaje);
                if(datosJSON.mensaje=="1")
                {
                    window.location.href = "./Templates/principal.html";
                }
                else if(datosJSON.mensaje=="2")
                {
                    window.location.href = "./Templates/principal_profe.html";
                }
                else if(datosJSON.mensaje=="3")
                {
                    window.location.href = "./Templates/principal_tutor.html";
                }
                else
                {
                    var modal = document.getElementById("Modal");
                    var span = document.getElementsByClassName("close")[0];
                    document.getElementById("modalText").innerText = "Usuario o contraseña incorrectos";
                    modal.style.display = "block";
                    span.onclick = function() {
                        modal.style.display = "none";
                    }
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                }
            });
            
        } else {
            btnIniciarSesion.value = "0";
            console.log("Registro fallido");
        }
    });
   
 });
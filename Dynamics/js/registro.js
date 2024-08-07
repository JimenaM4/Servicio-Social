window.addEventListener("load",()=>{
    const usuario = document.getElementById("select");
    const cuerpo = document.getElementById("cuerpo");
    const numCuenta = document.getElementById("numCuenta");
    const RFC = document.getElementById("RFC");
    const nombre = document.getElementById("nombre");
    const apellidoPat = document.getElementById("apellidoPat");
    const apellidoMat = document.getElementById("apellidoMat");
    const correo = document.getElementById("correo");
    const fechaNacimiento = document.getElementById("fechaNacimiento");
    const numTrabajador = document.getElementById("numTrabajador");
    const grupo = document.getElementById("grupo");
    const asignatura = document.getElementById("asignatura");
    const btnRegistro = document.getElementById("btnRegistrarse");
    const formRegis = document.getElementById("formRegis");
    const form = document.getElementById("form"); 

    function ocultar() {//funcion para ocultar los elementos
        var elements = [nombre, apellidoPat, apellidoMat, correo, numTrabajador, btnRegistro, numCuenta, fechaNacimiento, grupo, asignatura, RFC];
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = "none";
        }
    }
    
    function mostrar(elements) {//funcion para mostrar los elementos
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = "block";
            elements[i].ariaRequired = "true";
        }
    }

    fechaNacimiento.addEventListener("focus",()=>{//cambiar el tipo de input para que se muestre el calendario
        fechaNacimiento.type = "date";
    });

    fechaNacimiento.addEventListener("blur",()=>{//regresar el tipo de input a text para que se muestre el placeholder
        fechaNacimiento.type = "text";
    });

    ocultar();//ocultar todos los elementos al inicio

    usuario.addEventListener('change', function() {
        if (usuario.value == "0") {//si el usuario selecciona la opcion de seleccionar
            ocultar();
            cuerpo.style.backgroundImage = "url(../Statics/media/img/img_registro.png)";
        }
        if (usuario.value == "1") {//si el usuario selecciona la opcion de alumno
            ocultar();
            mostrar([numCuenta, nombre, apellidoPat, apellidoMat, correo, fechaNacimiento, btnRegistro, grupo]);
            form.style.height = "93%";
            cuerpo.style.backgroundImage = "url(../Statics/media/img/img_regis_alum.png)";
        }
        if (usuario.value == "2") {//si el usuario selecciona la opcion de profesor
            ocultar();
            form.style.height = "86%";
            mostrar([nombre, apellidoPat, apellidoMat, correo, numTrabajador, btnRegistro, RFC]);
            cuerpo.style.backgroundImage = "url(../Statics/media/img/img_regis_prof.png)";
        }
        if (usuario.value == "3") {//si el usuario selecciona la opcion de tutor
            ocultar();
            form.style.height = "86%";
            mostrar([RFC, grupo, asignatura, btnRegistro]);
            cuerpo.style.backgroundImage = "url(../Statics/media/img/img_regis_tut.png)";
        }
    });

    function mostrarModal(mensaje) {//funcion para mostrar el modal
        var modal = document.getElementById("Modal");
        var span = document.getElementsByClassName("close")[0];
        document.getElementById("modalText").innerText = mensaje;
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

    function testRegex(value, regex, message) {//funcion para verificar que el valor cumpla con el regex y en caso que no, mostrar el modal
        if (!regex.test(value)) {
            mostrarModal(message);
            return false;
        }
        return true;
    }

    function testResultados(results, usuario) {//funcion para verificar que todos los resultados sean true
        if (usuario == "1"||"2"||"3")
        {
            for (let i = 0; i < results.length; i++) {
                if (!results[i]) {
                    return false;
                }else{
                    return true;
                }  
            }
        }
    }

    btnRegistro.addEventListener('click', (e) => {
        e.preventDefault();
        let results = []; //array para guardar los resultados de los regex
        if (usuario.value == "1") {
            results.push(testRegex(numCuenta.value, /^[0-9]{9}$/i, "Número de cuenta inválido, verifica que contenga 9 dígitos, sin espacios ni guiones"), 1);
            results.push(testRegex(fechaNacimiento.value, /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/i, "Fecha de nacimiento inválida, verifica que sea una fecha válida"), 1);
            results.push(testRegex(correo.value, /^[a-zA-Z0-9]+@alumno\.enp\.unam\.mx$/, "Correo inválido, verifica que sea un correo institucional"), 1);
            results.push(testRegex(nombre.value,  /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30}( [a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30})?$/i, "Nombre inválido, verifica que contenga de 3 a 30 carácteres"), 1);
            results.push(testRegex(apellidoPat.value, /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i, "Apellido Paterno inválido, verifica que contenga de 3 a 30 carácteres"), 1);
            results.push(testRegex(apellidoMat.value, /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i, "Apellido Materno inválido, verifica que contenga de 3 a 30 carácteres"), 1);
            results.push(testRegex(grupo.value, /^[4-6][0-6][0-9]$/i, "Grupo inválido, verifica que contenga 3 carácteres"), 1)
        }
        if (usuario.value == "2") {
            results.push(testRegex(correo.value, /^[a-zA-Z]+\.+[a-zA-Z]+@(enp|dgenp)\.unam\.mx$/, "Correo inválido, verifica que sea un correo institucional"), 2);
            results.push(testRegex(numTrabajador.value, /^[0-9]{5,6}$/i, "Número de trabajador inválido, verifica que contenga de 5 a 6 dígitos, sin espacios ni guiones"), 2);
            results.push(testRegex(nombre.value,  /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30}( [a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30})?$/i, "Nombre inválido, verifica que contenga de 3 a 30 carácteres"), 2);
            results.push(testRegex(apellidoPat.value, /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i, "Apellido Paterno inválido, verifica que contenga de 3 a 30 carácteres"), 2);
            results.push(testRegex(apellidoMat.value, /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i, "Apellido Materno inválido, verifica que contenga de 3 a 30 carácteres"), 2);
            results.push(testRegex(RFC.value, /^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/i, "RFC inválido, verifica que contenga 13 carácteres"), 2);
        }
        if (usuario.value == "3") {
            results.push(testRegex(RFC.value, /^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/i, "RFC inválido, verifica que contenga 13 carácteres"), 2);
            results.push(testRegex(grupo.value, /^[4-6][0-6][0-9]$/i, "Grupo inválido, verifica que contenga 3 carácteres"), 3);
            results.push(testRegex(asignatura.value, /^([0-9]{4}|[AE]\d{3})$/i, "Asignatura inválida, verifica que se una de las opciones"), 3);
        }

        if (testResultados(results, usuario.value)) {
            btnRegistro.value = usuario.value;      
            datosForm = new FormData(formRegis);
            datosForm.append("usuario", usuario.value);
            fetch("../Dynamics/php/registro.php",{
                method: "POST",
                body: datosForm,
                })
            .then((respuesta)=>{
                return respuesta.json();
            }).then((datosJSON)=>{
                if (datosJSON.mensaje == "Registrado correctamente") {
                    window.location.href = "../index.php";  
                }
                else if(datosJSON.mensaje == "El usuario ya existe"){
                    mostrarModal("El usuario ya existe, verifica los datos o inicia sesión");  
                                    
                } else if(datosJSON.mensaje == "Tutor ya registrado"){
                    mostrarModal("Tutor ya registrado en este grupo y ciclo escolar, verifica los datos o inicia sesión");
                }
            });
            
        } else {
            btnRegistro.value = "0";
            console.log("Registro fallido");
        }
    });
   
 });
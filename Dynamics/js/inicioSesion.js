window.addEventListener("load",()=>{
    const tipoUsuario = document.getElementById("select");
    const usuario = document.getElementById('usuario');
    const contrasena = document.getElementById('contrasena');
    const btnIniciarSesion = document.getElementById('btnIniciarSesion');
    const inicioSesion = document.getElementById("inicioSesion");
 
    function ocultar() {
        var elements = [usuario, contrasena, btnIniciarSesion];
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = "none";
        }
    }
   function mostrar() {
        var elements = [usuario, contrasena, btnIniciarSesion];
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = "block";
        }
    }
    ocultar();
    tipoUsuario.addEventListener('change', function() {
        if (tipoUsuario.value == "0") {
            ocultar();
        }
        if (tipoUsuario.value == "1") {
            mostrar();
            usuario.placeholder = "Número de cuenta";
            contrasena.placeholder = "Fecha de nacimiento (aaaammdd)";
        }
        if (tipoUsuario.value == "2") {
            mostrar();
            usuario.placeholder = "RFC";
            contrasena.placeholder = "Número de trabajador";
        }
        if (tipoUsuario.value == "3") {
            mostrar();
            usuario.placeholder = "RFC";
            contrasena.placeholder = "Número de trabajador";
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

    function testRegex(value, regex, message) {
        if (!regex.test(value)) {
            mostrarModal(message);
            return false;
        }
        return true;
    }

    function testResultados(results, usuario) {//funcion para verificar que todos los resultados sean true
        if ((tipoUsuario == "1" || "2" ||"3") && results.length == 4) {
            for (let i = 0; i < results.length; i++) {
                if (!results[i]) {
                    return false;
                }else{
                    return true;
                }
            } 
        }
    }

    btnIniciarSesion.addEventListener('click', (e) => {
        e.preventDefault();
        let results = []; //array para guardar los resultados de los regex
        if (tipoUsuario.value == "1") {
            results.push(testRegex(usuario.value, /^[0-9]{9}$/i, "Número de cuenta inválido, verifica que contenga 9 dígitos, sin espacios ni guiones"), 1);
            results.push(testRegex(contrasena.value, /^[0-9]{8}$/i, "Fecha de nacimiento inválida, verifica que tenga el siguiente formato: aaaammdd"), 1);
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
                    window.location.href = "./dynamics/php/principal.php";
                }
                else if(datosJSON.mensaje=="2")
                {
                    window.location.href = "./dynamics/php/principal_profe.php";
                }
                else if(datosJSON.mensaje=="3")
                {
                    window.location.href = "./dynamics/php/principal_tutor.php";
                }
                else
                { 
                    mostrarModal("El usuario no existe, verifica los datos");
                }
            });
            
        } else {
            btnIniciarSesion.value = "0";
            console.log("Registro fallido");
        }
    });
   
 });
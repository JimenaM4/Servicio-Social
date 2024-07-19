window.addEventListener("load", ()=>{
    const formulario = document.getElementById("cambiar");
    const cambiar = document.getElementById("enviar");
    const usuario = document.getElementById("usuario");
    const contrasena = document.getElementById("contrasena");
    const contrasenaNueva = document.getElementById("contrasenaNueva");

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

    function validacion(usuario, contrasena, contrasenaNueva) {
        // Regex 
        var usuarioRegex = /^AdminP9T\d+$/; // ejemplo: AdminP9T1
        var contrasenaRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[^\s]{10,20}$/; // ejemplo: MyP@ssw0rd!
        // Test usuario
        if (!testRegex(usuario, usuarioRegex, "Verifica que el usuario siga el formato AdminP9T#.")) {
            return false;
        }
        // Test contrasena
        if (!testRegex(contrasena, contrasenaRegex, "Verifica que la contraseña tenga al menos una mayúscula, una minúscula, un número, un caracter especial @$!%*?& y que tenga una longitud de 10 a 20 caracteres.")) {
            return false;
        }
        // Test contrasenaNueva
        if (!testRegex(contrasenaNueva, contrasenaRegex, "Verifica que la contraseña nueva tenga al menos una mayúscula, una minúscula, un número, un caracter especial @$!%*?& y que tenga una longitud de 10 a 20 caracteres.")) {
            return false;
        }
        return true;
    }


    cambiar.addEventListener("click",(e)=>{
        e.preventDefault();
        if (validacion(usuario.value, contrasena.value, contrasenaNueva.value)){
            datosForm = new FormData(formulario);
            fetch("./editarAdmin.php",{
                method: "POST",
                body: datosForm,
            }).then((respuesta)=>{
                return respuesta.json();
            }).then((datosJSON)=>{
                // console.log(datosJSON.mensaje);
                // console.log(datosJSON.contra+" contraseña vieja");
                // console.log(datosJSON.contraNueva+" contraseña nueva");
            if(datosJSON.mensaje=="0")
                {
                    mostrarModal("La contraseña no coincide, verifica los datos");
                    
                }
            if(datosJSON.mensaje=="1")
                {
                    mostrarModal("Contraseña actualizada correctamente");
                }
                console.log(datosJSON.usuario);
                console.log(datosJSON.contrasena);
            });
        }
        location.href="../php/gestionarAdmins.php";
    });
});
window.addEventListener("load", ()=>{
    const crear = document.getElementById("crear");
    const enviar = document.getElementById("enviar");
    const usuario = document.getElementById("usuario");
    const contrasena = document.getElementById("contrasena");

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

    function validacion(usuario, contrasena) {
        // Regex 
        var usuarioRegex = /^AdminP9T\d+$/; // ejemplo: AdminP9T1
        var contrasenaRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[^\s]{10,20}$/; // ejemplo: MyP@ssw0rd!
        // Test usuario
        if (!testRegex(usuario, usuarioRegex, "Usuario incorrecto, verifica que sea de la forma AdminP9T#, donde # es un número.")) {
            return false;
        }
        // Test contrasena
        if (!testRegex(contrasena, contrasenaRegex, "Contraseña incorrecta, verifica que tenga al menos una mayúscula, una minúscula, un número, un caracter especial @$!%*?& y que tenga una longitud de 10 a 20 caracteres.")) {
            return false;
        }
        return true;
    }

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

    enviar.addEventListener("click",(e)=>{
        e.preventDefault();
        if (validacion(usuario.value, contrasena.value)){
            datosForm = new FormData(crear);
            fetch("./crearAdmin.php",{
                method: "POST", 
                body: datosForm,
            }).then((respuesta)=>{
                return respuesta.json();
            }).then((datosJSON)=>{
                mostrarModal(datosJSON.mensaje);
                location.href="../php/gestionarAdmins.php";
            })
         }
    })
});
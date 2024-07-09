window.addEventListener("load", ()=>{
    const inicioSesion = document.getElementById("inicioSesion");
    const btnIniciarSesion = document.getElementById("btnIniciarSesion");
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
        if (!testRegex(usuario, usuarioRegex, "Verifica que el usuario sea correcto.")) {
            return false;
        }
    
        // Test contrasena
        if (!testRegex(contrasena, contrasenaRegex, "Verifica que la contraseña sea correcta.")) {
            return false;
        }
    
        return true;
    }
    
    btnIniciarSesion.addEventListener("click",(e)=>{
        e.preventDefault();

        if (validacion(usuario.value, contrasena.value)){
            datosForm = new FormData(inicioSesion);
            fetch("./Dynamics/php/iniciarSesionAdmin.php",{
                method: "POST",
                body: datosForm,
            }).then((respuesta)=>{
                return respuesta.json();
            }).then((datosJSON)=>{
                if(datosJSON.mensaje=="correcto")
                {
                    location.href = "./Dynamics/php/principalAdmin.php";
                }else{
                    var modal = document.getElementById("Modal");
                    var span = document.getElementsByClassName("close")[0];
                    if (datosJSON.mensaje != "La contraseña es incorrecta"){
                        document.getElementById("modalText").innerText = "El usuario no existe, verifica los datos";
                    }else{
                        document.getElementById("modalText").innerText =  datosJSON.mensaje;
                    }
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
        }   
    });
}); 
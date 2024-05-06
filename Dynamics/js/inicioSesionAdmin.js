window.addEventListener("load", ()=>{
    const inicioSesion = document.getElementById("inicioSesion");
    const btnIniciarSesion = document.getElementById("btnIniciarSesion");

    btnIniciarSesion.addEventListener("click",(e)=>{
        e.preventDefault();
        datosForm = new FormData(inicioSesion);
        fetch("./Dynamics/php/iniciarSesionAdmin.php",{
            method: "POST",
            body: datosForm,
        }).then((respuesta)=>{
            return respuesta.json();
        }).then((datosJSON)=>{
            console.log(datosJSON.mensaje);
            if(datosJSON.mensaje=="correcto")
                {
                    location.href = "./Templates/principal_admin.html";
                }
        });
    });
});
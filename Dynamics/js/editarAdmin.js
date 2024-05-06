window.addEventListener("load", ()=>{
    const formulario = document.getElementById("cambiar");
    const cambiar = document.getElementById("enviar");

    cambiar.addEventListener("click",(e)=>{
        e.preventDefault();
        datosForm = new FormData(formulario);
        fetch("../Dynamics/php/editarAdmin.php",{
            method: "POST",
            body: datosForm,
        }).then((respuesta)=>{
            return respuesta.json();
        }).then((datosJSON)=>{
            console.log(datosJSON.mensaje);
        if(datosJSON.mensaje=="0")
            {
                alert("Su contraseña no coincide.");
                
            }
        if(datosJSON.mensaje=="1")
            {
                alert("Contraseña actualizada.");
                window.location.href = "./Templates/principal_admin.html";
            }
            // console.log(datosJSON.usuario);
            // console.log(datosJSON.contrasena);
        })
    })
});
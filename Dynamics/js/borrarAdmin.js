window.addEventListener("load", ()=>{
    const borrar = document.getElementById("borrar");
    const enviar = document.getElementById("enviar");

    enviar.addEventListener("click",(e)=>{
        e.preventDefault();
        datosForm = new FormData(borrar);
        fetch("./borrarAdmin.php",{
            method: "POST",
            body: datosForm,
        }).then((respuesta)=>{
            return respuesta.json();
        }).then((datosJSON)=>{
            console.log(datosJSON.mensaje);
            // console.log(datosJSON.usuario);
            // console.log(datosJSON.contrasena);
        })
    })
});
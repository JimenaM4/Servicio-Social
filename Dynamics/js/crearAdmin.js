window.addEventListener("load", ()=>{
    const crear = document.getElementById("crear");
    const enviar = document.getElementById("enviar");

    enviar.addEventListener("click",(e)=>{
        e.preventDefault();
        datosForm = new FormData(crear);
        fetch("./crearAdmin.php",{
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
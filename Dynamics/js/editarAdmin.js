window.addEventListener("load", ()=>{
    const formulario = document.getElementById("cambiar");
    const cambiar = document.getElementById("enviar");

    cambiar.addEventListener("click",(e)=>{
        e.preventDefault();
        datosForm = new FormData(formulario);
        fetch("./editarAdmin.php",{
            method: "POST",
            body: datosForm,
        }).then((respuesta)=>{
            return respuesta.json();
        }).then((datosJSON)=>{
            console.log(datosJSON.mensaje);
            console.log(datosJSON.contra+" contraseña vieja");
            console.log(datosJSON.contraNueva+" contraseña nueva");
        if(datosJSON.mensaje=="0")
            {
                alert("Su contraseña no coincide.");
                
            }
        if(datosJSON.mensaje=="1")
            {
                alert("Contraseña actualizada.");
                window.location.href = "../php/principalAdmin.php";
            }
            // console.log(datosJSON.usuario);
            // console.log(datosJSON.contrasena);
        })
    })
});
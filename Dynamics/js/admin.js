window.addEventListener("load", ()=>{
    const crear = document.getElementById("user2");
    const borrar = document.getElementById("user3");
    const contrasena = document.getElementById("user4");
    const mas = document.getElementById("mas");
    const barraMas = document.createElement("div");
    const btnCerrar = document.createElement("btn");
    const body = document.getElementById("body");
 
    barraMas.setAttribute("id","barraMas"); 
    btnCerrar.setAttribute("id","btnCerrar");
    btnCerrar.textContent = " Cerrar Sesión ";

    mas.addEventListener("click", ()=>{
        let valor = mas.getAttribute("data-valor");
        if (valor == 0)
        {
            barraMas.appendChild(btnCerrar);
            body.prepend(barraMas);
            mas.setAttribute("data-valor","1");
        }
        else{
            btnCerrar.remove();
            barraMas.remove();
            mas.setAttribute("data-valor","0");
        }
    });

    btnCerrar.addEventListener("click", (e)=>{
        e.preventDefault();
        fetch("./cerrarSesionAdmin.php")
        .then((respuesta)=>{
            return respuesta.json();
        }).then((datosJSON)=>{
            if(datosJSON.mensaje == "Sesion cerrada correctamente")
                {
                    location.href = "../../indexAdmin.php";
                }
        })
    });

    crear.addEventListener("click", ()=>{
        location.href="../php/crearAdminVista.php";
    });

    borrar.addEventListener("click", ()=>{
        location.href="../php/borrarAdminVista.php";
    });

    contrasena.addEventListener("click", ()=>{
        location.href="../php/cambiarContrasena.php"
    });
    
});
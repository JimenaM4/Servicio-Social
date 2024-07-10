window.addEventListener("load", ()=>{
    const mas = document.getElementById("mas");
    const barraMas = document.createElement("div");
    const btnCerrar = document.createElement("btn");
    const body = document.getElementById("body");

    barraMas.setAttribute("id","barraMas");
    btnCerrar.setAttribute("id","btnCerrar");
    btnCerrar.textContent = "Cerrar Sesion";

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
        fetch("./cerrarSesion.php")
        .then((respuesta)=>{
            return respuesta.json();
        }).then((datosJSON)=>{
            if(datosJSON.mensaje == "Sesion cerrada correctamente")
                {
                    location.href = "../../index.php";
                }
        })
    });
});
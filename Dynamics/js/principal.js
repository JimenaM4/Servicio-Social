window.addEventListener("load", ()=>{
    const mas = document.getElementById("mas");
    const barraMas = document.createElement("div");
    const btnCerrar = document.createElement("btn");
    const body = document.getElementById("body");

    barraMas.setAttribute("id","barraMas");
    barraMas.style.width = "25vw";
    barraMas.style.height = "42vh";
    barraMas.style.padding = "0.5rem";
    barraMas.style.position = "absolute";
    barraMas.style.top = "7rem";
    barraMas.style.right = "0rem";
    barraMas.style.backgroundColor = "#9B8BAF";
    barraMas.style.zIndex = "9998";
    // barraMas.style.position = ""
    btnCerrar.setAttribute("id","btnCerrar");
    btnCerrar.style.width = "8rem";
    btnCerrar.style.width = "8rem";
    btnCerrar.textContent = "Cerrar Sesion";
    btnCerrar.style.position = "absolute";
    btnCerrar.style.zIndex = "9999";
    btnCerrar.style.backgroundColor = "#FFFFFF";

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
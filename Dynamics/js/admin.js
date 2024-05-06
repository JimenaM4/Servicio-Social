window.addEventListener("load", ()=>{
    const crear = document.getElementById("user2");
    const borrar = document.getElementById("user3");
    const contrasena = document.getElementById("user4");

    crear.addEventListener("click", ()=>{
        location.href="./crearAdmin.html";
    });

    borrar.addEventListener("click", ()=>{
        location.href="./borrarAdmin.html";
    });

    contrasena.addEventListener("click", ()=>{
        location.href="./cambiarContrasena.html"
    });
    
});
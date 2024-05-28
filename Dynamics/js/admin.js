window.addEventListener("load", ()=>{
    const crear = document.getElementById("user2");
    const borrar = document.getElementById("user3");
    const contrasena = document.getElementById("user4");

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
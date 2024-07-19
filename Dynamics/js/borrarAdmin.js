window.addEventListener("load", (e)=>{
    
    e.preventDefault();
    const crear = document.getElementById("btnnuevo");
    var modal = document.getElementById("confirmationModal");
    var span = document.getElementsByClassName("close")[0];
    var confirmBtn = document.getElementById("confirmacion");
    var cancelBtn = document.getElementById("cancelar");

    crear.addEventListener("click", ()=>{
        location.href="../php/crearAdminVista.php";
    });


    fetch("./borrarAdminDB.php")
    .then((respuesta)=>{
        return respuesta.json();
    }).then((datosJSON)=>
    {
        const div = document.getElementById("container");
        const id = document.getElementById("id_admin");
        console.log(datosJSON);
        datosJSON.forEach(function(element)
        {
            console.log(element);
            // div.innerHTML+=`
            // <div class="col-6">
            //     <div class="p-3">
            //         <img src="${element.Foto}" class="img-fluid" alt="producto1" id="imagen" data-id="${element.id}">
            //         <p>${element.Nombre}</p>
            //     </div>
            // </div>`;
            div.innerHTML+=`
                <div id="administrador" >
                    <img class="imagen">
                    <element class="texto_borrar" >
                        <h3>${element.Usuario}</h3>
                        <h5>${element.NoTrabajador}</h5>
                    </element>
                    <element class = "botones">
                        <button type="button" id="btnEditar" class="btn_editar" data-id="${element.id}" >Editar</button>
                        <button type="button" id="btnBorrar" data-id="${element.id}" class="btn_borrar">Borrar</button>
                    </element>
                </div>
            `;
            id.id = element.id;
        })

        
        const botonesBorrar = document.querySelectorAll(".btn_borrar");
        botonesBorrar.forEach((boton) => {
            boton.addEventListener("click", (e) => {
                console.log("borrar");
                e.preventDefault();
                modal.style.display = "block";//muestra el modal

                span.onclick = function() {
                    modal.style.display = "none";
                }//cierra el modal, sin confirmar la eliminación

                confirmBtn.onclick = function() {
                    console.log("Confirmado");
                    modal.style.display = "none";
                    datosForm = new FormData();
                    datosForm.append("idAdmin",id.id);
                    fetch("./borrarAdmin.php", {
                        method: "POST",
                        body: datosForm,
                    }) 
                    .then((respuesta)=>{
                        return respuesta.json();
                    }).then((datosJSON)=>{ 
                        console.log(datosJSON.mensaje);
                        if (datosJSON.mensaje == "Administrador borrado") {
                            console.log("Usuario eliminado");
                            location.reload();
                        }
                    });
                }//cierra el modal, confirmando la eliminación, elimina el usuario y recarga la página

                cancelBtn.onclick = function() {
                    modal.style.display = "none";
                }//cierra el modal, cancelando la eliminación
            });
        });
        
        const botonesEditar = document.querySelectorAll(".btn_editar");
        botonesEditar.forEach((boton) => {
            boton.addEventListener("click", (e) => {
                location.href = "../php/cambiarContrasena.php";
            });
        });

    });

});
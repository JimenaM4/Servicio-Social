window.addEventListener("load", (e)=>{
    
    e.preventDefault();
    const crear = document.getElementById("btnSelect");
    var modal = document.getElementById("confirmationModal");
    var span = document.getElementsByClassName("close")[0];
    var confirmBtn = document.getElementById("confirmacion");
    var cancelBtn = document.getElementById("cancelar");

    // crear.addEventListener("click", ()=>{
    //     location.href="../php/crearAdminVista.php";
    // });


    fetch("./listaProfesoresDB.php")
    .then((respuesta)=>{
        return respuesta.json();
    }).then((datosJSON)=>
    {
        const div = document.getElementById("container");
        const id = document.getElementById("id_profesor");
        console.log(datosJSON);
        //console.log(datosJSON.noTrabajador);
        datosJSON.forEach(function(element)
        {
            //console.log(element);
            console.log(element.noTrabajador);
            div.innerHTML+=`
                <div id="profesor" >
                    <img class="imagen">
                    <element class="texto_borrar" >
                        <h3>${element.nombre} ${element.aPaterno} ${element.aMaterno}</h3>
                        <h5>${element.noTrabajador}</h5>
                    </element>
                    <element class = "botones">
                        <button type="button" id="btnSelect" class="btn_select" data-id="${element.noTrabajador}" >Seleccionar</button>
                    </element>
                </div>
            `;
            id.id = element.id;
        })


        const botonesSeleccionar = document.querySelectorAll(".btn_select");
        botonesSeleccionar.forEach((boton) => {
            boton.addEventListener("click", (e) => {
                console.log("seleccionar");
                e.preventDefault();
                modal.style.display = "block";//muestra el modal

                span.onclick = function() {
                    modal.style.display = "none";
                }//cierra el modal, sin confirmar la eliminación

                confirmBtn.onclick = function() {
                    console.log("Confirmado");
                    modal.style.display = "none";
                    datosForm = new FormData();
                    datosForm.append("noTrabajador",id.id);
                    fetch("./agregarTutor.php", {
                        method: "POST",
                        body: datosForm,
                    }) 
                    .then((respuesta)=>{
                        return respuesta.json();
                    }).then((datosJSON)=>{ 
                        console.log(datosJSON.mensaje);
                        if (datosJSON.mensaje == "El profesor ha sido agregado como tutor.") {
                            console.log("Profesor seleccionado");
                            location.reload();
                        }
                    });
                }//cierra el modal, confirmando la eliminación, elimina el usuario y recarga la página

                cancelBtn.onclick = function() {
                    modal.style.display = "none";
                }//cierra el modal, cancelando la eliminación
            });
        });
    });



});
window.addEventListener("load", (e)=>{
    e.preventDefault();
    fetch("./borrarAdminDB.php")
    .then((respuesta)=>{
        return respuesta.json();
    }).then((datosJSON)=>
    {
        const div = document.getElementById("container");
        const id = document.getElementById("id_admin");
        console.log(datosJSON);
        // console.log(datosJSON[0].Nombre);
        //let datos=[datosJSON.Foto, datosJSON.Nombre];
        // for(dato of datosJSON){
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
                    <img src=".jpg" class="imagen">
                    <element class="texto_borrar" >
                        <h3>${element.Usuario}</h3>
                        <h5>${element.NoTrabajador}</h5>
                    </element>
                    <button id="btnBorrar" data-id="${element.id}" class="btn_borrar">Borrar</button>
                </div>
            `;
            id.id = element.id;
            // console.log(id.id);
        })

        // div.addEventListener("click",(e)=>
        // {
        //     let id = e.target.dataset.id;
        //     console.log(id)
        //     document.cookie = "producto=" + id + ";max-age=3600;";
        //     //window.location.href="../php/registro.php";
        // });
        
        const botonesBorrar = document.querySelectorAll(".btn_borrar");
        botonesBorrar.forEach((boton) => {
            boton.addEventListener("click", (e) => {
                
                var confirmacion = window.confirm("¿Está segur@ que desea eliminar a este administrador permanentemente?");
                if (confirmacion == true) {
                    datosForm = new FormData();
                    datosForm.append("idAdmin",id.id);
                    fetch("./borrarAdmin.php", {
                        method: "POST",
                        body: datosForm,
                    }) 
                    .then((respuesta)=>{
                        return respuesta.json();
                    }).then((datosJSON)=>{ 
                        alert("Ok");
                    });
                }
            });
        });

        // const borrar = document.getElementById("btnBorrar");
        // borrar.addEventListener("click",(e)=>
        // {
        //     console.log("hola");
        //     var confirmacion = window.confirm("¿Está segur@ que desea eliminar a este administrador permanentemente?");
        //     if (confirmacion == true){
        //         alert("Ok");
        //     }
        // });
        //borrar.addEventListener("click",(e)=>{window.location.href="../index.php";});    
    });

});
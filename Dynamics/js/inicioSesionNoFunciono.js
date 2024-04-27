const usuario = document.getElementById('usuario')
const contrasena = document.getElementById('contrasena')
const btnIniciarSesion = document.getElementById('btnIniciarSesion')

btnIniciarSesion.addEventListener('click', (e) => {
    e.preventDefault()
    const validar = {
        usuario:usuario.value,
        contrasena:contrasena.value,
    }
    console.log(validar)
})
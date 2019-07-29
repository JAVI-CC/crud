function modificar_usuario($id) {
    document.getElementById("boton-modificar-login" + $id).disabled = true;
    document.getElementById("boton-eliminar-login" + $id).disabled = true;
    document.getElementById("boton-guardar-login" + $id).disabled = false;
    document.getElementById("mostrar-email" + $id).disabled = false;
    document.getElementById("mostrar-password" + $id).disabled = false;
}
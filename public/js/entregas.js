function modificar_entrega($id) {
    document.getElementById("boton-modificar-entrega" + $id).disabled = true;
    document.getElementById("boton-eliminar-entrega" + $id).disabled = true;
    document.getElementById("boton-guardar-entrega" + $id).disabled = false;
    document.getElementById("mostrar-telefono" + $id).disabled = false;
    document.getElementById("mostrar-fecha-inicio" + $id).disabled = false;
    document.getElementById("mostrar-fecha-final" + $id).disabled = false;
}
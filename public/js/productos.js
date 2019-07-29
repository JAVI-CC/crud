function modificar_producto($id) {
    document.getElementById("boton-modificar-producto" + $id).disabled = true;
    document.getElementById("boton-eliminar-producto" + $id).disabled = true;
    document.getElementById("boton-guardar-producto" + $id).disabled = false;
    document.getElementById("mostrar-nombre" + $id).disabled = false;
    document.getElementById("mostrar-precio" + $id).disabled = false;
    document.getElementById("mostrar-unidades" + $id).disabled = false;
}
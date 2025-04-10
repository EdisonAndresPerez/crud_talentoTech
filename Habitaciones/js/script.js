console.log("Script cargado correctamente");



// Validar el formulario antes de enviar
function validarFormulario() {
    const numero = document.querySelector('input[name="numero"]').value.trim();
    const tipo = document.querySelector('input[name="tipo"]').value.trim();
    const capacidad = document.querySelector('input[name="capacidad"]').value.trim();
    const estado = document.querySelector('select[name="estado"]').value;
    const precioNoche = document.querySelector('input[name="precio_noche"]').value.trim();
    const descripcion = document.querySelector('input[name="descripcion"]').value.trim();

    if (!numero || !tipo || !capacidad || !estado || !precioNoche || !descripcion) {
        alert("Por favor, complete todos los campos.");
        return false;
    }

    if (isNaN(numero) || parseInt(numero) <= 0) {
        alert("El número de habitación debe ser un número válido.");
        return false;
    }

    if (isNaN(capacidad) || parseInt(capacidad) <= 0) {
        alert("La capacidad debe ser un número positivo.");
        return false;
    }

    if (!["Limpieza", "Ocupado", "Disponible", "Reservado"].includes(estado)) {
        alert("Estado inválido. Seleccione uno de los estados disponibles.");
        return false;
    }

    if (isNaN(precioNoche) || parseFloat(precioNoche) <= 0) {
        alert("El precio por noche debe ser un número positivo.");
        return false;
    }

    return true;
}

// Mostrar el formulario de actualización (editar habitación)
function mostrarFormularioActualizar(id, numero, tipo, capacidad, estado, precio_noche, descripcion) {
    const formActualizar = document.createElement('div');
    formActualizar.innerHTML = `
        <form action="update.php" method="POST" class="form-content">
            <input type="hidden" name="update_id" value="${id}">

            <input type="number" name="update_numero" value="${numero}" placeholder="Número de habitación" required>
            <input type="text" name="update_tipo" value="${tipo}" placeholder="Tipo de habitación" required>
            <input type="number" name="update_capacidad" value="${capacidad}" placeholder="Capacidad" required>

            <select name="update_estado" required>
                <option value="">Seleccionar estado de la habitación</option>
                <option value="Limpieza" ${estado === "Limpieza" ? "selected" : ""}>Limpieza</option>
                <option value="Ocupado" ${estado === "Ocupado" ? "selected" : ""}>Ocupado</option>
                <option value="Disponible" ${estado === "Disponible" ? "selected" : ""}>Disponible</option>
                <option value="Reservado" ${estado === "Reservado" ? "selected" : ""}>Reservado</option>
            </select>

            <input type="number" name="update_precio_noche" value="${precio_noche}" placeholder="Precio por noche" required>
            <input type="text" name="update_descripcion" value="${descripcion}" placeholder="Descripción" required>

            <button type="submit" name="update">Actualizar</button>
            <button type="button" onclick="cancelarEdicion(this)">Cancelar</button>
        </form>
    `;

    // Estilo flotante del contenedor
    formActualizar.style.position = "fixed";
    formActualizar.style.top = "50%";
    formActualizar.style.left = "50%";
    formActualizar.style.transform = "translate(-50%, -50%)";
    formActualizar.style.padding = "20px";
    formActualizar.style.backgroundColor = "#fff";
    formActualizar.style.boxShadow = "0 0 15px rgba(0,0,0,0.2)";
    formActualizar.style.zIndex = 9999;
    formActualizar.style.width = "100%";
    formActualizar.style.maxWidth = "600px";
    formActualizar.style.borderRadius = "8px";

    document.body.appendChild(formActualizar);
}

function cancelarEdicion(boton) {
    const formularioFlotante = boton.closest('div');
    if (formularioFlotante) {
        formularioFlotante.remove();
    }
}

function eliminarReservacion(id) {
    console.log("ID a eliminar:", id); 
    if (confirm("¿Estás seguro de que deseas eliminar esta reservación?")) {
        // Redireccionar a un script PHP con el id a eliminar
        window.location.href = "delete.php?delete_id=" + id;
    }
}


// Mostrar/Ocultar el formulario de "Agregar Empleado"
document.addEventListener('DOMContentLoaded', () => {
    const botonAgregar = document.querySelector('.boton_agregar');
    const formulario = document.querySelector('.formulario_empleado');

    if (!botonAgregar || !formulario) return; // Seguridad por si no existen

    let formularioVisible = false;

    botonAgregar.addEventListener('click', () => {
        formularioVisible = !formularioVisible;
        formulario.style.display = formularioVisible ? 'block' : 'none';
        botonAgregar.textContent = formularioVisible ? 'Cancelar' : 'Agregar Empleado';
    });
});

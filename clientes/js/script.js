console.log("Script cargado correctamente");



// Validar el formulario antes de enviar
function validarFormulario() {
    const nombre = document.querySelector('input[name="nombre"]').value.trim();
    const tipo_doc = document.querySelector('input[name="tipo_doc"]').value.trim();
    const numero_doc = document.querySelector('input[name="numero_doc"]').value.trim();
    const telefono = document.querySelector('input[name="telefono"]').value.trim();
    const correo = document.querySelector('input[name="correo"]').value.trim();

    if (!nombre || !tipo_doc || !numero_doc || !telefono || !correo  ) {
        alert("Por favor, complete todos los campos.");
        return false;
    }

    if (!/^\d{7,15}$/.test(telefono)) {
        alert("El teléfono debe contener solo números y tener entre 7 y 15 dígitos.");
        return false;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo)) {
        alert("Por favor, ingrese un correo electrónico válido.");
        return false;
    }

    if (estado !== "Activo" && estado !== "Inactivo") {
        alert("Estado inválido. Seleccione 'Activo' o 'Inactivo'.");
        return false;
    }

    return true;
}

function mostrarFormularioActualizar(id, nombre, tipo_doc, numero_doc, telefono, correo, estado) {
    const formActualizar = document.createElement('div');
    formActualizar.innerHTML = `
        <form action="update.php" method="POST" class="form-content">
            <input type="hidden" name="update_id" value="${id}">
            <input type="text" name="update_nombre" value="${nombre}" required>
            <input type="text" name="update_tipo_doc" value="${tipo_doc}" required>
            <input type="text" name="update_numero_doc" value="${numero_doc}" required>
            <input type="text" name="update_telefono" value="${telefono}" required>
            <input type="text" name="update_correo" value="${correo}" required>

            <select name="update_estado" required>
                <option value="Activo" ${estado === "Activo" ? "selected" : ""}>Activo</option>
                <option value="Inactivo" ${estado === "Inactivo" ? "selected" : ""}>Inactivo</option>
            </select>

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

function eliminarcliente(id) {
    console.log("ID a eliminar:", id); 
    if (confirm("¿Estás seguro de que deseas eliminar este cliente?")) {
        // Redireccionar a un script PHP con el id a eliminar
        window.location.href = "delete.php?delete_id=" + id;
    }
}


// Mostrar/Ocultar el formulario de "Agregar clientes"
document.addEventListener('DOMContentLoaded', () => {
    const botonAgregar = document.querySelector('.boton_agregar');
    const formulario = document.querySelector('.formulario_clientes');

    if (!botonAgregar || !formulario) return; // Seguridad por si no existen

    let formularioVisible = false;

    botonAgregar.addEventListener('click', () => {
        formularioVisible = !formularioVisible;
        formulario.style.display = formularioVisible ? 'block' : 'none';
        botonAgregar.textContent = formularioVisible ? 'Cancelar' : 'Agregar cliente';
    });
});

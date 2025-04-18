console.log("Script cargado correctamente");

function mostrarFormularioActualizar(id, nombre, tipo_doc, numero_doc, telefono, correo) {
    const formActualizar = document.createElement('div');
    formActualizar.innerHTML = `
        <form action="update.php" method="POST" class="form-content">
            <input type="hidden" name="update_id" value="${id}">
            <input type="text" name="update_nombre" value="${nombre}" required>

            <select name="update_tipo_doc" required>
                <option value="cc" ${tipo_doc === "cc" ? "selected" : ""}>CC</option>
                <option value="pasaporte" ${tipo_doc === "pasaporte" ? "selected" : ""}>Pasaporte</option>
            </select>

            <input type="text" name="update_numero_doc" value="${numero_doc}" required>
            <input type="text" name="update_telefono" value="${telefono}" required>
            <input type="email" name="update_correo" value="${correo}" required>

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

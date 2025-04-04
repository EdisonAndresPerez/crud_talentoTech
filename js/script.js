   // Validar el formulario antes de enviar
function validarFormulario() {
    const nombre = document.querySelector('input[name="nombre"]').value.trim();
    const apellido = document.querySelector('input[name="apellido"]').value.trim();
    const telefono = document.querySelector('input[name="telefono"]').value.trim();
    const cargo = document.querySelector('input[name="cargo"]').value.trim();
    const departamento = document.querySelector('input[name="departamento"]').value.trim();
    const fechaEntrada = document.querySelector('input[name="fecha_entrada"]').value;
    const fechaSalida = document.querySelector('input[name="fecha_salida"]').value;
    const precio = document.querySelector('input[name="precio"]').value.trim();
    const estado = document.querySelector('input[name="estado"]').value;
    const horario = document.querySelector('input[name="horario"]').value.trim();

    if (!nombre || !apellido || !telefono || !cargo || !departamento || !fechaEntrada || !fechaSalida || !precio || !estado) {
        alert("Por favor, complete todos los campos.");
        return false;
    }

    if (!/^\d{7,15}$/.test(telefono)) {
        alert("El teléfono debe contener solo números y tener entre 7 y 15 dígitos.");
        return false;
    }

    if (isNaN(precio) || parseFloat(precio) <= 0) {
        alert("El salario debe ser un número positivo.");
        return false;
    }

    if (new Date(fechaEntrada) > new Date(fechaSalida)) {
        alert("La fecha de entrada no puede ser posterior a la fecha de salida.");
        return false;
    }

    if (estado !== "Activo" && estado !== "Inactivo") {
        alert("Estado inválido. Seleccione 'Activo' o 'Inactivo'.");
        return false;
    }

    if (!horario.includes('-')) {
        alert("Formato de horario inválido. Ejemplo válido: 8:00 - 17:00");
        return false;
    }


    return true;
}
function mostrarFormularioActualizar(id, nombre, apellido, telefono, cargo, departamento, fecha_entrada, fecha_salida, precio, estado, horario) {
    const formActualizar = document.createElement('div');
    formActualizar.innerHTML = `
        <form action="update.php" method="POST">
            <input type="hidden" name="update_id" value="${id}">
            <input type="text" name="update_nombre" value="${nombre}" required>
            <input type="text" name="update_apellido" value="${apellido}" required>
            <input type="text" name="update_telefono" value="${telefono}" required>
            <input type="text" name="update_cargo" value="${cargo}" required>
            <input type="text" name="update_departamento" value="${departamento}" required>
            <input type="date" name="update_fecha_entrada" value="${fecha_entrada}" required>
            <input type="date" name="update_fecha_salida" value="${fecha_salida}" required>
            <input type="number" name="update_precio" value="${precio}" required>

            <select name="update_estado" required>
                <option value="">Seleccionar estado</option>
                <option value="Activo" ${estado === "Activo" ? "selected" : ""}>Activo</option>
                <option value="Inactivo" ${estado === "Inactivo" ? "selected" : ""}>Inactivo</option>
            </select>

            <input type="text" name="update_horario" value="${horario}" required>

            <button type="submit" name="update">Actualizar</button>
            <button type="button" onclick="cerrarFormularioActualizar()">Cancelar</button>
        </form>
    `;

    // Estilo rápido opcional para que se vea bien flotante
    formActualizar.style.position = "fixed";
    formActualizar.style.top = "50%";
    formActualizar.style.left = "50%";
    formActualizar.style.transform = "translate(-50%, -50%)";
    formActualizar.style.padding = "20px";
    formActualizar.style.backgroundColor = "#fff";
    formActualizar.style.boxShadow = "0 0 15px rgba(0,0,0,0.2)";
    formActualizar.style.zIndex = 9999;

    document.body.appendChild(formActualizar);
}

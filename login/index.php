<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #16263D;
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background-color: #f1f1f1;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .form-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 25px;
            color: #2F6F7F;
            font-size: 1.8rem;
        }
        .form-label {
            color: #333;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        .btn-custom {
            background-color: #2F6F7F;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #255E6F;
        }
        .alert-info {
            font-size: 0.95rem;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h4 class="form-title">Iniciar Sesión</h4>
    <?php if (!empty($_GET['mensaje'])): ?>
        <div class="alert alert-info"><?= htmlspecialchars($_GET['mensaje']) ?></div>
    <?php endif; ?>
    <form method="POST" action="procesar_login.php">
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" name="nombre_usuario" required>
        </div>
        <div class="mb-3">
            <label for="contrasena_usuario" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contrasena_usuario" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-custom">Iniciar Sesión</button>
        </div>
    </form>
</div>
</body>
</html>
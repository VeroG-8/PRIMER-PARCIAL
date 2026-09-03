<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link
        rel="stylesheet"
        href="css/style.css"
    >

    <title>Iniciar sesión</title>

</head>

<body>

    <div class="login-container">

        <h1>Iniciar sesión</h1>

        <?php if (!empty($error)): ?>

            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>

        <?php endif; ?>

        <form
            action="index.php?action=login"
            method="POST"
        >

            <label for="email">
                Correo
            </label>

            <input
                class="input"
                type="email"
                id="email"
                name="email"
                required
            >

            <label for="password">
                Contraseña
            </label>

            <input
                class="input"
                type="password"
                id="password"
                name="password"
                required
            >

            <button
                class="btn-form"
                type="submit"
            >
                Ingresar
            </button>

        </form>

    </div>

</body>

</html>
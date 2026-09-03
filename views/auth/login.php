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
        href="css/style-login.css"
    >

    <title>Iniciar sesión</title>

</head>

<body class="login-body">

    <div class="login-container">

        <div class="login-header">

            <h1>Iniciar sesión</h1>

            <p>Ingresá a tu cuenta</p>

        </div>


        <?php if (!empty($error)): ?>

            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>

        <?php endif; ?>


        <form
            action="index.php?action=login"
            method="POST"
            class="login-form"
        >

            <div class="form-group">

                <label for="email">
                    Correo electrónico
                </label>

                <input
                    class="input"
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Ingresá tu correo"
                    required
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Contraseña
                </label>

                <input
                    class="input"
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Ingresá tu contraseña"
                    required
                >

            </div>


            <button
                class="btn-login"
                type="submit"
            >
                Ingresar
            </button>

        </form>

    </div>

</body>

</html>

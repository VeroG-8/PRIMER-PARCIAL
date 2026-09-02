<?php require __DIR__."/../layouts/header.php"; ?>

<h1>Editar usuario</h1>

<form action="index.php?action=update" method="POST">

    <input type="hidden" name="user_id" value="<?=htmlspecialchars($usuario["user_id"])?>">
    <label>Nombre</label>

    <input type="text" name="firstname" value="<?=htmlspecialchars($usuario["firstname"])?>" required>

    <label>Apellido</label>
    <input type="text" name="lastname" value="<?=htmlspecialchars($usuario["lastname"])?>" required>

    <label>Dirección</label>
    <input type="text" name="address" value="<?=htmlspecialchars($usuario["address"])?>">

    <label>Contacto</label>
    <input type="text" name="contact" value="<?=htmlspecialchars($usuario["contact"])?>">

    <label>Correo</label>
    <input type="email" name="email" value="<?=htmlspecialchars($usuario["email"])?>">

    <label>Contraseña</label>
    <input type="password" name="password">

    <select name="rol" required>

        <option value="">Seleccione un rol</option>
        <option value="usuario"
            <?= $usuario["rol"] === "usuario" ? "selected" : "" ?>>
            Usuario
        </option>
        <option value="admin"
            <?= $usuario["rol"] === "admin" ? "selected" : "" ?>>
            Administrador
        </option>
    </select>

    <button type="submit">Actualizar</button>

</form>
<?php require __DIR__."/../layouts/footer.php"; ?>
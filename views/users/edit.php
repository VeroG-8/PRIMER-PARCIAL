<?php require __DIR__."/../layouts/header.php"; ?>

<h1>Editar usuario</h1>

<form class="form" action="index.php?action=update" method="POST">

    <input class="input" type="hidden" name="user_id" value="<?=htmlspecialchars($usuario["user_id"])?>">
    <label class="label" >Nombre</label>

    <input class="input" type="text" name="firstname" value="<?=htmlspecialchars($usuario["firstname"])?>" required>

    <label class="label">Apellido</label>
    <input class="input" type="text" name="lastname" value="<?=htmlspecialchars($usuario["lastname"])?>" required>

    <label class="label">Dirección</label>
    <input class="input" type="text" name="address" value="<?=htmlspecialchars($usuario["address"])?>">

    <label class="label">Contacto</label>
    <input class="input" type="text" name="contact" value="<?=htmlspecialchars($usuario["contact"])?>">

    <label class="label">Correo</label>
    <input class="input" type="email" name="email" value="<?=htmlspecialchars($usuario["email"])?>">

    <label class="label">Contraseña</label>
    <input class="input" type="password" name="password">

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

    <button class="btn-form" type="submit">Actualizar</button>

</form>
<?php require __DIR__."/../layouts/footer.php"; ?>
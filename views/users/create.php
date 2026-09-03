<?php require __DIR__."/../layouts/header.php"; ?>

<h1>Nuevo usuario</h1>

<form class="form" action="index.php?action=store" method="POST">

    <label class="label" >Nombre</label>
    <input class="input" type="text" name="firstname" required>

    <label class="label">Apellido</label>
    <input class="input" class="input" type="text" name="lastname" required>

    <label class="label">Dirección</label>
    <input class="input" type="text" name="address">

    <label class="label">Contacto</label>
    <input class="input" type="text" name="contact">

    <label class="label">Correo</label>
    <input class="input" type="email" name="email" required>

    <label class="label">Contraseña</label>
    <input class="input" type="password" name="password" required>

    <label class="label">Rol</label>
    <select name="rol" required>
        <option value="">Seleccione un rol</option>
        <option value="usuario">Usuario</option>
        <option value="admin">Administrador</option>
    </select>


    <button class="btn-form" type="submit">Guardar</button>
</form>

<?php require __DIR__."/../layouts/footer.php"; ?>
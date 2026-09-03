<?php require __DIR__."/../layouts/header.php"; ?>

<h1>Nuevo usuario</h1>

<form class="form" action="index.php?action=store" method="POST">

    <label>Nombre</label>
    <input type="text" name="firstname" required>

    <label>Apellido</label>
    <input type="text" name="lastname" required>

    <label>Dirección</label>
    <input type="text" name="address">

    <label>Contacto</label>
    <input type="text" name="contact">

    <label>Correo</label>
    <input type="email" name="email" required>

     <label>Contraseña</label>
    <input type="password" name="password" required>

     <label>Rol</label>
    <select name="rol" required>
        <option value="">Seleccione un rol</option>
        <option value="usuario">Usuario</option>
        <option value="admin">Administrador</option>
    </select>


    <button type="submit">Guardar</button>
</form>

<?php require __DIR__."/../layouts/footer.php"; ?>
<?php require __DIR__ . "/../layouts/header.php"; ?>

<h1>Nuevo usuario</h1>

<form class="form" action="index.php?action=store" method="POST">

    <label class="label" for="firstname">Nombre</label>
    <input
        class="input"
        type="text"
        id="firstname"
        name="firstname"
        required
    >

    <label class="label" for="lastname">Apellido</label>
    <input
        class="input"
        type="text"
        id="lastname"
        name="lastname"
        required
    >

    <label class="label" for="address">Dirección</label>
    <input
        class="input"
        type="text"
        id="address"
        name="address"
    >

    <label class="label" for="contact">Contacto</label>
    <input
        class="input"
        type="text"
        id="contact"
        name="contact"
    >

    <label class="label" for="email">Correo</label>
    <input
        class="input"
        type="email"
        id="email"
        name="email"
        required
    >

    <label class="label" for="password">Contraseña</label>
    <input
        class="input"
        type="password"
        id="password"
        name="password"
        required
    >

    <label class="label" for="rol">Rol</label>

    <select
        class="input"
        id="rol"
        name="rol"
        required
    >
        <option value="">Seleccione un rol</option>
        <option value="usuario">Usuario</option>
        <option value="admin">Administrador</option>
    </select>

    <button class="btn-form" type="submit">
        Guardar
    </button>

</form>

<?php require __DIR__ . "/../layouts/footer.php"; ?>
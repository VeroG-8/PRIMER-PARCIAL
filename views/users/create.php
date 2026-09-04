<?php require __DIR__ . "/../layouts/header.php"; ?>

<h1>Nuevo usuario</h1>

<form class="form" id="form" action="index.php?action=store" method="POST">

    <label class="label" for="firstname">Nombre</label>
    <input
        class="input"
        type="text"
        id="firstname"
        name="firstname"
        placeholder="Ingresá tu nombre"
        required
    >

    <label class="label" for="lastname">Apellido</label>
    <input
        class="input"
        type="text"
        id="lastname"
        name="lastname"
        placeholder="Ingresá tu apellido"
        required
    >

    <label class="label" for="address">Dirección</label>
    <input
        class="input"
        type="text"
        id="address"
        name="address"
        placeholder="Ingresá tu dirección"
    >

    <label class="label" for="contact">Contacto</label>
    <input
        class="input"
        type="text"
        id="contact"
        name="contact"
        placeholder="Ingresá tu contacto"
    >

    <label class="label" for="email">Correo</label>
    <input
        class="input"
        type="email"
        id="email"
        name="email"
        placeholder="Ingresá tu correo"
        required
    >

    <label class="label" for="password">Contraseña</label>
    <input
        class="input"
        type="password"
        id="password"
        name="password"
        placeholder="Ingresá tu contraseña"
        required
    >
    <div class="form-group">
        <label for="password_confirm">Confirmar contraseña</label>

        <input
            class="input"
            type="password"
            id="password_confirm"
            name="password_confirm"
            placeholder="Repetí la contraseña"
            required
        >
        <small id="password-error"></small>
    </div>

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
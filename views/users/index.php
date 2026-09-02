<?php require __DIR__."/../layouts/header.php"; ?>
<h1>Listado de usuarios</h1>
<p>
    <a class="menu-link" href="index.php?action=create">+ Nuevo usuario</a>
</p>
<table>
    <thead class="menu-tabla">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Contacto</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    <?php while($usuario=$usuarios->fetch_assoc()): ?>
        <tr>
            <td><?=htmlspecialchars($usuario["user_id"])?></td>
            <td><?=htmlspecialchars($usuario["firstname"])?></td>
            <td><?=htmlspecialchars($usuario["lastname"])?></td>
            <td><?=htmlspecialchars($usuario["address"])?></td>
            <td><?=htmlspecialchars($usuario["contact"])?></td>
            <td><?=htmlspecialchars($usuario["email"])?></td>
            <td><?=htmlspecialchars($usuario["password_hash"])?></td>
            <td><?=htmlspecialchars($usuario["rol"])?></td>
            <td class="actions">
                <a href="index.php?action=edit&id=<?=$usuario["user_id"]?>">Editar</a>
                <a href="index.php?action=delete&id=<?=$usuario["user_id"]?>" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php require __DIR__."/../layouts/footer.php"; ?>
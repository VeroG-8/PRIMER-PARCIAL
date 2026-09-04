<?php require __DIR__ . "/../layouts/header.php"; ?>

<div class="user-info">

    <div class="user-welcome">

        <span class="user-icon">👤</span>

        <div>
            <p class="user-name">
                Hola, 
                <strong>
                    <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>
                </strong>
                <strong>
                    <?= htmlspecialchars($_SESSION['usuario_apellido']) ?>
                </strong>
            </p>

            <p class="user-role">
                Rol:
                <span>
                    <?= htmlspecialchars($_SESSION['usuario_rol']) ?>
                </span>
            </p>
        </div>

    </div>


    <a
        class="logout-button"
        href="index.php?action=logout"
    >
        Cerrar sesión
    </a>

</div>


<h1 class="titulo-lista">Listado de usuarios</h1>

<table>

    <thead class="menu-tabla">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Contacto</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($usuarios as $usuario): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($usuario["user_id"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($usuario["firstname"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($usuario["lastname"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($usuario["address"] ?? '') ?>
                </td>

                <td>
                    <?= htmlspecialchars($usuario["contact"] ?? '') ?>
                </td>

                <td>
                    <?= htmlspecialchars($usuario["email"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($usuario["rol"]) ?>
                </td>

                <td class="actions">
                    <?php if (($_SESSION['usuario_rol'] ?? '') === 'admin'): ?>

                        <a
                        href="index.php?action=edit&id=<?= $usuario["user_id"] ?>"
                        title="Editar"><i class="fa-solid fa-pen-to-square"></i>Editar</a>

                        <a
                            class="btn-eliminar"
                            href="index.php?action=delete&id=<?= $usuario["user_id"] ?>"
                            onclick="return confirm('¿Eliminar este usuario?')"
                            title="Eliminar"
                        >
                            <i class="fa-solid fa-trash"></i>
                            Eliminar
                        </a>
                    <?php else: ?>

                        Solo lectura

                    <?php endif; ?>
                    
                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<?php require __DIR__ . "/../layouts/footer.php"; ?>

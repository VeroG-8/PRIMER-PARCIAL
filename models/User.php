<?php

class User
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Obtener todos los usuarios
    public function getAll(): array
    {
        $sql = "SELECT user_id, firstname, lastname, address, contact, email, rol
                FROM users
                ORDER BY user_id DESC";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    // Obtener un usuario por ID
    public function getById(int $id): ?array
    {
        $sql = "SELECT user_id, firstname, lastname, address, contact, email, rol
                FROM users
                WHERE user_id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch() ?: null;
    }

    // Crear usuario
    public function create(
        string $firstname,
        string $lastname,
        string $address,
        string $contact,
        string $email,
        string $password_hash,
        string $rol
    ): bool {

        $sql = "INSERT INTO users
                (firstname, lastname, address, contact, email, password_hash, rol)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $firstname,
            $lastname,
            $address,
            $contact,
            $email,
            $password_hash,
            $rol
        ]);
    }

    // Actualizar usuario incluyendo contraseña
    public function update(
        int $id,
        string $firstname,
        string $lastname,
        string $address,
        string $contact,
        string $email,
        string $password_hash,
        string $rol
    ): bool {

        $sql = "UPDATE users
                SET firstname = ?,
                    lastname = ?,
                    address = ?,
                    contact = ?,
                    email = ?,
                    password_hash = ?,
                    rol = ?
                WHERE user_id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $firstname,
            $lastname,
            $address,
            $contact,
            $email,
            $password_hash,
            $rol,
            $id
        ]);
    }

    // Actualizar usuario sin modificar contraseña
    public function updateWithoutPassword(
        int $id,
        string $firstname,
        string $lastname,
        string $address,
        string $contact,
        string $email,
        string $rol
    ): bool {

        $sql = "UPDATE users
                SET firstname = ?,
                    lastname = ?,
                    address = ?,
                    contact = ?,
                    email = ?,
                    rol = ?
                WHERE user_id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $firstname,
            $lastname,
            $address,
            $contact,
            $email,
            $rol,
            $id
        ]);
    }

    // Eliminar usuario
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM users WHERE user_id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id]);
    }
}
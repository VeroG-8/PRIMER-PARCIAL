<?php

class User {

    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getAll() {
        return $this->conexion->query(
            "SELECT * FROM users ORDER BY user_id DESC"
        );
    }

    public function getById($id) {

        $s = $this->conexion->prepare(
            "SELECT * FROM users WHERE user_id = ?"
        );

        $s->bind_param("i", $id);
        $s->execute();

        return $s->get_result()->fetch_assoc();
    }

    public function create(
        $firstname,
        $lastname,
        $address,
        $contact,
        $email,
        $password_hash,
        $rol
    ) {

        $s = $this->conexion->prepare(
            "INSERT INTO users 
            (firstname, lastname, address, contact, email, password_hash, rol)
            VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        $s->bind_param(
            "sssssss",
            $firstname,
            $lastname,
            $address,
            $contact,
            $email,
            $password_hash,
            $rol
        );

        return $s->execute();
    }

    public function update(
        $id,
        $firstname,
        $lastname,
        $address,
        $contact,
        $email,
        $password_hash,
        $rol
    ) {

        $s = $this->conexion->prepare(
            "UPDATE users SET
            firstname = ?,
            lastname = ?,
            address = ?,
            contact = ?,
            email = ?,
            password_hash = ?,
            rol = ?
            WHERE user_id = ?"
        );

        $s->bind_param(
            "sssssssi",
            $firstname,
            $lastname,
            $address,
            $contact,
            $email,
            $password_hash,
            $rol,
            $id
        );

        return $s->execute();
    }

    public function updateWithoutPassword(
        $id,
        $firstname,
        $lastname,
        $address,
        $contact,
        $email,
        $rol
    ) {

        $s = $this->conexion->prepare(
            "UPDATE users SET
            firstname = ?,
            lastname = ?,
            address = ?,
            contact = ?,
            email = ?,
            rol = ?
            WHERE user_id = ?"
        );

        $s->bind_param(
            "ssssssi",
            $firstname,
            $lastname,
            $address,
            $contact,
            $email,
            $rol,
            $id
        );

        return $s->execute();
    }

    public function delete($id) {

        $s = $this->conexion->prepare(
            "DELETE FROM users WHERE user_id = ?"
        );

        $s->bind_param("i", $id);

        return $s->execute();
    }
}
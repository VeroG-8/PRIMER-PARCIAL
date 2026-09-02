<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../models/User.php";

class UserController {

    private $userModel;

    public function __construct() {
        global $conexion;
        $this->userModel = new User($conexion);
    }

    public function index() {
        $usuarios = $this->userModel->getAll();
        require __DIR__ . "/../views/users/index.php";
    }

    public function create() {
        require __DIR__ . "/../views/users/create.php";
    }

    public function store() {

        $firstname = trim($_POST["firstname"] ?? "");
        $lastname = trim($_POST["lastname"] ?? "");
        $address = trim($_POST["address"] ?? "");
        $contact = trim($_POST["contact"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $password = trim($_POST["password"] ?? "");
        $rol = trim($_POST["rol"] ?? "");

        if ($firstname === "" || $lastname === "" || $email === "" || $password === "") {
            die("Complete los campos obligatorios.");
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $this->userModel->create(
            $firstname,
            $lastname,
            $address,
            $contact,
            $email,
            $password_hash,
            $rol
        );

        header("Location: index.php?action=index");
        exit;
    }

    public function edit() {

        $id = (int)($_GET["id"] ?? 0);

        if ($id <= 0) {
            die("ID inválido.");
        }

        $usuario = $this->userModel->getById($id);

        if (!$usuario) {
            die("Usuario no encontrado.");
        }

        require __DIR__ . "/../views/users/edit.php";
    }

    public function update() {

        $id = (int)($_POST["user_id"] ?? 0);
        $firstname = trim($_POST["firstname"] ?? "");
        $lastname = trim($_POST["lastname"] ?? "");
        $address = trim($_POST["address"] ?? "");
        $contact = trim($_POST["contact"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $password = trim($_POST["password"] ?? "");
        $rol = trim($_POST["rol"] ?? "");

        if ($id <= 0 || $firstname === "" || $lastname === "" || $email === "") {
            die("Datos inválidos.");
        }

        if ($password !== "") {

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $this->userModel->update(
                $id,
                $firstname,
                $lastname,
                $address,
                $contact,
                $email,
                $password_hash,
                $rol
            );

        } else {

            $this->userModel->updateWithoutPassword(
                $id,
                $firstname,
                $lastname,
                $address,
                $contact,
                $email,
                $rol
            );
        }

        header("Location: index.php?action=index");
        exit;
    }

    public function delete() {

        $id = (int)($_GET["id"] ?? 0);

        if ($id > 0) {
            $this->userModel->delete($id);
        }

        header("Location: index.php?action=index");
        exit;
    }
}
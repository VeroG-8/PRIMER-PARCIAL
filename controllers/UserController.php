<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class UserController
{
    private User $userModel;

    public function __construct()
    {
        $database = new Database();

        $db = $database->getConnection();

        $this->userModel = new User($db);
    }
    private function requireLogin(): void
    {
        if (!isset($_SESSION['usuario_id'])) {

            header('Location: index.php?action=login');
            exit;
        }
    }
    private function requireAdmin(): void
    {
        $this->requireLogin();

        if (($_SESSION['usuario_rol'] ?? '') !== 'admin') {

            http_response_code(403);

            exit(
                'Acceso denegado. Solo un administrador puede realizar esta acción.'
            );
        }
    }

    // Mostrar todos los usuarios
    public function index(): void
    {
        $this->requireLogin();
        $usuarios = $this->userModel->getAll();

        require __DIR__ . '/../views/users/index.php';
    }

    // Mostrar formulario de creación
    public function create(): void
    {
        $this->requireAdmin();
        require __DIR__ . '/../views/users/create.php';
    }

    // Guardar usuario
    public function store(): void
    {   
        $this->requireAdmin();
        $firstname = trim($_POST['firstname'] ?? '');
        $lastname = trim($_POST['lastname'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $contact = trim($_POST['contact'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $rol = trim($_POST['rol'] ?? 'usuario');

        // Validaciones básicas
        if (
            $firstname === '' ||
            $lastname === '' ||
            $email === '' ||
            $password === ''
        ) {
            die('Complete los campos obligatorios.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die('El correo electrónico no es válido.');
        }

        // Validar rol
        if (!in_array($rol, ['usuario', 'admin'], true)) {
            $rol = 'usuario';
        }

        // Generar hash
        $password_hash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $this->userModel->create(
            $firstname,
            $lastname,
            $address,
            $contact,
            $email,
            $password_hash,
            $rol
        );

        header('Location: index.php?action=index');
        exit;
    }

    // Mostrar formulario de edición
    public function edit(): void
    {
        $this->requireAdmin();
        $id = (int)($_GET['id'] ?? 0);

        if ($id <= 0) {
            die('ID inválido.');
        }

        $usuario = $this->userModel->getById($id);

        if (!$usuario) {
            die('Usuario no encontrado.');
        }

        require __DIR__ . '/../views/users/edit.php';
    }

    // Actualizar usuario
    public function update(): void
    {
        $this->requireAdmin();
        $id = (int)($_POST['user_id'] ?? 0);

        $firstname = trim($_POST['firstname'] ?? '');
        $lastname = trim($_POST['lastname'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $contact = trim($_POST['contact'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $rol = trim($_POST['rol'] ?? 'usuario');

        if (
            $id <= 0 ||
            $firstname === '' ||
            $lastname === '' ||
            $email === ''
        ) {
            die('Datos inválidos.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die('El correo electrónico no es válido.');
        }

        if (!in_array($rol, ['usuario', 'admin'], true)) {
            $rol = 'usuario';
        }

        // Si escribió una nueva contraseña
        if ($password !== '') {

            $password_hash = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

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

            // Mantener la contraseña existente
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

        header('Location: index.php?action=index');
        exit;
    }

    // Eliminar usuario
    public function delete(): void
    {
        $this->requireAdmin();
        $id = (int)($_GET['id'] ?? 0);

        if ($id <= 0) {
            die('ID inválido.');
        }

        $this->userModel->delete($id);

        header('Location: index.php?action=index');
        exit;
    }
}
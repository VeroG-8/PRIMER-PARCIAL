<?php

class AuthController
{
    public function __construct(private User $user) {}

    public function showLogin(): void
    {
        $error = $_SESSION['login_error'] ?? null;

        unset($_SESSION['login_error']);

        require __DIR__ . '/../views/auth/login.php';
    }

    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $usuario = $this->user->findByEmail($email);

        if (
            !$usuario ||
            !password_verify($password, $usuario['password_hash'])
        ) {

            $_SESSION['login_error'] =
                'Email o contraseña incorrectos.';

            header('Location: index.php?action=login');
            exit;
        }

        session_regenerate_id(true);

        $_SESSION['usuario_id'] = $usuario['user_id'];
        $_SESSION['usuario_nombre'] = $usuario['firstname'];
        $_SESSION['usuario_rol'] = $usuario['rol'];

        header('Location: index.php?action=index');
        exit;
    }

    public function logout(): void
    {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {

            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        header('Location: index.php?action=login');
        exit;
    }
}
<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/UserController.php';

$database = new Database();

$db = $database->getConnection();

$userModel = new User($db);

$authController = new AuthController($userModel);

$userController = new UserController($userModel);

$action = $_GET['action'] ?? 'login';

switch ($action) {

    case 'login':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            $authController->showLogin();
        }

        break;

    case 'logout':

        $authController->logout();

        break;

    case 'index':

        $userController->index();

        break;

    case 'create':

        $userController->create();

        break;

    case 'store':

        $userController->store();

        break;

    case 'edit':

        $userController->edit();

        break;

    case 'update':

        $userController->update();

        break;

    case 'delete':

        $userController->delete();

        break;

    default:

        http_response_code(404);

        echo 'Acción no encontrada.';

        break;
}
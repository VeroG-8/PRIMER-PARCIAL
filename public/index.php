<?php

require_once __DIR__ . "/../controllers/UserController.php";

$controller = new UserController();

$action = $_GET["action"] ?? "index";

switch ($action) {

    case "index":
        $controller->index();
        break;

    case "create":
        $controller->create();
        break;

    case "store":

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            die("Método no permitido.");
        }

        $controller->store();
        break;

    case "edit":
        $controller->edit();
        break;

    case "update":

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            die("Método no permitido.");
        }

        $controller->update();
        break;

    case "delete":
        $controller->delete();
        break;

    default:
        die("Acción no encontrada.");
}
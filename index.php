<?php

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require_once(ROOT . "app/Model.php");
require_once(ROOT . "app/Controller.php");


$params = $_GET['p'] ?  explode('/', $_GET['p']) : [];

if ($params[0] != "") {
    $controller = ucfirst($params[0]);

    $action = isset($params[1]) ? $params[1] : 'index';

    $controllerFilePath = ROOT . 'controllers/' . $controller . '.php';
    try {
        if (!file_exists($controllerFilePath)) {
            echo "La page demandée n'existe pas";
            die();
        }

        include($controllerFilePath);

        if (class_exists($controller) && method_exists($controller, $action)) {
            unset($params[0]);
            unset($params[1]);
            // call_user_func_array([$controller, $action], $params);

            $controller = new $controller();
            $controller->$action();
        } else {
            http_response_code(404);
            echo "La page demandée n'existe pas";
        }
    } catch (Exception $e) {
        echo "La page demandée n'existe pas" . $e->getMessage();
    }
}

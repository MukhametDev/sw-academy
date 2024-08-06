<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'logout') {
    // Начало сессии
    session_start();

    // Удаление всех переменных сессии
    $_SESSION = [];

    // Если необходимо, уничтожаем сессию
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }

    // Наконец, уничтожаем сессию
    session_destroy();

    // Перенаправление на главную страницу или страницу входа
    header("Location: /");
    exit;
}

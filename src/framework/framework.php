<?php

use Framework\CMain;
use Framework\CDatabase;
use Framework\CUser;
use Symfony\Component\VarDumper\VarDumper;

include_once $_SERVER["DOCUMENT_ROOT"] . "/../vendor/autoload.php";

global $APPLICATION;

$APPLICATION = new CMain();
// $DB = new CDatabase();
// $userData = [
//     'username' => 'Ronaldo',
//     'email' => 'Ronaldo@example.com',
//     'password' => password_hash('123', PASSWORD_DEFAULT), // Захешируем пароль перед вставкой
// ];
// $USER = new CUser($userData);
// $USER->create($userData);
// dd($USER->update($userData));
// $userModel = new CUser($DB);


// Вход
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $username = htmlspecialchars($_POST['username']);
//     $email = htmlspecialchars($_POST['email']);
//     $password = $_POST['password']; // Пароль не нужно экранировать
//     $role_id = $_POST['role'];

//     $conditions = [
//         'username' => $username,
//         'email' => $email
//     ];
//     // dd($password);
//     $users = $USER->search($conditions);
//     $user = !empty($users) ? $users[0] : null;

//     if (!$user) {
//         $error = "Пользователь не найден.";
//         dd($error);
//     }

//     $USER->setFillable($user);
//     $roleTransform = $USER->getRoleFromString($user['role_id']);
//     $roleVerified = $USER->hasRole($roleTransform);
//     // dd($roleTransform->value);
//     // dd(password_verify($password, $user['password']));
//     if ($roleVerified && password_verify($password, $user['password'])) {
//         $_SESSION['user_id'] = $user['id'];
//         $_SESSION['username'] = $user['username'];
//         header('Location: /');
//         exit;
//     } else {
//         $error = "Неверные данные для входа.";
//         dd($error);
//     }
// }

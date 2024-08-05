<?php

use Framework\CMain;
use Framework\CDatabase;
use Framework\CUser;
use Framework\Validators\Validator;
use Framework\Validators\UserValidator;
use Symfony\Component\VarDumper\VarDumper;

include_once $_SERVER["DOCUMENT_ROOT"] . "/../vendor/autoload.php";

global $APPLICATION;

$APPLICATION = new CMain();
$DB = new CDatabase();
$userData = [
    'username' => 'Lionel Messi',
    'email' => 'VhJqB@example.com',
    'password' => password_hash('123', PASSWORD_DEFAULT), 
];
$USER = new CUser($userData);
$isValid = $USER->validate($userData);

$validator = new UserValidator();

$validator->setRules([
    'name' => 'required|min_length:3',
    'email' => 'required|email',
    'password' => 'required|min_length:8',
]);

$validator->setMessages([
    'required' => 'This field is required.',
    'min_length' => 'This field must be at least :param characters long.',
    'email' => 'This field must be a valid email address.',
]);


$invalidUserData = [
    'name' => '',
    'email' => 'invalidemail',
    'password' => 'short',
    'role_id' => 1
];

$validator->validate($invalidUserData);
dd($validator);
if ($isValid) {
    echo "Validation passed. User can be created.";
} else {
    echo "Validation failed. Errors:";
    var_dump($validator->getErrors());
}



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

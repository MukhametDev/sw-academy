<?php
session_start();

require __DIR__ . '/framework/framework.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <title>Furniture</title>
    <script>
        const CONFIG = JSON.parse(`<?php echo $APPLICATION->frontendConfig(); ?>`)
        const APP = {
            runComponentInAction: async (component, action, payload=null, header={}) => {
                return await fetch(CONFIG.endpoint,{
                    method:"POST",
                    headers: {
                        "Content-Type" : "application/json",
                        ...header
                    },
                    body: JSON.stringify({component, action, payload})
                }).then(res => res.json())
            }
        }
    </script>
</head>

<body>
    <?php

    try {
        $APPLICATION->processHeader("Header", ".default", $arParams = [
            "logoTitle" => "Мебель",
            "logoSubtitle" => "Центр информационных технологий",
            "navItems" => [
                [
                    "linkName" => "Шкафы-купе",
                    "href" => "#"
                ],
                [
                    "linkName" => "Торговая мебель",
                    "href" => "#"
                ],

                [
                    "linkName" => "Кухни",
                    "href" => "#"
                ],
                [
                    "linkName" => "Контакты",
                    "href" => "#"
                ]
            ],
            "phone" => "+7 3452 00-00-00",
            "btnName" => "Оставить заявку"
        ]);
        $APPLICATION->includeComponent("Auth", ".default", $arParams = [
            "title" => "Авторизация",
            "placeholderName" => "Имя",
            "placeholderEmail" => "Email",
            "placeholderPassword" => "Пароль",
            "btnName" => "Войти"
        ]);
        $APPLICATION->processFooter("Footer", ".default", $arParams = [
            "footerItems" => [
                [
                    "name" => "2024 “Мебель.ру” Все права защищены."
                ],
                [
                    "name" => "Политика конфиденциальности"
                ],
                [
                    "name" => "Разработка сайта интернет компания “SunWeb”"
                ],
            ],
            "logo" => "Мебель",
            "logoText" => "Центр мебельных технологий",
            "menuTitle" => "Меню",
            "menu" => [
                [
                    "item" => "Шкафы купе",
                    "href" => "#"
                ],
                [
                    "item" => "Кухни",
                    "href" => "#"
                ],
                [
                    "item" => "Торговое оборудование",
                    "href" => "#"
                ],
                [
                    "item" => "О компании",
                    "href" => "#"
                ],
                [
                    "item" => "Контакты",
                    "href" => "#"
                ],
            ],
            "contactTitle" => "Контакты",
            "contacts" => [
                [
                    "item" => "info@mebel.ru"
                ],
                [
                    "item" => "г.Тюмень, ул. Калинина, 22/1"
                ],
                [
                    "item" => "+7 (3452) 00-00-00"
                ],
            ],
            "btnTitle" => "Авторизоваться"
        ]);
        $APPLICATION->includeComponent("LogOut");
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>
<script src="./js/index.bundle.js"></script>
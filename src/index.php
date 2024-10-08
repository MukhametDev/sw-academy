<?php

use Framework\Config;

ob_start();
session_start();
require __DIR__ . '/framework/framework.php';

// Получаем активный шаблон из конфигурации
$switch_env_variable = trim(Config::getInstance()->getEnv("CUSTOM_TEMPLATE"));

// Путь к общему файлу стилей
$commonStylesPath = "/templates/{$switch_env_variable}/css/main.css";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- <link rel="stylesheet" href="/css/main.css"> -->
    <link rel="stylesheet" href="<?php echo $commonStylesPath; ?>">
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
<div class="#app">
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
        ],);
        $APPLICATION->includeComponent("LogOut", ".default", $arParams = [], $templateName = "Main");
        // $APPLICATION->includeComponent("MobileNav");
        $APPLICATION->includeComponent("Kitchen", ".default", $arParams = [
            "title" => "Заказывайте кухню от производителя",
            "textTop" => "Высокое качество, профессиональный подход и креативные решения",
            "textBottom" => "Работаем по Тюмени и Тюменской области",
            "btnName" => "Оставить заявку",
            "img" => "./../../img/kitchen.jpeg"
        ],);
        $APPLICATION->includeComponent("Types_kitchen", ".default", $arParams = [
            "titleTop" => "Виды кухонь",
            "cards" => [
                [
                    "src" => "./../../img/img1.jpeg",
                    "name" => "Линейные",
                    "text" => "Такой вид кухни подойдёт в случае, если вам необходимо сэкономить место в помещении"
                ],
                [
                    "src" => "./../../img/img2.jpeg",
                    "name" => "Угловые",
                    "text" => "Угловая кухня позволит увеличить количество отсеков для посуды"
                ],
                [
                    "src" => "./../../img/img3.jpeg",
                    "name" => "Островные",
                    "text" => "Остров сочетает в себе систему хранения принадлежностей и обеденную зону"
                ]
            ],
            "titleBottom" => "Стили кухонь",
            "items" => [
                [
                    "src" => "./../../img/img1.jpeg",
                    "name" => "Хайтек",
                    "text" => "Данный стиль кухни придаст вашей квартире современный вид"
                ],
                [
                    "src" => "./../../img/img2.jpeg",
                    "name" => "Классика",
                    "text" => "Классический стиль подойдёт ценителям непревзойдённой мебели прошлых эпох"
                ],
                [
                    "src" => "./../../img/img3.jpeg",
                    "name" => "Неоклассика",
                    "text" => "Исполнение в стиле неоклассики — смешение античной и современной архитектуры"
                ],
                [
                    "src" => "./../../img/img2.jpeg",
                    "name" => "Прованс",
                    "text" => "Этот стиль порадует истинного ценителя провинциального французского интерьера, привнеся нотки деревенского шарма,сохранив при этом изящность французского дома"
                ],
                [
                    "src" => "./../../img/img3.jpeg",
                    "name" => "Японский стиль",
                    "text" => "Это разновидность этнических направлений в минимализме, в которой присутствуют безукоризненные цветовые комбинации и лаконичность форм в сочетании с нестандартными решениями в оформлении"
                ]
            ]
        ],);
        $APPLICATION->includeComponent("Form", ".default", $arParams = [
            "title" => "Оставьте заявку",
            "subTitle" => "Наши специалисты свяжутся с вами в течение одного часа",
            "placeholderName" => "Имя",
            "placeholderPhone" => "Телефон",
            "btnName" => "Отправить"
        ],);
        $APPLICATION->includeComponent("Material", ".default", $arParams = [
            "title" => "Материалы фасада кухонь",
            "cards" => [
                [
                    "img" => "./../../img/img1.jpeg",
                    "title" => "Плёнка",
                    "text" => "Данный материал примечателен своей долговечностью, светоустойчивостью, а также огромным многообразием фактур"
                ],
                [
                    "img" => "./../../img/img2.jpeg",
                    "title" => "Древесная стружка",
                    "text" => "Фасады из древесной стружки (мелкодисперсная фракция) хороши тем, что их можно отмыть от любой грязи"
                ],
                [
                    "img" => "./../../img/img3.jpeg",
                    "title" => "Шпон",
                    "text" => "Считается самым дорогостоящим вариантом кухонного гарнитура, так как он получается из ценных древесных пород"
                ],
                [
                    "img" => "./../../img/img1.jpeg",
                    "title" => "Массив",
                    "text" => "Кухня из массива отличается уникальностью и солидностью, а также придаёт помещению благородный внешний вид"
                ],
                [
                    "img" => "./../../img/img2.jpeg",
                    "title" => "Пластик",
                    "text" => "Пластик отлично вписывается во все стили дизайна интерьера и позволяет воплотить различные дизайнерские фантазии"
                ],
                [
                    "img" => "./../../img/img3.jpeg",
                    "title" => "Эмаль",
                    "text" => "Используя огромную цветовую палитру эмали, вы можете сделать, вашу кухню свежей и яркой"
                ],
            ]
        ],);
        $APPLICATION->includeComponent("About", ".default", $arParams = [
            "title" => "О кухнях",
            "textTop" => "Наша компания изготавливает кухни по индивидуальному проекту, что позволит самостоятельно выбрать стиль и цвет каждого изделия.",
            "textBottom" => "У нас вы найдете более 1000 цветов фартуков с фотопечатью и более 100 вариантов дверных ручек, разновидностей фурнитуры, цветов столешниц, фасадов и стеновых изделий.",
            "btnTitle" => "Заказать"
        ],);
        $APPLICATION->includeComponent("Delivery", ".default", $arParams = [
            "title" => "Доставка",
            "textTop" => "Мы организуем транспортировку вашего заказа, и, при необходимости, наши сотрудники смогут сразу же произвести сборку и установку оборудования.",
            "textBottom" => "Вы можете быть уверены в том, что все изделия будут перевезены в точном соответствии с установленными правилами перевозки.",
        ],);
        $APPLICATION->includeComponent("Production", ".default", $arParams = [
            "title" => "У нас своё производство",
            "textTop" => "Компания “МЕБЕЛЬ” создана в апреле 2011 года инженером-технологом Дмитрием Николаевичем Важинским, имеет собственное производство и профессиональное оборудование.",
            "textBottom" => "Вы можете посетить нас (Тюмень, ул.Калинина, 22/1) в любое удобное для вас время, предварительно записавшись к директору компании через сайт, либо по телефону +7 345 00-00-00.",
            "btnTitle" => "Записаться"
        ],);
        $APPLICATION->includeComponent("Switch", ".default", $arParams = [
            "title" => "Что мы предлагаем",
            "cards" => [
                [
                    "img" => "./../../img/wish-list.svg",
                    "title" => "Сделаем по экскизу",
                    "text" => "Если у вас есть пожелания, изготовим кухню согласно вашим примерам"
                ],
                [
                    "img" => "./../../img/smartphone.svg",
                    "title" => "Подстроимся под бюджет",
                    "text" => "Для эскиза подберем материалы эконом, стандарт или премиум класса"
                ],
                [
                    "img" => "./../../img/shield.svg",
                    "title" => "Гарантия 5 лет",
                    "text" => "Наша компания занимается изготовлением мебели много лет, мы отвечаем за качество"
                ],
                [
                    "img" => "./../../img/living-room.svg",
                    "title" => "Проект на этапе ремонта",
                    "text" => "Предусмотрим все нюансы и дадим рекомендациипо расположению элементов кухни"
                ],
            ]
        ],);
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
        ],);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</div>
</body>
<script src="./js/index.bundle.js"></script>
</html>
<?php
ob_end_flush(); // Отправка буферизованного вывода
?>
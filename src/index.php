<?php

require __DIR__ . '/framework/framework.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Furniture</title>
</head>

<body>
    <?php

    try {
        $APPLICATION->includeComponent("Header");
        // $APPLICATION->includeComponent("MobileNav");
        $APPLICATION->includeComponent("Kitchen");
        $APPLICATION->includeComponent("Types_kitchen");
        $APPLICATION->includeComponent("Form");
        $APPLICATION->includeComponent("Material");
        $APPLICATION->includeComponent("About");
        $APPLICATION->includeComponent("Delivery");
        $APPLICATION->includeComponent("Production");
        $APPLICATION->includeComponent("Switch");
        $APPLICATION->includeComponent("Footer");
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>
<script src="./js/index.bundle.js"></script>

</html>
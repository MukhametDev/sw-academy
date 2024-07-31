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
    <title>Furniture</title>
</head>

<body>
    <?php

    try {
        $APPLICATION->includeComponent("Header");
        $APPLICATION->includeComponent("Auth");
        $APPLICATION->includeComponent("Footer");
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>
<script src="./js/index.bundle.js"></script>
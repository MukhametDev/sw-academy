<?php

use Framework\CMain;
use Framework\CDatabase;
use Framework\CUser;
use Framework\Config;
use Framework\Settings;

include_once $_SERVER["DOCUMENT_ROOT"] . "/../vendor/autoload.php";

global $APPLICATION;

$APPLICATION = new CMain();
$DB = new CDatabase();
$USER = new CUser();

// $settings = Settings::getInstance()->getSettings("db");
// $host = $settings["host"];
// $user = $settings["user"];
// $password = $settings["password"];
// $database = $settings["database"];
// $port = $settings["port"];

// dd(Settings::getInstance()->getSettings("host"));

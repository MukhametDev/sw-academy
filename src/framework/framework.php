<?php

use Framework\CMain;
use Framework\CDatabase;
use Framework\CUser;

include_once $_SERVER["DOCUMENT_ROOT"] . "/../vendor/autoload.php";

global $APPLICATION;

$APPLICATION = new CMain();
$DB = new CDatabase();
$USER = new CUser();

<?php
// session_start();
// global $arResult;
if (!isset($arResult)) {
    $arResult = [];
}

$logoTitle = $arResult['logoTitle'] ?? 'Default Title';
$logoSubtitle = $arResult['logoSubtitle'] ?? 'Default Subtitle';
$navItems = $arResult['navItems'] ?? [];
$phone = $arResult['phone'] ?? 'Default Phone';
$btnName = $arResult['btnName'] ?? 'Default Button';

$isUserLoggedIn = isset($_SESSION['user_id']);
$username = $isUserLoggedIn ? htmlspecialchars($_SESSION['username']) : '';

?>

<header class="header" data-data="<?php echo htmlspecialchars(json_encode($arResult), ENT_QUOTES, 'UTF-8'); ?>">

</header>

<script type="module" src="../../js/header.js"></script>
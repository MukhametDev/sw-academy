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

<header class="header">
    <div class="header__row">

        <div class="logo-text">
            <a href="/" class="logo-text logo-text_orange "><?php echo  htmlspecialchars($logoTitle) ?></span>
                <span class="logo-text logo-text_gray"><?php echo htmlspecialchars($logoSubtitle) ?></span>
        </div>
        <nav class="nav-items">
            <ul class="nav-items__list">
                <?php foreach ($navItems as $value) : ?>
                    <li class="nav-items__item"><a class="nav-items__link" href="#"><?php echo htmlspecialchars($value['linkName']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="relationship">
            <a class="relationship__phone" href="#"><?php echo htmlspecialchars($phone) ?></a>
            <?php if ($isUserLoggedIn) : ?>
                <span><?= $username; ?></span>
                <a href="/index.php?action=logout" class="btn_logout">Выйти</a>
            <?php else : ?>
                <button type="button" class="button">
                    <a href="/../../../auth-page.php" class=""><?php echo htmlspecialchars($btnName); ?></a>
                </button>
            <?php endif; ?>
        </div>
        <button class="mobile-nav-btn">
            <div class="nav-icon"></div>
        </button>
    </div>
</header>
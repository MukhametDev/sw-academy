<?php
session_start();

if (!isset($arParams)) {
    $arParams = [];
}

$logoTitle = $arParams['logoTitle'] ?? 'Default Title';
$logoSubtitle = $arParams['logoSubtitle'] ?? 'Default Subtitle';
$navItems = $arParams['navItems'] ?? [];
$phone = $arParams['phone'] ?? 'Default Phone';
$btnName = $arParams['btnName'] ?? 'Default Button';

$isUserLoggedIn = isset($_SESSION['user_id']);
$username = $isUserLoggedIn ? htmlspecialchars($_SESSION['username']) : '';

var_dump($_SESSION);
?>

<header class="header">
    <div class="header__row">

        <div class="logo-text">
            <a href="/" class="logo-text logo-text_orange "><?= htmlspecialchars($logoTitle) ?></span>
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
                <span>Welcome, <?php echo $username; ?>!</span>
                <a href="/../../../logout.php" class="button">Logout</a>
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
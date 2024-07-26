<?php

if (!isset($arParams)) {
    $arParams = [];
}

$logoTitle = $arParams['logoTitle'] ?? 'Default Title';
$logoSubtitle = $arParams['logoSubtitle'] ?? 'Default Subtitle';
$navItems = $arParams['navItems'] ?? [];
$phone = $arParams['phone'] ?? 'Default Phone';
$btnName = $arParams['btnName'] ?? 'Default Button';
?>

<header class="header">
    <div class="header__row">

        <div class="logo-text">
            <span class="logo-text logo-text_orange "><?php echo htmlspecialchars($logoTitle) ?></span>
            <span class="logo-text logo-text_gray"><?php echo htmlspecialchars($logoSubtitle) ?></span>
        </div>
        <nav class="nav-items">
            <ul class="nav-items__list">
                <?php foreach ($navItems as $value) :?>
                <li class="nav-items__item"><a class="nav-items__link" href="#"><?php echo htmlspecialchars($value['linkName']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="relationship">
            <a class="relationship__phone" href="#"><?php echo htmlspecialchars($phone) ?></a>
            <button type="button" class="button">
                <a href="auth-page.html" class=""><?php echo htmlspecialchars($btnName); ?></a>
            </button>
        </div>
        <button class="mobile-nav-btn">
            <div class="nav-icon"></div>
        </button>
    </div>
</header>    



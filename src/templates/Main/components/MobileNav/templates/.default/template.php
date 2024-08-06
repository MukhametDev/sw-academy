<?php

if (!isset($arParams)) {
    $arParams =  [];
}

?>
<div class="mobile-nav">
<?php foreach ($arParams as $value) : ?>
    <ul class="mobile-nav__list">        
            <?php foreach ($value as $second_value) : ?>
                <li><a class="mobile-nav__link" href="#"><?php echo htmlspecialchars($second_value['name'])?></a></li>
            <?php endforeach; ?>
    </ul>
    <div class="mobile-nav__btns">
        <button class="mobile-nav__btn">Перезвоните мне</button>
        <button class="mobile-nav__btn mobile-nav__btn_auth">Авторизоваться</button>
    </div>
<?php endforeach; ?>
</div>
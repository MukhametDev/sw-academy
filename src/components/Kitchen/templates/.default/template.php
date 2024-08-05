<section class="kitchen">
    <div class="kitchen__bg">
        <img class="kitchen__img" src="./../../img/kitchen.jpeg" alt="kitchen-bg">
    </div>

    <div class="block">
    <div class="overlay">
        <div class="overlay__content">
            <h2 class="overlay__title"><?= $arResult['title'] ?></h2>
            <div class="overlay__message">
                <p class="overlay__subtitle"><?= $arResult['text-top'] ?></p>
                <p class="overlay__text"><?= $arResult['text-bottom'] ?></p>
            </div>
        </div>
    </div>
    <div class="block__btn">
        <button type="button" class="button button_bg"><?= $arResult['btnName'] ?></button>
    </div>
</div>
 
</section>
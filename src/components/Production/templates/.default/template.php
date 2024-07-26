<section class="production">
    <div class="production__bg-wrapper">
        <div class="production__bg"></div>
    </div>
    <div class="production__container production__container_production">
        <div class="production__block">
            <h2 class="production__title"><?php echo htmlspecialchars($arParams['title']) ?></h2>
            <div class="production__content">
                <p class="production__text"><?php echo htmlspecialchars($arParams['text-top']) ?></p>
                <p class="production__text"><?php echo htmlspecialchars($arParams['text-bottom']) ?>
                </p>
            </div>
            <button type="button" class="production__btn"><?php echo htmlspecialchars($arParams['btnTitle']) ?></button>
        </div>
    </div>
</section>
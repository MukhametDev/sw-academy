<section class="about">
    <div class="about__wrapper">
        <div class="about__bg">
        </div>
    </div>
    <div class="about__container about__container_about">
        <div class="about__block">
            <h2 class="about__title"><?php echo htmlspecialchars($arResult['title']) ?></h2>
            <div class="about__content">
                <p class="about__text"><?php echo htmlspecialchars($arResult['text-top']) ?></p>
                <p class="about__text"><?php echo htmlspecialchars($arResult['text-bottom']) ?></p>
            </div>
            <button type="button" class="about__btn"><?php echo htmlspecialchars($arResult['btnTitle']) ?></button>
        </div>
    </div>
</section>
<section class="types-kitchen">
    <div class="types-kitchen__container">
        <div class="swiper">
            <div class="swiper__top">
                <h2 class="swiper__title"><?php echo htmlspecialchars($arParams['title-top']) ?></h2>
                <div class="swiper__cards">
                    <?php foreach ($arParams['cards'] as $value) : ?>
                        <div class="card card_grid">
                            <div class="card__image card__image_grid">
                                <img src="<?php echo htmlspecialchars($value['src']) ?>" alt="image" class="card__img card__img_grid">
                            </div>
                            <div class="card__content card__content_grid">
                                <h3 class="card__title card__title_grid"><?php echo htmlspecialchars($value['name']) ?></h3>
                                <p class="card__text card__text_grid"><?php echo htmlspecialchars($value['text']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper__bottom">
                <h2 class="swiper__title swiper__title_bottom"><?php echo htmlspecialchars($arParams['title-bottom']) ?></h2>
                <div class="swiper__cards">
                    <?php foreach ($arParams['items'] as $value) : ?>
                        <div class="card card_grid">
                            <div class="card__image card__image_grid">
                                <img src="<?php echo htmlspecialchars($value['src']) ?>" alt="image" class="card__img card__img_grid">
                            </div>
                            <div class="card__content card__content_grid">
                                <h3 class="card__title card__title_grid"><?php echo htmlspecialchars($value['name']) ?></h3>
                                <p class="card__text card__text_grid"><?php echo htmlspecialchars($value['text']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
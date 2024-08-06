<section class="material">
    <div class="material__container">
        <div class="material__content">

            <div class="material__top">
                <h2 class="material__title"><?php echo htmlspecialchars($arResult['title']) ?></h2>
            </div>
            <div class="material__bottom">
                <div class="material__items">
                    <?php foreach ($arResult['cards'] as $item) : ?>
                        <div class="card card_grid">
                            <div class="card__image card__image_grid">
                                <img src="<?php echo htmlspecialchars($item['img']) ?>" alt="image" class="card__img card__img_grid">
                            </div>
                            <div class="card__content card__content_grid">
                                <h3 class="card__title card__title_grid"><?php echo htmlspecialchars($item['title']) ?></h3>
                                <p class="card__text card__text_grid"><?php echo htmlspecialchars($item['text']) ?></p>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
</section>
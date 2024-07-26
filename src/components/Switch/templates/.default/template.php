<section class="switch">
    <div class="switch__container">
        <h2 class="switch__title"><?php echo htmlspecialchars($arParams['title']) ?></h2>
        <div class="switch__content">
            <div class="switch__cards">
                <?php foreach ($arParams['cards'] as $item) : ?>
                    <div class="switch__card card-switch">
                        <img src="<?php echo htmlspecialchars($item['img']) ?>" alt="icon" class="card-switch__img">
                        <h3 class="card-switch__title"><?php echo htmlspecialchars($item['i']) ?></h3>
                        <p class="card-switch__text">Если у вас есть пожелания, изготовим кухню согласно вашим примерам</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
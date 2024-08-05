<section class="form-section">
    <div class="form-section__container">
        
        <div class="form-section__content">
            <div class="form-section__top">
                <h2 class="form-section__title"><?php echo htmlspecialchars($arResult['title']) ?></h2>
                <p class="form-section__text"><?php echo htmlspecialchars($arResult['subTitle']) ?></p>
            </div>
            <div class="form-section__bottom">
                <form action="" class="section-form">
                    <input placeholder="<?php echo htmlspecialchars($arResult['placeholder-name']) ?>" type="text" class="section-form__input">
                    <input placeholder="<?php echo htmlspecialchars($arResult['placeholder-phone']) ?>" type="phone" class="section-form__input">
                    <button type="button" class="section-form__btn"><?php echo htmlspecialchars($arResult['btnName']) ?></button>
                </form>
            </div>
        </div>
        
    </div>
</section>
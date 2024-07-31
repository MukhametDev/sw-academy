<main>
    <section class="auth">
        <div class="auth__modal">
            <h2 class="auth__title"><?= $arParams['title'] ?></h2>
            <form action="/../../../../auth-page.php" method="post" class="auth-form">
                <div class="auth-form__inputs">
                    <input name="username" placeholder="<?= $arParams['placeholder-name'] ?>" type="text" required class="auth-form__input">
                    <input name="email" placeholder="<?= $arParams['placeholder-email'] ?>" type="email" required class="auth-form__input">
                    <input name="password" placeholder="<?= $arParams['placeholder-password'] ?>" type="password" class="auth-form__input">
                </div>
                <button type="submit" class="auth-form__btn"><?= $arParams['btnName'] ?></button>
            </form>
        </div>
    </section>
</main>
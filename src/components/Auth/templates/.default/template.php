<main>
    <section class="auth">
        <div class="auth__modal">
            <h2 class="auth__title"><?= $arResult['title'] ?></h2>
            <form action="/../../../../auth-page.php" method="post" class="auth-form">
                <div class="auth-form__inputs">
                    <input name="username" placeholder="<?= $arResult['placeholder-name'] ?>" type="text" required class="auth-form__input">
                    <input name="email" placeholder="<?= $arResult['placeholder-email'] ?>" type="email" required class="auth-form__input">
                    <input name="password" placeholder="<?= $arResult['placeholder-password'] ?>" type="password" class="auth-form__input">
                    <select class="auth-form__input" name="role" id="">
                        <option value="2">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <button type="submit" class="auth-form__btn"><?= $arResult['btnName'] ?></button>
            </form>
        </div>
    </section>
</main>
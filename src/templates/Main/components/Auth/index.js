const element = document.querySelector('.auth');
const data = JSON.parse(element.getAttribute('data-data'));

Vue.createApp({
    name: 'Auth',
    data(){
      return {
            title: data.title || '',
            placeholderName: data.placeholderName || '',
            placeholderEmail: data.placeholderEmail || '',
            placeholderPassword: data.placeholderPassword || '',
            btnName: data.btnName || ''
      }
    },
    template: `
         <div class="auth__modal">
            <h2 class="auth__title">{{title}}</h2>
            <form action="/../../../../auth-page.php" method="post" class="auth-form">
                <div class="auth-form__inputs">
                    <input name="username" :placeholder="placeholderName" type="text" required class="auth-form__input">
                    <input name="email" :placeholder="placeholderEmail" type="email" required class="auth-form__input">
                    <input name="password" :placeholder="placeholderPassword" type="password" class="auth-form__input">
                    <select class="auth-form__input" name="role" id="">
                        <option value="2">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <button type="submit" class="auth-form__btn">{{btnName}}</button>
            </form>
        </div>
    `
}).mount('.auth')
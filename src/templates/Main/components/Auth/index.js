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
            btnName: data.btnName || '',
            form: {
                name: '',
                email: '',
                password: '',
                role: '2'
            },
            showPopup: false,  // состояние для отображения попапа
            auth:true
        }
    },
    methods:{
        submit(e) {
            e.preventDefault();
            APP.runComponentInAction('Auth', 'create', this.form)
                .then((res) => {
                    console.log(res)
                    if (res === 'success') {  // Предполагается, что ответ содержит поле success
                        this.showPopup = true;
                        setTimeout(() => {
                            this.showPopup = false;
                        }, 3000);  // скрыть попап через 30 секунд
                    }
                })
                .catch((err) => {
                    console.error(err);
                });
            this.form.username = '';
            this.form.email = '';
            this.form.password = '';
            this.form.role_id = '2';
        },
        switchAuth(){
            this.auth = !this.auth
        }
    },
    template: `
        <div class="auth__modal">
            <h2 class="auth__title">{{auth ? 'Регистрация': title}}</h2>
            <form v-if="auth" @submit.prevent="submit" action="/../../../../auth-page.php" method="post" class="auth-form">
                <div class="auth-form__inputs">
                    <input v-model="form.username" name="username" :placeholder="placeholderName" type="text" required class="auth-form__input">
                    <input v-model="form.email" name="email" :placeholder="placeholderEmail" type="email" required class="auth-form__input">
                    <input v-model="form.password" name="password" :placeholder="placeholderPassword" type="password" class="auth-form__input">
                    <select  v-model="form.role_id" class="auth-form__input" name="role_id">
                        <option value="2">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="auth-form__buttons">
                    <button type="submit" class="auth-form__btn">{{btnName}}</button>
                    <button @click="switchAuth" type="button" class="auth-form__link">У меня уже есть аккаунт</a></a>
                </div>
            </form>
             <form v-if="!auth" @submit.prevent="submit" action="/../../../../auth-page.php" method="post" class="auth-form">
                <div class="auth-form__inputs">
                    <input v-model="form.email" name="email" :placeholder="placeholderEmail" type="email" required class="auth-form__input">
                    <input v-model="form.password" name="password" :placeholder="placeholderPassword" type="password" class="auth-form__input">
                    <select v-model="form.role_id" class="auth-form__input" name="role_id">
                        <option value="2">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="auth-form__buttons">
                     <button type="submit" class="auth-form__btn">{{btnName}}</button>
                     <button @click="switchAuth" type="button" class="auth-form__link">Зарегистрироваться</a></a>
                </div>
            </form>
            <div v-if="showPopup" class="popup">
                <p>Вы успешно зарегистрированы!</p>
            </div>
        </div>
    `
}).mount('.auth')

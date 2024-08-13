export default ({
    name: 'FooterSection',
    props: {
        logo: String,
        logoText: String,
        menuTitle: String,
        menu: Array,
        contactsTitle: String,
        contacts: Array,
        btnTitle: String
    },
    template: `
    <footer class="footer footer_bg">
        <div class="footer__container">
            <div class="footer__content">
                <div class="footer__logo footer__logo_1">
                    <p class="footer__title">{{logo}}</p>
                    <p class="footer__text">{{logoText}}</p>
                </div>
                <div class="footer__items">
                    <div class="footer__item item-footer">
                        <h3 class="item-footer__title item-footer__title_nav">{{menuTitle}}</h3>
                        <ul  class="item-footer__lists">
                            <li v-for="item in menu" :key="item.item" class="item-footer__item"><a :href="item.href" class="item-footer__link item-footer__link_nav">{{item.item}}</a></li>
                        </ul>
                    </div>
                    <div class="footer__item item-footer item-footer_2">
                        <h3 class="item-footer__title">{{contactsTitle}}</h3>
                        <ul class="item-footer__lists">               
                            <li v-for="item in contacts" :key="item.item" class="item-footer__item"><a href="#" class="item-footer__link">{{item.item}}</a></li>
                        </ul>
                    </div>
                </div>
             <button class="footer__btn footer__btn_3">{{btnTitle}}</button>
            </div>
        </div>
    </footer>
    `,
});
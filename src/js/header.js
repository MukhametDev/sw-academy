import Items from './components/Items.js';
const element = document.querySelector('.header');
const data = JSON.parse(element.getAttribute('data-data'));

Vue.createApp({
    name: 'Header',
    components:{
      Items
    },
    data(){
        return {
            logoTitle: data.logoTitle || '',
            logoSubTitle: data.logoSubtitle || '',
            items: data.navItems || [],
            btnName: data.btnName || '',
            phone: data.phone || '',
        }
    },
    template: `
        <div class="header__row">
        <div class="logo-text">
            <a href="/" class="logo-text logo-text_orange ">{{logoTitle}}</span>
            <span class="logo-text logo-text_gray">{{logoSubTitle}}</span>
        </div>
        <Items :items="items"/>
        <div class="relationship">
            <a class="relationship__phone" href="#">{{phone}}</a>
                <button type="button" class="button">
                    <a href="/../../../auth-page.php" class="">{{btnName}}</a>
                </button>
        </div>
        <button class="mobile-nav-btn">
            <div class="nav-icon"></div>
        </button>
    </div>
    `
}).mount('header')
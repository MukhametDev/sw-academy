import SecuryList from './components/SecuryList.js'
import FooterSection from "./components/FooterSection.js";

const element = document.querySelector('.secury');
const data = JSON.parse(element.getAttribute('data-data'));

Vue.createApp({
    name: 'Secury',
    components:{
        SecuryList,
        FooterSection
    },
    data() {
        return {
            footerItems: data.footerItems || [],
            logo: data.logo || '',
            logoText: data.logoText || '',
            menuTitle: data.menuTitle || '',
            menu: data.menu || [],
            contactsTitle: data.contactTitle || '',
            contacts: data.contacts || [],
            btnTitle: data.btnTitle || '',
        }
    },
    template: `
        <SecuryList :items="footerItems" />
        <FooterSection :logo="logo" :logoText="logoText" :menuTitle="menuTitle" :menu="menu" :contactsTitle="contactsTitle" :contacts="contacts" :btnTitle="btnTitle" />
    `
}).mount(".secury")
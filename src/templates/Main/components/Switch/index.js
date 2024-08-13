import Cards from './components/Cards.js'

const element = document.querySelector('.switch');
const data = JSON.parse(element.getAttribute('data-data'));

Vue.createApp({
    name: 'Switch',
    components: {
        Cards
    },
    data(){
        return {
            cards: data.cards || [],
            title: data.title || ''
        }
    },
    template: `
       <div class="switch__container">
            <h2 class="switch__title">{{title}}</h2>
            <Cards :items="cards" />
       </div>
    `
}).mount('.switch')
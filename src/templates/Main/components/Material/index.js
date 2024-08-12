import Card from './components/Card.js';

const element = document.querySelector('.material');
const data = JSON.parse(element.getAttribute('data-data'));

console.log(data)
Vue.createApp({
    name: 'Material',
    components: {
        Card
    },
    data() {
        return {
            title: data.title || '',
            cards: data.cards || [],
        }
    },
    template:`
        <div class="material__container">
            <div class="material__content">
                <div class="material__top">
                    <h2 class="material__title">{{title}}</h2>
                </div>
                <div class="material__bottom">
                    <div class="material__items">
                        <Card v-for="card in cards" :title="card.title" :text="card.text" :img="card.img" />
                    </div>
                </div>
            </div>
        </div>
    `
}).mount('.material')
import Swiper from './components/Swiper.js'

const element = document.querySelector('.types-kitchen');
const data = JSON.parse(element.getAttribute('data-data'));
console.log(data)
Vue.createApp({
    name: 'Types_kitchen',
    components: {
        Swiper
    },
    data(){
      return {
          textTop: data.titleTop || '',
          textBottom: data.titleBottom || '',
          cards: data.cards || [],
          items: data.items || [],
      }
    },
    template: `
        <div class="types-kitchen__container">
            <Swiper :textTop="textTop" :textBottom="textBottom" :cards="cards" :items="items"/>
        </div>
    `
}).mount('.types-kitchen')
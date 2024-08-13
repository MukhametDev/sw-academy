import Card from '../../Material/components/Card.js'
export default ({
   name: 'Swiper',
    components: {
        Card
    },
   props: {
       textTop: String,
       textBottom: String,
       cards: Array,
       items: Array,
   },
    template: `
    <div class="swiper">
        <div class="swiper__top">
            <h2 class="swiper__title">{{textTop}}</h2>
            <div class="swiper__cards swiper__cards_top">
                <Card v-for="card in cards" :title="card.name" :text="card.text" :img="card.src" />
            </div>
        </div>
        <div class="swiper__bottom">
            <h2 class="swiper__title">{{textBottom}}</h2>
            <div class="swiper__cards swiper__cards_bottom">
                <Card v-for="card in items" :title="card.name" :text="card.text" :img="card.src" />
            </div>
        </div>
    </div>
    `
});
import IconCard from './IconCard.js'

export default ({
    name: 'Cards',
    props: {
       items: Array
    },
    components: {
        IconCard
    },
    template: `
        <div class="switch__content">
            <div class="switch__cards">
                <IconCard v-for="item in items" :title="item.title" :img="item.img" :text="item.text"/>
            </div>
        </div>
    `
})

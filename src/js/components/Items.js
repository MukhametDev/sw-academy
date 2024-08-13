import Item from './Item.js'

export default ({
    name: 'Items',
    components: {
        Item
    },
    props:{
        items: Array
    },
    template: `
        <nav class="nav-items">
            <ul class="nav-items__list">
                <Item v-for="item in items" :linkName="item.linkName" />
            </ul>
        </nav>
    `
});
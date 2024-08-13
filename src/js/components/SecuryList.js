export default ({
    name: 'SecuryList',
    props: {
        items: Array
    },
    template: `
      <div class="secury__container">
         <ul class="secury__list">
              <li v-for="item in items" :key="item.name" class="secury__item">{{item.name}}</li>
         </ul>
      </div>
    `
})
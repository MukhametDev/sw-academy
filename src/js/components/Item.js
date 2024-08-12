export default ({
    name: 'Item',
    props:{
        linkName: String
    },
    template: `
      <li class="nav-items__item"><a class="nav-items__link" href="#">{{linkName}}</a></li>
    `,

})
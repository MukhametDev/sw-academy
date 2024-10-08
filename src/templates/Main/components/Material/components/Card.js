export default ({
    name: 'Card',
    props: {
        img: String,
        title: String,
        text: String,
    },
    template: `
     <div class="card card_grid">
         <div class="card__image card__image_grid">
            <img :src="img" alt="image" class="card__img card__img_grid">
         </div>
         <div class="card__content card__content_grid">
            <h3 class="card__title card__title_grid">{{title}}</h3>
            <p class="card__text card__text_grid">{{text}}</p>
         </div>
     </div>
    `,
})

export default ({
    name: 'IconCard',
    props: {
        title: String,
        img: String,
        text: String
    },
    template: `
          <div class="switch__card card-switch">
                <img :src="img" alt="icon" class="card-switch__img">
                <h3 class="card-switch__title">{{title}}</h3>
                <p class="card-switch__text">{{text}}</p>
          </div>
    `
})
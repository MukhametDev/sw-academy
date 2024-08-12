export default ({
    name: 'Overlay',
    props: {
      title: String,
      textTop: String,
      textBottom: String
    },
    template: `
    <div class="overlay">
        <div class="overlay__content">
            <h2 class="overlay__title">{{title}}</h2>
            <div class="overlay__message">
                <p class="overlay__subtitle">{{textTop}}</p>
                <p class="overlay__text">{{textBottom}}</p>
            </div>
        </div>
    </div>
    `
})
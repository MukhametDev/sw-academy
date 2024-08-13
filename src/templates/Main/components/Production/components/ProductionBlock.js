// InfoBlock.js
export default {
    name: 'ProductionBlock',
    template: `
     <div class="production__wrapper">
        <div class="production__bg"></div>
    </div>
    <div class="production__container production__container_production">
        <div class="production__block">
            <h2 class="production__title">{{ title }}</h2>
            <div class="production__content">
                <p class="production__text">{{ textTop }}</p>
                <p class="production__text">{{ textBottom }}</p>
            </div>
            <button type="button" class="production__btn">{{ btnName }}</button>
        </div>
    </div>
    `,
    props:{
        title: String,
        textTop: String,
        textBottom: String,
        btnName: String
    }
};

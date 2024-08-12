
const element = document.querySelector('.delivery');
const data = JSON.parse(element.getAttribute('data-data')); // Parse the JSON string

Vue.createApp({
    data() {
        return {
            title: data.title || '',
            textTop: data.textTop || '',
            textBottom: data.textBottom || '',
        };
    },
    template: `
    <div class="delivery__container delivery__container_delivery">
        <div class="delivery__bg">
            <div class="delivery__block">
                <h2 class="delivery__title">{{title}}</h2>
                <div class="delivery__content">
                    <p class="delivery__text">{{textTop}}</p>
                    <p class="delivery__text">{{textBottom}}</p>
                </div>
            </div>
        </div>
    </div>
    `
}).mount(".delivery");
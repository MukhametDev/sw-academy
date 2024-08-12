import Overlay from './templates/components/Overlay.js'

const element = document.querySelector('.kitchen');
const data = JSON.parse(element.getAttribute('data-data'));

console.log(data)
Vue.createApp({
    name:'Kitchen',
    data(){
        return {
            title: data.title || '',
            img: data.img || '',
            textTop: data.textTop || '',
            textBottom: data.textBottom || '',
            btnName: data.btnName || ''
        }
    },
    components:{
        Overlay
    },
    template:`
    <div class="kitchen__bg">
        <img class="kitchen__img" :src="img" alt="kitchen-bg">
    </div>

    <div class="block">
        <Overlay :title="title" :textTop="textTop" :textBottom="textBottom" />
        <div class="block__btn">
            <button type="button" class="button button_bg">{{btnName}}</button>
        </div>
    </div>
    `
}).mount(".kitchen")
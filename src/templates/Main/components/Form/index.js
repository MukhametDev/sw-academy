import Form from './templates/components/Form.js';

const element = document.querySelector('.form-section');
const data = JSON.parse(element.getAttribute('data-data'));

Vue.createApp({
    name: 'FormSection',
    data(){
        return {
            title: data.title || '',
            subtitle: data.subTitle || '',
            placeholderName: data.placeholderName || '',
            placeholderPhone: data.placeholderPhone || '',
            btnName: data.btnName || ''
        }
    },
    components:{
        Form
    },
    template:`
        <div class="form-section__container">
            <div class="form-section__content">
                <div class="form-section__top">
                    <h2 class="form-section__title">{{title || 'Hello'}}</h2>
                    <p class="form-section__text">{{subtitle}}</p>
                </div>
            <div class="form-section__bottom">
                <Form :placeholderName="placeholderName" :placeholderPhone="placeholderPhone" :btnName="btnName"/>
            </div>
        </div>
    `
}).mount('.form-section')
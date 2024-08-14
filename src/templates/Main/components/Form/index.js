import Form from './templates/components/Form.js';

const element = document.querySelector('.form-section');
const data = JSON.parse(element.getAttribute('data-data'));

Vue.createApp({
    name: 'FormSection',
    data() {
        return {
            title: data.title || '',
            subtitle: data.subTitle || '',
            placeholderName: data.placeholderName || '',
            placeholderPhone: data.placeholderPhone || '',
            btnName: data.btnName || '',
            form: {
                name: '',
                phone: ''
            }
        }
    },
    components: {
        Form
    },
    methods: {
        submitForm(e) {
            e.preventDefault();
            APP.runComponentInAction('form-section', 'create',JSON.stringify(this.form))
                .then((res) => console.log(res))
        }
    },
    template: `
        <div class="form-section__container">
            <div class="form-section__content">
                <div class="form-section__top">
                    <h2 class="form-section__title">{{title || 'Hello'}}</h2>
                    <p class="form-section__text">{{subtitle}}</p>
                </div>
                <div class="form-section__bottom">
                    <Form @submitForm="submitForm" :modelValue="form" @update:modelValue="form = $event" :placeholderName="placeholderName" :placeholderPhone="placeholderPhone" :btnName="btnName"/>
                </div>
            </div>
        </div>
    `
}).mount('.form-section')

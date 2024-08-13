import ProductionBlock from './components/ProductionBlock.js';

const element = document.querySelector('.production')
const data = JSON.parse(element.getAttribute('data-data'))

Vue.createApp({
    name: 'Production',
    components: {
        ProductionBlock
    },
    data(){
        return {
            title: data.title || '',
            textTop: data.textTop || '',
            textBottom: data.textBottom || '',
            btnName: data.btnTitle || ''
        }
    },
    template: `
        <ProductionBlock :title="title" :textTop="textTop" :textBottom="textBottom" :btnName="btnName"/>
    `
}).mount(".production")
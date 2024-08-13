import InfoBlock from "./components/InfoBlock.js";

const element = document.querySelector('.about');
const data = JSON.parse(element.getAttribute('data-data')); // Parse the JSON string

Vue.createApp({
    name:"About",
    components :{
        InfoBlock
    },
    methods: {
    },

    data() {
        return {
            title: data.title || '',
            textTop: data.textTop || '',
            textBottom: data.textBottom || '',
            btnName: data.btnTitle || ''
        };
    },
    template:`
        <InfoBlock :title="title" :textTop="textTop" :textBottom="textBottom" :btnName="btnName"/>
    `
}).mount(".about");
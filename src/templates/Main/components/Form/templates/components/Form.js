import Input from './Input.js'

export default ({
    name: 'Form',
    props: {
        placeholderName: String,
        placeholderPhone: String,
        btnName: String
    },
    components:{
        Input
    },
    template: `
        <form action="" class="section-form">
            <Input  :placeholder="placeholderName" type="text"/>
            <Input  :placeholder="placeholderPhone" type="tel"/>
           <button type="button" class="section-form__btn">{{btnName}}</button>
        </form>
    `
})
import Input from './Input.js';

export default {
    name: 'Form',
    props: {
        placeholderName: String,
        placeholderPhone: String,
        btnName: String,
        modelValue: {
            type: Object,
            default: () => ({ name: '', phone: '' }) // Убедитесь, что это всегда объект
        }
    },
    components: {
        Input
    },
    methods: {
        updateField(field, value) {
            this.$emit('update:modelValue', {
                ...this.modelValue,
                [field]: value
            });
        }
    },
    template: `
        <form @submit.prevent="$emit('submitForm', $event)" action="" class="section-form">
            <Input v-model="modelValue.name" @update:modelValue="updateField('name', $event)" :placeholder="placeholderName" type="text"/>
            <Input v-model="modelValue.phone" @update:modelValue="updateField('phone', $event)" :placeholder="placeholderPhone" type="tel"/>
            <button type="submit" class="section-form__btn">{{btnName}}</button>
        </form>
    `
}

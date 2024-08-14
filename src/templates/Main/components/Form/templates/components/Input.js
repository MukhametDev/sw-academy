export default {
    name: 'Input',
    props: {
        modelValue: String,
        placeholder: String,
        type: String
    },
    emits: ['update:modelValue'],
    template: `
        <input 
            class="section-form__input"
            :type="type" 
            :placeholder="placeholder" 
            :value="modelValue" 
            @input="$emit('update:modelValue', $event.target.value)" 
        />
    `
}

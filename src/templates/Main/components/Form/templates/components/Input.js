export default ({
    name: 'Input',
    props: {
        type: String,
        placeholder: String
    },
    template: `
        <input :placeholder="placeholder" :type="type" class="section-form__input">
    `
})
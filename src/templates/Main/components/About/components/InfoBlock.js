// InfoBlock.js
export default {
  name: 'InfoBlock',
  template: `
     <div class="about__wrapper">
        <div class="about__bg"></div>
    </div>
    <div class="about__container about__container_about">
        <div class="about__block">
            <h2 class="about__title">{{ title }}</h2>
            <div class="about__content">
                <p class="about__text">{{ textTop }}</p>
                <p class="about__text">{{ textBottom }}</p>
            </div>
            <button type="button" class="about__btn">{{ btnName }}</button>
        </div>
    </div>
    `,
  props:{
    title: String,
    textTop: String,
    textBottom: String,
    btnName: String
  }
};

require('./bootstrap');
import VueMousetrap from 'vue-mousetrap'

window.Vue = require('vue');

Vue.use(VueMousetrap)

Vue.component(
    'flashcards',
    require('./components/Flashcards.vue').default
);

var vm = new Vue({
    el: '#app'
});

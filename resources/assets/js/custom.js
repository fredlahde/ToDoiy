var Vue = require('vue');
Vue.use(require('vue-resource'));

import Todo from './todo.vue';

new Vue({
    el: '#app',

    components: { Todo }
});
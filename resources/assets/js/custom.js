require('/vue.js');
require('/vueresource.js');

import Todo from 'todo.vue';

new Vue({
    el: '#app',

    components: { Todo },

    ready() {
        alert('works')
    }
});
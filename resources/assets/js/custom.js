new Vue({
    el: '#app',
    data: {
        input: '',
        todos: []
    },
    compiled: function () {
        this.update();
    },

    methods: {
        update: function () {
            this.$http({url: '/api/todos', method: 'GET'}).then(function (response) {
                this.todos = response.data;
            });
        },
        save: function () {
            var todo = {body: this.input};
            this.input = '';
            this.$http.post('/api/todos', todo).then(function () {
                this.update();
            });
        },

        deleteTask: function (todo) {
            this.todos.$remove(todo);
            this.$http.post('/api/todo/delete/', todo);
        },

        complete: function (todo) {
            todo.completed = !todo.completed;
            console.log(todo.completed);
            this.$http.post('api/todo/complete', todo);
        }

    }
});
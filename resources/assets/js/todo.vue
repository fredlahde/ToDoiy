<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div>
        <input placeholder="Enter ToDo" class="form-control" type="text" v-on:keyup.enter="save" v-model="input">
        <ul class="list-group">
            <li @click="complete(todo)" class="list-group-item " v-for="todo in todos | filterBy filterKey">
                <span class="{{ todo.completed ? 'done' : 'undone' }}">{{ todo.body }}</span>
            </li>
        </ul>
        <button class="btn btn-default" @click="clearDoneTasks">Clear all done tasks</button>
    </div>
</template>

<script>

    export default{
        props: [
            'heading'
        ],

        data: function () {
            return {
                input: '',
                todos: []
            };
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
                this.$http.post('/api/todo/delete', todo);
            },

            complete: function (todo) {
                todo.completed = !todo.completed;
                this.$http.post('api/todo/complete', todo);
            },

            clearDoneTasks: function () {
                var completedTodos = [];
                for (var i = 0; i < this.todos.length; i++) {
                    var todo = this.todos[i];

                    if (todo.completed) {
                        completedTodos.push(todo);
                        this.todos.$remove(todo);
                    }
                }
                console.log(completedTodos);
                this.$http.post('/api/todo/complete/delete',
                        JSON.stringify(completedTodos));
            }
        }
    }
</script>

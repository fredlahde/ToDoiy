<!DOCTYPE html>
<html xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <title>ToDo</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title" id="app">
            <input placeholder="Enter ToDo" class="form-control" type="text" v-on:keyup.enter="save" v-model="input">
            <ul class="list-group">
                <li @click="complete(todo)" class="list-group-item " v-for="todo in todos">
                    <span class="@{{ todo.completed ? 'done' : 'undone' }}">@{{ todo.body }}</span>
                    <strong @click="deleteTask(todo)">X</strong>
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

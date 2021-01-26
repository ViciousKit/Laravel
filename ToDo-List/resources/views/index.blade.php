<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ToDo</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link href='css/css.css' rel="stylesheet">


</head>

<body id="app-layout">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/tasks') }}">
                Task List
            </a>
        </div>

    </div>
</nav>


<!-- Content -->


<div class="d-flex justify-content-center align-items-center container">
    <div class="col-sm-offset-2 col-sm-9">

        <div class="col-sm-20 container border pl-4 p-2 mt-4">
            <form action="{{ url('tasks')}}" method="POST" class="form-horizontal ">
                @csrf
                <fieldset>
                    <div class="mb-3 mt-4 col-sm-9">
                        <label for="name" class="form-label">Task description</label>
                        <input type="text" name="name" id="task-name" class="form-control" required>
                    </div>
                    <div class="mb-2 col-sm-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="date" name="deadline" id="task-deadline" class="form-control" required>
                    </div>
                    <div class="mt-4 mb-3 col-sm-3">
                        <button type="submit" class="btn btn-primary">Add task</button>
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- Current Tasks -->
        @if (count($tasks) > 0)
            <div class="panel panel-default container mt-5">
                <div class="panel-heading">
                    Current Tasks
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Deadline</th>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text" ><div>{{ $task->name }}</div></td>
                                    <td class="table-text">
                                    @if($task->status == 0)
                                        <form action="{{url('tasks/complete/'. $task->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                           <button type="submit" id="undone"></button>
                                        </form>
                                    @else
                                            <button type="button" id="done"></button>
                                    @endif
                                </td>

                                <td class="table-text">
                                    <div
                                        @if ($task->deadline < $today & $task->status == 0)
                                        id="expired"
                                        @endif >
                                    {{$task->deadline}}</div>
                                </td>

                                <td>
                                    <!-- Button trigger modal -->

                                    <button type="button" onclick="fillModal(dataset)" class="btn btn-primary" data-toggle="modal" id="myInput" data-target="#Modal"
                                        data-name="{{$task->name}}" data-deadline="{{$task->deadline}}"
                                            >
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <form method='POST' action="{{url('tasks/'.$task->id)}}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <label for="name">Description</label>
                                                            <input type="text" class="form-control" id="name"
                                                                   name='name' required value="{{$task->name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="deadline">Deadline</label>
                                                            <input type="date" class="form-control" id="deadline"
                                                                   name='deadline' required>
                                                        </div>
                                                            <input type="hidden" id="hiddenId" name="id">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>

                                <!-- Task Delete Button -->
                                <td>
                                    <form action="{{ url('tasks/'.$task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>


<!-- JavaScripts -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="js/js.js"></script>
<!-- Подключаем Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

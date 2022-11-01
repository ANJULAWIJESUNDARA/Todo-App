@extends('layouts.master')

@section('page_title', 'ToDo App')
@section('title', 'ToDo ')
@section('main_item', 'ToDo')
@section('sub_item', 'ToDo ')

@section('content')
    <style>
        div.dt-buttons {
            position: relative;
            float: right;
        }

        div.dataTables_filter {
            margin-top: 7px
        }
    </style>
    <br>
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <h1>Tasks List</h1>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-lg-6">

            </div>
            <!--end col-->

            <div class="col-lg-6 text-right">
                <div class="text-right">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <button type="button" class="btn btn-gradient-primary"><i class="dripicons-gear"></i></button>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('tasks.create') }}">
                                <button type="button" class="btn btn-gradient-primary">Add New Task</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">

            @if (!empty($top_task))
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="task-box">
                                <div class="task-priority-icon"><i class="fas fa-circle  text-danger "></i>
                                </div>
                                <p class="text-muted float-right">
                                    <a data-href="{{ route('tasks.change-piority', $top_task->id) }}"
                                        class="change_piority"> <span class="badge badge-danger ">Top</span></a>
                                    <span
                                        class="text-muted">{{ Carbon\Carbon::parse($top_task->planned_end_date)->format('  H:i') }}</span>
                                    <span class="mx-1">·</span>
                                    <span><i class="far fa-fw fa-clock"></i>
                                        {{ Carbon\Carbon::parse($top_task->planned_end_date)->format('M-d ') }}</span>
                                </p>
                                <h5 class="mt-0"><span
                                        class=" text-danger">{{ \Illuminate\Support\Str::limit($top_task->title, 38) }}</span>
                                </h5>

                                <p class="text-muted mb-1">{{ \Illuminate\Support\Str::limit($top_task->description, 150) }}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <div class="img-group">
                                        @if (!empty($top_task->user_id))
                                            <a class="user-avatar user-avatar-group" href="#">
                                                <img src="../assets/images/users/user-3.jpg" alt="user"
                                                    class="rounded-circle thumb-xs">
                                            </a>
                                            {{ $top_task->user->name }}
                                        @endif
                                    </div>
                                    <!--end img-group-->
                                    <ul class="list-inline mb-0 align-self-center">
                                        @php
                                            $count = $top_task->activities()->count();
                                        @endphp
                                        <li class="list-item d-inline-block">
                                            <a class="show_activity"
                                                data-href="{{ route('tasks.show-activity', $top_task->id) }}">
                                                <i class="mdi mdi-comment-outline text-primary font-15"></i>
                                                <span class="text-muted font-weight-bold">{{ $count }}</span>
                                            </a>
                                        </li>
                                        <li class="list-item d-inline-block">
                                            <a class="ml-2" href="{{ route('tasks.edit', $top_task->id) }}">
                                                <i class="mdi mdi-pencil-outline text-muted font-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-item d-inline-block">
                                            <a class="delete-task" data-href="{{ route('tasks.delete', $top_task->id) }}">
                                                <i class="mdi mdi-trash-can-outline text-muted font-18"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end task-box-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
            @endif
            @foreach ($tasks as $task)
                @if (!empty($top_task))
                    @if ($task->id != $top_task->id)
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="task-box">
                                        <div class="task-priority-icon"><i
                                                class="fas fa-circle @if ($task->piority_id == 1) text-danger @elseif ($task->piority_id == 2) text-warning  @elseif ($task->piority_id == 3) text-info @else text-success @endif"></i>
                                        </div>
                                        <p class="text-muted float-right">
                                            <a data-href="{{ route('tasks.change-piority', $task->id) }}"
                                                class="change_piority">
                                                @if ($task->piority_id == 2)
                                                    <span class="badge badge-warning ">High</span>
                                                @elseif($task->piority_id == 3)
                                                    <span class="badge badge-info ">Medium</span>
                                                @else
                                                    <span class="badge badge-success ">Low</span>
                                                @endif
                                            </a>
                                            <span
                                                class="text-muted">{{ Carbon\Carbon::parse($task->created_at)->format(' H:i') }}</span>
                                            <span class="mx-1">·</span>
                                            <span><i class="far fa-fw fa-clock"></i>
                                                {{ Carbon\Carbon::parse($task->planned_end_date)->format('M-d ') }}</span>
                                        </p>
                                        <h5 class="mt-0"> {{ \Illuminate\Support\Str::limit($task->title, 38) }}</h5>
                                        <p class="text-muted mb-1">
                                            {{ \Illuminate\Support\Str::limit($task->description, 150) }}
                                        </p>

                                        <div class="d-flex justify-content-between">
                                            <div class="img-group">
                                                @if (!empty($task->user_id))
                                                    <a class="user-avatar user-avatar-group" href="#">
                                                        <img src="../assets/images/users/user-3.jpg" alt="user"
                                                            class="rounded-circle thumb-xs">
                                                    </a>
                                                    {{ $task->user->name }}
                                                @endif

                                            </div>
                                            <!--end img-group-->
                                            <ul class="list-inline mb-0 align-self-center">
                                                @php
                                                    $count = $task->activities()->count();
                                                @endphp
                                                <li class="list-item d-inline-block">
                                                    <a class="show_activity"
                                                        data-href="{{ route('tasks.show-activity', $task->id) }}">
                                                        <i class="mdi mdi-comment-outline text-primary font-15"></i>
                                                        <span
                                                            class="text-muted font-weight-bold">{{ $count }}</span>
                                                    </a>
                                                </li>
                                                <li class="list-item d-inline-block">
                                                    <a class="ml-2" href="{{ route('tasks.edit', $task->id) }}">
                                                        <i class="mdi mdi-pencil-outline text-muted font-18"></i>
                                                    </a>
                                                </li>
                                                <li class="list-item d-inline-block">
                                                    <a class="delete-task"
                                                        data-href="{{ route('tasks.delete', $task->id) }}">
                                                        <i class="mdi mdi-trash-can-outline text-muted font-18"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end task-box-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    @endif
                @else
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="task-box">
                                    <div class="task-priority-icon"><i
                                            class="fas fa-circle @if ($task->piority_id == 1) text-danger @elseif ($task->piority_id == 2) text-warning  @elseif ($task->piority_id == 3) text-info @else text-success @endif"></i>
                                    </div>
                                    <p class="text-muted float-right">
                                        <a data-href="{{ route('tasks.change-piority', $task->id) }}"
                                            class="change_piority">
                                            @if ($task->piority_id == 2)
                                                <span class="badge badge-warning">High</span>
                                            @elseif($task->piority_id == 3)
                                                <span class="badge badge-info">Medium</span>
                                            @else
                                                <span class="badge badge-success">Low</span>
                                            @endif
                                        </a>
                                        <span
                                            class="text-muted">{{ Carbon\Carbon::parse($task->created_at)->format(' H:i') }}</span>
                                        <span class="mx-1">·</span>
                                        <span><i class="far fa-fw fa-clock"></i>
                                            {{ Carbon\Carbon::parse($task->planned_end_date)->format('M-d ') }}</span>
                                    </p>
                                    <h5 class="mt-0"> {{ \Illuminate\Support\Str::limit($task->title, 38) }}</h5>
                                    <p class="text-muted mb-1">
                                        {{ \Illuminate\Support\Str::limit($task->description, 150) }}
                                    </p>

                                    <div class="d-flex justify-content-between">
                                        <div class="img-group">
                                            @if (!empty($task->user_id))
                                                <a class="user-avatar user-avatar-group" href="#">
                                                    <img src="../assets/images/users/user-3.jpg" alt="user"
                                                        class="rounded-circle thumb-xs">
                                                </a>
                                                {{ $task->user->name }}
                                            @endif

                                        </div>
                                        <!--end img-group-->
                                        <ul class="list-inline mb-0 align-self-center">
                                            @php
                                                $count = $task->activities()->count();
                                            @endphp
                                            <li class="list-item d-inline-block">
                                                <a class="show_activity"
                                                    data-href="{{ route('tasks.show-activity', $task->id) }}">
                                                    <i class="mdi mdi-comment-outline text-primary font-15"></i>
                                                    <span class="text-muted font-weight-bold">{{ $count }}</span>
                                                </a>
                                            </li>
                                            <li class="list-item d-inline-block">
                                                <a class="ml-2" href="{{ route('tasks.edit', $task->id) }}">
                                                    <i class="mdi mdi-pencil-outline text-muted font-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-item d-inline-block">
                                                <a class="delete-task"
                                                    data-href="{{ route('tasks.delete', $task->id) }}">
                                                    <i class="mdi mdi-trash-can-outline text-muted font-18"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end task-box-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                @endif
            @endforeach
            <!--end col-->
        </div>
        <!--end row-->
        <div id="view_activity" class="modal fade">

        </div>
        <div id="view_piority" class="modal fade">

        </div>
    </div><!-- container -->

@endsection

@section('scripts')

    <script>
        $(document).on('click', '.save-piority', function(e) {
            e.preventDefault();
            let piority_id = $('#piority_id').val();
            let id = $('#piority_task_id').val();
            Swal.fire({
                title: 'Are you sure?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        method: 'POST',
                        url: "{{ route('tasks.update-piority') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                            piority_id:piority_id

                        },

                        success: function(response) {

                            if (response.success == 1) {
                                $.toast({
                                    heading: 'Success',
                                    text: response.msg,
                                    position: 'top-right',
                                    bgColor: '#1ecab8',
                                    icon: 'success',
                                    showHideTransition: 'fade',
                                    loaderBg: '#ecf0f1'
                                })

                                location.reload();
                            } else {
                                $.toast({
                                    heading: 'Error',
                                    text: response.msg,
                                    position: 'top-right',
                                    bgColor: '#f1646c',
                                    icon: 'error',
                                    showHideTransition: 'fade',
                                    loaderBg: '#ecf0f1'
                                })
                            }
                        }
                    });
                }
            })
        });
        $(document).on('click', '.show_activity', function() {
            $('#view_activity').load($(this).data('href'), function() {
                $('#view_activity').modal('show');
            })
        });
        $(document).on('click', '.change_piority', function() {

            $('#view_piority').load($(this).data('href'), function() {
                $('#view_piority').modal('show');
            })
        });
        $(document).on('click', '.delete-task', function(e) {
            e.preventDefault();
            var url = $(this).data('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "GET",
                        url: url,

                        success: function(response) {

                            if (response.success == 1) {
                                $.toast({
                                    heading: 'Success',
                                    text: response.msg,
                                    position: 'top-right',
                                    bgColor: '#1ecab8',
                                    icon: 'success',
                                    showHideTransition: 'fade',
                                    loaderBg: '#ecf0f1'
                                })

                                location.reload();
                            } else {
                                $.toast({
                                    heading: 'Error',
                                    text: response.msg,
                                    position: 'top-right',
                                    bgColor: '#f1646c',
                                    icon: 'error',
                                    showHideTransition: 'fade',
                                    loaderBg: '#ecf0f1'
                                })
                            }
                        }
                    });
                }
            })
        });
    </script>
@endsection

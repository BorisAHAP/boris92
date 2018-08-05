@extends('index')


@section('content')

<div class="action-block"><a href="{{route('tasks.create')}}" class="btn btn-default">+Create Task</a>
    <div class="card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"></th>
                    @foreach($status as $stat)
                        <th>{{$stat->name}}</th>
                    @endforeach
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>

                        <td>{{$task->title}}</td>
                        @foreach($status as $stat)
                            <td>
                                {!! $stat->id==$task->status_id?'&#10004;':"" !!}
                            </td>
                        @endforeach
                        <td>
                            <a href="{{route('tasks.edit',['id'=>$task->id])}}" class="btn btn-default">Edit Task</a>
                            <a href="javascript:;" type="submit" class="delete btn btn-danger " data-id="{{$task->id}}">Delete Task</a>
                           <div><img src="images/comm.png" width="25px" height="auto" alt=""> (
                               <?php
                            $count=\App\Comment::where('task_id','=',$task->id)->count();
                            echo $count;
                               ?>
                               ) </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(function(){
            $(".delete").on('click', function () {
                $.ajax({
                    type: "DELETE",
                    url: "{{Route('tasks.delete')}} ",
                    data: {_token:"{{csrf_token()}}", id:$(this).attr("data-id")},
                    complete: function() {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection

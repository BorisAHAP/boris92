@extends('index')


@section('content')
<form class="card"  method="post">
    {{ csrf_field() }}
    <div class="card-body p-6">
        <div class="card-title">edit Task</div>
        <div class="form-group">
            <label class="form-label">Задача</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$task->title}}">
        </div>
        <div class="form-group">
            <label class="form-label">Описание</label>
            <textarea name="description"  style="width:100%" col="30" >{{$task->description}}</textarea>

        </div>
        <div class="form-group">
            <div class="form-label">Status</div>
            <div class="custom-controls-stacked">
                @foreach($status as $stat)
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="stat_id" value="{{$stat->id}}" @if($stat->id==$task->status_id) checked @endif>
                    <span class="custom-control-label">{{$stat->name}}</span>
                </label>
                @endforeach

                    <div class="media-body"><br>
                        <label class="form-label">Комментарии</label>
                        <ul class="media-list">
                            @foreach($comments as $comm)
                            <li class="media mt-4">

                                <div class="media-body">
                                    <textarea name="commentariy"  style="width:100%" col="30" >{{$comm->commentariy}}</textarea>
                                </div>
                                <a href="javascript:;" type="submit" class="delete btn btn-danger " data-id="{{$comm->id}}">Delete Comment</a>
                            </li>
                                @endforeach
                                <li class="media mt-4">

                                    <div class="media-body">
                                        <textarea name="commentariy"  style="width:100%" col="30" placeholder="Написать комментарий"></textarea>
                                    </div>
                                </li>
                        </ul>
                    </div>

            </div>

        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block">edit Task</button>
        </div>
    </div>
</form>
@endsection
@section('js')
    <script>
        $(function(){
            $(".delete").on('click', function () {
                $.ajax({
                    type: "DELETE",
                    url: "{{Route('comments.delete')}} ",
                    data: {_token:"{{csrf_token()}}", id:$(this).attr("data-id")},
                    complete: function() {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection


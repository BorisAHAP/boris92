@extends('index')


@section('content')
    <form class="card"  method="post">
        {{ csrf_field() }}
        <div class="card-body p-6">
            <div class="card-title">Create new Task</div>
            <div class="form-group">
                <label class="form-label">Задача</label>
                <input type="text" class="form-control" placeholder="Enter task" name="name" required>
            </div>
            <div class="form-group">
                <label class="form-label">Описание</label>
                <textarea name="description"  style="width:100%" col="30" required></textarea>

            </div>
            <div class="form-group">
                <div class="form-label">Status</div>
                <div class="custom-controls-stacked">
                    @foreach($status as $stat)
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="stat_id" value="{{$stat->id}}" checked="">
                        <span class="custom-control-label">{{$stat->name}}</span>
                    </label>
                        @endforeach
                </div>

            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">Create new Task</button>
            </div>
        </div>
    </form>
@endsection
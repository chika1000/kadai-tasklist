@extends('layouts.app')

@section('content')

    <h1>タスク編集ページ</h1>

    <div class="row">
        <div class="col-xs-6">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'status:') !!}
                    {!! Form::select('status', ['進行中' => '進行中', '完了' => '完了', '待機' => '待機', '保留' => '保留', '中止' => '中止'], null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('deadline', '期限日:') !!}
                    {!! Form::date('deadline', \Carbon\Carbon::now(), null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
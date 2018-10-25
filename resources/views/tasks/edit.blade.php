@extends('layouts.app')

@section('content')

    <h1>タスク編集ページ</h1>

    <div class="row">
        <div class="col-xs-12  col-sm-offset-2 col-sm-8  col-md-offset-2 col-md-8  col-lg-offset-3 col-lg-6">

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
                    {!! Form::date('deadline', new \Carbon\Carbon($task->deadline), null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('memo', 'メモ:') !!}
                    {!! Form::textarea('memo', null, ['class' => 'form-control', 'rows' => '3']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
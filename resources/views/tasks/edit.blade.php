@extends('layouts.app')

@section('content')

    <h1>タスク編集ページ</h1>

    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}

        {!! Form::label('status', 'status:') !!}
        {!! Form::select('status', ['進行中' => '進行中', '完了' => '完了', '待機' => '待機', '保留' => '保留', '中止' => '中止']) !!}

        {!! Form::submit('更新') !!}

    　{!! Form::close() !!}

@endsection
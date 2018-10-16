@extends('layouts.app')

@section('content')

    <h1>タスク新規登録ページ</h1>

    {!! Form::model($task, ['route' => 'tasks.store']) !!}

        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}

        {!! Form::label('status', 'status:') !!}
        {!! Form::select('status', ['進行中' => '進行中', '完了' => '完了', '待機' => '待機', '保留' => '保留', '中止' => '中止']) !!}

        {!! Form::label('deadline', '期限日:') !!}
        {!! Form::date('deadline', \Carbon\Carbon::now()) !!}

        {!! Form::submit('登録') !!}

    {!! Form::close() !!}

@endsection
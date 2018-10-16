@extends('layouts.app')

@section('content')

    <h1>タスク詳細ページ</h1>

    <p>タスク: {{ $task->content }}</p>
    <p>status: {{ $task->status }}</p>
    <p>期限日: {{ $task->deadline }}</p>
    <p>更新日時: {{ $task->updated_at }}</p>
    <p>登録日時: {{ $task->created_at }}</p>

    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id]) !!}

    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}

@endsection
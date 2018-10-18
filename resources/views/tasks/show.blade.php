@extends('layouts.app')

@section('content')

    <h1>タスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>status</th>
            <td>{{ $task->status }}</td>
        </tr>
        <tr>
            <th>期限日</th>
            <td>{{ $task->deadline }}</td>
        </tr>
        <tr>
            <th>更新日時</th>
            <td>{{ $task->updated_at }}</td>
        </tr>
        <tr>
            <th>登録日時</th>
            <td>{{ $task->created_at }}</td>
        </tr>
    </table>

    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-default']) !!}

    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection